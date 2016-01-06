<?php
class DisqusEngagePlugin extends Omeka_Plugin_AbstractPlugin
{

	protected $_hooks = array(
		'install',
		'uninstall',
		'config_form',
		'config',
		'public_items_show',
		'public_collections_show',
		'initialize',
	);


	protected $_options = array(
		'de_shortname'=>null,
		'de_items'=>1,
		'de_collections'=>0,
	);


	/*
    ** Plugin options
    */

	public function hookConfigForm()
	{
		require dirname(__FILE__) . '/config_form.php';
	}

	public function hookConfig()
	{
		set_option('de_shortname', $_POST['de_shortname']);
		set_option('de_items', (bool)(int)$_POST['de_items']);
		set_option('de_collections', (bool)(int)$_POST['de_collections']);
	}

	/*
	** Public display
	*/

	public function hookPublicItemsShow()
	{

		echo de_display_comments(get_option('de_items'));

	}

	public function hookPublicCollectionsShow(){

		echo de_display_comments(get_option('de_collections'));

	}


	/**
	 * Install the plugin.
	 */
	public function hookInstall()
	{
		$this->_installOptions();

	}

	/**
	 * Uninstall the plugin.
	 */
	public function hookUninstall()
	{
		$this->_uninstallOptions();

	}
	
	
	/**
	 * Shortcode
	 */
    public function hookInitialize()
    {
        add_shortcode('disqus', array($this, 'de_shortcode'));
    }	
	
	public function de_shortcode()
	{
		return de_display_comments(1);
	}
}


function de_display_comments($option=null)
{
	/*
		Instructions for adding comment counts to items/browse
		Add to footer: <script id="dsq-count-scr" src="//omeka-sandbox.disqus.com/count.js" async></script>
		Append #disqus_thread to the href attribute in your links. This will tell Disqus which links to look up and return the comment count. For example: <a href="http://example.com/bar.html#disqus_thread">Link to Omeka items/show</a>
		
		^^ This may be added in a future update
	*/
	
	if( ($shortname=get_option('de_shortname')) && ($option==1) ){
		$html  = "<div id=\"disqus_thread\"></div><script>(function() { var d = document, s = d.createElement('script');s.src = '//".$shortname.".disqus.com/embed.js';s.setAttribute('data-timestamp', +new Date());(d.head || d.body).appendChild(s);})();</script><noscript>Please enable JavaScript to view the <a href=\"https://disqus.com/?ref_noscript\" rel=\"nofollow\">comments powered by Disqus.</a></noscript>";

		return $html;
	}
}
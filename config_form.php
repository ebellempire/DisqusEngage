<h2><?php echo __('Account Settings'); ?></h2>

<fieldset id="account">

	<div class="field">
	    <div class="two columns alpha">
	        <label for="de_shortname"><?php echo __('Short Name'); ?></label>
	    </div>

	    <div class="inputs five columns omega">
	        <p class="explanation"><?php echo __("Enter the Disqus <code>short_name</code> for this site."); ?></p>

	        <div class="input-block">
	            <input type="text" class="textinput" name="de_shortname" value="<?php echo get_option('de_shortname'); ?>">
	            <p class="helper"><?php echo __('Log into your account at <a target="_blank" href="https://publishers.disqus.com/engage/">disqus.com</a>. Choose or create a site. Enter the value for <code>short_name</code> above. <a target="_blank" href="https://help.disqus.com/customer/portal/articles/466208-what-s-a-shortname-">Need help finding your short_name?</a>'); ?></p>
	        </div>
	    </div>
	</div>

</fieldset>


<h2><?php echo __('Display Settings'); ?></h2>

<fieldset id="display">

	<div class="field">
	    <div class="two columns alpha">
	        <label for="de_items"><?php echo __('Items'); ?></label>
	    </div>

	    <div class="inputs five columns omega">
	        <?php echo get_view()->formCheckbox('de_items', true,
	array('checked'=>(boolean)get_option('de_items'))); ?>

	        <p class="explanation"><?php echo __('Display comments on item record.'); ?></p>
	    </div>
	</div>

	<div class="field">
	    <div class="two columns alpha">
	        <label for="de_collections"><?php echo __('Collections'); ?></label>
	    </div>

	    <div class="inputs five columns omega">
	        <?php echo get_view()->formCheckbox('de_collections', true,
	array('checked'=>(boolean)get_option('de_collections'))); ?>

	        <p class="explanation"><?php echo __('Display comments on collection record.'); ?></p>
	    </div>
	</div>
</fieldset>


<h2><?php echo __('Shortcode'); ?></h2>

<fieldset id="short_code">


	<div class="field">
	    <div class="two columns alpha">
	        <label for="de_items"><?php echo __('Instructions'); ?></label>
	    </div>

	    <div class="inputs five columns omega">

	        <p class="explanation"><?php echo __('Use the shortcode <code>[disqus]</code> to manually add a Disqus Engage comments section to any page.'); ?></p>
	    </div>
	</div>

</fieldset>

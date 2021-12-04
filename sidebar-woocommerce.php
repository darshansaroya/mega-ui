<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mega-ui
 */
?>
<div class="col-md-4 col-sm-12 mega-ui-sidebar mt-3">
	<?php if ( is_active_sidebar( 'mega_ui_woo' ) ){
		dynamic_sidebar( 'mega_ui_woo' );
		} ?>
</div>

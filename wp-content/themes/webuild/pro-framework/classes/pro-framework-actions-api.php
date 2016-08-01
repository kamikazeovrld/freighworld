<?php

/**
 *
 * PROFramework Actions API
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class PROFramework_Actions_API extends PROFramework_Abstract {


	public function __construct() {
		$this->addAction( 'admin_footer', 'icon_dialog', 99 );
		$this->addAction( 'wp_ajax_pro-icons', 'icon_generator', 99 );
		if ( ! isset( get_current_screen()->id ) || get_current_screen()->base != 'post' ) {
			$this->addAction( 'print_media_templates', 'print_media_templates' );
			$this->addAction( 'wp_enqueue_media', 'wp_enqueue_media' );
		}
	}

	public function wp_enqueue_media() {
		wp_enqueue_script( 'pro-gallery-settings', FRAMEWORK_ASSETS . '/js/pro-gallery-settings.js', array( 'media-views' ), '1.0.0', true );
	}


	/**
	 *
	 * WP_Gallery Extra Settings
	 * @since 1.0.0
	 * @version 1.0.0
	 *

	 */
	public function print_media_templates() {
		?>
		<script type="text/html" id="tmpl-pro-gallery-settings">
			<label class="setting pro-settings">
				<span>Slideshow or </span>
				<select id="pro-gallery-type" data-setting="protype">
					<option value="">default</option>
					<option value="slideshow">Slideshow</option>
					<option value="gallery_thumb">Gallery with Thumbnails</option>
					<option value="gallery_nearby">Gallery visibleNearby</option>
					<option value="gallery_lightbox">Gallery with Lightbox</option>
				</select>
			</label>
			<div id="pro-gallery-scale" class="hidden">
				<label class="setting">
					<span>Image Scale</span>
					<select name="" data-setting="scale">
						<option value="">default</option>
						<option value="fill">fill</option>
						<option value="fit">fit</option>
						<option value="fit-if-smaller">fit-if-smaller</option>
						<option value="none">none</option>
					</select>
				</label>
			</div>
			<label class="setting">
				<span>Image Size</span>
				<select name="" data-setting="size">
					<option value="">default</option>
					<?php
					$sizes = array_flip( webuild_get_image_sizes( true ) );
					foreach ( $sizes as $size => $name ) {
						echo '<option value="' . $size . '">' . $name . '</option>';
					}
					?>
				</select>
			</label>
		</script>
		<?php
	}


	/**
	 *
	 * Icon Generator
	 * @since 1.0.0
	 * @version 1.0.0
	 *

	 */
	public function icon_generator() {
		echo '<div class="icon-set-title icon-set-im">ICOMOON ICONS</div>';
		$icomoon_icons = json_decode( @file_get_contents( FRAMEWORK_INCLUDE_DIR . '/icon-manger/im-icons.json' ) );
		foreach ( $icomoon_icons->icons as $icomoon_icon ) {
			echo '<a href="#" data-icon="im-' . $icomoon_icon . '"><span class="im im-' . $icomoon_icon . '"></a>';
		}
		echo '<div class="icon-set-title icon-set-fa">FONT-AWESOME ICONS</div>';
		$icons = json_decode( @file_get_contents( FRAMEWORK_INCLUDE_DIR . '/icon-manger/fa-icons.json' ) );
		foreach ( $icons->icons as $icon ) {
			echo '<a href="#" data-icon="fa-' . $icon . '"><span class="fa fa-' . $icon . '"></a>';
		}
		die();
	}


	/**
	 *
	 * Icon Generator
	 * @since 1.0.0
	 * @version 1.0.0
	 *

	 */
	public function icon_dialog() {
		?>
		<div id="icon-dialog" title="Icon Manager">
			<div id="dialog-header-wrap">
				<input type="text" name="" id="icon-search" placeholder="Search a icon..." value=""/>
			</div>
			<div id="dialog-shadow-up"></div>
			<div id="icon-load"></div>
			<div id="dialog-insert-button">
				<div id="dialog-shadow-down"></div>
				<a href="#" id="icon-insert" class="button button-primary button-large">Use this icon</a>
			</div>
		</div>
		<div id="shortcode-overlay"></div>
		<?php
	}
}

new PROFramework_Actions_API();
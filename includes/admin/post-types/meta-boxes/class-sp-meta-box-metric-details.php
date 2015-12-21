<?php
/**
 * Metric Details
 *
 * @author 		ThemeBoy
 * @category 	Admin
 * @package 	SportsPress/Admin/Meta_Boxes
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'SP_Meta_Box_Config' ) )
	include( 'class-sp-meta-box-config.php' );

/**
 * SP_Meta_Box_Metric_Details
 */
class SP_Meta_Box_Metric_Details extends SP_Meta_Box_Config {

	/**
	 * Output the metabox
	 */
	public static function output( $post ) {
		wp_nonce_field( 'sportspress_save_data', 'sportspress_meta_nonce' );
		$prepend = get_post_meta( $post->ID, 'sp_prepend', true );
		$append = get_post_meta( $post->ID, 'sp_append', true );
		?>
		<p><strong><?php _e( 'Variable', 'sportspress' ); ?></strong></p>
		<p>
			<input name="sp_default_key" type="hidden" id="sp_default_key" value="<?php echo $post->post_name; ?>">
			<input name="sp_key" type="text" id="sp_key" value="<?php echo $post->post_name; ?>">
		</p>
		<p><strong><?php _e( 'Prepend', 'sportspress' ); ?></strong></p>
		<p>
			<input name="sp_prepend" type="text" id="sp_prepend" value="<?php echo $prepend; ?>">
		</p>
		<p><strong><?php _e( 'Append', 'sportspress' ); ?></strong></p>
		<p>
			<input name="sp_append" type="text" id="sp_append" value="<?php echo $append; ?>">
		</p>
		<?php
	}

	/**
	 * Save meta box data
	 */
	public static function save( $post_id, $post ) {
		update_post_meta( $post_id, 'sp_prepend', sp_array_value( $_POST, 'sp_prepend', array() ) );
		update_post_meta( $post_id, 'sp_append', sp_array_value( $_POST, 'sp_append', array() ) );
	}
}
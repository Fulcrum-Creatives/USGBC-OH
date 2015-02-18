<?php
/**
 * The template for displaying search forms in Twenty Eleven
 * * @package WordPress
 * @subpackage USGBC-OH
 * @since USGBC-OH 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'USGBCOH' ); ?></label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'USGBCOH' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'USGBCOH' ); ?>" />
	</form>

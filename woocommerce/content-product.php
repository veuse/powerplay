<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>
<li <?php post_class( $classes ); ?>>
	
	<div class="veuse-product-content">
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	<?php wc_get_template_part('loop/sale-flash');?>
	<div class="veuse-product-info">
	

	
	
		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
		<div style="text-align:center;clear:both; padding:10px 0; margin-bottom:20px; border-bottom:1px solid #e4e4e4;"><?php wc_get_template_part('loop/rating');?>
		
		</div>
		<div class="product-info">
		<h4><a href="<?php the_permalink(); ?>">
<?php the_title(); ?></a></h4>
		<p><?php echo $post->post_excerpt;?></p>
		<a href="<?php the_permalink();?>"><?php _e('View details','veuse');?></a>
		
		</div>
		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			//do_action( 'woocommerce_after_shop_loop_item_title' );
			wc_get_template_part('loop/price');
		?>
		
	 
		<div class="product-actions">
			<?php wc_get_template_part( 'loop/add-to-cart', '' ); ?>
			<?php //wc_get_template_part( 'loop/view-details', '' ); ?>
			<?php //do_action( 'woocommerce_after_shop_loop_item' ); ?>
		</div>
		</div>
	</div>
	
</li>
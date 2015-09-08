<?php
/**
 * The main template file.
 */
?>

<?php get_header(); ?>

	<?php do_action( 'sp_start_content_wrap_html' ); ?>

	<!-- <h2>Welcome to <?php echo strtoupper(wp_get_theme()->get( 'Name' )); ?></h2>
	<ul>
	    <li>Theme name: <?php echo SP_THEME_NAME; ?></li>
	    <li>Theme version: <?php echo SP_THEME_VERSION; ?></li>
	    <li>Text domain: <?php echo SP_TEXT_DOMAIN; ?></li>
	</ul> -->

	<h2>For Test</h2>
		<table class="order-list">
			<!-- <thead>
				<tr>
					<th>#</th>
					<th>Client Name</th>
					<th>Products</th>
					<th>Register Date</th>
					<th>Expire Date</th>
				</tr>
			</thead> -->
			<tbody>
			<?php
	    	$args = array(
					'post_type'			=> 'sp_client',
					'posts_per_page'	=>	-1,
					'order'				=> 	'ASC'
					
				);
			$custom_query = new WP_Query( $args );
			if( $custom_query->have_posts() ) :
				while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
				<tr>
					<td>
						<a class="sp-info-client" href="<?php echo esc_url( get_permalink(get_post_meta( $post->ID, 'sp_order_client_name', true )) ); ?>"><?php echo get_the_title( get_post_meta( $post->ID, 'sp_order_client_name', true ) ); ?></a>
					</td>
				</tr>
			<?php $count++;
			endwhile; wp_reset_postdata();
			endif; ?>
			</tbody>
		</table>
		<script type="text/javascript">
        	jQuery(document).ready(function ($){
	        	$('.sp-info-client').magnificPopup({
					type: 'ajax',
					overflowY: 'scroll'
			});
        });
    	</script>
	<?php do_action( 'sp_end_content_wrap_html' ); ?>
<?php get_footer(); ?>
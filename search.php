<?php get_header(); ?>
	<main class="cd-main-content">
		<section class="categories no-header-push">
			<div class="container-fluid">
			<?php if ( have_posts() ) : ?>
				<div class="row">
					<div class="col-sm-12 video-header">
						<h3 class="pull-left"><?php printf( __( 'Search Results for: %s', 'streamium' ), get_search_query() ); ?></h3>
					</div><!--/.col-sm-12-->
				</div><!--/.row-->
				<div class="row static-row">
					<?php while ( have_posts() ) : the_post(); if ( has_post_thumbnail() ) { 
						$image   = wp_get_attachment_image_src( get_post_thumbnail_id(), 'streamium-video-poster' );
						$trimmed_content = wp_trim_words( get_the_excerpt(), 11 ); 
						?>
						<div <?php post_class("col-sm-3 tile"); ?>>
							<?php if(get_comments_number()) : ?>
								<a href="#" class="tile_reviews" data-pid="<?php echo $post->ID; ?>"><?php comments_number( '0 reviews', '1 review', '% reviews' ); ?></a>
							<?php endif; ?>
					        <div class="tile_media">
					        	<img class="tile_img" src="<?php echo esc_url($image[0]); ?>" alt=""  />
					        </div>
					        <a class="tile_play" href="<?php the_permalink(); ?>">
								<i class="fa fa-play fa-1x" aria-hidden="true"></i>
				        	</a>
					        <div class="tile_details">
					          	<div class="tile_meta">
					            	<h4><?php the_title(); ?></h4>						            	
					            	<p><?php echo $trimmed_content; ?></p>
					          	</div>
					        </div>
						</div>
					<?php } endwhile; ?>
				</div><!--/.row-->
				<div class="row">
					<div class="col-sm-12">
						<?php if (function_exists("streamium_pagination")) {
						    pagination($additional_loop->max_num_pages);
						} ?>
					</div>
				</div><!--/.row-->
			<?php else : ?>
				<div class="row">
					<div class="col-sm-12 video-header">
						<h3 class="pull-left"><?php printf( __( 'Search Results for: %s', 'streamium' ), get_search_query() ); ?></h3>
						<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
					</div><!--/.col-sm-12-->
				</div><!--/.row-->
			<?php endif; ?>
			</div><!--/.container-->
		</section><!--/.videos-->
<?php get_footer(); ?>
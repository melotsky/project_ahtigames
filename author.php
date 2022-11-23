<?php
/**
 * Template for Author View
 */

get_header(); ?>

<div id="floatwrapper" class="group wrapper">
<div id="twoholder" class="group">

<?php
$detect = new Mobile_Detect;
$sticky = get_option( 'sticky_posts' );
rsort( $sticky );
$sticky = array_slice( $sticky, 0, 1 );
$sticky[0];
?>

<section id="sec-blogsummary" class="group">
	<div id="outer">
		<div id="inner" class="wrapper">

			<div id="primary" class="group site-content">

				<div class="blog__page_title group">
                    <?php the_archive_title( '<h1>Autor ', '</h1>' ); ?>
                </div>
                <?php
                
                ?>

				<div id="content" role="main" class="group">
				
				
				<?php 
				if ( have_posts() ) : ?>
					<div id="bs__holder">
						<?php while ( have_posts() ) : the_post(); ?>

							<div class="bs__item">
							<div class="bs__item_wrapper group">	

								<?php if (has_post_thumbnail( $post->ID ) ): 
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured_image__blogsummary' ); 
                                    ?>
									<div class="bs__img">
										<a href="<?php the_permalink() ?>">
											<img src="<?php _e($image[0])?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" />
										</a>
									</div>
								 <?php else : ?>
									<div class="bs__img">
										<a href="<?php the_permalink() ?>">
											<img src="<?php echo get_template_directory_uri()?>/assets/css/images/noimage.png" alt="<?php the_title() ?>" title="<?php the_title() ?>" />
										</a>
									</div>
								<?php endif; ?>

								<?php
								/**
								 * Display Tags
								 */
								$tags = get_the_tags(); 
								if ($tags) :
								?>
									<div class="bs__tags group"  style="display: none !important">
                                    <?php 
                                        $counterhelper = 1;
										$counter = count($tags);
										$xcounter = 0;
										foreach ( $tags as $tag ) { ?>
											<span><?php echo $tag->name; 
												$xcounter++;
												if ($xcounter != $counter){echo "";}
											?></span>
                                            <?php if($counterhelper = 1){break;}?>
										<?php $counterhelper++; } ?>
									</div>
								<?php endif; ?>
								
								<?php
								/**
								 * Title
								 */
								?>
								<h3 class="bs__title"><a href="<?php the_permalink()?>"><?php the_title() ?></a></h3>
								<p class="bs__dexcerpt"><?php echo get_the_excerpt()?></p>
							</div>
							</div>


						<?php endwhile; ?>
					</div>	 
					<?php if (function_exists("pagination")) {
						pagination($additional_loop->max_num_pages);
					} ?>

				<?php else : ?>

				<?php endif; ?>

				</div><!-- #content --> 
			</div><!-- #primary -->

		</div><!-- #inner -->
	</div><!-- #outer -->
</section>


</div> <!-- twoholder -->
<?php get_sidebar('blog'); ?>
</div> <!-- floatwrapper -->
<?php get_footer(); ?>

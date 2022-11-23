<?php
/**
 * Template for Default Template
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

if ( $sticky[0] ) : ?>
<section id="sec-sticky" class="group">
	<div id="sticky-wrapper" class="group __wrapper">
	<?php $loop = new WP_Query( array( 'post_type' => 'post', 'p' => $sticky[0] ) );
		while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<div id="stick__post" class="group">

			<?php 
			/**
			 * Display Featured Image
			 */
      ?>
      
			<?php
			if (has_post_thumbnail( $post->ID ) ): 
        $image = $detect->isMobile()
          ? wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured_post_image__mobile' )
          : wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured_post_image__desktop' ); 
        
        $image_id = pippin_get_image_id($image[0]);
        $srcset = wp_get_attachment_image_srcset( get_custom_header()->$image_id, array( 400, 200 ) )
      ?>
      <div class="sticky__img group">
        <a href="<?php the_permalink()?>">
          <img src="<?php echo $image[0] ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" 
          />
        </a>
      </div>
			<?php 
      endif; 
      ?>

			<?php 
			/**
			 * Dispay title of Sticky Post
			 */
			?>
			<div class="sticky__title group">
				<h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
			</div>


			<?php
				$fname = get_the_author_meta('first_name');
				$lname = get_the_author_meta('last_name');
				$get_author_id = get_the_author_meta('ID');
				$get_author_gravatar = get_avatar_url($get_author_id, array('size' => 35));

				$full_name = '';

				if( empty($fname)){
					$full_name = $lname;
				} elseif( empty( $lname )){
					$full_name = $fname;
				} else {
					//both first name and last name are present
					$full_name = "{$fname} {$lname}";
				}
				$author_link = get_author_posts_url( $post->post_author );
				$post_date = get_the_time('d/m/Y');
      ?>
      <div class="author_date_summary">
      <?php if( ! empty( $full_name )):?>
        <div class="author_name_summary group">
          <img src="<?=$get_author_gravatar?>" />
          <?=$full_name?> 
          <span class="post_date"><?=$post_date?></span>
      <?php endif; ?>

        <?php
        /**
         * Display Tags
         */
        $tags = get_the_tags(); 
        if ($tags) :
        ?>
          <div class="sticky__tags sum_main group">
          <?php
          $counter=1;
          foreach ( $tags as $tag ):
          ?>
            <span><?php echo $tag->name; ?></span>
          <?php
            if($counter == 3){break;}
            $counter++;
          endforeach;
          ?>
          </div>
        <?php endif; ?>
          
        </div>
      </div>
		</div>
		<?php endwhile; ?>
    	<?php wp_reset_postdata(); // reset the query ?>
	</div>
</section>
<?php endif; ?>

<section id="sec-blogsummary" class="group">
	<div id="outer" >
		<div id="inner" class="__wrapper">

			<div id="primary" class="group site-content">

				<div class="blog__page_title group" style="display: none">
					<!-- h2><?php //the_field('blog_summary_page_title', 'option') ?></h2 -->
				</div>

				<div id="content" role="main" class="group">
				
				
				<?php 
				if ( have_posts() ) : ?>
					<div id="bs__holder">
						<?php while ( have_posts() ) : the_post(); ?>

							<div class="bs__item">
							<div class="bs__item_wrapper group">	

								<?php
									$image = has_post_thumbnail( $post->ID )
                    ?wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured_image__blogsummary' )[0]
                    :get_template_directory_uri()."/assets/css/images/noimage.png"; 
									?>
									<div class="bs__img">
										<a href="<?php the_permalink() ?>">
											<img src="<?=$image?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" />
										</a>
									</div>

								<?php
								/**
								 * Display Tags
								 */
								$tags = get_the_tags(); 
								if ($tags) :
								?>
									<div class="bs__tags group" style="display: none !important">
                <?php 
                  $counterhelper = 1;
                  $counter = count($tags);
                  $xcounter = 0;
                  foreach ( $tags as $tag ): 
                ?>
                    <span><?=$tag->name;?></span>
                <?php 
                    if($counterhelper = 1){break;}
                    $counterhelper++;
                  endforeach;
                ?>
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

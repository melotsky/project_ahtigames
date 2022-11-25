<?php
/**
 * Template Single Post Page
 */

get_header(); 

use cumuli\son_api\Helper;
$detect = new Mobile_Detect;
$sticky = get_option( 'sticky_posts' );
rsort( $sticky );
$sticky = array_slice( $sticky, 0, 1 );
$sticky[0];
?>

<section id="sec-blogsummary" class="group">
    <div id="outer">
        <div id="inner" class="wrapper_single">
            <div id="primary" class="group site-content bottom-spacer">
                <div id="content" role="main" class="group">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'template-parts/content', 'post' ); ?>
                        <?php //comments_template( '', true ); ?>
                    <?php endwhile; // end of the loop. ?>
                </div><!-- #content --> 
            </div><!-- #primary -->
        </div><!-- #inner -->
            
        <?php
        /**
         * Related Articles / More Articles
         */
        ?>

        <div class="group wrapper">
            <?php 
            $category = get_the_category($post->ID);
            $current_post = $post->ID;
            
            $ignore_this_posts = array($current_post);
            //array_push($a, get_option( 'sticky_posts' ) );
            $related_posts = new WP_Query( array( 
                'post_type'         => 'post', 
                'posts_per_page'    => 3, 
                array( 'cat'        => $category[0]->cat_ID ),
                'post__not_in'      => $ignore_this_posts,
                //'orderby'           => 'rand',
                'ignore_sticky_posts' => 1
            ));
            if ( have_posts() ):
            ?>
              <div id="more__articles" class="group">
                <h2><?=__('lisää artikkeleita', 'fx_lang');?></h2>
                <div class="ma__flex">
                <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                  <div class="ma__item">
                      <?php
                        $image = has_post_thumbnail( $post->ID )
                            ?wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured_image__blogsummary' )[0]
                            :get_template_directory_uri()."/assets/css/images/noimage.png"; 
                      ?>
                      <div class="ma__img">
                          <a href="<?php the_permalink() ?>">
                              <img src="<?=$image?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" />
                          </a>
                      </div>

                      <?php
                      /**
                      * Display Tags
                      */
                      $tags = get_the_tags();?>
                      <?php if ($tags) :?>
                        <div class="bs__tags group">
                          <?php 
                          $counter = count($tags);
                          $xcounter = 0;
                          foreach ( $tags as $tag ):
                            $xcounter++;
                          ?>
                            <span><?=$tag->name.($xcounter==$counter?'':',')?></span>
                          <?php 
                          endforeach;
                          ?>
                        </div>
                      <?php endif; ?>

                      <?php
                      /**
                      * Title
                      */
                      ?>
                      <h3 class="ma__title"><a href="<?php the_permalink()?>"><?php the_title() ?></a></h3>
                  </div>
                <?php endwhile; ?>
                </div>
              </div>
          <?php endif; ?>
          <?php wp_reset_postdata(); // reset the query ?>

        </div>
    </div><!-- #outer -->
</section>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>

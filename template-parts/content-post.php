<?php

/**
 * Content area for Default Template
 */
use cumuli\son_api\Helper;
$detect = new Mobile_Detect;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
  <header class="entry-header">
  <?php
    /**
	* Display Tags
    */
    //$tags = get_the_tags(); 
    //if ($tags) :
    ?>
        <!-- div class="sticky__tags group text_center">
            <?php //foreach ( $tags as $tag ) { ?>
                <span><?php //echo $tag->name; ?></span>
            <?php //} ?>
        </div -->
	<?php //endif; ?>
      
      <?php the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); ?>
      <?php
        $fname = get_the_author_meta('first_name');
        $lname = get_the_author_meta('last_name');
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
        $the_day = get_the_time('d');
        $the_month = get_the_time('M');
        $the_month = ucfirst($the_month);
        $the_year = get_the_time('Y');
        echo "<div class=\"author_date\">";
        if( ! empty( $full_name )) {
            //echo "<p class=\"author_name\"><a href=\"{$author_link}\">{$full_name}</a></p>";
        }
        echo "<p class=\"post_date\">{$the_day} {$the_month} {$the_year}</p></div>";
      ?>
      
  </header>

  <?php
  /**
   * Show the Featured Image
   */
  ?>
  <?php
    if (has_post_thumbnail( $post->ID ) ): 
    $banner_img_360 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'soft_banner_360' );
    $banner_img_500 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'soft_banner_500' );
    $banner_img_600 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'soft_banner_600' );
    $banner_img_730 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured_post_image__desktop' );
  ?>
    <div class="group single__post_img">
      <img 
        alt="<?php the_title() ?>"
        title="<?php the_title() ?>"
        src="<?php _e($banner_img_1110[0]); ?>"  
        srcset="
        <?php 
        echo $banner_img_360[0] . " 360w, ";
        echo $banner_img_500[0] . " 500w, ";
        echo $banner_img_600[0] . " 600, ";
        echo $banner_img_730[0] . " 730w";
        ?>"
        sizes="
            (max-width: 360px) 360px, 
            (max-width: 500px) 500px, 
            (max-width: 600px) 600px, 
            (max-width: 730px) 730px, 
            100vw
        "
        />       
    </div>
  <?php
    endif;
  ?>


  <div class="entry-content group">
    <?php the_content(); ?>
  </div>
  <!-- .entry-content -->
    <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

</article>
<!-- #post --> 

<?php
    /**
	* Display Tags
    */
    $tags = get_the_tags(); 
    if ($tags) :
    ?>
        <div class="sticky__tags group footer__tags">
            <?php foreach ( $tags as $tag ) { ?>
                <span><?php echo $tag->name; ?></span>
            <?php } ?>
        </div>
<?php endif; ?>



<div id="prenxtlink" class="group prenextLinkeer">
<?php
$prev_post = get_previous_post();
if (!empty( $prev_post )): ?>
    <a class="prevPost" href="<?php echo get_the_permalink( $prev_post->ID )  ?>">
        <span class="default_prev_title"><?php Helper::ln_e('previous'); ?></span>
    </a>
<?php endif ?>


<?php
$next_post = get_next_post();
    if (!empty( $next_post )): ?>
        <a class="nextPost" href="<?php echo get_the_permalink($next_post->ID)  ?>">
            <span class="default_next_title"><?php Helper::ln_e('next'); ?></span>
        </a>
    <?php endif ?>
</div>

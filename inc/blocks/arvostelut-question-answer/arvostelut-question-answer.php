<?php
/* Promotion Block 4
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'arvostelut_qa__' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'arvostelut_qa__class';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
//$blogID = get_option( 'page_for_posts' );

if ( get_field('enable_this_aqa') == 1 ) :
?>
<div class="<?php _e($className)?> extra_top_bot_margin" id="<?php _e($id)?>">
    <div class="schema-faq wp-block-yoast-faq-block ">

        <?php while(the_repeater_field('arvostelut_question_answer')) : ?>
            <div class="schema-faq-section">
                <h2 class="schema-faq-question"><?php the_sub_field('question_aqa')?></h2>
                <div class="schema-faq-answer">
                    <?php 
                    the_sub_field('answer_aqa'); 
                    if( get_sub_field('enable_testimonial_aqa')  == '1') :
                    ?>
                        <div class="testi_semi">
                            <div class="ts__item">
                                <div class="ts__inner">
                                    <p class="ts__test"><?php the_sub_field('testimonial_aqa1')?></p>
                                    <p class="ts__name"><span><?php the_sub_field('name_aqa1')?>,</span> <?php the_sub_field('place_aqa1')?></p>
                                </div>
                            </div>
                            <div class="ts__item">
                                <div class="ts__inner">
                                    <p class="ts__test"><?php the_sub_field('testimonial_aqa2')?></p>
                                    <p class="ts__name"><span><?php the_sub_field('name_aqa2')?>,</span> <?php the_sub_field('place_aqa2')?></p>
                                </div>
                            </div>
                            <div class="ts__item">
                                <div class="ts__inner">
                                    <p class="ts__test"><?php the_sub_field('testimonial_aqa3')?></p>
                                    <p class="ts__name"><span><?php the_sub_field('name_aqa3')?>,</span> <?php the_sub_field('place_aqa3')?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>

                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<?php
endif;
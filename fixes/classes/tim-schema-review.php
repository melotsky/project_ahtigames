<?php
use \Yoast\WP\SEO\Generators\Schema\Abstract_Schema_Piece;
use \Yoast\WP\SEO\Generators\Schema\Article;
use \Yoast\WP\SEO\Config\Schema_IDs;

class TIM_Schema_Review extends Article {

 	/**
	 * A value object with context variables.
	 *
	 * @var WPSEO_Schema_Context
	 */
	public $context;

	/**
	 * Determines whether or not a piece should be added to the graph.
	 *
	 * @return bool
	 */
	public function is_needed() {
		$post_types = apply_filters( 'tim_review_schema_post_types', array( 'post','page' ) );
		if( is_singular( $post_types ) ) {
      $needed = false;
      //taq rating plugin
			$rating = get_post_meta( $this->context->id, 'taq_review_score', false);
			if( $rating ) {
				$needed = true;
			}elseif (apply_filters( 'tim_schema_review_needed',false,$this->context)) {
				$needed = true;
      }
      
      return $needed;
		}
		return false;
	}

	/**
	 * Adds our Review piece of the graph.
	 *
	 * @return array $graph Review markup
	 */
	public function generate() {
		$post          = get_post( $this->context->id );

		$data          = array(
			'@type'            => 'Review',
			'@id'              => $this->context->canonical . '#product-review',
			'isPartOf'         => array( '@id' => $this->context->canonical . Schema_IDs::ARTICLE_HASH ),
			'itemReviewed'     => array(
					'@type'    => 'Product',
          'review' =>  array(
              '@id' => $this->context->canonical . Schema_IDs::WEBPAGE_HASH,
          ),
//					'image'    => array(
//						'@id'  => $this->context->canonical . Schema_IDs::PRIMARY_IMAGE_HASH,
//					),
					'name'     => wp_strip_all_tags( $this->get_review_meta( 'name', get_the_title() ) ),
			),
			'reviewRating'     => array(
				'@type'        => 'Rating',
				'ratingValue'  => esc_attr( $this->get_review_meta( 'rating', 1 ) ),
				'worstRating' => '0',
				'bestRating' => '5',
			),
			'name'         => wp_strip_all_tags( $this->get_review_meta( 'name', get_the_title() ) ),
			'description' => wp_strip_all_tags( $this->get_review_meta( 'summary', get_the_excerpt( $post ) ) ),
//			'reviewBody'  => wp_kses_post( $this->get_review_meta( 'body', $post->post_content ) ),
			'author'           => array(
				'@id'  => get_author_posts_url( get_the_author_meta( 'ID' ) ),
				'name' => get_the_author_meta( 'display_name', $post->post_author ),
			),
			'publisher'        => array( '@id' => $this->get_publisher_url() ),
			'datePublished'    => mysql2date( DATE_W3C, $post->post_date_gmt, false ),
			'dateModified'     => mysql2date( DATE_W3C, $post->post_modified_gmt, false ),
			'mainEntityOfPage' => $this->context->canonical . Schema_IDs::WEBPAGE_HASH,
		);
		$data = apply_filters( 'tim_schema_review_data', $data, $this->context );

		return $data;
	}

	/**
	 * Determine the proper publisher URL.
	 *
	 * @return string
	 */
	private function get_publisher_url() {
		if ( $this->context->site_represents === 'person' ) {
			return $this->context->site_url . Schema_IDs::PERSON_HASH;
		}

		return $this->context->site_url . Schema_IDs::ORGANIZATION_HASH;
	}

	/**
	 * Product review meta
	 *
	 * @param string $key
	 * @param string $fallback
	 * @return string $meta
	 */
	private function get_review_meta( $key = false, $fallback = false ) {
    if($key == 'rating'){
      $meta = get_post_meta( $this->context->id, 'taq_review_score', true );
      if(empty($meta)){
        $meta = get_post_meta( $this->context->id, 'tim_schema_review_meta_' . $key, true );
      }else{
        $meta = round(((float) $meta)/20,2);
      }
    }else{
      $meta = get_post_meta( $this->context->id, 'tim_schema_review_meta_' . $key, true );
    }
		if( empty( $meta ) && !empty( $fallback ) )
			$meta = $fallback;
		return $meta;
	}
}


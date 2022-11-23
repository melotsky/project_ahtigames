<?php
//TIM: schema-review
add_filter( 'wpseo_schema_graph_pieces',
  function ( $pieces, $context ) {
    require_once( dirname(__FILE__) . '/classes/tim-schema-review.php');
    $pieces[] = new TIM_Schema_Review( $context );
    return $pieces;
  }
, 20, 2 );
add_filter('tim_schema_review_needed',function(){
  global $post;
  return (int)$post->cu_son_api_game_id > 0;
});
add_filter("get_post_metadata", function($data, $object_id, $meta_key){
  global $post;
  if($meta_key == 'tim_schema_review_meta_rating'){
    $gameId = (int)$post->cu_son_api_game_id;
    $gameMobileId = (int)$post->cu_son_api_mobile_game_id;
    
    $data = cumuli\son_api\Main::getInstance()->data;

    if($gameId>0){
      $params['internal_game_id'] = $gameId;
      $params['listfull'] = true;
      $games = $data->getGames($params,1);
      $game = $games[0]?? false;
      if($game){
        return $game->ratingValue;
      }
    }
    if($gameMobileId>0){
      $params['internal_game_id'] = $gameMobileId;
      $params['listfull'] = true;
      $games = $data->getGames($params,1);
      $gameMobile = $games[0]?? false;
      if($gameMobile){
        return $gameMobile->ratingValue;
      }
    }

  }
  return $data;
},20,3);

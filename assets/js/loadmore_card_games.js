jQuery(function($){
    jQuery('#cg_cpt_loadmore').click(function(){
      var button = jQuery(this),
          currentPaged = parseInt(button.attr('data-current-paged')),
          maxNumPage = parseInt(button.attr('data-max-num-page')),
          dataPosts = { 
            'action' : 'THE_PARAMETER_CG',
            'paged' : currentPaged,
            'posts_per_page' : button.attr('data-posts-per-page')
          };
  
      jQuery.ajax({
        url : THE_PARAMETER_CG_params.ajaxurl,
        data : dataPosts,
        type : 'POST',
        beforeSend : function ( xhr ) {
          //button.text('Indlæser...');
          jQuery('#cg_preLoader').prepend('<div class="loader">Indlæser...</div>')
        },
        success : function( data ){
          if( data ) {
            //button.text('Vis flere referencer');
            jQuery('#cg_preLoader .loader').remove();
            jQuery('#card_games .item-wrapper').append(data);
  
            currentPaged++;
            button.attr('data-current-paged', currentPaged);
  
            if( currentPaged == maxNumPage ) {
              //button.text('Alle lastet').attr('disabled', 'true');
              button.remove();
              jQuery('#cg_preLoader .loader').remove();
            }
  
          } else {
            //button.text('Alle er vist').attr('disabled', 'true');
            button.remove();
            jQuery('#cg_preLoader .loader').remove();
          }
        }
      });
    });
  });
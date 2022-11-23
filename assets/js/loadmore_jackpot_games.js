jQuery(function($){
    jQuery('#jg_cpt_loadmore').click(function(){
      var button = jQuery(this),
          currentPaged = parseInt(button.attr('data-current-paged')),
          maxNumPage = parseInt(button.attr('data-max-num-page')),
          dataPosts = { 
            'action' : 'THE_PARAMETER_JG',
            'paged' : currentPaged,
            'posts_per_page' : button.attr('data-posts-per-page')
          };
  
      jQuery.ajax({
        url : THE_PARAMETER_JG_params.ajaxurl,
        data : dataPosts,
        type : 'POST',
        beforeSend : function ( xhr ) {
          //button.text('Indlæser...');
          jQuery('#jg_preLoader').prepend('<div class="loader">Indlæser...</div>')
        },
        success : function( data ){
          if( data ) {
            //button.text('Vis flere referencer');
            jQuery('#jg_preLoader .loader').remove();
            jQuery('#jackpot_games .item-wrapper').append(data);
  
            currentPaged++;
            button.attr('data-current-paged', currentPaged);
  
            if( currentPaged == maxNumPage ) {
              //button.text('Alle lastet').attr('disabled', 'true');
              button.remove();
              jQuery('#jg_preLoader .loader').remove();
            }
  
          } else {
            //button.text('Alle er vist').attr('disabled', 'true');
            button.remove();
            jQuery('#jg_preLoader .loader').remove();
          }
        }
      });
    });
  });
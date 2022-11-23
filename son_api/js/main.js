CU_SON_API = {
  init_timeouted:function(){
    this.prototype.init_timeouted();
    // listener for cleanup modal
    window.addEventListener('html5lightbox.lightboxclosed',()=>jQuery('#game-fun-lightbox').html(''));
    window.addEventListener('html5lightbox.lightboxclosed',()=>jQuery('body').removeClass('withsearch'));

    //load cookie alert
    var link = '';
    switch(CU_SON_API.params.slug_lang){
     case 'fi':
       link='/link-in-fi';
     defult:
       link='/link-in-en';
    }
    this.widgets_dataCallback('CookieAlert',function(response){
      if(response.script !== undefined){
        eval(response.script);
      }
    },{
      message:'cookie_alert_message',
      link:'cookie_alert_link'
    });

  },
  init:function(){
    this.prototype.init();
    // init son proxy script
    if(window.SON_CONFIG === undefined){
      this.initSonProxy();
    }

    // gtm temporary fix
    window.dataLayer = [{
        "customerId": "",
        "accountId": "",
        "userCity": "",
        "userPostCode": "",
        "userCountry": window.SON_CONFIG.country,
        "userAge": "",
        "userGender": "",
        "accountBlanance": "",
        "accountCurrency": "",
        "accountTopupAmount": "",
        "visitSection": "",
        "visitSubSection": "",
        "affiliateName": window.SON_CONFIG.affiliate,
        "dynamicId": window.SON_CONFIG.dynid,
        "zoneId": window.SON_CONFIG.zoneid,
        "skin": window.SON_CONFIG.skin
    }];
    // Define Data Layer Push Function
    if(window.dataLayerPush === undefined){
      window.dataLayerPush = function(data) {
          if(typeof(dataLayer) != 'undefined') {
              dataLayer.push(data);
          }
      }
    }

    //open search
    jQuery('#masterHeader .search__d').on( "click", function(e) {
      e.preventDefault();
      console.log('searchCllick');
      CU_SON_API.widgets_openModal('Search');
      jQuery('body').addClass('withsearch');
      setTimeout( function(){
        jQuery('#global-searh-input').focus();
    }, 2000); //1 second
    });

    //open search game for desktop
    jQuery('.sd__icon').on( "click", function(e) {
        e.preventDefault();
        console.log('searchCllick');
        CU_SON_API.widgets_openModal('Search');
        jQuery('body').addClass('withsearch');
        setTimeout( function(){
            jQuery('#global-searh-input').focus();
        }, 2000); //2 second
    });

    //Pelit daily timer back
    jQuery(document).on ('cu_son_api.daily-jackpot_update', (e, d)=>jQuery('#the_group_pelit_desktop_info .s__2 .c__child2').html(d.h+':'+d.m) );
    jQuery(document).on ('cu_son_api.daily-jackpot_update', (e, d)=>jQuery('.timerko').html(d.h+':'+d.m) );

     //daily jacpot callback
    this.callback_jackpot(
      function(jackpot){
        console.log(jackpot);
        var theJackpot = jackpot.toLocaleString();
        jQuery('.has-text-align-center.ahti_hp__block3__price span').html(jackpot.toLocaleString());
        jQuery('.jackpot_pelit > span').html(jackpot.toLocaleString());
        //jQuery('.jackpot_sb_2').html(theJackpot);
    });


    //daily jacpot callback pelit nav desktop
    this.callback_jackpot(
       function(jackpot){
          console.log(jackpot);
          var theJackpot = jackpot.toLocaleString();
          //jQuery('.jackpot_pelitnav > span > span').html(jackpot.toLocaleString());
          //jQuery('.jackpot_pelit > span').html(jackpot.toLocaleString());
          //jQuery('.jackpot_pelitnav > span > span').html(theJackpot);
    });

    //JackpotDAILY
    this.callback_jackpotDaily(
        function(jackpotDaily){
          console.log(jackpotDaily);
          var theJackpot = jackpotDaily.toLocaleString();
          jQuery('#dailyjp_numbers span').html(jackpotDaily.toLocaleString());
          jQuery('.djackpot_pelit > span').html(jackpotDaily.toLocaleString());
          //jQuery('.dailyjackpot_sb_2').html(theJackpot);
    });

    //JackpotDAILY DESKTOP
    this.callback_jackpotDaily(
        function(jackpotDaily){
          console.log(jackpotDaily);
          var jackpotDaily = jackpotDaily.toLocaleString();
        //   jQuery('#dailyjp_numbers span').html(jackpotDaily.toLocaleString());
        //   jQuery('.djackpot_pelit > span').html(jackpotDaily.toLocaleString());
          //jQuery('.jackpotdaily_pelitnav > span > span').html(jackpotDaily);
    });

   //total games header
   this.calback_gamesAmount((c) =>jQuery('#search__desktop span:nth-child(2)').text(c))
  },
  openModalHtml:function(html){
    jQuery('#game-fun-lightbox').html(html);
    html5Lightbox.showLightbox(10,'#game-fun-lightbox');
  },

  game_modalFunUrl:function(funUrl, btn){
    this.openModalHtml('<iframe class="game-frame" src="'+funUrl+'"></iframe>"'+btn);
  },

  initSonProxy: function(){
    window.SON_CONFIG = {
      "skin":"AHTIGames",
      "license":"MT",
      "family":"AHTIGames",
      "abbrev":"ahti",
      "country":"FI",
      "domain":"ahtigames.com",
      "device":"desktop",
      "browser":"Chrome",
      "lang":"fi",
      "lang_id":16,
      "segments":["fi","fi-fi"],
      "affiliate":"house_ahti0121",
      "dynid":"no_zone",
      "zoneid":"none"
    };
    (function(){
      var s1 = document.createElement("script"),
      s0 = document.getElementsByTagName("script")[0];
      s1.async = true;
      s1.src = 'https://service.image-tech-storage.com/webcomponents/webcomponents.js?v='+(new Date).getTime();
      s0.parentNode.insertBefore(s1, s0);
    })();
  }

}

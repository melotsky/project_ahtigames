// Custom Scripts

jQuery(document).ready(function ($) {
  jQuery('html[lang="de-DE"] #footer_lang_switcher').remove();
  jQuery('html[lang="de-DE"] #lang_switcher_mobile').css({
    visibility: "hidden !important",
    opacity: "0",
  });
  jQuery('html[lang="de-DE"] #lsd_current_lang_mobile').css(
    "cursor",
    "default"
  );
  jQuery('html[lang="de-DE"] #lsd_dplang_mobile').remove();

  jQuery('a[href$=".pdf"]').prop("target", "_blank");

  setTimeout(function () {
    jQuery(".cc_message > a").prop("rel", "nofollow");
  }, 11000); //3 seconds

  setTimeout(function () {
    jQuery(".cc_message > a").prop("rel", "nofollow");
  }, 15000); //3 seconds

  setTimeout(function () {
    jQuery(".cc_message > a").prop("rel", "nofollow");
  }, 20000); //3 seconds

  // FOR EVERLIGHT PLUGIN ONLY USE WHEN THERE IS ONLY I SINGLE IMAGE ON SLIDER OF EVERLIGHT BOX
  jQuery("#WRAPPER .everlightbox-trigger").mouseup(function () {
    /* alert("The paragraph was clicked."); */
    setTimeout(function () {
      var targetParentId = document.getElementById("everlightbox-slider");
      var targetChildElement = targetParentId.getElementsByClassName("slide");
      var theLength = targetChildElement.length;

      if (theLength == 1) {
        jQuery("#everlightbox-prev").remove();
        jQuery("#everlightbox-next").remove();
      }
    }, 10); //3 seconds
  });

  var faqs = jQuery(
    ".wp-block-yoast-faq-block > .schema-faq-section > .schema-faq-answer"
  ).hide();

  jQuery(
    ".wp-block-yoast-faq-block > .schema-faq-section > .schema-faq-question"
  ).click(function () {
    $this = jQuery(this);
    $target = $this.next();
    $btn = $this;

    if (!$target.hasClass("active")) {
      faqs.removeClass("active").slideUp();
      jQuery(".wp-block-yoast-faq-block .aktibo").removeClass("aktibo");
      $btn.addClass("aktibo");
      $target.addClass("active").slideDown();
    } else if (jQuery(this).hasClass("aktibo")) {
      jQuery(this).removeClass("aktibo");
      faqs.removeClass("active").slideUp();
    }

    return false;
  });
});

jQuery("#backtotop").click(function () {
  jQuery("html, body").animate({ scrollTop: 0 }, 1000);
});

jQuery(window).scroll(function () {
  //FADE EFFECT FOR THE BUTTON BACKTOTOP FADE IN FADE OUT
  var scroll = jQuery(window).scrollTop();
  if (scroll >= 200) {
    jQuery("#backtotop").fadeIn("fast");
  } else {
    jQuery("#backtotop").fadeOut("fast");
  }

  //THIS IS FOR STICKY HEADER ADD STICKY CLASS ON BODY TAG ON SCROLL DEPENDS ON THE SIZE
  // change the 50 into value you like eg: 300
  if (jQuery(this).scrollTop() > 10) {
    jQuery("body").addClass("sticky");
  } else {
    jQuery("body").removeClass("sticky");
  }
});

// A FUNCTION THAT WILL COPY THE TEXT INSIDE OF THE TARGET TAG

function copyToClipboard(element) {
  var $temp = jQuery("<input>");
  jQuery("body").append($temp);
  $temp.val(jQuery(element).html()).select();
  document.execCommand("copy");
  $temp.remove();
}

jQuery("ul.tabs").each(function () {
  // For each set of tabs, we want to keep track of
  // which tab is active and its associated content
  var $active,
    $content,
    $links = jQuery(this).find("a");

  // If the location.hash matches one of the links, use that as the active tab.
  // If no match is found, use the first link as the initial active tab.
  $active = jQuery(
    $links.filter('[href="' + location.hash + '"]')[0] || $links[0]
  );
  $active.addClass("active");

  $content = jQuery($active[0].hash);

  // Hide the remaining content
  $links.not($active).each(function () {
    jQuery(this.hash).hide();
  });

  // Bind the click event handler
  jQuery(this).on("click", "a", function (e) {
    // Make the old tab inactive.
    $active.removeClass("active");
    $content.hide();

    // Update the variables with the new link and content
    $active = jQuery(this);
    $content = jQuery(this.hash);

    // Make the tab active.
    $active.addClass("active");
    $content.show();
    jQuery("#flipper").toggleClass("stat");
    jQuery("#panel").slideToggle();

    // Prevent the anchor's default click action
    e.preventDefault();
  });
});

HTMLImageElement.prototype.isLoaded = function () {
  // See if "naturalWidth" and "naturalHeight" properties are available.
  if (
    typeof this.naturalWidth == "number" &&
    typeof this.naturalHeight == "number"
  )
    return !(this.naturalWidth == 0 && this.naturalHeight == 0);
  // See if "complete" property is available.
  else if (typeof this.complete == "boolean") return this.complete;
  // Fallback behavior: return TRUE.
  else return true;
};

//EG: <span id="banner_id_2" onclick="copyToClipboard('#banner_id_2')">yYyYyY</span>

//FOR WOW ANIMATION.. ANIMATING ELEMENTS
//ENABLE THE WOW JS IN JS LOADER.PHP FIRST
new WOW().init();
//wow = new WOW({mobile: false })
//wow.init();

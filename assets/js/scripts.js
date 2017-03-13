jQuery(function ($) {
    
    $(document).foundation(); // Zurb Foundation
    
    $(window).load(function() {
        $("html").removeClass("no-js");
        $("body").removeClass("preload"); // prevents flash of un-transitioned elements with css transitions
        $("#wrapper").removeClass("load-with-js"); // prevents flash of unstyled content and provides a fade on load effect with css
        
        //$document.applyHeight();
        
        /*****STICKY FOOTER*****/
        var footer = $("#footer");
        var pos = footer.position();
        var height = $(window).height();
        height = height - pos.top;
        height = height - footer.outerHeight();
        if (height > 0) {
            footer.css({
                'margin-top': height + 'px'
            });
        }
        
    });
    
    /***** SCROLL HEADER *****/
    if ($("#scrollheader").length) {
        var $env_header_ht = $("#header").css("height");
        $env_header_ht = parseInt($env_header_ht);
        $(window).scroll(function() {
            var $envfromtop = $(this).scrollTop();
            if ($envfromtop > 0) {
                $("#scrollheader").css("display", "block");
            }
            else { $("#scrollheader").css("display", "none"); }
            if ($envfromtop >= $env_header_ht) {
                $("#scrollheader").addClass("scrolled");
            }
            else { $("#scrollheader").removeClass("scrolled"); }
        });
    }
    
    /***** FADE IN CLASS *****/
    $(".fadein").css("opacity", 0);
    $(window).scroll(function() {
        var windowBottom = $(this).scrollTop() + $(this).innerHeight();
        $(".fadein").each(function() {
          /* Check the location of each desired element */
          var objectBottom = $(this).offset().top + $(this).outerHeight();
          /* If the element is completely within bounds of the window, fade it in */
          if (objectBottom < windowBottom) { //object comes into view (scrolling down)
            window.console.log('this!');
            if ($(this).css("opacity")==0) { $(this).fadeTo(500,1); }
          } else { //object goes out of view (scrolling up)
            if ($(this).css("opacity")==1) { $(this).fadeTo(500,0); }
          }
        });
    }).scroll(); //invoke scroll-handler on page-load
    
    /***** RESPONSIVE TABLES *****/
    (function () {
        var headertext = [];
        var headers = document.querySelectorAll("thead");
        var tablebody = document.querySelectorAll("tbody");
        
        for(var i = 0; i < headers.length; i++) {
            headertext[i]=[];
            for (var j = 0, headrow; headrow = headers[i].rows[0].cells[j]; j++) {
              var current = headrow;
              headertext[i].push(current.textContent.replace(/\r?\n|\r/,""));
              }
        } 
        
        if (headers.length > 0) {
            for (var h = 0, tbody; tbody = tablebody[h]; h++) {
                for (var i = 0, row; row = tbody.rows[i]; i++) {
                  for (var j = 0, col; col = row.cells[j]; j++) {
                    col.setAttribute("data-th", headertext[h][j]);
                  } 
                }
            }
        }
    } ());
    
});
jQuery(function($){if($(document).foundation(),$(window).load(function(){$("html").removeClass("no-js"),$("body").removeClass("preload"),$("#wrapper").removeClass("load-with-js");var o=$("#footer"),e=o.position(),s=$(window).height();s-=e.top,s-=o.outerHeight(),s>0&&o.css({"margin-top":s+"px"})}),$("#scrollheader").length){var o=$("#header").css("height");o=parseInt(o),$(window).scroll(function(){var e=$(this).scrollTop();e>0?$("#scrollheader").css("display","block"):$("#scrollheader").css("display","none"),e>=o?$("#scrollheader").addClass("scrolled"):$("#scrollheader").removeClass("scrolled")})}$(".fadein").css("opacity",0),$(window).scroll(function(){var o=$(this).scrollTop()+$(this).innerHeight();$(".fadein").each(function(){var e=$(this).offset().top+$(this).outerHeight();e<o?(window.console.log("this!"),0==$(this).css("opacity")&&$(this).fadeTo(500,1)):1==$(this).css("opacity")&&$(this).fadeTo(500,0)})}).scroll(),function(){for(var o=[],e=document.querySelectorAll("thead"),s=document.querySelectorAll("tbody"),r=0;r<e.length;r++){o[r]=[];for(var t=0,l;l=e[r].rows[0].cells[t];t++){var a=l;o[r].push(a.textContent.replace(/\r?\n|\r/,""))}}if(e.length>0)for(var i=0,c;c=s[i];i++)for(var r=0,n;n=c.rows[r];r++)for(var t=0,d;d=n.cells[t];t++)d.setAttribute("data-th",o[i][t])}()});
(function($){
				
	//cache nav
	var nav = $("#topNav");
	
	//add indicator and hovers to submenu parents
	nav.find("li").each(function() {
		if ($(this).find("ul").length > 0) {

			//show subnav on hover
			$(this).mouseenter(function() {
				$(this).find("ul").stop(true, true).slideDown();
			});
			
			//hide submenus on exit
			$(this).mouseleave(function() {
				$(this).find("ul").stop(true, true).slideUp();
			});
		}
	});
})(jQuery);


$(function(){
	var obj = $("a[rel=ov]");

	obj.bind("mouseover focus mouseout blur",function(){
		var t = $(this);
		var img = t.find(">img");
		var src = img.attr("src");

		src = src.substr(src.lastIndexOf("_"));

		if(src != "_ov.jpg"){
			img.attr("src",img.attr("src").replace(".jpg","_ov.jpg"));
		}else{
			img.attr("src",img.attr("src").replace("_ov.jpg",".jpg"));
		}
	});
});

/* 이미지 롤링 */
$(document).ready(function(){ 
	$("img.rollover").mouseover(function(){ 
	$(this).attr("src",$(this).attr("src").replace(/^(.+)(\.[a-z]+)$/, "$1_ov$2")); 
		}).mouseout(function(){ 
	$(this).attr("src",$(this).attr("src").replace(/^(.+)_ov(\.[a-z]+)$/, "$1$2")); 
	}); 
}); 



var myAnchors=document.getElementsByTagName("A");
function allblur() {
    try{
    	for (i=0;i<myAnchors.length;i++) {
    		myAnchors[i].onfocus=new Function("blur()");
    	}
	}catch(e){}
}
//allblur();
var bii = 0;
function bluring(){
    try{
        if(event.srcElement.tagName=="A"||event.srcElement.tagName=="IMG") document.body.focus();
    }catch(e){}
}
document.onfocusin=bluring;





var ver = 0; // Browser Version
var browser="";
 if(navigator.appName.charAt(0) == "N"){
  if(navigator.userAgent.indexOf("Chrome") != -1){
   ver = getInternetVersion("Chrome");
   browser="C";

  }else if(navigator.userAgent.indexOf("Firefox") != -1){
   ver = getInternetVersion("Firefox");
   browser="F";

  }else if(navigator.userAgent.indexOf("Safari") != -1){
   ver = getInternetVersion("Safari");
   browser="S";
  }
 }else if(navigator.appName.charAt(0) == "M"){
  ver = getInternetVersion("MSIE");
  browser="M";

  if (ver < "7"){
   alert("Please update to Internet Explorer version 7.0 or later.");
  }
 }
function getInternetVersion(ver) {
 var rv = -1; // Return value assumes failure.
 var ua = navigator.userAgent;
 var re = null;

 if(ver == "MSIE"){
  re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
 }else{
  re = new RegExp(ver+"/([0-9]{1,}[\.0-9]{0,})");
 }

 if (re.exec(ua) != null){
  rv = parseFloat(RegExp.$1);
 }
 return rv;
}


/******************tab**********************/

function initTabMenu(tabContainerID) {
	var tabContainer = document.getElementById(tabContainerID);
	var tabAnchor = tabContainer.getElementsByTagName("a");
	var i = 0;

	for(i=0; i<tabAnchor.length; i++) {
		if (tabAnchor.item(i).className == "tab")
			thismenu = tabAnchor.item(i);
		else
			continue;

		thismenu.container = tabContainer;
		thismenu.targetEl = document.getElementById(tabAnchor.item(i).href.split("#")[1]);
		thismenu.targetEl.style.display = "none";
		thismenu.imgEl = thismenu.getElementsByTagName("img").item(0);
		thismenu.onmouseover = function tabMenuClick() {
			currentmenu = this.container.current;
			if (currentmenu == this)
				return false;

			if (currentmenu) {
				currentmenu.targetEl.style.display = "none";
				if (currentmenu.imgEl) {
					currentmenu.imgEl.src = currentmenu.imgEl.src.replace("_ov.png", ".png");
				} else {
					currentmenu.className = currentmenu.className.replace(" ov", "");
				}
			}
			this.targetEl.style.display = "";
			if (this.imgEl) {
				this.imgEl.src = this.imgEl.src.replace(".png", "_ov.png");
			} else {
				this.className += " ov";
			}
			this.container.current = this;

			return false;
		};

		if (!thismenu.container.first)
			thismenu.container.first = thismenu;
	}
	if (tabContainer.first)
		tabContainer.first.onmouseover();
}


/************************************FAQ**********************************************************/
jQuery(function($){
	// Frequently Asked Question
	var article = $('.faq>.faqBody>.article');
	article.addClass('hide');
	article.find('.a').hide();
	//article.eq(0).removeClass('hide');
	//article.eq(0).find('.a').show();
	$('.faq>.faqBody>.article>.q>a').click(function(){
		var myArticle = $(this).parents('.article:first');
		if(myArticle.hasClass('hide')){
			article.addClass('hide').removeClass('show');
			article.find('.a').slideUp(100);
			article.find('a').removeClass("on");

			myArticle.removeClass('hide').addClass('show');
			myArticle.find('.a').slideDown(100);
			myArticle.find('a').addClass("on");

		} else {
			myArticle.removeClass('show').addClass('hide');
			myArticle.find('.a').slideUp(100);
			myArticle.find('a').removeClass("on");
		}
		return false;
	});
	$('.faq>.faqHeader>.showAll').click(function(){
		var hidden = $('.faq>.faqBody>.article.hide').length;
		if(hidden > 0){
			article.removeClass('hide').addClass('show');
			article.find('.a').slideDown(100);
		} else {
			article.removeClass('show').addClass('hide');
			article.find('.a').slideUp(100);
		}
	});
});
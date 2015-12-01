$(function() {
	/* OPTIONS */
	var parentTags = "menu > li";
	var childTags = "ul.submenu" 
	var childContainer = "li";
	var timeFadeIn = 300;
	var timeFadeOut = 300;
	var timeDelay = 1000;
	var disabledLinksWithChild = 1;
	/* END OPTIONS */
	
	var thisSubMenu;
	var timerHideSubMenu;
	
	$(parentTags+' a').click(function() {
		if ($(this).next(childTags).length>=1 && disabledLinksWithChild) {
			return false;
		}
	});
	$(parentTags).hover(function() {
		if ($(this).children(childTags).length>=1) {	
			
			$(parentTags).each(function() {
				if ($(this).children(childTags).length>=1) {	
					$(this).children(childTags).fadeOut(timeFadeOut);
				}
			})
			$(this).addClass("hover");
			clearTimeout(timerHideSubMenu);
			thisSubMenu=$(this).children(childTags);	
			if ($(this).children(childTags).css('display')=='none') {
				$(this).children(childTags).fadeIn(timeFadeIn);
			}
		}
	}, function() {
		if ($(this).children(childTags).length>=1) {	
			clearTimeout(timerHideSubMenu);
			timerHideSubMenu=setTimeout(function() {
				thisSubMenu.fadeOut(timeFadeOut);
				thisSubMenu.parent(childContainer).removeClass("hover");

			}, timeDelay);	
		}	
	})
	$(parentTags+' '+childTags).hover(function() {
		clearTimeout(timerHideSubMenu);
	},function() {
		clearTimeout(timerHideSubMenu);
		timerHideSubMenu=setTimeout(function() {
			thisSubMenu.fadeOut(timeFadeOut)
			thisSubMenu.parent(childContainer).removeClass("hover");
		}, timeDelay);
	})
	
})	
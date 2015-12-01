/************** USING EXAMPLE *************/
/*

<a href="#feedback" class="custompopup">Заказать звонок</a>

<div class="customize-popup-window-container">
	<div class="customize-popup-window">
		<div class="close-custompopup"></div>
		<div id="feedback">
			<? $APPLICATION->IncludeComponent(
		"bitrix:form.result.new",
		"div",
		Array(
			"AJAX_MODE" => "Y",
			"WEB_FORM_ID" => "1",
			"IGNORE_CUSTOM_TEMPLATE" => "N",
			"USE_EXTENDED_ERRORS" => "Y",
			"SEF_MODE" => "Y",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "3600",
			"LIST_URL" => "",
			"EDIT_URL" => "",
			"SUCCESS_URL" => "/success/index.php",
			"CHAIN_ITEM_TEXT" => "",
			"CHAIN_ITEM_LINK" => "",
			"SEF_FOLDER" => "",
			"VARIABLE_ALIASES" => Array(),
			"VARIABLE_ALIASES" => Array(
			)
		)
		);?>
		</div>
	</div>	
</div>	


*/

$(function() {
	initCustomPopup();
});
function initCustomPopup() {
	$('.custompopup').each(function() {
		var thisId = $(this).attr("href").toString();
		var initTimeout;
		var initInterval;
		var initHeight;
		$(this).click(function(e) {
			$('.customize-popup-window-container').bind("click", function() {
				$(thisId).closest('.customize-popup-window-container').fadeOut(200);
			});
			$(thisId).closest('.customize-popup-window-container').fadeIn(200);
			initHeight = $(thisId).height()*1 + $(thisId).closest('.customize-popup-window').css("paddingTop").toString().replace("px", "")*1 + $(thisId).closest('.customize-popup-window').css("paddingBottom").toString().replace("px", "")*1;
			initSizeCustomPopup(thisId, initHeight);
			e.preventDefault();
			
			$(thisId).closest('.customize-popup-window-container').find(".close-custompopup").click(function() {
				$(thisId).closest('.customize-popup-window-container').fadeOut(200);				
				clearInterval(initInterval);
			});
			
			initInterval = setInterval(function() {
				initHeight = $(thisId).height()*1 + $(thisId).closest('.customize-popup-window').css("paddingTop").toString().replace("px", "")*1 + $(thisId).closest('.customize-popup-window').css("paddingBottom").toString().replace("px", "")*1;	
				initSizeCustomPopup(thisId, initHeight);
			}, 100);
			
		});
		
		
		
		
		$(window).resize(function() {
			clearTimeout(initTimeout);
			initTimeout = setTimeout(function() {
				if ($(thisId).closest('.customize-popup-window-container').css("display")!="none") {
					initSizeCustomPopup(thisId, initHeight);
				}
			}, 50);
		});
		
		$('.customize-popup-window').hover(function() {
			$('.customize-popup-window-container').unbind("click");
		}, function() {
			$('.customize-popup-window-container').bind("click", function() {
				clearInterval(initInterval);
				$(thisId).closest('.customize-popup-window-container').fadeOut(200);
			});
		})
	});
}

function initSizeCustomPopup(id, initHeight) {
	var wHeight = $(window).height();
	var topOffset = ((wHeight*1 - initHeight)/2);
	
	if (topOffset>=0) {	
		$(id).closest('.customize-popup-window').css({
			marginTop: topOffset,
			height: initHeight,
			overflowY: "visible"
		});
	} else {
		$(id).closest('.customize-popup-window').css({
			marginTop:0,
			height:wHeight,
			overflowY: "scroll"
		});
		
	}
}
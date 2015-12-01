$(function() {
	/*$(".flat-list-reserve-link,.reservebutton").each(function() {
		$(this).bind("click", function() {
			var container = $(this).closest("li");
			if (container.length==1) {
				var street = container.find(".flat-list-street").text();
				var cost = container.find(".flat-list-cost").text();
			} else if ($(this).closest(".flat-info-overlay").length==1) {
				container = $(this).closest(".flat-info-overlay");
				var street = container.find("#flatInfoStreet").text();
				var cost = container.find(".flat-info-cost").text();
			} else {
				container = $(this).closest(".flat-list-ny-row");
				var street = container.find(".flat-list-ny-street").text();
				var cost = container.find(".flat-list-ny-cost").text();				
			}
			var flatInfo = street+' за '+cost;
			flatInfo = flatInfo.replace(/\n/g, '');
			flatInfo = flatInfo.replace(/	/g, '');
			$("#formreserve").find('input[name="flatinfo"]').val(flatInfo);
		});
	});*/
    
    	$('.flat-order').click(function(){
		var flatInfo = $(this).closest(".flat-detail").find(".flat-address-title").text();
			flatInfo = flatInfo.replace(/\n/g, '');
			flatInfo = flatInfo.replace(/	/g, '');
			flatInfo = flatInfo.replace(/  /g, '');
		$("#flatinfo").val(flatInfo);
	});
    
	$('.item-order').click(function(){
		var flatInfo = $(this).closest(".item").find(".item-address").text();
			flatInfo = flatInfo.replace(/\n/g, '');
			flatInfo = flatInfo.replace(/	/g, '');
			flatInfo = flatInfo.replace(/  /g, '');
		$("#flatinfo").val(flatInfo);
	});

    	$("#reserveformbottom").submit(function(event) {
        var flatInfo = '';
        var sysmsg = $(this).closest(".bookingformbottom").find(".sys-msg");
        var successmsg = $(this).closest(".bookingformbottom").find(".success");
        var errormsg = $(this).closest(".bookingformbottom").find(".err");
        var contentbox = $(this).closest(".bookingformbottom").find(".booking-form-content");
            if ($(".flat-address-title").length>0) {
            var flatInfo = '&flatinfo='+$(".flat-address-title").text();
            }
		sysmsg.fadeOut(100);
		if ($(this).find("#check").length==0) {
			$(this).prepend('<input type="hidden" name="check" value="nospam" id="check">');
		}
		var vars = $(this).serialize();
		$.ajax({
			url:"/",
			type: "POST",
			data: vars+flatInfo+'&reserve=bottomajaxtype',
			dataType: "json",
			success: function(result) {
				if (result.code=="success") {
					successmsg.fadeIn(100);
					contentbox.fadeOut(0);
					}
				if (result.code=="empty")
					errormsg.fadeIn(100);
			}
		});		
		return false;
	});
    
	$("#reserveform").submit(function(event) {
        var sysmsg = $(this).closest(".bookingform").find(".sys-msg");
        var successmsg = $(this).closest(".bookingform").find(".success");
        var errormsg = $(this).closest(".bookingform").find(".err");
        var contentbox = $(this).closest(".bookingform").find(".booking-form-content");
		sysmsg.fadeOut(100);
		if ($(this).find("#check").length==0) {
			$(this).prepend('<input type="hidden" name="check" value="nospam" id="check">');
		}
		var vars = $(this).serialize();
		$.ajax({
			url:"/",
			type: "POST",
			data: vars+'&reserve=ajaxtype',
			dataType: "json",
			success: function(result) {
				if (result.code=="success") {
					successmsg.fadeIn(100);
					contentbox.fadeOut(0);
					}
				if (result.code=="empty")
					errormsg.fadeIn(100);
			}
		});		
		return false;
	});
});
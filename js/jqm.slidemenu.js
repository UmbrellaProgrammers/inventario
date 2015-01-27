$(document).on("pageinit", function(e) {

    $("#" + $(e.target).attr('id') + " :jqmData(slidemenu)").addClass('slidemenu_btn');
    var sm = $($("#" + $(e.target).attr('id') + " :jqmData(slidemenu)").data('slidemenu'));
    sm.addClass('slidemenu');

    $(document).on("swipeleft swiperight", ".ui-page-active", function(e) {
        console.log('b');
        e.stopImmediatePropagation();
        e.preventDefault();
        slidemenu(sm, sm.data('slideopen'));
    });

    $(document).on("click", ".ui-page-active :jqmData(slidemenu)", function(e) {
        $('#li_panel').addClass("active");
        slidemenu(sm, sm.data('slideopen'));
        e.stopImmediatePropagation();
        e.preventDefault();
    });

    $(window).on('resize', function(e) {
        if (sm.data('slideopen')) {
            sm.css('top', getPageScroll()[1] + 'px');
            sm.css('width', '240px');
            sm.height(viewport().height);
            $(":jqmData(role='page')").css('left', '240px');
        }
    });

    $(window).scroll(function() {
        if (sm.data('slideopen')) {
            sm.css('top', getPageScroll()[1] + 'px');
        }
    });

});

function slidemenu(sm, only_close) {
    sm.height(viewport().height);
	$('#activos').css({"display":"none"});
    if (!sm.data('slideopen') && !only_close) {
        sm.show().animate({width: '240px', avoidTransforms: false, useTranslate3d: true}, 'fast');
        $(".ui-page-active").css('left', '240px');
        sm.data('slideopen', true);
        if ($(".ui-page-active :jqmData(role='header')").data('position') == 'fixed') {
            $(".ui-page-active :jqmData(slidemenu)").css('margin-left', '240px');
        } else {
            $(".ui-page-active :jqmData(slidemenu)").css('margin-left', '10px');
        }
		if($('#b_activos').hasClass("active_activos")){
			$('#img_edit').css({"margin":"0px 30px 0px 24.75%"});
			$('#img_notes').css({"margin":"10px 0px 0px 280px"});
			$('#activos').css({"display":"block"});
		}
    } else {
        sm.animate({width: '0px', avoidTransforms: false, useTranslate3d: true}, 'fast', function() {
            sm.hide()
        });
        $(".ui-page-active").css('left', '0px');
        sm.data('slideopen', false);
        $(".ui-page-active :jqmData(slidemenu)").css('margin-left', '0px');
        $('#li_panel').removeClass("active");
		$('#img_edit').css({"margin":"0px 30px 0px 42%"});
		$('#img_notes').css({"margin":"10px 0px 0px 10px"});
		$('#activos').css({"display":"none"});
    }
    return false;
}

function viewport() {
    var e = window;
    var a = 'inner';
    if (!('innerWidth' in window)) {
        a = 'client';
        e = document.documentElement || document.body;
    }
    return {width: e[ a + 'Width' ], height: e[ a + 'Height' ]}
}

function getPageScroll() {
    var xScroll, yScroll;
    if (self.pageYOffset) {
        yScroll = self.pageYOffset;
        xScroll = self.pageXOffset;
    } else if (document.documentElement && document.documentElement.scrollTop) {
        yScroll = document.documentElement.scrollTop;
        xScroll = document.documentElement.scrollLeft;
    } else if (document.body) {// all other Explorers
        yScroll = document.body.scrollTop;
        xScroll = document.body.scrollLeft;
    }
    return new Array(xScroll, yScroll)
}
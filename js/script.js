(function($) {
    $(document).ready(function() {
        $('#cssmenu').prepend('<div id="bg-one"></div><div id="bg-two"></div><div id="bg-three"></div><div id="bg-four"></div>');
    });
})(jQuery);

function menu(n) {
    if (n == 0) {
        $('#li_home').addClass("active");
        $('#li_item').removeClass("active");
        $('#li_reports').removeClass("active");
        javascript:document.getElementById('frame').src = 'home/home.php';
    } else if (n == 1) {
        $('#li_item').addClass("active");
        $('#li_home').removeClass("active");
        $('#li_reports').removeClass("active");
        javascript:document.getElementById('frame').src = 'item/item.php';
    } else if (n == 2) {
        $('#li_reports').addClass("active")
        $('#li_item').removeClass("active");
        $('#li_home').removeClass("active");
    }
}

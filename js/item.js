function menu2(aux) {
    if (aux == 0) {
        $('#li_info').addClass("active");
        $('#li_archi').removeClass("active");
    } else if (aux == 1) {
        $('#li_info').removeClass("active");
        $('#li_archi').addClass("active");
    }
}
/*Search in main menu*/
jQuery(document).ready(function ($) {
    $('.js-toggle-search').on('click', function (event) {
        //show/hide search block
        event.preventDefault();
        var n = (0, $)(".js-site-nav-container"),
            i = (0, $)("#js-nav-search"),
            o = (0, $)("#js-nav-primary"),
            s = (0, $)(".js-header-livesearch").find(".js-search-term"),
            l = 70;

        n.hasClass("site-nav--search-is-visible") ? n.removeClass("site-nav--search-is-visible", i.attr("aria-hidden", "true"), o.attr("aria-hidden", "false"), s.attr("tabindex", "-1"), setTimeout(function () {
            o.find(".js-toggle-search").focus(), (0, $)(".js-searchbar").removeClass("site-nav__item--searchbar--visible")
        }, l)) : (n.addClass("site-nav--search-is-visible"), o.attr("aria-hidden", "true"), i.attr("aria-hidden", "false"), s.attr("tabindex", "0"), setTimeout(function () {
            s.focus(), (0, $)(".js-searchbar").addClass("site-nav__item--searchbar--visible")
        }, l))
    });
});

//function(t) {
//    t.preventDefault();
//    var n = (0, r.default)(".js-site-nav-container"),
//        i = (0, r.default)("#js-nav-search"),
//        o = (0, r.default)("#js-nav-primary"),
//        s = (0, r.default)(".js-header-livesearch").find(".js-search-term"),
//        l = e(i) + 30;
//    n.hasClass("site-nav--search-is-visible") ? (a(), n.removeClass("site-nav--search-is-visible"), i.attr("aria-hidden", "true"), o.attr("aria-hidden", "false"), s.attr("tabindex", "-1"), setTimeout(function() {
//        o.find(".js-toggle-search").focus(), (0, r.default)(".js-searchbar").removeClass("site-nav__item--searchbar--visible")
//    }, l)) : (n.addClass("site-nav--search-is-visible"), o.attr("aria-hidden", "true"), i.attr("aria-hidden", "false"), s.attr("tabindex", "0"), setTimeout(function() {
//        s.focus(), (0, r.default)(".js-searchbar").addClass("site-nav__item--searchbar--visible")
//    }, l))
//}


//t.___hb = function() {
//    var n = v("onerror", !0);
//    if (!(O && (n || e) || e && !n)) return t.apply(this, arguments);
//    try {
//        return t.apply(this, arguments)
//    } catch (t) {
//        throw w(t), t
//    }
//}


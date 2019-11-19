/* 
*	Waves Effect
*
*/

!function (t, e) { "use strict"; "function" == typeof define && define.amd ? define([], function () { return t.Waves = e.call(t), t.Waves }) : "object" == typeof exports ? module.exports = e.call(t) : t.Waves = e.call(t) }("object" == typeof global ? global : this, function () { "use strict"; function t(t) { return null !== t && t === t.window } function e(e) { return t(e) ? e : 9 === e.nodeType && e.defaultView } function n(t) { var e = typeof t; return "function" === e || "object" === e && !!t } function o(t) { return n(t) && t.nodeType > 0 } function a(t) { var e = f.call(t); return "[object String]" === e ? d(t) : n(t) && /^\[object (Array|HTMLCollection|NodeList|Object)\]$/.test(e) && t.hasOwnProperty("length") ? t : o(t) ? [t] : [] } function i(t) { var n, o, a = { top: 0, left: 0 }, i = t && t.ownerDocument; return n = i.documentElement, void 0 !== t.getBoundingClientRect && (a = t.getBoundingClientRect()), o = e(i), { top: a.top + o.pageYOffset - n.clientTop, left: a.left + o.pageXOffset - n.clientLeft } } function r(t) { var e = ""; for (var n in t) t.hasOwnProperty(n) && (e += n + ":" + t[n] + ";"); return e } function s(t, e, n) { if (n) { n.classList.remove("waves-rippling"); var o = n.getAttribute("data-x"), a = n.getAttribute("data-y"), i = n.getAttribute("data-scale"), s = n.getAttribute("data-translate"), u = 350 - (Date.now() - Number(n.getAttribute("data-hold"))); u < 0 && (u = 0), "mousemove" === t.type && (u = 150); var c = "mousemove" === t.type ? 2500 : v.duration; setTimeout(function () { var t = { top: a + "px", left: o + "px", opacity: "0", "-webkit-transition-duration": c + "ms", "-moz-transition-duration": c + "ms", "-o-transition-duration": c + "ms", "transition-duration": c + "ms", "-webkit-transform": i + " " + s, "-moz-transform": i + " " + s, "-ms-transform": i + " " + s, "-o-transform": i + " " + s, transform: i + " " + s }; n.setAttribute("style", r(t)), setTimeout(function () { try { e.removeChild(n) } catch (t) { return !1 } }, c) }, u) } } function u(t) { if (!1 === h.allowEvent(t)) return null; for (var e = null, n = t.target || t.srcElement; n.parentElement;) { if (!(n instanceof SVGElement) && n.classList.contains("waves-effect")) { e = n; break } n = n.parentElement } return e } function c(t) { var e = u(t); if (null !== e) { if (e.disabled || e.getAttribute("disabled") || e.classList.contains("disabled")) return; if (h.registerEvent(t), "touchstart" === t.type && v.delay) { var n = !1, o = setTimeout(function () { o = null, v.show(t, e) }, v.delay), a = function (a) { o && (clearTimeout(o), o = null, v.show(t, e)), n || (n = !0, v.hide(a, e)), r() }, i = function (t) { o && (clearTimeout(o), o = null), a(t), r() }; e.addEventListener("touchmove", i, !1), e.addEventListener("touchend", a, !1), e.addEventListener("touchcancel", a, !1); var r = function () { e.removeEventListener("touchmove", i), e.removeEventListener("touchend", a), e.removeEventListener("touchcancel", a) } } else v.show(t, e), m && (e.addEventListener("touchend", v.hide, !1), e.addEventListener("touchcancel", v.hide, !1)), e.addEventListener("mouseup", v.hide, !1), e.addEventListener("mouseleave", v.hide, !1) } } var l = l || {}, d = document.querySelectorAll.bind(document), f = Object.prototype.toString, m = "ontouchstart" in window, v = { duration: 750, delay: 200, show: function (t, e, n) { if (2 === t.button) return !1; e = e || this; var o = document.createElement("div"); o.className = "waves-ripple waves-rippling", e.appendChild(o); var a = i(e), s = 0, u = 0; "touches" in t && t.touches.length ? (s = t.touches[0].pageY - a.top, u = t.touches[0].pageX - a.left) : (s = t.pageY - a.top, u = t.pageX - a.left), u = u >= 0 ? u : 0, s = s >= 0 ? s : 0; var c = "scale(" + e.clientWidth / 100 * 3 + ")", l = "translate(0,0)"; n && (l = "translate(" + n.x + "px, " + n.y + "px)"), o.setAttribute("data-hold", Date.now()), o.setAttribute("data-x", u), o.setAttribute("data-y", s), o.setAttribute("data-scale", c), o.setAttribute("data-translate", l); var d = { top: s + "px", left: u + "px" }; o.classList.add("waves-notransition"), o.setAttribute("style", r(d)), o.classList.remove("waves-notransition"), d["-webkit-transform"] = c + " " + l, d["-moz-transform"] = c + " " + l, d["-ms-transform"] = c + " " + l, d["-o-transform"] = c + " " + l, d.transform = c + " " + l, d.opacity = "1"; var f = "mousemove" === t.type ? 2500 : v.duration; d["-webkit-transition-duration"] = f + "ms", d["-moz-transition-duration"] = f + "ms", d["-o-transition-duration"] = f + "ms", d["transition-duration"] = f + "ms", o.setAttribute("style", r(d)) }, hide: function (t, e) { for (var n = (e = e || this).getElementsByClassName("waves-rippling"), o = 0, a = n.length; o < a; o++)s(t, e, n[o]); m && (e.removeEventListener("touchend", v.hide), e.removeEventListener("touchcancel", v.hide)), e.removeEventListener("mouseup", v.hide), e.removeEventListener("mouseleave", v.hide) } }, p = { input: function (t) { var e = t.parentNode; if ("i" !== e.tagName.toLowerCase() || !e.classList.contains("waves-effect")) { var n = document.createElement("i"); n.className = t.className + " waves-input-wrapper", t.className = "waves-button-input", e.replaceChild(n, t), n.appendChild(t); var o = window.getComputedStyle(t, null), a = o.color, i = o.backgroundColor; n.setAttribute("style", "color:" + a + ";background:" + i), t.setAttribute("style", "background-color:rgba(0,0,0,0);") } }, img: function (t) { var e = t.parentNode; if ("i" !== e.tagName.toLowerCase() || !e.classList.contains("waves-effect")) { var n = document.createElement("i"); e.replaceChild(n, t), n.appendChild(t) } } }, h = { touches: 0, allowEvent: function (t) { var e = !0; return /^(mousedown|mousemove)$/.test(t.type) && h.touches && (e = !1), e }, registerEvent: function (t) { var e = t.type; "touchstart" === e ? h.touches += 1 : /^(touchend|touchcancel)$/.test(e) && setTimeout(function () { h.touches && (h.touches -= 1) }, 500) } }; return l.init = function (t) { var e = document.body; "duration" in (t = t || {}) && (v.duration = t.duration), "delay" in t && (v.delay = t.delay), m && (e.addEventListener("touchstart", c, !1), e.addEventListener("touchcancel", h.registerEvent, !1), e.addEventListener("touchend", h.registerEvent, !1)), e.addEventListener("mousedown", c, !1) }, l.attach = function (t, e) { t = a(t), "[object Array]" === f.call(e) && (e = e.join(" ")), e = e ? " " + e : ""; for (var n, o, i = 0, r = t.length; i < r; i++)o = (n = t[i]).tagName.toLowerCase(), -1 !== ["input", "img"].indexOf(o) && (p[o](n), n = n.parentElement), -1 === n.className.indexOf("waves-effect") && (n.className += " waves-effect" + e) }, l.ripple = function (t, e) { var n = (t = a(t)).length; if (e = e || {}, e.wait = e.wait || 0, e.position = e.position || null, n) for (var o, r, s, u = {}, c = 0, l = { type: "mousedown", button: 1 }; c < n; c++)if (o = t[c], r = e.position || { x: o.clientWidth / 2, y: o.clientHeight / 2 }, s = i(o), u.x = s.left + r.x, u.y = s.top + r.y, l.pageX = u.x, l.pageY = u.y, v.show(l, o), e.wait >= 0 && null !== e.wait) { var d = { type: "mouseup", button: 1 }; setTimeout(function (t, e) { return function () { v.hide(t, e) } }(d, o), e.wait) } }, l.calm = function (t) { for (var e = { type: "mouseup", button: 1 }, n = 0, o = (t = a(t)).length; n < o; n++)v.hide(e, t[n]) }, l.displayEffect = function (t) { l.init(t) }, l });

$(document).ready(function () {

    //$('#add-meal-plan-week-range').flatpickr();

    Waves.init();

    /*
    *   Chef Sign Up Form
    *
    */

    (function () {
        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function () {
            var active = $('.wizard .nav-tabs li.active');
            if (active.hasClass('cuisine-flag')) {
                var cuisineDropdown = document.querySelector('#cuisine-dropdown').cloneNode(true);
                console.log(cuisineDropdown);
                $('#cuisine-flag').insertBefore(cuisineDropdown);
            }
            active.next().removeClass('disabled');
            $(active).next().find('a[data-toggle="tab"]').click();
        });

        $(".prev-step").click(function () {
            $('.wizard .nav-tabs li.active').prev().find('a[data-toggle="tab"]').click();
        });
    })();

    // var debounceTimer = null,
    //     btnTop = document.querySelector('#btn-scroll-top');

    // window.onscroll = function () {
    //     if (debounceTimer) {
    //         clearTimeout(debounceTimer);
    //     }
    //     var scrollPos = document.documentElement.scrollTop || document.body.scrollTop;
    //     debounceTimer = setTimeout(function () {
    //         if (scrollPos > 300) {
    //             btnTop.classList.add('active');
    //         } else {
    //             btnTop.classList.remove('active');
    //         }
    //     }, 300);
    // };

    // $('#btn-scroll-top').on('click', function () {
    //     $('html, body').animate({
    //         scrollTop: 0
    //     }, 'slow');
    // });

    $('#btnCart').on('click', function () {
        if ($('#menu-right-content').hasClass('is-active')) {
            $('#menu-right-content').removeClass('is-active');
            $('#menu-right-content').hide();
            $('.overlay').fadeIn();
        } else {
            $('#menu-right-content').addClass('is-active');
            $('#menu-right-content').show();
            $('.overlay').fadeIn();
            $('.overlay').click(function () {
                $('#menu-right-content').removeClass('is-active');
                $('.overlay').fadeOut();
            });
        }
    });

    /*
     *   Meal Plan Order Calculation
     *
     */

    let priceTogglers = document.querySelectorAll(".price-toggler"),
        mealOrderPrice = $('#meal-order-price'),
        fieldName,
        type,
        mealTotal = {
            total: parseInt($('#total-meal-plan-price').text()),
            defaultTotal: parseInt($('#total-meal-plan-price').text()),
            updateTotal: function () {
                mealOrderPrice.text('').text(this.total);
            },
            updateDefaultTotal: function () {
                this.defaultTotal = this.total
            }
        };

    priceTogglers.forEach((pt) => {
        pt.addEventListener('change', () => {
            let price = pt.getAttribute('data-price') && parseInt(pt.getAttribute('data-price'));

            pt.checked ?
                mealTotal.total += price
                : mealTotal.total -= price;

            mealTotal.updateTotal();
            mealTotal.updateDefaultTotal();
        });
    });

    /*
    *   Meal Plan Counter
    *
    */

    $('.btn-number').click(function (e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());

        if (!isNaN(currentVal)) {
            if (type === 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                    mealTotal.total -= mealTotal.defaultTotal;
                    mealTotal.updateTotal();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type === 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                    mealTotal.total += mealTotal.defaultTotal;
                    mealTotal.updateTotal();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });

    $('.input-number').focusin(function () {
        $(this).data('oldValue', $(this).val());
    });

    $('.input-number').change(function () {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }
    });


});
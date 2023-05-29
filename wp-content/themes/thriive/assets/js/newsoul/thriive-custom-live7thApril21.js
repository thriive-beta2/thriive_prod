function selectAilment(e) {
    window.location.href = "/ailment/" + e
}
$(document).ready(function() {
    var e = int_number1 = "";
    if ($("#left-side-menu li.menu-item-has-children a").addClass("dropdown-toggle"), $("#left-side-menu li.menu-item-has-children a").attr("data-toggle", "dropdown"), $("#left-side-menu li.menu-item-has-children a").attr("role", "button"), $("#left-side-menu li.menu-item-has-children a").attr("aria-haspopup", "true"), $("#left-side-menu li.menu-item-has-children a").attr("aria-expanded", "false"), $("#left-side-menu li.menu-item-has-children ul").removeClass(), $("#left-side-menu li.menu-item-has-children ul").addClass("dropdown-menu"), $("#left-side-menu li.menu-item-has-children ul li a").removeClass(), $("#left-side-menu li.menu-item-has-children ul li a").addClass("dropdown-item"), $("a.dropdown-item").removeAttr("data-toggle"), $("a.dropdown-item").removeAttr("role"), $("a.dropdown-item").removeAttr("aria-haspopup"), $("a.dropdown-item").removeAttr("aria-expanded"), $(window).width() < 700 ? $(".user-loggedin a.link_profile").click(function(e) {
            e.preventDefault(), $(".user-sub-action-wrapper").toggleClass("active")
        }) : ($(".user-loggedin a.link_profile").click(function(e) {
            e.preventDefault()
        }), $(".user-loggedin").hover(function() {
            $(".user-sub-action-wrapper").show()
        }, function() {
            $(".user-sub-action-wrapper").hide()
        })), $(".international-number").length > 0) {
        var t = document.querySelector(".international-number"),
            a = window.location.protocol + "//" + window.location.host + "/wp-content/themes/thriive/assets/js/utils.js";
        e = intlTelInput(t, {
            initialCountry: "IN",
            separateDialCode: !0,
            utilsScript: a
        })
    }
    if (jQuery(".international-number1").length > 0) {
        t = document.querySelector(".international-number1"), a = window.location.protocol + "//" + window.location.host + "/wp-content/themes/thriive/assets/js/utils.js";
        int_number1 = intlTelInput(t, {
            initialCountry: "IN",
            separateDialCode: !0,
            utilsScript: a
        })
    }
    $(".consult_online_link_oc").unbind("click").click(function(e) {
        e.preventDefault();
        var t = $(this).data("slug"),
            a = $(this).data("therapy"),
            o = $(this).data("from_status"),
            n = $(this).data("remaining"),
            i = $(this).data("sessionid");
        if (clevertap.event.push("Therapist Clicked", {
                "Page Source": window.location.href,
                "Therapist Name": t,
                Action: "Call"
            }), 0 == o) return gtag("event", "click", {
            event_category: "button",
            event_label: "call now clicked - desktop"
        }), $(".modal-body #reg_hide #lead_source").val(a), $(".modal-body #reg_unhide #slug").val(t), $(".modal-body #reg_unhide #action").val("call"), $(".modal-body #reg_unhide #therapy").val(a), $(".modal-body #reg_unhide #payment").val(1), $("#call_with_healer").modal("show"), !1;
        if (1 == o && 1 == n) return $("#" + i).modal("show"), !1;
        var r, l = $(this).attr("id").split("_"),
            s = $("#therapist_" + l[2]).val(),
            c = $("#seeker_" + l[2]).val(),
            d = $(".payment_type").val();
        if (r = d ? "&pt=" + d : "", "" == s || "" == c) return alert("Please try again later!"), !1;
        "tarot-card-reading" == a || "angel-reading" == a || "vastu-shastra" == a || "cosmic-astrology" == a || "numerology" == a ? window.location.replace(window.location.protocol + "//" + window.location.host + "/new-payment-apage?q=" + t + "&a=call&t=" + a + r) : window.location.replace(window.location.protocol + "//" + window.location.host + "/payment-details?q=" + t + "&a=call&t=" + a + r)
    }), $(".start_chat_oc").unbind("click").click(function(e) {
        var t = $("#chat_event").val(),
            a = $(this).data("from_status"),
            o = ($(this).data("to_status"), $(this).data("touserid"), $(this).attr("data-role"), $(this).data("tousername"), $(this).data("fromuserid"), $(this).data("slug")),
            n = $(this).data("therapy"),
            i = $(this).data("remaining"),
            r = $(this).data("sessionid");
        if (clevertap.event.push("Therapist Clicked", {
                "Page Source": window.location.href,
                "Therapist Name": o,
                Action: "Chat"
            }), 0 == a) return gtag("event", "click", {
            event_category: "button",
            event_label: "online - chat now clicked - " + t
        }), $(".modal-body #reg_hide #lead_source").val(n), $(".modal-body #reg_unhide #slug").val(o), $(".modal-body #reg_unhide #action").val("chat"), $(".modal-body #reg_unhide #therapy").val(n), $(".modal-body #reg_unhide #payment").val(1), $("#call_with_healer").modal("show"), !1;
        if (1 == a && 1 == i) return $("#" + r).modal("show"), !1;
        0 != a && gtag("event", "click", {
            event_category: "button",
            event_label: "online - chat now initiated - " + t
        });
        var l, s = $(".payment_type").val();
        l = s ? "&pt=" + s : "", "tarot-card-reading" == n || "angel-reading" == n || "vastu-shastra" == n || "cosmic-astrology" == n || "numerology" == n ? window.location.replace(window.location.protocol + "//" + window.location.host + "/new-payment-apage?q=" + o + "&a=chat&t=" + n + l) : window.location.replace(window.location.protocol + "//" + window.location.host + "/payment-details?q=" + o + "&a=chat&t=" + n + l)
    }), $(".cbook_now_link_oc").unbind("click").click(function(e) {
        e.preventDefault();
        var t = $(this).data("slug"),
            a = $(this).data("therapy"),
            o = $(this).data("from_status");
        if (clevertap.event.push("Therapist Clicked", {
                "Page Source": window.location.href,
                "Therapist Name": t,
                Action: "Book Now"
            }), 0 == o) return gtag("event", "click", {
            event_category: "button",
            event_label: "online - book later clicked - mobile"
        }), $(".modal-body #reg_hide #lead_source").val(a), $(".modal-body #reg_unhide #slug").val(t), $(".modal-body #reg_unhide #action").val("book_later"), $(".modal-body #reg_unhide #therapy").val(a), $(".modal-body #reg_unhide #payment").val(1), $("#call_with_healer").modal("show"), !1;
        var n, i = $(this).attr("id").split("_"),
            r = $("#therapist_" + i[2]).val(),
            l = $("#seeker_" + i[2]).val(),
            s = $(".payment_type").val();
        if (n = s ? "&pt=" + s : "", "" == r || "" == l) return alert("Please try again later!"), !1;
        window.location.replace(window.location.protocol + "//" + window.location.host + "/therapist-call-chat-video-page?q=" + t + "&a=book_later&t=" + a + n)
    }), $(".book_now_link_oc").unbind("click").click(function(e) {
        e.preventDefault();
        var t = $(this).data("slug"),
            a = ($(this).data("action"), $(this).data("therapy")),
            o = $(this).data("from_status");
        if (clevertap.event.push("Therapist Clicked", {
                "Page Source": window.location.href,
                "Therapist Name": t,
                Action: "Book Now"
            }), 0 == o) return gtag("event", "click", {
            event_category: "button",
            event_label: "online - book later clicked - mobile"
        }), $(".modal-body #reg_hide #lead_source").val(a), $(".modal-body #reg_unhide #slug").val(t), $(".modal-body #reg_unhide #action").val("book_later"), $(".modal-body #reg_unhide #therapy").val(a), $(".modal-body #reg_unhide #payment").val(1), $("#call_with_healer").modal("show"), !1;
        var n, i = $(this).attr("id").split("_"),
            r = $("#therapist_" + i[2]).val(),
            l = $("#seeker_" + i[2]).val(),
            s = $(".payment_type").val();
        if (n = s ? "&pt=" + s : "", "" == r || "" == l) return alert("Please try again later!"), !1;
        window.location.replace(window.location.protocol + "//" + window.location.host + "/therapist-call-chat-video-page?q=" + t + "&a=book_later&t=" + a + n)
    }), $(".video_call_now_link_oc").unbind("click").click(function(e) {
        e.preventDefault();
        var t = $(this).data("slug"),
            a = $(this).data("therapy"),
            o = $(this).data("from_status");
        if (clevertap.event.push("Therapist Clicked", {
                "Page Source": window.location.href,
                "Therapist Name": t,
                Action: "Video Call"
            }), 0 == o) return gtag("event", "click", {
            event_category: "button",
            event_label: "online - video call clicked - mobile"
        }), $(".modal-body #reg_hide #lead_source").val(a), $(".modal-body #reg_unhide #slug").val(t), $(".modal-body #reg_unhide #action").val("video_call"), $(".modal-body #reg_unhide #therapy").val(a), $(".modal-body #reg_unhide #payment").val(1), $("#call_with_healer").modal("show"), !1;
        var n, i = $(this).attr("id").split("_"),
            r = $("#therapist_" + i[2]).val(),
            l = $("#seeker_" + i[2]).val(),
            s = $(".payment_type").val();
        if (n = s ? "&pt=" + s : "", "" == r || "" == l) return alert("Please try again later!"), !1;
        window.location.replace(window.location.protocol + "//" + window.location.host + "/booking-date-and-time?q=" + t + "&a=video_call&t=" + a + n)
    }), $("#oc_call_seeker_signup_btn").on("submit", function(t) {
        if (t.preventDefault(), t.stopPropagation(), $(this).parsley().validate()) {
            $("#mobile_error_msg").html("");
            var a = $("#oc_call_seeker_signup_btn .iti__selected-flag .iti__selected-dial-code").text(),
                o = $("#mobile-number").val();
            if (o && !e.isValidNumber()) return $("#mobile_error_msg").html("Invalid Number"), !1;
            var n = $("#email-id").val(),
                i = $("#lead_source").val();
            $.ajax({
                url: myajax.ajax_url,
                type: "POST",
                data: {
                    action: "oc_call_seeker_signup",
                    mobile_number: o,
                    country_code: a,
                    email: n,
                    lead_source: i
                },
                success: function(e) {
                    try {
                        var t = JSON.parse(e);
                        if ("error" == t.success) $("#error_msg").text(t.resMessage);
                        else if ("success" == t.resStatus) {
                            gtag("event", "click", {
                                event_category: "button",
                                event_label: "oc call signup started"
                            });
                            var i = t.resData.split("-");
                            $("#error_msg").text(""), $("#error_msg").text(t.resMessage), $("#otp_msg").text(t.resMessage), $("#user_id").val(i[0]), $("#mobile_number").val(i[2]), $("#country_code").val(i[1]), $("#event_name").val("oc call signup completed"), $("#reg_hide").css("display", "none"), $("#reg_unhide").css("display", "block"), clevertap.onUserLogin.push({
                                Site: {
                                    Identity: parseInt(i[0]),
                                    Email: n,
                                    Phone: a + o
                                }
                            })
                        } else $("#error_msg").text(t.resMessage)
                    } catch (e) {
                        console.log("err. :  " + e)
                    }
                }
            })
        }
    }), $("#verify_mobile_oc").on("click", function(e) {
        if (e.preventDefault(), e.stopPropagation(), $(this).parsley().validate()) {
            var t, a = $("#event_name").val(),
                o = $("#payment").val(),
                n = $(".payment_type").val(),
                i = $("#slug").val(),
                r = $("#action").val(),
                l = $("#therapy").val(),
                s = $("#mobile-otp").val(),
                c = $("#user_id").val();
            t = n ? "&pt=" + n : "", $.ajax({
                url: myajax.ajax_url,
                type: "POST",
                data: {
                    action: "oc_verify_user",
                    otp: s,
                    user_id: c
                },
                success: function(e) {
                    try {
                        var n = JSON.parse(e);
                        "error" == n.resStatus ? ($("#error_msg_otp").text(n.resMessage), clevertap.event.push("Signup", {
                            "Page Source": window.location.href,
                            Method: "Email & Mobile Number",
                            Status: "Failure",
                            Reason: n.resMessage
                        })) : ("success" == n.resStatus ? (gtag("event", "click", {
                            event_category: "button",
                            event_label: a
                        }), $("#error_msg_otp").text(""), $("#error_msg_otp").text(n.resMessage), 1 != o || "video_call" != r && "book_later" != r ? 1 != o || "video_call" == r && "book_later" == r ? location.reload(!0) : window.location.replace(window.location.protocol + "//" + window.location.host + "/payment-details?q=" + i + "&a=" + r + "&t=" + l + t) : "tarot-card-reading" == l || "angel-reading" == l || "vastu-shastra" == l || "cosmic-astrology" == l || "numerology" == l ? window.location.replace(window.location.protocol + "//" + window.location.host + "/new-payment-apage?q=" + i + "&a=" + r + "&t=" + l + t) : window.location.replace(window.location.protocol + "//" + window.location.host + "/payment-details?q=" + i + "&a=" + r + "&t=" + l + t)) : $("#error_msg_otp").text(n.resMessage), clevertap.event.push("Signup", {
                            "Page Source": window.location.href,
                            Method: "Email & Mobile Number",
                            Status: "Success"
                        }))
                    } catch (e) {
                        console.log("err. :  " + e)
                    }
                }
            })
        }
    }), $("#opencouponform").click(function() {
        $("#coupon_code").prop("required", !0), $("#coupon_form").show()
    }), $("#apply_coupon").click(function() {
        var e = $("#slug").val(),
            t = $("#action").val(),
            a = $("#therapy").val(),
            o = $("#coupon_code").val();
        o ? $.ajax({
            url: myajax.ajax_url,
            type: "POST",
            data: {
                action: "apply_coupon_code",
                code: o
            },
            success: function(o) {
                var n = JSON.parse(o);
                "error" == n.resStatus && $("#coupon_msg").text(n.resMessage), "success" == n.resStatus && ("tarot-card-reading" == a || "angel-reading" == a || "vastu-shastra" == a || "cosmic-astrology" == a || "numerology" == a ? window.location.replace(window.location.protocol + "//" + window.location.host + "/new-coupon-payment-apage?q=" + e + "&a=" + t + "&t=" + a) : window.location.replace(window.location.protocol + "//" + window.location.host + "/coupon-payment-page?q=" + e + "&a=" + t + "&t=" + a))
            },
            complete: function(e) {
                console.log("complete. :  " + e)
            },
            error: function(e) {
                console.log("error. :  " + e)
            }
        }) : $("#coupon_msg").text("Please enter coupon code to apply.")
    });
    var o = $(".ewHorizontalAccordian"),
        n = $("body").innerWidth();
    o.length > 0 && (o.width() > n ? o.find("ul").css("width", $("body").innerWidth() - 20) : o.css("justify-content", "center")), $(document).on("click", ".ewHorizontalAccordian ul li", function() {
        var e = $(this);
        if (e.hasClass("opening") || e.hasClass("closing")) return !1;
        var t = e.siblings(".open");
        t.addClass("closing"), e.addClass("opening"), setTimeout(() => {
            t.removeClass("closing").removeClass("open"), e.addClass("open").removeClass("opening")
        }, 300)
    }), $(document).on("click", ".ew_accordion ul li", function(e) {
        var t = $(this);
        if (t.hasClass("opening") || t.hasClass("closing")) return !1;
        var a = t.siblings(".open");
        a.addClass("closing"), t.addClass("opening"), setTimeout(() => {
            a.removeClass("closing").removeClass("open"), t.addClass("open").removeClass("opening")
        }, 300)
    }), $(document).on("click", ".ewHorizontalAccordian ul li a", function(e) {
        e.preventDefault();
        var t = $(this),
            a = t.attr("href");
        t.parent().hasClass("open") && (window.location.href = a)
    }), $(document).on("click", ".ew_accordion ul li a", function(e) {
        e.preventDefault();
        var t = $(this),
            a = t.attr("href");
        t.parent().hasClass("open") && (window.location.href = a)
    }), $(".testimonialSlider .owl-carousel").owlCarousel({
        loop: !0,
        margin: 10,
        nav: !0,
        items: 1,
        dots: !1,
        navText: ["<img src='/wp-content/themes/thriive/assets/images/newsoulimg/icon-prev.svg'>", "<img src='/wp-content/themes/thriive/assets/images/newsoulimg/icon-next.svg'>"]
    });
    try {
        $(".collapse").on("show.bs.collapse", function() {
            $(this).prev(".card-header").addClass("open")
        }).on("hide.bs.collapse", function() {
            $(this).prev(".card-header").removeClass("open")
        })
    } catch (e) {
        console.log(e)
    }
    var i = null;
    $(".seachform-section input").on("keyup", function() {
        $(".autocomplete-result").html("<li>Loading...</li>").css({
            border: "1px solid #c5c5c5"
        });
        var e = $(this).val().length,
            t = $(this).val();
        e >= 3 ? i = $.ajax({
            url: myajax.ajax_url,
            type: "POST",
            data: {
                action: "getAilmentByAjaxNew",
                issue: t
            },
            beforeSend: function() {
                null != i && i.abort()
            },
            success: function(e) {
                var t = "";
                $($.parseJSON(e)).map(function(e, a) {
                    var o = 'selectAilment("' + a.slug + '")';
                    t += "<li onClick='" + o + "'>" + a.name + "</li>"
                }), $(".autocomplete-result").html(t).css({
                    border: "1px solid #c5c5c5"
                })
            },
            error: function(e) {
                console.log("Error: ".err)
            }
        }) : $(".autocomplete-result").html("").css({
            border: "none"
        })
    }), $("#otp_login_form").on("submit", function(e) {
        if (e.preventDefault(), e.stopPropagation(), $(this).parsley().validate()) {
            $("#otpmob_error_msg1").html("");
            var t = $("#otp_login_form .iti__selected-flag .iti__selected-dial-code").text(),
                a = $("#mobile-num").val();
            if (a && !int_number1.isValidNumber()) return $("#otpmob_error_msg1").html("Invalid Number"), !1;
            $.ajax({
                url: myajax.ajax_url,
                type: "POST",
                data: {
                    action: "otp_login",
                    mobile_number: a,
                    country_code: t
                },
                success: function(e) {
                    try {
                        var o = JSON.parse(e);
                        if ("error" == o.success) $("#error_msg1").text(o.resMessage);
                        else if ("success" == o.resStatus) {
                            var n = o.resData.split("-");
                            $("#error_msg1").text(""), $("#error_msg1").text(o.resMessage), $("#otp_msg1").text(o.resMessage), $("#otp_user_id").val(n[0]), $("#otp_mobile_number").val(n[2]), $("#otp_country_code").val(n[1]), $("#otp_reg_hide").css("display", "none"), $("#otp_reg_unhide").css("display", "block"), clevertap.onUserLogin.push({
                                Site: {
                                    Identity: parseInt(n[0]),
                                    Phone: t + a
                                }
                            })
                        } else $("#error_msg1").text(o.resMessage)
                    } catch (e) {
                        console.log("err. :  " + e)
                    }
                }
            })
        }
    }), $("#otp_login_verify").on("click", function(e) {
        if (e.preventDefault(), e.stopPropagation(), $(this).parsley().validate()) {
            var t = $("#mob-otp").val(),
                a = $("#otp_user_id").val();
            $.ajax({
                url: myajax.ajax_url,
                type: "POST",
                data: {
                    action: "otp_login_verify",
                    otp: t,
                    user_id: a
                },
                success: function(e) {
                    try {
                        var t = JSON.parse(e);
                        "error" == t.resStatus ? ($("#error_msg_otp1").text(t.resMessage), clevertap.event.push("Login", {
                            "Page Source": window.location.href,
                            Method: "OTP based login",
                            Status: "Failure",
                            Reason: t.resMessage
                        })) : ("success" == t.resStatus ? ($("#error_msg_otp1").text(""), $("#error_msg_otp1").text(t.resMessage), location.reload(!0)) : $("#error_msg_otp1").text(t.resMessage), clevertap.event.push("Login", {
                            "Page Source": window.location.href,
                            Method: "OTP based login",
                            Status: "Success"
                        }))
                    } catch (e) {
                        console.log("err. :  " + e)
                    }
                }
            })
        }
    }), $("#resend_otp").click(function(e) {
        e.preventDefault(), e.stopPropagation();
        var t = $("#mobile_number").val(),
            a = $("#country_code").val(),
            o = $("#user_id").val();
        $.ajax({
            url: myajax.ajax_url,
            type: "POST",
            data: {
                action: "callresendOTP",
                mobile_number: t,
                country_code: a,
                user_id: o
            },
            success: function(e) {
                var a = JSON.parse(e);
                "success" == a.resStatus ? ($("#error_msg_otp").text(""), $("#otp_msg").text(""), $("#otp_msg").text("OTP resent on " + t)) : $("#error_msg_otp").text(a.resMessage)
            },
            complete: function(e) {
                console.log("complete. :  " + e)
            },
            error: function(e) {
                console.log("error. :  " + e)
            }
        })
    }), $("#resend_otp1").click(function(e) {
        e.preventDefault(), e.stopPropagation();
        var t = $("#otp_mobile_number").val(),
            a = $("#otp_country_code").val(),
            o = $("#otp_user_id").val();
        $.ajax({
            url: myajax.ajax_url,
            type: "POST",
            data: {
                action: "callresendOTP",
                mobile_number: t,
                country_code: a,
                user_id: o
            },
            success: function(e) {
                var a = JSON.parse(e);
                "success" == a.resStatus ? ($("#error_msg_otp").text(""), $("#otp_msg").text(""), $("#otp_msg").text("OTP resent on " + t)) : $("#error_msg_otp").text(a.resMessage)
            },
            complete: function(e) {
                console.log("complete. :  " + e)
            },
            error: function(e) {
                console.log("error. :  " + e)
            }
        })
    }), $(".excerpt-content-rm a.eclip-more-link").click(function(e) {
        return e.preventDefault(), $(this).closest(".abt-more").find(".readmore-content-wrapper").show(), $(".excerpt-content-rm").hide(), !1
    }), $(".readmore-content-wrapper a.eclip-more-link").click(function(e) {
        return e.preventDefault(), $(this).closest(".abt-more").find(".excerpt-content-rm").show(), $(".readmore-content-wrapper").hide(), !1
    }), $(document).on("focusin", "#dob", function() {
        $(this).datepicker({
            changeMonth: !0,
            changeYear: !0,
            yearRange: "-100:+0"
        })
    }), $(document).on("click", "#closemainmenu, #menu_overlay", function() {
        $(".offcanvas-collapse").toggleClass("open"), $("#menuMain").toggleClass("open"), $("#menu_overlay").toggleClass("menu_bg")
    }), $('[data-toggle="offcanvas"]').on("click", function() {
        $(".offcanvas-collapse").toggleClass("open"), $("#menuMain").toggleClass("open"), $("#menu_overlay").toggleClass("menu_bg")
    }), $(".nozomink").on("click", function() {
        var e = $(this).attr("data-position");
        $("#error_" + e).text("The link will be made available once the event starts.")
    }), $(".event_login").on("click", function() {
        var e = $(this).attr("data-position"),
            t = $(".uid").val();
        $.ajax({
            url: myajax.ajax_url,
            type: "POST",
            data: {
                action: "register_for_event",
                position: e,
                uid: t
            },
            success: function(e) {
                $("#event_page").load(" #event_page")
            }
        })
    });
    var r = $(".searchformwrapper .no-results");
    $(document).on("click", ".seachform-section", function() {
        $(".all_ailments").removeClass("d-none")
    }), $("#closesearch, #closesearch1").on("click", function() {
        $(".all_ailments").addClass("d-none"), $(".no-results").hide()
    }), $(document).on("keyup", ".search_issues", function() {
        var e = $(this).val().toLowerCase(),
            t = !1;
        $(".issue_box").find(".therapy_issues").hide(), $(".issue_box").find(".therapy_issues .label_issues").each(function() {
            $(this).text().toLowerCase().startsWith("" + e) && (t = !0, $(this).closest(".therapy_issues").show())
        }), r.toggle(!t)
    }), navigator.geolocation ? navigator.geolocation.getCurrentPosition(function(e) {
        var t = e.coords.latitude,
            a = e.coords.longitude;
        $.ajax({
            url: myajax.ajax_url,
            type: "POST",
            data: {
                action: "userLocation",
                latitude: t,
                longitude: a
            },
            success: function(e) {},
            complete: function(e) {},
            error: function(e) {
                console.log("Error\n" + e)
            }
        })
    }) : x.innerHTML = "Geolocation is not supported by this browser.", $("#seeker_submit").on("submit", function(t) {
        if (t.preventDefault(), t.stopPropagation(), $(this).parsley("isValid")) {
            $("#error_msg").html("");
            var a = $("#seeker_submit .iti__selected-flag .iti__selected-dial-code").text(),
                o = $("#mobile-number").val();
            if (o && !e.isValidNumber()) return $("#error_msg").html("Invalid Number"), !1;
            var n = $("#firstname").val(),
                i = $("#email").val(),
                r = $("#pwd").val();
            $.ajax({
                url: myajax.ajax_url,
                type: "POST",
                data: {
                    action: "seeker_signup",
                    mobile_number: o,
                    country_code: a,
                    fullname: n,
                    email: i,
                    pwd: r
                },
                success: function(e) {
                    try {
                        var t = JSON.parse(e);
                        "error" == t.success ? $("#error_msg").text(t.resMessage) : "success" == t.resStatus ? (gtag("event", "click", {
                            event_category: "button",
                            event_label: "seeker signup started"
                        }), $("#error_msg").text(""), $("#error_msg").text(t.resMessage), $("#user_id").val(t.resData), $("#event_name").val("seeker signup completed"), $("#otp_field").css("display", "block"), $("#mobile-otp").attr("required", "required"), $("#firstname").attr("disabled", "disabled"), $("#email").attr("disabled", "disabled"), $("#pwd").attr("disabled", "disabled"), $("#mobile-number").attr("disabled", "disabled"), $("#ss_btn").css("display", "none"), $("#vs_btn").css("display", "block"), clevertap.onUserLogin.push({
                            Site: {
                                Identity: parseInt(res[0]),
                                Name: n,
                                Email: i,
                                Phone: a + o
                            }
                        })) : $("#error_msg").text(t.resMessage)
                    } catch (e) {
                        console.log("err. :  " + e)
                    }
                }
            })
        }
    }), $("#verify_mobile").on("click", function(e) {
        if (e.preventDefault(), e.stopPropagation(), $(this).parsley().validate()) {
            var t = $("#event_name").val(),
                a = $("#payment").val(),
                o = $("#event_link_page").val(),
                n = $("#slug").val(),
                i = $("#action").val(),
                r = $("#therapy").val(),
                l = $("#mobile-otp").val(),
                s = $("#user_id").val();
            $.ajax({
                url: ajax_object.ajax_url,
                type: "POST",
                data: {
                    action: "verify_user",
                    otp: l,
                    user_id: s
                },
                success: function(e) {
                    try {
                        var l = JSON.parse(e);
                        "error" == l.resStatus ? $("#error_msg_otp").text(l.resMessage) : "success" == l.resStatus ? (gtag("event", "click", {
                            event_category: "button",
                            event_label: t
                        }), $("#error_msg_otp").text(""), $("#error_msg_otp").text(l.resMessage), 1 == a ? window.location.replace(window.location.protocol + "//" + window.location.host + "/payment-details?q=" + n + "&a=" + i + "&t=" + r) : 1 == o ? window.location.replace(window.location.protocol + "//" + window.location.host + "/events-page") : location.reload(!0), clevertap.event.push("Signup", {
                            "Page Source": window.location.href,
                            Method: "Email & Mobile Number",
                            Status: "Success"
                        })) : $("#error_msg_otp").text(l.resMessage)
                    } catch (e) {
                        console.log("err. :  " + e)
                    }
                }
            })
        }
    }), clevertap.event.push("Page Viewed", {
        "Page URL": window.location.href,
        "Page Title": document.title
    }), clevertap.notifications.push({
        titleText: "Would you like to receive Push Notifications?",
        bodyText: "We will send you relevant content",
        okButtonText: "Sign me up!",
        rejectButtonText: "No thanks",
        okButtonColor: "#F28046",
        hidePoweredByCT: !0,
        askAgainTimeInSeconds: 600,
        serviceWorkerPath: "https://www.thriive.in/clevertap_sw.js"
    }), $("#hpct1").on("click", function() {
        var e = $("#hpct1 aside a").attr("href");
        clevertap.event.push("Homepage Section Viewed", {
            "Section Name": "After Banner Section",
            "Page URL": e
        })
    }), $("#hpct2").on("click", function() {
        var e = $(this).parent().find("h2").text(),
            t = $("#hpct2 aside a").attr("href");
        clevertap.event.push("Homepage Section Viewed", {
            "Section Name": e,
            "Page URL": t
        })
    }), $("#hpct3").on("click", function() {
        var e = $(this).parent().find("h2").text(),
            t = $("#hpct3 aside a").attr("href");
        clevertap.event.push("Homepage Section Viewed", {
            "Section Name": e,
            "Page URL": t
        })
    }), $("#left-side-menu li a").on("click", function() {
        var e = $(this).text(),
            t = $(this).attr("href");
        clevertap.event.push("Main Menu Viewed", {
            "Menu Name": e,
            "Menu URL": t
        })
    }), $("#catTabs ul li a").on("click", function() {
        var e = $(this).text(),
            t = $(this).attr("href");
        clevertap.event.push("Top Menu Viewed", {
            "Menu Name": e,
            "Menu URL": t
        })
    }), $("#paid_payment_button").on("click", function() {
        var e = $(this).data("therapist"),
            t = $(this).data("plan_title"),
            a = $(this).data("plan_cost"),
            o = $(this).data("action"),
            n = $(this).data("therapy");
        clevertap.event.push("Payment Process Initiated", {
            "Page Source": window.location.href,
            Therapist: e,
            Therapy: n,
            "Coupon Applied": "No",
            "Plan Title": t,
            "Plan Cost": a,
            "Plan Type": "Paid",
            Action: o
        })
    }), $("#free_payment_button").on("click", function() {
        var e = $(this).data("therapist"),
            t = $(this).data("plan_title"),
            a = $(this).data("plan_cost"),
            o = $(this).data("action"),
            n = $(this).data("therapy");
        clevertap.event.push("Payment Process Initiated", {
            "Page Source": window.location.href,
            Therapist: e,
            Therapy: n,
            "Coupon Applied": "No",
            "Plan Title": t,
            "Plan Cost": a,
            "Plan Type": "Free",
            Action: o
        })
    }), $("#coupon_button").on("click", function() {
        var e = $(this).data("therapist"),
            t = $(this).data("plan_title"),
            a = $(this).data("plan_cost"),
            o = $(this).data("action"),
            n = $(this).data("coupon_code"),
            i = $(this).data("therapy");
        clevertap.event.push("Payment Process Initiated", {
            "Page Source": window.location.href,
            Therapist: e,
            Therapy: i,
            "Coupon Applied": "Yes",
            "Coupon Code": n,
            "Plan Title": t,
            "Plan Cost": a,
            "Plan Type": "Paid",
            Action: o
        })
    }), $(".consult_online_link").unbind("click").click(function(e) {
        if (e.preventDefault(), $("#connect_with_healer_login").length >= 1) return gtag("event", "click", {
            event_category: "button",
            event_label: "call now clicked - desktop"
        }), $("#call_with_healer").modal("show"), !1;
        var t = $(this).attr("id").split("_"),
            a = $("#therapist_" + t[2]).val(),
            o = $("#seeker_" + t[2]).val();
        if ("" == a || "" == o) return alert("Please try again later!"), !1;
        $(".ajax-loader").show(), setTimeout(function() {
            $.ajax({
                type: "POST",
                url: myajax.ajax_url,
                async: !1,
                data: {
                    action: "consult_online_thriive_therapist",
                    therapist_email: a,
                    seeker_email: o
                },
                success: function(e) {
                    if ("success" != e.data.status) return alert("Something went wrong !!"), !1;
                    gtag("event", "click", {
                        event_category: "button",
                        event_label: "call now initiated - desktop"
                    })
                },
                error: function(e, t) {
                    alert(e.responseText), $(".ajax-loader").hide()
                },
                complete: function() {
                    $(".ajax-loader").hide()
                }
            })
        }, 100)
    }), $(".call_now_link").unbind("click").click(function(e) {
        if (e.preventDefault(), $("#connect_with_healer_login").length >= 1) return gtag("event", "click", {
            event_category: "button",
            event_label: "call now clicked - mobile"
        }), $("#call_with_healer").modal("show"), !1;
        var t = $(this).attr("id").split("_"),
            a = $("#therapist_" + t[2]).val(),
            o = $("#seeker_" + t[2]).val();
        if ("" == a || "" == o) return alert("Please try again later!"), !1;
        var n = "";
        $(".ajax-loader").show(), setTimeout(function() {
            $.ajax({
                type: "POST",
                url: myajax.ajax_url,
                async: !1,
                data: {
                    action: "assign_masked_number_to_user",
                    therapist_email: a,
                    seeker_email: o
                },
                success: function(e) {
                    if ("success" != e.data.status) return alert(e.data.error_msg), !1;
                    gtag("event", "click", {
                        event_category: "button",
                        event_label: "call now initiated - mobile"
                    }), 0 == (n = e.data.masked_number) && null == n || ($("#call_link_" + t[2]).attr("href", "tel:" + n), setTimeout(function() {
                        $("#call_link_" + t[2])[0].click()
                    }, 100))
                },
                error: function(e, t) {
                    alert(e.responseText), $(".ajax-loader").hide()
                },
                complete: function() {
                    $(".ajax-loader").hide()
                }
            })
        }, 100)
    });
    new Swiper(".swiper-home-blog", {
        slidesPerView: 4,
        spaceBetween: 30,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        breakpoints: {
            640: {
                slidesPerView: "auto",
                spaceBetween: 10
            }
        }
    }), new Swiper(".therapy-detail-review-section .swiper-container", {
        autoHeight: !0,
        pagination: {
            el: ".swiper-pagination",
            clickable: !0
        }
    });
    $(".detail-menu-top li a").on("click", function() {
        var e = $(this),
            t = e.attr("href");
        return $(".detail-menu-top").find("li a").removeClass("active"), e.addClass("active"), $("html, body").animate({
            scrollTop: $(t).offset().top - 80
        }, 2e3), !1
    })
});
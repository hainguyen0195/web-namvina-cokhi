﻿/* #jQuery jGrowl */
(function(e) {
    var t = function() {
        return !1 === e.support.boxModel && e.support.objectAll && e.support.leadingWhitespace
    }();
    e.jGrowl = function(t, i) {
        0 == e("#jGrowl").size() && e('<div id="jGrowl"></div>').addClass(i && i.position ? i.position : e.jGrowl.defaults.position).appendTo("body"), e("#jGrowl").jGrowl(t, i)
    }, e.fn.jGrowl = function(t, i) {
        if (e.isFunction(this.each)) {
            var o = arguments;
            return this.each(function() {
                void 0 == e(this).data("jGrowl.instance") && (e(this).data("jGrowl.instance", e.extend(new e.fn.jGrowl, {
                    notifications: [],
                    element: null,
                    interval: null
                })), e(this).data("jGrowl.instance").startup(this)), e.isFunction(e(this).data("jGrowl.instance")[t]) ? e(this).data("jGrowl.instance")[t].apply(e(this).data("jGrowl.instance"), e.makeArray(o).slice(1)) : e(this).data("jGrowl.instance").create(t, i)
            })
        }
    }, e.extend(e.fn.jGrowl.prototype, {
        defaults: {
            pool: 0,
            header: "",
            group: "",
            sticky: !1,
            position: "top-right",
            glue: "after",
            theme: "default",
            themeState: "highlight",
            corners: "10px",
            check: 250,
            life: 3e3,
            closeDuration: "normal",
            openDuration: "normal",
            easing: "swing",
            closer: !0,
            closeTemplate: "<i class='fa fa-times'></i>",
            closerTemplate: "<div>[ close all ]</div>",
            log: function() {},
            beforeOpen: function() {},
            afterOpen: function() {},
            open: function() {},
            beforeClose: function() {},
            close: function() {},
            animateOpen: {
                opacity: "show"
            },
            animateClose: {
                opacity: "hide"
            }
        },
        notifications: [],
        element: null,
        interval: null,
        create: function(t, i) {
            var i = e.extend({}, this.defaults, i);
            i.speed !== void 0 && (i.openDuration = i.speed, i.closeDuration = i.speed), this.notifications.push({
                message: t,
                options: i
            }), i.log.apply(this.element, [this.element, t, i])
        },
        render: function(t) {
            var i = this,
                o = t.message,
                n = t.options;
            n.themeState = "" == n.themeState ? "" : "ui-state-" + n.themeState;
            var t = e("<div/>").addClass("jGrowl-notification " + n.themeState + " ui-corner-all" + (void 0 != n.group && "" != n.group ? " " + n.group : "")).append(e("<div/>").addClass("jGrowl-close").attr("title", "Close").html(n.closeTemplate)).append(e("<div/>").addClass("jGrowl-header").html(n.header)).append(e("<div/>").addClass("jGrowl-message").html(o)).data("jGrowl", n).addClass(n.theme).children("div.jGrowl-close").bind("click.jGrowl", function() {
                e(this).parent().trigger("jGrowl.beforeClose")
            }).parent();
            e(t).bind("mouseover.jGrowl", function() {
                e("div.jGrowl-notification", i.element).data("jGrowl.pause", !0)
            }).bind("mouseout.jGrowl", function() {
                e("div.jGrowl-notification", i.element).data("jGrowl.pause", !1)
            }).bind("jGrowl.beforeOpen", function() {
                n.beforeOpen.apply(t, [t, o, n, i.element]) !== !1 && e(this).trigger("jGrowl.open")
            }).bind("jGrowl.open", function() {
                n.open.apply(t, [t, o, n, i.element]) !== !1 && ("after" == n.glue ? e("div.jGrowl-notification:last", i.element).after(t) : e("div.jGrowl-notification:first", i.element).before(t), e(this).animate(n.animateOpen, n.openDuration, n.easing, function() {
                    e.support.opacity === !1 && this.style.removeAttribute("filter"), null !== e(this).data("jGrowl") && (e(this).data("jGrowl").created = new Date), e(this).trigger("jGrowl.afterOpen")
                }))
            }).bind("jGrowl.afterOpen", function() {
                n.afterOpen.apply(t, [t, o, n, i.element])
            }).bind("jGrowl.beforeClose", function() {
                n.beforeClose.apply(t, [t, o, n, i.element]) !== !1 && e(this).trigger("jGrowl.close")
            }).bind("jGrowl.close", function() {
                e(this).data("jGrowl.pause", !0), e(this).animate(n.animateClose, n.closeDuration, n.easing, function() {
                    e.isFunction(n.close) ? n.close.apply(t, [t, o, n, i.element]) !== !1 && e(this).remove() : e(this).remove()
                })
            }).trigger("jGrowl.beforeOpen"), "" != n.corners && void 0 != e.fn.corner && e(t).corner(n.corners), e("div.jGrowl-notification:parent", i.element).size() > 1 && 0 == e("div.jGrowl-closer", i.element).size() && this.defaults.closer !== !1 && e(this.defaults.closerTemplate).addClass("jGrowl-closer " + this.defaults.themeState + " ui-corner-all").addClass(this.defaults.theme).appendTo(i.element).animate(this.defaults.animateOpen, this.defaults.speed, this.defaults.easing).bind("click.jGrowl", function() {
                e(this).siblings().trigger("jGrowl.beforeClose"), e.isFunction(i.defaults.closer) && i.defaults.closer.apply(e(this).parent()[0], [e(this).parent()[0]])
            })
        },
        update: function() {
            e(this.element).find("div.jGrowl-notification:parent").each(function() {
                void 0 != e(this).data("jGrowl") && void 0 !== e(this).data("jGrowl").created && e(this).data("jGrowl").created.getTime() + parseInt(e(this).data("jGrowl").life) < (new Date).getTime() && e(this).data("jGrowl").sticky !== !0 && (void 0 == e(this).data("jGrowl.pause") || e(this).data("jGrowl.pause") !== !0) && e(this).trigger("jGrowl.beforeClose")
            }), this.notifications.length > 0 && (0 == this.defaults.pool || e(this.element).find("div.jGrowl-notification:parent").size() < this.defaults.pool) && this.render(this.notifications.shift()), 2 > e(this.element).find("div.jGrowl-notification:parent").size() && e(this.element).find("div.jGrowl-closer").animate(this.defaults.animateClose, this.defaults.speed, this.defaults.easing, function() {
                e(this).remove()
            })
        },
        startup: function(i) {
            this.element = e(i).addClass("jGrowl").append('<div class="jGrowl-notification"></div>'), this.interval = setInterval(function() {
                e(i).data("jGrowl.instance").update()
            }, parseInt(this.defaults.check)), t && e(this.element).addClass("ie6")
        },
        shutdown: function() {
            e(this.element).removeClass("jGrowl").find("div.jGrowl-notification").trigger("jGrowl.close").parent().empty(), clearInterval(this.interval)
        },
        close: function() {
            e(this.element).find("div.jGrowl-notification").each(function() {
                e(this).trigger("jGrowl.beforeClose")
            })
        }
    }), e.jGrowl.defaults = e.fn.jGrowl.prototype.defaults
})(jQuery);
"use strict";

function __weatherwidget_init() {
    var a = document.getElementsByClassName("weatherwidget-io"),
        i = [];
    if (0 !== a.length) {
        for (var t = function (t) {
            var e = a[t],
                o = {};
            o.id = "weatherwidget-io-" + t,
                o.href = e.getAttribute("data-href"),
                o.label_1 = e.getAttribute("data-label_1"),
                o.label_2 = e.getAttribute("data-label_2"),
                o.font = e.getAttribute("data-font"),
                o.icons = e.getAttribute("data-icons"),
                o.mode = e.getAttribute("data-mode"),
                o.days = e.getAttribute("data-days"),
                o.theme = e.getAttribute("data-theme"),
                o.basecolor = e.getAttribute("data-basecolor"),
                o.accent = e.getAttribute("data-accent"),
                o.textcolor = e.getAttribute("data-textcolor"),
                o.textAccent = e.getAttribute("data-textAccent"),
                o.highcolor = e.getAttribute("data-highcolor"),
                o.lowcolor = e.getAttribute("data-lowcolor"),
                o.suncolor = e.getAttribute("data-suncolor"),
                o.mooncolor = e.getAttribute("data-mooncolor"),
                o.cloudcolor = e.getAttribute("data-cloudcolor"),
                o.cloudfill = e.getAttribute("data-cloudfill"),
                o.raincolor = e.getAttribute("data-raincolor"),
                o.snowcolor = e.getAttribute("data-snowcolor"),
                o.windcolor = e.getAttribute("data-windcolor"),
                o.fogcolor = e.getAttribute("data-fogcolor"),
                o.thundercolor = e.getAttribute("data-thundercolor"),
                o.hailcolor = e.getAttribute("data-hailcolor"),
                o.dayscolor = e.getAttribute("data-dayscolor"),
                o.tempcolor = e.getAttribute("data-tempcolor"),
                o.desccolor = e.getAttribute("data-desccolor"),
                o.label1color = e.getAttribute("data-label1color"),
                o.label2color = e.getAttribute("data-label2color"),
                o.shadow = e.getAttribute("data-shadow"),
                o.scale = e.getAttribute("data-scale"),
                (r = document.getElementById(o.id)) && e.removeChild(r),
                i[o.id] = document.createElement("iframe"),
                i[o.id].setAttribute("id", o.id),
                i[o.id].setAttribute("class", "weatherwidget-io-frame"),
                i[o.id].setAttribute("title", "Weather Widget"),
                i[o.id].setAttribute("scrolling", "no"),
                i[o.id].setAttribute("frameBorder", "0"),
                i[o.id].setAttribute("width", "100%"),
                i[o.id].setAttribute("src", "https://weatherwidget.io/w/"),
                i[o.id].style.display = "block",
                i[o.id].style.position = "absolute",
                i[o.id].style.top = "0", i[o.id].onload = function () {
                    i[o.id].contentWindow.postMessage(o, "https://weatherwidget.io")
                }, e.style.display = "block",
                e.style.position = "relative",
                e.style.height = "150px",
                e.style.padding = "0",
                e.style.overflow = "hidden",
                e.style.textAlign = "left",
                e.style.textIndent = "-299rem",
                e.appendChild(i[o.id])
        }, e = 0, o = Math.min(a.length, 10); e < o; e++) {
            var r;
            t(e)
        }
        window.addEventListener("message", function (t) {
            "https://weatherwidget.io" === t.origin && i[t.data.wwId] && i[t.data.wwId].parentNode &&
             (i[t.data.wwId].style.height = t.data.wwHeight + "px", i[t.data.wwId].parentNode.style.height = t.data.wwHeight + "px")
        })
    } else setTimeout(__weatherwidget_init, 1500)
}
setTimeout(__weatherwidget_init, 100);
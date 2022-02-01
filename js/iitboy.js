//侧边上评下滚动代码
let fq, $wd;
$(document).ready(function ($) {
    const $body = (window.opera) ? (document.compatMode === "CSS1Compat" ? $("html") : $("body")) : $("html,body");
    $("#shang").mouseout(function () {
        clearTimeout(fq)
    }).click(function () {
        $body.animate({scrollTop: 0}, 400)
    });
    $("#xia").mouseout(function () {
        clearTimeout(fq)
    }).click(function () {
        $body.animate({scrollTop: $(document).height()}, 400)
    });
    $("#comt-reset").click(function () {
        $body.animate({scrollTop: $("#comment-place").offset().top}, 400)
    });
});

function up() {
    $wd = $(window);
    $wd.scrollTop($wd.scrollTop() - 1);
    fq = setTimeout("up()", 50)
}

function dn() {
    $wd = $(window);
    $wd.scrollTop($wd.scrollTop() + 1);
    fq = setTimeout("dn()", 50)
}

let timer;

// 双击自动滚屏
function initialize() {
    timer = setInterval("scrollwindow()", 10)
}

function sc() {
    clearInterval(timer)
}

function scrollwindow() {
    window.scrollBy(0, 1)
}

document.onmousedown = sc;
document.ondblclick = initialize;

//js 控制 gif 动画播放
const Gifffer = function () {
    let images, d = document, ga = "getAttribute", sa = "setAttribute";
    images = d && d.querySelectorAll ? d.querySelectorAll("[data-gifffer]") : [];
    const createContainer = function (w, h, el) {
        const con = d.createElement("DIV"), cls = el[ga]("class"), id = el[ga]("id");
        cls ? con[sa]("class", el[ga]("class")) : null;
        id ? con[sa]("id", el[ga]("id")) : null;
        con[sa]("style", "position:relative;cursor:pointer;width:" + w + "px;height:" + h + "px;");
        const play = d.createElement("DIV");
        play[sa]("style", "width:60px;height:60px;border-radius:30px;background:rgba(0, 0, 0, 0.3);position:absolute;left:" + (w / 2 - 30) + "px;top:" + (h / 2 - 30) + "px;");
        const trngl = d.createElement("DIV");
        trngl[sa]("style", "width:0;height: 0;border-top:14px solid transparent;border-bottom:14px solid transparent;border-left:14px solid rgba(0, 0, 0, 0.5);position:absolute;left:26px;top:16px;");
        play.appendChild(trngl);
        con.appendChild(play);
        el.parentNode.replaceChild(con, el);
        return {c: con, p: play}
    };
    const process = function (el) {
        let url, con, c, w, h, play, gif, playing = false, cc, isC;
        url = el[ga]("data-gifffer");
        w = el[ga]("data-gifffer-width");
        h = el[ga]("data-gifffer-height");
        el.style.display = "block";
        c = document.createElement("canvas");
        isC = !!(c.getContext && c.getContext("2d"));
        if (w && h && isC) cc = createContainer(w, h, el);
        el.onload = function () {
            if (isC) {
                w = w || el.width;
                h = h || el.height;
                if (!cc) cc = createContainer(w, h, el);
                con = cc.c;
                play = cc.p;
                con.addEventListener("click", function () {
                    if (!playing) {
                        playing = true;
                        gif = d.createElement("IMG");
                        gif[sa]("style", "width:" + w + "px;height:" + h + "px;");
                        gif[sa]("data-uri", Math.floor(Math.random() * 1e5) + 1);
                        setTimeout(function () {
                            gif.src = url
                        }, 0);
                        con.removeChild(play);
                        con.removeChild(c);
                        con.appendChild(gif)
                    } else {
                        playing = false;
                        con.appendChild(play);
                        con.removeChild(gif);
                        con.appendChild(c);
                        gif = null
                    }
                });
                c.width = w;
                c.height = h;
                c.getContext("2d").drawImage(el, 0, 0, w, h);
                con.appendChild(c)
            }
        };
        el.src = url
    };
    for (let i = 0; i < images.length; i++) process(images[i])
};

// 自定义title
$(document).ready(function ($) {
    const sweetTitles = {
        x: 10, y: 20, tipElements: "a,span,img,div ", noTitle: false, init: function () {
            let noTitle = this.noTitle, isTitle;
            $(this.tipElements).each(function () {
                $(this).mouseover(function (e) {
                    //兼容 hint.css
                    if (/hint--/i.test($(this).prop("className")) && HINT) {
                        this.title && $(this).attr('data-hint', this.title);
                        $(this).removeAttr('title');
                    }
                    if (noTitle) {
                        isTitle = true;
                    } else {
                        isTitle = $.trim(this.title) !== '';
                    }
                    if (isTitle) {
                        this.myTitle = this.title;
                        this.title = "";
                        const tooltip = "<div class='tooltip'><div class='tipsy-arrow tipsy-arrow-n'></div><div class='tipsy-inner'>" + this.myTitle + "</div></div>";
                        $('body').append(tooltip);
                        $('.tooltip').css({
                            "top": (e.pageY + 20) + "px",
                            "left": (e.pageX - 20) + "px"
                        }).show('fast');
                    }
                }).mouseout(function () {
                    if (this.myTitle != null) {
                        this.title = this.myTitle;
                        $('.tooltip').remove();
                    }
                }).mousemove(function (e) {
                    $('.tooltip').css({"top": (e.pageY + 20) + "px", "left": (e.pageX - 20) + "px"});
                })
            })
        }
    };
    $(function () {
        sweetTitles.init();
    })
});

//返回顶部缓冲代码
function goTop(acceleration, time) {
    acceleration = acceleration || 0.1;
    time = time || 12;
    let dx = 0;
    let dy = 0;
    let bx = 0;
    let by = 0;
    let wx;
    let wy;
    if (document.documentElement) {
        dx = document.documentElement.scrollLeft || 0;
        dy = document.documentElement.scrollTop || 0
    }
    if (document.body) {
        bx = document.body.scrollLeft || 0;
        by = document.body.scrollTop || 0
    }
    wx = window.scrollX || 0;
    wy = window.scrollY || 0;
    const x = Math.max(wx, Math.max(bx, dx));
    const y = Math.max(wy, Math.max(by, dy));
    const speed = 1 + acceleration;
    window.scrollTo(Math.floor(x / speed), Math.floor(y / speed));
    if (x > 0 || y > 0) {
        const invokeFunction = "goTop(" + acceleration + ", " + time + ")";
        window.setTimeout(invokeFunction, time)
    }
}

//锚点平滑滚动代码
(function (window, $) {
    let $window, $document, $body, $html, $bodhtml;
    window.AA_CONFIG = window.AA_CONFIG || {};
    window.AA_CONFIG = $.extend({animationLength: 750, easingFunction: "linear", scrollOffset: 0}, window.AA_CONFIG);
    $(document).ready(function () {
        $window = $(window);
        $document = $(this);
        $body = $(document.body);
        $html = $(document.documentElement);
        $bodhtml = $body.add($html);
        scrollToHash();
        $document.find('a[href^="#"], a[href^="."]').on("click", function () {
            let href = $(this).attr("href");
            if (href.charAt(0) === ".") {
                href = href.split("#");
                href.shift();
                href = "#" + href.join("#")
            }
            if (href === location.hash) {
                scrollToHash(href)
            }
        });
        $window.on("hashchange", function () {
            scrollToHash()
        });
        $window.on("mousewheel DOMMouseScroll touchstart mousedown MSPointerDown", function () {
            $bodhtml.stop(true, false)
        })
    });

    function scrollToHash(rawHash) {
        let $actualID, $el;
        rawHash = rawHash || location.hash;
        const anchorTuple = rawHash.substring(1).split("|");
        const hash = anchorTuple[0];
        const animationTime = anchorTuple[1] || window.AA_CONFIG.animationLength;
        if (hash.charAt(0).search(/[A-Za-z]/) > -1) {
            $actualID = $document.find("#" + hash);
        }
        const $actualAnchor = $document.find('a[name="' + hash + '"]');
        if (($actualAnchor && $actualAnchor.length) || ($actualID && $actualID.length)) {
            return false;
        }
        const $arbitraryAnchor = $(hash).first();
        if ($arbitraryAnchor && $arbitraryAnchor.length) {
            $el = $arbitraryAnchor
        } else {
            return false;
        }
        if ($el && $el.length) {
            const top = $el.offset().top - window.AA_CONFIG.scrollOffset;
            $bodhtml.stop(true, false).animate({scrollTop: top}, parseInt(animationTime), window.AA_CONFIG.easingFunction)
        }
    }
})(window, jQuery);


$(function () {
    if (LAZYLOAD) {
        // 图片延迟加载
        $("img.lazyload").lazyload({effect: "fadeIn", threshold: 200});
        // 调整加载
        $("html,body").animate({scrollTop: 1}, 500);
    }
    if (CHAFFLE) {
        // 随机字符
        const elements = document.querySelectorAll('[data-chaffle]');
        const elm = document.querySelectorAll('[data-chaffle-onLoad]');
        Array.prototype.forEach.call(elements, function (el) {
            const chaffle = new Chaffle(el);
            el.addEventListener('mouseover', function () {
                chaffle.init();
            });
        });
        Array.prototype.forEach.call(elm, function (el) {
            const chaffleload = new Chaffle(el, {
                delay: 300
            });
            setInterval(function () {
                chaffleload.init();
            }, 9000)
        });
    }
});

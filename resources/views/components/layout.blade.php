<!--
Theme Name: VASTA Super Theme
Theme Version: 2.4
Developed by: VASTA Inc. - https://vasta.me/
Description: Custom Shopify Theme by VASTA
-->
<!-- start theme.liquid (LAYOUT) -->
<!doctype html>
<!-- [if (gt IE 9)|!(IE)]><! -->
<html lang="en">
<!-- <![endif] -->

<head>
    <style id="w3_bg_load">
        div:not(.w3_bg),
        section:not(.w3_bg),
        iframelazy:not(.w3_bg) {
            background-image: none !important;
        }
    </style>
    <script>
        var w3_lazy_load_by_px = 200,
            blank_image_webp_url =
            "//speakingroses.com/cdn/shop/t/12/assets/blank_small.png?v=1225MbYZXcveq23Tgjc74go6gNuQkFRwK8",
            google_fonts_delay_load = 1e4,
            w3_mousemoveloadimg = !1,
            w3_page_is_scrolled = !1,
            w3_lazy_load_js = 1,
            w3_excluded_js = 0;
        class w3_loadscripts {
            constructor(e) {
                (this.triggerEvents = e),
                (this.eventOptions = {
                    passive: !0,
                }),
                (this.userEventListener = this.triggerListener.bind(this)),
                this.lazy_trigger,
                    this.style_load_fired,
                    (this.lazy_scripts_load_fired = 0),
                    (this.scripts_load_fired = 0),
                    (this.scripts_load_fire = 0),
                    (this.excluded_js = w3_excluded_js),
                    (this.w3_lazy_load_js = w3_lazy_load_js),
                    (this.w3_fonts = 'undefined' != typeof w3_googlefont ? w3_googlefont : []),
                    (this.w3_styles = []),
                    (this.w3_scripts = {
                        normal: [],
                        async: [],
                        defer: [],
                        lazy: [],
                    }),
                    (this.allJQueries = []);
            }
            user_events_add(e) {
                this.triggerEvents.forEach((t) => window.addEventListener(t, e.userEventListener, e.eventOptions));
            }
            user_events_remove(e) {
                this.triggerEvents.forEach((t) => window.removeEventListener(t, e.userEventListener, e.eventOptions));
            }
            triggerListener_on_load() {
                'loading' === document.readyState ?
                    document.addEventListener('DOMContentLoaded', this.load_resources.bind(this)) :
                    this.load_resources();
            }
            triggerListener() {
                this.user_events_remove(this),
                    (this.lazy_scripts_load_fired = 1),
                    this.add_html_class('w3_user'),
                    'loading' === document.readyState ?
                    (document.addEventListener('DOMContentLoaded', this.load_style_resources.bind(this)),
                        this.scripts_load_fire || document.addEventListener('DOMContentLoaded', this.load_resources
                            .bind(this))) :
                    (this.load_style_resources(), this.scripts_load_fire || this.load_resources());
            }
            async load_style_resources() {
                this.style_load_fired ||
                    ((this.style_load_fired = !0),
                        this.register_styles(),
                        document.getElementsByTagName('html')[0].setAttribute('data-css', this.w3_styles.length),
                        document.getElementsByTagName('html')[0].setAttribute('data-css-loaded', 0),
                        this.preload_scripts(this.w3_styles),
                        this.load_styles_preloaded());
            }
            async load_styles_preloaded() {
                setTimeout(
                    function(e) {
                        document.getElementsByTagName('html')[0].classList.contains('css-preloaded') ?
                            e.load_styles(e.w3_styles) :
                            e.load_styles_preloaded();
                    },
                    200,
                    this
                );
            }
            async load_resources() {
                this.scripts_load_fired ||
                    ((this.scripts_load_fired = !0),
                        this.hold_event_listeners(),
                        this.exe_document_write(),
                        this.register_scripts(),
                        this.add_html_class('w3_start'),
                        'function' == typeof w3_events_on_start_js && w3_events_on_start_js(),
                        this.preload_scripts(this.w3_scripts.normal),
                        this.preload_scripts(this.w3_scripts.defer),
                        this.preload_scripts(this.w3_scripts.async),
                        this.wnwAnalytics(),
                        this.wnwBoomerang(),
                        await this.load_scripts(this.w3_scripts.normal),
                        await this.load_scripts(this.w3_scripts.defer),
                        await this.load_scripts(this.w3_scripts.async),
                        await this.execute_domcontentloaded(),
                        await this.execute_window_load(),
                        window.dispatchEvent(new Event('w3-scripts-loaded')),
                        this.add_html_class('w3_js'),
                        'function' == typeof w3_events_on_end_js && w3_events_on_end_js(),
                        (this.lazy_trigger = setInterval(this.w3_trigger_lazy_script, 500, this)));
            }
            async w3_trigger_lazy_script(e) {
                e.lazy_scripts_load_fired &&
                    (await e.load_scripts(e.w3_scripts.lazy), e.add_html_class('jsload'), clearInterval(e
                        .lazy_trigger));
            }
            add_html_class(e) {
                document.getElementsByTagName('html')[0].classList.add(e);
            }
            register_scripts() {
                document.querySelectorAll('script[type=lazyload_int]').forEach((e) => {
                        e.hasAttribute('data-src') ?
                            e.hasAttribute('async') && !1 !== e.async ?
                            this.w3_scripts.async.push(e) :
                            (e.hasAttribute('defer') && !1 !== e.defer) || 'module' === e.getAttribute(
                                'data-w3-type') ?
                            this.w3_scripts.defer.push(e) :
                            this.w3_scripts.normal.push(e) :
                            this.w3_scripts.normal.push(e);
                    }),
                    document.querySelectorAll('script[type=lazyload_ext]').forEach((e) => {
                        this.w3_scripts.lazy.push(e);
                    });
            }
            register_styles() {
                document.querySelectorAll('link[data-href]').forEach((e) => {
                    this.w3_styles.push(e);
                });
            }
            async execute_script(e) {
                return (
                    await this.repaint_frame(),
                    new Promise((t) => {
                        let s = document.createElement('script'),
                            a;
                        [...e.attributes].forEach((e) => {
                                let t = e.nodeName;
                                'type' !== t &&
                                    'data-src' !== t &&
                                    ('data-w3-type' === t && ((t = 'type'), (a = e.nodeValue)), s
                                        .setAttribute(t, e.nodeValue));
                            }),
                            e.hasAttribute('data-src') ?
                            (s.setAttribute('src', e.getAttribute('data-src')),
                                s.addEventListener('load', t),
                                s.addEventListener('error', t)) :
                            ((s.text = e.text), t()),
                            null !== e.parentNode && e.parentNode.replaceChild(s, e);
                    })
                );
            }
            async execute_styles(e) {
                var t;
                let s;
                return (
                    (t = e),
                    void(((s = document.createElement('link')).href = t.getAttribute('data-href')),
                        (s.rel = 'stylesheet'),
                        document.head.appendChild(s),
                        t.parentNode.removeChild(t))
                );
            }
            async load_scripts(e) {
                let t = e.shift();
                return t ? (await this.execute_script(t), this.load_scripts(e)) : Promise.resolve();
            }
            async load_styles(e) {
                let t = e.shift();
                return t ? (this.execute_styles(t), this.load_styles(e)) : 'loaded';
            }
            async load_fonts(e) {
                var t = document.createDocumentFragment();
                e.forEach((e) => {
                        let s = document.createElement('link');
                        (s.href = e), (s.rel = 'stylesheet'), t.appendChild(s);
                    }),
                    setTimeout(function() {
                        document.head.appendChild(t);
                    }, google_fonts_delay_load);
            }
            preload_scripts(e) {
                var t = document.createDocumentFragment(),
                    s = 0,
                    a = this;
                [...e].forEach((i) => {
                        let n = i.getAttribute('data-href');
                        if (n) {
                            let l = document.createElement('link');
                            (l.href = n),
                            (l.rel = 'preload'),
                            (l.as = 'style'),
                            s++,
                            e.length == s && (l.dataset.last = 1),
                                t.appendChild(l),
                                (l.onload = function() {
                                    fetch(this.href, {
                                            mode: 'no-cors',
                                        })
                                        .then((e) => e.blob())
                                        .then((e) => {
                                            a.update_css_loader();
                                        })
                                        .catch((e) => {
                                            a.update_css_loader();
                                        });
                                }),
                                (l.onerror = function() {
                                    a.update_css_loader();
                                });
                        }
                    }),
                    document.head.appendChild(t);
            }
            update_css_loader() {
                document
                    .getElementsByTagName('html')[0]
                    .setAttribute(
                        'data-css-loaded',
                        parseInt(document.getElementsByTagName('html')[0].getAttribute('data-css-loaded')) + 1
                    ),
                    document.getElementsByTagName('html')[0].getAttribute('data-css') ==
                    document.getElementsByTagName('html')[0].getAttribute('data-css-loaded') &&
                    document.getElementsByTagName('html')[0].classList.add('css-preloaded');
            }
            hold_event_listeners() {
                let e = {};

                function t(t, s) {
                    !(function(t) {
                        function s(s) {
                            return e[t].eventsToRewrite.indexOf(s) >= 0 ? 'w3-' + s : s;
                        }
                        e[t] ||
                            ((e[t] = {
                                    originalFunctions: {
                                        add: t.addEventListener,
                                        remove: t.removeEventListener,
                                    },
                                    eventsToRewrite: [],
                                }),
                                (t.addEventListener = function() {
                                    (arguments[0] = s(arguments[0])), e[t].originalFunctions.add.apply(t,
                                        arguments);
                                }),
                                (t.removeEventListener = function() {
                                    (arguments[0] = s(arguments[0])), e[t].originalFunctions.remove.apply(t,
                                        arguments);
                                }));
                    })(t),
                    e[t].eventsToRewrite.push(s);
                }

                function s(e, t) {
                    let s = e[t];
                    Object.defineProperty(e, t, {
                        get: () => s || function() {},
                        set(a) {
                            e['w3' + t] = s = a;
                        },
                    });
                }
                t(document, 'DOMContentLoaded'),
                    t(window, 'DOMContentLoaded'),
                    t(window, 'load'),
                    t(window, 'pageshow'),
                    t(document, 'readystatechange'),
                    s(document, 'onreadystatechange'),
                    s(window, 'onload'),
                    s(window, 'onpageshow');
            }
            hold_jquery(e) {
                let t = window.jQuery;
                Object.defineProperty(window, 'jQuery', {
                    get: () => t,
                    set(s) {
                        if (s && s.fn && !e.allJQueries.includes(s)) {
                            s.fn.ready = s.fn.init.prototype.ready = function(t) {
                                if (void 0 !== t)
                                    return (
                                        e.scripts_load_fired ?
                                        e.domReadyFired ?
                                        t.bind(document)(s) :
                                        document.addEventListener('w3-DOMContentLoaded', () => t
                                            .bind(document)(s)) :
                                        t.bind(document)(s),
                                        s(document)
                                    );
                            };
                            let a = s.fn.on;
                            (s.fn.on = s.fn.init.prototype.on =
                                function() {
                                    if ('ready' == arguments[0]) {
                                        if (this[0] !== document) return a.apply(this, arguments), this;
                                        arguments[1].bind(document)(s);
                                    }
                                    if (this[0] === window) {
                                        function e(e) {
                                            return e
                                                .split(' ')
                                                .map((e) => ('load' === e || 0 === e.indexOf('load.') ?
                                                    'w3-jquery-load' : e))
                                                .join(' ');
                                        }
                                        'string' == typeof arguments[0] || arguments[0] instanceof String ?
                                            (arguments[0] = e(arguments[0])) :
                                            'object' == typeof arguments[0] &&
                                            Object.keys(arguments[0]).forEach((t) => {
                                                Object.assign(arguments[0], {
                                                    [e(t)]: arguments[0][t],
                                                })[t];
                                            });
                                    }
                                    return a.apply(this, arguments), this;
                                }),
                            e.allJQueries.push(s);
                        }
                        t = s;
                    },
                });
            }
            async execute_domcontentloaded() {
                (this.domReadyFired = !0),
                await this.repaint_frame(),
                    document.dispatchEvent(new Event('w3-DOMContentLoaded')),
                    await this.repaint_frame(),
                    window.dispatchEvent(new Event('w3-DOMContentLoaded')),
                    await this.repaint_frame(),
                    document.dispatchEvent(new Event('w3-readystatechange')),
                    await this.repaint_frame(),
                    document.w3onreadystatechange && document.w3onreadystatechange();
            }
            async execute_window_load() {
                await this.repaint_frame(),
                    setTimeout(function() {
                        window.dispatchEvent(new Event('w3-load'));
                    }, 100),
                    await this.repaint_frame(),
                    window.w3onload && window.w3onload(),
                    await this.repaint_frame(),
                    this.allJQueries.forEach((e) => e(window).trigger('w3-jquery-load')),
                    window.dispatchEvent(new Event('w3-pageshow')),
                    await this.repaint_frame(),
                    window.w3onpageshow && window.w3onpageshow();
            }
            exe_document_write() {
                let e = new Map();
                document.write = document.writeln = function(t) {
                    let s = document.currentScript,
                        a = document.createRange(),
                        i = s.parentElement,
                        r = e.get(s);
                    void 0 === r && ((r = s.nextSibling), e.set(s, r));
                    let n = document.createDocumentFragment();
                    a.setStart(n, 0), n.appendChild(a.createContextualFragment(t)), i.insertBefore(n, r);
                };
            }
            async repaint_frame() {
                return new Promise((e) => requestAnimationFrame(e));
            }
            static execute() {
                let e = new w3_loadscripts([
                    'keydown',
                    'mousemove',
                    'touchmove',
                    'touchstart',
                    'touchend',
                    'wheel',
                ]);
                e.load_fonts(e.w3_fonts),
                    e.user_events_add(e),
                    e.excluded_js || e.hold_jquery(e),
                    e.w3_lazy_load_js || ((e.scripts_load_fire = 1), e.triggerListener_on_load());
                let t = setInterval(
                    function e(s) {
                        null != document.body &&
                            (document.body.getBoundingClientRect().top < -30 && s.triggerListener(), clearInterval(
                                t));
                    },
                    500,
                    e
                );
            }
            static run() {
                let e = new w3_loadscripts(['keydown', 'mousemove', 'touchmove', 'touchstart', 'touchend', 'wheel']);
                e.load_fonts(e.w3_fonts),
                    e.user_events_add(e),
                    e.excluded_js || e.hold_jquery(e),
                    e.w3_lazy_load_js || ((e.scripts_load_fire = 1), e.triggerListener_on_load());
                e.triggerListener();
            }
            wnwAnalytics() {
                document.querySelectorAll('.analytics').forEach(function(e) {
                    trekkie.integrations = !1;
                    var t = document.createElement('script');
                    (t.innerHTML = e.innerHTML), e.parentNode.insertBefore(t, e.nextSibling), e.parentNode
                        .removeChild(e);
                });
            }
            wnwBoomerang() {
                document.querySelectorAll('.boomerang').forEach(function(e) {
                    window.BOOMR.version = !1;
                    var t = document.createElement('script');
                    (t.innerHTML = e.innerHTML), e.parentNode.insertBefore(t, e.nextSibling), e.parentNode
                        .removeChild(e);
                });
                setTimeout(function() {
                    document.querySelectorAll('.critical2').forEach(function(a) {
                        a.remove();
                    });
                }, 8000);
            }
        }
        setTimeout(function() {
            w3_loadscripts.execute();
            window.dispatchEvent(new Event('wnw_load'));
        }, 1000);
    </script>
    <link rel="dns-prefetch" href="https://ajax.googleapis.com">
    <link rel="preconnect" href="https://ajax.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    <style scoped>
        @font-face {
            font-family: Lato;
            font-weight: 400;
            font-style: normal;
            font-display: swap;
            src: url("//speakingroses.com/cdn/fonts/lato/lato_n4.c86cddcf8b15d564761aaa71b6201ea326f3648b.woff2?h1=c3BlYWtpbmctcm9zZXMtcHJpbnRlZC1mbG93ZXItc2hvcC5hY2NvdW50Lm15c2hvcGlmeS5jb20&h2=c3BlYWtpbmdyb3Nlcy5jb20&hmac=4d424ad6fbdd13ffbd8e667ed011a827f65901c2d3a8ffd474a37b1c4b2fcb78") format("woff2"), url("//speakingroses.com/cdn/fonts/lato/lato_n4.e0ee1e2c008a0f429542630edf70be01045ac5e9.woff?h1=c3BlYWtpbmctcm9zZXMtcHJpbnRlZC1mbG93ZXItc2hvcC5hY2NvdW50Lm15c2hvcGlmeS5jb20&h2=c3BlYWtpbmdyb3Nlcy5jb20&hmac=50d622ec7ea1008f4259380988f0a58720ee0b8f891af0cac091ced106932730") format("woff");
        }

        @font-face {
            font-family: Lato;
            font-weight: 400;
            font-style: normal;
            font-display: swap;
            src: url("//speakingroses.com/cdn/fonts/lato/lato_n4.c86cddcf8b15d564761aaa71b6201ea326f3648b.woff2?h1=c3BlYWtpbmctcm9zZXMtcHJpbnRlZC1mbG93ZXItc2hvcC5hY2NvdW50Lm15c2hvcGlmeS5jb20&h2=c3BlYWtpbmdyb3Nlcy5jb20&hmac=4d424ad6fbdd13ffbd8e667ed011a827f65901c2d3a8ffd474a37b1c4b2fcb78") format("woff2"), url("//speakingroses.com/cdn/fonts/lato/lato_n4.e0ee1e2c008a0f429542630edf70be01045ac5e9.woff?h1=c3BlYWtpbmctcm9zZXMtcHJpbnRlZC1mbG93ZXItc2hvcC5hY2NvdW50Lm15c2hvcGlmeS5jb20&h2=c3BlYWtpbmdyb3Nlcy5jb20&hmac=50d622ec7ea1008f4259380988f0a58720ee0b8f891af0cac091ced106932730") format("woff");
        }

        @font-face {
            font-family: Lato;
            font-weight: 400;
            font-style: normal;
            font-display: swap;
            src: url("//speakingroses.com/cdn/fonts/lato/lato_n4.c86cddcf8b15d564761aaa71b6201ea326f3648b.woff2?h1=c3BlYWtpbmctcm9zZXMtcHJpbnRlZC1mbG93ZXItc2hvcC5hY2NvdW50Lm15c2hvcGlmeS5jb20&h2=c3BlYWtpbmdyb3Nlcy5jb20&hmac=4d424ad6fbdd13ffbd8e667ed011a827f65901c2d3a8ffd474a37b1c4b2fcb78") format("woff2"), url("//speakingroses.com/cdn/fonts/lato/lato_n4.e0ee1e2c008a0f429542630edf70be01045ac5e9.woff?h1=c3BlYWtpbmctcm9zZXMtcHJpbnRlZC1mbG93ZXItc2hvcC5hY2NvdW50Lm15c2hvcGlmeS5jb20&h2=c3BlYWtpbmdyb3Nlcy5jb20&hmac=50d622ec7ea1008f4259380988f0a58720ee0b8f891af0cac091ced106932730") format("woff");
        }

        :root {
            --color-link: #204a80;
            --color-sale: #838383;
            --color-price: #595959;
            --color-secondary-buttons: #26b522;
            --color-secondary-buttons-text: #ffffff;
            --color-secondary-buttons-hover: #1A7117;
            --color-secondary-buttons-text-hover: #ffffff;
            --newsletter-submit-color: #FFFFFF;
            --newsletter-submit-hover: #1d891a;
            --newsletter-submit-text-color: #000000;
            --newsletter-submit-text-color-hover: #fff;
            --size-chart-color: #006BA2;
            --color-disabled: #000000;
            --color-disabled-border: #000000;
            --color-error: #ff6d6d;
            --color-error-bg: #ffffff;
            --color-success: #000000;
            --color-success-bg: #000000;
            --transition-duration: 250ms;
            --transition-timing: ease-in-out;
            --grid-medium: 46.85rem;
            --grid-large: 61.85rem;
            --grid-widescreen: 87.5rem;
            --grid-max-width: 73.75rem;
            --grid-gutter: 30px;
            --small: 'small';
            --medium: 'medium';
            --medium-down: 'medium-down';
            --medium-up: 'medium-up';
            --large: 'large';
            --large-down: 'large-down';
            --large-up: 'large-up';
            --widescreen: 'widescreen';
            --breakpoints: (--small '(max-width: #{--grid-medium - 1})', --medium '(min-width: #{--grid-medium}) and (max-width: #{--grid-large - 1})', --medium-down '(max-width: #{--grid-large - 1})', --medium-up '(min-width: #{--grid-medium})', --large '(min-width: #{--grid-large}) and (max-width: #{--grid-widescreen - 1})', --large-down '(max-width: #{--grid-widescreen - 1})', --large-up '(min-width: #{--grid-large})', --widescreen '(min-width: #{--grid-widescreen})');
            --headerFont: Lato;
            --copyBodyFont: Lato;
            --h1Size: 32px;
            --h1SizeTablet: 30px;
            --h1SizeMobile: 28px;
            --h1Color: #000;
            --h2Size: 36px;
            --h2SizeTablet: 22px;
            --h2SizeMobile: 20px;
            --h2Color: #000;
            --h3Size: 18px;
            --h3SizeTablet: 18px;
            --h3SizeMobile: 16px;
            --h3Color: #000;
            --h4Size: 20px;
            --h4SizeTablet: 18px;
            --h4SizeMobile: 13px;
            --h4Color: #000;
            --h5Size: 18px;
            --h5SizeTablet: 16px;
            --h5SizeMobile: 14px;
            --h5Color: #000;
            --h6Size: 16px;
            --h6SizeTablet: 16px;
            --h6SizeMobile: 14px;
            --h6Color: #000;
            --copy_body: 16px;
            --copy_body_tablet: 22px;
            --copy_body_mobile: 14px;
            --titleReview: 16;
            --titleReviewTablet: 16;
            --titleReviewMobile: 16;
            --smallFont: 16;
            --wrapperWidth: 1220px;
            --tagBadgeBackgroundColor: #005fff;
            --tagBadgeTextColor: #fff;
            --tagBadgePosition: ribbon-top-left;
            --tagBadgeTextSize: 10px;
            --tagBadgeTextSmallSize: 10px;
            --productTitleTransform: capitalize;
            --ProductComparePriceFontSize: 10px;
            --AddToCartFontSize: 16px;
            --AddToCartTextTransform: uppercase;
            --AddToCartBorderRadius: 10px;
            --AddToCartTextColor: #fff;
            --AddToCartTextColorHover: #fff;
            --ProductTitleFontSize: 30px;
            --ProductSubtitleFontSize: 16px;
            --ProductTitleFontSizeTablet: 30px;
            --ProductSubtitleFontSizeTablet: 16px;
            --ProductTitleFontSizeMobile: 20px;
            --ProductSubtitleFontSizeMobile: 12px;
            --ProductPriceFontSize: 24px;
            --ProductPriceFontSizeTablet: 24px;
            --ProductPriceFontSizeMobile: 16px;
            --product_info_mobile_direction: left;
            --AddToCartFontWeight: normal;
            --AddToCartBackground: #A84F65;
            --AddToCartBackgroundHover: #924357;
            --SocialShareTitleColor: #000000;
            --SocialShareColor: #000;
            --colorGiftBorder: #000;
            --color_out_of_stock_label: #767676;
            --select-icon: url(//speakingroses.com/cdn/shop/t/12/assets/icon-arrow-down_30x.png?v=126378520099475741281695383956);
            --iconCheckmarkChecked: ;
            --SelectVariantButtonBackground: #ff0000;
            --SelectVariantButtonText: #fff;
            --collectionListBackgroundColor: ;
            --collectionListFontColor: ;
            --collectionNoProductMessageFontSize: 18px;
            --colorCollectionSwatch: #26b522;
            --colorCollectionSwatchCheck: #fff;
            --collectionTitleTextTransform: uppercase;
            --colorSubCollection: #334F8D;
            --colorCollectionProductTitle: #000000;
            --sizeDescription: 125px;
            --collectionEnabledFilterSticky: true;
            --collectionProductPriceSize: 18px;
            --collectionProductComparePriceSize: 15px;
            --NoItemsFontSize: 18;
            --colorSeemore: 24px;
            --colorDescription: 24px;
            --colorFontButtonCart: #fff;
            --colorItemTitlecart: #000;
            --colorPhoneNumber: #000000;
            --blogTitleTransform: capitalize;
            --colorFontBlog: #333;
            --buttonBackgroundColorBlog: #26b522;
            --buttonBackgroundHoverColorBlog: #56aad7;
            --buttonBorderColorBlog: #56aad7;
            --buttonBorderHoverColorBlog: #56aad7;
            --buttonTextHoverColorBlog: #fff;
            --newsBackgroundColorBlog: #404040;
            --newsTextColorBlog: #fff;
            --newsButtonTextColorBlog: #fff;
            --buttonColortextBlog: #fff;
            --buttonTextColorHoverBlog: #fff;
            --ColorTexBartBlog: #fff;
            --backgroundTitleBlog: #333;
            --buttonColorBackgroundBlog: #58afea;
            --buttonHoverColorBackgroundBlog: #4386b3;
            --sidebarTextColor: #333;
            --breadcrumbFontSize: 16px;
            --breadcrumbFontSizeTablet: 16px;
            --breadcrumbFontSizeMobile: 12px;
            --breadcrumbtextcolor: #999999;
            --breadcrumbtextstyle: normal;
            --breadcrumbLinkColor: #4B4B4B;
            --progressATCBackgroundColor: #f00;
            --thankYouTextColor: #fff;
            --CouponTextColor: #cb0808;
            --thankYouBackground: #fff;
            --stock_warning_background_color: #ebeaea;
            --stock_warning_text_color: ;
            --out_of_stock_text_color: #fff;
            --out_of_stock_background_color: #FF0000;
            --yousave-color: #000000;
            --product-slider-width: 50%;
            --product-info-alignment: flex-start;
            --tooltip-size: 70px;
            --iconCheckmarkChecked: #fff;
            --colorTitleSearchSuggestion: #418bc3;
            --colorTextSearchSuggestion: #000;
        }
    </style>
    <style>
        html {
            scroll-behavior: smooth;
        }

        * {
            margin: 0;
            padding: 0;
            outline: 0;
            box-sizing: border-box;
            font-family: var(--copyBodyFont), Arial, sans-serif;
        }

        body {
            font-size: var(--copy_body);
            line-height: 1.3;
        }

        .page-title,
        .title,
        h1 {
            font-size: var(--h1Size);
            color: var(--h1Color);
        }

        h2 {
            font-size: var(--h2Size);
            color: var(--h2Color);
        }

        .grid-product-title,
        .item-title,
        .item-title a,
        h3 {
            font-size: var(--h3Size);
            color: var(--h3Color);
        }

        h4 {
            font-size: var(--h4Size);
            color: var(--h4Color);
        }

        h5 {
            font-size: var(--h5Size);
            color: var(--h5Color);
        }

        h6 {
            font-size: var(--h6Size);
            color: var(--h6Color);
        }

        .drawer__title,
        .grid-product-title,
        .item-title,
        .item-title a,
        .page-title,
        .product-title,
        .section-title,
        .title,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        h1 span,
        h2 span,
        h3 span,
        h4 span,
        h5 span,
        h6 span,
        h1 a,
        h2 a,
        h3 a,
        h4 a,
        h5 a,
        h6 a {
            font-family: var(--headerFont), Arial, sans-serif;
        }

        .input- checkbox,
        input,
        input.text,
        input[type='button'],
        input[type='submit'],
        input[type='text'],
        textarea {
            -moz-appearance: none;
            appearance: none;
            -webkit-appearance: none;
            -webkit-border-radius: 0px;
            border-radius: 0;
        }

        input[type='checkbox'] {
            background-color: initial;
            cursor: default;
            -webkit-appearance: checkbox;
            box-sizing: border-box;
            margin: 3px 0.5ex;
            padding: initial;
            border: initial;
        }

        em,
        i {
            font-style: italic;
        }

        img {
            display: block;
            height: auto;
        }

        iframe,
        img,
        svg {
            max-width: 100%;
        }

        .responsive-image--no-image {
            background-color: #eee;
        }

        @-moz-document url-prefix() {
            img:-moz-loading {
                visibility: hidden;
            }
        }

        .price {
            color: var(--color-price);
            font-weight: 700;
        }

        .drawer__title,
        .item-title,
        .page-title,
        .product-title,
        .section-title,
        .title,
        b,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        h1 span,
        h2 span,
        h3 span,
        h4 span,
        h5 span,
        h6 span,
        h1 a,
        h2 a,
        h3 a,
        h4 a,
        h5 a,
        h6 a,
        strong {
            font-weight: 700;
            width: 100%;
        }

        a {
            text-decoration: none;
            cursor: pointer;
            color: var(--color-link);
        }

        button {
            -webkit-appearance: none;
            border: none;
            cursor: pointer;
        }

        button[disabled]:after,
        button[disabled]:before {
            background-color: #bbb !important;
            color: #bbb !important;
        }

        button[disabled] svg {
            fill: #bbb !important;
        }
    </style>
    <style class="critical2">
        .main-menu ol,.main-menu ul{padding: 0 !important;}
        .visually-hidden {
            display: none;
            visibility: hidden;
        }

        .wrapper {
            width: 100%;
            max-width: var(--wrapperWidth);
            margin: 0 auto;
            clear: both;
            padding: 0 20px;
        }

        .btn {
            width: 100%;
            font-weight: 400;
            border: none;
            float: left;
        }

        .section-title {
            display: block;
            padding: 35px 0;
            text-align: center;
            width: 100%;
        }

        body .mobile {
            display: none;
        }

        .spr-badge-caption {
            color: #000;
        }

        .shopify-section {
            clear: both;
            float: left;
            display: block;
            width: 100%;
        }

        .fixed {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1;
        }

        body .hide {
            display: none;
        }

        body .underline {
            text-decoration: underline;
        }

        .prices-wrapper {
            text-align: center;
        }

        .overflow {
            overflow: hidden;
        }

        .bold {
            font-weight: 700;
        }

        .flex {
            display: flex;
        }

        .flex-row-reverse {
            flex-direction: row-reverse;
        }

        .flex-space-between {
            justify-content: space-between;
        }

        .flex-align-start {
            align-items: flex-start;
        }

        .full {
            width: 100%;
        }

        .msg {
            display: block;
            padding: 5px;
            background-color: transparent;
            border: 1px solid transparent;
            font-size: 14px;
            margin-top: 20px;
        }

        .msg.msg-error {
            background-color: #ffe6e6;
            border-color: #ffadad;
        }

        .choose-option {
            position: relative;
            outline: 2px solid rgba(255, 0, 0, 0.9);
            padding: 3px;
        }

        .choose-option:before {
            content: 'Choose an option';
            position: absolute;
            line-height: 16px;
            top: -24px;
            left: 0;
            color: red;
            background-color: #fff;
            width: 202px;
        }

        @keyframes blink {
            0% {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .lowercase {
            text-transform: lowercase;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .capitalize {
            text-transform: capitalize;
        }

        .text-underline {
            text-decoration: underline;
        }

        .main-content {
            clear: both;
            transition: all 0.4s cubic-bezier(0.46, 0.01, 0.32, 1);
        }

        .icon-loading {
            display: flex;
            justify-content: center;
            background: #fff;
            width: 100%;
            height: 200px;
            position: relative;
        }

        .icon-loading .lds-css.ng-scope {
            padding: 0;
        }

        .products-reviews-stars.no-mobile {
            text-align: left;
            margin: 0 auto;
            display: block;
        }

        @keyframes lds-spinner {
            0% {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }

        @-webkit-keyframes lds-spinner {
            0% {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }

        .rte {
            line-height: 1.6;
        }

        .rte ol,
        .rte ul {
            padding-left: 2rem;
        }

        .rte p,
        .rte ul,
        .rte ol {
            margin-bottom: 16px;
        }

        .rte a:hover,
        .rte a:active {
            text-decoration: underline;
        }

        .rte h2 {
            margin-bottom: 0.75rem;
        }

        .rte h3 {
            margin-bottom: 1rem;
        }

        .page-margin-bottom {
            display: table;
            margin-bottom: 50px;
        }

        .custom-html {
            margin-top: 5px;
        }

        body .jdgm-prev-badge__text {
            margin-left: 5px;
            font-size: 0.8rem;
            color: #000;
            font-weight: 400;
            display: block;
        }

        body .jdgm-widget.jdgm-widget,
        body .jdgm-prev-badge {
            width: 100%;
            display: flex !important;
        }

        body .collection-items .jdgm-prev-badge {
            display: flex;
            justify-content: left;
        }

        .jdgm-widget input:not([type='submit']),
        .jdgm-widget textarea {
            padding: 5px 10px;
        }

        .jdgm-widget textarea {
            resize: none;
        }

        .template-list-collections .rte-h1 {
            font-weight: 400;
        }

        .wrapper .rte-h1.below {
            padding-top: 20px;
        }

        .back-to-top {
            font-family: var(--copyBodyFont), Arial, sans-serif;
        }

        .coupon_text {
            text-align: left;
            color: var(--CouponTextColor);
            background-color: var(--thankYouBackground);
        }

        .thank_you {
            text-align: left;
        }

        .thank_you strong {
            background-color: var(--thankYouBackground);
        }

        .template-index .shopify-section.banner~.banner {
            margin-bottom: 40px;
        }

        .template- .shopify-policy__container {
            max-width: 1280px;
        }

        .reset_password-title {
            text-transform: capitalize;
            font-size: 2.2rem;
            text-align: center;
            line-height: 1.3;
        }

        .form-reset-password>form {
            margin: 50px auto 80px !important;
        }

        @media (max-width: 1019px) {
            body * {
                font-size: var(--copy_body_tablet);
            }

            span,
            b,
            strong,
            em,
            i,
            u,
            a,
            option {
                font-family: inherit;
                font-size: inherit;
            }

            body h1,
            body .page-title,
            body .title {
                font-size: var(--h1SizeTablet);
                color: var(--h1Color);
            }

            body h2 {
                font-size: var(--h2SizeTablet);
                color: var(--h2Color);
            }

            body h3,
            body .grid-product-title,
            body .item-title a,
            body .item-title {
                font-size: var(--h3SizeTablet);
                color: var(--h3Color);
            }

            body h4 {
                font-size: var(--h4SizeTablet);
                color: var(--h4Color);
            }

            body h5 {
                font-size: var(--h5SizeTablet);
                color: var(--h5Color);
            }

            body h6 {
                font-size: var(--h6SizeTablet);
                color: var(--h6Color);
            }

            .section-title {
                padding: 20px 0;
            }
        }

        @media (max-width: 767px) {
            body * {
                font-size: var(--copy_body_mobile);
            }

            .jdgm-widget.jdgm-widget {
                align-items: center;
            }

            .jdgm-prev-badge__stars {
                margin: 0 !important;
            }

            .jdgm-rev-widg {
                display: block;
                clear: both;
                width: 100%;
            }

            span,
            b,
            strong,
            em,
            i,
            u,
            a,
            option {
                font-family: inherit;
                font-size: inherit;
            }

            body h1,
            body .page-title,
            body .title {
                font-size: var(--h1SizeMobile);
                color: var(--h1Color);
            }

            body h2 {
                font-size: var(--h2SizeMobile);
                color: var(--h2Color);
            }

            body h3,
            body .grid-product-title,
            body .item-title a,
            body .item-title {
                font-size: var(--h3SizeMobile);
                color: var(--h3Color);
            }

            body h4 {
                font-size: var(--h4SizeMobile);
                color: var(--h4Color);
            }

            body h5 {
                font-size: var(--h5SizeMobile);
                color: var(--h5Color);
            }

            body h6 {
                font-size: var(--h6SizeMobile);
                color: var(--h6Color);
            }

            body .product-half.half-img.flex-row-reverse {
                padding: 0;
            }

            .section-title {
                padding: 10px 0;
            }

            body .mobile {
                display: block;
                width: 100%;
            }

            body .no-mobile {
                display: none !important;
            }

            .btn-add-tocart {
                height: 43px;
                line-height: 43px;
            }

            .btn-add-tocart span {
                font: inherit;
            }

            .wrapper .rte-h1.below {
                padding-top: 0;
            }

            .template-cart .section-title {
                font-size: 18px;
                max-width: 200px;
                margin: 0 auto;
            }

            .slick-content {
                margin: 0 0 26px;
            }

            .wrapper {
                width: 100%;
                padding: 0 20px;
            }

            .credit_cards_page img {
                display: none;
            }
        }

        header,
        nav,
        section,
        article,
        aside,
        footer {
            display: block;
        }

        @media print {
            @page {
                margin: 0.5cm;
            }

            p,
            h2,
            h3 {
                orphans: 3;
                widows: 3;
            }

            h2,
            h3 {
                page-break-after: avoid;
            }

            html,
            body {
                background-color: #fff;
            }

            .giftcard-header {
                padding: 10px 0;
            }

            .giftcard__content,
            .giftcard__border {
                border: 0 none;
            }

            .giftcard__actions,
            .giftcard__wrap:before,
            .giftcard__wrap:after,
            .tooltip,
            .add-to-apple-wallet {
                display: none;
            }

            .giftcard__title {
                float: none;
                text-align: center;
            }

            .giftcard__code__text {
                color: #555;
            }

            .shop-url {
                display: block;
            }

            .logo {
                color: #58686f;
            }
        }

        @-webkit-keyframes popup {
            0% {
                opacity: 0;
                -webkit-transform: translateY(30px);
            }

            60% {
                opacity: 1;
                -webkit-transform: translateY(-10px);
            }

            80% {
                -webkit-transform: translateY(2px);
            }

            to {
                -webkit-transform: translateY(0);
            }
        }

        @-ms-keyframes popup {
            0% {
                opacity: 0;
                -webkit-transform: translateY(30px);
            }

            60% {
                opacity: 1;
                -webkit-transform: translateY(-10px);
            }

            80% {
                -webkit-transform: translateY(2px);
            }

            to {
                -webkit-transform: translateY(0);
            }
        }

        @keyframes popup {
            0% {
                opacity: 0;
                -webkit-transform: translateY(30px);
            }

            60% {
                opacity: 1;
                -webkit-transform: translateY(-10px);
            }

            80% {
                -webkit-transform: translateY(2px);
            }

            to {
                -webkit-transform: translateY(0);
            }
        }

        @-webkit-keyframes container-slide {
            0% {
                opacity: 0;
                -webkit-transform: rotate(0deg);
            }

            to {
                -webkit-transform: rotate(0deg);
            }
        }

        @-ms-keyframes container-slide {
            0% {
                opacity: 0;
                -webkit-transform: rotate(0deg);
            }

            to {
                -webkit-transform: rotate(0deg);
            }
        }

        @keyframes container-slide {
            0% {
                opacity: 0;
                -webkit-transform: rotate(0deg);
            }

            to {
                -webkit-transform: rotate(0deg);
            }
        }

        @-webkit-keyframes fadein {
            0% {
                opacity: 0;
            }

            to {
                opacity: 100;
            }
        }

        @-ms-keyframes fadein {
            0% {
                opacity: 0;
            }

            to {
                opacity: 100;
            }
        }

        @keyframes fadein {
            0% {
                opacity: 0;
            }

            to {
                opacity: 100;
            }
        }

        @keyframes spinner {
            0% {
                transform: translate(-50%, -50%) rotate(0);
            }

            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }
    </style>
    <style class="critical2">
        .grid-uniform {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            gap: 8vh 2%;
            list-style: none;
        }

        .grid-uniform--s2 .grid__item {
            flex-basis: 48%;
        }

        .grid-uniform--s3 .grid__item {
            flex-basis: 32%;
        }

        .grid-uniform--s4 .grid__item {
            flex-basis: 23.5%;
        }

        .grid-uniform--s5 .grid__item {
            flex-basis: 18.4%;
        }

        .grid__item {
            position: relative;
            text-align: center;
            width: 325px;
        }

        .grid__item-title {
            margin: 10px 0 3px 0;
        }

        .grid__item-reviews-wrapper {
            text-align: left;
        }

        .grid__item-image-wrapper {
            position: relative;
            height: 0;
            padding-top: 100%;
            overflow: hidden;
            width: 259px;
            height: 350px;
        }

        .grid__item-image {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: translate(-50%, -50%);
        }

        .grid__item-title {
            margin: 10px 0 3px 0;
            text-align: left;
        }

        .grid__item-title-link {
            color: var(--h3Color);
        }

        .grid__item-compare-at-price,
        .grid__item-price,
        .grid__item-sold-out {
            font-weight: bold;
            text-align: center;
        }

        .grid__item-compare-at-price {
            margin-right: 10px;
            color: var(--color-sale, #a00);
            text-decoration-line: line-through;
            font-size: var(--collectionProductComparePriceSize);
        }

        .grid__item-price-wrapper {
            margin: 5px 0 0;
            text-align: left;
        }

        .grid__item-price {
            color: var(--color-price, rgb(25, 156, 25));
        }

        .grid__item-sold-out {
            display: block;
            color: var(--color_out_of_stock_label, #a00);
            margin-top: 6px;
            padding: 5px 0;
            background-color: var(--stock_warning_background_color);
        }

        .grid__item-swatch-wrapper {
            margin-top: 3px;
        }

        .grid__item--hidden-image img {
            opacity: 0;
            visibility: hidden;
        }

        .recently-viewed-products .grid-uniform {
            justify-content: center;
        }

        .recently-viewed-products .grid__item-price-wrapper {
            display: flex;
        }
    </style>
    <style class="critical2">
        .mobile-nav,
        .mobile-nav>.dinamic-item+.dinamic-item {
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .shipping-text>.wrapper {
            justify-content: center;
            flex-wrap: wrap;
        }

        .shipping-text>.wrapper,
        .shipping-text .shipping-text-content {
            display: flex;
        }

        .shipping-text .shipping-text-content {
            flex-direction: column;
            align-items: center;
            flex: 0 0 23.5%;
            text-align: center;
        }

        .shipping-text .shipping-text-content .shipping-text-text {
            font-weight: bold;
            margin-bottom: 10px;
            max-width: 100%;
        }

        .shipping-text .shipping-text-content svg {
            height: 28px;
            width: auto;
        }

        .shipping-bar--fixed {
            position: sticky;
            top: 0;
        }

        .shipping-bar__section-item,
        .shipping-bar__wrapper {
            display: flex;
            align-items: center;
        }

        .shipping-bar__wrapper {
            height: 50px;
            justify-content: space-between;
        }

        .shipping-bar__section-item,
        .shipping-bar__item {
            flex: 1;
        }

        .shipping-bar__item {
            line-height: 1.15;
        }

        .shipping-bar__item:nth-of-type(1) {
            text-align: left;
        }

        .shipping-bar__item:nth-of-type(2) {
            text-align: center;
        }

        .shipping-bar--info-style .shipping-bar__item:nth-of-type(2) {
            text-transform: uppercase;
        }

        .shipping-bar__item:nth-of-type(3) {
            text-align: right;
        }

        .shipping-bar__item--small {
            max-width: 230px;
        }

        .shipping-bar__item svg {
            width: 16px;
            height: 16px;
        }

        .shipping-bar__link {
            color: inherit;
            font: inherit;
        }

        .shipping-bar__section-item {
            justify-content: center;
            height: calc(100% - 10px);
            width: 33%;
        }

        .shipping-bar__section-item+.shipping-bar__section-item {
            border-left: 1px solid var(--shipping-bar-items-line-color, #fff);
        }

        .shipping-bar__section-image {
            width: 100%;
            max-width: 25px;
            margin-right: 10px;
        }

        .shipping-bar--discount-style .shipping-bar__discount-value {
            background: var(--shipping-bar-price-background, rgb(28, 168, 28));
            margin: 0 4px;
            display: inline-block;
            color: var(--shipping-bar-price-text-color, rgb(255, 255, 255));
        }

        .shipping-bar--discount-style .shipping-bar__discount-value:not(:last-child) {
            margin-right: 4px;
        }

        .shipping-bar .shipping-bar__message {
            display: flex;
            justify-content: center;
            text-transform: uppercase;
        }

        @media (max-width: 1019px) {
            .shipping-bar__item--small {
                max-width: 190px;
            }
        }

        @media (max-width: 767px) {
            .shipping-text .shipping-text-content {
                flex-direction: column;
                align-items: center;
                flex: 0 0 48%;
                text-align: center;
            }

            .shipping-text .shipping-text-content p {
                font-weight: normal;
            }
        }

        @media (max-width: 479px) {
            .shipping-bar__item {
                font-size: 0.85rem;
            }

            .shipping-bar__section-item {
                font-size: 10px;
            }
        }
    </style>
    <style class="critical2">
        .header__sitewide__wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--vasta-border-color-on-mobile, black);
            min-height: 80px;
        }

        .header__logo {
            flex: 1;
            text-align: center;
            border-right: 1px solid var(--vasta-border-color-on-mobile, black);
            border-left: 1px solid var(--vasta-border-color-on-mobile, black);
            min-height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header__logo svg,
        .header__logo img {
            margin: 0 auto;
        }

        .header__search__form__wrapper {
            flex: 1;
            margin: 16px auto;
            max-width: 95%;
        }

        .header__search__form {
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 700px;
        }

        .header__search__form .button {
            background-color: var(--search-button-color, #fff);
            border-color: var(--search-button-color, #fff);
            color: var(--vasta-search-text-button-color, #fff);
            font-weight: 700;
            text-transform: uppercase;
            height: 37px;
            width: 20%;
            min-width: 90px;
        }

        .header__search__form .button:hover,
        .header__search__form .button:active {
            background-color: var(--vasta-search-button-hover-color, #000);
            border-color: var(--vasta-search-button-hover-color, #000);
            color: var(--vasta-search-text-button-hover-color, #e5e5e5);
        }

        .header__search__form .header__search__input {
            border: 1px solid var(--vasta-search-border-color, #ccc);
            border-radius: 3px 0 0 3px;
            color: #000;
            font-size: 1rem;
            padding: 6px 12px;
            margin: 0;
            height: 37px;
            width: 80%;
        }

        .header__icon__wrap {
            position: relative;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-transform: var(--header_fallback_text_transform);
            width: 20%;
            min-height: 80px;
        }

        .header__icon__count__wrap {
            display: flex;
            align-items: center;
            position: relative;
        }

        .header__icon__wrap svg {
            width: 30px;
            height: auto;
        }

        .header__icon__wrap.icon--menu {
            display: flex;
        }

        .header__cart__count::before {
            content: "("
        }

        .header__cart__count:after {
            content: ")";
        }

        .header__icon__wrap.icon--menu svg path {
            fill: var(--vasta_menu_color, black)
        }

        .header__icon__wrap.icon--menu {
            color: var(--vasta_menu_title_color, black)
        }

        .header__icon__wrap.icon--cart svg path {
            fill: var(--vasta-cart-color, #fff);
        }

        .header__cart__text {
            color: var(--cart_title_color, black);
            font-size: var(--cart_title_font_size);
        }

        .header__menu {
            background-color: ;
        }

        .header__menu svg {
            width: 16px;
            margin: 0 12px;
            fill: var(--nav-text-color, #fff);
        }

        .header__menu .header__item__anchor>svg {
            margin: 0;
            margin-left: 10px;
        }

        .header__list {
            list-style: none;
        }

        .header__list.list--parent {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header__list:not(.list--parent) {
            display: none;
            align-items: flex-start;
            position: absolute;
            top: 100%;
            left: 0;
        }

        .header__list.list--parent .header__list__item>a.header__item__anchor {
            font-size: var(--vasta_item_nav_menu_font_size);
        }

        .header__list.list--child {
            background: var(--vasta-dropdown-menu-color, #fff);
            display: none;
            z-index: 2;
            min-width: px;
            width: max-content;
        }

        .header__list.list--grandchild {
            background: var(--vasta-dropdown-menu-color, #fff);
            left: 100%;
            top: 0;
        }

        .header__list.list--child .header__list__item>a.header__item__anchor {
            font-size: var(--vasta_item_nav_menu_dropdown_font_size);
        }

        .header__list__item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            white-space: nowrap;
        }

        .header__list__item:hover,
        .header__list__item:active {
            background-color: var(--vasta-dropdown-menu-color, #fff);
        }

        .header__list__item:hover>a.header__item__anchor,
        .header__list__item:active>a.header__item__anchor {
            color: var(--vasta-menu-hover-text-color, #fff);
        }

        .header__list__item:hover>svg,
        .header__list__item:active>svg {
            fill: var(--vasta-menu-hover-text-color, #fff);
        }

        .header__list__item:hover>.header__list:not(.list--parent),
        .header__list__item:active>.header__list:not(.list--parent) {
            display: block;
        }

        .header__list.list--child .header__list__item,
        .header__list.list--child .header__list__item {
            background-color: var(--nav-drpback-color, #f9f9f9);
            border-bottom: 2px solid var(--vasta_dropdown_menu_border_color, #f9f9f9);
        }

        .header__list.list--child .header__list__item:hover,
        .header__list.list--child .header__list__item:active {
            background-color: var(--nav-drphover-color, #f9f9f9);
        }

        .header__list.list--child .header__list__item>a.header__item__anchor,
        .header__list.list--child .header__list__item>a.header__item__anchor {
            color: var(--vasta-dropdown-menu-text-color, #000);
        }

        .header__list.list--child .header__list__item>svg,
        .header__list.list--child .header__list__item>svg {
            fill: var(--vasta-dropdown-menu-text-color, #000);
            transform: rotate(-90deg);
        }

        .header__list.list--child .header__list__item:hover>a.header__item__anchor,
        .header__list.list--child .header__list__item:active>a.header__item__anchor {
            color: var(--vasta-dropdown-menu-hover-text-color, #000);
        }

        .header__list.list--child .header__list__item:hover>svg,
        .header__list.list--child .header__list__item:active>svg {
            fill: var(--vasta-dropdown-menu-hover-text-color, #000);
        }

        .header__item__anchor {
            display: flex;
            align-items: center;
            color: var(--nav-text-color, #fff);
            padding: 10px 16px;
        }

        .search-button-span svg {
            width: 20px;
            height: auto;
        }

        @media(min-width: 768px) {
            .header__wrapper {
                max-width: var(--wrapperWidth);
                padding: 14px 20px 15px;
                margin: 0 auto;
                width: 100%;
            }

            .header__logo svg,
            .header__logo img {
                padding: unset;
            }

            .header__logo img {
                margin: 15px 0;
            }

            .header__sitewide__wrapper {
                border-bottom: unset;
                min-height: unset;
            }

            .header__search__form__wrapper {
                margin: 0 10%;
            }

            .header__search__form .button {
                font-size: 1rem;
            }

            .header__logo {
                flex: unset;
                text-align: unset;
                border-right: unset;
                border-left: unset;
                min-height: unset;
            }

            .header__icon__wrap {
                width: unset;
                min-height: unset;
            }

            .header__icon__wrap.icon--menu {
                display: none;
            }

            .header__cart__count {
                position: absolute;
                padding: 0px;
                top: -12px;
                right: -17px;
                border-radius: 50%;
                color: var(--vasta-icon-color-text, #fff);
                background-color: var(--vasta-icon-color, #26b522);
                font-size: 14px;
                min-width: 20px;
                min-height: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .header__cart__count:hover {
                color: var(--vasta-icon-color-text-hover, #1A7117);
                background-color: var(--vasta-icon-color-hover, #1A7117);
            }

            .header__cart__count::before {
                content: unset;
            }

            .header__cart__count:after {
                content: unset;
            }

            .header__icon__count__wrap {
                right: 2px;
            }
        }

        @media(max-width: 767px) {

            .header__logo svg,
            .header__logo img {
                margin: 10px;
            }

            .header__cart__count {
                color: var(--vasta-icon-color, #26b522);
            }

            .header__cart__count:hover {
                color: var(--vasta-icon-color-text-hover, #1A7117)
            }

            .header__search__form .button {
                font-size: .8rem;
            }

            .header__icon__wrap.icon--cart svg {
                width: 25px;
                height: auto;
            }

            .header__icon__wrap.icon--menu svg {
                width: 21px;
                height: 21px;
                margin-bottom: 2px;
            }
        }

        @media only screen and (max-width: 1019px) and (min-width: 767px) {
            .header__list.list--parent .header__list__item>a.header__item__anchor {
                font-size: var(--vasta_item_nav_menu_font_size_tablet);
            }

            .header__list.list--child .header__list__item>a.header__item__anchor {
                font-size: var(--vasta_item_nav_menu_dropdown_font_size_tablet);
            }
        }

        .logo-image+.main-menu {
            margin: 0 1%;
        }

        .cart-icon-wrap {
            width: 15%;
            display: flex;
            justify-content: flex-end;
        }

        .cart-icon-wrapper {
            text-align: center;
        }

        .logo-image .main-logo-link {
            display: flex;
            align-content: center;
            flex-direction: column;
            justify-content: center;
        }

        @media screen and (-ms-high-contrast: active),
        (-ms-high-contrast: none) {
            .loaderIE.active {
                visibility: visible;
                opacity: 1;
            }
        }

        .loaderIE {
            position: fixed;
            background-color: #fff;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            z-index: 99999999999;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            transition: ease all 300ms;
            opacity: 0;
            visibility: hidden;
        }

        .loaderIE p,
        .loaderIE span {
            margin-top: 15px;
            color: #919191;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: space-between;
        }

        .loaderIE p span,
        .loaderIE span span {
            font-size: 35px;
        }

        .loader-bars:before,
        .loader-bars:after,
        .loader-bars span {
            content: '';
            display: block;
            position: relative;
            left: 0;
            top: 0;
            width: 10px;
            height: 30px;
            background-color: #919191;
            -webkit-animation: grow 1.5s linear infinite;
            animation: grow 1.5s linear infinite;
        }

        .loader-bars:after {
            -webkit-animation: grow 1.5s linear -0.5s infinite;
            animation: grow 1.5s linear -0.5s infinite;
        }

        .loader-bars span {
            -webkit-animation: grow 1.5s linear -1s infinite;
            animation: grow 1.5s linear -1s infinite;
        }

        @-webkit-keyframes grow {
            0% {
                -webkit-transform: scaleY(0);
                transform: scaleY(0);
                opacity: 0;
            }

            50% {
                -webkit-transform: scaleY(1);
                transform: scaleY(1);
                opacity: 1;
            }

            100% {
                -webkit-transform: scaleY(0);
                transform: scaleY(0);
                opacity: 0;
            }
        }

        @keyframes grow {
            0% {
                -webkit-transform: scaleY(0);
                transform: scaleY(0);
                opacity: 0;
            }

            50% {
                -webkit-transform: scaleY(1);
                transform: scaleY(1);
                opacity: 1;
            }

            100% {
                -webkit-transform: scaleY(0);
                transform: scaleY(0);
                opacity: 0;
            }
        }

        .wrapper-shipping-bar {
            max-width: 1280px;
            width: 100%;
        }

        header .wrap {
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: ease all 400ms;
        }

        .shippingbar_padding {
            padding-top: 45px;
        }

        .cart-title-desktop {
            display: none;
        }

        @media (max-width: 1019px) {
            .main-menu .main-menu-items {
                flex-wrap: wrap;
            }

            .main-menu .main-menu-items .menu-item>.menu-link {
                font-size: var(--vasta_item_nav_menu_font_size_tablet, 15px);
            }

            .main-menu .main-menu-items .menu-item .main-menu-items .menu-item svg {
                top: 36%;
            }

            section[data-section-id='header'] .header-desktop #search-form {
                padding: 0 30px;
                max-width: 490px;
                margin: 0 1%;
            }

            section[data-section-id='header'] .header-desktop #search-form button {
                font-size: 0.8rem;
                padding: 0;
            }

            .style-wrapper {
                width: 100%;
            }
        }

        @media (max-width: 767px) {
            .template-cart section[data-section-id='header'] .header-mobile {
                border: none;
            }

            .main-logo {
                width: auto;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            section.info-style div:nth-child(2) {
                width: auto;
            }

            .shipping-bar.shipping_1 .shipping-bar-text,
            .shipping-bar.shipping_1 .shipping-bar-text strong {
                font-size: 15px;
            }

            .fallback-text svg {
                fill: #fff;
                position: relative;
                width: 20px;
            }

            section[data-section-id='header'] .header-mobile {
                border-bottom: 1px solid var(--vasta-border-color-on-mobile, #000);
                padding: 0;
            }

            section[data-section-id='header'] .header-mobile .grid__item,
            section[data-section-id='header'] .header-mobile .cart-icon {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            section[data-section-id='header'] .header-mobile .cart-icon-wrap {
                border-left: 1px solid var(--vasta-border-color-on-mobile, #000);
                align-items: center;
                display: flex;
                justify-content: center;
            }

            section[data-section-id='header'] .header-mobile .cart-icon-wrap .cart-icon {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                font-size: 14px;
                color: #000;
            }

            section[data-section-id='header'] .header-mobile .cart-icon-wrap .cart-icon span {
                position: relative;
                text-align: center;
                width: 100%;
            }

            .header-mobile .grid__item {
                border-right: 1px solid var(--vasta-border-color-on-mobile, #000);
            }

            .logo-image {
                padding: 5px 10px;
                width: 100%;
            }

            .template-cart .main-header .logo-image {
                justify-content: space-between;
                align-items: center;
                padding-left: 0;
                padding-right: 0;
            }

            .grid__item,
            .cart-icon-wrap {
                flex: 0 0 20%;
            }

            .cart-text {
                display: flex;
                justify-content: center;
            }

            section[data-section-id='header'] .header-mobile #cart-count span:before {
                content: '(';
            }

            section[data-section-id='header'] .header-mobile #cart-count span:after {
                content: ')';
            }

            section[data-section-id='header'] .header-mobile #cart-count span {
                width: 15px;
                height: 15px;
                line-height: 16px;
                bottom: 7px;
                font-size: 15px;
                background-color: #fff;
                color: var(--vasta-icon-color, #fff);
                position: static;
                pointer-events: none;
            }

            section[data-section-id='header'] .header-mobile #cart-count span:hover,
            section[data-section-id='header'] .header-mobile #cart-count span:active {
                color: var(--vasta-icon-color-hover, #fff);
            }

            section[data-section-id='header'] .wrap {
                display: flex;
                padding: 0;
                align-items: initial;
                width: 100%;
            }

            section[data-section-id='header'] .header-mobile #cart-count svg {
                width: 25px;
                margin-right: 0;
            }

            section[data-section-id='header'] .header-mobile #cart-count svg path {
                fill: var(--vasta-cart-color, #fff);
            }

            .site-nav--mobile {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .site-nav--mobile button {
                color: #000;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                font-size: 14px;
                width: 100%;
                height: 100%;
            }

            .site-nav--mobile button svg {
                width: 21px;
            }

            .site-nav--mobile button svg path {
                color: #000;
            }

            .site-nav--mobile .icon {
                width: 15px;
                height: 20px;
            }

            .site-nav--mobile,
            .cart-icon-wrap {
                width: 100%;
            }

            .site-nav--mobile {
                height: 100%;
            }

            body .search.mobile {
                display: flex;
                margin: 15px 0;
                justify-content: center;
                transition: all 400ms cubic-bezier(0.46, 0.01, 0.32, 1);
            }

            body .search.mobile button {
                text-transform: uppercase;
                font-size: 10px;
                background-color: var(--search-button-color, #000);
                color: var(--vasta-search-text-button-color, #fff);
                margin: 0px;
                border: none;
            }

            body .search.mobile button:hover,
            body .search.mobile button:active {
                background-color: var(--vasta-search-button-hover-color, #000);
                color: var(--vasta-search-text-button-hover-color, #e5e5e5);
            }

            body .search.mobile input {
                color: #000;
                border: 1px solid var(--vasta-search-border-color, #f6f6f6);
            }

            .search input {
                padding: 7px;
                width: 75%;
                height: 37px;
                margin-top: 0;
                border: 1px solid #e5e5e5;
                font-size: 14px;
            }

            .header-cart .info-header svg {
                width: 13px;
                margin-top: 0;
                top: 0;
            }

            .header-cart .info-header .phone-cart,
            .header-cart .info-header .email-cart,
            .header-cart .info-header .content-cart-text {
                font-size: 13px;
                display: flex;
                align-items: center;
                justify-content: flex-end;
            }

            .site-nav--mobile button svg path {
                fill: var(--vasta_menu_color, black);
            }
        }

        @media (max-width: 479px) {
            .shipping-bar-icons {
                font-size: 9px;
            }

            .logo-image {
                max-height: inherit;
                width: 100%;
                padding: 7px 10px;
                text-align: center;
            }

            .template-cart .logo-image img {
                margin: 0 auto;
                width: auto;
            }

            .header-mobile .cart-icon-wrap .cart-icon {
                height: 69px;
            }

            section[data-section-id='header'] .header-mobile #cart-count svg,
            .site-nav--mobile button svg {
                width: 19px;
            }

            .site-nav--mobile button {
                color: var(--vasta_icon_title_color, black);
            }
        }
    </style>
    <style class="critical2">
        .cart-drawer .shipping-bar__message {
            color: var(--color-free-shipping-text-color);
        }

        .cart-open .DrawerOverlay,
        .js-drawer-open-left .DrawerOverlay {
            visibility: visible;
            opacity: 1;
        }

        .DrawerOverlay {
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 151;
            visibility: hidden;
            opacity: 0;
            transition: ease all 0.3s;
        }

        header {
            transition: all 0.4s cubic-bezier(0.46, 0.01, 0.32, 1);
        }

        .js-drawer-open-left {
            overflow: hidden !important;
        }

        .js-drawer-open-left . {
            width: 100%;
        }

        .js-drawer-open-left .drawer--left {
            -ms-transform: translateX(400px);
            -webkit-transform: translateX(400px);
            transform: translateX(400px);
            overflow: auto;
            z-index: 99999;
        }

        .drawer--left {
            width: 400px;
            left: -400px;
            border-right: 1px solid var(--vasta-background-menu-mobile, #fff);
            max-width: 85%;
        }

        .drawer {
            display: flex;
            flex-direction: column;
            top: 0;
            bottom: 0;
            position: fixed;
            -webkit-overflow-scrolling: touch;
            padding: 0 15px 15px;
            color: var(--vasta-font-color-menu-mobile, #444);
            background-color: var(--vasta-background-menu-mobile, #fff);
            transition: all 0.4s cubic-bezier(0.46, 0.01, 0.32, 1);
            z-index: 152;
        }

        .mobile-nav.static {
            margin-top: 0;
        }

        .mobile-nav.static a.item-link.uppercase {
            padding-bottom: 0;
        }

        .mobile-nav.static li.mobile-nav__item.dinamic-item a {
            padding: 10px 15px;
            text-decoration: none;
            word-break: break-word;
            width: 90%;
            font-size: 15px;
            display: flex;
            align-items: center;
            line-height: 21px;
            color: var(--vasta-font-color-menu-mobile, #444);
        }

        .mobile-nav {
            margin: 20px -15px 0 -15px;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .mobile-nav .item-menu-mobile.mobile-nav__link img {
            width: 20px;
            margin-right: 10px;
        }

        .mobile-nav>.dinamic-item+.dinamic-item {
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        #Contact_menu-mobile .thank_you {
            color: red;
        }

        .drawer__header {
            position: relative;
            display: flex;
            padding: 12px 0;
            width: 100%;
            align-items: center;
            justify-content: space-between;
        }

        .drawer__close,
        .drawer__title {
            font-size: 1.4rem;
        }

        .drawer__close {
            cursor: pointer;
        }

        .drawer__close svg {
            width: 20px;
            height: 20px;
        }

        .drawer__close button {
            position: relative;
            right: 0;
            color: inherit;
            background-color: transparent;
            border: none;
        }

        .mobile-nav__item {
            position: relative;
            display: block;
        }

        .search-bar {
            display: flex;
            justify-content: flex-end;
        }

        .search-bar .input-group-field {
            border-radius: 3px 0 0 3px;
            width: 100%;
            height: 37px;
            border: none;
            padding: 0 10px;
            border: solid 1px var(--vasta-border-menu-mobile, #ccc);
            color: var(--vasta-search-text-color-mobile, #e25c63);
            font-size: 14px;
        }

        .search-bar .jq-icon-fallback-text {
            border-radius: 0 3px 3px 0;
            padding: 6px 10px 5px;
            background-color: var(--vasta-button-color-menu-mobile, #444);
            color: #fff;
            height: 37px;
        }

        .search-button-span svg {
            fill: var(--vasta-button-icon-color-menu-mobile, #fff);
        }

        .nav-icon {
            padding: 10px 15px;
            text-decoration: none;
            width: 100%;
            font-size: 15px;
            align-items: center;
            line-height: 21px;
            display: flex !important;
            flex-direction: inherit !important;
        }

        .nav-icon svg {
            width: 19px;
            height: 19px;
            fill: var(--vasta-font-color-menu-mobile, #444);
            margin: 0 7px 0 0;
        }

        .nav-icon a {
            padding: 0 !important;
        }

        .supports-fontface .jq-icon-fallback-text .icon {
            display: inline-block;
        }

        .mobile-nav .news_letter_title {
            font-weight: 700;
            text-align: center;
            font-size: 13px;
            width: 100%;
            margin: 0 auto 8px;
        }

        .mobile-nav .child .item-menu-mobile {
            font-size: 13px;
        }

        .mobile-nav .button-menu-item {
            display: flex;
            width: 100%;
        }

        .mobile-nav .item-menu-mobile,
        .mobile-nav .mobile-nav__item .item-text .item-link {
            display: flex;
            align-items: center;
            line-height: 21px;
            color: var(--vasta-font-color-menu-mobile, #444);
            padding: 10px 15px;
            text-decoration: none;
            width: 90%;
            font-size: 15px;
        }

        .mobile-nav .dinamic-item,
        .mobile-nav .mobile-nav__item {
            display: flex;
            flex-direction: column;
        }

        .mobile-nav .dinamic-item .mobile-nav__toggle-open,
        .mobile-nav .mobile-nav__item .mobile-nav__toggle-open {
            width: 40px;
            height: 40px;
            border: none;
            background: transparent;
        }

        .mobile-nav .dinamic-item .mobile-nav__toggle-open:before,
        .mobile-nav .mobile-nav__item .mobile-nav__toggle-open:before {
            height: 17px;
            content: '';
            width: 2px;
            background-color: var(--vasta-font-color-menu-mobile, #444);
            top: 0;
            left: 13.5px;
            position: relative;
            display: block;
        }

        .mobile-nav .dinamic-item .mobile-nav__toggle-open:after,
        .mobile-nav .mobile-nav__item .mobile-nav__toggle-open:after {
            width: 17px;
            content: '';
            height: 2px;
            background-color: var(--vasta-font-color-menu-mobile, #444);
            position: relative;
            display: block;
            top: -10px;
            left: 6px;
            transform: rotate(0);
            transition: ease all 0.6s;
        }

        .mobile-nav .dinamic-item .anime-plus-hor::after,
        .mobile-nav .mobile-nav__item .anime-plus-hor::after {
            transform: rotate(180deg);
            transition: ease all 0.6s;
        }

        .mobile-nav .dinamic-item .anime-plus-ver::before,
        .mobile-nav .mobile-nav__item .anime-plus-ver::before {
            transform: rotate(270deg);
            transition: ease all 0.6s;
        }

        .mobile-nav .dinamic-item a svg,
        .mobile-nav .mobile-nav__item a svg {
            width: 19px;
            height: 19px;
            fill: var(--vasta-font-color-menu-mobile, #444);
            margin: 0 7px 0 0;
            overflow: visible;
        }

        .mobile-nav .child {
            display: none;
            margin: 0 0 0 30px;
        }

        .mobile-nav .newsletter-opt .newsletter-form.full .contact-form .buttonControlNewsletterForm .buttonNewsletterForm {
            width: 100%;
            margin: 0;
            bottom: 0;
            border: 0;
        }

        .mobile-nav .newsletter-opt .newsletter-form.full .contact-form .inputControlNewsletter .emailNewsletterForm {
            font-size: 12px;
        }

        .mobile-nav .newsletter-opt {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            padding: 10px 15px;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .mobile-nav .newsletter-opt .newsletter-message,
        .mobile-nav .newsletter-opt .thank_you {
            display: block;
            text-align: center;
            margin: 0 0 0.5rem;
            text-transform: uppercase;
            line-height: 1.4;
            color: var(--thankYouTextColor);
        }

        .mobile-nav .newsletter-opt .klaviyo_condensed_styling {
            display: flex;
            justify-content: center;
            height: 36px;
            margin: 0 auto;
            max-width: 100%;
            flex-wrap: wrap;
        }

        .mobile-nav .newsletter-opt .klaviyo_condensed_styling button input {
            font-size: 7px;
        }

        .mobile-nav .newsletter-opt .klaviyo_condensed_styling .klaviyo_messages .success_message .thank_you {
            color: var(--vasta-font-color-menu-mobile);
            display: inline;
        }

        .mobile-nav .newsletter-opt .klaviyo_condensed_styling .klaviyo_inputs_wrapper {
            width: 100%;
        }

        .mobile-nav .newsletter-opt .klaviyo_condensed_styling .klaviyo_form_actions {
            width: 40%;
            float: left;
        }

        .mobile-nav .newsletter-opt .klaviyo_condensed_styling .klaviyo_field_group {
            margin: 0;
            float: left;
            border: solid 1px #ccc;
            width: 60%;
            height: 100%;
            color: var(--vasta-font-color-menu-mobile, #444);
            line-height: 20px;
        }

        .mobile-nav .newsletter-opt .klaviyo_condensed_styling .klaviyo_field_group input {
            width: 100%;
            height: 100%;
            border: none;
            padding: 0 10px;
        }

        .mobile-nav .klaviyo_condensed_styling .klaviyo_submit_button,
        .mobile-nav .klaviyo_styling .klaviyo_submit_button {
            padding: 10px 4px;
            width: 100%;
            height: 36px;
            border-radius: 0;
        }

        .cart-drawer .btn-add-tocart {
            width: 100%;
        }

        .drawer-review_single+.drawer-review_single {
            margin-top: 20px;
        }

        .cart-drawer .btn-add-tocart.btn-add-tocart {
            margin-bottom: 10px;
        }

        .underline-link {
            text-decoration: underline;
            font-weight: 700;
            color: var(--color-continue-shopping-color, #43aecf);
        }

        .empty .cart-products-wrapper .list-products,
        .product-content.cart-products-wrapper .list-products {
            border: none;
        }

        span.free_shipping.money {
            width: 100%;
            font-weight: 700;
            font-size: inherit;
        }

        .shipping-drawer {
            text-align: center;
            background-color: var(--ship-back-color);
            padding: 10px 0;
        }

        body button[disabled='disabled'] {
            background-color: #eee !important;
            color: #bbb !important;
        }

        body button[disabled='disabled']:after,
        body button[disabled='disabled']:before {
            background-color: #bbb !important;
            color: #bbb !important;
        }

        body button[disabled='disabled'] svg {
            fill: #bbb !important;
        }

        body button[disabled='disabled'] svg:after,
        body button[disabled='disabled'] svg:before {
            background-color: #eee !important;
            color: #bbb !important;
        }

        span.shipping-discount-drawer {
            text-transform: uppercase;
            color: var(--ship-text-color, #fff);
            font-weight: 700;
            font-size: 1rem;
        }

        input[disabled='disabled'] {
            background-color: #eee;
            color: #bbb;
        }

        .cart-products-wrapper .cart-product .cart-product-btn-wrapper input.disable {
            background-color: #eee;
            color: #bbb;
        }

        .template-cart .cart-products-wrapper .list-products {
            border: none;
        }

        strong em {
            font-weight: 700;
        }

        .cart_discount_price {
            font-size: 14px;
        }

        .cart-drawer .trust-badges-wrapper .trust-badges-img.col-1 {
            width: 100%;
        }

        .cart-drawer .trust-badges-wrapper .trust-badges-img.col-2 {
            width: 47%;
        }

        .cart-drawer .trust-badges-wrapper .trust-badges-img.col-3 {
            width: 31%;
        }

        .cart-drawer .trust-badges-wrapper .trust-badges-img.col-4 {
            width: 22%;
        }

        .cart-drawer .trust-badges-wrapper .trust-badges-img.col-5 {
            width: 17%;
        }

        .cart-drawer .trust-badges-wrapper .trust-badges-img.col-6 {
            width: 14%;
        }

        .free-shipping-message {
            font-weight: 700;
            color: var(--color-price-cartDrawer, #b22222);
            margin-left: 5px;
        }

        .cart-products-wrapper {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            width: 100%;
            flex-direction: column;
        }

        .cart-products-wrapper .cart__empty.text-center {
            width: 100%;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .cart-products-wrapper .cart__empty.text-center .btn {
            background-color: #000;
            color: #fff;
            border: none;
            padding: 10px 15px;
            margin-bottom: 50px;
        }

        .cart-products-wrapper .cart__empty.text-center .empty-cart {
            margin: 0 !important;
            text-align: center;
        }

        .cart-products-wrapper .cart__empty.text-center .empty-cart {
            text-align: center;
            margin: 50px 0 20px 0;
            font-size: 14px;
        }

        .cart-products-wrapper form.jq-qtd-item-cart {
            display: flex;
            background: #fff;
        }

        .cart-products-wrapper .list-products {
            width: 100%;
            border-top: 1px solid #dddcdc;
        }

        .cart-products-wrapper .cart-product {
            padding: 7px 0;
            display: flex;
            border-bottom: 1px solid #dddcdc;
        }

        .cart-products-wrapper .cart-product .cart-product-wrapper {
            width: 100%;
            padding: 8px 0 10px 0;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            width: -webkit-fill-available;
        }

        .cart-products-wrapper .cart-product .cart-product-wrapper .product-info {
            width: auto;
        }

        .cart-products-wrapper .cart-product .cart-product-wrapper .free-shipping-message,
        .cart-products-wrapper .cart-product .cart-product-wrapper .price,
        .cart-products-wrapper .cart-product .cart-product-wrapper .title-item-cart {
            font-weight: 700;
            color: var(--color-cart-item-title, #000);
            line-height: 1.2;
        }

        .cart-products-wrapper .cart-product .cart-product-wrapper .price {
            display: flex;
            justify-content: flex-end;
            color: var(--color-price-cartDrawer, #b22222);
            font-size: 16px;
        }

        .cart-products-wrapper .cart-product .cart-product-wrapper small.product-variant {
            color: var(--color-font-cart-meta-product, grey);
            font-size: 12px;
            display: block;
        }

        .cart-products-wrapper .cart-product .cart-product-wrapper .bt-remove-cart {
            background-color: #fff;
            border: 1px solid #e4e4e4;
            padding: 5px 9px;
            font-size: 15px;
        }

        .cart-products-wrapper .cart-product .cart-product-wrapper .bt-remove-cart:hover,
        .cart-products-wrapper .cart-product .cart-product-wrapper .bt-remove-cart:active {
            border-color: #ccc;
        }

        .cart-products-wrapper .cart-product .cart-product-image-wrapper {
            padding-right: 10px;
            display: flex;
            align-items: baseline;
            margin-top: 8px;
        }

        .cart-products-wrapper .cart-product .cart-product-image-wrapper img {
            width: 100%;
            max-width: 100px;
            height: auto;
            object-fit: contain;
        }

        .cart-products-wrapper .cart-product .cart-product-image-wrapper a {
            width: 100%;
            position: relative;
            width: 90px;
        }

        .cart-products-wrapper .cart-product .cart-product-btn-wrapper {
            display: flex;
            margin-top: 15px;
        }

        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .btn.btn-minus,
        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .btn.btn-plus,
        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .input-qtd {
            background: #fff;
            border: 1px solid #dddcdc;
            width: 40px;
            text-align: center;
            margin: 0;
            position: relative;
            height: 31px;
            width: 33px;
        }

        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .btn.btn-minus:hover,
        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .btn.btn-minus:active,
        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .btn.btn-plus:hover,
        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .btn.btn-plus:active {
            background-color: #fbfbfb;
        }

        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .btn.btn-minus:active,
        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .btn.btn-plus:active {
            background-color: #f0f0f0;
        }

        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .btn.btn-minus svg,
        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .btn.btn-plus svg,
        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .input-qtd svg {
            display: block;
            margin: 0 auto;
        }

        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .input-qtd {
            border-left: 0 !important;
            border-right: 0 !important;
        }

        .cart-products-wrapper .cart-product .cart-product-btn-wrapper input[type='number'] {
            -moz-appearance: textfield;
            -webkit-appearance: textfield;
            appearance: textfield;
            margin: 0;
        }

        .cart-products-wrapper .cart-product .cart-product-btn-wrapper input[type='number']::-webkit-inner-spin-button,
        .cart-products-wrapper .cart-product .cart-product-btn-wrapper input[type='number']::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .cart-open {
            overflow: hidden !important;
        }

        .cart-container {
            padding: 0 15px 15px;
        }

        .cart-drawer-open .cart-drawer {
            right: 0;
        }

        .cart-drawer {
            position: fixed;
            width: 600px;
            overflow-y: auto;
            top: 0;
            bottom: 0;
            max-width: 90%;
            z-index: 152;
            color: var(--font-color-cartDrawer, #000);
            background-color: var(--background-color-cartDrawer, #fff);
            transition: all 0.4s cubic-bezier(0.46, 0.01, 0.32, 1);
            right: -100%;
        }

        .cart-container.empty .total-price {
            display: none;
        }

        .cart-container.empty .btn-add-tocart {
            display: none;
        }

        .cart_drawer__header {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 64px;
        }

        .cart_drawer__header .cartrow {
            display: flex;
            width: 100%;
            padding: 0 15px;
            margin: 5px 0 0 0;
            align-items: center;
        }

        .cart_drawer__header .cartrow .fallback-text {
            cursor: pointer;
        }

        .cart_drawer__header .drawer-title {
            font-size: var(--copy_body);
            font-weight: 400;
            margin: 0;
            width: 100%;
            text-transform: uppercase;
            line-height: 1;
            justify-content: center;
            height: 30px;
            display: flex;
            align-items: center;
        }

        .cart_drawer__header .drawer-title svg {
            width: 20px;
            fill: var(--background-color-button-proceed, #008000);
            height: 20px;
            margin: 0 5px 0 0;
            position: relative;
        }

        .cart-container .cart-bottom .paypal-div {
            margin: 7px 0 7px;
        }

        .cart-container .cart-product-btn-wrapper svg {
            fill: var(--font-color-cartDrawer, #000);
            width: 12px;
        }

        button.btn.btn-plus {
            font-size: 23px;
            line-height: 0;
        }

        .btn.icon-plus:before {
            content: '';
            position: absolute;
            background-color: #000;
            width: 2px;
            height: 12px;
            top: 32%;
            right: 47%;
        }

        .btn.icon-minus:after,
        .btn.icon-plus:after {
            content: '';
            position: absolute;
            background-color: #000;
            width: 12px;
            height: 2px;
            top: 49%;
            right: 31%;
        }

        .cart-container .cart-bottom .continue-shopping-div.bottom {
            margin: 10px 0 20px;
            display: flex;
        }

        .cart-container .cart-bottom .continue-shopping-div.top {
            display: flex;
            margin: 5px 0 9px;
            align-items: center;
        }

        .cart-container .continue-bellow-review {
            display: flex;
        }

        .continue-shopping-div.continue-bellow-review a {
            margin: 0 8px;
        }

        .cart-container .btn-add-tocart svg {
            width: 20px;
            max-height: 100%;
            fill: var(--font-color-button-proceed, #fff);
            margin-right: 4px;
            top: -1px;
            position: relative;
        }

        .cart-container .btn-add-tocart .cart-atc {
            color: var(--font-color-button-proceed, #fff);
        }

        .cart-container .btn-add-tocart:hover svg,
        .cart-container .btn-add-tocart:active svg {
            fill: var(--font-color-button-proceed_hover, #fff);
        }

        .cart-container .btn-add-tocart:hover .cart-atc,
        .cart-container .btn-add-tocart:active .cart-atc {
            color: var(--font-color-button-proceed_hover, #fff);
        }

        .cart-container .btn-add-tocart {
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 700;
            text-transform: capitalize;
            font-size: 23px;
            background-color: var(--background-color-button-proceed, #45910d);
        }

        .cart-container .btn-add-tocart:hover,
        .cart-container .btn-add-tocart:active {
            background-color: var(--background-color-button-proceed-hover, #45910d);
        }

        .cart-container .product-content {
            display: flex;
            border-top: 1px solid #dddcdc;
        }

        .cart-container .product-content .product-start {
            width: 35%;
        }

        .cart-container .product-content .product-start img {
            width: 70%;
            margin: 0 15px;
            transition: ease all 0.2s;
        }

        .cart-container .product-content .product-start img:hover,
        .cart-container .product-content .product-start img:active {
            opacity: 0.5;
        }

        .cart-container .product-content .product-middle {
            display: flex;
            flex-direction: column;
            width: 50%;
            max-width: 180px;
        }

        .cart-container .product-content .product-middle .product-title {
            margin: 0 0 20px 0;
            font-weight: 700;
            transition: all ease 0.2s;
        }

        .cart-container .product-content .product-middle .product-title:hover,
        .cart-container .product-content .product-middle .product-title:active {
            opacity: 0.5;
        }

        .cart-container .product-content .product-middle .product-quantity {
            display: flex;
            height: 30px;
            margin: 20px 0 0;
        }

        .cart-container .product-content .product-middle .button-minus,
        .cart-container .product-content .product-middle .button-plus {
            width: 30px;
            transition: ease all 0.3s;
        }

        .cart-container .product-content .product-middle .button-minus:hover,
        .cart-container .product-content .product-middle .button-minus:active,
        .cart-container .product-content .product-middle .button-plus:hover,
        .cart-container .product-content .product-middle .button-plus:active {
            background: #dadada;
        }

        .cart-container .product-content .product-middle .button-minus,
        .cart-container .product-content .product-middle .button-plus {
            border: 1px solid #dadada;
            background: #fff;
        }

        .cart-container .product-content .product-middle .quantity {
            width: 30px;
            text-align: center;
            -webkit-appearance: textfield;
            -moz-appearance: textfield;
            appearance: textfield;
            border-top: 1px solid #dadada;
            border-bottom: 1px solid #dadada;
            border-left: none;
            border-right: none;
            background: #fff;
        }

        .cart-container .product-content .product-middle .product-meta span {
            font-weight: 600;
            color: var(--color-font-cart-meta-product, #656565);
            padding: 0 15px 0 0;
        }

        .cart-container .product-content .product-end {
            margin: 0 0 100px 0;
            width: 30%;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .cart-container .product-content .product-end button {
            border: 1px solid #d9d9d9;
            background: #fff;
            padding: 10px 5px;
            margin: 20px 10px;
        }

        .cart-container .product-content .product-price {
            color: var(--color-price-cartDrawer, #b22222);
            text-align: center;
            margin-left: 10px;
            display: flex;
            flex-direction: column;
        }

        .cart-container .total-price {
            text-align: center;
            font-weight: 700;
            margin: 10px 0 10px 0;
            font-size: 20px;
        }

        .cart-container .total-price .price {
            color: var(--color-price-cartDrawer, #b22222);
            font-size: 20px;
        }

        .cart-container .cart-bottom .paypal {
            text-align: center;
        }

        .cart-container .cart-bottom .cupom-text {
            margin-bottom: 7px;
            text-transform: capitalize;
            font-size: 18px;
        }

        .cart-container .cart-bottom .cupom-code-drawer {
            font-weight: 700;
            text-align: center;
            margin: 5px 0 15px;
        }

        .cart-container .cart-bottom .cupom-code-drawer .cupom-spotlight {
            color: var(--counpon-text-color, #00f);
        }

        .cart-container .cart-bottom .reviews-cartDrawer {
            margin: 0 35px 22px 8px;
        }

        .cart-container .cart-bottom .reviews-cartDrawer .drawer-review_user {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .cart-container .cart-bottom .reviews-cartDrawer .drawer-review_user .user-img {
            width: 10%;
            height: 0;
            padding-top: 10%;
            overflow: hidden;
            border-radius: 100%;
            position: relative;
            top: 0;
            left: 0;
            margin-right: 8px;
        }

        .cart-container .cart-bottom .reviews-cartDrawer .drawer-review_user .user-img .drawer-user_image {
            height: auto;
            width: 100%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .cart-container .cart-bottom .reviews-cartDrawer .drawer-review_user .user-name {
            font-weight: 700;
            color: #3b5998;
            margin: 0;
            font-size: 17px;
        }

        .cart-container .cart-bottom .reviews-cartDrawer .stars-img {
            margin: 0 15px 0 0;
        }

        .cart-container .cart-bottom .reviews-cartDrawer .review-stars-verified {
            color: red;
            font-weight: 600;
            margin: 10px 0 10px 0;
        }

        .cart-container .cart-bottom .reviews-cartDrawer .drawer-review_single p {
            font-weight: var(--review-style, 600);
        }

        .cart-container .paypal-div {
            width: 100%;
            text-align: center;
            margin: 15px 0;
        }

        .cart-container .cart-bottom {
            display: flex;
            flex-direction: column;
        }

        .cart_discount_price {
            margin-bottom: 4px;
            color: var(--color-price-cartDrawer, #b22222);
        }

        .bt-remove-cart {
            margin-top: 4px;
        }

        .max-msg {
            font-size: 12px;
            width: 125px;
            text-align: center;
            color: #fff;
            position: absolute;
            background-color: #757575;
            border-radius: 5px;
            bottom: -4px;
            left: 41px;
            pointer-events: none;
            line-height: 1.3;
            margin: 0;
            padding: 5px;
            display: none;
            z-index: 1;
        }

        .cart-product--max-items .btn-plus {
            pointer-events: none;
            background-color: #eee !important;
            color: #bbb !important;
        }

        .cart-product--max-items .btn-plus:before,
        .cart-product--max-items .btn-plus:after {
            background: #bbb;
        }

        .cart-product--max-items .max-msg:before {
            content: '';
            position: absolute;
            left: -13px;
            border: 7px solid transparent;
            border-right-color: #757575;
            top: 50%;
            transform: translatey(-50%);
        }

        .cart-product--max-items .max-msg {
            display: block;
        }

        .cart-drawer #ProceedToCheckoutTop.btn-add-tocart {
            margin-bottom: 20px;
        }

        .shipping-drawer {
            text-align: center;
            background-color: var(--ship-back-color);
            padding: 10px 0;
        }

        .shipping-discount-drawer {
            text-transform: uppercase;
            color: var(--ship-text-color, #fff);
            font-weight: 700;
            font-size: 1rem;
        }

        .cart-drawer strong em {
            font-weight: 700;
        }

        .cart_discount_price,
        .free-shipping-message {
            color: var(--color-price-cartDrawer, firebrick);
        }

        .cart_discount_price {
            font-size: 14px;
            margin-bottom: 4px;
        }

        .cart-drawer .trust-badges-wrapper .trust-badges-img.col-2 {
            width: 47%;
        }

        .cart-drawer .trust-badges-wrapper .trust-badges-img.col-3 {
            width: 31%;
        }

        .cart-drawer .trust-badges-wrapper .trust-badges-img.col-5 {
            width: 17%;
        }

        .cart-drawer .trust-badges-wrapper .trust-badges-img.col-6 {
            width: 14%;
        }

        .cart-products-wrapper .cart__empty.text-center .btn {
            background-color: #000;
            color: #fff;
            border: 0;
            padding: 10px 15px;
            margin-bottom: 50px;
        }

        .cart-products-wrapper form.jq-qtd-item-cart {
            display: flex;
            background: #fff;
        }

        .cart-products-wrapper .cart-product {
            display: flex;
            border-bottom: 1px solid #dddcdc;
        }

        .cart-products-wrapper .cart-product .cart-product-wrapper {
            width: 100%;
            padding: 8px 0 13px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            width: -webkit-fill-available;
        }

        .cart-products-wrapper .cart-product .cart-product-wrapper .product-info {
            width: auto;
        }

        .cart-products-wrapper .cart-product .cart-product-wrapper .title-item-cart {
            font-weight: 700;
            color: var(--color-cart-item-title, #000);
            font-size: 17px;
        }

        .cart-products-wrapper .cart-product .cart-product-wrapper .title-item-cart+.product-variant {
            margin-top: 2px;
        }

        .cart-products-wrapper .cart-product .cart-product-wrapper .price {
            font-weight: 700;
            color: var(--color-cart-item-title, #000);
        }

        .cart-products-wrapper .cart-product .cart-product-wrapper .free-shipping-message {
            font-weight: 700;
            color: var(--color-cart-item-title, #000);
            font-size: 17px;
        }

        .cart-products-wrapper .cart-product .cart-product-wrapper .price {
            display: flex;
            justify-content: flex-end;
            color: var(--color-price-cartDrawer, #b22222);
            font-size: 16px;
        }

        .cart-products-wrapper .cart-product .cart-product-wrapper small.product-variant {
            color: var(--color-font-cart-meta-product, gray);
            font-size: 12px;
            display: block;
        }

        .cart-products-wrapper .cart-product .cart-product-wrapper .js-cart__btn--remove {
            background-color: #fff;
            border: 1px solid #e4e4e4;
            padding: 5px 9px;
            font-size: 15px;
            position: relative;
        }

        .cart-products-wrapper .cart-product .cart-product-image-wrapper {
            padding-right: 10px;
            display: flex;
            align-items: baseline;
            margin: 4px 0;
        }

        .cart-products-wrapper .cart-product .cart-product-image-wrapper img {
            width: 100%;
            max-width: 100px;
            height: auto;
            object-fit: contain;
        }

        .cart-products-wrapper .cart-product .cart-product-image-wrapper a {
            position: relative;
            width: 75px;
            min-height: 75px;
        }

        .cart-products-wrapper .cart-product .cart-product-btn-wrapper {
            display: flex;
            margin-top: 10px;
        }

        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .btn.btn-minus,
        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .btn.btn-plus,
        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .input-qtd {
            background: 0 0;
            border: 1px solid #dddcdc;
            text-align: center;
            margin: 0;
            position: relative;
            height: 31px;
            width: 33px;
        }

        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .btn.btn-minus svg,
        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .btn.btn-plus svg,
        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .input-qtd svg {
            display: block;
            margin: 0 auto;
        }

        .cart-products-wrapper .cart-product .cart-product-btn-wrapper .input-qtd {
            border-left: 0 !important;
            border-right: 0 !important;
        }

        .cart-products-wrapper .cart-product .cart-product-btn-wrapper input[type='number'] {
            -moz-appearance: textfield;
            -webkit-appearance: textfield;
            appearance: textfield;
            margin: 0;
        }

        .cart-products-wrapper .cart-product .cart-product-btn-wrapper input[type='number']::-webkit-inner-spin-button,
        .cart-products-wrapper .cart-product .cart-product-btn-wrapper input[type='number']::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .js-cart__btn--plus[disabled='disabled'] .hide.max-msg {
            font-size: 12px;
            width: 155px;
            text-align: center;
            margin-top: 20px;
            color: #fff;
            position: absolute;
            background-color: #757575;
            padding: 0 5px;
            border-radius: 5px;
            bottom: -4px;
            left: 41px;
            display: block;
            pointer-events: none;
        }

        .hide.max-msg:before {
            content: '';
            border-bottom: 8px solid transparent;
            border-right: 13px solid #757575;
            border-top: 8px solid #75757500;
            position: absolute;
            top: -4px;
            left: -2%;
            transform: translate(-50%, 100%);
        }

        .cart-open {
            overflow: hidden !important;
        }

        .cart-drawer-open .cart-drawer {
            right: 0;
        }

        .cart-container .cart-bottom .paypal-div {
            margin: 7px 0;
        }

        .cart-container .cart-product-btn-wrapper svg {
            fill: var(--font-color-cartDrawer, #000);
            width: 12px;
        }

        .btn.icon-minus:after,
        .btn.icon-plus:after,
        .btn.icon-plus:before {
            content: '';
            position: absolute;
            background-color: #000;
            width: 2px;
            height: 12px;
            top: 32%;
            right: 47%;
        }

        .btn.icon-minus:after,
        .btn.icon-plus:after {
            width: 12px;
            height: 2px;
            top: 49%;
            right: 31%;
        }

        .cart-container .cart-bottom .continue-shopping-div.bottom {
            margin: 20px 0 0;
        }

        .cart-container .btn-add-tocart:hover svg,
        .cart-container .btn-add-tocart:active svg {
            fill: var(--font-color-button-proceed_hover, #fff);
        }

        .cart-container .btn-add-tocart:hover .cart-atc,
        .cart-container .btn-add-tocart:active .cart-atc {
            color: var(--font-color-button-proceed_hover, #fff);
        }

        .cart-container .btn-add-tocart:hover,
        .cart-container .btn-add-tocart:active {
            background-color: var(--background-color-button-proceed-hover, #45910d);
        }

        .cart-container .product-content .product-start {
            width: 35%;
        }

        .cart-container .product-content .product-start img {
            width: 70%;
            margin: 0 15px;
            transition: ease all 200ms;
        }

        .cart-container .product-content .product-middle {
            display: flex;
            flex-direction: column;
            width: 50%;
            max-width: 180px;
        }

        .cart-container .product-content .product-middle .product-title {
            margin: 0 0 20px;
            font-weight: 700;
            transition: all ease 200ms;
        }

        .cart-container .product-content .product-middle .product-quantity {
            display: flex;
            height: 30px;
            margin: 20px 0 0;
        }

        .cart-container .product-content .product-middle .button-minus,
        .cart-container .product-content .product-middle .button-plus {
            width: 30px;
            transition: ease all 300ms;
            border: 1px solid #dadada;
            background: #fff;
        }

        .cart-container .product-content .product-middle .button-minus:hover,
        .cart-container .product-content .product-middle .button-plus:hover,
        .cart-container .product-content .product-middle .button-minus:active,
        .cart-container .product-content .product-middle .button-plus:active {
            background: #dadada;
        }

        .cart-container .product-content .product-middle .quantity {
            width: 30px;
            text-align: center;
            -webkit-appearance: textfield;
            -moz-appearance: textfield;
            appearance: textfield;
            border-top: 1px solid #dadada;
            border-bottom: 1px solid #dadada;
            border-left: none;
            border-right: none;
            background: #fff;
        }

        .cart-container .product-content .product-middle .product-meta span {
            font-weight: 600;
            color: var(--color-font-cart-meta-product, #656565);
            padding: 0 15px 0 0;
        }

        .cart-container .product-content .product-end {
            margin: 0 0 100px;
            width: 30%;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .cart-container .product-content .product-end button {
            border: 1px solid #d9d9d9;
            background: #fff;
            padding: 10px 5px;
            margin: 20px 10px;
        }

        .cart-container .product-content .product-price {
            color: var(--color-price-cartDrawer, #b22222);
            text-align: center;
            margin: 0 0 0 13px;
            display: flex;
            flex-direction: column;
        }

        .cart-product .cart-product-wrapper .product-price {
            text-align: right;
        }

        .cart-product .cart-product-wrapper .product-price .compare-price {
            color: var(--color-sale);
            font-size: 14px;
            text-decoration: line-through;
            font-weight: 400;
            text-align: right;
        }

        .cart-container .cart-bottom .paypal {
            text-align: center;
        }

        .cart-container .cart-bottom .cupom-code-drawer .cupom-spotlight {
            color: var(--counpon-text-color, blue);
        }

        .cart-container .cart-bottom .reviews-cartDrawer .stars-img {
            margin: 0 15px 0 0;
        }

        .cart-container .cart-bottom .reviews-cartDrawer .review-stars-verified {
            color: red;
            font-weight: 600;
            margin: 10px 0;
            font-size: 13px;
        }

        .cart-container .cart-bottom .reviews-cartDrawer .drawer-review_single p {
            font-weight: var(--review-style, 600);
        }

        .js-cart__btn--remove {
            margin-top: 4px;
        }

        .cart-drawer .btn-add-tocart,
        .cart-drawer .trust-badges-wrapper .trust-badges-img.col-1 {
            width: 100%;
        }

        .empty .cart-products-wrapper .list-products,
        .product-content.cart-products-wrapper .list-products,
        .template-cart .cart-products-wrapper .list-products {
            border: 0;
        }

        body button[disabled='disabled'],
        body button[disabled='disabled'] svg:after,
        body button[disabled='disabled'] svg:before {
            background-color: #eee !important;
            color: #bbb !important;
        }

        .cart-products-wrapper .cart-product .cart-product-btn-wrapper input.disable,
        input[disabled='disabled'] {
            background-color: #eee;
            color: #bbb;
        }

        .cart-container.empty .btn-add-tocart,
        .cart-container.empty .total-price {
            display: none;
        }

        .cart-container .product-content .product-middle .product-title:hover,
        .cart-container .product-content .product-start img:hover,
        .cart-container .product-content .product-middle .product-title:active,
        .cart-container .product-content .product-start img:active {
            opacity: 0.5;
        }

        .js-cart__btn--remove .spinner {
            display: none;
            width: 18px;
            height: 18px;
            border-width: 2px;
            border-style: solid;
            border-radius: 100%;
            border-color: #888 #888 #888 transparent;
            animation: linear 0.57s 0s infinite spinner;
            top: 50%;
            left: 50%;
            position: absolute;
        }

        .cart__btn--removing {
            color: transparent;
        }

        .cart__btn--removing .spinner {
            display: block;
        }

        .cart-drawer .shipping-bar--counter {
            width: 100%;
            background: #ddd;
            position: relative;
            margin: 4px auto 15px;
            min-height: 30px;
            padding: 0;
        }

        .cart-drawer .shipping-bar--counter>.shipping-bar__counter-fill {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: var(--color-free-shipping-dynamic);
            pointer-events: none;
            z-index: -1;
            transition: linear all 0.2s;
        }

        .cart-drawer .shipping-bar .shipping-bar-text {
            color: var(--color-free-shipping-text-color);
        }

        .cart-drawer .shipping-bar__message {
            padding: 3px 0;
            text-align: center;
            position: relative;
            z-index: 2;
            height: 100%;
            margin-top: 2px;
        }

        .cart-drawer .shipping-bar__message-wrapper {
            display: block;
            height: 100%;
            padding: 2px 0;
        }

        .cart-drawer .shipping-bar--counter,
        .cart-drawer .shipping-bar--counter>.shipping-bar__counter-fill {
            border-radius: 50px;
            box-shadow: inset 0 3px 3px rgba(0, 0, 0, 0.12);
            z-index: 2;
            overflow: hidden;
        }

        .cart-container .btn-add-tocart {
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 700;
            text-transform: capitalize;
            font-size: 23px;
            background-color: var(--background-color-button-proceed, #45910d);
        }

        .cart-drawer .btn-add-tocart.btn-add-tocart {
            margin-bottom: 10px;
        }

        .btn-add-tocart {
            background: var(--AddToCartBackground);
            color: var(--AddToCartTextColor);
            position: relative;
        }

        .trust-badges-wrapper,
        .trust-badges-wrapper .trust-badges-img {
            display: flex;
            align-items: flex-start;
        }

        .trust-badges-wrapper {
            justify-content: center;
            width: 88%;
            margin: 0 auto;
        }

        .cart-container .btn-add-tocart svg {
            height: 50px;
        }

        .paypal {
            font-size: 23px;
        }

        .template-cart .header-cart-wrapper {
            padding-bottom: 12px;
        }

        .cart-products-wrapper .cart-product .cart-product-wrapper small.product-variant {
            width: 100%;
            overflow: hidden;
            word-break: break-all;
            text-transform: capitalize;
        }

        .lds-dual-ring {
            display: inline-block;
            width: 55px;
            height: 19px;
        }

        .lds-dual-ring:after {
            content: ' ';
            display: block;
            width: 19px;
            height: 19px;
            margin: 0 auto;
            border-radius: 50%;
            border: 1px solid #000;
            border-color: #000 transparent #000 transparent;
            animation: lds-dual-ring 1.2s linear infinite;
            position: relative;
            top: 3px;
        }

        @keyframes lds-dual-ring {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .template-cart .half-content.shipwholetext1 img {
            max-width: 100%;
        }

        .template-cart .main-content .cart__empty.text-center {
            width: max-content;
            margin: 0 auto;
            text-align: center;
        }

        .template-cart .main-content .btn-wrapper.btn-wrapper-2 form p {
            font-size: 17px;
        }

        .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-wrapper .product-info {
            width: 90%;
        }

        .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-wrapper small.product-variant {
            font-weight: 100;
        }

        .template-cart .main-content .btn-wrapper.btn-wrapper-2 form p {
            text-align: center;
        }

        .template-cart .main-content .cart__empty.text-center .btn {
            background-color: #000;
            color: #fff;
            border: none;
            padding: 10px 15px;
            margin-bottom: 50px;
            max-width: 200px;
        }

        .template-cart .main-content .cart__empty.text-center p {
            margin: 30px 0px 30px 0;
            text-align: center;
        }

        .template-cart .main-content .cart__empty.text-center .empty-cart {
            text-align: center;
            margin: 56px 0 20px 0;
        }

        .template-cart .main-content .text_botom_button {
            width: 90%;
            text-align: center;
            margin: 0 auto;
            font-size: 18px;
            font-weight: 400;
            line-height: 1.5;
            text-transform: capitalize;
        }

        .template-cart .main-content .btn-wrapper.img-end {
            justify-content: flex-end;
        }

        .template-cart .main-content .btn-wrapper-no-content {
            border-bottom: none !important;
            padding: 0 !important;
        }

        .template-cart .main-content .btn-wrapper {
            display: flex;
            justify-content: space-between;
            padding: 5px 0 15px;
            border-bottom: 1px solid #dddcdc;
            align-items: center;
        }

        .template-cart .main-content .btn-wrapper .text_botom_button {
            width: 100%;
            margin-top: 10px;
        }

        .template-cart .main-content .btn-wrapper>img {
            max-width: 320px;
        }

        .template-cart .main-content .btn-wrapper .btn-add-tocart {
            padding: 0 20px;
            font-weight: 700;
            color: var(--color-font-button-cart, #fff);
            background-color: var(--color-background-button, #26b522);
            height: 43px;
            line-height: 43px;
            text-transform: capitalize;
            min-width: 372px;
        }

        .template-cart .main-content .btn-wrapper .btn-add-tocart svg {
            width: 16px;
            height: 28px;
            fill: var(--color-font-button-cart, white);
            margin-right: 3px;
            position: relative;
            top: -2px;
        }

        .template-cart .main-content .btn-wrapper .btn-add-tocart:hover,
        .template-cart .main-content .btn-wrapper .btn-add-tocart:active {
            color: var(--color-font-button-cart-hover, #fff);
            background-color: var(--color-background-button-hover, #1a7117);
        }

        .template-cart .main-content .btn-wrapper .btn-add-tocart:hover svg,
        .template-cart .main-content .btn-wrapper .btn-add-tocart:active svg {
            fill: var(--color-font-button-cart-hover, #fff);
        }

        .template-cart .main-content .btn-wrapper.btn-wrapper-2 {
            align-items: flex-start;
            border-bottom: none !important;
            text-align: center;
        }

        .template-cart .main-content .btn-wrapper.btn-wrapper-2 .form-cart-proceed-to-checkout {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .template-cart .main-content .btn-wrapper.btn-wrapper-2 .pull-right.cart-total-bottom {
            text-align: right;
            padding: 8px 0 12px;
            color: var(--color-price-cart-page, #b22222);
        }

        .template-cart .main-content .btn-wrapper.btn-wrapper-2 .pull-right.cart-total-bottom .price-total {
            color: var(--color-price-cart-page, #b22222);
        }

        .template-cart .main-content .btn-wrapper.btn-wrapper-2 .trust-badges {
            display: none;
        }

        .template-cart .main-content .btn-wrapper.btn-wrapper-2 .continue-shopping {
            align-items: flex-end;
            font-weight: 700;
            text-decoration: underline;
            font-size: 20px;
            color: var(--color-continue-shopping-color, #43aecf);
            margin-top: 50px;
        }

        .template-cart .main-content .btn-wrapper.btn-wrapper-2 .cont-button-style:hover,
        .template-cart .main-content .btn-wrapper.btn-wrapper-2 .cont-button-style:active {
            background-color: var(--color-continue-shopping-color, #2b80d8);
            color: #fff;
        }

        .template-cart .main-content .cart-products-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .template-cart .main-content .cart-products-wrapper form.jq-qtd-item-cart {
            display: flex;
        }

        .template-cart .main-content .cart-products-wrapper .list-products {
            width: 100%;
        }

        .template-cart .main-content .cart-products-wrapper .cart-product {
            display: flex;
            border-bottom: 1px solid #dddcdc;
            min-height: 120px;
        }

        .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: -webkit-fill-available;
        }

        .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-wrapper .title-item-cart,
        .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-wrapper .price {
            font-weight: 700;
            color: var(--color-cart-item-title, #000);
        }

        .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-wrapper .price {
            display: flex;
            justify-content: flex-end;
            color: var(--color-price-cart-page, #b22222);
        }

        .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-wrapper .bt-remove-cart {
            background-color: transparent;
            border: 1px solid #e4e4e4;
            padding: 7px 20px;
        }

        .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-image-wrapper {
            padding-right: 15px;
            display: flex;
            align-items: center;
        }

        .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-btn-wrapper {
            display: flex;
            margin-top: 15px;
        }

        .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-btn-wrapper .btn.btn-plus,
        .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-btn-wrapper .btn.btn-minus,
        .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-btn-wrapper .input-qtd {
            background: transparent;
            border: 1px solid #e5e5e5;
            width: 34px;
            text-align: center;
            margin: 0;
        }

        .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-btn-wrapper .btn.btn-plus svg,
        .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-btn-wrapper .btn.btn-minus svg,
        .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-btn-wrapper .input-qtd svg {
            display: block;
            margin: 0 auto;
        }

        .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-btn-wrapper .input-qtd {
            border-left: 0 !important;
            border-right: 0 !important;
        }

        .great-reasons {
            float: left;
            margin-bottom: 30px;
            width: 100%;
        }

        .great-reasons .text-1 {
            font-size: 20px;
            float: left;
            margin-bottom: 10px;
            width: 100%;
            font-weight: bold;
        }

        .great-reasons img {
            max-width: 375px;
            width: 100%;
        }

        .text-columns .text-1 {
            font-size: 20px;
            margin-bottom: 7px;
            width: 100%;
            font-weight: bold;
        }

        .shipwholetext1 {
            width: 50%;
        }

        .text-collumn-image-wrapper img {
            width: 100%;
            height: auto;
        }

        hr {
            clear: both;
            border-top: solid;
            border-width: 1px 0 0;
            margin: 30px 0;
            height: 0;
        }

        .half-content.trust_badges {
            width: 50%;
            float: left;
        }

        .half-content.shipwholetext1 {
            width: 48%;
            float: left;
        }

        .text-column-wrapper .half-content p {
            margin: 0 0 15px 0;
            line-height: 30px;
            padding: 0 30px 0 0px;
        }

        .half-content.shipwholetext1 p {
            line-height: 1.6;
            margin-top: 10px;
        }

        .text-column-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }

        p.text_botom_button {
            max-width: 330px;
        }

        .text_botom_button strong {
            float: right;
            font-weight: 600;
            color: #000;
            max-width: 375px;
            text-align: center;
            font-size: 17px;
            width: 100%;
            text-transform: capitalize;
        }

        .text_botom_button.day-message span strong {
            display: none;
        }

        .text-reviews p {
            padding: 0% 3%;
            margin-bottom: 2%;
            max-width: 477px;
            margin: 0px auto;
        }

        .btn-wrapper.btn-wrapper-2 .pull-right.cart-total-bottom {
            font-size: 18px;
        }

        .btn-wrapper.btn-wrapper-2 .pull-right.cart-total-bottom .price-total {
            font-weight: bold;
            font-size: 18px;
        }

        .text-column-wrapper .half-content p>strong {
            font-weight: bold;
        }

        .continue-shopping.no-mobile {
            display: flex;
        }

        .cart-continue-shopping-link {
            font-weight: 700;
            color: var(--color-continue-shopping-color, #43aecf);
        }

        .cart-continue-shopping-link:not(.cont-button-style):hover,
        .cart-continue-shopping-link:not(.cont-button-style):active {
            text-decoration: underline;
        }

        .cart-continue-shopping-link .btn {
            background-color: var(--color-background-button-continue-shopping, #000);
            color: var(--color-continue-shopping-color, #43aecf);
            text-decoration: underline;
        }

        .cart-continue-shopping-link .btn:hover,
        .cart-continue-shopping-link .btn:active {
            background-color: var(--color-continue-shopping-color, #2b80d8);
            color: #fff;
        }

        .cont-button-style {
            text-decoration: none;
            display: block;
            border: 2px solid;
            font-weight: bold;
            text-decoration: none;
            padding: 5px 20px;
            color: var(--color-continue-shopping-color, #43aecf);
        }

        .cont-button-style:hover,
        .cont-button-style:active {
            background-color: var(--color-continue-shopping-color, #2b80d8);
            color: #fff;
        }

        .template-cart .main-content .btn-wrapper.btn-wrapper-2 .cont-button-style {
            display: flex;
            vertical-align: top;
            border: 2px solid;
            font-weight: bold;
            text-decoration: none;
            font-size: 18px;
            padding: 0px 8px;
            height: 43px;
            text-align: center;
            align-items: center;
            margin: 39px 0;
            width: auto;
        }

        .header-cart {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 10px 0;
        }

        .header-cart .info-header {
            min-height: 100%;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: space-between;
        }

        .header-cart .info-header .phone-cart {
            font-weight: 700;
            color: var(--color-phone-number, #000);
        }

        .header-cart .info-header a.phone-cart svg {
            transform: rotate(270deg);
        }

        .header-cart .info-header .email-cart,
        .header-cart .info-header .phone-cart {
            display: flex;
            align-items: center;
        }

        .header-cart .info-header svg {
            width: 18px;
            position: unset;
            margin-right: 5px;
            fill: #6e797a;
        }

        .main-logo-link,
        .cart-text,
        .menu-text {
            font-size: var(--cart_title_font_size);
        }

        .cart-text {
            color: var(--cart_title_color);
        }

        .cart-text,
        .menu-text {
            text-transform: var(--header_fallback_text_transform);
        }

        .btn-add-tocart,
        .btn-choose-variant {
            text-transform: var(--AddToCartTextTransform);
            height: 50px;
            line-height: 50px;
            font-size: var(--AddToCartFontSize);
            text-align: center;
        }

        .btn-add-tocart {
            background: var(--AddToCartBackground);
            color: var(--AddToCartTextColor);
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cart-products-wrapper .cart-product .cart-product-wrapper .title-item-cart {
            font-size: 17px;
        }

        .main-content .cart-product-wrapper .product-price .price.discount-price,
        .main-content .cart-product-wrapper .product-price .discount-price__wrapper {
            font-size: 12px;
            color: var(--color-product-discount);
        }

        .discount-price__wrapper {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            width: 100%;
        }

        .price-discount {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .template-cart .main-content .cart-product-wrapper .price-discount {
            font-size: 12px;
            color: var(--color-product-discount);
        }

        @media (max-width: 1019px) {
            span.shipping-discount-drawer {
                font-size: 14px;
            }

            .template-cart .main-content .wrapper .cart__empty.text-center {
                margin: 20px auto;
                width: max-content;
            }

            .great-reasons .text-1 {
                float: left;
                margin-bottom: 15px;
                width: 100%;
                font-weight: bold;
            }

            .text-column-wrapper .half-content p {
                margin: 15px 0 5px 0;
                line-height: 28px;
                padding: 0 15px 0 0px;
                font-size: 16px;
            }

            .cartpaymenticon {
                margin-right: 0;
                max-width: 375px;
            }
        }

        @media (max-width: 767px) {
            .main-content .cart-product-wrapper .price-discount {
                font-size: 11px;
            }

            .template-cart .header-cart-wrapper {
                padding-top: 8px;
                padding-bottom: 10px;
            }

            .template-cart .half-content.shipwholetext1 p {
                margin-top: 14px;
            }

            .template-cart .main-content br {
                display: none;
            }

            .template-cart .main-content .continue-shopping.no-mobile {
                display: flex;
            }

            .template-cart .main-content .text-reviews p {
                font-size: 14px;
            }

            .template-cart .main-content .btn-wrapper {
                display: block;
                text-align: center;
            }

            .template-cart .main-content .btn-wrapper img {
                display: block;
                text-align: center;
                margin: auto;
                padding: 10px 0;
            }

            .template-cart .main-content .btn-wrapper.btn-wrapper-2 {
                flex-direction: column-reverse;
                align-items: center;
                padding: 0px 0 0 0;
            }

            .template-cart .main-content .btn-wrapper.btn-wrapper-2 .pull-right.cart-total-bottom {
                text-align: center;
            }

            .template-cart .main-content .product-price {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .template-cart .main-content p.text_botom_button {
                width: 100%;
                margin: 10px 0 15px 0;
                max-width: 100%;
            }

            .template-cart .main-content .btn-wrapper form {
                width: 100%;
            }

            .template-cart .main-content .btn-wrapper.btn-wrapper-2 .form-cart-proceed-to-checkout {
                align-items: center;
            }

            .template-cart .main-content .btn-wrapper.btn-wrapper-2 .trust-badges {
                width: 100%;
                margin: 0 auto;
                display: block;
                max-width: 375px;
            }

            .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-wrapper .title-item-cart,
            .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-wrapper .price {
                line-height: 18px;
            }

            .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-wrapper .title-item-cart {
                font-size: 14px;
            }

            .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-wrapper small {
                font-size: 14px;
            }

            .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-wrapper button.btn.btn-plus,
            .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-wrapper button.btn.btn-minus,
            .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-wrapper input {
                padding: 5px;
                width: 30px;
            }

            .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-wrapper .btn.icon-plus:after,
            .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-wrapper .btn.icon-minus:after {
                right: 8px;
            }

            .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-wrapper button.bt-remove-cart {
                padding: 5px 15px;
                font-size: 10px;
            }

            .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-image-wrapper {
                padding-right: 20px;
            }

            .cart-product-image-wrapper img {
                width: 100%;
            }

            .template-cart .main-content .btn-wrapper .btn-add-tocart {
                font-size: 17px;
                min-width: 0;
                width: 100%;
                padding: 0;
            }

            .template-cart .text_botom_button {
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 5px 0;
            }

            .template-cart .text_botom_button strong {
                float: none;
            }

            .template-cart .text_botom_button br {
                display: none;
            }

            .template-cart .main-content .btn-wrapper.btn-wrapper-2 .continue-shopping {
                font-size: 16px;
                margin: 19px 0 10px;
                padding-bottom: 0;
                text-align: center;
                width: auto;
            }

            .great-reasons .text-1 {
                float: left;
                margin-bottom: 15px;
                width: 100%;
                font-weight: bold;
            }

            .half-content.shipwholetext1 {
                padding: 0 0 0 0;
            }

            .half-content.trust_badges img {
                max-width: 50%;
            }

            .text-column-wrapper .half-content.shipwholetext1,
            .text-column-wrapper img {
                width: 100%;
            }

            .text-column-wrapper img {
                width: 100%;
                height: auto;
                margin: 8px;
                display: block;
                float: none;
            }

            .text-column-wrapper .half-content p {
                margin: 15px 0 5px 0;
                line-height: 28px;
                padding: 0 15px 0 0px;
                font-size: 16px;
            }

            .text-column-wrapper .half-content p>strong {
                font-weight: bold;
            }

            .template-cart .main-content .cart-products-wrapper .cart-product .cart-product-btn-wrapper .input-qtd {
                width: 30px;
                padding: 0;
            }

            .template-cart .main-content .btn-wrapper.btn-wrapper-2 .cont-button-style-mobile {
                align-items: center;
                border: 2px solid;
                display: block;
                font-size: 18px;
                font-weight: bold;
                margin: 20px 0;
                padding: 5px 8px;
                text-align: center;
                text-decoration: none;
                width: 100%;
            }

            .template-cart .main-content .btn-wrapper.btn-wrapper-2 .cont-button-style-mobile:hover,
            .template-cart .main-content .btn-wrapper.btn-wrapper-2 .cont-button-style-mobile:active {
                background-color: var(--color-continue-shopping-color, #2b80d8);
                color: #fff;
            }

            .template-cart .main-content .btn-wrapper {
                padding: 15px 0;
            }

            .cart-products-wrapper .cart-product .cart-product-image-wrapper a {
                width: 70px;
            }

            .shipping-bar .shipping-bar-text,
            .shipping-bar .shipping-bar-discount-disabled {
                line-height: 1.2;
                font-size: 12px;
            }

            .template-cart .header-mobile {
                border-bottom: none;
            }

            .template-cart ul.list-products {
                border-top: 1px solid #e4e4e4;
            }

            .cart-products-wrapper .cart-product .cart-product-wrapper img.img-cart-drawer {
                width: 100%;
            }

            .cart-products-wrapper .cart-product .cart-product-image-wrapper {
                padding-right: 10px;
                flex: 0 0 85px;
            }

            .paypal {
                font-size: 18px;
            }

            .product-price {
                text-align: center;
            }

            .cart-product--max-items .max-msg {
                max-width: 105px;
                font-size: 0.7rem;
            }

            .cart-products-wrapper .cart-product .cart-product-wrapper .title-item-cart {
                font-size: 12px;
            }

            .cart-container .btn-add-tocart {
                font-size: 15px;
            }

            .cart_drawer__header .drawer-title {
                font-size: 14px;
            }

            #CartDrawer .max-msg:before {
                left: 50%;
                bottom: 60%;
                border-right-color: transparent;
                border-bottom-color: #757575;
                height: 0;
                transform: translatex(-50%);
            }

            #CartDrawer .max-msg {
                bottom: -100%;
                left: -100%;
                transform: translate(-40%, 50%);
                z-index: 999;
            }

            .cart-container .btn-add-tocart svg {
                width: 15px;
            }

            .cart-drawer .max-msg:before {
                top: -12px;
                left: 44%;
                bottom: initial;
                transform: translate(0, 0);
            }

            .cart-drawer .max-msg {
                bottom: -100%;
                left: -100%;
                transform: translate(-40%, 60%);
                z-index: 999;
            }

            .js-cart__btn--plus[disabled='disabled'] .hide.max-msg:before {
                border-left: 8px solid transparent;
                border-right: 8px solid transparent;
                border-bottom: 12px solid #757575;
            }

            .cart-drawer .shipping-bar__message {
                margin-top: 4px;
            }
        }

        @media (max-width: 479px) {
            .template-cart .header-cart-wrapper {
                padding-top: 2px;
                padding-bottom: 10px;
            }

            .template-cart .half-content.shipwholetext1 p {
                line-height: 1.4;
                margin-top: 5px;
            }

            .cont-button-style-mobile {
                display: block;
                border: 2px solid;
                font-weight: bold;
                text-decoration: none;
                font-size: 22px;
                padding: 0px;
                padding-left: 20px;
                margin: 45px 0;
            }

            .cont-button-style-mobile:hover,
            .cont-button-style-mobile:active {
                background-color: var(--color-continue-shopping-color, #2b80d8);
                color: #fff;
            }

            .logo-link img {
                width: 100%;
            }

            .logo-link {
                width: 50%;
            }

            .template-cart .logo-image {
                width: 45%;
            }

            .template-cart .header-cart-wrapper {
                padding-bottom: 4px;
            }

            .cart-page-container .first-row .left img {
                max-width: 150px;
            }

            .cart-page-container .last-row .rigth .btn-add-tocart svg {
                width: 14px;
            }

            .cart-container .cart-bottom .reviews-cartDrawer .drawer-review_user .user-name {
                font-size: 13px;
            }

            .cart-container .cart-bottom .cupom-text,
            .cart-products-wrapper .cart-product .cart-product-wrapper .price {
                margin-bottom: 2px;
                font-size: 15px;
            }

            .cart-container .cart-bottom .cupom-text {
                justify-content: flex-end;
            }

            .cart-container .total-price .price {
                font-size: 19px;
            }

            .cart-products-wrapper .cart-product .cart-product-wrapper .bt-remove-cart {
                color: #000;
                font-size: 12px;
            }

            .cart-container .cart-bottom .reviews-cartDrawer .drawer-review_user .user-img {
                width: 90px;
                padding-top: 90px;
            }

            .cart-container .btn-add-tocart svg {
                width: 16px;
            }

            .cart-product--max-items .max-msg {
                max-width: 100px;
                font-size: 0.65rem;
            }

            .mobile-nav .newsletter-opt .klaviyo_condensed_styling .klaviyo_form_actions {
                flex: 0 0 40%;
            }

            .js-drawer-open-left {
                overflow: hidden !important;
            }

            .js-drawer-open-left .is-moved-by-drawer {
                width: 100%;
            }

            span.shipping-discount-drawer {
                font-size: 13px;
            }

            .cart-products-wrapper .cart-product .cart-product-wrapper .price,
            .cart-container .cart-bottom .cupom-text {
                margin-bottom: 2px;
                font-size: 15px;
            }

            .cart-drawer .shipping-bar__message {
                font-size: 12px;
                margin-top: 5px;
            }

            .shipping-bar__counter-fill[style='width: 100%;']+.shipping-bar__message {
                margin-top: 2px;
            }
        }
    </style>
    <style class="critical2">
        .mobile-menu {
            margin-top: 0;
        }

        .js-drawer-open-left .DrawerOverlay {
            visibility: visible;
            opacity: 1;
        }

        .js-drawer-open-left .sidenav--drawer-left {
            -ms-transform: translateX(400px);
            -webkit-transform: translateX(400px);
            transform: translateX(400px);
            overflow: auto;
            z-index: 999;
        }

        .toggle--plus:before,
        .toggle--minus:before {
            height: 17px;
            content: '';
            width: 2px;
            background-color: var(--vasta-font-color-menu-mobile, rgb(0, 0, 0));
            top: 0;
            left: 7px;
            position: relative;
            display: block;
            transition: 0.4s transform ease-out;
        }

        .toggle--plus:after,
        .toggle--minus:after {
            width: 17px;
            content: '';
            height: 2px;
            background-color: var(--vasta-font-color-menu-mobile, rgb(0, 0, 0));
            position: relative;
            display: block;
            top: -10px;
            left: 0;
            transform: rotate(0);
            transition: 0.4s transform ease-out;
        }

        .rotateVerticalLine:before,
        .toggle--minus:before {
            transform: rotate(270deg);
        }

        .rotateHorizontalLine:after {
            transform: rotate(180deg);
        }

        .sidenav__icon {
            background-color: transparent;
            position: relative;
            width: 19px;
            height: 19px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidenav {
            display: flex;
            flex-direction: column;
            top: 0;
            bottom: 0;
            position: fixed;
            -webkit-overflow-scrolling: touch;
            color: var(--vasta-font-color-menu-mobile, #444);
            background-color: var(--vasta-background-menu-mobile, #fff);
            transition: all 400ms cubic-bezier(0.46, 0.01, 0.32, 1);
            z-index: 99;
        }

        .sidenav svg {
            width: 19px;
            height: 19px;
        }

        .sidenav--drawer-left {
            width: 400px;
            left: -400px;
            border-right: 1px solid var(--vasta-background-menu-mobile, #fff);
            max-width: 85%;
        }

        .sidenav__header {
            padding: 0 15px 5px;
        }

        .sidenav__top__wrapper {
            position: relative;
            display: flex;
            padding: 12px 0;
            width: 100%;
            align-items: center;
            justify-content: space-between;
        }

        .sidenav__title,
        .sidenav__close {
            font-size: 1.4rem;
            color: var(--vasta-font-color-menu-mobile, #444);
        }

        .sidenav__close {
            cursor: pointer;
        }

        .sidenav__close {
            position: relative;
            right: 0;
            color: inherit;
            background-color: transparent;
            border: none;
        }

        .sidenav__close svg {
            width: 20px;
            height: 20px;
        }

        .sidenav__list {
            width: 100%;
        }

        .sidenav__list__item {
            width: 100%;
            border-top: 1px solid #ccc;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            padding: 0 16px;
        }

        .sidenav__list--shop .sidenav__list__item:last-child {
            border-bottom: 1px solid #ccc;
        }

        .list--child .sidenav__list__item {
            border-top: unset;
            padding: 0;
        }

        .sidenav__item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .sidenav__item__anchor,
        .sidenav__shop__text__wrapper {
            width: 100%;
            padding: 12px 5px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            color: var(--vasta-font-color-menu-mobile, #444);
        }

        .sidenav__item__img {
            width: 20px;
            margin-right: 10px;
        }

        .sidenav .list--grandchild {
            height: 0;
            padding-left: 48px;
            transition: 0.4s height ease-in-out;
            overflow: hidden;
        }

        .sidenav .list--child {
            display: block;
            padding-left: 24px;
            height: 0;
            transition: 0.4s height ease-in-out;
            overflow: hidden;
        }

        .sidenav__item__anchor svg {
            margin-right: 7px;
        }

        .sidenav__footer {
            padding: 12px 15px 0;
        }

        .sidenav__footer .news_letter_title {
            text-align: center;
            margin-bottom: 12px;
        }

        .sidenav__footer input#k_id_email-menu-mobile {
            width: 100%;
            height: 44px;
        }

        .sidenav__footer .klaviyo_field_group {
            margin-right: 0;
            width: 60%;
        }

        .sidenav__footer .klaviyo_form_actions {
            width: 40%;
        }

        .sidenav__footer .klaviyo_field_group {
            width: 60%;
            padding: 0;
        }

        .sidenav__footer .klaviyo_condensed_float .klaviyo_field_group {
            margin-right: unset;
        }
    </style>
    <style>
        /******************************************************************************* # STYLE SITEWIDE *******************************************************************************/
        .drawer__title,
        .grid-product-title,
        .item-title,
        .item-title a,
        .page-title,
        .product-title,
        .section-title,
        .title,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        span,
        a,
        p,
        br,
        b,
        i,
        strong {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: 100%;
            text-rendering: optimizeLegibility;
        }

        .visually-hidden {
            display: none;
            visibility: hidden;
        }

        .wrapper {
            width: 100%;
            max-width: var(--wrapperWidth);
            margin: 0 auto;
            clear: both;
            padding: 0px 20px;
        }

        body .jdgm-prev-badge {
            display: flex !important;
            width: 100%;
            justify-content: left;
            align-items: center;
        }

        .flow-hidden {
            overflow: hidden;
        }

        .btn {
            width: 100%;
            font-weight: normal;
            border: none;
            float: left;
        }

        .section-title {
            display: block;
            padding: 35px 0;
            text-align: center;
            width: 100%;
        }

        body .mobile {
            display: none;
        }

        body .no-desktop {
            display: none;
        }

        .spr-badge-caption {
            color: #000;
        }

        .shopify-section {
            clear: both;
            float: left;
            display: block;
            width: 100%;
        }

        .fixed {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1;
        }

        body .hide {
            display: none;
        }

        body .underline {
            text-decoration: underline;
        }

        .prices-wrapper {
            text-align: center;
        }

        .overflow {
            overflow: hidden;
        }

        .bold {
            font-weight: bold;
        }

        .flex {
            display: flex;
        }

        .flex-row-reverse {
            flex-direction: row-reverse;
        }

        .flex-space-between {
            justify-content: space-between;
        }

        .flex-align-start {
            align-items: flex-start;
        }

        .full {
            width: 100%;
        }

        .msg {
            display: block;
            padding: 5px;
            background-color: transparent;
            border: 1px solid transparent;
            font-size: 14px;
            margin-top: 20px;
        }

        .msg.msg-error {
            background-color: #ffe6e6;
            border-color: #ffadad;
        }

        .choose-option {
            position: relative;
            outline: 2px solid rgba(255, 0, 0, 0.9);
            padding: 3px;
        }

        .choose-option:before {
            content: 'Choose an option';
            position: absolute;
            line-height: 16px;
            top: -24px;
            left: 0;
            color: #f00;
            background-color: #fff;
            width: 202px;
        }

        @keyframes blink {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .lowercase {
            text-transform: lowercase;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .capitalize {
            text-transform: capitalize;
        }

        .text-underline {
            text-decoration: underline;
        }

        .main-content {
            clear: both;
            transition: all 400ms cubic-bezier(0.46, 0.01, 0.32, 1);
        }

        .icon-loading {
            display: flex;
            justify-content: center;
            background: #fff;
            width: 100%;
            height: 200px;
            position: relative;
        }

        .icon-loading .lds-css.ng-scope {
            padding: 0;
        }

        .products-reviews-stars.no-mobile {
            text-align: left;
            margin: 0 auto;
            display: block;
        }

        @keyframes lds-spinner {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        @-webkit-keyframes lds-spinner {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        .rte {
            line-height: 1.6;
        }

        .rte ol,
        .rte ul {
            padding-left: 2rem;
        }

        .rte p,
        .rte ul,
        .rte ol {
            margin-bottom: 16px;
        }

        .rte a:hover,
        .rte a:active {
            text-decoration: underline;
        }

        .rte h2 {
            margin-bottom: .75rem;
        }

        .rte h3 {
            margin-bottom: 1rem;
        }

        .page-margin-bottom {
            display: table;
            margin-bottom: 50px;
        }

        .custom-html {
            margin-top: 5px;
        }

        body .jdgm-prev-badge__text:after {
            content: ")";
        }

        body .jdgm-prev-badge__text:before {
            content: " ( ";
        }

        body .jdgm-prev-badge__text {
            margin-left: 5px;
            font-size: 10px;
            color: #000;
            font-weight: normal;
        }

        body .jdgm-widget.jdgm-widget {
            width: 100%;
            align-items: center;
        }

        body .collection-items .jdgm-prev-badge {
            justify-content: left;
        }

        .jdgm-widget input:not([type='submit']),
        .jdgm-widget textarea {
            padding: 5px 10px;
        }

        .jdgm-widget textarea {
            resize: none;
        }

        .template-list-collections .rte-h1 {
            font-weight: 400;
        }

        .wrapper .rte-h1.below {
            padding-top: 20px;
        }

        .back-to-top {
            font-family: var(--copyBodyFont), Arial, sans-serif;
        }

        .coupon_text {
            text-align: left;
            color: var(--CouponTextColor);
            background-color: var(--thankYouBackground);
        }

        .thank_you {
            text-align: left;
        }

        .thank_you strong {
            background-color: var(--thankYouBackground);
        }

        /* Used in Policy Page */
        .template- .shopify-policy__container {
            max-width: 1280px;
        }

        .reset_password-title {
            text-transform: capitalize;
            font-size: 2.2rem;
            text-align: center;
            line-height: 1.3;
        }

        .form-reset-password>form {
            margin: 50px auto 80px !important;
        }

        /*RESPONSIVE STYLES*/
        @media (max-width: 1019px) {
            body * {
                font-size: var(--copy_body_tablet);
            }

            span,
            b,
            strong,
            em,
            i,
            u,
            a,
            option {
                font-family: inherit;
                font-size: inherit;
            }

            body h1,
            body .page-title,
            body .title {
                font-size: var(--h1SizeTablet);
                color: var(--h1Color);
            }

            body h2 {
                font-size: var(--h2SizeTablet);
                color: var(--h2Color);
            }

            body h3,
            body .grid-product-title,
            body .item-title a,
            body .item-title {
                font-size: var(--h3SizeTablet);
                color: var(--h3Color);
            }

            body h4 {
                font-size: var(--h4SizeTablet);
                color: var(--h4Color);
            }

            body h5 {
                font-size: var(--h5SizeTablet);
                color: var(--h5Color);
            }

            body h6 {
                font-size: var(--h6SizeTablet);
                color: var(--h6Color);
            }

            body .desktop {
                display: none !important;
            }

            body .no-desktop {
                display: block;
            }

            .section-title {
                padding: 20px 0;
            }
        }

        @media (max-width: 767px) {
            body * {
                font-size: var(--copy_body_mobile);
            }

            body .jdgm-prev-badge {
                flex-direction: column;
                align-items: flex-start;
                font-size: 9px;
            }

            .jdgm-widget.jdgm-widget,
            .jdgm-prev-badge {
                align-items: center;
            }

            .jdgm-prev-badge__stars,
            .jdgm-prev-badge__text {
                margin: 0 !important;
            }

            .jdgm-rev-widg {
                display: block;
                clear: both;
                width: 100%;
            }

            span,
            b,
            strong,
            em,
            i,
            u,
            a,
            option {
                font-family: inherit;
                font-size: inherit;
            }

            body h1,
            body .page-title,
            body .title {
                font-size: var(--h1SizeMobile);
                color: var(--h1Color);
            }

            body h2 {
                font-size: var(--h2SizeMobile);
                color: var(--h2Color);
            }

            body h3,
            body .grid-product-title,
            body .item-title a,
            body .item-title {
                font-size: var(--h3SizeMobile);
                color: var(--h3Color);
            }

            body h4 {
                font-size: var(--h4SizeMobile);
                color: var(--h4Color);
            }

            body h5 {
                font-size: var(--h5SizeMobile);
                color: var(--h5Color);
            }

            body h6 {
                font-size: var(--h6SizeMobile);
                color: var(--h6Color);
            }

            body .product-half.half-img.flex-row-reverse {
                padding: 0;
            }

            .section-title {
                padding: 10px 0;
            }

            body .mobile {
                display: block;
                width: 100%;
            }

            body .no-mobile {
                display: none !important;
            }

            .btn-add-tocart {
                height: 43px;
                line-height: 43px;
            }

            .btn-add-tocart span {
                font: inherit;
            }

            .wrapper .rte-h1.below {
                padding-top: 0;
            }

            .template-cart .section-title {
                font-size: 18px;
                max-width: 200px;
                margin: 0 auto;
            }

            .slick-content {
                margin: 0 0 26px 0;
            }

            .wrapper {
                width: 100%;
                padding: 0 20px;
            }

            .credit_cards_page img {
                display: none;
            }
        }

        @media (max-width: 375px) {

            body .jdgm-prev-badge,
            body .jdgm-prev-badge__text {
                font-size: 9px;
            }
        }

        /*============================================================================ #Base Styles ==============================================================================*/
        header,
        nav,
        section,
        article,
        aside,
        footer {
            display: block;
        }

        /*============================================================================ #Print Styles ==============================================================================*/
        @media print {
            @page {
                margin: 0.5cm;
            }

            p,
            h2,
            h3 {
                orphans: 3;
                widows: 3;
            }

            h2,
            h3 {
                page-break-after: avoid;
            }

            html,
            body {
                background-color: #fff;
            }

            .giftcard-header {
                padding: 10px 0;
            }

            .giftcard__content,
            .giftcard__border {
                border: 0 none;
            }

            .giftcard__actions,
            .giftcard__wrap:before,
            .giftcard__wrap:after,
            .tooltip,
            .add-to-apple-wallet {
                display: none;
            }

            .giftcard__title {
                float: none;
                text-align: center;
            }

            .giftcard__code__text {
                color: #555;
            }

            .shop-url {
                display: block;
            }

            .logo {
                color: #58686f;
            }
        }

        /*============================================================================ #Keyframe Animations ==============================================================================*/
        @-webkit-keyframes popup {
            0% {
                opacity: 0;
                -webkit-transform: translateY(30px);
            }

            60% {
                opacity: 1;
                -webkit-transform: translateY(-10px);
            }

            80% {
                -webkit-transform: translateY(2px);
            }

            100% {
                -webkit-transform: translateY(0);
            }
        }

        @-ms-keyframes popup {
            0% {
                opacity: 0;
                -webkit-transform: translateY(30px);
            }

            60% {
                opacity: 1;
                -webkit-transform: translateY(-10px);
            }

            80% {
                -webkit-transform: translateY(2px);
            }

            100% {
                -webkit-transform: translateY(0);
            }
        }

        @keyframes popup {
            0% {
                opacity: 0;
                -webkit-transform: translateY(30px);
            }

            60% {
                opacity: 1;
                -webkit-transform: translateY(-10px);
            }

            80% {
                -webkit-transform: translateY(2px);
            }

            100% {
                -webkit-transform: translateY(0);
            }
        }

        @-webkit-keyframes container-slide {
            0% {
                opacity: 0;
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(0deg);
            }
        }

        @-ms-keyframes container-slide {
            0% {
                opacity: 0;
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(0deg);
            }
        }

        @keyframes container-slide {
            0% {
                opacity: 0;
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(0deg);
            }
        }

        @-webkit-keyframes fadein {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 100;
            }
        }

        @-ms-keyframes fadein {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 100;
            }
        }

        @keyframes fadein {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 100;
            }
        }

        @keyframes spinner {
            0% {
                transform: translate(-50%, -50%) rotate(0deg)
            }

            to {
                transform: translate(-50%, -50%) rotate(360deg)
            }
        }

        /******************************************************************************* YOUTUBE CSS *******************************************************************************/
        .youtube-player {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background: #000;
        }

        .product-slider .youtube-player {
            padding-bottom: 100%;
        }

        body .youtube-player img {
            margin: auto;
        }

        .youtube-player iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            background: transparent;
        }

        .youtube-player img {
            object-fit: cover;
            display: block;
            left: 0;
            bottom: 0;
            margin: auto;
            max-width: 100%;
            width: 100%;
            position: absolute;
            right: 0;
            top: 0;
            border: none;
            height: auto;
            cursor: pointer;
            -webkit-transition: 0.4s all;
            -moz-transition: 0.4s all;
            transition: 0.4s all;
        }

        .youtube-player img:hover {
            -webkit-filter: brightness(75%);
        }

        .youtube-player .play {
            align-items: center;
            display: flex;
            justify-content: center;
            height: 72px;
            left: 50%;
            top: 50%;
            margin-left: -77px;
            margin-top: -38px;
            position: absolute;
            cursor: pointer;
        }

        .youtube-player .play .play-background {
            background: #f4471f;
            border-radius: 50%;
            cursor: pointer;
            height: 100%;
            position: absolute;
            width: 50%;
            box-shadow: 0 1px 2.2px rgba(0, 0, 0, 0.051), 0 2.3px 5.3px rgba(0, 0, 0, 0.059), 0 4.4px 10px rgba(0, 0, 0, 0.06), 0 7.8px 17.9px rgba(0, 0, 0, 0.059), 0 14.6px 33.4px rgba(0, 0, 0, 0.059), 0 35px 80px rgba(0, 0, 0, 0.07);
        }

        .youtube-player .play .play-icon {
            height: 150px;
            transform: rotate(-120deg);
            transition: transform 500ms;
            width: 150px;
        }

        .youtube-player .play-left-side,
        .youtube-player .play-right-side {
            background: white;
            height: 150px;
            position: absolute;
            width: 150px;
        }

        .youtube-player .play-left-side {
            clip-path: polygon(43.77666% 99.85251%, 43.77874% 55.46331%, 43.7795% 55.09177%, 43.77934% 54.74844%, 43.77855% 54.44389%, 43.77741% 54.18863%, 43.77625% 53.99325%, 43.77533% 53.86828%, 43.77495% 53.82429%, 43.77518% 53.55329%, 43.7754% 53.2823%, 43.77563% 53.01131%, 43.77585% 52.74031%, 43.77608% 52.46932%, 43.7763% 52.19832%, 43.77653% 51.92733%, 43.77675% 51.65633%, 43.77653% 51.38533%, 43.7763% 51.11434%, 43.77608% 50.84334%, 43.77585% 50.57235%, 43.77563% 50.30136%, 43.7754% 50.03036%, 43.77518% 49.75936%, 43.77495% 49.48837%, 44.48391% 49.4885%, 45.19287% 49.48865%, 45.90183% 49.48878%, 46.61079% 49.48892%, 47.31975% 49.48906%, 48.0287% 49.4892%, 48.73766% 49.48934%, 49.44662% 49.48948%, 50.72252% 49.48934%, 51.99842% 49.4892%, 53.27432% 49.48906%, 54.55022% 49.48892%, 55.82611% 49.48878%, 57.10201% 49.48865%, 58.3779% 49.4885%, 59.6538% 49.48837%, 59.57598% 49.89151%, 59.31883% 50.28598%, 58.84686% 50.70884%, 58.12456% 51.19714%, 57.11643% 51.78793%, 55.78697% 52.51828%, 54.10066% 53.42522%, 52.02202% 54.54581%, 49.96525% 55.66916%, 48.3319% 56.57212%, 47.06745% 57.27347%, 46.11739% 57.79191%, 45.42719% 58.14619%, 44.94235% 58.35507%, 44.60834% 58.43725%, 44.37066% 58.41149%, 44.15383% 58.27711%, 43.99617% 58.0603%, 43.88847% 57.77578%, 43.82151% 57.43825%, 43.78608% 57.06245%, 43.77304% 56.66309%, 43.773% 56.25486%);
            transition: clip-path 500ms;
        }

        .youtube-player .play-right-side {
            clip-path: polygon(43.77666% 43.83035%, 43.77874% 44.21955%, 43.7795% 44.59109%, 43.77934% 44.93442%, 43.77855% 45.23898%, 43.77741% 45.49423%, 43.77625% 45.68961%, 43.77533% 45.81458%, 43.77495% 45.85858%, 43.77518% 46.12957%, 43.7754% 46.40056%, 43.77563% 46.67156%, 43.77585% 46.94255%, 43.77608% 47.21355%, 43.7763% 47.48454%, 43.77653% 47.75554%, 43.77675% 48.02654%, 43.77653% 48.29753%, 43.7763% 48.56852%, 43.77608% 48.83952%, 43.77585% 49.11051%, 43.77563% 49.38151%, 43.7754% 49.65251%, 43.77518% 49.9235%, 43.77495% 50.1945%, 44.48391% 50.19436%, 45.19287% 50.19422%, 45.90183% 50.19408%, 46.61079% 50.19394%, 47.31975% 50.1938%, 48.0287% 50.19366%, 48.73766% 50.19353%, 49.44662% 50.19338%, 50.72252% 50.19353%, 51.99842% 50.19366%, 53.27432% 50.1938%, 54.55022% 50.19394%, 55.82611% 50.19408%, 57.10201% 50.19422%, 58.3779% 50.19436%, 59.6538% 50.1945%, 59.57598% 49.79136%, 59.31883% 49.39688%, 58.84686% 48.97402%, 58.12456% 48.48572%, 57.11643% 47.89493%, 55.78697% 47.16458%, 54.10066% 46.25764%, 52.02202% 45.13705%, 49.96525% 44.01371%, 48.3319% 43.11074%, 47.06745% 42.4094%, 46.11739% 41.89096%, 45.42719% 41.53667%, 44.94235% 41.3278%, 44.60834% 41.24561%, 44.37066% 41.27137%, 44.15383% 41.40575%, 43.99617% 41.62256%, 43.88847% 41.90709%, 43.82151% 42.24461%, 43.78608% 42.62041%, 43.77304% 43.01978%, 43.773% 43.428%);
            transition: clip-path 500ms;
        }

        .product-card__grid-item:hover .grid__item-image {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: translate(-50%, -50%) scale(1.06);
        }

        /******************************************************************************* # CUSTOM STYLE SITEWIDE *******************************************************************************/
        /******************************************************************************* # CUSTOM STYLE DESKTOP *******************************************************************************/
        @media (min-width: 1020px) {}

        /******************************************************************************* # CUSTOM STYLE TABLET *******************************************************************************/
        @media (max-width: 1019px) {}

        /******************************************************************************* # CUSTOM STYLE MOBILE *******************************************************************************/
        @media (max-width: 767px) {}

        /******************************************************************************* # CUSTOM STYLE SMALL MOBILE *******************************************************************************/
        @media (max-width: 479px) {}
    </style>
    <style>
        body .shopify-challenge__container {
            width: 100%;
            max-width: 100%;
            margin: 60px auto;
            float: left;
        }

        body .shopify-challenge__container form {
            max-width: 100%;
            width: 440px;
            height: 100%;
            margin: 20px auto;
            padding: 20px;
        }

        body .shopify-challenge__container form .shopify-challenge__button {
            background: #1B4E9B;
            color: #FFF;
            width: 100%;
            padding: 10px 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            margin: 20px auto;
            border-radius: 8px;
            border: 1px solid #1B4E9B;
            box-shadow: 0px 1px 2px 0px rgba(16, 24, 40, 0.05);
        }

        body .shopify-challenge__container form .shopify-challenge__button:hover,
        body .shopify-challenge__container form .shopify-challenge__button:active {
            background: #0b2751;
        }

        @media (max-width: 767px) {
            body .shopify-challenge__container form .shopify-challenge__button {
                padding: 8px 14px;
            }
        }
    </style><!-- Meta Tags -->
    <meta name="theme-name" content="Super Theme BV">
    <meta name="theme-version" content="2.3">
    <meta name="theme-color" content="#1d1e1c">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Select or customize your personalized flowers with text, logos, images">
    <link rel="canonical" href="https://speakingroses.com/">

    <style>
        @font-face {
            font-family: 'Luxia';
            font-display: swap;
            src: url(//speakingroses.com/cdn/shop/files/Luxia-Regular.ttf?v=6923053778007322006) format('ttf'), url(//speakingroses.com/cdn/shop/files/Luxia-Regular.otf?v=8509279255193379689) format('otf'), url(//speakingroses.com/cdn/shop/files/Luxia-Regular.woff2?v=14370488890642393666) format('woff2'), url(//speakingroses.com/cdn/shop/files/Luxia-Regular.woff?v=11465011260226717419) format('woff');
            font-style: 'regular'
        }

        @font-face {
            font-family: 'Luxia-Display';
            font-display: swap;
            src: url(//speakingroses.com/cdn/shop/files/Luxia-Display.ttf?v=3508978994002046412) format('ttf'), url(//speakingroses.com/cdn/shop/files/Luxia-Display.otf?v=18064797321379720583) format('otf'), url(//speakingroses.com/cdn/shop/files/Luxia-Display.woff2?v=2641615006013382713) format('woff2'), url(//speakingroses.com/cdn/shop/files/Luxia-Display.woff?v=11521468481451451524) format('woff');
            font-style: 'regular'
        }

        @font-face {
            font-family: 'Lato2';
            font-display: swap;
            src: url(//speakingroses.com/cdn/shop/files/Lato-Light.ttf?v=100026372371170438) format('ttf');
            font-style: 'light';
            font-weight: 300
        }

        @font-face {
            font-family: 'Lato2';
            font-display: swap;
            src: url(//speakingroses.com/cdn/shop/files/Lato-Regular.ttf?v=17609276301872201022) format('ttf');
            font-style: 'normal';
            font-weight: 400
        }
    </style>
    <style>
        .slick-slide model-viewer {
            height: 100% !important;
            min-height: 500px !important;
        }

        /* APP GLOBO PRODUCT OPTION*/
        body .product-page .gpo-app .color-swatches label,
        body .product-page .gpo-app .color-swatches .gpo-swatch__inner {
            border-radius: 50%;
            border: 1px solid #7e7c7c61;
        }

        body .gpo-app .gpo-swatches.color-swatches input[value="none"]+label .top-color {
            background-image: url("//speakingroses.com/cdn/shop/t/12/assets/traffic-signal_40x.png?v=87730337242709689191705436134") !important;
            background-repeat: no-repeat;
        }

        body .gpo-app .gpo-swatches.color-swatches input+label .top-color {
            width: 40px;
            height: 40px;
        }

        body .gpo-app .gpo-swatches.buttons input:checked+label {
            background: #fff;
            color: #000;
        }

        body .gpo-app .gpo-swatches input:checked+label,
        body .pplr-drop-item.active {
            border-color: #A84F65;
            background-color: unset;
        }

        body .pplr-wrapper.pplr-dropdown.pplr-quantity-printed {
            display: none;
        }

        body .pplr-quantity-printed .pplr-drop-item {
            border-radius: 5px;
        }

        body .pplr-quantity-printed .pplr-drop-item.active {
            position: relative;
        }

        body .pplr-swatch-element.selected:after,
        body .pplr-drop-item.active:after {
            content: "\2713";
            color: #fff;
            background: #A84F65;
            border-radius: 50%;
            font-size: 10px;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            top: -10px;
            right: -6px;
            width: 15px;
            height: 15px;
            font-weight: 800;
        }

        body .pplr-swatch-element.selected:after {
            right: -1px;
            top: -4px;
        }

        body .gpo-app .gpo-swatches input:checked+label:after {
            content: "\2713";
            color: #fff;
            background: #A84F65;
            border-radius: 50%;
            font-size: 10px;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            top: -5px;
            right: -4px;
            width: 15px;
            height: 15px;
            font-weight: 800;
        }

        body .gpo-app .gpo-swatches.buttons input:checked+label span {
            background: unset;
            color: #A84F65;
        }

        body .gpo-app .gpo-swatches.buttons,
        body .gpo-app .gpo-swatches.buttons input+label {
            width: 100%;
            border-radius: 5px;
        }

        body .gpo-app .gpo-swatches.buttons input+label {
            width: 100%;
        }

        body .gpo-app .impresion div {
            display: flex;
        }

        body .gpo-container .gpo-app .gpo-form__group:last-child {
            display: none;
        }

        body .gpo-app .gpo-swatches.buttons input:checked+label .gpo-tooltip__title>* {
            color: #fff;
        }

        body .gpo-app .gpo-swatches input:checked+label .gpo-tooltip {
            border-radius: 5px;
        }

        @media (max-width: 767px) {
            body .gpo-app .gpo-swatches.color-swatches input[value="none"]+label .top-color {
                background-image: url("//speakingroses.com/cdn/shop/t/12/assets/traffic-signal_30x.png?v=87730337242709689191705436134") !important;
                background-repeat: no-repeat;
            }

            body .gpo-app .gpo-swatches.color-swatches input+label .top-color {
                width: 30px;
                height: 30px;
            }

            body .gpo-app .gpo-swatches input:checked+label .gpo-tooltip {
                display: none;
            }
        }

        /* END APP GLOBO PRODUCT OPTION*/
        body .product-page .product-quantity {
            display: none !important;
        }

        body .product-form__buttons .swym-wishlist-button-bar.swym-inject {
            display: none;
        }

        #shopify-section-footer {
            float: unset;
        }

        body .main-menu__list.list--child .main-menu__list-item svg {
            fill: transparent;
            transform: rotate(0deg);
        }

        body .main-menu__list.list--child .main-menu__list-item:hover svg,
        body .main-menu__list.list--child .main-menu__list-item svg:hover {
            fill: transparent;
        }

        /* General */
        body h1 {
            font-family: 'Luxia', sans-serif;
        }

        body .section-title {
            font-family: 'Luxia', sans-serif;
        }

        /* Shipping Bar */
        body .shipping-bar__wrapper {
            padding: 0 24.5px 0 23.5px;
        }

        body .shipping-bar .shipping-bar__message {
            padding: 0 0px 0 8px;
            letter-spacing: -0.2px;
        }

        body .shipping-bar__item:nth-of-type(3) .shipping-bar__link span {
            margin-left: 5px;
        }

        body .shipping-bar__item:nth-of-type(3) {
            padding-right: 12px;
        }

        body .shipping-bar__link[href^="mailto"] svg {
            width: 16px !important;
            transform: translate(2px, 0px);
            margin: 0 1px 0px 0;
        }

        body .shipping-bar__link[href^="tel"] svg {
            width: 13px !important;
            height: auto;
            transform: translate(0, -0.2px);
        }

        /* Header */
        body .header__logo-wrapper svg {
            margin: 0;
        }

        body .header__search-form-wrapper {
            width: 529px;
            max-width: 100%;
            margin: 0 auto 4px;
            padding: 0 1px 0 0px;
        }

        body .header__search-form {
            width: 100%;
        }

        body .header__search-button {
            width: 137px;
            padding: 0;
        }

        body .header__item-cart {
            padding: 0 0 3px;
        }

        body .header__item-cart-number {
            top: 22px;
            right: 1px;
        }

        body .cart-drawer .cart-drawer__header {
            padding: 7px 15px 7px 17.2px;
            margin-bottom: 8px;
        }

        body .cart-drawer .cart-drawer__title-shipping-bar {
            margin: 8px auto 11px;
            padding: 8px 0px 8px 0px;
            transform: translateY(0.5px);
        }

        body .cart-drawer .cart-drawer__shipping-text {
            margin: 0;
        }

        body .cart-drawer .cart__total-price-wrapper {
            margin: 23.8px 0 16.5px;
        }

        body .cart-drawer .cart-items__item-variant {
            margin-bottom: 7px;
        }

        body .cart-drawer .cart__total-price-wrapper strong {
            font-size: 20px;
            letter-spacing: 0.18px;
            font-weight: 400;
        }

        body .cart-drawer .cart__total-price {
            letter-spacing: -0.1px;
        }

        body .cart-drawer .cart-items__line-item {
            padding: 19.5px 0 19px 0;
            gap: 20px;
        }

        body .cart-drawer .cart-items__item-quantity-wrapper {
            transform: translate(-0.3px, -0.5px);
        }

        body .cart-drawer .cart-items__item-quantity {
            padding: 3px 0 0;
        }

        body .cart-drawer .cart-items__item-result {
            margin: 0;
        }

        body .cart-drawer .cart-items__remove-text {
            margin: 0 0 2px;
        }

        body .cart-drawer .cart-items__item-remove {
            margin-bottom: 7px;
            font-size: 14px;
        }

        body .cart-drawer .cart__proceed-to-checkout {
            letter-spacing: 0.1px;
        }

        body .cart-drawer .cart-drawer__badges-list {
            margin-top: 9px;
        }

        body .cart-drawer .cart__item-count {
            padding-left: 2px;
            letter-spacing: 0.2px;
            font-size: inherit;
        }

        body .cart-drawer .cart-drawer__badge-wrapper svg,
        body .cart-drawer .cart-drawer__badge-wrapper img {
            height: 74px;
        }

        body .cart-drawer .cart__item-count,
        body .cart-drawer .cart__proceed-to-checkout svg {
            padding-bottom: 0;
        }

        body .cart-drawer .cart-drawer__badge-title {
            padding: 0 0px 0 0;
            font-size: 14px;
            letter-spacing: 0.35px;
            text-transform: capitalize;
        }

        body .cart-drawer .cart-drawer__paypal {
            margin: 10px 0 15px 0;
        }

        body .cart-drawer .cart-drawer__upsell {
            margin: 0px auto 26px;
        }

        body .cart-drawer .cart-drawer__upsell-title {
            font-size: 20px;
            padding: 0;
            letter-spacing: 0;
            margin: 30px 0 5px;
        }

        body .cart-drawer .cart-drawer__upsell-subtitle {
            text-align: center;
            font-size: 14px;
            line-height: 12.292px;
            text-transform: capitalize;
        }

        body .cart-drawer .cart-drawer__upsell-product-info {
            margin-left: 0;
            padding: 10px;
            justify-content: flex-start;
        }

        body .cart-drawer .cart-drawer__upsell-product-price-wrapper {
            margin: 1px 1px 1px 0px;
        }

        body .cart-drawer .cart-drawer__upsell-atc-form {
            margin-top: 6px;
            justify-content: space-between;
        }

        body .cart-drawer .cart-drawer__upsell-atc-price {
            height: 29px;
            text-transform: uppercase;
        }

        body .cart-drawer .cart-drawer__reviews {
            padding: 0 0 0 0.6px;
        }

        body .cart-drawer .cart-drawer__review-date {
            margin-bottom: 0 0 6px;
        }

        body .cart-drawer .cart-drawer__review-headline {
            line-height: 15px;
            letter-spacing: 0px;
            margin: 0;
            font-size: 14px;
        }

        body .cart-drawer .cart-drawer__review-stars {
            padding: 6.5px 0 10px;
            margin: 0;
        }

        body .cart-drawer .cart-drawer__review-content-wrapper {
            gap: 0px;
        }

        body .cart-drawer .cart-drawer__review-content p strong {
            margin: 0;
            letter-spacing: 0;
            font-size: 14px;
        }

        body .cart-drawer .cart-drawer__review-content {
            font-size: 14.3px;
            letter-spacing: 0.026px;
            line-height: 16px;
            margin: 7px 0 0;
        }

        body .cart-drawer .cart-drawer__review-item:not(:last-of-type) {
            margin-bottom: 26px;
        }

        body .cart-drawer .cart-drawer__review-stars {
            margin-bottom: 0;
        }

        body .cart-drawer .cart-drawer__links {
            margin: 30px 0 18px;
        }

        /* Footer */
        body .site-footer {
            padding-bottom: 38px;
        }

        body .footer_logo {
            margin-bottom: 46px;
        }

        body .site-footer .wrapper>.half-content {
            padding: 42px 16px 20px 10px;
        }

        body .site-footer .wrapper>.half-content:not(.direction-last-half) {
            padding: 0 10px 10px;
        }

        body .site-footer .wrapper .grid__item:first-of-type .no-bullets {
            width: 42.2%;
        }

        body .footer__logo-anchor>img {
            width: 50%;
        }

        body .site-footer .responsive-image__wrapper {
            position: relative;
            padding-top: 100%;
        }

        body .footer-section .footer__trust-badge {
            position: relative;
            height: auto;
            width: 100%;
            overflow: hidden;
            margin-top: 15px;
        }

        body .site-footer .responsive-image--no-image {
            background-color: #eee;
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            left: 0;
        }

        body .site-footer .wrapper>.half-content:first-child .news_letter_title {
            margin-bottom: 16px;
            font-size: 22px;
            padding: 0;
            letter-spacing: 0;
            transform: translate(0.3px, 0.7px);
        }

        body .site-footer .wrapper>.half-content:first-child .popular-collection-links .popular_collections_title {
            margin-top: 5px;
        }

        body .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_field_group input {
            font-size: 16px;
            letter-spacing: 0;
            padding: 0px 0px 0px 21px;
            background: transparent;
        }

        body .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_form_actions button {
            font-size: 16px;
            padding: 9px 0 7px 0;
        }

        body .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_form_actions {
            width: 33.2%;
            margin: 0;
        }

        body .site-footer .wrapper .klaviyo_inputs_wrapper {
            padding: 2px;
            background: #010101;
            height: 44px;
        }

        body .site-footer .klaviyo_condensed_styling,
        body .site-footer .klaviyo_styling {
            margin-bottom: 20px;
        }

        body .site-footer .wrapper .popular-collection-links a {
            margin: 12px 13.4px 0 1.5px;
            padding-top: 27.84%;
        }

        body .site-footer .info__contact {
            gap: 0 9px;
        }

        body .site-footer .info__contact-title {
            letter-spacing: 0;
            font-size: 22px;
            word-spacing: 0px;
            margin-bottom: 5px;
        }

        body .site-footer .wrapper .info {
            padding: 34px 0 0 1px;
        }

        body .site-footer .wrapper .info a span {
            padding-left: 2px;
        }

        body .site-footer .wrapper .info .footer__business-info-tel {
            gap: 2px;
        }

        body .site-footer .wrapper .info .footer__business-info-email {
            gap: 4px;
            letter-spacing: 0.1px;
        }

        body .site-footer .wrapper .info .footer__business-info-address {
            gap: 4px;
        }

        body .site-footer .wrapper .info a:first-of-type svg {
            width: 14px;
        }

        body .site-footer .wrapper .grid__item,
        body .site-footer .wrapper .popular-collection-links {
            padding-left: 1px;
        }

        body .site-footer .wrapper .grid__item {
            padding-left: 3px;
        }

        body .site-footer .wrapper .popular-collection-links {
            padding-top: 9.5px;
        }

        body .site-footer .wrapper .last-half .grid__item:last-of-type {
            padding-left: 11px;
        }

        body .site-footer .wrapper .last-half .grid__item:last-of-type .nav-title {
            padding-right: 27px;
        }

        body .site-footer .wrapper .last-half .grid__item {
            padding-top: 82px;
        }

        body .site-footer .wrapper .last-half .grid__item .nav-title {
            margin-bottom: 19px;
        }

        body .site-footer .wrapper .no-bullets {
            margin-bottom: 19px;
        }

        body .site-footer .wrapper .last-half .no-bullets li {
            margin-bottom: 3.4px;
        }

        body .trust-badges-footer-wrapper .trust-badges-wrapper {
            gap: 5px;
        }

        body .site-footer .wrapper .last-half {
            justify-content: flex-start;
        }

        body .affiliate-landing-page {
            margin-top: 30px;
            width: fit-content;
            justify-content: end;
            display: flex;
            text-align: right;
            align-self: end;
            flex-direction: column;
            margin-right: 13px;
        }

        body .affiliate-landing-page .affiliate-title {
            margin-bottom: 19px;
            color: #FFFFFF;
        }

        body .half-content .affiliate-landing-page a {
            padding: 5px;
            background: #fff;
            border-radius: 5px;
            color: #000;
            text-align: center;
        }

        body .site-footer .info .info__container .button-affiliate {
            padding: 5px;
            background: #fff;
            border-radius: 5px;
            color: #000;
        }

        body .site-footer .credits {
            padding-right: 17px;
        }

        body .trust-badges-footer-wrapper {
            justify-content: flex-end;
        }

        body .site-footer .credits.desktop .wrapper .copyright-class,
        body .site-footer .credits.desktop .wrapper .trust-badges-footer-wrapper {
            width: 393px;
            max-width: 100%;
        }

        body .site-footer .credits.desktop .wrapper .copyright-class,
        body .site-footer .credits p a {
            font-size: 16px;
            letter-spacing: 0px;
            width: 100%;
            text-align: right;
            padding-right: 5px;
        }

        body .site-footer .trust-badges-footer-wrapper {
            margin: 41px 6px 13px 0;
        }

        body .footer-section .footer__trust-badge:not(:last-of-type) {
            margin-right: 0;
        }

        body .cart-drawer .cart-drawer__close {
            height: 20px;
        }

        body .cart-drawer .cart-drawer__close svg path {
            fill: #fff;
        }

        /* Responsive: TABLET */
        @media (max-width: 1019px) {

            /* Shipping bar */
            body .shipping-bar__wrapper {
                padding: 0 20px 0 17.5px;
            }

            body .shipping-bar .shipping-bar__message {
                padding-left: 2px;
            }

            body .shipping-bar__item:nth-of-type(3) {
                padding-right: 0px;
            }

            body .affiliate-landing-page {
                margin-top: 50px;
                justify-content: center;
                display: flex;
                margin-right: 0;
                align-self: center;
            }

            body .affiliate-landing-page .affiliate-title {
                text-align: center;
                font-weight: 400;
            }

            body .header__item-cart {
                gap: 2px;
            }

            body .header__item-menu-mobile-wrapper {
                gap: 5px;
            }

            body .header .header__item-wrapper {
                margin: 19px auto 17px;
                padding: 0 19px;
            }

            body .header__section-wrapper {
                margin-bottom: 15.5px;
            }

            body .header__item-wrapper .header__item-menu-mobile {
                padding: 0;
            }

            body .header .header__item-cart-number {
                width: 10.2px;
                top: 2.2px;
                right: 7.2px;
            }

            body .header .header__item-menu-mobile.no-desktop svg {
                width: 20px;
                height: 15px;
                margin: 0 0 0.5px;
            }

            body .header__logo-wrapper svg {
                margin: 0;
            }

            body .header__item-cart {
                padding: 0 1.5px 7px 0;
            }

            body .header .header__item-cart-svg {
                width: 23px;
                height: 23px;
            }

            body .header .header__item-cart-text {
                font-size: 14px;
                margin: 0;
                transform: translatex(0.5px);
            }

            body .header .header__search-input {
                margin: 0;
                padding: 5px 14px 5px;
                font-size: 14px;
                width: 87%;
            }

            body .header .header__search-input::placeholder {
                font-size: 14px;
                font-style: normal;
                font-weight: 400;
                letter-spacing: 0;
            }

            body .header__search-button {
                width: 116px;
            }

            body .header .header__search-button {
                padding: 0 0px 1px 2px;
            }

            body .header .header__search-button svg {
                margin: 1px 0 0 7px;
            }

            body .cart-drawer .cart-items__item-remove {
                justify-content: center;
                margin-bottom: 0px;
            }

            body .cart-drawer .cart-items__remove-text {
                margin: 0 0px 5px 3px;
                font-size: 12px;
                line-height: 1;
            }

            body .cart-drawer .cart-drawer__box-content {
                padding: 0 30px 0 30px;
            }

            body .cart-drawer .cart-drawer__box {
                max-width: 491px;
            }

            body .cart-drawer .cart-drawer__header {
                padding: 0px 10px;
                margin: 0 0 10px;
            }

            body .cart-drawer .cart-drawer__title {
                font-size: 13px;
                padding-left: 15.6px;
                letter-spacing: -0.1px;
                display: inline-block;
                width: auto;
                transform: translate(-0.1px, 1.4px);
                width: 100%;
            }

            body .cart-drawer .cart-drawer__title-shipping-bar {
                font-size: 12px;
                margin: 0px auto 10px;
                padding: 2px 0 2px 0px;
                line-height: 20px;
                letter-spacing: 0px;
                transform: unset;
            }

            body .cart-drawer .cart-drawer__shipping {
                margin-bottom: 6px;
                padding: 0 6px;
            }

            body .cart-drawer .cart-drawer__shipping-bar {
                height: 27px;
            }

            body .cart-drawer .cart-drawer__shipping-text {
                font-size: 14px;
                padding: 0 1px 0 0;
            }

            body .cart-drawer .cart-drawer__upsell-list-items {
                margin: 34px auto 29px;
            }

            body .cart-drawer .cart-drawer__upsell {
                width: 100%;
                margin: 0px auto;
            }

            body .cart-drawer .cart-items__line-item {
                padding: 15.5px 0 11.5px 0;
                gap: 25px;
                transform: translateY(0.3px);
            }

            body .cart-drawer .cart-items__item-quantity {
                padding: 0;
            }

            body .cart-drawer .cart-items__item-result {
                padding: 0 0 8px;
                align-items: center;
            }

            body .cart-drawer .cart-items__item-title {
                margin: 0.5px 0 8.1px;
            }

            body .cart-drawer .cart-items__item-variant {
                margin-bottom: 8.7px;
            }

            body .cart-drawer .cart-items__line-item:not(:last-child) {
                margin-bottom: 1px;
            }

            body .cart-drawer .cart__total-price-wrapper {
                margin: 37px 0 24px 11px;
            }

            body .cart-drawer .cart__proceed-to-checkout {
                width: 407.037px;
                margin: auto;
                letter-spacing: 0.15px;
                padding-right: 0.1px;
                line-height: 0.9;
                transform: translateY(-0.5px);
            }

            body .cart-drawer .cart__proceed-to-checkout svg {
                padding-right: 3px;
            }

            body .cart-drawer .cart__item-count {
                padding-left: 1px;
            }

            body .cart-drawer .cart__total-price-wrapper strong {
                font-size: 18px;
                margin: 0;
            }

            body .cart-drawer .cart__total-price {
                margin: 0 22.1px 0 0px;
                letter-spacing: 0;
            }

            body .cart-drawer .cart-drawer__badges-list {
                margin: 16.7px 0 0 6px;
                width: 97.3%;
            }

            body .cart-drawer .cart-drawer__badge-wrapper {
                gap: 0px;
                line-height: 11px;
            }

            body .cart-drawer .cart-drawer__badge-wrapper svg,
            body .cart-drawer .cart-drawer__badge-wrapper img {
                height: 72.6px;
            }

            body .cart-drawer .cart-drawer__badge-title {
                font-size: 12px;
            }

            body .cart-drawer .cart-drawer__paypal {
                margin: 6px 0 22.8px 0;
            }

            body .cart-drawer .cart-drawer__upsell-title {
                padding: 0;
                margin: 30px 0 5px;
            }

            body .cart-drawer .cart-drawer__upsell-atc-price {
                height: 27.568px;
                transform: translateY(0.2px);
            }

            body .cart-drawer .cart-drawer__reviews {
                padding: 0 0 0 5.4px;
            }

            body .cart-drawer .cart-drawer__upsell-product-price-wrapper {
                margin: 0;
            }

            body .cart-drawer .cart-drawer__upsell-product-title {
                margin: 1px 0 1px;
                line-height: 17.965px;
            }

            body .cart-drawer .cart-drawer__upsell-atc-form {
                margin-top: 6px;
                margin-left: -0.5px;
                gap: 13.509px;
            }

            body .cart-drawer .cart-drawer__upsell-product-select {
                padding: 4px 20px 4px 5px;
            }

            body .cart-drawer .cart-drawer__upsell-product-info {
                margin-left: 5px;
                padding: 24px 0 0 10px;
                gap: 6px;
            }

            body .cart-drawer .cart-drawer__review-date {
                margin: 15.1px 0 0;
            }

            body .cart-drawer .cart-drawer__review-stars {
                padding: 6px 0;
            }

            body .cart-drawer .cart-drawer__review-headline {
                margin: 2px 0 0;
                font-size: 12.828px;
            }

            body .cart-drawer .cart-drawer__review-content p strong {
                margin: 6.2px 0 0;
                font-size: 12.828px;
                line-height: 12px;
            }

            body .cart-drawer .cart-drawer__review-content {
                font-size: 13.1px;
                line-height: 15px;
                margin: 2.3px 0 0 0.2px;
            }

            body .cart-drawer .cart-drawer__review-item:not(:last-of-type) {
                margin-bottom: 8px;
            }

            body .cart-drawer .cart-drawer__links {
                margin: 27px 0 11px;
            }

            /* Footer */
            body .site-footer {
                padding-top: 44.2px;
            }

            body .site-footer .wrapper {
                max-width: 100%;
                padding: 0 30px;
                max-width: 610px;
            }

            body .site-footer .wrapper .half-content .footer_logo.no-mobile {
                padding-left: 12px;
            }

            body .wrapper .half-content .newsletter-klaviyo {
                margin-bottom: 42px;
            }

            body .footer__logo-anchor>svg {
                margin: 2px 11px 0px 0;
                max-width: unset;
            }

            body .site-footer .wrapper>.half-content:not(.direction-last-half) {
                padding: 0;
            }

            body .site-footer .wrapper>.half-content:first-child .news_letter_title {
                font-size: 21px;
                margin-bottom: 12px;
            }

            body .site-footer .wrapper>.half-content:first-child .popular-collection-links .popular_collections_title {
                margin: 0 0 13px;
            }

            body .footer-section .footer__trust-badge {
                height: 44px;
            }

            body .site-footer .trust-badges-footer-wrapper {
                margin: 31px 6px 15px 0;
            }

            body .site-footer .wrapper .popular-collection-links a {
                margin: 0;
                padding-top: 29.5%;
                width: 22.16%;
            }

            body .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_form_actions button {
                font-size: 14.5px;
                padding: 9px 0 9px 0;
            }

            body .site-footer .wrapper .popular-collection-links {
                padding: 0px 2px;
                gap: 1px 15px;
                justify-content: center;
            }

            body .site-footer .wrapper .half-content .footer_logo.no-mobile {
                margin-bottom: 34px;
            }

            body .site-footer .wrapper .info {
                padding: 42px 0 0 0px;
                margin-bottom: 21px;
            }

            body .site-footer .info__contact-title {
                font-size: 22px;
                padding: 0 8px 0 0;
                font-weight: normal;
            }

            body .site-footer .info .info__contact-title {
                margin-bottom: 11px;
            }

            body .site-footer .wrapper .info .footer__business-info-tel {
                gap: 2px;
                padding-right: 2px;
            }

            body .site-footer .wrapper .info .footer__business-info-email {
                gap: 2px;
                letter-spacing: 0.1px;
                padding: 1px 1px 0 0;
            }

            body .site-footer .wrapper .info .footer__business-info-address {
                gap: 2px;
                padding-right: 2px;
            }

            body .site-footer .wrapper>.half-content {
                padding: 6px 0 0 1px;
            }

            body .site-footer .wrapper .last-half .menu-footer-grid:first-of-type,
            body .site-footer .wrapper .last-half .grid__item:last-of-type {
                padding-left: 0;
                width: auto;
            }

            body .site-footer .wrapper .last-half .no-bullets li {
                margin-bottom: 2.3px;
            }

            body .site-footer .wrapper .last-half .menu-footer-grid:first-of-type .nav-title,
            body .site-footer .wrapper .last-half .menu-footer-grid:last-of-type .nav-title {
                margin-bottom: 8.5px;
            }

            body .site-footer .wrapper .last-half .menu-footer-grid:first-of-type .nav-title,
            body .site-footer .wrapper .last-half .menu-footer-grid:first-of-type .no-bullets {
                margin-left: 43px;
            }

            body .site-footer .wrapper .last-half .grid__item .nav-title {
                margin: 1px 0px 8.2px 0px;
            }

            body .site-footer .credits {
                margin-top: 21px;
            }

            body .site-footer .trust-badges-wrapper {
                width: 388px;
                gap: 11px;
                margin: 0 auto;
                transform: translatex(3px);
            }

            body .site-footer .credits p {
                letter-spacing: 0.1px;
            }

            body .site-footer .wrapper .last-half .half-content__menu-divider {
                margin-right: 26px;
            }

            body .site-footer .wrapper .last-half .grid__item:last-of-type {
                margin: 0 2px 0 0px;
            }

            body .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_field_group input {
                padding: 0px 21px 2px;
                letter-spacing: 0.2px;
            }

            body .wrapper .half-content .newsletter-klaviyo .klaviyo_inputs_wrapper {
                padding: 1px 0px 1px 0px;
                margin: 0;
                flex: 0 0 100%;
            }

            body .site-footer .wrapper .klaviyo_inputs_wrapper {
                max-width: 550px;
            }

            body .site-footer .klaviyo_condensed_styling {
                display: flex;
            }

            body .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_form_actions {
                margin: 1px 2px 1px 9px;
            }

            .site-footer .wrapper .copyright-class *,
            .site-footer .wrapper .copyright-class {
                letter-spacing: -0.1px;
                font-weight: 400;
                color: #D9D9D9;
                font-style: normal;
            }

            body .cart-drawer .cart-drawer__coupon {
                font-size: 14px;
            }
        }

        /* End Responsive: TABLET */
        /* Responsive: MOBILE */
        @media (max-width: 767px) {
            body .header__item-wrapper .header__item-menu-mobile {
                padding-top: 5px;
            }

            body .shipping-bar__wrapper {
                padding: 0 21px 0 17.5px;
            }

            body .shipping-bar__link[href^="tel"] svg {
                width: 10.5px !important;
            }

            body .shipping-bar__link[href^="mailto"] svg {
                width: 12.5px !important;
            }

            body .shipping-bar__message {
                padding-left: 3px;
            }

            body .site-footer .wrapper .klaviyo_inputs_wrapper {
                max-width: unset;
            }

            body .header__section-wrapper {
                margin-bottom: 10px;
            }

            body .header .header__item-wrapper {
                margin: 15.3px auto 12px;
            }

            body .header .header__search-input {
                margin: 0;
                padding: 2px 10px 2px;
                font-size: 12px;
                width: 70%;
            }

            body .header .header__search-input::placeholder {
                font-size: 12px;
                font-style: normal;
                font-weight: 400;
                letter-spacing: 0;
            }

            body .header__item-menu-mobile-wrapper {
                margin-top: 0;
            }

            body .header__logo-wrapper svg,
            body .header__logo-wrapper img {
                width: 105px;
            }

            body .header__logo-wrapper svg {
                margin: 0.4px 0 0 0px;
                width: 123px;
            }

            body .header__search-form-wrapper {
                margin: 0 auto 5px;
            }

            body .header__item-cart {
                padding-top: 2px;
                padding-right: 0px;
                margin: 0 1px 1px 0;
            }

            body .header__item-menu-mobile-wrapper,
            body .header__item-cart {
                gap: 4px;
            }

            body .header .header__item-cart-svg {
                width: 25px;
                height: 20px;
                transform: translatey(1px);
                margin: 0px 0 1.5px 0;
            }

            body .header .header__item-cart-text {
                line-height: 1;
                letter-spacing: 0.2px;
                font-size: 10px;
                transform: translatey(-1px);
                color: #000;
            }

            body .header .header__item-cart-number {
                top: 1px;
                z-index: 1;
                width: 12px;
                height: 12px;
                right: 3px;
                font-size: 11px;
            }

            body .header .header__search-button {
                width: 30.6%;
                padding-left: 3px;
            }

            body .shipping-bar .shipping-bar__message {
                margin: 1px 0 0 0;
                padding-left: 4px;
            }

            body .header .header__search-button svg {
                margin: 1px 0 0 5px;
            }

            body .site-footer {
                padding-bottom: 36px;
                padding-top: 44px;
            }

            body .footer__logo-anchor>img {
                margin: 2.5px 10px 0.5px 1.5px;
                width: 83.5px;
            }

            body .site-footer .wrapper {
                max-width: unset;
                padding: 0;
            }

            body .site-footer .wrapper .half-content .footer_logo.mobile {
                margin-bottom: 24.5px;
            }

            body .site-footer .wrapper .grid__item,
            body .site-footer .wrapper .popular-collection-links {
                padding: 0;
            }

            body .site-footer .wrapper>.half-content:first-child .news_letter_title {
                margin-bottom: 8px;
                font-size: 13px;
                padding: 1px 0 0 7.2px;
                letter-spacing: 0.05px;
                text-align: left;
            }

            body .wrapper .half-content .newsletter-klaviyo .klaviyo_inputs_wrapper {
                padding: 0;
            }

            body .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_field_group input {
                font-size: 12px;
                padding: 1px 0 2px 2px !important;
                letter-spacing: 0px;
                color: #fff;
            }

            body .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_field_group input::placeholder {
                font-size: 12px;
                letter-spacing: -0.01px;
            }

            body .site-footer .wrapper .popular-collection-links {
                gap: 2px;
                justify-content: space-between;
            }

            .site-footer .wrapper .grid__item .newsletter-klaviyo .klaviyo_inputs_wrapper .klaviyo_form_actions {
                width: 112.5px;
                margin: 0 1px 1px 0;
                border-radius: 2px;
            }

            body .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_form_actions {
                margin: 0;
            }

            body .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_form_actions button {
                font-size: 10px;
                padding: 1px 1px 0px 0 !important;
                height: 35px;
                border-radius: 1.916px;
            }

            body .site-footer .wrapper .grid__item .newsletter-klaviyo .klaviyo_inputs_wrapper {
                height: 39px;
                border-radius: 2px;
            }

            body .site-footer .wrapper .grid__item .newsletter-klaviyo {
                margin-bottom: 31px;
            }

            body .site-footer .wrapper>.half-content:first-child .popular-collection-links .popular_collections_title {
                padding-right: 2px;
                font-size: 14px;
                letter-spacing: 0;
                line-height: 19px;
                margin-bottom: 9.5px;
            }

            body .site-footer .wrapper .popular-collection-links a {
                padding-top: 30.5%;
                width: 23.06%;
            }

            body .site-footer .wrapper .info {
                padding: 30px 0 0 0;
                margin-bottom: 11px;
            }

            body .site-footer .info .info__contact-title {
                margin-bottom: 7px;
                padding-left: 8px;
            }

            body .site-footer .wrapper .info .footer__business-info-tel {
                gap: 1px;
                padding-right: 3px;
            }

            body .site-footer .wrapper .info .footer__business-info-email {
                padding: 1px 1px 0 0;
            }

            body .site-footer .wrapper .info .footer__business-info-email svg {
                width: 11.8px;
                height: 10px;
            }

            body .site-footer .wrapper .info .footer__business-info-address {
                padding-right: 0.1px;
                letter-spacing: 0.1px;
            }

            body .site-footer .wrapper .last-half .half-content__menus {
                padding-left: 17px;
            }

            body .site-footer .wrapper .last-half .grid__item:last-of-type {
                margin: 0 0 0 19px;
            }

            .site-footer .menu-footer-grid .nav-title.row-rotate svg {
                transform: rotate(0deg) scale(1.1);
            }

            body .site-footer .wrapper .last-half .no-bullets li,
            body .site-footer .wrapper .last-half .menu-footer-grid:first-of-type .nav-title,
            body .site-footer .wrapper .last-half .menu-footer-grid:last-of-type .nav-title {
                margin: 0;
                line-height: 17px;
            }

            body .site-footer .wrapper .last-half .menu-footer-grid:first-of-type .nav-title {
                padding-right: unset;
                gap: 2px;
            }

            body .site-footer .wrapper .last-half .menu-footer-grid:first-of-type .no-bullets {
                margin: unset;
            }

            body .site-footer .credits {
                margin: 15px 0 0;
            }

            body .site-footer .credits .trust-badges-footer-wrapper {
                width: 100%;
                margin: 0 0 19.5px;
            }

            body .site-footer .trust-badges-wrapper {
                width: calc(100% - 3px);
                gap: 4px;
                margin: 0 auto;
                transform: unset;
            }

            body .site-footer .wrapper .copyright-class *,
            body .site-footer .wrapper .copyright-class {
                letter-spacing: inherit;
                font-size: 12px;
                padding: 0;
            }

            body .site-footer .wrapper .copyright-class {
                margin: 5.3px 0 0 0;
            }

            body .footer-section .footer__trust-badge {
                height: 40px;
            }

            body .site-footer .credits.desktop .wrapper .copyright-class,
            body .site-footer .credits p a {
                font-size: 11px;
                letter-spacing: 0.4px
            }

            body .site-footer .menu-footer-grid .footer-menu-item a {
                margin-bottom: 0.4px;
                letter-spacing: 0.1px;
            }

            .site-footer .wrapper .copyright-class *,
            .site-footer .wrapper .copyright-class {
                letter-spacing: 0.1px;
            }

            body .cart-drawer .cart-drawer__box {
                max-width: 350px;
            }

            body .cart-drawer .cart-drawer__box:not(.cart-drawer--empty) .cart-drawer__title:before {
                width: 5px;
                height: 5px;
                font-size: 10px;
                top: 0px;
                left: 84px;
            }

            body .cart-drawer .cart-drawer__title {
                margin: 0;
                font-size: 12px;
                padding-left: 30px;
                letter-spacing: 0;
            }

            body .cart-drawer .cart-drawer__title-shipping-bar {
                transform: unset;
                letter-spacing: 0;
                font-size: 12px;
                padding: 0;
                margin-bottom: 10px;
            }

            body .cart-drawer .cart-drawer__header {
                margin: 0 0 10px;
                padding: 0px 10px;
            }

            body .cart-drawer .cart-drawer__close {
                height: 20px;
            }

            body .cart-drawer .cart-drawer__close svg path {
                fill: #fff;
            }

            body .cart-drawer .cart-drawer__shipping-bar {
                height: 19.5px;
            }

            body .cart-drawer .cart-drawer__box-content {
                padding: 0 20px;
            }

            body .cart-drawer .cart-drawer__shipping {
                margin-bottom: 2px;
                padding: 0;
            }

            body .cart-drawer .cart-drawer__shipping-text {
                font-size: 12px;
                padding: 0;
            }

            body .cart-drawer .cart-items__line-item {
                padding: 16.5px 0 6.9px 0;
                margin: 0;
                gap: 15px;
            }

            body .cart-drawer .cart-items__item-title {
                margin: 1px 0 4px;
            }

            body .cart-drawer .cart-items__item-result {
                padding: 1px 0.5px 1.5px 0;
                align-items: end;
            }

            body .cart-drawer .cart-items__remove-text {
                font-size: 10px;
                margin: 0 0px 3px 3px;
            }

            body .cart-drawer .cart-items__item-variant {
                margin-bottom: 5.9px;
                font-size: 12px;
            }

            body .cart-drawer .cart-items__item-quantity-wrapper {
                transform: translate(0px, -0.2px);
                height: 25px;
                width: 65px;
            }

            body .cart-drawer .cart-items__item-quantity-wrapper .cart-items__item-minus path {
                transform: translate(-1.3px, 0.4px);
            }

            body .cart-drawer .cart__total-price {
                margin: 0;
                font-size: 16px;
            }

            body .cart-drawer .cart-items__item-remove {
                margin: 0;
            }

            body .cart-drawer .cart-items__item-quantity {
                padding: 1.4px 0.5px 0 0;
            }

            body .cart-drawer .cart__total-price-wrapper {
                margin: 32px 0 21px 0;
                padding: 0 3.5px 0 3.9px;
                letter-spacing: 0;
            }

            body .cart-drawer .cart__proceed-to-checkout {
                width: 100%;
                height: 40px;
                align-items: center;
                padding: 0px 4px 0px 4px;
                font-size: 16px;
            }

            body .cart-drawer .cart__proceed-to-checkout svg {
                width: 18px;
                height: 14px;
                padding-right: 3.8px;
                margin-right: 2.1px;
            }

            body .cart-drawer .cart__item-count {
                padding: 0 2.1px 0 2px;
            }

            body .cart-drawer .cart__total-price-wrapper strong {
                font-size: 12.8px;
            }

            body .cart-drawer .cart-drawer__coupon {
                margin: 5px 0 16px;
                font-size: 12px;
            }

            body .cart-drawer .cart-drawer__badges-list {
                margin: 0px 0px 0 0.8px;
                width: 100%;
            }

            body .cart-drawer .cart-drawer__badge-wrapper {
                gap: 1.2px;
                line-height: 13px;
            }

            body .cart-drawer .cart-drawer__badge-wrapper svg,
            body .cart-drawer .cart-drawer__badge-wrapper img {
                height: 48px;
            }

            body .cart-drawer .cart-drawer__paypal {
                margin: 10px 0 10px 0;
            }

            body .cart-drawer .cart-drawer__upsell-title {
                font-size: 16px;
                margin: 20.8px 0 2.5px;
            }

            body .cart-drawer .cart-drawer__upsell-product-price-wrapper {
                margin: 2px 0px 0 0px;
            }

            body .cart-drawer .cart-drawer__upsell-product-title {
                margin: 1px 0 2.2px;
                line-height: 14.165px;
            }

            body .cart-drawer .cart-drawer__upsell-subtitle {
                font-size: 12px;
            }

            body .cart-drawer .cart-drawer__upsell-list-items {
                margin: 20px auto 19.6px;
            }

            body .cart-drawer .cart-drawer__upsell-product-title-price-wrapper {
                margin-top: 1.5px;
            }

            body .cart-drawer .cart-drawer__upsell-product-info {
                margin-left: 2px;
                padding: 15px 0 0 7px;
                gap: 8px;
            }

            body .cart-drawer .cart-drawer__upsell-atc-form {
                margin-top: 0;
                gap: 7px;
            }

            body .cart-drawer .cart-drawer__upsell-product {
                padding: 10px 7px 10px 2px;
            }

            body .cart-drawer .cart-drawer__upsell-atc-price-wrapper {
                transform: translateY(-0.4px);
            }

            body .cart-drawer .cart-drawer__upsell-product-select {
                width: 93px;
                padding: 4px 13px 4px 3px;
            }

            body .cart-drawer .cart-drawer__upsell-product-price {
                font-size: 14px;
                padding: 0px 0.8px 0px 0px;
                transform: translateY(-0.3px);
            }

            body .cart-drawer .cart-drawer__upsell-atc-price {
                height: 21px;
            }

            body .cart-drawer .cart-drawer__upsell {
                margin: 0 auto 25.5px;
                width: 100%;
            }

            body .cart-drawer .cart-drawer__review-stars {
                padding: 0;
                margin: 5px 0 4px;
            }

            body .cart-drawer .cart-drawer__review-headline {
                font-size: 14px;
                margin: 0;
                letter-spacing: -0.1px;
            }

            body .cart-drawer .cart-drawer__review-content p strong {
                margin: 0;
                font-size: 12px;
                line-height: 1;
            }

            body .cart-drawer .cart-drawer__reviews {
                margin: 10px auto 27px;
                padding: 0;
            }

            body .cart-drawer .cart-drawer__review-content {
                font-size: 12px;
                line-height: 1.2;
                margin: 5px 0 0 0.6px;
                letter-spacing: 0.135px;
            }

            body .cart-drawer .cart-drawer__review-date {
                margin: 15.1px 0 0 0.5px;
                font-size: 12px;
            }

            body .cart-drawer .cart-drawer__review-item:not(:last-of-type),
            body .cart-drawer .cart-drawer__review-item {
                margin-bottom: 2.4px;
            }

            body .cart-drawer .cart-drawer__links {
                margin: 0px 0 14px;
                font-size: 12px;
            }
        }
    </style>

    <!-- snippets/custom-index-css -->
    <style>
        .template-index #new-banner-layout.top-banner .new-banner__upper-headline {
            margin-bottom: 0;
            letter-spacing: 0.5px;
        }

        .template-index #new-banner-layout.top-banner .new-banner__upper-headline svg path {
            fill: #FF9900;
        }

        .template-index #new-banner-layout.top-banner .new-banner__banner-title {
            line-height: 1.17;
            margin: 9px 0 10px;
        }

        .template-index #new-banner-layout.top-banner .new-banner__banner-sub-title {
            margin: 8px 0 34px;
            letter-spacing: -0.1px;
        }

        .template-index .new-banner__banner-titles-new-button {
            padding: 16px 10px !important;
            text-transform: uppercase;
        }

        .template-index #new-banner-layout.bottom-banner .new-banner__banner-titles {
            max-width: 80%;
            padding: 5px 30px 5px 30px;
        }

        .template-index #new-banner-layout.bottom-banner .new-banner__banner-title h2 {
            font-family: 'Luxia', sans-serif;
            letter-spacing: 0;
        }

        .template-index #new-banner-layout.bottom-banner .new-banner__banner-title {
            line-height: 1;
            padding: 0 0 1px;
        }

        .template-index #new-banner-layout.bottom-banner .new-banner__banner-sub-title {
            margin: 10px 0 28px;
            letter-spacing: 0px;
        }

        .template-index #new-banner-layout.bottom-banner .new-banner__banner-titles-new-button {
            width: 231px;
            height: 66px;
            align-items: center;
            transform: translateX(-1px) !important;
        }

        .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews {
            margin: 4px 0 0 10px;
            backdrop-filter: blur(10.5px);
            -webkit-backdrop-filter: blur(10.5px);
            border-radius: 10px;
            border: 1px solid #FFF;
            background: linear-gradient(251deg, rgba(126, 126, 126, 0.22) -21.53%, rgba(217, 217, 217, 0.00) 105.08%);
            padding: 10px;
        }

        .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews+.new-banner__block-reviews {
            margin: 4px 8px 0 0;
        }

        .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews__head {
            gap: 23px;
            padding-right: 6px;
        }

        .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews+.new-banner__block-reviews .new-banner__block-reviews__head {
            padding-right: 6px;
        }

        .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews__author-img {
            width: 65px;
            height: 65px;
            margin-left: 6px;
        }

        .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews__stars svg {
            width: 16.7px;
            height: 16px;
        }

        .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews__content {
            margin-top: 17px;
            line-height: 1.2;
            letter-spacing: 0px;
        }

        .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews__name {
            letter-spacing: 0.5px;
            transform: unset;
        }

        .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews__author-img img {
            transform: translate(0px, -3px);
            border-radius: 50%;
            object-fit: cover;
        }

        .template-index .shipping-text {
            padding: 64px 0;
        }

        .template-index .custom-uvp {
            padding: 4px 0 75px;
        }

        .template-index .bottom-uvp {
            /*padding: 4px 0 122px;*/
        }

        .template-index .shipping-text .section-title {
            line-height: unset;
            margin: 1px 0 11px;
            letter-spacing: 0;
            padding: 0px 2px 0 0px;
            color: #fff;
        }

        .template-index .custom-uvp .section-title {
            line-height: unset;
            margin: 4px 0 5px;
            letter-spacing: 0px;
            padding: 0;
            color: #252525;
        }

        .template-index .shipping-text-uvp-2 {
            margin-top: 37px;
        }

        .template-index .shipping-text .shipping-text__titles {
            margin-bottom: 49px;
            padding-left: 13px;
        }

        .template-index .custom-uvp .shipping-text__titles {
            padding: 0px 5px;
            margin-bottom: 15px;
        }

        .template-index .shipping-text .shipping-text-content {
            gap: 21px 0;
        }

        .template-index .shipping-text .section-subtitle {
            letter-spacing: 0;
            padding-right: 2px;
            color: #fff;
        }

        .template-index .bottom-uvp .section-subtitle {
            color: #000;
        }

        .template-index .custom-uvp .section-subtitle {
            line-height: 25px;
            padding: 0 25px;
            text-align: center;
            letter-spacing: -0.1px;
        }

        .template-index .reviews .reviews__section-title {
            margin-top: 12px;
            padding: 0px;
            color: #252525;
        }

        .template-index .reviews .reviews__content {
            padding: 50px 0;
        }

        .template-index .new-collection-list__wrapper {
            margin-bottom: 53px;
            padding: 0 21.5px 1px;
        }

        .template-index .new-collection-list__item-title {
            bottom: 25px;
            font-weight: bold;
        }

        .template-index .new-collection-list__image-wrapper {
            padding-top: 133%;
            width: 89%;
        }

        .template-index .new-collection-list__item {
            margin: 0;
        }

        .template-index .new-collection-list__wrapper .slick-slide {
            width: 273px;
        }

        .template-index .new-collection-list__title {
            padding: 35px 0;
            font-size: 36px;
            letter-spacing: 0;
            line-height: 1.2;
        }

        .template-index .slick-slide {
            margin: 0 10px;
        }

        .template-index .uvp-slider .slick-slide div {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .template-index .shipping-text .shipping-text-content .shipping-text-text {
            margin: 0;
            padding: 1px 0 0 0;
        }

        .template-index .shipping-text .shipping-text-content .shipping-body-text {
            line-height: 24px;
            padding: 12px 20px 0 20px;
        }

        .template-index .shipping-text .shipping-text__uvps {
            width: 86%;
        }

        .template-index .uvp-slider .shipping-text__uvps {
            /*width: 96%;*/
        }

        .template-index .custom-uvp .shipping-text__uvps {
            width: 100%;
            max-height: 44px;
            gap: 34px;
            padding: 0 24px;
        }

        .template-index .product-card__reviews {
            display: flex;
            padding-left: 10px;
            gap: 0 5px;
        }

        .template-index .product-card__reviews svg path {
            fill: #FF9900;
        }

        .template-index .product-card__reviews svg {
            width: 80px;
            height: 16px;
        }

        .template-index .product-card__reviews span {
            font-size: 13px;
        }

        .template-index .featured-collection.bottom-featured-collection {
            padding: 64px 0 53px;
        }

        .template-index .featured-collection.bottom-featured-collection .product-card__grid-item-image-wrapper {
            margin-bottom: 12px;
            padding-top: 108.8%;
        }

        .template-index .featured-collection__title {
            margin-bottom: 33px;
            padding-right: 3px;
            color: #252525;
        }

        .template-index .bottom-featured-collection .featured-collection__title {
            margin-bottom: 32px;
        }

        .template-index .featured-collection__grid-uniform .product-card__grid-item {
            padding: 0 0 3px;
            border-radius: 8px 8px 10px 10px !important;
            flex-basis: 23.1%;
        }

        .template-index .top-featured-collection .featured-collection__grid-uniform .product-card__grid-item-image-wrapper {
            margin-bottom: 16px;
        }

        .template-index .featured-collection .top-featured-collection {
            padding: 64px 0 7px;
        }

        .template-index .featured-collection__grid-uniform {
            gap: 30px 13.9px;
        }

        .template-index .featured-collection .product-card__item-title {
            margin: 0px 0 8px;
            line-height: 22.6px;
            height: auto;
            font-size: 18px;
            letter-spacing: 0;
            padding: 0 12px;
        }

        .template-index .featured-collection.bottom-featured-collection .product-card__item-title {
            line-height: 22px;
            padding-left: 11.7px;
            margin-top: 3px;
            font-size: 18px;
            letter-spacing: 0;
        }

        /* FAQ */
        .template-index .faq-section__wrapper {
            padding: 58.4px 0 37.5px;
        }

        .template-index .faq-section__title {
            line-height: 56px;
            margin-bottom: 8px;
            color: #252525;
        }

        .template-index .faq-section__subtitle {
            letter-spacing: 0;
            line-height: 28px;
            color: #555;
        }

        .template-index .faq-section__headline-titles {
            margin-bottom: 35px;
        }

        .template-index .faq-section__accordion-title-wrapper {
            padding: 19.2px 8.6px 19.9px 15px;
        }

        .template-index .faq-section__accordion-content-wrapper {
            padding: 6px 15.6px 20px;
        }

        .template-index .faq-section__accordion-title {
            letter-spacing: 0;
        }

        .template-index .faq-section__accordion-title svg {
            transform: translate(-4px, 0px) rotate(0deg);
        }

        .template-index .faq-section__accordion.active .faq-section__accordion-title svg {
            transform: translate(-4px, 0px) rotate(90deg);
        }

        @media (max-width: 1019px) {
            .template-index #new-banner-layout.top-banner .new-banner__banner-titles {
                margin-left: 5px;
            }

            .template-index #new-banner-layout.top-banner .new-banner__upper-headline svg {
                width: 58px;
            }

            .template-index #new-banner-layout.top-banner .new-banner__upper-headline {
                letter-spacing: 0px;
                margin-top: 1.3px;
            }

            .template-index #new-banner-layout.top-banner .new-banner__banner-title {
                line-height: 1.2;
                margin-top: 9.4px;
            }

            .template-index #new-banner-layout.top-banner .new-banner__banner-sub-title {
                margin: 11.3px 0 6px;
                width: 80%;
                letter-spacing: 0px;
            }

            .template-index .new-collection-list__wrapper {
                margin-bottom: 34px;
            }

            .template-index .shipping-text .shipping-text-content .shipping-text-text {
                margin: 8px 0 9px;
                letter-spacing: 0.2px;
            }

            .template-index .faq-section__accordion-title-wrapper {
                padding: 19.4px 11.6px 19.6px 15.4px;
            }

            .template-index .new-collection-list__item-title {
                bottom: 22px;
                letter-spacing: -0.69px;
                padding-right: 1px;
            }

            .template-index .new-collection-list__title {
                padding: 21px 0 30px;
                font-size: 28px;
                letter-spacing: 0.3px;
            }

            .template-index .new-collection-list__wrapper .slick-slide {
                width: 227.62px;
            }

            .template-index .new-collection-list__image-wrapper {
                padding-top: 137.7%;
                width: 92.1%;
            }

            .template-index .shipping-text {
                padding: 43px 0;
            }

            .template-index .custom-uvp {
                padding: 44px 0 48px;
            }

            .template-index .shipping-text .section-title {
                letter-spacing: 0.28px;
                line-height: 32px;
                margin: 2px 0 0 0;
                padding: 0;
            }

            .template-index .custom-uvp .section-title {
                letter-spacing: 0;
            }

            .template-index .shipping-text .section-subtitle {
                padding-right: 1px;
            }

            .template-index .shipping-text-uvp-2 {
                margin-top: 18px;
            }

            .template-index .shipping-text .shipping-text__titles {
                padding-left: 10px;
                margin-bottom: 33.8px;
                line-height: 16.846px;
            }

            .template-index .custom-uvp .shipping-text__titles {
                padding: 0px 20px;
                gap: 15.5px;
                margin-bottom: 30px;
            }

            .template-index .custom-uvp .section-subtitle {
                margin: 0;
                padding: 0;
                line-height: 140%;
            }

            .template-index .shipping-text .shipping-text-content {
                gap: 1.1px;
            }

            .template-index .custom-uvp .shipping-text-content {
                flex: 0 14.1% !important;
                height: 40px;
            }

            .template-index .shipping-text .shipping-text__uvps {
                width: 83%;
            }

            .template-index .uvp-slider .shipping-text__uvps {
                /*width: 96%;*/
            }

            .template-index .custom-uvp .shipping-text__uvps {
                width: 100%;
                flex-wrap: wrap;
                gap: 19px 16px;
                padding: 0 81px;
                max-height: unset;
            }

            .template-index .shipping-text .shipping-text-content .shipping-body-text {
                line-height: 10.8px;
                padding: 0;
                letter-spacing: 0.2px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews__infos {
                line-height: 20px;
                transform: translateY(-1.5px);
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__banner-sub-title {
                margin: 26px 0 21px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__banner-titles-new-button {
                width: 217px;
                height: 66px;
                padding: 11px 10px 10px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews {
                margin-left: 0;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews__stars svg {
                width: 16.5px;
                height: 17px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews__content {
                letter-spacing: 0.8px;
                font-size: 14px;
                width: auto;
                margin-top: 14px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews+.new-banner__block-reviews .new-banner__block-reviews__content {
                transform: translatex(1px);
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews__head {
                transform: translate(-2.5px, -1.8px);
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__banner-title {
                padding: 2px 1px 0px 0px;
                line-height: 34px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__banner-sub-title {
                letter-spacing: 0px;
                padding: 0;
                margin: 25px 0 23px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews+.new-banner__block-reviews .new-banner__block-reviews__head {
                padding-left: 9px;
                margin-left: 0.6px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews+.new-banner__block-reviews {
                margin: 0px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews .new-banner__block-reviews__name {
                margin-bottom: 0px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews {
                margin: 0;
                padding: 10px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews__author-img {
                margin-top: 5px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews__name {
                letter-spacing: 1px;
            }

            .template-index .featured-collection.bottom-featured-collection {
                padding: 45px 0 0px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__banner-titles {
                max-width: 100%;
            }

            .template-index .featured-collection .top-featured-collection {
                padding: 45px 0 15px;
            }

            .template-index .featured-collection .featured-collection__title {
                letter-spacing: 0.3px;
                margin-bottom: 29px;
                padding-left: 3px;
            }

            .template-index .bottom-featured-collection .featured-collection__title {
                margin-bottom: 30px;
            }

            .template-index .featured-collection__grid-uniform {
                gap: 27px 28px;
            }

            .template-index .top-featured-collection .featured-collection__grid-uniform .product-card__grid-item-image-wrapper {
                margin-bottom: 12px;
                padding-top: 108.5%;
            }

            .template-index .featured-collection__grid-uniform .product-card__grid-item {
                flex-basis: 45.58%;
                padding: 0;
                border-radius: 12px 12px 10px 10px !important;
            }

            .template-index .featured-collection .product-card__item-title {
                font-size: 23px;
                margin: 10px 0 2px;
                line-height: 27.6px;
                padding-left: 14px;
            }

            .template-index .featured-collection__grid-uniform .product-card__grid-item-image-wrapper {
                padding-top: 108.3%;
            }

            .template-index .featured-collection.bottom-featured-collection .product-card__item-title {
                line-height: 28px;
                padding-left: 14px;
                margin: 11px 0 3px;
                font-size: 23px;
                letter-spacing: 0;
            }

            .template-index .featured-collection.bottom-featured-collection .product-card__grid-item-image-wrapper {
                margin-bottom: 8px;
                padding-top: 108.6%;
            }

            .template-index .featured-collection.bottom-featured-collection .featured-collection__grid-uniform {
                gap: 29px 28px;
            }

            .template-index .reviews .reviews__content {
                padding: 15px 0;
            }

            .template-index .reviews .reviews__section-title {
                margin-top: 16px;
                padding-right: 7px;
                letter-spacing: 0.28px;
                line-height: 34px;
            }

            .template-index .faq-section__wrapper {
                padding: 35px 0 29px;
            }

            .template-index .faq-section__title {
                letter-spacing: 0.3px;
                margin: 0;
            }

            .template-index .faq-section__subtitle {
                font-size: 15px;
                letter-spacing: 0.2px;
                line-height: 1.2;
                margin: 3.8px 0px 0 0px;
            }

            .template-index .faq-section__headline-titles {
                margin-bottom: 29.5px;
            }

            .template-index .faq-section__accordion .faq-section__accordion-title {
                letter-spacing: -0.02px;
            }

            .template-index .faq-section__accordion-content-wrapper {
                padding: 6px 15px 21px;
            }
        }

        @media (max-width: 767px) {
            .template-index #new-banner-layout.top-banner .new-banner__upper-headline {
                margin-top: 9px;
                gap: 9px;
            }

            .template-index .product-card__reviews span {
                font-size: 10px;
                letter-spacing: -0.1px;
            }

            .template-index #new-banner-layout.top-banner .new-banner__upper-headline svg {
                width: 64px;
            }

            .template-index .product-card__grid-item-link {
                min-height: 100%;
            }

            .template-index .new-banner__banner-titles-new-button {
                padding: 12px 10px !important;
            }

            .template-index .product-card__reviews {
                padding-left: 3px;
                gap: 0 2px;
            }

            .template-index .product-card__reviews svg {
                width: 55px;
            }

            .template-index #new-banner-layout.top-banner .new-banner__banner-titles {
                max-width: 100%;
                margin: 6px 0 6px;
            }

            .template-index #new-banner-layout.top-banner .new-banner__banner-title {
                padding: 0;
                letter-spacing: 0px;
                line-height: 22.5px;
                margin: 5px 0px 10px 0;
            }

            .template-index #new-banner-layout.top-banner .new-banner__banner-sub-title {
                padding: 0px;
                margin: 0 0 25px;
                letter-spacing: 0;
                width: 90%;
            }

            .template-index .shipping-text {
                padding: 10px 10px 8px;
            }

            .template-index .shipping-text .section-title {
                letter-spacing: 0;
                line-height: 30px;
                padding: 0;
                margin-top: 4px;
            }

            .template-index .custom-uvp .section-title {
                letter-spacing: 0;
                line-height: 14px;
                padding: 0;
                margin: 12px 0 3.5px;
            }

            .template-index .shipping-text .section-subtitle {
                letter-spacing: 0.24px;
                padding: 0;
                text-transform: unset;
            }

            .template-index .custom-uvp .section-subtitle {
                line-height: 17px;
                margin-bottom: 22px;
            }

            .template-index .shipping-text .shipping-text__titles {
                margin-bottom: 1px;
            }

            .template-index .shipping-text .shipping-text__uvps {
                width: 100%;
                gap: 6.8px 0px;
            }

            .template-index .custom-uvp .shipping-text__uvps {
                width: 100%;
                padding: 0 19px 4px;
                gap: 5px 10px;
                max-height: unset;
            }

            .template-index .shipping-text .shipping-text-content .shipping-text-text {
                margin: 8px 0 9px;
                letter-spacing: 0;
            }

            .template-index .featured-collection .featured-collection__title {
                letter-spacing: 0.2px;
                padding-left: 3px;
            }

            .template-index .shipping-text .shipping-text-content .shipping-body-text {
                line-height: 15px;
                padding: 0;
                letter-spacing: 0;
            }

            .template-index .shipping-text .shipping-text-content {
                padding: 8px 4px;
                margin-left: 0.5px;
                max-width: 200px;
                gap: 1px;
            }

            .template-index .custom-uvp .shipping-text-content {
                flex: 0 21.2% !important;
                padding: 6px 0px;
                height: 50px;
            }

            .template-index .custom-uvp .shipping-text-content img {
                width: 100% !important;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__banner-titles {
                max-width: 100%;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__banner-title {
                line-height: 30px;
                letter-spacing: 0px;
                padding: 7.1px 15px 8px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__banner-sub-title {
                width: 89%;
                margin: 10px auto 10px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__banner-titles-new-button {
                width: 151.6px;
                height: 46.6px;
                padding: 12.4px 10px 10px 11px;
                letter-spacing: -0.2px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews__head {
                gap: 20px;
                padding: 2px 0 11px 6px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews__author-img {
                width: 57px;
                height: 57px;
                margin-left: 0px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews__infos {
                margin-bottom: 0px;
                transform: unset;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews__stars svg {
                width: 14.1px;
                height: 14px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews__content {
                margin: 0 0 6px;
                padding-right: 2px;
                font-size: 18px;
                width: 100%;
                text-align: center;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews {
                padding: 10px;
            }

            .template-index #new-banner-layout.bottom-banner .new-banner__block-reviews__name {
                font-size: 18px;
            }

            .template-index .featured-collection.bottom-featured-collection {
                padding: 19px 0 1px;
            }

            .template-index .featured-collection .top-featured-collection {
                padding: 20px 0 4px;
            }

            .template-index .featured-collection .featured-collection__title {
                margin-bottom: 22px;
            }

            .template-index .bottom-featured-collection .featured-collection__title {
                margin-bottom: 23px;
            }

            .template-index .main-content .featured-collection .featured-collection__grid-uniform {
                gap: 21px 22px;
            }

            .template-index .featured-collection__grid-uniform .product-card__grid-item {
                flex-basis: 41.7%;
            }

            .template-index .featured-collection .product-card__grid-item .product-card__item-title {
                font-size: 12px;
                line-height: 14px;
                padding-left: 2px;
                margin: 2.2px 0 4px;
            }

            .template-index .main-content .featured-collection__grid-uniform .product-card__grid-item-image-wrapper {
                padding-top: 109.7%;
                margin-bottom: 6.9px;
            }

            .template-index .featured-collection.bottom-featured-collection .featured-collection__grid-uniform {
                gap: 21px 22px;
            }

            .template-index .featured-collection.bottom-featured-collection .featured-collection__grid-uniform .product-card__grid-item-image-wrapper {
                padding-top: 110%;
                margin-bottom: 6px;
            }

            .template-index .featured-collection__grid-uniform .product-card__grid-item {
                border-radius: 4.459px 4.459px 5.574px 5.574px !important;
            }

            .template-index .new-collection-list__wrapper {
                padding: 0 20px 0px;
                margin-bottom: 36px;
            }

            .template-index .new-collection-list__wrapper .slick-slide {
                width: 210.781px;
            }

            .template-index .new-collection-list__title {
                padding: 20px 0 26px;
                font-size: 20px;
                letter-spacing: 0.2px;
            }

            .template-index .new-collection-list__image-wrapper {
                padding-top: 132.9%;
                width: 88.8%;
            }

            .template-index .new-collection-list__item-title {
                bottom: 18px;
            }

            .template-index .reviews .reviews__content {
                padding: 0;
            }

            .template-index .reviews .reviews__section-title {
                padding-right: 0;
                letter-spacing: 0;
                margin: 15px auto;
                line-height: 24px;
            }

            .template-index .faq-section__wrapper {
                padding: 21px 0 13px;
            }

            .template-index .faq-section__title {
                line-height: 1;
                padding: 0 1px 0 0;
                letter-spacing: -0.06px;
                margin: 0 0 12px;
            }

            .template-index .faq-section__headline-titles {
                margin-bottom: 25.5px;
            }

            .template-index .faq-section__subtitle {
                letter-spacing: 0.1px;
            }

            .template-index .faq-section__accordion .faq-section__accordion-title {
                letter-spacing: 0px;
                gap: 15px;
                word-spacing: unset;
            }

            .template-index .faq-section__accordion-title-wrapper {
                padding: 8.7px 2.5px 8.7px 5.6px;
                font-size: 14px;
            }

            .template-index .faq-section__accordion-content-wrapper {
                padding: 3px 6.7px 9.3px;
                line-height: 11.8px;
            }

            .template-index .faq-section__accordion-title svg {
                transform: translate(-4.7px, 0.2px) rotate(0deg);
            }
        }
    </style>
    <!-- start meta-tags.liquid (SNIPPET) -->





    <!-- start social-meta-tags.liquid (SNIPPET) -->
    <meta property="og:site_name" content="Tale of Roses">
    <meta property="og:url" content="https://speakingroses.com/">
    <meta property="og:title" content="Tale of Roses Official Store">
    <meta property="og:type" content="website">
    <meta property="og:description" content="">

    <meta name="twitter:site" content="@">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Tale of Roses Official Store">
    <meta name="twitter:description" content="">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <title>
        Tale of Roses Official Store
        |
        Tale of Roses
    </title>
    <!-- CONTENT FOR HEAD -->
    <script>
        window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.start');
    </script>
    <meta id="shopify-digital-wallet" name="shopify-digital-wallet" content="/59328921759/digital_wallets/dialog">
    <meta name="shopify-checkout-api-token" content="29eb1e11df3825496fefb1887a21a05c">
    <meta id="in-context-paypal-metadata" data-shop-id="59328921759" data-venmo-supported="true"
        data-environment="production" data-locale="en_US" data-paypal-v4="true" data-currency="USD">
    <script async="async" data-src="/checkouts/internal/preloads.js?locale=en-US"></script>
    <script async="async" data-src="https://shop.app/checkouts/internal/preloads.js?locale=en-US&shop_id=59328921759"
        crossorigin="anonymous"></script>
    <script id="shopify-features"
    type="application/json">{"accessToken":"29eb1e11df3825496fefb1887a21a05c","betas":["rich-media-storefront-analytics"],"domain":"speakingroses.com","predictiveSearch":true,"shopId":59328921759,"smart_payment_buttons_url":"https:\/\/speakingroses.com\/cdn\/shopifycloud\/payment-sheet\/assets\/latest\/spb.en.js","dynamic_checkout_cart_url":"https:\/\/speakingroses.com\/cdn\/shopifycloud\/payment-sheet\/assets\/latest\/dynamic-checkout-cart.en.js","locale":"en"}</script>
    <script>
        var Shopify = Shopify || {};
        Shopify.shop = "speaking-roses-printed-flower-shop.myshopify.com";
        Shopify.locale = "en";
        Shopify.currency = {
            "active": "USD",
            "rate": "1.0"
        };
        Shopify.country = "US";
        Shopify.theme = {
            "name": "Dev by Vasta 09\/22 - Super Theme BV 2.4",
            "id": 132854218911,
            "theme_store_id": null,
            "role": "main"
        };
        Shopify.theme.handle = "null";
        Shopify.theme.style = {
            "id": null,
            "handle": null
        };
        Shopify.cdnHost = "speakingroses.com/cdn";
        Shopify.routes = Shopify.routes || {};
        Shopify.routes.root = "/";
    </script>
    <script type="module">
        ! function(o) {
            (o.Shopify = o.Shopify || {}).modules = !0
        }(window);
    </script>
    <script>
        ! function(o) {
            function n() {
                var o = [];

                function n() {
                    o.push(Array.prototype.slice.apply(arguments))
                }
                return n.q = o, n
            }
            var t = o.Shopify = o.Shopify || {};
            t.loadFeatures = n(), t.autoloadFeatures = n()
        }(window);
    </script>
    <script>
        window.ShopifyPay = window.ShopifyPay || {};
        window.ShopifyPay.apiHost = "shop.app\/pay";
    </script>
    <script id="shop-js-features" type="application/json">{"compact":true,"defer_modal_on_autofill":true}</script>
    <script id="shop-js-analytics" type="application/json">{"pageType":"index"}</script>
    <script>
        window.Shopify = window.Shopify || {};
        if (!window.Shopify.featureAssets) window.Shopify.featureAssets = {};
        window.Shopify.featureAssets['shop-js'] = {
            "pay-button": ["modules/client.pay-button_DaC4qmyP.en.esm.js", "modules/chunk.common_CdCh5Mft.esm.js"],
            "init-shop-email-lookup-coordinator": [
                "modules/client.init-shop-email-lookup-coordinator_Cpr-t4sp.en.esm.js",
                "modules/chunk.common_CdCh5Mft.esm.js"
            ],
            "avatar": ["modules/client.avatar_BTnouDA3.en.esm.js"],
            "init-customer-accounts-sign-up": ["modules/client.init-customer-accounts-sign-up_C0aXOfrO.en.esm.js",
                "modules/chunk.common_CdCh5Mft.esm.js"
            ],
            "init-shop-for-new-customer-accounts": [
                "modules/client.init-shop-for-new-customer-accounts_COd8Yoaq.en.esm.js",
                "modules/chunk.common_CdCh5Mft.esm.js"
            ],
            "shop-pay-checkout-sheet": ["modules/client.shop-pay-checkout-sheet_KxpdxsN2.en.esm.js",
                "modules/chunk.common_CdCh5Mft.esm.js"
            ],
            "init-customer-accounts": ["modules/client.init-customer-accounts_DwhN33YG.en.esm.js",
                "modules/chunk.common_CdCh5Mft.esm.js"
            ],
            "shop-pay-payment-request": ["modules/client.shop-pay-payment-request_C1P_8P4h.en.esm.js",
                "modules/chunk.common_CdCh5Mft.esm.js", "modules/chunk.shop-pay_CQXGeeSa.esm.js"
            ],
            "login-button": ["modules/client.login-button_CHtr0mHz.en.esm.js", "modules/chunk.common_CdCh5Mft.esm.js"],
            "discount-app": ["modules/client.discount-app_90MDC0Tu.en.esm.js", "modules/chunk.common_CdCh5Mft.esm.js"],
            "payment-terms": ["modules/client.payment-terms_DaAMoQfd.en.esm.js", "modules/chunk.common_CdCh5Mft.esm.js"]
        };
    </script>
    <script>
        (function() {
            function asyncLoad() {
                var urls = [
                    "https:\/\/outsellapp.com\/app\/bundleTYPage.js?shop=speaking-roses-printed-flower-shop.myshopify.com",
                    "https:\/\/cdn.productcustomizer.com\/storefront\/production-product-customizer-v2.js?shop=speaking-roses-printed-flower-shop.myshopify.com"
                ];
                for (var i = 0; i < urls.length; i++) {
                    var s = document.createElement('script');
                    s.type = 'text/javascript';
                    s.async = true;
                    s.src = urls[i];
                    var x = document.getElementsByTagName('script')[0];
                    x.parentNode.insertBefore(s, x);
                }
            };
            if (window.attachEvent) {
                window.attachEvent('onload', asyncLoad);
            } else {
                window.addEventListener('w3-DOMContentLoaded', asyncLoad, false);
            }
        })();
    </script>
    <script id="__st">
        var __st = {
            "a": 59328921759,
            "offset": -21600,
            "reqid": "9fb023d6-95d2-49b7-8026-5ac897a9358c-1721461747",
            "pageurl": "speakingroses.com\/",
            "u": "fdab4371f682",
            "p": "home"
        };
    </script>
    <script>
        window.ShopifyPaypalV4VisibilityTracking = true;
    </script>
    <script id="captcha-bootstrap">
        ! function() {
            'use strict';
            const t = 'contact',
                e = 'account',
                n = 'new_comment',
                o = t => t.map((([t, e]) =>
                    `form[action*='/${t}']:not([data-nocaptcha='true']) input[name='form_type'][value='${e}']`)).join(',');

            function c(t, e) {
                try {
                    const n = window.sessionStorage;
                    for (const [o, c] of Object.entries(JSON.parse(n.getItem(e)))) t.elements[o] && (t.elements[o].value =
                        c);
                    n.removeItem(e)
                } catch {}
            }
            const r = 'form_type',
                s = 'cptcha';

            function a(t) {
                t.dataset[s] = !0
            }((i, m, f, u, d, p, l) => {
                if (0) return;
                let E = !1;
                const _ = (t, e, n) => {
                    const o = i[f][u],
                        c = o.bindForm,
                        r = 'f06e6c50-85a8-45c8-87d0-21a2b65856fe',
                        s = {
                            infoText: 'Protected by hCaptcha',
                            privacyText: 'Privacy',
                            termsText: 'Terms'
                        };
                    if (c) return c(t, r, e, s).then(n);
                    o.q.push([
                        [t, r, e, s], n
                    ]), E || (m.body.append(Object.assign(m.createElement('script'), {
                        id: 'captcha-provider',
                        async: !0,
                        src: 'https://cdn.shopify.com/shopifycloud/storefront-forms-hcaptcha/ce_storefront_forms_captcha_hcaptcha.v1.3.2.iife.js'
                    })), E = !0)
                };
                i[f] = i[f] || {}, i[f][u] = i[f][u] || {}, i[f][u].q = [], i[f][d] = i[f][d] || {}, i[f][d].protect =
                    function(t, e) {
                        _(t, void 0, e), a(t)
                    }, Object.freeze(i[f][d]),
                    function(i, m, f, u, d, p) {
                        const [l, E, _] = function(c, r, s) {
                            const a = r ? [
                                    [t, t],
                                    ['blogs', n],
                                    ['comments', n],
                                    [t, 'customer']
                                ] : [],
                                i = c ? [
                                    [e, 'customer_login'],
                                    [e, 'guest_login'],
                                    [e, 'recover_customer_password'],
                                    [e, 'create_customer']
                                ] : [],
                                m = [...a, ...i],
                                f = o(m),
                                u = o(a),
                                d = s && o(m.filter((([t, e]) => s.includes(e)))),
                                p = t => () => t ? [...document.querySelectorAll(t)].map((t => t.form)) : [];
                            return [p(f), p(u), p(d)]
                        }(!0, !0, ['guest_login']), T = t => {
                            const e = t.target,
                                n = e instanceof HTMLFormElement ? e : e && e.form;
                            return n && l().find((t => n === t))
                        };
                        i.addEventListener('submit', (t => {
                            T(t) && t.preventDefault()
                        }));
                        const h = (t, e) => {
                            t && !t.dataset[s] && (f(t, e.some((e => e === t))), a(t))
                        };
                        for (const t of ['focusin', 'change']) i.addEventListener(t, (t => h(T(t), E())));
                        const v = m.get('form_key'),
                            g = m.get(r),
                            y = v && g;
                        i.addEventListener('w3-DOMContentLoaded', (() => {
                            const t = E();
                            if (y)
                                for (const e of t) e.elements[r].value === g && c(e, v);
                            [...new Set([..._(), ...l().filter((t => 'true' === t.dataset
                                .shopifyCaptcha))])].forEach((e => h(e, t)))
                        }))
                    }(m, new URLSearchParams(i.location.search), _)
            })(window, document, 'Shopify', 'ce_forms', 'captcha')
        }();
    </script>
    <script>
        ! function() {
            'use strict';
            const e = /recaptcha|reCATPCHA|google|Googl/gi,
                t = o => {
                    let c = o.firstChild;
                    for (; c;) c.nodeType === Node.TEXT_NODE ? c.textContent = c.textContent.replace(e, 'hCaptcha') : c
                        .nodeType === Node.ELEMENT_NODE && t(c), c = c.nextSibling
                };
            document.addEventListener('w3-DOMContentLoaded', (() => {
                (e => {
                    const o = document.querySelector('p[data-spam-detection-disclaimer]');
                    if (o) {
                        for (const e of ['terms', 'privacy']) {
                            const t = o.querySelector(`a[href*='https://policies.google.com/${e}']`);
                            t && (t.href = `https://hcaptcha.com/${e}`)
                        }
                        t(o)
                    }
                })()
            }))
        }();
    </script>
    <script integrity="sha256-n5Uet9jVOXPHGd4hH4B9Y6+BxkTluaaucmYaxAjUcvY=" data-source-attribution="shopify.loadfeatures"
    type="lazyload_int"
    data-src="//speakingroses.com/cdn/shopifycloud/shopify/assets/storefront/load_feature-9f951eb7d8d53973c719de211f807d63af81c644e5b9a6ae72661ac408d472f6.js"
    crossorigin="anonymous"></script>
    <script crossorigin="anonymous" type="lazyload_int"
    data-src="//speakingroses.com/cdn/shopifycloud/shopify/assets/shopify_pay/storefront-80e528be853eac23af2454534897ca9536b1d3d04aa043b042f34879a3c111c8.js?v=20220906"></script>
    <script integrity="sha256-HAs5a9TQVLlKuuHrahvWuke+s1UlxXohfHeoYv8G2D8="
    data-source-attribution="shopify.dynamic-checkout" type="lazyload_int"
    data-src="//speakingroses.com/cdn/shopifycloud/shopify/assets/storefront/features-1c0b396bd4d054b94abae1eb6a1bd6ba47beb35525c57a217c77a862ff06d83f.js"
    crossorigin="anonymous"></script>


    <style id="shopify-dynamic-checkout-cart">
        @media screen and (min-width: 750px) {
            #dynamic-checkout-cart {
                min-height: 50px;
            }
        }

        @media screen and (max-width: 750px) {
            #dynamic-checkout-cart {
                min-height: 240px;
            }
        }
    </style>
    <script>
        window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.end');
    </script>
    <!-- END CONTENT FOR HEAD -->
    <script>
        var trekkie = [];
        trekkie.integrations = !0;
        (window.BOOMR = {}), (window.BOOMR.version = true);
    </script>
    <!-- "snippets/judgeme_core.liquid" was not rendered, the associated app was uninstalled -->



    <!--CPC-->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <!--CPC-->


    <!-- BEGIN app block: shopify://apps/zepto-product-personalizer/blocks/product_personalizer_main/7411210d-7b32-4c09-9455-e129e3be4729 -->
    <!-- BEGIN app snippet: zepto_common -->


    <!-- END app app block -->
    <script
        src="https://cdn.shopify.com/extensions/71983cbd-cf7e-4598-8a66-515da6b6582a/pagefly-page-builder-46/assets/main.js"
        type="text/javascript" defer="defer"></script>
    <script
        src="https://cdn.shopify.com/extensions/ae1c5304-bbf1-46dc-b8d0-6b183c633b0e/globo-product-option-143/assets/gpomain.js"
        type="text/javascript" defer="defer"></script>
    <script
        src="https://cdn.shopify.com/extensions/d181adec-8d78-4d98-b5cc-b3d71f2a693f/outsell-cross-sell-upsell-11/assets/bundle.js"
        type="text/javascript" defer="defer"></script>
    <link href="https://monorail-edge.shopifysvc.com" rel="dns-prefetch">
    <script>
        (function() {
            if ("sendBeacon" in navigator && "performance" in window) {
                var session_token = document.cookie.match(/_shopify_s=([^;]*)/);

                function handle_abandonment_event(e) {
                    var entries = performance.getEntries().filter(function(entry) {
                        return /monorail-edge.shopifysvc.com/.test(entry.name);
                    });
                    if (!window.abandonment_tracked && entries.length === 0) {
                        window.abandonment_tracked = true;
                        var currentMs = Date.now();
                        var navigation_start = performance.timing.navigationStart;
                        var payload = {
                            shop_id: 59328921759,
                            url: window.location.href,
                            navigation_start,
                            duration: currentMs - navigation_start,
                            session_token: session_token && session_token.length === 2 ? session_token[1] : "",
                            page_type: "index"
                        };
                        window.navigator.sendBeacon("https://monorail-edge.shopifysvc.com/v1/produce", JSON.stringify({
                            schema_id: "online_store_buyer_site_abandonment/1.1",
                            payload: payload,
                            metadata: {
                                event_created_at_ms: currentMs,
                                event_sent_at_ms: currentMs
                            }
                        }));
                    }
                }
                window.addEventListener('pagehide', handle_abandonment_event);
            }
        }());
    </script>




    <script class="boomerang">
        (function() {
            if (window.BOOMR && (window.BOOMR.version || window.BOOMR.snippetExecuted)) {
                return;
            }
            window.BOOMR = window.BOOMR || {};
            window.BOOMR.snippetStart = new Date().getTime();
            window.BOOMR.snippetExecuted = true;
            window.BOOMR.snippetVersion = 12;
            window.BOOMR.application = "storefront-renderer";
            window.BOOMR.themeName = "Super Theme BV";
            window.BOOMR.themeVersion = "2.4";
            window.BOOMR.shopId = 59328921759;
            window.BOOMR.themeId = 132854218911;
            window.BOOMR.renderRegion = "gcp-asia-southeast1";
            window.BOOMR.url =
                "https://speakingroses.com/cdn/shopifycloud/boomerang/shopify-boomerang-1.0.0.min.js";
            var where = document.currentScript || document.getElementsByTagName("script")[0];
            var parentNode = where.parentNode;
            var promoted = false;
            var LOADER_TIMEOUT = 3000;

            function promote() {
                if (promoted) {
                    return;
                }
                var script = document.createElement("script");
                script.id = "boomr-scr-as";
                script.src = window.BOOMR.url;
                script.async = true;
                parentNode.appendChild(script);
                promoted = true;
            }

            function iframeLoader(wasFallback) {
                promoted = true;
                var dom, bootstrap, iframe, iframeStyle;
                var doc = document;
                var win = window;
                window.BOOMR.snippetMethod = wasFallback ? "if" : "i";
                bootstrap = function(parent, scriptId) {
                    var script = doc.createElement("script");
                    script.id = scriptId || "boomr-if-as";
                    script.src = window.BOOMR.url;
                    BOOMR_lstart = new Date().getTime();
                    parent = parent || doc.body;
                    parent.appendChild(script);
                };
                if (!window.addEventListener && window.attachEvent && navigator.userAgent.match(/MSIE [67]./)) {
                    window.BOOMR.snippetMethod = "s";
                    bootstrap(parentNode, "boomr-async");
                    return;
                }
                iframe = document.createElement("IFRAME");
                iframe.src = "about:blank";
                iframe.title = "";
                iframe.role = "presentation";
                iframe.loading = "eager";
                iframeStyle = (iframe.frameElement || iframe).style;
                iframeStyle.width = 0;
                iframeStyle.height = 0;
                iframeStyle.border = 0;
                iframeStyle.display = "none";
                parentNode.appendChild(iframe);
                try {
                    win = iframe.contentWindow;
                    doc = win.document.open();
                } catch (e) {
                    dom = document.domain;
                    iframe.src = "javascript:var d=document.open();d.domain='" + dom + "';void(0);";
                    win = iframe.contentWindow;
                    doc = win.document.open();
                }
                if (dom) {
                    doc._boomrl = function() {
                        this.domain = dom;
                        bootstrap();
                    };
                    doc.write("<body onload='document._boomrl();'>");
                } else {
                    win._boomrl = function() {
                        bootstrap();
                    };
                    if (win.addEventListener) {
                        win.addEventListener("load", win._boomrl, false);
                    } else if (win.attachEvent) {
                        win.attachEvent("onload", win._boomrl);
                    }
                }
                doc.close();
            }
            var link = document.createElement("link");
            if (link.relList &&
                typeof link.relList.supports === "function" &&
                link.relList.supports("preload") &&
                ("as" in link)) {
                window.BOOMR.snippetMethod = "p";
                link.href = window.BOOMR.url;
                link.rel = "preload";
                link.as = "script";
                link.addEventListener("load", promote);
                link.addEventListener("error", function() {
                    iframeLoader(true);
                });
                setTimeout(function() {
                    if (!promoted) {
                        iframeLoader(true);
                    }
                }, LOADER_TIMEOUT);
                BOOMR_lstart = new Date().getTime();
                parentNode.appendChild(link);
            } else {
                iframeLoader(false);
            }

            function boomerangSaveLoadTime(e) {
                window.BOOMR_onload = (e && e.timeStamp) || new Date().getTime();
            }
            if (window.addEventListener) {
                window.addEventListener("load", boomerangSaveLoadTime, false);
            } else if (window.attachEvent) {
                window.attachEvent("onload", boomerangSaveLoadTime);
            }
            if (document.addEventListener) {
                document.addEventListener("onBoomerangLoaded", function(e) {
                    e.detail.BOOMR.init({
                        ResourceTiming: {
                            enabled: true,
                            trackedResourceTypes: ["script", "img", "css"]
                        },
                    });
                    e.detail.BOOMR.t_end = new Date().getTime();
                });
            } else if (document.attachEvent) {
                document.attachEvent("onpropertychange", function(e) {
                    if (!e) e = event;
                    if (e.propertyName === "onBoomerangLoaded") {
                        e.detail.BOOMR.init({
                            ResourceTiming: {
                                enabled: true,
                                trackedResourceTypes: ["script", "img", "css"]
                            },
                        });
                        e.detail.BOOMR.t_end = new Date().getTime();
                    }
                });
            }
        })();
    </script>
    <script defer src="https://speakingroses.com/cdn/shopifycloud/perf-kit/shopify-perf-kit-unstable.min.js"
    data-application="storefront-renderer" data-shop-id="59328921759" data-render-region="gcp-asia-southeast1"
    data-page-type="index" data-theme-instance-id="132854218911" data-monorail-region="shop_domain"
    data-resource-timing-sampling-rate="10"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet"
        type="text/css">
    @vite(['resources/js/app.js'])
    <meta name="csrf_token" content="{{ csrf_token() }}">

</head>

<body class="template-index">
    <div class="cc___toolbarcontent">
        <div class="cc-flex cc-flex-col">


            <div style="background: #b6536a;>
                <div class="wrapper">

                <div style="color: white; display: flex; justify-content: space-between;
                align-items: center; margin: 0 30px; height: 35px;"
                    class="cc-py-[14px] cc-flex cc-flex-col lg:cc-flex-row 
                        lg:cc-justify-between lg:cc-items-center cc-gap-[10px]">


                    <p style="margin-top: 15px">

                        <a class="d-flex" style="color: white; margin-left: 5px;" href="tel:469-000-000">

                            <i class="fa-solid fa-phone me-1" style="font-size: 20px;"></i>
                            <span class="d-none d-lg-block"> 0469.000.000</span>
                        </a>


                    </p>



                    <div style="color: white; display: flex;"
                        class="cc-flex cc-gap-[15px] md:cc-gap-[20px] cc-items-center cc-justify-center cc-text-[14px] md:cc-text-[16px] cc-text-[#ffffff]">

                        <svg width="110" height="23" viewBox="0 0 110 23" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11 0.26001L13.4697 7.86082H21.4616L14.996 12.5584L17.4656 20.1592L11 15.4616L4.53436 20.1592L7.00402 12.5584L0.538379 7.86082H8.53035L11 0.26001Z"
                                fill="currentColor" />
                            <path
                                d="M33 0.26001L35.4697 7.86082H43.4616L36.996 12.5584L39.4656 20.1592L33 15.4616L26.5344 20.1592L29.004 12.5584L22.5384 7.86082H30.5303L33 0.26001Z"
                                fill="currentColor" />
                            <path
                                d="M55 0.26001L57.4697 7.86082H65.4616L58.996 12.5584L61.4656 20.1592L55 15.4616L48.5344 20.1592L51.004 12.5584L44.5384 7.86082H52.5303L55 0.26001Z"
                                fill="currentColor" />
                            <path
                                d="M77 0.26001L79.4697 7.86082H87.4616L80.996 12.5584L83.4656 20.1592L77 15.4616L70.5344 20.1592L73.004 12.5584L66.5384 7.86082H74.5303L77 0.26001Z"
                                fill="currentColor" />
                            <path
                                d="M99 0.26001L101.47 7.86082H109.462L102.996 12.5584L105.466 20.1592L99 15.4616L92.5344 20.1592L95.004 12.5584L88.5384 7.86082H96.5303L99 0.26001Z"
                                fill="currentColor" />
                        </svg>

                        <p class="d-none d-lg-block" style="margin-left: 10px; margin-top: 15px;">5-star reviews</p>
                    </div>




                    <div class="cc-flex lg:cc-hidden cc-items-center cc-justify-between md:cc-gap-[10px]">

                        <div class="cc-flex cc-gap-[40px] cc-items-center">

                            <a style="color: white;"
                                class="hover:cc-opacity-80 cc-transition cc-duration-300 cc-ease-in-out"
                                href="/pages/contact-us"><svg width="24" height="18"
                                    viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.5558 11.5224C11.8008 11.7721 12.1984 11.7721 12.4434 11.5224L22.0098 1.76507C22.1894 1.5817 22.243 1.30635 22.1456 1.06736C22.0487 0.827876 21.8199 0.672119 21.566 0.672119H2.4336C2.17968 0.672119 1.95077 0.827876 1.85358 1.06736C1.75663 1.30635 1.81018 1.5817 1.98986 1.76507L11.5558 11.5224Z"
                                        fill="currentColor" />
                                    <path
                                        d="M23.7609 2.96939C23.616 2.90842 23.4492 2.94228 23.3383 3.05547L13.427 13.165C13.0484 13.5511 12.5349 13.7683 11.9997 13.7683C11.4645 13.7683 10.9508 13.5511 10.5727 13.165L0.661714 3.05587C0.550791 2.94268 0.384014 2.90877 0.239108 2.97019C0.0945446 3.03111 0 3.17542 0 3.33517V16.176C0 17.0773 0.716391 17.808 1.60005 17.808H22.4C23.2836 17.808 24 17.0773 24 16.176V3.33477C24 3.17502 23.9054 3.03071 23.7609 2.96939Z"
                                        fill="currentColor" />
                                </svg>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>


    <header class="header-content">
        <div id="shopify-section-shipping_bar" class="shopify-section shipping-bar">

            <style scoped>
                :root {
                    --shipping-bar-height: 20px;
                }

                #shopify-section-shipping_bar {
                    background-color: #1d1e1c;
                    color: #ffffff;
                }

                #shopify-section-shipping_bar .shipping-bar__section-item,
                #shopify-section-shipping_bar .shipping-bar__item--small {
                    font-size: 18px;
                }

                #shopify-section-shipping_bar .shipping-bar__message {
                    font-size: 18px;
                }

                #shopify-section-shipping_bar .shipping-bar__item svg {
                    width: 18px;
                    display: inline-block;
                }

                #shopify-section-shipping_bar .shipping-bar__item svg path {
                    stroke: #ffffff;
                }

                #shopify-section-shipping_bar .shipping-bar__section-item svg {
                    max-width: 25px;
                    max-height: 25px;
                    margin-right: 10px;
                }

                .shipping-bar__wrapper {
                    height: 50px;
                    justify-content: space-between;
                    display: flex;
                    align-items: center;
                    padding: 0 23px;
                }

                .shipping-bar .shipping-bar__message,
                .shipping-bar__section-item {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    text-transform: uppercase;
                }

                .shipping-bar .shipping-bar__message {
                    flex-wrap: wrap;
                    letter-spacing: 0.6px;
                }

                .shipping-bar .shipping-bar__message>span {
                    letter-spacing: 0.5px;
                }

                .shipping-bar .shipping-bar__message--before {
                    margin-left: 45px;
                }

                .shipping-bar__section-item {
                    flex: 1;
                    height: calc(100% - 10px);
                    width: 33%;
                }

                .shipping-bar__item {
                    flex: 1;
                    line-height: 1.15;
                }

                .shipping-bar__item:nth-of-type(1) .shipping-bar__item--wrapper {
                    justify-content: flex-start;
                }

                .shipping-bar__item:nth-of-type(2) {
                    text-align: center;
                }

                .shipping-bar__item:nth-of-type(3) .shipping-bar__item--wrapper,
                .shipping-bar__item:nth-of-type(3) .shipping-bar__link {
                    justify-content: flex-end;
                }

                .shipping-bar__item--small {
                    max-width: 280px;
                }

                .shipping-bar__item span {

                    margin-left: 5px;
                }

                .shipping-bar__item:nth-of-type(1) span {

                    display: block;

                    line-height: 1.2;
                }

                .shipping-bar__item:nth-of-type(3) span {

                    display: block;

                }

                .shipping-bar__link {
                    color: inherit;
                    font: inherit;
                }

                .shipping-bar__link,
                .shipping-bar__item--wrapper {
                    display: flex;
                    align-items: center;
                }

                .shipping-bar__section-item+.shipping-bar__section-item {
                    border-left: 1px solid var(--shipping-bar-items-line-color, #fff);
                }

                .shipping-bar__section-image {
                    width: 100%;
                    max-width: 25px;
                    margin-right: 10px;
                }

                .shipping-bar--discount-style .shipping-bar__discount-value {
                    background: var(--shipping-bar-price-background, rgb(28, 168, 28));
                    display: inline-block;
                    color: var(--shipping-bar-price-text-color, rgb(255, 255, 255));
                    margin: 0 4px;
                }

                @media (max-width: 1019px) {

                    #shopify-section-shipping_bar .shipping-bar__section-item,
                    #shopify-section-shipping_bar .shipping-bar__item--small {
                        font-size: 14px;
                    }

                    #shopify-section-shipping_bar .shipping-bar__message {
                        font-size: 14px;
                    }

                    #shopify-section-shipping_bar .shipping-bar__message--free-shipping {
                        font-size: 15px;
                    }

                    #shopify-section-shipping_bar .shipping-bar__item svg {
                        width: 14px;
                    }

                    .shipping-bar__wrapper {
                        height: 35px;
                        padding: 0 20px 0 24px;
                    }

                    .shipping-bar__item--small {
                        max-width: 190px;
                    }

                    .shipping-bar .shipping-bar__item span:not(.shipping-bar__discount-value) {
                        margin-left: 0;
                    }

                    .shipping-bar__item:nth-of-type(1) span {

                        display: none;

                    }

                    .shipping-bar__item:nth-of-type(3) span {

                        display: none;

                    }
                }

                @media (max-width: 767px) {

                    #shopify-section-shipping_bar .shipping-bar__section-item,
                    #shopify-section-shipping_bar .shipping-bar__item--small {
                        font-size: 14px;
                    }

                    #shopify-section-shipping_bar .shipping-bar__message {
                        font-size: 14px;
                    }

                    #shopify-section-shipping_bar .shipping-bar__message--free-shipping {
                        font-size: 13px;
                    }

                    #shopify-section-shipping_bar .shipping-bar__item svg {
                        width: 14px;
                    }

                    .shipping-bar__wrapper {
                        height: 34px;
                        padding: 0 19px;
                    }

                    .shipping-bar__item--small {
                        max-width: 25px;
                    }

                    .shipping-bar .shipping-bar__message {
                        letter-spacing: 0.5px;
                    }

                    .shipping-bar .shipping-bar__message>span {
                        letter-spacing: 0;
                    }

                    .shipping-bar .shipping-bar__message span.shipping-bar__message--before {
                        margin-left: 5px;
                    }
                }

                @media (max-width: 479px) {
                    .shipping-bar__item {
                        font-size: .85rem;
                    }

                    .shipping-bar__section-item {
                        font-size: 10px;
                    }
                }
            </style>
            <script type="lazyload_int">
 const shipping = new class{
 constructor(){
 if ('shipping_bar_free_price' == 'shipping_bar_free_price'){
 this.discountValue = 10000;
 }else{
 this.discountValue = 6;
 }
 this.textBeforeValue = 'We Pay Shipping On Orders Over';
 this.textAfterValue = '';
 this.discountText = 'Congratulations! We&#39;ll Pay Your Shipping';
 }

 set cart( cart ){
 var remainValue = 0, message = '';

 if ('shipping_bar_free_price' == 'shipping_bar_free_price'){
 remainValue = (this.discountValue - cart.total_price);
 }else{
 remainValue = (this.discountValue - cart.item_count);
 }

 if (cart.item_count > 0){
 if (remainValue > 0){
  if ('shipping_bar_free_price' == 'shipping_bar_free_price'){
 remainValue = Shopify.formatMoney(remainValue);
 const cents = parseInt(remainValue.split('.')[1]);
 if(cents === 0 ){remainValue = remainValue.split('.')[0];}
  }

  message = 'Add';
  message += '<span class="shipping-bar__discount-value">';
  message += remainValue;
  message += '</span>';
  message += 'more to get FREE SHIPPING';
 }else{
  message += this.discountText;
  $('.shipping__message--discount').addClass('shipping-bar__message--free-shipping');
 }
 }else{
 if ('shipping_bar_free_price' == 'shipping_bar_free_price'){
  remainValue = Shopify.formatMoney(remainValue).split('.')[0];
 }
 message += '<span class="shipping-bar__message--before">'+this.textBeforeValue+'</span>';
 message += '<span class="shipping-bar__discount-value">'+remainValue+'</span>';
 message += '<span class="shipping-bar__message--after">'+this.textAfterValue+'</span>';
 }

 $('.shipping__message--discount').html(message);
 }
 }
 </script>


        </div>
        <div id="shopify-section-custom-header" class="shopify-section main-header">
            <!-- start custom-header.liquid (SECTION) -->
            <h3 class="hide">Header</h3><!-- start custom-header-Layout03 (SNIPPET) -->
            <style>
                .header,
                .header__section-wrapper,
                .header__item-wrapper {
                    width: 100%;
                }

                .header__section-wrapper,
                .header__item-wrapper {
                    display: flex;
                }

                .header__item-logo,
                .header__item-cart-wrapper {
                    width: 20%;
                }

                .header__search-form-wrapper {
                    padding-bottom: 5px;
                }

                .header__section-wrapper {
                    height: 100%;
                    flex-direction: column;
                    justify-content: space-between;
                }

                .header__menu-wrapper {
                    background: #ffffff;
                    width: 100%;
                    margin: 10px auto 0;
                }

                .header__item-wrapper {
                    align-items: center;
                    margin: 18px auto 5px;
                    padding: 0 25.5px;
                    flex-direction: row;
                    justify-content: space-between;
                }

                /*logo*/
                .header .header__logo-wrapper {
                    width: fit-content;
                    display: block;
                }

                .header__logo-wrapper svg,
                .header__logo-wrapper img {
                    height: 62px;
                    width: auto;
                }

                .header__section-wrapper .header__item-cart-wrapper {
                    height: 62px;
                    width: 20%;
                }

                /*search */
                .header__item-search {
                    width: 50%;
                    height: 100%;
                }

                .header__search-form {
                    border: 1px solid #838383;
                    height: 40px;
                    width: 524px;
                    margin: 0 auto;
                    display: flex;
                    justify-content: space-between;
                }

                .header__search-input {
                    width: 86%;
                    border: none;
                    margin-left: 13.3px;
                    margin-bottom: 1.4px;
                    font-size: 16px;
                    font-weight: 400;
                    letter-spacing: 0;
                }

                .header__search-input::placeholder {
                    color: #A8A8A8;
                    font-size: 16px;
                    letter-spacing: 0.4px;
                }

                .header__search-button {
                    width: 26.5%;
                    padding-left: 3px;
                    text-transform: capitalize;
                    background: #ffffff;
                    color: #000000;
                    border-left: 1px solid #838383;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 19px;
                }

                .header__search-button svg {
                    margin-left: 9px;
                    width: 14px;
                    height: 14px;
                }

                .header__search-button:hover {
                    color: #000000;
                    background: #f4f4f4;
                }

                /*cart */
                .header__item-cart-wrapper {
                    position: relative;
                    display: flex;
                    flex-direction: column;
                    align-items: flex-end;
                    justify-content: center;
                    width: fit-content;
                }

                .header__item-cart-text {
                    color: #3c3c3c;
                    text-transform: uppercase;
                    font-size: 14px;
                    font-weight: 300;
                    line-height: 14px;
                }

                .header__item-cart-number {
                    position: absolute;
                    width: 14px;
                    height: 14px;
                    top: 1px;
                    right: 2px;
                    padding: 0;
                    font-size: 11px;
                    border-radius: 100%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    color: #ffffff;
                    background: #a84f65;
                }

                .header__item-cart-number:hover {
                    background: #8e3e51;
                    color: #ffffff;
                }

                .header .header__item-cart-svg {
                    width: 30px;
                    height: 30px;
                }

                .header__item-cart-svg:hover {
                    background: #ffffff;
                }

                .header__item-cart-svg path {
                    fill: #000000;
                }

                .header__item-cart-svg svg {
                    width: 100%;
                    height: 100%;
                }

                .header__item-cart {
                    max-width: 60px;
                    width: fit-content;
                    cursor: pointer;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    padding-left: 3px;
                }

                /* menu */
                .main-menu__list {
                    display: flex;
                    justify-content: center;
                    list-style: none;
                    margin-left: 1px;
                    margin-top: 0;
                }

                .main-menu__list-item {
                    text-transform: uppercase;
                    position: relative;
                    display: flex;
                    justify-content: space-between;
                    z-index: 2;
                    white-space: nowrap;
                }

                .main-menu__list.list--child .main-menu__list-item {
                    background: #ffffff;
                }

                .main-menu__list.list--child:hover .main-menu__list-item:hover {
                    background: #f4f4f4;
                }

                .main-menu__list.list--parent>.main-menu__list-item:hover {
                    background: #ffffff;
                }

                .main-menu__list.list--parent>.main-menu__list-item:hover>.main-menu__item-anchor {
                    color: #000000;
                }

                .main-menu__list.list--parent>.main-menu__list-item:hover>.main-menu__item-anchor>svg {
                    stroke: #000000;
                }

                .main-menu__list.list--child .main-menu__list-item .main-menu__item-anchor {
                    color: #000000;
                }

                .main-menu__list.list--child .main-menu__list-item svg {
                    fill: #000000;
                }

                .main-menu__list.list--child .main-menu__list-item:hover .main-menu__item-anchor {
                    color: #000000;
                }

                .main-menu__list.list--child .main-menu__list-item:hover svg {
                    fill: #000000;
                }

                .main-menu__list.list--child .main-menu__list-item {
                    border-bottom: 1px solid #ffffff;
                }

                .main-menu__list.list--parent .main-menu__item-anchor {
                    text-transform: capitalize;
                    color: #606060;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    width: 100%;
                    font-size: 14px;
                    padding: 14px 26.5px;
                    letter-spacing: 0.3px;
                }

                .main-menu__list.list--parent>.main-menu__list-item>.main-menu__item-anchor svg {
                    stroke: #606060;
                    transform: rotate(90deg);
                }

                .main-menu__list.list--child .main-menu__list-item svg {
                    transform: rotate(-90deg);
                }

                .main-menu__list-item:hover>.main-menu__list:not(.list--parent),
                .main-menu__list-item:active>.main-menu__list:not(.list--parent) {
                    display: block;
                    box-shadow: black 4px 6px 6px -4px;
                }

                .main-menu__list.list--child {
                    z-index: 3;
                    display: none;
                    min-width: 100px;
                    width: max-content;
                }

                .main-menu__list.list--grandchild {
                    left: 100%;
                }

                .main-menu__list:not(.list--parent) {
                    position: absolute;
                    background: #fff;
                    top: 100%;
                    left: 0;
                }

                .main-menu__item-anchor svg {
                    width: 16px;
                    margin-left: 10px;
                }

                .main-menu__list:not(.list--parent) {
                    position: absolute;
                    top: 100%;
                    left: 0;
                    display: none;
                }

                .main-menu__list.list--child {
                    display: none;
                    z-index: 3;
                    min-width: 100px;
                    width: max-content;
                }

                .main-menu__list.list--child .main-menu__list-item:hover .main-menu__list.list--grandchild {
                    left: 100%;
                    top: 0;
                }

                @media(max-width: 1279px) {
                    body .wrapper {
                        width: 100%;
                    }
                }

                @media(max-width: 1019px) {

                    .header__item-menu-mobile,
                    .header__item-cart-wrapper {
                        margin: 0;
                    }

                    .header .header__search-form,
                    .header .header__item-search {
                        margin: 0 auto;
                    }

                    .header__section-wrapper {
                        justify-content: flex-start;
                        margin-bottom: 20px;
                    }

                    .header .header__item-wrapper {
                        margin: 22px auto 18px;
                    }

                    .header__search-form-wrapper {
                        padding-bottom: 0;
                    }

                    .header .header__search-input {
                        margin: 0;
                        padding: 0 13px 2px;
                    }

                    .header__item-wrapper {
                        align-items: center;
                        padding: 0 20px;
                    }

                    .header__section-wrapper .header__item-cart-wrapper {
                        height: 50px;
                        width: auto;
                    }

                    .header__item-wrapper .header__item-menu-mobile {
                        height: 50px;
                        width: auto;
                        padding-bottom: 1px;
                    }

                    .header__item-menu-mobile-wrapper {
                        display: flex;
                        width: fit-content;
                        cursor: pointer;
                        align-items: center;
                        flex-direction: column;
                        color: #3c3c3c;
                        text-transform: uppercase;
                    }

                    .header .header__item-menu-mobile-wrapper svg {
                        width: 20px;
                        height: 17px;
                    }

                    .header__item-menu-mobile-wrapper path {
                        fill: #000000;
                    }

                    /* Logo */
                    .header__logo-wrapper {
                        margin: 0 auto;
                    }

                    /* Search */
                    .header__item-search {
                        width: 100%;
                        margin: 10px 0;
                    }

                    .header .header__search-form {
                        width: 445px;
                        height: 34px;
                    }

                    .header .header__search-input::placeholder {
                        font-size: 12px;
                        letter-spacing: 1px;
                    }

                    .header .header__search-button {
                        font-size: 16px;
                        padding-left: 0px;
                    }

                    .header .header__search-button svg {
                        width: 12px;
                        height: 12px;
                        margin: 0 0 0 7px;
                    }

                    /* Cart */
                    .header .header__item-cart-svg {
                        width: 22px;
                        height: 22px;
                    }

                    .header .header__item-cart-number {
                        width: 10px;
                        height: 10px;
                        font-size: 9px;
                        margin: 0;
                        top: 1px;
                        right: 5px;
                    }

                    .header .header__item-cart-text {
                        font-size: 14px;
                    }

                    .header__item-cart {
                        padding-bottom: 3px;
                    }

                    /* Menu */
                    .header .header__item-menu-mobile.no-desktop svg {
                        width: 22px;
                        height: 16px;
                    }

                    .header .header__item-menu-text {
                        font-size: 14px;
                    }
                }

                @media(max-width: 767px) {
                    .header .header__item-menu-mobile.no-desktop svg {
                        width: 28px;
                        height: 15px;
                        margin: 0 0 1px;
                    }

                    .header__logo-wrapper svg,
                    .header__logo-wrapper img {
                        height: 50px;
                        width: auto;
                    }

                    .header .header__item-wrapper {
                        padding: 0 20px 0 19px;
                        flex-wrap: nowrap;
                        margin: 14px auto 12px;
                        align-items: center;
                    }

                    .header .header__logo-wrapper {
                        margin: 0 auto;
                    }

                    .header__section-wrapper {
                        margin-bottom: 15px;
                    }

                    /* Logo */
                    .header__item-logo {
                        width: 50%;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                    }

                    /* Search */
                    .header .header__search-input {
                        padding: 0 2px 0px 3px;
                        font-size: 12px;
                    }

                    .header .header__search-form {
                        width: 337px;
                        max-width: 100%;
                    }

                    .header__search-input {
                        width: 70%;
                        margin-left: 3px;
                    }

                    .header__search-input::placeholder {
                        letter-spacing: 0px;
                    }

                    .header .header__search-button {
                        width: 31%;
                        font-size: 14px;
                        padding-left: 4px;
                    }

                    .header .header__search-button svg {
                        width: 16px;
                        margin-left: 5px;
                    }

                    /* Cart */
                    .header__item-cart {
                        padding-bottom: 0px;
                        padding-top: 3px;
                    }

                    .header .header__item-cart-wrapper {
                        margin-right: 0;
                    }

                    .header .header__item-cart-svg {
                        width: 17px;
                        height: 17px;
                    }

                    .header .header__item-cart-text {
                        padding-top: 0;
                        font-size: 10px;
                    }

                    .header .header__item-cart-custom {
                        margin: 0 5px 0 0;
                    }

                    .header .header__item-cart-number {
                        top: 4px;
                        right: 4px;
                        font-size: 7px;
                        width: 8.18px;
                        height: 8.18px;
                    }

                    /* Menu */
                    .header .header__item-menu-text {
                        font-size: 10px;
                    }
                }
            </style>
            <section class="header ">
                <div class="header__section-wrapper">
                    <div class="header__item-wrapper wrapper">
                        <div class="header__item-menu-mobile no-desktop">
                            <div class="header__item-menu-mobile-wrapper">
                                <!-- start icon-hamburger-new-layout.liquid (SNIPPET) -->
                                <svg width="20" height="15" viewBox="0 0 20 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path id="ICON. MENU"
                                        d="M1.32373 13.8559H18.5965M1.32373 7.37864H18.5965M1.32373 0.901367H18.5965"
                                        stroke="black" stroke-width="1.72727" stroke-linecap="round" />
                                </svg>
                                <span class="header__item-menu-text">Menu</span>
                            </div>
                        </div>

                        <div id="Header" class="header__item-logo">
                            <!-- start header-logo-new-layout.liquid (SNIPPET) -->

                            <a class="header__logo-wrapper" title="Tale of Roses" href="/">
                                <img src="/storage/logo/logo-text.png" width="50" height="32" alt="">
                            </a>
                        </div>

                        <div class="header__item-search desktop">
                            <!-- start header-searchbar-new-layout.liquid (SNIPPET) -->
                            <div class="header__search-form-wrapper">
                                <form id="search-forma" action="/search" method="POST" class="header__search-form">
                                    @csrf
                                    <input class="header__search-input search-text" name="term"
                                        aria-label="search-text" type="text" id="Search-desktop" value=""
                                        placeholder="Search for: Valentine’s, Engagement , Birthdays..." required>
                                    <button id="SearchButton-desktop" type="submit"
                                        class="header__search-button button">
                                        Search
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="Search Icon">
                                                <path id="Vector"
                                                    d="M6.61978 11.5061C9.54269 11.5061 11.9122 9.20046 11.9122 6.35631C11.9122 3.51217 9.54269 1.20654 6.61978 1.20654C3.69688 1.20654 1.32739 3.51217 1.32739 6.35631C1.32739 9.20046 3.69688 11.5061 6.61978 11.5061Z"
                                                    stroke="black" stroke-width="1.3231" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path id="Vector_2" d="M13.2352 12.7934L10.3574 9.99316"
                                                    stroke="black" stroke-width="1.3231" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                        </svg>
                                    </button>

                                    <div class="search-results-wrapper w-80 " style="display: none;">
                                        <div class="close-suggestions"><span class="search__terms"></span>
                                            <!-- start icon-close.liquid (SNIPPET) -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                class="icon">
                                                <path fill="#444"
                                                    d="M15.89 14.696l-4.734-4.734 4.717-4.717c.4-.4.37-1.085-.03-1.485s-1.085-.43-1.485-.03L9.641 8.447 4.97 3.776c-.4-.4-1.085-.37-1.485.03s-.43 1.085-.03 1.485l4.671 4.671-4.688 4.688c-.4.4-.37 1.085.03 1.485s1.085.43 1.485.03l4.688-4.687 4.734 4.734c.4.4 1.085.37 1.485-.03s.43-1.085.03-1.485z" />
                                            </svg>
                                        </div>
                                        <div class="suggestion-half-to-half-flex">
                                            <div class="search-results "></div>

                                            <div class="search-content-container">
                                                <div class="search-results-pages-wrapper">
                                                    <p class="search-section-title">Pages & Posts</p>
                                                    <div class="search-results-pages"></div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="search-link-wrapper"></div>
                                    </div>
                                </form>
                            </div><!-- start header-search-suggestions-new-layout.liquid (SNIPPET) -->





                            <!-- Some styles to get you started. -->
                            <style scoped>
                                section[data-section-id="header"] .header__search-form {
                                    padding: 0;
                                    display: flex;
                                }




                                .search-results-wrapper {
                                    display: none;
                                    z-index: 15;
                                    list-style-type: none;
                                    margin: 0;
                                    padding: 0;
                                    border-radius: 8px;
                                    -webkit-box-shadow: 0px 4px 7px 0px rgba(0, 0, 0, 0.1);
                                    box-shadow: 0px 4px 7px 0px rgba(0, 0, 0, 0.1);
                                    overflow: hidden;
                                    float: left;
                                    margin-top: 50px;
                                    width: 100%;
                                    background: #ffffff;
                                }

                                .search__terms {
                                    font-size: .8rem;
                                    word-break: break-word;
                                }

                                .search-results-wrapper .close-suggestions {
                                    display: flex;
                                    align-items: center;
                                    justify-content: space-between;
                                    padding: 4px;
                                    padding-left: 16px;
                                }

                                .search-results-wrapper .close-suggestions svg {
                                    fill: #888;
                                    cursor: pointer;
                                }

                                .search-results-wrapper .search-results {
                                    float: left;
                                    display: block;
                                    text-align: center;
                                    width: 60%;
                                    padding-top: 16px;

                                }

                                .search-results-wrapper .search-results-pages-wrapper {
                                    width: 100%;
                                    float: right;
                                    text-align: center;
                                    padding-top: 16px;

                                }

                                .search-results-wrapper .search-results .result-item {
                                    padding: 8px 0;
                                }

                                .search-results-wrapper .search-results .result-item .product-info {
                                    display: flex;
                                    align-items: flex-start;
                                    justify-content: flex-start;
                                    flex-direction: column;
                                    width: 60%;
                                    text-align: left;
                                    margin-left: 5%;
                                }

                                .search-results-wrapper .search-results .result-item.no-image {
                                    padding: 12px 0;
                                }

                                .search-results-wrapper .search-results .result-item.no-image .product-info {
                                    width: 100%;
                                    margin-left: 0;
                                }

                                .search-results-wrapper .search-results .result-item.no-image .product-info .money-container {
                                    width: 100%;
                                }

                                .search-results-wrapper .search-results .product-info .money-container {
                                    margin-top: 4px;
                                    display: flex;
                                    flex-wrap: wrap;
                                    align-items: center;
                                    justify-content: flex-start;
                                }

                                .search-results-wrapper .search-results .product-info .money-container .compare-price {
                                    margin-right: 5px;
                                }

                                .search-results-wrapper .search-results-pages .title,
                                .search-results .title {
                                    float: left;
                                    white-space: initial;
                                    -o-text-overflow: ellipsis;
                                    display: -webkit-box;
                                    -webkit-line-clamp: 2;
                                    -webkit-box-orient: vertical;
                                    overflow: hidden;
                                }

                                .search-results-wrapper .search-results-pages .title {
                                    white-space: normal;
                                    color: #204a80;
                                    width: 100%;
                                    padding-right: 10px;
                                }

                                .search-results-wrapper .search-results .thumbnail {
                                    float: left;
                                    display: flex;
                                    align-items: center;
                                    width: 40%;
                                    max-width: 95px;
                                    min-width: 60px;
                                    height: 100px;
                                    padding: 0;
                                    text-align: center;
                                    overflow: hidden;
                                }

                                .search-results-wrapper .search-results .thumbnail img {
                                    width: 100%;
                                    height: auto;
                                }

                                .search-results img {
                                    display: inline;
                                }

                                .search-form {
                                    flex-grow: 1;
                                    padding: 0 2%;
                                }

                                .search-results-wrapper {
                                    position: absolute;
                                    width: 100%;
                                    top: -8px;
                                    left: 0;
                                }

                                .search-form .search-results a {
                                    display: flex;
                                    width: 100%;
                                    align-items: center;
                                    float: left;
                                    width: 100%;
                                }

                                .search-form .search-results .btn {
                                    display: block;
                                    text-align: center;
                                    padding: 10px 0;
                                    border-top: 1px solid #ddd;
                                }

                                .search-form .search-results li,
                                .search-form .result-item {
                                    padding: 5px;
                                    float: left;
                                    width: 100%;
                                }

                                .search-section-title,
                                .no-result-term {
                                    font-weight: bold;
                                    padding: 0;
                                    color: var(--colorTitleSearchSuggestion);
                                }

                                .search-results .search-section-title {
                                    text-align: left;
                                    padding-left: 16px;
                                }

                                .result-item .result-edits:hover,
                                .result-item+.no-result-all-products:hover,
                                .no-result-all-results:hover,
                                .search-results-pages a:hover,
                                a.no-result-all-products:hover,
                                .result-item .result-edits:active,
                                .result-item+.no-result-all-products:active,
                                .no-result-all-results:active,
                                .search-results-pages a:active,
                                a.no-result-all-products:active {
                                    opacity: 0.7;
                                }

                                .search-results-wrapper .search-results-pages .title,
                                .search-form .search-results .title {
                                    flex-grow: 1;
                                    font-size: 14px;
                                    font-weight: normal;
                                }

                                .search-results-wrapper .search-results-pages .title,
                                .search-results .title {
                                    font-size: 14px;
                                }

                                .result-edits {
                                    display: flex;
                                    align-items: center;
                                    padding: 0 16px;
                                    transition: opacity .1s;
                                }

                                .search-results-wrapper .no-result-message {
                                    border-top: none;
                                    padding-top: 0;
                                    text-align: center;
                                }

                                .search-results-pages {
                                    margin-top: 5px;
                                }

                                .no-result-message,
                                .search-results-pages {
                                    color: var(--colorTextSearchSuggestion);
                                }

                                .no-result-term,
                                .no-result-message,
                                .no-result-all-products,
                                .no-result-all-results {
                                    padding: 8px;
                                    word-break: break-word;
                                }

                                .no-result-term,
                                .search-section-title {
                                    text-transform: uppercase;
                                    font-size: 16px;
                                }

                                .search-results .result-item .product-info .title,
                                .search-results-pages .result-item .title {
                                    text-transform: capitalize
                                }

                                .search-link-wrapper {
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    width: 100%;
                                }

                                .search-link-wrapper.empty a.no-result-all-products,
                                .search-link-wrapper.empty a.no-result-all-results {
                                    width: 100%;
                                }

                                a.no-result-all-products,
                                a.no-result-all-results {
                                    width: 50%;
                                    font-weight: bold;
                                    text-decoration: underline;
                                }

                                .no-result-all-results,
                                .no-result-all-products {
                                    width: 100%;
                                    display: block;
                                    float: left;
                                    text-align: center;
                                    padding: 8px;
                                    color: #204a80;
                                    text-transform: capitalize;
                                }

                                .result-item .result-edits .title {
                                    text-transform: uppercase;
                                }

                                .search-results-pages-wrapper .pages-no-results {
                                    font-size: 16px;
                                    text-transform: capitalize;
                                }

                                .search-results-pages .result-item {
                                    padding: 4px 0;
                                }

                                .search-results-pages {
                                    display: flex;
                                    flex-direction: column;
                                    align-items: center;
                                    justify-content: center;
                                }

                                form.header__search-form .suggestion-half-to-half-flex {
                                    display: flex;
                                }

                                form.header__search-form .search-content-container {
                                    display: flex;
                                    flex-direction: row;
                                    width: 40%;
                                }

                                < !-- If Pages & Posts are disabled -->.search-results-wrapper .search-results.w-100 .thumbnail {
                                    width: 20%;
                                    min-width: 90px;
                                    padding: 12px;
                                }

                                .search-results-wrapper .search-results.w-100 {
                                    width: 100%;
                                }

                                .search-results-wrapper .search-results.w-100 .product-info {
                                    width: 80%;
                                    align-items: flex-start;
                                }

                                .search-results-wrapper .search-results.w-100 .product-info .title {
                                    text-align: left;
                                    width: 100%;
                                }

                                < !-- MENU-MOBILE -->.main-header.menu-mobile .search-content-container {
                                    width: 100%;
                                    flex-direction: column
                                }

                                .main-header.menu-mobile .search-results-pages-wrapper {
                                    padding: 8px;
                                    border-left: none;
                                }

                                .main-header.menu-mobile .suggestion-half-to-half-flex {
                                    flex-direction: column
                                }

                                .main-header.menu-mobile .search-results-wrapper .search-results {
                                    text-align: center;
                                }

                                @media (max-width: 1279px) {
                                    .result-item {
                                        width: 100%;
                                    }
                                }

                                @media (max-width: 1019px) {

                                    .result-item {
                                        width: 100%;
                                    }

                                    .search-results-wrapper .search-results {
                                        display: block;
                                    }

                                    span.price.money {
                                        font-size: 15px;
                                    }

                                }

                                @media (max-width: 767px) {
                                    form.header__search-form .suggestion-half-to-half-flex {
                                        flex-direction: column;
                                    }

                                    form.header__search-form .search-results-wrapper .search-results,
                                    form.header__search-form .search-content-container { 
                                        width: 100%;
                                    }

                                    .search-results-wrapper .search-results {
                                        border-right: 0;
                                    }

                                    .search-content-container {
                                        width: 100%;
                                        flex-direction: column;
                                    }

                                    .result-edits {
                                        display: flex;
                                        align-items: center;
                                        justify-content: flex-start;
                                        padding: 0;
                                    }

                                    .search-results-wrapper .search-results .result-item {
                                        padding: 8px 16px;
                                    }

                                    .search-results-wrapper .search-results .result-item.no-image {
                                        padding: 12px 16px;
                                    }

                                    .search-section-title,
                                    .search-results-pages {
                                        padding: 0;
                                    }

                                    .search-results-wrapper .search-results-pages .title,
                                    .search-results .title,
                                    .search-results-wrapper .search-results,
                                    .result-item {
                                        width: 100%;
                                    }

                                    .search-results-wrapper .search-results-pages-wrapper {
                                        width: 100%;
                                        float: right;
                                        text-align: center;
                                        padding: 8px;
                                        border-left: none;
                                    }
                                }

                                @media (max-width: 479px) {

                                    .main-header.menu-mobile a.no-result-all-products,
                                    .main-header.menu-mobile a.no-result-all-results {
                                        font-size: .8rem;
                                    }
                                }
                            </style>
                        </div>

                        <div class="header__item-cart-wrapper">
                            @if ((auth()->check() && auth()->user()->hasVerifiedEmail()) || session()->has('isAdmin'))
                                <div class="d-none d-lg-flex mt-3"
                                    style="margin-bottom: 15px; font-size: 14px; 
                                    white-space: nowrap; display: flex;">
                                    <p>Hello, <strong>{{ auth()->user()->firstName }} &nbsp;</strong> </p>
                                    <button id="logout-modal"
                                        style="background: none;
                             display: flex; text-decoration: underline; ">
                                        [Log
                                        out]
                                    </button>
                                </div>
                            @endif
                            <div>
                                <div class="header__item-cart icon--cart" id="cart-count">

                                    <div class="header__item-cart-number">
                                        <span>{{ session()->has('products') ? count(session('products')) : 0 }}</span>
                                    </div><!-- start header-icon-cart-new-layout.liquid (SNIPPETS) -->
                                    <div class="header__item-cart-svg">
                                        <!-- start icon-cart-layout-03.liquid (SNIPPETS) -->
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.365234 1.25457C0.365234 0.921834 0.497411 0.60273 0.732688 0.367453C0.967964 0.132177 1.28707 0 1.6198 0H2.5532C4.14231 0 5.09578 1.06889 5.63943 2.0625C6.00241 2.72492 6.26504 3.49271 6.47078 4.18857C6.52644 4.18418 6.58224 4.18195 6.63806 4.18188H27.5441C28.9325 4.18188 29.9362 5.51005 29.5548 6.84658L26.497 17.5673C26.2228 18.5288 25.6428 19.3749 24.8448 19.9774C24.0467 20.5798 23.0741 20.9058 22.0742 20.9061H12.1247C11.1168 20.9061 10.1369 20.5752 9.33542 19.9641C8.53395 19.353 7.95535 18.4957 7.68855 17.5238L6.41726 12.8869L4.30959 5.78104L4.30791 5.76765C4.04696 4.8192 3.80274 3.93097 3.43808 3.26856C3.08848 2.62455 2.80745 2.50913 2.55487 2.50913H1.6198C1.28707 2.50913 0.967964 2.37695 0.732688 2.14168C0.497411 1.9064 0.365234 1.5873 0.365234 1.25457ZM8.85111 12.278L10.1074 16.8597C10.3583 17.7663 11.1829 18.3969 12.1247 18.3969H22.0742C22.5287 18.3969 22.9708 18.2488 23.3336 17.9751C23.6964 17.7013 23.9602 17.3168 24.0849 16.8798L26.9904 6.69101H7.19843L8.82769 12.1894L8.85111 12.278Z"
                                                fill="black" />
                                            <path
                                                d="M14.5836 25.9275C14.5836 26.8148 14.2311 27.6658 13.6037 28.2932C12.9763 28.9206 12.1254 29.273 11.2381 29.273C10.3508 29.273 9.49986 28.9206 8.87245 28.2932C8.24505 27.6658 7.89258 26.8148 7.89258 25.9275C7.89258 25.0403 8.24505 24.1893 8.87245 23.5619C9.49986 22.9345 10.3508 22.582 11.2381 22.582C12.1254 22.582 12.9763 22.9345 13.6037 23.5619C14.2311 24.1893 14.5836 25.0403 14.5836 25.9275V25.9275ZM12.0745 25.9275C12.0745 25.7057 11.9863 25.493 11.8295 25.3361C11.6726 25.1793 11.4599 25.0912 11.2381 25.0912C11.0163 25.0912 10.8035 25.1793 10.6467 25.3361C10.4898 25.493 10.4017 25.7057 10.4017 25.9275C10.4017 26.1494 10.4898 26.3621 10.6467 26.5189C10.8035 26.6758 11.0163 26.7639 11.2381 26.7639C11.4599 26.7639 11.6726 26.6758 11.8295 26.5189C11.9863 26.3621 12.0745 26.1494 12.0745 25.9275Z"
                                                fill="black" />
                                            <path
                                                d="M26.2926 25.9275C26.2926 26.8148 25.9401 27.6658 25.3127 28.2932C24.6853 28.9206 23.8344 29.273 22.9471 29.273C22.0598 29.273 21.2088 28.9206 20.5814 28.2932C19.954 27.6658 19.6016 26.8148 19.6016 25.9275C19.6016 25.0403 19.954 24.1893 20.5814 23.5619C21.2088 22.9345 22.0598 22.582 22.9471 22.582C23.8344 22.582 24.6853 22.9345 25.3127 23.5619C25.9401 24.1893 26.2926 25.0403 26.2926 25.9275V25.9275ZM23.7834 25.9275C23.7834 25.7057 23.6953 25.493 23.5385 25.3361C23.3816 25.1793 23.1689 25.0912 22.9471 25.0912C22.7252 25.0912 22.5125 25.1793 22.3557 25.3361C22.1988 25.493 22.1107 25.7057 22.1107 25.9275C22.1107 26.1494 22.1988 26.3621 22.3557 26.5189C22.5125 26.6758 22.7252 26.7639 22.9471 26.7639C23.1689 26.7639 23.3816 26.6758 23.5385 26.5189C23.6953 26.3621 23.7834 26.1494 23.7834 25.9275Z"
                                                fill="black" />
                                        </svg>
                                    </div>
                                    <span class="header__item-cart-text">Cart</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="header__item-search no-desktop"></div>
                    @include('/components/menu')
                </div>
            </section>
        </div>
    </header>




    {{ $slot }}
    @include('cart-sidebar')

    <footer class="footer-content">
        <div id="shopify-section-footer" class="shopify-section footer-section">
            <!-- START footer.liquid (SECTION) --><!-- start custom-footer-layout04.liquid (SNIPPET) -->
            <section data-section-id="footer" class="site-footer " data-section-type="main-footer">
                <h3 class="hide">Footer</h3>
                <div class="wrapper">
                    <div class="half-content">
                        <div class=" grid__item mobile text-center footer_img">


                            <div class="half-content grid__item menu-footer-grid footer_logo mobile">
                                <a title="" class="footer__logo-anchor" href="#">
                                    <img src="/storage/logo/logo-text-white.png" width="50" height="43"
                                        alt="">
                                </a>

                            </div>
                        </div>
                        <div class="half-content grid__item menu-footer-grid footer_logo no-mobile">

                            <a class="footer__logo-anchor" title="" href="#">
                                <img src="/storage/logo/logo-text-white.png" width="50" height="43"
                                    alt="">
                            </a>

                        </div>
                        <div class="grid__item "></div>
                        <div class="popular-collection-links">
                            <h4 class="popular_collections_title">Popular Collections</h4>
                            @foreach ($popularEvents as $event)
                                <a title="{{ $event->name }}"
                                    id="ftr-pop_col-link-d77508b7-96a9-4f72-9ff7-e4730d7b856c"
                                    href="/collections/event/{{ strtolower($event->name) }}"><!-- start responsive-image.liquid (SNIPPET) -->


                                    <img id="056633295" src="/storage/events/{{ $event->image }}"
                                        data-src="/storage/events/{{ $event->image }}"
                                        data-srcset="/storage/events/{{ $event->image }}"
                                        sizes="(max-width: 479px) 480px, (max-width: 767px) 768px, (max-width: 1019px) 1020px, (max-width: 1279px) 1280px"
                                        class="responsive-image" data-class="LazyLoad" alt="Image" loading="lazy"
                                        width="200" height="200">
                                    <h5 class="popular_collections_text">{{ $event->name }}</h5>

                                </a>
                            @endforeach


                        </div>
                        <div class="info">
                            <h3 class="info__contact-title">Get In Contact</h3>
                            <div class="info__container">
                                <div class="info__contact"><a title="E-mail" class="footer__business-info-email"
                                        id="ftr-info-mail" href="mailto:weborders@taleofroses.com.au"
                                        target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="12" viewBox="0 0 16 12" fill="none">
                                            <path
                                                d="M15 1.875C15 1.11875 14.37 0.5 13.6 0.5H2.4C1.63 0.5 1 1.11875 1 1.875M15 1.875V10.125C15 10.8813 14.37 11.5 13.6 11.5H2.4C1.63 11.5 1 10.8813 1 10.125V1.875M15 1.875L8 6.6875L1 1.875"
                                                stroke="white" stroke-width="0.866667" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg><span>weborders@taleofroses.com.au</span>
                                    </a></div>

                            </div>
                            <div class="social-icons-net"></div>
                        </div>
                    </div>
                    <!-- end first half-content -->
                    <div class="half-content last-half direction-last-half ">
                        <div class="half-content__menus">
                            <nav class="half-content grid__item menu-footer-grid">
                                <h4 class="nav-title">
                                    Information
                                    <!-- start icon-arrow-down.liquid (SNIPPET) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="15"
                                        viewBox="0 0 9 15" fill="none">
                                        <path d="M1.5 13.9326L7.5 7.93262L1.5 1.93262" stroke="#555555"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </h4>
                                <ul class="no-bullets">
                                    <li class="footer-menu-item">
                                        <a id="ftr-menu-ae3ad1f0-d0ad-480f-b0df-afd9157085f9-1"
                                            href="/pages/about-us">About Us</a>
                                    </li>
                                    <li class="footer-menu-item">
                                        <a id="ftr-menu-ae3ad1f0-d0ad-480f-b0df-afd9157085f9-1"
                                            href="/pages/contact-us">Contact Us</a>
                                    </li>
                                    <li class="footer-menu-item">
                                        <a id="ftr-menu-ae3ad1f0-d0ad-480f-b0df-afd9157085f9-2"
                                            href="/pages/mission">Mission</a>
                                    </li>
                                    <li class="footer-menu-item">
                                        <a id="ftr-menu-ae3ad1f0-d0ad-480f-b0df-afd9157085f9-3"
                                            href="/pages/vision">Vision</a>
                                    </li>
                                    <li class="footer-menu-item">
                                        <a id="ftr-menu-ae3ad1f0-d0ad-480f-b0df-afd9157085f9-4"
                                            href="/pages/values">Values</a>
                                    </li>
                                </ul>
                            </nav>

                            <hr class="half-content__menu-divider">

                            <nav class="half-content grid__item menu-footer-grid">
                                <h4 class="nav-title">
                                    Login
                                    <!-- start icon-arrow-down.liquid (SNIPPET) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="15"
                                        viewBox="0 0 9 15" fill="none">
                                        <path d="M1.5 13.9326L7.5 7.93262L1.5 1.93262" stroke="#555555"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </h4>
                                <ul class="no-bullets">



                                    @if (session()->has('isAdmin'))
                                        <li class="footer-menu-item">
                                            <a id="ftr-menu-1178d51e-62a3-4d0d-86b6-bec20aa9db9d-1"
                                                href="/account/admin">Admin</a>
                                        </li>
                                    @else
                                        <li class="footer-menu-item">
                                            <a id="ftr-menu-1178d51e-62a3-4d0d-86b6-bec20aa9db9d-1"
                                                href="/account/login">My Account</a>
                                        </li>


                                        <li class="footer-menu-item">
                                            <a id="ftr-menu-1178d51e-62a3-4d0d-86b6-bec20aa9db9d-2"
                                                href="/account/login">My Order</a>
                                        </li>
                                    @endif
                                </ul>
                            </nav>

                        </div>

                        <div class="credits desktop">
                            <div class="wrapper">
                                <p class="copyright-class" id="copyright" style="font-size: 14px; color: #767676;">
                                    An Official Licensee of Speaking Roses.
                                </p>

                                <div class="trust-badges-footer-wrapper">
                                    <div class="trust-badges-wrapper">
                                        <div class="footer__trust-badge"
                                            id="trust-badges-imge674eaf1-5430-4e8e-84d2-52d653c1e525">

                                            <img width="60" height="60"
                                                id="trust-badge-footer-e674eaf1-5430-4e8e-84d2-52d653c1e525"
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                data-src="//speakingroses.com/cdn/shop/t/12/assets/icon-visa.svg?v=29794728405024771741695383956"
                                                alt="Visa" data-class="LazyLoad">
                                        </div>

                                        <style scoped>
                                            #trust-badges-imge674eaf1-5430-4e8e-84d2-52d653c1e525 img,
                                            #trust-badges-imge674eaf1-5430-4e8e-84d2-52d653c1e525 svg {
                                                height: auto;
                                                width: 45px;
                                            }
                                        </style>
                                        <div class="footer__trust-badge"
                                            id="trust-badges-img19cb74d1-5fae-4694-aa3a-9ac4fb336813">

                                            <img width="60" height="60"
                                                id="trust-badge-footer-19cb74d1-5fae-4694-aa3a-9ac4fb336813"
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                data-src="//speakingroses.com/cdn/shop/t/12/assets/icon-amex.svg?v=32705072600897310141695383962"
                                                alt="Amex" data-class="LazyLoad">
                                        </div>

                                        <style scoped>
                                            #trust-badges-img19cb74d1-5fae-4694-aa3a-9ac4fb336813 img,
                                            #trust-badges-img19cb74d1-5fae-4694-aa3a-9ac4fb336813 svg {
                                                height: auto;
                                                width: 45px;
                                            }
                                        </style>
                                        <div class="footer__trust-badge"
                                            id="trust-badges-imgd5f02746-ce78-490c-aad6-9f8c0108a67a">

                                            <img width="60" height="60"
                                                id="trust-badge-footer-d5f02746-ce78-490c-aad6-9f8c0108a67a"
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                data-src="//speakingroses.com/cdn/shop/t/12/assets/icon-master.svg?v=67014512618519911381695383956"
                                                alt="Master" data-class="LazyLoad">
                                        </div>

                                        <style scoped>
                                            #trust-badges-imgd5f02746-ce78-490c-aad6-9f8c0108a67a img,
                                            #trust-badges-imgd5f02746-ce78-490c-aad6-9f8c0108a67a svg {
                                                height: auto;
                                                width: 45px;
                                            }
                                        </style>
                                        <div class="footer__trust-badge"
                                            id="trust-badges-imgtrust_badges_footer_rC7nRH">

                                            <img width="60" height="60"
                                                id="trust-badge-footer-trust_badges_footer_rC7nRH"
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                data-src="//speakingroses.com/cdn/shop/t/12/assets/icon-shopify-pay.svg?v=85947494197469692591695383958"
                                                alt="Shopify pay" data-class="LazyLoad">
                                        </div>

                                        <style scoped>
                                            #trust-badges-imgtrust_badges_footer_rC7nRH img,
                                            #trust-badges-imgtrust_badges_footer_rC7nRH svg {
                                                height: auto;
                                                width: 45px;
                                            }
                                        </style>
                                        <div class="footer__trust-badge"
                                            id="trust-badges-img2Fb3848877-b330-45b5-8177-09da65e1fcab">

                                            <img width="60" height="60"
                                                id="trust-badge-footer-2Fb3848877-b330-45b5-8177-09da65e1fcab"
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                data-src="//speakingroses.com/cdn/shop/t/12/assets/icon-diners-club.svg?v=16158423513166954691695383956"
                                                alt="Diners club" data-class="LazyLoad">
                                        </div>

                                        <style scoped>
                                            #trust-badges-img2Fb3848877-b330-45b5-8177-09da65e1fcab img,
                                            #trust-badges-img2Fb3848877-b330-45b5-8177-09da65e1fcab svg {
                                                height: auto;
                                                width: 45px;
                                            }
                                        </style>
                                        <div class="footer__trust-badge"
                                            id="trust-badges-imgtrust_badges_footer_yRJGqT">

                                            <img width="60" height="60"
                                                id="trust-badge-footer-trust_badges_footer_yRJGqT"
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                data-src="//speakingroses.com/cdn/shop/t/12/assets/icon-venmo.svg?v=23096196732932542841695383958"
                                                alt="Venmo" data-class="LazyLoad">
                                        </div>

                                        <style scoped>
                                            #trust-badges-imgtrust_badges_footer_yRJGqT img,
                                            #trust-badges-imgtrust_badges_footer_yRJGqT svg {
                                                height: auto;
                                                width: 45px;
                                            }
                                        </style>
                                        <div class="footer__trust-badge"
                                            id="trust-badges-imgtrust_badges_footer_yaGzyP">

                                            <img width="60" height="60"
                                                id="trust-badge-footer-trust_badges_footer_yaGzyP"
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                data-src="//speakingroses.com/cdn/shop/t/12/assets/icon-google-pay.svg?v=70493916577005231491695383958"
                                                alt="Google pay" data-class="LazyLoad">
                                        </div>

                                        <style scoped>
                                            #trust-badges-imgtrust_badges_footer_yaGzyP img,
                                            #trust-badges-imgtrust_badges_footer_yaGzyP svg {
                                                height: auto;
                                                width: 45px;
                                            }
                                        </style>
                                        <div class="footer__trust-badge"
                                            id="trust-badges-imgtrust_badges_footer_MmtArC">

                                            <img width="60" height="60"
                                                id="trust-badge-footer-trust_badges_footer_MmtArC"
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                data-src="//speakingroses.com/cdn/shop/t/12/assets/icon-paypal.svg?v=38605133199397964581695383964"
                                                alt="Paypal" data-class="LazyLoad">
                                        </div>

                                        <style scoped>
                                            #trust-badges-imgtrust_badges_footer_MmtArC img,
                                            #trust-badges-imgtrust_badges_footer_MmtArC svg {
                                                height: auto;
                                                width: 45px;
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end wrapper -->
                <div class="credits no-desktop">
                    <div class="wrapper">
                        <p class="copyright-class" id="copyright">
                            Copyright &copy;&nbsp;2024
                            <a id="CopyrightReserved--no-desktop" href="/">Tale of Roses</a>. All Right
                            Reserved.
                        </p>

                        <div class="trust-badges-footer-wrapper">
                            <div class="trust-badges-wrapper">
                                <div class="footer__trust-badge"
                                    id="trust-badges-imge674eaf1-5430-4e8e-84d2-52d653c1e525">

                                    <img width="60" height="60"
                                        id="trust-badge-footer-e674eaf1-5430-4e8e-84d2-52d653c1e525"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                        data-src="//speakingroses.com/cdn/shop/t/12/assets/icon-visa.svg?v=29794728405024771741695383956"
                                        alt="Visa" data-class="LazyLoad">
                                </div>

                                <style scoped>
                                    #trust-badges-imge674eaf1-5430-4e8e-84d2-52d653c1e525 img,
                                    #trust-badges-imge674eaf1-5430-4e8e-84d2-52d653c1e525 svg {
                                        height: auto;
                                        width: 45px;
                                    }
                                </style>
                                <div class="footer__trust-badge"
                                    id="trust-badges-img19cb74d1-5fae-4694-aa3a-9ac4fb336813">

                                    <img width="60" height="60"
                                        id="trust-badge-footer-19cb74d1-5fae-4694-aa3a-9ac4fb336813"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                        data-src="//speakingroses.com/cdn/shop/t/12/assets/icon-amex.svg?v=32705072600897310141695383962"
                                        alt="Amex" data-class="LazyLoad">
                                </div>

                                <style scoped>
                                    #trust-badges-img19cb74d1-5fae-4694-aa3a-9ac4fb336813 img,
                                    #trust-badges-img19cb74d1-5fae-4694-aa3a-9ac4fb336813 svg {
                                        height: auto;
                                        width: 45px;
                                    }
                                </style>
                                <div class="footer__trust-badge"
                                    id="trust-badges-imgd5f02746-ce78-490c-aad6-9f8c0108a67a">

                                    <img width="60" height="60"
                                        id="trust-badge-footer-d5f02746-ce78-490c-aad6-9f8c0108a67a"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                        data-src="//speakingroses.com/cdn/shop/t/12/assets/icon-master.svg?v=67014512618519911381695383956"
                                        alt="Master" data-class="LazyLoad">
                                </div>

                                <style scoped>
                                    #trust-badges-imgd5f02746-ce78-490c-aad6-9f8c0108a67a img,
                                    #trust-badges-imgd5f02746-ce78-490c-aad6-9f8c0108a67a svg {
                                        height: auto;
                                        width: 45px;
                                    }
                                </style>
                                <div class="footer__trust-badge" id="trust-badges-imgtrust_badges_footer_rC7nRH">

                                    <img width="60" height="60"
                                        id="trust-badge-footer-trust_badges_footer_rC7nRH"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                        data-src="//speakingroses.com/cdn/shop/t/12/assets/icon-shopify-pay.svg?v=85947494197469692591695383958"
                                        alt="Shopify pay" data-class="LazyLoad">
                                </div>

                                <style scoped>
                                    #trust-badges-imgtrust_badges_footer_rC7nRH img,
                                    #trust-badges-imgtrust_badges_footer_rC7nRH svg {
                                        height: auto;
                                        width: 45px;
                                    }
                                </style>
                                <div class="footer__trust-badge"
                                    id="trust-badges-img2Fb3848877-b330-45b5-8177-09da65e1fcab">

                                    <img width="60" height="60"
                                        id="trust-badge-footer-2Fb3848877-b330-45b5-8177-09da65e1fcab"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                        data-src="//speakingroses.com/cdn/shop/t/12/assets/icon-diners-club.svg?v=16158423513166954691695383956"
                                        alt="Diners club" data-class="LazyLoad">
                                </div>

                                <style scoped>
                                    #trust-badges-img2Fb3848877-b330-45b5-8177-09da65e1fcab img,
                                    #trust-badges-img2Fb3848877-b330-45b5-8177-09da65e1fcab svg {
                                        height: auto;
                                        width: 45px;
                                    }
                                </style>
                                <div class="footer__trust-badge" id="trust-badges-imgtrust_badges_footer_yRJGqT">

                                    <img width="60" height="60"
                                        id="trust-badge-footer-trust_badges_footer_yRJGqT"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                        data-src="//speakingroses.com/cdn/shop/t/12/assets/icon-venmo.svg?v=23096196732932542841695383958"
                                        alt="Venmo" data-class="LazyLoad">
                                </div>

                                <style scoped>
                                    #trust-badges-imgtrust_badges_footer_yRJGqT img,
                                    #trust-badges-imgtrust_badges_footer_yRJGqT svg {
                                        height: auto;
                                        width: 45px;
                                    }
                                </style>
                                <div class="footer__trust-badge" id="trust-badges-imgtrust_badges_footer_yaGzyP">

                                    <img width="60" height="60"
                                        id="trust-badge-footer-trust_badges_footer_yaGzyP"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                        data-src="//speakingroses.com/cdn/shop/t/12/assets/icon-google-pay.svg?v=70493916577005231491695383958"
                                        alt="Google pay" data-class="LazyLoad">
                                </div>

                                <style scoped>
                                    #trust-badges-imgtrust_badges_footer_yaGzyP img,
                                    #trust-badges-imgtrust_badges_footer_yaGzyP svg {
                                        height: auto;
                                        width: 45px;
                                    }
                                </style>
                                <div class="footer__trust-badge" id="trust-badges-imgtrust_badges_footer_MmtArC">

                                    <img width="60" height="60"
                                        id="trust-badge-footer-trust_badges_footer_MmtArC"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                        data-src="//speakingroses.com/cdn/shop/t/12/assets/icon-paypal.svg?v=38605133199397964581695383964"
                                        alt="Paypal" data-class="LazyLoad">
                                </div>

                                <style scoped>
                                    #trust-badges-imgtrust_badges_footer_MmtArC img,
                                    #trust-badges-imgtrust_badges_footer_MmtArC svg {
                                        height: auto;
                                        width: 45px;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <style scoped>
                :root {
                    --social-icons-color: #ffffff;
                    --background-footer-color: #1d1e1c;
                    --border-footer-color: rgba(0, 0, 0, 0);
                    --font-color: #ffffff;
                    --footer-title-font-color: #ffffff;
                    --popular-collection-background: rgba(0, 0, 0, 0.0);
                    --popular-collection-text: #ffffff;
                    --font-size-title-footer: 22px;
                    --font-size-itens-footer: 16px;
                    --font-size-pop-itens-footer: 11px;
                    --font-size-pop-itens-footer-mobile: 9px;
                }

                .site-footer .credits .wrapper {
                    padding: 0 20px;
                }


                /* Logo */

                .footer_logo {
                    display: flex;
                    align-items: center;
                    justify-content: flex-start;
                    margin-bottom: 33px;
                }

                .footer_logo.mobile {
                    margin: 0 auto 30px;
                }

                .footer_logo img,
                .footer_logo svg {
                    margin: 0 auto;

                    width: 100%;
                    height: auto;
                    max-width: 160px;

                }

                .site-footer .wrapper .footer__logo-anchor {
                    text-decoration: none;
                    cursor: pointer;
                    color: var(--color-link);
                    font-size: var(--copy_body);
                    line-height: 1.3;
                    text-transform: uppercase;
                }

                /* Newsletter*/

                .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_field_group,
                .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_form_actions {
                    border: 1px solid rgba(0, 0, 0, 0);
                    height: 100%;
                }

                .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_field_group {
                    width: 66%;
                    margin: 0;
                }

                .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_field_group input {
                    width: 100%;
                    border-radius: 0;
                    background: #010101;
                    padding: 0 17px 4px;
                    letter-spacing: 1px;
                }

                .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_form_actions,
                .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_field_actions button {
                    width: 33%;
                    display: flex;
                    align-items: center;

                    border-radius: 4px;
                    overflow: hidden;
                }

                .newsletter-klaviyo .email-signup-form .klaviyo_submit_button {
                    border-radius: 3px;
                    height: 38.7px;
                }

                /* Info - Contact */

                .site-footer .wrapper .info {
                    width: 100%;
                    display: flex;
                    align-items: start;
                    flex-direction: column;
                    margin: 0;
                    padding-top: 36px;
                }

                .site-footer .info__contact-title {
                    text-align: left;
                    margin-bottom: 10px;
                    letter-spacing: 2px;
                }

                .site-footer .info__container {
                    display: flex;
                    width: 100%;
                    justify-content: space-between;
                    align-items: center;
                    gap: 10px;
                }

                .site-footer .info__contact {
                    width: auto;
                    display: flex;
                    align-items: center;
                    flex-wrap: wrap;
                    gap: 0 9px;
                }

                .site-footer .wrapper .info a,
                .site-footer .wrapper .info p {
                    color: var(--font-color, #fff);
                    text-align: left;
                    float: left;
                    font-size: var(--font-size-itens-footer);
                }

                .site-footer .wrapper .info a {
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    margin: 0 0 4px 0;
                    gap: 3px;
                }

                .site-footer .wrapper .info a svg {
                    width: 15px;
                    height: 15px;
                }

                .site-footer .wrapper .popular-collection-links {
                    padding-top: 9px;
                    display: block;
                    float: left;
                    width: 100%;
                }

                .site-footer .wrapper .popular-collection-links a {
                    float: left;
                    margin: 11px 16px 0 0;
                    position: relative;
                    width: 21.06%;
                    height: 0;
                    padding-top: 28.3%;
                    overflow: hidden;
                }

                .site-footer .wrapper .popular-collection-links a:last-child {
                    margin-right: 0;
                }

                .site-footer .wrapper .popular-collection-links img {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                .site-footer .wrapper .popular-collection-links a .popular_collections_text {
                    background-color: var(--popular-collection-background, #333);
                    color: var(--popular-collection-text, #333);
                    font-size: var(--font-size-pop-itens-footer);
                    font-weight: 700;
                    position: absolute;
                    text-align: center;
                    text-transform: capitalize;
                    left: 2px;
                    bottom: 12px;
                    width: 100%;
                    line-height: 1.5;
                    letter-spacing: 1px;
                    text-shadow: 1px 1px 1px #000;
                }

                .site-footer .wrapper .info .footer__business-info-email path,
                .site-footer .wrapper .info .footer__business-info-tel path,
                .site-footer .wrapper .info .footer__business-info-address path {
                    stroke: var(--font-color, #fff);
                }

                /* Info - Social */
                .site-footer .wrapper .info .social-net img {
                    width: 20px;
                    height: 20px;
                }

                .site-footer .wrapper .info .social-net {
                    margin: 10px 5px 0 0;
                }

                .social-icons-net {
                    display: flex;
                }

                .site-footer .wrapper .info .social-net svg circle,
                .site-footer .wrapper .info .social-net svg path {
                    fill: var(--social-icons-color, #fff);
                }

                .site-footer .wrapper .info .social-net svg {
                    margin: 0 5px 0 0;
                    width: 20px;
                    height: 20px;
                }

                /* Half Content Last Half */

                .site-footer .wrapper .last-half {
                    padding: 19px 14px 21px;
                    display: flex;
                    flex-wrap: wrap;
                    align-content: center;
                    flex-direction: column;
                    justify-content: space-between;
                    border-left: 2px solid var(--border-footer-color, #fff);
                }

                .site-footer .wrapper .last-half .half-content__menus {
                    width: 100%;
                }

                .site-footer .wrapper .last-half .grid__item {
                    width: 50%;
                    height: 67%;
                    padding-top: 112px;
                }

                .site-footer .wrapper .last-half .grid__item:first-of-type {
                    text-align: right;
                }

                .site-footer .wrapper .last-half .grid__item:last-of-type {
                    padding-left: 10px;
                }

                .site-footer .wrapper .last-half .half-content__menu-divider {
                    display: none;
                }

                .site-footer .wrapper .last-half .grid__item .nav-title {
                    margin: 0 0 21px;
                    font-weight: 400;
                    padding-right: 7px;
                    text-align: right;
                }

                .site-footer .wrapper .last-half .grid__item:last-of-type .nav-title {
                    padding-right: 12px;
                }

                .site-footer .wrapper .last-half .nav-title svg {
                    display: none;
                }

                .site-footer .wrapper .no-bullets {
                    margin-bottom: 18px;
                    margin-left: auto;
                    width: 61%;
                }

                .site-footer .wrapper .grid__item:first-of-type .no-bullets {
                    width: 43%;
                }

                .site-footer .wrapper .last-half .no-bullets li {
                    list-style-type: none;
                    margin-bottom: 6px;
                    text-align: left;
                }

                .site-footer .wrapper .last-half.center_menus {
                    align-content: center;
                }

                .site-footer .wrapper .last-half .grid__item:nth-of-type(n+3) {
                    margin-top: 0;
                }

                .site-footer .wrapper .info .footer__business-info-email path,
                .site-footer .wrapper .info .footer__business-info-tel path {
                    stroke: var(--font-color, #fff);
                }

                .site-footer .wrapper .info .social-net img {
                    width: 20px;
                    height: 20px;
                }

                .site-footer .wrapper .info .social-net {
                    margin: 10px 5px 0 0;
                }

                .template-404 .footer-section,
                .template-search .footer-section {
                    margin-top: 40px;
                }

                .site-footer {
                    background: var(--background-footer-color, #dcdcdc);
                    padding: 20px;
                }

                .site-footer .newsletter-form.full .contact-form {
                    flex-wrap: wrap;
                }

                .site-footer .error_message ul {
                    list-style: none;
                    color: #c00;
                }

                .site-footer .newsletter-form.full .contact-form {
                    flex-wrap: wrap
                }

                .site-footer .error_message ul {
                    list-style: none;
                    color: #c00;
                }

                .site-footer .logo-image {
                    width: 100%;
                }

                .site-footer .logo-image svg {
                    max-height: var(--vasta-footer-logo-max-height, unset);
                    max-width: var(--vasta-footer-logo-max-width, unset)
                }

                .site-footer .wrapper {
                    border: 2px solid var(--border-footer-color, #fff);
                    display: flex;
                    justify-content: center;
                    padding: 0;
                    height: 100%;
                }

                .site-footer .wrapper>.half-content {
                    box-sizing: border-box;
                    color: #fff;
                    padding: 44px 14px 20px 22px;
                    text-align: center;
                }

                .site-footer .wrapper>.half-content:first-child .news_letter_title,
                .site-footer .wrapper>.half-content:first-child .popular_collections_title {
                    font-weight: 400;
                    text-align: left;
                    text-transform: capitalize;
                }

                .site-footer .wrapper>.half-content:first-child .news_letter_title {
                    letter-spacing: 0.1px;
                }

                .site-footer .wrapper .half-content {
                    float: left;
                    width: 50%;
                }

                .site-footer .wrapper .half-content .custom-html {
                    width: 100%;
                    color: var(--font-color, #fff);
                }

                .site-footer .wrapper .grid__item {
                    width: 100%;
                    float: left;
                }

                .site-footer .wrapper .klaviyo_inputs_wrapper {
                    display: flex;
                    width: 100%;
                    background: #010101;
                    max-width: 540px;
                    height: 46px;
                    padding: 3px;
                    align-items: center;
                    justify-content: space-between;

                    border-radius: 4px;
                    overflow: hidden;
                }

                .site-footer .wrapper .success_message {
                    text-align: center;
                }

                .site-footer .wrapper .thank_you {
                    color: var(--thankYouTextColor);
                    display: inline;
                }

                .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_field_group input,
                .site-footer .wrapper .input-group .input-group-field {
                    width: 60%;
                }

                .site-footer .wrapper .input-group span input {
                    width: 100%;
                    background-color: var(--newsletter-submit-color);
                    color: var(--newsletter-submit-text-color);
                    text-transform: uppercase;
                    font-weight: 700;
                    cursor: pointer;
                    height: 44px;
                    border: none;
                }

                .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_field_group input,
                .site-footer .wrapper .input-group input {
                    height: 100%;
                    border: none;
                    width: 100%;
                }

                .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_form_actions button {
                    height: 100%;
                    font-size: 16px;
                }

                .site-footer .wrapper .input-group {
                    display: flex;
                }

                .site-footer .wrapper>.half-content:first-child .news_letter_title {
                    margin-bottom: 13px;
                }

                .site-footer .wrapper>.half-content:first-child .popular-collection-links .popular_collections_title {
                    margin: 8px 0 0 0;
                }

                .site-footer .wrapper>.half-content:first-child .news_letter_title,
                .site-footer .wrapper>.half-content:first-child .popular-collection-links .popular_collections_title,
                .site-footer .wrapper .last-half .nav-title {
                    font-size: var(--font-size-title-footer);
                }

                .site-footer .wrapper>.half-content:first-child .news_letter_title,
                .site-footer .wrapper>.half-content:first-child .popular-collection-links .popular_collections_title,
                .site-footer .wrapper>.half-content:first-child .info__contact-title,
                .site-footer .wrapper .last-half .nav-title {
                    color: var(--footer-title-font-color, #fff);
                }

                .site-footer .wrapper .copyright-class {
                    font-size: var(--font-size-itens-footer);
                }

                .site-footer .wrapper a {
                    color: var(--font-color, #fff);
                    font-weight: 300;
                    line-height: 25.6px;
                    font-size: var(--font-size-itens-footer, 12px);
                }

                .site-footer .wrapper .no-bullets .footer-menu-item {
                    margin-bottom: 4px;
                }

                .site-footer .wrapper .input-group-btn {
                    width: 40%;
                    flex: 0 0 40%;
                }

                .site-footer .grid-uniform {
                    box-sizing: border-box;
                    color: var(--font-color, #fff);
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    align-items: end;
                    padding: 20px;
                    text-align: center;
                    width: 100%;
                }

                .site-footer .credits {
                    display: flex;
                    justify-content: space-between;
                    width: 100%;
                    max-width: 100%;
                    margin: 0 auto 0;
                    padding-bottom: 4px;
                    padding-right: 20px;
                }

                .site-footer .credits.no-desktop {
                    display: none;
                }

                .site-footer .credits .wrapper {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin: 0 auto;
                    border: none;
                    padding: 10px 0;
                }

                .site-footer .credits.desktop .wrapper {
                    display: flex;
                    flex-direction: column-reverse;
                    justify-content: space-between;
                    align-items: flex-end;
                    margin: 0 auto;
                    border: none;
                    padding: 0;
                }

                .site-footer .credits.desktop .wrapper .copyright-class,
                .site-footer .credits.desktop .wrapper .trust-badges-footer-wrapper {
                    width: 71%;
                }

                .site-footer .credits p {
                    font-weight: 300;
                    color: var(--font-color, #fff);
                    text-transform: capitalize;
                    width: 50%;
                }

                .site-footer .credits p a {
                    font-weight: 300;
                    color: var(--font-color, #fff);
                    text-transform: capitalize;
                }

                .trust-badges-footer-wrapper {
                    width: 50%;
                    display: flex;
                    justify-content: center;
                    margin-top: 27px;
                }

                .trust-badges-footer-wrapper .trust-badges-wrapper {
                    gap: 8px;
                    width: 100%;
                    display: flex;
                    justify-content: center;
                }

                .footer-section .footer__trust-badge {
                    margin-top: 15px;
                }

                .footer-section .footer__trust-badge:not(:last-of-type) {
                    margin-right: 5px;
                }

                .site-footer .credits img {
                    display: block;
                    float: right;
                    max-width: 100%;
                    width: auto;
                }

                .footer_img {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .site-footer .logo-image {
                    width: 100%;
                    display: flex;
                    align-items: center;
                    margin: 0 auto;
                    justify-content: center;
                }

                @media screen and (-ms-high-contrast: active),
                (-ms-high-contrast: none) {
                    .trust-badges-footer-wrapper .trust-badges-img svg {
                        width: 70px;
                    }
                }

                @media (max-width:1279px) {

                    .site-footer .wrapper>.half-content:first-child .news_letter_title,
                    .site-footer .wrapper>.half-content:first-child .popular-collection-links .popular_collections_title {
                        width: 100%;
                    }

                    .site-footer .wrapper .popular-collection-links {
                        display: flex;
                        flex-direction: row;
                        float: left;
                        flex-wrap: wrap;
                        justify-content: space-evenly;
                    }

                    .site-footer .wrapper .popular-collection-links a {
                        margin: 10px 8px 0 0;
                        max-width: unset;
                    }
                }

                @media (max-width:1019px) {
                    .site-footer .wrapper {
                        max-width: 75%;
                        flex-direction: column;
                    }

                    .site-footer {
                        padding-top: 44px;
                    }

                    .site-footer .info__container {
                        flex-direction: column;
                        justify-content: center;
                    }

                    /* Half-Content */

                    .site-footer .wrapper .half-content {
                        width: 100%;
                        padding: 0px;
                        margin-bottom: 6px;
                    }

                    /* Half-Content Logo*/

                    .site-footer .wrapper .half-content .footer_logo.no-mobile {
                        display: flex;
                        justify-content: center;
                        margin-bottom: 40px;
                        padding-left: 11px;
                    }

                    /* Half-Content Newsletter*/

                    .wrapper .half-content .newsletter-klaviyo {
                        margin-bottom: 32px;
                    }

                    .site-footer .wrapper .klaviyo_field_group input {
                        font-size: 12px
                    }

                    .wrapper .half-content .newsletter-klaviyo .klaviyo_inputs_wrapper {
                        padding: 2px;
                        margin: 0 auto;
                    }

                    .newsletter-klaviyo form .klaviyo_form_actions button,
                    .newsletter-klaviyo form .klaviyo_form_actions button input {
                        font-size: 13px;
                    }

                    .site-footer .wrapper .input-group span input {
                        font-size: 12px;
                    }

                    .site-footer .wrapper>.half-content:first-child .news_letter_title,
                    .site-footer .wrapper>.half-content:first-child .popular-collection-links .popular_collections_title,
                    .site-footer .info .info__contact-title {
                        text-align: center;
                    }

                    .site-footer .wrapper>.half-content:first-child .news_letter_title {
                        letter-spacing: 0.1px;
                        margin-bottom: 10px;
                    }

                    /* Half-Content Popular Collections */

                    .site-footer .wrapper>.half-content:first-child .popular-collection-links .popular_collections_title {
                        margin: 9px 0 15px 0;
                    }

                    .site-footer .wrapper .popular-collection-links {
                        padding-top: 0;
                        gap: 8px;
                    }

                    .site-footer .wrapper .popular-collection-links a {
                        margin: 0;
                        max-width: unset;
                        width: 22.3%;
                        padding-top: 27.8%;
                    }

                    .site-footer .wrapper .popular-collection-links a .popular_collections_text {
                        font-size: 10px;
                        padding: 2px;
                        left: 0;
                        bottom: 9px;
                        line-height: 1.6;
                        letter-spacing: 1px;
                    }

                    /* Info */

                    .site-footer .wrapper .info {
                        padding-top: 45px;
                        margin-bottom: 20px;
                    }

                    .site-footer .info .info__contact-title {
                        margin-bottom: 15px;
                    }

                    .site-footer .info .info__contact {
                        flex-direction: column;
                    }

                    .site-footer .info .info__contact a {
                        margin-bottom: 5px;
                    }

                    .site-footer .info .social-icons-net {
                        margin: 0 auto;
                    }

                    /* Last Half */

                    .site-footer .wrapper .last-half {
                        border: 0;
                        padding-left: 0px;
                        padding-top: 7px;
                    }

                    .site-footer .wrapper .last-half .half-content__menus {
                        display: flex;
                        justify-content: center;
                    }

                    .site-footer .wrapper .last-half .menu-footer-grid {
                        width: 36%;
                        padding-top: 0;
                        padding-right: 40px;
                    }

                    .site-footer .wrapper .last-half .menu-footer-grid:first-of-type {
                        padding: 0;
                    }

                    .site-footer .wrapper .last-half .menu-footer-grid:last-of-type {
                        padding: 0;
                        padding-left: 1px;
                    }

                    .site-footer .wrapper .last-half .half-content__menu-divider {
                        display: block;
                        margin-right: 23px;
                    }

                    .site-footer .wrapper .last-half .nav-title {
                        text-align: left;
                        margin-bottom: 16px;
                    }

                    .site-footer .wrapper .wrapper .last-half .nav-title i {
                        display: none;
                    }

                    .site-footer .wrapper .last-half .menu-footer-grid:first-of-type .nav-title {
                        margin-bottom: 11px;
                        margin-left: 40px;
                        text-align: left;
                    }

                    .site-footer .wrapper .last-half .menu-footer-grid:last-of-type .nav-title {
                        text-align: left;
                        margin-bottom: 11px;
                    }

                    .site-footer .wrapper .last-half .no-bullets {
                        width: 100%;
                        margin-bottom: 0;
                    }

                    .site-footer .wrapper .last-half .menu-footer-grid:first-of-type .no-bullets {
                        width: 60%;
                        margin-left: 40px;
                    }

                    /* Credits */

                    .site-footer .credits.no-desktop {
                        display: block;
                        padding-right: 0;
                    }

                    .site-footer .credits.no-desktop .wrapper {
                        flex-direction: column-reverse;
                        padding: 0;
                    }

                    .site-footer .credits p {
                        font-size: 14px;
                        margin-top: 19px;
                        text-align: center;
                        width: 100%;
                    }

                    .site-footer .credits .trust-badges-footer-wrapper {
                        width: 100%;
                        padding: 0 21px;
                        margin-top: 0px;
                    }

                    .site-footer .trust-badges-wrapper {
                        width: 78%;
                        gap: 0;
                    }

                    .site-footer .credits .footer__trust-badge {
                        margin-top: 0;
                    }

                    /* Customize font-sizes */

                    .site-footer .wrapper .copyright-class,
                    .site-footer .wrapper a,
                    .site-footer .wrapper .info a,
                    .site-footer .wrapper .info p {
                        font-size: 16px;
                    }

                    .site-footer .wrapper .last-half .nav-title,
                    .site-footer .wrapper>.half-content:first-child .news_letter_title,
                    .site-footer .wrapper>.half-content:first-child .popular-collection-links .popular_collections_title {
                        font-size: 21px;
                    }
                }

                @media (max-width:767px) {
                    .site-ooter {
                        padding-top: 46px;
                    }

                    .site-footer .wrapper {
                        max-width: 100%;
                        border: 0;
                    }

                    /* Half Content */

                    .site-footer .wrapper .half-content {
                        padding: 0;
                        min-height: unset;
                        width: 100%;
                        margin-bottom: 7px;
                    }

                    .site-footer .wrapper .half-content .footer_logo {
                        margin-bottom: 31px;
                    }

                    .site-footer .wrapper .half-content .footer_logo.mobile {
                        padding-left: 9px;
                    }

                    .site-footer .wrapper .grid__item {
                        flex-direction: column;
                        padding: 0;
                    }

                    .site-footer .wrapper .info .social-net {
                        margin: 10px auto 0;
                    }

                    .site-footer .trust-badges-footer-wrapper {
                        max-width: unset;
                    }

                    .site-footer .wrapper .last-half .grid__item:nth-of-type(n+3) {
                        margin-top: 0;
                    }

                    .site-footer .wrapper .thank_you {
                        width: 100%;
                        text-align: center;
                    }

                    /* Half Content Newsletter */

                    .site-footer .wrapper .grid__item .newsletter-klaviyo,
                    .site-footer .wrapper .grid__item .newsletter-klaviyo .email-signup-form {
                        width: 100%;
                    }

                    .site-footer .wrapper .grid__item .newsletter-klaviyo {
                        margin-bottom: 22px;
                    }

                    .site-footer .wrapper .grid__item .newsletter-klaviyo .klaviyo_inputs_wrapper {
                        justify-content: flex-start;
                        height: 30px;
                    }

                    .site-footer .wrapper .grid__item .newsletter-klaviyo .klaviyo_inputs_wrapper .klaviyo_field_group {
                        width: 67%;
                    }

                    .site-footer .wrapper .grid__item .newsletter-klaviyo .klaviyo_inputs_wrapper input {
                        padding-left: 16px;
                        letter-spacing: 0.3px;
                        font-size: 12px;
                    }

                    .site-footer .wrapper .grid__item .newsletter-klaviyo .klaviyo_inputs_wrapper .klaviyo_form_actions {
                        width: 33.2%;
                        margin: 1px 1px 1px 0;
                    }

                    .site-footer .wrapper .grid__item .newsletter-klaviyo .klaviyo_inputs_wrapper input,
                    .newsletter-klaviyo form .klaviyo_form_actions .klaviyo_submit_button {
                        height: 44px;
                        padding: 0 !important;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .site-footer .wrapper .grid__item .newsletter-klaviyo .klaviyo_inputs_wrapper input::placeholder {
                        padding-left: 16px;
                        letter-spacing: 0.3px;
                        font-size: 12px;
                    }

                    .site-footer .wrapper .grid__item .newsletter-klaviyo form .klaviyo_form_actions button {
                        font-size: 10px;
                    }

                    .site-footer .wrapper .grid__item .newsletter-klaviyo .klaviyo_condensed_styling {
                        margin-bottom: 4px;
                    }

                    .newsletter-klaviyo form .klaviyo_form_actions button,
                    .newsletter-klaviyo form .klaviyo_form_actions button input {
                        font-size: 11px;
                    }

                    .newsletter-klaviyo form .klaviyo_form_actions button input {
                        font-size: 11px;
                    }

                    /* Half Content Popular Collections */

                    .site-footer .wrapper .popular-collection-links {
                        justify-content: space-evenly;
                        padding-top: 0;
                        gap: 0 10px;
                    }

                    .site-footer .wrapper>.half-content:first-child .news_letter_title {
                        margin-bottom: 12px;
                    }

                    .site-footer .wrapper>.half-content:first-child .news_letter_title,
                    .site-footer .wrapper>.half-content:first-child .popular-collection-links .popular_collections_title {
                        text-align: center;
                        font-size: 16px;
                        margin-bottom: 7px;
                    }

                    .site-footer .wrapper .popular-collection-links a .popular_collections_text {
                        font-size: 9px;
                        bottom: 5px;
                        line-height: 1;
                    }

                    .site-footer .wrapper .popular-collection-links a {
                        width: 22.5%;
                        padding-top: 31%;
                    }

                    /* Info */
                    .site-footer .wrapper .info {
                        padding-top: 30px;
                    }

                    .site-footer .wrapper .info__contact-title {
                        margin-bottom: 7px;
                        font-size: 13px;
                        letter-spacing: 0px;
                    }

                    .site-footer .wrapper .info__contact a {
                        margin-bottom: 0;
                    }

                    /* Last Half */

                    .site-footer .wrapper .last-half {
                        align-items: center;
                        min-height: auto;
                        border: none;
                        padding: 0;
                        margin-bottom: 9px;
                    }

                    .site-footer .wrapper .last-half .half-content__menus {
                        padding-left: 0;
                    }

                    .site-footer .wrapper .last-half .grid__item {
                        border-top: 2px solid var(--border-footer-color, #fff);
                        width: 100%;
                        flex-direction: column;
                        padding: 6px 0;
                    }

                    .site-footer .last-half .menu-footer-grid:not(.footer_logo) {
                        width: 50%;
                        padding: 0;
                        margin: 0;
                        margin-bottom: auto;
                        border: 0;
                        transition: ease all .3s;
                        overflow: hidden;
                        display: block;
                    }

                    .site-footer .wrapper .last-half .menu-footer-grid:first-of-type {
                        padding-right: 0;
                        display: flex;
                        align-items: start;
                    }

                    .site-footer .wrapper .last-half .menu-footer-grid:last-of-type {
                        padding-left: 19px;
                    }

                    .site-footer .wrapper .last-half .half-content__menu-divider {
                        display: none;
                    }

                    .site-footer .wrapper .last-half .nav-title {
                        width: 100%;
                        display: flex;
                        justify-content: flex-start;
                        text-decoration: none;
                        margin: 0;
                        align-items: center;
                    }

                    .site-footer .wrapper .last-half .menu-footer-grid:first-of-type .nav-title {
                        width: 100%;
                        margin-left: 0;
                        margin-bottom: 0;
                        padding-right: 38px;
                        justify-content: start;
                    }

                    .site-footer .wrapper .last-half .nav-title svg {
                        display: block;
                        margin: 0 0 0 5px;
                        width: 8px;
                        height: 10px;
                        transform: rotate(0deg);
                        transition-duration: .3s;
                    }

                    .site-footer .menu-footer-grid .nav-title.row-rotate svg {
                        transform: rotate(90deg);
                    }

                    .site-footer .wrapper .last-half .nav-title svg path {
                        stroke: var(--font-color, #fff);
                    }

                    .site-footer .wrapper .last-half .menu-footer-grid:first-of-type .no-bullets {
                        width: auto;
                        margin-right: 51px;
                        margin-left: 0;
                    }

                    .site-footer .menu-footer-grid .no-bullets {
                        width: 72%;
                        display: none;
                        margin-bottom: 0;
                        padding: 8px 0 0;
                    }

                    .site-footer .menu-footer-grid .nav-title.active+.no-bullets {
                        display: block;
                        margin: 0;
                    }

                    .site-footer .wrapper .last-half .no-bullets li {
                        margin-bottom: 0;
                    }

                    .site-footer .wrapper .no-bullets .footer-menu-item:last-child {
                        margin-bottom: 0;
                    }

                    .site-footer .menu-footer-grid .footer-menu-item a {
                        display: block;
                    }

                    .site-footer .wrapper>.half-content:first-child .news_letter_title,
                    .site-footer .wrapper>.half-content:first-child .popular-collection-links .popular_collections_title,
                    .site-footer .wrapper .last-half .nav-title {
                        font-size: 15px;
                    }

                    .site-footer .wrapper .copyright-class,
                    .site-footer .wrapper a,
                    .site-footer .wrapper .info a,
                    .site-footer .wrapper .info p {
                        font-size: 12px;
                    }

                    .site-footer .wrapper .last-half .active svg {
                        transform: rotate(180deg);
                        transition-duration: .3s;
                    }

                    .site-footer .wrapper .last-half .custom-html {
                        border-top: 2px solid var(--border-footer-color, #fff);
                        width: 100%;
                        flex-direction: column;
                        padding: 6px 0;
                    }

                    .site-footer .credits {
                        margin: 0 auto 0;
                        max-width: 100%;
                        text-align: center;
                        flex-wrap: wrap;
                        padding-right: 0;
                    }

                    .site-footer .credits .wrapper {
                        padding: 0;
                    }

                    .site-footer .credits p {
                        width: 100%;
                        margin: 0;
                        margin-top: 6px;
                        font-size: 15px;
                    }

                    .site-footer .wrapper .input-group span input {
                        font-size: 9px;
                    }

                    .site-footer .credits .trust-badges-footer-wrapper {
                        width: 100%;
                        margin-top: 0;
                        padding: 0;
                    }

                    .site-footer .trust-badges-wrapper {
                        width: 100%;
                    }

                    .site-footer .credits .trust-badges-footer-wrapper .trust-badges-img svg,
                    .site-footer .credits .trust-badges-footer-wrapper .trust-badges-img img {
                        height: 25px;
                    }

                    .site-footer .credits .footer__trust-badge {
                        margin-top: 0;
                    }

                    .footer-section .footer__trust-badge:not(:last-of-type) {
                        margin-right: 0;
                    }

                    .site-footer .wrapper .info a svg {
                        width: 10px;
                        height: 11px;
                        margin-bottom: 2px;
                    }

                    .site-footer .wrapper>.half-content:first-child .popular-collection-links .popular_collections_title {
                        margin: 11px 0 9px 0;
                        letter-spacing: 0.5px;
                    }

                    .footer_logo img,
                    .footer_logo svg {
                        max-width: 126px;
                    }
                }
            </style>

            <script type="lazyload_int">
 setTimeout(function (){
 window.SectionFooter = (function (){
 function SectionFooter(){
 this._run();
 }

 SectionFooter.prototype ={
 _run: function (){
 if (window.innerWidth < 768) $('.site-footer .menu-footer-grid').addClass('clickable');
 else $('.site-footer .menu-footer-grid').removeClass('clickable');

 $(window).resize(function (){
 if (window.innerWidth < 768){
  $('.site-footer .menu-footer-grid').addClass('clickable');
 }else{
  $('.site-footer .menu-footer-grid').removeClass('clickable');
 }
 });

 $('.site-footer .menu-footer-grid').click(function (){
 if (window.innerWidth < 768 && $(this).hasClass('clickable')){
  $('.site-footer .menu-footer-grid .no-bullets').stop().slideUp();

  if ($('.no-bullets', this).is(':visible')){
 $('.no-bullets', this).stop().slideUp();
 $('.nav-title', this).removeClass('row-rotate');
  }else{
 $('.nav-title', this).addClass('row-rotate');
 $('.no-bullets', this).stop().slideDown();
 $(this).siblings().children('.nav-title').removeClass('row-rotate');
  }
 }
 });
 },

 onLoad: function (){
 this._run();
 },

 onPagehide: function (){},
 };

 return new SectionFooter();
 })();
 });
</script>
        </div><!-- start scrollbutton.liquid (SNIPPET) -->
        <style>
            .back-to-top-right {
                position: fixed;
                bottom: 6em;
                right: 0px;
            }

            .back-to-top-left {
                position: fixed;
                bottom: 6em;
                left: 0px;
            }

            .back-to-top {
                justify-content: center;
                align-items: center;
                flex-direction: column;
                text-decoration: none;
                color: #000;
                background-color: #fff;
                transition: ease-in-out .2s all;
                opacity: 0;
                visibility: hidden;
                padding: 0.3em;
                display: flex;
                -webkit-border-top-left-radius: 3px;
                -webkit-border-bottom-left-radius: 3px;
                -moz-border-radius-topleft: 3px;
                -moz-border-radius-bottomleft: 3px;
                border-top-left-radius: 3px;
                border-bottom-left-radius: 3px;
                z-index: 100;
            }

            .back-to-top.displayed {
                opacity: 1;
                visibility: visible;
                z-index: 100;
            }

            .back-to-top svg {
                width: 25px;
                height: 25px;
                fill: #000;
            }

            .back-to-top i {
                vertical-align: middle;
            }

            .back-to-top:hover,
            .back-to-top:active {
                text-decoration: none;
                color: #000;
                fill: #000;
                background-color: #fff;
            }
        </style><a href="#" title="Back to the top"
            class="back-to-top back-to-top-right "><!-- start icon-arrow-up.liquid (SNIPPET) -->
            <svg enable-background="new 0 0 438.533 438.533" version="1.1" width="25" height="25"
                viewBox="0 0 438.53 438.53" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="m409.13 109.2c-19.608-33.592-46.205-60.189-79.798-79.796-33.599-19.606-70.277-29.407-110.06-29.407-39.781 0-76.47 9.801-110.06 29.407-33.595 19.604-60.192 46.201-79.8 79.796-19.609 33.597-29.41 70.286-29.41 110.06 0 39.78 9.804 76.463 29.407 110.06 19.607 33.592 46.204 60.189 79.799 79.798 33.597 19.605 70.283 29.407 110.06 29.407s76.47-9.802 110.06-29.407c33.593-19.602 60.189-46.206 79.795-79.798 19.603-33.596 29.403-70.284 29.403-110.06 1e-3 -39.782-9.8-76.472-29.399-110.06zm-47.684 122.63-25.981 25.981c-3.613 3.613-7.901 5.42-12.847 5.42-4.948 0-9.229-1.807-12.847-5.42l-53.954-53.961v143.32c0 4.948-1.813 9.232-5.428 12.847-3.613 3.62-7.898 5.427-12.847 5.427h-36.547c-4.948 0-9.231-1.807-12.847-5.427-3.617-3.614-5.426-7.898-5.426-12.847v-143.32l-53.959 53.961c-3.431 3.425-7.708 5.133-12.85 5.133-5.14 0-9.423-1.708-12.85-5.133l-25.981-25.981c-3.422-3.429-5.137-7.714-5.137-12.852 0-5.137 1.709-9.419 5.137-12.847l129.34-129.33c3.427-3.425 7.71-5.14 12.847-5.14 5.142 0 9.423 1.715 12.849 5.14l129.33 129.33c3.432 3.427 5.14 7.71 5.14 12.847 1e-3 5.138-1.707 9.423-5.139 12.852z" />
            </svg>
            <span></span>
        </a>

        <script type="lazyload_int">
 setTimeout(function(){
 jQuery(function($){
 var offset = 300;
 var duration = 200;

 $(window).scroll(function(){
 if ($(this).scrollTop() > offset){
 $('.back-to-top').addClass('displayed');
 }else{
 $('.back-to-top').removeClass('displayed');
 }
 });

 $('.back-to-top').unbind('click.smoothscroll').bind('click', function(e){
 e.preventDefault();
 $('html, body').animate({scrollTop: 0 }, duration);
 return false;
 });
 });
 });
</script>
    </footer><!-- start vasta-scripts.liquid (SNIPPET) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.3.0/model-viewer.min.js"></script>
    <script type="lazyload_int"
    data-src="//speakingroses.com/cdn/shop/t/12/assets/VastaShop.js?v=157113441304378571361696948568"></script>
    <script
    type="lazyload_int"> (function(){VastaShop.Cart.current ={"note":null,"attributes":{},"original_total_price":0,"total_price":0,"total_discount":0,"total_weight":0.0,"item_count":0,"items":[],"requires_shipping":false,"currency":"USD","items_subtotal_price":0,"cart_level_discount_applications":[],"checkout_charge_amount":0};VastaShop.Cart.total_price = 0;VastaShop.Cart.total_quantity = 0;})();</script>
    <script src="//speakingroses.com/cdn/shop/t/12/assets/slick.min.js?v=33408031789270915591695383957"></script>
    <script type="lazyload_int"
    data-src="//speakingroses.com/cdn/shop/t/12/assets/jquery.tmpl.min.js?v=32513529418586026101695383958"></script>
    <script type="lazyload_int"
    data-src="//speakingroses.com/cdn/shop/t/12/assets/jquery.products.min.js?v=24328245287809131551695383962"></script>
    <script
    type="lazyload_int">const product_without_image = 'https://cdn.shopify.com/shopifycloud/shopify/assets/no-image-2048-5e88c1b20e087fb7bbe9a3771824e743c244f437e4f8ba93bbf7b11b53f7824c.gif';var cart_page = cart_page ||{}, cart_page ={discount_in_cart_page:"", text_cart_above_button_sucess:"Congratulations! We&#39;ll Pay Your Shipping", cart_discount_value: 0, cart_freeshipping_text: "+ Free Shipping", text_cart_above_button: "", enable_day_on_message: false };VastaShop.config ={};VastaShop.config.enable_freeshipping_msg = true;VastaShop.config.freeshipping_msg = '+ Free Shipping';update_discount_cart(0, 0);</script>
    <script
    type="lazyload_int"> /** * Swatch Item */ const items = document.querySelectorAll('.template-collection .grid__item, .template-index .grid__item');items.forEach(function (item){const swatchItems = item.querySelectorAll('.swatch-value-color');const imageWrapper = item.querySelector('.grid__item-image-wrapper');swatchItems.forEach(function (swatchItem){const image = swatchItem.dataset.img;Shopify.Image.loadImage(Shopify.Image.getSizedImageUrl(image, '300x'));swatchItem.addEventListener('mouseover', function (){imageWrapper.classList.add('grid__item--hidden-image');imageWrapper.style.backgroundImage = 'url("' + image + '")';});swatchItem.addEventListener('mouseleave', function (){imageWrapper.classList.remove('grid__item--hidden-image');imageWrapper.style.backgroundImage = 'unset';});});});</script>
    <script
    type="lazyload_int"> setTimeout(function (){function labnolIframe(div){var iframe = document.createElement('iframe');iframe.setAttribute('src', 'https://www.youtube.com/embed/' + div.dataset.id + '?autoplay=1&rel=0');iframe.setAttribute('frameborder', '0');iframe.setAttribute('allowfullscreen', '1');iframe.setAttribute('allow', 'accelerometer;autoplay;encrypted-media;gyroscope;picture-in-picture');div.parentNode.replaceChild(iframe, div);}function initYouTubeVideos(){var playerElements = document.getElementsByClassName('youtube-player');for (var n = 0;n < playerElements.length;n++){var videoId = playerElements[n].dataset.id;var div = document.createElement('div');div.setAttribute('data-id', videoId);var thumbNode = document.createElement('img');thumbNode.src = '//i.ytimg.com/vi/ID/hqdefault.jpg'.replace('ID', videoId);div.appendChild(thumbNode);var playButton = document.createElement('div');playButton.setAttribute('class', 'play');div.appendChild(playButton);var background = document.createElement('div');background.setAttribute('class', 'play-background');playButton.appendChild(background);var icon = document.createElement('div');icon.setAttribute('class', 'play-icon');playButton.appendChild(icon);var leftSide = document.createElement('div');leftSide.setAttribute('class', 'play-left-side');icon.appendChild(leftSide);var rightSide = document.createElement('div');rightSide.setAttribute('class', 'play-right-side');icon.appendChild(rightSide);div.onclick = function (){labnolIframe(this);};playerElements[n].appendChild(div);}}initYouTubeVideos();});</script>
    <script type="lazyload_int"
    data-src="//speakingroses.com/cdn/shop/t/12/assets/priority-processing.js?v=95274878743863531891695921677"></script>


    <style>
        .gpo-hidden {
            display: none !important;
            opacity: 0 !important;
            visibility: hidden !important;
        }

        [data-gpo-is-enabled="true"] .shopify-payment-button__button--unbranded,
        [data-gpo-is-enabled="true"][data-gpo-cart-hide-additional-payment-button="true"] [data-shopify="dynamic-checkout-cart"],
        [data-gpo-is-enabled="true"][data-gpo-product-hide-additional-payment-button="true"] [data-shopify="payment-button"],
        .gpo-original-atc-button,
        .gpo-original-payment-button,
        .gpo-original-shopify-button,
        a.gpo-original-atc-button,
        a.gpo-original-checkout-button,
        a.gpo-original-shopify-button,
        button.gpo-original-atc-button,
        input#AddToCart.gpo-original-atc-button,
        input#addToCart.gpo-original-atc-button,
        button.gpo-original-checkout-button,
        button.gpo-original-shopify-button,
        input.gpo-original-atc-button,
        .gpo-original-checkout-button,
        input#addToCart.gpo-original-shopify-button,
        input.gpo-original-checkout-button,
        input.gpo-original-shopify-button {
            display: none !important;
        }

        #mini-cart form.cart a.gpo-clone-checkout-button,
        .cart-flyout a.gpo-clone-checkout-button {
            display: block !important;
        }
    </style>
    </div>
    <div id="shopify-block-13305045807980328211" class="shopify-block shopify-app-block">

    </div>
    <div id="shopify-block-5946647744298494267" class="shopify-block shopify-app-block">
        <!-- BEGIN app snippet: swymVersion -->
        <script>
            var __SWYM__VERSION__ = '3.104.0';
        </script><!-- END app snippet -->


        <!-- BEGIN app snippet: swymSnippet -->



        <style id="safari-flasher-pre"></style>

        <style id="swym-product-view-defaults">
            .swym-button.swym-add-to-wishlist-view-product:not(.swym-loaded) {
                display: none;
            }
        </style><!-- END app snippet -->

        <script id="swymSnippetCheckAndActivate">
            (function() {
                function postDomLoad() {
                    var element = document.querySelector('script#swym-snippet:not([type="text"])');
                    if (!element) {
                        var script = document.querySelector('script#swym-snippet[type="text"]');
                        if (script) {
                            script.type = 'text/javascript';
                            new Function(script.textContent)();
                        }
                    }
                }
                if (document.readyState === "loading") {
                    document.addEventListener("DOMContentLoaded", postDomLoad);
                } else {
                    postDomLoad();
                }
            })();
        </script>

    </div>
</body>
<script>
    w3_bglazyload = 1;
    (function() {
        var img = new Image();
        img.onload = function() {
            w3_hasWebP = !!(img.height > 0 && img.width > 0);
        };
        img.onerror = function() {
            w3_hasWebP = false;
        };
    })();

    function w3_events_on_end_js() {
        const lazy_bg_style = document.getElementById('w3_bg_load');
        lazy_bg_style.remove();
        w3_bglazyload = 0;
        lazyloadimages(0);
        // if(window.site_nav_link_burger == false) {
        //     jQuery(".hamburger").click();
        //     window.site_nav_link_burger = false;
        // }
    }

    function w3_start_img_load() {
        var top = this.scrollY;
        lazyloadimages(top);
        lazyloadiframes(top);
    }

    function w3_events_on_start_js() {
        var lazyvideos = document.getElementsByTagName('videolazy');
        convert_to_video_tag(lazyvideos);
        w3_start_img_load();
    }
    window.addEventListener(
        'scroll',
        function(event) {
            w3_start_img_load();
        }, {
            passive: true,
        }
    );
    var w3_is_mobile = window.matchMedia('(max-width: 767px)').matches ? 1 : 0;
    var win_width = screen.availWidth;
    var bodyRectMain = {};
    bodyRectMain.top = 1;
    setInterval(function() {
        lazyloadiframes(top);
    }, 8000);
    setInterval(function() {
        lazyloadimages(0);
    }, 3000);
    document.addEventListener('click', function() {
        lazyloadimages(0);
    });

    function getDataUrl(img1, width, height) {
        var myCanvas = document.createElement('canvas');
        var ctx = myCanvas.getContext('2d');
        var img = new Image();
        myCanvas.width = parseInt(width);
        myCanvas.height = parseInt(height);
        ctx.drawImage(img, 0, 0);
        img1.src = myCanvas.toDataURL('image/png');
    }

    function lazyload_img(imgs, bodyRect, window_height, win_width) {
        for (var i = 0; i < imgs.length; i++) {
            if (imgs[i].getAttribute('data-class') == 'LazyLoad') {
                var elem = imgs[i],
                    elemRect = imgs[i].getBoundingClientRect();

                if (elemRect.top != 0 && elemRect.top - (window_height - bodyRect.top) < w3_lazy_load_by_px) {
                    compStyles = window.getComputedStyle(imgs[i]);
                    if (compStyles.getPropertyValue('opacity') == 0) {
                        continue;
                    }
                    if (elem.tagName == 'IFRAMELAZY') {
                        var elem = document.createElement('iframe');
                        var index;
                        for (index = imgs[i].attributes.length - 1; index >= 0; --index) {
                            elem.attributes.setNamedItem(imgs[i].attributes[index].cloneNode());
                        }
                        imgs[i].parentNode.replaceChild(elem, imgs[i]);
                    }
                    var src = elem.getAttribute('data-src') ? elem.getAttribute('data-src') : elem.src;
                    if (w3_is_mobile && elem.getAttribute('data-mob-src')) {
                        src = elem.getAttribute('data-mob-src');
                    }
                    var srcset = elem.getAttribute('data-srcset') ? elem.getAttribute('data-srcset') : '';
                    if (!srcset) {
                        elem.onload = function() {
                            this.setAttribute('data-done', 'Loaded');
                            if (typeof w3speedup_after_iframe_img_load == 'function') {
                                w3speedup_after_iframe_img_load(this);
                            }
                        };
                        elem.onerror = function() {
                            if (this.getAttribute('data-mob-src') && w3_is_mobile && this.getAttribute(
                                    'data-src')) {
                                this.src = this.getAttribute('data-src');
                            }
                        };
                    }
                    elem.src = src;
                    if ((srcset != null) & (srcset != '')) {
                        elem.srcset = srcset;
                    }
                    delete elem.dataset.class;
                }
            }
        }
    }

    function w3_load_dynamic_blank_img(imgs) {
        for (var i = 0; i < imgs.length; i++) {
            if (imgs[i].getAttribute('data-class') == 'LazyLoad') {
                var blanksrc = imgs[i].src;
                if (typeof blanksrc != 'undefined' && blanksrc.indexOf('data:') == -1) {
                    if (imgs[i].getAttribute('width') != null && imgs[i].getAttribute('height') != null) {
                        var width = parseInt(imgs[i].getAttribute('width'));
                        var height = parseInt(imgs[i].getAttribute('height'));
                        getDataUrl(imgs[i], width, height);
                    }
                }
            }
        }
    }

    function convert_to_video_tag(imgs) {
        const t = imgs.length > 0 ? imgs[0] : '';
        if (t) {
            delete imgs[0];
            var newelem = document.createElement('video');
            var index;
            for (index = t.attributes.length - 1; index >= 0; --index) {
                newelem.attributes.setNamedItem(t.attributes[index].cloneNode());
            }
            newelem.innerHTML = t.innerHTML;
            t.parentNode.replaceChild(newelem, t);
            if (typeof newelem.getAttribute('data-poster') == 'string') {
                newelem.setAttribute('poster', newelem.getAttribute('data-poster'));
            }
            convert_to_video_tag(imgs);
        }
    }

    function lazyload_video(imgs, bodyRect, top, window_height, win_width) {
        for (var i = 0; i < imgs.length; i++) {
            var elem = imgs[i],
                elemRect = imgs[i].getBoundingClientRect();
            if (elemRect.top != 0 && elemRect.top - (window_height - bodyRect.top) < w3_lazy_load_by_px) {
                if (typeof imgs[i].getElementsByTagName('source')[0] == 'undefined') {
                    lazyload_video_source(imgs[i], top, window_height, win_width, elemRect, bodyRect);
                } else {
                    var sources = imgs[i].getElementsByTagName('source');
                    for (var j = 0; j < sources.length; j++) {
                        var source = sources[j];
                        lazyload_video_source(source, top, window_height, win_width, elemRect, bodyRect);
                    }
                }
            }
        }
    }

    function lazyload_video_source(source, top, window_height, win_width, elemRect, bodyRect) {
        if (typeof source != 'undefined' && source.getAttribute('data-class') == 'LazyLoad') {
            if (elemRect.top != 0 && elemRect.top - (window_height - bodyRect.top) < w3_lazy_load_by_px) {
                var src = source.getAttribute('data-src') ? source.getAttribute('data-src') : source.src;
                var srcset = source.getAttribute('data-srcset') ? source.getAttribute('data-srcset') : '';
                if ((source.srcset != null) & (source.srcset != '')) {
                    source.srcset = srcset;
                }
                if (typeof source.getElementsByTagName('source')[0] == 'undefined') {
                    if (source.tagName == 'SOURCE') {
                        source.parentNode.src = src;
                        source.parentNode.load();
                        if (source.parentNode.getAttribute('autoplay') !== null) {
                            source.parentNode.play();
                        }
                    } else {
                        source.src = src;
                        source.load();
                        if (source.getAttribute('autoplay') !== null) {
                            source.play();
                        }
                    }
                } else {
                    source.parentNode.src = src;
                }
                delete source.dataset.class;
                source.setAttribute('data-done', 'Loaded');
            }
        }
    }

    function lazyload_imgbgs(imgbgs, bodyRect, window_height, win_width) {
        for (var i = 0; i < imgbgs.length; i++) {
            var elem = imgbgs[i],
                elemRect = imgbgs[i].getBoundingClientRect(),
                offset = elemRect.top - bodyRect.top;
            if (elemRect.top - (window_height - bodyRect.top) < w3_lazy_load_by_px) {
                elem.classList.add('w3_bg');
            }
        }
    }

    function lazyloadimages(top) {
        var imgs = document.querySelectorAll('img[data-class=LazyLoad],source[data-srcset],video[data-src]');
        var imgbgs = document.querySelectorAll('div:not(.w3_js), section:not(.w3_js), iframelazy:not(.w3_js)');
        var sources = document.getElementsByTagName('video');
        var sources_audio = document.getElementsByTagName('audio');
        var bodyRect = document.body.getBoundingClientRect();
        var window_height = window.innerHeight;
        var win_width = screen.availWidth;
        if (typeof load_dynamic_img != 'undefined') {
            w3_load_dynamic_blank_img(imgs);
            delete load_dynamic_img;
        }
        if (
            w3_bglazyload &&
            ((bodyRect.top < 50 && bodyRectMain.top == 1) ||
                Math.abs(bodyRectMain.top) - Math.abs(bodyRect.top) < -50 ||
                Math.abs(bodyRectMain.top) - Math.abs(bodyRect.top) > 50)
        ) {
            bodyRectMain = bodyRect;
            lazyload_imgbgs(imgbgs, bodyRect, window_height, win_width);
        }
        lazyload_img(imgs, bodyRect, window_height, win_width);
        lazyload_video(sources, bodyRect, top, window_height, win_width);
        lazyload_video(sources_audio, bodyRect, top, window_height, win_width);
    }
    lazyloadimages(0);

    function lazyloadiframes(top) {
        var bodyRect = document.body.getBoundingClientRect();
        var window_height = window.innerHeight;
        var win_width = screen.availWidth;
        var iframes = document.querySelectorAll('iframelazy[data-class=LazyLoad]');
        lazyload_img(iframes, bodyRect, window_height, win_width);
    }
</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>



</html>

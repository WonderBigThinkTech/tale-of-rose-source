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


<style lang="en" type="text/css" class="dark-mode-native-dark-cloned">

    :root {

        --x-border-full: 1px;

        --x-border-block-end: 0 0 1px;

        --leu13r0: white;

        --x-border-radius-small: 3px;

        --x-border-radius-base: 5px;

        --x-border-radius-large: 10px;

        --x-border-radius-fully-rounded: 36px;

        --x-border-radius-none: 0;

        --x-border-width-base: 1px;

        --x-border-width-medium: 2px;

        --x-border-width-thick: 5px;

        --x-border-width-extra-thick: 10px;

        --swn0j0: black;

        --swn0j1: white;

        --swn0j3: white;

        --swn0j4: white;

        --swn0j5: black;

        --swn0j2: black;

        --swn0j6: black;

        --swn0j7: black;

        --swn0j8: black;

        --swn0ja: black;

        --swn0j9: black;

        --swn0jb: white;

        --swn0jc: white;

        --swn0jd: #dd1d1d;

        --swn0jf: white;

        --swn0jg: white;

        --swn0jh: white;

        --swn0ji: white;

        --swn0jj: white;

        --swn0jk: #e92020;

        --swn0je: #c81919;

        --swn0jl: black;

        --swn0jm: black;

        --swn0jn: black;

        --swn0jo: black;

        --swn0jp: white;

        --swn0jq: white;

        --swn0jr: white;

        --swn0js: black;

        --swn0jt: black;

        --swn0ju: black;

        --swn0jv: black;

        --swn0jw: white;

        --swn0jx: white;

        --swn0jy: white;

        --swn0jz: black;

        --swn0j10: black;

        --swn0j11: black;

        --swn0j12: black;

        --swn0j13: white;

        --swn0j14: white;

        --swn0j15: white;

        --swn0j16: black;

        --swn0j17: black;

        --swn0j18: black;

        --swn0j19: white;

        --swn0j1a: white;

        --swn0j1b: black;

        --swn0j1c: white;

        --swn0j1d: black;

        --swn0j1e: black;

        --swn0j1f: white;

        --swn0j1g: black;

        --swn0j1h: white;

        --swn0j1i: white;

        --swn0j1j: white;

        --swn0j1k: white;

        --swn0j1l: white;

        --swn0j1m: black;

        --swn0j1n: white;

        --x-primary-button-block-padding: var(--x-spacing-base);

        --x-primary-button-inline-padding: var(--x-spacing-base);

        --x-primary-button-border-width: var(--x-border-width-base);

        --x-secondary-button-block-padding: var(--x-spacing-base);

        --x-secondary-button-inline-padding: var(--x-spacing-base);

        --x-secondary-button-border-width: var(--x-border-width-base);

        --x-checkbox-size: calc((1.4rem * 18) / 14);

        --x-control-border-width: var(--x-border-width-base);

        --x-datepicker-min-column-size: 3.5rem;

        --x-datepicker-min-row-size: 3.5rem;

        --x-choice-list-group-spacing: 0;

        --x-option-list-block-spacing: 0;

        --x-option-list-block-padding: var(--x-spacing-large-100);

        --x-option-list-inline-padding: var(--x-spacing-large-100);

        --x-radio-size: calc((1.4rem * 18) / 14);

        --x-radio-large-size: calc((1.4rem * 22) / 14);

        --x-z-index-portal: 1000;

        --x-review-block-block-padding: var(--x-spacing-small-100);

        --x-review-block-inline-padding: var(--x-spacing-large-100);

        --x-global-typography-kerning: var(--_12e54cf3);

        --x-global-typography-line-size-default: var(--_12e54cf6);

        --x-global-typography-line-size-small: var(--_12e54cf7);

        --x-global-transform-direction-modifier: 1;

        --x-opacity-disabled: 0.5;

        --x-opacity-readonly: 0.7;

        --x-box-shadow-extra-small: 0 -1px 2px 0 black, 0 2px 4px 0 white0014;

        --x-box-shadow-small: 0 -1px 2px 0 black, 0 4px 8px 0 white0014, 0 0.5px 1px 0 black;

        --x-box-shadow-base: 0 -1px 2px 0 black, 0 8px 16px 0 white0014, 0 1.8px 3.8px 0 black, 0 0.5px 1px 0 rgba(0, 0, 0, .032);

        --x-box-shadow-large: 0 -1px 2px white0014, 0 24px 24px 0 white0014, 0 7.2px 7.2px 0 white000d, 0 3px 3px 0 black, 0 1.1px 1.1px 0 rgba(0, 0, 0, .028);

        --x-box-shadow-extra-large: 0 -2px 4px 0 white0014, 0 32px 32px 0 white0014, 0 11.7px 11.7px 0 black, 0 5.7px 5.7px 0 black, 0 2.8px 2.8px 0 black, 0 1.1px 1.1px 0 black;

        --x-spacing-small-500: 0.3rem;

        --x-spacing-small-400: 0.5rem;

        --x-spacing-small-300: 0.7rem;

        --x-spacing-small-200: 0.9rem;

        --x-spacing-small-100: 1.1rem;

        --x-spacing-base: 1.4rem;

        --x-spacing-large-100: 1.7rem;

        --x-spacing-large-200: 2.1rem;

        --x-spacing-large-300: 2.6rem;

        --x-spacing-large-400: 3.2rem;

        --x-spacing-large-500: 3.8rem;

        --x-spacing-large-600: 4.6rem;

        --x-spacing-extra-tight: 0.5rem;

        --x-spacing-tight: 0.9rem;

        --x-spacing-loose: 2.1rem;

        --x-spacing-extra-loose: 3.8rem;

        --x-duration-fast: 133.333ms;

        --x-duration-base: 200ms;

        --x-duration-slow: 300ms;

        --x-duration-slower: 450ms;

        --x-duration-slowest: 675ms;

        --x-duration-reduced-motion: 1ms;

        --x-timing-base: ease-in-out;

        --x-timing-ease-out: cubic-bezier(0.3, 0.5, 0.5, 1);

        --x-timing-linear: linear;

        --x-timing-spring: cubic-bezier(0.3, 0, 0, 1);

        --_12e54cf0: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";

        --x-typography-size-extra-small: 1rem;

        --x-typography-size-small: 1.2rem;

        --x-typography-size-default: 1.4rem;

        --x-typography-size-medium: 1.6rem;

        --x-typography-size-large: 1.9rem;

        --x-typography-size-extra-large: 2.1rem;

        --x-typography-size-extra-extra-large: 2.4rem;

        --_12e54cf1: normal;

        --_12e54cf2: italic;

        --_12e54cf3: normal;

        --_12e54cf4: 0.125em;

        --_12e54cf5: 0.16em;

        --_12e54cf6: 1.5;

        --_12e54cf7: 1.2;

        --x-typography-primary-fonts: var(--_12e54cf0);

        --x-typography-primary-weight-base: 400;

        --x-typography-primary-weight-bold: 600;

        --x-typography-secondary-fonts: var(--_12e54cf0);

        --x-typography-secondary-weight-base: 400;

        --x-typography-secondary-weight-bold: 600

    }



    *,

    :after,

    :before {

        box-sizing: border-box

    }



    body,

    html {

        height: 100%;

        margin: 0;

        width: 100%

    }

.sec-main-check{float: left;width: 100%;}

    html {

        font-size: 62.5%;

        -webkit-text-size-adjust: 100%;

        -moz-text-size-adjust: 100%;

        text-size-adjust: 100%

    }



    body {

        overflow-wrap: break-word;

        overflow-x: hidden;

        overflow-y: scroll;

        -webkit-font-smoothing: subpixel-antialiased

    }






    em,

    i {

        font-style: inherit

    }



    b,

    strong {

        font-weight: inherit

    }



    small {

        font-size: var(--x-typography-size-small)

    }



    address {

        font-style: normal

    }



    table {

        border-collapse: collapse;

        border-spacing: 0

    }



    td,

    th {

        font-weight: 400;

        padding: 0

    }



    img {

        border-style: none

    }



    figure {

        margin: 0

    }



    fieldset {

        margin: 0

    }



    fieldset,

    legend {

        border: 0;

        padding: 0

    }



    button,

    input,

    optgroup,

    select,

    textarea {

        -webkit-appearance: none;

        appearance: none;


        border: 0;

        color: inherit;

        font: inherit;

        line-height: inherit;

        margin: 0;

        padding: 0;

        -webkit-font-smoothing: inherit

    }



    option {

        background-color: #fff;

        color: #000

    }



    button,

    input {

        overflow: visible

    }



    button,

    select {

        text-transform: none

    }



    [type=button],

    [type=reset],

    [type=submit],

    button {

        -webkit-appearance: button;

        appearance: button;

        cursor: pointer;

        -webkit-tap-highlight-color: transparent;

        -webkit-touch-callout: none

    }



    [type=button]::-moz-focus-inner,

    [type=reset]::-moz-focus-inner,

    [type=submit]::-moz-focus-inner,

    button::-moz-focus-inner {

        border: none;

        padding: 0

    }



    [type=checkbox],

    [type=radio] {

        padding: 0

    }



    [hidden],

    template {

        display: none

    }



    iframe {

        border: 0

    }



    iframe,

    ol,

    ul {

        margin: 0;

        padding: 0

    }



    ol,

    ul {

        list-style: none

    }



    [dir=rtl] {

        --x-global-transform-direction-modifier: -1

    }



    @media screen and (prefers-reduced-motion:reduce) {

        :root {

            --x-duration-fast: var(--x-duration-reduced-motion);

            --x-duration-base: var(--x-duration-reduced-motion);

            --x-duration-slow: var(--x-duration-reduced-motion);

            --x-duration-slower: var(--x-duration-reduced-motion);

            --x-duration-slowest: var(--x-duration-reduced-motion)

        }

    }



    ._1fragem0 {

        height: var(--x-spacing-small-500);

        block-size: var(--x-spacing-small-500)

    }



    ._1fragem5 {

        height: var(--x-spacing-small-400);

        block-size: var(--x-spacing-small-400)

    }



    ._1fragema {

        height: var(--x-spacing-small-300);

        block-size: var(--x-spacing-small-300)

    }



    ._1fragemf {

        height: var(--x-spacing-small-200);

        block-size: var(--x-spacing-small-200)

    }



    ._1fragemk {

        height: var(--x-spacing-small-100);

        block-size: var(--x-spacing-small-100)

    }



    ._1fragemp {

        height: var(--x-spacing-base);

        block-size: var(--x-spacing-base)

    }



    ._1fragemu {

        height: var(--x-spacing-large-100);

        block-size: var(--x-spacing-large-100)

    }



    ._1fragemz {

        height: var(--x-spacing-large-200);

        block-size: var(--x-spacing-large-200)

    }



    ._1fragem14 {

        height: var(--x-spacing-large-300);

        block-size: var(--x-spacing-large-300)

    }



    ._1fragem19 {

        height: var(--x-spacing-large-400);

        block-size: var(--x-spacing-large-400)

    }



    ._1fragem1e {

        height: var(--x-spacing-large-500);

        block-size: var(--x-spacing-large-500)

    }



    ._1fragem1j {

        height: var(--x-spacing-large-600);

        block-size: var(--x-spacing-large-600)

    }



    ._1fragem1o {

        height: var(--x-spacing-extra-tight);

        block-size: var(--x-spacing-extra-tight)

    }



    ._1fragem1t {

        height: var(--x-spacing-loose);

        block-size: var(--x-spacing-loose)

    }



    ._1fragem1y {

        height: var(--x-spacing-tight);

        block-size: var(--x-spacing-tight)

    }



    ._1fragem23 {

        height: var(--x-spacing-extra-loose);

        block-size: var(--x-spacing-extra-loose)

    }



    ._1fragem28 {

        height: 0;

        block-size: 0

    }



    ._1fragem2d {

        height: 100%;

        block-size: 100%

    }



    ._1fragem2i {

        display: block

    }



    ._1fragem2n {

        display: contents

    }



    ._1fragem2s {

        display: flex

    }



    ._1fragem2x {

        display: inline

    }



    ._1fragem32 {

        display: inline-block

    }



    ._1fragem37 {

        display: inline-flex

    }



    ._1fragem3c {

        display: grid

    }



    ._1fragem3h {

        display: inline-grid

    }



    ._1fragem3m {

        display: none

    }



    ._1fragem3r {

        row-gap: var(--x-spacing-small-500)

    }



    ._1fragem3w {

        row-gap: var(--x-spacing-small-400)

    }



    ._1fragem41 {

        row-gap: var(--x-spacing-small-300)

    }



    ._1fragem46 {

        row-gap: var(--x-spacing-small-200)

    }



    ._1fragem4b {

        row-gap: var(--x-spacing-small-100)

    }



    ._1fragem4g {

        row-gap: var(--x-spacing-base)

    }



    ._1fragem4l {

        row-gap: var(--x-spacing-large-100)

    }



    ._1fragem4q {

        row-gap: var(--x-spacing-large-200)

    }



    ._1fragem4v {

        row-gap: var(--x-spacing-large-300)

    }



    ._1fragem50 {

        row-gap: var(--x-spacing-large-400)

    }



    ._1fragem55 {

        row-gap: var(--x-spacing-large-500)

    }



    ._1fragem5a {

        row-gap: var(--x-spacing-large-600)

    }



    ._1fragem5f {

        row-gap: var(--x-spacing-extra-tight)

    }



    ._1fragem5k {

        row-gap: var(--x-spacing-loose)

    }



    ._1fragem5p {

        row-gap: var(--x-spacing-tight)

    }



    ._1fragem5u {

        row-gap: var(--x-spacing-extra-loose)

    }



    ._1fragem5z {

        row-gap: 0

    }



    ._1fragem64 {

        column-gap: var(--x-spacing-small-500)

    }



    ._1fragem69 {

        column-gap: var(--x-spacing-small-400)

    }



    ._1fragem6e {

        column-gap: var(--x-spacing-small-300)

    }



    ._1fragem6j {

        column-gap: var(--x-spacing-small-200)

    }



    ._1fragem6o {

        column-gap: var(--x-spacing-small-100)

    }



    ._1fragem6t {

        column-gap: var(--x-spacing-base)

    }



    ._1fragem6y {

        column-gap: var(--x-spacing-large-100)

    }



    ._1fragem73 {

        column-gap: var(--x-spacing-large-200)

    }



    ._1fragem78 {

        column-gap: var(--x-spacing-large-300)

    }



    ._1fragem7d {

        column-gap: var(--x-spacing-large-400)

    }



    ._1fragem7i {

        column-gap: var(--x-spacing-large-500)

    }



    ._1fragem7n {

        column-gap: var(--x-spacing-large-600)

    }



    ._1fragem7s {

        column-gap: var(--x-spacing-extra-tight)

    }



    ._1fragem7x {

        column-gap: var(--x-spacing-loose)

    }



    ._1fragem82 {

        column-gap: var(--x-spacing-tight)

    }



    ._1fragem87 {

        column-gap: var(--x-spacing-extra-loose)

    }



    ._1fragem8c {

        column-gap: 0

    }



    [dir=ltr] ._1fragem8h {

        border-left: var(--x-border-width-base) none var(--x-default-color-border)

    }



    [dir=rtl] ._1fragem8h {

        border-right: var(--x-border-width-base) none var(--x-default-color-border)

    }



    ._1fragem8h {

        --_13qz35y0: 0px;

        border-inline-start: var(--x-border-width-base) none var(--x-default-color-border)

    }



    [dir=ltr] ._1fragem8m {

        border-left: var(--x-border-width-base) solid var(--x-default-color-border)

    }



    [dir=rtl] ._1fragem8m {

        border-right: var(--x-border-width-base) solid var(--x-default-color-border)

    }



    ._1fragem8m {

        --_13qz35y0: var(--x-border-width-base);

        border-inline-start: var(--x-border-width-base) solid var(--x-default-color-border)

    }



    [dir=ltr] ._1fragem8r {

        border-left: var(--x-border-width-base) dotted var(--x-default-color-border)

    }



    [dir=rtl] ._1fragem8r {

        border-right: var(--x-border-width-base) dotted var(--x-default-color-border)

    }



    ._1fragem8r {

        --_13qz35y0: var(--x-border-width-base);

        border-inline-start: var(--x-border-width-base) dotted var(--x-default-color-border)

    }



    [dir=ltr] ._1fragem8w {

        border-left: var(--x-border-width-base) dashed var(--x-default-color-border)

    }



    [dir=rtl] ._1fragem8w {

        border-right: var(--x-border-width-base) dashed var(--x-default-color-border)

    }



    ._1fragem8w {

        --_13qz35y0: var(--x-border-width-base);

        border-inline-start: var(--x-border-width-base) dashed var(--x-default-color-border)

    }



    [dir=ltr] ._1fragem91 {

        border-right: var(--x-border-width-base) none var(--x-default-color-border)

    }



    [dir=rtl] ._1fragem91 {

        border-left: var(--x-border-width-base) none var(--x-default-color-border)

    }



    ._1fragem91 {

        --_13qz35y1: 0px;

        border-inline-end: var(--x-border-width-base) none var(--x-default-color-border)

    }



    [dir=ltr] ._1fragem96 {

        border-right: var(--x-border-width-base) solid var(--x-default-color-border)

    }



    [dir=rtl] ._1fragem96 {

        border-left: var(--x-border-width-base) solid var(--x-default-color-border)

    }



    ._1fragem96 {

        --_13qz35y1: var(--x-border-width-base);

        border-inline-end: var(--x-border-width-base) solid var(--x-default-color-border)

    }



    [dir=ltr] ._1fragem9b {

        border-right: var(--x-border-width-base) dotted var(--x-default-color-border)

    }



    [dir=rtl] ._1fragem9b {

        border-left: var(--x-border-width-base) dotted var(--x-default-color-border)

    }



    ._1fragem9b {

        --_13qz35y1: var(--x-border-width-base);

        border-inline-end: var(--x-border-width-base) dotted var(--x-default-color-border)

    }



    [dir=ltr] ._1fragem9g {

        border-right: var(--x-border-width-base) dashed var(--x-default-color-border)

    }



    [dir=rtl] ._1fragem9g {

        border-left: var(--x-border-width-base) dashed var(--x-default-color-border)

    }



    ._1fragem9g {

        --_13qz35y1: var(--x-border-width-base);

        border-inline-end: var(--x-border-width-base) dashed var(--x-default-color-border)

    }



    ._1fragem9l {

        --_13qz35y2: 0px;

        border-block-start: var(--x-border-width-base) none var(--x-default-color-border);

        border-top: var(--x-border-width-base) none var(--x-default-color-border)

    }



    ._1fragem9q {

        border-block-start: var(--x-border-width-base) solid var(--x-default-color-border);

        border-top: var(--x-border-width-base) solid var(--x-default-color-border)

    }



    ._1fragem9q,

    ._1fragem9v {

        --_13qz35y2: var(--x-border-width-base)

    }



    ._1fragem9v {

        border-block-start: var(--x-border-width-base) dotted var(--x-default-color-border);

        border-top: var(--x-border-width-base) dotted var(--x-default-color-border)

    }



    ._1fragema0 {

        --_13qz35y2: var(--x-border-width-base);

        border-block-start: var(--x-border-width-base) dashed var(--x-default-color-border);

        border-top: var(--x-border-width-base) dashed var(--x-default-color-border)

    }



    ._1fragema5 {

        --_13qz35y3: 0px;

        border-block-end: var(--x-border-width-base) none var(--x-default-color-border);

        border-bottom: var(--x-border-width-base) none var(--x-default-color-border)

    }



    ._1fragemaa {

        border-block-end: var(--x-border-width-base) solid var(--x-default-color-border);

        border-bottom: var(--x-border-width-base) solid var(--x-default-color-border)

    }



    ._1fragemaa,

    ._1fragemaf {

        --_13qz35y3: var(--x-border-width-base)

    }



    ._1fragemaf {

        border-block-end: var(--x-border-width-base) dotted var(--x-default-color-border);

        border-bottom: var(--x-border-width-base) dotted var(--x-default-color-border)

    }



    ._1fragemak {

        --_13qz35y3: var(--x-border-width-base);

        border-block-end: var(--x-border-width-base) dashed var(--x-default-color-border);

        border-bottom: var(--x-border-width-base) dashed var(--x-default-color-border)

    }



    [dir=ltr] ._1fragemap {

        border-left-width: var(--x-border-width-base)

    }



    [dir=rtl] ._1fragemap {

        border-right-width: var(--x-border-width-base)

    }



    ._1fragemap {

        --_13qz35y0: var(--x-border-width-base);

        border-inline-start-width: var(--x-border-width-base)

    }



    [dir=ltr] ._1fragemau {

        border-left-width: var(--x-border-width-medium)

    }



    [dir=rtl] ._1fragemau {

        border-right-width: var(--x-border-width-medium)

    }



    ._1fragemau {

        --_13qz35y0: var(--x-border-width-medium);

        border-inline-start-width: var(--x-border-width-medium)

    }



    [dir=ltr] ._1fragemaz {

        border-left-width: var(--x-border-width-thick)

    }



    [dir=rtl] ._1fragemaz {

        border-right-width: var(--x-border-width-thick)

    }



    ._1fragemaz {

        --_13qz35y0: var(--x-border-width-thick);

        border-inline-start-width: var(--x-border-width-thick)

    }



    [dir=ltr] ._1fragemb4 {

        border-left-width: var(--x-border-width-extra-thick)

    }



    [dir=rtl] ._1fragemb4 {

        border-right-width: var(--x-border-width-extra-thick)

    }



    ._1fragemb4 {

        --_13qz35y0: var(--x-border-width-extra-thick);

        border-inline-start-width: var(--x-border-width-extra-thick)

    }



    [dir=ltr] ._1fragemb9 {

        border-left-width: 0

    }



    [dir=rtl] ._1fragemb9 {

        border-right-width: 0

    }



    ._1fragemb9 {

        --_13qz35y0: 0;

        border-inline-start-width: 0

    }



    [dir=ltr] ._1fragembe {

        border-right-width: var(--x-border-width-base)

    }



    [dir=rtl] ._1fragembe {

        border-left-width: var(--x-border-width-base)

    }



    ._1fragembe {

        --_13qz35y1: var(--x-border-width-base);

        border-inline-end-width: var(--x-border-width-base)

    }



    [dir=ltr] ._1fragembj {

        border-right-width: var(--x-border-width-medium)

    }



    [dir=rtl] ._1fragembj {

        border-left-width: var(--x-border-width-medium)

    }



    ._1fragembj {

        --_13qz35y1: var(--x-border-width-medium);

        border-inline-end-width: var(--x-border-width-medium)

    }



    [dir=ltr] ._1fragembo {

        border-right-width: var(--x-border-width-thick)

    }



    [dir=rtl] ._1fragembo {

        border-left-width: var(--x-border-width-thick)

    }



    ._1fragembo {

        --_13qz35y1: var(--x-border-width-thick);

        border-inline-end-width: var(--x-border-width-thick)

    }



    [dir=ltr] ._1fragembt {

        border-right-width: var(--x-border-width-extra-thick)

    }



    [dir=rtl] ._1fragembt {

        border-left-width: var(--x-border-width-extra-thick)

    }



    ._1fragembt {

        --_13qz35y1: var(--x-border-width-extra-thick);

        border-inline-end-width: var(--x-border-width-extra-thick)

    }



    [dir=ltr] ._1fragemby {

        border-right-width: 0

    }



    [dir=rtl] ._1fragemby {

        border-left-width: 0

    }



    ._1fragemby {

        --_13qz35y1: 0;

        border-inline-end-width: 0

    }



    ._1fragemc3 {

        --_13qz35y2: var(--x-border-width-base);

        border-block-start-width: var(--x-border-width-base);

        border-top-width: var(--x-border-width-base)

    }



    ._1fragemc8 {

        --_13qz35y2: var(--x-border-width-medium);

        border-block-start-width: var(--x-border-width-medium);

        border-top-width: var(--x-border-width-medium)

    }



    ._1fragemcd {

        --_13qz35y2: var(--x-border-width-thick);

        border-block-start-width: var(--x-border-width-thick);

        border-top-width: var(--x-border-width-thick)

    }



    ._1fragemci {

        --_13qz35y2: var(--x-border-width-extra-thick);

        border-block-start-width: var(--x-border-width-extra-thick);

        border-top-width: var(--x-border-width-extra-thick)

    }



    ._1fragemcn {

        --_13qz35y2: 0;

        border-block-start-width: 0;

        border-top-width: 0

    }



    ._1fragemcs {

        --_13qz35y3: var(--x-border-width-base);

        border-block-end-width: var(--x-border-width-base);

        border-bottom-width: var(--x-border-width-base)

    }



    ._1fragemcx {

        --_13qz35y3: var(--x-border-width-medium);

        border-block-end-width: var(--x-border-width-medium);

        border-bottom-width: var(--x-border-width-medium)

    }



    ._1fragemd2 {

        --_13qz35y3: var(--x-border-width-thick);

        border-block-end-width: var(--x-border-width-thick);

        border-bottom-width: var(--x-border-width-thick)

    }



    ._1fragemd7 {

        --_13qz35y3: var(--x-border-width-extra-thick);

        border-block-end-width: var(--x-border-width-extra-thick);

        border-bottom-width: var(--x-border-width-extra-thick)

    }



    ._1fragemdc {

        --_13qz35y3: 0;

        border-block-end-width: 0;

        border-bottom-width: 0

    }



    ._1fragemdh {

        padding-bottom: var(--x-spacing-small-500);

        padding-block-end: var(--x-spacing-small-500)

    }



    ._1fragemdm {

        padding-bottom: var(--x-spacing-small-400);

        padding-block-end: var(--x-spacing-small-400)

    }



    ._1fragemdr {

        padding-bottom: var(--x-spacing-small-300);

        padding-block-end: var(--x-spacing-small-300)

    }



    ._1fragemdw {

        padding-bottom: var(--x-spacing-small-200);

        padding-block-end: var(--x-spacing-small-200)

    }



    ._1frageme1 {

        padding-bottom: var(--x-spacing-small-100);

        padding-block-end: var(--x-spacing-small-100)

    }



    ._1frageme6 {

        padding-bottom: var(--x-spacing-base);

        padding-block-end: var(--x-spacing-base)

    }



    ._1fragemeb {

        padding-bottom: var(--x-spacing-large-100);

        padding-block-end: var(--x-spacing-large-100)

    }



    ._1fragemeg {

        padding-bottom: var(--x-spacing-large-200);

        padding-block-end: var(--x-spacing-large-200)

    }



    ._1fragemel {

        padding-bottom: var(--x-spacing-large-300);

        padding-block-end: var(--x-spacing-large-300)

    }



    ._1fragemeq {

        padding-bottom: var(--x-spacing-large-400);

        padding-block-end: var(--x-spacing-large-400)

    }



    ._1fragemev {

        padding-bottom: var(--x-spacing-large-500);

        padding-block-end: var(--x-spacing-large-500)

    }



    ._1fragemf0 {

        padding-bottom: var(--x-spacing-large-600);

        padding-block-end: var(--x-spacing-large-600)

    }



    ._1fragemf5 {

        padding-bottom: var(--x-spacing-extra-tight);

        padding-block-end: var(--x-spacing-extra-tight)

    }



    ._1fragemfa {

        padding-bottom: var(--x-spacing-loose);

        padding-block-end: var(--x-spacing-loose)

    }



    ._1fragemff {

        padding-bottom: var(--x-spacing-tight);

        padding-block-end: var(--x-spacing-tight)

    }



    ._1fragemfk {

        padding-bottom: var(--x-spacing-extra-loose);

        padding-block-end: var(--x-spacing-extra-loose)

    }



    ._1fragemfp {

        padding-bottom: 0;

        padding-block-end: 0

    }



    ._1fragemfu {

        padding-top: var(--x-spacing-small-500);

        padding-block-start: var(--x-spacing-small-500)

    }



    ._1fragemfz {

        padding-top: var(--x-spacing-small-400);

        padding-block-start: var(--x-spacing-small-400)

    }



    ._1fragemg4 {

        padding-top: var(--x-spacing-small-300);

        padding-block-start: var(--x-spacing-small-300)

    }



    ._1fragemg9 {

        padding-top: var(--x-spacing-small-200);

        padding-block-start: var(--x-spacing-small-200)

    }



    ._1fragemge {

        padding-top: var(--x-spacing-small-100);

        padding-block-start: var(--x-spacing-small-100)

    }



    ._1fragemgj {

        padding-top: var(--x-spacing-base);

        padding-block-start: var(--x-spacing-base)

    }



    ._1fragemgo {

        padding-top: var(--x-spacing-large-100);

        padding-block-start: var(--x-spacing-large-100)

    }



    ._1fragemgt {

        padding-top: var(--x-spacing-large-200);

        padding-block-start: var(--x-spacing-large-200)

    }



    ._1fragemgy {

        padding-top: var(--x-spacing-large-300);

        padding-block-start: var(--x-spacing-large-300)

    }



    ._1fragemh3 {

        padding-top: var(--x-spacing-large-400);

        padding-block-start: var(--x-spacing-large-400)

    }



    ._1fragemh8 {

        padding-top: var(--x-spacing-large-500);

        padding-block-start: var(--x-spacing-large-500)

    }



    ._1fragemhd {

        padding-top: var(--x-spacing-large-600);

        padding-block-start: var(--x-spacing-large-600)

    }



    ._1fragemhi {

        padding-top: var(--x-spacing-extra-tight);

        padding-block-start: var(--x-spacing-extra-tight)

    }



    ._1fragemhn {

        padding-top: var(--x-spacing-loose);

        padding-block-start: var(--x-spacing-loose)

    }



    ._1fragemhs {

        padding-top: var(--x-spacing-tight);

        padding-block-start: var(--x-spacing-tight)

    }



    ._1fragemhx {

        padding-top: var(--x-spacing-extra-loose);

        padding-block-start: var(--x-spacing-extra-loose)

    }



    ._1fragemi2 {

        padding-top: 0;

        padding-block-start: 0

    }



    [dir=ltr] ._1fragemi7 {

        padding-right: var(--x-spacing-small-500)

    }



    [dir=rtl] ._1fragemi7 {

        padding-left: var(--x-spacing-small-500)

    }



    ._1fragemi7 {

        padding-inline-end: var(--x-spacing-small-500)

    }



    [dir=ltr] ._1fragemic {

        padding-right: var(--x-spacing-small-400)

    }



    [dir=rtl] ._1fragemic {

        padding-left: var(--x-spacing-small-400)

    }



    ._1fragemic {

        padding-inline-end: var(--x-spacing-small-400)

    }



    [dir=ltr] ._1fragemih {

        padding-right: var(--x-spacing-small-300)

    }



    [dir=rtl] ._1fragemih {

        padding-left: var(--x-spacing-small-300)

    }



    ._1fragemih {

        padding-inline-end: var(--x-spacing-small-300)

    }



    [dir=ltr] ._1fragemim {

        padding-right: var(--x-spacing-small-200)

    }



    [dir=rtl] ._1fragemim {

        padding-left: var(--x-spacing-small-200)

    }



    ._1fragemim {

        padding-inline-end: var(--x-spacing-small-200)

    }



    [dir=ltr] ._1fragemir {

        padding-right: var(--x-spacing-small-100)

    }



    [dir=rtl] ._1fragemir {

        padding-left: var(--x-spacing-small-100)

    }



    ._1fragemir {

        padding-inline-end: var(--x-spacing-small-100)

    }



    [dir=ltr] ._1fragemiw {

        padding-right: var(--x-spacing-base)

    }



    [dir=rtl] ._1fragemiw {

        padding-left: var(--x-spacing-base)

    }



    ._1fragemiw {

        padding-inline-end: var(--x-spacing-base)

    }



    [dir=ltr] ._1fragemj1 {

        padding-right: var(--x-spacing-large-100)

    }



    [dir=rtl] ._1fragemj1 {

        padding-left: var(--x-spacing-large-100)

    }



    ._1fragemj1 {

        padding-inline-end: var(--x-spacing-large-100)

    }



    [dir=ltr] ._1fragemj6 {

        padding-right: var(--x-spacing-large-200)

    }



    [dir=rtl] ._1fragemj6 {

        padding-left: var(--x-spacing-large-200)

    }



    ._1fragemj6 {

        padding-inline-end: var(--x-spacing-large-200)

    }



    [dir=ltr] ._1fragemjb {

        padding-right: var(--x-spacing-large-300)

    }



    [dir=rtl] ._1fragemjb {

        padding-left: var(--x-spacing-large-300)

    }



    ._1fragemjb {

        padding-inline-end: var(--x-spacing-large-300)

    }



    [dir=ltr] ._1fragemjg {

        padding-right: var(--x-spacing-large-400)

    }



    [dir=rtl] ._1fragemjg {

        padding-left: var(--x-spacing-large-400)

    }



    ._1fragemjg {

        padding-inline-end: var(--x-spacing-large-400)

    }



    [dir=ltr] ._1fragemjl {

        padding-right: var(--x-spacing-large-500)

    }



    [dir=rtl] ._1fragemjl {

        padding-left: var(--x-spacing-large-500)

    }



    ._1fragemjl {

        padding-inline-end: var(--x-spacing-large-500)

    }



    [dir=ltr] ._1fragemjq {

        padding-right: var(--x-spacing-large-600)

    }



    [dir=rtl] ._1fragemjq {

        padding-left: var(--x-spacing-large-600)

    }



    ._1fragemjq {

        padding-inline-end: var(--x-spacing-large-600)

    }



    [dir=ltr] ._1fragemjv {

        padding-right: var(--x-spacing-extra-tight)

    }



    [dir=rtl] ._1fragemjv {

        padding-left: var(--x-spacing-extra-tight)

    }



    ._1fragemjv {

        padding-inline-end: var(--x-spacing-extra-tight)

    }



    [dir=ltr] ._1fragemk0 {

        padding-right: var(--x-spacing-loose)

    }



    [dir=rtl] ._1fragemk0 {

        padding-left: var(--x-spacing-loose)

    }



    ._1fragemk0 {

        padding-inline-end: var(--x-spacing-loose)

    }



    [dir=ltr] ._1fragemk5 {

        padding-right: var(--x-spacing-tight)

    }



    [dir=rtl] ._1fragemk5 {

        padding-left: var(--x-spacing-tight)

    }



    ._1fragemk5 {

        padding-inline-end: var(--x-spacing-tight)

    }



    [dir=ltr] ._1fragemka {

        padding-right: var(--x-spacing-extra-loose)

    }



    [dir=rtl] ._1fragemka {

        padding-left: var(--x-spacing-extra-loose)

    }



    ._1fragemka {

        padding-inline-end: var(--x-spacing-extra-loose)

    }



    [dir=ltr] ._1fragemkf {

        padding-right: 0

    }



    [dir=rtl] ._1fragemkf {

        padding-left: 0

    }



    ._1fragemkf {

        padding-inline-end: 0

    }



    [dir=ltr] ._1fragemkk {

        padding-left: var(--x-spacing-small-500)

    }



    [dir=rtl] ._1fragemkk {

        padding-right: var(--x-spacing-small-500)

    }



    ._1fragemkk {

        padding-inline-start: var(--x-spacing-small-500)

    }



    [dir=ltr] ._1fragemkp {

        padding-left: var(--x-spacing-small-400)

    }



    [dir=rtl] ._1fragemkp {

        padding-right: var(--x-spacing-small-400)

    }



    ._1fragemkp {

        padding-inline-start: var(--x-spacing-small-400)

    }



    [dir=ltr] ._1fragemku {

        padding-left: var(--x-spacing-small-300)

    }



    [dir=rtl] ._1fragemku {

        padding-right: var(--x-spacing-small-300)

    }



    ._1fragemku {

        padding-inline-start: var(--x-spacing-small-300)

    }



    [dir=ltr] ._1fragemkz {

        padding-left: var(--x-spacing-small-200)

    }



    [dir=rtl] ._1fragemkz {

        padding-right: var(--x-spacing-small-200)

    }



    ._1fragemkz {

        padding-inline-start: var(--x-spacing-small-200)

    }



    [dir=ltr] ._1frageml4 {

        padding-left: var(--x-spacing-small-100)

    }



    [dir=rtl] ._1frageml4 {

        padding-right: var(--x-spacing-small-100)

    }



    ._1frageml4 {

        padding-inline-start: var(--x-spacing-small-100)

    }



    [dir=ltr] ._1frageml9 {

        padding-left: var(--x-spacing-base)

    }



    [dir=rtl] ._1frageml9 {

        padding-right: var(--x-spacing-base)

    }



    ._1frageml9 {

        padding-inline-start: var(--x-spacing-base)

    }



    [dir=ltr] ._1fragemle {

        padding-left: var(--x-spacing-large-100)

    }



    [dir=rtl] ._1fragemle {

        padding-right: var(--x-spacing-large-100)

    }



    ._1fragemle {

        padding-inline-start: var(--x-spacing-large-100)

    }



    [dir=ltr] ._1fragemlj {

        padding-left: var(--x-spacing-large-200)

    }



    [dir=rtl] ._1fragemlj {

        padding-right: var(--x-spacing-large-200)

    }



    ._1fragemlj {

        padding-inline-start: var(--x-spacing-large-200)

    }



    [dir=ltr] ._1fragemlo {

        padding-left: var(--x-spacing-large-300)

    }



    [dir=rtl] ._1fragemlo {

        padding-right: var(--x-spacing-large-300)

    }



    ._1fragemlo {

        padding-inline-start: var(--x-spacing-large-300)

    }



    [dir=ltr] ._1fragemlt {

        padding-left: var(--x-spacing-large-400)

    }



    [dir=rtl] ._1fragemlt {

        padding-right: var(--x-spacing-large-400)

    }



    ._1fragemlt {

        padding-inline-start: var(--x-spacing-large-400)

    }



    [dir=ltr] ._1fragemly {

        padding-left: var(--x-spacing-large-500)

    }



    [dir=rtl] ._1fragemly {

        padding-right: var(--x-spacing-large-500)

    }



    ._1fragemly {

        padding-inline-start: var(--x-spacing-large-500)

    }



    [dir=ltr] ._1fragemm3 {

        padding-left: var(--x-spacing-large-600)

    }



    [dir=rtl] ._1fragemm3 {

        padding-right: var(--x-spacing-large-600)

    }



    ._1fragemm3 {

        padding-inline-start: var(--x-spacing-large-600)

    }



    [dir=ltr] ._1fragemm8 {

        padding-left: var(--x-spacing-extra-tight)

    }



    [dir=rtl] ._1fragemm8 {

        padding-right: var(--x-spacing-extra-tight)

    }



    ._1fragemm8 {

        padding-inline-start: var(--x-spacing-extra-tight)

    }



    [dir=ltr] ._1fragemmd {

        padding-left: var(--x-spacing-loose)

    }



    [dir=rtl] ._1fragemmd {

        padding-right: var(--x-spacing-loose)

    }



    ._1fragemmd {

        padding-inline-start: var(--x-spacing-loose)

    }



    [dir=ltr] ._1fragemmi {

        padding-left: var(--x-spacing-tight)

    }



    [dir=rtl] ._1fragemmi {

        padding-right: var(--x-spacing-tight)

    }



    ._1fragemmi {

        padding-inline-start: var(--x-spacing-tight)

    }



    [dir=ltr] ._1fragemmn {

        padding-left: var(--x-spacing-extra-loose)

    }



    [dir=rtl] ._1fragemmn {

        padding-right: var(--x-spacing-extra-loose)

    }



    ._1fragemmn {

        padding-inline-start: var(--x-spacing-extra-loose)

    }



    [dir=ltr] ._1fragemms {

        padding-left: 0

    }



    [dir=rtl] ._1fragemms {

        padding-right: 0

    }



    ._1fragemms {

        padding-inline-start: 0

    }



    ._1fragemmx {

        max-height: 100%;

        max-block-size: 100%

    }



    ._1fragemn2 {

        max-width: 100%;

        max-inline-size: 100%

    }



    ._1fragemn7 {

        min-block-size: 100%;

        min-height: 100%

    }



    ._1fragemnc {

        min-block-size: 100vh;

        min-height: 100vh

    }



    ._1fragemnh {

        object-fit: contain

    }



    ._1fragemnm {

        object-fit: cover

    }



    ._1fragemnr {

        position: absolute

    }



    ._1fragemnw {

        position: fixed

    }



    ._1fragemo1 {

        position: relative

    }



    ._1fragemo6 {

        position: static

    }



    ._1fragemob {

        position: sticky

    }



    ._1fragemog {

        grid-auto-flow: column

    }



    ._1fragemol {

        grid-auto-flow: row

    }



    ._1fragemoq {

        align-content: center

    }



    ._1fragemor {

        align-content: flex-end

    }



    ._1fragemos {

        align-content: flex-start

    }



    ._1fragemot {

        align-items: baseline

    }



    ._1fragemou {

        align-items: center

    }



    ._1fragemov {

        align-items: safe center

    }



    ._1fragemow {

        align-items: flex-end

    }



    ._1fragemox {

        align-items: flex-start

    }



    ._1fragemoy {

        align-items: stretch

    }



    ._1fragemoz {

        align-self: baseline

    }



    ._1fragemp0 {

        align-self: center

    }



    ._1fragemp1 {

        align-self: flex-start

    }



    ._1fragemp2 {

        background-fit: contain

    }



    ._1fragemp3 {

        background-fit: cover

    }



    ._1fragemp4 {

        background-position: bottom

    }



    ._1fragemp5 {

        background-position: 50%

    }



    ._1fragemp6 {

        background-position: 0

    }



    ._1fragemp7 {

        background-position: 100%

    }



    ._1fragemp8 {

        background-position: top

    }



    ._1fragemp9 {

        background-repeat: no-repeat

    }



    ._1fragempa {

        background-repeat: repeat

    }



    ._1fragempb {

        box-shadow: none

    }



    ._1fragempc {

        box-shadow: var(--x-box-shadow-extra-small)

    }



    ._1fragempd {

        box-shadow: var(--x-box-shadow-small)

    }



    ._1fragempe {

        box-shadow: var(--x-box-shadow-base)

    }



    ._1fragempf {

        box-shadow: var(--x-box-shadow-large)

    }



    ._1fragempg {

        box-shadow: var(--x-box-shadow-extra-large)

    }



    ._1fragemph {

        color: var(--x-default-color-accent)

    }



    ._1fragempi {

        color: var(--x-default-color-critical)

    }



    ._1fragempj {

        color: var(--x-default-color-decorative)

    }



    ._1fragempk {

        color: var(--x-default-color-info)

    }



    ._1fragempl {

        color: var(--x-default-color-success)

    }



    ._1fragempm {

        color: var(--x-default-color-warning)

    }



    ._1fragempo {

        --swn0je0: var(--swn0j1o);

        --swn0je1: var(--swn0j1p);

        --swn0je2: var(--swn0j1q);

        --swn0je3: var(--swn0j1r);

        --swn0je4: var(--swn0j1s);

        --swn0je5: var(--swn0j1t);

        --swn0je6: var(--swn0j1u);

        --swn0je7: var(--swn0j1v);

        --swn0je8: var(--swn0j1w);

        --swn0je9: var(--swn0j1x);

        --swn0jea: var(--swn0j1y);

        --swn0jeb: var(--swn0j1z);

        --swn0jec: var(--swn0j20);

        --swn0jed: var(--swn0j21);

        --swn0jee: var(--swn0j22);

        --swn0jef: var(--swn0j23);

        --swn0jeg: var(--swn0j24);

        --swn0jeh: var(--swn0j25);

        --swn0jei: var(--swn0j26);

        --swn0jej: var(--swn0j27);

        --swn0jek: var(--swn0j28);

        --swn0jel: var(--swn0j29);

        --swn0jem: var(--swn0j2a);

        --swn0jet: var(--swn0j2b);

        --swn0jeu: var(--swn0j2c);

        --swn0jev: var(--swn0j2d);

        --swn0jew: var(--swn0j2e);

        --swn0jex: var(--swn0j2f);

        --swn0jey: var(--swn0j2g);

        --swn0jez: var(--swn0j2h);

        --swn0jf0: var(--swn0j2i);

        --swn0jf1: var(--swn0j2j);

        --swn0jf2: var(--swn0j2k);

        --swn0jf3: var(--swn0j2l);

        --swn0jf4: var(--swn0j2m);

        --swn0jf5: var(--swn0j2n);

        --swn0jf6: var(--swn0j2o);

        --swn0jf7: var(--swn0j2p);

        --swn0jf8: var(--swn0j2q);

        --swn0jf9: var(--swn0j2r);

        --swn0jfa: var(--swn0j2s);

        --swn0jfb: var(--swn0j2t);

        --swn0jfc: var(--swn0j2u);

        --swn0jfd: var(--swn0j2v);

        --swn0jfe: var(--swn0j2w);

        --swn0jff: var(--swn0j2x);

        --swn0jfg: var(--swn0j2y);

        --swn0jfh: var(--swn0j2z);

        --swn0jfi: var(--swn0j30);

        --swn0jfj: var(--swn0j31);

        --swn0jfk: var(--swn0j32);

        --swn0jfl: var(--swn0j33);

        --swn0jfm: var(--swn0j34);

        --swn0jfn: var(--swn0j35);

        --swn0jfo: var(--swn0j36);

        --swn0jfp: var(--swn0j37);

        --swn0jfq: var(--swn0j38);

        --swn0jfr: var(--swn0j39);

        --swn0jfs: var(--swn0j3a);

        --swn0jft: var(--swn0j3b);

        --swn0jfu: var(--swn0j3c);

        --swn0jfv: var(--swn0j3d);

        --swn0jfw: var(--swn0j3e);

        --swn0jfx: var(--swn0j3f);

        --swn0jfy: var(--swn0j3g);

        --swn0jfz: var(--swn0j3h);

        --swn0jg0: var(--swn0j3i);

        --swn0jg1: var(--swn0j3j);

        --swn0jg2: var(--swn0j3k);

        --swn0jg3: var(--swn0j3l);

        --swn0jg4: var(--swn0j3m);

        --swn0jg5: var(--swn0j3n);

        --swn0jg6: var(--swn0j3o);

        --swn0jg7: var(--swn0j3p);

        --swn0jg8: var(--swn0j3q);

        --swn0jg9: var(--swn0j3r);

        --swn0jga: var(--swn0j3s);

        --swn0jgb: var(--swn0j3t);

        --swn0jgc: var(--swn0j3u);

        --swn0jgd: var(--swn0j3v);

        --swn0jge: var(--swn0j3w);

        --swn0jgf: var(--swn0j3x);

        --swn0jgg: var(--swn0j3y);

        --swn0jgh: var(--swn0j3z);

        --swn0jgi: var(--swn0j40);

        --swn0jgj: var(--swn0j41);

        --swn0jgk: var(--swn0j42);

        --swn0jgl: var(--swn0j43);

        --swn0jgm: var(--swn0j44);

        --swn0jgn: var(--swn0j45);

        --swn0jgo: var(--swn0j46);

        --swn0jgp: var(--swn0j47);

        --swn0jgq: var(--swn0j48);

        --swn0jgr: var(--swn0j49);

        --swn0jgs: var(--swn0j4a);

        --swn0jgt: var(--swn0j4b);

        --swn0jgu: var(--swn0j4c);

        --swn0jgv: var(--swn0j4d);

        --swn0jgw: var(--swn0j4e);

        --swn0jgx: var(--swn0j4f);

        --swn0jgy: var(--swn0j4g);

        --swn0jgz: var(--swn0j4h);

        --swn0jh0: var(--swn0j4i);

        --swn0jh1: var(--swn0j4j);

        --swn0jh2: var(--swn0j4k);

        --swn0jh3: var(--swn0j4l);

        --swn0jh4: var(--swn0j4m);

        --swn0jh5: var(--swn0j4n);

        --swn0jh6: var(--swn0j4o);

        --swn0jh7: var(--swn0j4p);

        --swn0jh8: var(--swn0j4q)

    }



    ._1fragempp {

        --swn0je0: var(--swn0j1i);

        --swn0je1: var(--swn0j4s);

        --swn0je2: var(--swn0j1k);

        --swn0je3: var(--swn0j4u);

        --swn0je4: var(--swn0j4v);

        --swn0je5: var(--swn0j4w);

        --swn0je6: var(--swn0j4x);

        --swn0je7: var(--swn0j4y);

        --swn0je8: var(--swn0j4z);

        --swn0je9: var(--swn0j50);

        --swn0jea: var(--swn0j51);

        --swn0jeb: var(--swn0j52);

        --swn0jec: var(--swn0j53);

        --swn0jed: var(--swn0j1j);

        --swn0jee: var(--swn0j55);

        --swn0jef: var(--swn0j56);

        --swn0jeg: var(--swn0j1l);

        --swn0jeh: var(--swn0j1m);

        --swn0jei: var(--swn0j1n);

        --swn0jej: var(--swn0j5a);

        --swn0jek: var(--swn0j5b);

        --swn0jel: var(--swn0j5c);

        --swn0jem: var(--swn0j5d);

        --swn0jet: var(--swn0j5e);

        --swn0jeu: var(--swn0j5f);

        --swn0jev: var(--swn0j5g);

        --swn0jew: var(--swn0j5h);

        --swn0jex: var(--swn0j5i);

        --swn0jey: var(--swn0j5j);

        --swn0jez: var(--swn0j5k);

        --swn0jf0: var(--swn0j5l);

        --swn0jf1: var(--swn0j5m);

        --swn0jf2: var(--swn0j5n);

        --swn0jf3: var(--swn0j5o);

        --swn0jf4: var(--swn0j5p);

        --swn0jf5: var(--swn0j5q);

        --swn0jf6: var(--swn0j5r);

        --swn0jf7: var(--swn0j5s);

        --swn0jf8: var(--swn0j5t);

        --swn0jf9: var(--swn0j5u);

        --swn0jfa: var(--swn0j5v);

        --swn0jfb: var(--swn0j5w);

        --swn0jfc: var(--swn0j5x);

        --swn0jfd: var(--swn0j5y);

        --swn0jfe: var(--swn0j5z);

        --swn0jff: var(--swn0j60);

        --swn0jfg: var(--swn0j61);

        --swn0jfh: var(--swn0j62);

        --swn0jfi: var(--swn0j63);

        --swn0jfj: var(--swn0j64);

        --swn0jfk: var(--swn0j65);

        --swn0jfl: var(--swn0j66);

        --swn0jfm: var(--swn0j67);

        --swn0jfn: var(--swn0j68);

        --swn0jfo: var(--swn0j69);

        --swn0jfp: var(--swn0j6a);

        --swn0jfq: var(--swn0j6b);

        --swn0jfr: var(--swn0j6c);

        --swn0jfs: var(--swn0j6d);

        --swn0jft: var(--swn0j6e);

        --swn0jfu: var(--swn0j6f);

        --swn0jfv: var(--swn0j6g);

        --swn0jfw: var(--swn0j6h);

        --swn0jfx: var(--swn0j6i);

        --swn0jfy: var(--swn0j6j);

        --swn0jfz: var(--swn0j6k);

        --swn0jg0: var(--swn0j6l);

        --swn0jg1: var(--swn0j6m);

        --swn0jg2: var(--swn0j6n);

        --swn0jg3: var(--swn0j6o);

        --swn0jg4: var(--swn0j6p);

        --swn0jg5: var(--swn0j6q);

        --swn0jg6: var(--swn0j6r);

        --swn0jg7: var(--swn0j6s);

        --swn0jg8: var(--swn0j6t);

        --swn0jg9: var(--swn0j6u);

        --swn0jga: var(--swn0j6v);

        --swn0jgb: var(--swn0j6w);

        --swn0jgc: var(--swn0j6x);

        --swn0jgd: var(--swn0j6y);

        --swn0jge: var(--swn0j6z);

        --swn0jgf: var(--swn0j70);

        --swn0jgg: var(--swn0j71);

        --swn0jgh: var(--swn0j72);

        --swn0jgi: var(--swn0j73);

        --swn0jgj: var(--swn0j74);

        --swn0jgk: var(--swn0j75);

        --swn0jgl: var(--swn0j76);

        --swn0jgm: var(--swn0j77);

        --swn0jgn: var(--swn0j78);

        --swn0jgo: var(--swn0j79);

        --swn0jgp: var(--swn0j7a);

        --swn0jgq: var(--swn0j7b);

        --swn0jgr: var(--swn0j7c);

        --swn0jgs: var(--swn0j7d);

        --swn0jgt: var(--swn0j7e);

        --swn0jgu: var(--swn0j7f);

        --swn0jgv: var(--swn0j7g);

        --swn0jgw: var(--swn0j7h);

        --swn0jgx: var(--swn0j7i);

        --swn0jgy: var(--swn0j7j);

        --swn0jgz: var(--swn0j7k);

        --swn0jh0: var(--swn0j7l);

        --swn0jh1: var(--swn0j7m);

        --swn0jh2: var(--swn0j7n);

        --swn0jh3: var(--swn0j7o);

        --swn0jh4: var(--swn0j7p);

        --swn0jh5: var(--swn0j7q);

        --swn0jh6: var(--swn0j7r);

        --swn0jh7: var(--swn0j7s);

        --swn0jh8: var(--swn0j7t)

    }



    ._1fragempq {

        --swn0je0: var(--swn0j7u);

        --swn0je1: var(--swn0j7v);

        --swn0je2: var(--swn0j7w);

        --swn0je3: var(--swn0j7x);

        --swn0je4: var(--swn0j7y);

        --swn0je5: var(--swn0j7z);

        --swn0je6: var(--swn0j80);

        --swn0je7: var(--swn0j81);

        --swn0je8: var(--swn0j82);

        --swn0je9: var(--swn0j83);

        --swn0jea: var(--swn0j84);

        --swn0jeb: var(--swn0j85);

        --swn0jec: var(--swn0j86);

        --swn0jed: var(--swn0j87);

        --swn0jee: var(--swn0j88);

        --swn0jef: var(--swn0j89);

        --swn0jeg: var(--swn0j8a);

        --swn0jeh: var(--swn0j8b);

        --swn0jei: var(--swn0j8c);

        --swn0jej: var(--swn0j8d);

        --swn0jek: var(--swn0j8e);

        --swn0jel: var(--swn0j8f);

        --swn0jem: var(--swn0j8g);

        --swn0jet: var(--swn0j8h);

        --swn0jeu: var(--swn0j8i);

        --swn0jev: var(--swn0j8j);

        --swn0jew: var(--swn0j8k);

        --swn0jex: var(--swn0j8l);

        --swn0jey: var(--swn0j8m);

        --swn0jez: var(--swn0j8n);

        --swn0jf0: var(--swn0j8o);

        --swn0jf1: var(--swn0j8p);

        --swn0jf2: var(--swn0j8q);

        --swn0jf3: var(--swn0j8r);

        --swn0jf4: var(--swn0j8s);

        --swn0jf5: var(--swn0j8t);

        --swn0jf6: var(--swn0j8u);

        --swn0jf7: var(--swn0j8v);

        --swn0jf8: var(--swn0j8w);

        --swn0jf9: var(--swn0j8x);

        --swn0jfa: var(--swn0j8y);

        --swn0jfb: var(--swn0j8z);

        --swn0jfc: var(--swn0j90);

        --swn0jfd: var(--swn0j91);

        --swn0jfe: var(--swn0j92);

        --swn0jff: var(--swn0j93);

        --swn0jfg: var(--swn0j94);

        --swn0jfh: var(--swn0j95);

        --swn0jfi: var(--swn0j96);

        --swn0jfj: var(--swn0j97);

        --swn0jfk: var(--swn0j98);

        --swn0jfl: var(--swn0j99);

        --swn0jfm: var(--swn0j9a);

        --swn0jfn: var(--swn0j9b);

        --swn0jfo: var(--swn0j9c);

        --swn0jfp: var(--swn0j9d);

        --swn0jfq: var(--swn0j9e);

        --swn0jfr: var(--swn0j9f);

        --swn0jfs: var(--swn0j9g);

        --swn0jft: var(--swn0j9h);

        --swn0jfu: var(--swn0j9i);

        --swn0jfv: var(--swn0j9j);

        --swn0jfw: var(--swn0j9k);

        --swn0jfx: var(--swn0j9l);

        --swn0jfy: var(--swn0j9m);

        --swn0jfz: var(--swn0j9n);

        --swn0jg0: var(--swn0j9o);

        --swn0jg1: var(--swn0j9p);

        --swn0jg2: var(--swn0j9q);

        --swn0jg3: var(--swn0j9r);

        --swn0jg4: var(--swn0j9s);

        --swn0jg5: var(--swn0j9t);

        --swn0jg6: var(--swn0j9u);

        --swn0jg7: var(--swn0j9v);

        --swn0jg8: var(--swn0j9w);

        --swn0jg9: var(--swn0j9x);

        --swn0jga: var(--swn0j9y);

        --swn0jgb: var(--swn0j9z);

        --swn0jgc: var(--swn0ja0);

        --swn0jgd: var(--swn0ja1);

        --swn0jge: var(--swn0ja2);

        --swn0jgf: var(--swn0ja3);

        --swn0jgg: var(--swn0ja4);

        --swn0jgh: var(--swn0ja5);

        --swn0jgi: var(--swn0ja6);

        --swn0jgj: var(--swn0ja7);

        --swn0jgk: var(--swn0ja8);

        --swn0jgl: var(--swn0ja9);

        --swn0jgm: var(--swn0jaa);

        --swn0jgn: var(--swn0jab);

        --swn0jgo: var(--swn0jac);

        --swn0jgp: var(--swn0jad);

        --swn0jgq: var(--swn0jae);

        --swn0jgr: var(--swn0jaf);

        --swn0jgs: var(--swn0jag);

        --swn0jgt: var(--swn0jah);

        --swn0jgu: var(--swn0jai);

        --swn0jgv: var(--swn0jaj);

        --swn0jgw: var(--swn0jak);

        --swn0jgx: var(--swn0jal);

        --swn0jgy: var(--swn0jam);

        --swn0jgz: var(--swn0jan);

        --swn0jh0: var(--swn0jao);

        --swn0jh1: var(--swn0jap);

        --swn0jh2: var(--swn0jaq);

        --swn0jh3: var(--swn0jar);

        --swn0jh4: var(--swn0jas);

        --swn0jh5: var(--swn0jat);

        --swn0jh6: var(--swn0jau);

        --swn0jh7: var(--swn0jav);

        --swn0jh8: var(--swn0jaw)

    }



    ._1fragempr {

        --swn0je0: var(--swn0jax);

        --swn0je1: var(--swn0jay);

        --swn0je2: var(--swn0jaz);

        --swn0je3: var(--swn0jb0);

        --swn0je4: var(--swn0jb1);

        --swn0je5: var(--swn0jb2);

        --swn0je6: var(--swn0jb3);

        --swn0je7: var(--swn0jb4);

        --swn0je8: var(--swn0jb5);

        --swn0je9: var(--swn0jb6);

        --swn0jea: var(--swn0jb7);

        --swn0jeb: var(--swn0jb8);

        --swn0jec: var(--swn0jb9);

        --swn0jed: var(--swn0jba);

        --swn0jee: var(--swn0jbb);

        --swn0jef: var(--swn0jbc);

        --swn0jeg: var(--swn0jbd);

        --swn0jeh: var(--swn0jbe);

        --swn0jei: var(--swn0jbf);

        --swn0jej: var(--swn0jbg);

        --swn0jek: var(--swn0jbh);

        --swn0jel: var(--swn0jbi);

        --swn0jem: var(--swn0jbj);

        --swn0jet: var(--swn0jbk);

        --swn0jeu: var(--swn0jbl);

        --swn0jev: var(--swn0jbm);

        --swn0jew: var(--swn0jbn);

        --swn0jex: var(--swn0jbo);

        --swn0jey: var(--swn0jbp);

        --swn0jez: var(--swn0jbq);

        --swn0jf0: var(--swn0jbr);

        --swn0jf1: var(--swn0jbs);

        --swn0jf2: var(--swn0jbt);

        --swn0jf3: var(--swn0jbu);

        --swn0jf4: var(--swn0jbv);

        --swn0jf5: var(--swn0jbw);

        --swn0jf6: var(--swn0jbx);

        --swn0jf7: var(--swn0jby);

        --swn0jf8: var(--swn0jbz);

        --swn0jf9: var(--swn0jc0);

        --swn0jfa: var(--swn0jc1);

        --swn0jfb: var(--swn0jc2);

        --swn0jfc: var(--swn0jc3);

        --swn0jfd: var(--swn0jc4);

        --swn0jfe: var(--swn0jc5);

        --swn0jff: var(--swn0jc6);

        --swn0jfg: var(--swn0jc7);

        --swn0jfh: var(--swn0jc8);

        --swn0jfi: var(--swn0jc9);

        --swn0jfj: var(--swn0jca);

        --swn0jfk: var(--swn0jcb);

        --swn0jfl: var(--swn0jcc);

        --swn0jfm: var(--swn0jcd);

        --swn0jfn: var(--swn0jce);

        --swn0jfo: var(--swn0jcf);

        --swn0jfp: var(--swn0jcg);

        --swn0jfq: var(--swn0jch);

        --swn0jfr: var(--swn0jci);

        --swn0jfs: var(--swn0jcj);

        --swn0jft: var(--swn0jck);

        --swn0jfu: var(--swn0jcl);

        --swn0jfv: var(--swn0jcm);

        --swn0jfw: var(--swn0jcn);

        --swn0jfx: var(--swn0jco);

        --swn0jfy: var(--swn0jcp);

        --swn0jfz: var(--swn0jcq);

        --swn0jg0: var(--swn0jcr);

        --swn0jg1: var(--swn0jcs);

        --swn0jg2: var(--swn0jct);

        --swn0jg3: var(--swn0jcu);

        --swn0jg4: var(--swn0jcv);

        --swn0jg5: var(--swn0jcw);

        --swn0jg6: var(--swn0jcx);

        --swn0jg7: var(--swn0jcy);

        --swn0jg8: var(--swn0jcz);

        --swn0jg9: var(--swn0jd0);

        --swn0jga: var(--swn0jd1);

        --swn0jgb: var(--swn0jd2);

        --swn0jgc: var(--swn0jd3);

        --swn0jgd: var(--swn0jd4);

        --swn0jge: var(--swn0jd5);

        --swn0jgf: var(--swn0jd6);

        --swn0jgg: var(--swn0jd7);

        --swn0jgh: var(--swn0jd8);

        --swn0jgi: var(--swn0jd9);

        --swn0jgj: var(--swn0jda);

        --swn0jgk: var(--swn0jdb);

        --swn0jgl: var(--swn0jdc);

        --swn0jgm: var(--swn0jdd);

        --swn0jgn: var(--swn0jde);

        --swn0jgo: var(--swn0jdf);

        --swn0jgp: var(--swn0jdg);

        --swn0jgq: var(--swn0jdh);

        --swn0jgr: var(--swn0jdi);

        --swn0jgs: var(--swn0jdj);

        --swn0jgt: var(--swn0jdk);

        --swn0jgu: var(--swn0jdl);

        --swn0jgv: var(--swn0jdm);

        --swn0jgw: var(--swn0jdn);

        --swn0jgx: var(--swn0jdo);

        --swn0jgy: var(--swn0jdp);

        --swn0jgz: var(--swn0jdq);

        --swn0jh0: var(--swn0jdr);

        --swn0jh1: var(--swn0jds);

        --swn0jh2: var(--swn0jdt);

        --swn0jh3: var(--swn0jdu);

        --swn0jh4: var(--swn0jdv);

        --swn0jh5: var(--swn0jdw);

        --swn0jh6: var(--swn0jdx);

        --swn0jh7: var(--swn0jdy);

        --swn0jh8: var(--swn0jdz)

    }



    ._1fragemps {

        --x-default-color-accent: var(--swn0je4, var(--swn0j0));

        --x-default-color-accent-contrast: var(--swn0je6, var(--swn0j1));

        --x-default-color-accent-foreground-as-subdued-background: var(--swn0je7, var(--swn0j3));

        --x-default-color-accent-foreground-as-subdued-background-alpha: var(--swn0je9, var(--swn0j5));

        --x-default-color-accent-hovered: var(--swn0jea, var(--swn0j2));

        --x-default-color-accent-text-on-foreground-as-subdued-background: var(--swn0jeb, var(--swn0j6));

        --x-default-color-accent-text-subdued-on-foreground-as-subdued-background: var(--swn0jec, var(--swn0j7));

        --x-default-color-background: var(--swn0je0, var(--swn0j19));

        --x-default-color-background-subdued: var(--swn0jed, var(--swn0j1a));

        --x-default-color-background-subdued-alpha: var(--swn0jee, var(--swn0j1b));

        --x-default-color-border: var(--swn0je2, var(--swn0j1c));

        --x-default-color-border-emphasized: var(--swn0jef, var(--swn0j1d));

        --x-default-color-decorative: var(--swn0jn);

        --x-default-color-icon: var(--swn0je3, var(--swn0jeh, var(--swn0j1g)));

        --x-default-color-text: var(--swn0je1, var(--swn0j1e));

        --x-default-color-text-contrast: var(--swn0jeg, var(--swn0j1f));

        --x-default-color-text-subdued: var(--swn0jeh, var(--swn0j1g));

        --x-default-color-text-subdued-200: var(--swn0jei, var(--swn0j1h));

        --x-default-color-brand: var(--swn0j8);

        --x-default-color-critical: var(--swn0jej, var(--swn0jd));

        --x-default-color-info: var(--swn0jek, var(--swn0jo));

        --x-default-color-success: var(--swn0jel, var(--swn0jv));

        --x-default-color-warning: var(--swn0jem, var(--swn0j12))

    }



    ._1fragempt {

        --x-default-color-accent: var(--swn0jex, var(--swn0j0));

        --x-default-color-accent-contrast: var(--swn0jez, var(--swn0j1));

        --x-default-color-accent-foreground-as-subdued-background: var(--swn0jf0, var(--swn0j3));

        --x-default-color-accent-foreground-as-subdued-background-alpha: var(--swn0jf2, var(--swn0j5));

        --x-default-color-accent-hovered: var(--swn0jf3, var(--swn0j2));

        --x-default-color-accent-text-on-foreground-as-subdued-background: var(--swn0jf4, var(--swn0j6));

        --x-default-color-accent-text-subdued-on-foreground-as-subdued-background: var(--swn0jf5, var(--swn0j7));

        --x-default-color-background: var(--swn0jet, var(--swn0j19));

        --x-default-color-background-subdued: var(--swn0jf6, var(--swn0j1a));

        --x-default-color-background-subdued-alpha: var(--swn0jf7, var(--swn0j1b));

        --x-default-color-border: var(--swn0jev, var(--swn0j1c));

        --x-default-color-border-emphasized: var(--swn0jf8, var(--swn0j1d));

        --x-default-color-decorative: var(--swn0jey, var(--swn0jn));

        --x-default-color-icon: var(--swn0jew, var(--swn0jfa, var(--swn0j1g)));

        --x-default-color-text: var(--swn0jeu, var(--swn0j1e));

        --x-default-color-text-contrast: var(--swn0jf9, var(--swn0j1f));

        --x-default-color-text-subdued: var(--swn0jfa, var(--swn0j1g));

        --x-default-color-text-subdued-200: var(--swn0jfb, var(--swn0j1h))

    }



    ._1fragempu {

        --x-default-color-accent: var(--swn0jfg, var(--swn0jex, var(--swn0j0)));

        --x-default-color-accent-contrast: var(--swn0jfi, var(--swn0jez, var(--swn0j1)));

        --x-default-color-accent-foreground-as-subdued-background: var(--swn0jfj, var(--swn0jf0, var(--swn0j3)));

        --x-default-color-accent-foreground-as-subdued-background-alpha: var(--swn0jfl, var(--swn0jf2, var(--swn0j5)));

        --x-default-color-accent-hovered: var(--swn0jfm, var(--swn0jf3, var(--swn0j2)));

        --x-default-color-accent-text-on-foreground-as-subdued-background: var(--swn0jfn, var(--swn0jf4, var(--swn0j6)));

        --x-default-color-accent-text-subdued-on-foreground-as-subdued-background: var(--swn0jfo, var(--swn0jf5, var(--swn0j7)));

        --x-default-color-background: var(--swn0jfc, var(--swn0jfj, var(--swn0jf0, var(--swn0j3))));

        --x-default-color-background-subdued: var(--swn0jfp, var(--swn0jfk, var(--swn0jf1, var(--swn0j4))));

        --x-default-color-background-subdued-alpha: var(--swn0jfq, var(--swn0jf7, var(--swn0j1b)));

        --x-default-color-border: var(--swn0jfe, var(--swn0jfg, var(--swn0jex, var(--swn0j0))));

        --x-default-color-text-contrast: var(--swn0jfs, var(--swn0jf9, var(--swn0j1f)));

        --x-default-color-decorative: var(--swn0jfh, var(--swn0jey, var(--swn0jn)));

        --x-default-color-icon: var(--swn0jff, var(--swn0jft, var(--swn0jfa, var(--swn0j1g))));

        --x-default-color-text: var(--swn0jfd, var(--swn0jfn, var(--swn0jf4, var(--swn0j6))));

        --x-default-color-text-subdued: var(--swn0jft, var(--swn0jf5, var(--swn0j7)))

    }



    ._1fragempv {

        --x-default-color-border: var(--swn0jfe, var(--swn0jfg, var(--swn0jex, var(--swn0j0))))

    }



    ._1fragempw {

        --x-default-color-accent: var(--swn0jfz, var(--swn0j0));

        --x-default-color-accent-contrast: var(--swn0jg1, var(--swn0j1));

        --x-default-color-accent-foreground-as-subdued-background: var(--swn0jg2, var(--swn0j3));

        --x-default-color-accent-foreground-as-subdued-background-alpha: var(--swn0jg4, var(--swn0j5));

        --x-default-color-accent-hovered: var(--swn0jg5, var(--swn0j2));

        --x-default-color-accent-text-on-foreground-as-subdued-background: var(--swn0jg6, var(--swn0j6));

        --x-default-color-accent-text-subdued-on-foreground-as-subdued-background: var(--swn0jg7, var(--swn0j7));

        --x-default-color-background: var(--swn0jfv, var(--swn0j8));

        --x-default-color-background-subdued: var(--swn0jg8, var(--swn0j9));

        --x-default-color-background-subdued-alpha: var(--swn0jg9);

        --x-default-color-border: var(--swn0jfx, var(--swn0ja));

        --x-default-color-decorative: var(--swn0jg0, var(--swn0jn));

        --x-default-color-icon: var(--swn0jfy, var(--swn0jgc, var(--swn0j1g)));

        --x-default-color-text: var(--swn0jfw, var(--swn0jb, var(--swn0j1e)));

        --x-default-color-text-contrast: var(--swn0jgb, var(--swn0j1f));

        --x-default-color-text-subdued: var(--swn0jgc, var(--swn0jc));

        --swn0jer: var(--swn0jgi, var(--x-default-color-accent));

        --swn0jen: var(--swn0jge, var(--x-default-color-background-subdued));

        --swn0jep: var(--swn0jgg, var(--x-default-color-border));

        --swn0jes: var(--swn0jgj, var(--x-default-color-decorative));

        --swn0jeq: var(--swn0jgh, var(--x-default-color-icon));

        --swn0jeo: var(--swn0jgf, var(--x-default-color-text-subdued))

    }



    ._1fragempx {

        --x-default-color-accent: var(--swn0jfz, var(--swn0j0));

        --x-default-color-accent-contrast: var(--swn0jg1, var(--swn0j1));

        --x-default-color-accent-foreground-as-subdued-background: var(--swn0jg2, var(--swn0j3));

        --x-default-color-accent-foreground-as-subdued-background-alpha: var(--swn0jg4, var(--swn0j5));

        --x-default-color-accent-hovered: var(--swn0jg5, var(--swn0j2));

        --x-default-color-accent-text-on-foreground-as-subdued-background: var(--swn0jg6, var(--swn0j6));

        --x-default-color-accent-text-subdued-on-foreground-as-subdued-background: var(--swn0jg7, var(--swn0j7));

        --x-default-color- background: black;

        --x-default-color-background-subdued: black;

        --x-default-color-background-subdued-alpha: black;

        --x-default-color-border: var(--swn0jfx, var(--swn0j8));

        --x-default-color-decorative: var(--swn0jg0, var(--swn0jn));

        --x-default-color-icon: var(--swn0jfy, var(--swn0jgc));

        --x-default-color-text: var(--swn0jfw, var(--swn0j8));

        --x-default-color-text-contrast: var(--swn0jgb);

        --x-default-color-text-subdued: var(--swn0jgc, var(--swn0j9));

        --swn0jer: var(--swn0jgi, var(--x-default-color-accent));

        --swn0jen: black;

        --swn0jep: var(--swn0jgg, var(--x-default-color-border));

        --swn0jes: var(--swn0jgj, var(--x-default-color-decorative));

        --swn0jeq: var(--swn0jgh, var(--x-default-color-icon));

        --swn0jeo: var(--swn0jgf, var(--x-default-color-text-subdued))

    }



    ._1fragempy {

        --x-default-color-accent: var(--swn0jgo, var(--swn0j0));

        --x-default-color-accent-contrast: var(--swn0jgq, var(--swn0j1));

        --x-default-color-accent-foreground-as-subdued-background: var(--swn0jgr, var(--swn0j3));

        --x-default-color-accent-foreground-as-subdued-background-alpha: var(--swn0jgt, var(--swn0j5));

        --x-default-color-accent-hovered: var(--swn0jgu, var(--swn0j2));

        --x-default-color-accent-text-on-foreground-as-subdued-background: var(--swn0jgv, var(--swn0j6));

        --x-default-color-accent-text-subdued-on-foreground-as-subdued-background: var(--swn0jgw, var(--swn0j7));

        --x-default-color-background: var(--swn0jgk, var(--swn0j8));

        --x-default-color-background-subdued: var(--swn0jgx, var(--swn0j9));

        --x-default-color-background-subdued-alpha: var(--swn0jgy);

        --x-default-color-border: var(--swn0jgm, var(--swn0ja));

        --x-default-color-decorative: var(--swn0jgp, var(--swn0jn));

        --x-default-color-icon: var(--swn0jgn, var(--swn0jh1, var(--swn0j1g)));

        --x-default-color-text: var(--swn0jgl, var(--swn0jb, var(--swn0j1e)));

        --x-default-color-text-contrast: var(--swn0jh0, var(--swn0j1f));

        --x-default-color-text-subdued: var(--swn0jh1, var(--swn0jc));

        --swn0jer: var(--swn0jh7, var(--x-default-color-accent));

        --swn0jen: var(--swn0jh3, var(--x-default-color-background-subdued));

        --swn0jep: var(--swn0jh5, var(--x-default-color-border));

        --swn0jes: var(--swn0jh8, var(--x-default-color-decorative));

        --swn0jeq: var(--swn0jh6, var(--x-default-color-icon));

        --swn0jeo: var(--swn0jh4, var(--x-default-color-text-subdued))

    }



    ._1fragempz {

        --x-default-color-accent: var(--swn0jgo, var(--swn0j0));

        --x-default-color-accent-contrast: var(--swn0jgq, var(--swn0j1));

        --x-default-color-accent-foreground-as-subdued-background: var(--swn0jgr, var(--swn0j3));

        --x-default-color-accent-foreground-as-subdued-background-alpha: var(--swn0jgt, var(--swn0j5));

        --x-default-color-accent-hovered: var(--swn0jgu, var(--swn0j2));

        --x-default-color-accent-text-on-foreground-as-subdued-background: var(--swn0jgv, var(--swn0j6));

        --x-default-color-accent-text-subdued-on-foreground-as-subdued-background: var(--swn0jgw, var(--swn0j7));

        --x-default-color- background: black;

        --x-default-color-background-subdued: black;

        --x-default-color-background-subdued-alpha: black;

        --x-default-color-border: var(--swn0jgm, var(--swn0je2, var(--swn0j1c)));

        --x-default-color-decorative: var(--swn0jgp, var(--swn0jn));

        --x-default-color-icon: var(--swn0jgn, var(--swn0jh1));

        --x-default-color-text: var(--swn0jgl, var(--swn0j8));

        --x-default-color-text-contrast: var(--swn0jh0);

        --x-default-color-text-subdued: var(--swn0jh1, var(--swn0j9));

        --swn0jer: var(--swn0jh7, var(--x-default-color-accent));

        --swn0jen: black;

        --swn0jep: var(--swn0jh5, var(--x-default-color-border));

        --swn0jes: var(--swn0jh8, var(--x-default-color-decorative));

        --swn0jeq: var(--swn0jh6, var(--x-default-color-icon));

        --swn0jeo: var(--swn0jh4, var(--x-default-color-text-subdued))

    }



    ._1fragemq0 {

        cursor: default

    }



    ._1fragemq1 {

        cursor: not-allowed

    }



    ._1fragemq2 {

        cursor: pointer

    }



    ._1fragemq3 {

        cursor: text

    }



    ._1fragemq4 {

        fill: none

    }



    ._1fragemq5 {

        flex-direction: column

    }



    ._1fragemq6 {

        flex-direction: row

    }



    ._1fragemq7 {

        flex-grow: 0

    }



    ._1fragemq8 {

        flex-grow: 1

    }



    ._1fragemq9 {

        flex-shrink: 0

    }



    ._1fragemqa {

        font-size: var(--x-typography-size-extra-small)

    }



    ._1fragemqb {

        font-size: var(--x-typography-size-small)

    }



    ._1fragemqc {

        font-size: var(--x-typography-size-default)

    }



    ._1fragemqd {

        font-size: var(--x-typography-size-medium)

    }



    ._1fragemqe {

        font-size: var(--x-typography-size-large)

    }



    ._1fragemqf {

        font-size: var(--x-typography-size-extra-large)

    }



    ._1fragemqg {

        font-size: var(--x-typography-size-extra-extra-large)

    }



    ._1fragemqh {

        width: var(--x-spacing-small-500);

        inline-size: var(--x-spacing-small-500)

    }



    ._1fragemqi {

        width: var(--x-spacing-small-400);

        inline-size: var(--x-spacing-small-400)

    }



    ._1fragemqj {

        width: var(--x-spacing-small-300);

        inline-size: var(--x-spacing-small-300)

    }



    ._1fragemqk {

        width: var(--x-spacing-small-200);

        inline-size: var(--x-spacing-small-200)

    }



    ._1fragemql {

        width: var(--x-spacing-small-100);

        inline-size: var(--x-spacing-small-100)

    }



    ._1fragemqm {

        width: var(--x-spacing-base);

        inline-size: var(--x-spacing-base)

    }



    ._1fragemqn {

        width: var(--x-spacing-large-100);

        inline-size: var(--x-spacing-large-100)

    }



    ._1fragemqo {

        width: var(--x-spacing-large-200);

        inline-size: var(--x-spacing-large-200)

    }



    ._1fragemqp {

        width: var(--x-spacing-large-300);

        inline-size: var(--x-spacing-large-300)

    }



    ._1fragemqq {

        width: var(--x-spacing-large-400);

        inline-size: var(--x-spacing-large-400)

    }



    ._1fragemqr {

        width: var(--x-spacing-large-500);

        inline-size: var(--x-spacing-large-500)

    }



    ._1fragemqs {

        width: var(--x-spacing-large-600);

        inline-size: var(--x-spacing-large-600)

    }



    ._1fragemqt {

        width: var(--x-spacing-extra-tight);

        inline-size: var(--x-spacing-extra-tight)

    }



    ._1fragemqu {

        width: var(--x-spacing-loose);

        inline-size: var(--x-spacing-loose)

    }



    ._1fragemqv {

        width: var(--x-spacing-tight);

        inline-size: var(--x-spacing-tight)

    }



    ._1fragemqw {

        width: var(--x-spacing-extra-loose);

        inline-size: var(--x-spacing-extra-loose)

    }



    ._1fragemqx {

        width: 0;

        inline-size: 0

    }



    ._1fragemqy {

        width: auto;

        inline-size: auto

    }



    ._1fragemqz {

        width: 100%;

        inline-size: 100%

    }



    ._1fragemr0 {

        width: -moz-fit-content;

        width: fit-content;

        inline-size: -moz-fit-content;

        inline-size: fit-content

    }



    ._1fragemr1 {

        justify-content: center

    }



    ._1fragemr2 {

        justify-content: safe center

    }



    ._1fragemr3 {

        justify-content: flex-end

    }



    ._1fragemr4 {

        justify-content: flex-start

    }



    ._1fragemr5 {

        justify-content: space-between

    }



    ._1fragemr6 {

        justify-items: center

    }



    ._1fragemr7 {

        justify-items: end

    }



    ._1fragemr8 {

        justify-items: start

    }



    ._1fragemr9 {

        line-height: 1

    }



    ._1fragemra {

        list-style-type: none

    }



    [dir=ltr] ._1fragemrb {

        border-left-color: var(--leu13r0)

    }



    [dir=rtl] ._1fragemrb {

        border-right-color: var(--leu13r0)

    }



    ._1fragemrb {

        border-inline-start-color: var(--leu13r0)

    }



    [dir=ltr] ._1fragemrc {

        border-left-color: white

    }



    [dir=rtl] ._1fragemrc {

        border-right-color: white

    }



    ._1fragemrc {

        border-inline-start-color: white

    }



    [dir=ltr] ._1fragemrd {

        border-right-color: var(--leu13r0)

    }



    [dir=rtl] ._1fragemrd {

        border-left-color: var(--leu13r0)

    }



    ._1fragemrd {

        border-inline-end-color: var(--leu13r0)

    }



    [dir=ltr] ._1fragemre {

        border-right-color: white

    }



    [dir=rtl] ._1fragemre {

        border-left-color: white

    }



    ._1fragemre {

        border-inline-end-color: white

    }



    ._1fragemrf {

        border-block-start-color: var(--leu13r0);

        border-top-color: var(--leu13r0)

    }



    ._1fragemrg {

        border-block-start-color: black;

        border-top-color: white

    }



    ._1fragemrh {

        border-block-end-color: var(--leu13r0);

        border-bottom-color: var(--leu13r0)

    }



    ._1fragemri {

        border-block-end-color: black;

        border-bottom-color: white

    }



    [dir=ltr] ._1fragemrj {

        border-top-left-radius: 0

    }



    [dir=rtl] ._1fragemrj {

        border-top-right-radius: 0

    }



    ._1fragemrj {

        border-start-start-radius: 0

    }



    [dir=ltr] ._1fragemrk {

        border-top-left-radius: var(--x-border-radius-small)

    }



    [dir=rtl] ._1fragemrk {

        border-top-right-radius: var(--x-border-radius-small)

    }



    ._1fragemrk {

        border-start-start-radius: var(--x-border-radius-small)

    }



    [dir=ltr] ._1fragemrl {

        border-top-left-radius: var(--x-border-radius-base)

    }



    [dir=rtl] ._1fragemrl {

        border-top-right-radius: var(--x-border-radius-base)

    }



    ._1fragemrl {

        border-start-start-radius: var(--x-border-radius-base)

    }



    [dir=ltr] ._1fragemrm {

        border-top-left-radius: var(--x-border-radius-large)

    }



    [dir=rtl] ._1fragemrm {

        border-top-right-radius: var(--x-border-radius-large)

    }



    ._1fragemrm {

        border-start-start-radius: var(--x-border-radius-large)

    }



    [dir=ltr] ._1fragemrn {

        border-top-left-radius: var(--x-border-radius-fully-rounded)

    }



    [dir=rtl] ._1fragemrn {

        border-top-right-radius: var(--x-border-radius-fully-rounded)

    }



    ._1fragemrn {

        border-start-start-radius: var(--x-border-radius-fully-rounded)

    }



    [dir=ltr] ._1fragemro {

        border-top-right-radius: 0

    }



    [dir=rtl] ._1fragemro {

        border-top-left-radius: 0

    }



    ._1fragemro {

        border-start-end-radius: 0

    }



    [dir=ltr] ._1fragemrp {

        border-top-right-radius: var(--x-border-radius-small)

    }



    [dir=rtl] ._1fragemrp {

        border-top-left-radius: var(--x-border-radius-small)

    }



    ._1fragemrp {

        border-start-end-radius: var(--x-border-radius-small)

    }



    [dir=ltr] ._1fragemrq {

        border-top-right-radius: var(--x-border-radius-base)

    }



    [dir=rtl] ._1fragemrq {

        border-top-left-radius: var(--x-border-radius-base)

    }



    ._1fragemrq {

        border-start-end-radius: var(--x-border-radius-base)

    }



    [dir=ltr] ._1fragemrr {

        border-top-right-radius: var(--x-border-radius-large)

    }



    [dir=rtl] ._1fragemrr {

        border-top-left-radius: var(--x-border-radius-large)

    }



    ._1fragemrr {

        border-start-end-radius: var(--x-border-radius-large)

    }



    [dir=ltr] ._1fragemrs {

        border-top-right-radius: var(--x-border-radius-fully-rounded)

    }



    [dir=rtl] ._1fragemrs {

        border-top-left-radius: var(--x-border-radius-fully-rounded)

    }



    ._1fragemrs {

        border-start-end-radius: var(--x-border-radius-fully-rounded)

    }



    [dir=ltr] ._1fragemrt {

        border-bottom-left-radius: 0

    }



    [dir=rtl] ._1fragemrt {

        border-bottom-right-radius: 0

    }



    ._1fragemrt {

        border-end-start-radius: 0

    }



    [dir=ltr] ._1fragemru {

        border-bottom-left-radius: var(--x-border-radius-small)

    }



    [dir=rtl] ._1fragemru {

        border-bottom-right-radius: var(--x-border-radius-small)

    }



    ._1fragemru {

        border-end-start-radius: var(--x-border-radius-small)

    }



    [dir=ltr] ._1fragemrv {

        border-bottom-left-radius: var(--x-border-radius-base)

    }



    [dir=rtl] ._1fragemrv {

        border-bottom-right-radius: var(--x-border-radius-base)

    }



    ._1fragemrv {

        border-end-start-radius: var(--x-border-radius-base)

    }



    [dir=ltr] ._1fragemrw {

        border-bottom-left-radius: var(--x-border-radius-large)

    }



    [dir=rtl] ._1fragemrw {

        border-bottom-right-radius: var(--x-border-radius-large)

    }



    ._1fragemrw {

        border-end-start-radius: var(--x-border-radius-large)

    }



    [dir=ltr] ._1fragemrx {

        border-bottom-left-radius: var(--x-border-radius-fully-rounded)

    }



    [dir=rtl] ._1fragemrx {

        border-bottom-right-radius: var(--x-border-radius-fully-rounded)

    }



    ._1fragemrx {

        border-end-start-radius: var(--x-border-radius-fully-rounded)

    }



    [dir=ltr] ._1fragemry {

        border-bottom-right-radius: 0

    }



    [dir=rtl] ._1fragemry {

        border-bottom-left-radius: 0

    }



    ._1fragemry {

        border-end-end-radius: 0

    }



    [dir=ltr] ._1fragemrz {

        border-bottom-right-radius: var(--x-border-radius-small)

    }



    [dir=rtl] ._1fragemrz {

        border-bottom-left-radius: var(--x-border-radius-small)

    }



    ._1fragemrz {

        border-end-end-radius: var(--x-border-radius-small)

    }



    [dir=ltr] ._1fragems0 {

        border-bottom-right-radius: var(--x-border-radius-base)

    }



    [dir=rtl] ._1fragems0 {

        border-bottom-left-radius: var(--x-border-radius-base)

    }



    ._1fragems0 {

        border-end-end-radius: var(--x-border-radius-base)

    }



    [dir=ltr] ._1fragems1 {

        border-bottom-right-radius: var(--x-border-radius-large)

    }



    [dir=rtl] ._1fragems1 {

        border-bottom-left-radius: var(--x-border-radius-large)

    }



    ._1fragems1 {

        border-end-end-radius: var(--x-border-radius-large)

    }



    [dir=ltr] ._1fragems2 {

        border-bottom-right-radius: var(--x-border-radius-fully-rounded)

    }



    [dir=rtl] ._1fragems2 {

        border-bottom-left-radius: var(--x-border-radius-fully-rounded)

    }



    ._1fragems2 {

        border-end-end-radius: var(--x-border-radius-fully-rounded)

    }



    [dir=ltr] ._1fragems3 {

        border-left-style: none

    }



    [dir=rtl] ._1fragems3 {

        border-right-style: none

    }



    ._1fragems3 {

        --_13qz35y0: 0px;

        border-inline-start-style: none

    }



    [dir=ltr] ._1fragems4 {

        border-left-style: solid

    }



    [dir=rtl] ._1fragems4 {

        border-right-style: solid

    }



    ._1fragems4 {

        border-inline-start-style: solid

    }



    [dir=ltr] ._1fragems5 {

        border-left-style: dotted

    }



    [dir=rtl] ._1fragems5 {

        border-right-style: dotted

    }



    ._1fragems5 {

        border-inline-start-style: dotted

    }



    [dir=ltr] ._1fragems6 {

        border-left-style: dashed

    }



    [dir=rtl] ._1fragems6 {

        border-right-style: dashed

    }



    ._1fragems6 {

        border-inline-start-style: dashed

    }



    [dir=ltr] ._1fragems7 {

        border-right-style: none

    }



    [dir=rtl] ._1fragems7 {

        border-left-style: none

    }



    ._1fragems7 {

        --_13qz35y1: 0px;

        border-inline-end-style: none

    }



    [dir=ltr] ._1fragems8 {

        border-right-style: solid

    }



    [dir=rtl] ._1fragems8 {

        border-left-style: solid

    }



    ._1fragems8 {

        border-inline-end-style: solid

    }



    [dir=ltr] ._1fragems9 {

        border-right-style: dotted

    }



    [dir=rtl] ._1fragems9 {

        border-left-style: dotted

    }



    ._1fragems9 {

        border-inline-end-style: dotted

    }



    [dir=ltr] ._1fragemsa {

        border-right-style: dashed

    }



    [dir=rtl] ._1fragemsa {

        border-left-style: dashed

    }



    ._1fragemsa {

        border-inline-end-style: dashed

    }



    ._1fragemsb {

        --_13qz35y2: 0px;

        border-block-start-style: none;

        border-top-style: none

    }



    ._1fragemsc {

        border-block-start-style: solid;

        border-top-style: solid

    }



    ._1fragemsd {

        border-block-start-style: dotted;

        border-top-style: dotted

    }



    ._1fragemse {

        border-block-start-style: dashed;

        border-top-style: dashed

    }



    ._1fragemsf {

        --_13qz35y3: 0px;

        border-block-end-style: none;

        border-bottom-style: none

    }



    ._1fragemsg {

        border-block-end-style: solid;

        border-bottom-style: solid

    }



    ._1fragemsh {

        border-block-end-style: dotted;

        border-bottom-style: dotted

    }



    ._1fragemsi {

        border-block-end-style: dashed;

        border-bottom-style: dashed

    }



    ._1fragemsj {

        bottom: 0;

        inset-block-end: 0

    }



    ._1fragemsk {

        bottom: 50%;

        inset-block-end: 50%

    }



    ._1fragemsl {

        bottom: 100%;

        inset-block-end: 100%

    }



    ._1fragemsm {

        bottom: var(--x-spacing-small-500);

        inset-block-end: var(--x-spacing-small-500)

    }



    ._1fragemsn {

        bottom: var(--x-spacing-small-400);

        inset-block-end: var(--x-spacing-small-400)

    }



    ._1fragemso {

        bottom: var(--x-spacing-small-300);

        inset-block-end: var(--x-spacing-small-300)

    }



    ._1fragemsp {

        bottom: var(--x-spacing-small-200);

        inset-block-end: var(--x-spacing-small-200)

    }



    ._1fragemsq {

        bottom: var(--x-spacing-small-100);

        inset-block-end: var(--x-spacing-small-100)

    }



    ._1fragemsr {

        bottom: var(--x-spacing-base);

        inset-block-end: var(--x-spacing-base)

    }



    ._1fragemss {

        bottom: var(--x-spacing-large-100);

        inset-block-end: var(--x-spacing-large-100)

    }



    ._1fragemst {

        bottom: var(--x-spacing-large-200);

        inset-block-end: var(--x-spacing-large-200)

    }



    ._1fragemsu {

        bottom: var(--x-spacing-large-300);

        inset-block-end: var(--x-spacing-large-300)

    }



    ._1fragemsv {

        bottom: var(--x-spacing-large-400);

        inset-block-end: var(--x-spacing-large-400)

    }



    ._1fragemsw {

        bottom: var(--x-spacing-large-500);

        inset-block-end: var(--x-spacing-large-500)

    }



    ._1fragemsx {

        bottom: var(--x-spacing-large-600);

        inset-block-end: var(--x-spacing-large-600)

    }



    ._1fragemsy {

        bottom: var(--x-spacing-extra-tight);

        inset-block-end: var(--x-spacing-extra-tight)

    }



    ._1fragemsz {

        bottom: var(--x-spacing-loose);

        inset-block-end: var(--x-spacing-loose)

    }



    ._1fragemt0 {

        bottom: var(--x-spacing-tight);

        inset-block-end: var(--x-spacing-tight)

    }



    ._1fragemt1 {

        bottom: var(--x-spacing-extra-loose);

        inset-block-end: var(--x-spacing-extra-loose)

    }



    ._1fragemt2 {

        inset-block-start: 0;

        top: 0

    }



    ._1fragemt3 {

        inset-block-start: 50%;

        top: 50%

    }



    ._1fragemt4 {

        inset-block-start: 100%;

        top: 100%

    }



    ._1fragemt5 {

        inset-block-start: var(--x-spacing-small-500);

        top: var(--x-spacing-small-500)

    }



    ._1fragemt6 {

        inset-block-start: var(--x-spacing-small-400);

        top: var(--x-spacing-small-400)

    }



    ._1fragemt7 {

        inset-block-start: var(--x-spacing-small-300);

        top: var(--x-spacing-small-300)

    }



    ._1fragemt8 {

        inset-block-start: var(--x-spacing-small-200);

        top: var(--x-spacing-small-200)

    }



    ._1fragemt9 {

        inset-block-start: var(--x-spacing-small-100);

        top: var(--x-spacing-small-100)

    }



    ._1fragemta {

        inset-block-start: var(--x-spacing-base);

        top: var(--x-spacing-base)

    }



    ._1fragemtb {

        inset-block-start: var(--x-spacing-large-100);

        top: var(--x-spacing-large-100)

    }



    ._1fragemtc {

        inset-block-start: var(--x-spacing-large-200);

        top: var(--x-spacing-large-200)

    }



    ._1fragemtd {

        inset-block-start: var(--x-spacing-large-300);

        top: var(--x-spacing-large-300)

    }



    ._1fragemte {

        inset-block-start: var(--x-spacing-large-400);

        top: var(--x-spacing-large-400)

    }



    ._1fragemtf {

        inset-block-start: var(--x-spacing-large-500);

        top: var(--x-spacing-large-500)

    }



    ._1fragemtg {

        inset-block-start: var(--x-spacing-large-600);

        top: var(--x-spacing-large-600)

    }



    ._1fragemth {

        inset-block-start: var(--x-spacing-extra-tight);

        top: var(--x-spacing-extra-tight)

    }



    ._1fragemti {

        inset-block-start: var(--x-spacing-loose);

        top: var(--x-spacing-loose)

    }



    ._1fragemtj {

        inset-block-start: var(--x-spacing-tight);

        top: var(--x-spacing-tight)

    }



    ._1fragemtk {

        inset-block-start: var(--x-spacing-extra-loose);

        top: var(--x-spacing-extra-loose)

    }



    [dir=ltr] ._1fragemtl {

        right: 0

    }



    [dir=rtl] ._1fragemtl {

        left: 0

    }



    ._1fragemtl {

        inset-inline-end: 0

    }



    [dir=ltr] ._1fragemtm {

        right: 50%

    }



    [dir=rtl] ._1fragemtm {

        left: 50%

    }



    ._1fragemtm {

        inset-inline-end: 50%

    }



    [dir=ltr] ._1fragemtn {

        right: 100%

    }



    [dir=rtl] ._1fragemtn {

        left: 100%

    }



    ._1fragemtn {

        inset-inline-end: 100%

    }



    [dir=ltr] ._1fragemto {

        right: var(--x-spacing-small-500)

    }



    [dir=rtl] ._1fragemto {

        left: var(--x-spacing-small-500)

    }



    ._1fragemto {

        inset-inline-end: var(--x-spacing-small-500)

    }



    [dir=ltr] ._1fragemtp {

        right: var(--x-spacing-small-400)

    }



    [dir=rtl] ._1fragemtp {

        left: var(--x-spacing-small-400)

    }



    ._1fragemtp {

        inset-inline-end: var(--x-spacing-small-400)

    }



    [dir=ltr] ._1fragemtq {

        right: var(--x-spacing-small-300)

    }



    [dir=rtl] ._1fragemtq {

        left: var(--x-spacing-small-300)

    }



    ._1fragemtq {

        inset-inline-end: var(--x-spacing-small-300)

    }



    [dir=ltr] ._1fragemtr {

        right: var(--x-spacing-small-200)

    }



    [dir=rtl] ._1fragemtr {

        left: var(--x-spacing-small-200)

    }



    ._1fragemtr {

        inset-inline-end: var(--x-spacing-small-200)

    }



    [dir=ltr] ._1fragemts {

        right: var(--x-spacing-small-100)

    }



    [dir=rtl] ._1fragemts {

        left: var(--x-spacing-small-100)

    }



    ._1fragemts {

        inset-inline-end: var(--x-spacing-small-100)

    }



    [dir=ltr] ._1fragemtt {

        right: var(--x-spacing-base)

    }



    [dir=rtl] ._1fragemtt {

        left: var(--x-spacing-base)

    }



    ._1fragemtt {

        inset-inline-end: var(--x-spacing-base)

    }



    [dir=ltr] ._1fragemtu {

        right: var(--x-spacing-large-100)

    }



    [dir=rtl] ._1fragemtu {

        left: var(--x-spacing-large-100)

    }



    ._1fragemtu {

        inset-inline-end: var(--x-spacing-large-100)

    }



    [dir=ltr] ._1fragemtv {

        right: var(--x-spacing-large-200)

    }



    [dir=rtl] ._1fragemtv {

        left: var(--x-spacing-large-200)

    }



    ._1fragemtv {

        inset-inline-end: var(--x-spacing-large-200)

    }



    [dir=ltr] ._1fragemtw {

        right: var(--x-spacing-large-300)

    }



    [dir=rtl] ._1fragemtw {

        left: var(--x-spacing-large-300)

    }



    ._1fragemtw {

        inset-inline-end: var(--x-spacing-large-300)

    }



    [dir=ltr] ._1fragemtx {

        right: var(--x-spacing-large-400)

    }



    [dir=rtl] ._1fragemtx {

        left: var(--x-spacing-large-400)

    }



    ._1fragemtx {

        inset-inline-end: var(--x-spacing-large-400)

    }



    [dir=ltr] ._1fragemty {

        right: var(--x-spacing-large-500)

    }



    [dir=rtl] ._1fragemty {

        left: var(--x-spacing-large-500)

    }



    ._1fragemty {

        inset-inline-end: var(--x-spacing-large-500)

    }



    [dir=ltr] ._1fragemtz {

        right: var(--x-spacing-large-600)

    }



    [dir=rtl] ._1fragemtz {

        left: var(--x-spacing-large-600)

    }



    ._1fragemtz {

        inset-inline-end: var(--x-spacing-large-600)

    }



    [dir=ltr] ._1fragemu0 {

        right: var(--x-spacing-extra-tight)

    }



    [dir=rtl] ._1fragemu0 {

        left: var(--x-spacing-extra-tight)

    }



    ._1fragemu0 {

        inset-inline-end: var(--x-spacing-extra-tight)

    }



    [dir=ltr] ._1fragemu1 {

        right: var(--x-spacing-loose)

    }



    [dir=rtl] ._1fragemu1 {

        left: var(--x-spacing-loose)

    }



    ._1fragemu1 {

        inset-inline-end: var(--x-spacing-loose)

    }



    [dir=ltr] ._1fragemu2 {

        right: var(--x-spacing-tight)

    }



    [dir=rtl] ._1fragemu2 {

        left: var(--x-spacing-tight)

    }



    ._1fragemu2 {

        inset-inline-end: var(--x-spacing-tight)

    }



    [dir=ltr] ._1fragemu3 {

        right: var(--x-spacing-extra-loose)

    }



    [dir=rtl] ._1fragemu3 {

        left: var(--x-spacing-extra-loose)

    }



    ._1fragemu3 {

        inset-inline-end: var(--x-spacing-extra-loose)

    }



    [dir=ltr] ._1fragemu4 {

        left: 0

    }



    [dir=rtl] ._1fragemu4 {

        right: 0

    }



    ._1fragemu4 {

        inset-inline-start: 0

    }



    [dir=ltr] ._1fragemu5 {

        left: 50%

    }



    [dir=rtl] ._1fragemu5 {

        right: 50%

    }



    ._1fragemu5 {

        inset-inline-start: 50%

    }



    [dir=ltr] ._1fragemu6 {

        left: 100%

    }



    [dir=rtl] ._1fragemu6 {

        right: 100%

    }



    ._1fragemu6 {

        inset-inline-start: 100%

    }



    [dir=ltr] ._1fragemu7 {

        left: var(--x-spacing-small-500)

    }



    [dir=rtl] ._1fragemu7 {

        right: var(--x-spacing-small-500)

    }



    ._1fragemu7 {

        inset-inline-start: var(--x-spacing-small-500)

    }



    [dir=ltr] ._1fragemu8 {

        left: var(--x-spacing-small-400)

    }



    [dir=rtl] ._1fragemu8 {

        right: var(--x-spacing-small-400)

    }



    ._1fragemu8 {

        inset-inline-start: var(--x-spacing-small-400)

    }



    [dir=ltr] ._1fragemu9 {

        left: var(--x-spacing-small-300)

    }



    [dir=rtl] ._1fragemu9 {

        right: var(--x-spacing-small-300)

    }



    ._1fragemu9 {

        inset-inline-start: var(--x-spacing-small-300)

    }



    [dir=ltr] ._1fragemua {

        left: var(--x-spacing-small-200)

    }



    [dir=rtl] ._1fragemua {

        right: var(--x-spacing-small-200)

    }



    ._1fragemua {

        inset-inline-start: var(--x-spacing-small-200)

    }



    [dir=ltr] ._1fragemub {

        left: var(--x-spacing-small-100)

    }



    [dir=rtl] ._1fragemub {

        right: var(--x-spacing-small-100)

    }



    ._1fragemub {

        inset-inline-start: var(--x-spacing-small-100)

    }



    [dir=ltr] ._1fragemuc {

        left: var(--x-spacing-base)

    }



    [dir=rtl] ._1fragemuc {

        right: var(--x-spacing-base)

    }



    ._1fragemuc {

        inset-inline-start: var(--x-spacing-base)

    }



    [dir=ltr] ._1fragemud {

        left: var(--x-spacing-large-100)

    }



    [dir=rtl] ._1fragemud {

        right: var(--x-spacing-large-100)

    }



    ._1fragemud {

        inset-inline-start: var(--x-spacing-large-100)

    }



    [dir=ltr] ._1fragemue {

        left: var(--x-spacing-large-200)

    }



    [dir=rtl] ._1fragemue {

        right: var(--x-spacing-large-200)

    }



    ._1fragemue {

        inset-inline-start: var(--x-spacing-large-200)

    }



    [dir=ltr] ._1fragemuf {

        left: var(--x-spacing-large-300)

    }



    [dir=rtl] ._1fragemuf {

        right: var(--x-spacing-large-300)

    }



    ._1fragemuf {

        inset-inline-start: var(--x-spacing-large-300)

    }



    [dir=ltr] ._1fragemug {

        left: var(--x-spacing-large-400)

    }



    [dir=rtl] ._1fragemug {

        right: var(--x-spacing-large-400)

    }



    ._1fragemug {

        inset-inline-start: var(--x-spacing-large-400)

    }



    [dir=ltr] ._1fragemuh {

        left: var(--x-spacing-large-500)

    }



    [dir=rtl] ._1fragemuh {

        right: var(--x-spacing-large-500)

    }



    ._1fragemuh {

        inset-inline-start: var(--x-spacing-large-500)

    }



    [dir=ltr] ._1fragemui {

        left: var(--x-spacing-large-600)

    }



    [dir=rtl] ._1fragemui {

        right: var(--x-spacing-large-600)

    }



    ._1fragemui {

        inset-inline-start: var(--x-spacing-large-600)

    }



    [dir=ltr] ._1fragemuj {

        left: var(--x-spacing-extra-tight)

    }



    [dir=rtl] ._1fragemuj {

        right: var(--x-spacing-extra-tight)

    }



    ._1fragemuj {

        inset-inline-start: var(--x-spacing-extra-tight)

    }



    [dir=ltr] ._1fragemuk {

        left: var(--x-spacing-loose)

    }



    [dir=rtl] ._1fragemuk {

        right: var(--x-spacing-loose)

    }



    ._1fragemuk {

        inset-inline-start: var(--x-spacing-loose)

    }



    [dir=ltr] ._1fragemul {

        left: var(--x-spacing-tight)

    }



    [dir=rtl] ._1fragemul {

        right: var(--x-spacing-tight)

    }



    ._1fragemul {

        inset-inline-start: var(--x-spacing-tight)

    }



    [dir=ltr] ._1fragemum {

        left: var(--x-spacing-extra-loose)

    }



    [dir=rtl] ._1fragemum {

        right: var(--x-spacing-extra-loose)

    }



    ._1fragemum {

        inset-inline-start: var(--x-spacing-extra-loose)

    }



    ._1fragemun {

        overflow-x: auto

    }



    ._1fragemuo {

        overflow-x: hidden

    }



    ._1fragemup {

        overflow-y: auto

    }



    ._1fragemuq {

        overflow-y: hidden

    }



    ._1fragemur {

        margin: 0

    }



    ._1fragemus {

        margin: auto

    }



    ._1fragemut {

        min-inline-size: 100%;

        min-width: 100%

    }



    ._1fragemuu {

        opacity: 0

    }



    ._1fragemuv {

        opacity: .1

    }



    ._1fragemuw {

        opacity: .2

    }



    ._1fragemux {

        opacity: .25

    }



    ._1fragemuy {

        opacity: .3

    }



    ._1fragemuz {

        opacity: .4

    }



    ._1fragemv0 {

        opacity: .5

    }



    ._1fragemv1 {

        opacity: .6

    }



    ._1fragemv2 {

        opacity: .7

    }



    ._1fragemv3 {

        opacity: .75

    }



    ._1fragemv4 {

        opacity: .8

    }



    ._1fragemv5 {

        opacity: .9

    }



    ._1fragemv6 {

        opacity: 1

    }



    ._1fragemv7 {

        opacity: var(--x-opacity-disabled)

    }



    ._1fragemv8 {

        opacity: var(--x-opacity-readonly)

    }



    ._1fragemv9 {

        outline: white solid var(--x-border-width-base)

    }



    ._1fragemva {

        outline: 0 solid white

    }



    ._1fragemvb {

        pointer-events: none

    }



    ._1fragemvc {

        border-width: 0;

        clip: rect(0, 0, 0, 0);

        height: 1px;

        margin: -1px;

        overflow: hidden;

        padding: 0;

        position: absolute;

        white-space: nowrap;

        width: 1px

    }



    ._1fragemvd {

        text-align: center

    }



    [dir=ltr] ._1fragemve {

        text-align: right

    }



    [dir=rtl] ._1fragemve {

        text-align: left

    }



    ._1fragemve {

        text-align: end

    }



    [dir=ltr] ._1fragemvf {

        text-align: left

    }



    [dir=rtl] ._1fragemvf {

        text-align: right

    }



    ._1fragemvf {

        text-align: start

    }



    ._1fragemvg {

        text-decoration: none

    }



    ._1fragemvh {

        text-decoration: underline

    }



    ._1fragemvi {

        -webkit-text-decoration: lineThrough;

        text-decoration: lineThrough

    }



    ._1fragemvj {

        transition-duration: var(--x-duration-fast)

    }



    ._1fragemvk {

        transition-duration: var(--x-duration-base)

    }



    ._1fragemvl {

        transition-duration: var(--x-duration-slow)

    }



    ._1fragemvm {

        transition-duration: var(--x-duration-slower)

    }



    ._1fragemvn {

        transition-duration: var(--x-duration-slowest)

    }



    ._1fragemvo {

        transition-duration: 0s

    }



    ._1fragemvp {

        transition-property: all

    }



    ._1fragemvq {

        transition-property: color, background-color, border-color, box-shadow

    }



    ._1fragemvr {

        transition-property: height, max-height

    }



    ._1fragemvs {

        transition-property: none

    }



    ._1fragemvt {

        transition-property: opacity

    }



    ._1fragemvu {

        transition-timing-function: var(--x-timing-base)

    }



    ._1fragemvv {

        transition-timing-function: var(--x-timing-ease-out)

    }



    ._1fragemvw {

        transition-timing-function: var(--x-timing-linear)

    }



    ._1fragemvx {

        transition-timing-function: var(--x-timing-spring)

    }



    ._1fragemvy {

        transition-timing-function: ease-in-out

    }



    ._1fragemvz {

        -webkit-user-select: none;

        user-select: none

    }



    ._1fragemw0 {

        vertical-align: middle

    }



    ._1fragemw1 {

        z-index: 0

    }



    ._1fragemw2 {

        z-index: 1

    }



    ._1fragemw3 {

        z-index: 10

    }



    ._1fragemw4 {

        z-index: 20

    }



    ._1fragemw5 {

        z-index: inherit

    }



    ._1fragemw6 {

        z-index: -1

    }



    ._1fragemw7 {

        z-index: 1000

    }



    ._1fragemw8,

    ._1fragemw9:hover,

    ._1fragemwa:focus,

    ._1fragemwb:hover:focus {

        background-color: var(--x-default-color-background);

        color: var(--x-default-color-text)

    }



    ._1fragemwc,

    ._1fragemwd:hover,

    ._1fragemwe:focus,

    ._1fragemwf:hover:focus {

        background-color: var(--x-default-color-background-subdued);

        color: var(--x-default-color-text)

    }



    ._1fragemwg,

    ._1fragemwh:hover,

    ._1fragemwi:focus,

    ._1fragemwj:hover:focus {

        background-color: initial

    }



    @media screen and (min-width:570px) {

        ._1fragem1 {

            height: var(--x-spacing-small-500);

            block-size: var(--x-spacing-small-500)

        }



        ._1fragem6 {

            height: var(--x-spacing-small-400);

            block-size: var(--x-spacing-small-400)

        }



        ._1fragemb {

            height: var(--x-spacing-small-300);

            block-size: var(--x-spacing-small-300)

        }



        ._1fragemg {

            height: var(--x-spacing-small-200);

            block-size: var(--x-spacing-small-200)

        }



        ._1frageml {

            height: var(--x-spacing-small-100);

            block-size: var(--x-spacing-small-100)

        }



        ._1fragemq {

            height: var(--x-spacing-base);

            block-size: var(--x-spacing-base)

        }



        ._1fragemv {

            height: var(--x-spacing-large-100);

            block-size: var(--x-spacing-large-100)

        }



        ._1fragem10 {

            height: var(--x-spacing-large-200);

            block-size: var(--x-spacing-large-200)

        }



        ._1fragem15 {

            height: var(--x-spacing-large-300);

            block-size: var(--x-spacing-large-300)

        }



        ._1fragem1a {

            height: var(--x-spacing-large-400);

            block-size: var(--x-spacing-large-400)

        }



        ._1fragem1f {

            height: var(--x-spacing-large-500);

            block-size: var(--x-spacing-large-500)

        }



        ._1fragem1k {

            height: var(--x-spacing-large-600);

            block-size: var(--x-spacing-large-600)

        }



        ._1fragem1p {

            height: var(--x-spacing-extra-tight);

            block-size: var(--x-spacing-extra-tight)

        }



        ._1fragem1u {

            height: var(--x-spacing-loose);

            block-size: var(--x-spacing-loose)

        }



        ._1fragem1z {

            height: var(--x-spacing-tight);

            block-size: var(--x-spacing-tight)

        }



        ._1fragem24 {

            height: var(--x-spacing-extra-loose);

            block-size: var(--x-spacing-extra-loose)

        }



        ._1fragem29 {

            height: 0;

            block-size: 0

        }



        ._1fragem2e {

            height: 100%;

            block-size: 100%

        }



        ._1fragem2j {

            display: block

        }



        ._1fragem2o {

            display: contents

        }



        ._1fragem2t {

            display: flex

        }



        ._1fragem2y {

            display: inline

        }



        ._1fragem33 {

            display: inline-block

        }



        ._1fragem38 {

            display: inline-flex

        }



        ._1fragem3d {

            display: grid

        }



        ._1fragem3i {

            display: inline-grid

        }



        ._1fragem3n {

            display: none

        }



        ._1fragem3s {

            row-gap: var(--x-spacing-small-500)

        }



        ._1fragem3x {

            row-gap: var(--x-spacing-small-400)

        }



        ._1fragem42 {

            row-gap: var(--x-spacing-small-300)

        }



        ._1fragem47 {

            row-gap: var(--x-spacing-small-200)

        }



        ._1fragem4c {

            row-gap: var(--x-spacing-small-100)

        }



        ._1fragem4h {

            row-gap: var(--x-spacing-base)

        }



        ._1fragem4m {

            row-gap: var(--x-spacing-large-100)

        }



        ._1fragem4r {

            row-gap: var(--x-spacing-large-200)

        }



        ._1fragem4w {

            row-gap: var(--x-spacing-large-300)

        }



        ._1fragem51 {

            row-gap: var(--x-spacing-large-400)

        }



        ._1fragem56 {

            row-gap: var(--x-spacing-large-500)

        }



        ._1fragem5b {

            row-gap: var(--x-spacing-large-600)

        }



        ._1fragem5g {

            row-gap: var(--x-spacing-extra-tight)

        }



        ._1fragem5l {

            row-gap: var(--x-spacing-loose)

        }



        ._1fragem5q {

            row-gap: var(--x-spacing-tight)

        }



        ._1fragem5v {

            row-gap: var(--x-spacing-extra-loose)

        }



        ._1fragem60 {

            row-gap: 0

        }



        ._1fragem65 {

            column-gap: var(--x-spacing-small-500)

        }



        ._1fragem6a {

            column-gap: var(--x-spacing-small-400)

        }



        ._1fragem6f {

            column-gap: var(--x-spacing-small-300)

        }



        ._1fragem6k {

            column-gap: var(--x-spacing-small-200)

        }



        ._1fragem6p {

            column-gap: var(--x-spacing-small-100)

        }



        ._1fragem6u {

            column-gap: var(--x-spacing-base)

        }



        ._1fragem6z {

            column-gap: var(--x-spacing-large-100)

        }



        ._1fragem74 {

            column-gap: var(--x-spacing-large-200)

        }



        ._1fragem79 {

            column-gap: var(--x-spacing-large-300)

        }



        ._1fragem7e {

            column-gap: var(--x-spacing-large-400)

        }



        ._1fragem7j {

            column-gap: var(--x-spacing-large-500)

        }



        ._1fragem7o {

            column-gap: var(--x-spacing-large-600)

        }



        ._1fragem7t {

            column-gap: var(--x-spacing-extra-tight)

        }



        ._1fragem7y {

            column-gap: var(--x-spacing-loose)

        }



        ._1fragem83 {

            column-gap: var(--x-spacing-tight)

        }



        ._1fragem88 {

            column-gap: var(--x-spacing-extra-loose)

        }



        ._1fragem8d {

            column-gap: 0

        }



        [dir=ltr] ._1fragem8i {

            border-left: var(--x-border-width-base) none var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem8i {

            border-right: var(--x-border-width-base) none var(--x-default-color-border)

        }



        ._1fragem8i {

            --_13qz35y0: 0px;

            border-inline-start: var(--x-border-width-base) none var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem8n {

            border-left: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem8n {

            border-right: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        ._1fragem8n {

            --_13qz35y0: var(--x-border-width-base);

            border-inline-start: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem8s {

            border-left: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem8s {

            border-right: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        ._1fragem8s {

            --_13qz35y0: var(--x-border-width-base);

            border-inline-start: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem8x {

            border-left: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem8x {

            border-right: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        ._1fragem8x {

            --_13qz35y0: var(--x-border-width-base);

            border-inline-start: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem92 {

            border-right: var(--x-border-width-base) none var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem92 {

            border-left: var(--x-border-width-base) none var(--x-default-color-border)

        }



        ._1fragem92 {

            --_13qz35y1: 0px;

            border-inline-end: var(--x-border-width-base) none var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem97 {

            border-right: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem97 {

            border-left: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        ._1fragem97 {

            --_13qz35y1: var(--x-border-width-base);

            border-inline-end: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem9c {

            border-right: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem9c {

            border-left: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        ._1fragem9c {

            --_13qz35y1: var(--x-border-width-base);

            border-inline-end: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem9h {

            border-right: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem9h {

            border-left: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        ._1fragem9h {

            --_13qz35y1: var(--x-border-width-base);

            border-inline-end: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        ._1fragem9m {

            --_13qz35y2: 0px;

            border-block-start: var(--x-border-width-base) none var(--x-default-color-border);

            border-top: var(--x-border-width-base) none var(--x-default-color-border)

        }



        ._1fragem9r {

            border-block-start: var(--x-border-width-base) solid var(--x-default-color-border);

            border-top: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        ._1fragem9r,

        ._1fragem9w {

            --_13qz35y2: var(--x-border-width-base)

        }



        ._1fragem9w {

            border-block-start: var(--x-border-width-base) dotted var(--x-default-color-border);

            border-top: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        ._1fragema1 {

            --_13qz35y2: var(--x-border-width-base);

            border-block-start: var(--x-border-width-base) dashed var(--x-default-color-border);

            border-top: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        ._1fragema6 {

            --_13qz35y3: 0px;

            border-block-end: var(--x-border-width-base) none var(--x-default-color-border);

            border-bottom: var(--x-border-width-base) none var(--x-default-color-border)

        }



        ._1fragemab {

            border-block-end: var(--x-border-width-base) solid var(--x-default-color-border);

            border-bottom: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        ._1fragemab,

        ._1fragemag {

            --_13qz35y3: var(--x-border-width-base)

        }



        ._1fragemag {

            border-block-end: var(--x-border-width-base) dotted var(--x-default-color-border);

            border-bottom: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        ._1fragemal {

            --_13qz35y3: var(--x-border-width-base);

            border-block-end: var(--x-border-width-base) dashed var(--x-default-color-border);

            border-bottom: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        [dir=ltr] ._1fragemaq {

            border-left-width: var(--x-border-width-base)

        }



        [dir=rtl] ._1fragemaq {

            border-right-width: var(--x-border-width-base)

        }



        ._1fragemaq {

            --_13qz35y0: var(--x-border-width-base);

            border-inline-start-width: var(--x-border-width-base)

        }



        [dir=ltr] ._1fragemav {

            border-left-width: var(--x-border-width-medium)

        }



        [dir=rtl] ._1fragemav {

            border-right-width: var(--x-border-width-medium)

        }



        ._1fragemav {

            --_13qz35y0: var(--x-border-width-medium);

            border-inline-start-width: var(--x-border-width-medium)

        }



        [dir=ltr] ._1fragemb0 {

            border-left-width: var(--x-border-width-thick)

        }



        [dir=rtl] ._1fragemb0 {

            border-right-width: var(--x-border-width-thick)

        }



        ._1fragemb0 {

            --_13qz35y0: var(--x-border-width-thick);

            border-inline-start-width: var(--x-border-width-thick)

        }



        [dir=ltr] ._1fragemb5 {

            border-left-width: var(--x-border-width-extra-thick)

        }



        [dir=rtl] ._1fragemb5 {

            border-right-width: var(--x-border-width-extra-thick)

        }



        ._1fragemb5 {

            --_13qz35y0: var(--x-border-width-extra-thick);

            border-inline-start-width: var(--x-border-width-extra-thick)

        }



        [dir=ltr] ._1fragemba {

            border-left-width: 0

        }



        [dir=rtl] ._1fragemba {

            border-right-width: 0

        }



        ._1fragemba {

            --_13qz35y0: 0;

            border-inline-start-width: 0

        }



        [dir=ltr] ._1fragembf {

            border-right-width: var(--x-border-width-base)

        }



        [dir=rtl] ._1fragembf {

            border-left-width: var(--x-border-width-base)

        }



        ._1fragembf {

            --_13qz35y1: var(--x-border-width-base);

            border-inline-end-width: var(--x-border-width-base)

        }



        [dir=ltr] ._1fragembk {

            border-right-width: var(--x-border-width-medium)

        }



        [dir=rtl] ._1fragembk {

            border-left-width: var(--x-border-width-medium)

        }



        ._1fragembk {

            --_13qz35y1: var(--x-border-width-medium);

            border-inline-end-width: var(--x-border-width-medium)

        }



        [dir=ltr] ._1fragembp {

            border-right-width: var(--x-border-width-thick)

        }



        [dir=rtl] ._1fragembp {

            border-left-width: var(--x-border-width-thick)

        }



        ._1fragembp {

            --_13qz35y1: var(--x-border-width-thick);

            border-inline-end-width: var(--x-border-width-thick)

        }



        [dir=ltr] ._1fragembu {

            border-right-width: var(--x-border-width-extra-thick)

        }



        [dir=rtl] ._1fragembu {

            border-left-width: var(--x-border-width-extra-thick)

        }



        ._1fragembu {

            --_13qz35y1: var(--x-border-width-extra-thick);

            border-inline-end-width: var(--x-border-width-extra-thick)

        }



        [dir=ltr] ._1fragembz {

            border-right-width: 0

        }



        [dir=rtl] ._1fragembz {

            border-left-width: 0

        }



        ._1fragembz {

            --_13qz35y1: 0;

            border-inline-end-width: 0

        }



        ._1fragemc4 {

            --_13qz35y2: var(--x-border-width-base);

            border-block-start-width: var(--x-border-width-base);

            border-top-width: var(--x-border-width-base)

        }



        ._1fragemc9 {

            --_13qz35y2: var(--x-border-width-medium);

            border-block-start-width: var(--x-border-width-medium);

            border-top-width: var(--x-border-width-medium)

        }



        ._1fragemce {

            --_13qz35y2: var(--x-border-width-thick);

            border-block-start-width: var(--x-border-width-thick);

            border-top-width: var(--x-border-width-thick)

        }



        ._1fragemcj {

            --_13qz35y2: var(--x-border-width-extra-thick);

            border-block-start-width: var(--x-border-width-extra-thick);

            border-top-width: var(--x-border-width-extra-thick)

        }



        ._1fragemco {

            --_13qz35y2: 0;

            border-block-start-width: 0;

            border-top-width: 0

        }



        ._1fragemct {

            --_13qz35y3: var(--x-border-width-base);

            border-block-end-width: var(--x-border-width-base);

            border-bottom-width: var(--x-border-width-base)

        }



        ._1fragemcy {

            --_13qz35y3: var(--x-border-width-medium);

            border-block-end-width: var(--x-border-width-medium);

            border-bottom-width: var(--x-border-width-medium)

        }



        ._1fragemd3 {

            --_13qz35y3: var(--x-border-width-thick);

            border-block-end-width: var(--x-border-width-thick);

            border-bottom-width: var(--x-border-width-thick)

        }



        ._1fragemd8 {

            --_13qz35y3: var(--x-border-width-extra-thick);

            border-block-end-width: var(--x-border-width-extra-thick);

            border-bottom-width: var(--x-border-width-extra-thick)

        }



        ._1fragemdd {

            --_13qz35y3: 0;

            border-block-end-width: 0;

            border-bottom-width: 0

        }



        ._1fragemdi {

            padding-bottom: var(--x-spacing-small-500);

            padding-block-end: var(--x-spacing-small-500)

        }



        ._1fragemdn {

            padding-bottom: var(--x-spacing-small-400);

            padding-block-end: var(--x-spacing-small-400)

        }



        ._1fragemds {

            padding-bottom: var(--x-spacing-small-300);

            padding-block-end: var(--x-spacing-small-300)

        }



        ._1fragemdx {

            padding-bottom: var(--x-spacing-small-200);

            padding-block-end: var(--x-spacing-small-200)

        }



        ._1frageme2 {

            padding-bottom: var(--x-spacing-small-100);

            padding-block-end: var(--x-spacing-small-100)

        }



        ._1frageme7 {

            padding-bottom: var(--x-spacing-base);

            padding-block-end: var(--x-spacing-base)

        }



        ._1fragemec {

            padding-bottom: var(--x-spacing-large-100);

            padding-block-end: var(--x-spacing-large-100)

        }



        ._1fragemeh {

            padding-bottom: var(--x-spacing-large-200);

            padding-block-end: var(--x-spacing-large-200)

        }



        ._1fragemem {

            padding-bottom: var(--x-spacing-large-300);

            padding-block-end: var(--x-spacing-large-300)

        }



        ._1fragemer {

            padding-bottom: var(--x-spacing-large-400);

            padding-block-end: var(--x-spacing-large-400)

        }



        ._1fragemew {

            padding-bottom: var(--x-spacing-large-500);

            padding-block-end: var(--x-spacing-large-500)

        }



        ._1fragemf1 {

            padding-bottom: var(--x-spacing-large-600);

            padding-block-end: var(--x-spacing-large-600)

        }



        ._1fragemf6 {

            padding-bottom: var(--x-spacing-extra-tight);

            padding-block-end: var(--x-spacing-extra-tight)

        }



        ._1fragemfb {

            padding-bottom: var(--x-spacing-loose);

            padding-block-end: var(--x-spacing-loose)

        }



        ._1fragemfg {

            padding-bottom: var(--x-spacing-tight);

            padding-block-end: var(--x-spacing-tight)

        }



        ._1fragemfl {

            padding-bottom: var(--x-spacing-extra-loose);

            padding-block-end: var(--x-spacing-extra-loose)

        }



        ._1fragemfq {

            padding-bottom: 0;

            padding-block-end: 0

        }



        ._1fragemfv {

            padding-top: var(--x-spacing-small-500);

            padding-block-start: var(--x-spacing-small-500)

        }



        ._1fragemg0 {

            padding-top: var(--x-spacing-small-400);

            padding-block-start: var(--x-spacing-small-400)

        }



        ._1fragemg5 {

            padding-top: var(--x-spacing-small-300);

            padding-block-start: var(--x-spacing-small-300)

        }



        ._1fragemga {

            padding-top: var(--x-spacing-small-200);

            padding-block-start: var(--x-spacing-small-200)

        }



        ._1fragemgf {

            padding-top: var(--x-spacing-small-100);

            padding-block-start: var(--x-spacing-small-100)

        }



        ._1fragemgk {

            padding-top: var(--x-spacing-base);

            padding-block-start: var(--x-spacing-base)

        }



        ._1fragemgp {

            padding-top: var(--x-spacing-large-100);

            padding-block-start: var(--x-spacing-large-100)

        }



        ._1fragemgu {

            padding-top: var(--x-spacing-large-200);

            padding-block-start: var(--x-spacing-large-200)

        }



        ._1fragemgz {

            padding-top: var(--x-spacing-large-300);

            padding-block-start: var(--x-spacing-large-300)

        }



        ._1fragemh4 {

            padding-top: var(--x-spacing-large-400);

            padding-block-start: var(--x-spacing-large-400)

        }



        ._1fragemh9 {

            padding-top: var(--x-spacing-large-500);

            padding-block-start: var(--x-spacing-large-500)

        }



        ._1fragemhe {

            padding-top: var(--x-spacing-large-600);

            padding-block-start: var(--x-spacing-large-600)

        }



        ._1fragemhj {

            padding-top: var(--x-spacing-extra-tight);

            padding-block-start: var(--x-spacing-extra-tight)

        }



        ._1fragemho {

            padding-top: var(--x-spacing-loose);

            padding-block-start: var(--x-spacing-loose)

        }



        ._1fragemht {

            padding-top: var(--x-spacing-tight);

            padding-block-start: var(--x-spacing-tight)

        }



        ._1fragemhy {

            padding-top: var(--x-spacing-extra-loose);

            padding-block-start: var(--x-spacing-extra-loose)

        }



        ._1fragemi3 {

            padding-top: 0;

            padding-block-start: 0

        }



        [dir=ltr] ._1fragemi8 {

            padding-right: var(--x-spacing-small-500)

        }



        [dir=rtl] ._1fragemi8 {

            padding-left: var(--x-spacing-small-500)

        }



        ._1fragemi8 {

            padding-inline-end: var(--x-spacing-small-500)

        }



        [dir=ltr] ._1fragemid {

            padding-right: var(--x-spacing-small-400)

        }



        [dir=rtl] ._1fragemid {

            padding-left: var(--x-spacing-small-400)

        }



        ._1fragemid {

            padding-inline-end: var(--x-spacing-small-400)

        }



        [dir=ltr] ._1fragemii {

            padding-right: var(--x-spacing-small-300)

        }



        [dir=rtl] ._1fragemii {

            padding-left: var(--x-spacing-small-300)

        }



        ._1fragemii {

            padding-inline-end: var(--x-spacing-small-300)

        }



        [dir=ltr] ._1fragemin {

            padding-right: var(--x-spacing-small-200)

        }



        [dir=rtl] ._1fragemin {

            padding-left: var(--x-spacing-small-200)

        }



        ._1fragemin {

            padding-inline-end: var(--x-spacing-small-200)

        }



        [dir=ltr] ._1fragemis {

            padding-right: var(--x-spacing-small-100)

        }



        [dir=rtl] ._1fragemis {

            padding-left: var(--x-spacing-small-100)

        }



        ._1fragemis {

            padding-inline-end: var(--x-spacing-small-100)

        }



        [dir=ltr] ._1fragemix {

            padding-right: var(--x-spacing-base)

        }



        [dir=rtl] ._1fragemix {

            padding-left: var(--x-spacing-base)

        }



        ._1fragemix {

            padding-inline-end: var(--x-spacing-base)

        }



        [dir=ltr] ._1fragemj2 {

            padding-right: var(--x-spacing-large-100)

        }



        [dir=rtl] ._1fragemj2 {

            padding-left: var(--x-spacing-large-100)

        }



        ._1fragemj2 {

            padding-inline-end: var(--x-spacing-large-100)

        }



        [dir=ltr] ._1fragemj7 {

            padding-right: var(--x-spacing-large-200)

        }



        [dir=rtl] ._1fragemj7 {

            padding-left: var(--x-spacing-large-200)

        }



        ._1fragemj7 {

            padding-inline-end: var(--x-spacing-large-200)

        }



        [dir=ltr] ._1fragemjc {

            padding-right: var(--x-spacing-large-300)

        }



        [dir=rtl] ._1fragemjc {

            padding-left: var(--x-spacing-large-300)

        }



        ._1fragemjc {

            padding-inline-end: var(--x-spacing-large-300)

        }



        [dir=ltr] ._1fragemjh {

            padding-right: var(--x-spacing-large-400)

        }



        [dir=rtl] ._1fragemjh {

            padding-left: var(--x-spacing-large-400)

        }



        ._1fragemjh {

            padding-inline-end: var(--x-spacing-large-400)

        }



        [dir=ltr] ._1fragemjm {

            padding-right: var(--x-spacing-large-500)

        }



        [dir=rtl] ._1fragemjm {

            padding-left: var(--x-spacing-large-500)

        }



        ._1fragemjm {

            padding-inline-end: var(--x-spacing-large-500)

        }



        [dir=ltr] ._1fragemjr {

            padding-right: var(--x-spacing-large-600)

        }



        [dir=rtl] ._1fragemjr {

            padding-left: var(--x-spacing-large-600)

        }



        ._1fragemjr {

            padding-inline-end: var(--x-spacing-large-600)

        }



        [dir=ltr] ._1fragemjw {

            padding-right: var(--x-spacing-extra-tight)

        }



        [dir=rtl] ._1fragemjw {

            padding-left: var(--x-spacing-extra-tight)

        }



        ._1fragemjw {

            padding-inline-end: var(--x-spacing-extra-tight)

        }



        [dir=ltr] ._1fragemk1 {

            padding-right: var(--x-spacing-loose)

        }



        [dir=rtl] ._1fragemk1 {

            padding-left: var(--x-spacing-loose)

        }



        ._1fragemk1 {

            padding-inline-end: var(--x-spacing-loose)

        }



        [dir=ltr] ._1fragemk6 {

            padding-right: var(--x-spacing-tight)

        }



        [dir=rtl] ._1fragemk6 {

            padding-left: var(--x-spacing-tight)

        }



        ._1fragemk6 {

            padding-inline-end: var(--x-spacing-tight)

        }



        [dir=ltr] ._1fragemkb {

            padding-right: var(--x-spacing-extra-loose)

        }



        [dir=rtl] ._1fragemkb {

            padding-left: var(--x-spacing-extra-loose)

        }



        ._1fragemkb {

            padding-inline-end: var(--x-spacing-extra-loose)

        }



        [dir=ltr] ._1fragemkg {

            padding-right: 0

        }



        [dir=rtl] ._1fragemkg {

            padding-left: 0

        }



        ._1fragemkg {

            padding-inline-end: 0

        }



        [dir=ltr] ._1fragemkl {

            padding-left: var(--x-spacing-small-500)

        }



        [dir=rtl] ._1fragemkl {

            padding-right: var(--x-spacing-small-500)

        }



        ._1fragemkl {

            padding-inline-start: var(--x-spacing-small-500)

        }



        [dir=ltr] ._1fragemkq {

            padding-left: var(--x-spacing-small-400)

        }



        [dir=rtl] ._1fragemkq {

            padding-right: var(--x-spacing-small-400)

        }



        ._1fragemkq {

            padding-inline-start: var(--x-spacing-small-400)

        }



        [dir=ltr] ._1fragemkv {

            padding-left: var(--x-spacing-small-300)

        }



        [dir=rtl] ._1fragemkv {

            padding-right: var(--x-spacing-small-300)

        }



        ._1fragemkv {

            padding-inline-start: var(--x-spacing-small-300)

        }



        [dir=ltr] ._1frageml0 {

            padding-left: var(--x-spacing-small-200)

        }



        [dir=rtl] ._1frageml0 {

            padding-right: var(--x-spacing-small-200)

        }



        ._1frageml0 {

            padding-inline-start: var(--x-spacing-small-200)

        }



        [dir=ltr] ._1frageml5 {

            padding-left: var(--x-spacing-small-100)

        }



        [dir=rtl] ._1frageml5 {

            padding-right: var(--x-spacing-small-100)

        }



        ._1frageml5 {

            padding-inline-start: var(--x-spacing-small-100)

        }



        [dir=ltr] ._1fragemla {

            padding-left: var(--x-spacing-base)

        }



        [dir=rtl] ._1fragemla {

            padding-right: var(--x-spacing-base)

        }



        ._1fragemla {

            padding-inline-start: var(--x-spacing-base)

        }



        [dir=ltr] ._1fragemlf {

            padding-left: var(--x-spacing-large-100)

        }



        [dir=rtl] ._1fragemlf {

            padding-right: var(--x-spacing-large-100)

        }



        ._1fragemlf {

            padding-inline-start: var(--x-spacing-large-100)

        }



        [dir=ltr] ._1fragemlk {

            padding-left: var(--x-spacing-large-200)

        }



        [dir=rtl] ._1fragemlk {

            padding-right: var(--x-spacing-large-200)

        }



        ._1fragemlk {

            padding-inline-start: var(--x-spacing-large-200)

        }



        [dir=ltr] ._1fragemlp {

            padding-left: var(--x-spacing-large-300)

        }



        [dir=rtl] ._1fragemlp {

            padding-right: var(--x-spacing-large-300)

        }



        ._1fragemlp {

            padding-inline-start: var(--x-spacing-large-300)

        }



        [dir=ltr] ._1fragemlu {

            padding-left: var(--x-spacing-large-400)

        }



        [dir=rtl] ._1fragemlu {

            padding-right: var(--x-spacing-large-400)

        }



        ._1fragemlu {

            padding-inline-start: var(--x-spacing-large-400)

        }



        [dir=ltr] ._1fragemlz {

            padding-left: var(--x-spacing-large-500)

        }



        [dir=rtl] ._1fragemlz {

            padding-right: var(--x-spacing-large-500)

        }



        ._1fragemlz {

            padding-inline-start: var(--x-spacing-large-500)

        }



        [dir=ltr] ._1fragemm4 {

            padding-left: var(--x-spacing-large-600)

        }



        [dir=rtl] ._1fragemm4 {

            padding-right: var(--x-spacing-large-600)

        }



        ._1fragemm4 {

            padding-inline-start: var(--x-spacing-large-600)

        }



        [dir=ltr] ._1fragemm9 {

            padding-left: var(--x-spacing-extra-tight)

        }



        [dir=rtl] ._1fragemm9 {

            padding-right: var(--x-spacing-extra-tight)

        }



        ._1fragemm9 {

            padding-inline-start: var(--x-spacing-extra-tight)

        }



        [dir=ltr] ._1fragemme {

            padding-left: var(--x-spacing-loose)

        }



        [dir=rtl] ._1fragemme {

            padding-right: var(--x-spacing-loose)

        }



        ._1fragemme {

            padding-inline-start: var(--x-spacing-loose)

        }



        [dir=ltr] ._1fragemmj {

            padding-left: var(--x-spacing-tight)

        }



        [dir=rtl] ._1fragemmj {

            padding-right: var(--x-spacing-tight)

        }



        ._1fragemmj {

            padding-inline-start: var(--x-spacing-tight)

        }



        [dir=ltr] ._1fragemmo {

            padding-left: var(--x-spacing-extra-loose)

        }



        [dir=rtl] ._1fragemmo {

            padding-right: var(--x-spacing-extra-loose)

        }



        ._1fragemmo {

            padding-inline-start: var(--x-spacing-extra-loose)

        }



        [dir=ltr] ._1fragemmt {

            padding-left: 0

        }



        [dir=rtl] ._1fragemmt {

            padding-right: 0

        }



        ._1fragemmt {

            padding-inline-start: 0

        }



        ._1fragemmy {

            max-height: 100%;

            max-block-size: 100%

        }



        ._1fragemn3 {

            max-width: 100%;

            max-inline-size: 100%

        }



        ._1fragemn8 {

            min-block-size: 100%;

            min-height: 100%

        }



        ._1fragemnd {

            min-block-size: 100vh;

            min-height: 100vh

        }



        ._1fragemni {

            object-fit: contain

        }



        ._1fragemnn {

            object-fit: cover

        }



        ._1fragemns {

            position: absolute

        }



        ._1fragemnx {

            position: fixed

        }



        ._1fragemo2 {

            position: relative

        }



        ._1fragemo7 {

            position: static

        }



        ._1fragemoc {

            position: sticky

        }



        ._1fragemoh {

            grid-auto-flow: column

        }



        ._1fragemom {

            grid-auto-flow: row

        }

    }



    @media screen and (min-width:750px) {

        ._1fragem2 {

            height: var(--x-spacing-small-500);

            block-size: var(--x-spacing-small-500)

        }



        ._1fragem7 {

            height: var(--x-spacing-small-400);

            block-size: var(--x-spacing-small-400)

        }



        ._1fragemc {

            height: var(--x-spacing-small-300);

            block-size: var(--x-spacing-small-300)

        }



        ._1fragemh {

            height: var(--x-spacing-small-200);

            block-size: var(--x-spacing-small-200)

        }



        ._1fragemm {

            height: var(--x-spacing-small-100);

            block-size: var(--x-spacing-small-100)

        }



        ._1fragemr {

            height: var(--x-spacing-base);

            block-size: var(--x-spacing-base)

        }



        ._1fragemw {

            height: var(--x-spacing-large-100);

            block-size: var(--x-spacing-large-100)

        }



        ._1fragem11 {

            height: var(--x-spacing-large-200);

            block-size: var(--x-spacing-large-200)

        }



        ._1fragem16 {

            height: var(--x-spacing-large-300);

            block-size: var(--x-spacing-large-300)

        }



        ._1fragem1b {

            height: var(--x-spacing-large-400);

            block-size: var(--x-spacing-large-400)

        }



        ._1fragem1g {

            height: var(--x-spacing-large-500);

            block-size: var(--x-spacing-large-500)

        }



        ._1fragem1l {

            height: var(--x-spacing-large-600);

            block-size: var(--x-spacing-large-600)

        }



        ._1fragem1q {

            height: var(--x-spacing-extra-tight);

            block-size: var(--x-spacing-extra-tight)

        }



        ._1fragem1v {

            height: var(--x-spacing-loose);

            block-size: var(--x-spacing-loose)

        }



        ._1fragem20 {

            height: var(--x-spacing-tight);

            block-size: var(--x-spacing-tight)

        }



        ._1fragem25 {

            height: var(--x-spacing-extra-loose);

            block-size: var(--x-spacing-extra-loose)

        }



        ._1fragem2a {

            height: 0;

            block-size: 0

        }



        ._1fragem2f {

            height: 100%;

            block-size: 100%

        }



        ._1fragem2k {

            display: block

        }



        ._1fragem2p {

            display: contents

        }



        ._1fragem2u {

            display: flex

        }



        ._1fragem2z {

            display: inline

        }



        ._1fragem34 {

            display: inline-block

        }



        ._1fragem39 {

            display: inline-flex

        }



        ._1fragem3e {

            display: grid

        }



        ._1fragem3j {

            display: inline-grid

        }



        ._1fragem3o {

            display: none

        }



        ._1fragem3t {

            row-gap: var(--x-spacing-small-500)

        }



        ._1fragem3y {

            row-gap: var(--x-spacing-small-400)

        }



        ._1fragem43 {

            row-gap: var(--x-spacing-small-300)

        }



        ._1fragem48 {

            row-gap: var(--x-spacing-small-200)

        }



        ._1fragem4d {

            row-gap: var(--x-spacing-small-100)

        }



        ._1fragem4i {

            row-gap: var(--x-spacing-base)

        }



        ._1fragem4n {

            row-gap: var(--x-spacing-large-100)

        }



        ._1fragem4s {

            row-gap: var(--x-spacing-large-200)

        }



        ._1fragem4x {

            row-gap: var(--x-spacing-large-300)

        }



        ._1fragem52 {

            row-gap: var(--x-spacing-large-400)

        }



        ._1fragem57 {

            row-gap: var(--x-spacing-large-500)

        }



        ._1fragem5c {

            row-gap: var(--x-spacing-large-600)

        }



        ._1fragem5h {

            row-gap: var(--x-spacing-extra-tight)

        }



        ._1fragem5m {

            row-gap: var(--x-spacing-loose)

        }



        ._1fragem5r {

            row-gap: var(--x-spacing-tight)

        }



        ._1fragem5w {

            row-gap: var(--x-spacing-extra-loose)

        }



        ._1fragem61 {

            row-gap: 0

        }



        ._1fragem66 {

            column-gap: var(--x-spacing-small-500)

        }



        ._1fragem6b {

            column-gap: var(--x-spacing-small-400)

        }



        ._1fragem6g {

            column-gap: var(--x-spacing-small-300)

        }



        ._1fragem6l {

            column-gap: var(--x-spacing-small-200)

        }



        ._1fragem6q {

            column-gap: var(--x-spacing-small-100)

        }



        ._1fragem6v {

            column-gap: var(--x-spacing-base)

        }



        ._1fragem70 {

            column-gap: var(--x-spacing-large-100)

        }



        ._1fragem75 {

            column-gap: var(--x-spacing-large-200)

        }



        ._1fragem7a {

            column-gap: var(--x-spacing-large-300)

        }



        ._1fragem7f {

            column-gap: var(--x-spacing-large-400)

        }



        ._1fragem7k {

            column-gap: var(--x-spacing-large-500)

        }



        ._1fragem7p {

            column-gap: var(--x-spacing-large-600)

        }



        ._1fragem7u {

            column-gap: var(--x-spacing-extra-tight)

        }



        ._1fragem7z {

            column-gap: var(--x-spacing-loose)

        }



        ._1fragem84 {

            column-gap: var(--x-spacing-tight)

        }



        ._1fragem89 {

            column-gap: var(--x-spacing-extra-loose)

        }



        ._1fragem8e {

            column-gap: 0

        }



        [dir=ltr] ._1fragem8j {

            border-left: var(--x-border-width-base) none var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem8j {

            border-right: var(--x-border-width-base) none var(--x-default-color-border)

        }



        ._1fragem8j {

            --_13qz35y0: 0px;

            border-inline-start: var(--x-border-width-base) none var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem8o {

            border-left: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem8o {

            border-right: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        ._1fragem8o {

            --_13qz35y0: var(--x-border-width-base);

            border-inline-start: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem8t {

            border-left: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem8t {

            border-right: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        ._1fragem8t {

            --_13qz35y0: var(--x-border-width-base);

            border-inline-start: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem8y {

            border-left: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem8y {

            border-right: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        ._1fragem8y {

            --_13qz35y0: var(--x-border-width-base);

            border-inline-start: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem93 {

            border-right: var(--x-border-width-base) none var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem93 {

            border-left: var(--x-border-width-base) none var(--x-default-color-border)

        }



        ._1fragem93 {

            --_13qz35y1: 0px;

            border-inline-end: var(--x-border-width-base) none var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem98 {

            border-right: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem98 {

            border-left: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        ._1fragem98 {

            --_13qz35y1: var(--x-border-width-base);

            border-inline-end: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem9d {

            border-right: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem9d {

            border-left: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        ._1fragem9d {

            --_13qz35y1: var(--x-border-width-base);

            border-inline-end: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem9i {

            border-right: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem9i {

            border-left: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        ._1fragem9i {

            --_13qz35y1: var(--x-border-width-base);

            border-inline-end: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        ._1fragem9n {

            --_13qz35y2: 0px;

            border-block-start: var(--x-border-width-base) none var(--x-default-color-border);

            border-top: var(--x-border-width-base) none var(--x-default-color-border)

        }



        ._1fragem9s {

            border-block-start: var(--x-border-width-base) solid var(--x-default-color-border);

            border-top: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        ._1fragem9s,

        ._1fragem9x {

            --_13qz35y2: var(--x-border-width-base)

        }



        ._1fragem9x {

            border-block-start: var(--x-border-width-base) dotted var(--x-default-color-border);

            border-top: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        ._1fragema2 {

            --_13qz35y2: var(--x-border-width-base);

            border-block-start: var(--x-border-width-base) dashed var(--x-default-color-border);

            border-top: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        ._1fragema7 {

            --_13qz35y3: 0px;

            border-block-end: var(--x-border-width-base) none var(--x-default-color-border);

            border-bottom: var(--x-border-width-base) none var(--x-default-color-border)

        }



        ._1fragemac {

            border-block-end: var(--x-border-width-base) solid var(--x-default-color-border);

            border-bottom: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        ._1fragemac,

        ._1fragemah {

            --_13qz35y3: var(--x-border-width-base)

        }



        ._1fragemah {

            border-block-end: var(--x-border-width-base) dotted var(--x-default-color-border);

            border-bottom: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        ._1fragemam {

            --_13qz35y3: var(--x-border-width-base);

            border-block-end: var(--x-border-width-base) dashed var(--x-default-color-border);

            border-bottom: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        [dir=ltr] ._1fragemar {

            border-left-width: var(--x-border-width-base)

        }



        [dir=rtl] ._1fragemar {

            border-right-width: var(--x-border-width-base)

        }



        ._1fragemar {

            --_13qz35y0: var(--x-border-width-base);

            border-inline-start-width: var(--x-border-width-base)

        }



        [dir=ltr] ._1fragemaw {

            border-left-width: var(--x-border-width-medium)

        }



        [dir=rtl] ._1fragemaw {

            border-right-width: var(--x-border-width-medium)

        }



        ._1fragemaw {

            --_13qz35y0: var(--x-border-width-medium);

            border-inline-start-width: var(--x-border-width-medium)

        }



        [dir=ltr] ._1fragemb1 {

            border-left-width: var(--x-border-width-thick)

        }



        [dir=rtl] ._1fragemb1 {

            border-right-width: var(--x-border-width-thick)

        }



        ._1fragemb1 {

            --_13qz35y0: var(--x-border-width-thick);

            border-inline-start-width: var(--x-border-width-thick)

        }



        [dir=ltr] ._1fragemb6 {

            border-left-width: var(--x-border-width-extra-thick)

        }



        [dir=rtl] ._1fragemb6 {

            border-right-width: var(--x-border-width-extra-thick)

        }



        ._1fragemb6 {

            --_13qz35y0: var(--x-border-width-extra-thick);

            border-inline-start-width: var(--x-border-width-extra-thick)

        }



        [dir=ltr] ._1fragembb {

            border-left-width: 0

        }



        [dir=rtl] ._1fragembb {

            border-right-width: 0

        }



        ._1fragembb {

            --_13qz35y0: 0;

            border-inline-start-width: 0

        }



        [dir=ltr] ._1fragembg {

            border-right-width: var(--x-border-width-base)

        }



        [dir=rtl] ._1fragembg {

            border-left-width: var(--x-border-width-base)

        }



        ._1fragembg {

            --_13qz35y1: var(--x-border-width-base);

            border-inline-end-width: var(--x-border-width-base)

        }



        [dir=ltr] ._1fragembl {

            border-right-width: var(--x-border-width-medium)

        }



        [dir=rtl] ._1fragembl {

            border-left-width: var(--x-border-width-medium)

        }



        ._1fragembl {

            --_13qz35y1: var(--x-border-width-medium);

            border-inline-end-width: var(--x-border-width-medium)

        }



        [dir=ltr] ._1fragembq {

            border-right-width: var(--x-border-width-thick)

        }



        [dir=rtl] ._1fragembq {

            border-left-width: var(--x-border-width-thick)

        }



        ._1fragembq {

            --_13qz35y1: var(--x-border-width-thick);

            border-inline-end-width: var(--x-border-width-thick)

        }



        [dir=ltr] ._1fragembv {

            border-right-width: var(--x-border-width-extra-thick)

        }



        [dir=rtl] ._1fragembv {

            border-left-width: var(--x-border-width-extra-thick)

        }



        ._1fragembv {

            --_13qz35y1: var(--x-border-width-extra-thick);

            border-inline-end-width: var(--x-border-width-extra-thick)

        }



        [dir=ltr] ._1fragemc0 {

            border-right-width: 0

        }



        [dir=rtl] ._1fragemc0 {

            border-left-width: 0

        }



        ._1fragemc0 {

            --_13qz35y1: 0;

            border-inline-end-width: 0

        }



        ._1fragemc5 {

            --_13qz35y2: var(--x-border-width-base);

            border-block-start-width: var(--x-border-width-base);

            border-top-width: var(--x-border-width-base)

        }



        ._1fragemca {

            --_13qz35y2: var(--x-border-width-medium);

            border-block-start-width: var(--x-border-width-medium);

            border-top-width: var(--x-border-width-medium)

        }



        ._1fragemcf {

            --_13qz35y2: var(--x-border-width-thick);

            border-block-start-width: var(--x-border-width-thick);

            border-top-width: var(--x-border-width-thick)

        }



        ._1fragemck {

            --_13qz35y2: var(--x-border-width-extra-thick);

            border-block-start-width: var(--x-border-width-extra-thick);

            border-top-width: var(--x-border-width-extra-thick)

        }



        ._1fragemcp {

            --_13qz35y2: 0;

            border-block-start-width: 0;

            border-top-width: 0

        }



        ._1fragemcu {

            --_13qz35y3: var(--x-border-width-base);

            border-block-end-width: var(--x-border-width-base);

            border-bottom-width: var(--x-border-width-base)

        }



        ._1fragemcz {

            --_13qz35y3: var(--x-border-width-medium);

            border-block-end-width: var(--x-border-width-medium);

            border-bottom-width: var(--x-border-width-medium)

        }



        ._1fragemd4 {

            --_13qz35y3: var(--x-border-width-thick);

            border-block-end-width: var(--x-border-width-thick);

            border-bottom-width: var(--x-border-width-thick)

        }



        ._1fragemd9 {

            --_13qz35y3: var(--x-border-width-extra-thick);

            border-block-end-width: var(--x-border-width-extra-thick);

            border-bottom-width: var(--x-border-width-extra-thick)

        }



        ._1fragemde {

            --_13qz35y3: 0;

            border-block-end-width: 0;

            border-bottom-width: 0

        }



        ._1fragemdj {

            padding-bottom: var(--x-spacing-small-500);

            padding-block-end: var(--x-spacing-small-500)

        }



        ._1fragemdo {

            padding-bottom: var(--x-spacing-small-400);

            padding-block-end: var(--x-spacing-small-400)

        }



        ._1fragemdt {

            padding-bottom: var(--x-spacing-small-300);

            padding-block-end: var(--x-spacing-small-300)

        }



        ._1fragemdy {

            padding-bottom: var(--x-spacing-small-200);

            padding-block-end: var(--x-spacing-small-200)

        }



        ._1frageme3 {

            padding-bottom: var(--x-spacing-small-100);

            padding-block-end: var(--x-spacing-small-100)

        }



        ._1frageme8 {

            padding-bottom: var(--x-spacing-base);

            padding-block-end: var(--x-spacing-base)

        }



        ._1fragemed {

            padding-bottom: var(--x-spacing-large-100);

            padding-block-end: var(--x-spacing-large-100)

        }



        ._1fragemei {

            padding-bottom: var(--x-spacing-large-200);

            padding-block-end: var(--x-spacing-large-200)

        }



        ._1fragemen {

            padding-bottom: var(--x-spacing-large-300);

            padding-block-end: var(--x-spacing-large-300)

        }



        ._1fragemes {

            padding-bottom: var(--x-spacing-large-400);

            padding-block-end: var(--x-spacing-large-400)

        }



        ._1fragemex {

            padding-bottom: var(--x-spacing-large-500);

            padding-block-end: var(--x-spacing-large-500)

        }



        ._1fragemf2 {

            padding-bottom: var(--x-spacing-large-600);

            padding-block-end: var(--x-spacing-large-600)

        }



        ._1fragemf7 {

            padding-bottom: var(--x-spacing-extra-tight);

            padding-block-end: var(--x-spacing-extra-tight)

        }



        ._1fragemfc {

            padding-bottom: var(--x-spacing-loose);

            padding-block-end: var(--x-spacing-loose)

        }



        ._1fragemfh {

            padding-bottom: var(--x-spacing-tight);

            padding-block-end: var(--x-spacing-tight)

        }



        ._1fragemfm {

            padding-bottom: var(--x-spacing-extra-loose);

            padding-block-end: var(--x-spacing-extra-loose)

        }



        ._1fragemfr {

            padding-bottom: 0;

            padding-block-end: 0

        }



        ._1fragemfw {

            padding-top: var(--x-spacing-small-500);

            padding-block-start: var(--x-spacing-small-500)

        }



        ._1fragemg1 {

            padding-top: var(--x-spacing-small-400);

            padding-block-start: var(--x-spacing-small-400)

        }



        ._1fragemg6 {

            padding-top: var(--x-spacing-small-300);

            padding-block-start: var(--x-spacing-small-300)

        }



        ._1fragemgb {

            padding-top: var(--x-spacing-small-200);

            padding-block-start: var(--x-spacing-small-200)

        }



        ._1fragemgg {

            padding-top: var(--x-spacing-small-100);

            padding-block-start: var(--x-spacing-small-100)

        }



        ._1fragemgl {

            padding-top: var(--x-spacing-base);

            padding-block-start: var(--x-spacing-base)

        }



        ._1fragemgq {

            padding-top: var(--x-spacing-large-100);

            padding-block-start: var(--x-spacing-large-100)

        }



        ._1fragemgv {

            padding-top: var(--x-spacing-large-200);

            padding-block-start: var(--x-spacing-large-200)

        }



        ._1fragemh0 {

            padding-top: var(--x-spacing-large-300);

            padding-block-start: var(--x-spacing-large-300)

        }



        ._1fragemh5 {

            padding-top: var(--x-spacing-large-400);

            padding-block-start: var(--x-spacing-large-400)

        }



        ._1fragemha {

            padding-top: var(--x-spacing-large-500);

            padding-block-start: var(--x-spacing-large-500)

        }



        ._1fragemhf {

            padding-top: var(--x-spacing-large-600);

            padding-block-start: var(--x-spacing-large-600)

        }



        ._1fragemhk {

            padding-top: var(--x-spacing-extra-tight);

            padding-block-start: var(--x-spacing-extra-tight)

        }



        ._1fragemhp {

            padding-top: var(--x-spacing-loose);

            padding-block-start: var(--x-spacing-loose)

        }



        ._1fragemhu {

            padding-top: var(--x-spacing-tight);

            padding-block-start: var(--x-spacing-tight)

        }



        ._1fragemhz {

            padding-top: var(--x-spacing-extra-loose);

            padding-block-start: var(--x-spacing-extra-loose)

        }



        ._1fragemi4 {

            padding-top: 0;

            padding-block-start: 0

        }



        [dir=ltr] ._1fragemi9 {

            padding-right: var(--x-spacing-small-500)

        }



        [dir=rtl] ._1fragemi9 {

            padding-left: var(--x-spacing-small-500)

        }



        ._1fragemi9 {

            padding-inline-end: var(--x-spacing-small-500)

        }



        [dir=ltr] ._1fragemie {

            padding-right: var(--x-spacing-small-400)

        }



        [dir=rtl] ._1fragemie {

            padding-left: var(--x-spacing-small-400)

        }



        ._1fragemie {

            padding-inline-end: var(--x-spacing-small-400)

        }



        [dir=ltr] ._1fragemij {

            padding-right: var(--x-spacing-small-300)

        }



        [dir=rtl] ._1fragemij {

            padding-left: var(--x-spacing-small-300)

        }



        ._1fragemij {

            padding-inline-end: var(--x-spacing-small-300)

        }



        [dir=ltr] ._1fragemio {

            padding-right: var(--x-spacing-small-200)

        }



        [dir=rtl] ._1fragemio {

            padding-left: var(--x-spacing-small-200)

        }



        ._1fragemio {

            padding-inline-end: var(--x-spacing-small-200)

        }



        [dir=ltr] ._1fragemit {

            padding-right: var(--x-spacing-small-100)

        }



        [dir=rtl] ._1fragemit {

            padding-left: var(--x-spacing-small-100)

        }



        ._1fragemit {

            padding-inline-end: var(--x-spacing-small-100)

        }



        [dir=ltr] ._1fragemiy {

            padding-right: var(--x-spacing-base)

        }



        [dir=rtl] ._1fragemiy {

            padding-left: var(--x-spacing-base)

        }



        ._1fragemiy {

            padding-inline-end: var(--x-spacing-base)

        }



        [dir=ltr] ._1fragemj3 {

            padding-right: var(--x-spacing-large-100)

        }



        [dir=rtl] ._1fragemj3 {

            padding-left: var(--x-spacing-large-100)

        }



        ._1fragemj3 {

            padding-inline-end: var(--x-spacing-large-100)

        }



        [dir=ltr] ._1fragemj8 {

            padding-right: var(--x-spacing-large-200)

        }



        [dir=rtl] ._1fragemj8 {

            padding-left: var(--x-spacing-large-200)

        }



        ._1fragemj8 {

            padding-inline-end: var(--x-spacing-large-200)

        }



        [dir=ltr] ._1fragemjd {

            padding-right: var(--x-spacing-large-300)

        }



        [dir=rtl] ._1fragemjd {

            padding-left: var(--x-spacing-large-300)

        }



        ._1fragemjd {

            padding-inline-end: var(--x-spacing-large-300)

        }



        [dir=ltr] ._1fragemji {

            padding-right: var(--x-spacing-large-400)

        }



        [dir=rtl] ._1fragemji {

            padding-left: var(--x-spacing-large-400)

        }



        ._1fragemji {

            padding-inline-end: var(--x-spacing-large-400)

        }



        [dir=ltr] ._1fragemjn {

            padding-right: var(--x-spacing-large-500)

        }



        [dir=rtl] ._1fragemjn {

            padding-left: var(--x-spacing-large-500)

        }



        ._1fragemjn {

            padding-inline-end: var(--x-spacing-large-500)

        }



        [dir=ltr] ._1fragemjs {

            padding-right: var(--x-spacing-large-600)

        }



        [dir=rtl] ._1fragemjs {

            padding-left: var(--x-spacing-large-600)

        }



        ._1fragemjs {

            padding-inline-end: var(--x-spacing-large-600)

        }



        [dir=ltr] ._1fragemjx {

            padding-right: var(--x-spacing-extra-tight)

        }



        [dir=rtl] ._1fragemjx {

            padding-left: var(--x-spacing-extra-tight)

        }



        ._1fragemjx {

            padding-inline-end: var(--x-spacing-extra-tight)

        }



        [dir=ltr] ._1fragemk2 {

            padding-right: var(--x-spacing-loose)

        }



        [dir=rtl] ._1fragemk2 {

            padding-left: var(--x-spacing-loose)

        }



        ._1fragemk2 {

            padding-inline-end: var(--x-spacing-loose)

        }



        [dir=ltr] ._1fragemk7 {

            padding-right: var(--x-spacing-tight)

        }



        [dir=rtl] ._1fragemk7 {

            padding-left: var(--x-spacing-tight)

        }



        ._1fragemk7 {

            padding-inline-end: var(--x-spacing-tight)

        }



        [dir=ltr] ._1fragemkc {

            padding-right: var(--x-spacing-extra-loose)

        }



        [dir=rtl] ._1fragemkc {

            padding-left: var(--x-spacing-extra-loose)

        }



        ._1fragemkc {

            padding-inline-end: var(--x-spacing-extra-loose)

        }



        [dir=ltr] ._1fragemkh {

            padding-right: 0

        }



        [dir=rtl] ._1fragemkh {

            padding-left: 0

        }



        ._1fragemkh {

            padding-inline-end: 0

        }



        [dir=ltr] ._1fragemkm {

            padding-left: var(--x-spacing-small-500)

        }



        [dir=rtl] ._1fragemkm {

            padding-right: var(--x-spacing-small-500)

        }



        ._1fragemkm {

            padding-inline-start: var(--x-spacing-small-500)

        }



        [dir=ltr] ._1fragemkr {

            padding-left: var(--x-spacing-small-400)

        }



        [dir=rtl] ._1fragemkr {

            padding-right: var(--x-spacing-small-400)

        }



        ._1fragemkr {

            padding-inline-start: var(--x-spacing-small-400)

        }



        [dir=ltr] ._1fragemkw {

            padding-left: var(--x-spacing-small-300)

        }



        [dir=rtl] ._1fragemkw {

            padding-right: var(--x-spacing-small-300)

        }



        ._1fragemkw {

            padding-inline-start: var(--x-spacing-small-300)

        }



        [dir=ltr] ._1frageml1 {

            padding-left: var(--x-spacing-small-200)

        }



        [dir=rtl] ._1frageml1 {

            padding-right: var(--x-spacing-small-200)

        }



        ._1frageml1 {

            padding-inline-start: var(--x-spacing-small-200)

        }



        [dir=ltr] ._1frageml6 {

            padding-left: var(--x-spacing-small-100)

        }



        [dir=rtl] ._1frageml6 {

            padding-right: var(--x-spacing-small-100)

        }



        ._1frageml6 {

            padding-inline-start: var(--x-spacing-small-100)

        }



        [dir=ltr] ._1fragemlb {

            padding-left: var(--x-spacing-base)

        }



        [dir=rtl] ._1fragemlb {

            padding-right: var(--x-spacing-base)

        }



        ._1fragemlb {

            padding-inline-start: var(--x-spacing-base)

        }



        [dir=ltr] ._1fragemlg {

            padding-left: var(--x-spacing-large-100)

        }



        [dir=rtl] ._1fragemlg {

            padding-right: var(--x-spacing-large-100)

        }



        ._1fragemlg {

            padding-inline-start: var(--x-spacing-large-100)

        }



        [dir=ltr] ._1fragemll {

            padding-left: var(--x-spacing-large-200)

        }



        [dir=rtl] ._1fragemll {

            padding-right: var(--x-spacing-large-200)

        }



        ._1fragemll {

            padding-inline-start: var(--x-spacing-large-200)

        }



        [dir=ltr] ._1fragemlq {

            padding-left: var(--x-spacing-large-300)

        }



        [dir=rtl] ._1fragemlq {

            padding-right: var(--x-spacing-large-300)

        }



        ._1fragemlq {

            padding-inline-start: var(--x-spacing-large-300)

        }



        [dir=ltr] ._1fragemlv {

            padding-left: var(--x-spacing-large-400)

        }



        [dir=rtl] ._1fragemlv {

            padding-right: var(--x-spacing-large-400)

        }



        ._1fragemlv {

            padding-inline-start: var(--x-spacing-large-400)

        }



        [dir=ltr] ._1fragemm0 {

            padding-left: var(--x-spacing-large-500)

        }



        [dir=rtl] ._1fragemm0 {

            padding-right: var(--x-spacing-large-500)

        }



        ._1fragemm0 {

            padding-inline-start: var(--x-spacing-large-500)

        }



        [dir=ltr] ._1fragemm5 {

            padding-left: var(--x-spacing-large-600)

        }



        [dir=rtl] ._1fragemm5 {

            padding-right: var(--x-spacing-large-600)

        }



        ._1fragemm5 {

            padding-inline-start: var(--x-spacing-large-600)

        }



        [dir=ltr] ._1fragemma {

            padding-left: var(--x-spacing-extra-tight)

        }



        [dir=rtl] ._1fragemma {

            padding-right: var(--x-spacing-extra-tight)

        }



        ._1fragemma {

            padding-inline-start: var(--x-spacing-extra-tight)

        }



        [dir=ltr] ._1fragemmf {

            padding-left: var(--x-spacing-loose)

        }



        [dir=rtl] ._1fragemmf {

            padding-right: var(--x-spacing-loose)

        }



        ._1fragemmf {

            padding-inline-start: var(--x-spacing-loose)

        }



        [dir=ltr] ._1fragemmk {

            padding-left: var(--x-spacing-tight)

        }



        [dir=rtl] ._1fragemmk {

            padding-right: var(--x-spacing-tight)

        }



        ._1fragemmk {

            padding-inline-start: var(--x-spacing-tight)

        }



        [dir=ltr] ._1fragemmp {

            padding-left: var(--x-spacing-extra-loose)

        }



        [dir=rtl] ._1fragemmp {

            padding-right: var(--x-spacing-extra-loose)

        }



        ._1fragemmp {

            padding-inline-start: var(--x-spacing-extra-loose)

        }



        [dir=ltr] ._1fragemmu {

            padding-left: 0

        }



        [dir=rtl] ._1fragemmu {

            padding-right: 0

        }



        ._1fragemmu {

            padding-inline-start: 0

        }



        ._1fragemmz {

            max-height: 100%;

            max-block-size: 100%

        }



        ._1fragemn4 {

            max-width: 100%;

            max-inline-size: 100%

        }



        ._1fragemn9 {

            min-block-size: 100%;

            min-height: 100%

        }



        ._1fragemne {

            min-block-size: 100vh;

            min-height: 100vh

        }



        ._1fragemnj {

            object-fit: contain

        }



        ._1fragemno {

            object-fit: cover

        }



        ._1fragemnt {

            position: absolute

        }



        ._1fragemny {

            position: fixed

        }



        ._1fragemo3 {

            position: relative

        }



        ._1fragemo8 {

            position: static

        }



        ._1fragemod {

            position: sticky

        }



        ._1fragemoi {

            grid-auto-flow: column

        }



        ._1fragemon {

            grid-auto-flow: row

        }

    }



    @media screen and (min-width:1000px) {

        ._1fragem3 {

            height: var(--x-spacing-small-500);

            block-size: var(--x-spacing-small-500)

        }



        ._1fragem8 {

            height: var(--x-spacing-small-400);

            block-size: var(--x-spacing-small-400)

        }



        ._1fragemd {

            height: var(--x-spacing-small-300);

            block-size: var(--x-spacing-small-300)

        }



        ._1fragemi {

            height: var(--x-spacing-small-200);

            block-size: var(--x-spacing-small-200)

        }



        ._1fragemn {

            height: var(--x-spacing-small-100);

            block-size: var(--x-spacing-small-100)

        }



        ._1fragems {

            height: var(--x-spacing-base);

            block-size: var(--x-spacing-base)

        }



        ._1fragemx {

            height: var(--x-spacing-large-100);

            block-size: var(--x-spacing-large-100)

        }



        ._1fragem12 {

            height: var(--x-spacing-large-200);

            block-size: var(--x-spacing-large-200)

        }



        ._1fragem17 {

            height: var(--x-spacing-large-300);

            block-size: var(--x-spacing-large-300)

        }



        ._1fragem1c {

            height: var(--x-spacing-large-400);

            block-size: var(--x-spacing-large-400)

        }



        ._1fragem1h {

            height: var(--x-spacing-large-500);

            block-size: var(--x-spacing-large-500)

        }



        ._1fragem1m {

            height: var(--x-spacing-large-600);

            block-size: var(--x-spacing-large-600)

        }



        ._1fragem1r {

            height: var(--x-spacing-extra-tight);

            block-size: var(--x-spacing-extra-tight)

        }



        ._1fragem1w {

            height: var(--x-spacing-loose);

            block-size: var(--x-spacing-loose)

        }



        ._1fragem21 {

            height: var(--x-spacing-tight);

            block-size: var(--x-spacing-tight)

        }



        ._1fragem26 {

            height: var(--x-spacing-extra-loose);

            block-size: var(--x-spacing-extra-loose)

        }



        ._1fragem2b {

            height: 0;

            block-size: 0

        }



        ._1fragem2g {

            height: 100%;

            block-size: 100%

        }



        ._1fragem2l {

            display: block

        }



        ._1fragem2q {

            display: contents

        }



        ._1fragem2v {

            display: flex

        }



        ._1fragem30 {

            display: inline

        }



        ._1fragem35 {

            display: inline-block

        }



        ._1fragem3a {

            display: inline-flex

        }



        ._1fragem3f {

            display: grid

        }



        ._1fragem3k {

            display: inline-grid

        }



        ._1fragem3p {

            display: none

        }



        ._1fragem3u {

            row-gap: var(--x-spacing-small-500)

        }



        ._1fragem3z {

            row-gap: var(--x-spacing-small-400)

        }



        ._1fragem44 {

            row-gap: var(--x-spacing-small-300)

        }



        ._1fragem49 {

            row-gap: var(--x-spacing-small-200)

        }



        ._1fragem4e {

            row-gap: var(--x-spacing-small-100)

        }



        ._1fragem4j {

            row-gap: var(--x-spacing-base)

        }



        ._1fragem4o {

            row-gap: var(--x-spacing-large-100)

        }



        ._1fragem4t {

            row-gap: var(--x-spacing-large-200)

        }



        ._1fragem4y {

            row-gap: var(--x-spacing-large-300)

        }



        ._1fragem53 {

            row-gap: var(--x-spacing-large-400)

        }



        ._1fragem58 {

            row-gap: var(--x-spacing-large-500)

        }



        ._1fragem5d {

            row-gap: var(--x-spacing-large-600)

        }



        ._1fragem5i {

            row-gap: var(--x-spacing-extra-tight)

        }



        ._1fragem5n {

            row-gap: var(--x-spacing-loose)

        }



        ._1fragem5s {

            row-gap: var(--x-spacing-tight)

        }



        ._1fragem5x {

            row-gap: var(--x-spacing-extra-loose)

        }



        ._1fragem62 {

            row-gap: 0

        }



        ._1fragem67 {

            column-gap: var(--x-spacing-small-500)

        }



        ._1fragem6c {

            column-gap: var(--x-spacing-small-400)

        }



        ._1fragem6h {

            column-gap: var(--x-spacing-small-300)

        }



        ._1fragem6m {

            column-gap: var(--x-spacing-small-200)

        }



        ._1fragem6r {

            column-gap: var(--x-spacing-small-100)

        }



        ._1fragem6w {

            column-gap: var(--x-spacing-base)

        }



        ._1fragem71 {

            column-gap: var(--x-spacing-large-100)

        }



        ._1fragem76 {

            column-gap: var(--x-spacing-large-200)

        }



        ._1fragem7b {

            column-gap: var(--x-spacing-large-300)

        }



        ._1fragem7g {

            column-gap: var(--x-spacing-large-400)

        }



        ._1fragem7l {

            column-gap: var(--x-spacing-large-500)

        }



        ._1fragem7q {

            column-gap: var(--x-spacing-large-600)

        }



        ._1fragem7v {

            column-gap: var(--x-spacing-extra-tight)

        }



        ._1fragem80 {

            column-gap: var(--x-spacing-loose)

        }



        ._1fragem85 {

            column-gap: var(--x-spacing-tight)

        }



        ._1fragem8a {

            column-gap: var(--x-spacing-extra-loose)

        }



        ._1fragem8f {

            column-gap: 0

        }



        [dir=ltr] ._1fragem8k {

            border-left: var(--x-border-width-base) none var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem8k {

            border-right: var(--x-border-width-base) none var(--x-default-color-border)

        }



        ._1fragem8k {

            --_13qz35y0: 0px;

            border-inline-start: var(--x-border-width-base) none var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem8p {

            border-left: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem8p {

            border-right: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        ._1fragem8p {

            --_13qz35y0: var(--x-border-width-base);

            border-inline-start: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem8u {

            border-left: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem8u {

            border-right: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        ._1fragem8u {

            --_13qz35y0: var(--x-border-width-base);

            border-inline-start: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem8z {

            border-left: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem8z {

            border-right: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        ._1fragem8z {

            --_13qz35y0: var(--x-border-width-base);

            border-inline-start: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem94 {

            border-right: var(--x-border-width-base) none var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem94 {

            border-left: var(--x-border-width-base) none var(--x-default-color-border)

        }



        ._1fragem94 {

            --_13qz35y1: 0px;

            border-inline-end: var(--x-border-width-base) none var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem99 {

            border-right: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem99 {

            border-left: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        ._1fragem99 {

            --_13qz35y1: var(--x-border-width-base);

            border-inline-end: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem9e {

            border-right: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem9e {

            border-left: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        ._1fragem9e {

            --_13qz35y1: var(--x-border-width-base);

            border-inline-end: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem9j {

            border-right: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem9j {

            border-left: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        ._1fragem9j {

            --_13qz35y1: var(--x-border-width-base);

            border-inline-end: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        ._1fragem9o {

            --_13qz35y2: 0px;

            border-block-start: var(--x-border-width-base) none var(--x-default-color-border);

            border-top: var(--x-border-width-base) none var(--x-default-color-border)

        }



        ._1fragem9t {

            border-block-start: var(--x-border-width-base) solid var(--x-default-color-border);

            border-top: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        ._1fragem9t,

        ._1fragem9y {

            --_13qz35y2: var(--x-border-width-base)

        }



        ._1fragem9y {

            border-block-start: var(--x-border-width-base) dotted var(--x-default-color-border);

            border-top: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        ._1fragema3 {

            --_13qz35y2: var(--x-border-width-base);

            border-block-start: var(--x-border-width-base) dashed var(--x-default-color-border);

            border-top: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        ._1fragema8 {

            --_13qz35y3: 0px;

            border-block-end: var(--x-border-width-base) none var(--x-default-color-border);

            border-bottom: var(--x-border-width-base) none var(--x-default-color-border)

        }



        ._1fragemad {

            border-block-end: var(--x-border-width-base) solid var(--x-default-color-border);

            border-bottom: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        ._1fragemad,

        ._1fragemai {

            --_13qz35y3: var(--x-border-width-base)

        }



        ._1fragemai {

            border-block-end: var(--x-border-width-base) dotted var(--x-default-color-border);

            border-bottom: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        ._1frageman {

            --_13qz35y3: var(--x-border-width-base);

            border-block-end: var(--x-border-width-base) dashed var(--x-default-color-border);

            border-bottom: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        [dir=ltr] ._1fragemas {

            border-left-width: var(--x-border-width-base)

        }



        [dir=rtl] ._1fragemas {

            border-right-width: var(--x-border-width-base)

        }



        ._1fragemas {

            --_13qz35y0: var(--x-border-width-base);

            border-inline-start-width: var(--x-border-width-base)

        }



        [dir=ltr] ._1fragemax {

            border-left-width: var(--x-border-width-medium)

        }



        [dir=rtl] ._1fragemax {

            border-right-width: var(--x-border-width-medium)

        }



        ._1fragemax {

            --_13qz35y0: var(--x-border-width-medium);

            border-inline-start-width: var(--x-border-width-medium)

        }



        [dir=ltr] ._1fragemb2 {

            border-left-width: var(--x-border-width-thick)

        }



        [dir=rtl] ._1fragemb2 {

            border-right-width: var(--x-border-width-thick)

        }



        ._1fragemb2 {

            --_13qz35y0: var(--x-border-width-thick);

            border-inline-start-width: var(--x-border-width-thick)

        }



        [dir=ltr] ._1fragemb7 {

            border-left-width: var(--x-border-width-extra-thick)

        }



        [dir=rtl] ._1fragemb7 {

            border-right-width: var(--x-border-width-extra-thick)

        }



        ._1fragemb7 {

            --_13qz35y0: var(--x-border-width-extra-thick);

            border-inline-start-width: var(--x-border-width-extra-thick)

        }



        [dir=ltr] ._1fragembc {

            border-left-width: 0

        }



        [dir=rtl] ._1fragembc {

            border-right-width: 0

        }



        ._1fragembc {

            --_13qz35y0: 0;

            border-inline-start-width: 0

        }



        [dir=ltr] ._1fragembh {

            border-right-width: var(--x-border-width-base)

        }



        [dir=rtl] ._1fragembh {

            border-left-width: var(--x-border-width-base)

        }



        ._1fragembh {

            --_13qz35y1: var(--x-border-width-base);

            border-inline-end-width: var(--x-border-width-base)

        }



        [dir=ltr] ._1fragembm {

            border-right-width: var(--x-border-width-medium)

        }



        [dir=rtl] ._1fragembm {

            border-left-width: var(--x-border-width-medium)

        }



        ._1fragembm {

            --_13qz35y1: var(--x-border-width-medium);

            border-inline-end-width: var(--x-border-width-medium)

        }



        [dir=ltr] ._1fragembr {

            border-right-width: var(--x-border-width-thick)

        }



        [dir=rtl] ._1fragembr {

            border-left-width: var(--x-border-width-thick)

        }



        ._1fragembr {

            --_13qz35y1: var(--x-border-width-thick);

            border-inline-end-width: var(--x-border-width-thick)

        }



        [dir=ltr] ._1fragembw {

            border-right-width: var(--x-border-width-extra-thick)

        }



        [dir=rtl] ._1fragembw {

            border-left-width: var(--x-border-width-extra-thick)

        }



        ._1fragembw {

            --_13qz35y1: var(--x-border-width-extra-thick);

            border-inline-end-width: var(--x-border-width-extra-thick)

        }



        [dir=ltr] ._1fragemc1 {

            border-right-width: 0

        }



        [dir=rtl] ._1fragemc1 {

            border-left-width: 0

        }



        ._1fragemc1 {

            --_13qz35y1: 0;

            border-inline-end-width: 0

        }



        ._1fragemc6 {

            --_13qz35y2: var(--x-border-width-base);

            border-block-start-width: var(--x-border-width-base);

            border-top-width: var(--x-border-width-base)

        }



        ._1fragemcb {

            --_13qz35y2: var(--x-border-width-medium);

            border-block-start-width: var(--x-border-width-medium);

            border-top-width: var(--x-border-width-medium)

        }



        ._1fragemcg {

            --_13qz35y2: var(--x-border-width-thick);

            border-block-start-width: var(--x-border-width-thick);

            border-top-width: var(--x-border-width-thick)

        }



        ._1fragemcl {

            --_13qz35y2: var(--x-border-width-extra-thick);

            border-block-start-width: var(--x-border-width-extra-thick);

            border-top-width: var(--x-border-width-extra-thick)

        }



        ._1fragemcq {

            --_13qz35y2: 0;

            border-block-start-width: 0;

            border-top-width: 0

        }



        ._1fragemcv {

            --_13qz35y3: var(--x-border-width-base);

            border-block-end-width: var(--x-border-width-base);

            border-bottom-width: var(--x-border-width-base)

        }



        ._1fragemd0 {

            --_13qz35y3: var(--x-border-width-medium);

            border-block-end-width: var(--x-border-width-medium);

            border-bottom-width: var(--x-border-width-medium)

        }



        ._1fragemd5 {

            --_13qz35y3: var(--x-border-width-thick);

            border-block-end-width: var(--x-border-width-thick);

            border-bottom-width: var(--x-border-width-thick)

        }



        ._1fragemda {

            --_13qz35y3: var(--x-border-width-extra-thick);

            border-block-end-width: var(--x-border-width-extra-thick);

            border-bottom-width: var(--x-border-width-extra-thick)

        }



        ._1fragemdf {

            --_13qz35y3: 0;

            border-block-end-width: 0;

            border-bottom-width: 0

        }



        ._1fragemdk {

            padding-bottom: var(--x-spacing-small-500);

            padding-block-end: var(--x-spacing-small-500)

        }



        ._1fragemdp {

            padding-bottom: var(--x-spacing-small-400);

            padding-block-end: var(--x-spacing-small-400)

        }



        ._1fragemdu {

            padding-bottom: var(--x-spacing-small-300);

            padding-block-end: var(--x-spacing-small-300)

        }



        ._1fragemdz {

            padding-bottom: var(--x-spacing-small-200);

            padding-block-end: var(--x-spacing-small-200)

        }



        ._1frageme4 {

            padding-bottom: var(--x-spacing-small-100);

            padding-block-end: var(--x-spacing-small-100)

        }



        ._1frageme9 {

            padding-bottom: var(--x-spacing-base);

            padding-block-end: var(--x-spacing-base)

        }



        ._1fragemee {

            padding-bottom: var(--x-spacing-large-100);

            padding-block-end: var(--x-spacing-large-100)

        }



        ._1fragemej {

            padding-bottom: var(--x-spacing-large-200);

            padding-block-end: var(--x-spacing-large-200)

        }



        ._1fragemeo {

            padding-bottom: var(--x-spacing-large-300);

            padding-block-end: var(--x-spacing-large-300)

        }



        ._1fragemet {

            padding-bottom: var(--x-spacing-large-400);

            padding-block-end: var(--x-spacing-large-400)

        }



        ._1fragemey {

            padding-bottom: var(--x-spacing-large-500);

            padding-block-end: var(--x-spacing-large-500)

        }



        ._1fragemf3 {

            padding-bottom: var(--x-spacing-large-600);

            padding-block-end: var(--x-spacing-large-600)

        }



        ._1fragemf8 {

            padding-bottom: var(--x-spacing-extra-tight);

            padding-block-end: var(--x-spacing-extra-tight)

        }



        ._1fragemfd {

            padding-bottom: var(--x-spacing-loose);

            padding-block-end: var(--x-spacing-loose)

        }



        ._1fragemfi {

            padding-bottom: var(--x-spacing-tight);

            padding-block-end: var(--x-spacing-tight)

        }



        ._1fragemfn {

            padding-bottom: var(--x-spacing-extra-loose);

            padding-block-end: var(--x-spacing-extra-loose)

        }



        ._1fragemfs {

            padding-bottom: 0;

            padding-block-end: 0

        }



        ._1fragemfx {

            padding-top: var(--x-spacing-small-500);

            padding-block-start: var(--x-spacing-small-500)

        }



        ._1fragemg2 {

            padding-top: var(--x-spacing-small-400);

            padding-block-start: var(--x-spacing-small-400)

        }



        ._1fragemg7 {

            padding-top: var(--x-spacing-small-300);

            padding-block-start: var(--x-spacing-small-300)

        }



        ._1fragemgc {

            padding-top: var(--x-spacing-small-200);

            padding-block-start: var(--x-spacing-small-200)

        }



        ._1fragemgh {

            padding-top: var(--x-spacing-small-100);

            padding-block-start: var(--x-spacing-small-100)

        }



        ._1fragemgm {

            padding-top: var(--x-spacing-base);

            padding-block-start: var(--x-spacing-base)

        }



        ._1fragemgr {

            padding-top: var(--x-spacing-large-100);

            padding-block-start: var(--x-spacing-large-100)

        }



        ._1fragemgw {

            padding-top: var(--x-spacing-large-200);

            padding-block-start: var(--x-spacing-large-200)

        }



        ._1fragemh1 {

            padding-top: var(--x-spacing-large-300);

            padding-block-start: var(--x-spacing-large-300)

        }



        ._1fragemh6 {

            padding-top: var(--x-spacing-large-400);

            padding-block-start: var(--x-spacing-large-400)

        }



        ._1fragemhb {

            padding-top: var(--x-spacing-large-500);

            padding-block-start: var(--x-spacing-large-500)

        }



        ._1fragemhg {

            padding-top: var(--x-spacing-large-600);

            padding-block-start: var(--x-spacing-large-600)

        }



        ._1fragemhl {

            padding-top: var(--x-spacing-extra-tight);

            padding-block-start: var(--x-spacing-extra-tight)

        }



        ._1fragemhq {

            padding-top: var(--x-spacing-loose);

            padding-block-start: var(--x-spacing-loose)

        }



        ._1fragemhv {

            padding-top: var(--x-spacing-tight);

            padding-block-start: var(--x-spacing-tight)

        }



        ._1fragemi0 {

            padding-top: var(--x-spacing-extra-loose);

            padding-block-start: var(--x-spacing-extra-loose)

        }



        ._1fragemi5 {

            padding-top: 0;

            padding-block-start: 0

        }



        [dir=ltr] ._1fragemia {

            padding-right: var(--x-spacing-small-500)

        }



        [dir=rtl] ._1fragemia {

            padding-left: var(--x-spacing-small-500)

        }



        ._1fragemia {

            padding-inline-end: var(--x-spacing-small-500)

        }



        [dir=ltr] ._1fragemif {

            padding-right: var(--x-spacing-small-400)

        }



        [dir=rtl] ._1fragemif {

            padding-left: var(--x-spacing-small-400)

        }



        ._1fragemif {

            padding-inline-end: var(--x-spacing-small-400)

        }



        [dir=ltr] ._1fragemik {

            padding-right: var(--x-spacing-small-300)

        }



        [dir=rtl] ._1fragemik {

            padding-left: var(--x-spacing-small-300)

        }



        ._1fragemik {

            padding-inline-end: var(--x-spacing-small-300)

        }



        [dir=ltr] ._1fragemip {

            padding-right: var(--x-spacing-small-200)

        }



        [dir=rtl] ._1fragemip {

            padding-left: var(--x-spacing-small-200)

        }



        ._1fragemip {

            padding-inline-end: var(--x-spacing-small-200)

        }



        [dir=ltr] ._1fragemiu {

            padding-right: var(--x-spacing-small-100)

        }



        [dir=rtl] ._1fragemiu {

            padding-left: var(--x-spacing-small-100)

        }



        ._1fragemiu {

            padding-inline-end: var(--x-spacing-small-100)

        }



        [dir=ltr] ._1fragemiz {

            padding-right: var(--x-spacing-base)

        }



        [dir=rtl] ._1fragemiz {

            padding-left: var(--x-spacing-base)

        }



        ._1fragemiz {

            padding-inline-end: var(--x-spacing-base)

        }



        [dir=ltr] ._1fragemj4 {

            padding-right: var(--x-spacing-large-100)

        }



        [dir=rtl] ._1fragemj4 {

            padding-left: var(--x-spacing-large-100)

        }



        ._1fragemj4 {

            padding-inline-end: var(--x-spacing-large-100)

        }



        [dir=ltr] ._1fragemj9 {

            padding-right: var(--x-spacing-large-200)

        }



        [dir=rtl] ._1fragemj9 {

            padding-left: var(--x-spacing-large-200)

        }



        ._1fragemj9 {

            padding-inline-end: var(--x-spacing-large-200)

        }



        [dir=ltr] ._1fragemje {

            padding-right: var(--x-spacing-large-300)

        }



        [dir=rtl] ._1fragemje {

            padding-left: var(--x-spacing-large-300)

        }



        ._1fragemje {

            padding-inline-end: var(--x-spacing-large-300)

        }



        [dir=ltr] ._1fragemjj {

            padding-right: var(--x-spacing-large-400)

        }



        [dir=rtl] ._1fragemjj {

            padding-left: var(--x-spacing-large-400)

        }



        ._1fragemjj {

            padding-inline-end: var(--x-spacing-large-400)

        }



        [dir=ltr] ._1fragemjo {

            padding-right: var(--x-spacing-large-500)

        }



        [dir=rtl] ._1fragemjo {

            padding-left: var(--x-spacing-large-500)

        }



        ._1fragemjo {

            padding-inline-end: var(--x-spacing-large-500)

        }



        [dir=ltr] ._1fragemjt {

            padding-right: var(--x-spacing-large-600)

        }



        [dir=rtl] ._1fragemjt {

            padding-left: var(--x-spacing-large-600)

        }



        ._1fragemjt {

            padding-inline-end: var(--x-spacing-large-600)

        }



        [dir=ltr] ._1fragemjy {

            padding-right: var(--x-spacing-extra-tight)

        }



        [dir=rtl] ._1fragemjy {

            padding-left: var(--x-spacing-extra-tight)

        }



        ._1fragemjy {

            padding-inline-end: var(--x-spacing-extra-tight)

        }



        [dir=ltr] ._1fragemk3 {

            padding-right: var(--x-spacing-loose)

        }



        [dir=rtl] ._1fragemk3 {

            padding-left: var(--x-spacing-loose)

        }



        ._1fragemk3 {

            padding-inline-end: var(--x-spacing-loose)

        }



        [dir=ltr] ._1fragemk8 {

            padding-right: var(--x-spacing-tight)

        }



        [dir=rtl] ._1fragemk8 {

            padding-left: var(--x-spacing-tight)

        }



        ._1fragemk8 {

            padding-inline-end: var(--x-spacing-tight)

        }



        [dir=ltr] ._1fragemkd {

            padding-right: var(--x-spacing-extra-loose)

        }



        [dir=rtl] ._1fragemkd {

            padding-left: var(--x-spacing-extra-loose)

        }



        ._1fragemkd {

            padding-inline-end: var(--x-spacing-extra-loose)

        }



        [dir=ltr] ._1fragemki {

            padding-right: 0

        }



        [dir=rtl] ._1fragemki {

            padding-left: 0

        }



        ._1fragemki {

            padding-inline-end: 0

        }



        [dir=ltr] ._1fragemkn {

            padding-left: var(--x-spacing-small-500)

        }



        [dir=rtl] ._1fragemkn {

            padding-right: var(--x-spacing-small-500)

        }



        ._1fragemkn {

            padding-inline-start: var(--x-spacing-small-500)

        }



        [dir=ltr] ._1fragemks {

            padding-left: var(--x-spacing-small-400)

        }



        [dir=rtl] ._1fragemks {

            padding-right: var(--x-spacing-small-400)

        }



        ._1fragemks {

            padding-inline-start: var(--x-spacing-small-400)

        }



        [dir=ltr] ._1fragemkx {

            padding-left: var(--x-spacing-small-300)

        }



        [dir=rtl] ._1fragemkx {

            padding-right: var(--x-spacing-small-300)

        }



        ._1fragemkx {

            padding-inline-start: var(--x-spacing-small-300)

        }



        [dir=ltr] ._1frageml2 {

            padding-left: var(--x-spacing-small-200)

        }



        [dir=rtl] ._1frageml2 {

            padding-right: var(--x-spacing-small-200)

        }



        ._1frageml2 {

            padding-inline-start: var(--x-spacing-small-200)

        }



        [dir=ltr] ._1frageml7 {

            padding-left: var(--x-spacing-small-100)

        }



        [dir=rtl] ._1frageml7 {

            padding-right: var(--x-spacing-small-100)

        }



        ._1frageml7 {

            padding-inline-start: var(--x-spacing-small-100)

        }



        [dir=ltr] ._1fragemlc {

            padding-left: var(--x-spacing-base)

        }



        [dir=rtl] ._1fragemlc {

            padding-right: var(--x-spacing-base)

        }



        ._1fragemlc {

            padding-inline-start: var(--x-spacing-base)

        }



        [dir=ltr] ._1fragemlh {

            padding-left: var(--x-spacing-large-100)

        }



        [dir=rtl] ._1fragemlh {

            padding-right: var(--x-spacing-large-100)

        }



        ._1fragemlh {

            padding-inline-start: var(--x-spacing-large-100)

        }



        [dir=ltr] ._1fragemlm {

            padding-left: var(--x-spacing-large-200)

        }



        [dir=rtl] ._1fragemlm {

            padding-right: var(--x-spacing-large-200)

        }



        ._1fragemlm {

            padding-inline-start: var(--x-spacing-large-200)

        }



        [dir=ltr] ._1fragemlr {

            padding-left: var(--x-spacing-large-300)

        }



        [dir=rtl] ._1fragemlr {

            padding-right: var(--x-spacing-large-300)

        }



        ._1fragemlr {

            padding-inline-start: var(--x-spacing-large-300)

        }



        [dir=ltr] ._1fragemlw {

            padding-left: var(--x-spacing-large-400)

        }



        [dir=rtl] ._1fragemlw {

            padding-right: var(--x-spacing-large-400)

        }



        ._1fragemlw {

            padding-inline-start: var(--x-spacing-large-400)

        }



        [dir=ltr] ._1fragemm1 {

            padding-left: var(--x-spacing-large-500)

        }



        [dir=rtl] ._1fragemm1 {

            padding-right: var(--x-spacing-large-500)

        }



        ._1fragemm1 {

            padding-inline-start: var(--x-spacing-large-500)

        }



        [dir=ltr] ._1fragemm6 {

            padding-left: var(--x-spacing-large-600)

        }



        [dir=rtl] ._1fragemm6 {

            padding-right: var(--x-spacing-large-600)

        }



        ._1fragemm6 {

            padding-inline-start: var(--x-spacing-large-600)

        }



        [dir=ltr] ._1fragemmb {

            padding-left: var(--x-spacing-extra-tight)

        }



        [dir=rtl] ._1fragemmb {

            padding-right: var(--x-spacing-extra-tight)

        }



        ._1fragemmb {

            padding-inline-start: var(--x-spacing-extra-tight)

        }



        [dir=ltr] ._1fragemmg {

            padding-left: var(--x-spacing-loose)

        }



        [dir=rtl] ._1fragemmg {

            padding-right: var(--x-spacing-loose)

        }



        ._1fragemmg {

            padding-inline-start: var(--x-spacing-loose)

        }



        [dir=ltr] ._1fragemml {

            padding-left: var(--x-spacing-tight)

        }



        [dir=rtl] ._1fragemml {

            padding-right: var(--x-spacing-tight)

        }



        ._1fragemml {

            padding-inline-start: var(--x-spacing-tight)

        }



        [dir=ltr] ._1fragemmq {

            padding-left: var(--x-spacing-extra-loose)

        }



        [dir=rtl] ._1fragemmq {

            padding-right: var(--x-spacing-extra-loose)

        }



        ._1fragemmq {

            padding-inline-start: var(--x-spacing-extra-loose)

        }



        [dir=ltr] ._1fragemmv {

            padding-left: 0

        }



        [dir=rtl] ._1fragemmv {

            padding-right: 0

        }



        ._1fragemmv {

            padding-inline-start: 0

        }



        ._1fragemn0 {

            max-height: 100%;

            max-block-size: 100%

        }



        ._1fragemn5 {

            max-width: 100%;

            max-inline-size: 100%

        }



        ._1fragemna {

            min-block-size: 100%;

            min-height: 100%

        }



        ._1fragemnf {

            min-block-size: 100vh;

            min-height: 100vh

        }



        ._1fragemnk {

            object-fit: contain

        }



        ._1fragemnp {

            object-fit: cover

        }



        ._1fragemnu {

            position: absolute

        }



        ._1fragemnz {

            position: fixed

        }



        ._1fragemo4 {

            position: relative

        }



        ._1fragemo9 {

            position: static

        }



        ._1fragemoe {

            position: sticky

        }



        ._1fragemoj {

            grid-auto-flow: column

        }



        ._1fragemoo {

            grid-auto-flow: row

        }

    }



    @media screen and (min-width:1200px) {

        ._1fragem4 {

            height: var(--x-spacing-small-500);

            block-size: var(--x-spacing-small-500)

        }



        ._1fragem9 {

            height: var(--x-spacing-small-400);

            block-size: var(--x-spacing-small-400)

        }



        ._1frageme {

            height: var(--x-spacing-small-300);

            block-size: var(--x-spacing-small-300)

        }



        ._1fragemj {

            height: var(--x-spacing-small-200);

            block-size: var(--x-spacing-small-200)

        }



        ._1fragemo {

            height: var(--x-spacing-small-100);

            block-size: var(--x-spacing-small-100)

        }



        ._1fragemt {

            height: var(--x-spacing-base);

            block-size: var(--x-spacing-base)

        }



        ._1fragemy {

            height: var(--x-spacing-large-100);

            block-size: var(--x-spacing-large-100)

        }



        ._1fragem13 {

            height: var(--x-spacing-large-200);

            block-size: var(--x-spacing-large-200)

        }



        ._1fragem18 {

            height: var(--x-spacing-large-300);

            block-size: var(--x-spacing-large-300)

        }



        ._1fragem1d {

            height: var(--x-spacing-large-400);

            block-size: var(--x-spacing-large-400)

        }



        ._1fragem1i {

            height: var(--x-spacing-large-500);

            block-size: var(--x-spacing-large-500)

        }



        ._1fragem1n {

            height: var(--x-spacing-large-600);

            block-size: var(--x-spacing-large-600)

        }



        ._1fragem1s {

            height: var(--x-spacing-extra-tight);

            block-size: var(--x-spacing-extra-tight)

        }



        ._1fragem1x {

            height: var(--x-spacing-loose);

            block-size: var(--x-spacing-loose)

        }



        ._1fragem22 {

            height: var(--x-spacing-tight);

            block-size: var(--x-spacing-tight)

        }



        ._1fragem27 {

            height: var(--x-spacing-extra-loose);

            block-size: var(--x-spacing-extra-loose)

        }



        ._1fragem2c {

            height: 0;

            block-size: 0

        }



        ._1fragem2h {

            height: 100%;

            block-size: 100%

        }



        ._1fragem2m {

            display: block

        }



        ._1fragem2r {

            display: contents

        }



        ._1fragem2w {

            display: flex

        }



        ._1fragem31 {

            display: inline

        }



        ._1fragem36 {

            display: inline-block

        }



        ._1fragem3b {

            display: inline-flex

        }



        ._1fragem3g {

            display: grid

        }



        ._1fragem3l {

            display: inline-grid

        }



        ._1fragem3q {

            display: none

        }



        ._1fragem3v {

            row-gap: var(--x-spacing-small-500)

        }



        ._1fragem40 {

            row-gap: var(--x-spacing-small-400)

        }



        ._1fragem45 {

            row-gap: var(--x-spacing-small-300)

        }



        ._1fragem4a {

            row-gap: var(--x-spacing-small-200)

        }



        ._1fragem4f {

            row-gap: var(--x-spacing-small-100)

        }



        ._1fragem4k {

            row-gap: var(--x-spacing-base)

        }



        ._1fragem4p {

            row-gap: var(--x-spacing-large-100)

        }



        ._1fragem4u {

            row-gap: var(--x-spacing-large-200)

        }



        ._1fragem4z {

            row-gap: var(--x-spacing-large-300)

        }



        ._1fragem54 {

            row-gap: var(--x-spacing-large-400)

        }



        ._1fragem59 {

            row-gap: var(--x-spacing-large-500)

        }



        ._1fragem5e {

            row-gap: var(--x-spacing-large-600)

        }



        ._1fragem5j {

            row-gap: var(--x-spacing-extra-tight)

        }



        ._1fragem5o {

            row-gap: var(--x-spacing-loose)

        }



        ._1fragem5t {

            row-gap: var(--x-spacing-tight)

        }



        ._1fragem5y {

            row-gap: var(--x-spacing-extra-loose)

        }



        ._1fragem63 {

            row-gap: 0

        }



        ._1fragem68 {

            column-gap: var(--x-spacing-small-500)

        }



        ._1fragem6d {

            column-gap: var(--x-spacing-small-400)

        }



        ._1fragem6i {

            column-gap: var(--x-spacing-small-300)

        }



        ._1fragem6n {

            column-gap: var(--x-spacing-small-200)

        }



        ._1fragem6s {

            column-gap: var(--x-spacing-small-100)

        }



        ._1fragem6x {

            column-gap: var(--x-spacing-base)

        }



        ._1fragem72 {

            column-gap: var(--x-spacing-large-100)

        }



        ._1fragem77 {

            column-gap: var(--x-spacing-large-200)

        }



        ._1fragem7c {

            column-gap: var(--x-spacing-large-300)

        }



        ._1fragem7h {

            column-gap: var(--x-spacing-large-400)

        }



        ._1fragem7m {

            column-gap: var(--x-spacing-large-500)

        }



        ._1fragem7r {

            column-gap: var(--x-spacing-large-600)

        }



        ._1fragem7w {

            column-gap: var(--x-spacing-extra-tight)

        }



        ._1fragem81 {

            column-gap: var(--x-spacing-loose)

        }



        ._1fragem86 {

            column-gap: var(--x-spacing-tight)

        }



        ._1fragem8b {

            column-gap: var(--x-spacing-extra-loose)

        }



        ._1fragem8g {

            column-gap: 0

        }



        [dir=ltr] ._1fragem8l {

            border-left: var(--x-border-width-base) none var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem8l {

            border-right: var(--x-border-width-base) none var(--x-default-color-border)

        }



        ._1fragem8l {

            --_13qz35y0: 0px;

            border-inline-start: var(--x-border-width-base) none var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem8q {

            border-left: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem8q {

            border-right: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        ._1fragem8q {

            --_13qz35y0: var(--x-border-width-base);

            border-inline-start: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem8v {

            border-left: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem8v {

            border-right: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        ._1fragem8v {

            --_13qz35y0: var(--x-border-width-base);

            border-inline-start: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem90 {

            border-left: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem90 {

            border-right: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        ._1fragem90 {

            --_13qz35y0: var(--x-border-width-base);

            border-inline-start: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem95 {

            border-right: var(--x-border-width-base) none var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem95 {

            border-left: var(--x-border-width-base) none var(--x-default-color-border)

        }



        ._1fragem95 {

            --_13qz35y1: 0px;

            border-inline-end: var(--x-border-width-base) none var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem9a {

            border-right: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem9a {

            border-left: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        ._1fragem9a {

            --_13qz35y1: var(--x-border-width-base);

            border-inline-end: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem9f {

            border-right: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem9f {

            border-left: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        ._1fragem9f {

            --_13qz35y1: var(--x-border-width-base);

            border-inline-end: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        [dir=ltr] ._1fragem9k {

            border-right: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        [dir=rtl] ._1fragem9k {

            border-left: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        ._1fragem9k {

            --_13qz35y1: var(--x-border-width-base);

            border-inline-end: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        ._1fragem9p {

            --_13qz35y2: 0px;

            border-block-start: var(--x-border-width-base) none var(--x-default-color-border);

            border-top: var(--x-border-width-base) none var(--x-default-color-border)

        }



        ._1fragem9u {

            border-block-start: var(--x-border-width-base) solid var(--x-default-color-border);

            border-top: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        ._1fragem9u,

        ._1fragem9z {

            --_13qz35y2: var(--x-border-width-base)

        }



        ._1fragem9z {

            border-block-start: var(--x-border-width-base) dotted var(--x-default-color-border);

            border-top: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        ._1fragema4 {

            --_13qz35y2: var(--x-border-width-base);

            border-block-start: var(--x-border-width-base) dashed var(--x-default-color-border);

            border-top: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        ._1fragema9 {

            --_13qz35y3: 0px;

            border-block-end: var(--x-border-width-base) none var(--x-default-color-border);

            border-bottom: var(--x-border-width-base) none var(--x-default-color-border)

        }



        ._1fragemae {

            border-block-end: var(--x-border-width-base) solid var(--x-default-color-border);

            border-bottom: var(--x-border-width-base) solid var(--x-default-color-border)

        }



        ._1fragemae,

        ._1fragemaj {

            --_13qz35y3: var(--x-border-width-base)

        }



        ._1fragemaj {

            border-block-end: var(--x-border-width-base) dotted var(--x-default-color-border);

            border-bottom: var(--x-border-width-base) dotted var(--x-default-color-border)

        }



        ._1fragemao {

            --_13qz35y3: var(--x-border-width-base);

            border-block-end: var(--x-border-width-base) dashed var(--x-default-color-border);

            border-bottom: var(--x-border-width-base) dashed var(--x-default-color-border)

        }



        [dir=ltr] ._1fragemat {

            border-left-width: var(--x-border-width-base)

        }



        [dir=rtl] ._1fragemat {

            border-right-width: var(--x-border-width-base)

        }



        ._1fragemat {

            --_13qz35y0: var(--x-border-width-base);

            border-inline-start-width: var(--x-border-width-base)

        }



        [dir=ltr] ._1fragemay {

            border-left-width: var(--x-border-width-medium)

        }



        [dir=rtl] ._1fragemay {

            border-right-width: var(--x-border-width-medium)

        }



        ._1fragemay {

            --_13qz35y0: var(--x-border-width-medium);

            border-inline-start-width: var(--x-border-width-medium)

        }



        [dir=ltr] ._1fragemb3 {

            border-left-width: var(--x-border-width-thick)

        }



        [dir=rtl] ._1fragemb3 {

            border-right-width: var(--x-border-width-thick)

        }



        ._1fragemb3 {

            --_13qz35y0: var(--x-border-width-thick);

            border-inline-start-width: var(--x-border-width-thick)

        }



        [dir=ltr] ._1fragemb8 {

            border-left-width: var(--x-border-width-extra-thick)

        }



        [dir=rtl] ._1fragemb8 {

            border-right-width: var(--x-border-width-extra-thick)

        }



        ._1fragemb8 {

            --_13qz35y0: var(--x-border-width-extra-thick);

            border-inline-start-width: var(--x-border-width-extra-thick)

        }



        [dir=ltr] ._1fragembd {

            border-left-width: 0

        }



        [dir=rtl] ._1fragembd {

            border-right-width: 0

        }



        ._1fragembd {

            --_13qz35y0: 0;

            border-inline-start-width: 0

        }



        [dir=ltr] ._1fragembi {

            border-right-width: var(--x-border-width-base)

        }



        [dir=rtl] ._1fragembi {

            border-left-width: var(--x-border-width-base)

        }



        ._1fragembi {

            --_13qz35y1: var(--x-border-width-base);

            border-inline-end-width: var(--x-border-width-base)

        }



        [dir=ltr] ._1fragembn {

            border-right-width: var(--x-border-width-medium)

        }



        [dir=rtl] ._1fragembn {

            border-left-width: var(--x-border-width-medium)

        }



        ._1fragembn {

            --_13qz35y1: var(--x-border-width-medium);

            border-inline-end-width: var(--x-border-width-medium)

        }



        [dir=ltr] ._1fragembs {

            border-right-width: var(--x-border-width-thick)

        }



        [dir=rtl] ._1fragembs {

            border-left-width: var(--x-border-width-thick)

        }



        ._1fragembs {

            --_13qz35y1: var(--x-border-width-thick);

            border-inline-end-width: var(--x-border-width-thick)

        }



        [dir=ltr] ._1fragembx {

            border-right-width: var(--x-border-width-extra-thick)

        }



        [dir=rtl] ._1fragembx {

            border-left-width: var(--x-border-width-extra-thick)

        }



        ._1fragembx {

            --_13qz35y1: var(--x-border-width-extra-thick);

            border-inline-end-width: var(--x-border-width-extra-thick)

        }



        [dir=ltr] ._1fragemc2 {

            border-right-width: 0

        }



        [dir=rtl] ._1fragemc2 {

            border-left-width: 0

        }



        ._1fragemc2 {

            --_13qz35y1: 0;

            border-inline-end-width: 0

        }



        ._1fragemc7 {

            --_13qz35y2: var(--x-border-width-base);

            border-block-start-width: var(--x-border-width-base);

            border-top-width: var(--x-border-width-base)

        }



        ._1fragemcc {

            --_13qz35y2: var(--x-border-width-medium);

            border-block-start-width: var(--x-border-width-medium);

            border-top-width: var(--x-border-width-medium)

        }



        ._1fragemch {

            --_13qz35y2: var(--x-border-width-thick);

            border-block-start-width: var(--x-border-width-thick);

            border-top-width: var(--x-border-width-thick)

        }



        ._1fragemcm {

            --_13qz35y2: var(--x-border-width-extra-thick);

            border-block-start-width: var(--x-border-width-extra-thick);

            border-top-width: var(--x-border-width-extra-thick)

        }



        ._1fragemcr {

            --_13qz35y2: 0;

            border-block-start-width: 0;

            border-top-width: 0

        }



        ._1fragemcw {

            --_13qz35y3: var(--x-border-width-base);

            border-block-end-width: var(--x-border-width-base);

            border-bottom-width: var(--x-border-width-base)

        }



        ._1fragemd1 {

            --_13qz35y3: var(--x-border-width-medium);

            border-block-end-width: var(--x-border-width-medium);

            border-bottom-width: var(--x-border-width-medium)

        }



        ._1fragemd6 {

            --_13qz35y3: var(--x-border-width-thick);

            border-block-end-width: var(--x-border-width-thick);

            border-bottom-width: var(--x-border-width-thick)

        }



        ._1fragemdb {

            --_13qz35y3: var(--x-border-width-extra-thick);

            border-block-end-width: var(--x-border-width-extra-thick);

            border-bottom-width: var(--x-border-width-extra-thick)

        }



        ._1fragemdg {

            --_13qz35y3: 0;

            border-block-end-width: 0;

            border-bottom-width: 0

        }



        ._1fragemdl {

            padding-bottom: var(--x-spacing-small-500);

            padding-block-end: var(--x-spacing-small-500)

        }



        ._1fragemdq {

            padding-bottom: var(--x-spacing-small-400);

            padding-block-end: var(--x-spacing-small-400)

        }



        ._1fragemdv {

            padding-bottom: var(--x-spacing-small-300);

            padding-block-end: var(--x-spacing-small-300)

        }



        ._1frageme0 {

            padding-bottom: var(--x-spacing-small-200);

            padding-block-end: var(--x-spacing-small-200)

        }



        ._1frageme5 {

            padding-bottom: var(--x-spacing-small-100);

            padding-block-end: var(--x-spacing-small-100)

        }



        ._1fragemea {

            padding-bottom: var(--x-spacing-base);

            padding-block-end: var(--x-spacing-base)

        }



        ._1fragemef {

            padding-bottom: var(--x-spacing-large-100);

            padding-block-end: var(--x-spacing-large-100)

        }



        ._1fragemek {

            padding-bottom: var(--x-spacing-large-200);

            padding-block-end: var(--x-spacing-large-200)

        }



        ._1fragemep {

            padding-bottom: var(--x-spacing-large-300);

            padding-block-end: var(--x-spacing-large-300)

        }



        ._1fragemeu {

            padding-bottom: var(--x-spacing-large-400);

            padding-block-end: var(--x-spacing-large-400)

        }



        ._1fragemez {

            padding-bottom: var(--x-spacing-large-500);

            padding-block-end: var(--x-spacing-large-500)

        }



        ._1fragemf4 {

            padding-bottom: var(--x-spacing-large-600);

            padding-block-end: var(--x-spacing-large-600)

        }



        ._1fragemf9 {

            padding-bottom: var(--x-spacing-extra-tight);

            padding-block-end: var(--x-spacing-extra-tight)

        }



        ._1fragemfe {

            padding-bottom: var(--x-spacing-loose);

            padding-block-end: var(--x-spacing-loose)

        }



        ._1fragemfj {

            padding-bottom: var(--x-spacing-tight);

            padding-block-end: var(--x-spacing-tight)

        }



        ._1fragemfo {

            padding-bottom: var(--x-spacing-extra-loose);

            padding-block-end: var(--x-spacing-extra-loose)

        }



        ._1fragemft {

            padding-bottom: 0;

            padding-block-end: 0

        }



        ._1fragemfy {

            padding-top: var(--x-spacing-small-500);

            padding-block-start: var(--x-spacing-small-500)

        }



        ._1fragemg3 {

            padding-top: var(--x-spacing-small-400);

            padding-block-start: var(--x-spacing-small-400)

        }



        ._1fragemg8 {

            padding-top: var(--x-spacing-small-300);

            padding-block-start: var(--x-spacing-small-300)

        }



        ._1fragemgd {

            padding-top: var(--x-spacing-small-200);

            padding-block-start: var(--x-spacing-small-200)

        }



        ._1fragemgi {

            padding-top: var(--x-spacing-small-100);

            padding-block-start: var(--x-spacing-small-100)

        }



        ._1fragemgn {

            padding-top: var(--x-spacing-base);

            padding-block-start: var(--x-spacing-base)

        }



        ._1fragemgs {

            padding-top: var(--x-spacing-large-100);

            padding-block-start: var(--x-spacing-large-100)

        }



        ._1fragemgx {

            padding-top: var(--x-spacing-large-200);

            padding-block-start: var(--x-spacing-large-200)

        }



        ._1fragemh2 {

            padding-top: var(--x-spacing-large-300);

            padding-block-start: var(--x-spacing-large-300)

        }



        ._1fragemh7 {

            padding-top: var(--x-spacing-large-400);

            padding-block-start: var(--x-spacing-large-400)

        }



        ._1fragemhc {

            padding-top: var(--x-spacing-large-500);

            padding-block-start: var(--x-spacing-large-500)

        }



        ._1fragemhh {

            padding-top: var(--x-spacing-large-600);

            padding-block-start: var(--x-spacing-large-600)

        }



        ._1fragemhm {

            padding-top: var(--x-spacing-extra-tight);

            padding-block-start: var(--x-spacing-extra-tight)

        }



        ._1fragemhr {

            padding-top: var(--x-spacing-loose);

            padding-block-start: var(--x-spacing-loose)

        }



        ._1fragemhw {

            padding-top: var(--x-spacing-tight);

            padding-block-start: var(--x-spacing-tight)

        }



        ._1fragemi1 {

            padding-top: var(--x-spacing-extra-loose);

            padding-block-start: var(--x-spacing-extra-loose)

        }



        ._1fragemi6 {

            padding-top: 0;

            padding-block-start: 0

        }



        [dir=ltr] ._1fragemib {

            padding-right: var(--x-spacing-small-500)

        }



        [dir=rtl] ._1fragemib {

            padding-left: var(--x-spacing-small-500)

        }



        ._1fragemib {

            padding-inline-end: var(--x-spacing-small-500)

        }



        [dir=ltr] ._1fragemig {

            padding-right: var(--x-spacing-small-400)

        }



        [dir=rtl] ._1fragemig {

            padding-left: var(--x-spacing-small-400)

        }



        ._1fragemig {

            padding-inline-end: var(--x-spacing-small-400)

        }



        [dir=ltr] ._1fragemil {

            padding-right: var(--x-spacing-small-300)

        }



        [dir=rtl] ._1fragemil {

            padding-left: var(--x-spacing-small-300)

        }



        ._1fragemil {

            padding-inline-end: var(--x-spacing-small-300)

        }



        [dir=ltr] ._1fragemiq {

            padding-right: var(--x-spacing-small-200)

        }



        [dir=rtl] ._1fragemiq {

            padding-left: var(--x-spacing-small-200)

        }



        ._1fragemiq {

            padding-inline-end: var(--x-spacing-small-200)

        }



        [dir=ltr] ._1fragemiv {

            padding-right: var(--x-spacing-small-100)

        }



        [dir=rtl] ._1fragemiv {

            padding-left: var(--x-spacing-small-100)

        }



        ._1fragemiv {

            padding-inline-end: var(--x-spacing-small-100)

        }



        [dir=ltr] ._1fragemj0 {

            padding-right: var(--x-spacing-base)

        }



        [dir=rtl] ._1fragemj0 {

            padding-left: var(--x-spacing-base)

        }



        ._1fragemj0 {

            padding-inline-end: var(--x-spacing-base)

        }



        [dir=ltr] ._1fragemj5 {

            padding-right: var(--x-spacing-large-100)

        }



        [dir=rtl] ._1fragemj5 {

            padding-left: var(--x-spacing-large-100)

        }



        ._1fragemj5 {

            padding-inline-end: var(--x-spacing-large-100)

        }



        [dir=ltr] ._1fragemja {

            padding-right: var(--x-spacing-large-200)

        }



        [dir=rtl] ._1fragemja {

            padding-left: var(--x-spacing-large-200)

        }



        ._1fragemja {

            padding-inline-end: var(--x-spacing-large-200)

        }



        [dir=ltr] ._1fragemjf {

            padding-right: var(--x-spacing-large-300)

        }



        [dir=rtl] ._1fragemjf {

            padding-left: var(--x-spacing-large-300)

        }



        ._1fragemjf {

            padding-inline-end: var(--x-spacing-large-300)

        }



        [dir=ltr] ._1fragemjk {

            padding-right: var(--x-spacing-large-400)

        }



        [dir=rtl] ._1fragemjk {

            padding-left: var(--x-spacing-large-400)

        }



        ._1fragemjk {

            padding-inline-end: var(--x-spacing-large-400)

        }



        [dir=ltr] ._1fragemjp {

            padding-right: var(--x-spacing-large-500)

        }



        [dir=rtl] ._1fragemjp {

            padding-left: var(--x-spacing-large-500)

        }



        ._1fragemjp {

            padding-inline-end: var(--x-spacing-large-500)

        }



        [dir=ltr] ._1fragemju {

            padding-right: var(--x-spacing-large-600)

        }



        [dir=rtl] ._1fragemju {

            padding-left: var(--x-spacing-large-600)

        }



        ._1fragemju {

            padding-inline-end: var(--x-spacing-large-600)

        }



        [dir=ltr] ._1fragemjz {

            padding-right: var(--x-spacing-extra-tight)

        }



        [dir=rtl] ._1fragemjz {

            padding-left: var(--x-spacing-extra-tight)

        }



        ._1fragemjz {

            padding-inline-end: var(--x-spacing-extra-tight)

        }



        [dir=ltr] ._1fragemk4 {

            padding-right: var(--x-spacing-loose)

        }



        [dir=rtl] ._1fragemk4 {

            padding-left: var(--x-spacing-loose)

        }



        ._1fragemk4 {

            padding-inline-end: var(--x-spacing-loose)

        }



        [dir=ltr] ._1fragemk9 {

            padding-right: var(--x-spacing-tight)

        }



        [dir=rtl] ._1fragemk9 {

            padding-left: var(--x-spacing-tight)

        }



        ._1fragemk9 {

            padding-inline-end: var(--x-spacing-tight)

        }



        [dir=ltr] ._1fragemke {

            padding-right: var(--x-spacing-extra-loose)

        }



        [dir=rtl] ._1fragemke {

            padding-left: var(--x-spacing-extra-loose)

        }



        ._1fragemke {

            padding-inline-end: var(--x-spacing-extra-loose)

        }



        [dir=ltr] ._1fragemkj {

            padding-right: 0

        }



        [dir=rtl] ._1fragemkj {

            padding-left: 0

        }



        ._1fragemkj {

            padding-inline-end: 0

        }



        [dir=ltr] ._1fragemko {

            padding-left: var(--x-spacing-small-500)

        }



        [dir=rtl] ._1fragemko {

            padding-right: var(--x-spacing-small-500)

        }



        ._1fragemko {

            padding-inline-start: var(--x-spacing-small-500)

        }



        [dir=ltr] ._1fragemkt {

            padding-left: var(--x-spacing-small-400)

        }



        [dir=rtl] ._1fragemkt {

            padding-right: var(--x-spacing-small-400)

        }



        ._1fragemkt {

            padding-inline-start: var(--x-spacing-small-400)

        }



        [dir=ltr] ._1fragemky {

            padding-left: var(--x-spacing-small-300)

        }



        [dir=rtl] ._1fragemky {

            padding-right: var(--x-spacing-small-300)

        }



        ._1fragemky {

            padding-inline-start: var(--x-spacing-small-300)

        }



        [dir=ltr] ._1frageml3 {

            padding-left: var(--x-spacing-small-200)

        }



        [dir=rtl] ._1frageml3 {

            padding-right: var(--x-spacing-small-200)

        }



        ._1frageml3 {

            padding-inline-start: var(--x-spacing-small-200)

        }



        [dir=ltr] ._1frageml8 {

            padding-left: var(--x-spacing-small-100)

        }



        [dir=rtl] ._1frageml8 {

            padding-right: var(--x-spacing-small-100)

        }



        ._1frageml8 {

            padding-inline-start: var(--x-spacing-small-100)

        }



        [dir=ltr] ._1fragemld {

            padding-left: var(--x-spacing-base)

        }



        [dir=rtl] ._1fragemld {

            padding-right: var(--x-spacing-base)

        }



        ._1fragemld {

            padding-inline-start: var(--x-spacing-base)

        }



        [dir=ltr] ._1fragemli {

            padding-left: var(--x-spacing-large-100)

        }



        [dir=rtl] ._1fragemli {

            padding-right: var(--x-spacing-large-100)

        }



        ._1fragemli {

            padding-inline-start: var(--x-spacing-large-100)

        }



        [dir=ltr] ._1fragemln {

            padding-left: var(--x-spacing-large-200)

        }



        [dir=rtl] ._1fragemln {

            padding-right: var(--x-spacing-large-200)

        }



        ._1fragemln {

            padding-inline-start: var(--x-spacing-large-200)

        }



        [dir=ltr] ._1fragemls {

            padding-left: var(--x-spacing-large-300)

        }



        [dir=rtl] ._1fragemls {

            padding-right: var(--x-spacing-large-300)

        }



        ._1fragemls {

            padding-inline-start: var(--x-spacing-large-300)

        }



        [dir=ltr] ._1fragemlx {

            padding-left: var(--x-spacing-large-400)

        }



        [dir=rtl] ._1fragemlx {

            padding-right: var(--x-spacing-large-400)

        }



        ._1fragemlx {

            padding-inline-start: var(--x-spacing-large-400)

        }



        [dir=ltr] ._1fragemm2 {

            padding-left: var(--x-spacing-large-500)

        }



        [dir=rtl] ._1fragemm2 {

            padding-right: var(--x-spacing-large-500)

        }



        ._1fragemm2 {

            padding-inline-start: var(--x-spacing-large-500)

        }



        [dir=ltr] ._1fragemm7 {

            padding-left: var(--x-spacing-large-600)

        }



        [dir=rtl] ._1fragemm7 {

            padding-right: var(--x-spacing-large-600)

        }



        ._1fragemm7 {

            padding-inline-start: var(--x-spacing-large-600)

        }



        [dir=ltr] ._1fragemmc {

            padding-left: var(--x-spacing-extra-tight)

        }



        [dir=rtl] ._1fragemmc {

            padding-right: var(--x-spacing-extra-tight)

        }



        ._1fragemmc {

            padding-inline-start: var(--x-spacing-extra-tight)

        }



        [dir=ltr] ._1fragemmh {

            padding-left: var(--x-spacing-loose)

        }



        [dir=rtl] ._1fragemmh {

            padding-right: var(--x-spacing-loose)

        }



        ._1fragemmh {

            padding-inline-start: var(--x-spacing-loose)

        }



        [dir=ltr] ._1fragemmm {

            padding-left: var(--x-spacing-tight)

        }



        [dir=rtl] ._1fragemmm {

            padding-right: var(--x-spacing-tight)

        }



        ._1fragemmm {

            padding-inline-start: var(--x-spacing-tight)

        }



        [dir=ltr] ._1fragemmr {

            padding-left: var(--x-spacing-extra-loose)

        }



        [dir=rtl] ._1fragemmr {

            padding-right: var(--x-spacing-extra-loose)

        }



        ._1fragemmr {

            padding-inline-start: var(--x-spacing-extra-loose)

        }



        [dir=ltr] ._1fragemmw {

            padding-left: 0

        }



        [dir=rtl] ._1fragemmw {

            padding-right: 0

        }



        ._1fragemmw {

            padding-inline-start: 0

        }



        ._1fragemn1 {

            max-height: 100%;

            max-block-size: 100%

        }



        ._1fragemn6 {

            max-width: 100%;

            max-inline-size: 100%

        }



        ._1fragemnb {

            min-block-size: 100%;

            min-height: 100%

        }



        ._1fragemng {

            min-block-size: 100vh;

            min-height: 100vh

        }



        ._1fragemnl {

            object-fit: contain

        }



        ._1fragemnq {

            object-fit: cover

        }



        ._1fragemnv {

            position: absolute

        }



        ._1fragemo0 {

            position: fixed

        }



        ._1fragemo5 {

            position: relative

        }



        ._1fragemoa {

            position: static

        }



        ._1fragemof {

            position: sticky

        }



        ._1fragemok {

            grid-auto-flow: column

        }



        ._1fragemop {

            grid-auto-flow: row

        }

    }



    @media (prefers-contrast:more) {



        ._1fragemps,

        ._1fragempt {

            --x-default-color-border: var(--x-default-color-border-emphasized)

        }

    }



    @media screen and (prefers-reduced-motion:reduce) {

        ._1fragemvj {

            --x-duration-fast: var(--x-duration-reduced-motion)

        }



        ._1fragemvk {

            --x-duration-base: var(--x-duration-reduced-motion)

        }



        ._1fragemvl {

            --x-duration-slow: var(--x-duration-reduced-motion)

        }



        ._1fragemvm {

            --x-duration-slower: var(--x-duration-reduced-motion)

        }



        ._1fragemvn {

            --x-duration-slowest: var(--x-duration-reduced-motion)

        }

    }



    .n8k95w1:focus {

        outline: none

    }



    .n8k95w2 {

        font-family: var(--x-heading-level1-font-family, var(--x-typography-secondary-fonts));

        font-size: var(--x-heading-level1-font-size, var(--x-typography-size-extra-large));

        font-weight: var(--x-heading-level1-font-weight, var(--x-typography-secondary-weight-bold));

        letter-spacing: var(--x-heading-level1-letter-spacing);

        text-transform: var(--x-heading-level1-text-transform)

    }



    .n8k95w2,

    .n8k95w3 {

        line-height: var(--x-global-typography-line-size-small)

    }



    .n8k95w3 {

        font-family: var(--x-heading-level2-font-family, var(--x-typography-secondary-fonts));

        font-size: var(--x-heading-level2-font-size, var(--x-typography-size-medium));

        font-weight: var(--x-heading-level2-font-weight, var(--x-typography-secondary-weight-bold));

        letter-spacing: var(--x-heading-level2-letter-spacing);

        text-transform: var(--x-heading-level2-text-transform)

    }



    .n8k95w4 {

        font-family: var(--x-heading-level3-font-family, var(--x-typography-secondary-fonts));

        font-size: var(--x-heading-level3-font-size, var(--x-typography-size-default));

        font-weight: var(--x-heading-level3-font-weight, var(--x-typography-secondary-weight-bold));

        letter-spacing: var(--x-heading-level3-letter-spacing);

        line-height: var(--x-global-typography-line-size-small);

        text-transform: var(--x-heading-level3-text-transform)

    }



    .n8k95w5,

    .n8k95w6,

    .n8k95w7 {

        font-family: var(--x-typography-secondary-fonts);

        font-size: var(--x-typography-size-default);

        font-weight: var(--x-typography-secondary-weight-base);

        line-height: var(--x-global-typography-line-size-small)

    }



    ._16s97g75 {

        height: var(--_16s97g70);

        block-size: var(--_16s97g70)

    }



    ._16s97g7f {

        grid-auto-columns: var(--_16s97g7a)

    }



    ._16s97g7p {

        grid-auto-rows: var(--_16s97g7k)

    }



    ._16s97g7z {

        grid-column: var(--_16s97g7u)

    }



    ._16s97g719 {

        grid-row: var(--_16s97g714)

    }



    ._16s97g71j {

        grid-template-columns: var(--_16s97g71e)

    }



    ._16s97g71t {

        grid-template-rows: var(--_16s97g71o)

    }



    ._16s97g723 {

        width: var(--_16s97g71y);

        inline-size: var(--_16s97g71y)

    }



    ._16s97g72d {

        inset-block-start: var(--_16s97g728);

        top: var(--_16s97g728)

    }



    ._16s97g72n {

        bottom: var(--_16s97g72i);

        inset-block-end: var(--_16s97g72i)

    }



    [dir=ltr] ._16s97g72x {

        left: var(--_16s97g72s)

    }



    [dir=rtl] ._16s97g72x {

        right: var(--_16s97g72s)

    }



    ._16s97g72x {

        inset-inline-start: var(--_16s97g72s)

    }



    [dir=ltr] ._16s97g737 {

        right: var(--_16s97g732)

    }



    [dir=rtl] ._16s97g737 {

        left: var(--_16s97g732)

    }



    ._16s97g737 {

        inset-inline-end: var(--_16s97g732)

    }



    ._16s97g73h {

        max-height: var(--_16s97g73c);

        max-block-size: var(--_16s97g73c)

    }



    ._16s97g73r {

        max-width: var(--_16s97g73m);

        max-inline-size: var(--_16s97g73m)

    }



    ._16s97g741 {

        min-block-size: var(--_16s97g73w);

        min-height: var(--_16s97g73w)

    }



    ._16s97g74b {

        min-inline-size: var(--_16s97g746);

        min-width: var(--_16s97g746)

    }



    ._16s97g74l {

        transform: var(--_16s97g74g)

    }



    ._16s97g74q {

        height: var(--x-spacing-small-500);

        block-size: var(--x-spacing-small-500)

    }



    ._16s97g74v {

        height: var(--x-spacing-small-400);

        block-size: var(--x-spacing-small-400)

    }



    ._16s97g750 {

        height: var(--x-spacing-small-300);

        block-size: var(--x-spacing-small-300)

    }



    ._16s97g755 {

        height: var(--x-spacing-small-200);

        block-size: var(--x-spacing-small-200)

    }



    ._16s97g75a {

        height: var(--x-spacing-small-100);

        block-size: var(--x-spacing-small-100)

    }



    ._16s97g75f {

        height: var(--x-spacing-base);

        block-size: var(--x-spacing-base)

    }



    ._16s97g75k {

        height: var(--x-spacing-large-100);

        block-size: var(--x-spacing-large-100)

    }



    ._16s97g75p {

        height: var(--x-spacing-large-200);

        block-size: var(--x-spacing-large-200)

    }



    ._16s97g75u {

        height: var(--x-spacing-large-300);

        block-size: var(--x-spacing-large-300)

    }



    ._16s97g75z {

        height: var(--x-spacing-large-400);

        block-size: var(--x-spacing-large-400)

    }



    ._16s97g764 {

        height: var(--x-spacing-large-500);

        block-size: var(--x-spacing-large-500)

    }



    ._16s97g769 {

        height: var(--x-spacing-large-600);

        block-size: var(--x-spacing-large-600)

    }



    ._16s97g76e {

        height: var(--x-spacing-extra-tight);

        block-size: var(--x-spacing-extra-tight)

    }



    ._16s97g76j {

        height: var(--x-spacing-loose);

        block-size: var(--x-spacing-loose)

    }



    ._16s97g76o {

        height: var(--x-spacing-tight);

        block-size: var(--x-spacing-tight)

    }



    ._16s97g76t {

        height: var(--x-spacing-extra-loose);

        block-size: var(--x-spacing-extra-loose)

    }



    ._16s97g76y {

        height: 0;

        block-size: 0

    }



    ._16s97g773 {

        height: 100%;

        block-size: 100%

    }



    ._16s97g778 {

        width: var(--x-spacing-small-500);

        inline-size: var(--x-spacing-small-500)

    }



    ._16s97g77d {

        width: var(--x-spacing-small-400);

        inline-size: var(--x-spacing-small-400)

    }



    ._16s97g77i {

        width: var(--x-spacing-small-300);

        inline-size: var(--x-spacing-small-300)

    }



    ._16s97g77n {

        width: var(--x-spacing-small-200);

        inline-size: var(--x-spacing-small-200)

    }



    ._16s97g77s {

        width: var(--x-spacing-small-100);

        inline-size: var(--x-spacing-small-100)

    }



    ._16s97g77x {

        width: var(--x-spacing-base);

        inline-size: var(--x-spacing-base)

    }



    ._16s97g782 {

        width: var(--x-spacing-large-100);

        inline-size: var(--x-spacing-large-100)

    }



    ._16s97g787 {

        width: var(--x-spacing-large-200);

        inline-size: var(--x-spacing-large-200)

    }



    ._16s97g78c {

        width: var(--x-spacing-large-300);

        inline-size: var(--x-spacing-large-300)

    }



    ._16s97g78h {

        width: var(--x-spacing-large-400);

        inline-size: var(--x-spacing-large-400)

    }



    ._16s97g78m {

        width: var(--x-spacing-large-500);

        inline-size: var(--x-spacing-large-500)

    }



    ._16s97g78r {

        width: var(--x-spacing-large-600);

        inline-size: var(--x-spacing-large-600)

    }



    ._16s97g78w {

        width: var(--x-spacing-extra-tight);

        inline-size: var(--x-spacing-extra-tight)

    }



    ._16s97g791 {

        width: var(--x-spacing-loose);

        inline-size: var(--x-spacing-loose)

    }



    ._16s97g796 {

        width: var(--x-spacing-tight);

        inline-size: var(--x-spacing-tight)

    }



    ._16s97g79b {

        width: var(--x-spacing-extra-loose);

        inline-size: var(--x-spacing-extra-loose)

    }



    ._16s97g79g {

        width: 0;

        inline-size: 0

    }



    ._16s97g79l {

        width: auto;

        inline-size: auto

    }



    ._16s97g79q {

        width: 100%;

        inline-size: 100%

    }



    ._16s97g79v {

        width: -moz-fit-content;

        width: fit-content;

        inline-size: -moz-fit-content;

        inline-size: fit-content

    }



    ._16s97g7a0 {

        max-height: 100%;

        max-block-size: 100%

    }



    ._16s97g7a5 {

        max-width: 100%;

        max-inline-size: 100%

    }



    ._16s97g7aa {

        min-block-size: 100%;

        min-height: 100%

    }



    ._16s97g7af {

        min-block-size: 100vh;

        min-height: 100vh

    }



    ._16s97g7ak {

        min-inline-size: 100%;

        min-width: 100%

    }



    ._16s97g7at {

        background-image: var(--_16s97g7ap)

    }



    ._16s97g7au:hover {

        background-image: var(--_16s97g7aq)

    }



    ._16s97g7av:focus {

        background-image: var(--_16s97g7ar)

    }



    ._16s97g7aw:hover:focus {

        background-image: var(--_16s97g7as)

    }



    @media screen and (min-width:570px) {

        ._16s97g76 {

            height: var(--_16s97g71);

            block-size: var(--_16s97g71)

        }



        ._16s97g7g {

            grid-auto-columns: var(--_16s97g7b)

        }



        ._16s97g7q {

            grid-auto-rows: var(--_16s97g7l)

        }



        ._16s97g710 {

            grid-column: var(--_16s97g7v)

        }



        ._16s97g71a {

            grid-row: var(--_16s97g715)

        }



        ._16s97g71k {

            grid-template-columns: var(--_16s97g71f)

        }



        ._16s97g71u {

            grid-template-rows: var(--_16s97g71p)

        }



        ._16s97g724 {

            width: var(--_16s97g71z);

            inline-size: var(--_16s97g71z)

        }



        ._16s97g72e {

            inset-block-start: var(--_16s97g729);

            top: var(--_16s97g729)

        }



        ._16s97g72o {

            bottom: var(--_16s97g72j);

            inset-block-end: var(--_16s97g72j)

        }



        [dir=ltr] ._16s97g72y {

            left: var(--_16s97g72t)

        }



        [dir=rtl] ._16s97g72y {

            right: var(--_16s97g72t)

        }



        ._16s97g72y {

            inset-inline-start: var(--_16s97g72t)

        }



        [dir=ltr] ._16s97g738 {

            right: var(--_16s97g733)

        }



        [dir=rtl] ._16s97g738 {

            left: var(--_16s97g733)

        }



        ._16s97g738 {

            inset-inline-end: var(--_16s97g733)

        }



        ._16s97g73i {

            max-height: var(--_16s97g73d);

            max-block-size: var(--_16s97g73d)

        }



        ._16s97g73s {

            max-width: var(--_16s97g73n);

            max-inline-size: var(--_16s97g73n)

        }



        ._16s97g742 {

            min-block-size: var(--_16s97g73x);

            min-height: var(--_16s97g73x)

        }



        ._16s97g74c {

            min-inline-size: var(--_16s97g747);

            min-width: var(--_16s97g747)

        }



        ._16s97g74m {

            transform: var(--_16s97g74h)

        }



        ._16s97g74r {

            height: var(--x-spacing-small-500);

            block-size: var(--x-spacing-small-500)

        }



        ._16s97g74w {

            height: var(--x-spacing-small-400);

            block-size: var(--x-spacing-small-400)

        }



        ._16s97g751 {

            height: var(--x-spacing-small-300);

            block-size: var(--x-spacing-small-300)

        }



        ._16s97g756 {

            height: var(--x-spacing-small-200);

            block-size: var(--x-spacing-small-200)

        }



        ._16s97g75b {

            height: var(--x-spacing-small-100);

            block-size: var(--x-spacing-small-100)

        }



        ._16s97g75g {

            height: var(--x-spacing-base);

            block-size: var(--x-spacing-base)

        }



        ._16s97g75l {

            height: var(--x-spacing-large-100);

            block-size: var(--x-spacing-large-100)

        }



        ._16s97g75q {

            height: var(--x-spacing-large-200);

            block-size: var(--x-spacing-large-200)

        }



        ._16s97g75v {

            height: var(--x-spacing-large-300);

            block-size: var(--x-spacing-large-300)

        }



        ._16s97g760 {

            height: var(--x-spacing-large-400);

            block-size: var(--x-spacing-large-400)

        }



        ._16s97g765 {

            height: var(--x-spacing-large-500);

            block-size: var(--x-spacing-large-500)

        }



        ._16s97g76a {

            height: var(--x-spacing-large-600);

            block-size: var(--x-spacing-large-600)

        }



        ._16s97g76f {

            height: var(--x-spacing-extra-tight);

            block-size: var(--x-spacing-extra-tight)

        }



        ._16s97g76k {

            height: var(--x-spacing-loose);

            block-size: var(--x-spacing-loose)

        }



        ._16s97g76p {

            height: var(--x-spacing-tight);

            block-size: var(--x-spacing-tight)

        }



        ._16s97g76u {

            height: var(--x-spacing-extra-loose);

            block-size: var(--x-spacing-extra-loose)

        }



        ._16s97g76z {

            height: 0;

            block-size: 0

        }



        ._16s97g774 {

            height: 100%;

            block-size: 100%

        }



        ._16s97g779 {

            width: var(--x-spacing-small-500);

            inline-size: var(--x-spacing-small-500)

        }



        ._16s97g77e {

            width: var(--x-spacing-small-400);

            inline-size: var(--x-spacing-small-400)

        }



        ._16s97g77j {

            width: var(--x-spacing-small-300);

            inline-size: var(--x-spacing-small-300)

        }



        ._16s97g77o {

            width: var(--x-spacing-small-200);

            inline-size: var(--x-spacing-small-200)

        }



        ._16s97g77t {

            width: var(--x-spacing-small-100);

            inline-size: var(--x-spacing-small-100)

        }



        ._16s97g77y {

            width: var(--x-spacing-base);

            inline-size: var(--x-spacing-base)

        }



        ._16s97g783 {

            width: var(--x-spacing-large-100);

            inline-size: var(--x-spacing-large-100)

        }



        ._16s97g788 {

            width: var(--x-spacing-large-200);

            inline-size: var(--x-spacing-large-200)

        }



        ._16s97g78d {

            width: var(--x-spacing-large-300);

            inline-size: var(--x-spacing-large-300)

        }



        ._16s97g78i {

            width: var(--x-spacing-large-400);

            inline-size: var(--x-spacing-large-400)

        }



        ._16s97g78n {

            width: var(--x-spacing-large-500);

            inline-size: var(--x-spacing-large-500)

        }



        ._16s97g78s {

            width: var(--x-spacing-large-600);

            inline-size: var(--x-spacing-large-600)

        }



        ._16s97g78x {

            width: var(--x-spacing-extra-tight);

            inline-size: var(--x-spacing-extra-tight)

        }



        ._16s97g792 {

            width: var(--x-spacing-loose);

            inline-size: var(--x-spacing-loose)

        }



        ._16s97g797 {

            width: var(--x-spacing-tight);

            inline-size: var(--x-spacing-tight)

        }



        ._16s97g79c {

            width: var(--x-spacing-extra-loose);

            inline-size: var(--x-spacing-extra-loose)

        }



        ._16s97g79h {

            width: 0;

            inline-size: 0

        }



        ._16s97g79m {

            width: auto;

            inline-size: auto

        }



        ._16s97g79r {

            width: 100%;

            inline-size: 100%

        }



        ._16s97g79w {

            width: -moz-fit-content;

            width: fit-content;

            inline-size: -moz-fit-content;

            inline-size: fit-content

        }



        ._16s97g7a1 {

            max-height: 100%;

            max-block-size: 100%

        }



        ._16s97g7a6 {

            max-width: 100%;

            max-inline-size: 100%

        }



        ._16s97g7ab {

            min-block-size: 100%;

            min-height: 100%

        }



        ._16s97g7ag {

            min-block-size: 100vh;

            min-height: 100vh

        }



        ._16s97g7al {

            min-inline-size: 100%;

            min-width: 100%

        }

    }



    @media screen and (min-width:750px) {

        ._16s97g77 {

            height: var(--_16s97g72);

            block-size: var(--_16s97g72)

        }



        ._16s97g7h {

            grid-auto-columns: var(--_16s97g7c)

        }



        ._16s97g7r {

            grid-auto-rows: var(--_16s97g7m)

        }



        ._16s97g711 {

            grid-column: var(--_16s97g7w)

        }



        ._16s97g71b {

            grid-row: var(--_16s97g716)

        }



        ._16s97g71l {

            grid-template-columns: var(--_16s97g71g)

        }



        ._16s97g71v {

            grid-template-rows: var(--_16s97g71q)

        }



        ._16s97g725 {

            width: var(--_16s97g720);

            inline-size: var(--_16s97g720)

        }



        ._16s97g72f {

            inset-block-start: var(--_16s97g72a);

            top: var(--_16s97g72a)

        }



        ._16s97g72p {

            bottom: var(--_16s97g72k);

            inset-block-end: var(--_16s97g72k)

        }



        [dir=ltr] ._16s97g72z {

            left: var(--_16s97g72u)

        }



        [dir=rtl] ._16s97g72z {

            right: var(--_16s97g72u)

        }



        ._16s97g72z {

            inset-inline-start: var(--_16s97g72u)

        }



        [dir=ltr] ._16s97g739 {

            right: var(--_16s97g734)

        }



        [dir=rtl] ._16s97g739 {

            left: var(--_16s97g734)

        }



        ._16s97g739 {

            inset-inline-end: var(--_16s97g734)

        }



        ._16s97g73j {

            max-height: var(--_16s97g73e);

            max-block-size: var(--_16s97g73e)

        }



        ._16s97g73t {

            max-width: var(--_16s97g73o);

            max-inline-size: var(--_16s97g73o)

        }



        ._16s97g743 {

            min-block-size: var(--_16s97g73y);

            min-height: var(--_16s97g73y)

        }



        ._16s97g74d {

            min-inline-size: var(--_16s97g748);

            min-width: var(--_16s97g748)

        }



        ._16s97g74n {

            transform: var(--_16s97g74i)

        }



        ._16s97g74s {

            height: var(--x-spacing-small-500);

            block-size: var(--x-spacing-small-500)

        }



        ._16s97g74x {

            height: var(--x-spacing-small-400);

            block-size: var(--x-spacing-small-400)

        }



        ._16s97g752 {

            height: var(--x-spacing-small-300);

            block-size: var(--x-spacing-small-300)

        }



        ._16s97g757 {

            height: var(--x-spacing-small-200);

            block-size: var(--x-spacing-small-200)

        }



        ._16s97g75c {

            height: var(--x-spacing-small-100);

            block-size: var(--x-spacing-small-100)

        }



        ._16s97g75h {

            height: var(--x-spacing-base);

            block-size: var(--x-spacing-base)

        }



        ._16s97g75m {

            height: var(--x-spacing-large-100);

            block-size: var(--x-spacing-large-100)

        }



        ._16s97g75r {

            height: var(--x-spacing-large-200);

            block-size: var(--x-spacing-large-200)

        }



        ._16s97g75w {

            height: var(--x-spacing-large-300);

            block-size: var(--x-spacing-large-300)

        }



        ._16s97g761 {

            height: var(--x-spacing-large-400);

            block-size: var(--x-spacing-large-400)

        }



        ._16s97g766 {

            height: var(--x-spacing-large-500);

            block-size: var(--x-spacing-large-500)

        }



        ._16s97g76b {

            height: var(--x-spacing-large-600);

            block-size: var(--x-spacing-large-600)

        }



        ._16s97g76g {

            height: var(--x-spacing-extra-tight);

            block-size: var(--x-spacing-extra-tight)

        }



        ._16s97g76l {

            height: var(--x-spacing-loose);

            block-size: var(--x-spacing-loose)

        }



        ._16s97g76q {

            height: var(--x-spacing-tight);

            block-size: var(--x-spacing-tight)

        }



        ._16s97g76v {

            height: var(--x-spacing-extra-loose);

            block-size: var(--x-spacing-extra-loose)

        }



        ._16s97g770 {

            height: 0;

            block-size: 0

        }



        ._16s97g775 {

            height: 100%;

            block-size: 100%

        }



        ._16s97g77a {

            width: var(--x-spacing-small-500);

            inline-size: var(--x-spacing-small-500)

        }



        ._16s97g77f {

            width: var(--x-spacing-small-400);

            inline-size: var(--x-spacing-small-400)

        }



        ._16s97g77k {

            width: var(--x-spacing-small-300);

            inline-size: var(--x-spacing-small-300)

        }



        ._16s97g77p {

            width: var(--x-spacing-small-200);

            inline-size: var(--x-spacing-small-200)

        }



        ._16s97g77u {

            width: var(--x-spacing-small-100);

            inline-size: var(--x-spacing-small-100)

        }



        ._16s97g77z {

            width: var(--x-spacing-base);

            inline-size: var(--x-spacing-base)

        }



        ._16s97g784 {

            width: var(--x-spacing-large-100);

            inline-size: var(--x-spacing-large-100)

        }



        ._16s97g789 {

            width: var(--x-spacing-large-200);

            inline-size: var(--x-spacing-large-200)

        }



        ._16s97g78e {

            width: var(--x-spacing-large-300);

            inline-size: var(--x-spacing-large-300)

        }



        ._16s97g78j {

            width: var(--x-spacing-large-400);

            inline-size: var(--x-spacing-large-400)

        }



        ._16s97g78o {

            width: var(--x-spacing-large-500);

            inline-size: var(--x-spacing-large-500)

        }



        ._16s97g78t {

            width: var(--x-spacing-large-600);

            inline-size: var(--x-spacing-large-600)

        }



        ._16s97g78y {

            width: var(--x-spacing-extra-tight);

            inline-size: var(--x-spacing-extra-tight)

        }



        ._16s97g793 {

            width: var(--x-spacing-loose);

            inline-size: var(--x-spacing-loose)

        }



        ._16s97g798 {

            width: var(--x-spacing-tight);

            inline-size: var(--x-spacing-tight)

        }



        ._16s97g79d {

            width: var(--x-spacing-extra-loose);

            inline-size: var(--x-spacing-extra-loose)

        }



        ._16s97g79i {

            width: 0;

            inline-size: 0

        }



        ._16s97g79n {

            width: auto;

            inline-size: auto

        }



        ._16s97g79s {

            width: 100%;

            inline-size: 100%

        }



        ._16s97g79x {

            width: -moz-fit-content;

            width: fit-content;

            inline-size: -moz-fit-content;

            inline-size: fit-content

        }



        ._16s97g7a2 {

            max-height: 100%;

            max-block-size: 100%

        }



        ._16s97g7a7 {

            max-width: 100%;

            max-inline-size: 100%

        }



        ._16s97g7ac {

            min-block-size: 100%;

            min-height: 100%

        }



        ._16s97g7ah {

            min-block-size: 100vh;

            min-height: 100vh

        }



        ._16s97g7am {

            min-inline-size: 100%;

            min-width: 100%

        }

    }



    @media screen and (min-width:1000px) {

        ._16s97g78 {

            height: var(--_16s97g73);

            block-size: var(--_16s97g73)

        }



        ._16s97g7i {

            grid-auto-columns: var(--_16s97g7d)

        }



        ._16s97g7s {

            grid-auto-rows: var(--_16s97g7n)

        }



        ._16s97g712 {

            grid-column: var(--_16s97g7x)

        }



        ._16s97g71c {

            grid-row: var(--_16s97g717)

        }



        ._16s97g71m {

            grid-template-columns: var(--_16s97g71h)

        }



        ._16s97g71w {

            grid-template-rows: var(--_16s97g71r)

        }



        ._16s97g726 {

            width: var(--_16s97g721);

            inline-size: var(--_16s97g721)

        }



        ._16s97g72g {

            inset-block-start: var(--_16s97g72b);

            top: var(--_16s97g72b)

        }



        ._16s97g72q {

            bottom: var(--_16s97g72l);

            inset-block-end: var(--_16s97g72l)

        }



        [dir=ltr] ._16s97g730 {

            left: var(--_16s97g72v)

        }



        [dir=rtl] ._16s97g730 {

            right: var(--_16s97g72v)

        }



        ._16s97g730 {

            inset-inline-start: var(--_16s97g72v)

        }



        [dir=ltr] ._16s97g73a {

            right: var(--_16s97g735)

        }



        [dir=rtl] ._16s97g73a {

            left: var(--_16s97g735)

        }



        ._16s97g73a {

            inset-inline-end: var(--_16s97g735)

        }



        ._16s97g73k {

            max-height: var(--_16s97g73f);

            max-block-size: var(--_16s97g73f)

        }



        ._16s97g73u {

            max-width: var(--_16s97g73p);

            max-inline-size: var(--_16s97g73p)

        }



        ._16s97g744 {

            min-block-size: var(--_16s97g73z);

            min-height: var(--_16s97g73z)

        }



        ._16s97g74e {

            min-inline-size: var(--_16s97g749);

            min-width: var(--_16s97g749)

        }



        ._16s97g74o {

            transform: var(--_16s97g74j)

        }



        ._16s97g74t {

            height: var(--x-spacing-small-500);

            block-size: var(--x-spacing-small-500)

        }



        ._16s97g74y {

            height: var(--x-spacing-small-400);

            block-size: var(--x-spacing-small-400)

        }



        ._16s97g753 {

            height: var(--x-spacing-small-300);

            block-size: var(--x-spacing-small-300)

        }



        ._16s97g758 {

            height: var(--x-spacing-small-200);

            block-size: var(--x-spacing-small-200)

        }



        ._16s97g75d {

            height: var(--x-spacing-small-100);

            block-size: var(--x-spacing-small-100)

        }



        ._16s97g75i {

            height: var(--x-spacing-base);

            block-size: var(--x-spacing-base)

        }



        ._16s97g75n {

            height: var(--x-spacing-large-100);

            block-size: var(--x-spacing-large-100)

        }



        ._16s97g75s {

            height: var(--x-spacing-large-200);

            block-size: var(--x-spacing-large-200)

        }



        ._16s97g75x {

            height: var(--x-spacing-large-300);

            block-size: var(--x-spacing-large-300)

        }



        ._16s97g762 {

            height: var(--x-spacing-large-400);

            block-size: var(--x-spacing-large-400)

        }



        ._16s97g767 {

            height: var(--x-spacing-large-500);

            block-size: var(--x-spacing-large-500)

        }



        ._16s97g76c {

            height: var(--x-spacing-large-600);

            block-size: var(--x-spacing-large-600)

        }



        ._16s97g76h {

            height: var(--x-spacing-extra-tight);

            block-size: var(--x-spacing-extra-tight)

        }



        ._16s97g76m {

            height: var(--x-spacing-loose);

            block-size: var(--x-spacing-loose)

        }



        ._16s97g76r {

            height: var(--x-spacing-tight);

            block-size: var(--x-spacing-tight)

        }



        ._16s97g76w {

            height: var(--x-spacing-extra-loose);

            block-size: var(--x-spacing-extra-loose)

        }



        ._16s97g771 {

            height: 0;

            block-size: 0

        }



        ._16s97g776 {

            height: 100%;

            block-size: 100%

        }



        ._16s97g77b {

            width: var(--x-spacing-small-500);

            inline-size: var(--x-spacing-small-500)

        }



        ._16s97g77g {

            width: var(--x-spacing-small-400);

            inline-size: var(--x-spacing-small-400)

        }



        ._16s97g77l {

            width: var(--x-spacing-small-300);

            inline-size: var(--x-spacing-small-300)

        }



        ._16s97g77q {

            width: var(--x-spacing-small-200);

            inline-size: var(--x-spacing-small-200)

        }



        ._16s97g77v {

            width: var(--x-spacing-small-100);

            inline-size: var(--x-spacing-small-100)

        }



        ._16s97g780 {

            width: var(--x-spacing-base);

            inline-size: var(--x-spacing-base)

        }



        ._16s97g785 {

            width: var(--x-spacing-large-100);

            inline-size: var(--x-spacing-large-100)

        }



        ._16s97g78a {

            width: var(--x-spacing-large-200);

            inline-size: var(--x-spacing-large-200)

        }



        ._16s97g78f {

            width: var(--x-spacing-large-300);

            inline-size: var(--x-spacing-large-300)

        }



        ._16s97g78k {

            width: var(--x-spacing-large-400);

            inline-size: var(--x-spacing-large-400)

        }



        ._16s97g78p {

            width: var(--x-spacing-large-500);

            inline-size: var(--x-spacing-large-500)

        }



        ._16s97g78u {

            width: var(--x-spacing-large-600);

            inline-size: var(--x-spacing-large-600)

        }



        ._16s97g78z {

            width: var(--x-spacing-extra-tight);

            inline-size: var(--x-spacing-extra-tight)

        }



        ._16s97g794 {

            width: var(--x-spacing-loose);

            inline-size: var(--x-spacing-loose)

        }



        ._16s97g799 {

            width: var(--x-spacing-tight);

            inline-size: var(--x-spacing-tight)

        }



        ._16s97g79e {

            width: var(--x-spacing-extra-loose);

            inline-size: var(--x-spacing-extra-loose)

        }



        ._16s97g79j {

            width: 0;

            inline-size: 0

        }



        ._16s97g79o {

            width: auto;

            inline-size: auto

        }



        ._16s97g79t {

            width: 100%;

            inline-size: 100%

        }



        ._16s97g79y {

            width: -moz-fit-content;

            width: fit-content;

            inline-size: -moz-fit-content;

            inline-size: fit-content

        }



        ._16s97g7a3 {

            max-height: 100%;

            max-block-size: 100%

        }



        ._16s97g7a8 {

            max-width: 100%;

            max-inline-size: 100%

        }



        ._16s97g7ad {

            min-block-size: 100%;

            min-height: 100%

        }



        ._16s97g7ai {

            min-block-size: 100vh;

            min-height: 100vh

        }



        ._16s97g7an {

            min-inline-size: 100%;

            min-width: 100%

        }

    }



    @media screen and (min-width:1200px) {

        ._16s97g79 {

            height: var(--_16s97g74);

            block-size: var(--_16s97g74)

        }



        ._16s97g7j {

            grid-auto-columns: var(--_16s97g7e)

        }



        ._16s97g7t {

            grid-auto-rows: var(--_16s97g7o)

        }



        ._16s97g713 {

            grid-column: var(--_16s97g7y)

        }



        ._16s97g71d {

            grid-row: var(--_16s97g718)

        }



        ._16s97g71n {

            grid-template-columns: var(--_16s97g71i)

        }



        ._16s97g71x {

            grid-template-rows: var(--_16s97g71s)

        }



        ._16s97g727 {

            width: var(--_16s97g722);

            inline-size: var(--_16s97g722)

        }



        ._16s97g72h {

            inset-block-start: var(--_16s97g72c);

            top: var(--_16s97g72c)

        }



        ._16s97g72r {

            bottom: var(--_16s97g72m);

            inset-block-end: var(--_16s97g72m)

        }



        [dir=ltr] ._16s97g731 {

            left: var(--_16s97g72w)

        }



        [dir=rtl] ._16s97g731 {

            right: var(--_16s97g72w)

        }



        ._16s97g731 {

            inset-inline-start: var(--_16s97g72w)

        }



        [dir=ltr] ._16s97g73b {

            right: var(--_16s97g736)

        }



        [dir=rtl] ._16s97g73b {

            left: var(--_16s97g736)

        }



        ._16s97g73b {

            inset-inline-end: var(--_16s97g736)

        }



        ._16s97g73l {

            max-height: var(--_16s97g73g);

            max-block-size: var(--_16s97g73g)

        }



        ._16s97g73v {

            max-width: var(--_16s97g73q);

            max-inline-size: var(--_16s97g73q)

        }



        ._16s97g745 {

            min-block-size: var(--_16s97g740);

            min-height: var(--_16s97g740)

        }



        ._16s97g74f {

            min-inline-size: var(--_16s97g74a);

            min-width: var(--_16s97g74a)

        }



        ._16s97g74p {

            transform: var(--_16s97g74k)

        }



        ._16s97g74u {

            height: var(--x-spacing-small-500);

            block-size: var(--x-spacing-small-500)

        }



        ._16s97g74z {

            height: var(--x-spacing-small-400);

            block-size: var(--x-spacing-small-400)

        }



        ._16s97g754 {

            height: var(--x-spacing-small-300);

            block-size: var(--x-spacing-small-300)

        }



        ._16s97g759 {

            height: var(--x-spacing-small-200);

            block-size: var(--x-spacing-small-200)

        }



        ._16s97g75e {

            height: var(--x-spacing-small-100);

            block-size: var(--x-spacing-small-100)

        }



        ._16s97g75j {

            height: var(--x-spacing-base);

            block-size: var(--x-spacing-base)

        }



        ._16s97g75o {

            height: var(--x-spacing-large-100);

            block-size: var(--x-spacing-large-100)

        }



        ._16s97g75t {

            height: var(--x-spacing-large-200);

            block-size: var(--x-spacing-large-200)

        }



        ._16s97g75y {

            height: var(--x-spacing-large-300);

            block-size: var(--x-spacing-large-300)

        }



        ._16s97g763 {

            height: var(--x-spacing-large-400);

            block-size: var(--x-spacing-large-400)

        }



        ._16s97g768 {

            height: var(--x-spacing-large-500);

            block-size: var(--x-spacing-large-500)

        }



        ._16s97g76d {

            height: var(--x-spacing-large-600);

            block-size: var(--x-spacing-large-600)

        }



        ._16s97g76i {

            height: var(--x-spacing-extra-tight);

            block-size: var(--x-spacing-extra-tight)

        }



        ._16s97g76n {

            height: var(--x-spacing-loose);

            block-size: var(--x-spacing-loose)

        }



        ._16s97g76s {

            height: var(--x-spacing-tight);

            block-size: var(--x-spacing-tight)

        }



        ._16s97g76x {

            height: var(--x-spacing-extra-loose);

            block-size: var(--x-spacing-extra-loose)

        }



        ._16s97g772 {

            height: 0;

            block-size: 0

        }



        ._16s97g777 {

            height: 100%;

            block-size: 100%

        }



        ._16s97g77c {

            width: var(--x-spacing-small-500);

            inline-size: var(--x-spacing-small-500)

        }



        ._16s97g77h {

            width: var(--x-spacing-small-400);

            inline-size: var(--x-spacing-small-400)

        }



        ._16s97g77m {

            width: var(--x-spacing-small-300);

            inline-size: var(--x-spacing-small-300)

        }



        ._16s97g77r {

            width: var(--x-spacing-small-200);

            inline-size: var(--x-spacing-small-200)

        }



        ._16s97g77w {

            width: var(--x-spacing-small-100);

            inline-size: var(--x-spacing-small-100)

        }



        ._16s97g781 {

            width: var(--x-spacing-base);

            inline-size: var(--x-spacing-base)

        }



        ._16s97g786 {

            width: var(--x-spacing-large-100);

            inline-size: var(--x-spacing-large-100)

        }



        ._16s97g78b {

            width: var(--x-spacing-large-200);

            inline-size: var(--x-spacing-large-200)

        }



        ._16s97g78g {

            width: var(--x-spacing-large-300);

            inline-size: var(--x-spacing-large-300)

        }



        ._16s97g78l {

            width: var(--x-spacing-large-400);

            inline-size: var(--x-spacing-large-400)

        }



        ._16s97g78q {

            width: var(--x-spacing-large-500);

            inline-size: var(--x-spacing-large-500)

        }



        ._16s97g78v {

            width: var(--x-spacing-large-600);

            inline-size: var(--x-spacing-large-600)

        }



        ._16s97g790 {

            width: var(--x-spacing-extra-tight);

            inline-size: var(--x-spacing-extra-tight)

        }



        ._16s97g795 {

            width: var(--x-spacing-loose);

            inline-size: var(--x-spacing-loose)

        }



        ._16s97g79a {

            width: var(--x-spacing-tight);

            inline-size: var(--x-spacing-tight)

        }



        ._16s97g79f {

            width: var(--x-spacing-extra-loose);

            inline-size: var(--x-spacing-extra-loose)

        }



        ._16s97g79k {

            width: 0;

            inline-size: 0

        }



        ._16s97g79p {

            width: auto;

            inline-size: auto

        }



        ._16s97g79u {

            width: 100%;

            inline-size: 100%

        }



        ._16s97g79z {

            width: -moz-fit-content;

            width: fit-content;

            inline-size: -moz-fit-content;

            inline-size: fit-content

        }



        ._16s97g7a4 {

            max-height: 100%;

            max-block-size: 100%

        }



        ._16s97g7a9 {

            max-width: 100%;

            max-inline-size: 100%

        }



        ._16s97g7ae {

            min-block-size: 100%;

            min-height: 100%

        }



        ._16s97g7aj {

            min-block-size: 100vh;

            min-height: 100vh

        }



        ._16s97g7ao {

            min-inline-size: 100%;

            min-width: 100%

        }

    }



    ._94sxtb1 {

        transition-property: height, opacity;

        will-change: height, opacity

    }



    ._197l2ofe {

        background-size: cover

    }



    ._197l2off {

        background-size: contain

    }



    ._197l2ofv>* {

        -webkit-user-select: none;

        user-select: none

    }



    ._1ip0g651 {

        grid-template-columns: minmax(0, 1fr)

    }



    @supports not (grid-gap:1px) {

        ._1ip0g651:not(._1ip0g652)>*+* {

            margin-block-start: var(--x-spacing-base);

            margin-top: var(--x-spacing-base)

        }

    }



    [class].KHg82::placeholder,

    [class].QuBZo {

        font-family: var(--x-style1-typography-fonts, var(--this-font-family));

        font-size: var(--x-style1-typography-size, var(--this-font-size));

        font-weight: var(--x-style1-typography-weight, var(--this-font-weight));

        letter-spacing: var(--x-style1-typography-kerning, var(--this-letter-spacing));

        -webkit-text-decoration: var(--x-style1-typography-decoration, var(--this-typography-decoration));

        text-decoration: var(--x-style1-typography-decoration, var(--this-typography-decoration));

        text-transform: var(--x-style1-typography-case, var(--this-text-transform))

    }



    [class].VGZWH,

    [class].gBOeM::placeholder {

        font-family: var(--x-style2-typography-fonts, var(--this-font-family));

        font-size: var(--x-style2-typography-size, var(--this-font-size));

        font-weight: var(--x-style2-typography-weight, var(--this-font-weight));

        letter-spacing: var(--x-style2-typography-kerning, var(--this-letter-spacing));

        -webkit-text-decoration: var(--x-style2-typography-decoration, var(--this-typography-decoration));

        text-decoration: var(--x-style2-typography-decoration, var(--this-typography-decoration));

        text-transform: var(--x-style2-typography-case, var(--this-text-transform))

    }



    [class].cIBEF::placeholder,

    [class].sD4VP {

        font-family: var(--x-style3-typography-fonts, var(--this-font-family));

        font-size: var(--x-style3-typography-size, var(--this-font-size));

        font-weight: var(--x-style3-typography-weight, var(--this-font-weight));

        letter-spacing: var(--x-style3-typography-kerning, var(--this-letter-spacing));

        -webkit-text-decoration: var(--x-style3-typography-decoration, var(--this-typography-decoration));

        text-decoration: var(--x-style3-typography-decoration, var(--this-typography-decoration));

        text-transform: var(--x-style3-typography-case, var(--this-text-transform))

    }



    [class].RY7BR,

    [class].e22j5::placeholder {

        font-family: var(--x-style4-typography-fonts, var(--this-font-family));

        font-size: var(--x-style4-typography-size, var(--this-font-size));

        font-weight: var(--x-style4-typography-weight, var(--this-font-weight));

        letter-spacing: var(--x-style4-typography-kerning, var(--this-letter-spacing));

        -webkit-text-decoration: var(--x-style4-typography-decoration, var(--this-typography-decoration));

        text-decoration: var(--x-style4-typography-decoration, var(--this-typography-decoration));

        text-transform: var(--x-style4-typography-case, var(--this-text-transform))

    }



    [class].HC4ZY::placeholder,

    [class].qpCH_ {

        font-family: var(--x-style5-typography-fonts, var(--this-font-family));

        font-size: var(--x-style5-typography-size, var(--this-font-size));

        font-weight: var(--x-style5-typography-weight, var(--this-font-weight));

        letter-spacing: var(--x-style5-typography-kerning, var(--this-letter-spacing));

        -webkit-text-decoration: var(--x-style5-typography-decoration, var(--this-typography-decoration));

        text-decoration: var(--x-style5-typography-decoration, var(--this-typography-decoration));

        text-transform: var(--x-style5-typography-case, var(--this-text-transform))

    }



    [class].Iw6cC,

    [class].cPzLF::placeholder {

        font-family: var(--x-style6-typography-fonts, var(--this-font-family));

        font-size: var(--x-style6-typography-size, var(--this-font-size));

        font-weight: var(--x-style6-typography-weight, var(--this-font-weight));

        letter-spacing: var(--x-style6-typography-kerning, var(--this-letter-spacing));

        -webkit-text-decoration: var(--x-style6-typography-decoration, var(--this-typography-decoration));

        text-decoration: var(--x-style6-typography-decoration, var(--this-typography-decoration));

        text-transform: var(--x-style6-typography-case, var(--this-text-transform))

    }



    [class].KMQeB::placeholder,

    [class].cf4V9 {

        font-family: var(--x-style7-typography-fonts, var(--this-font-family));

        font-size: var(--x-style7-typography-size, var(--this-font-size));

        font-weight: var(--x-style7-typography-weight, var(--this-font-weight));

        letter-spacing: var(--x-style7-typography-kerning, var(--this-letter-spacing));

        -webkit-text-decoration: var(--x-style7-typography-decoration, var(--this-typography-decoration));

        text-decoration: var(--x-style7-typography-decoration, var(--this-typography-decoration));

        text-transform: var(--x-style7-typography-case, var(--this-text-transform))

    }



    [class].WCWtJ,

    [class]._Uogy::placeholder {

        font-family: var(--x-style8-typography-fonts, var(--this-font-family));

        font-size: var(--x-style8-typography-size, var(--this-font-size));

        font-weight: var(--x-style8-typography-weight, var(--this-font-weight));

        letter-spacing: var(--x-style8-typography-kerning, var(--this-letter-spacing));

        -webkit-text-decoration: var(--x-style8-typography-decoration, var(--this-typography-decoration));

        text-decoration: var(--x-style8-typography-decoration, var(--this-typography-decoration));

        text-transform: var(--x-style8-typography-case, var(--this-text-transform))

    }



    [class].UENpX,

    [class].f2vBO::placeholder {

        font-family: var(--x-style9-typography-fonts, var(--this-font-family));

        font-size: var(--x-style9-typography-size, var(--this-font-size));

        font-weight: var(--x-style9-typography-weight, var(--this-font-weight));

        letter-spacing: var(--x-style9-typography-kerning, var(--this-letter-spacing));

        -webkit-text-decoration: var(--x-style9-typography-decoration, var(--this-typography-decoration));

        text-decoration: var(--x-style9-typography-decoration, var(--this-typography-decoration));

        text-transform: var(--x-style9-typography-case, var(--this-text-transform))

    }



    ._1x52f9s3 {

        --this-font-weight: var(--x-typography-primary-weight-bold);

        font-weight: var(--x-typography-primary-weight-bold)

    }



    ._1x52f9s4 {

        font-style: italic

    }



    ._1x52f9so {

        color: var(--x-default-color-text)

    }



    ._1x52f9sp {

        color: var(--x-default-color-text-subdued, var(--x-default-color-text, inherit))

    }



    ._1x52f9sr {

        --this-font-size: var(--x-typography-size-extra-small)

    }



    ._1x52f9st {

        --this-font-size: var(--x-typography-size-small)

    }



    ._1x52f9sv {

        --this-font-size: var(--x-typography-size-default)

    }



    ._1x52f9sx {

        --this-font-size: var(--x-typography-size-medium)

    }



    ._1x52f9sz {

        --this-font-size: var(--x-typography-size-large)

    }



    ._1x52f9s11 {

        --this-font-size: var(--x-typography-size-extra-large)

    }



    @keyframes _1sg44lm5 {

        50% {

            opacity: 1

        }



        75% {

            opacity: .5

        }



        to {

            opacity: 1

        }

    }



    ._1sg44lm4 {

        background-color: var(--x-default-color-text-subdued-200);

        border-radius: var(--x-global-border-radius, var(--x-border-radius-base));

        -webkit-box-decoration-break: clone;

        box-decoration-break: clone

    }



    ._1sg44lm6 {

        animation: _1sg44lm5 var(--_1sg44lm1) ease infinite;

        animation-delay: calc(var(--_1sg44lm0) * -1)

    }



    ._1sg44lm8 {

        background-color: initial

    }



    ._1sg44lma {

        visibility: hidden

    }



    ._1sg44lm7 ._1sg44lma:empty {

        display: inline-block

    }



    @media (prefers-reduced-motion:reduce) {

        ._1sg44lm4 {

            transition: none

        }



        ._1sg44lm6 {

            animation: none

        }

    }



    @media screen and (forced-colors:active) {

        ._1sg44lm4 {

            background-color: GrayText

        }

    }



    @supports (aspect-ratio:1) {

        ._1sg44lm4 {

            aspect-ratio: var(--_1sg44lm2)

        }

    }



    @supports not (aspect-ratio:1) {

        ._1sg44lm4:before {

            content: "";

            display: block;

            height: 0;

            padding-bottom: 100%;

            padding-bottom: calc(100% / var(--_1sg44lm2))

        }

    }



    ._1mrl40qf {

        background-size: cover

    }



    ._1mrl40qg {

        background-size: contain

    }



    .a8x1wu9 {

        color: var(--x-default-color-icon)

    }



    .a8x1wul {

        height: var(--a8x1wu0);

        min-height: var(--a8x1wu0);

        min-width: var(--a8x1wu0);

        width: var(--a8x1wu0)

    }



    .a8x1wum {

        --a8x1wu0: calc(var(--x-typography-size-default) * 0.7142857142857143)

    }



    .a8x1wun {

        --a8x1wu0: calc(var(--x-typography-size-default) * 1)

    }



    .a8x1wuo {

        --a8x1wu0: calc(var(--x-typography-size-default) * 1.2857142857142858)

    }



    .a8x1wup {

        --a8x1wu0: calc(var(--x-typography-size-default) * 1.7142857142857142)

    }



    [dir=rtl] .a8x1wuw {

        transform: scaleX(-1)

    }



    .a8x1wuy {

        stroke: currentColor

    }



    .a8x1wu10 circle,

    .a8x1wu10 path {

        vector-effect: non-scaling-stroke;

        stroke-width: 1.4px

    }



    @media screen and (min-width:1000px) {

        .a8x1wur {

            --a8x1wu0: calc(var(--x-typography-size-default) * 0.7142857142857143)

        }



        .a8x1wus {

            --a8x1wu0: calc(var(--x-typography-size-default) * 1)

        }



        .a8x1wut {

            --a8x1wu0: calc(var(--x-typography-size-default) * 1.2857142857142858)

        }



        .a8x1wuu {

            --a8x1wu0: calc(var(--x-typography-size-default) * 1.7142857142857142)

        }



        .a8x1wuv {

            --a8x1wu0:

        }

    }



    .u2pextg.u2pext3,

    .u2pextg.u2pext7 {

        opacity: 1

    }



    .u2pexth {

        -webkit-backdrop-filter: blur(6px);

        backdrop-filter: blur(6px);

        background-color: #0009

    }



    .u2pexti {

        background-image: linear-gradient(180deg, white, #000c 55%)

    }



    .u2pextk {

        border-radius: var(--x-global-border-radius, var(--x-border-radius-large))

    }



    .u2pextl {

        border-radius: var(--x-border-radius-base) var(--x-border-radius-base) 0 0

    }



    .u2pextm {

        border-radius: 0

    }



    .u2pexto {

        max-width: 840px;

        max-inline-size: 840px;

        opacity: var(--u2pext0, 0);

        transform: translateY(var(--u2pext1, 30vh))

    }



    .u2pextd .u2pexto {

        --u2pext0: 1;

        --u2pext1: 100%;

        margin: unset;

        max-width: 100% !important;

        max-inline-size: 100% !important;

        max-height: 100%;

        max-block-size: 100%

    }



    .u2pexto.u2pext3,

    .u2pexto.u2pext7 {

        opacity: 1;

        transform: translateY(0)

    }



    [dir=ltr] .u2pext10 {

        padding-left: var(--x-spacing-large-200)

    }



    [dir=ltr] .u2pext10,

    [dir=rtl] .u2pext10 {

        padding-right: var(--x-spacing-large-200)

    }



    [dir=rtl] .u2pext10 {

        padding-left: var(--x-spacing-large-200)

    }



    .u2pext10 {

        flex: 1;

        margin-block-start: -3px;

        margin-top: -3px;

        padding-top: 3px;

        padding-block-start: 3px;

        padding-bottom: var(--x-spacing-large-100);

        padding-block-end: var(--x-spacing-large-100);

        padding-inline-end: var(--x-spacing-large-200);

        padding-inline-start: var(--x-spacing-large-200);

        -webkit-overflow-scrolling: touch

    }



    .u2pext10:only-child {

        margin-block-start: 0;

        margin-top: 0;

        padding-top: var(--x-spacing-large-200);

        padding-block-start: var(--x-spacing-large-200)

    }



    [dir=ltr] .u2pextd .u2pext10 {

        padding-left: var(--x-spacing-large-200)

    }



    [dir=ltr] .u2pextd .u2pext10,

    [dir=rtl] .u2pextd .u2pext10 {

        padding-right: var(--x-spacing-large-200)

    }



    [dir=rtl] .u2pextd .u2pext10 {

        padding-left: var(--x-spacing-large-200)

    }



    .u2pextd .u2pext10 {

        flex: 1;

        margin-block-start: -3px;

        margin-top: -3px;

        padding-top: 3px;

        padding-block-start: 3px;

        padding-bottom: var(--x-spacing-large-100);

        padding-block-end: var(--x-spacing-large-100);

        padding-inline-end: var(--x-spacing-large-200);

        padding-inline-start: var(--x-spacing-large-200);

        -webkit-overflow-scrolling: touch

    }



    .u2pextd .u2pext10:only-child {

        margin-block-start: 0;

        margin-top: 0;

        padding-top: var(--x-spacing-large-100);

        padding-block-start: var(--x-spacing-large-100)

    }



    .u2pext2 .u2pext10 {

        margin: 0 !important;

        padding: 0 !important

    }



    .u2pext12 {

        background-color: #fff;

        box-sizing: initial

    }



    .u2pext12:only-child {

        padding-top: var(--x-spacing-large-200);

        padding-block-start: var(--x-spacing-large-200)

    }



    .u2pexty .u2pext12 {

        flex: 1

    }



    .u2pext2 .u2pext12 {

        margin: 0 !important;

        padding: 0 !important

    }



    .u2pextd .u2pext14 {

        padding-bottom: var(--x-spacing-large-100);

        padding-top: var(--x-spacing-large-100);

        padding-block: var(--x-spacing-large-100);

        padding-left: var(--x-spacing-large-200);

        padding-right: var(--x-spacing-large-200);

        padding-inline: var(--x-spacing-large-200)

    }



    .u2pext2 .u2pext14 {

        margin: 0 !important;

        padding: 0 !important

    }



    .u2pext18 {

        margin: calc(var(--x-spacing-small-200) * -1)

    }



    .u2pext14 .u2pext18 {

        bottom: unset;

        left: unset;

        position: unset;

        right: unset;

        top: unset;

        inset: unset

    }



    .xoxyfm1 {

        left: 0;

        top: 0

    }



    .xhuvqp1 {

        border-radius: var(--x-global-border-radius, var(--x-border-radius-base))

    }



    .xhuvqp3 {

        background-color: white002e

    }



    .xhuvqpd {

        min-width: calc(2.5rem * 2)

    }



    .xhuvqpd:before {

        background-color: var(--x-default-color-background);

        border: var(--x-border-width-base) solid var(--x-default-color-border);

        border-radius: var(--x-global-border-radius, var(--x-border-radius-base));

        content: "";

        display: block;

        height: 2.5rem;

        position: absolute;

        transform: rotate(45deg);

        width: 2.5rem;

        z-index: 1

    }



    .xhuvqpf:before {

        bottom: calc(.8rem * -1);

        left: .8rem

    }



    .xhuvqpg:before {

        bottom: calc(.8rem * -1);

        left: calc(50% - (2.5rem / 2))

    }



    .xhuvqph:before {

        bottom: calc(.8rem * -1);

        right: .8rem

    }



    .xhuvqpi:before {

        left: .8rem;

        top: calc(.8rem * -1)

    }



    .xhuvqpj:before {

        left: calc(50% - (2.5rem / 2));

        top: calc(.8rem * -1)

    }



    .xhuvqpk:before {

        right: .8rem;

        top: calc(.8rem * -1)

    }



    .xhuvqpl:before {

        right: calc(.8rem * -1);

        top: .8rem

    }



    .xhuvqpm:before {

        right: calc(.8rem * -1);

        top: calc(50% - (2.5rem / 2))

    }



    .xhuvqpn:before {

        bottom: .8rem;

        right: calc(.8rem * -1)

    }



    .xhuvqpo:before {

        left: calc(.8rem * -1);

        top: .8rem

    }



    .xhuvqpp:before {

        left: calc(.8rem * -1);

        top: calc(50% - (2.5rem / 2))

    }



    .xhuvqpq:before {

        bottom: .8rem;

        left: calc(.8rem * -1)

    }



    .xhuvqps {

        border-radius: var(--x-global-border-radius, var(--x-border-radius-base))

    }



    .xhuvqpl .xhuvqps,

    .xhuvqpm .xhuvqps,

    .xhuvqpn .xhuvqps,

    .xhuvqpo .xhuvqps,

    .xhuvqpp .xhuvqps,

    .xhuvqpq .xhuvqps {

        min-height: calc(2.5rem * 2)

    }



    .xhuvqpt:after {

        border-radius: inherit;

        box-shadow: var(--x-box-shadow-extra-large);

        content: "";

        display: block;

        height: 100%;

        left: 0;

        position: absolute;

        top: 0;

        width: 100%;

        z-index: -1

    }



    @keyframes _1r4exbt4 {

        0% {

            opacity: 0;

            transform: var(--_1r4exbt2)

        }



        to {

            opacity: 1;

            transform: var(--_1r4exbt3)

        }

    }



    @keyframes _1r4exbt5 {

        0% {

            opacity: 1;

            transform: var(--_1r4exbt2)

        }



        to {

            opacity: 0;

            transform: var(--_1r4exbt3)

        }

    }



    ._1r4exbt1 {

        background-color: var(--x-default-color-text);

        color: var(--x-default-color-background)

    }



    ._1r4exbt8 {

        --_1r4exbt2: translateX(-50%) translateY(var(--x-spacing-small-300));

        --_1r4exbt3: translateX(-50%) translateY(0);

        animation: _1r4exbt4 ease-in-out var(--x-duration-base);

        transform: translateX(-50%) translateY(0)

    }



    [dir=rtl] ._1r4exbt8 {

        transform: translateX(50%)

    }



    ._1r4exbt9 {

        --_1r4exbt2: translateX(var(--x-spacing-small-300));

        --_1r4exbt3: translateX(0)

    }



    ._1r4exbt9,

    [dir=rtl] ._1r4exbt9 {

        animation: _1r4exbt4 ease-in-out var(--x-duration-base)

    }



    [dir=rtl] ._1r4exbt9 {

        --_1r4exbt2: translateX(calc(var(--x-spacing-small-300) * -1)));

        --_1r4exbt3: translateX(0)

    }



    ._1r4exbtc {

        --_1r4exbt2: translateX(-50%) translateY(0);

        --_1r4exbt3: translateX(-50%) translateY(var(--x-spacing-small-300));

        animation: _1r4exbt5 ease-in-out var(--x-duration-fast);

        transform: translateX(-50%) translateY(var(--x-spacing-small-300))

    }



    ._1r4exbtd {

        --_1r4exbt2: translateX(0);

        --_1r4exbt3: translateX(var(--x-spacing-small-300))

    }



    ._1r4exbtd,

    [dir=rtl] ._1r4exbtd {

        animation: _1r4exbt5 ease-in-out var(--x-duration-fast)

    }



    [dir=rtl] ._1r4exbtd {

        --_1r4exbt2: translateX(0);

        --_1r4exbt3: translateX(calc(var(--x-spacing-small-300) * -1));

        transform: translateX(calc(var(--x-spacing-small-300) * -1)))

    }



    @supports (display:grid) {

        ._1r4exbt1 {

            column-gap: var(--x-spacing-small-200);

            display: grid;

            grid-auto-columns: auto;

            grid-auto-flow: column

        }

    }



    ._1mjy8kn1 {

        -webkit-overflow-scrolling: touch;

        scrollbar-gutter: stable

    }



    ._1mjy8kn8:after,

    ._1mjy8kn8:before {

        bottom: 0;

        content: "";

        left: 0;

        pointer-events: none;

        position: absolute;

        right: 0;

        top: 0;

        inset: 0;

        z-index: 1

    }



    ._1mjy8kn9:before {

        background-image: radial-gradient(at 0 50%, var(--x-default-color-border), white 75%)

    }



    ._1mjy8kn9:before,

    ._1mjy8kna:after {

        background-repeat: no-repeat;

        background-size: 8px 100%

    }



    ._1mjy8kna:after {

        background-image: radial-gradient(at 100% 50%, var(--x-default-color-border), white 75%);

        background-position: 100% 0

    }



    ._1mjy8knb:before {

        background-image: radial-gradient(at 50% 0, var(--x-default-color-border), white 75%)

    }



    ._1mjy8knb:before,

    ._1mjy8knc:after {

        background-repeat: no-repeat;

        background-size: 100% 8px

    }



    ._1mjy8knc:after {

        background-image: radial-gradient(at 50% 100%, var(--x-default-color-border), white 75%);

        background-position: 0 100%

    }



    ._1mjy8knl::-webkit-scrollbar {

        display: none

    }



    ._19gi7yt2 {

        --this-font-weight: var(--x-typography-primary-weight-bold);

        font-weight: var(--x-typography-primary-weight-bold)

    }



    ._19gi7yt3 {

        font-style: italic

    }



    ._19gi7yth {

        color: var(--x-default-color-text)

    }



    ._19gi7yti {

        color: var(--x-default-color-text-subdued, var(--x-default-color-text, inherit))

    }



    ._19gi7ytj {

        text-transform: var(--x-global-typography-letter-case, uppercase)

    }



    ._19gi7ytk {

        text-transform: var(--x-global-typography-letter-case, lowercase)

    }



    ._19gi7ytl {

        text-transform: var(--x-global-typography-letter-case, capitalize)

    }



    ._19gi7ytm {

        text-transform: var(--x-global-typography-letter-case, none)

    }



    ._19gi7yto {

        --this-font-size: var(--x-typography-size-extra-small)

    }



    ._19gi7ytq {

        --this-font-size: var(--x-typography-size-small)

    }



    ._19gi7yts {

        --this-font-size: var(--x-typography-size-default)

    }



    ._19gi7ytu {

        --this-font-size: var(--x-typography-size-medium)

    }



    ._19gi7ytw {

        --this-font-size: var(--x-typography-size-large)

    }



    ._19gi7yty {

        --this-font-size: var(--x-typography-size-extra-large)

    }



    ._19gi7yt12 {

        --this-typography-decoration: line-through

    }



    ._19gi7yt13 {

        color: inherit

    }



    ._19gi7yt14 {

        font-feature-settings: "kern" off;

        font-variant: none

    }



    @media screen and (forced-colors:active) {

        ._19gi7yt13 {

            background-color: Highlight;

            color: HighlightText

        }

    }



    ._17vfpuu7 {

        grid-template-columns: auto 1fr

    }



    ._17vfpuud {

        grid-template-rows: minmax(0, 1fr)

    }



    [dir=ltr] ._17vfpuug {

        left: 50%

    }



    [dir=rtl] ._17vfpuug {

        right: 50%

    }



    ._17vfpuug {

        inset-inline-start: 50%;

        transform: translate(-50%, -50%)

    }



    ._17vfpuul {

        max-width: 9rem;

        max-inline-size: 9rem

    }



    ._17vfpuun {

        max-width: calc((52.8rem + var(--x-spacing-large-200)) + var(--x-spacing-large-200));

        max-inline-size: calc((52.8rem + var(--x-spacing-large-200)) + var(--x-spacing-large-200));

        max-height: 18.3rem;

        max-block-size: 18.3rem

    }



    ._17vfpuup {

        max-height: 93dvb;

        max-block-size: 93dvb

    }



    ._17vfpuur {

        box-shadow: 0 22px 244px 0 white0012, 0 8.03px 89.064px 0 white000d, 0 3.899px 43.239px 0 black, 0 1.911px 21.197px 0 white0008, 0 .756px 8.381px 0 white0005;

        transform: translateY(100%)

    }



    ._17vfpuur._17vfpuu0,

    ._17vfpuur._17vfpuu4 {

        opacity: 1;

        transform: translateY(0)

    }



    @media (min-width:1000px) {

        ._17vfpuud {

            grid-template-columns: minmax(0, 1fr);

            justify-content: space-between

        }



        ._17vfpuui {

            max-width: 23.4rem;

            max-inline-size: 23.4rem

        }



        ._17vfpuun {

            max-height: 10.6rem;

            max-block-size: 10.6rem;

            max-width: calc((110.4rem + var(--x-spacing-large-500)) + var(--x-spacing-large-500));

            max-inline-size: calc((110.4rem + var(--x-spacing-large-500)) + var(--x-spacing-large-500))

        }



        ._17vfpuup {

            max-height: 93dvb;

            max-block-size: 93dvb

        }

    }



    ._99ss3s1 {

        font-weight: var(--x-typography-primary-weight-bold)

    }



    ._99ss3s4 {

        min-block-size: 2.2rem;

        min-height: 2.2rem;

        min-inline-size: 2.2rem;

        min-width: 2.2rem

    }



    ._99ss3s5 {

        min-block-size: 1.9rem;

        min-height: 1.9rem;

        min-inline-size: 1.9rem;

        min-width: 1.9rem

    }



    ._99ss3s7 {

        background-color: var(--x-default-color-text-subdued);

        color: var(--x-default-color-text-contrast)

    }



    ._99ss3s8 {

        background-color: var(--swn0jh);

        color: var(--swn0jl)

    }



    ._99ss3sc {

        border-radius: var(--x-global-border-radius, var(--x-border-radius-fully-rounded))

    }



    .sdr03s1 {

        border-radius: var(--x-global-border-radius, var(--x-border-radius-base));

        border-width: var(--x-banner-border, var(--x-border-width-base));

        grid-template-areas: "Icon Content ControlCollapsible ControlDismiss";

        grid-template-columns: auto 1fr auto auto

    }



    .sdr03s2 {

        grid-template-areas: "Icon Title   ControlCollapsible ControlDismiss" ".    Content Content            Content"

    }



    .sdr03s3 {

        --x-default-color-background: var(--swn0jf);

        --x-default-color-background-subdued: var(--swn0jg);

        --x-default-color-border: var(--swn0jh);

        --x-default-color-text: var(--swn0jl);

        --x-default-color-text-subdued: var(--swn0jm)

    }



    .sdr03s3,

    .sdr03s4 {

        background-color: var(--x-default-color-background);

        border-color: var(--x-default-color-border);

        color: var(--x-default-color-text)

    }



    .sdr03s4 {

        --x-default-color-background: var(--swn0jp);

        --x-default-color-background-subdued: var(--swn0jq);

        --x-default-color-border: var(--swn0jr);

        --x-default-color-text: var(--swn0jt);

        --x-default-color-text-subdued: var(--swn0ju)

    }



    .sdr03s5 {

        --x-default-color-background: var(--swn0jw);

        --x-default-color-background-subdued: var(--swn0jx);

        --x-default-color-border: var(--swn0jy);

        --x-default-color-text: var(--swn0j10);

        --x-default-color-text-subdued: var(--swn0j11)

    }



    .sdr03s5,

    .sdr03s6 {

        background-color: var(--x-default-color-background);

        border-color: var(--x-default-color-border);

        color: var(--x-default-color-text)

    }



    .sdr03s6 {

        --x-default-color-background: var(--swn0j13);

        --x-default-color-background-subdued: var(--swn0j14);

        --x-default-color-border: var(--swn0j15);

        --x-default-color-text: var(--swn0j17);

        --x-default-color-text-subdued: var(--swn0j18)

    }



    [dir=ltr] .sdr03s7 {

        margin-right: var(--x-spacing-small-100)

    }



    [dir=rtl] .sdr03s7 {

        margin-left: var(--x-spacing-small-100)

    }



    .sdr03s7 {

        grid-area: Icon;

        margin-bottom: -.14285714285714285em;

        margin-top: -.14285714285714285em;

        margin-block: -.14285714285714285em;

        margin-inline-end: var(--x-spacing-small-100);

        max-width: 1.7142857142857142em

    }



    .sdr03s2>.sdr03s7,

    .sdr03s7 {

        -ms-grid-column: 1;

        -ms-grid-row: 1

    }



    .sdr03s3 .sdr03s7 {

        color: var(--swn0jk)

    }



    .sdr03s4 .sdr03s7 {

        color: var(--swn0js)

    }



    .sdr03s5 .sdr03s7 {

        color: var(--swn0jz)

    }



    .sdr03s6 .sdr03s7 {

        color: var(--swn0j16)

    }



    .sdr03s2 .sdr03s7 {

        margin-block-end: -.21428571428571427em;

        margin-block-start: -.2857142857142857em;

        margin-bottom: -.21428571428571427em;

        margin-top: -.2857142857142857em

    }



    .sdr03s9 {

        grid-area: Content;

        -ms-grid-column: 2;

        -ms-grid-row: 1;

        -webkit-tap-highlight-color: transparent;

        height: 4rem;

        width: 4rem

    }



    .sdr03s2>.sdr03s9 {

        -ms-grid-column: 2;

        -ms-grid-row: 2;

        -ms-grid-column-span: 3

    }



    .sdr03sa {

        grid-area: Content;

        -ms-grid-column: 2;

        -ms-grid-row: 1

    }



    .sdr03s2>.sdr03sa {

        -ms-grid-column: 2;

        -ms-grid-row: 2;

        -ms-grid-column-span: 3

    }



    .sdr03sb {

        grid-area: Title;

        -ms-grid-column: 2;

        -ms-grid-row: 1

    }



    [dir=ltr] .sdr03sd {

        margin-left: .9285714285714286em;

        margin-right: -.7857142857142857em

    }



    [dir=rtl] .sdr03sd {

        margin-left: -.7857142857142857em;

        margin-right: .9285714285714286em

    }



    .sdr03sd {

        grid-area: ControlCollapsible;

        margin-inline: .9285714285714286em -.7857142857142857em;

        margin-bottom: -.7857142857142857em;

        margin-top: -.7857142857142857em;

        margin-block: -.7857142857142857em

    }



    .sdr03s2>.sdr03sd,

    .sdr03sd {

        -ms-grid-column: 3;

        -ms-grid-row: 1

    }



    [dir=ltr] .sdr03se {

        margin-left: .9285714285714286em;

        margin-right: -.7857142857142857em

    }



    [dir=rtl] .sdr03se {

        margin-left: -.7857142857142857em;

        margin-right: .9285714285714286em

    }



    .sdr03se {

        grid-area: ControlDismiss;

        margin-inline: .9285714285714286em -.7857142857142857em;

        margin-bottom: -.7857142857142857em;

        margin-top: -.7857142857142857em;

        margin-block: -.7857142857142857em

    }



    .sdr03s2>.sdr03se,

    .sdr03se {

        -ms-grid-column: 4;

        -ms-grid-row: 1

    }



    @keyframes _1ggkr8p1 {

        0% {

            transform: rotate(0)

        }



        to {

            transform: rotate(1turn)

        }

    }



    @keyframes _1ggkr8p2 {

        0% {

            opacity: 0

        }



        to {

            opacity: 1

        }

    }



    ._1ggkr8p4 {

        animation: _1ggkr8p2 .5s ease-in-out, _1ggkr8p1 .5s linear infinite;

        fill: currentColor

    }



    ._1ggkr8p8 {

        --_1ggkr8p0: calc(var(--x-typography-size-default) * 0.7142857142857143)

    }



    ._1ggkr8p8,

    ._1ggkr8p9 {

        height: var(--_1ggkr8p0);

        min-height: var(--_1ggkr8p0);

        min-width: var(--_1ggkr8p0);

        width: var(--_1ggkr8p0)

    }



    ._1ggkr8p9 {

        --_1ggkr8p0: calc(var(--x-typography-size-default) * 1)

    }



    ._1ggkr8pa {

        --_1ggkr8p0: calc(var(--x-typography-size-default) * 1.2857142857142858)

    }



    ._1ggkr8pa,

    ._1ggkr8pb {

        height: var(--_1ggkr8p0);

        min-height: var(--_1ggkr8p0);

        min-width: var(--_1ggkr8p0);

        width: var(--_1ggkr8p0)

    }



    ._1ggkr8pb {

        --_1ggkr8p0: calc(var(--x-typography-size-default) * 2.2857142857142856)

    }



    ._1ggkr8pc {

        height: var(--_1ggkr8p0);

        min-height: var(--_1ggkr8p0);

        min-width: var(--_1ggkr8p0);

        width: var(--_1ggkr8p0)

    }



    ._1ggkr8pe {

        transform: scale(1)

    }



    .oNYFp {

        color: inherit;

        text-decoration: inherit

    }



    ._1m2hr9ge {

        background-color: var(--_1m2hr9g0);

        color: var(--_1m2hr9gb);

        letter-spacing: var(--x-global-typography-kerning)

    }



    ._1m2hr9ge:after,

    ._1m2hr9ge:before {

        box-shadow: 0 0 0 0 black;

        content: "";

        display: block;

        pointer-events: none;

        position: absolute;

        transition: inherit;

        z-index: 1

    }



    ._1m2hr9ge:after {

        bottom: -.2rem;

        left: -.2rem;

        right: -.2rem;

        top: -.2rem;

        inset: -.2rem

    }



    ._1m2hr9ge:before {

        border-radius: inherit;

        bottom: -.1rem;

        left: -.1rem;

        right: -.1rem;

        top: -.1rem;

        inset: -.1rem

    }



    ._1m2hr9gf ._1m2hr9gr,

    ._1m2hr9gi ._1m2hr9gt,

    ._1m2hr9gj ._1m2hr9gr {

        opacity: 0

    }



    ._1m2hr9gf ._1m2hr9gt,

    ._1m2hr9gj ._1m2hr9gt {

        opacity: 1

    }



    ._1m2hr9gv {

        transform: translate(-50%, -50%)

    }



    ._1m2hr9gy:before {

        box-shadow: inset 0 calc(var(--_1m2hr9g5) * -1) 0 0 var(--_1m2hr9g3)

    }



    ._1m2hr9gy:focus:before {

        box-shadow: inset 0 calc(var(--_1m2hr9g5) * -1) 0 0 var(--_1m2hr9g4)

    }



    ._1m2hr9gz:before {

        box-shadow: inset 0 0 0 var(--_1m2hr9g5) var(--_1m2hr9g3)

    }



    ._1m2hr9gz:focus:before {

        box-shadow: inset 0 0 0 var(--_1m2hr9g5) var(--_1m2hr9g4)

    }



    ._1m2hr9g16 {

        --_1m2hr9g0: var(--x-default-color-background);

        --_1m2hr9g1: var(--swn0jen);

        --_1m2hr9gb: var(--x-default-color-text);

        --_1m2hr9gc: var(--swn0jeo);

        --_1m2hr9g6: var(--x-default-color-background);

        --_1m2hr9g3: var(--x-default-color-border);

        --_1m2hr9g4: var(--swn0jep);

        --_1m2hr9g5: var(--x-primary-button-border-width);

        --_1m2hr9g2: var(--x-primary-button-block-padding);

        --_1m2hr9g7: var(--x-primary-button-inline-padding);

        border-radius: var(--x-primary-button-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)));

        font-family: var(--x-primary-button-font-family);

        font-size: var(--x-primary-button-font-size);

        font-weight: var(--x-primary-button-font-weight, var(--x-typography-primary-weight-bold));

        letter-spacing: var(--x-primary-button-letter-spacing, var(--x-global-typography-kerning));

        text-transform: var(--x-primary-button-text-transform)

    }



    ._1m2hr9g16:after {

        border-radius: calc(var(--x-primary-button-border-radius, var(--x-global-border-radius, var(--x-border-radius-base))) + .1rem)

    }



    ._1m2hr9g17 {

        --_1m2hr9g0: var(--x-default-color-background);

        --_1m2hr9g1: var(--swn0jen);

        --_1m2hr9gb: var(--x-default-color-text);

        --_1m2hr9gc: var(--swn0jeo);

        --_1m2hr9g6: var(--x-default-color-text);

        --_1m2hr9g3: var(--x-default-color-border);

        --_1m2hr9g4: var(--swn0jep);

        --_1m2hr9g5: var(--x-secondary-button-border-width);

        --_1m2hr9g2: var(--x-secondary-button-block-padding);

        --_1m2hr9g7: var(--x-secondary-button-inline-padding);

        border-radius: var(--x-secondary-button-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)));

        font-family: var(--x-secondary-button-font-family);

        font-size: var(--x-secondary-button-font-size);

        font-weight: var(--x-secondary-button-font-weight, var(--x-typography-secondary-weight-bold));

        letter-spacing: var(--x-secondary-button-letter-spacing, var(--x-global-typography-kerning));

        text-transform: var(--x-secondary-button-text-transform)

    }



    ._1m2hr9g17:after {

        border-radius: calc(var(--x-secondary-button-border-radius, var(--x-global-border-radius, var(--x-border-radius-base))) + .1rem)

    }



    ._1m2hr9g18 {

        --_1m2hr9gb: var(--x-default-color-accent);

        --_1m2hr9gc: var(--x-default-color-accent-hovered);

        --_1m2hr9g6: var(--x-default-color-accent-hovered);

        --_1m2hr9g3: none;

        --_1m2hr9g5: 0px;

        --_1m2hr9g2: 0px;

        --_1m2hr9g7: 0px;

        --_1m2hr9g8: -0.7142857142857143em;

        --_1m2hr9g9: -0.7142857142857143em;

        text-transform: var(--x-global-typography-letter-case)

    }



    ._1m2hr9g18:after {

        border-radius: var(--x-global-border-radius, var(--x-border-radius-base))

    }



    ._1m2hr9g18._1m2hr9g12 {

        --_1m2hr9g9: 0px

    }



    ._1m2hr9g18:before {

        bottom: var(--_1m2hr9g8);

        content: "";

        left: var(--_1m2hr9g9);

        pointer-events: unset;

        position: absolute;

        right: var(--_1m2hr9g9);

        top: var(--_1m2hr9g8);

        inset: var(--_1m2hr9g8) var(--_1m2hr9g9);

        z-index: 0

    }



    ._1m2hr9g1m._1m2hr9gx {

        --_1m2hr9g0: var(--swn0jd);

        --_1m2hr9g1: var(--swn0je);

        --_1m2hr9gb: var(--swn0ji);

        --_1m2hr9gc: var(--swn0jj);

        --_1m2hr9g6: var(--swn0jd);

        --_1m2hr9g3: var(--swn0jd);

        --_1m2hr9g4: var(--swn0je)

    }



    ._1m2hr9g1m._1m2hr9gw {

        --_1m2hr9gb: var(--swn0jd);

        --_1m2hr9gc: var(--swn0je);

        --_1m2hr9g6: var(--swn0jd);

        --_1m2hr9g3: var(--swn0jd);

        --_1m2hr9g4: var(--swn0je)

    }



    ._1m2hr9g1m._1m2hr9g18 {

        --_1m2hr9g0: black;

        --_1m2hr9g1: black;

        --_1m2hr9gb: var(--swn0jd);

        --_1m2hr9gc: var(--swn0je);

        --_1m2hr9g6: var(--swn0jd)

    }



    ._1m2hr9g1n._1m2hr9gx {

        --_1m2hr9g0: var(--x-default-color-text);

        --_1m2hr9g1: var(--x-default-color-text);

        --_1m2hr9gb: var(--x-default-color-background);

        --_1m2hr9gc: var(--x-default-color-background-subdued);

        --_1m2hr9g6: var(--x-default-color-text);

        --_1m2hr9g3: var(--x-default-color-text);

        --_1m2hr9g4: var(--x-default-color-text)

    }



    ._1m2hr9g1n._1m2hr9gw {

        --_1m2hr9gb: var(--x-default-color-text);

        --_1m2hr9gc: var(--x-default-color-text);

        --_1m2hr9g6: var(--x-default-color-text);

        --_1m2hr9g3: var(--x-default-color-border);

        --_1m2hr9g4: var(--x-default-color-border)

    }



    ._1m2hr9g1n._1m2hr9g18 {

        --_1m2hr9g0: black;

        --_1m2hr9g1: black;

        --_1m2hr9gb: inherit;

        --_1m2hr9gc: inherit;

        --_1m2hr9g6: currentcolor

    }



    ._1m2hr9g1o {

        padding: calc(var(--_1m2hr9g2) * var(--_1m2hr9ga)) calc(var(--_1m2hr9g7) * var(--_1m2hr9ga))

    }



    ._1m2hr9g1p {

        --_1m2hr9ga: 0.6663890045814242

    }



    ._1m2hr9g1q {

        --_1m2hr9ga: 1

    }



    ._1m2hr9g1r {

        --_1m2hr9ga: 1.5006250000000003

    }



    ._1m2hr9g1s {

        --_1m2hr9ga: 1.8382656250000005

    }



    ._1m2hr9g25 {

        --_1m2hr9g2: 0px

    }



    ._1m2hr9g29:not(._1m2hr9g27)._1m2hr9g18 {

        opacity: var(--x-opacity-disabled)

    }



    ._1m2hr9g29:not(._1m2hr9g27)._1m2hr9g10:before,

    ._1m2hr9g29:not(._1m2hr9g27)._1m2hr9gz:before {

        box-shadow: inset 0 0 0 var(--_1m2hr9g5) var(--_1m2hr9g3)

    }



    ._1m2hr9g29:not(._1m2hr9g27)._1m2hr9gy:before {

        box-shadow: inset 0 calc(var(--_1m2hr9g5) * -1) 0 0 var(--_1m2hr9g3)

    }



    ._1m2hr9g29:not(._1m2hr9g27)._1m2hr9gx {

        --_1m2hr9gb: var(--x-default-color-text-subdued);

        --_1m2hr9g3: var(--x-default-color-border);

        --_1m2hr9g0: var(--x-default-color-background-subdued)

    }



    ._1m2hr9g29:not(._1m2hr9g27)._1m2hr9gw {

        --_1m2hr9gb: var(--x-default-color-text-subdued);

        --_1m2hr9g3: var(--x-default-color-border)

    }



    [dir=ltr] ._1m2hr9g2a:first-child:not(:only-child),

    [dir=ltr] ._1m2hr9g2a:first-child:not(:only-child):after {

        border-top-right-radius: 0

    }



    [dir=rtl] ._1m2hr9g2a:first-child:not(:only-child),

    [dir=rtl] ._1m2hr9g2a:first-child:not(:only-child):after {

        border-top-left-radius: 0

    }



    [dir=ltr] ._1m2hr9g2a:first-child:not(:only-child),

    [dir=ltr] ._1m2hr9g2a:first-child:not(:only-child):after {

        border-bottom-right-radius: 0

    }



    [dir=rtl] ._1m2hr9g2a:first-child:not(:only-child),

    [dir=rtl] ._1m2hr9g2a:first-child:not(:only-child):after {

        border-bottom-left-radius: 0

    }



    ._1m2hr9g2a:first-child:not(:only-child),

    ._1m2hr9g2a:first-child:not(:only-child):after {

        border-end-end-radius: 0;

        border-start-end-radius: 0

    }



    [dir=ltr] ._1m2hr9g2a:last-child:not(:only-child),

    [dir=ltr] ._1m2hr9g2a:last-child:not(:only-child):after {

        border-top-left-radius: 0

    }



    [dir=rtl] ._1m2hr9g2a:last-child:not(:only-child),

    [dir=rtl] ._1m2hr9g2a:last-child:not(:only-child):after {

        border-top-right-radius: 0

    }



    [dir=ltr] ._1m2hr9g2a:last-child:not(:only-child),

    [dir=ltr] ._1m2hr9g2a:last-child:not(:only-child):after {

        border-bottom-left-radius: 0

    }



    [dir=rtl] ._1m2hr9g2a:last-child:not(:only-child),

    [dir=rtl] ._1m2hr9g2a:last-child:not(:only-child):after {

        border-bottom-right-radius: 0

    }



    ._1m2hr9g2a:last-child:not(:only-child),

    ._1m2hr9g2a:last-child:not(:only-child):after {

        border-end-start-radius: 0;

        border-start-start-radius: 0

    }



    ._1m2hr9g2a:not(:first-child):not(:last-child),

    ._1m2hr9g2a:not(:first-child):not(:last-child):after {

        border-radius: 0

    }



    ._1m2hr9g2b {

        --_1m2hr9g2: var(--x-spacing-small-200);

        --_1m2hr9g7: var(--x-spacing-base);

        border-radius: var(--x-global-border-radius, var(--x-border-radius-small))

    }



    @media (hover:hover) {

        ._1m2hr9ge:focus {

            background-color: var(--_1m2hr9g1);

            color: var(--_1m2hr9gc);

            outline: 1px solid white

        }



        ._1m2hr9ge:focus-visible:after,

        ._1m2hr9ge:focus:after {

            box-shadow: 0 0 0 .2rem var(--_1m2hr9g6)

        }



        ._1m2hr9ge:focus:not(:focus-visible):after {

            box-shadow: none

        }



        ._1m2hr9ge:hover {

            background-color: var(--_1m2hr9g1);

            color: var(--_1m2hr9gc)

        }



        ._1m2hr9gy:hover:before {

            box-shadow: inset 0 calc(var(--_1m2hr9g5) * -1) 0 0 var(--_1m2hr9g4)

        }



        ._1m2hr9gz:hover:before {

            box-shadow: inset 0 0 0 var(--_1m2hr9g5) var(--_1m2hr9g4)

        }



        ._1m2hr9g2b:focus-visible,

        ._1m2hr9g2b:hover:not(:disabled) {

            background-color: var(--x-default-color-background-subdued)

        }

    }



    @media (hover:none) {

        ._1m2hr9ge:active {

            background-color: var(--_1m2hr9g1);

            color: var(--_1m2hr9gc);

            transition-duration: var(--x-duration-fast);

            transition-timing-function: var(--x-timing-ease-out)

        }

    }



    @media screen and (prefers-reduced-motion:reduce) {



        ._1m2hr9gf ._1m2hr9gr,

        ._1m2hr9gi ._1m2hr9gr,

        ._1m2hr9gj ._1m2hr9gr {

            display: none

        }

    }



    @media screen and (min-width:750px) {

        ._1m2hr9g1t {

            --_1m2hr9ga: 0.6663890045814242

        }



        ._1m2hr9g1u {

            --_1m2hr9ga: 1

        }



        ._1m2hr9g1v {

            --_1m2hr9ga: 1.5006250000000003

        }



        ._1m2hr9g1w {

            --_1m2hr9ga: 1.8382656250000005

        }

    }



    @media screen and (min-width:1000px) {

        ._1m2hr9g1x {

            --_1m2hr9ga: 0.6663890045814242

        }



        ._1m2hr9g1y {

            --_1m2hr9ga: 1

        }



        ._1m2hr9g1z {

            --_1m2hr9ga: 1.5006250000000003

        }



        ._1m2hr9g20 {

            --_1m2hr9ga: 1.8382656250000005

        }

    }



    @media screen and (min-width:1200px) {

        ._1m2hr9g21 {

            --_1m2hr9ga: 0.6663890045814242

        }



        ._1m2hr9g22 {

            --_1m2hr9ga: 1

        }



        ._1m2hr9g23 {

            --_1m2hr9ga: 1.5006250000000003

        }



        ._1m2hr9g24 {

            --_1m2hr9ga: 1.8382656250000005

        }

    }



    ._1mmswk94 {

        height: var(--x-checkbox-size);

        width: var(--x-checkbox-size)

    }



    ._1mmswk96 {

        --_1mmswk90: var(--x-checkbox-border-radius, var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base))));

        background-clip: padding-box;

        border-radius: var(--_1mmswk90);

        box-shadow: 0 0 0 var(--x-control-border-width) var(--x-default-color-border) inset;

        box-sizing: initial

    }



    ._1mmswk96:before {

        border-radius: calc(var(--_1mmswk90) - 1px);

        box-shadow: 0 0 0 0 var(--x-default-color-accent) inset, 0 0 0 0 var(--x-default-color-accent);

        content: "";

        display: block;

        height: 100%;

        opacity: .3;

        pointer-events: none;

        transition: box-shadow var(--x-duration-fast) var(--x-timing-ease-out);

        width: 100%

    }



    ._1mmswk96:active,

    ._1mmswk96:focus {

        box-shadow: 0 0 0 .1rem var(--x-default-color-accent) inset;

        outline: none

    }



    ._1mmswk96:active:before,

    ._1mmswk96:focus:before {

        box-shadow: 0 0 0 .1rem var(--x-default-color-accent) inset, 0 0 0 .3rem var(--x-default-color-accent)

    }



    ._1mmswk96:active:not(:focus-visible):before,

    ._1mmswk96:focus:not(:focus-visible):before {

        box-shadow: none

    }



    ._1mmswk96:focus-visible:before {

        box-shadow: 0 0 0 .1rem var(--x-default-color-accent) inset, 0 0 0 .3rem var(--x-default-color-accent)

    }



    ._1mmswk96:checked {

        box-shadow: 0 0 0 .7142857142857143em var(--x-default-color-accent) inset

    }



    ._1mmswk9c:not(:checked) {

        box-shadow: 0 0 0 .14285714285714285em var(--x-default-color-critical) inset

    }



    ._1mmswk9c:not(:checked):active:before,

    ._1mmswk9c:not(:checked):focus:before {

        box-shadow: 0 0 0 .07142857142857142em var(--x-default-color-critical) inset, 0 0 0 .21428571428571427em var(--x-default-color-critical)

    }



    ._1mmswk9e {

        cursor: default

    }



    ._1mmswk9e:before {

        display: none

    }



    ._1mmswk9a._1mmswk9e {

        background-color: var(--x-default-color-background-subdued)

    }



    ._1mmswk9h {

        cursor: default

    }



    ._1mmswk9i {

        margin-block-start: var(--x-spacing-small-400);

        margin-top: var(--x-spacing-small-400)

    }



    [dir=ltr] ._1mmswk9k {

        left: calc(50% + 1px)

    }



    [dir=rtl] ._1mmswk9k {

        right: calc(50% + 1px)

    }



    ._1mmswk9k {

        color: var(--x-default-color-accent-contrast);

        inset-block-start: calc(50% + 1px);

        inset-inline-start: calc(50% + 1px);

        top: calc(50% + 1px);

        transform: translate(-50%, -50%);

        transform-origin: center

    }



    ._1mmswk96:checked+._1mmswk9k {

        opacity: 1

    }



    [dir=rtl] ._1mmswk9k {

        transform: translate(50%, -50%)

    }



    .yyi4nyc {

        --yyi4ny0: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)));

        --yyi4ny1: var(--yyi4ny0);

        --yyi4ny2: var(--yyi4ny0);

        color: var(--x-default-color-text)

    }



    .yyi4nyd {

        --yyi4ny3: var(--yyi4ny0);

        --yyi4ny4: var(--yyi4ny0)

    }



    .yyi4nye {

        --yyi4ny3: calc(var(--yyi4ny0) - 1px);

        --yyi4ny4: calc(var(--yyi4ny0) - 1px)

    }



    .yyi4nyf {

        --yyi4ny5: solid

    }



    .yyi4nyg {

        --yyi4ny5: dotted

    }



    [dir=ltr] .yyi4nyh {

        border-top-left-radius: var(--yyi4ny1)

    }



    [dir=ltr] .yyi4nyh,

    [dir=rtl] .yyi4nyh {

        border-top-right-radius: var(--yyi4ny1)

    }



    [dir=rtl] .yyi4nyh {

        border-top-left-radius: var(--yyi4ny1)

    }



    [dir=ltr] .yyi4nyh {

        border-bottom-left-radius: var(--yyi4ny2)

    }



    [dir=ltr] .yyi4nyh,

    [dir=rtl] .yyi4nyh {

        border-bottom-right-radius: var(--yyi4ny2)

    }



    [dir=rtl] .yyi4nyh {

        border-bottom-left-radius: var(--yyi4ny2)

    }



    .yyi4nyh {

        border: 1px var(--x-default-color-border) var(--yyi4ny5);

        border-end-end-radius: var(--yyi4ny2);

        border-end-start-radius: var(--yyi4ny2);

        border-start-end-radius: var(--yyi4ny1);

        border-start-start-radius: var(--yyi4ny1)

    }



    .yyi4nyj:not(:first-child) {

        --yyi4ny1: 0;

        --yyi4ny3: 0;

        border-block-start: none;

        border-top: none

    }



    .yyi4nyj:not(:last-child) {

        --yyi4ny2: 0;

        --yyi4ny4: 0

    }



    .yyi4nyd .yyi4nyj {

        border-inline: none;

        border-left: none;

        border-right: none

    }



    .yyi4nyd .yyi4nyj:first-child {

        border-block-start: none;

        border-top: none

    }



    .yyi4nyd .yyi4nyj:last-child,

    .yyi4nyd .yyi4nyj:not(:last-child) {

        border-block-end: none;

        border-bottom: none

    }



    .yyi4nyk:not(:first-child) {

        margin-block-start: var(--yyi4ny6, var(--x-choice-list-group-spacing));

        margin-top: var(--yyi4ny6, var(--x-choice-list-group-spacing))

    }



    .yyi4nyd .yyi4nyk {

        border: none

    }



    .yyi4nyq {

        --yyi4nyb: var(--x-radio-size)

    }



    .yyi4nyr {

        --yyi4nyb: var(--x-radio-large-size)

    }



    .yyi4nyu {

        grid-template-columns: min-content auto

    }



    .yyi4nys.yyi4nyu {

        grid-template-columns: min-content

    }



    [dir=ltr] .yyi4nyw {

        border-top-left-radius: var(--yyi4ny3)

    }



    [dir=ltr] .yyi4nyw,

    [dir=rtl] .yyi4nyw {

        border-top-right-radius: var(--yyi4ny3)

    }



    [dir=rtl] .yyi4nyw {

        border-top-left-radius: var(--yyi4ny3)

    }



    [dir=ltr] .yyi4nyw {

        border-bottom-left-radius: var(--yyi4ny4)

    }



    [dir=ltr] .yyi4nyw,

    [dir=rtl] .yyi4nyw {

        border-bottom-right-radius: var(--yyi4ny4)

    }



    [dir=rtl] .yyi4nyw {

        border-bottom-left-radius: var(--yyi4ny4)

    }



    .yyi4nyw {

        --yyi4ny9: ;

        --yyi4nya: ;

        -webkit-tap-highlight-color: transparent;

        border-end-end-radius: var(--yyi4ny4);

        border-end-start-radius: var(--yyi4ny4);

        border-start-end-radius: var(--yyi4ny3);

        border-start-start-radius: var(--yyi4ny3);

        grid-template-columns: var(--yyi4ny9) [label] 1fr var(--yyi4nya);

        padding: var(--yyi4ny7, var(--x-spacing-large-100)) var(--yyi4ny8, var(--x-spacing-large-100));

        transition: all var(--x-duration-fast) var(--x-timing-base)

    }



    .yyi4nyx {

        --yyi4ny9: min-content

    }



    .yyi4nyy {

        --yyi4nya: minmax(0, max-content)

    }



    [dir=ltr] .yyi4ny10:before {

        border-top-left-radius: var(--yyi4ny1)

    }



    [dir=ltr] .yyi4ny10:before,

    [dir=rtl] .yyi4ny10:before {

        border-top-right-radius: var(--yyi4ny1)

    }



    [dir=rtl] .yyi4ny10:before {

        border-top-left-radius: var(--yyi4ny1)

    }



    [dir=ltr] .yyi4ny10:before {

        border-bottom-left-radius: var(--yyi4ny2)

    }



    [dir=ltr] .yyi4ny10:before,

    [dir=rtl] .yyi4ny10:before {

        border-bottom-right-radius: var(--yyi4ny2)

    }



    [dir=rtl] .yyi4ny10:before {

        border-bottom-left-radius: var(--yyi4ny2)

    }



    .yyi4ny10:before {

        border: 1px var(--x-default-color-border) solid;

        border-end-end-radius: var(--yyi4ny2);

        border-end-start-radius: var(--yyi4ny2);

        border-start-end-radius: var(--yyi4ny1);

        border-start-start-radius: var(--yyi4ny1);

        bottom: 0;

        content: "";

        display: block;

        left: 0;

        position: absolute;

        right: 0;

        top: 0;

        inset: 0;

        opacity: 0;

        pointer-events: none;

        transition: all var(--x-duration-fast) var(--x-timing-base);

        z-index: 1

    }



    .yyi4nyd .yyi4ny10:before {

        border: none

    }



    .yyi4nye .yyi4ny10:before {

        bottom: -1px;

        left: -1px;

        right: -1px;

        top: -1px;

        inset: -1px

    }



    .yyi4nye .yyi4nyj:not(:first-child) .yyi4ny10:before {

        inset-block-start: -1px;

        top: -1px

    }



    .yyi4nye .yyi4nyj:not(:last-child) .yyi4ny10:before {

        bottom: -1px;

        inset-block-end: -1px

    }



    .yyi4ny11:before {

        opacity: 1

    }



    .yyi4ny14 {

        --x-default-color-border: var(--x-default-color-accent)

    }



    .yyi4ny15 {

        grid-column: label/-1

    }



    .yyi4ny18 {

        font-family: var(--x-typography-primary-fonts);

        font-size: var(--x-typography-size-default);

        font-weight: var(--x-typography-primary-weight-base);

        line-height: var(--x-global-typography-line-size-default);

        text-transform: var(--x-global-typography-letter-case)

    }



    .yyi4ny19:not(:has(button)) {

        opacity: var(--x-opacity-disabled)

    }



    .yyi4ny1a {

        grid-column-start: 2

    }



    [dir=ltr] .yyi4ny1d {

        border-bottom-left-radius: calc(var(--yyi4ny0) - 1px)

    }



    [dir=ltr] .yyi4ny1d,

    [dir=rtl] .yyi4ny1d {

        border-bottom-right-radius: calc(var(--yyi4ny0) - 1px)

    }



    [dir=rtl] .yyi4ny1d {

        border-bottom-left-radius: calc(var(--yyi4ny0) - 1px)

    }



    .yyi4ny1d {

        border-end-end-radius: calc(var(--yyi4ny0) - 1px);

        border-end-start-radius: calc(var(--yyi4ny0) - 1px);

        border-top: 1px var(--x-default-color-border) var(--yyi4ny5)

    }



    .yyi4ny1d:empty {

        display: none

    }



    .yyi4nyj:not(:last-child) .yyi4ny1d {

        border-radius: 0

    }



    .yyi4nyd .yyi4nym .yyi4ny1d {

        border-radius: calc(var(--yyi4ny0) - 1px);

        border-top: none

    }



    .yyi4nyd .yyi4ny1d {

        background-clip: padding-box;

        border-top: var(--x-spacing-small-500) solid white

    }



    .yyi4ny1f {

        background-color: var(--x-default-color-background-subdued-alpha)

    }



    .yyi4nyd .yyi4ny1g {

        border-top: none

    }



    .yyi4ny1c.yyi4ny1h {

        padding-top: var(--x-spacing-small-300)

    }



    .yyi4ny1d.yyi4ny1h {

        padding: var(--yyi4ny7, var(--x-spacing-large-100)) var(--yyi4ny8, var(--x-spacing-large-100))

    }



    .yyi4nyd .yyi4nyl .yyi4ny1g.yyi4ny1h {

        padding-top: 0;

        padding-block-start: 0

    }



    [dir=ltr] .yyi4nyd .yyi4nyl.yyi4nyi .yyi4ny1g.yyi4ny1h {

        padding-left: calc(var(--yyi4ny7, var(--x-spacing-large-100)) + var(--yyi4nyb) + var(--x-spacing-small-100))

    }



    [dir=rtl] .yyi4nyd .yyi4nyl.yyi4nyi .yyi4ny1g.yyi4ny1h {

        padding-right: calc(var(--yyi4ny7, var(--x-spacing-large-100)) + var(--yyi4nyb) + var(--x-spacing-small-100))

    }



    .yyi4nyd .yyi4nyl.yyi4nyi .yyi4ny1g.yyi4ny1h {

        padding-inline-start: calc(var(--yyi4ny7, var(--x-spacing-large-100)) + var(--yyi4nyb) + var(--x-spacing-small-100))

    }



    .yyi4ny1i:has(+* .yyi4ny1d):not(:has(+* .yyi4ny1d:empty)) {

        --yyi4ny2: 0;

        --yyi4ny4: 0

    }



    ._6hzjvo4 {

        background-clip: padding-box;

        border: var(--x-control-border-width) var(--x-default-color-border) solid;

        border-radius: 50%

    }



    ._6hzjvo4:before {

        border-radius: 50%;

        box-shadow: 0 0 0 0 var(--_6hzjvo0);

        content: "";

        display: block;

        left: 0;

        opacity: .3;

        pointer-events: none;

        position: absolute;

        top: 0;

        transition: box-shadow var(--x-duration-fast) var(--x-timing-ease-out)

    }



    ._6hzjvo4:active,

    ._6hzjvo4:focus {

        border-color: var(--_6hzjvo0);

        outline: none

    }



    ._6hzjvo4:active:before,

    ._6hzjvo4:focus:before {

        box-shadow: 0 0 0 .3rem var(--_6hzjvo0)

    }



    ._6hzjvo4:active:not(:focus-visible):before,

    ._6hzjvo4:focus:not(:focus-visible):before {

        box-shadow: none

    }



    ._6hzjvo4:focus-visible:before {

        box-shadow: 0 0 0 .3rem var(--_6hzjvo0)

    }



    ._6hzjvob {

        cursor: default

    }



    ._6hzjvob:before {

        display: none

    }



    ._6hzjvo8._6hzjvob {

        background-color: var(--x-default-color-background-subdued)

    }



    ._6hzjvoc {

        --_6hzjvo0: var(--x-default-color-accent);

        --_6hzjvo1: var(--x-default-color-accent-contrast)

    }



    ._6hzjvod {

        --_6hzjvo0: var(--swn0j8);

        --_6hzjvo1: var(--swn0jb)

    }



    ._6hzjvoe:checked {

        background-color: var(--_6hzjvo1)

    }



    ._6hzjvoe:after {

        background-clip: padding-box;

        background-color: var(--_6hzjvo0);

        border: .2857142857142857em solid black;

        border-radius: 50%;

        content: "";

        display: block;

        left: 0;

        pointer-events: none;

        position: absolute;

        top: 0;

        transform: scale(0);

        transition: transform var(--x-duration-fast) var(--x-timing-ease-out)

    }



    ._6hzjvoe:checked:after {

        transform: scale(1)

    }



    ._6hzjvof:checked {

        background-color: var(--_6hzjvo1);

        border: .42857142857142855em var(--_6hzjvo0) solid

    }



    ._6hzjvog,

    ._6hzjvog:after,

    ._6hzjvog:before {

        height: var(--x-radio-size);

        margin-block-start: .14285714285714285em;

        margin-top: .14285714285714285em;

        width: var(--x-radio-size)

    }



    ._6hzjvoh,

    ._6hzjvoh:after,

    ._6hzjvoh:before {

        height: var(--x-radio-large-size);

        margin-block-start: -.07142857142857142em;

        margin-top: -.07142857142857142em;

        width: var(--x-radio-large-size)

    }



    .sgqviy1 {

        height: 1.4285714285714286em;

        width: 1.9285714285714286em

    }



    .sgqviy2 {

        height: 1.0714285714285714em;

        width: 1.4285714285714286em

    }



    ._5uqybw2 {

        flex-wrap: wrap

    }



    [dir=ltr] ._5uqybw3 {

        margin-left: calc(var(--x-spacing-base) * -1)

    }



    [dir=rtl] ._5uqybw3 {

        margin-right: calc(var(--x-spacing-base) * -1)

    }



    ._5uqybw3 {

        margin-block-start: calc(var(--x-spacing-base) * -1);

        margin-top: calc(var(--x-spacing-base) * -1);

        margin-inline-start: calc(var(--x-spacing-base) * -1)

    }



    [dir=ltr] ._5uqybw3:not(._5uqybw4)>* {

        margin-left: var(--x-spacing-base)

    }



    [dir=rtl] ._5uqybw3:not(._5uqybw4)>* {

        margin-right: var(--x-spacing-base)

    }



    ._5uqybw3:not(._5uqybw4)>* {

        margin-block-start: var(--x-spacing-base);

        margin-top: var(--x-spacing-base);

        margin-inline-start: var(--x-spacing-base)

    }



    .rermvf1 {

        text-overflow: ellipsis;

        white-space: nowrap

    }



    [dir=ltr] .cektnc3 {

        left: var(--label-inset-inline-start)

    }



    [dir=rtl] .cektnc3 {

        right: var(--label-inset-inline-start)

    }



    .cektnc3 {

        inset-block-start: var(--label-inset-block-start);

        inset-inline-start: var(--label-inset-inline-start);

        max-width: calc(100% - 1.8571428571428572em);

        top: var(--label-inset-block-start);

        transform: translateY(.21428571428571427em)

    }



    .cektnc4 {

        margin-block-end: var(--x-spacing-small-400);

        margin-bottom: var(--x-spacing-small-400)

    }



    .cektnc6 {

        transform: translateY(0)

    }



    [dir=ltr] .cektnc7 {

        left: calc(var(--padding-inline) * 2 + 1px)

    }



    [dir=rtl] .cektnc7 {

        right: calc(var(--padding-inline) * 2 + 1px)

    }



    [dir=ltr] .cektnc7 {

        margin-left: 1.8rem

    }



    [dir=rtl] .cektnc7 {

        margin-right: 1.8rem

    }



    .cektnc7 {

        inset-inline-start: calc(var(--padding-inline) * 2 + 1px);

        margin-inline-start: 1.8rem

    }



    .cektnc9 {

        color: var(--x-default-color-text-subdued, var(--x-default-color-text, inherit));

        font-family: var(--x-label-font-family);

        font-size: var(--x-label-font-size, var(--x-typography-size-default));

        font-weight: var(--x-label-font-weight);

        letter-spacing: var(--x-label-letter-spacing);

        text-transform: var(--x-label-text-transform)

    }



    .cektnc3 .cektnc9 {

        color: var(--placeholder-color, var(--x-default-color-text-subdued, var(--x-default-color-text, inherit)));

        font-size: var(--x-label-font-size, var(--x-typography-size-small))

    }



    ._10vrn9p0 {

        --value-height: calc(var(--field-font-size) * var(--field-line-height));

        --label-height: calc(var(--label-font-size) * var(--_12e54cf6));

        --empty-padding-block: calc((var(--field-min-height) - var(--value-height)) / 2);

        --label-inset-block-start: calc((var(--field-min-height) - var(--field-font-size) - var(--label-height)) / 2 - 1px);

        --label-inset-inline-start: calc(var(--padding-inline) + 1px)

    }



    ._10vrn9p1 {

        --label-font-size: var(--x-label-font-size, var(--x-typography-size-small));

        --field-min-height: calc(var(--label-font-size) + var(--field-font-size) + var(--padding-block) * 2);

        --filled-padding-block-start: calc((var(--field-min-height) - var(--value-height) - var(--label-font-size)) / 2 + var(--label-font-size) + 1.5px);

        --filled-padding-block-end: calc(var(--field-min-height) - var(--filled-padding-block-start) - var(--value-height))

    }



    ._10vrn9p2 {

        --label-font-size: 0px;

        --field-min-height: calc(var(--value-height) + var(--padding-block) * 2);

        --filled-padding-block-start: var(--padding-block);

        --filled-padding-block-end: var(--padding-block)

    }



    ._10vrn9p3,

    ._10vrn9p4 {

        --placeholder-color: var(--x-default-color-text-subdued)

    }



    @supports (width:max(1px, 2px)) {

        ._10vrn9p1 {

            --field-min-height: max(calc(var(--label-font-size) + var(--value-height)), calc(var(--label-font-size) + var(--field-font-size) + var(--padding-block) * 2))

        }

    }



    ._7ozb2u2 {

        --padding-block: var(--x-text-field-block-padding, var(--x-spacing-small-100));

        --padding-inline: var(--x-text-field-inline-padding, var(--x-spacing-small-100));

        --field-font-size: var(--x-text-field-font-size, var(--x-typography-size-default));

        --field-line-height: var(--x-global-typography-line-size-default)

    }



    ._7ozb2u6 {

        border: 1px solid black;

        border-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)));

        grid-template-areas: "iconStart prefix field suffix iconEnd accessory" ". . field . . .";

        grid-template-columns: auto auto 1fr auto auto auto;

        grid-template-rows: calc(var(--field-min-height) + 1px) 1fr

    }



    [dir=ltr] ._7ozb2u0:last-child:not(:only-child) ._7ozb2u6 {

        border-top-left-radius: 0

    }



    [dir=rtl] ._7ozb2u0:last-child:not(:only-child) ._7ozb2u6 {

        border-top-right-radius: 0

    }



    [dir=ltr] ._7ozb2u0:last-child:not(:only-child) ._7ozb2u6 {

        border-bottom-left-radius: 0

    }



    [dir=rtl] ._7ozb2u0:last-child:not(:only-child) ._7ozb2u6 {

        border-bottom-right-radius: 0

    }



    ._7ozb2u0:last-child:not(:only-child) ._7ozb2u6 {

        border-end-start-radius: 0;

        border-start-start-radius: 0

    }



    [dir=ltr] ._7ozb2u0:first-child:not(:only-child) ._7ozb2u6 {

        border-top-right-radius: 0

    }



    [dir=rtl] ._7ozb2u0:first-child:not(:only-child) ._7ozb2u6 {

        border-top-left-radius: 0

    }



    [dir=ltr] ._7ozb2u0:first-child:not(:only-child) ._7ozb2u6 {

        border-bottom-right-radius: 0

    }



    [dir=rtl] ._7ozb2u0:first-child:not(:only-child) ._7ozb2u6 {

        border-bottom-left-radius: 0

    }



    ._7ozb2u0:first-child:not(:only-child) ._7ozb2u6 {

        border-end-end-radius: 0;

        border-start-end-radius: 0

    }



    ._7ozb2u0:not(:first-child):not(:last-child) ._7ozb2u6 {

        border-radius: 0

    }



    ._7ozb2ue._7ozb2uc,

    ._7ozb2ug._7ozb2uc {

        background-color: var(--x-default-color-background-subdued)

    }



    ._7ozb2uk._7ozb2uh._7ozb2u8 {

        box-shadow: 0 0 0 2px var(--x-default-color-accent)

    }



    ._7ozb2uk._7ozb2uh._7ozb2u7,

    ._7ozb2uk._7ozb2uh._7ozb2u7._7ozb2u8 {

        box-shadow: 0 0 0 2px var(--x-default-color-critical)

    }



    ._7ozb2uk._7ozb2ui._7ozb2u8 {

        box-shadow: 0 2px 0 0 var(--x-default-color-accent)

    }



    ._7ozb2uk._7ozb2ui._7ozb2u7,

    ._7ozb2uk._7ozb2ui._7ozb2u7._7ozb2u8 {

        box-shadow: 0 2px 0 0 var(--x-default-color-critical)

    }



    ._7ozb2ul {

        border-color: var(--x-default-color-border)

    }



    ._7ozb2ul._7ozb2uh._7ozb2u8 {

        border-color: var(--x-default-color-accent);

        box-shadow: 0 0 0 1px var(--x-default-color-accent)

    }



    ._7ozb2ul._7ozb2uh._7ozb2u7,

    ._7ozb2ul._7ozb2uh._7ozb2u7._7ozb2u8 {

        border-color: var(--x-default-color-critical);

        box-shadow: 0 0 0 1px var(--x-default-color-critical)

    }



    ._7ozb2ul._7ozb2ui._7ozb2u8 {

        border-bottom-color: var(--x-default-color-accent);

        box-shadow: 0 1px 0 0 var(--x-default-color-accent)

    }



    ._7ozb2ul._7ozb2ui._7ozb2u7,

    ._7ozb2ul._7ozb2ui._7ozb2u7._7ozb2u8 {

        border-bottom-color: var(--x-default-color-critical);

        box-shadow: 0 1px 0 0 var(--x-default-color-critical)

    }



    ._7ozb2um {

        border-bottom-color: var(--x-default-color-border);

        border-inline-width: 0;

        border-left-width: 0;

        border-right-width: 0;

        padding-left: 1px;

        padding-right: 1px;

        padding-inline: 1px

    }



    ._7ozb2um._7ozb2uh._7ozb2u8 {

        border-block-color: var(--x-default-color-accent);

        border-bottom-color: var(--x-default-color-accent);

        border-top-color: var(--x-default-color-accent);

        box-shadow: 1px 0 0 1px var(--x-default-color-accent), -1px 0 0 1px var(--x-default-color-accent)

    }



    ._7ozb2um._7ozb2uh._7ozb2u7,

    ._7ozb2um._7ozb2uh._7ozb2u7._7ozb2u8 {

        border-block-color: var(--x-default-color-critical);

        border-bottom-color: var(--x-default-color-critical);

        border-top-color: var(--x-default-color-critical);

        box-shadow: 1px 0 0 1px var(--x-default-color-critical), -1px 0 0 1px var(--x-default-color-critical)

    }



    ._7ozb2um._7ozb2ui._7ozb2u8 {

        border-bottom-color: var(--x-default-color-accent);

        box-shadow: 0 1px 0 0 var(--x-default-color-accent)

    }



    ._7ozb2um._7ozb2ui._7ozb2u7,

    ._7ozb2um._7ozb2ui._7ozb2u7._7ozb2u8 {

        border-bottom-color: var(--x-default-color-critical);

        box-shadow: 0 1px 0 0 var(--x-default-color-critical)

    }



    ._7ozb2un,

    ._7ozb2uq {

        -ms-grid-row: 1;

        -ms-grid-row-span: 2;

        grid-area: field;

        -ms-grid-column: 3

    }



    ._7ozb2uq {

        background: none;

        border-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)));

        padding: var(--padding-block) var(--padding-inline);

        -webkit-tap-highlight-color: transparent;

        letter-spacing: inherit;

        line-height: inherit;

        text-decoration: inherit;

        text-overflow: ellipsis;

        text-transform: var(--x-global-typography-letter-case)

    }



    ._7ozb2uq::placeholder {

        color: var(--placeholder-color);

        opacity: 1

    }



    ._7ozb2uq:invalid {

        box-shadow: none

    }



    [dir=ltr] ._7ozb2u0:first-child:not(:only-child) ._7ozb2uq {

        border-top-right-radius: 0

    }



    [dir=rtl] ._7ozb2u0:first-child:not(:only-child) ._7ozb2uq {

        border-top-left-radius: 0

    }



    [dir=ltr] ._7ozb2u0:first-child:not(:only-child) ._7ozb2uq {

        border-bottom-right-radius: 0

    }



    [dir=rtl] ._7ozb2u0:first-child:not(:only-child) ._7ozb2uq {

        border-bottom-left-radius: 0

    }



    ._7ozb2u0:first-child:not(:only-child) ._7ozb2uq {

        border-end-end-radius: 0;

        border-start-end-radius: 0

    }



    [dir=ltr] ._7ozb2u0:last-child:not(:only-child) ._7ozb2uq {

        border-top-left-radius: 0

    }



    [dir=rtl] ._7ozb2u0:last-child:not(:only-child) ._7ozb2uq {

        border-top-right-radius: 0

    }



    [dir=ltr] ._7ozb2u0:last-child:not(:only-child) ._7ozb2uq {

        border-bottom-left-radius: 0

    }



    [dir=rtl] ._7ozb2u0:last-child:not(:only-child) ._7ozb2uq {

        border-bottom-right-radius: 0

    }



    ._7ozb2u0:last-child:not(:only-child) ._7ozb2uq {

        border-end-start-radius: 0;

        border-start-start-radius: 0

    }



    ._7ozb2ur {

        padding-top: var(--empty-padding-block);

        padding-block-start: var(--empty-padding-block);

        padding-bottom: var(--empty-padding-block);

        padding-block-end: var(--empty-padding-block)

    }



    ._7ozb2uv {

        padding-top: var(--filled-padding-block-start);

        padding-block-start: var(--filled-padding-block-start);

        padding-bottom: var(--filled-padding-block-end);

        padding-block-end: var(--filled-padding-block-end)

    }



    ._7ozb2uy {

        resize: vertical;

        resize: block

    }



    ._7ozb2uz {

        -webkit-appearance: textfield;

        appearance: textfield

    }



    ._7ozb2uz::-webkit-inner-spin-button,

    ._7ozb2uz::-webkit-outer-spin-button {

        -webkit-appearance: none;

        appearance: none;

        margin: 0

    }



    [dir=rtl] ._7ozb2u10 {

        direction: ltr;

        text-align: right

    }



    [dir=ltr] ._7ozb2u17 {

        padding-left: var(--padding-inline)

    }



    [dir=rtl] ._7ozb2u17 {

        padding-right: var(--padding-inline)

    }



    ._7ozb2u17 {

        grid-area: iconStart;

        -ms-grid-column: 1;

        -ms-grid-row: 1;

        padding-inline-start: var(--padding-inline)

    }



    [dir=ltr] ._7ozb2u18 {

        padding-right: var(--padding-inline)

    }



    [dir=rtl] ._7ozb2u18 {

        padding-left: var(--padding-inline)

    }



    ._7ozb2u18 {

        grid-area: iconEnd;

        -ms-grid-column: 5;

        -ms-grid-row: 1;

        padding-inline-end: var(--padding-inline)

    }



    [dir=ltr] ._7ozb2u1a {

        padding-left: var(--padding-inline)

    }



    [dir=rtl] ._7ozb2u1a {

        padding-right: var(--padding-inline)

    }



    ._7ozb2u1a {

        padding-inline-start: var(--padding-inline)

    }



    ._7ozb2u1b {

        padding-top: var(--filled-padding-block-start);

        padding-block-start: var(--filled-padding-block-start);

        padding-bottom: var(--filled-padding-block-end);

        padding-block-end: var(--filled-padding-block-end)

    }



    [dir=ltr] ._7ozb2u1d {

        padding-right: var(--padding-inline)

    }



    [dir=rtl] ._7ozb2u1d {

        padding-left: var(--padding-inline)

    }



    ._7ozb2u1d {

        grid-area: suffix;

        -ms-grid-column: 4;

        -ms-grid-row: 1;

        padding-inline-end: var(--padding-inline)

    }



    [dir=ltr] ._7ozb2u1g {

        padding-right: var(--padding-inline)

    }



    [dir=rtl] ._7ozb2u1g {

        padding-left: var(--padding-inline)

    }



    ._7ozb2u1g {

        grid-area: accessory;

        -ms-grid-column: 6;

        -ms-grid-row: 1;

        padding-inline-end: var(--padding-inline)

    }



    ._7ozb2u1h {

        font-family: var(--x-text-field-font-family);

        font-size: var(--field-font-size);

        font-weight: var(--x-text-field-font-weight);

        letter-spacing: var(--x-text-field-letter-spacing, inherit);

        line-height: var(--field-line-height);

        text-transform: var(--x-text-field-text-transform, var(--x-global-typography-letter-case))

    }



    ._7ozb2u1i {

        text-transform: uppercase

    }



    ._7ozb2u1i::placeholder {

        text-transform: var(--x-text-field-text-transform, var(--x-global-typography-letter-case, none))

    }



    ._7ozb2u1j {

        grid-row-start: 2

    }



    @supports (display:grid) {

        ._7ozb2uo {

            display: grid

        }



        ._7ozb2uy {

            grid-area: 1/1/2/2;

            overflow: hidden;

            resize: none

        }



        ._7ozb2u14 {

            display: block;

            grid-area: 1/1/2/2;

            visibility: hidden;

            white-space: pre-wrap

        }

    }



    ._1xqelvi1 {

        text-decoration: inherit

    }



    [dir=ltr] ._1xqelvi1:after {

        border-bottom-left-radius: inherit

    }



    [dir=rtl] ._1xqelvi1:after {

        border-bottom-right-radius: inherit

    }



    [dir=ltr] ._1xqelvi1:after {

        border-top-right-radius: inherit

    }



    [dir=ltr] ._1xqelvi1:after,

    [dir=rtl] ._1xqelvi1:after {

        border-top-left-radius: inherit

    }



    [dir=rtl] ._1xqelvi1:after {

        border-top-right-radius: inherit

    }



    [dir=ltr] ._1xqelvi1:after {

        border-bottom-right-radius: inherit

    }



    [dir=rtl] ._1xqelvi1:after {

        border-bottom-left-radius: inherit

    }



    [dir=ltr] ._1xqelvi1:after {

        left: calc((var(--_13qz35y0, 0px) * -1) + -1px)

    }



    [dir=rtl] ._1xqelvi1:after {

        right: calc((var(--_13qz35y0, 0px) * -1) + -1px)

    }



    [dir=ltr] ._1xqelvi1:after {

        right: calc((var(--_13qz35y1, 0px) * -1) + -1px)

    }



    [dir=rtl] ._1xqelvi1:after {

        left: calc((var(--_13qz35y1, 0px) * -1) + -1px)

    }



    ._1xqelvi1:after {

        border-end-end-radius: inherit;

        border-end-start-radius: inherit;

        border-start-end-radius: inherit;

        border-start-start-radius: inherit;

        bottom: calc((var(--_13qz35y3, 0px) * -1) + -1px);

        box-shadow: 0 0 0 0 black;

        content: "";

        display: block;

        inset-block-end: calc((var(--_13qz35y3, 0px) * -1) + -1px);

        inset-block-start: calc((var(--_13qz35y2, 0px) * -1) + -1px);

        inset-inline-end: calc((var(--_13qz35y1, 0px) * -1) + -1px);

        inset-inline-start: calc((var(--_13qz35y0, 0px) * -1) + -1px);

        pointer-events: none;

        position: absolute;

        top: calc((var(--_13qz35y2, 0px) * -1) + -1px);

        transition: inherit;

        z-index: 1

    }



    ._1xqelvi1:disabled {

        cursor: default;

        opacity: var(--x-opacity-disabled);

        pointer-events: none

    }



    ._1xqelvi1:focus:after {

        box-shadow: 0 0 0 .2rem var(--x-default-color-accent)

    }



    ._1xqelvi1:focus:not(:focus-visible):after {

        box-shadow: none

    }



    ._1xqelvi1:focus-visible:after {

        box-shadow: 0 0 0 .2rem var(--x-default-color-accent)

    }



    ._1xqelvi1>._1xqelvi2 {

        flex-grow: 1

    }



    ._1xqelvi7:hover {

        color: var(--x-default-color-accent-hovered)

    }



    ._1xqelvi8 {

        color: inherit

    }



    ._8dxxat2 {

        grid-template-columns: repeat(7, minmax(var(--x-datepicker-min-column-size), 1fr))

    }



    ._8dxxat4 {

        grid-template-rows: auto

    }



    ._8dxxat5 {

        grid-template-rows: var(--x-datepicker-min-row-size)

    }



    ._8dxxat5:not(:first-child) {

        margin-block-start: .3rem;

        margin-top: .3rem

    }



    ._8dxxat7 {

        border-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))

    }



    ._8dxxat7:hover {

        background-color: var(--x-default-color-background-subdued)

    }



    ._8dxxat7:focus {

        outline-color: var(--x-default-color-accent)

    }



    ._8dxxat7:disabled {

        opacity: var(--x-opacity-disabled)

    }



    ._8dxxat8 {

        grid-column: 1

    }



    ._8dxxat9 {

        grid-column: 7

    }



    ._8dxxatb {

        border-collapse: collapse;

        border-spacing: 0;

        table-layout: fixed

    }



    ._8dxxate {

        font-weight: var(--x-typography-primary-weight-bold)

    }



    ._8dxxatf {

        margin-left: .15rem;

        margin-right: .15rem;

        margin-inline: .15rem

    }



    [dir=ltr] ._8dxxatf:first-child {

        margin-left: 0

    }



    [dir=rtl] ._8dxxatf:first-child {

        margin-right: 0

    }



    ._8dxxatf:first-child {

        margin-inline-start: 0

    }



    [dir=ltr] ._8dxxatf:last-child {

        margin-right: 0

    }



    [dir=rtl] ._8dxxatf:last-child {

        margin-left: 0

    }



    ._8dxxatf:last-child {

        margin-inline-end: 0

    }



    ._8dxxatj {

        -webkit-tap-highlight-color: transparent;

        -webkit-touch-callout: none;

        border-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)));

        color: var(--x-default-color-text);

        place-items: center

    }



    ._8dxxatk:hover {

        background-color: var(--x-default-color-background-subdued)

    }



    ._8dxxatk:focus {

        box-shadow: 0 0 0 1px var(--x-default-color-background), 0 0 0 3px var(--x-default-color-accent);

        outline: none;

        z-index: 1

    }



    ._8dxxatk:not(:focus-visible) {

        box-shadow: none

    }



    ._8dxxatm {

        color: var(--x-default-color-text-subdued)

    }



    ._8dxxatn {

        background-color: var(--x-default-color-accent);

        color: var(--x-default-color-accent-contrast)

    }



    ._8dxxatn:hover {

        background-color: var(--x-default-color-accent-hovered)

    }



    ._8dxxato {

        border: solid 2px var(--x-default-color-accent)

    }



    ._8dxxatp {

        --_8dxxat0: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)));

        border: solid 1px var(--x-default-color-border);

        font-weight: var(--x-typography-primary-weight-bold)

    }



    ._8dxxatp._8dxxato {

        border: solid 2px var(--x-default-color-accent)

    }



    ._8dxxatp._8dxxatn:not(._8dxxato) {

        border: none

    }



    ._8dxxatp._8dxxatn:not(._8dxxato):before {

        border: solid 1px var(--x-default-color-background);

        border-radius: calc(var(--_8dxxat0) - 2px);

        bottom: .2rem;

        content: "";

        left: .2rem;

        position: absolute;

        right: .2rem;

        top: .2rem;

        inset: .2rem

    }



    ._8dxxatp._8dxxato,

    ._8dxxatp._8dxxato:not(:focus-visible) {

        box-shadow: inset 0 0 0 1px var(--x-default-color-background)

    }



    ._8dxxatp._8dxxato:focus {

        box-shadow: inset 0 0 0 1px var(--x-default-color-background), 0 0 0 1px var(--x-default-color-background), 0 0 0 3px var(--x-default-color-accent)

    }



    ._8dxxatq {

        background-color: var(--x-default-color-accent);

        border-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))

    }



    [dir=ltr] ._8dxxatr:not(:last-child) {

        margin-right: 0

    }



    [dir=rtl] ._8dxxatr:not(:last-child) {

        margin-left: 0

    }



    [dir=ltr] ._8dxxatr:not(:last-child) {

        padding-right: .15rem

    }



    [dir=rtl] ._8dxxatr:not(:last-child) {

        padding-left: .15rem

    }



    [dir=ltr] ._8dxxatr:not(:last-child) {

        border-top-right-radius: 0

    }



    [dir=rtl] ._8dxxatr:not(:last-child) {

        border-top-left-radius: 0

    }



    [dir=ltr] ._8dxxatr:not(:last-child) {

        border-bottom-right-radius: 0

    }



    [dir=rtl] ._8dxxatr:not(:last-child) {

        border-bottom-left-radius: 0

    }



    ._8dxxatr:not(:last-child) {

        border-end-end-radius: 0;

        border-start-end-radius: 0;

        margin-inline-end: 0;

        padding-inline-end: .15rem

    }



    [dir=ltr] ._8dxxats:not(:first-child) {

        margin-left: 0

    }



    [dir=rtl] ._8dxxats:not(:first-child) {

        margin-right: 0

    }



    [dir=ltr] ._8dxxats:not(:first-child) {

        padding-left: .15rem

    }



    [dir=rtl] ._8dxxats:not(:first-child) {

        padding-right: .15rem

    }



    [dir=ltr] ._8dxxats:not(:first-child) {

        border-top-left-radius: 0

    }



    [dir=rtl] ._8dxxats:not(:first-child) {

        border-top-right-radius: 0

    }



    [dir=ltr] ._8dxxats:not(:first-child) {

        border-bottom-left-radius: 0

    }



    [dir=rtl] ._8dxxats:not(:first-child) {

        border-bottom-right-radius: 0

    }



    ._8dxxats:not(:first-child) {

        border-end-start-radius: 0;

        border-start-start-radius: 0;

        margin-inline-start: 0;

        padding-inline-start: .15rem

    }



    [dir=ltr] ._1o2qejv0 {

        margin-right: calc(var(--x-spacing-small-200) * -1)

    }



    [dir=rtl] ._1o2qejv0 {

        margin-left: calc(var(--x-spacing-small-200) * -1)

    }



    ._1o2qejv0 {

        margin-inline-end: calc(var(--x-spacing-small-200) * -1)

    }



    .mg7oix1:before {

        border-color: var(--x-default-color-border);

        border-style: solid;

        border-width: 0;

        content: "";

        display: block

    }



    .mg7oix3:after,

    .mg7oix3:before {

        border-style: solid

    }



    .mg7oix4:after,

    .mg7oix4:before {

        border-style: dashed

    }



    .mg7oix5:after,

    .mg7oix5:before {

        border-style: dotted

    }



    .mg7oix9 {

        height: 0

    }



    .mg7oix9:before {

        border-block-start: none;

        border-inline: none;

        border-left: none;

        border-right: none;

        border-top: none

    }



    .mg7oixa {

        width: 0

    }



    [dir=ltr] .mg7oixa:before {

        border-left: none

    }



    [dir=rtl] .mg7oixa:before {

        border-right: none

    }



    .mg7oixa:before {

        border-block: none;

        border-bottom: none;

        border-inline-start: none;

        border-top: none;

        height: 100%

    }



    .mg7oixc {

        flex: auto

    }



    .mg7oixc:after,

    .mg7oixc:before {

        border-color: var(--x-default-color-border);

        border-width: 0;

        content: "";

        flex-grow: 1;

        height: unset;

        width: unset

    }



    .mg7oixc.mg7oix9:after,

    .mg7oixc.mg7oix9:before {

        border-block-start: none;

        border-inline: none;

        border-left: none;

        border-right: none;

        border-top: none

    }



    .mg7oixc.mg7oixa {

        flex-direction: column

    }



    [dir=ltr] .mg7oixc.mg7oixa:after,

    [dir=ltr] .mg7oixc.mg7oixa:before {

        border-left: none

    }



    [dir=rtl] .mg7oixc.mg7oixa:after,

    [dir=rtl] .mg7oixc.mg7oixa:before {

        border-right: none

    }



    .mg7oixc.mg7oixa:after,

    .mg7oixc.mg7oixa:before {

        border-block: none;

        border-bottom: none;

        border-inline-start: none;

        border-top: none

    }



    .mg7oixd:before {

        border: unset;

        content: unset;

        flex-grow: unset

    }



    .mg7oixd.mg7oixa {

        flex-direction: column

    }



    .mg7oixf:after {

        border: unset;

        content: unset;

        flex-grow: unset

    }



    .mg7oixf.mg7oixa {

        flex-direction: column

    }



    .mg7oixg:after,

    .mg7oixg:before {

        border-width: var(--x-border-width-base)

    }



    .mg7oixg.mg7oix9 {

        height: auto

    }



    .mg7oixg.mg7oixa {

        width: var(--x-border-width-base)

    }



    .mg7oixh:after,

    .mg7oixh:before {

        border-width: var(--x-border-width-medium)

    }



    .mg7oixh.mg7oix9 {

        height: auto

    }



    .mg7oixh.mg7oixa {

        width: var(--x-border-width-medium)

    }



    .mg7oixi:after,

    .mg7oixi:before {

        border-width: var(--x-border-width-thick)

    }



    .mg7oixi.mg7oix9 {

        height: auto

    }



    .mg7oixi.mg7oixa {

        width: var(--x-border-width-thick)

    }



    .mg7oixj:after,

    .mg7oixj:before {

        border-width: var(--x-border-width-extra-thick)

    }



    .mg7oixj.mg7oix9 {

        height: auto

    }



    .mg7oixj.mg7oixa {

        width: var(--x-border-width-extra-thick)

    }



    [dir=ltr] .mg7oix9 .mg7oixk {

        margin-right: var(--x-spacing-base)

    }



    [dir=rtl] .mg7oix9 .mg7oixk {

        margin-left: var(--x-spacing-base)

    }



    .mg7oix9 .mg7oixk {

        margin-inline-end: var(--x-spacing-base)

    }



    .mg7oixa .mg7oixk {

        margin-block-end: var(--x-spacing-base);

        margin-bottom: var(--x-spacing-base)

    }



    .mg7oix9 .mg7oixl {

        margin-left: var(--x-spacing-base);

        margin-right: var(--x-spacing-base);

        margin-inline: var(--x-spacing-base)

    }



    .mg7oixa .mg7oixl {

        margin-bottom: var(--x-spacing-base);

        margin-top: var(--x-spacing-base);

        margin-block: var(--x-spacing-base)

    }



    [dir=ltr] .mg7oix9 .mg7oixm {

        margin-left: var(--x-spacing-base)

    }



    [dir=rtl] .mg7oix9 .mg7oixm {

        margin-right: var(--x-spacing-base)

    }



    .mg7oix9 .mg7oixm {

        margin-inline-start: var(--x-spacing-base)

    }



    .mg7oixa .mg7oixm {

        margin-block-start: var(--x-spacing-base);

        margin-top: var(--x-spacing-base)

    }



    ._1h3po423 {

        padding-bottom: 100%;

        padding-bottom: calc(100% / var(--_1h3po420))

    }



    ._1h3po421 ._1h3po424 {

        height: 100%;

        left: 0;

        position: absolute;

        top: 0;

        width: 100%

    }



    .s2kwpi1 {

        --this-typography-decoration: none;

        -webkit-tap-highlight-color: transparent;

        -webkit-touch-callout: none;

        color: inherit;

        outline-color: white

    }



    .s2kwpi1:after {

        border-radius: var(--x-global-border-radius, var(--x-border-radius-base));

        bottom: -.3rem;

        box-shadow: 0 0 0 0 black;

        content: "";

        display: block;

        left: -.3rem;

        pointer-events: none;

        position: absolute;

        right: -.3rem;

        top: -.2rem;

        inset: -.2rem -.3rem -.3rem;

        transition: inherit;

        z-index: 1

    }



    .s2kwpi1:focus {

        outline: 1px solid white

    }



    .s2kwpi1:focus-visible:after,

    .s2kwpi1:focus:after {

        box-shadow: 0 0 0 .2rem var(--x-default-color-accent-hovered)

    }



    .s2kwpi1:not(:focus-visible):after {

        box-shadow: none

    }



    .s2kwpi2 {

        color: var(--x-default-color-accent)

    }



    .s2kwpi2:focus,

    .s2kwpi2:hover {

        color: var(--x-default-color-accent-hovered)

    }



    [dir=ltr] ._1bzftbj1 {

        margin-left: var(--x-spacing-large-100)

    }



    [dir=rtl] ._1bzftbj1 {

        margin-right: var(--x-spacing-large-100)

    }



    ._1bzftbj1 {

        margin-inline-start: var(--x-spacing-large-100)

    }



    ._1bzftbj2 {

        list-style-type: disc

    }



    ._1bzftbj3 {

        list-style-type: decimal

    }



    [dir=ltr] ._1bzftbj4 {

        margin-left: 0

    }



    [dir=rtl] ._1bzftbj4 {

        margin-right: 0

    }



    ._1bzftbj4 {

        list-style-type: none;

        margin-inline-start: 0

    }



    @supports not (grid-gap:1px) {

        ._1bzftbj1:not(._1bzftbj6)>._1bzftbj7+._1bzftbj7 {

            margin-block-start: var(--x-spacing-base);

            margin-top: var(--x-spacing-base)

        }

    }



    ._1dk5tmd0 {

        color: #000;

        font-family: var(--x-typography-primary-fonts);

        font-size: var(--x-typography-size-default);

        font-weight: var(--x-typography-primary-weight-base);

        line-height: var(--_12e54cf6);

        padding: 1px

    }



    ._1tgdqw63 {

        filter: grayscale(100%)

    }



    ._1tgdqw64 {

        box-shadow: 0 6px 19px 0 white000d;

        transform: scale(1.1)

    }



    ._1tgdqw65 {

        height: 1.5em;

        block-size: 1.5em

    }



    ._1tgdqw66 {

        height: 1.7142857142857142em;

        block-size: 1.7142857142857142em

    }



    ._1m6j2n32 {

        border-radius: var(--x-product-thumbnail-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))

    }



    ._1m6j2n33 {

        max-width: 6.4rem;

        max-inline-size: 6.4rem;

        max-height: calc(6.4rem * var(--_1m6j2n30));

        max-block-size: calc(6.4rem * var(--_1m6j2n30));

        min-block-size: calc(6.4rem * var(--_1m6j2n30));

        min-height: calc(6.4rem * var(--_1m6j2n30));

        min-inline-size: 6.4rem;

        min-width: 6.4rem

    }



    ._1m6j2n34 {

        max-width: 4rem;

        max-inline-size: 4rem;

        max-height: calc(4rem * var(--_1m6j2n30));

        max-block-size: calc(4rem * var(--_1m6j2n30));

        min-block-size: calc(4rem * var(--_1m6j2n30));

        min-height: calc(4rem * var(--_1m6j2n30));

        min-inline-size: 4rem;

        min-width: 4rem

    }



    ._1m6j2n36 {

        border-radius: var(--x-product-thumbnail-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)));

        color: var(--x-default-color-border)

    }



    ._1m6j2n3b {

        max-width: 3.3rem;

        max-inline-size: 3.3rem

    }



    ._1m6j2n3c {

        max-width: 2.2rem;

        max-inline-size: 2.2rem

    }



    ._1m6j2n3e {

        transform: translate(25%, -50%)

    }



    @keyframes xvcb00 {

        50% {

            transform: translateX(calc(var(--x-global-transform-direction-modifier) * 300%))

        }

    }



    @keyframes xvcb01 {

        50% {

            transform: translateX(300%)

        }

    }



    .xvcb04 {

        -webkit-appearance: none;

        appearance: none;

        background-color: var(--swn0j1a);

        border-radius: var(--x-global-border-radius, var(--x-border-radius-fully-rounded));

        overflow: visible

    }



    .xvcb04::-webkit-progress-bar {

        background-color: var(--swn0j1a)

    }



    .xvcb04::-webkit-progress-bar,

    .xvcb04::-webkit-progress-value {

        border-radius: var(--x-global-border-radius, var(--x-border-radius-fully-rounded))

    }



    .xvcb04::-webkit-progress-value {

        background-color: var(--xvcb02);

        -webkit-transition: inline-size var(--x-duration-slowest) ease-out;

        transition: inline-size var(--x-duration-slowest) ease-out

    }



    .xvcb04::-moz-progress-bar {

        background-color: var(--xvcb02);

        border-radius: var(--x-global-border-radius, var(--x-border-radius-fully-rounded));

        -moz-transition: inline-size var(--x-duration-slowest) ease-out;



        transition: inline-size var(--x-duration-slowest) ease-out}.xvcb04:not([value="0"])::-moz-progress-bar {

            box-shadow: 0 0 0 var(--x-border-width-base) var(--xvcb02)

        }



        .xvcb04:not(:indeterminate)::-webkit-progress-value {

            box-shadow:0 0 0 var(--x-border-width-base) var(--xvcb02)}.xvcb04[value="0"]:not(:indeterminate)::-webkit-progress-value {

                opacity: 0;

                -webkit-transition: inline-size var(--x-duration-slowest) ease-out, opacity 0ms ease-out var(--x-duration-slowest);

                transition: inline-size var(--x-duration-slowest) ease-out, opacity 0ms ease-out var(--x-duration-slowest)

            }



            .xvcb04:indeterminate:after {

                animation: xvcb00 2s ease infinite;

                background-color: var(--xvcb02);

                border-radius: var(--x-global-border-radius, var(--x-border-radius-fully-rounded));

                bottom: 0;

                box-shadow: 0 0 0 var(--x-border-width-base) var(--xvcb02);

                content: "";

                left: 0;

                position: absolute;

                right: 0;

                top: 0;

                inset: 0;

                width: 25%;

                inline-size: 25%

            }



            .xvcb04:indeterminate::-moz-progress-bar {

                animation: xvcb01 2s ease infinite;

                width: 25%;

                inline-size: 25%

            }



            .xvcb04:indeterminate::-webkit-progress-bar,

            _::-webkit-full-page-media {

                animation: xvcb00 2s ease infinite;

                background-color: var(--xvcb02);

                box-shadow: 0 0 0 var(--x-border-width-base) var(--xvcb02);

                width: 25%;

                inline-size: 25%

            }



            .xvcb05 {

                --xvcb02: var(--x-default-color-accent)

            }



            .xvcb06 {

                --xvcb02: var(--x-default-color-critical)

            }



            ._1bol2bm3 {

                background-color: #fff;

                border-radius: var(--x-global-border-radius, var(--x-border-radius-base))

            }



            ._1bol2bm6 {

                margin: 9.5%

            }



            ._1bol2bm9 {

                background-color: #fff

            }



            [dir=ltr] ._1bol2bmc {

                left: var(--_1bol2bm1)

            }



            [dir=rtl] ._1bol2bmc {

                right: var(--_1bol2bm1)

            }



            ._1bol2bmc {

                inset-block-start: var(--_1bol2bm1);

                inset-inline-start: var(--_1bol2bm1);

                top: var(--_1bol2bm1);

                width: var(--_1bol2bm0);

                inline-size: var(--_1bol2bm0);

                height: var(--_1bol2bm0);

                block-size: var(--_1bol2bm0)

            }



            ._1bol2bmg {

                width: 150px;

                inline-size: 150px;

                height: 150px;

                block-size: 150px

            }



            ._1bol2bmn {

                fill: #000

            }



            ._1bol2bmo {

                fill: #fff

            }



            @supports (width:min(1px, 2px)) {

                ._1bol2bm3 {

                    border-radius: min(calc(9.5% * 2), var(--x-global-border-radius, var(--x-border-radius-base)))

                }

            }



            .vTXBW {

                --padding-block: var(--x-select-block-padding, var(--x-spacing-small-100));

                --padding-inline: var(--x-select-inline-padding, var(--x-spacing-small-100));

                --field-font-size: var(--x-select-font-size, var(--x-typography-size-default));

                --field-line-height: var(--x-global-typography-line-size-default);

                display: grid;

                gap: var(--x-spacing-small-400)

            }



            .j2JE7 {

                --selector-width: 4rem;

                position: relative

            }



            [dir=ltr] .QOQ2V {

                left: var(--label-inset-inline-start)

            }



            [dir=rtl] .QOQ2V {

                right: var(--label-inset-inline-start)

            }



            .QOQ2V {

                inset-block-start: calc(var(--empty-padding-block) + 1px);

                inset-inline-start: var(--label-inset-inline-start);

                max-width: calc(100% - var(--padding-inline) * 2 - var(--selector-width));

                pointer-events: none;

                position: absolute;

                top: calc(var(--empty-padding-block) + 1px);

                -webkit-user-select: none;

                user-select: none

            }



            .QOQ2V .KBYKh {

                color: var(--placeholder-color)

            }



            .QOQ2V:not(.NKh24) .KBYKh,

            ._b6uH {

                font-family: var(--x-select-font-family);

                font-size: var(--field-font-size);

                font-weight: var(--x-select-font-weight);

                letter-spacing: var(--x-select-letter-spacing, var(--x-global-typography-kerning));

                line-height: var(--field-line-height);

                -webkit-text-decoration: var(--x-select-text-decoration);

                text-decoration: var(--x-select-text-decoration);

                text-transform: var(--x-select-text-transform, var(--x-global-typography-letter-case))

            }



            .f0S_G {

                display: block;

                margin-block-end: var(--x-spacing-small-400);

                margin-bottom: var(--x-spacing-small-400)

            }



            .NKh24 {

                inset-block-start: var(--label-inset-block-start);

                top: var(--label-inset-block-start)

            }



            .NKh24 .KBYKh,

            .f0S_G .KBYKh {

                font-family: var(--x-label-font-family);

                font-size: var(--x-label-font-size, var(--x-typography-size-small));

                font-weight: var(--x-label-font-weight);

                letter-spacing: var(--x-label-letter-spacing, var(--x-global-typography-kerning));

                line-height: var(--x-global-typography-line-size-default);

                -webkit-text-decoration: var(--x-label-text-decoration);

                text-decoration: var(--x-label-text-decoration);

                text-transform: var(--x-label-text-transform, var(--x-global-typography-letter-case))

            }



            .f0S_G .KBYKh {

                color: var(--x-default-color-text-subdued, var(--x-default-color-text, inherit));

                font-size: var(--x-label-font-size, var(--x-typography-size-default))

            }



            [dir=ltr] ._b6uH {

                padding-left: var(--padding-inline)

            }



            [dir=rtl] ._b6uH {

                padding-right: var(--padding-inline)

            }



            [dir=ltr] ._b6uH {

                padding-right: calc(var(--selector-width) * .75)

            }



            [dir=rtl] ._b6uH {

                padding-left: calc(var(--selector-width) * .75)

            }



            ._b6uH {

                -webkit-tap-highlight-color: transparent;

                border: 1px solid black;

                border-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)));

                min-height: calc(var(--field-min-height) + 3px);

                outline: none;

                overflow: hidden;

                padding-top: var(--filled-padding-block-start);

                padding-block-start: var(--filled-padding-block-start);

                padding-bottom: var(--filled-padding-block-end);

                padding-block-end: var(--filled-padding-block-end);

                padding-inline-end: calc(var(--selector-width) * .75);

                padding-inline-start: var(--padding-inline);

                text-overflow: ellipsis;

                transition: box-shadow var(--x-duration-base) var(--x-timing-base), border var(--x-duration-base) var(--x-timing-base);

                white-space: nowrap;

                width: 100%

            }



            ._b6uH::-ms-expand {

                display: none

            }



            ._b6uH:-moz-focusring {

                color: black;

                text-shadow: 0 0 0 var(--moz-focusring-color)

            }



            [dir=ltr] .gYYwe {

                padding-left: var(--padding-inline)

            }



            [dir=rtl] .gYYwe {

                padding-right: var(--padding-inline)

            }



            [dir=ltr] .gYYwe {

                padding-right: calc(var(--selector-width) + .2rem)

            }



            [dir=rtl] .gYYwe {

                padding-left: calc(var(--selector-width) + .2rem)

            }



            .gYYwe {

                padding-inline-end: calc(var(--selector-width) + .2rem);

                padding-inline-start: var(--padding-inline)

            }



            .FvQa3,

            .yA4Q8 {

                --moz-focusring-color: var(--x-default-color-text)

            }



            .yA4Q8+.TUEJq {

                border-color: var(--x-default-color-border);

                color: var(--x-default-color-text-subdued)

            }



            .itsT1.RGaKd:focus {

                box-shadow: 0 0 0 2px var(--x-default-color-accent)

            }



            .itsT1.RGaKd.iaaTi,

            .itsT1.RGaKd.iaaTi:focus {

                box-shadow: 0 0 0 2px var(--x-default-color-critical)

            }



            .itsT1.HXe4l:focus {

                box-shadow: 0 2px 0 0 var(--x-default-color-accent)

            }



            .itsT1.HXe4l.iaaTi,

            .itsT1.HXe4l.iaaTi:focus {

                box-shadow: 0 2px 0 0 var(--x-default-color-critical)

            }



            [dir=ltr] .vYo81 {

                padding-left: calc(var(--padding-inline))

            }



            [dir=rtl] .vYo81 {

                padding-right: calc(var(--padding-inline))

            }



            .vYo81 {

                border-color: var(--x-default-color-border);

                padding-inline-start: calc(var(--padding-inline))

            }



            .vYo81.RGaKd:focus {

                border-color: var(--x-default-color-accent);

                box-shadow: 0 0 0 1px var(--x-default-color-accent)

            }



            .vYo81.RGaKd.iaaTi,

            .vYo81.RGaKd.iaaTi:focus {

                border-color: var(--x-default-color-critical);

                box-shadow: 0 0 0 1px var(--x-default-color-critical)

            }



            .vYo81.HXe4l:focus {

                border-bottom-color: var(--x-default-color-accent);

                box-shadow: 0 1px 0 0 var(--x-default-color-accent)

            }



            .vYo81.HXe4l.iaaTi,

            .vYo81.HXe4l.iaaTi:focus {

                border-bottom-color: var(--x-default-color-critical);

                box-shadow: 0 1px 0 0 var(--x-default-color-critical)

            }



            [dir=ltr] .NsxIV {

                padding-left: calc(var(--padding-inline) + 1px)

            }



            [dir=rtl] .NsxIV {

                padding-right: calc(var(--padding-inline) + 1px)

            }



            [dir=ltr] .NsxIV {

                padding-right: calc(var(--selector-width) + 1px)

            }



            [dir=rtl] .NsxIV {

                padding-left: calc(var(--selector-width) + 1px)

            }



            .NsxIV {

                border-bottom-color: var(--x-default-color-border);

                border-inline-width: 0;

                border-left-width: 0;

                border-right-width: 0;

                padding-inline-end: calc(var(--selector-width) + 1px);

                padding-inline-start: calc(var(--padding-inline) + 1px)

            }



            .NsxIV.RGaKd:focus {

                border-color: var(--x-default-color-accent);

                box-shadow: 1px 0 0 1px var(--x-default-color-accent), -1px 0 0 1px var(--x-default-color-accent)

            }



            .NsxIV.RGaKd.iaaTi,

            .NsxIV.RGaKd.iaaTi:focus {

                border-color: var(--x-default-color-critical);

                box-shadow: 1px 0 0 1px var(--x-default-color-critical), -1px 0 0 1px var(--x-default-color-critical)

            }



            .NsxIV.HXe4l:focus {

                border-bottom-color: var(--x-default-color-accent);

                box-shadow: 0 1px 0 0 var(--x-default-color-accent)

            }



            .NsxIV.HXe4l.iaaTi,

            .NsxIV.HXe4l.iaaTi:focus {

                border-bottom-color: var(--x-default-color-critical);

                box-shadow: 0 1px 0 0 var(--x-default-color-critical)

            }



            .BIaIx,

            .BIaIx+.TUEJq {

                opacity: var(--x-opacity-disabled)

            }



            .BIaIx.yA4Q8 {

                background-color: var(--x-default-color-background-subdued)

            }



            .DwlYX,

            .DwlYX+.TUEJq {

                opacity: var(--x-opacity-readonly)

            }



            .DwlYX.yA4Q8 {

                background-color: var(--x-default-color-background-subdued)

            }



            [dir=ltr] .TUEJq {

                right: 1px

            }



            [dir=rtl] .TUEJq {

                left: 1px

            }



            .TUEJq {

                align-items: center;

                display: flex;

                height: 43%;

                inset-block-start: 50%;

                inset-inline-end: 1px;

                justify-content: center;

                pointer-events: none;

                position: absolute;

                top: 50%;

                transform: translateY(-50%);

                width: var(--selector-width)

            }



            .wa9Kv {

                grid-row-start: 2

            }



            [dir=ltr] ._466rkg1 {

                margin-right: calc(var(--x-spacing-small-200) * -1)

            }



            [dir=rtl] ._466rkg1 {

                margin-left: calc(var(--x-spacing-small-200) * -1)

            }



            ._466rkg1 {

                margin-inline-end: calc(var(--x-spacing-small-200) * -1)

            }



            @keyframes i6e6fxi {

                0% {

                    stroke-dashoffset: -50px

                }



                to {

                    stroke-dashoffset: 0px

                }

            }



            .i6e6fx2 {

                height: 1.7142857142857142em;

                width: 2.857142857142857em

            }



            .i6e6fx4:focus {

                outline: none

            }



            .i6e6fx5,

            .i6e6fx7 {

                cursor: default

            }



            .i6e6fxd {

                background-color: var(--x-default-color-background);

                bottom: 0;

                left: 0;

                right: 0;

                top: 0;

                inset: 0

            }



            .i6e6fxd:before {

                background-color: var(--x-default-color-text-subdued);

                border-radius: 50%;

                bottom: calc(var(--x-spacing-small-400) - 1px);

                content: "";

                height: 1em;

                left: calc(var(--x-spacing-small-400) - 1px);

                position: absolute;

                transition: var(--x-duration-fast);

                width: 1em

            }



            .i6e6fx4:checked+.i6e6fxd {

                background-color: var(--x-default-color-accent);

                border-color: var(--x-default-color-accent)

            }



            .i6e6fx4:active:focus-visible+.i6e6fxd,

            .i6e6fx4:focus-visible+.i6e6fxd {

                outline: 1px solid var(--x-default-color-accent);

                outline-offset: 1px

            }



            .i6e6fx4:checked+.i6e6fxd:before {

                background-color: var(--x-default-color-accent-contrast);

                bottom: .07142857142857142em;

                height: 1.4285714285714286em;

                left: calc((2.857142857142857em - 1.4285714285714286em) - var(--x-spacing-small-500));

                width: 1.4285714285714286em

            }



            [dir=ltr] .i6e6fxf {

                left: calc(50% + 8px)

            }



            [dir=rtl] .i6e6fxf {

                right: calc(50% + 8px)

            }



            .i6e6fxf {

                color: var(--x-default-color-accent);

                height: calc(var(--x-typography-size-default) * .7142857142857143);

                inset-inline-start: calc(50% + 8px);

                min-height: calc(var(--x-typography-size-default) * .7142857142857143);

                min-width: calc(var(--x-typography-size-default) * .7142857142857143);

                transform: translate(-50%, -50%);

                transform-origin: center;

                width: calc(var(--x-typography-size-default) * .7142857142857143)

            }



            .i6e6fx4:checked~.i6e6fxf {

                opacity: 1

            }



            .i6e6fxk {

                vector-effect: non-scaling-stroke;

                stroke-width: 1.4px;

                stroke-dasharray: 50px;

                stroke-dashoffset: 0px

            }



            .i6e6fx4:checked~.i6e6fxf>.i6e6fxh>.i6e6fxk {

                stroke: var(--x-default-color-accent)

            }



            .i6e6fx4:checked:not(:disabled)~.i6e6fxf>.i6e6fxh>.i6e6fxk {

                animation: i6e6fxi var(--x-duration-slow) linear 5ms backwards

            }



            .i6e6fx4:checked:disabled~.i6e6fxf>.i6e6fxh>.i6e6fxk {

                animation: none;

                stroke-dashoffset: 0px

            }



            .i6e6fxm {

                padding-top: .10714285714285714em;

                padding-block-start: .10714285714285714em

            }



            .i8os0m1 {

                background-color: var(--x-default-color-background-subdued);

                border-radius: var(--x-global-border-radius, var(--x-border-radius-base));

                line-height: var(--x-global-typography-line-size-small)

            }



            [dir=ltr] .i8os0m2 {

                margin-right: var(--x-spacing-small-400)

            }



            [dir=rtl] .i8os0m2 {

                margin-left: var(--x-spacing-small-400)

            }



            .i8os0m2 {

                margin-inline-end: var(--x-spacing-small-400);

                margin-bottom: calc(var(--x-spacing-small-200) * -1);

                margin-top: calc(var(--x-spacing-small-200) * -1);

                margin-block: calc(var(--x-spacing-small-200) * -1)

            }



            .i8os0m3 {

                color: var(--x-default-color-text);

                max-width: 21rem

            }



            [dir=ltr] .i8os0m5 {

                margin-left: 0

            }



            [dir=rtl] .i8os0m5 {

                margin-right: 0

            }



            .i8os0m5 {

                color: var(--x-default-color-text-subdued);

                margin: calc(var(--x-spacing-small-200) * -1);

                margin-inline-start: 0

            }



            .i8os0m5:active,

            .i8os0m5:hover {

                color: var(--x-default-color-text)

            }



            .by0ptk7 {

                border-block-end: 6px solid black;

                border-bottom: 6px solid black;

                color: var(--x-default-color-text-contrast);

                max-width: 12.857142857142858em;

                transform: scale(.8);

                transform-origin: center 120%;

                transition: transform var(--x-duration-base) var(--x-timing-spring), opacity var(--x-duration-base) var(--x-timing-spring)

            }



            .by0ptk7.by0ptk0 {

                opacity: 1;

                transform: scale(1) perspective(1px)

            }



            .by0ptk7.by0ptk1,

            .by0ptk7.by0ptk2 {

                pointer-events: none

            }



            .by0ptk7:before {

                background-color: var(--x-default-color-text);

                border-radius: var(--x-global-border-radius, var(--x-border-radius-base));

                bottom: 0;

                content: "";

                display: block;

                left: 0;

                position: absolute;

                right: 0;

                top: 0;

                inset: 0;

                opacity: .9;

                z-index: -1

            }



            .by0ptk9 {

                border: .42857142857142855em solid black;

                border-bottom-width: 0;

                border-top-color: var(--x-default-color-text);

                opacity: .9

            }



            [dir=rtl] .by0ptk9 {

                transform: translate(50%)

            }



            [dir=ltr] .by0ptk9 {

                transform: translate(-50%)

            }



            ._1cu0kdq1 {

                border-color: var(--x-default-color-border);

                border-width: var(--x-control-border-width);

                -webkit-tap-highlight-color: transparent;

                -webkit-touch-callout: none;

                border-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)));

                transition: background-color var(--x-duration-fast) var(--x-timing-base), border-color var(--x-duration-fast) var(--x-timing-base)

            }



            ._1cu0kdq1:after {

                border: 1px var(--x-default-color-border) solid;

                border-radius: inherit;

                bottom: -1px;

                content: "";

                display: block;

                left: -1px;

                position: absolute;

                right: -1px;

                top: -1px;

                inset: -1px;

                opacity: 0;

                pointer-events: none;

                transition: opacity var(--x-duration-fast) var(--x-timing-base), border-color var(--x-duration-fast) var(--x-timing-base);

                z-index: 1

            }



            ._1cu0kdq1:disabled {

                opacity: var(--x-opacity-disabled)

            }



            ._1cu0kdq4 {

                padding: var(--x-toggle-button-group-block-padding, var(--x-spacing-base))

            }



            ._1cu0kdqa:after,

            ._1cu0kdqc:after {

                opacity: 1

            }



            ._1cu0kdqd {

                border-radius: 0

            }



            [dir=ltr] ._1cu0kdqd:not(:first-child) {

                border-left: 0

            }



            [dir=rtl] ._1cu0kdqd:not(:first-child) {

                border-right: 0

            }



            ._1cu0kdqd:not(:first-child) {

                border-inline-start: 0

            }



            [dir=ltr] ._1cu0kdqd:first-child {

                border-top-left-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))

            }



            [dir=rtl] ._1cu0kdqd:first-child {

                border-top-right-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))

            }



            [dir=ltr] ._1cu0kdqd:first-child {

                border-bottom-left-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))

            }



            [dir=rtl] ._1cu0kdqd:first-child {

                border-bottom-right-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))

            }



            ._1cu0kdqd:first-child {

                border-end-start-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)));

                border-start-start-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))

            }



            [dir=ltr] ._1cu0kdqd:last-child {

                border-top-right-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))

            }



            [dir=rtl] ._1cu0kdqd:last-child {

                border-top-left-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))

            }



            [dir=ltr] ._1cu0kdqd:last-child {

                border-bottom-right-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))

            }



            [dir=rtl] ._1cu0kdqd:last-child {

                border-bottom-left-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))

            }



            ._1cu0kdqd:last-child {

                border-end-end-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)));

                border-start-end-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))

            }



            .go06b0 {

                display: block

            }



            .go06b0 b,

            .go06b0 strong {

                font-weight: var(--x-typography-primary-weight-bold)

            }



            .go06b0 address,

            .go06b0 em,

            .go06b0 i {

                font-style: italic

            }



            .go06b0 h1 {

                --this-font-size: var(--x-typography-size-extra-large);

                --this-font-weight: var(--x-typography-secondary-weight-base)

            }



            .go06b0 h1,

            .go06b0 h2 {

                font-size: var(--this-font-size);

                font-weight: var(--this-font-weight)

            }



            .go06b0 h2 {

                --this-font-size: var(--x-typography-size-medium);

                --this-font-weight: var(--x-typography-secondary-weight-base)

            }



            .go06b0 h3 {

                --this-font-size: var(--x-typography-size-default);

                --this-font-weight: var(--x-typography-secondary-weight-bold)

            }



            .go06b0 h3,

            .go06b0 h4,

            .go06b0 h5,

            .go06b0 h6 {

                font-size: var(--this-font-size);

                font-weight: var(--this-font-weight)

            }



            .go06b0 h4,

            .go06b0 h5,

            .go06b0 h6 {

                --this-font-size: var(--x-typography-size-default);

                --this-font-weight: var(--x-typography-secondary-weight-base)

            }



            .go06b0 ol,

            .go06b0 ul {

                list-style: initial;

                margin: initial;

                padding: initial

            }



            ._6zbcq55 {

                --_6zbcq51: var(--x-default-color-border, white);

                --x-resource-list-border-color: var(--x-default-color-border, white)

            }



            ._6zbcq56 {

                --_6zbcq52: solid;

                --x-resource-list-border-style: solid

            }



            ._6zbcq57 {

                --_6zbcq52: dotted;

                --x-resource-list-border-style: dotted

            }



            ._6zbcq59 {

                --_6zbcq53: var(--x-spacing-small-500)

            }



            ._6zbcq5a {

                --_6zbcq53: var(--x-spacing-small-400)

            }



            ._6zbcq5b {

                --_6zbcq53: var(--x-spacing-small-300)

            }



            ._6zbcq5c {

                --_6zbcq53: var(--x-spacing-small-200)

            }



            ._6zbcq5d {

                --_6zbcq53: var(--x-spacing-small-100)

            }



            ._6zbcq5e {

                --_6zbcq53: var(--x-spacing-base)

            }



            ._6zbcq5f {

                --_6zbcq53: var(--x-spacing-large-100)

            }



            ._6zbcq5g {

                --_6zbcq53: var(--x-spacing-large-200)

            }



            ._6zbcq5h {

                --_6zbcq53: var(--x-spacing-large-300)

            }



            ._6zbcq5i {

                --_6zbcq53: var(--x-spacing-large-400)

            }



            ._6zbcq5j {

                --_6zbcq53: var(--x-spacing-large-500)

            }



            ._6zbcq5n {

                --_6zbcq50: var(--x-global-border-radius, var(--x-border-radius-base));

                border-radius: var(--_6zbcq50)

            }



            ._6zbcq51b {

                border: 0;

                margin-block-start: 0;

                margin-top: 0

            }



            ._6zbcq5n>._6zbcq51d:not(._6zbcq51b) {

                border: 1px var(--_6zbcq52) var(--_6zbcq51)

            }



            [dir=ltr] ._6zbcq5n>._6zbcq51d:not(._6zbcq51b):first-child {

                border-top-left-radius: var(--_6zbcq50)

            }



            [dir=ltr] ._6zbcq5n>._6zbcq51d:not(._6zbcq51b):first-child,

            [dir=rtl] ._6zbcq5n>._6zbcq51d:not(._6zbcq51b):first-child {

                border-top-right-radius: var(--_6zbcq50)

            }



            [dir=rtl] ._6zbcq5n>._6zbcq51d:not(._6zbcq51b):first-child {

                border-top-left-radius: var(--_6zbcq50)

            }



            ._6zbcq5n>._6zbcq51d:not(._6zbcq51b):first-child {

                border-start-end-radius: var(--_6zbcq50);

                border-start-start-radius: var(--_6zbcq50)

            }



            [dir=ltr] ._6zbcq5n>._6zbcq51d:not(._6zbcq51b):last-child {

                border-bottom-left-radius: var(--_6zbcq50)

            }



            [dir=ltr] ._6zbcq5n>._6zbcq51d:not(._6zbcq51b):last-child,

            [dir=rtl] ._6zbcq5n>._6zbcq51d:not(._6zbcq51b):last-child {

                border-bottom-right-radius: var(--_6zbcq50)

            }



            [dir=rtl] ._6zbcq5n>._6zbcq51d:not(._6zbcq51b):last-child {

                border-bottom-left-radius: var(--_6zbcq50)

            }



            ._6zbcq5n>._6zbcq51d:not(._6zbcq51b):last-child {

                border-end-end-radius: var(--_6zbcq50);

                border-end-start-radius: var(--_6zbcq50)

            }



            ._6zbcq5n._6zbcq58>._6zbcq51d:not(._6zbcq51b):not(:last-child) {

                border-block-end: 0;

                border-bottom: 0

            }



            ._6zbcq5n>._6zbcq510._6zbcq51d {

                padding-top: var(--x-spacing-small-500);

                padding-block-start: var(--x-spacing-small-500)

            }



            ._6zbcq5n>._6zbcq511._6zbcq51d {

                padding-top: var(--x-spacing-small-400);

                padding-block-start: var(--x-spacing-small-400)

            }



            ._6zbcq5n>._6zbcq512._6zbcq51d {

                padding-top: var(--x-spacing-small-300);

                padding-block-start: var(--x-spacing-small-300)

            }



            ._6zbcq5n>._6zbcq513._6zbcq51d {

                padding-top: var(--x-spacing-small-200);

                padding-block-start: var(--x-spacing-small-200)

            }



            ._6zbcq5n>._6zbcq514._6zbcq51d {

                padding-top: var(--x-spacing-small-100);

                padding-block-start: var(--x-spacing-small-100)

            }



            ._6zbcq5n>._6zbcq515._6zbcq51d {

                padding-top: var(--x-spacing-base);

                padding-block-start: var(--x-spacing-base)

            }



            ._6zbcq5n>._6zbcq516._6zbcq51d {

                padding-top: var(--x-spacing-large-100);

                padding-block-start: var(--x-spacing-large-100)

            }



            ._6zbcq5n>._6zbcq517._6zbcq51d {

                padding-top: var(--x-spacing-large-200);

                padding-block-start: var(--x-spacing-large-200)

            }



            ._6zbcq5n>._6zbcq518._6zbcq51d {

                padding-top: var(--x-spacing-large-300);

                padding-block-start: var(--x-spacing-large-300)

            }



            ._6zbcq5n>._6zbcq519._6zbcq51d {

                padding-top: var(--x-spacing-large-400);

                padding-block-start: var(--x-spacing-large-400)

            }



            ._6zbcq5n>._6zbcq51a._6zbcq51d {

                padding-top: var(--x-spacing-large-500);

                padding-block-start: var(--x-spacing-large-500)

            }



            [dir=ltr] ._6zbcq51e+._6zbcq51e {

                padding-left: var(--x-spacing-base)

            }



            [dir=rtl] ._6zbcq51e+._6zbcq51e {

                padding-right: var(--x-spacing-base)

            }



            ._6zbcq51e+._6zbcq51e {

                padding-inline-start: var(--x-spacing-base)

            }



            ._6zbcq55:not(._6zbcq58)>._6zbcq51d:not(._6zbcq51b)+._6zbcq524,

            ._6zbcq55:not(._6zbcq58)>._6zbcq524+._6zbcq524 {

                margin-block-start: var(--_6zbcq53, var(--x-spacing-base));

                margin-top: var(--_6zbcq53, var(--x-spacing-base))

            }



            ._6zbcq5l._6zbcq58>._6zbcq524:not(:first-child) {

                border-block-start-width: 0;

                border-top-width: 0

            }



            ._6zbcq5m._6zbcq58>._6zbcq524:not(:last-child) {

                border-block-end-width: 0;

                border-bottom-width: 0

            }



            ._6zbcq5l>._6zbcq524,

            ._6zbcq5m>._6zbcq524 {

                border-block: 1px var(--_6zbcq52) var(--_6zbcq51);

                border-bottom: 1px var(--_6zbcq52) var(--_6zbcq51);

                border-top: 1px var(--_6zbcq52) var(--_6zbcq51)

            }



            ._6zbcq5l>._6zbcq524:first-child {

                border-block-start-width: 0;

                border-top-width: 0

            }



            ._6zbcq5l>._6zbcq524:last-child {

                border-block-end-width: 0;

                border-bottom-width: 0

            }



            ._6zbcq5n>._6zbcq524 {

                border: 1px var(--_6zbcq52) var(--_6zbcq51)

            }



            [dir=ltr] ._6zbcq5n>._6zbcq524:first-child {

                border-top-left-radius: var(--_6zbcq50)

            }



            [dir=ltr] ._6zbcq5n>._6zbcq524:first-child,

            [dir=rtl] ._6zbcq5n>._6zbcq524:first-child {

                border-top-right-radius: var(--_6zbcq50)

            }



            [dir=rtl] ._6zbcq5n>._6zbcq524:first-child {

                border-top-left-radius: var(--_6zbcq50)

            }



            ._6zbcq5n>._6zbcq524:first-child {

                border-start-end-radius: var(--_6zbcq50);

                border-start-start-radius: var(--_6zbcq50)

            }



            [dir=ltr] ._6zbcq5n>._6zbcq524:last-child {

                border-bottom-left-radius: var(--_6zbcq50)

            }



            [dir=ltr] ._6zbcq5n>._6zbcq524:last-child,

            [dir=rtl] ._6zbcq5n>._6zbcq524:last-child {

                border-bottom-right-radius: var(--_6zbcq50)

            }



            [dir=rtl] ._6zbcq5n>._6zbcq524:last-child {

                border-bottom-left-radius: var(--_6zbcq50)

            }



            ._6zbcq5n>._6zbcq524:last-child {

                border-end-end-radius: var(--_6zbcq50);

                border-end-start-radius: var(--_6zbcq50)

            }



            ._6zbcq5n._6zbcq58>._6zbcq524:not(:last-child) {

                border-block-end: 0;

                border-bottom: 0

            }



            ._6zbcq51d._6zbcq51b+._6zbcq524 {

                margin-block-start: 0;

                margin-top: 0

            }



            ._6zbcq5l>._6zbcq51d._6zbcq51b+._6zbcq524 {

                border-block-start-width: 0;

                border-top-width: 0

            }



            [dir=ltr] ._6zbcq5n>._6zbcq51d._6zbcq51b+._6zbcq524 {

                border-top-left-radius: var(--_6zbcq50)

            }



            [dir=ltr] ._6zbcq5n>._6zbcq51d._6zbcq51b+._6zbcq524,

            [dir=rtl] ._6zbcq5n>._6zbcq51d._6zbcq51b+._6zbcq524 {

                border-top-right-radius: var(--_6zbcq50)

            }



            [dir=rtl] ._6zbcq5n>._6zbcq51d._6zbcq51b+._6zbcq524 {

                border-top-left-radius: var(--_6zbcq50)

            }



            ._6zbcq5n>._6zbcq51d._6zbcq51b+._6zbcq524 {

                border-start-end-radius: var(--_6zbcq50);

                border-start-start-radius: var(--_6zbcq50)

            }



            [dir=ltr] ._6zbcq526._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=ltr] ._6zbcq526._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-right: var(--x-spacing-small-500)

            }



            [dir=rtl] ._6zbcq526._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=rtl] ._6zbcq526._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-left: var(--x-spacing-small-500)

            }



            ._6zbcq526._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            ._6zbcq526._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-inline-end: var(--x-spacing-small-500)

            }



            [dir=ltr] ._6zbcq526>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-left: var(--x-spacing-small-500)

            }



            [dir=rtl] ._6zbcq526>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-right: var(--x-spacing-small-500)

            }



            ._6zbcq526>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-inline-start: var(--x-spacing-small-500)

            }



            [dir=ltr] ._6zbcq527._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=ltr] ._6zbcq527._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-right: var(--x-spacing-small-400)

            }



            [dir=rtl] ._6zbcq527._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=rtl] ._6zbcq527._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-left: var(--x-spacing-small-400)

            }



            ._6zbcq527._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            ._6zbcq527._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-inline-end: var(--x-spacing-small-400)

            }



            [dir=ltr] ._6zbcq527>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-left: var(--x-spacing-small-400)

            }



            [dir=rtl] ._6zbcq527>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-right: var(--x-spacing-small-400)

            }



            ._6zbcq527>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-inline-start: var(--x-spacing-small-400)

            }



            [dir=ltr] ._6zbcq528._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=ltr] ._6zbcq528._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-right: var(--x-spacing-small-300)

            }



            [dir=rtl] ._6zbcq528._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=rtl] ._6zbcq528._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-left: var(--x-spacing-small-300)

            }



            ._6zbcq528._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            ._6zbcq528._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-inline-end: var(--x-spacing-small-300)

            }



            [dir=ltr] ._6zbcq528>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-left: var(--x-spacing-small-300)

            }



            [dir=rtl] ._6zbcq528>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-right: var(--x-spacing-small-300)

            }



            ._6zbcq528>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-inline-start: var(--x-spacing-small-300)

            }



            [dir=ltr] ._6zbcq529._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=ltr] ._6zbcq529._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-right: var(--x-spacing-small-200)

            }



            [dir=rtl] ._6zbcq529._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=rtl] ._6zbcq529._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-left: var(--x-spacing-small-200)

            }



            ._6zbcq529._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            ._6zbcq529._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-inline-end: var(--x-spacing-small-200)

            }



            [dir=ltr] ._6zbcq529>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-left: var(--x-spacing-small-200)

            }



            [dir=rtl] ._6zbcq529>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-right: var(--x-spacing-small-200)

            }



            ._6zbcq529>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-inline-start: var(--x-spacing-small-200)

            }



            [dir=ltr] ._6zbcq52a._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=ltr] ._6zbcq52a._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-right: var(--x-spacing-small-100)

            }



            [dir=rtl] ._6zbcq52a._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=rtl] ._6zbcq52a._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-left: var(--x-spacing-small-100)

            }



            ._6zbcq52a._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            ._6zbcq52a._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-inline-end: var(--x-spacing-small-100)

            }



            [dir=ltr] ._6zbcq52a>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-left: var(--x-spacing-small-100)

            }



            [dir=rtl] ._6zbcq52a>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-right: var(--x-spacing-small-100)

            }



            ._6zbcq52a>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-inline-start: var(--x-spacing-small-100)

            }



            [dir=ltr] ._6zbcq52b._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=ltr] ._6zbcq52b._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-right: var(--x-spacing-base)

            }



            [dir=rtl] ._6zbcq52b._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=rtl] ._6zbcq52b._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-left: var(--x-spacing-base)

            }



            ._6zbcq52b._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            ._6zbcq52b._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-inline-end: var(--x-spacing-base)

            }



            [dir=ltr] ._6zbcq52b>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-left: var(--x-spacing-base)

            }



            [dir=rtl] ._6zbcq52b>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-right: var(--x-spacing-base)

            }



            ._6zbcq52b>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-inline-start: var(--x-spacing-base)

            }



            [dir=ltr] ._6zbcq52c._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=ltr] ._6zbcq52c._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-right: var(--x-spacing-large-100)

            }



            [dir=rtl] ._6zbcq52c._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=rtl] ._6zbcq52c._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-left: var(--x-spacing-large-100)

            }



            ._6zbcq52c._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            ._6zbcq52c._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-inline-end: var(--x-spacing-large-100)

            }



            [dir=ltr] ._6zbcq52c>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-left: var(--x-spacing-large-100)

            }



            [dir=rtl] ._6zbcq52c>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-right: var(--x-spacing-large-100)

            }



            ._6zbcq52c>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-inline-start: var(--x-spacing-large-100)

            }



            [dir=ltr] ._6zbcq52d._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=ltr] ._6zbcq52d._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-right: var(--x-spacing-large-200)

            }



            [dir=rtl] ._6zbcq52d._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=rtl] ._6zbcq52d._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-left: var(--x-spacing-large-200)

            }



            ._6zbcq52d._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            ._6zbcq52d._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-inline-end: var(--x-spacing-large-200)

            }



            [dir=ltr] ._6zbcq52d>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-left: var(--x-spacing-large-200)

            }



            [dir=rtl] ._6zbcq52d>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-right: var(--x-spacing-large-200)

            }



            ._6zbcq52d>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-inline-start: var(--x-spacing-large-200)

            }



            [dir=ltr] ._6zbcq52e._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=ltr] ._6zbcq52e._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-right: var(--x-spacing-large-300)

            }



            [dir=rtl] ._6zbcq52e._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=rtl] ._6zbcq52e._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-left: var(--x-spacing-large-300)

            }



            ._6zbcq52e._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            ._6zbcq52e._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-inline-end: var(--x-spacing-large-300)

            }



            [dir=ltr] ._6zbcq52e>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-left: var(--x-spacing-large-300)

            }



            [dir=rtl] ._6zbcq52e>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-right: var(--x-spacing-large-300)

            }



            ._6zbcq52e>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-inline-start: var(--x-spacing-large-300)

            }



            [dir=ltr] ._6zbcq52f._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=ltr] ._6zbcq52f._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-right: var(--x-spacing-large-400)

            }



            [dir=rtl] ._6zbcq52f._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=rtl] ._6zbcq52f._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-left: var(--x-spacing-large-400)

            }



            ._6zbcq52f._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            ._6zbcq52f._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-inline-end: var(--x-spacing-large-400)

            }



            [dir=ltr] ._6zbcq52f>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-left: var(--x-spacing-large-400)

            }



            [dir=rtl] ._6zbcq52f>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-right: var(--x-spacing-large-400)

            }



            ._6zbcq52f>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-inline-start: var(--x-spacing-large-400)

            }



            [dir=ltr] ._6zbcq52g._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=ltr] ._6zbcq52g._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-right: var(--x-spacing-large-500)

            }



            [dir=rtl] ._6zbcq52g._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            [dir=rtl] ._6zbcq52g._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-left: var(--x-spacing-large-500)

            }



            ._6zbcq52g._6zbcq52i>._6zbcq53s:not(._6zbcq53q):not(:last-child),

            ._6zbcq52g._6zbcq52j>._6zbcq53s:not(._6zbcq53q):not(:last-child) {

                padding-inline-end: var(--x-spacing-large-500)

            }



            [dir=ltr] ._6zbcq52g>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-left: var(--x-spacing-large-500)

            }



            [dir=rtl] ._6zbcq52g>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-right: var(--x-spacing-large-500)

            }



            ._6zbcq52g>._6zbcq53s+._6zbcq53s:not(._6zbcq53q) {

                padding-inline-start: var(--x-spacing-large-500)

            }



            [dir=ltr] ._6zbcq52i>._6zbcq53s,

            [dir=ltr] ._6zbcq52j>._6zbcq53s {

                border-left: 1px var(--x-resource-list-border-style) var(--x-resource-list-border-color)

            }



            [dir=rtl] ._6zbcq52i>._6zbcq53s,

            [dir=rtl] ._6zbcq52j>._6zbcq53s {

                border-right: 1px var(--x-resource-list-border-style) var(--x-resource-list-border-color)

            }



            ._6zbcq52i>._6zbcq53s,

            ._6zbcq52j>._6zbcq53s {

                border-inline-start: 1px var(--x-resource-list-border-style) var(--x-resource-list-border-color)

            }



            [dir=ltr] ._6zbcq52i>._6zbcq53s:first-child,

            [dir=ltr] ._6zbcq52j>._6zbcq53s:first-child {

                border-left-width: 0

            }



            [dir=rtl] ._6zbcq52i>._6zbcq53s:first-child,

            [dir=rtl] ._6zbcq52j>._6zbcq53s:first-child {

                border-right-width: 0

            }



            ._6zbcq52i>._6zbcq53s:first-child,

            ._6zbcq52j>._6zbcq53s:first-child {

                border-inline-start-width: 0

            }



            ._6zbcq538._6zbcq52j>._6zbcq53s {

                padding-top: var(--x-spacing-small-500);

                padding-block-start: var(--x-spacing-small-500);

                padding-bottom: var(--x-spacing-small-500);

                padding-block-end: var(--x-spacing-small-500)

            }



            ._6zbcq538:not(._6zbcq52j)>._6zbcq53s {

                margin-block-end: var(--x-spacing-small-500);

                margin-block-start: var(--x-spacing-small-500);

                margin-bottom: var(--x-spacing-small-500);

                margin-top: var(--x-spacing-small-500)

            }



            ._6zbcq539._6zbcq52j>._6zbcq53s {

                padding-top: var(--x-spacing-small-400);

                padding-block-start: var(--x-spacing-small-400);

                padding-bottom: var(--x-spacing-small-400);

                padding-block-end: var(--x-spacing-small-400)

            }



            ._6zbcq539:not(._6zbcq52j)>._6zbcq53s {

                margin-block-end: var(--x-spacing-small-400);

                margin-block-start: var(--x-spacing-small-400);

                margin-bottom: var(--x-spacing-small-400);

                margin-top: var(--x-spacing-small-400)

            }



            ._6zbcq53a._6zbcq52j>._6zbcq53s {

                padding-top: var(--x-spacing-small-300);

                padding-block-start: var(--x-spacing-small-300);

                padding-bottom: var(--x-spacing-small-300);

                padding-block-end: var(--x-spacing-small-300)

            }



            ._6zbcq53a:not(._6zbcq52j)>._6zbcq53s {

                margin-block-end: var(--x-spacing-small-300);

                margin-block-start: var(--x-spacing-small-300);

                margin-bottom: var(--x-spacing-small-300);

                margin-top: var(--x-spacing-small-300)

            }



            ._6zbcq53b._6zbcq52j>._6zbcq53s {

                padding-top: var(--x-spacing-small-200);

                padding-block-start: var(--x-spacing-small-200);

                padding-bottom: var(--x-spacing-small-200);

                padding-block-end: var(--x-spacing-small-200)

            }



            ._6zbcq53b:not(._6zbcq52j)>._6zbcq53s {

                margin-block-end: var(--x-spacing-small-200);

                margin-block-start: var(--x-spacing-small-200);

                margin-bottom: var(--x-spacing-small-200);

                margin-top: var(--x-spacing-small-200)

            }



            ._6zbcq53c._6zbcq52j>._6zbcq53s {

                padding-top: var(--x-spacing-small-100);

                padding-block-start: var(--x-spacing-small-100);

                padding-bottom: var(--x-spacing-small-100);

                padding-block-end: var(--x-spacing-small-100)

            }



            ._6zbcq53c:not(._6zbcq52j)>._6zbcq53s {

                margin-block-end: var(--x-spacing-small-100);

                margin-block-start: var(--x-spacing-small-100);

                margin-bottom: var(--x-spacing-small-100);

                margin-top: var(--x-spacing-small-100)

            }



            ._6zbcq53d._6zbcq52j>._6zbcq53s {

                padding-top: var(--x-spacing-base);

                padding-block-start: var(--x-spacing-base);

                padding-bottom: var(--x-spacing-base);

                padding-block-end: var(--x-spacing-base)

            }



            ._6zbcq53d:not(._6zbcq52j)>._6zbcq53s {

                margin-block-end: var(--x-spacing-base);

                margin-block-start: var(--x-spacing-base);

                margin-bottom: var(--x-spacing-base);

                margin-top: var(--x-spacing-base)

            }



            ._6zbcq53e._6zbcq52j>._6zbcq53s {

                padding-top: var(--x-spacing-large-100);

                padding-block-start: var(--x-spacing-large-100);

                padding-bottom: var(--x-spacing-large-100);

                padding-block-end: var(--x-spacing-large-100)

            }



            ._6zbcq53e:not(._6zbcq52j)>._6zbcq53s {

                margin-block-end: var(--x-spacing-large-100);

                margin-block-start: var(--x-spacing-large-100);

                margin-bottom: var(--x-spacing-large-100);

                margin-top: var(--x-spacing-large-100)

            }



            ._6zbcq53f._6zbcq52j>._6zbcq53s {

                padding-top: var(--x-spacing-large-200);

                padding-block-start: var(--x-spacing-large-200);

                padding-bottom: var(--x-spacing-large-200);

                padding-block-end: var(--x-spacing-large-200)

            }



            ._6zbcq53f:not(._6zbcq52j)>._6zbcq53s {

                margin-block-end: var(--x-spacing-large-200);

                margin-block-start: var(--x-spacing-large-200);

                margin-bottom: var(--x-spacing-large-200);

                margin-top: var(--x-spacing-large-200)

            }



            ._6zbcq53g._6zbcq52j>._6zbcq53s {

                padding-top: var(--x-spacing-large-300);

                padding-block-start: var(--x-spacing-large-300);

                padding-bottom: var(--x-spacing-large-300);

                padding-block-end: var(--x-spacing-large-300)

            }



            ._6zbcq53g:not(._6zbcq52j)>._6zbcq53s {

                margin-block-end: var(--x-spacing-large-300);

                margin-block-start: var(--x-spacing-large-300);

                margin-bottom: var(--x-spacing-large-300);

                margin-top: var(--x-spacing-large-300)

            }



            ._6zbcq53h._6zbcq52j>._6zbcq53s {

                padding-top: var(--x-spacing-large-400);

                padding-block-start: var(--x-spacing-large-400);

                padding-bottom: var(--x-spacing-large-400);

                padding-block-end: var(--x-spacing-large-400)

            }



            ._6zbcq53h:not(._6zbcq52j)>._6zbcq53s {

                margin-block-end: var(--x-spacing-large-400);

                margin-block-start: var(--x-spacing-large-400);

                margin-bottom: var(--x-spacing-large-400);

                margin-top: var(--x-spacing-large-400)

            }



            ._6zbcq53i._6zbcq52j>._6zbcq53s {

                padding-top: var(--x-spacing-large-500);

                padding-block-start: var(--x-spacing-large-500);

                padding-bottom: var(--x-spacing-large-500);

                padding-block-end: var(--x-spacing-large-500)

            }



            ._6zbcq53i:not(._6zbcq52j)>._6zbcq53s {

                margin-block-end: var(--x-spacing-large-500);

                margin-block-start: var(--x-spacing-large-500);

                margin-bottom: var(--x-spacing-large-500);

                margin-top: var(--x-spacing-large-500)

            }



            [dir=ltr] ._6zbcq52i>._6zbcq53q._6zbcq53s,

            [dir=ltr] ._6zbcq52j>._6zbcq53q._6zbcq53s {

                border-left-width: 0

            }



            [dir=rtl] ._6zbcq52i>._6zbcq53q._6zbcq53s,

            [dir=rtl] ._6zbcq52j>._6zbcq53q._6zbcq53s {

                border-right-width: 0

            }



            ._6zbcq52i>._6zbcq53q._6zbcq53s,

            ._6zbcq52j>._6zbcq53q._6zbcq53s {

                border-inline-start-width: 0

            }



            @media (max-width:569px) {

                ._123qrzt1 {

                    display: none

                }

            }



            @media (min-width:570px) and (max-width:749px) {

                ._123qrzt2 {

                    display: none

                }

            }



            @media (min-width:750px) and (max-width:999px) {

                ._123qrzt3 {

                    display: none

                }

            }



            @media (min-width:1000px) {

                ._123qrzt4 {

                    display: none

                }

            }



            [dir=ltr] ._1qy6ue61 {

                padding-left: var(--x-money-lines-inline-padding)

            }



            [dir=ltr] ._1qy6ue61,

            [dir=rtl] ._1qy6ue61 {

                padding-right: var(--x-money-lines-inline-padding)

            }



            [dir=rtl] ._1qy6ue61 {

                padding-left: var(--x-money-lines-inline-padding)

            }



            ._1qy6ue61 {

                grid-column-gap: var(--x-spacing-large-100);

                grid-template-areas: "header content";

                padding-top: var(--x-money-lines-block-padding);

                padding-block-start: var(--x-money-lines-block-padding);

                padding-bottom: var(--x-money-lines-block-padding);

                padding-block-end: var(--x-money-lines-block-padding);

                padding-inline-end: var(--x-money-lines-inline-padding);

                padding-inline-start: var(--x-money-lines-inline-padding)

            }



            ._1qy6ue62 {

                justify-items: end

            }



            ._1qy6ue62,

            ._1qy6ue63 {

                grid-template-columns: 1fr 1fr

            }



            ._1qy6ue63 {

                justify-items: start

            }



            ._1qy6ue64,

            ._1qy6ue65 {

                grid-template-columns: 1fr 1fr

            }



            ._1qy6ue66 {

                grid-template-columns: auto auto

            }



            ._1qy6ue67 {

                grid-area: header;

                -ms-grid-column: 1;

                -ms-grid-row: 1

            }



            ._1qy6ue64 ._1qy6ue67 {

                justify-self: end

            }



            ._1qy6ue68 {

                grid-area: content;

                -ms-grid-column: 3;

                -ms-grid-row: 1

            }



            ._1qy6ue64 ._1qy6ue68 {

                justify-self: start

            }



            ._1qy6ue65 ._1qy6ue68,

            ._1qy6ue66 ._1qy6ue68 {

                justify-self: end;

                text-align: right

            }



            .nfgb6p0 {

                word-break: break-word

            }



            .nfgb6p0>*+* {

                margin-block-start: var(--x-money-lines-block-spacing, var(--x-spacing-small-300));

                margin-top: var(--x-money-lines-block-spacing, var(--x-spacing-small-300))

            }



            [dir=ltr] ._1x41w3p1 {

                padding-left: var(--x-money-summary-inline-padding)

            }



            [dir=ltr] ._1x41w3p1,

            [dir=rtl] ._1x41w3p1 {

                padding-right: var(--x-money-summary-inline-padding)

            }



            [dir=rtl] ._1x41w3p1 {

                padding-left: var(--x-money-summary-inline-padding)

            }



            ._1x41w3p1 {

                grid-column-gap: var(--x-spacing-base);

                grid-template-areas: "header content";

                padding-top: var(--x-money-summary-block-padding);

                padding-block-start: var(--x-money-summary-block-padding);

                padding-bottom: var(--x-money-summary-block-padding);

                padding-block-end: var(--x-money-summary-block-padding);

                padding-inline-end: var(--x-money-summary-inline-padding);

                padding-inline-start: var(--x-money-summary-inline-padding)

            }



            ._1x41w3p2 {

                justify-items: end

            }



            ._1x41w3p2,

            ._1x41w3p3 {

                grid-template-columns: 1fr 1fr

            }



            ._1x41w3p3 {

                justify-items: start

            }



            ._1x41w3p4 {

                grid-template-columns: 1fr 1fr

            }



            ._1x41w3p5 {

                grid-template-columns: 1fr auto

            }



            ._1x41w3p6 {

                grid-template-columns: auto auto

            }



            ._1x41w3p7 {

                grid-area: header;

                -ms-grid-column: 1;

                -ms-grid-row: 1

            }



            ._1x41w3p2 ._1x41w3p7 {

                text-align: right

            }



            ._1x41w3p4 ._1x41w3p7 {

                justify-self: end;

                text-align: right

            }



            ._1x41w3p8 {

                grid-area: content;

                -ms-grid-column: 3;

                -ms-grid-row: 1

            }



            ._1x41w3p4 ._1x41w3p8 {

                justify-self: start

            }



            ._1x41w3p6 ._1x41w3p8 {

                justify-self: end;

                text-align: right

            }



            [dir=ltr] .NSCO_ {

                margin-left: var(--x-review-block-inline-padding)

            }



            [dir=ltr] .NSCO_,

            [dir=rtl] .NSCO_ {

                margin-right: var(--x-review-block-inline-padding)

            }



            [dir=rtl] .NSCO_ {

                margin-left: var(--x-review-block-inline-padding)

            }



            .NSCO_ {

                align-items: baseline;

                display: flex;

                margin-inline-end: var(--x-review-block-inline-padding);

                margin-inline-start: var(--x-review-block-inline-padding);

                padding-top: var(--x-review-block-block-padding);

                padding-block-start: var(--x-review-block-block-padding);

                padding-bottom: var(--x-review-block-block-padding);

                padding-block-end: var(--x-review-block-block-padding)

            }



            .NSCO_:not(:first-child) {

                border-block-start: 1px var(--x-default-color-border) solid;

                border-top: 1px var(--x-default-color-border) solid;

                border-width: var(--x-review-block-border, var(--x-border-full));

                margin-block-start: var(--x-review-block-block-spacing);

                margin-top: var(--x-review-block-block-spacing)

            }



            [dir=ltr] .NSCO_.gdTsV,

            [dir=ltr] .NSCO_.lT5DX {

                margin-left: 0

            }



            [dir=ltr] .NSCO_.gdTsV,

            [dir=ltr] .NSCO_.lT5DX,

            [dir=rtl] .NSCO_.gdTsV,

            [dir=rtl] .NSCO_.lT5DX {

                margin-right: 0

            }



            [dir=rtl] .NSCO_.gdTsV,

            [dir=rtl] .NSCO_.lT5DX {

                margin-left: 0

            }



            [dir=ltr] .NSCO_.gdTsV,

            [dir=ltr] .NSCO_.lT5DX {

                padding-left: var(--x-review-block-inline-padding)

            }



            [dir=ltr] .NSCO_.gdTsV,

            [dir=ltr] .NSCO_.lT5DX,

            [dir=rtl] .NSCO_.gdTsV,

            [dir=rtl] .NSCO_.lT5DX {

                padding-right: var(--x-review-block-inline-padding)

            }



            [dir=rtl] .NSCO_.gdTsV,

            [dir=rtl] .NSCO_.lT5DX {

                padding-left: var(--x-review-block-inline-padding)

            }



            .NSCO_.gdTsV,

            .NSCO_.lT5DX {

                margin-inline-end: 0;

                margin-inline-start: 0;

                padding-inline-end: var(--x-review-block-inline-padding);

                padding-inline-start: var(--x-review-block-inline-padding)

            }



            .lT5DX {

                background-color: var(--x-default-color-background);

                border: 1px var(--x-default-color-border) solid;

                border-radius: var(--x-global-border-radius, var(--x-border-radius-base));

                border-width: var(--x-review-block-border, var(--x-border-full));

                color: var(--x-default-color-text)

            }



            [dir=ltr] .w3cHO {

                padding-right: var(--x-spacing-base)

            }



            [dir=rtl] .w3cHO {

                padding-left: var(--x-spacing-base)

            }



            .w3cHO {

                flex: 0 0 7em;

                padding-inline-end: var(--x-spacing-base)

            }



            @media (max-width:569px) {

                .w3cHO {

                    flex: 0;

                    padding-bottom: var(--x-spacing-small-400);

                    padding-block-end: var(--x-spacing-small-400)

                }

            }



            [dir=ltr] .nkp8r {

                padding-right: var(--x-spacing-base)

            }



            [dir=rtl] .nkp8r {

                padding-left: var(--x-spacing-base)

            }



            .nkp8r {

                flex: 1 1 0;

                padding-inline-end: var(--x-spacing-base);

                width: 100%;

                word-break: break-word

            }



            .Qk5zF {

                display: flex;

                flex-direction: row;

                flex-grow: 1

            }



            @media (max-width:749px) {

                .Qk5zF {

                    flex-wrap: wrap

                }

            }



            @media (max-width:569px) {

                .Qk5zF {

                    flex-flow: column

                }

            }



            .Xi8wo {

                flex-wrap: nowrap

            }



            .GR30A {

                margin-block-end: var(--x-spacing-small-200);

                margin-bottom: var(--x-spacing-small-200)

            }



            .Wo4qW {

                color: var(--x-default-color-text);

                --option-list-border-radius: var(--x-option-list-border-radius, var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base))))

            }



            .PuVf0,

            .PuVf0>.yL8c2 {

                border-radius: var(--option-list-border-radius)

            }



            .Xr2U3>.Z5rhi {

                --x-opacity-disabled: 1

            }



            .NdTJE {

                --option-list-border-style: solid

            }



            .X7NB2 {

                --option-list-border-style: dotted

            }



            .NDMe9.PuVf0 {

                border: 1px var(--x-default-color-border) var(--option-list-border-style)

            }



            .NDMe9.PuVf0 .B4zH6:not(:first-child) {

                border-block-start: 1px var(--x-default-color-border) var(--option-list-border-style);

                border-top: 1px var(--x-default-color-border) var(--option-list-border-style)

            }



            .NDMe9 .B4zH6.PuVf0 {

                border: 1px var(--x-default-color-border) var(--option-list-border-style)

            }



            .NDMe9 .b7U_P,

            .lwZ6l .B4zH6.PuVf0,

            .lwZ6l.PuVf0 .B4zH6:not(:first-child) {

                border-block-start: 1px var(--x-default-color-border) var(--option-list-border-style);

                border-top: 1px var(--x-default-color-border) var(--option-list-border-style)

            }



            .lwZ6l .B4zH6.PuVf0 {

                border-block-end: 1px var(--x-default-color-border) var(--option-list-border-style);

                border-bottom: 1px var(--x-default-color-border) var(--option-list-border-style)

            }



            .lwZ6l .B4zH6.PuVf0:first-child {

                border-block-start-width: 0;

                border-top-width: 0

            }



            .lwZ6l .B4zH6.PuVf0:last-child {

                border-block-end-width: 0;

                border-bottom-width: 0

            }



            .lwZ6l .b7U_P {

                border-block-start: 1px var(--x-default-color-border) var(--option-list-border-style);

                border-top: 1px var(--x-default-color-border) var(--option-list-border-style)

            }



            .B4zH6 {

                -webkit-tap-highlight-color: transparent;

                background-color: var(--option-list-background-color);

                transition: background-color var(--x-duration-base) var(--x-timing-base)

            }



            .B4zH6:not(:first-child) {

                margin-block-start: var(--x-option-list-block-spacing);

                margin-top: var(--x-option-list-block-spacing)

            }



            [dir=ltr] .B4zH6:first-child {

                border-top-left-radius: calc(var(--option-list-border-radius) - 1px)

            }



            [dir=ltr] .B4zH6:first-child,

            [dir=rtl] .B4zH6:first-child {

                border-top-right-radius: calc(var(--option-list-border-radius) - 1px)

            }



            [dir=rtl] .B4zH6:first-child {

                border-top-left-radius: calc(var(--option-list-border-radius) - 1px)

            }



            .B4zH6:first-child {

                border-start-end-radius: calc(var(--option-list-border-radius) - 1px);

                border-start-start-radius: calc(var(--option-list-border-radius) - 1px)

            }



            [dir=ltr] .B4zH6:first-child>.yL8c2 {

                border-top-left-radius: var(--option-list-border-radius)

            }



            [dir=ltr] .B4zH6:first-child>.yL8c2,

            [dir=rtl] .B4zH6:first-child>.yL8c2 {

                border-top-right-radius: var(--option-list-border-radius)

            }



            [dir=rtl] .B4zH6:first-child>.yL8c2 {

                border-top-left-radius: var(--option-list-border-radius)

            }



            .B4zH6:first-child>.yL8c2 {

                border-start-end-radius: var(--option-list-border-radius);

                border-start-start-radius: var(--option-list-border-radius)

            }



            [dir=ltr] .B4zH6:last-child {

                border-bottom-left-radius: calc(var(--option-list-border-radius) - 1px)

            }



            [dir=ltr] .B4zH6:last-child,

            [dir=rtl] .B4zH6:last-child {

                border-bottom-right-radius: calc(var(--option-list-border-radius) - 1px)

            }



            [dir=rtl] .B4zH6:last-child {

                border-bottom-left-radius: calc(var(--option-list-border-radius) - 1px)

            }



            .B4zH6:last-child {

                border-end-end-radius: calc(var(--option-list-border-radius) - 1px);

                border-end-start-radius: calc(var(--option-list-border-radius) - 1px)

            }



            [dir=ltr] .B4zH6:last-child .b7U_P,

            [dir=ltr] .B4zH6:last-child>.yL8c2 {

                border-bottom-left-radius: var(--option-list-border-radius)

            }



            [dir=ltr] .B4zH6:last-child .b7U_P,

            [dir=ltr] .B4zH6:last-child>.yL8c2,

            [dir=rtl] .B4zH6:last-child .b7U_P,

            [dir=rtl] .B4zH6:last-child>.yL8c2 {

                border-bottom-right-radius: var(--option-list-border-radius)

            }



            [dir=rtl] .B4zH6:last-child .b7U_P,

            [dir=rtl] .B4zH6:last-child>.yL8c2 {

                border-bottom-left-radius: var(--option-list-border-radius)

            }



            .B4zH6:last-child .b7U_P,

            .B4zH6:last-child>.yL8c2 {

                border-end-end-radius: var(--option-list-border-radius);

                border-end-start-radius: var(--option-list-border-radius)

            }



            [dir=ltr] .B4zH6.Zb82w:last-child:has(.b7U_P)>.yL8c2 {

                border-bottom-left-radius: 0

            }



            [dir=ltr] .B4zH6.Zb82w:last-child:has(.b7U_P)>.yL8c2,

            [dir=rtl] .B4zH6.Zb82w:last-child:has(.b7U_P)>.yL8c2 {

                border-bottom-right-radius: 0

            }



            [dir=rtl] .B4zH6.Zb82w:last-child:has(.b7U_P)>.yL8c2 {

                border-bottom-left-radius: 0

            }



            .B4zH6.Zb82w:last-child:has(.b7U_P)>.yL8c2 {

                border-end-end-radius: 0;

                border-end-start-radius: 0

            }



            .Z5rhi {

                opacity: var(--x-opacity-disabled);

                pointer-events: none

            }



            .yL8c2 {

                display: block;

                padding: var(--x-option-list-block-padding) var(--x-option-list-inline-padding)

            }



            .D1RJr {

                cursor: pointer

            }



            .zCeLR {

                font-size: var(--x-typography-size-default);

                font-weight: var(--x-typography-primary-weight-bold);

                letter-spacing: var(--x-global-typography-kerning);

                text-transform: var(--x-global-typography-letter-case)

            }



            .f5aCe {

                column-gap: var(--x-spacing-small-100);

                display: grid;

                grid-template-columns: minmax(min-content, 1fr) auto

            }



            .hEGyz {

                display: grid;

                gap: var(--x-spacing-small-100);

                grid-template-columns: auto 1fr

            }



            .SECJK {

                grid-column: 1/-1

            }



            .b7U_P {

                background-color: var(--x-default-color-background-subdued-alpha);

                padding: var(--x-option-list-block-padding) var(--x-option-list-inline-padding);

                word-break: break-word

            }



            .XJbX1 {

                padding-left: 0;

                padding-right: 0;

                padding-inline: 0

            }



            .fKPej {

                padding-bottom: 0;

                padding-top: 0;

                padding-block: 0

            }



            .HKtYc .yL8c2 {

                background-color: var(--x-default-color-background);

                color: var(--x-default-color-text);

                position: relative

            }



            .HKtYc .yL8c2:before {

                border: 1px var(--option-list-inner-border-color) solid;

                border-radius: inherit;

                bottom: -1px;

                content: "";

                display: block;

                left: -1px;

                position: absolute;

                right: -1px;

                top: -1px;

                inset: -1px;

                pointer-events: none;

                z-index: 1

            }



            .OpmPd .yL8c2 {

                position: relative

            }



            .OpmPd .yL8c2:before {

                border: 1px var(--option-list-inner-border-color) solid;

                border-radius: inherit;

                bottom: -1px;

                content: "";

                display: block;

                left: -1px;

                position: absolute;

                right: -1px;

                top: -1px;

                inset: -1px;

                pointer-events: none;

                z-index: 1

            }



            .ezrb1p2 {

                --option-list-inner-border-color: var(--x-default-color-border);

                --option-list-background-color: white

            }



            .ezrb1p3 {

                --option-list-inner-border-color: var(--x-default-color-border);

                --option-list-background-color: var(--x-default-color-background)

            }



            .ezrb1p5 {

                --option-list-inner-border-color: var(--x-default-color-accent)

            }



            .ezrb1p6 {

                --option-list-inner-border-color: var(--x-default-color-border)

            }



            .g9gqqf1 {

                font-family: var(--x-typography-primary-fonts);

                font-weight: var(--x-typography-primary-weight-base);

                letter-spacing: var(--x-global-typography-kerning);

                line-height: var(--x-global-typography-line-size-default);

                text-transform: var(--x-global-typography-letter-case);

                touch-action: manipulation

            }



            .g9gqqfd {

                color: var(--x-default-color-text)

            }

</style>

<style lang="en" type="text/css" id="dark-mode-custom-style"></style>

<style lang="en" type="text/css" id="dark-mode-native-style">

    html,

    body {

        color: black;

        background-color: white;

    }




.main-menu ol,.main-menu ul{padding: 0 !important;}

  
ol, ul {
    padding-left: 2rem;
}


    html cite,

    html cite a:link,

    html cite a:visited {

        color: black;

    }



    /* inline styles */

</style>



<head>

    <title>Checkout - Tale of Roses</title>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, height=device-height, user-scalable=0">

    <meta name="referrer" content="origin">

    <style type="text/css" id="operaUserStyle" class="dark-mode-native-dark-original"></style>

    <style type="text/css" class="dark-mode-native-dark-cloned"></style>



    <style lang="en" type="text/css" class="dark-mode-native-dark-cloned">

        ._17k99eh0 {

            align-items: center;

            display: flex;

            position: absolute

        }



        ._17k99eh1 {

            z-index: 3

        }



        ._17k99eh2 {

            background-color: var(--x-default-color-border);

            -webkit-mask: linear-gradient(270deg, #fff 3px, white 0);

            mask: linear-gradient(270deg, #fff 3px, white 0);

            transform: translateX(calc(-100% + 4px));

            z-index: 1

        }



        ._17k99eh2+._17k99eh2 {

            transform: translateX(calc(-200% + 8px));

            z-index: 0

        }



        [dir=rtl] ._17k99eh2 {

            -webkit-mask: linear-gradient(90deg, #fff 3px, white 0);

            mask: linear-gradient(90deg, #fff 3px, white 0);

            transform: translateX(calc(100% - 4px))

        }



        [dir=rtl] ._17k99eh2+._17k99eh2 {

            transform: translateX(calc(200% - 8px));

            z-index: 0

        }



        .qubnp {

            z-index: 200

        }



        .m9pRo {

            align-items: center;

            display: flex;

            padding: var(--x-option-list-block-padding) var(--x-option-list-inline-padding)

        }



        .NRvtp {

            border-top: 0;

            min-height: 5.7rem

        }



        .iuEQ3 {

            border-top: 1px var(--x-default-color-border) var(--option-list-border-style);

            min-height: 7.4rem

        }

    </style>



    <style lang="en" type="text/css" class="dark-mode-native-dark-cloned">

        ._Zhco {

            align-items: center;

            border-radius: var(--x-express-checkout-button-border-radius, var(--x-primary-button-border-radius, var(--x-global-border-radius, var(--x-border-radius-base))));

            cursor: pointer;

            display: flex;

            justify-content: center;

            outline: 1px solid black;

            overflow: hidden;

            -webkit-transform: translateZ(0)

        }

    </style>



    <style lang="en" type="text/css" class="dark-mode-native-dark-cloned">

        .EbuOU button {

            border: 1px solid white !important;

            border-radius: var(--x-express-checkout-button-border-radius, var(--x-primary-button-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))) !important;

            max-height: inherit !important;

            max-width: inherit !important;

            min-height: inherit !important;

            min-width: inherit !important

        }

    </style>



    <style lang="en" type="text/css" class="dark-mode-native-dark-cloned">

        .wbodi {

            display: block;

            height: 1.0714285714285714em;

            width: 8.285714285714286em;

            fill: var(--x-default-color-text-subdued)

        }



        ._1tnwc9f1 {

            border-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))

        }



        ._1tnwc9fi {

            color: var(--x-default-color-text-subdued);

            font-family: var(--x-typography-secondary-fonts);

            font-weight: var(--x-typography-secondary-weight-base);

            text-transform: uppercase

        }



        ._1tnwc9fk {

            margin: calc(var(--x-spacing-small-100) * -1)

        }



        ._1tnwc9fm {

            list-style: none

        }



        ._1tnwc9fq {

            background-color: var(--x-default-color-background-subdued)

        }



        [dir=ltr] ._1tnwc9fs {

            border-bottom-left-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))

        }



        [dir=ltr] ._1tnwc9fs,

        [dir=rtl] ._1tnwc9fs {

            border-bottom-right-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))

        }



        [dir=rtl] ._1tnwc9fs {

            border-bottom-left-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))

        }



        ._1tnwc9fs {

            border-end-end-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)));

            border-end-start-radius: var(--x-control-border-radius, var(--x-global-border-radius, var(--x-border-radius-base)))

        }

    </style>



    <style lang="en" type="text/css" class="dark-mode-native-dark-cloned">

        .hwZCn {

            margin-bottom: -1px

        }



        .gHtxJ,

        .hwZCn {

            line-height: 0

        }

    </style>



    <meta http-equiv="origin-trial" id="origin-trial"

        content="Ayudt5SzRWp86yExqv4T3+PiWzcX+WBtprm+ux6vfIGn5Dg3JSrZL2Y5UkppRzYnVyYzu8hvj+Q4pdGSWsLVYgMAAABgeyJvcmlnaW4iOiJodHRwczovL3BheS5nb29nbGUuY29tOjQ0MyIsImZlYXR1cmUiOiJUcGNkIiwiZXhwaXJ5IjoxNzM1MzQzOTk5LCJpc1RoaXJkUGFydHkiOnRydWV9">

    <style type="text/css" class="dark-mode-native-dark-original">

        .gpay-button {

            background-origin: content-box;

            background-position: center center;

            background-repeat: no-repeat;

            background-size: contain;

            border: 0px;

            border-radius: 4px;

            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 1px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;

            cursor: pointer;

            height: 40px;

            min-height: 40px;

            padding: 12px 24px 10px;

            width: 240px;

        }



        .gpay-button.black {

            background-color: #000;

            box-shadow: none;

        }



        .gpay-button.white {

            background-color: #fff;

        }



        .gpay-button.short,

        .gpay-button.plain {

            min-width: 90px;

            width: 160px;

        }



        .gpay-button.black.short,

        .gpay-button.black.plain {

            background-image: url(https://www.gstatic.com/instantbuy/svg/dark_gpay.svg);

        }



        .gpay-button.black.short.new_style,

        .gpay-button.black.plain.new_style {

            background-image: url(https://www.gstatic.com/instantbuy/svg/refreshedgraphicaldesign/dark_gpay.svg);

            min-width: 160px;

            background-size: contain;

        }



        .gpay-button.white.short,

        .gpay-button.white.plain {

            background-image: url(https://www.gstatic.com/instantbuy/svg/light_gpay.svg);

        }



        .gpay-button.black.active {

            background-color: #5f6368;

        }



        .gpay-button.black.hover {

            background-color: #3c4043;

        }



        .gpay-button.white.active {

            background-color: #fff;

        }



        .gpay-button.white.focus {

            box-shadow: #e8e8e8 0 1px 1px 0, #e8e8e8 0 1px 3px;

        }



        .gpay-button.white.hover {

            background-color: #f8f8f8;

        }



        .gpay-button-fill,

        .gpay-button-fill>.gpay-button.white,

        .gpay-button-fill>.gpay-button.black {

            width: 100%;

            height: inherit;

        }



        .gpay-button-fill-new-style,

        .gpay-button-fill-new-style>.gpay-button.black {

            width: 100%;

            height: inherit;

            background-size: contain;

        }



        .gpay-button-fill>.gpay-button.white,

        .gpay-button-fill>.gpay-button.black {

            padding: 12px 15% 10px;

        }



        .gpay-button.donate,

        .gpay-button.book,

        .gpay-button.checkout,

        .gpay-button.subscribe,

        .gpay-button.pay,

        .gpay-button.order {

            padding: 9px 24px;

        }



        .gpay-button-fill>.gpay-button.donate,

        .gpay-button-fill>.gpay-button.book,

        .gpay-button-fill>.gpay-button.checkout,

        .gpay-button-fill>.gpay-button.order,

        .gpay-button-fill>.gpay-button.pay,

        .gpay-button-fill>.gpay-button.subscribe {

            padding: 9px 15%;

        }



        .gpay-button-fill-new-style>.gpay-button.donate,

        .gpay-button-fill-new-style>.gpay-button.book,

        .gpay-button-fill-new-style>.gpay-button.checkout,

        .gpay-button-fill-new-style>.gpay-button.order,

        .gpay-button-fill-new-style>.gpay-button.pay,

        .gpay-button-fill-new-style>.gpay-button.subscribe {

            padding: 12px 15%;

            background-size: contain;

        }

    </style>

    <style type="text/css" class="dark-mode-native-dark-cloned">

        .gpay-button {

            background-origin: content-box;

            background-position: center center;

            background-repeat: no-repeat;

            background-size: contain;

            border: 0px;

            border-radius: 4px;

            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 1px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;

            cursor: pointer;

            height: 40px;

            min-height: 40px;

            padding: 12px 24px 10px;

            width: 240px;

        }



        .gpay-button.black {

            background-color: #000;

            box-shadow: none;

        }



        .gpay-button.white {

            background-color: #fff;

        }



        .gpay-button.short,

        .gpay-button.plain {

            min-width: 90px;

            width: 160px;

        }



        .gpay-button.black.short,

        .gpay-button.black.plain {

            background-image: url(https://www.gstatic.com/instantbuy/svg/dark_gpay.svg);

        }



        .gpay-button.black.short.new_style,

        .gpay-button.black.plain.new_style {

            background-image: url(https://www.gstatic.com/instantbuy/svg/refreshedgraphicaldesign/dark_gpay.svg);

            min-width: 160px;

            background-size: contain;

        }



        .gpay-button.white.short,

        .gpay-button.white.plain {

            background-image: url(https://www.gstatic.com/instantbuy/svg/light_gpay.svg);

        }



        .gpay-button.black.active {

            background-color: #5f6368;

        }



        .gpay-button.black.hover {

            background-color: #3c4043;

        }



        .gpay-button.white.active {

            background-color: #fff;

        }



        .gpay-button.white.focus {

            box-shadow: #e8e8e8 0 1px 1px 0, #e8e8e8 0 1px 3px;

        }



        .gpay-button.white.hover {

            background-color: #f8f8f8;

        }



        .gpay-button-fill,

        .gpay-button-fill>.gpay-button.white,

        .gpay-button-fill>.gpay-button.black {

            width: 100%;

            height: inherit;

        }



        .gpay-button-fill-new-style,

        .gpay-button-fill-new-style>.gpay-button.black {

            width: 100%;

            height: inherit;

            background-size: contain;

        }



        .gpay-button-fill>.gpay-button.white,

        .gpay-button-fill>.gpay-button.black {

            padding: 12px 15% 10px;

        }



        .gpay-button.donate,

        .gpay-button.book,

        .gpay-button.checkout,

        .gpay-button.subscribe,

        .gpay-button.pay,

        .gpay-button.order {

            padding: 9px 24px;

        }



        .gpay-button-fill>.gpay-button.donate,

        .gpay-button-fill>.gpay-button.book,

        .gpay-button-fill>.gpay-button.checkout,

        .gpay-button-fill>.gpay-button.order,

        .gpay-button-fill>.gpay-button.pay,

        .gpay-button-fill>.gpay-button.subscribe {

            padding: 9px 15%;

        }



        .gpay-button-fill-new-style>.gpay-button.donate,

        .gpay-button-fill-new-style>.gpay-button.book,

        .gpay-button-fill-new-style>.gpay-button.checkout,

        .gpay-button-fill-new-style>.gpay-button.order,

        .gpay-button-fill-new-style>.gpay-button.pay,

        .gpay-button-fill-new-style>.gpay-button.subscribe {

            padding: 12px 15%;

            background-size: contain;

        }

    </style>

    <style type="text/css" class="dark-mode-native-dark-original">

        .gpay-button.new_style {

            background-size: auto;

            border-radius: 100vh;

            padding: 11px 24px;

            box-sizing: border-box;

            border: 1px solid #747775;

            min-height: 48px;

            font-size: 20px;

            width: auto;

        }

    </style>

    <style type="text/css" class="dark-mode-native-dark-cloned">

        .gpay-button.new_style {

            background-size: auto;

            border-radius: 100vh;

            padding: 11px 24px;

            box-sizing: border-box;

            border: 1px solid #747775;

            min-height: 48px;

            font-size: 20px;

            width: auto;

        }

    </style>

    <style type="text/css" class="dark-mode-native-dark-original">

        .gpay-card-info-container.black,

        .gpay-button.black {

            outline: 1px solid #757575;

            box-shadow: none;

        }



        .gpay-card-info-container.black.focus,

        .gpay-button.black.focus {

            outline: 1px auto Highlight;

            outline: 1px auto -webkit-focus-ring-color;

            box-shadow: none;

        }



        .gpay-card-info-container.white,

        .gpay-button.white {

            outline: 1px solid #3C4043;

            box-shadow: none;

        }



        .gpay-card-info-container.white.focus,

        .gpay-button.white.focus {

            outline: 1px auto Highlight;

            outline: 1px auto -webkit-focus-ring-color;

            box-shadow: none;

        }

    </style>

    <style type="text/css" class="dark-mode-native-dark-cloned">

        .gpay-card-info-container.black,

        .gpay-button.black {

            outline: 1px solid #757575;

            box-shadow: none;

        }



        .gpay-card-info-container.black.focus,

        .gpay-button.black.focus {

            outline: 1px auto Highlight;

            outline: 1px auto -webkit-focus-ring-color;

            box-shadow: none;

        }



        .gpay-card-info-container.white,

        .gpay-button.white {

            outline: 1px solid #3C4043;

            box-shadow: none;

        }



        .gpay-card-info-container.white.focus,

        .gpay-button.white.focus {

            outline: 1px auto Highlight;

            outline: 1px auto -webkit-focus-ring-color;

            box-shadow: none;

        }

    </style>

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

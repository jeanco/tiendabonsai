/* A polyfill for browsers that don't support ligatures. */
/* The script tag referring to this file must be placed before the ending body tag. */

/* To provide support for elements dynamically added, this script adds
   method 'icomoonLiga' to the window object. You can pass element references to this method.
*/
(function () {
    'use strict';
    function supportsProperty(p) {
        var prefixes = ['Webkit', 'Moz', 'O', 'ms'],
            i,
            div = document.createElement('div'),
            ret = p in div.style;
        if (!ret) {
            p = p.charAt(0).toUpperCase() + p.substr(1);
            for (i = 0; i < prefixes.length; i += 1) {
                ret = prefixes[i] + p in div.style;
                if (ret) {
                    break;
                }
            }
        }
        return ret;
    }
    var icons;
    if (!supportsProperty('fontFeatureSettings')) {
        icons = {
            'truck': '&#xe92f;',
            'store': '&#xe92d;',
            'remove_circle': '&#xe92a;',
            'check_circle': '&#xe929;',
            'whatsapp_o': '&#xe93b;',
            'remove': '&#xe92e;',
            'caret_down': '&#xe92c;',
            'youtube': '&#xe925;',
            'vimeo': '&#xe927;',
            'soundcloud': '&#xe928;',
            'linkedin': '&#xe926;',
            'whatsapp': '&#xe92b;',
            'video_call': '&#xe900;',
            'search': '&#xe901;',
            'location': '&#xe902;',
            'open_book': '&#xe903;',
            'newsletter': '&#xe904;',
            'menu': '&#xe905;',
            'instagram': '&#xe906;',
            'google_plus': '&#xe907;',
            'email': '&#xe908;',
            'commerce': '&#xe909;',
            'check': '&#xe90a;',
            'close': '&#xe90b;',
            'refrigerator': '&#xe90c;',
            'washing_machine': '&#xe90d;',
            'vacuum_cleaner': '&#xe90e;',
            'oven': '&#xe90f;',
            'mixer': '&#xe910;',
            'hand_shake': '&#xe911;',
            'meeting': '&#xe913;',
            'facebook': '&#xe914;',
            'twitter': '&#xe915;',
            'tv': '&#xe916;',
            'performance': '&#xe917;',
            'people': '&#xe918;',
            'arrow_rigth_o': '&#xe919;',
            'add': '&#xe91a;',
            'sum': '&#xe91a;',
            'youtube_play': '&#xe91b;',
            'minus': '&#xe91c;',
            'quality': '&#xe91d;',
            'controls': '&#xe91e;',
            'badge': '&#xe91f;',
            'arrow_left_o': '&#xe920;',
            'arrow_up': '&#xe921;',
            'arrow_right': '&#xe922;',
            'arrow_down': '&#xe923;',
            'arrow_left': '&#xe924;',
          '0': 0
        };
        delete icons['0'];
        window.icomoonLiga = function (els) {
            var classes,
                el,
                i,
                innerHTML,
                key;
            els = els || document.getElementsByTagName('*');
            if (!els.length) {
                els = [els];
            }
            for (i = 0; ; i += 1) {
                el = els[i];
                if (!el) {
                    break;
                }
                classes = el.className;
                if (/u-icon/.test(classes)) {
                    innerHTML = el.innerHTML;
                    if (innerHTML && innerHTML.length > 1) {
                        for (key in icons) {
                            if (icons.hasOwnProperty(key)) {
                                innerHTML = innerHTML.replace(new RegExp(key, 'g'), icons[key]);
                            }
                        }
                        el.innerHTML = innerHTML;
                    }
                }
            }
        };
        window.icomoonLiga();
    }
}());

var Lang = require('lang.js');

// get the data source
import translations from './vue-translations.js';

// this is why we used the --no-lib in our commandline
var lang = new Lang();
lang.setLocale('en');  // @TODO when we set up language switcher
// document.documentElement.lang
// 'en' is the default, but if you need this for other languages
// there are fallbacks in Lang.js you can use, as well


// if (lang.getLocale() === 'undefined'){
//     lang.setLocale('en');
// }

// Lang.js works off a top-level key called "messages"; this line 
// just hydrates the object with 'vue-translations.js'
lang.setMessages(translations);

// This is our normal Vue filter. '...args' allows us to use any 
// number of parameters in our strings
Vue.filter('trans', (...args) => {
    return lang.get(...args);
});
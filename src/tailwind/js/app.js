/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');

import swal from 'sweetalert';

window.Vue = require('vue');

window.Event = new Vue();

Vue.component('user-menu', require('./components/UserMenu'));
Vue.component('login-menu', require('./components/LoginMenu'));
Vue.component('edit-input', require('./components/EditInput'));
Vue.component('wysiwyg', require('./components/wysiwyg/Wysiwyg'));
Vue.component('wysiwyg-toolbar', require('./components/wysiwyg/WysiwygToolbar'));
Vue.component('wysiwyg-editor', require('./components/wysiwyg/WysiwygEditor'));
Vue.component('wysiwyg-code', require('./components/wysiwyg/WysiwygCode'));

const app = new Vue({
    el: '#app',
    data() {
        return {
            //
        }
    },
});
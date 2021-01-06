/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

/**
 * Old design and admin scripts
 */
require('./bootstrap');
require('./custom/product.js');
require('./custom/admin/create-edit.js');
require('./custom/admin/admin-panel.js');
require('./custom/admin/category.js');
require('./custom/admin/users.js');
require('./custom/cart.js');

/**
 * Frontend Scripts
 */
require('./frontend/fixed-navbar.js');
require('./frontend/slideshow.js');
require('./frontend/slick.js');
require('./frontend/slick-custom.js');
require('./frontend/product-add-to-cart.js');
require('./frontend/image-zoom.js');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

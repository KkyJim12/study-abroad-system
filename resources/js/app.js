/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import VueRouter from "vue-router";

Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component("index-page", require("./components/Pages/Index.vue").default);
Vue.component(
    "create-college",
    require("./components/Components/CreateCollege.vue").default
);
Vue.component(
    "vue-dz",
    require("./components/Components/Dropzone.vue").default
);

const routes = [
    {
        path: "/",
        component: require("./components/Pages/Index.vue").default
    },
    {
        path: "/profile/:id",
        component: require("./components/Pages/Profile.vue").default
    },
    {
        path: "/admin",
        component: require("./components/Layouts/Admin.vue").default,
        children: [
            {
                path: "dashboard",
                component: require("./components/Pages/Dashboard.vue").default
            },
            {
                path: "student",
                component: require("./components/Pages/Student.vue").default
            },
            {
                path: "college",
                component: require("./components/Pages/College.vue").default
            },
            {
                path: "course",
                component: require("./components/Pages/Course.vue").default
            }
        ]
    }
];

const router = new VueRouter({
    routes // short for `routes: routes`
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    router
});

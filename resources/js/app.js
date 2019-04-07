require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueAxios,axios);

import Vuetify from 'vuetify';

Vue.use(Vuetify);

import 'vuetify/dist/vuetify.min.css';

import App from './components/App';

import Home from './components/HomeComponent';
import FindMovies from './components/FindMovies';
import FindUpcoming from './components/FindUpcoming';
import Details from './components/Details';
import TopRatedMovies from './components/TopRatedMovies';

const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'findmovies',
        path: '/findmovies',
        component: FindMovies
    },
    {
        name: 'findupcoming',
        path: '/findupcoming',
        component: FindUpcoming
    },
    {
        name: 'details',
        path: '/details',
        component: Details,
        props: true
    },
    {
        name: 'toprated',
        path: '/toprated',
        component: TopRatedMovies
    }
];

const router = new VueRouter({ mode: 'history', routes: routes});

const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');

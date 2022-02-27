import Vue from 'vue';
import VueRouter from 'vue-router';
import HomeComponent from "./components/HomeComponent";
import MoviesCreate from "./views/MoviesCreate";
import MoviesShow from "./views/MoviesShow";
import MoviesEdit from "./views/MoviesEdit";
import MoviesIndex from "./views/MoviesIndex";
import Logout from "./Actions/Logout";


Vue.use(VueRouter);

//  Mode turns off backwards compatability
export default new VueRouter({
    routes: [
        {
            path: '/', component: HomeComponent,
            meta: {title: 'Movie Listings'}
        },

        {
            path: '/movies', component: MoviesIndex,
            meta: {title: 'Movies'}
        },

        {
            path: '/movies/create', component: MoviesCreate,
            meta: {title: 'Add New Movie'}
        },

        {
            path: '/movies/:id', component: MoviesShow,
            meta: {title: 'Details for Movie'}
        },

        {
            path: '/movies/:id/edit', component: MoviesEdit,
            meta: {title: 'Edit Movie'}
        },

        {path: '/logout', component: Logout},
    ],
    mode: 'history'
});

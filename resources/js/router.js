//import di vue e vuerouter
import Vue from 'vue';
import VueRouter from 'vue-router';

//inizializzo vue router
Vue.use(VueRouter);

//import dei componenti creati dentro pages per utilizzarli
import Home from './pages/Home';
import Blog from './pages/Blog';
import About from './pages/About';
import SinglePost from './pages/SinglePost';

const router = new VueRouter({

    mode: 'history',
    routes: [
        //dentro definisco le rotte che voglio utilizzare all'interno della mia pagina
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/blog',
            name: 'blog',
            component: Blog
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            //rotta parametrica, quindi aggiungo il parametro  path: '/blog/:id',
            path: '/blog/:slug',
            name: 'single-post',
            component: SinglePost
        }
    ]
});

//aggiungo questo return in modo da poter richiamare all'esterno questo router
export default router;
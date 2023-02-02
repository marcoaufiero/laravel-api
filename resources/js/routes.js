import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import AboutUs from './views/pages/AboutUs.vue'
import PostsIndex from './views/pages/posts/PostsIndex.vue'


const router = new VueRouter({

    mode: 'history',
    routes: [
        {
            path: '/about-us',
            name: 'about-us',
            component: AboutUs
        },
        {
            path: '/posts',
            name: 'posts',
            component: PostsIndex
        }
    ]

});

export default router;
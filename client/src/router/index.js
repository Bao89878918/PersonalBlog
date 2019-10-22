import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

export default new Router({
    mode: "history",
    routes: [
        {
            path: '/',
            component: resolve => require(['../components/index/common/Home.vue'], resolve),
            children:[
                {
                    path: '/',
                    component: resolve => require(['../components/index/page/index.vue'], resolve),
                    meta: {
                        title: '首页 - EchoBao个人博客',
                        keywords: '个人博客,EchoBao个人博客,隔壁你黄叔,EchoBao',
                    }
                },
                {
                    path: '/article/:id',
                    name: 'article',
                    component: resolve => require(['../components/index/page/article.vue'], resolve),
                    meta: {
                        title:'文章详细页面',
                        Author:'',
                        keywords:'',
                    }
                },
                {
                    path: '/list/:id',
                    name: 'list',
                    component: resolve => require(['../components/index/page/list.vue'], resolve),
                    meta: {
                        title: '分类页面',
                        Author: '',
                        keywords: '',
                    }
                },
            ],
        },
        {
            path: '/admin',
            component: resolve => require(['../components/admin/common/Home.vue'], resolve),
            children: [
                {
                    path: '/admin',
                    component: resolve => require(['../components/admin/page/index.vue'], resolve),
                    meta: {
                        requireAuth: true,
                        title: '后台管理首页 - EchoBao个人博客',
                        keywords: '个人博客,EchoBao个人博客,隔壁你黄叔,EchoBao',
                    }
                },
                {
                    path: '/admin/article',
                    component: resolve => require(['../components/admin/page/article.vue'], resolve),
                    meta: {
                        requireAuth: true,
                        title: '后台管理首页 - EchoBao个人博客',
                        keywords: '个人博客,EchoBao个人博客,隔壁你黄叔,EchoBao',
                    }
                },
                {
                    path: '/admin/article/add',
                    component: resolve => require(['../components/admin/page/article_add.vue'], resolve),
                    meta: {
                        requireAuth: true,
                        title: '后台管理首页 - EchoBao个人博客',
                        keywords: '个人博客,EchoBao个人博客,隔壁你黄叔,EchoBao',
                    }
                },
            ],
        },
        {
            path: '/login',
            component: resolve => require(['../components/admin/page/login.vue'], resolve),
        },
        {
            path: '/404',
            component: resolve => require(['../components/index/page/404.vue'], resolve)
        }, 
        {
            path: '*',
            redirect: '/404'
        }
    ]
})
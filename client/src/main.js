import Vue from 'vue';
import App from './App.vue';
import router from "./router";
import ElementUI from 'element-ui';
// import { Message } from 'element-ui';

//背景图
import VueParticles from 'vue-particles';
Vue.use(VueParticles);

//异步请求库axios
import axios from 'axios';
Vue.prototype.$axios = axios;

//cookie管理
import VueCookie from 'vue-cookie';
Vue.use(VueCookie);

import 'element-ui/lib/theme-chalk/index.css'; // 默认主题


Vue.config.productionTip = false;

Vue.use(ElementUI, {
    size: 'small'
});


router.beforeEach((to, from, next) => {

    if (to.meta.requireAuth) {
        if (VueCookie.get('token')) {
            next();
        }else{
            next({
                path: '/login',
                query: {redirect: to.fullPath} // 将跳转的路由path作为参数，登录成功后跳转到该路由
            })
        }
    }

    if (to.meta.content) {
        let head = document.getElementsByTagName('head');
        let meta = document.createElement('meta');
        meta.content = to.meta.content;
        head[0].appendChild(meta)
    }

    if (to.meta.title) {
        document.title = to.meta.title
    }
    
    next();
});

new Vue({
    router,
    render: h => h(App),
}).$mount('#app')

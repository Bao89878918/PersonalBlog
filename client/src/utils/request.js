import axios from 'axios';

import VueCookie from 'vue-cookie';

//axios配置
const service = axios.create({
    // process.env.NODE_ENV === 'development' 来判断是否开发环境
    baseURL: '',
    timeout: 20000
});

//请求服务器
service.interceptors.request.use(config => {
    console.log(config)
    return config;
}, error => {
    console.log(error);
    return Promise.reject();
})

//客户端接收数据
service.interceptors.response.use(response => {
    if (response.status === 200) {
        if (response.data.code == 401) {
            VueCookie.remove('token');
            window.location.reload();
        }
        return response.data;
    } else {
        Promise.reject();
    }
}, error => {
    if (error && error.response) {
        console.log(error);
    }
    return Promise.reject();
})

export default service;
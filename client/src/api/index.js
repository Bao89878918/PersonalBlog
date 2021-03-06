import request from '../utils/request';

const userAction = {
    login : (param) => {
        return request({
            url:'/api/user/login',
            method:'post',
            params:param
        })
    }
};

const articleAction = {
    add: (param) => {
        return request({
            url: '/api/article/add',
            method: 'post',
            params: param
        })
    }
};

const utils = {
    getMusicList : (param) => {
        return request({
            url: '/musicApi',
            method:'get',
            params:param
        })
    }
}

export {
    userAction, utils, articleAction
}
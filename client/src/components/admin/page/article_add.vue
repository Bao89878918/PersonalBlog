<template>
    <div class="continar clearfix">
        <el-form ref="form" :model="article" label-width="100px">
            <el-form-item label="标题：">
                <el-col :span="5">
                    <el-input v-model="article.title"></el-input>
                </el-col>
            </el-form-item>
             <el-form-item label="栏目：">
                <el-col :span="7">
                    <el-select v-model="article.category_id" placeholder="请选择">
                        <el-option v-for="item in menus" :key="item.value" :label="item.label" :value="item.value">
                        </el-option>
                    </el-select>
                </el-col>
            </el-form-item>
            <el-form-item label="作者：">
                <el-col :span="3">
                    <el-input v-model="article.author"></el-input>
                </el-col>
            </el-form-item>
            <el-form-item label="关键字：">
                <el-col :span="5">
                    <el-input v-model="article.keywords"></el-input>
                </el-col>
            </el-form-item>
            <el-form-item label="封面：" style="margin-top:18px;">
                <el-upload class="avatar-uploader" action="https://jsonplaceholder.typicode.com/posts/" :show-file-list="false" :on-success="handleAvatarSuccess" :before-upload="beforeAvatarUpload">
                    <img v-if="article.cover" :src="article.cover" class="avatar">
                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                </el-upload>
            </el-form-item>
            <el-form-item label="摘要：">
                <el-col :span="10">
                    <el-input class="comment-textare" type="textarea" resize="none" :rows="7" placeholder="请输入内容" v-model="article.description"></el-input>
                </el-col>
            </el-form-item>
            <el-row type="flex" justify="center">
                <el-col :span="22">
                    <mavon-editor :subfield="false" :ishljs="true" v-model="article.content" style="min-height:500px;"></mavon-editor>
                </el-col>
            </el-row>
            <el-button type="primary" @click="Submission" style="margin-top:20px;float:right">发布</el-button>
        </el-form>
    </div>
</template>
<script>
    import {mavonEditor} from 'mavon-editor';
    import 'mavon-editor/dist/css/index.css';
    import {articleAction} from '../../../api/index.js';

    export default {
        components:{
            mavonEditor
        },
        data() {
            return {
                article: {title:'',category_id:'',author:'',keywords:'',content:'',cover:'ssssss',description:''},
                menus:[
                    {value: '1',label: '黄金糕'},
                    {value: '2',label: '双皮奶'},
                    {value: '3',label: '蚵仔煎'},
                    {value: '4',label: '龙须面'},
                    {value: '5',label: '北京烤鸭'}
                ],
            }
        },
        methods:{
            handleAvatarSuccess(res, file) {
                this.imageUrl = URL.createObjectURL(file.raw);
            },
            beforeAvatarUpload(file) {
                const isJPG = file.type === 'image/jpeg';
                const isLt2M = file.size / 1024 / 1024 < 2;

                if (!isJPG) {
                this.$message.error('上传头像图片只能是 JPG 格式!');
                }
                if (!isLt2M) {
                this.$message.error('上传头像图片大小不能超过 2MB!');
                }
                return isJPG && isLt2M;
            },
            Submission(){
                articleAction.add(this.article).then(res => {

                })
            }
        }
    }
</script>
<style>
    .continar{
        padding:30px;
    }
    .avatar-uploader .el-upload {
        width: 225px;
        height: 100px;
        border: 1px dashed #d9d9d9;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    .avatar-uploader .el-upload:hover {
        border-color: #409EFF;
    }
    .avatar-uploader-icon {
        font-size: 28px;
        color: #8c939d;
        width: 225px;
        height: 100px;
        line-height: 90px;
        text-align: center;
    }
    .avatar {
        width: 225px;
        height: 100px;
        display: block;
    }
</style>
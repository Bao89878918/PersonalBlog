<template>
    <div class="leftSide">
        <el-menu background-color="#545c64" text-color="#fff" default-active="1" active-text-color="#ffd04b" @select="handleSelect">
            <el-menu-item index="/admin">
                <i class="el-icon-location"></i>
                <span>首页</span>
            </el-menu-item>
            <el-submenu index="2">
                <template slot="title">
                    <i class="el-icon-document"></i>
                    <span slot="title">文章管理</span>
                </template>
                <el-menu-item index="/admin/article"><i class="el-icon-arrow-right"></i>文章管理</el-menu-item>
                <el-menu-item index="/admin/article/add"><i class="el-icon-arrow-right"></i>文章增加</el-menu-item>
            </el-submenu>
            <el-menu-item index="3">
                <i class="el-icon-picture"></i>轮播管理
            </el-menu-item>
            <el-menu-item index="4">
                <i class="el-icon-message"></i>
                <span slot="title">用户留言</span>
            </el-menu-item>
            <el-menu-item index="5">
                <i class="el-icon-setting"></i>
                <span slot="title">网站管理</span>
            </el-menu-item>
        </el-menu>
    </div>
</template>
<style>
    .el-aside{
        width:250px;
        background-color:#545c64;
    }
    .el-menu{
        border:none;
    }
</style>
<script>
    export default {
        methods: {
            handleSelect(key, keyPath) {
                if(key != this.$route.path){
                    this.$router.push({path:key});
                }
            }
        }
    }
</script>
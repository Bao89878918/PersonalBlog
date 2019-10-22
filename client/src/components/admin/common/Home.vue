<template>
    <el-container class="wrapper">
        <el-header>
            <v-head></v-head>
        </el-header>

        <el-container>
            <el-aside>
                <v-sidebar></v-sidebar>
            </el-aside>
            <el-container class="right-main">
                <el-main>
                    <router-view></router-view>
                </el-main>
                <el-footer><v-footer></v-footer></el-footer>
            </el-container>
        </el-container>
        
    </el-container>
</template>
<script>
    import vHead from './Header.vue';
    import vFooter from './Footer.vue';
    import vSidebar from './LeftSide.vue';
    export default {
        components:{
            vHead, vFooter,vSidebar
        },
        
    }
</script>
<style>
    .continar{
        padding:20px 0;
        width:auto;
        background-color:#fff;
    }
    .right-main{
        height: 100%;
        background-color:#eee;
        overflow-x: hidden;
        overflow-y: scroll;
    }
</style>
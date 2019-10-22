<template>
    <div class="footer">
        <p>注：当前网站由EchoBao个人自主开发，版权所有！</p>
        <p>©2019 - {{ year }}</p>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                year:2019,
            }
        },
        created() {
            let footerDate = new Date();
            this.year = footerDate.getFullYear();
        },
    }
</script>
<style>
    .el-footer{
        padding:0;
    }
    .footer{
        padding:10px 0;
        margin-top:5px;
        width:100%;
        background:#eee;
    }
    .footer p{
        font-size:14px;
        color:#666;
        text-align:center;
    }
</style>
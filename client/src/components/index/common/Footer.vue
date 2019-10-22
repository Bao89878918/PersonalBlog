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
    .footer{
        margin-top:30px;
        padding:100px 0;
        height:100px;
        width:100%;
        background:#343a40;
    }
    .footer p{
        font-size:14px;
        color:#fff;
        text-align:center;
    }
</style>
<template>
    <div class="continar">
        <h1>404，这篇文章我找不到了!</h1>
        <router-link href="/" to="/" class="back">回首页</router-link>
    </div>
</template>
<style scoped>
    .continar{
        position: fixed;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #1c1c1c;
    }
    .continar h1{
        color: #fff;
    }
    .back{
        display: inline-block;
        width: 100px;
        text-align: center;
        color: #fff;
    }
</style>
<script>
    export default {
        
    }
</script>
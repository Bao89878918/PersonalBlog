<template>
    <div class="continar">
        <section class="card-wrap">
            <el-row class="card-title">数据统计</el-row>
            <el-row class="card-content" :gutter="20">
                <el-col class="message-nums-col" :span="6">
                    <div class="message-wrap">
                        <span>文章数</span>
                        <p class="message-nums">10</p>
                    </div>
                </el-col>
                <el-col class="message-nums-col" :span="6">
                    
                    <div class="message-wrap">
                        <span>总留言数</span>
                        <p class="message-nums">10</p>
                    </div>
                </el-col>
                <el-col class="message-nums-col" :span="6">
                    <div class="message-wrap">
                        <span>总访问量</span>
                        <p class="message-nums">100</p>
                    </div>
                </el-col>
                <el-col class="message-nums-col" :span="6">
                    <div class="message-wrap">
                        <span>总留言数</span>
                        <p class="message-nums">10</p>
                    </div>
                </el-col>
            </el-row>
        </section>

        <section class="card-wrap">
            <el-row class="card-title">服务器信息</el-row>
            <el-row class="card-content">
                
            </el-row>
        </section>
    </div>
</template>
<style>
    .card-title{
        padding:5px 15px;
        color:#333;
        font-weight:700;
        border-bottom:1px solid #ececec;
    }
    .card-content{
        padding:10px;
    }
    .message-nums-col{
        text-align:center;
        color:#009688;
    }
    .message-wrap{
        padding:10px;
        background: #f8f8f8;
    }
    .message-wrap span{
        font-size:14px;
        color:#666;
    }
    .message-nums{
        margin:10px 0;
        font-size:30px;
    }
    .server-info{
        width:100%;
        border-color:#e6e6e6;
    }
    .server-info th{
        width:150px;
    }
    .server-info td,.server-info th{
        padding:10px 15px;
        text-align:left;
    }
</style>
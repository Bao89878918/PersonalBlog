<template>
    <div class="continar clearfix">
        <div class="tagsDescibe">
            <h1>心情小镇</h1>
            <p>这是我第一次踏上这个小镇，奇怪的房屋令我感到新奇。童话般的建筑，却空无一人。……过去了很多年，我与这小镇融为一体。我生气时，它刮风。我伤心时，它下雨。我开心时，它便晴空万里。我喜欢上了这座心情小镇，却又不愿独一人寂寞的待着。</p>
        </div>
        <div class="continar-left">
            <div class="articleList">
                <el-row class="article-item" v-for="key in 9">
                    <el-col :span="8" class="article-cover">
                        <img src="../../../static/images/title.png" alt="">
                    </el-col>
                    <el-col :span="16" class="article-descibe">
                        <h2 class="title" @click="toArticle(key)">又到招聘季，说说网络招聘的那些坑！！！</h2>
                            
                        <div class="synopsis">
                            作为程序员的你，求职是否被坑过？
                            昨天看到了一则新闻"李文星父母向XXX招聘网站索赔230余万元 法院已立案"。这件事本来已经过去一年之前了，为什么还要拿来说呢？3、4月正值招聘季，好多人找工作心切，想找高薪。现在软件行业确实是一个很挣钱的行业。很多不法人员利用这一点在招聘网站上发布一些招聘信息，实则是传销，这里给大家做一些分析。我是IT从业者，所以可能从IT行业角度说的比较多！希望刚毕业或转行，总之求职心切的这部分人能正确区分各种求职道路上的大坑！
                            下面从模拟一个正常的骗局开讲，有过切身经历的人应该不少。
                        </div>

                        <div class="article-info">
                            <i class="article-btn-i el-icon-discount"><span class="article-btn-span">服务器架设</span></i>
                            <i class="article-btn-i el-icon-view"><span class="article-btn-span">2220</span></i>
                            <i class="article-btn-i el-icon-chat-line-round"><span class="article-btn-span">25条评论</span></i>
                            <i class="article-btn-i el-icon-time"><span class="article-btn-span">2019年10月6日</span></i>
                        </div>
                        <p class="article-all"><span @click="toArticle(key)">阅读全文&nbsp;<i class="el-icon-d-arrow-right"></i></span></p>
                    </el-col>
                </el-row>
                <p class="loading-more">
                    <el-pagination
                        background
                        layout="prev, pager, next"
                        :total="1000">
                    </el-pagination>
                </p>
            </div>
        </div>
    </div>
</template>

<style scoped>
    @import "../../../static/css/index.css";
    .continar{
        margin: 15px auto;
        width: 840px;
    }
    .tagsDescibe{
        padding: 20px 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
        width: 100%;
        background-color: rgb(128,138,135,.7)
    }
    .tagsDescibe h1{
        padding: 10px 0;
        color: #666;
        text-align: center;
    }
    .tagsDescibe p{
        text-indent: 2em;
        line-height: 27px;
        color: #fff;
    }
</style>
<template>
    <div>
        <div class="banner">
            <el-carousel trigger="hover" height="550px">
                <el-carousel-item>
                    <img src="https://www.mzyweb.cn/static/images/indexBanner/20181121/32575e7b10c6df9a8c3926a324361aa9.jpg" alt="你好工作室" />
                </el-carousel-item>
                <el-carousel-item>
                    <img src="https://www.mzyweb.cn/static/images/indexBanner/20181122/a0131b77c35bfa7e2b9659efd472e7e4.jpg" alt="书写青春" />
                </el-carousel-item>
                <el-carousel-item>
                    <img src="https://www.mzyweb.cn/static/images/indexBanner/20181126/b4f510217a438c245b04a8fd3c8c0cde.jpg" alt="代码世界" />
                </el-carousel-item>
                
            </el-carousel>
        </div>
        <div class="continar clearfix">
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
                    <p class="loading-more">加载更多...</p>
                </div>
            </div>
            <div class="continar-right">
                <div class="rightBox-common aboutMe">
                    <div class="rightBox-common-header">
                        <i class="el-icon-user-solid"></i>
                        <h2>关于我</h2>
                    </div>

                    <div class="rightBox-common-bottom">
                        <div class="title-pic">
                            <img style="border-radius:100%;" width="100" src="../../../static/images/title.png" alt="Bao's Blog">
                        </div>
                        <div class="i-description">
                            <p><span class="i-description-span">昵称：</span>隔离屋黄伯咯</p>
                            <p><span class="i-description-span">职业：</span>国家一级保护动物 - 程序猿</p>
                            <p><span class="i-description-span">栖息地：</span>广东省佛山市</p>
                            <p><span class="i-description-span">领养热线：</span>1145335066@qq.com</p>
                        </div>
                    </div>
                </div>
                
                <div class="rightBox-common">
                    <div class="rightBox-common-header">
                        <i class="el-icon-edit"></i>
                        <h2>最近更新</h2>
                    </div>

                    <div class="rightBox-common-bottom">
                        <ul class="R-articleList">
                            <li v-for="key in 7" @click="toArticle(key)">
                                <i class="articleList-num">{{key}}</i>这里是第一篇文章
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="rightBox-common">
                    <div class="rightBox-common-header">
                        <i class="el-icon-view"></i>
                        <h2>优质文章</h2>
                    </div>

                    <div class="rightBox-common-bottom">
                        <ul class="R-articleList">
                            <li v-for="key in 7" @click="toArticle(key)">
                                <i class="articleList-num">{{key}}</i>这里是第一篇文章这里是第一篇文章这里是第一篇文章这里是第一篇文章
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="rightBox-common">
                    <div class="rightBox-common-header">
                        <i class="el-icon-paperclip"></i>
                        <h2>友情链接</h2>
                    </div>

                    <div class="rightBox-common-bottom">
                        <p class="friend-descibe">对于一个网站刚上线，没人知道怎么办？登陆Baidu、Google等各大搜索引擎提交你的网站信息吗？友情链接比你到各大搜索引擎提交来的更快。友情链接是网站之间链接互换是互相推广的一种重要方式。这样可以加深网站之间资源共享、用户共享、互相推荐等，交换的是种友谊，合作的是种感情，这是一种和谐共同发展的网站营销方式。<router-link href="friend" to="friend">交换友链</router-link></p>
                        <ul class="friendlyLinks">
                            <li>
                                <i class="el-icon-connection friend-icon"></i>
                                <a href="http://www.harrisliu.club" target="_blank" title="LMY's Blog">LMY's Blog</a>
                            </li>
                            <li>
                                <i class="el-icon-connection friend-icon"></i>
                                <a href="http://www.520cfr.xyz" target="_blank" title="CFR's Blog">CFR's Blog</a>
                            </li>
                            <li>
                                <i class="el-icon-connection friend-icon"></i>
                                <a href="https://www.treesystem.cn" target="_blank" title="大术's Blog">大术's Blog</a>
                            </li>
                            <li>
                                <i class="el-icon-connection friend-icon"></i>
                                <a href="https://www.baidu.com" target="_blank" title="百度一下，你知道">百度</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="rightBox-common">
                    <div class="rightBox-common-header">
                        <i class="el-icon-odometer"></i>
                        <h2>站点统计</h2>
                    </div>

                    <div class="rightBox-common-bottom">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            toArticle(articleId){
                this.$router.push({name:"article",params:{id:articleId}});
            }
        }
    }
</script>

<style scoped>
    @import "../../../static/css/index.css";
</style>

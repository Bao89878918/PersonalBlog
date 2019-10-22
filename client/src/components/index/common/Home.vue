<template>
    <div class="wrapper">
        <el-backtop target=".wrapper" :bottom="200" :right="250">
            <img src="../../../static/images/go_top.png" alt="回到顶部">
        </el-backtop>
        <v-head></v-head>
        <div class="content">
            <router-view></router-view>
        </div>
        <v-footer></v-footer>
        <vue-particles
            color="#368"
            :particleOpacity="0.7"
            :particlesNumber="60"
            shapeType="circle"
            :particleSize="4"
            linesColor="#368"
            :linesWidth="1"
            :lineLinked="true"
            :lineOpacity="0.4"
            :linesDistance="150"
            :moveSpeed="2"
            :hoverEffect="true"
            hoverMode="grab"
            :clickEffect="true"
            clickMode="push"
            class="background"
        >
        </vue-particles>

        <div id="landlord">
            <div class="message" style="opacity:0"></div>
            <canvas id="live2d" width="280" height="250" class="live2d"></canvas>
            <div class="hide-button">
                <span class="live2d-btn el-icon-circle-close live2d-close-btn"></span>
                <span class="live2d-btn el-icon-headset music-play-btn" @click="play"></span>
                <span class="live2d-btn el-icon-info info-btn"></span>
            </div>
        </div>
        <div id="musicBox" style="">
            <div id="aplayer"></div>
        </div>
    </div>
</template>
<script>
    import vHead from './Header.vue';
    import vFooter from './Footer.vue';
    import 'aplayer/dist/APlayer.min.css';
    import APlayer from 'aplayer';
    import {utils} from '../../../api/index';

    export default {
        components:{
            vHead, vFooter
        },
        data() {
            return {
                player:'',
            }
        },
        mounted() {
            loadlive2d("live2d", "/live2d/tia/model.json");
            let x = document.createElement("SCRIPT");
            x.src = "/live2d/js/message.js";
            document.body.appendChild(x);
            utils.getMusicList({server:'netease',type:'playlist',id:2948165173}).then( res => {
                this.player = new APlayer({
                    container: document.getElementById('aplayer'),
                    fixed: true,
                    theme: '#FADFA3',
                    volume: 0.7,
                    listFolded: true,
                    listMaxHeight: 90,
                    lrcType: 3,
                    audio: res
                });
            })
            
        },
        methods: {
            play(){
                this.player.toggle();
            }
        },
    }
</script>
<style scoped>
    .background{
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        z-index: -1;
        position: fixed;
        background-color: #eee;
    }
    #musicBox{
        position: fixed;
        top: 100px;
        right: 30px;
        z-index:99;
        width:300px;
        opacity: .3;
        transition: .35s;
        text-align: center;
    }
    #musicBox:hover{
        opacity: 1;
    }
</style>
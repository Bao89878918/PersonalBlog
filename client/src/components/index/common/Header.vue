<template>
    <div class="header">
		<h1>EchoBao’s Blog</h1>
        <el-menu class="clearfix" mode="horizontal" background-color="#343a40" text-color="#fff" active-text-color="#ffd04b" @select="handleSelect">
			<el-menu-item index="1"><router-link href="/" to="/">首页</router-link></el-menu-item>
			<el-menu-item index="2">心情小镇</el-menu-item>
			<el-menu-item index="3">生活Vlog</el-menu-item>
			<el-menu-item index="4"><a href="https://www.baoblog.cn">服务器部署</a></el-menu-item>
			<el-menu-item index="5">开发技术交流</el-menu-item>
			<el-submenu index="6">
				<template slot="title">测试下级栏目</template>
				<el-menu-item index="6-1">子栏目1</el-menu-item>
				<el-menu-item index="6-2">子栏目2</el-menu-item>
				<el-menu-item index="6-3">子栏目3</el-menu-item>
			</el-submenu>
		</el-menu>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        activeIndex: '1',
        activeIndex2: '1'
      };
    },
    methods: {
        handleSelect(key,keyPath) {
			if(key != 1){
				this.$router.push({name:"list",params:{id:key}});
			}
		}
    }
  }
</script>

<style>
    .header{
		display: flex;
		justify-content: center;
		width:100%;
		background-color: #343a40;
        box-shadow: 0px 0px 20px #ccc;
        border-radius:0 0 5px 5px;
    }
    .header h1{
      display: inline-block;
      color:#fff;
      padding: 10px 100px;
	}
    .el-menu.el-menu--horizontal{
        border-bottom:none;
    }
	
</style>
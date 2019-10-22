<template>
    <div class="wrap_login">
		<div class="lg">
			<h4>Login</h4>
			<form class="lg_form">
				<input type="text" v-model="form.account" placeholder="请输入用户名" />
				<input type="password" v-model="form.password" placeholder="请输入密码" />
				<input type="button" value='Sign in' @click="login" />
			</form>
		</div>
	</div>
</template>
<style scoped>
    @import "../../../static/css/login.css";
</style>
<script>
	import {userAction} from '../../../api/index';
	export default {
		data() {
			return {
				form:{account:'',password:''}
			}
		},
		methods: {
			login(){
				userAction.login(this.form).then(res => {
					if(res.code == 1){
						this.$cookie.set('token',res.data.userinfo.token);
						if(this.$route.query.redirect){
							this.$router.push({path:this.$route.query.redirect})
						}
					}else{
						console.log('登录失败')
					}
				})
			}
		},
	}
</script>
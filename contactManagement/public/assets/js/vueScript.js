/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
Vue.component('signUpForm',{
	template:'#signUpForm',
	data(){
		return {
			password:'',
			confirmPassword:'',
			email:'',
                        name:'',
			msg:[],
			disableSubmitButton : true,
		}
	},
	watch:{
		email(value){
			this.eventName();
			this.email = value;
			this.check_email(value);
		},
                name(value){
			this.eventName();
			this.name = value;
			this.checkName(value);
		},
		phoneNumber(value){
			this.eventName();
			this.password = value;
			this.checkPhoneNumber(value);
		},
		birthdate(value){
			this.eventName();
			this.birthdate = value;
			this.checkBirthDate(value);
		}
	},
	methods:{
		check_email(value){
			if (/^\w+([\.-]?\ w+)*@\w+([\.-]?\ w+)*(\.\w{2,3})+$/.test(value))
			{
				this.msg[name] = '';
			}else{
				this.msg[name] = 'Keep Typing... We are waiting for correct Email';
			}
		},
                checkBirthDate(value){
                   if (/^([0-2^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/.test(value))
			{
				this.msg[name] = '';
			}else{
				this.msg[name] = 'Keep Typing... We are waiting for correct birth date';
			} 
                },
		checkPhoneNumber(value){
			if (/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/.test(value))
			{
				this.msg[name] = '';
			}else{
				this.msg[name] = 'Keep Typing... We are waiting for correct phone Number';
			}
		},
                checkName(value){
			if (/^\p{L}+[\p{L}\p{Pd}\p{Zs}']*\p{L}+$|^\p{L}+$/.test(value))
			{
				this.msg[name] = '';
			}else{
				this.msg[name] = 'Keep Typing... We are waiting for correct Name';
			}
		},
		eventName(){
			name = event.target.name;
		}
	}
});

new Vue({
	el:'#app',
	data:{
		componentName:'signUpForm'
	},
	methods:{
		change(newComp){
			this.componentName = newComp;
		}
	}
})


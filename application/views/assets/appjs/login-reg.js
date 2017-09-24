$(document).ready(function(){
	$('#form-user-registration').validate({
		rules:{
			username:{
				required:true,
				minlength:5
			},
			password:{
				required:true,
				minlength:8
			},
			repassword:{
				required:true,
				equalTo:'#password'
			},
			email:{
				required:true,
				email:true
			},
			reemail:{
				required:true,
				email:true,
				equalTo:'#email'
			}
		}
	});

	$('#form-user-login').validate({
		rules:{
			username:{
				required:true,
				email:true
			},
			password:{
				required:true
			}
		}
	});

	$('#form-user-forgot').validate({
		rules:{
			email:{
				required:true,
				email:true
			}
		}
	});

	$('#btn-register').on('click',function(e){
		e.preventDefault();
		$.ajax({
			url: "registration/register",
			type: 'POST',
			cache:false,
			data: $('#form-user-registration').serialize(),
			beforeSend:function(){
				swal({
					title:"Please Wait",
					text:"Please wait a moment",
					icon:"info",
					buttons: false,
  					timer: 1500,
				});
			},
			success:function(data){
				var response = JSON.parse(data);
				if(response.response == 1){
					swal({
						title: "success!",
						text: response.success,
						icon: "success"
					});
				}else{
					swal({
						title: "Oops!",
						text: response.warning,
						icon: "error"
					});
				}
			}
		});
	});

	$('#btn-login').on('click',function(e){
		e.preventDefault();
		$.ajax({
			url:'login/verify',
			type:'POST',
			cache:false,
			data:$('#form-user-login').serialize(),
			success:function(data){	
				var response = JSON.parse(data);
				if(response.response == 1){
					window.location.href = response.redirect;
				}else{
					swal({
						title: "Oops!",
						text: response.warning,
						icon: "error"
					});
				}
			}
		});
	});

	$('#btn-forgot').on('click',function(e){
		e.preventDefault();
		$.ajax({
			url:'login/forgotSend',
			type:'POST',
			cache:false,
			data:$('#form-user-forgot').serialize(),
			beforeSend:function(data){
				swal({
					title:'Password recovery',
					text:'Please wait a moment we will send you a mail to reset password',
					icon:'info',
					buttons:false,
					timer:1500,
				})
			},
			success:function(data){
				response = JSON.parse(data);
				if(response.response == 1){
					swal({
						title: "Request Approved!",
						text: response.success,
						icon: "success"
					});
				}else{
					swal({
						title: "Oops!",
						text: response.warning,
						icon: "error"
					});	
				}
			}
		});
	});

});

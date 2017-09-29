$(document).ready(function(){
    window.fbAsyncInit = function() {
    FB.init({
        //appId      : '1085488638252504', // Set YOUR APP ID
        appId      :'132213500842917' , 
        status     : true, // check login status
        cookie     : true, // enable cookies to allow the server to access the session
        xfbml      : true,  // parse XFBML
        version    : 'v2.10',
        oauth      : true
        });
    };
       
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
});

function getPageList(){
    FB.api('me/accounts',{fields:'name'},function(response){
        $('#partialview-user-page').load('user/getPage',response);
    });
}

function myFacebookLogin(){
    FB.login(function(response){    
        FB.api('/me', { locale: 'tr_TR', fields: 'name, email,birthday, hometown,education,gender,website,work' },
            function(response) {
            $.ajax({
                url:'login/withFacebook',
                type:'POST',
                data:response,
                cache:false,
                success:function(data){
                    var response = JSON.parse(data);
                    if(response.response == 1){
                        swal({
                            title:'Success',
                            text:response.success,
                            icon:'success',
                            confirmButtonText: "Ok"
                        });
                        window.location.href = response.redirect;
                        
                    }else{
                        swal({
                            title:'Warning',
                            text:response.Warning,
                            icon:'success',
                        });
                    }
                },
                error:function(){
                    swal({
                        title:'Oops!',
                        text:'Unable to login with facebook',
                        icon:'error'
                    });
                }
            });
          });
        });
    }
    
function myFacebookLogout(){
    FB.logout(function(response){

    });
}
    
$('#fbpage-list-existing').on('select2:select',function(){
    //check user loggged in or not
    FB.getLoginStatus(function(response){
        if(response.status === 'connected'){
            var fb_page_id = $('#fbpage-list-existing').select2().find(":selected").val();
            //get total page followers
            getTotalFollowers(fb_page_id);
            //get total page posts
            getTotalPosts(fb_page_id);
        }else{
            FB.login(function(response){
                var fb_page_id = $('#fbpage-list-existing').select2().find(":selected").val();
                if (response.authResponse) {
                    //get total page followers
                    getTotalFollowers(fb_page_id);
                    //get total page posts
                    getTotalPosts(fb_page_id);
                }
            });
        }
    });
    fetch_page_id = $('#fbpage-list-existing').select2().find(':selected').data('page-id');
    getCompititorsList(fetch_page_id);
});


function getCompititorsList(fetch_page_id){
    $.ajax({
        url:'user/getCompititors',
        type:'POST',
        data:{'fetch_page_id':fetch_page_id},
        success:function(data){
            $('#compititorsData').load('user/compititorsPage',{'page_data':data});
        },
        error:function(data){

        }
    })
}

function getTotalFollowers(fb_page_id)
{   
    FB.api(fb_page_id+'?fields=fan_count',function(response){
        $('#total-page-followers').html(response.fan_count);
    });
}

function getTotalPosts(fb_page_id)
{
    FB.api(fb_page_id+'/posts?fields=admin_creator,name',function(response){
        var total_posts = response.data.length;
        $('#total-page-posts').html(total_posts);
    });    
}
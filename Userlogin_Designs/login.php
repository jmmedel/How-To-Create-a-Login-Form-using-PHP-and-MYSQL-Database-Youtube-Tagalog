<?php

session_start();
   
if(isset($_SESSION['userlogin'])){
	header("Location: login.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link href="main.css" rel="stylesheet" >
</head>
<body>
 
 <br>
 <br>  
 <br>  
 <br>  
 <br>  
<div class="container">
    <div class="wrapper fadeInDown zero-raduis">
  	  <div id="formContent">
  	    <!-- Tabs Titles -->

  	    <!-- Icon -->
  	    <div class="fadeIn first">
  	      <h2 class="my-5">Sign In</h2>
  	    </div>
          
  	    <!-- Login Form -->
  	    <form>
  	      <input type="email" id="email" class="fadeIn second zero-raduis" name="email" placeholder="email" required>
  	      <input type="password" id="password" class="fadeIn third zero-raduis" name="login" placeholder="password" required>
		      <div id="formFooter">
  	      	<a class="underlineHover" href="#">Forgot Password?</a>
  	      </div>
  	      <input type="submit" class="fadeIn fourth zero-raduis" id="login" value="Log in">
  	      <h2>You don't have a account ?</h2>
  	      <input type="button" class="fadeIn fourth zero-raduis pc" value="register">
  	    </form>
  	    

  	  </div>
  </div>
  
</div>
<script>
$(function(){
	$('#login').click(function(e){
             
		 var valid = this.form.checkValidity();
		 if(valid){
			 var username = $('#email').val();
			 var password = $('#password').val();
		 }
         e.preventDefault();
		
			$.ajax({
			type: 'Post',
			url:'ajaxlogin.php',
			data: {username:username,password:password},
			success: function(data){
				
				if($.trim(data) === "202"){
					alert("Sucesss");
					setTimeout(' window.location.href =  "index.php"', 1000);
				}else{
					alert(data);
				}
			},
            error: function(data){
				alert("There were error while doing the operation");
			}

		});
		
        

	});
});


</script>


</body>
</html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans'>

      
<style type="text/css">
*, *:before, *:after {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}

.body {
	font-size: 62.5%;
	height: 100%;
	overflow: hidden;
}

@media (max-width: 768px) {
	html, body {
		font-size: 50%;
	}
}

svg {
	display: inline-block;
	width: 2rem;
	height: 2rem;
	overflow: visible;
}

.svg-icon {
	cursor: pointer;
}

.svg-icon path {
	stroke: rgba(255, 255, 255, 0.9);
	fill: none;
	stroke-width: 1;
}

input, button {
	outline: none;
	border: none;
}

.demo {
	position: absolute;
	top: 20%;
	left: 50%;
	margin-left: -15rem;
	margin-top: -15rem;
	width: 30rem;
	height: 53rem;
	overflow: hidden;
}

.login {
	position: relative;
	height: 100%;
	background: linear-gradient(to bottom, rgba(146, 135, 187, 0.8) 0%, rgba(0, 0, 0, 0.6) 100%);
	transition: opacity 0.1s, -webkit-transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25);
	transition: opacity 0.1s, transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25);
	transition: opacity 0.1s, transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25), -webkit-transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25);
	-webkit-transform: scale(1);
          transform: scale(0.5);
}

.login.inactive {
	opacity: 0;
	-webkit-transform: scale(1.1);
          transform: scale(1.1);
}

.login__check {
	position: absolute;
	top: 16rem;
	left: 13.5rem;
	width: 14rem;
	height: 2.8rem;
	background: #fff;
	-webkit-transform-origin: 0 100%;
          transform-origin: 0 100%;
	-webkit-transform: rotate(-45deg);
          transform: rotate(-45deg);
}

.login__check:before {
	content: "";
	position: absolute;
	left: 0;
	bottom: 100%;
	width: 2.8rem;
	height: 5.2rem;
	background: #fff;
	box-shadow: inset -0.2rem -2rem 2rem rgba(0, 0, 0, 0.2);
}

.login__form {
	position: absolute;
	top: 50%;
	left: 0;
	width: 100%;
	height: 50%;
	padding: 1.5rem 2.5rem;
	text-align: center;
}

.login__row {
	height: 5rem;
	padding-top: 1rem;
	border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

.login__icon {
	margin-bottom: -0.4rem;
	margin-right: 0.5rem;
}

.login__icon.name path {
	stroke-dasharray: 73.50196075439453;
	stroke-dashoffset: 73.50196075439453;
	-webkit-animation: animatePath 2s 0.5s forwards;
          animation: animatePath 2s 0.5s forwards;
}
.login__icon.pass path {
	stroke-dasharray: 92.10662841796875;
	stroke-dashoffset: 92.10662841796875;
	-webkit-animation: animatePath 2s 0.5s forwards;
          animation: animatePath 2s 0.5s forwards;
}
.login__input {
	display: inline-block;
	width: 22rem;
	height: 100%;
	padding-left: 1.5rem;
	font-size: 1.5rem;
	background: transparent;
	color: #FDFCFD;
}
.login__submit {
	position: relative;
	width: 100%;
	height: 4rem;
	margin: 5rem 0 2.2rem;
	color: rgba(255, 255, 255, 0.8);
	background: #FF3366;
	font-size: 1.5rem;
	border-radius: 3rem;
	cursor: pointer;
	overflow: hidden;
	transition: width 0.3s 0.15s, font-size 0.1s 0.15s;
}
.login__submit:after {
	content: "";
	position: absolute;
	top: 50%;
	left: 50%;
	margin-left: -1.5rem;
	margin-top: -1.5rem;
	width: 3rem;
	height: 3rem;
	border: 2px dotted #fff;
	border-radius: 50%;
	border-left: none;
	border-bottom: none;
	transition: opacity 0.1s 0.4s;
	opacity: 0;
}
.login__submit.processing {
	width: 4rem;
	font-size: 0;
}
.login__submit.processing:after {
	opacity: 1;
	-webkit-animation: rotate 0.5s 0.4s infinite linear;
          animation: rotate 0.5s 0.4s infinite linear;
}
.login__submit.success {
	transition: opacity 0.1s 0.3s, background-color 0.1s 0.3s, -webkit-transform 0.3s 0.1s ease-out;
	transition: transform 0.3s 0.1s ease-out, opacity 0.1s 0.3s, background-color 0.1s 0.3s;
	transition: transform 0.3s 0.1s ease-out, opacity 0.1s 0.3s, background-color 0.1s 0.3s, -webkit-transform 0.3s 0.1s ease-out;
	-webkit-transform: scale(30);
          transform: scale(30);
	opacity: 0.9;
}
.login__submit.success:after {
	transition: opacity 0.1s 0s;
	opacity: 0;
	-webkit-animation: none;
          animation: none;
}
.login__signup {
	font-size: 1.2rem;
	color: #ABA8AE;
}
.login__signup a {
	color: #fff;
	cursor: pointer;
}

nav {
	margin:auto; 
	text-align: left;
	
}

nav ul {
	background: #0099ff; 
	padding:0px 179px;
	border-radius: 0px;  
	list-style: none;
	position: relative;
	display: inline-table;
	
}
nav ul:after {
		content: ""; clear: both; display: block; 
	}
		nav ul li {
		float: left;
	}
		nav ul li:hover {
			background: #F33;
		}
			nav ul li:hover a {
				color: #fff;
			}
		
		nav ul li a {
			display: block; padding: 15px 40px;
			color: #fff; text-decoration: none;
		}
			
		
	nav ul ul {
		background: #0099ff; border-radius: 0px; padding: 0px;
		position: relative; top: ;
	}
		nav ul ul li {
			float: none; 
			border-top: 0px solid #0099ff;
			border-bottom: 1px solid #0099ff; position: ;
		}
			nav ul ul li a {
				padding: 0 px 0px ;
				color: #fff;
			}	
				nav ul ul li a:hover {
					background: #666;
				}
		
	nav ul ul ul {
		position: absolute; left: 100%;  top:0;
	}
		

@-webkit-keyframes animRipple {
  to {
    -webkit-transform: scale(3.5);
            transform: scale(3.5);
    opacity: 0;
  }
}

@keyframes animRipple {
  to {
    -webkit-transform: scale(3.5);
            transform: scale(3.5);
    opacity: 0;
  }
}
@-webkit-keyframes rotate {
  to {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}
@keyframes rotate {
  to {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}
@-webkit-keyframes animatePath {
  to {
    stroke-dashoffset: 0;
  }
}
@keyframes animatePath {
  to {
    stroke-dashoffset: 0;
  }
}
#footer_bottom {
background-color: #0e639d;
padding-top: 13px;
padding-bottom: 17px;
margin-top:70px;
}
#footer_bottom .copyright {
text-align: center;
font-size: 16px;
color: #81ccff;
}
#footer_bottom .copyright a {
color: #fff;
font-size: 19px;
}
.blog{
width:700px;
height:400px;
border:1px solid #e2e2e2;
float:right;
margin-right:300px;
background-color:white;
}
#blog_text{
padding: 20px;
}
.content {
    margin: 0 auto;
    padding-top: 30px;
    max-width: 1100px;
}
.footer {
    color: #ffffff;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 20px;
    background-color: #9e9e9e;
    text-align: center;
}

body{
	background-color:#00FFFF;
	background: url('https://images4.alphacoders.com/307/thumb-1920-30716.jpg') ;
	-webkit-background-size: cover;
-moz-background-size: cover;

	
}
</style>
  
</head>
<header>
	
</header>
<body>
<div class="content">
<form action="<?php echo base_url('loginku/cek_login'); ?>" method="post">
  <div class="cont">
  <div class="demo">
    <div class="login">
      <div class="login__check"></div>
      <div class="login__form">
        <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
		  <tr><td>
          <input type="text" class="login__input name" name="USERNAME" maxlength="15" placeholder="Username"/></td></tr>
        </div>
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
		  <tr><td>
          <input type="password" class="login__input pass" name="PASSWORD" maxlength="20" placeholder="Password"/></td></tr>
        </div>
		<tr><td>
        <button type="submit" class="login__submit">Sign in</button></td></tr>
      </div>
    </div>
  </div>
</div>

</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</div>
</body>
</html>

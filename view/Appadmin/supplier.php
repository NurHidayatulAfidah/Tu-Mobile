<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en-US">
   
<head>
      
      <title>Data Supplier</title>
	  <style type="text/css">
	  	*, *:before, *:after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
.fixed-top {
    position: relative;
    top: 0;
    right: 0;
    left: 0;
	bottom:0;
    z-index: 1030;
}

nav {
	margin:auto; 
	text-align: left;
	
}
body{
	background-color:#00FFFF;
	background: url('galon.jpg');
	
}
nav ul {
	background: #0099ff; 
	padding:13px 28.5px;
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
			display: block; padding: 0.7px 45px;
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
	.line:after, nav:after, .center:after, .box:after, .margin:after, .margin2x:after {
  clear:both;
  content:".";
  display:block;
  height:0;
  line-height:0;
  overflow: hidden;
  visibility:hidden;
}
img {
  border:0;
  display:block;
  height:auto;
  max-width:100%;
  width:auto;
}
.size-960 .line,.size-1140 .line,.size-1280 .line {
  margin:0 auto;
  padding:0 0.625rem;
}
.center {
  float:none;
  margin:0 auto;
  display:block;
}
 .hide-l,.hide-m {
	 display:block!important;
	 }
  .hide-s {
	  display:none!important;
	  }
.size-960 .line {
	max-width:60rem;
	}
.size-1140 .line {
	max-width:71.25rem;
	}
.size-1280 .line {
	max-width:80rem;
	}
.size-960.align-content-left .line,.size-1140.align-content-left .line,.size-1280.align-content-left .line {
	margin-left:0;
	}
	.line {
		clear:left;
		}
.line .line {
	padding:0;
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
    position: relative;
	top:138px;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 20px;
    background-color: #9e9e9e;
    text-align: center;
}	
body{
	background-color:#00FFFF;
	background: url('https://previews.123rf.com/images/dariusl/dariusl1204/dariusl120400081/13186514-courier-figure-bring-package-businessman-make-sign.jpg') ;
	-webkit-background-size: cover;
-moz-background-size: cover;
background-size: 70%;
	
}
.button{
    width: 100%;
    height: 50px;
  }
  
.button ul a{
  padding: 5px;
  background: rgb(116, 181, 12);
  color: white;
}
	#page-wrap{
width: 590px;
margin: 50px auto;
padding: 20px;
background: whitesmoke;
-moz-box-shadow: 0 0 20px blue;
-webkit-box-shadow: 0 0 20px blue;
box-shadow: 0 0 20px blue;
}
		
	  </style>
   </head>
   <body class="size-1140">
      <!-- TOP NAV WITH LOGO -->  
      <header>
        <nav class="fixed-top nav navul nav ul:after nav ul li nav ul li:hover nav ul li:hover a nav ul li a nav ul ul nav ul ul li nav ul ul li a nav ul ul li a:hover nav ul ul ul">
		<ul>
			<li><a  href = "<?php echo base_url()?>loginku/mhome"  rel='stylesheet' type='text/css'>HOME</a></li>
			<li><a  href = "<?php echo base_url()?>inputadmin/index"  rel='stylesheet' type='text/css'>BARANG</a></li>
			<li><a  href = "<?php echo base_url()?>supplierku/index"  rel='stylesheet' type='text/css'>SUPPLIER</a></li>
			<li><a  href = "<?php echo base_url()?>kurirku/index"  rel='stylesheet' type='text/css'>KURIR</a></li>	
			<li> <a  href = "<?php echo base_url()?>tampiladminku/datapemesan"  rel='stylesheet' type='text/css'>PEMESANAN</a></li>	
			<li> <a  href = "<?php echo base_url()?>pengirimku/index"  rel='stylesheet' type='text/css'>PENGIRIMAN</a></li>	
			<li><a href="#"><?php echo $this->session->userdata("nama"); ?><a></li>	
			<li><a href="<?php echo base_url()?>loginku/logout">LOG OUT</a><li>
		</ul>
		</nav>
      </header>
	  <div id="page-wrap" align ="center">
	<div class="content"> 
	
	<h2><center>DATA SUPPLIER</center></h2>
	<br><br>
	<center><div class="button">
	<ul><a href="<?php echo base_url()?>supplierku/tambah">Tambah Data</a></ul></div></center>
  <form method="get" action="cari">
		<p align="center"><input type="text"  name="data" >
		<input type="submit" name="send"  value="Cari">
		</form>
	<table style="margin:20px auto;" border="1" >
		<tr>
			<th>No</th>
			<th>Id Supplier</th> 
			<th>Nama Supplier</th>
			<th>Alamat Supplier</th>
			<th>No Hp Supplier</th>
			<th>Opsi</th>
			
		</tr>
		<?php 
		$no = 1;
		foreach($data_pemasok as $u){ 
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $u->ID_PEMASOK ?></td>
			<td><?php echo $u->NAMA_PEMASOK ?></td>
			<td><?php echo $u->ALAMAT ?></td>
			<td><?php echo $u->NO_HP_PEMASOK ?></td>
			<td>
			    <?php echo anchor('supplierku/edit/'.$u->ID_PEMASOK,'Edit'); ?>
                <?php echo anchor('supplierku/hapus/'.$u->ID_PEMASOK,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
 
 </div>
 </div>
     <footer>
         <div id="footer_bottom" class="footer-bottom footer">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="copyright">2014 © <a href="#">FormGet.com</a> All rights reserved.</div>
</div>
</div>
</div>
      </footer>
      <script type="text/javascript" src="js/responsee.js"></script> 
      <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>   
      <script type="text/javascript">
         jQuery(document).ready(function($) {  
           $("#owl-demo2").owlCarousel({
           	slideSpeed : 300,
           	autoPlay : true,
           	navigation : false,
           	pagination : true,
           	singleItem:true
           });
         });	
          
      </script>  
   </body>

<!-- Mirrored from www.evitamineralwater.com/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 May 2018 00:00:56 GMT -->
</html>
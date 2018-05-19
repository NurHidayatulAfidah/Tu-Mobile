<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
		<title>List Pemesan</title>
		
		<style type="text/css" >
		
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
	padding:0px 178px;
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
			display: block; padding: 9px 40px;
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
.cards {
	width: 1000px;
	box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  	transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  	border-radius: 2px;
  	overflow: hidden;
  	margin: 0 auto;
}
.cards-image {
	width: 100%;
}
.cards-image img {
	width: 100%
}
.cards-box {
	padding: 15px;
}

.button{
    width: 100%;
    height: 50px;
  }
  .left{
    float: left;
    display: block;
  }
  .right{
    float: right;
    display: block;
  }
.button ul a{
  padding: 10px;
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
	<body >
	
	<nav class="fixed-top nav navul nav ul:after nav ul li nav ul li:hover nav ul li:hover a nav ul li a nav ul ul nav ul ul li nav ul ul li a nav ul ul li a:hover nav ul ul ul">
	
<ul>
<li><a  href = "<?php echo base_url()?>tampiladminku/home"  rel='stylesheet' type='text/css'>HOME</a></li>
	
	<li> <a  href = "<?php echo base_url()?>tampiladminku/datapemesan"  rel='stylesheet' type='text/css'>PEMESANAN</a></li>
		
		<li><a  href = "<?php echo base_url()?>inputadmin/index"  rel='stylesheet' type='text/css'>BARANG</a></li>
		
			<li><a  href = "<?php echo base_url()?>supplierku/index"  rel='stylesheet' type='text/css'>SUPLLIER</a></li>
		
		
		
		<li><a  href = "<?php echo base_url()?>kurirku/index"  rel='stylesheet' type='text/css'>KURIR</a></li>	
<li><a href="<?php echo base_url('loginku/logout'); ?>">LOG OUT</a><li>
		<li><a href="#" onclick='myFunction()'rel='stylesheet' type='text/css'><p> <?php echo $this->session->userdata("nama"); ?> </p><a></li>		
		
		
		</ul>
 </nav>
 <div class="content">
 
     <h1>Daftar Kurir :</h1>
	 <hr></hr>
	 <br>
	 <form method="get" action="kurir">
		<p align="center"><input type="text" name="data">
		<input type="submit" name="send" value="Cari">
		</form>
	 <br><br>
	 
	 <div class="cards">
	 <form action="<?php echo base_url(). 'kurirku/delete'; ?>" method="post">
	<table id="tt" style="width:700px;height:200px "
 title="DataGrid - CardView" singleSelect="true" fitColumns="true" remoteSort="false"
 url="data.php" pagination="true" sortOrder="desc" sortName="id">
 <thead>
 
 <tr>
<th width="120" >KURIR</th>
<th width="120" >ID KURIR</th>
 <th  width="200" >NAMA KURIR</th>
 <th  width="200" >ALAMAT KURIR</th>
 <th  width="200" >NO HANDPHONE</th>
 
 </tr>
<?php
if( ! empty($gambar)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
  foreach($gambar as $data){ // Lakukan looping pada variabel gambar dari controller
    echo "<tr>";
    echo "<td><center><img src='".base_url("images/".$data->nama_file)."' width='100' height='100'></center></td>";
    //echo "<td>".$data->nama_file."</td>";
	echo "<td> <center>".$data->ID_KURIR."</center></td>";
	echo "<td> <center>".$data->NAMA_KURIR."</center></td>";
	echo "<td> <center>".$data->ALAMAT_KURIR."</center></td>";
	echo "<td> <center>".$data->NO_HP_KURIR."</center></td>";
	echo "<td><input type='image' src='".base_url("tam.jpg")."' value='Hapus Kurir'></td>";
    echo "</tr>";
  }
}else{ // Jika data tidak ada
  echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
}
?> 
</thead>
 </table>
 </form>
 </div>
</div>
<div class="button">
<br><br><br><br>
  <ul class="left">
<a href="<?php echo base_url("index.php/kurirku/tambah"); ?>" ><input type='image' value='Tambah Kurir'></a></ul></div><br><br>
 </thead>
 </table>
 </form>
 </div>
</div>
</div></div></div>
	 
	 
	 
	 
	 
	 </div>
	 </div>
	 
	 
	 
	 
	 
     
	</body>
	 <!-- FOOTER -->   
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
</html>
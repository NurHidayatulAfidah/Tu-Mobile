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
	background: url('https://img.clipart.guru/unloading-3d-working-people-workers-unloading-boxes-from-a-truck-isolated-white-backgrounddelivery-truck-unloading-clipart-1300_1191.jpg') ;
	-webkit-background-size: cover;
-moz-background-size: cover;
background-size: 70%;
	
}
nav ul {
	background: #0099ff; 
	padding:0px 239px;
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
		#page-wrap{
width: 590px;
margin: 50px auto;
padding: 20px;
background: whitesmoke;
-moz-box-shadow: 0 0 20px blue;
-webkit-box-shadow: 0 0 20px blue;
box-shadow: 0 0 20px blue;
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

</style>
	</head>
	<body >
	
	<nav class="fixed-top nav navul nav ul:after nav ul li nav ul li:hover nav ul li:hover a nav ul li a nav ul ul nav ul ul li nav ul ul li a nav ul ul li a:hover nav ul ul ul">
	
<ul>
<li><a  href = "<?php echo base_url()?>tampiladminku"  rel='stylesheet' type='text/css'>HOME</a></li>
	
	<li> <a  href = "<?php echo base_url()?>tampiladminku/datapemesan"  rel='stylesheet' type='text/css'>DATA PEMESAN</a></li>
		
		<li><a  href = "<?php echo base_url()?>inputadmin/proses_input"  rel='stylesheet' type='text/css'>BARANG</a></li>
		
		<li><a  href = "<?php echo base_url()?>contactku/index"  rel='stylesheet' type='text/css'>HUBUNGI</a></li>
		
		<li><a  href = "<?php echo base_url()?>loginku/index"  rel='stylesheet' type='text/css'>LOGIN</a></li>
		
		<li><a  href = "<?php echo base_url()?>kurirku/index"  rel='stylesheet' type='text/css'>KURIR</a></li>	
		
		</ul>
 </nav>
 <br><br><br>
 <div class="content"> 
 <div id="page-wrap" align ="center">
		<p><h3 align="center">Daftar Pemesan Barang</h3></p>
		<br>
		<p align="center"><a href="<?php echo base_url()?>tampiladminku/input">Tambah</a></p>
		<br>
		<p align="center">
		<form method="get" action="datapemesan">
		<p align="center"><input type="text" name="data">
		<input type="submit" name="send" value="Cari">
		</form>
		<br><br>
		
			<table border="1" align="center">
				<tr>
				 <th>No</th>
					<th>Id Pemesanan</th>
					<th>Nama Pemesan</th>
					<th>Alamat</th>
					<th>Waktu Pemesanan</th>
					<th>Waktu Tiba</th>
					<th>Pengirim</th>
					<th>Status</th>
					
				</tr>
				
				<?php
				
                $no = 1;
                foreach ($data as $row): ?>
				<tr align="center">
				    <td><?php echo $no;?></td>
					<td><?php echo $row->Id_Pemesanan;?></td>
					<td><?php echo $row->Nama_Pemesan;?></td>
					<td><?php echo $row->Alamat;?></td>
					<td><?php echo $row->Waktu_Pemesanan;?></td>
					<td><?php echo $row->Waktu_Tiba;?></td>
					<td><?php echo $row->Pengirim;?></td>
					<td><?php echo $row->status;?></td>
					
				</tr>
				<?php $no++;
                endforeach;?>
				
			</table>
			
		</p>
			</div></div>
	</body>
	 <footer>
         <div id="footer_bottom" class="footer-bottom footer" >
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="copyright">2014 © <a href="#">FormGet.com</a> All rights reserved.</div>
</div>
</div>
</div>
      </footer>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Data Kurir</title>
	 <style type="text/css">
  .file {
    visibility: hidden;
    position: absolute;
  }
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
	top:170px;
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
<nav class="fixed-top nav navul nav ul:after nav ul li nav ul li:hover nav ul li:hover a nav ul li a nav ul ul nav ul ul li nav ul ul li a nav ul ul li a:hover nav ul ul ul">
	
	<ul>
		<li><a  href = "<?php echo base_url()?>loginku/home"  rel='stylesheet' type='text/css'>HOME</a></li>
		<li><a  href = "<?php echo base_url()?>inputadmin/index"  rel='stylesheet' type='text/css'>BARANG</a></li>
		<li><a  href = "<?php echo base_url()?>supplierku/index"  rel='stylesheet' type='text/css'>SUPPLIER</a></li>
		<li><a  href = "<?php echo base_url()?>kurirku/index"  rel='stylesheet' type='text/css'>KURIR</a></li>	
		<li> <a  href = "<?php echo base_url()?>tampiladminku/datapemesan"  rel='stylesheet' type='text/css'>PEMESANAN</a></li>	
		<li> <a  href = "<?php echo base_url()?>pengirimku/index"  rel='stylesheet' type='text/css'>PENGIRIMAN</a></li>	
		<li><a href="#"><?php echo $this->session->userdata("nama"); ?><a></li>	
		<li><a href="<?php echo base_url()?>loginku/logout">LOG OUT</a><li>
	</ul>
 </nav>
 <br>
</head>
<body>
<div class="content"> 
 <div id="page-wrap" align ="center">
	<center>
		<h3>Edit Data Kurir</h3>
	</center>
	<?php foreach($data_kurir as $u){ ?>
	<form action="<?php echo base_url(). 'kurirku/update'; ?>" method="post">
		<table style="margin:20px auto;">
		<tr>
				<td>ID Kurir</td>
				<td><input type="varchar" name="ID_KURIR" value="<?php echo $u->ID_KURIR ?>" readonly></td>
		</tr>
			<tr>
				<td>Nama Kurir</td>
				<td>
					<input type="char" name="NAMA_KURIR" value="<?php echo $u->NAMA_KURIR ?>" required="">
				</td>
			</tr>
			<tr>
				<td>Alamat Kurir</td>
				<td><input type="char" name="ALAMAT_KURIR" value="<?php echo $u->ALAMAT_KURIR ?>" required="">
			</tr>
			<tr>
				<td>No HP Kurir</td>
				<td><input type="varchar" name="NO_HP_KURIR" value="<?php echo $u->NO_HP_KURIR?>" required="">
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>
	</div></div>
</body>
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
</html>
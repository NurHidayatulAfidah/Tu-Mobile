<html>
	<head>
		<title>Input Mahasiswa</title>
		
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
width: 490px;
margin: 50px auto;
padding: 20px;
background: whitesmoke;
-moz-box-shadow: 0 0 20px blue;
-webkit-box-shadow: 0 0 20px blue;
box-shadow: 0 0 20px blue;
}

</style>
	</head>
	<body>
	<nav class="fixed-top nav navul nav ul:after nav ul li nav ul li:hover nav ul li:hover a nav ul li a nav ul ul nav ul ul li nav ul ul li a nav ul ul li a:hover nav ul ul ul">
	
<ul>
<li><a  href = "<?php echo base_url()?>tampiladminku/home"  rel='stylesheet' type='text/css'>HOME</a></li>
	
	<li> <a  href = "<?php echo base_url()?>tampiladminku/datapemesan"  rel='stylesheet' type='text/css'>PEMESANAN</a></li>
		
		<li><a  href = "<?php echo base_url()?>inputadmin/index"  rel='stylesheet' type='text/css'>BARANG</a></li>
		
		<li><a  href = "<?php echo base_url()?>supplierku/index"  rel='stylesheet' type='text/css'>SUPPLIER</a></li>
		
		
		<li><a  href = "<?php echo base_url()?>kurirku/index"  rel='stylesheet' type='text/css'>KURIR</a></li>	
		<li><a href="<?php echo base_url('loginku/logout'); ?>">LOG OUT</a><li>
		<li><a href="#" onclick='myFunction()'rel='stylesheet' type='text/css'><p> <?php echo $this->session->userdata("nama"); ?> </p><a></li>
		</ul>
 </nav>
 <br>
		<h4 align="center">Tambah Data Pemesan Barang</h4>
		
		<div align="center">
		<p>
			<form method="post" action="input">
        Id Pemesanan<br/><input type="varchar" name="ID_PEMESANAN" size="30" maxlength="10" value="<?php if(isset($data)) { echo $data[0]->ID_PEMESANAN; } ?>"><br/>
		Nama Pemesan<br/><select name="NAMA_PENGGUNA">
        <?php foreach ($namapengguna as $row){ ?>
        	<option value="<?php echo $row->ID_PENGGUNA;?>"><?php echo $row->NAMA_PENGGUNA;?></option>
        	<?php }?></select><br/>
		Nama Barang<br/>
		<select name="NAMA_BARANG">
        <?php foreach ($namabarang as $row){ ?>
        	<option value="<?php echo $row->ID_BARANG;?>"><?php echo $row->NAMA_BARANG;?></option>
        	<?php }?>
        </select><br/>
		 Jumlah<br/><input type="int" name="JUMLAH" size="30" maxlength="11" value="<?php if(isset($data)) { echo $data[0]->JUMLAH; } ?>"><br/>
      <br><br>
		
        <input type="submit" name="btnTambah" value="Simpan"/>
    </form>
		</p>
		</div>
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
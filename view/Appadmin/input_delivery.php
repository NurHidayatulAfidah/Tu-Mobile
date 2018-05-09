<html>
	<head>
		<title>Input Mahasiswa</title>
	</head>
	<body>
		<h4 align="center">Tambah Data Pemesan Barang</h4>
		<div align="center">
		<p>
			<form method="post" action="input">
        Id Pemesanan<br/><input type="int" name="Id_Pemesanan" size="10" maxlength="15" value="<?php if(isset($data)) { echo $data[0]->Id_Pemesanan; } ?>"><br/><br/>
        Nama Pemesan<br/><input type="varchar" name="Nama_Pemesan" size="30" maxlength="25" value="<?php if(isset($data)) { echo $data[0]->Nama_Pemesan; } ?>"><br/><br/>
		Alamat<br/><input type="varchar" name="Alamat" size="30" maxlength="25" value="<?php if(isset($data)) { echo $data[0]->Alamat; } ?>"><br/><br/>
        Waktu Pemesanan<br/><input type="varchar" name="Waktu_Pemesanan" size="30" maxlength="8" value="<?php if(isset($data)) { echo $data[0]->Waktu_Pemesan; } ?>"><br/><br/>
		Waktu Tiba<br/><input type="varchar" name="Waktu_Tiba" size="30" maxlength="8" value="<?php if(isset($data)) { echo $data[0]->Waktu_Tiba; } ?>"><br/><br/>
		Pengirim<br/><input type="varchar" name="Pengirim" size="30" maxlength="25" value="<?php if(isset($data)) { echo $data[0]->Pengirim; } ?>"><br/><br/>
		Status<br/>
		<select name="status">
        <?php foreach ($nama_status as $row){ ?>
        	<option value="<?php echo $row->id_status;?>"><?php echo $row->status;?></option>
        	<?php }?>
        </select>
        <br/><br/>
		<br/><br/>
      
		<br/><br/>
        <input type="submit" name="btnTambah" value="Simpan"/>
        <a href="<?php echo base_url()?>tampiladminku/datapemesanan">Kembali</a>
    </form>
		</p>
		</div>
	</body>
</html>
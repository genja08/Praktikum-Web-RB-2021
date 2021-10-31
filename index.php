<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Csrf Token -->
	<meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tugas Praktikum</title>
	<!-- Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- Datatable -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

		<!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- DataTable -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
		<nav class="navbar navbar-dark bg-secondary">
	  <a class="navbar-brand" href="index.php" style="color: #fff;">
	    Praktikum Pemrograman Web
	  </a>
	</nav>

	<div class="container">
		<h2 align="center" style="margin: 30px;">Tugas Minggu 4</h2>

<form method="post" class="form-data" id="form-data"> 
	<input type="hidden" name="id" id="id"> 
	<div class="row">
		<div class="col-sm-3">
			<div class="form-group">
				<label>Nama Mahasiswa</label>
				<input type="hidden" name="id" id="id">
				<input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" required="true">
				<p class="text-danger" id="err_nama_mahasiswa"></p>
			</div>
		</div>
        <div class="col-sm-3">
        	<div class="form-group">
				<label>Jurusan</label>
				<select name="jurusan" id="jurusan" class="form-control" required="true">
					<option value=""></option>
					<option value="Sistem Informasi">Sistem Informasi</option>
					<option value="Teknik Informatika">Teknik Informatika</option>
					<option value="Teknik Elektro">Teknik Elektro</option>
					<option value="Kimia">Kimia</option>
					<option value="Ilmu Tanah">Ilmu Tanah</option>
					<option value="Kesehatan Masyarakat">Teknik Informatika</option>
				</select>
				<p class="text-danger" id="err_jurusan"></p>
			</div>
        </div>
        <div class="col-sm-3">
        	<div class="form-group">
				<label>Tanggal Masuk</label>
				<input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" required="true">
				<p class="text-danger" id="err_tanggal_masuk"></p>
			</div>
        </div>
        <div class="col-sm-3">
        	<div class="form-group">
				<label>Jenis Kelamin</label><br>
				<input type="radio" name="jenkel" id="jenkel1" value="Laki-laki" required="true"> Laki-laki
				<input type="radio" name="jenkel" id="jenkel2" value="Perempuan"> Perempuan
			</div>
			<p class="text-danger" id="err_jenkel"></p>
        </div>
	</div>
	
	<div class="form-group">
		<label>Alamat</label>
		<textarea name="alamat" id="alamat" class="form-control" required="true"></textarea>
		<p class="text-danger" id="err_alamat"></p>
	</div>
	
	<div class="form-group">
		<button type="button" name="simpan" id="simpan" class="btn btn-primary">
			<i class="fa fa-save"></i> Simpan
		</button>
	</div>
</form>

<p class="text-danger" id="err_nama_mahasiswa"></p>
        <hr>

		<div class="data"></div>
		
    </div>

    <div class="text-center">© <?php echo date('Y'); ?> Copyright:
	    <a href=""> Praktikum Pemweb</a>
	</div>

	<script type="text/javascript">
	$(document).ready(function(){
	    //Mengirimkan Token Keamanan
	    $.ajaxSetup({
	        headers : {
	            'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    $('.data').load("data.php");
	    $("#simpan").click(function(){
	        var data = $('.form-data').serialize();
	        var jenkel1 = document.getElementById("jenkel1").value;
	        var jenkel2 = document.getElementById("jenkel2").value;
	        var nama_mahasiswa = document.getElementById("nama_mahasiswa").value;
	        var tanggal_masuk = document.getElementById("tanggal_masuk").value;
	        var alamat = document.getElementById("alamat").value;
	        var jurusan = document.getElementById("jurusan").value;

	        if (nama_mahasiswa=="") {
	        	document.getElementById("err_nama_mahasiswa").innerHTML = "Nama Mahasiswa Harus Diisi";
	        } else {
	        	document.getElementById("err_nama_mahasiswa").innerHTML = "";
	        }
	        if (alamat=="") {
	        	document.getElementById("err_alamat").innerHTML = "Alamat Mahasiswa Harus Diisi";
	        } else {
	        	document.getElementById("err_alamat").innerHTML = "";
	        }
	        if (jurusan=="") {
	        	document.getElementById("err_jurusan").innerHTML = "Jurusan Mahasiswa Harus Diisi";
	        } else {
	        	document.getElementById("err_jurusan").innerHTML = "";
	        }
	        if (tanggal_masuk=="") {
	        	document.getElementById("err_tanggal_masuk").innerHTML = "Tanggal Masuk Harus Diisi";
	        } else {
	        	document.getElementById("err_tanggal_masuk").innerHTML = "";
	        }
	        if (document.getElementById("jenkel1").checked==false && document.getElementById("jenkel2").checked==false) {
	        	document.getElementById("err_jenkel").innerHTML = "Jenis Kelamin Harus Dipilih";
	        } else {
	        	document.getElementById("err_jenkel").innerHTML = "";
	        }

	        if (nama_mahasiswa!="" && tanggal_masuk!=""  && alamat!=""  && jurusan!=""  && (document.getElementById("jenkel1").checked==true || document.getElementById("jenkel2").checked==true)) {
	        	$.ajax({
		            type: 'POST',
		            url: "form_action.php",
		            data: data,
		            success: function() {
		                $('.data').load("data.php");
		                document.getElementById("id").value = "";
		                document.getElementById("form-data").reset();
		            }, error: function(response){
			        console.log(response.responseText);
			    }
		        });
	        }
	        
	    });
	});
	</script>
</body>
</html>
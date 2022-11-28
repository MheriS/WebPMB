<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <title>Starter Template · Bootstrap</title>
    
    <!--Template based on URL below-->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Place your stylesheet here-->
    <link href="/css/stylesheet.css" rel="stylesheet" type="text/css">
</head>
    
<style type="text/css">
	table.scroll {
		width:500px;
		border:1px #a9c6c9 solid;
	}
	table.scroll thead {
		display:table;
		width:100%;
		background-color: salmon;
	}
	table.scroll tbody {
		display:block;
		height:300px;
		overflow:auto;
		float:left;
		width:100%;
	}
	table.scroll tbody tr {
		display:table;
		width:100%;
	}
	table.scroll th, td {
		width:33%;
		padding:8px;
	}
</style>
    
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">UIN-Malang</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="admin.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adminjadwal.php">Jadwal PMB</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adminalur.php">Alur PMB</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adminpersyaratan.php">Persyaratan PMB</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="adminbiaya.php">Biaya PMB <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admindaftar.php">Data Peserta PMB</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="index.php">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

    <main role="main" class="container">

        <div class="text-center mt-5 pt-5">
            <h1>Input Biaya Sesuai Jurusan!</h1>
            <form class="form-horizontal" action="aksiadminbiaya.php" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="jurusan">Jurusan:</label>
                    <div class="col-sm-10">
                    <select class="selectpicker" data-style="btn-info" data-live-search="true" name="jurusan" style="width:805px; border:1px dotted #c6c9c6; border-radius:4px; -moz-border-radius:4px; background:#f6fff8; height:30px; font-family: 'Handlee', cursive;; margin-left:120px;">
                <optgroup label="Fakultas Ilmu Tarbiyah dan Keguruan">
                    <option>Pendidikan Agama Islam</option>
                    <option>Pendidikan Ilmu Pengetahuan Sosial</option>
                    <option>Pendidikan Guru Madrasah Ibtidaiyah</option>
                    <option>Pendidikan Bahasa Arab</option>
                    <option>Pendidikan Islam Anak Usia Dini</option>
                    <option>Manajemen Pendidikan Islam</option>
                    <option>Tadris Bahasa Inggris</option>
                    <option>Tadris Matematika</option>
                </optgroup>
                <optgroup label="Fakultas Syari’ah">
                    <option>al-Ahwal al-Syakhshiyyah</option>
                    <option>Hukum Bisnis Syari’ah</option>
                    <option>Hukum Tata Negara</option>
                    <option>Ilmu al-Qur'an dan Tafsir</option>
                </optgroup>
                <optgroup label="Fakultas Humaniora">
                    <option>Bahasa dan Sastra Arab</option>
                    <option>Sastra Inggris</option>
                </optgroup>
                <optgroup label="Fakultas Psikologi">
                    <option>Psikologi</option>
                </optgroup>
                <optgroup label="Fakultas Ekonomi">
                    <option>Manajemen</option>
                    <option>Akuntansi</option>
                    <option>Perbankan Syariah</option>
                </optgroup>
                <optgroup label="Fakultas Sains dan Teknologi">
                    <option>Matematika</option>
                    <option>Biologi</option>
                    <option>Fisika</option>
                    <option>Kimia</option>
                    <option>Teknik Informatika</option>
                    <option>Teknik Arsitektur</option>
                    <option>Perpustakaan dan Ilmu Informasi</option>
                </optgroup>
                <optgroup label="Fakultas Kedokteran dan Ilmu Kesehatan">
                    <option>Farmasi</option>
                    <option>Pendidikan Dokter</option>
                    <option>Profesi Dokter</option>
                </optgroup>
                <optgroup label="Pascasarjana">
                    <option>Magister Manajemen Pendidikan Islam</option>
                    <option>Magister Pendidikan Bahasa Arab</option>
                    <option>Magister Studi Ilmu Agama Islam</option>
                    <option>Magister Pendidikan Guru Madrasah Ibtidaiyah</option>
                    <option>Magister Pendidikan Agama Islam</option>
                    <option>Magister al-Ahwal al-Syakhsiyyah</option>
                    <option>Magister Ekonomi Syariah</option>
                    <option>Magister Pendidikan Matematika</option>
                    <option>Magister Biologi</option>
                    <option>Doktor Manajemen Pendidikan Islam</option>
                    <option>Doktor Pendidikan Bahasa Arab</option>
                    <option>Doktor Pendidikan Agama Islam Berbasis Studi Interdisipliner</option>
                </optgroup>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="cost">Biaya:</label>
                    <div class="col-sm-10">
                        <div class="col-sm-10">
                    <select class="selectpicker" data-style="btn-info" data-live-search="true" name="cost" style="width:805px; border:1px dotted #c6c9c6; border-radius:4px; -moz-border-radius:4px; background:#f6fff8; height:30px; font-family: 'Handlee', cursive;; margin-left:105px;">
                    <option>100000</option>
                    <option>120000</option>
                    <option>150000</option>
                    <option>155000</option>
                        </select>
                    </div>
                    </div>
                </div>
                        <button type="submit" class="btn btn-default" onclick="return confirm('Perhatian! Apakah Harga Untuk Jurusan Sudah Sesuai Dengan Peraturan Yang Ditetapkan?')" style="font-size: 15px; background: #009973; color: white; border: white 3px solid; border-radius: 10px; padding: 10px 15px; cursor:pointer; margin-top: 10px;">Submit</button>
            </form>
        <br>
            <div style="margin-bottom:15px;" align="center">
            <form action="" method="post">
                <input type="text" name="inputan_pencarian" placeholder="Masukkan pencarian..." style="width:200px; padding:5px;" />
                <input type="submit" name="cari_jurusan" value="Cari" style="padding:5px;" />
            </form>
            </div> 
        <table border="4" align="center" class="scroll">
        <thead>
            <tr>
                <th>Jurusan</th>
                <th>Biaya</th>
                <th colspan="2">Option</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            error_reporting(0);
            include "koneksi.php";
            $inputan_pencarian = $_POST['inputan_pencarian'];
            $cari_jurusan = $_POST['cari_jurusan'];
            if($cari_jurusan != ""){
            $a="SELECT a.id_jurusan, a.nama_jurusan, b.biaya FROM jurusan a INNER JOIN biaya b ON a.id_biaya=b.id_biaya where nama_jurusan like '%".$inputan_pencarian."%' or biaya like '%".$inputan_pencarian."%' order by biaya";
            $b=$koneksi->query($a);
            }else{
            $a="SELECT a.id_jurusan, a.nama_jurusan, b.biaya FROM jurusan a INNER JOIN biaya b ON a.id_biaya=b.id_biaya order by biaya";
            $b=$koneksi->query($a);
            }
            while($c=$b->fetch_array()){
            ?>
            <tr>
                <td><?php echo $c['nama_jurusan'];?></td>
                <td><?php echo $c['biaya'];?></td>
                <td align="center"><a onclick="return confirm ('Yakin Ingin Menghapus Biaya Jurusan Tersebut?')" href="aksihapusadminbiaya.php?id_jurusan= <?php echo $c['id_jurusan']; ?>"><button>Hapus</button></a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
        </div>
        

    </main><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>
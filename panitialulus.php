<?php 
    include "koneksi.php";
    session_start();
    $jurusan = $_SESSION['jurusan'];
    $nama = $_SESSION['username'];
    $sql="SELECT a.password, a.nama, b.nama_jurusan from panitia a INNER JOIN jurusan b ON b.id_jurusan=a.id_jurusan where nama = '$nama'";
    $a=$koneksi->query($sql);
    $data = $a-> fetch_array();
    $_SESSION['username'] = $data['nama'];
    $_SESSION['jurusan'] = $data['nama_jurusan'];
?>
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

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">UIN-Malang</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="panitia.php?nama_jurusan= <?php echo $data['nama_jurusan']; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="panitiainputsoal.php?nama_jurusan= <?php echo $data['nama_jurusan']; ?>">Input Soal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="panitiahasilpeserta.php?nama_jurusan= <?php echo $data['nama_jurusan']; ?>">Hasil Peserta PMB</a>
            </li>
            <li class="nav-item  active">
                <a class="nav-link" href="panitialulus.php?nama_jurusan= <?php echo $data['nama_jurusan']; ?>">Data Peserta Lulus <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="panitiatidaklulus.php?nama_jurusan= <?php echo $data['nama_jurusan']; ?>">Data Peserta Tidak Lulus</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="panitiaditerima.php?nama_jurusan= <?php echo $data['nama_jurusan']; ?>">Data Peserta Diterima</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="index.php">Logout</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

    <main role="main" class="container">

        <div class="text-center mt-5 pt-5">
            <h1>Data Peserta PMB Nilai Memenuhi</h1>
            <center><table width="530" border="1" style="text-align: center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Hasil</th>
                <th>Keterangan</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $no=1;
            $a="SELECT b.id_hasil, b.nilai, c.nama, d.nama_jurusan, b.keterangan FROM hasil b INNER JOIN maba c ON b.id_maba=c.id_maba INNER JOIN jurusan d ON c.id_jurusan=d.id_jurusan where keterangan = 'Memenuhi' AND nama_jurusan = '$jurusan' order by nilai desc";
//            $a="SELECT a.id_lulus, b.nilai, c.nama, d.nama_jurusan FROM lulus a inner join hasil b on a.id_hasil=b.id_hasil INNER JOIN maba c ON b.id_maba=c.id_maba INNER JOIN jurusan d ON c.id_jurusan=d.id_jurusan order by nilai desc";
            $b=$koneksi->query($a);
            while($c=$b->fetch_array()){
            ?>
    
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $c['nama'];?></td>
                <td><?php echo $c['nama_jurusan'];?></td>
                <td><?php echo $c['nilai'];?></td>
                <td><?php echo $c['keterangan'];?></td>
                <td><a href="aksipanitiaterima.php?id_hasil= <?php echo $c['id_hasil']; ?>"><button type="button" class="btn btn-success btn" >Terima</button></a><a href="aksipanitiatidakditerima.php?id_hasil= <?php echo $c['id_hasil']; ?>"><button type="button" class="btn btn-danger btn" >Tidak Diterima</button></a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
                
    </table></center>
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
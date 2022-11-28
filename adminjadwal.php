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
        section legend, h1{
            font-family: 'Bangers', cursive;
            font-size: 40px;
        }
        input[type=submit], input[type=reset]{
            font-size: 15px;
            background: #009973;
            color: white;
            border: white 3px solid;
            border-radius: 10px;
            padding: 10px 15px;
            cursor:pointer;
            margin-top: 10px;
        }
        .satu{
            font-size: 24px;
        }
    </style>
    <style>    
        div.first{background: rgba(0, 128, 0, 0.1);}
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
            <li class="nav-item active">
                <a class="nav-link" href="adminjadwal.php">Jadwal PMB <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adminalur.php">Alur PMB</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adminpersyaratan.php">Persyaratan PMB</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adminbiaya.php">Biaya PMB</a>
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
            <?php
        include "koneksi.php";
        $carikode = $koneksi->query("select max(kode) from jadwal;") or die (mysql_error());
        $datakode = $carikode->fetch_array();
        if($datakode){
            $nilaikode = substr($datakode[0], 1);
            $kode1 = (int) $nilaikode;
            $kode = $kode1 + 1;
            $hasilkode = "J".str_pad($kode, 3, "0", STR_PAD_LEFT);
        }else{
            $hasilkode = "J001";
        }
        ?>
            <fieldset>
            <legend><h1>Form Unggah Jadwal PMB</h1></legend>
            <div class="first">
        <form method="POST" action="aksiadminjadwal.php">
            <table align="center">
                <tr>
                    <td>Kode</td>
                    <td><input type="text" id="kode1" placeholder="Masukkan kode jadwal" name="kode1" style="width:400px; border:1px dotted #c6c9c6; border-radius:4px; -moz-border-radius:4px; background:#f6fff8; height:20px; font-family: 'Handlee', cursive; margin-left:8px;" value="<?php echo $hasilkode;?>"></td>
                </tr>
                <tr>
                    <td>Jadwal</td>
                    <td><input type="text" id="jadwal" placeholder="Masukkan jadwal" name="jadwal" style="width:400px; border:1px dotted #c6c9c6; border-radius:4px; -moz-border-radius:4px; background:#f6fff8; height:20px; font-family: 'Handlee', cursive; margin-left:8px;"></td>
                </tr>
                <tr>
                    <td>Kegiatan</td>
                    <td><input type="text" id="kegiatan" placeholder="Masukkan kegiatannya" name="kegiatan" style="width:400px; border:1px dotted #c6c9c6; border-radius:4px; -moz-border-radius:4px; background:#f6fff8; height:20px; font-family: 'Handlee', cursive;; margin-left:8px;"></td>
                    
                </tr>
            </table>
                <tr>
                    <input type="submit"> <input type="reset">
                </tr>
            </form>
            </div>
            </fieldset>
            
            <p class="satu"><ins><strong>Jadwal PMB</strong></ins></p>
        <table width="530" border="4" align="center">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Jadwal</th>
                <th>Kegiatan</th>
                <th colspan="2">Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $a="SELECT * FROM jadwal";
            $b=$koneksi->query($a);
            while($c=$b->fetch_array()){
            ?>
            <tr>
                <td><?php echo $c['kode'];?></td>
                <td><?php echo $c['tanggal'];?></td>
                <td><?php echo $c['kegiatan'];?></td>
                <td align="center"><a href="admineditjadwal.php?kode=<?php echo $c['kode']; ?>"><button>Edit</button></a><a onclick="return confirm ('Yakin Ingin Menghapus Informasi Alur PMB?')" href="aksihapusadminjadwal.php?kode=<?php echo $c['kode']; ?>"><button>Hapus</button></a></td>
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
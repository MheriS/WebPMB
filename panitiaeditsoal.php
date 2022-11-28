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
            padding: 8px 12px;
            cursor:pointer;
            margin-top: 10px;
        }
        input[type=text]{
            font-size: 12px;
        }
        .satu{
            font-size: 24px;
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
                <a class="nav-link" href="panitia.php?nama_jurusan= <?php echo $data['nama_jurusan']; ?>">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="panitiainputsoal.php?nama_jurusan= <?php echo $data['nama_jurusan']; ?>">Input Soal <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="panitiahasilpeserta.php?nama_jurusan= <?php echo $data['nama_jurusan']; ?>">Hasil Peserta PMB</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="panitialulus.php?nama_jurusan= <?php echo $data['nama_jurusan']; ?>">Data Peserta Lulus</a>
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
    <h3>SILAHKAN INPUT SOAL PILIHAN GANDA DI BAWAH INI!</h3>
            <?php
            $idsoal = $_GET['id'];
            $cariid = $koneksi->query("select a.id, a.soal, a.jawaban, a.jawaban_A, a.jawaban_B, a.jawaban_C, a.jawaban_D, a.jawaban_E, b.nama_jurusan from soal a INNER JOIN jurusan b ON a.id_jurusan=b.id_jurusan where id = '$idsoal';") or die (mysql_error());
            $data = $cariid->fetch_array();
            $_SESSION['id'] = $data['id'];
            ?>
    <fieldset>
            <legend><h1>Form Input Soal PMB<img src="UIN-Malang.jpg" width="100" height="100"></h1></legend>
            <div class="first">
        <center>
        <form method="POST" action="aksipanitiaeditsoal.php" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Soal Untuk Jurusan</td>
                    <td><select id="select" name="jurusan" style="width:805px; border:1px dotted #c6c9c6; border-radius:4px; -moz-border-radius:4px; background:#f6fff8; height:30px; font-family: 'Handlee', cursive;; margin-left:8px;"><option value="<?=$data['nama_jurusan'];?>"><?php echo $data['nama_jurusan'];?></option></select></td>
                </tr>
                <tr>
                    <td>Soal</td>
                    <td><input type="text" id="soal" placeholder="Masukkan soal Anda" name="soal" style="width:800px; border:1px dotted #c6c9c6; border-radius:4px; -moz-border-radius:4px; background:#f6fff8; height:20px; font-family: 'Handlee', cursive;; margin-left:8px;" value="<?php echo $data['soal'];?>"></td>
                </tr>
                <tr>
                    <td>A.</td>
                    <td><input type="text" id="a" placeholder="Masukkan jawaban A" name="a" style="width:800px; border:1px dotted #c6c9c6; border-radius:4px; -moz-border-radius:4px; background:#f6fff8; height:20px; font-family: 'Handlee', cursive; margin-left:8px;" value="<?php echo $data['jawaban_A'];?>"></td>
                </tr>
                
                <tr>
                    <td>B.</td>
                    <td><input type="text" id="b" placeholder="Masukkan jawaban B" name="b" style="width:800px;  border:1px dotted #c6c9c6; border-radius:4px; -moz-border-radius:4px; background:#f6fff8; height:20px; font-family: 'Handlee', cursive;; margin-left:8px;" value="<?php echo $data['jawaban_B'];?>"></td>
                </tr>
                <tr>
                    <td>C.</td>
                    <td><input type="text" id="c" placeholder="Masukkan jawaban C" name="c" style="width:800px; border:1px dotted #c6c9c6; border-radius:4px; -moz-border-radius:4px; background:#f6fff8; height:20px; font-family: 'Handlee', cursive;; margin-left:8px;" value="<?php echo $data['jawaban_C'];?>"></td>
                </tr>
                <tr>
                    <td>D.</td>
                    <td><input type="text" id="d" placeholder="Masukkan jawaban D" name="d" style="width:800px; border:1px dotted #c6c9c6; border-radius:4px; -moz-border-radius:4px; background:#f6fff8; height:20px; font-family: 'Handlee', cursive;; margin-left:8px;" value="<?php echo $data['jawaban_D'];?>"></td>
                </tr>
                <tr>
                    <td>E.</td>
                    <td><input type="text" id="e" placeholder="Masukkan jawaban E" name="e" style="width:800px; border:1px dotted #c6c9c6; border-radius:4px; -moz-border-radius:4px; background:#f6fff8; height:20px; font-family: 'Handlee', cursive;; margin-left:8px;" value="<?php echo $data['jawaban_E'];?>"></td>
                </tr>
                <tr>
                    <td>Kunci Jawaban</td>
                    <td><select id="select" name="kj" style="width:405px; font-size:12px; border:1px dotted #c6c9c6; border-radius:4px; -moz-border-radius:4px; background:#f6fff8; height:20px; font-family: 'Handlee', cursive;; margin-left:8px;">
                    <option>Silahkan Dipilih!</option>
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                    <option>D</option>
                    <option>E</option>
                        </select></td>
                </tr>
            </table>
                <tr>
                    <input type="submit"> <input type="reset">
                </tr>
            </form>
            </center>
            </div>
            </fieldset>
        
        <p class="satu"><ins><strong>Data Soal PMB</strong></ins></p>
        <table width="930" border="1" align="center">
        <thead>
            <tr>
                <th rowspan="5">No</th>
                <th rowspan="5">Soal</th>
                <th colspan="5">Pilihan Ganda</th>
                <th rowspan="5">Jawaban</th>
                <th rowspan="5">Jurusan</th>
                <th rowspan="5">Opsi</th>
            </tr>
            <tr>
                <th>A</th>
                <th>B</th>
                <th>C</th>
                <th>D</th>
                <th>E</th>
            </tr>
        </thead>
        <tbody>
            <?php
//            error_reporting(0);
            $no = 1;
            include "koneksi.php";
            $a="SELECT a.id, a.soal, a.jawaban_A, a.jawaban_B, a.jawaban_C, a.jawaban_D, a.jawaban_E, a.jawaban, b.nama_jurusan FROM soal a INNER JOIN jurusan b ON a.id_jurusan = b.id_jurusan where nama_jurusan = '$jurusan'";
            $b=$koneksi->query($a);
            while($c=$b->fetch_array()){
            ?>
            <tr>
                <th><?php echo $no++; ?></th>
                <td><?php echo $c['soal'];?></td>
                <td><?php echo $c['jawaban_A'];?></td>
                <td><?php echo $c['jawaban_B'];?></td>
                <td><?php echo $c['jawaban_C'];?></td>
                <td><?php echo $c['jawaban_D'];?></td>
                <td><?php echo $c['jawaban_E'];?></td>
                <td><?php echo $c['jawaban'];?></td>
                <td><?php echo $c['nama_jurusan'];?></td>
                <td align="center"><a href="panitiainputsoal.php"><button>Batal</button></a><button>Hapus</button></td>
                
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
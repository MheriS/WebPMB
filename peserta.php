<?php 
session_start();
error_reporting(0);
include "koneksi.php";
$jurusan = $_SESSION['jurusan'];
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
    
    <!-- Kita membutuhkan jquery, disini saya menggunakan langsung dari jquery.com, jquery ini bisa didownload dan ditaruh dilocal -->
      <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
    
</head>

<body>
    
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">UIN-Malang</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="home.php">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

    <main role="main" class="container"> 

        <div class="mt-5 pt-5">
            
            <h1 align="center">Selamat Mengerjakan</h1>
            <h4 align="left" style="color:red; font-size: 16px;">Perhatian! Anda harus mensubmit ujian sebelum waktu ujian habis. Jika tidak anda dianggap tidak hadir.</h4>
            <!-- Script Timer -->
      <script type="text/javascript">
            $(document).ready(function() {
                  /** Membuat Waktu Mulai Hitung Mundur Dengan 
                    * var detik = 0,
                    * var menit = 1,
                    * var jam = 1
                  */
                  var detik = 0;
                  var menit = 1;
                  var jam = 0;
                  
                 /**
                   * Membuat function hitung() sebagai Penghitungan Waktu
                 */
                function hitung() {
                   /** setTimout(hitung, 1000) digunakan untuk 
                     * mengulang atau merefresh halaman selama 1000 (1 detik) 
                   */
                    setTimeout(hitung,1000);
  
                   /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
                   if(menit < 11 && jam == 0){
                         var peringatan = 'style="color:red"';
                   };
  
                   /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
                   $('#timer').html(
                          '<h4 align="right"'+peringatan+'>Sisa waktu anda : &nbsp;&nbsp;&nbsp;' + jam + ' jam : ' + menit + ' menit : ' + detik + ' detik</h4><hr>'
                    );
  
                      /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
                      detik --;
  
                      /** Jika var detik < 0
                        * var detik akan dikembalikan ke 59
                        * Menit akan Berkurang 1
                      */
                     if(detik < 0) {
                            detik = 59;
                            menit --;
  
                           /** Jika menit < 0
                             * Maka menit akan dikembali ke 59
                             * Jam akan Berkurang 1
                           */
                          if(menit < 0) {
                                 menit = 59;
                                 jam --;
  
                               /** Jika var jam < 0
                                 * clearInterval() Memberhentikan Interval dan submit secara otomatis
                               */
                              if(jam < 0) { clearInterval(); 
                                /** Variable yang digunakan untuk submit secara otomatis di Form */
                                var frmSoal = document.getElementById("frmSoal"); 
                                frmSoal.submit(); 
                                document.location='./home.php';
                        } 
                    } 
                } 
            }           
            /** Menjalankan Function Hitung Waktu Mundur */
            hitung();
      }); 
      // ]]>
    </script>
            <div id="timer"></div>
            <?php          
            if($_POST["Submit"]){
                $username = $_SESSION['username'];
                $jawaban = $_POST["jawaban"];
                $benar=0;
                if(count($jawaban) < 1){
                    echo "<br>Anda Belum Menjawab Soal Satupun!!!";
                }else{
//                    echo "Anda sudah memilih...";
                    foreach($jawaban as $no => $nilai){
                        $data_soal = "SELECT * FROM soal where id='$no'";
                        $ds=$koneksi->query($data_soal);
                        $data_jawab = $ds->fetch_array();
                        if($data_jawab["jawaban"] == $nilai){
                            $benar= $benar+1;
                        }
                    }
                    $jumlah_soal = "SELECT a.id, a.soal, a.jawaban_A, a.jawaban_B, a.jawaban_C, a.jawaban_D, a.jawaban_E, a.jawaban, b.nama_jurusan FROM soal a INNER JOIN jurusan b ON a.id_jurusan=b.id_jurusan where nama_jurusan = '$jurusan'";
                    $js=$koneksi->query($jumlah_soal);
                    $jum_soal = mysqli_num_rows($js);
                    $nilai_per_soal = 100 / $jum_soal;
                    $jawaban_salah = $jum_soal - $benar;
                    $presentase_benar = round($benar / $jum_soal * 100,2)."%";
                    $presentase_salah = round($jawaban_salah / $jum_soal * 100,2)."%";
                    $save = $nilai_per_soal * $benar;
                    echo "<h1>Hasil Jawaban Anda:</h1>";
                    echo "Presentase Jawaban Benar: ".$presentase_benar;
                    echo "<br>Presentase Jawaban Salah: ".$presentase_salah;
                    echo "<h2>Nilai: ". $save . "</h2>";
                    if($save >= 75){
                        $ket = 'Memenuhi';
                    }else{
                        $ket = 'Tidak Memenuhi';
                    }
                    $sql ="INSERT INTO hasil (nilai, id_maba, keterangan) VALUES ('".$save."',(SELECT id_maba from maba where nama='$username'),'".$ket."')";
//                    $sql ="INSERT INTO hasil (nilai, id_selesai_bayar) VALUES ('".$save."',(SELECT a.id_maba, b.nama from selesai_bayar a INNER JOIN maba b ON a.id_maba=b.id_maba where nama='$username'))";
                    $a=$koneksi->query($sql);
                    if($a === true){
            ?>
                <script language="JavaScript">
                    alert('Perhatian! Catat hasil ujian anda di kertas untuk dijadikan komplain apabila nilai tidak cocok ...');
                </script>
            <?php
                    }else{
                        echo "<div><b>Oops!</b> 404 Error Server.</div> " . mysqli_error($koneksi);
                    }
                }
            }

            $no=0;
            $a="SELECT a.id, a.soal, a.jawaban_A, a.jawaban_B, a.jawaban_C, a.jawaban_D, a.jawaban_E, a.jawaban, b.nama_jurusan FROM soal a INNER JOIN jurusan b ON a.id_jurusan=b.id_jurusan where nama_jurusan = '$jurusan' order by rand()";
            $b=$koneksi->query($a);
            echo "<form action='' id='frmSoal' method='post'>";
            while($c=$b->fetch_array()){
            $no++;
                echo $no.". ".$c["soal"]."<br>";
                echo "a. <input type='radio' id='jwb' value='a' name='jawaban[".$c["id"]."]'/>".$c["jawaban_A"]."<br>";
                echo "b. <input type='radio' id='jwb' value='b' name='jawaban[".$c["id"]."]'/>".$c["jawaban_B"]."<br>";
                echo "c. <input type='radio' id='jwb' value='c' name='jawaban[".$c["id"]."]'/>".$c["jawaban_C"]."<br>";
                echo "d. <input type='radio' id='jwb' value='d' name='jawaban[".$c["id"]."]'/>".$c["jawaban_D"]."<br>";
                echo "e. <input type='radio' id='jwb' value='e' name='jawaban[".$c["id"]."]'/>".$c["jawaban_E"]."<br><br>";
            }
            ?>
            <input type="submit" name="Submit" value="Selesai" onclick="return confirm('Perhatian! Apakah Anda sudah yakin dengan semua jawaban Anda?')">
            <?php
            echo "</form>";
            ?>
        </div>
            

    </main><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<?php
$kode = $_POST['kode1'];
$jadwal = $_POST['jadwal'];
$kegiatan = $_POST['kegiatan'];

    include "koneksi.php";
    $sql ="INSERT INTO jadwal (kode, tanggal, kegiatan) VALUES ('".$kode."','".$jadwal."','".$kegiatan."')";
    $a=$koneksi->query($sql);
    if($a === true){
            ?>
                <script language="JavaScript">
                    alert('Good! Input jadwal untuk informasi PMB berhasil ...');
                    document.location='./adminjadwal.php';
                </script>
            <?php
   }else{
            echo "<div><b>Oops!</b> 404 Error Server.</div> " . mysqli_error($koneksi);
   }
?>
<?php 
$kodejadwal = $_POST['kode1'];

            $jadwal =$_POST['jadwal'];
            $kegiatan = $_POST['kegiatan'];
            include "koneksi.php";
            $sql ="UPDATE `jadwal` SET `tanggal`='$jadwal', `kegiatan`='$kegiatan' WHERE  `kode`='$kodejadwal';";
            $a=$koneksi->query($sql);
            if($a === true){
            ?>
                <script language="JavaScript">
                    alert('Good! Edit jadwal untuk informasi PMB berhasil ...');
                    document.location='./adminjadwal.php';
                </script>
            <?php
            }else{
                echo "<div><b>Oops!</b> 404 Error Server.</div> " . mysqli_error($koneksi);
            }
?>
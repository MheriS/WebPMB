<?php
include "koneksi.php";
$kode = $_GET['kode'];
if(isset($kode)){
        $sql ="DELETE FROM `jadwal` WHERE  `kode`='$kode'";
        $a = $koneksi->query($sql);
    if($a === true){
            ?>
                <script language="JavaScript">
                    alert('Good! Hapus jadwal berhasil ...');
                    document.location='./adminjadwal.php';
                </script>
            <?php
   }else{
            echo "<div><b>Oops!</b> 404 Error Server.</div> " . mysqli_error($koneksi);
   }
}
?>
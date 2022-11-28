<?php
include 'koneksi.php';
$id = $_GET['id'];

        $sql ="DELETE FROM persyaratan WHERE id = '$id'";
        $a = $koneksi->query($sql);
    if($a === true){
            ?>
                <script language="JavaScript">
                    alert('Good! Hapus data untuk informasi persyaratan berhasil ...');
                    document.location='./adminpersyaratan.php';
                </script>
            <?php
   }else{
            echo "<div><b>Oops!</b> 404 Error Server.</div> " . mysqli_error($koneksi);
   }

?>
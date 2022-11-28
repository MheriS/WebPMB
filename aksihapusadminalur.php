<?php
$id = $_GET['id'];
    include "koneksi.php";    
        $sql ="delete from alur where id = '$id'";
        $a=$koneksi->query($sql);
    if($a === true){
            ?>
                <script language="JavaScript">
                    alert('Good! Hapus gambar untuk informasi alur berhasil ...');
                    document.location='./adminalur.php';
                </script>
            <?php
   }else{
            echo "<div><b>Oops!</b> 404 Error Server.</div> " . mysqli_error($koneksi);
   }
?>
<?php
include 'koneksi.php';
$id = ($_GET['id_jurusan']);
if(isset($id)){
        
        $sql ="DELETE FROM `jurusan` WHERE  `id_jurusan`='$id'";
        $a = $koneksi->query($sql);
    if($a === true){
            ?>
                <script language="JavaScript">
                    alert('Good! Hapus biaya berhasil ...');
                    document.location='./adminbiaya.php';
                </script>
            <?php
   }else{
            echo "<div><b>Oops!</b> 404 Error Server.</div> " . mysqli_error($koneksi);
   }
}
?>
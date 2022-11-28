<?php
if ($_POST['Submit'] == "Submit") {
    $gambaralur = $_FILES['gambaralur']['tmp_name'];
    $targetgambaralur = 'img/';
    $nama_gambaralur = $_FILES['gambaralur']['name'];
    $pindah = move_uploaded_file($gambaralur, $targetgambaralur.$nama_gambaralur);
    
    include "koneksi.php";    
        $sql ="INSERT INTO alur (gambar) VALUES ('$nama_gambaralur')";
        $a=$koneksi->query($sql);
    if($a === true){
            ?>
                <script language="JavaScript">
                    alert('Good! Input gambar untuk informasi alur berhasil ...');
                    document.location='./adminalur.php';
                </script>
            <?php
   }else{
            echo "<div><b>Oops!</b> 404 Error Server.</div> " . mysqli_error($koneksi);
   }
}
?>
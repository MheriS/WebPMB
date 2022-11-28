<?php
// Include file konfigurasi database
include 'koneksi.php';

//        $cariid = $koneksi->query("select max(id) from persyaratan;") or die (mysql_error());
//        $dataid = $cariid->fetch_array();
//        if($dataid){
//            $nilaiid = substr($dataid[0], 3);
//            $id1 = (int) $nilaiid;
//            $id = $id1 + 1;
//            $hasilid = "PER".str_pad($id, 3, "0", STR_PAD_LEFT);
//        }else{
//            $hasilid = "PER001";
//        }

if(isset($_POST['submit'])){
    $editorcontent = $_POST['editor'];
    
    //periksa apakah konten editor kosong
    if(!empty($editorcontent)){
        //masukkan konten editor ke dalam database
        $insert = "INSERT INTO persyaratan (content, created) values ('".$editorcontent."', NOW())";
        $a=$koneksi->query($insert);
        
        if($a === true){
            ?>
            <script language="JavaScript">
                    alert('Good! Informasi persyaratan telah berhasil diinputkan');
                    document.location='./adminpersyaratan.php';
            </script> <?php
        }else{
            ?><script language="JavaScript">
                    alert('Beberapa masalah terjadi, silakan coba lagi beberapa saat lagi.');
                    document.location='./adminpersyaratan.php';
            </script> <?php
        }
    }
}
?>
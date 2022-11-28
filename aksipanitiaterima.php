<?php
        include "koneksi.php";
        $id = $_GET['id_hasil'];

        $carikode = $koneksi->query("select max(id_diterima) from diterima where status = 1;") or die (mysql_error());
        $datakode = $carikode->fetch_array();
        if($datakode){
            $nilaikode = substr($datakode[0], 7);
            $kode1 = (int) $nilaikode;
            $kode = $kode1 + 1;
            $hasilkode = "SELAMAT".str_pad($kode, 3, "0", STR_PAD_LEFT);
        }else{
            $hasilkode = "SELAMAT001";
        }

        $cekinput = $koneksi->query("SELECT id_hasil FROM diterima where id_hasil = '$id'");
if(mysqli_num_rows($cekinput) > 0){
    echo '<script language="javascript">
              alert ("Peserta tersebut telah diterima, silahkan cek di Data Peserta Diterima!");
              window.location="panitialulus.php";
              </script>';
}else{
        $inputid = $koneksi->query("insert into diterima (id_diterima, id_hasil,status) values ('".$hasilkode."','".$id."',1)");
        if($inputid === true){
            ?>
                <script language="JavaScript">
                    alert('Good! Input peserta diterima berhasil ...');
                    document.location='./panitiaditerima.php';
                </script>
            <?php
   }else{
            echo "<div><b>Oops!</b> 404 Error Server.</div> " . mysqli_error($koneksi);
   }
}
?>
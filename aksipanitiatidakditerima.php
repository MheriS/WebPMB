<?php
        include "koneksi.php";
        $id = $_GET['id_hasil'];

        $carikode = $koneksi->query("select max(id_diterima) from diterima where status = 0;") or die (mysql_error());
        $datakode = $carikode->fetch_array();
        if($datakode){
            $nilaikode = substr($datakode[0], 4);
            $kode1 = (int) $nilaikode;
            $kode = $kode1 + 1;
            $hasilkode = "MAAF".str_pad($kode, 3, "0", STR_PAD_LEFT);
        }else{
            $hasilkode = "MAAF001";
        }

        $inputid = $koneksi->query("insert into diterima (id_diterima, id_hasil,status) values ('".$hasilkode."','".$id."',0)");
        if($inputid === true){
            ?>
                <script language="JavaScript">
                    alert('Good! Input peserta tidak diterima berhasil ...');
                    document.location='./panitiaditerima.php';
                </script>
            <?php
   }else{
            echo "<div><b>Oops!</b> 404 Error Server.</div> " . mysqli_error($koneksi);
   }
?>
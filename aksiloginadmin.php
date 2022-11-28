<?php
session_start();
include "koneksi.php";
$msg = '';
if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $user = mysqli_real_escape_string($koneksi,$_POST['username']);
    $psw = mysqli_real_escape_string($koneksi,$_POST['password']);
    $sql="SELECT password, nama from admin where nama = '$user' and password = '$psw'";

    $a=$koneksi->query($sql);
    if (mysqli_num_rows($a) > 0) {
        $data = $a-> fetch_array();
//        if ($data['password'] == $psw)
        $_SESSION['username'] = $data['nama'];
        $_SESSION['status'] = "login";
//                  $_SESSION['valid'] = true;
//                  $_SESSION['timeout'] = time();
//                  $user = 'username';
                  
            ?>
                <script language="JavaScript">
                    alert('Good! Login berhasil ...');
                    document.location='./admin.php?nama= <?php echo $data['nama']; ?>';
                </script>
            <?php
    }
}
if(isset($eror)); ?>
<p style="color: red; font-style: italic;">ID / Password Salah</p>
<? 
endif;?>
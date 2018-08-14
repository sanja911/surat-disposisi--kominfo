<?php
session_start();
include('../config/koneksi.php');
$username_user = $_POST['username_user'];
$password_user = $_POST['password_user'];
$op = $_GET['op'];
if($op=="in"){
    $sql ="SELECT * FROM user WHERE username_user='$username_user' AND password_user='$password_user  '";
    $hasil= mysqli_query($db,$sql);
    $rows=mysqli_num_rows($hasil);
    if($rows==1){//jika berhasil akan bernilai 1
        $qry = mysqli_fetch_array($hasil);
        $_SESSION['username_user'] = $qry['username_user'];
        $_SESSION['nama_user'] = $qry['nama_user'];
        $_SESSION['level'] = $qry['level'];
        if($qry['level']=="admin"){
            header("location:../formadmin");
        }
        else if($qry['level']=="user"){
            header("location:../formuser");
        }
    }else{
        ?>
        <script language="JavaScript">
            alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
            document.location='index.php';
        </script>
        <?php
    }
}else if($op=="out"){
    unset($_SESSION['username_user']);
    unset($_SESSION['level']);
    header("location:login-multiuser-php-mysql.php");
}
?>
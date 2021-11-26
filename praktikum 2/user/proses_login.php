        <?php 
    if($_POST){
        $username=$_POST['username'];
        $password=$_POST['password'];
        // if(empty($username)){
        //     echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
        // } elseif(empty($password)){
        //     echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
        // } else {
            include "koneksi.php";
            $query_login=mysqli_query($koneksi,"SELECT * from siswa where username = '".$username."' and password = '".md5($password)."'");
            if(mysqli_num_rows($query_login)>0){
                $dt_login=mysqli_fetch_array($query_login);
                session_start();
                $_SESSION['id_siswa']=$dt_login['id_siswa'];
                $_SESSION['nama_siswa']=$dt_login['nama_siswa'];
                $_SESSION['status_login']=true;
                header("location: home.php");
            //     ecjp "<script>alert('Login  berhasil');location.href='home.php';</script>";
            // } else {
            //     echo "<script>alert('Login Gagal');location.href='index.php';</script>";
            // }
        }
    }
?>


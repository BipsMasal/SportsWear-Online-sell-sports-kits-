<?php
include 'connect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];

        if($username==NULL){
            echo "<script>alert('Enter Username')</script>";
            header('location:index.php');
        }
        else if($password==NULL){
            echo "<script>alert('Enter Password')</script>";
            header('location:index.php');
        }
        else{
            $sql="SELECT * FROM users
            where Username='$username' AND Password='$password' ";
            $result=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($result);
            if($num==1){
                $_SESSION['username']=$username;
                $_SESSION['loggedin']=true;
                $_SESSION['test']="HELLO";
                header('location:index.php');
            }
            else{
                echo "<script>alert('User not found, Please register')</script>";
                header('location:error.php');
            }
        }
    }
}
?>
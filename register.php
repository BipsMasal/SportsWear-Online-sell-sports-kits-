<?php
include 'connect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['register'])){
        $username=$_POST['username'];
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $repassword=$_POST['repassword'];

        if($username==NULL){
            echo "<script>alert('Enter Username')</script>";
            header('location:index.php');
            
        }
        else if($fullname==NULL){
            echo "<script>alert('Enter your name')</script>";
            header('location:index.php');
            
        }
        else if($email==NULL){
            echo "<script>alert('Enter your email')</script>";
            header('location:index.php');
            
        }
        else if($password==NULL){
            echo "<script>alert('Enter your password')</script>";
            header('location:index.php');
            
        }
        else if($repassword==NULL){
            echo "<script>alert('Enter your re-password')</script>";
            header('location:index.php');
            
        }
        else if($password!=$repassword){
            echo "<script>alert('Passwords does not match, Try Again')</script>";
            header('location:index.php');
        }
       
        else{
            $sql="INSERT INTO users(FullName,Username,Email,Password)
        values('$fullname','$username','$email','$password')
        ";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "<script>alert('Account Created, Please Login In')</script>";
            header('location:index.php');
        }
        else{
            echo "<script>alert('Error, Please Register Again')</script>";
            header('location:index.php');
        }
        }

    }
}
?>
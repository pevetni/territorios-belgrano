<?php
error_reporting(0);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$user_email=$_POST['lg_username'];  
$user_pass=$_POST['lg_password']; 

if($user_email && $user_pass)  
{  
    $dbcon = new mysqli('mysql.hostinger.com.ar','u568085940_belg', 'Jeremias1023', 'u568085940_telef'); 
  
    $check_user="select * from usuarios WHERE usuario='$user_email' AND contrasenia='$user_pass'";  
  
    $run=mysqli_query($dbcon,$check_user);  
  
    if(mysqli_num_rows($run))  
    {
        $dbcon->close();
        session_start();
        $_SESSION['email']=$user_email;//here session is used and value of $user_email store in $_SESSION.  
        echo "<script>window.open('../welcome.php','_self')</script>";  
    }  
    else  
    {  
      echo "<script>alert('Usuario o contraseña son incorrectos!')</script>";  
    }  
    $dbcon->close();
}  
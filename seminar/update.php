<?php
$server_name="localhost";
$user_name="root";
$password="root";
$database_name="seminar";

$conn = mysqli_connect($server_name,$user_name,$password,$database_name);
if(!$conn){
    die("Connection Failed" . mysqli_connect_error());
}
if(isset($_POST['submit'])){
    $user4=$_POST["username"];
    $pass4=$_POST['password'];
    $confirmpass2= $_POST['confirmpassword'];
}
if($pass4==$confirmpass2){
$flag=true;
$query ="SELECT * FROM register";
$result = $conn->query($query);

if($result->num_rows >0){
    while($row = $result->fetch_assoc()){
        if($row['user'] == $user4){
                $flag=false;
                $query ="UPDATE register SET pass='$pass4' where user='$user4';";
                $result = $conn->query($query);
                echo '<script>alert("Password changed succesfully")</script>';
                echo '<script>window.location.href="update.html";</script>';
            }
             else{
                 echo '<script>alert("user doesnt exist!")</script>';
                 echo '<script>window.location.href="register.html";</script>';
             }
    } } }
    else{
        echo '<script>alert("New password and Confirm new password must be same")</script>';
        echo '<script>window.location.href="update.html";</script>';
    }
?>
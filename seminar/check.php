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
    $user2=$_POST["username"];
    $pass2=$_POST['password'];
}
$flag=true;
$query ="SELECT user,pass FROM register";
$result = $conn->query($query);

if($result->num_rows >0){
    while($row = $result->fetch_assoc()){
        if($row['user'] == $user2){
            if($row['pass'] == $pass2){
                $flag=false;
                echo '<script>alert("hurray....login succesful")</script>';
                echo '<script>window.location.href="success.html";</script>';
            }
             else{
                 $flag=false;
                 echo '<script>alert("please enter correct details!")</script>';
                 echo '<script>window.location.href="login.html";</script>';
             }
        }
    } }
    if($flag){
        echo '<script>alert("User doesnt exist..please register!")</script>';
        echo '<script>window.location.href="register.html";</script>';
    }

?>
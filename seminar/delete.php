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
    $user3=$_POST["username"];
}
$flag=true;
$query ="SELECT * FROM register";
$result = $conn->query($query);

if($result->num_rows >0){
    while($row = $result->fetch_assoc()){
        if($row['user'] == $user3){
                $flag=false;
            }
    } }
    if($flag==false){
        $query ="DELETE FROM register where user='$user3';";
        $result = $conn->query($query);
        echo '<script>alert("user deleted succesfully")</script>';
        echo '<script>window.location.href="delete.html";</script>';
    }
    else{
        echo '<script>alert("user doesnt exist!")</script>';
        echo '<script>window.location.href="register.html";</script>';
    }
?>
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
    $user1=$_POST["username"];
    $pass1=$_POST['password'];
    $confirmpass= $_POST['confirmpassword'];

}
if($pass1== $confirmpass){
$flag=true;
$query ="SELECT user,pass FROM register";
$result = $conn->query($query);

if($result->num_rows >=0){
    while($row = $result->fetch_assoc()){
        if($row['user'] == $user1){
                $flag=false;
                echo '<script>alert("user already exists")</script>';
                echo '<script>window.location.href="register.html";</script>';
            }
        }
    if($flag){
        $sql_query = "INSERT INTO register(user,pass) VALUES ('$user1','$pass1')";
        mysqli_query($conn, $sql_query);
        echo '<script>alert("user added succesfully.....")</script>';
        echo '<script>window.location.href="login.html";</script>'; 
    }
    }
}
else{
    echo '<script>alert("password and confirm password must be same")</script>';
    echo '<script>window.location.href="register.html";</script>';
};


?>
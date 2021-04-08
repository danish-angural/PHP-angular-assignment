<?php 

session_start();
include 'db_conn.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
	
	$email = $_POST['email'];
	$password1 = $_POST['password1'];
    $username = $_POST['username'];
	$password2 = $_POST['password2'];

	if (empty($email)) {
		header("Location: login.php?error=Email is required");
	}else if (empty($password1) || empty($password2) ){
		header("Location: login.php?error=Password is required");
	}else  if(empty($username)){
        header("Location: login.php?error=username is required");
    }
    else{
		$query=$conn->prepare("INSERT INTO users (email, password, query, sorted) VALUES ('$t', '$u', '$q', '$f')");
		$query->execute([]);
		if($query){
		 $_SESSION["message"]='your query has been registered';
	 
        }
    }
?>
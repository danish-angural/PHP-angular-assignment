<?php 

session_start();
include 'db_conn.php';
ini_set('display_errors', 1);
if (isset($_POST['email']) && isset($_POST['password1'])) {
	
	$email = $_POST['email'];
	$password1 = $_POST['password1'];
    $username = $_POST['username'];
	$password2 = $_POST['password2'];

	if (empty($email)) {
		$_SESSION["message"]='email required';
		header("Location: login.php");	}
		else if (empty($password1) || empty($password2 || $password1!=$password2) )
		{
		$_SESSION["message"]='Same password required twice';
		header("Location: login.php");
		}else
		if(empty($username)){
		$_SESSION["message"]='Username required';
		header("Location: login.php");    
	}
	else{
		$q1=$conn->prepare("SELECT * FROM users WHERE email='email' OR username='$username'");
		$q1->execute([]);
		if(count($q1->fetchAll())>0){
			echo count($q1->fetchAll());
			// $_SESSION["message"]='Username or email taken';
			// header("Location: login.php");
		}

    else{
		$p=password_hash($password1, PASSWORD_DEFAULT);
		$query=$conn->prepare("INSERT INTO users (email, password, username) VALUES('$email','$p', '$username')");
		$query->execute([]);
		if($query){
			$stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
			$stmt->execute([$email]);
				$user = $stmt->fetch();
	
				$user_id = $user['id'];
				$user_email = $user['email'];
				$user_password = substr($user['password'], 0, 60);
				$user_full_name = $user['username'];
				$isadmin=$user['isadmin'];
				$_SESSION['user_id'] = $user_id;
					$_SESSION['user_email'] = $user_email;
					$_SESSION['username'] = $user_full_name;
					$_SESSION['isadmin']=$isadmin;
		 $_SESSION["message"]='you have been registered.';
			header('Location: index.php');
        }
		else echo($query);
    }
}
}
?>
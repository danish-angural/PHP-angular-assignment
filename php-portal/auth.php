<?php 

session_start();
include 'db_conn.php';
if (isset($_POST['email']) && isset($_POST['password'])) {
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	if (empty($email)) {
		header("Location: login.php?error=Email is required");
	}else if (empty($password)){
		header("Location: login.php?error=Password is required");
	}else {
		$stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
		$stmt->execute([$email]);
		$num=$stmt->rowCount();
		if ($stmt->rowCount() === 1) {
			$user = $stmt->fetch();

			$user_id = $user['id'];
			$user_email = $user['email'];
			$user_password = substr($user['password'], 0, 60);
			$user_full_name = $user['username'];
			$isadmin=$user['isadmin'];
			if ($email === $user_email) {
				if (password_verify($password, $user_password)) {					
					$_SESSION['user_id'] = $user_id;
					$_SESSION['user_email'] = $user_email;
					$_SESSION['username'] = $user_full_name;
					$_SESSION['isadmin']=$isadmin;
					if($isadmin==0){
						$query=$conn->prepare("SELECT * FROM queries where sender=?");
					}
					else{
						$query=$conn->prepare("SELECT * FROM queries where target=?");
					}
   					$query->execute([$user_full_name]);
					$_SESSION['queries']= $query->fetchAll();
					if($isadmin==1){
						// print_r(json_encode($_SESSION['queries']));
						header("Location: admin.php");
					}
					else{
						header("Location: index.php");
					}

				}else {
					$_SESSION['message']="Incorect User name or password";
					header("Location: login.php");
				}
			}else {
				$_SESSION['message']="Incorect User name or password";
				header("Location: login.php");
			}
		}else {
			$_SESSION['message']="User name does not exist";
			header("Location: login.php");
		}
	}
}

<?php 
  session_start();
  if($_SESSION['isadmin']==0){
      header("Location: login.php");
  }
  if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HOME</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
</head>
<style>
button{
  height: 100%;
  width: 100%;
  border: 0;
  background: beige;
}
.container{
	width: 50%;
	background: transparent;
  color: white;
}
.form-group{
	margin-top: 10%;
}
textarea{
  background: transparent;
}
body{
  background-image: url("https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.Fl5YBka1VUVQSwRVpwAinAHaDW%26pid%3DApi&f=1");
	background-size: cover;
	background-repeat: no-repeat;
  background-attachment: fixed;
}

@media only screen and (max-width: 600px) {
  .container{ width: 100%;}
  h3{
    font-size: 20px;
    margin-left: 0;
  }
}

table{
  border-collapse: separate;
  border-spacing:  5px 5px;
}
.target{
  width: 20%;
  border-radius: 5px;
}
.query{
  width: 70%;
  border-radius: 5px;
}
.resolved{
  width: 10%;
  border-radius: 5px;
}
th{
  color: white;
}
hr.solid{
  border-top: 3px solid #bbb;
}
</style>

<body>
<a href="logout.php" class="btn btn-warning" style="position: absolute; right: 0; margin-right: 5vw; margin-top: 5vw;">LOGOUT</a>
<div class="d-flex justify-content-center align-items-center flex-column" style="min-height: 20vh;">
	 	<i class="bi bi-person-fill" style="font-size: 10rem;  color:#5C4033" ></i>
        <h1 class="text-center display-4" style="margin-top: -60px;font-size: 2rem;  color:white"><?=$_SESSION['username']?></h1>

	 </div>
   <div class='container'>
   <h3 style=" margin-top: 5%; color: white"> YOUR PENDING QUERIES</h3>
	<table style="margin: auto; margin-bottom: 5%;">
  <tr>
  <th><b>From</b></th>
  <th><b>Query</b></th>
  <th><b>resolved</b></th>
  </tr>
  <?php for ($i=0; $i<count($_SESSION['queries']) && $_SESSION['queries'][$i]['sorted']==0; $i++) {
    echo "<tr style=background:".($_SESSION['queries'][$i]['sorted'] ? 'lightgreen': 'red').">";
    echo "<td class='target'>";
  echo($_SESSION['queries'][$i]['sender']);
  echo "</td>";
  echo "<td class='query'>";
  echo($_SESSION['queries'][$i]['query']);
  echo "</td>";
  echo "<td>";
  echo($_SESSION['queries'][$i]['sorted'] ? "yes":"no");
  echo "</td>";
  echo "<td>";
  echo("<form action='resolve.php' method='post'><input value='$t' type='hidden' name='id[]'><input value=$i type='hidden' name='id[]'><button type='submit'>resolved</button></form>");
  echo "</td>";
  echo "</tr>";
} ?>
  </table>
  </div>
  <hr class='solid'>

  <div class='container'>
<h3 style="margin-top: 5%; color: white"> YOUR RESOLVED QUERIES</h3>
	<table style="margin: auto; margin-bottom: 5%;">
  <tr>
  <th><b>From</b></th>
  <th><b>Query</b></th>
  <th><b>resolved</b></th>
  </tr>
  <?php for ($i=0; $i<count($_SESSION['queries']) && $_SESSION['queries'][$i]['sorted']; $i++) {
    echo "<tr style=background:".($_SESSION['queries'][$i]['sorted'] ? 'lightgreen': 'red').">";
    echo "<td class='target'>";
  echo($_SESSION['queries'][$i]['sender']);
  echo "</td>";
  echo "<td class='query'>";
  echo($_SESSION['queries'][$i]['query']);
  echo "</td>";
  echo "<td>";
  echo($_SESSION['queries'][$i]['sorted'] ? "yes":"no");
  echo "</td>";
  echo "</tr>";
} ?>
  </table>
  </div>
</body>
</html>
<?php 
}else {
   header("Location: login.php");
}
 ?>

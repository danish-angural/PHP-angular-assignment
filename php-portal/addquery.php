<?php 
    include "db_conn.php";
    session_start();
    ini_set('display_errors', 1);
   $t=$_POST['target'];
   $q=$_POST['query'];
   $u=$_SESSION['username'];
   $f=0;
   if($t=="" || $q==""){
       $_SESSION['message']='enter all fields';
       header("Location: index.php");
   }
   $query=$conn->prepare("INSERT INTO queries (target, sender, query, sorted) VALUES ('$t', '$u', '$q', '$f')");
   $query->execute([]);
   if($query){
    $_SESSION["message"]='your query has been registered';
    $query=$conn->prepare("SELECT * FROM queries where sender=?");
   					$query->execute([$u]);
					$_SESSION['queries']= $query->fetchAll();
    header("Location: index.php");
   }
   else{
       $_SESSION['message']='some sql error';
       header("Location: index.php/?error=some sql error");
   }
?>

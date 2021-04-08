<?php
session_start();
ini_set('display_errors', 1);
include 'db_conn.php';
if($_SESSION['username']){
    if($_POST['id']){
        $id=$_POST['id'];
        print_r($_POST);
        $query=$conn->prepare("UPDATE queries SET sorted=1 WHERE id=?");
        $query->execute([$id[0]]);
        if($query){
            $_SESSION['queries'][$id[1]]['sorted']=1;
            header("Location: admin.php");
        }
    }
}
?>
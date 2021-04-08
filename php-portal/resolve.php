<?php
session_start();
ini_set('display_errors', 1);
include 'db_conn.php';
if($_SESSION['username']){
    if($_POST['id']){
        $id=$_POST['id'];
        print_r($_POST);
        $c=$_POST['comment'];
        $query=$conn->prepare("UPDATE queries SET sorted=1, comment='$c' WHERE id=?");
        $query->execute([$id[0]]);
        if($query){
            $_SESSION['queries'][$id[1]]['sorted']=1;
            $_SESSION['queries'][$id[1]]['comment']=$c;
            print($id);
            header("Location: admin.php");
        }
    }
}
?>
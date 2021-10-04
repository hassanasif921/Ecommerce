<?php
$id=$_GET['id'];
include 'conn.php';
$query="delete from product where id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('Location:viewproduct.php');
}else{
    echo "Failed";
}

?>
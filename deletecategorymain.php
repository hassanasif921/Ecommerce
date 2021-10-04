<?php
$id=$_GET['id'];
include 'conn.php';
$query="delete from category_main where id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('Location:viewcategorymain.php');
}else{
    echo "Failed";
}

?>
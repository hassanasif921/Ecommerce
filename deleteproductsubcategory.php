<?php
$id=$_GET['id'];
include 'conn.php';
$query="delete from product_sub_category where id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('Location:viewproductsubcategory.php');
}else{
    echo "Failed";
}

?>
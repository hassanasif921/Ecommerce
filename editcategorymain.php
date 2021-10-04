<?php
include 'conn.php';
$id=$_GET['id'];  // getting id from url
$query2="select * from category_main where id=".$id;  //getting data from product table based on given id
$result2=mysqli_query($conn,$query2); //executing query
$row2=mysqli_fetch_row($result2);  //fetching data


if(isset($_POST['btnSubmit']))
{  
    $catid=$_POST['catid'];
    $catname=$_POST['catname'];
   
    $query1="update category_main set id='$catid',name='$catname' where id='$id'";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
        header("Location:viewcategorymain.php");
    }else{
        echo mysqli_error($conn);
    }
}
include 'header.php';

?>
    <section id="main-content">
      <section class="wrapper">

<div class="content">
<form method="POST">

    <label for="catid">Category Main Id</label><br>
    <input type="text" name="catid" value="<?php echo $row2[0];?>" ><br>

    <label for="catname">Category Main Name</label><br>
    <input type="text" name="catname" value="<?php echo $row2[1];?>" ><br>

    <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>
</div>
</section>
</section>
<?php
include 'Footer.php';
?>
<?php
include "conn.php";

if(isset($_POST['btnSubmit']))
{
    $catid=$_POST['catid'];
    $catname=$_POST['catname'];

    $query1="insert into category_main(id, name)values('$catid', '$catname')";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
      // echo "<script>window.location.href ='index.php'</script>";
      echo "<script>alert('Category Main Added Successfully')</script>";
//       header("Location:ViewService.php");       
    }else{
        // echo mysqli_error($conn);

        echo "<script>alert('Some Error Occured')</script>";
    }
} 
include "Header.php";

?>
<div class="container">
<form method="POST" enctype="multipart/form-data">
<center>
<h1 style="align:center">Add New Category</h1>
</center>
  <div class="form-group">
    <label for="catname">Name</label>
    <input type="text" required class="form-control" name="catname" placeholder="Enter Category Main Name" id="ServiceDesc">
  </div>

  <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>
</div>


<?php
// }
include "Footer.php";
?>
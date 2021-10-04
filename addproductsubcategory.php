<?php
include "conn.php";
$queryclass="Select * from category_main";
$resultclass=mysqli_query($conn,$queryclass);


if(isset($_POST['btnSubmit']))
{
    $subcategoryid=$_POST['subcategoryid'];
    $subcategoryname=$_POST['subcategoryname'];
    $maincategory=$_POST['maincategory'];

    $query1="insert into product_sub_category(id, name_of_sub_category, main_category_id)values('$subcategoryid', '$subcategoryname', '$maincategory')";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
      echo "<script>alert('Product Sub Category Added Successfully')</script>";
//       header("Location:home.php");       
    }else{
         echo mysqli_error($conn);

//        echo "<script>alert('Some Error Occured')</script>";
    }
} 
include "header.php";


?>
    <section id="main-content">
      <section class="wrapper">

<div class="container">
<form method="POST" enctype="multipart/form-data">

<div class="form-group">
    <label for="subcategoryid"><h4 style="color: white"> Id</h4></label>
    <input type="text" required class="form-control" name="subcategoryid" placeholder="Enter Sub Category Id" style="width:50%; " id="Month">
  </div>  

  <div class="form-group">
    <label for="subcategoryname"><h4 style="color: white"> Name</h4></label>
    <input type="text" required class="form-control" name="subcategoryname" placeholder="Enter Sub Category Name" style="width:50%; " id="Month">
  </div>  


<label for="maincategory"><h4 style="color: blue">Main Category</h4></label><br/>
    <select name="maincategory" >
        <?php
        while($rowclass=mysqli_fetch_array($resultclass))
        {
        ?>
                <option value=<?php echo $rowclass['id'];?>>
                <?php echo $rowclass['name'];?>
                </option>
        <?php
        }
        ?>
    </select>
  </div>

  <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>
</div>
</section>
</section>

<?php
// }
include "Footer.php";
?>
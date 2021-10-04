<?php
include 'conn.php';
$id=$_GET['id'];  // getting id from url
$query2="select * from product_sub_category where id=".$id;  //getting data from product table based on given id
$result2=mysqli_query($conn,$query2); //executing query
$row2=mysqli_fetch_row($result2);  //fetching data

$CatQuery="select * from category_main";  //getting data from product table based on given id
$CatResult=mysqli_query($conn,$CatQuery); //executing query



if(isset($_POST['btnSubmit']))
{  
    $id=$_POST['id'];
    $subcategoryname=$_POST['subcategoryname'];
    $maincategory=$_POST['maincategory'];
   
    $query1="update product_sub_category set id='$id',name_of_sub_category='$subcategoryname',main_category_id='$maincategory' where id='$id'";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
        header("Location:viewproductsubcategory.php");
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

    <label for="id"> Id</label><br>
    <input type="text" name="id" value="<?php echo $row2[0];?>" ><br>

    <label for="subcategoryname">Sub Category Name</label><br>
    <input type="text" name="subcategoryname" value="<?php echo $row2[1];?>" ><br>

    <label for="maincategory">Mian Category</label>
    <select name="maincategory">
        <?php
        while($CatRow=mysqli_fetch_array($CatResult))
        {
            if($CatRow['id']==$QuestRow['id'])
            {
            ?>
            <option value="<?php echo $CatRow['id'];?>" selected>
            <?php echo $CatRow['name'];?>
            </option>
            <?php
            }
            else {
                ?>
            <option value="<?php echo $CatRow['id'];?>">
            <?php echo $CatRow['name'];?>
            </option>
        <?php
        }
    }
    
        ?>
    </select> 

    <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>
</div>
</section>
</section>
<?php
include 'Footer.php';
?>
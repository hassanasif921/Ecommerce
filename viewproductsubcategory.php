<?php
include "header.php";
include "conn.php";

$query="select * from product_sub_category";
$result=mysqli_query($conn,$query);

?>
    <section id="main-content">
      <section class="wrapper">

<div class="container">

<center><h1 class="h3 mb-4 text-gray-800">View Product Sub Category</h1></center>
          <a href='addproductsubcategory.php'><button  style="background-color: #4CAF50; color: white; margin-left:5px; margin-top:5px; border-radius:10px;">Add Product Sub Category</button></a><br><br>
    <table class="table  table-hover">
        <tr>
            <th> Id</th>
            <th> Name of Sub Category</th>
            <th> Main Category</th>
            <th> Action</th>
         
        </tr>
        <?php while($row=mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo"<td>".$row['id']."</td>";
        echo"<td>".$row['name_of_sub_category']."</td>";
        $query1="select * from category_main where id=".$row['main_category_id'];
        $result1=mysqli_query($conn,$query1);
        $row1=mysqli_fetch_row($result1);
        echo"<td>".$row1[1]."</td>";
        echo "<td><a href='deleteproductsubcategory.php?id=".$row['id']."'>Delete</a> <a href='editproductsubcategory.php?id=".$row['id']."'>Update</a> </td>";
        echo "</tr>";
        }
        ?>
    </table>

</div>
</section>
</section>

<?php

include "footer.php";
    
?>
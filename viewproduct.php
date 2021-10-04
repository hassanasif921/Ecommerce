<?php
include "header.php";
include "conn.php";

$query="select * from product";
$result=mysqli_query($conn,$query);

?>
    <section id="main-content">
      <section class="wrapper">

<div class="container">

<center><h1 class="h3 mb-4 text-gray-800">View Product</h1></center>
          <a href='addproduct.php'><button  style="background-color: #4CAF50; color: white; margin-left:5px; margin-top:5px; border-radius:10px;">Add Product</button></a><br><br>
    <table class="table  table-hover">
        <tr>
            <th> Id</th>
            <th> Product Title</th>
            <th> Meta Title</th>
            <th> Summary</th>
            <th> Price</th>
            <th> Selling Price</th>
            <th> Quantity</th>
            <th> Product Short Description</th>
            <th> Product Long Description</th>
            <th> Product Main Category</th>
            <th> Product Sub Category</th>
            <th> Product Main Image</th>
            <th> Action</th>
         
        </tr>
        <?php while($row=mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo"<td>".$row['id']."</td>";
        echo"<td>".$row['product_title']."</td>";
        echo"<td>".$row['meta_title']."</td>";
        echo"<td>".$row['summary']."</td>";
        echo"<td>".$row['price']."</td>";
        echo"<td>".$row['selling_price']."</td>";
        echo"<td>".$row['quantity']."</td>";
        echo"<td>".$row['product_short_dec']."</td>";
        echo"<td>".$row['product_long_dec']."</td>";
//        echo"<td>".$row['product_main_category']."</td>";
        $query1="select * from category_main where id=".$row['id'];
        $result1=mysqli_query($conn,$query1);
        $row1=mysqli_fetch_row($result1);
        echo"<td>".$row1[1]."</td>";
//        echo"<td>".$row['product_sub_category']."</td>";
        $querysubcate="select * from product_sub_category where id=".$row['id'];
        $resultsubcate=mysqli_query($conn,$querysubcate);
        $rowsubcate=mysqli_fetch_row($resultsubcate);
        echo"<td>".$rowsubcate[1]."</td>";
        ?>
        <td><img style="width: 80px; height: 90px; margin-left: -1%;" id="emp_passport_image_print" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['product_main_image']); ?>" /> </td>
            <?php
   
        echo "<td><a href='deleteproduct.php?id=".$row['id']."'>Delete</a> <a href='editproduct.php?id=".$row['id']."'>Update</a> </td>";
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
<?php
include "header.php";
include "conn.php";


$query="select * from category_main";
$result=mysqli_query($conn,$query);

?>
<div class="container">

<center><h1 class="h3 mb-4 text-gray-800">View Category Main</h1></center>
          <a href='addcategorymain.php'><button  style="background-color: #4CAF50; color: white; margin-left:5px; margin-top:5px; border-radius:10px;">Add Category Main</button></a><br><br>
    <table class="table  table-hover">
        <tr>
            <th> Id</th>
            <th> Category Main Name</th>
            <th> Action</th>
         
        </tr>
        <?php while($row=mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo"<td>".$row['id']."</td>";
        echo"<td>".$row['name']."</td>";
        echo "<td><a href='deletecategorymain.php?id=".$row['id']."'>Delete</a> <a href='editcategorymain.php?id=".$row['id']."'>Update</a> </td>";
        echo "</tr>";
        }
        ?>
    </table>

</div>


<?php

include "footer.php";
    
?>
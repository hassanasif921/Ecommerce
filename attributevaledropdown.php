<?php
	include 'conn.php';
	$id=$_POST['id'];
    $query=mysqli_query($conn,"SELECT * FROM product_attributes_values WHERE attribute_id='".$id."'");

?>
<label class="required">Attribute Value</label>

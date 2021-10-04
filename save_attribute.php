<?php
	include 'conn.php';
	if(isset($_POST['name'])){
	$attribute_name=$_POST['name'];
	$temp_id=$_POST['test'];

  

	$sql = "INSERT INTO product_attributes (name,temp_id) VALUES ('$attribute_name','$temp_id')";
	if (mysqli_query($conn, $sql)) {
        echo "Success";
	} 
	else {
		echo "failed";
	}
}
elseif (isset($_POST['name_val'])) {
	$attribute_name=$_POST['name_val'];
	$temp_id=$_POST['test1'];
	$att_id=$_POST['attid'];

  

	$sql = "INSERT INTO product_attributes_values (attribute_id,value) VALUES ('$att_id','$attribute_name')";
	if (mysqli_query($conn, $sql)) {
        echo "Success";
	} 
	else {
		echo "failed";
	}
}
	mysqli_close($conn);
?>
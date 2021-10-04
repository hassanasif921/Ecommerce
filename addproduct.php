<?php
session_start();
unset($_SESSION['addnewrow']);
$_SESSION['addnewrow']=2;
include "conn.php";
$temp_id=1221212;
//define("temp_id",temp_id1111);
$_SESSION['sess']=$temp_id;

$queryclass="Select * from category_main";
$resultclass=mysqli_query($conn,$queryclass);       
$querysubcate="Select * from product_sub_category";
$resultsubcate=mysqli_query($conn,$querysubcate);
$queryproductid = "SHOW TABLE STATUS LIKE 'product'";
$resultprodcutid = mysqli_query($conn,$queryproductid);
$rowproductid = mysqli_fetch_assoc($resultprodcutid);
$product_id_ag = $rowproductid['Auto_increment'];
if(isset($_POST['btnSubmit']))
{
   $sessionid=$_SESSION['addnewrow'];
    $protitle=$_POST['protitle'];
    $prometatitle=$_POST['prometatitle'];
    $prosummary=$_POST['prosummary'];
    $proprice=$_POST['proprice'];
    $prosellingprice=$_POST['prosellingprice'];
    $proquantity=$_POST['proquantity'];
    $proshortdec=$_POST['proshortdec'];
    $prolongdec=$_POST['prolongdec'];
    $promaincategory=$_POST['promaincategory'];
    $prosubcategory=$_POST['prosubcategory'];
//    $promainimage=$_POST['promainimage'];
    $imag=$_FILES['imge']['tmp_name']; //database
    $imageName=addslashes(file_get_contents($imag));
    $totalfiles = count($_FILES['productmultipleimge']['name']);
       
       for($i=1;$i<=$sessionid;$i++){
        ${"attribute_value".$i}=$_POST['attribute_value'.$i];
       
        ${"variant_name".$i}=$_POST['variant_Name'.$i];
        ${"variant_price".$i}=$_POST['variant_price'.$i];
        ${"variant_stock".$i}=$_POST['variant_stock'.$i];
        $queryect=mysqli_query($conn,"INSERT INTO `product_attributes_values`(`value`,`attribute_id`, `Image`, `price`, `stock`) VALUES ('".${'variant_name'.$i}."','".${'attribute_value'.$i}."','','".${'variant_price'.$i}."','".${'variant_stock'.$i}."')");
       }
      
     
       $updatetemp=mysqli_query($conn,"update product_attributes set prodcut_id='".$product_id_ag."' where temp_id='$temp_id'");
    $query1="insert into product(product_title, meta_title, summary, price, selling_price, quantity, product_short_dec, product_long_dec, product_main_category, product_sub_category, product_main_image)values('$protitle', '$prometatitle', '$prosummary', '$proprice', '$prosellingprice', '$proquantity', '$proshortdec', '$prolongdec', '$promaincategory', '$prosubcategory', '$imageName')";
    $result1=mysqli_query($conn,$query1);
    // Upload files and store in database
    for($i=0;$i<$totalfiles;$i++){
        $filename = $_FILES['productmultipleimge']['name'][$i];
    if(move_uploaded_file($_FILES["productmultipleimge"]["tmp_name"][$i],'product_images/'.$filename)){
        // Image db insert sql
    $insert1 = "INSERT INTO `product_images`(`product_id`, `product_inages`) VALUES ('$product_id_ag','$filename')";
    
    $iquery = mysqli_query($conn,$insert1);

    }
    

    
    else{
        echo 'Error in uploading file - '.$_FILES['productmultipleimge']['name'][$i].'<br/>';
    }

}
    if($result1)
    {
      echo "<script>alert('Product Added Successfully')</script>";
//       header("Location:home.php");       
    }else{
    

       echo "<script>alert('Some Error Occured')</script>";
    }
} 
include "header.php";


?>
                <form method="POST" enctype="multipart/form-data">

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter Product Title</label>
                    <input type="text" required class="form-control" name="protitle" placeholder="Enter Product Title" id="Month">
                  </div>
                  <div class="form-group">
                        <label for="prometatitle">Product Meta Title</label>
                        <input type="text" required class="form-control" name="prometatitle" placeholder="Enter Product Meta Title" id="Month">
                   </div>  
                   <div class="form-group">
                        <label for="prosummary">Product Summary</label>
                        <input type="text" required class="form-control" name="prosummary" placeholder="Enter Product Summary"  id="Month">
                    </div>  

                    <div class="form-group">
                        <label for="proprice">Product Price</label>
                        <input type="text" required class="form-control" name="proprice" placeholder="Enter Product Price"  id="Month">
                    </div>  

                    <div class="form-group">
                        <label for="prosellingprice">Product Seeling Price</label>
                        <input type="text" required class="form-control" name="prosellingprice" placeholder="Enter Product Seeling Price"  id="Month">
                    </div>  

                    <div class="form-group">
                        <label for="proquantity">Product Quantity</label>
                        <input type="text" required class="form-control" name="proquantity" placeholder="Enter Product Quantity"  id="Month">
                    </div>  
                    <div class="form-group">
                        <label for="proshortdec"> Product Short Description</label>
                        <input type="text" required class="form-control" name="proshortdec" placeholder="Enter Product Short Description"  id="Month">
                    </div>  
                    
                    <div class="form-group">
                        <label for="promaincategory">Product Main Category</label>
                            <select class="form-control" name="promaincategory" >
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
                        <label for="prosubcategory">Product Sub Category</label>
                        <select class="form-control" name="prosubcategory" >
                            <?php
                            while($rowsubcate=mysqli_fetch_array($resultsubcate))
                            {
                            ?>
                                    <option value=<?php echo $rowsubcate['id'];?>>
                                    <?php echo $rowsubcate['name_of_sub_category'];?>
                                    </option>
                            <?php
                            }
                            ?>
                        </select>

                     
                <div class="form-group">
                                <label for="exampleInputPassword1">Product Details</label>
                                <textarea id="summernote" name="prolongdec">
                                        Place <em>some</em> <u>text</u> <strong>here</strong>
                                </textarea>                  
                </div>
                <div class="form-group">
                    <label class="required">Product Image<span>*</span></label>
                    <input  type="file" name="imge"  id="FilUploader"/>
                </div>  
                 
                
                <div>
                    <label class="required">Product Gallery Image<span>*</span></label>
                    <input  type="file" name="productmultipleimge[]" multiple id="FilUploadermultiple"/>
                </div>
                <div id="dvPreviewexp" class="col-md-12">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group att" >
                            <label class="required">Attribute Value</label>
                            <select class="form-control" name="attribute_value1" id="attribute_value1" onchange="myFunction()">
                            <?php 
                                $query1="select * from product_attributes where temp_id = '".$_SESSION['sess']."' ";?>
                            
                               <?php
                                $queryprodcutattribute=mysqli_query($conn,$query1);
                                while($result_pro_att=mysqli_fetch_array($queryprodcutattribute))
                                {?>
                               
                                <option value="<?php echo $result_pro_att[0]?>"><?php echo $result_pro_att[1]?></option>
                                <?php }?>
                            </select>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                                     ADD NEW
                                </button>
                        </div>  
                    </div>
                    <div class="col-md-6" id="attribute_value_div">
                    <label class="required">Variant Name<span>*</span></label>
                        <input  type="text" name="variant_Name1"  id="variant_Name1" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <label class="required">Price<span>*</span></label>
                        <input  type="text" name="variant_price1"  id="variant_price1" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <label class="required">Stock In hand</label>
                        <input  type="text" name="variant_stock1"  id="variant_stock1" class="form-control"/>
                    </div>
                   
                     
                </div>
                <div class="row" id="newrow">
                    
                </div>
               
                <Button type="button" onclick="addnewrow()">Add New Row</button>

                </div> 
                <!-- /.card-body -->
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
                </div>

              </form>
              <div class="modal fade" id="modal-default">
                     <div class="modal-dialog">
                <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Attribute</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="newattributeform" name="newattributeform" method="post">
                <div class="modal-body">
                
                        <div class="form-group">
                            <label class="required">New Atrribute</label>
                            <input  type="text" name="new_attribute" id="new_attribute"  class="form-control"/>
                            <input  type="text" name="temp_id" id="temp_id"  class="form-control" value="<?php echo $temp_id;?>"/>

                        </div> 
                        
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="button" name="save_attribute" id="save_attribute" class="btn btn-primary" value="Save changes">
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="modal-val_att">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Attribute Value</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="newattributeform" name="newattributeform" method="post">
                <div class="modal-body">
                
                        <div class="form-group">
                            <label class="required">New Atrribute</label>
                            <input  type="text" name="new_attribute_1" id="new_attribute_1"  class="form-control"/>
                            <input  type="hidden" name="temp_id_1" id="temp_id_1"  class="form-control" value="<?php echo $temp_id;?>"/>

                        </div> 
                        
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="button" name="save_attribute_1" id="save_attribute_1" class="btn btn-primary" value="Save changes">
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <?php include "footer.php";?>

      <script language="javascript" type="text/javascript">
// $(function () {
//     $("#attribute_value").change(function () {
//         alert('hassan');    
//         var attribute_value = $(this).val();
//         $.ajax({
//             url: "attributevaledropdown.php",
//             type: "POST",
//             data: {'id': attribute_value},
//             success: function(data) {
//                  alert("hassan");
//                 $("#attribute_value_div").html(data);
//             }
//         });
      
//     });
// });

// </script>
<!-- <script>
function myFunction() {
    var attribute_value = $('#attribute_value').val();
        $.ajax({
            url: "attributevaledropdown.php",
            type: "POST",
            data: {'id': attribute_value},
            success: function(data) {
                $("#attribute_value_div").html(data);
            }
        });
}
</script>    -->
<script>
$(document).ready(function() {
	$('#save_attribute').on('click', function() {
		$("#save_attribute").attr("disabled", "disabled");
		var name = $('#new_attribute').val();
        

		var test=$('#temp_id').val();
		if(name!=""){
			$.ajax({
				url: "save_attribute.php",  
				type: "POST",
				data: {
					name: name,
                    test: test
								
				},
				cache: false,
				success: function(dataResult){
                    $.ajax({
            url: "GETATTRIBUTE.PHP",
            type: "POST",
            data: {'id': test},
            success: function(data) {
                
                $("#save_attribute").removeAttr("disabled");
						alert("Attribute Added");
                        
                        $(".att").load(location.href+" .att>*","");
            }
        });
                        

                      
					
	
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>
<script>
$(document).ready(function() {
	$('#save_attribute_1').on('click', function() {
		$("#save_attribute_1").attr("disabled", "disabled");
		var name1 = $('#new_attribute_1').val();
        var attid = $('#attribute_value').val();
        

		var test1=$('#temp_id_1').val();
		if(name1!=""){
			$.ajax({
				url: "save_attribute.php",  
				type: "POST",
				data: {
					name_val: name1,
                    test_val: test1,
                    attid:attid
								
				},
				cache: false,
				success: function(dataResult){

                        $("#save_attribute_1").removeAttr("disabled");
						

				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>


<script language="javascript" type="text/javascript">
$(function () {
    $("#FilUploadermultiple").change(function () {
        alert("done");
        if (typeof (FileReader) != "undefined") {
            var dvPreviewexp = $("#dvPreviewexp");
            dvPreviewexp.html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            $($(this)[0].files).each(function () {
                var file = $(this);
                if (regex.test(file[0].name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = $("<img />");
                        img.attr("style", "height:160px;width: 1600px");
                        img.attr("src", e.target.result);
                        img.attr("class", "col-md-6");
                        

                        dvPreviewexp.append(img);
                    }
                    reader.readAsDataURL(file[0]);
                } else {
                    dvPreviewexp.html("");
                    return false;
                }
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    });
});

</script>   

    <script>
function addnewrow() {
    var test2=$('#temp_id_1').val();


    $.ajax({
				url: "getnewrow.php",  
				type: "POST",
				data: {
                    gettempid : test2
				},
				cache: false,
				success: function(dataResult1){

                    $("#newrow").append(dataResult1);
						

				}
			});
}

</script>
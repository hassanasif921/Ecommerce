<?php 
session_start();

$hassan=$_SESSION['addnewrow']++;
$temp_id=$_POST['gettempid'];
include "conn.php";
?>
<div class="col-md-12">
 <hr/>
</div>
<div class="col-md-6">
                        <div class="form-group att" >
                            <label class="required">Attribute Value</label>
                            <select class="form-control" name="attribute_value<?php echo $hassan?>" id="attribute_value" onchange="myFunction()">
                            
                               <?php

                                $rowget=mysqli_query($conn,"select * from product_attributes where temp_id = '".$temp_id."' ");
                                while($hassantest=mysqli_fetch_array($rowget))
                                {?>
                               
                                <option value="<?php echo $hassantest[0]?>"><?php echo $hassantest[1]?></option>
                                <?php }?>
                            </select>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                                     ADD NEW
                                </button>
                        </div>  
                    </div>
                    <div class="col-md-6" id="attribute_value_div">
                    <label class="required">Variant Name<span>*</span></label>
                        <input  type="text" name="variant_Name<?php echo $hassan?>"  id="variant_Name<?php echo $hassan?>" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <label class="required">Price<span>*</span></label>
                        <input  type="text" name="variant_price<?php echo $hassan?>"  id="variant_price<?php echo $hassan?>" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <label class="required">Stock In hand</label>
                        <input  type="text" name="variant_stock<?php echo $hassan?>"  id="variant_stock<?php echo $hassan?>" class="form-control"/>
                    </div>
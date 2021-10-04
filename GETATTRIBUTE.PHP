<?php 
$id1=$_POST['id1'];

?>
<label class="required">Attribute Value</label>
                            <select class="form-control" name="attribute_value" id="attribute_value" onchange="myFunction()">
                            <?php 
                                $query1="select * from product_attributes where temp_id = '".$id1."' ";?>
                            <option><?php echo $query1;?></option>
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
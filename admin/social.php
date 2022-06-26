<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php'?>





        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <?php
/// Updated code 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $facebook = $fm->validation($_POST['facebook']);
    $twitter = $fm->validation($_POST['twitter']);
    $linkdein = $fm->validation($_POST['linkdein']);
    $googleplus = $fm->validation($_POST['googleplus']);


    $facebook = mysqli_real_escape_string($db->link , $facebook);
    $twitter = mysqli_real_escape_string($db->link , $twitter);
    $linkdein = mysqli_real_escape_string($db->link , $linkdein);
    $googleplus = mysqli_real_escape_string($db->link , $googleplus);


    ///image validation code here 
   
    if( $facebook == "" || $twitter == "" || $linkdein == "" || $googleplus == "" ){
        echo "<span class='error'>Filed must not be empty!</span>";
    }else{
    
   
                
                //$query = "INSERT INTO tbl_post(cat,title,body,image,author,tags) 
                //VALUES('$cat','$title','$body','$uploaded_image','$author','$tags')";
                $query = "UPDATE tbl_social
                SET
                facebook = '$facebook',
                twitter = '$twitter',
                linkdein = '$linkdein',
                googleplus = '$googleplus' 
                
                where id = '1'
                ";


                $updated_rows = $db->update($query);

                if ($updated_rows) {
                    echo "<span class='success'>Data Updated Successfully.
                    </span>";
                }else {
                    echo "<span class='error'>Data Not updated!</span>";
                }
        }
    }

?>
                <?php
                $query = "select * from tbl_social where id = '1'";
                $result_social = $db->select($query);

                if( $result_social ){
                    while( $row = $result_social->fetch_assoc()){
 
                 
                
                ?>


                <div class="block">               
                 <form action = "" method = "POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="facebook" value="<?php echo $row['facebook'];?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="twitter" value="<?php echo $row['twitter']?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="linkdein" value = "<?php echo $row['linkdein'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="googleplus" value="<?php echo $row['googleplus'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
                <?php }} ?>
            </div>
<?php include 'inc/footer.php' ;?>
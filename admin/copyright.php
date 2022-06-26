<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php'?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                
                <?php
                    if( $_SERVER['REQUEST_METHOD'] == 'POST'){
                        $copy_right = $fm->validation($_POST['copyright']);
                        $copy_right = mysqli_real_escape_string($db->link , $copy_right);

                        if( $copy_right == ""){
                            echo "<span class = 'error'>Field Must not be empty!!!</spang>";
                        }else{
                            $query = "UPDATE tbl_copyright
                            
                            SET 

                            copyright = '$copy_right'
                            where id = '1'
                            
                            ";

                            $result = $db->update($query);
                            if( $result){
                                echo "<span class = 'success'>Data Updated Successfully!</span>";
                            }else{
                                echo "<span class = 'error'>Data Not Updated!</span>";
                            }

                        }

                    }
                
                
                ?>


                <div class="block copyblock"> 
                 <form action ="" method = "POST" >

                <?php
                $query = "select * from tbl_copyright where id = '1'";
                $result_copy = $db->select($query);

                if( $result_copy ){
                    while( $row = $result_copy->fetch_assoc()){

                ?>

                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $row['copyright'];?>" name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>

                    <?php }}?>
                    </form>
                </div>
            </div>
        </div>
        
<?php include 'inc/footer.php' ;?>

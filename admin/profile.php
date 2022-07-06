

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php'?>
<?php

    $userid  = Session::get("userId");
    $userrole = Session::get("userRole") ;

?>
 

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Post</h2>
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $name = mysqli_real_escape_string($db->link , $_POST['name']);
    $username = mysqli_real_escape_string($db->link , $_POST['username']);
    $email = mysqli_real_escape_string($db->link , $_POST['email']);
    $details = mysqli_real_escape_string($db->link , $_POST['details']);
 
     
 
                
                //$query = "INSERT INTO tbl_post(cat,title,body,image,author,tags) 
                //VALUES('$cat','$title','$body','$uploaded_image','$author','$tags')";
 
                $query = "UPDATE tbl_user
                SET
                name = '$name',
                username = '$username',
                email = '$email',
                details = '$details'
              
                where id = '$userid'
                ";


                $updated_rows = $db->update($query);

                if ($updated_rows) {
                    echo "<span class='success'>Data Updated Successfully.
                    </span>";
                }else {
                    echo "<span class='error'>Data Not updated!</span>";
                }
        
    

}
?>

                <div class="block">               

                <?php
                $query = "select * from tbl_user where id='$userid' AND role='$userrole' order by id desc ";
                $result = $db->select($query) ;

                if( $result ){
                    while( $row = $result->fetch_assoc()){

                
                ?>


                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name ="name" value="<?php echo $row['name']?>" class="medium"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text" name ="username" value="<?php echo $row['username']?>" class="medium"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name ="email" value="<?php echo $row['email']?>" class="medium"/>
                            </td>
                        </tr>
                        
                         
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="details">

                                <?php echo $row['details'];?>
                                </textarea>
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
                    <?php }} ?>
                </div>
            </div>
        </div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
</script>
<?php include 'inc/footer.php' ;?>


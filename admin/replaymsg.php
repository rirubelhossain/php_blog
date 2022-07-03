

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php'?>

<?php
    if(!isset($_GET['msgid']) || $_GET['msgid'] == NULL ){
        echo "<script>window.location = 'inbox.php' </script>";
    }else{
        $msgid = $_GET['msgid']; 
    }


?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
<?php
    if( $_SERVER['REQUEST_METHOD'] == 'POST'){
        $to = $fm->validation($_POST['toemail']);
        $from = $fm->validation($_POST['fromemail']);
        $subject = $fm->validation($_POST['subject']);
        $message = $fm->validation($_POST['body']);

        $sendmail = mail($to , $subject , $message,$from);


        if( $sendmail ){
            echo "<span class = 'success'>Email Send Successfully!</span>";
        }else{
            echo "<span class = 'error'>Email Not Send Successfully</span>";
        }


    }
 

?>





                <div class="block">               
                 <form action="" method="POST" enctype="multipart/form-data">

                 <?php
                    $query = "select * from tbl_contact where id = '$msgid'";
                    $msg_result = $db->select($query);

                    if( $msg_result ){
                        while( $row = $msg_result->fetch_assoc()){
                            
                    

                ?>
                    <table class="form">
                       

 
                     
                        <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" readonly name ="toemail" value="<?php echo $row['email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text"   name ="fromemail" placeholder="Please enter your email address" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text"   name ="subject" placeholder="Please Enter your subject" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce"   name="body">
                                     
                                </textarea>
                            </td>
                        </tr>
                       
                        
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
                                <a href="inbox.php">Back</a>
                            </td>
                        </tr>
                    </table>
                    <?php }} ?>
                    </form>
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




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
        echo "<script>window.location = 'inbox.php'</script>";
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
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly name ="name" value="<?php echo $row['firstname'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly name ="email" value="<?php echo $row['email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="text" readonly name ="date" value="<?php echo $fm->formatDate($row['date'])?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" readonly name="body">
                                    <?php
                                        echo $row['body'];
                                    ?>
                                </textarea>
                            </td>
                        </tr>
                       
                        
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
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


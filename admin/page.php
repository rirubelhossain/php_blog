

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php'?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Page</h2>

<?php

    if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL ){
        echo "<script>window.location = 'index.php'</script>";
    }else{
        $id = $_GET['pageid'];
    }

?>
<?php

//echo "Print id for testing ".$id."<br>";

?>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $name = mysqli_real_escape_string($db->link , $_POST['name']);
    $body = mysqli_real_escape_string($db->link , $_POST['body']);
 
    ///image validation code here 
 
 

    if( $name == "" || $body == ""){
        echo "<span class='error'>Filed must not be empty!</span>";
    }else{
            
            $query = " UPDATE tbl_page

            SET 

            name = '$name',
            body = '$body'
            
            where id = '$id'";
            $inserted_rows = $db->insert($query);

            if ($inserted_rows) {
                echo "<span class='success'>Page Created Successfully.
                </span>";
            }else {
                echo "<span class='error'>Page Not Created!</span>";
            }
    }
}

?>

                <div class="block">
                    
                
                <?php 
                $query = "select * from tbl_page where id = '$id'";
                $page_result = $db->select($query);

                if( $page_result ){
                    while($row = $page_result->fetch_assoc()){

                
                ?>


                 <form action="" method="POST" >
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name ="name" value = "<?php echo $row['name']?>" class="medium" />
                            </td>
                        </tr>
                     
                        
                        
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
                                    <?php echo $row['body'];?>
                                </textarea>
                            </td>
                        </tr>
                       
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                                <a onclick="return confirm('Are you sure to delete?') ;" href="delpage.php?delid=<?php echo $row['id']?>">Delete</a>
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }}?>
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


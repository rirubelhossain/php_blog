<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php'?>

<?php

if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
    echo "<script>window.location = 'catlist.php' ; </script>";
    //header("Location: catlist.php") ;
}else{
    $catid = $_GET['catid'] ;
}


?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 

               <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $name = $_POST['name'];
                    $name = mysqli_real_escape_string($db->link , $name);
                   // echo "<span style=''>No Result found!!</span>";
                    if(empty($name)){
                        echo "<span class='error'>Field Must not be empty !</span>";
                    }else{
                        $query = "UPDATE tbl_category 
                            SET 
                            name = '$name' 
                            where id = '$catid' 
                        ";
                        $cat_insert= $db->update($query);

                        if($cat_insert){
                            echo "<span class='success'>Category updaqted successfully!</span>";
                    }else{
                        echo "<span class='error'>Category not updated !</span>";
                        }
                    }
                }
               ?>
<?php
    $query = "select * from tbl_category where id = '$catid' order by id desc ";
    $category = $db->select($query);
    while($result = $category->fetch_assoc()){
?>

                 <form action = "" method = "POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name = "name" value="<?php echo $result['name']?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" class="btn btn-success" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>

                    <?php } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php' ;?>
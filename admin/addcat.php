﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php'?>

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
                        $query = "INSERT INTO tbl_category(name) values('$name')";
                        $cat_insert= $db->insert($query);

                        if($cat_insert){
                            echo "<span class='success'>Category inserted successfully!</span>";
                    }else{
                        echo "<span class='error'>Category not inserted successfully!</span>";
                        }
                    }
                }
               ?>
                 <form action = "" method = "POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name = "name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php' ;?>
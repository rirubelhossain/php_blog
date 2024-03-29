<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php'?>

<?php

    if(!Session::get("userRole") == '0'){
        echo "<script>window.location = 'index.php' ; </script>";
    }

?>
   <div class="grid_10">		
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 
               <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $username = $fm->validation($_POST['username']);
                    $password = $fm->validation(md5($_POST['password']));
                    $role = $fm->validation($_POST['role']);

                    $username = mysqli_real_escape_string($db->link , $username);
                    $password = mysqli_real_escape_string($db->link , $password);
                    $role = mysqli_real_escape_string($db->link , $role);
                   // echo "<span style=''>No Result found!!</span>";
                    if(empty($username) || empty($password) || empty($role)){
                        echo "<span class='error'>Field Must not be empty !</span>";
                    }else{
                        $query = "INSERT INTO tbl_user(username,password,role) values('$username','$password','$role')";
                        $cat_insert= $db->insert($query);

                        if($cat_insert){
                            echo "<span class='success'>User Created successfully!</span>";
                    }else{
                        echo "<span class='error'>User Not Created!</span>";
                        }
                    }
                }
               ?>
                 <form action = "adduser.php" method = "POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>UserName</label>
                            </td>
                            <td>
                                <input type="text" name = "username" placeholder="Enter Username..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="password" name = "password" placeholder="Enter Username..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Role</label>
                            </td>
                            <td>
                                <select id = "select"  name = "role">
                                    <option>Select User Role</option>
                                    <option value = "0">Admin</option>
                                    <option value = "1">Author</option>
                                    <option value = "2">Editor</option>
                                </select>
                            </td>
                        </tr>
						<tr> 
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Create" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php' ;?>
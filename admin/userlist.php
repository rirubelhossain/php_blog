<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php'?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>User List</h2>
                <div class="block">        
            
                <?php
                    if(isset($_GET['deluser'])){
                        $deluser = $_GET['deluser'] ;
                        $delquery = "delete from tbl_user where id = '$deluser'";
                        $deldata = $db->delete($delquery) ;

                        if( $deldata){
                            echo "<span class='success'>Deleted successfully!</span>";
                        }else{
                            echo "<span class='error'>Data Not Deleted!</span>";
                        }
                    }
                ?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Username</th>
                            <th>Email</th>
                            <th>Details</th>
                            <th>Role</th>
                            <th>Action<th>
						</tr>
					</thead>
					<tbody>
                    <?php
                
                $query = "select * from tbl_user order by id desc";
                $alluser = $db->select($query);

                if($alluser ){
                    $i = 0 ;
                    while( $row = $alluser->fetch_assoc()){
                    $i++ ;  
                ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $row['name'];?></td>
                            <td><?php echo $row['username'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $fm->testShorten($row['details'],30);?></td>
                            <td>
                                <?php 
                                    if( $row['role'] == '0'){
                                        echo "Admin";
                                    }elseif( $row['role'] == 1 ){
                                        echo "Author";
                                    }elseif( $row['role'] == 2 ){
                                        echo "Editor";
                                    }
                                ?>
                        
                            </td>
							<td><a  href="viewuser.php?userid=<?php echo $row['id']?>"><button class="btn btn-primary" >Edit</button></a> || <a style="color:red" onclick="return confirm('Are you sure to delete?') ;" href="?deluser=<?php echo $row['id']?>"><button class="btn btn-primary">Delete</button></a></td>
						</tr>
                        <?php }}?>	 
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php' ;?>



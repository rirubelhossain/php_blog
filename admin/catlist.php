<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php'?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
            
                <?php
                    if(isset($_GET['delid'])){
                        $delid = $_GET['delid'] ;
                        $delquery = "delete from tbl_category  where id = '$delid'";
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
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                    <?php
                
                $query = "select * from tbl_category order by id desc";
                $result = $db->select($query);

                if($result ){
                    $i = 0 ;
                    while( $row = $result->fetch_assoc()){
                    $i++ ;
                    
                ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $row['name'];?></td>
							<td><a  href="editcat.php?catid=<?php echo $row['id']?>"><button class="btn btn-primary" >Edit</button></a> || <a style="color:red" onclick="return confirm('Are you sure to delete?') ;" href="?delid=<?php echo $row['id']?>"><button class="btn btn-primary">Delete</button></a></td>
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



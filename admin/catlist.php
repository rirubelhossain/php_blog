<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php'?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        

            
        
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
							<td><a href="edutcat.php?catid=<?php echo $row['id']?>">Edit</a> || <a onclick="return confirm('Are you sure to delete?') ;" href="delcat.php?delid=<?php echo $row['id']?>">Delete</a></td>
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



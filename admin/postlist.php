<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php'?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="15%">Post Title</th>
							<th width="15%">Description</th>
							<th width="10%">Category</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="10%">Tags</th>
							<th width="10%">Date</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>

					<?php
						$query = "SELECT tbl_post.*, tbl_category.name
						FROM tbl_post INNER JOIN tbl_category
						ON tbl_post.cat = tbl_category.id where status = '0' ORDER BY tbl_post.title DESC 
						
						";
						$postadd = $db->select($query);
						if($postadd){
							$i = 0 ;
							while($row = $postadd->fetch_assoc()){
							$i++ ;
		
					?>

						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $row['title'];?></td>
							<td><?php echo $fm->testShorten($row['body'],50);?></td>
							<td><?php echo $row['name'];?></td>
							<td><img src="<?php echo $row['image'];?>" height="40px" width="60px"></td>
							<td><?php echo $row['author']?></td>
							<td><?php echo $row['tags'];?></td>
							<td><?php echo $fm->formatDate($row['date']) ;?></td>
							<td><a href="editpost.php?editpostid=<?php echo $row['id'];?>">Edit</a> || <a href="deletepost.php?delpostid=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete?') ;" >Delete</a>||
							<a href="?publishid=<?php echo $row['id'];?>">Publish</a> ||
							
						
						</td>
						</tr>
						<?php }}?>
						 
					</tbody>
				</table>


				
	
               </div>
			   
            </div>
			<div class="box round first grid">
                <h2>Published List</h2>
				<?php
					if(isset($_GET['unpublishid'])){
						
						$unpublishid = $_GET['unpublishid'];
						$query = "UPDATE tbl_post 
						SET 

						status = '0' 
						where id = '$unpublishid'

						";

						$result_publish = $db->update($query);

						if( $result_publish ){
							echo "<span class = 'success'>Post Has been unpublish!</span>";
						}else{
							echo "<span class = 'error'> Post Not unPublish</span>";
						}


					}
				
				?>
				<?php
					if(isset($_GET['publishid'])){
						
						$publishid = $_GET['publishid'];
						$query = "UPDATE tbl_post 
						SET 

						status = '1' 
						where id = '$publishid'

						";

						$result_publish = $db->update($query);

						if( $result_publish ){
							echo "<span class = 'success'>Post Has been publish!</span>";
						}else{
							echo "<span class = 'error'> Post Not Publish</span>";
						}


					}
				
				?>


                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="15%">Post Title</th>
							<th width="15%">Description</th>
							<th width="10%">Category</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="10%">Tags</th>
							<th width="10%">Date</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>

					<?php
					
						$query = "SELECT tbl_post.*, tbl_category.name
						FROM tbl_post INNER JOIN tbl_category
						ON tbl_post.cat = tbl_category.id where status='1' ORDER BY tbl_post.title DESC 
						
						";
					
					
						$postadd = $db->select($query);
						if($postadd){
							$i = 0 ;
							while($row = $postadd->fetch_assoc()){
							$i++ ;
		
					?>
					<?php
					
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $row['title'];?></td>
							<td><?php echo $fm->testShorten($row['body'],50);?></td>
							<td><?php echo $row['name'];?></td>
							<td><img src="<?php echo $row['image'];?>" height="40px" width="60px"></td>
							<td><?php echo $row['author']?></td>
							<td><?php echo $row['tags'];?></td>
							<td><?php echo $fm->formatDate($row['date']) ;?></td>
							<td><a href="editpost.php?editpostid=<?php echo $row['id'];?>">Edit</a> || <a href="deletepost.php?delpostid=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete?') ;" >Delete</a>||

							<a href="?unpublishid=<?php echo $row['id'];?>">Unpublish</a> ||
						
						</td>
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

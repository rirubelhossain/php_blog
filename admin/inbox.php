<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php'?>




        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>

				<?php
					if(isset($_GET['seenid'])){
						$seen_id = $_GET['seenid'];

						$query = "UPDATE tbl_contact 
							SET 

							status = '1' 
							where id = '$seen_id'
						";

						$result_seenid = $db->update($query);
						if( $result_seenid){
							echo "<span class = 'success'>Message sent in the seen box</span>";
						}else{
							echo "<span class = 'error'>Message not sent</span>";
						}
					}
				?>



                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					<?php
						$query = "select * from tbl_contact where status = '0' order by id desc ";
						$contact = $db->select($query);

						if( $contact ){
							$i = 0 ;
							while($row = $contact->fetch_assoc()){
							++$i ;
					
					?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $row['firstname']?></td>
							<td><?php echo $row['email']?></td>
							<td><?php echo $fm->testShorten($row['body'],30);?></td>
							<td><?php echo $fm->formatDate($row['date']);?></td>
							<td>
								<a href="viewmsg.php?msgid=<?php echo $row['id'];?>">View</a> ||
								<a href="replaymsg.php?msgid=<?php echo $row['id']?>">Reply</a> ||
								<a onclick="return confirm('Are sent the message into the sent box')" href="?seenid=<?php echo $row['id']?>">Seen</a> ||
							</td>
						</tr>
						<?php }}?>
					</tbody>
				</table>
               </div>
            </div>

			<div class="box round first grid">
                <h2>Seen Message</h2>
                <div class="block">        
				<table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					<?php
						$query = "select * from tbl_contact where status = '1' order by id desc ";
						$contact = $db->select($query);

						if( $contact ){
							$i = 0 ;
							while($row = $contact->fetch_assoc()){
							++$i ;
					
					?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $row['firstname']?></td>
							<td><?php echo $row['email']?></td>
							<td><?php echo $fm->testShorten($row['body'],30);?></td>
							<td><?php echo $fm->formatDate($row['date']);?></td>
							<td>
								<a onclick="return confirm('Are sent the message into the sent box')" href="?delid=<?php echo $row['id'];?>">Delete</a> ||
								 
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
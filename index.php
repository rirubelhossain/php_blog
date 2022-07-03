
<?php include "inc/header.php";?>
<?php include "inc/slider.php";?>


<?php
$db = new Database();
$fm = new Format();

?>



	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		<!--Pagination-->
		<?php 
			$per_page = 3 ;
			if( isset($_GET['page'])){
				$page = $_GET['page'];
			}else{
				$page = 1 ;
			}
			$start_from = ($page -1 )*$per_page ;
			?>
		<!--Pagination-->
		<?php 
		$query = "SELECT * FROM tbl_post where status = '1' limit $start_from , $per_page ";
		$post = $db->select($query);
		if( $post ){ 

			while($row = $post->fetch_assoc()){

		?>

			<div class="samepost clear">
				<h2><a href="post.php?id = <?php echo $row['id'];?>"><?php echo $row['title'];?></a></h2>
				<h4><?php echo $fm->formatDate($row['date']);?>, By <a href="#"><?php echo $row['author']?></a></h4>
				 <a href="#"><img src="admin/<?php echo $row['image']?>" alt="post image"/></a>
					<p>
					<?php echo $fm->testShorten($row['body']);?>
					</p>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $row['id'];?>">Read More</a>
				</div>
			</div>
		<?php } ?> <!--End while loop-->
		<!--Pagination-->
	 
		<?php 
		$query = "SELECT * from tbl_post";
		$result = $db->select($query);
		$total_rows = mysqli_num_rows($result);
		$total_pages = ceil($total_rows / $per_page);

		echo "<span class='pagination'> <a href='index.php?page=1'>".'First Page'."</a>" ;
		
		
		
		for($i = 1 ; $i <= $total_pages ; ++$i){
			echo "<a href='index.php?page=".$i."'> ".$i."  "."</a>";
		}
		

		echo "<a href='index.php?page=$total_pages'>".'Last Page'."</a></span>" ;
		?>
		<!--Pagination-->
		<?php }else {
			header("Location: 404.php");
		}?>

		
		</div>
		<?php include "inc/sidebar.php";?>
		<?php include "inc/footer.php";?>
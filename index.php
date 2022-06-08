<?php include "config/config.php"?>
<?php include "lib/Database.php"; ?>
<?php include "inc/header.php";?>
<?php include "inc/slider.php";?>
<?php include "helpers/format.php";?>

<?php
$db = new Database();
$fm = new Format();

?>



	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

		<?php 
		$query = "SELECT * FROM tbl_post limit 3";
		$post = $db->select($query);
		if( $post ){ 

			while($row = $post->fetch_assoc()){

		?>

			<div class="samepost clear">
				<h2><a href="post.php?id = <?php echo $row['id'];?>"><?php echo $row['title'];?></a></h2>
				<h4><?php echo $fm->formatDate($row['date']);?>, By <a href="#"><?php echo $row['author']?></a></h4>
				 <a href="#"><img src="admin/upload/<?php echo $row['image']?>" alt="post image"/></a>
					<p>
					<?php echo $fm->testShorten($row['body']);?>
					</p>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $row['id'];?>">Read More</a>
				</div>
			</div>
		<?php } ?>
		<?php }else {
			header("Location: 404.php");

		}?>
			
		
		</div>
		<?php include "inc/sidebar.php";?>
		<?php include "inc/footer.php";?>
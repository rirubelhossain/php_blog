
<?php include "inc/header.php";?>
<?php include "inc/slider.php";?>

<?php
$db = new Database();
$fm = new Format();

?>

 
<?php
	if(!isset($_GET['search']) || $_GET['search'] == NULL ){
		header("Location: 404.php");
	}else{
		$search = $_GET['search'] ;
	}

?>



<div class="contentsection contemplete clear">
    <div class="maincontent clear">
    <?php 
		$query = "SELECT * FROM tbl_post where title LIKE '%$search' or body LIKE '%$search'";
		$post = $db->select($query);
		if( $post ){ 

			while($row = $post->fetch_assoc()){

		?>
    <div class="samepost clear">
				<h2><a href="post.php?id = <?php echo $row['id'];?>"><?php echo $row['title'];?></a></h2>
				<h4><?php echo $fm->formatDate($row['date']);?>, By <a href="#"><?php echo $row['author']?></a></h4>
				<a href="post.php?id = <?php echo $row['id'];?>">
					 <img src="admin/<?php echo $row['image']?>" alt="post image"/></a>
					<p>
					<?php echo $fm->testShorten($row['body']);?>
					</p>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $row['id'];?>">Read More</a>
				</div>
			</div>
            <?php } }else { ?>
			<p>Your Search Query Not Found!!.</p>
		<?php } ?>

</div>
<?php include "inc/sidebar.php";?>
<?php include "inc/footer.php";?>
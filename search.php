<?php
include "inc/header.php";
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
			<div class="about">

			<?php
				$query = "select * from tbl_post where title like '%$search%' or body like '%$search%'";
				$post = $db ->select($query) ;

				if($post){
					while( $row = $post->fetch_assoc()){
			
			?>

				<h2><?php echo $row['title'];?></h2>
				<h4><?php echo $fm->formatDate($row['date']);?>, By <a href="#"><?php echo $row['author']?></a></h4>
				<a href="#"><img src="admin/upload/<?php echo $row['image']?>" alt="post image"/></a>
				<?php echo $row['body'];?>
				
				

				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php $catid = $row['cat'] ;
						$queryrelated = "select * from tbl_post where cat = '$catid' order by rand() limit 6";
						$relatedpost = $db->select($queryrelated);
						if( $relatedpost){
							while( $rrow = $relatedpost->fetch_assoc()){ 
						
					?>
					<a href="post.php?id = <?php echo $rrow['id'];?>">
					 <img src="admin/upload/<?php echo $rrow['image']?>" alt="post image"/></a>
					<?php }}else { echo "No Related Post Available !!";}?>
				</div>
				<?php }}else{ ?>
                    
                    <p>Data Not found</p>
                    <?php }?>

	</div>
</div>
	<?php include "inc/sidebar.php";?>
	<?php include "inc/footer.php";?>
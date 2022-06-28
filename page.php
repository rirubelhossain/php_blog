<?php
include "inc/header.php";
?>

<?php 
/// catch the id from header the name of the page id is pageid

if( !isset($_GET['pageid']) || $_GET['pageid'] == NULL ){
	echo "<script> window.location = 'index.php' ;</script>";
}else{
	$id = $_GET['pageid'];
}


?>



<?php
			$query = "select * from tbl_page where id = '$id'";
			$result_page = $db->select($query);

			if( $result_page ){
				while( $row = $result_page->fetch_assoc()){

			 
			 
			
			?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">



				<h2><?php echo $row['name'];?></h2>
	
				<p><?php echo $row['body'];?></p>
				
				
	</div>

</div>
<?php } }else{ header("Location: 404.php");}?>
	
	
	<?php include "inc/sidebar.php";?>
	<?php include "inc/footer.php";?>
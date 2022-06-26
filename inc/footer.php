</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	<?php 
		$query = "select * from tbl_copyright where id = '1'";
		$copy_result = $db->select($query);

		if( $copy_result ){
			while( $row = $copy_result->fetch_assoc()){
	?>


	  <p>&copy; <?php echo $row['copyright'];?>.</p>
	  <?php }} ?>
	</div>
	<div class="fixedicon clear">

	<?php 
			$query = "select * from tbl_social where id = '1'";
			$result_social = $db->select($query);

			if( $result_social){
				while( $row = $result_social->fetch_assoc()){

			
			?>
		<a href="<?php echo $row['facebook'];?>" target="_blank"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $row['twitter'];?>" target="_blank"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $row['linkdein'];?>" target="_blank"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $row['googleplus'];?>" target="_blank"><img src="images/gl.png" alt="GooglePlus"/></a>
		<?php }} ?>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>
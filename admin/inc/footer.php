<div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
    <?php 
		$query = "select * from tbl_copyright where id = '1'";
		$copy_result = $db->select($query);

		if( $copy_result ){
			while( $row = $copy_result->fetch_assoc()){
	?>


	  <p>&copy; <?php echo $row['copyright'];?><?php echo " ".date('Y');?>.</p>
	  <?php }} ?>
    </div>
</body>
</html>

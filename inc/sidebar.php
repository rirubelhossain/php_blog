<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
					<?php
						$query = "SELECT * from tbl_category ";
						$category = $db ->select($query) ;

						if($category){
							while( $row = $category->fetch_assoc()){

					?>
						<li><a href="posts.php?category=<?php echo $row['id'];?>"><?php echo $row['name']; ?></a></li>
						<?php } } else{ ?>
							<li>No Category Created</li>
						<?php } ?>
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
				<?php 
					$query = "select * from tbl_post limit 4 ";
					$post = $db->select($query);
					if( $post ){ 

						while($row = $post->fetch_assoc()){

					?>
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></h3>
						
						<a href="post.php?id = <?php echo $row['id'];?>"> <img src="admin/<?php echo $row['image'];?>" alt="post image"/></a>
						<p><?php echo $fm->testShorten($row['body'],120);?></p>	
					</div>
					<?php } }else {
						header("Location: 404.php");
					}?>
			</div>
		</div>
﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php'?>
<style>
.rightside{
float:left ;
width: 20%
}
.rightside img{
height: 150px ;
width: 170px ;
}
.leftside {
float: left ;
width:70% ;
}

</style>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>


<?php
$query = "select * from title_slogan where id = '1'";
$blog_title = $db->select($query);

if( $blog_title ){
    while( $result = $blog_title->fetch_assoc()){

     
 

?>
                <div class="block sloginblock">  
                    
                <div class="leftside">
                 <form>
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['title'] ;?>" name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['slogan'];?>" name="slogan" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Logo</label>
                            </td>
                            <td>
                                <input type="file" name="logo" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
                <div class = "rightside">
                    
                    <img src = "<?php echo $result['logo'];?>" alt="logo"/>

                </div>

               


                </div>
                <?php }}?>
            </div>
        </div>
<?php include 'inc/footer.php' ;?>

<?php
include '../lib/Session.php';
Session::checkSesssion();

?>

 
<?php include "../config/config.php"?>
<?php include "../lib/Database.php"; ?>

<?php
$db = new Database();

?>

<?php
if( !isset($_GET['delid']) || $_GET['delid'] == NULL ){    
    echo "<script>window.location = 'index.php' ;</script>";
}else{

    $postid = $_GET['delid'] ;
    $query = "delete from tbl_page where id = '$postid'";
    $pageid = $db->delete($query) ;

    if( $pageid ){
        echo "<script>alert('Page has been deleted successfully!') ;</script>";
        echo "<script>window.location = 'index.php'</script>";

    }else{
        echo "<script>alert('Page not deleted') ;</script>";
        echo "<script>window.location = 'index.php'</script>";
    }
    
}



?>
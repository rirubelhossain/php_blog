<?php
include '../lib/Session.php';
Session::checkSesssion();

?>

<?php include "../helpers/format.php";?>
<?php include "../config/config.php"?>
<?php include "../lib/Database.php"; ?>

<?php
$db = new Database();

?>

<?php
if( !isset($_GET['delpostid']) || $_GET['delpostid'] == NULL ){    
    echo "<script>window.location = 'postlist.php' ;</script>";
}else{

    $postid = $_GET['delpostid'] ;
    $query = "select * from tbl_post where id = '$postid'";
    $getdata = $db->select($query) ;

    if($getdata){
        while($delimage = $getdata->fetch_assoc()){
            $delink = $delimage['image'] ;
            unlink($delink);
        }
    }
    $delquery = "delete from tbl_post where id = '$postid'";
    $delData = $db->delete($delquery) ;

    if( $delData ){
        echo "<script>alert('Data has been deleted successfully!') ;</script>";
        echo "<script>window.location = 'postlist.php'</script>";

    }else{
        echo "<script>alert('Data not deleted') ;</script>";
        echo "<script>window.location = 'postlist.php'</script>";
    }
}



?>
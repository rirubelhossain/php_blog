<?php
class Format{

    public function formatDate($date){
        return date('F  j , Y , g:i  a', strtotime($date));
    }
    public function testShorten($text , $limit = 300 ){
        $text = $text." ";
        $text = substr($text , 0 ,$limit) ;
        $text = substr($text , 0 ,strrpos($text , ' ')) ;
        $text = $text."....";
        return $text ;
    }
}

?>
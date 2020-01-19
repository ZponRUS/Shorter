<?
$code = $_GET['c'];
if($code){
    include "config.php";
    $data = array_pop( R::find( 'redirecttable', 'code = ?', array($code)) );
    echo '<script> location="'.$data->link.'" </script>';
    
}

?>
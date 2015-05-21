<?php 
/*
 * URL FORMAT
 */

function urlFormat($str){
    //Strip out all of the whitespace
    $str = preg_replace('/\s*/', '', $str);
    //Convert the string to all lowercase
    $str = strtolower($str);
    //URL encode
    $str = urlencode($str);
    return $str;
}

/*
 * FORMAT DATE
 */
function formatDate($date){
    $date = date("F j, Y, g:i a", strtotime($date));
    return $date;
}

/*
 * Add classname Active if category is selected
 */
 function is_active($category){
     if(isset($_GET['category'])){
         if($_GET['category'] == $category){
             return 'active';
         } else{
             return ' ';
         }
     } else {
         if($category == null){
             return 'active';
         }
     }
 }
?>
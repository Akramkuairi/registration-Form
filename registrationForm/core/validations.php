<?php

function requiredVal($input){

    if(empty($input)){
       return false;
    }
    return true;
    
}

function minVal($input,$length){

    if(strlen($input)  < $length){
       return false;
    }
    return true;
    
}

function maxVal($input,$length){

    if(strlen($input)  > $length){
       return false;
    }
    return true;
    
}

//#################
function emailVal($email){

    if( !filter_var($email,FILTER_VALIDATE_EMAIL)){
       return false;
       // معنى هذا الشرط اذا ما تحقق الشرط رجعلي فولص ,طبعا الشرط انو يكون ايميل
    }
    return true;
    
}

//###### Redirection ###########
// function redirect($path){
//  header("location:$path");
// }

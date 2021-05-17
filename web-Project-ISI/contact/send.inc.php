<?php 
function empty($name, $email, $phone, $msg){
    $result=false;
if ($name=="" ||$email==""||$phone==""||$msg==""){
    $result=true;
}
return $result;
}
?>
<?php
$con=mysqli_connect('localhost','root','');
if($con)
{
    mysqli_select_db($con,'todo');
}
else{
    echo 'connection failed';
}
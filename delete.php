<?php
include 'assets/db/db.php';
if(isset($_POST['id']))
{
$id=$_POST['id'];
$m="delete from list where ID='$id'";
$qm=mysqli_query($con,$m);
if($qm)
{
    echo '1';
}
else{
    echo '2';

}
}





?>
<?php
include 'assets/db/db.php';
if(isset($_POST['id']))
{
$id=$_POST['id'];
$name=$_POST['name'];
$desc=$_POST['desc'];
$date=$_POST['date'];
$m="update list set TASKNAME='$name',TASKDESCRIPTION='$desc',TASKTIME='$date' where ID='$id'";
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
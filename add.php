<?php
include 'assets/db/db.php';

$name=$_POST['taskname'];
$desc=$_POST['taskdescription'];
$date=$_POST['taskdate'];
$m="insert into list(TASKNAME,TASKDESCRIPTION,TASKTIME) values('$name','$desc','$date')";
$qm=mysqli_query($con,$m);
if($qm)
{
    echo '1';
}
else{
    echo '2';

}






?>
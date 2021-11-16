<?php
include 'assets/db/db.php';

if(isset($_POST['id'])){
$id=$_POST['id'];
$m="select * from list where ID='$id'";
$query=mysqli_query($con,$m);
$row=mysqli_fetch_assoc($query);
$data['id']=$row['ID'];
$data['task']=$row['TASKNAME'];
$data['taskd']=$row['TASKDESCRIPTION'];
$data['time']=$row['TASKTIME'];
echo json_encode($data);


}

?>




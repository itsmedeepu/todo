<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="todo app">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 mt-3 shadow-lg rounded-3 ">
                <h2 class="text-center border-bottom border-primary fw-bold">ADD TASK</h2>
                <form class="col-lg-8 m-auto mb-4" id="taskform">
                    <div class="form-group">
                        <label class="fw-bold">Task Title*</label>
                        <input type="text" class="form-control mt-2" name="taskname" id="tname" required
                            placeholder="Enter task name">
                    </div>
                    <div class="form-group">
                        <label class="fw-bold">Task Description*</label>
                        <input type="text" class="form-control mt-2" name="taskdescription" id="tdesc" required
                            placeholder="Enter task Description">
                    </div>
                    <div class="form-group">
                        <label class="fw-bold">Task Date*</label>
                        <input type="date" class="form-control mt-2" name="taskdate" id="tdate" required
                            placeholder="Enter task Date">
                    </div>
                    <div class="form-group mt-2">
                        <button id="add" type="submit" class="btn btn-success">Add task</button>
                        <button type="reset" class="btn btn-warning float-end">Clear</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-8 col-md-4 col-sm-4 mt-3 shadow-lg rounded-3 ">
                <h2 class="text-center border-bottom border-primary fw-bold">Task list</h2>
                <table class="table table-responsive  table-hover table-bordered shadow">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Task Description</th>
                            <th scope="col">Task Date</th>
                            <th scope="col">EDIT</th>
                            <th scope="col">DELETE</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        include 'assets/db/db.php';
                        $q="select * from list";
                        $query=mysqli_query($con,$q);
                        while($row=mysqli_fetch_assoc($query))
                        {
                        ?>
                        <tr>
                            <td><?php echo $row['ID']?></td>
                            <td><?php echo $row['TASKNAME']?></td>
                            <td><?php echo $row['TASKDESCRIPTION']?></td>
                            <td><?php echo $row['TASKTIME']?></td>
                            <td><a href="#updatemodal" data-bs-toggle="modal" data-bs-target="#updatemodal"
                                    data-id="<?php echo $row['ID']; ?>" class="btn btn-success">Edit</a></td>
                            <td><a href="#deletemodal" data-bs-toggle="modal" data-bs-target="#deletemodal"
                                    data-id="<?php echo $row['ID']; ?>" class="btn btn-danger">Delete</a></td>

                        </tr>
                        <?php
                        }
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <!--UPDATE MODAL -->
    <div class="modal fade" id="updatemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Update Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="col-lg-8 m-auto mb-4" id="updateform">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id" id="eid" required>
                            <label class="fw-bold">Task Title*</label>
                            <input type="text" class="form-control mt-2" name="etaskname" id="etname" required
                                placeholder="Enter task title">
                        </div>
                        <div class="form-group">
                            <label class="fw-bold">Task Description*</label>
                            <textarea class="form-control mt-2" name="etaskdescription" id="etdesc" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="fw-bold">Task Date*</label>
                            <input type="date" class="form-control mt-2" name="etaskdate" id="etdate" required
                                placeholder="Enter task time">
                        </div>
                        <div class="form-group mt-2">
                            <button id="upd" type="submit" class="btn btn-success">Update task</button>
                            <button type="reset" class="btn btn-warning float-end">Clear</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-----upate modal ends here -->


    <!--delete modal-->
    <div class="modal fade" id="deletemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="col-lg-8 m-auto mb-4" id="updateform">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="did" id="did" required>
                            <label class="fw-bold">Task Title*</label>
                            <input type="text" class="form-control mt-2" name="dtaskname" id="dtname" required
                                placeholder="Enter task name" readonly>
                        </div>
                        <div class="form-group">
                            <label class="fw-bold">Task Description*</label>
                            <textarea class="form-control mt-2" name="dtaskdescription" id="dtdesc" rows="4"
                                readonly></textarea>
                        </div>
                        <div class="form-group">
                            <label class="fw-bold">Task Date*</label>
                            <input type="date" class="form-control mt-2" name="dtaskdate" id="dtdate" required
                                placeholder="Enter task Date" readonly>
                        </div>
                        <div class="form-group mt-2">
                            <button id="delete" type="submit" class="btn btn-success">Delete task</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>





    <!--delete modal--->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#add').click(function () {

                var tname = $("#tname").val();
                var tdesc = $("#tdesc").val();
                var tdate = $("#tdate").val();

                if (tname == '') {
                    alert('Enter task title');
                    $("#tname").focus();

                    return false;
                } else if (tdesc == '') {
                    alert('Enter task description');
                    $("#tdesc").focus();
                    return false;

                } else if (tdate == '') {
                    alert('Enter task date');
                    $("#date").focus();
                    return false;

                }

            })
            $('#taskform').on('submit', function (event) {
                event.preventDefault();
                var data = $('#taskform').serialize();
                $.ajax({
                    url: 'add.php',
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        if (data == 1) {

                            alert('task added successfully');
                            $('#taskform')[0].reset();
                            window.location.reload();



                        } else {
                            alert('task failed to add ')

                        }


                    }

                })

            })
            $('#updatemodal').on('show.bs.modal', function (e) {
                var
                    ID = $(e.relatedTarget).data('id');
                //alert(ID);
                $.ajax({
                    url: "view.php",
                    method: "POST",
                    data: {
                        id: ID
                    },
                    dataType: "JSON",
                    success: function (data) {


                        $('#eid').val(data.id);
                        $('#etname').val(data.task);
                        $('#etdesc').val(data.taskd);
                        $('#etdate').val(data.time);

                    },





                })

            });
            $('#upd').on('click', function (event) {
                event.preventDefault();
                var id = $('#eid').val();
                var name = $('#etname').val();
                var desc = $('#etdesc').val();
                var date = $('#etdate').val();

                //alert(id);
                $.ajax({
                    url: 'update.php',
                    type: 'POST',
                    data: {
                        id: id,
                        name: name,
                        desc: desc,
                        date: date
                    },
                    success: function (data) {
                        // alert(data);
                        if (data == 1) {
                            alert('task updated successfully');
                            $('#taskform')[0].reset();
                            window.location.reload();
                        } else {
                            alert('task failed update ')

                        }


                    },

                })

            })
            $('#deletemodal').on('show.bs.modal', function (e) {
                var ID = $(e.relatedTarget).data('id');
                //alert(ID);
                $.ajax({
                    url: "view.php",
                    method: "POST",
                    data: {
                        id: ID
                    },
                    dataType: "JSON",
                    success: function (data) {
                        $('#did').val(data.id);
                        $('#dtname').val(data.task);
                        $('#dtdesc').val(data.taskd);
                        $('#dtdate').val(data.time);

                    },
                })

            });

            $('#delete').on('click', function (event) {
                event.preventDefault();
                var id = $('#did').val();
                //alert(id);
                $.ajax({
                    url: 'delete.php',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function (data) {
                        // alert(data);
                        if (data == 1) {
                            alert('task deleted successfully');
                            $('#taskform')[0].reset();
                            window.location.reload();
                        } else {
                            alert('task failed to delete');

                        }


                    },

                })

            })


        })
    </script>
</body>

</html>
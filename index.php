<?php
session_start();
require 'dbcon.php';
?>
<?php 
include('./includes/header.php');
?>
    <div class="container mt-5">
        <?php
        
        include('message.php');
        ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student Details<a href="student-create.php" class="btn btn-primary float-end">Add student</a></h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Phone</th>
                                <th>Course</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query = "SELECT * from student_table";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $student) {
                                    // echo $student['name'];
                            ?>
                                    <tr>
                                        <td><?= $student['id']; ?></td>
                                        <td><?= $student['name']; ?></td>
                                        <td><?= $student['email']; ?></td>
                                        <td><?= $student['phone']; ?></td>
                                        <td><?= $student['course']; ?></td>
                                        <td>
                                            <a href="student-view.php?id=<?= $student['id'] ?>" class="btn btn-info btn-sm">View</a>
                                            <a href="student-edit.php?id=<?= $student['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                                           
                                            <form action="code.php" method="POST" class="d-inline">
                                            <button type="submit" name ="delete-student" value="<?=$student['id'];?>"  class="btn btn-danger btn-sm">Delete</a>    
                                            </form>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<h5>no record found</h5>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php 
include('./includes/footer.php')
?>
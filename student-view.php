<?php
require 'dbcon.php'
?>

<?php
include('./includes/header.php')
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student View Details <a href="index.php" class="btn btn-danger float-end">Go back</a></h4>
                </div>
                <div class="card-body">

                    <?php
                    if (isset($_GET['id'])) {
                        $student_id = mysqli_real_escape_string($con, $_GET['id']);
                        $query = "SELECT * FROM student_table WHERE id=$student_id";

                        $query_run = mysqli_query($con, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                            $student = mysqli_fetch_array($query_run);
                            // print_r($student);
                    ?>
                            <div class="mb-3">
                                <label for="">Student name</label>
                                <p class="form-control">
                                    <?= $student['name'] ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label for="">Student email</label>
                                <p class="form-control">
                                    <?= $student['email'] ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label for="">Student Phone number</label>
                                <p class="form-control">
                                    <?= $student['phone'] ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label for="">Student course</label>
                                <p class="form-control">
                                    <?= $student['course'] ?>
                                </p>
                            </div>
                    <?php

                        } else {
                            echo "<h5>No such id record found</h5>";
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php
include('./includes/footer.php')
?>
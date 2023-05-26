<?php
require_once 'dbcon.php';
?>
<?php require_once('./includes/header.php') ?>

<div class="container mt-5">

  <div class="row">
    <div class="col-md-12">
      <div class="card-header">
        <h4>Student View Details
          <a href='index.php' class="btn btn-danger float-end">Back</a>
        </h4>
      </div>
      <div class="card-body">

        <?php
          if (isset($_GET['id'])) {

            $student_id = mysqli_real_escape_string($con, $_GET['id']); //protect the get['id'] 
            $query = "SELECT * FROM students WHERE id='$student_id'";

            //execute query
            $query_run = mysqli_query($con, $query);

            //check if exist student inside the database
            if (mysqli_num_rows($query_run) > 0) {

              $student = mysqli_fetch_array($query_run);
          ?>

        <div class="mb-3">
          <label for="">Student Name</label>
          <p class="form-control">
            <?= $student['name'] ;?>
          </p>
        </div>
        <div class="mb-3">
          <label for="">Student Email</label>
          <p class="form-control">
            <?= $student['email'] ;?>
          </p>
        </div>
        <div class="mb-3">
          <label for="">Student Phone</label>
          <p class="form-control">
            <?= $student['phone'] ;?>
          </p>
        </div>
        <div class="mb-3">
          <label for="">Student Course</label>
          <p class="form-control">
            <?= $student['course'] ;?>
          </p>
        </div>

        <?php


            } else {
              echo '<h4>No student found</h4>';
            }
          }
          ?>

      </div>


    </div>
  </div>
</div>

<?php require_once('./includes/footer.php') ?>
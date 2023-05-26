<?php
session_start();
require_once 'dbcon.php';
?>
<?php require_once('./includes/header.php') ?>

<div class="container mt-5">

  <?php require 'message.php'; ?>

  <div class="row">
    <div class="col-md-12">
      <div class="card-header">
        <h4>Student Edit
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
        <form action="code.php" method="POST">
          <input type="hidden" name="student_id" value="<?=$student['id'];?>">

          <div class="mb-3">
            <label for="">Student Name</label>
            <input type="text" name="name" class="form-control" value="<?= $student['name'] ;?>">
          </div>
          <div class="mb-3">
            <label for="">Student Email</label>
            <input type="email" name="email" class="form-control" value="<?= $student['email'] ;?>">
          </div>
          <div class="mb-3">
            <label for="">Student Phone</label>
            <input type="text" name="phone" class="form-control" value="<?= $student['phone'] ?>">
          </div>
          <div class="mb-3">
            <label for="">Student Course</label>
            <input type="text" name="course" class="form-control" value="<?= $student['name']; ?>">
          </div>
          <div class="mb-3">
            <button type="submit" name="update_student" class="btn btn-primary">
              Update student
            </button>
          </div>
        </form>

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
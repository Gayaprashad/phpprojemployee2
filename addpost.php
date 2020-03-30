<?php
  require 'config/config.php';
  require 'config/db.php';
  if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $salary=mysqli_real_escape_string($conn,$_POST['salary']);
    $designation=mysqli_real_escape_string($conn,$_POST['designation']);
    $age=mysqli_real_escape_string($conn,$_POST['age']);

    $query ="INSERT INTO employee (name,salary,designation,age) values ('$name','$salary','$designation','$age')";

    if(mysqli_query($conn,$query)){
      header('Location:'.path.'');
    }else{
      echo"error".mysqli_error($conn);
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style/main.css">
  </head>
  <body>
    <?php include 'inc/navbar.php'; ?>
  <div class="container">
    <h1>Add Employee</h1>
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="form">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" id="name" class="form-control">
          <small class="form-text">Error message</small>
        </div>
        <div class="form-group">
          <label>Salary</label>
          <input type="text" name="salary" id="salary" class="form-control">
          <small class="form-text">Error message</small>
        </div>
        <div class="form-group">
          <label>Designation</label>
          <input type="text" name="designation" id="designation" class="form-control">
          <small class="form-text">Error message</small>
        </div>
        <div class="form-group">
          <label>Age</label>
          <input type="text" name="age" id="age" class="form-control">
          <small class="form-text">Error message</small>
        </div>
        <input type="submit" name="submit" value="submit" class="btn btn-primary">
      </form>
    </div>
  </body>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="script/validation.js"> </script>
  </html>

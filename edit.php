<?php
  require 'config/config.php';
  require 'config/db.php';

  if (isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $age = mysqli_real_escape_string($conn,$_POST['age']);
    $salary = mysqli_real_escape_string($conn,$_POST['salary']);
    $designation = mysqli_real_escape_string($conn,$_POST['designation']);
    $edit_id = mysqli_real_escape_string($conn,$_POST['edit_id']);

    $query =" UPDATE employee
              SET name='$name',
              age ='$age',
              salary = '$salary',
              designation ='$designation'
              WHERE eid ={$edit_id}";

    if(mysqli_query($conn,$query)){
      header('LOCATION:'.path.'/display.php');
    }
    else {
      echo "error:".mysqli_error($conn);
    }

  }
  else{
    // echo 'the form is not yet submitted';
  }
  $id =mysqli_real_escape_string($conn,$_GET['id']);
  $sql= "SELECT * FROM EMPLOYEE where eid=".$id;

  $result= mysqli_query($conn,$sql);

  $emp = mysqli_fetch_assoc($result);
  //var_dump($emp);
  mysqli_free_result($result);

  mysqli_close($conn);

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
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="form">
      <div class="form-group">
        <label>Name</label>
        <input type="text" id ="name"class="form-control" name="name" value="<?php echo $emp['name'];?>">
        <small class="form-text">Error Message</small>
      </div>
      <div class="form-group">
        <label>Age</label>
        <input type="text" id="age" class="form-control" name="age" value="<?php echo $emp['age'];?>">
        <small class="form-text">Error Message</small>
      </div>
      <div class="form-group">
        <label>Salary</label>
        <input type="text" id="salary" class="form-control" name="salary" value="<?php echo $emp['salary'];?>">
        <small class="form-text">Error message</small>
      </div>
      <div class="form-group">
        <label>Designation</label>
        <input type="text" id="designation" class="form-control" name="designation" value="<?php echo $emp['designation'];?>">
        <small class="form-text">Error Message</small>
      </div>
      <input type="hidden" name="edit_id" value="<?php echo $emp['eid'];?>">
      <input type="submit" name="submit" value="submit">
    </form>
  </div>
</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="script/validation.js"> </script>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<form>
  , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

include 'connection.php';
$query="Select * from city";
$result=mysqli_query($conn,$query);
$query3="Select * from specialist";
$result2=mysqli_query($conn,$query3);
?>
<h1>Doctor registration</h1>
<form method="post" enctype="multipart/form-data">
    
  <div class="form-group row">
    <label for="Named" class="col-sm-2 col-form-label">Doctor Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" placeholder="Name" name="Named">
    </div>
  </div>
  <div class="form-group row">
    <label for="Named" class="col-sm-2 col-form-label">Doctor Email</label>
    <div class="col-sm-10">
<input type="email" class="form-control" id="" placeholder="Email" name="Emaild">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Education</label>
    <div class="col-sm-10">
      <input type="text" name="education" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
      <label for="inputState" class="col-sm-2 col-form-label">State</label>
      <div class="col-sm-10">
      <select id="inputState" name="Specialist" class="form-control">
     
                                        <?php
        while($row=mysqli_fetch_array($result2))
        {
        ?>
            <option value=<?php echo $row['id'];?>>
            <?php echo $row['specialist'];?>
            </option>
        <?php
        }
        ?>
                                         
                                        
      </select>
      </div>
    </div>
  <div class="form-group row">
      <label for="inputState" class="col-sm-2 col-form-label">State</label>
      <div class="col-sm-10">
      <select id="inputState" name="city" class="form-control">
     
                                        <?php
        while($row=mysqli_fetch_array($result))
        {
        ?>
            <option value=<?php echo $row['C_id'];?>>
            <?php echo $row['C_name'];?>
            </option>
        <?php
        }
        ?>
                                         
                                        
      </select>
      </div>
    </div>
    <input type="file" name="imagess"/>
        <br>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="btnSubmit">Sign in</button>
    </div>
  </div>
</form>
</body>

<?php
 if(isset($_POST['btnSubmit']))
{
    $images1=$_FILES['imagess']['tmp_name'];
  $img=addslashes(file_get_contents($images1));
    $dname=$_POST['Named'];
    $Emaild=$_POST['Emaild'];
   
    $pass=$_POST['password'];
    $citypa=$_POST['city'];
    $special=$_POST['Specialist'];
    $edu=$_POST['education'];
    $query1="insert into doctor(d_name, d_email, d_password,  city, education,specialization,image) VALUES ('$dname','$Emaild','$pass','$citypa','$edu','$special','$img')";
   $result1=mysqli_query($conn,$query1);
   //INSERT INTO `doctor`(`d_name`, `d_email`, `d_password`, `image`, `city`, `education`, `availabeid`, `specialization`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
   if($result1)
   {
     echo "Successfull";
   }else{
    echo "fail";
   $err= mysqli_error($conn);
   echo $err;
   }
}?>
</html>
<?php 
 include '../adminpanel.php';
include '../connection.php';
 $query="Select * from city";
$result=mysqli_query($conn,$query);

?>

<form method="post">

 <div class="form-group row">
    <label for="Named" class="col-sm-2 col-form-label">City Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" placeholder="City Name" name="cna">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="btnSubmit">Create</button>
    </div>
  </div>
</form>

<?php
 include '../adminpanelfooter.php';
 if(isset($_POST['btnSubmit']))
{
   

    $cname=$_POST['cna'];
    $query1="insert into city(c_name) VALUES ('$cname')";
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
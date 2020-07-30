<?php 
session_start();
if(!isset($_SESSION['docid']))
{
    header("Location:Login.php");
}
include '../connection.php';
 $is=$_SESSION['docid']; 
  
$query="select * from availabe where D_id=".$is;
$result=mysqli_query($conn,$query);

include '../header.php';
?>
<div class="container">
<a class="btn btn-success" href="../CreateAvailability.php">Add NEW</a>
<br>

<table id="example" class="table table-striped table-bordered" style="width:100%;top:200px">
        <thead>
            <tr>
                <th>Doctor Name</th>
                <th>Day</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row=mysqli_fetch_array($result))
        {
            ?>
        <tr>
                <td><?php 
       $query1="select * from doctor where d_id =".$row['D_id'];
       $result1=mysqli_query($conn,$query1);
       $row1=mysqli_fetch_row($result1);
      echo $row1[1];
      ?></td>
               <td>
                <?php 
     
      
     $query3="select * from dayss where Id=".$row['days'];
    $result3=mysqli_query($conn,$query3);
    $row3=mysqli_fetch_row($result3);
    echo $row3[1];
      ?>
                </td>
                
                <td><?php echo date("g:i a", strtotime($row['stime']));?></td>
                <td><?php echo date("g:i a", strtotime($row['etime']));?></td>
                <td><a href='editavailability.php?id=<?php echo $row['id'] ?>' class="btn btn-success ">Edit</a></td>
                <td><a href='del.php?id=<?php echo $row['id'] ?>' class="btn btn-danger ">Delete</a></td>

               <?php 
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
            <th>Doctor Name</th>
                <th>Day</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </tfoot>
    </table>
    </div>
    <?php 
include "../footer.php";
?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
});</script>
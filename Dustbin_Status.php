     <link rel="stylesheet" href="edustbinstyles.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
       <div class="bod">
        <ul>
            <li class="left">Swachh Bharat Swasth Bharat</li>
            <li class="right">Welcome to E-Dustbin Portal</li>
        </ul>
    </div>
    <div class="container">
       <form action="" method="post">
        <table class="table table-striped">
           <thead>
            <th>Id</th>
            <th>Status-1</th>
            <th>Status-1 Half(Time)</th>
            <th>Status-2</th>
            <th>Status-2 Full(Time)</th>
            <th>Check</th>
            <th>Last Full</th>
            </thead>
<?php
        if(isset($_POST['refresh'])){
             $connection = mysqli_connect("localhost","root","","test");
            if($connection)
                //echo"connected";
            $query = "select * from space";
            $result = mysqli_query($connection,$query);
            if(!$result)
                die("failed ".mysqli_error($connection));
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $status1 = $row['status_1'];
                $status1_time = $row['status_1_time'];
                $status2 = $row['status_2'];
                $status2_time = $row['status_2_time'];
                $lastfull = $row['last_full'];
                echo"<tr>";
                echo"<td>$id</td>";
                echo"<td>$status1</td>";
                echo"<td>$status1_time</td>";
                echo"<td>$status2</td>";
                echo"<td>$status2_time</td>";
                echo"<td><a class='btn btn-primary' href='update_status.php?source=3'>Check</a></td>";
                echo"<td>$lastfull</td>";
                echo"</tr>";
            }
        }
?>
</table>
   <button class="btn btn-warning" type="submit" name="refresh">Refresh</button>
   <a href="E_Dustbin.php" class="btn btn-primary">Home</a>
   </form>
    </div>
<?php
$connection = mysqli_connect("localhost","root","","test");
$source="";
if(isset($_GET['source'])){
    $source = $_GET['source'];
    if($source=="1"){
        $query = "update space set status_1 = 'Half Full',status_1_time = NOW()";
        $result = mysqli_query($connection,$query);
        if(!$result)
            die("Failed due to".mysqli_error($connection));
    }else if($source=="2"){
        $query = "update space set status_2 = 'Full',status_2_time = NOW()";
        $result = mysqli_query($connection,$query);
        if(!$result)
            die("Failed due to".mysqli_error($connection));
    }else if($source=="3"){
        $query = "select status_2_time from space";
        $result = mysqli_query($connection,$query);
        if(!$result)
            die("Failed due to".mysqli_error($connection));
        while($row = mysqli_fetch_assoc($result))
        $lastfull = $row['status_2_time'];
        $query = "update space set status_1 = 'Empty',status_1_time = 0,status_2 = 'Empty',status_2_time = 0,last_full='$lastfull'";
        $result = mysqli_query($connection,$query);
        if(!$result)
            die("Failed due to".mysqli_error($connection));        
    }
    header("Location: Dustbin_Status.php");
}
?>
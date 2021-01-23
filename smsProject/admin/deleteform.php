<?php
session_start();
    include_once '../db.php';
    $sid = $_SESSION['id'];
    $query = "DELETE FROM `students` WHERE `id`=$sid";
    $result = mysqli_query($conn,$query);
    // var_dump($id);
    if($result >0){?>
        <script>
            alert('Data Deleted successfully.'); 
            window.open('deletestd.php','_self');
        </script> <?php
    }
?>
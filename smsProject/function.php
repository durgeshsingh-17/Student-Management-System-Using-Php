<?php
    function showDetails($std, $rno) {

        include_once 'db.php';
        
       // $query = "SELECT * FROM `students` WHERE `rollNumber`=$rno AND `standard`=$std";
       // echo "$query";
        $result = mysqli_query($conn, "SELECT * FROM `students` WHERE `rollNumber`=$rno AND `standard`=$std");
         //echo "$query";
 //echo "<pre>"; print_r($result);die;
          

        if ( $data = mysqli_fetch_assoc($result)) {
          //  $row = mysqli_num_rows($result);
             //die(var_dump($result));
            // echo "</pre>";
            //if ($row) {
             //   $data = mysqli_fetch_assoc($result);
            ?>
                <table border="1" style="width:50%; margin-top:20px;" align="center">
                    <tr>
                        <th colspan="3">&nbsp;Student Details</th>
                    </tr>
                    <tr>
                        <td rowspan="6" align="center">
                            <img src="upload/<?php echo $data['image']; ?>" style="max-width:120px; max-height:150px; padding-left:30px;">
                        </td>
                    </tr>
                    <tr>
                        <th>&nbsp;Roll Number</th>
                        <th>&nbsp;<?php echo $data['rollNumber']; ?></th>
                    </tr>
                    <tr>
                        <th>&nbsp;Name</th>
                        <th>&nbsp;<?php echo $data['name']; ?></th>
                    </tr>
                    <tr>
                        <th>&nbsp;Standard</th>
                        <th>&nbsp;<?php echo $data['standard']; ?></th>
                    </tr>
                    <tr>
                        <th>&nbsp;Parents contact number</th>
                        <th>&nbsp;<?php echo $data['pContactNum']; ?></th>
                    </tr>
                    <tr>
                        <th>&nbsp;City</th>
                        <th>&nbsp;<?php echo $data['city']; ?></th>
                    </tr>
                </table>
        <?php
        } else {
            echo "<script>alert('Student details not found');</script>";
        }
    }

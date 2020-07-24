<!DOCTYPE html>
<html lang="en">
<head>
  <title>User-List</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<table class="table">
    <th>
        <tr>
    <td>ID</td>
    <td>Full Name</td>
    <td>Email-Id</td>
    <td>Contact</td>
    <td>Image</td>
    <td>Status</td>
    <td>Action</td>
</tr>
</th>

<?php foreach ($userData as $userData) { ?>
    <tr> 
    
    <input type="hidden" id="userid" name="userid" value="<?php echo $userData['id'];?>">
    <td><?php echo $userData['id'];?></td>
    <td><?php echo $userData['fullname'];?></td>
    <td><?php echo $userData['email_id'];?></td>
    <td><?php echo $userData['contact'];?></td>
    <td><img style="position: relative;height: 100px; width: 150px;" src="<?php echo base_url().'uploads/'. $userData['image'];?>" /></td>
    <td>
           <?php 
           if($userData['status'] == 1)
               {
                    ?>
                   <button name="deactivation" id="deactivation" value="<?php echo $userData['id'];?>">De-activate</button>
					<?php
               }
                 else
                    {
                        ?>
                       <button name="activation" id="activation" value="<?php echo $userData['id'];?>">Activate</button>
                        <?php
                    }
           ?> 
    
    </td>
    <td><a href="<?php echo base_url() . "UserController/updateUser?id=" . $userData['id']; ?>">Update </a> <a href="<?php echo base_url() . "UserController/deleteUser?id=" . $userData['id']; ?>"> Delete</a></td>
    </tr> 
    <?php } ?> 
</table>
</body>
<script>
$(document).ready(function(){
  $("#deactivation").click(function(){
    var userid = $("#deactivation").val();
    var statusCode = 0;
    $.ajax({
                type:'post', 
                url:'<?=base_url()?>UserController/statusUpdate',
                 data: {id: userid,statusCode: statusCode},
                 success: function(data)
                 {
                    window.location.href = '<?=base_url()?>UserController/userListData';
                }

    })
  });


  $("#activation").click(function(){
    var userid = $("#activation").val();
    var statusCode = 1;
    $.ajax({
                type:'post', 
                url:'<?=base_url()?>UserController/statusUpdate',
                 data: {id: userid,statusCode: statusCode},
                 success: function(data)
                 {
                    window.location.href = '<?=base_url()?>UserController/userListData';
                }

    })
  });



});



</script>
</html>

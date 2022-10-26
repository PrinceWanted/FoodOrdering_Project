<?php

$conn = mysqli_connect('localhost','john','test1234','foodordering');

if(!$conn){
    echo 'Connection error' . mysqli_connect_error();
}

$sql= 'SELECT System_Name FROM sys_user';

$result = mysqli_query($conn,$sql);

$user = mysqli_fetch_all($result, MYSQLI_ASSOC);


print_r($user);
?>

<!DOCTYPE html>
<html>

<?php foreach ($user as $user){?>
    
    
    <h6><?php echo htmlspecialchars($user['System_Name']); ?></h6>
    
    
    $user = mysqli_real_escape_string($conn,$_POST['user']);
    
    <?php } ?>

    
    <?php
    
    
    
    
    
    
    ?>


</html>
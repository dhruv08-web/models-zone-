<?php
session_start();
echo "Welcome ".$_SESSION['user_name'];
?>
<html>
    <head>
        <title>Display</title>
        <style>
            body{
                background: #D071f9;
            }
            table{
                background-color: white;
            }
        </style>
    </head>
</html>
<?php
include("connection.php");
error_reporting(0);

$userprofile=$_SESSION['user_name'];
if($userprofile == true)
{

}
else{
    header('location:login.php');
}
$query = "SELECT * FROM form";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);


if($total !=0)
{
    ?>
    <h2 align="center"><mark>Displaying All Records</mark></h2>
    <center><table border="1" cellspacing="5" width="90%">
        <tr>
        <th width="5%">ID</th>
        <th width="10%">First Name</th>
        <th width="10%">Last Name</th>
        <th width="10%">Gender</th>
        <th width="20%">Email</th>
        <th width="10%">Phone</th>
        <th width="25%">Address</th>
        </tr>
    <?php
    while($result = mysqli_fetch_assoc($data))
    {
        echo "<tr>
                 <td>".$result['id']."</td>
                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['gender']."</td>
                <td>".$result['email']."</td>
                <td>".$result['phone']."</td>
                <td>".$result['address']."</td>
            </tr>";
    }
}
else
{
    echo "No records found";
}
?>
</table>
</center>
<a href="logout.php"><input type="submit" name="" value="LogOut" style="background: blue; color:white; height:35px; width:100px; margin-top: 20px; font-size: 18px; border:0; border-radius:5px; cursor:pointer;"></a>
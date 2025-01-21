<?php include("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type= "text/css" href="style.css">
    <title>PHP Crud Operations</title>

    <script>
    function validateForm() {
      
        var pwd = document.forms["registrationForm"]["password"].value;
        var cpwd = document.forms["registrationForm"]["conpassword"].value;
      
        var email = document.forms["registrationForm"]["email"].value;
    
        // Check if password and confirm password match
        if (pwd !== cpwd) {
            alert("Password and Confirm Password do not match");
            return false;
        }

        // Check if email is in a valid format (basic check)
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (email !== "" && !email.match(emailPattern)) {
            alert("Invalid email address");
            return false;
        }
    }
</script>

</head>
<body>
    <div class="container">
    <form action="#" method="POST" onsubmit="return validateForm();" name="registrationForm"> 
        <div class="title">
            Registration Form
        </div>
        <div class="form">
            <div class="input_field">
                <label>First Name</label>
                <input type="text" class="input" name="fname" required>
            </div>

            <div class="input_field">
                <label>Last Name</label>
                <input type="text" class="input" name="lname" required>
            </div>

            <div class="input_field">
                <label>Password</label>
                <input type="password" class="input" name="password" required>
            </div>

            <div class="input_field">
                <label>Confirm Password</label>
                <input type="password" class="input" name="conpassword" required>
            </div>

            <div class="input_field">
                <label>Gender</label>
                <div class="custom_select">
                <select name="gender" required>
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                </div>
            </div>

            <div class="input_field">
                <label>Email Address</label>
                <input type="text" class="input" name="email">
            </div>

            <div class="input_field">
                <label>Phone No.</label>
                <input type="text" class="input" name="phone" required>
            </div>

            <div class="input_field">
                <label>Address</label>
                <textarea class="textarea" name="address" required></textarea>
            </div>

            <div class="input_field terms">
                <label class="check">
                    <input type="checkbox" required>
                    <span class="checkmark"></span>
                </label>
                <p>Agree to terms and conditions</p>                    
            </div>

            <div class="input_field">
                <input type="submit" value="Register" class="btn" name="register">
            </div>

            </div>
        </form>
    </div>
</body>

</html>

<?php
    if($_POST['register'])
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $pwd = $_POST['password'];
        $cpwd = $_POST['conpassword'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $query = "INSERT INTO form (fname,lname,password,cpassword,gender,email,phone,address) values('$fname','$lname','$pwd','$cpwd','$gender','$email','$phone','$address')";
        $data=mysqli_query($conn,$query);

        if($data)
        {
            echo "<script> alert('You Are Now A Member Of PUMP HOUSE !
            For Further Details, Contact Gym..') </script>";
        }
        else
        {
            echo "<script> alert('Failed')</script>";
        }

    }
?>
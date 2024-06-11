<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <style type="text/css">
        .container{
            /*border: 1px solid black;*/
            box-shadow: 0px 0px 15px -3px rgba(0,0,0,.1), 0 4px 6px -2px rgba(0,0,0,.05);
            width: 400px;
            margin-left: 400px;
            margin-top: 10px;
            height: auto;
            padding: 30px;
        }
      
        input{
            width: 290px;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #efefef;

        }
        select{
            width: 290px;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #efefef;
        }
        input[type="submit"]{
            background-color:rgb(209 209 209 / 5%);
            border: 1px solid rgb(209 209 209 / 5%);
            width: 100px;
            padding: 9px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.12), 0 1px 5px 0 rgba(0,0,0,.2);
        }
        input[type="submit"]:hover{
            cursor: pointer;
            opacity: .9;
            background-color: orange;
            border: 1px solid orange;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2>Student Registration</h2>
    <form action="register.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>
        
        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" required><br><br>
        
        <label for="other_name">Other Name:</label>
        <input type="text" id="other_name" name="other_name"><br><br>
        
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="phone">Phone:</label>
        <input type="number" id="phone" name="phone" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="confirm_password">Confirm:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        
        <input type="submit" value="Register">&nbsp &nbsp Old Students? <a href="login.php">Signin</a>
    </form>
</div>
</body>
</html>

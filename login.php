<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
     <style type="text/css">
        .container{
            /*border: 1px solid black;*/
            box-shadow: 0px 0px 15px -3px rgba(0,0,0,.1), 0 4px 6px -2px rgba(0,0,0,.05);
            width: 400px;
            margin-left: 400px;
            margin-top: 50px;
            height: auto;
            padding: 30px;
        }
        input{
            width: 80%;
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
    <div class="container"><br>
       <center><img src="images.png"></center> 
    <h2>Student Login</h2>
    <form action="checkuser.php" method="post">
        <label for="email">UG-Number:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">&nbsp &nbsp Fresher? <a href="student_form.php">Apply now</a>
    </form>
</div>
</body>
</html>

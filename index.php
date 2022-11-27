<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOU LOST WE FOUND</title>
</head>
<body>
    <div class="logo">
        <img src="assets/logo1.png" width="250px" alt="">
        <div class="container">
            <a href="admin"><h3> <i class="fas fa-user-shield"></i>SUPER ADMIN LOGIN</h3></a>
            <a href="station"><h3> <i class="fas fa-user-secret"></i> POLICE STATION LOGIN</h3></a>
            <a href="citizen"><h3><i class="fas fa-user"></i>CITIZEN LOGIN</h3></a>
        </div>
    </div>
    <!-- <div class="form">
        Check Application Status : &nbsp;
        <form action="">
            <input type="number" placeholder="Application ID">
            <input type="submit" value="Check">
        </form>
    </div> -->
    <div class="footer">
        &copy; 2022 | YOU LOST WE FOUND | Made With ❤️ by - Team Remlax
    </div>
   
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
        body{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-image: url('assets/tricolor.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        .form{
            display:flex;
            justify-content: center;
            margin-top: 50px;
        }
        .form input{
            border-radius: 20px;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            
            color: black;
            text-align: center;
            }
        .logo img{
           
            display: block;
            margin-left: auto;
            margin-right: auto;
            
        }
        .container{
            display: flex;
            display: flex;
            justify-content: center;
        }
       a{
        padding-left: 35px;
        text-decoration: none;
        color: black;
       }
       a:hover{
        text-decoration: underline;
        animation: name duration timing-function delay iteration-count direction fill-mode;
       }
    </style>
</body>
</html>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>login</title>
   
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: hsl(211, 77%, 64%);
        }
        .card {
            width: 100%;
            max-width: 700px;
            padding: 80px;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 50px;
        }
         .card-body {
            padding: 20px;
        } 
        .form {
            margin-bottom: 20px;
        }
        .login {
            width: 100%;
            padding: 20px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 15px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <section class="bg-image">
        <div class="icon">
            <div class="users">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-center">
                                    Login
                                </h1>

                               

                            
                                <form action="./backend/useraction.php" method="POST">
                                    <div class="form">
                                        <input type="email" id="form3Example1c" class="form-control form-control-lg" name="email" placeholder="email@example.com"/>
                                        
                                    </div>
                                    <div class="form">
                                        <input type="password" id="form3Example3c" class="form-control form-control-lg" name="password" placeholder="*******" />

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <a href="passwordreset.html">Forgot password?</a>
                                        </div>
                                    </div>
                                <button type="submit" class="login" name="login">Login</button>
                                
                                    <p class="not">Not a member? <a href="register.php">Register</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    

</body>
</html>
<?php session_start() ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>login</title>
    
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    
              <a class="nav-link" href="login.php">Login</a>
              <!-- <a class="nav-link" href="src/register.php">Register</a> -->
            

      <section class="bg-image">
        <div class="icon">
            <div class="users">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-center">
                                    Register 
                                   
                                </h1>
                                <form action="./backend/useraction.php" method="POST">
                                    <div class="form">
                                        <input type="text" id="typeEmailX" class="form-control form-control-lg"  placeholder="First Names" name="firstname" required />
                                        
                                    </div>
                                    <div class="form">
                                        <input type="text" id="typeEmailX" class="form-control form-control-lg"  placeholder="Last Names" name="lastname" required />
                                        >
                                    </div>
                                    <div class="form">
                                        <input type="email" id="typeEmailX" class="form-control form-control-lg"  placeholder="email@example.com" name="email" required />
                                       
                                    </div>
                                    <div class="form">
                                        <input type="password" id="typePasswordX" class="form-control form-control-lg"  placeholder="Password" name="password" required minlength="8" maxlength="12"/>
                                       
                                    </div>
                                    <div class="form">
                                        <input type="text" id="idnum" class="form-control form-control-lg"  placeholder="CRN number" name="idnum" required />
                                        
                                    </div>
                                    <div class="form">
                                        <input type="number" id="age" class="form-control form-control-lg"  placeholder="Age" name="age" min="18"/>
                                       
                                    </div>

                                    <div class="content-center">
                                        <button type="submit" class="btn" name="register">Register</button>
                                    </div>

                                    <div class="text-center">
                                        <p class="small">Already have an account? <a href="../src/login.php" class="danger">Login</a></p>
                                    </div>
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    


</body>
</html>
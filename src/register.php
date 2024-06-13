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
                                    <?php if(isset($_SESSION['validation']['firstname'])): ?>
                                            <span class="text-danger"><?php 
                                            echo $_SESSION['validation']['registser']; 
                                            unset($_SESSION['validation']['register']);
                                            ?></span>
                                            
                                        <?php endif; ?>
                                </h1>
                                <form action="./backend/useraction.php" method="POST">
                                    <div class="form">
                                        <input type="text" id="typeEmailX" class="form-control form-control-lg"  placeholder="First Names" name="firstname" required />
                                        <?php if(isset($_SESSION['validation']['firstname'])): ?>
                                            <span class="danger"><?php 
                                            echo $_SESSION['validation']['firstname']; 
                                            unset($_SESSION['validation']['firstname']);
                                            ?></span>
                                            
                                        <?php endif; ?>
                                    </div>
                                    <div class="form">
                                        <input type="text" id="typeEmailX" class="form-control form-control-lg"  placeholder="Last Names" name="lastname" required />
                                        <?php if(isset($_SESSION['validation']['lastname'])): ?>
                                            <span class="danger"><?php 
                                            echo $_SESSION['validation']['lastname']; 
                                            unset($_SESSION['validation']['lastname']);
                                            ?></span>
                                            
                                        <?php endif; ?>
                                    </div>
                                    <div class="form">
                                        <input type="email" id="typeEmailX" class="form-control form-control-lg"  placeholder="email@example.com" name="email" required />
                                        <?php if(isset($_SESSION['validation']['email'])): ?>
                                            <span class="danger"><?php 
                                            echo $_SESSION['validation']['email']; 
                                            unset($_SESSION['validation']['email']);
                                            ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form">
                                        <input type="password" id="typePasswordX" class="form-control form-control-lg"  placeholder="Password" name="password" required minlength="8" maxlength="12"/>
                                        <?php if(isset($_SESSION['validation']['password'])): ?>
                                            <span class="danger"><?php 
                                            echo $_SESSION['validation']['password']; 
                                            unset($_SESSION['validation']['password']);
                                            ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form">
                                        <input type="text" id="idnum" class="form-control form-control-lg"  placeholder="ID NUMBER" name="idnum" required />
                                        <?php if(isset($_SESSION['validation']['idnum'])): ?>
                                            <span class="danger"><?php 
                                            echo $_SESSION['validation']['idnum']; 
                                            unset($_SESSION['validation']['idnum']);
                                            ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form">
                                        <input type="number" id="age" class="form-control form-control-lg"  placeholder="Age" name="age" min="18"/>
                                        <?php if(isset($_SESSION['validation']['age'])): ?>
                                            <span class="danger"><?php 
                                            echo $_SESSION['validation']['age']; 
                                            unset($_SESSION['validation']['age']);
                                            ?></span>
                                        <?php endif; ?>
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
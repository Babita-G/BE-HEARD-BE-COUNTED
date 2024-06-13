<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>login</title>
   
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <nav class="navbar">
        <div class="container">
          <a class="brand" href="#">Voting System</a>
          <button class="toggler" type="button" 
            <span class="toggler-icon"></span>
          </button>
          <div class="collapse navbar" id="nav">
            <div class="nav">
              <a class="nav-link" href="register.php">Register</a>
            </div>
          </div>
        </div>
      </nav>

    <!-- login -->
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

                                <?php 
                                    if(isset($_SESSION['message'])){
                                        echo "<div class='alert'>".$_SESSION['message']."</div>";
                                        unset($_SESSION['message']);
                                    }

                                ?>
                                <form action="./backend/useraction.php" method="POST">
                                    <div class="form">
                                        <input type="email" id="form3Example1c" class="form-control form-control-lg" name="email" placeholder="email@example.com"/>
                                        <?php if(isset($_SESSION['validation']['email'])): ?>
                                            <span class="danger"><?php 
                                            echo $_SESSION['validation']['email']; 
                                            unset($_SESSION['validation']['email']);
                                            ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form">
                                        <input type="password" id="form3Example3c" class="form-control form-control-lg" name="password" placeholder="*******" />
                                        <?php if(isset($_SESSION['validation']['password'])): ?>
                                            <span class="danger"><?php 
                                            echo $_SESSION['validation']['password']; 
                                            unset($_SESSION['validation']['password']);
                                            ?></span>
                                        <?php endif; ?>
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
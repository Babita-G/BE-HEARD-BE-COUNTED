<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <div class="collapse" id="nav">
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
                                    Reset password
                                </h1>
                                <form action="login.php" method="POST">
                                    <div class="form">
                                        <label for="email" class="label float-start">Email</label>
                                        <input type="text" id="email" class="form-control form-control-lg" name="username" placeholder="email@example.com"/>
                                    </div>
                                    <div class="form">
                                        <label for="newpass" class="label float-start">New Password</label>
                                        <input type="password" id="newpass" class="form-control form-control-lg" name="password" placeholder="New Password *******" />
                                    </div>
                                <a href="src/login.php" class="login btn btn-primary w-25 mr-1 ">Reset</a>
                                
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
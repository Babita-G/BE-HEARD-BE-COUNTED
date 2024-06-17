<?php session_start(); 
include_once '../backend/logic.php';


$contestants = getContestants();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
  
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
         #contestantImage{
            width: 100px;
            height: 100px;
            border-radius: 50%;
         }
    </style>
   

</head>
<body>

    <nav class="navbar">
        <div class="container">
       
            <div class="nav">
                <form action="./backend/useraction.php" method="post">
                    <button type="submit" class="btn btn-primary" name="logout">Logout</button>
                </form>
            </div>
          </div>
        </div>
      

     

    <section class="bg-image">
        <div class="icon">
    <div class="users">
        <!-- voting page displaying all users and a button to vote-->
                    <?php
                        if(isset($_SESSION['email'])): ?>
                        <div class="alert">
                        <span class="auto">
                            <?php echo "HI ". $_SESSION['email']; ?>
                        </span>
                    </div>
                    <?php endif; ?>
    <div class="row">
        <div class="col">
            <div class="card">
                
                <div class="card-body">
                    <h1 class="text-center">
                        Welcome to the voting page
                    </h1>
                    <!-- display a table of contestants and a button to vote -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">PHOTO</th>
                                <th scope="col">Name</th>
                                <th scope="col">Vote</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($contestants as $contestant){ ?>
                            <tr>
                                <td>
                                    <?php $image = $contestant['image_url'] ?>
                                    <img src="../assets/images/<?php echo '$image'?>" class="image rounded-circle" alt="image" style="height: 100px; width: 100px; border-radius: 50%" />
                                </td>
                                <td><?php echo $contestant['first_name'] . ' ' . $contestant['last_name']; ?></td>
                                <td>
                                <form action="./backend/useraction.php" method="POST">
                                    <input type="hidden" value="<?php echo $contestant['idcard_number'] ?>" name="idnumber">
                                    <input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="voterId">
                                    <button type="submit" name="vote" class="btn btn-primary">Vote</button>
                                </form>
                                </td>
                            </tr>
                            <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>

            </div>
        </div>
    


</body>
</html>
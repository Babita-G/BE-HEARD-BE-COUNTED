<?php session_start(); 
include_once '../backend/logic.php';

$contestants = getContestants();
$winner = getWinner();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>login</title>
   
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

    <!-- simple nav -->
    <nav class="navbar">
        <div class="container">
          <a class="brand" href="#">Voting System</a>
          <button class="toggler" type="button" 
            <span class="toggler-icon"></span>
          </button>
          <div class="collapse navbar" id="nav">
            <div class="nav">
              <a class="nav-link" href="/">Logout</a>
            </div>
          </div>
        </div>
      </nav>

    <section class="bg-image">
        <div class="icon">
            <!-- show icon to print results-->

            <div class="users">
                <!-- voting page displaying all users and a button to vote-->

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-center">
                                    General Election
                                </h1>
                                <!-- display a table of contestants and a button to vote -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Photo</th>
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
                                    <button type="button" name="vote" class="btn btn-primary"><?php echo $contestant['vote_count'] ?></button>
                                </form>
                                </td>
                            </tr>
                            <?php } ?>
                            <tr class="" style="background-color: gray;">
                                <td>WINNER</td>
                                <td><?php echo $winner['first_name'] ?></td>
                                <td><?php echo $winner['vote_count']  ?></td>
                            </tr>
                            
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
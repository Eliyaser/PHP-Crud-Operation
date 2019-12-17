<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Crud OPeration</title>
  </head>
 <body>
   <?php require_once 'process.php'?>
          <?php  if(isset($_SESSION['message'])):?>
         
          <div  class="alert alert-<?=$_SESSION['msg_type']?>">
          <?php
           
            $alert = $_SESSION['message'];
            echo $_SESSION['message'];
            unset ($_SESSION['message']);  
            
           
          
                       
          ?>

          </div>
          <?php endif;  ?>
          

         
            <?php
              $mysqli =new mysqli('localhost','root','','crud')or die(mysqli_error($mysqli));
              $result =$mysqli->query("SELECT * FROM data")or die($mysqli->error);
              //  pre_r($result);
              // pre_r($result->fetch_assoc());
              // pre_r($result->fetch_assoc());


              // function pre_r($array){
              //     echo'<pre>';
              //     print_r($array);
              //     echo'</pre>';
              // }

            ?>
          
            <div class="row justify-content-center">
              <div class="container">
                        <table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>location</th>
                        <th colspan='2'>Action</th>
                      </tr>
                    </thead>
                    <?php while($row=$result->fetch_assoc()):?>
                      <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['location'];?></td>
                        <td>
                          <a href="index.php?edit=<?php echo $row['id']; ?>" class='btn btn-info'>edit</a>
                          <a href="index.php?delete=<?php echo $row['id'];?>" class='btn btn-danger'>delete</a>
                         

                        </td>
                      </tr>
                    <?php endwhile; // end of the loop. ?>
                  </table>
              
            </div>     

            <div class="row justify-content-center">
              <form  Action="process.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $id;?>">

                  <div class="form-group">
                      <label for="name">Name</label>
                      <input class="form-control" type="text" name="name" value="<?php echo $name; ?>"placeholder="Enter your Name"  required>
                  </div> 

                  <div class="form-group">
                  <label for="name">location</label>
                  <input class="form-control" type="text" name="location" value="<?php echo $location; ?>" placeholder="Enter your location"  required>
                  </div> 

                  <div class="form-group">
                  <?php if($update==true):?>
                  <button  type="submit" name="update" class="btn btn-info">Update</button>
                  <?php else: ?>
                  <button  type="submit" name="save" class="btn btn-primary">save</button>
                  <?php endif; ?>
                  
                 
                  </div>
              
              </form>
              
          </div>
          </div>

        
          <!-- Optional JavaScript -->
          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">



        <?php

          include("php/config.php");
          if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];

            //verifying the unique email

            $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");
            
            if(mysqli_num_rows($verify_query) !=0 ){
                echo "<div class='message'>
                        <p>This email is used, Try another One Please!</p>
                      </div> <br>";

                echo "<a href='javascript:self.history.back()'><botton class ='btn'> Go Back</button>";
            }
            else{

                mysqli_query($con, "INSERT INTO users(Username,Email,Phone,Password) VALUE('$username','$email','$phone','$password')") or die("Error Occured");
                
                echo "<div class='message'>
                        <p>Registration successfully!</p>
                      </div> <br>";

                echo "<a href='index.php'><botton class='btn'>Login now</button>";
            } 
         
        }else{

        


        ?>



            <header>Sign up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" autocomplete="off" id="username" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" autocomplete="off" id="email" required>
                </div>

                <div class="field input">
                    <label for="username">Phone</label>
                    <input type="number" name="phone"  id="phone" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>

                <div class="links">
                    Already a member? <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>

        <?php } ?>

      </div>

    
</body>
</html>
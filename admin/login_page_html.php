<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_login_page</title>
    <link rel="stylesheet" href="styles/login_page.css">
</head>

<body>

    <center> <h1> ADMIN LOGIN</h1> </center>   
    <form method="POST">
        
        <div class="container">  
        <?php     
            if(!empty($err)){  ?>
        <center><h4 class="error">
         <?php     echo $err;  ?>
         </h4> </center>
         <?php  }  ?>
 
            <label>Username : </label>   
            <input type="text" placeholder="Enter Username" name="username" required>  
            <br>
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" required>  
            <br>
            <button type="reset" class="cancelbtn"> Reset</button>  
            <button type="submit">Login</button> 
            
            <!-- <input type="checkbox" checked="checked"> Remember me    -->
            <!-- <button type="button" class="cancelbtn"> Cancel</button>    -->
            
            <!-- Forgot <a href="#"> password? </a>    -->
        </div>   
    </form>  
</body>
</html>
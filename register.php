<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List Register</title>
    <link rel="icon" href="icon.ico" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card my-5 col-md-6" style= "border-radius: 1em; background-color: gainsboro;">
                <form action="processRegister.php" method="post">

                    <!-- Register Information -->
                    <card class="row mb-4" style= "background-color: gainsboro; border-radius: .5em;">
                        <h2 class="mt-4" style="margin-bottom: 1em; text-align: center;">To-Do List Register <img src="images/icon.png" width="40" height="40" /></h2>
                        
                    <!-- Error Message-->
                    <div class="row justify-content-center">
                        <?php
                            if (isset($_GET["error"]))
                            {
                                $errorMessage = $_GET['error'];

                                echo "<div class=' alert alert-danger col-md-10' role='alert'>
                                        $errorMessage
                                    </div>";
                            }
                        ?>
                    </div>

                        <!-- Username -->
                        <div class="row justify-content-center">
                            <div class="col-md-9 px-5 py-3">
                                <label for="username" class="form-label">Username</label>
                                <input tabindex="10" type="text" class="form-control" name="username" id="username" required="yes">
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="row justify-content-center">
                            <div class="col-md-9 px-5 py-3">
                                <label for="password" class="form-label">Password</label>
                                <input tabindex="20" type="password" class="form-control" name="password" id="password" required="yes">
                            </div>
                        </div>
                    </card>

                    <!-- Register Button -->
                    <div class="d-flex justify-content-center">
                        <button tabindex="30" class="mb-3 btn btn-primary" type="submit" id="registerButton">Register</button>    
                    </div>

                    <!-- Register Page Hyperlink -->
                    <div class="card-body text-center mb-4">
                        <a href="login.php">Already have an account?</a>
                    </div>

                </form>
            </div>        
        </div>
    </div>
</body>
<script>
    document.getElementById("username").focus();
</script>
</html>
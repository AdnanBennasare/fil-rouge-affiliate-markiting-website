<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="Ui/styles/styles.css">

    <title>signin-signup</title>
</head>

<body>
    <div class="container">
        <div class="signin-signup">
            <form action="loging.php" method="POST" class="sign-in-form">
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="number" name="Phone"
                        value="<?php if (isset($_SESSION['PhoneNum']))
                            echo $_SESSION['PhoneNum'];
                        unset($_SESSION['PhoneNum']); ?>"
                        placeholder="Phone" required>
                </div>
                <div>
                    <?php
                    // Check if the session exists
                    if (isset($_SESSION['notexistPhone'])) {
                        // Get the session content
                        $notexistPhone = $_SESSION['notexistPhone'];
                        // Display the content in red color text
                        echo '<span style="color: red;">' . $notexistPhone . '</span>';
                        // Clear the session
                        unset($_SESSION['notexistPhone']);
                    }
                    ?>
                </div>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="Password" placeholder="Password" required>
                </div>
                <div>
                    <?php
                    // Check if the session exists
                    if (isset($_SESSION['incorrect-password'])) {
                        // Get the session content
                        $phoneExistMessage = $_SESSION['incorrect-password'];
                        // Display the content in red color text
                        echo '<span style="color: red;">' . $phoneExistMessage . '</span>';
                        // Clear the session
                        unset($_SESSION['incorrect-password']);
                    }
                    ?>
                </div>





                <input type="submit" value="Login" class="btn">
                <p class="account-text">Don't have an account? <a href="#" id="sign-up-btn2">Sign up</a></p>
            </form>



            <form action="signup.php" method="POST" class="sign-up-form">
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="number" name="Phone"
                        value="<?php if (isset($_SESSION['phone']))
                            echo $_SESSION['phone'];
                        unset($_SESSION['phone']); ?>"
                        placeholder="Phone" required>
                </div>
                <div>
                    <?php
                    // Check if the session exists
                    if (isset($_SESSION['phone_exist'])) {
                        // Get the session content
                        $phoneExistMessage = $_SESSION['phone_exist'];
                        // Display the content in red color text
                        echo '<span style="color: red;">' . $phoneExistMessage . '</span>';
                        // Clear the session
                        unset($_SESSION['phone_exist']);

                    }
                    ?>
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="Email"
                        value="<?php if (isset($_SESSION['email']))
                            echo $_SESSION['email'];
                        unset($_SESSION['email']); ?>"
                        placeholder="Email" required>

                </div>
                <div>
                    <?php
                    // Check if the session exists
                    if (isset($_SESSION['email_exist'])) {
                        // Get the session content
                        $emailExistMessage = $_SESSION['email_exist'];
                        // Display the content in red color text
                        echo '<span style="color: red;">' . $emailExistMessage . '</span>';
                        // Clear the session
                        unset($_SESSION['email_exist']);
                    }
                    ?>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="Password" placeholder="Password" required>

                </div>
                <input type="submit" value="Sign up" class="btn">
                <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign in</a></p>
            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Already a Admin?</h3>
                    <p>
                        Unlock the potential of your workspace and experience productivity like never before.
                        Immerse yourself in a world of efficiency and creativity with our remarkable workspace solution.
                    </p>
                    <button class="btn" id="sign-in-btn">Sign in</button>
                </div>
                <!-- <img src="signin.svg" alt="" class="image"> -->
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>want to become a admin ?</h3>
                    <p>Embark on a journey of exploration and discover the endless possibilities of our exceptional workspace.</p>
                    <button class="btn" id="sign-up-btn">Sign up</button>
                </div>
                <!-- <img src="signup.svg" alt="" class="image"> -->
            </div>
        </div>
    </div>
    <script src="Ui/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



    <?php
    if (isset($_SESSION['email_exist'])) {
        echo '<script>
    sign_up_btn.addEventListener("click", () => {
        container.classList.add("sign-up-mode");
    });
    </script>';
    }
    ?>
</body>

</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgotten Password</title>
    <link rel="stylesheet" href="./main.css">
</head>
<body>
<main>
<div class="container">

    <?php
    // grab token from url
    $selector = $_GET['selector'];
    $validator = $_GET['validator'];

    // check for token
    if (empty($selector) || empty($validator)) {
        echo "Could not validate your request!";
    } else {
    //Check tokens are hex 'digits'
    // If true, show form
    if (ctype_xdigit( $selector ) !== false && ctype_xdigit( $validator ) !== false) {
    ?>

    <form class="form" action="new-Password.php" method="post" id="NewPassword">
        <h1 class="form_title">New Password</h1>

        <p>Please enter your new password</p>

        <input type="hidden" name="selector" value="<?php echo $selector ?>">
        <input type="hidden" name="validator" value="<?php echo $validator ?>">
        
        <div class="form_input-group">
            <label for="newPassword">New Password:</label>
            <input type="password"
                   id="newPassword"
                   name="newPassword"
                   class="form_input"
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                   autofocus 
                   required
            >
            <div class="form_input-error-message"></div>
        </div>

        <div class="form_input-group">
            <label for="repeatPassword">Repeat Password:</label>
            <input type="password"
                   id="repeatPassword"
                   name="repeatPassword"
                   class="form_input"
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                   autofocus 
                   required
            >
            <div class="form_input-error-message"></div>
        </div>

        <button id="NewPasswordEnter" class="form_button" type="submit" >Enter</button> <br>

    </form>

        <?php
    }
    }
    ?>

</div>
</main>
</body>
</html>
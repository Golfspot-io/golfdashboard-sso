<?php

include './_init.php';

// Apply new API environment credentials
if(isset($_POST['update_api_credentials'])) {
    $_SESSION['apiDomain'] = $_POST['domain'];
    $_SESSION['apiAccountCode'] = $_POST['account_code'];
    if(isset($_POST['your_domain'])) {
        $_SESSION['yourDomain'] = $_POST['your_domain'];
    }
}

?>
<!DOCTYPE html>
<html>

<style>
    label {
        font-weight: bold;
    }

    form {
        border: 1px solid black;
        padding: 10px;
        margin-bottom: 10px;
    }

    h1 {
        margin: 0 0 10px;
    }

    input, button {
        width: 300px;
        margin-bottom: 10px;
    }
</style>

<body>
    <form action="<?php echo $_SESSION['apiDomain'] ?>" enctype="application/x-www-form-urlencoded" method="post">
        <h1>Login example</h1>
        <input type="hidden" name="account_code" value="<?php echo $_SESSION['apiAccountCode'] ?>">
        <input type="hidden" name="success_url" value="<?php echo $yourDomain ?>/success.php">
        <input type="hidden" name="fail_url" value="<?php echo $yourDomain ?>/fail.php">

        <label for="email">E-mail address</label><br>
        <input type="email" name="email" id="email" required><br>

        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required><br>

        <button type="submit">Submit</button>
    </form>

    <!-- This form is to simply determine which environment you would like to test -->
    <form action="index.php" method="post">
        <h1>Api credentials</h1>
        <?php
            if(isset($_POST['update_api_credentials'])) {
        ?>
        <span style="color: green">API credentials successfully updated</span><br>
        <?php
            }
        ?>

        <label for="apiDomain">API domain</label><br>
        <input type="url" name="domain" id="apiDomain" value="<?php echo $_SESSION['apiDomain'] ?>" required>
        <br>

        <label for="apiAccountCode">API account code</label><br>
        <input type="text" name="account_code" id="apiAccountCode" value="<?php echo $_SESSION['apiAccountCode'] ?>" required placeholder="Provided by Golfspot">
        <br>

        <label for="yourDomain">Your domain (in case of proxies like Ngrok)</label><br>
        <input type="text" name="your_domain" id="yourDomain" value="<?php echo $_SESSION['yourDomain'] ?? '' ?>" placeholder="Empty for default">
        <br>

        <input type="submit" name="update_api_credentials" value="Update">
    </form>
</body>

</html>
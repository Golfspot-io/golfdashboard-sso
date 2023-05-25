<?php
include __DIR__ . '/init.php';
?>
<!DOCTYPE html>
<html>

<body>
    <?php
    // Show errors
    $errors = $_GET['errors'] ?? [];
    if (isset($_SESSION['failMessage'])) {
        $errors[] = $_SESSION['failMessage'];
        unset($_SESSION['failMessage']);
    }

    if (!empty($errors)) {
        echo '<ul style="color: red">';
        foreach ($errors as $errorMessage) {
            echo '<li>' . htmlspecialchars($errorMessage) . '</li>';
        }
        echo '</ul>';
    }
    ?>

    <a href="index.php" title="Back to login">Back to login</a>
</body>

</html>
<?php
    $title = "Wildcard DNS Test - SWG Audit";
    $description = "Evaluate your Secure Web Gateway's ability to handle wildcard DNS queries and prevent misuse.";
    $keywords = "SWG, Wildcard DNS Test, Secure Web Gateway, Cybersecurity";
    $url = $_SERVER['HTTP_HOST'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title><?php echo $title ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $description ?>" >
    <meta name="keywords" content="<?php echo $keywords ?>" >
    <meta name="author" content="SWG Audit">

    <meta property="og:title" content="<?php echo $title ?>" >
    <meta property="og:description" content="<?php echo $description ?>" >
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $url ?>" >
    
    <link rel="icon" href="https://swgaudit.com/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="https://swgaudit.com/images/apple-touch-icon.png">
    
    <link rel="stylesheet" href="https://swgaudit.com/globals.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include '../snippets/header.php' ?>
    <main>
        <p>Your current URL is: <span id="url"></span></p>
        <script>
            document.getElementById('url').textContent = window.location.href;
        </script>
    </main>
    <?php include '../snippets/footer.php' ?>
</body>
</html>
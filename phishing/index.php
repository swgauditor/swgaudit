<?php
    $title = "Phishing Test - SWG Audit";
    $description = "Simulate phishing attacks to test your Secure Web Gateway's ability to prevent credential theft.";
    $keywords = "SWG, Phishing Test, Credential Theft, Secure Web Gateway, Cybersecurity";
    $url = "https://phishing.swgaudit.com";
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
    <meta property="og:image" content="<?php echo $url ?>/opengraph.png" >
    
    <link rel="icon" href="https://swgaudit.com/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="https://swgaudit.com/images/apple-touch-icon.png">
    
    <link rel="stylesheet" href="https://swgaudit.com/globals.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include '../snippets/header.php' ?>
    <main>
        <h1>Can Your <span class="blue-text">Perimeter Security</span> prevent credential theft?</h1>
        <p class="note">
            When the victim clicks the phishing link, the uncategorised Zero-Hour domain is allowed by the URL filter.<br>
            The attacker harvests the submitted credentials, while the victim is redirected to a legitimate website.
        </p>
        <div class="container">
            <form id="phishing-form" method="post">
                <h2>Credential Harvesting Simulation</h2>
                <p class="note">Submitted data is immediately discarded</p>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="john.smith" required minlength="1">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="MyP@ssw0rd123" required minlength="1">
                </div>
                <button type="submit" id="submit-button">Submit Credentials</button>
            </form>
            <div class="failure-container hidden" id="failure-container">
                <h2>Perimeter Security FAILED</h2>
                <p class="note">Server received your credentials</p>
                <div class="form-group">
                    <label>Username</label>
                    <div class="credential-value" id="failed-username"></div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <div class="credential-value" id="failed-password"></div>
                </div>
                <button type="button" id="reset-button">Reset Test</button>
            </div>
        </div>
        <h3>Your Perimeter Security must be able to prevent the credential submission to the uncategorised websites</h3>

    </main>
    <?php include '../snippets/footer.php' ?>
    <script src="https://swgaudit.com/global.js"></script>
    <script src="script.js"></script>
</body>
</html>
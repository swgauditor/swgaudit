<?php
    $title = "Data‑Theft Test - SWG Audit";
    $description = "Evaluate your Secure Web Gateway's ability to detect and block data exfiltration via DNS tunneling.";
    $keywords = "SWG, Data Theft Test, DNS Tunneling, Secure Web Gateway, Cybersecurity";
    $url = "https://data-theft.swgaudit.com";
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
    <h1>Can Your <span class="blue-text">Perimeter Security</span> stop Data Exfiltration?</h1>
    <p class="note">
        In a typical DNS Tunneling attack, an attacker encodes sensitive data in subdomains of DNS queries.<br>
        When the DNS quersies reach the attacker's name server, stolen data is decoded and reassembled.
    </p>
    <div class="container">
        <form id="data-theft-form" method="post">
            <h2>Unauthorised File Upload Simulation</h2>
            <div class="upload-area form-group" id="upload-area">
                <svg class="upload-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM14 13v4h-4v-4H7l5-5 5 5h-3z"/>
                </svg>
                <p class="upload-text">Drag and drop or click to upload a file</p>
                <p class="constraints">Maximum file size: 100 KB</p>
            </div>
            <input type="file" id="fileUpload" hidden>
        </form>
        <div class="failure-container hidden" id="failure-container">
            <h2>SWG FAILED</h2>
            <p class="note">File uploaded to the server</p>
            <div class="button-container">
                <button id="download-button" class="">
                    Download File
                </button>
                <br>
                <button id="copy-button" class="">
                    Copy Download Link
                </button>
            </div>
            <br>
            <button type="button" id="reset-button">Reset Test</button>
        </div>
        <p id="timer" class="timer">File will be deleted from the server in 10 minutes</p>
    </div>
    <h3>Your Perimeter Security must be able to detect and limit DNS Tunneling, while ensuring a threshold for business traffic</h3>

    </main>
    <?php include '../snippets/footer.php' ?>
    <script src="https://swgaudit.com/global.js"></script>
    <script src="base32.js"></script>
    <script src="script.js"></script>
</body>
</html>
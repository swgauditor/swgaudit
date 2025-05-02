<?php
    $title = "SWG Audit";
    $description = "Evaluate your perimeter security effectiveness against Zero-Day web threats.";
    $keywords = "Perimeter Security, Network Security, Enterprise Web Security, Security Test, UTM, Firewall, SWG, Secure Web Gateway, Layer 7, Cybersecurity, Phishing, Malware, Data Theft, Cyber‑Slacking, DNS Tunneling, URL Filtering, Web Filtering, Threat Intelligence, Threat Detection, Threat Prevention, Zero-Day Exploit, Zero-Day Attack";
    $url = "https://swgaudit.com";
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
    <main class="hero">
        <div>
            <h1>Is Your <span class="blue-text">SWG</span> Ready for Zero‑Hour Layer 7 Attacks?</h1>
            <p class="note">
                Automated crawlers and human editors can no longer cope up with the website categorisation workload.<br>
                With nearly 70% newly registered domains still uncategorized, URL filtering is rapidly becoming obsolete.
            </p>
        </div>
        
        <div class="simulation-buttons">
            <a href="https://phishing.swgaudit.com/" class="simulation-link">Simulate Phishing</a>
            <a href="https://malware.swgaudit.com/" class="simulation-link">Simulate Malware</a>
            <a href="https://data-theft.swgaudit.com/" class="simulation-link">Simulate Data‑Theft</a>
            <a href="https://cyberslacking.swgaudit.com/" class="simulation-link">Simulate Cyber‑Slacking</a>
        </div>

        <h3>Your SWG must be able to defend against Layer 7 attacks, without blocking uncategorised websites</h3>

    </main>
    <?php include '../snippets/footer.php' ?>
    <script src="https://swgaudit.com/global.js"></script>
    <script src="script.js"></script>
</body>
</html>

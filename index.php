<?php
    $title = "Test your defence against web-based Zero-Day Threats";
    $description = "Can your perimeter security stop modern Malware, DNS Tunnelling, Phishing attacks?";
    $keywords = "Perimeter Security, Network Security, Enterprise Web Security, Security Test, UTM, Firewall, SWG, Secure Web Gateway, Layer 7, Cybersecurity, Phishing, Malware, Data Theft, Cyber-Slacking, DNS Tunnelling, URL Filtering, Web Filtering, Threat Intelligence, Threat Detection, Threat Prevention, Zero-Day Exploit, Zero-Day Attack";
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
    
    <link rel="icon" type="image/x-icon" href="/assets/icons/favicon.ico" />
    <link rel="apple-touch-icon" href="/assets/icons/apple-touch-icon.png" />
    
    <link rel="stylesheet" href="/assets/css/global.css" />
    <link rel="stylesheet" href="/assets/css/cards.css" />

</head>
<body>

    <!-- Navigation -->
    <?php include('components/header.php'); ?>

    <main>
        <!-- Top section with Hero and Video -->
        <section class="top-section">
            <!-- Hero Content -->
            <div class="hero-content">
                <h1 class="hero-title">
                    Evaluate your Perimeter Security against modern
                    <span class="text-red">web-based threats</span>
                </h1>
                <p class="hero-description">
                    Automated crawlers and human editors can no longer cope up with the website categorisation
                    workload.
                    Traditional URL categorization methods are failing under the surge of newly registered domains
                    and
                    URL reputation evasion techniques. Use SWG–Audit to safely simulate evasive web–based attacks
                    without relying on outdated reputation databases.
                </p>
            </div>

            <!-- Video Section -->
           <div class="video-section">
            <!-- This container will now be responsible for the video's aspect ratio -->
            <div class="video-placeholder">
              <iframe
                src="https://www.youtube.com/embed/"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen>
              </iframe>
            </div>
          </div>
        </section>

        <!-- Cards Section -->
        <div class="cards-grid">
            <!-- Phishing Card -->
            <a href="/phishing/">
            <div class="threat-card">
                <div class="card-content">
                    <h3 class="card-title">Phishing</h3>
                    <p class="card-description">Modern Zero-Hour Phishing attacks steal MFA authenticated sessions.</p>
                </div>
                <img src="assets/images/phishing.webp" alt="Phishing" style="height: 90%;">
            </div>
            </a>

            <!-- Malware Card -->
            <a href="/malware/">
            <div class="threat-card">
                <div class="card-content">
                    <h3 class="card-title">Malware</h3>
                    <p class="card-description">Last Mile Reassembly attacks reassembles benign fragments at the client side.</p>
                </div>
                <img src="assets/images/malware.webp" alt="Malware">
            </div>
            </a>

            <!-- Data Theft Card -->
            <a href="/data-theft/">
            <div class="threat-card">
                <div class="card-content">
                    <h3 class="card-title">Data Theft</h3>
                    <p class="card-description">DNS tunneling enables covert C2 communication, and data exfiltration.</p>
                </div>
                <img src="assets/images/data-theft.webp" alt="Data Theft">
            </div>
            </a>

            <!-- Cyberslacking Card -->
            <a href="/cyberslacking/">
            <div class="threat-card">
                <div class="card-content">
                    <h3 class="card-title">Cyberslacking</h3>
                    <p class="card-description">Granular control of User Generated Content on Web 2.0 Apps can boost productivity.</p>
                </div>
                <img src="assets/images/cyberslacking.webp" alt="Cyberslacking">
            </div>
            </a>
        </div>
    </main>

    <!-- Footer -->
    <?php include('components/footer.php'); ?>

</body>

</html>
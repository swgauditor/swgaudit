<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SWG-audit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="/components/styles.css" />
    <link rel="stylesheet" href="/assets/css/global.css" />
    <link rel="stylesheet" href="/assets/css/cards.css" />
    <link rel="preload" href="/assets/fonts/albertSans.ttf" as="font" crossorigin>

</head>

<body>

    <!-- Navigation -->
    <?php include('components/header.php'); ?>

    <main>
        <div class="container">
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
                    <div class="video-placeholder"></div>
                    <div class="video-content">
                        <h3 class="video-title">Website Categorization</h3>
                        <p class="video-description">
                            This video will assist you in "how the website is categorized".
                        </p>
                    </div>
                </div>
            </section>

            <!-- Cards Section -->
            <div class="cards-grid">
                <!-- Phishing Card -->
                <a href="/phishing/index.php">
                <div class="threat-card">
                    <div class="card-content">
                        <h3 class="card-title">Phishing</h3>
                        <p class="card-description">Modern Zero-Hour Phishing attacks steal MFA authenticated sessions.</p>
                    </div>
                    <img src="assets/images/phishing.webp" alt="Phishing">
                </div>
                </a>

                <!-- Malware Card -->
                <a href="/malware/index.php">
                <div class="threat-card">
                    <div class="card-content">
                        <h3 class="card-title">Malware</h3>
                        <p class="card-description">Last Mile Reassembly attacks reassembles benign fragments at the client side.</p>
                    </div>
                    <img src="assets/images/malware.webp" alt="Malware">
                </div>
                </a>

                <!-- Data Theft Card -->
                <a href="/data-theft/index.php">
                <div class="threat-card">
                    <div class="card-content">
                        <h3 class="card-title">Data Theft</h3>
                        <p class="card-description">DNS tunneling enables covert C2 communication, and data exfiltration.</p>
                    </div>
                    <img src="assets/images/data-theft.webp" alt="Data Theft">
                </div>
                </a>

                <!-- Cyberslacking Card -->
                <a href="/cyberslacking/index.php">
                <div class="threat-card">
                    <div class="card-content">
                        <h3 class="card-title">Cyberslacking</h3>
                        <p class="card-description">Granular control of User Generated Content on Web 2.0 Apps can boost productivity.</p>
                    </div>
                    <img src="assets/images/cyberslacking.webp" alt="Cyberslacking">
                </div>
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include('components/footer.php'); ?>

    <script src="script.js"></script>
</body>

</html>
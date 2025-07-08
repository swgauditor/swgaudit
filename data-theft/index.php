<?php
$page = 'data-theft'; // Set active page for navigation
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SWG Audit - Perimeter Security Testing</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="/components/styles.css" />
  <link rel="stylesheet" href="/assets/css/global.css" />
  <link rel="preload" href="/assets/fonts/albertSans.ttf" as="font" crossorigin>

</head>

<body>

  <!-- Navigation -->
  <?php include '../components/header.php'; ?>

  <!-- Main Content -->
  <main class="container">
    <!-- Top section with Hero and Video -->
    <section class="top-section">
      <!-- Hero Content -->
      <div class="hero-content">
        <h1 class="hero-title">
          Can Your Perimeter Security prevent
          <span class="text-red">Data Exfiltration ?</span>
        </h1>
        <p class="hero-description">
          A typical insider data breach might go like this: the attacker registers a new, unused domain, sets up a
          custom DNS name server under their control, and allows the domain to be passively categorised as benign.
          During the zero-hour window, before threat intelligence feeds catch on, the insider begins encoding and
          transmitting sensitive data through outbound DNS queries. The organisation sees only routine DNS traffic,
          while critical data is siphoned off—undetected, unlogged, and uninterrupted.
        </p>
      </div>

      <!-- Video Section -->
      <div class="video-section">
        <!-- This container will now be responsible for the video's aspect ratio -->
        <div class="video-placeholder">
          <iframe src="https://www.youtube.com/embed/tF5-8tmpeeY" title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen>
          </iframe>
        </div>

        <div class="video-content">
          <h3 class="video-title">Website Categorization</h3>
          <p class="video-description">
            This video will assist you in "how the website is categorized".
          </p>
        </div>
      </div>
    </section>

    <!-- Main Simulation Section -->
    <section>
      <div class="simulation-wrapper">
        <div class="simulation-inner">
          <!-- Tab Header -->
          <div class="simulation-header">
            <h2 class="simulation-title">Credentials Harvesting Simulation</h2>
          </div>

          <!-- Content Grid -->
          <div class="simulation-content">
            <!-- Instructions Panel -->
            <div class="instructions-panel">
              <h3 class="instruction-title">Simulation Instructions</h3>
              <p class="instruction-text">
                To replicate a zero-hour phishing scenario, configure your
                perimeter security to treat swgaudit.com as a trusted site.
                Your security must block credential submission, even to
                "known" domains.
              </p>
              <p class="warning-text">
                If credentials are transmitted to the server, your perimeter
                security has failed.
              </p>
              <p class="success-text">
                If submission is blocked or stripped, your perimeter
                security has passed.
              </p>
            </div>

            <!-- Right Panel - File Upload -->
            <div class="upload-panel">
              <div class="file-upload-area" id="fileUploadArea">
                <div class="upload-content">
                  <div class="upload-area form-group" id="upload-area">
                    <form id="data-theft-form" method="post">
                      <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="upload-icon">
                        <path
                          d="M16.0832 27.4166H18.9165V21.5021L21.1832 23.7687L23.1665 21.75L17.4998 16.0833L11.8332 21.75L13.8519 23.7333L16.0832 21.5021V27.4166ZM8.99984 31.6666C8.22067 31.6666 7.55366 31.3892 6.9988 30.8344C6.44393 30.2795 6.1665 29.6125 6.1665 28.8333V6.16665C6.1665 5.38748 6.44393 4.72047 6.9988 4.1656C7.55366 3.61074 8.22067 3.33331 8.99984 3.33331H20.3332L28.8332 11.8333V28.8333C28.8332 29.6125 28.5557 30.2795 28.0009 30.8344C27.446 31.3892 26.779 31.6666 25.9998 31.6666H8.99984ZM18.9165 13.25V6.16665H8.99984V28.8333H25.9998V13.25H18.9165Z"
                          fill="white" />
                      </svg>
                      <p class="upload-text">Drag and drop or click to upload a file</p>
                      <p class="upload-info"> Supported file types: .pdf, .img, .txt, .docx </p>
                      <p class="constraints">Maximum file size: 100 KB</p>
                    </form>
                  </div>
                  <input type="file" id="fileInput" style="display: none"
                    accept=".pdf,.jpg,.jpeg,.png,.gif,.txt,.doc,.docx" hidden />
                </div>
                <!-- Failure container: only shown if upload is successful (handled by JS) -->
                <div class="failure-container" id="failure-container" hidden>
                  <p class="upload-text">File uploaded to the server</p>
                  <div class="button-container">
                    <button class="download-button" id="download-button">Download File</button>
                    <br>
                    <button class="copy-button" id="copy-button">Copy Download Link</button>
                  </div>
                  <br>
                  <div class="reset-container">
                    <button type="button" class="reset-button" id="reset-button">Reset Test</button>
                  </div>
                </div>
              </div>
              <div id="timer" class="deletion-notice">
                File will be deleted from the server in 10 minutes
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <?php include '../components/footer.php'; ?>
  <script src="script.js"></script>
  <script src="base32.js"></script>
</body>

</html>
<?php
$page = 'phishing'; // Set active page for navigation
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Phishing Security Audit</title>
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

    <main>
      <div class="container">
        <!-- Top section with Hero and Video -->
        <section class="top-section">
          <!-- Hero Content -->
          <div class="hero-content">
            <h1 class="hero-title">
              Can Your Perimeter Security prevent
              <span class="text-red">credential theft?</span>
            </h1>
            <p class="hero-description">
              Modern phishing campaigns exploit URL reputation evasion and reverse proxy techniques to steal credentials and session cookies—even with MFA in place. Attackers register lookalike domains, allow them to be passively categorised as safe, and then deploy a phishing kit during the critical zero&#8209;hour window. The phishing link can, then, be distributed via email, social media, or even poisoned search results. With over 80% of victims clicking within the first hour, the attack is typically complete long before blacklists or filters can update.
            </p>
          </div>

          <!-- Video Section -->
          <div class="video-section">
            <!-- This container will now be responsible for the video's aspect ratio -->
            <div class="video-placeholder">
              <iframe
                src="https://www.youtube.com/embed/gWGhUdHItto"
                title="YouTube video player"
                frameborder="0"
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

        <!-- Simulation Section -->
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

                <!-- Form Panel -->
                <div class="form-panel">
                  <form method="POST" action="process.php">
                    <div class="form-field">
                      <label for="name" class="form-label">Name</label>
                      <input
                        type="text"
                        id="name"
                        name="name"
                        value="John Doe"
                        class="form-input"
                        required
                      />
                    </div>

                    <div class="form-field">
                      <label for="password" class="form-label">Password</label>
                      <input
                        type="password"
                        id="password"
                        name="password"
                        value="password123"
                        class="form-input"
                        required
                      />
                    </div>

                    <div class="submit-section">
                      <button
                        type="submit"
                        name="simulate"
                        class="submit-button"
                        id="submitBtn"
                      >
                        Submit
                      </button>
                      <p class="disclaimer-text">
                        Submitted data is immediately discarded
                      </p>
                      <div id="successMessage" style="display: none; color: #92eaac; margin-top: 10px; font-weight: 500;">
                        Form submitted successfully!
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>

    <!-- Footer -->
    <?php include '../components/footer.php'; ?>

    <script src="script.js"></script>
  </body>
</html>

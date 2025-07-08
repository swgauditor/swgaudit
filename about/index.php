<?php
$page = 'about'; // Set active page for navigation
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="SWG Audit - An open-source initiative to help buyers validate the real-world effectiveness of their perimeter security solutions."
    />
    <meta
      name="keywords"
      content="cybersecurity, security audit, phishing, malware, data theft, cyberslacking"
    />
    <meta name="author" content="SWG Audit Team" />

    <title>SWG Audit - Cybersecurity Testing Platform</title>

    <!-- Preload critical fonts -->
    <link
      rel="preload"
      href="https://fonts.googleapis.com/css2?family=Albert+Sans:wght@300;400;500;600;700&display=swap"
      as="style"
    />
    <link
      rel="preload"
      href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@300;400;500;600;700&display=swap"
      as="style"
    />

    <!-- Stylesheet -->
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="../components/styles.css" />

    <!-- Favicon (you can add your own) -->
    <link
      rel="icon"
      type="image/svg+xml"
      href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🔒</text></svg>"
    />
  </head>
  <body>

    <!-- Navigation -->
    <?php include '../components/header.php'; ?>


    <!-- Main Content -->
    <main class="main container" role="main">
      <!-- Hero Section -->
      <section class="hero" aria-labelledby="hero-title">
        <h1 id="hero-title" class="hero-title">
          SWG Audit is an open-source initiative to help buyers validate the
          real-world effectiveness of their perimeter security solutions.
        </h1>
        <p class="hero-subtitle">
          In today's cybersecurity landscape, attackers have significantly
          outpaced traditional security tools.
        </p>
      </section>

      <!-- Problems Section -->
      <section class="warning-section" aria-labelledby="problems-heading">
        <h2 id="problems-heading" class="sr-only">
          Current Security Challenges
        </h2>

        <!-- Problem 1 -->
        <div class="warning-item">
          <div class="warning-content">
            <div class="warning-icon" aria-hidden="true">
              <div class="warning-icon-inner">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 25 25"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M12.4688 22.5C6.9459 22.5 2.46875 18.0228 2.46875 12.5C2.46875 6.97715 6.9459 2.5 12.4688 2.5C17.9916 2.5 22.4688 6.97715 22.4688 12.5C22.4688 18.0228 17.9916 22.5 12.4688 22.5Z"
                    stroke="#88392B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M12.4688 8.5V13"
                    stroke="#88392B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M12.4688 16.4883V16.4983"
                    stroke="#88392B"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </div>
            </div>
            <p class="warning-text">
              Buyers are often left in the dark, relying solely on vendor
              promises without any means of independent verification.
            </p>
          </div>
        </div>

        <!-- Problem 2 -->
        <div class="warning-item">
          <div class="warning-content">
            <div class="warning-icon" aria-hidden="true">
              <div class="warning-icon-inner">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 25 25"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M12.4688 22.5C6.9459 22.5 2.46875 18.0228 2.46875 12.5C2.46875 6.97715 6.9459 2.5 12.4688 2.5C17.9916 2.5 22.4688 6.97715 22.4688 12.5C22.4688 18.0228 17.9916 22.5 12.4688 22.5Z"
                    stroke="#88392B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M12.4688 8.5V13"
                    stroke="#88392B"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M12.4688 16.4883V16.4983"
                    stroke="#88392B"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </div>
            </div>
            <p class="warning-text">
              Many vendors continue to promote outdated solutions with bold
              marketing claims—offering little transparency or proof of actual
              protection.
            </p>
          </div>
        </div>
      </section>

      <!-- Solution Section -->
      <section aria-labelledby="solution-heading">
        <div class="section-heading">
          <h2 id="solution-heading">SWG Audit was created to change that.</h2>
        </div>

        <div class="description">
          <p>
            We provide a safe, controlled, and transparent platform to simulate
            real-world, Layer 7 web-based attacks.
          </p>
        </div>
      </section>

      <!-- Feature Section -->
      <section class="feature-section" aria-labelledby="feature-heading">
        <h2 id="feature-heading" class="sr-only">Our Mission</h2>
        <div class="feature-container">
          <div class="feature-content">
            <!-- Security Icon -->
            <div class="feature-icon" aria-hidden="true">
              <div class="feature-icon-circle">
                <svg
                  width="60"
                  height="80"
                  viewBox="0 0 92 126"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <defs>
                    <linearGradient
                      id="lockGradient"
                      x1="46"
                      y1="0"
                      x2="46"
                      y2="126"
                      gradientUnits="userSpaceOnUse"
                    >
                      <stop stop-color="#DEAE90" />
                      <stop offset="1" stop-color="#FFE4BC" />
                    </linearGradient>
                  </defs>
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M73.6 54.001C83.761 54.001 92 62.06 92 71.999V107.999C92 117.941 83.761 126 73.6 126H18.4C8.239 126 0 117.941 0 107.999V71.999C0 62.06 8.239 54.001 18.4 54.001H73.6ZM46 71.999C38.379 71.999 32.2 78.045 32.2 85.501C32.2 92.956 38.379 99 46 99C53.621 99 59.8 92.956 59.8 85.501C59.8 78.045 53.621 71.999 46 71.999ZM46 0C61.243 0 73.6 12.089 73.6 27V44.999H59.8V27C59.8 19.545 53.621 13.499 46 13.499C38.379 13.499 32.2 19.545 32.2 27V44.999H18.4V27C18.4 12.089 30.757 0 46 0Z"
                    fill="url(#lockGradient)"
                  />
                </svg>
              </div>
            </div>

            <!-- Mission Text -->
            <div class="feature-text">
              <p>
                Empower cybersecurity professionals and buyers to independently
                assess whether a solution can truly defend against modern
                threats—before investing in it.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- Call to Action -->
      <section class="cta" aria-labelledby="cta-heading">
        <h2 id="cta-heading" class="sr-only">Join Our Community</h2>
        <p>Join the community. Test honestly. Buy confidently.</p>
      </section>
    </main>

    <!-- Skip to main content link for accessibility -->
    <a href="#hero-title" class="sr-only">Skip to main content</a>
  </body>
</html>

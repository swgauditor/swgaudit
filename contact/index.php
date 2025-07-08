<?php
$page = 'contact-us'; // Set active page for navigation
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us - Swg-audit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="/components/styles.css" />
    <link rel="preload" href="/assets/fonts/albertSans.ttf" as="font" crossorigin>
  </head>
  <body>

    <!-- Navigation Header -->
    <?php include('../components/header.php'); ?>


    <!-- Main Content -->
    <main class="main-content">
      <!-- Hero Text -->
      <div class="hero-section">
        <h1 class="hero-title">
          We do not collect or store any test data. For questions, feedback, or
          collaboration opportunities, use this form to reach the core team.
        </h1>
      </div>

      <!-- Contact Form -->
      <div class="form-container">
        <form action="contact.php" method="POST" class="contact-form">
          <!-- Name and Email Row -->
          <div class="form-row">
            <!-- Name Field -->
            <div class="form-group form-group-name">
              <label for="name" class="form-label">Name</label>
              <input
                type="text"
                id="name"
                name="name"
                placeholder="John Smith"
                class="form-input"
                required
              />
            </div>

            <!-- Email Field -->
            <div class="form-group form-group-email">
              <label for="email" class="form-label">Email</label>
              <input
                type="email"
                id="email"
                name="email"
                placeholder="John.smith@gmail.com"
                class="form-input"
                required
              />
            </div>
          </div>

          <!-- Phone Number Section -->
          <div class="form-group">
            <label for="phone" class="form-label">Number</label>
            <div class="phone-row">
              <!-- Country Code Selector -->
              <div class="country-selector">
                <div class="flag-container">
                  <div class="indian-flag">
                    <div class="flag-stripe flag-orange"></div>
                    <div class="flag-stripe flag-white"></div>
                    <div class="flag-stripe flag-green"></div>
                    <div class="flag-chakra">
                      <div class="chakra-inner"></div>
                    </div>
                  </div>
                  <span class="country-code">+91</span>
                </div>
                <svg
                  class="dropdown-icon"
                  width="18"
                  height="18"
                  viewBox="0 0 18 18"
                  fill="none"
                >
                  <path
                    d="M5.25 7.125L9 10.875L12.75 7.125"
                    stroke="#AEAEAE"
                    stroke-width="1.2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </div>

              <!-- Phone Number Input -->
              <input
                type="tel"
                id="phone"
                name="phone"
                placeholder="98356 98356"
                class="form-input phone-input"
                required
              />
            </div>
          </div>

          <!-- Message Field -->
          <div class="form-group">
            <label for="message" class="form-label">Message</label>
            <textarea
              id="message"
              name="message"
              placeholder="We are interested in your product and would like to know more"
              class="form-textarea"
              required
            ></textarea>
          </div>

          <!-- Submit Button -->
          <div class="submit-container">
            <button type="submit" class="submit-button">Send Message</button>
          </div>
        </form>
      </div>

    </main>
  </body>
</html>

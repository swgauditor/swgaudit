<?php
  $title = "Contact Us - SWG Audit";
  $description = "An open-source initiative to help buyers validate the real-world effectiveness of their perimeter security solutions.";
  $keywords = "cybersecurity, security audit, phishing, malware, data theft, cyberslacking";
  $url = "https://www.swgaudit.com/contact";
  $page = 'contact-us'; // Set active page for navigation
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
    <link rel="stylesheet" href="styles.css">

</head>
  <body>

    <!-- Navigation Header -->
    <?php include('../components/header.php'); ?>


    <!-- Main Content -->
    <main class="main-content">
      <!-- Hero Text -->
      <div class="hero-section">
        <h1 class="hero-title">Thank you for the support.</h1>
        <p class="hero-subtitle">
          We do not collect or store any test data. For questions, feedback, or
          collaboration opportunities, use this form to reach the core team.
        </p>
      </div>

      <!-- Contact Form -->
      <div class="form-container">
        <form action="contact.php" method="POST" class="contact-form">

          <!-- Name, Organisation, and Email Row -->
          <div class="form-row">
            <!-- Name Field -->
            <div class="form-group form-group-name">
              <label for="name" class="form-label">Name</label>
              <input
                type="text"
                id="name"
                name="name"
                placeholder="Your Name"
                class="form-input"
                required
              />
            </div>

            <!-- Organisation Field (Optional) -->
            <div class="form-group form-group-org">
              <label for="organisation" class="form-label">Organisation <span style="font-weight:400; color:#888; font-size:16px;">(Optional)</span></label>
              <input
                type="text"
                id="organisation"
                name="organisation"
                placeholder="Your Organisation"
                class="form-input"
              />
            </div>
          </div>

          <!-- Email Field -->
          <div class="form-group">
            <label for="email" class="form-label">Email Id</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="your@email.com"
              class="form-input"
              required
            />
          </div>

          <!-- Message Field -->
          <div class="form-group">
            <label for="message" class="form-label">Message</label>
            <textarea
              id="message"
              name="message"
              placeholder="Type your message here"
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
    <!-- Removed intl-tel-input JS as phone field is no longer present -->
  </body>
</html>

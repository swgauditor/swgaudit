<?php
// Security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

// Start session for flash messages
session_start();

$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simulate'])) {
    // Validate and sanitize input
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Log the simulation attempt (data is immediately discarded for security)
    error_log("Phishing simulation form submitted - Name: " . $name . " - Data discarded for security testing");

    // Check if this is a legitimate security test
    $isSecurityTest = true; // In production, you'd have proper validation here

    if ($isSecurityTest) {
        $message = "Security test completed successfully! Form data was captured and immediately discarded. Your perimeter security should have blocked this submission.";
        $messageType = 'success';

        // Immediately clear the data
        $name = null;
        $password = null;
        unset($_POST);

    } else {
        $message = "Unauthorized access attempt detected and logged.";
        $messageType = 'error';
    }

    // Store message in session and redirect to prevent resubmission
    $_SESSION['message'] = $message;
    $_SESSION['messageType'] = $messageType;

    // Redirect back to the main page
    header('Location: index.php');
    exit();
}

// Check for session messages
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    $messageType = $_SESSION['messageType'];

    // Clear the message from session
    unset($_SESSION['message']);
    unset($_SESSION['messageType']);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Phishing Security Audit - Results</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Albert+Sans:wght@400;500;600;700&family=Instrument+Sans:wght@400;500;600;700&family=Geist+Mono:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <!-- Link to the new results specific styles -->
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="/components/styles.css" />
    <link rel="stylesheet" href="/assets/css/global.css" />
  </head>
  <body style="min-height: 100vh; display: flex; flex-direction: column;">
    <!-- Navigation -->
    <?php include '../components/header.php'; ?>

    <main style="flex: 1 0 auto;">
      <div class="container">
        <!-- Results Section -->
        <section class="results-section">
          <h1 class="hero-title">
            Security Test <span class="text-red">Results</span>
          </h1>

          <?php if ($message): ?>
            <div class="message <?php echo $messageType === 'success' ? 'success-message' : 'error-message'; ?>">
              <p style="font-size: 18px; font-weight: 500;"><?php echo htmlspecialchars($message); ?></p>
            </div>
          <?php endif; ?>

          <div class="run-another-test-container">
            <a href="index.php" class="run-another-test-button">
              Run Another Test
            </a>
          </div>

          <div class="explanation-container">
            <h3>What Just Happened?</h3>
            <p>
              This simulation demonstrates how modern phishing attacks can bypass traditional security measures.
              The form submission was logged and immediately discarded. In a real attack, your credentials
              would have been stolen. Your perimeter security should have blocked this submission if properly configured.
            </p>
          </div>
        </section>
      </div>
    </main>

    <!-- Footer -->
    <?php include '../components/footer.php'; ?>
  </body>
</html>

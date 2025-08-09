<?php
  $title = "Contribute - SWG Audit";
  $description = "An open-source initiative to help buyers validate the real-world effectiveness of their perimeter security solutions.";
  $keywords = "cybersecurity, security audit, phishing, malware, data theft, cyberslacking";
  $url = "https://www.swgaudit.com/contribute";
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
      <link rel="stylesheet" href="/assets/css/articles.css" />
    <link rel="stylesheet" href="styles.css">

</head>
<body>
  <?php include('../components/header.php'); ?>
  <main class="container">
    <article class="content-article">
      <h1 class="hero-title">Contributing to SWG Audit</h1>
      <p>Thank you for considering contributing to SWG Audit! We welcome contributions from the community to help improve this project. Please take a moment to review this document to make the contribution process easy and effective for everyone involved.</p>
      <h2>How Can You Contribute?</h2>
      <h3>Reporting Issues</h3>
      <p>If you encounter any bugs, issues, or have suggestions for improvements, please open an issue in the repository. Provide as much detail as possible, including steps to reproduce the issue and any relevant screenshots or logs.</p>
      <h3>Submitting Code Changes</h3>
      <ol>
        <li><strong>Fork the Repository</strong>: Create a personal fork of the repository on GitHub.</li>
        <li><strong>Create a Branch</strong>: Create a new branch for your changes. Use a descriptive name, such as <code>fix-bug-123</code> or <code>add-new-feature</code>.</li>
        <li><strong>Make Changes</strong>: Implement your changes in the appropriate files. Ensure your code follows the project's coding standards.</li>
        <li><strong>Test Your Changes</strong>: Verify that your changes work as expected and do not break existing functionality.</li>
        <li><strong>Submit a Pull Request</strong>: Push your changes to your fork and submit a pull request to the main repository. Provide a clear and concise description of your changes.</li>
      </ol>
      <h3>Writing Documentation</h3>
      <p>If you notice missing or outdated documentation, feel free to update it. This includes updating <code>README.md</code> files, adding comments to code, or creating new documentation files.</p>
      <h3>Suggesting Features</h3>
      <p>If you have an idea for a new feature, open an issue to discuss it with the maintainers. Provide as much detail as possible about the feature and its potential benefits.</p>
      <h2>Code of Conduct</h2>
      <p>Please adhere to our <a href="/CODE_OF_CONDUCT.md">Code of Conduct</a> to ensure a welcoming and inclusive environment for everyone.</p>
      <h2>Getting Help</h2>
      <p>If you have any questions or need assistance, feel free to reach out by opening an issue or contacting the maintainers directly.</p>
      <p>We appreciate your contributions and look forward to working together to improve SWG Audit!</p>
    </article>
  </main>
  <?php include('../components/footer.php'); ?>
</body>
</html>

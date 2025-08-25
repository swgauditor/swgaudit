<?php
$title = "Phishing Test - SWG Audit";
$description = "Simulate phishing attacks to test your Secure Web Gateway's ability to prevent credential theft.";
$keywords = "SWG, Phishing Test, Credential Theft, Secure Web Gateway, Cybersecurity";
$url = "https://www.swgaudit.com/phishing";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $description ?>">
    <meta name="keywords" content="<?php echo $keywords ?>">
    <meta name="author" content="SWG Audit">
    <meta property="og:title" content="<?php echo $title ?>">
    <meta property="og:description" content="<?php echo $description ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $url ?>">
    
    <link rel="icon" type="image/x-icon" href="/assets/icons/favicon.ico" />
    <link rel="apple-touch-icon" href="/assets/icons/apple-touch-icon.png" />
    
    <link rel="stylesheet" href="/assets/css/global.css" />
    <link rel="stylesheet" href="styles.css">

</head>
<body>

	<!-- Navigation -->
	<?php include '../components/header.php'; ?>

    <main>
		<?php 
			if (isset($_GET['name']) && isset($_GET['password'])) {
				echo '<script>
				document.addEventListener("DOMContentLoaded", function() {
					const form = document.getElementById("phishing-form");
					const resetContainer = document.getElementById("reset-container");
					const capturedCredentials = document.getElementById("captured-credentials");

					form.style.display = "none";
					resetContainer.style.display = "flex";
					capturedCredentials.textContent = "Username: " + ' . json_encode(htmlspecialchars($_GET['name'])) . ' + "\nPassword: " + ' . json_encode(htmlspecialchars($_GET['password'])) . ';
				});
				</script>';
			} elseif (isset($_GET['error']) && $_GET['error'] === 'missing_fields') {
				echo '<div class="error-message">Name and password are required.</div>';
			}
		?>
		<!-- Top section with Hero and Video -->
		<section>
            <!-- Hero Content -->
            <div class="hero-content">
                <h1>
                    Evaluate your Perimeter Security against 
					<span class="text-red">Credential Theft</span>
                </h1>
                <p>
					Modern phishing campaigns exploit URL reputation evasion and reverse proxy techniques to steal credentials and session cookies—even with MFA in place. Attackers register lookalike domains, allow them to be passively categorised as safe, and then deploy a phishing kit during the critical zero&#8209;hour window. The phishing link can, then, be distributed via email, social media, or even poisoned search results. With over 80% of victims clicking within the first hour, the attack is typically complete long before blacklists or filters can update.
                </p>
            </div>

            <!-- Video Section -->
            <div class="video-section">
				<div class="video-placeholder">
					<iframe
						src="https://www.youtube.com/embed/cWfD6HNZO6U"
						title="YouTube video player"
						frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
						allowfullscreen
						style="height: 100%;width: 100%;">
					</iframe>
				</div>
		</div>
        </section>

		<!-- Simulation Section -->
		<section>
			<div class="tablet-wrapper">
				<div class="tablet-inner">
					<!-- Tab Header -->
					<div class="tablet-header">
						<h2 class="tablet-title">Credentials Harvesting Simulation</h2>
					</div>

					<!-- Content Grid -->
					<div class="content-flex">
						<!-- Instructions Panel -->
						<div class="content-box instruction-panel">
							<h3>Simulation Instructions</h3>
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

						<form class="content-box form-panel" id="phishing-form" method="POST" action="process.php">
							<h3>Test Form Security</h3>
							<div class="form-field">
								<label for="name" class="form-label">Username</label>
								<input type="text" id="name" name="name" value="John Doe" class="form-input" required>
							</div>

							<div class="form-field">
								<label for="password" class="form-label">Password</label>
								<input type="password" id="password" name="password" value="password123" class="form-input" required>
							</div>

							<button type="submit" name="simulate" class="submit-button" id="submitBtn">Submit</button>
							<p class="disclaimer-text">Submitted data is immediately discarded</p>
						</form>
						<div class="content-box reset-container failed" id="reset-container">
							<h3>Perimeter Security Failed</h3>
							<p class="failure-text">
								This form submission should have been blocked.
							</p>
							<div class="results-data">
								<h4>Credentials Stolen</h4>
								<pre><code id="captured-credentials"></code></pre>
							</div>

							<button type="button" id="resetBtn" class="reset-button">
								Reset Test
							</button>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

    <!-- Footer -->
    <?php include '../components/footer.php'; ?>
    <script src="script.js"></script>
</body>
</html>
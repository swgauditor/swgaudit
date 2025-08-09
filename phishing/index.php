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
        <div class="container">
            <?php 
            if (isset($_GET['name']) && isset($_GET['password'])) {
                echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    const form = document.getElementById("phishing-form");
                    const resetContainer = document.getElementById("reset-container");
                    const capturedCredentials = document.getElementById("captured-credentials");
                    
                    form.hidden = true;
                    resetContainer.hidden = false;
                    capturedCredentials.textContent = "Username: " + ' . json_encode(htmlspecialchars($_GET['name'])) . ' + "\nPassword: " + ' . json_encode(htmlspecialchars($_GET['password'])) . ';
                });
                </script>';
            } elseif (isset($_GET['error']) && $_GET['error'] === 'missing_fields') {
                echo '<div class="error-message">Name and password are required.</div>';
            }
            ?>
			<!-- Top section with Hero and Video -->
			<section class="top-section">
				<!-- Hero Content -->
				<div class="hero-content">
					<h1 class="hero-title">
						Evaluate your Perimeter Security against 
						<span class="text-red">Credential Theft</span>
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
							src="https://www.youtube.com/embed/cWfD6HNZO6U"
							title="YouTube video player"
							frameborder="0"
							allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
							allowfullscreen>
						</iframe>
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
                                <form id="phishing-form" method="POST" action="process.php">
                                    <div class="form-field">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" id="name" name="name" value="John Doe" class="form-input" required>
                                    </div>

                                    <div class="form-field">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" id="password" name="password" value="password123" class="form-input" required>
                                    </div>

                                    <div class="submit-section">
                                        <button type="submit" name="simulate" class="submit-button" id="submitBtn">Submit</button>
                                        <p class="disclaimer-text">Submitted data is immediately discarded</p>
                                    </div>
                                </form>
								<div class="reset-container" id="reset-container" hidden>
									<div class="test-failed">
										<h3>Your Perimeter Security Failed</h3>
										<p class="failure-text">
											This form submission should have been blocked.
										</p>
									</div>
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
				</div>
			</section>
		</div>
	</main>

    <!-- Footer -->
    <?php include '../components/footer.php'; ?>
    <script src="script.js"></script>
</body>
</html>
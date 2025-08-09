<?php
$title = "Data‑Theft Test - SWG Audit";
$description = "Evaluate your Secure Web Gateway's ability to detect and block data exfiltration via DNS tunneling.";
$keywords = "SWG, Data Theft Test, DNS Tunneling, Secure Web Gateway, Cybersecurity";
$url = "https://www.swgaudit.com/cyberslacking";
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

	<!-- Main Content -->
	<main class="container">
		<!-- Top section with Hero and Video -->
		<section class="top-section">
			<!-- Hero Content -->
			<div class="hero-content">
				<h1 class="hero-title">
					Evaluate your Perimeter Security against 
					<span class="text-red">Data Exfiltration</span>
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
					<iframe src="https://www.youtube.com/embed/49F0co_VrTY" title="YouTube video player" frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
						allowfullscreen>
					</iframe>
				</div>
			</div>
		</section>

		<!-- Main Simulation Section -->
		<section>
			<div class="simulation-wrapper">
				<div class="simulation-inner">
					<!-- Tab Header -->
					<div class="simulation-header">
						<h2 class="simulation-title">DNS Tunneling Simulation</h2>
					</div>

					<!-- Content Grid -->
					<div class="simulation-content">
						<!-- Instructions Panel -->
						<div class="instructions-panel">
							<h3 class="instruction-title">Simulation Instructions</h3>
							<p class="instruction-text">
								Before testing, ensure your SWG and DLP controls are fully enforced on swgaudit.com, including DNS inspection and outbound content policies. This simulation uploads a file using DNS tunnelling, mimicking stealth exfiltration. The file is deleted from the server after 10 minutes.
							</p>
							<p class="warning-text">
								If no data is received, or transmission is disrupted mid-way, your perimeter security has passed.
							</p>
							<p class="success-text">
								If the full file is exfiltrated, your perimeter security has failed.
							</p>
						</div>

						<!-- Right Panel - File Upload -->
						<div class="form-panel">

							<form id="data-theft-form" method="post">
								<div class="upload-area" id="upload-area">
									<svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M16.0832 27.4166H18.9165V21.5021L21.1832 23.7687L23.1665 21.75L17.4998 16.0833L11.8332 21.75L13.8519 23.7333L16.0832 21.5021V27.4166ZM8.99984 31.6666C8.22067 31.6666 7.55366 31.3892 6.9988 30.8344C6.44393 30.2795 6.1665 29.6125 6.1665 28.8333V6.16665C6.1665 5.38748 6.44393 4.72047 6.9988 4.1656C7.55366 3.61074 8.22067 3.33331 8.99984 3.33331H20.3332L28.8332 11.8333V28.8333C28.8332 29.6125 28.5557 30.2795 28.0009 30.8344C27.446 31.3892 26.779 31.6666 25.9998 31.6666H8.99984ZM18.9165 13.25V6.16665H8.99984V28.8333H25.9998V13.25H18.9165Z"
											fill="white" />
									</svg>
									<p class="upload-text">Drag and drop or click to select a file</p>
									<p class="constraints">Maximum file size: 100 KB</p>									
								</div>
								<!-- File selected state -->
								<div class="file-details" id="file-details" hidden>
									<div class="file-info">
										<span class="file-name" id="selected-filename"></span>
										<span class="file-size" id="selected-filesize"></span>
									</div>
									<button type="button" class="remove-file" aria-label="Remove selected file">✕</button>
								</div>
								<input type="file" id="fileInput" accept=".pdf,.jpg,.jpeg,.png,.gif,.txt,.doc,.docx" hidden>
								<button type="button" id="uploadButton" class="submit-button" disabled>Upload File</button>
							</form>
							<div class="reset-container" id="reset-container" hidden>
								<div class="test-failed">
									<h3>Your Perimeter Security Failed</h3>
									<p class="failure-text">
										File upload to the server should have been blocked.
									</p>
								</div>

								<div class="results-data">
									<h4>File Uploaded</h4>
									<div class="button-container">
										<button class="download-button" id="download-button">Download File</button>
										<br>
										<button class="copy-button" id="copy-button">Copy Download Link</button>
									</div>
								</div>

								<button type="button" id="resetBtn" class="reset-button">
									Reset Test
								</button>
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
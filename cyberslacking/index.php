<?php
  $title = "Cyber‑Slacking Test - SWG Audit";
  $description = "Evaluate your Secure Web Gateway's ability to enforce acceptable use policies and block non-work-related content.";
  $keywords = "SWG, Cyber‑Slacking Test, Content Filtering, Secure Web Gateway, Cybersecurity";
  $url = "https://www.swgaudit.com/cyberslacking";
  $page = 'cyberslacking'; // Set active page for navigation
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
    <!-- Navigation -->
    <?php include '../components/header.php'; ?>

    <main>
      <div class="container">
        <!-- Top section with Hero and Video -->
        <section class="top-section">
          <!-- Hero Content -->
          <div class="hero-content">
            <h1 class="hero-title">
              Can Your Perimeter Security
              <span class="text-red">Regulate Web 2.0 Usage?</span>
            </h1>
            <p class="hero-description">
              While platforms like YouTube and social media serve legitimate
              educational and communication purposes, unrestricted access often
              leads to cyberslacking—unauthorised use of work hours for
              non-productive engagement. Most SWGs lack granular content
              controls, allowing video and media platforms while failing to
              distinguish between work-related and distracting content. This
              opens the door to productivity loss and bandwidth abuse.
            </p>
          </div>

          <!-- Video Section -->
           <div class="video-section">
            <!-- This container will now be responsible for the video's aspect ratio -->
            <div class="video-placeholder">
              <iframe
                src="https://www.youtube.com/embed/Wq-Qyx-btQU"
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
              <div class="simulation-header">
                <h2 class="simulation-title">
                  Video Content Category Simulation
                </h2>
              </div>

              <div class="simulation-content">
                <!-- Instructions Panel -->
                <div class="instructions-panel">
                  <h3 class="instruction-title">Simulation Instructions</h3>
                  <p class="instruction-text">
                    Before testing, ensure your application control and content
                    filtering policies are applied to swgaudit.com, including
                    controls for category-based media access. This simulation
                    requests YouTube content from specific categories to test
                    your SWG's ability to enforce video-level restrictions.
                  </p>
                  <p class="warning-text">
                    If non-productive content is allowed, your perimeter
                    security has failed.
                  </p>
                  <p class="success-text">
                    If access is blocked or redirected, your perimeter security
                    has passed.
                  </p>
                </div>

                <!-- Video Panel -->
                <div class="dropdown-panel">
                  <div class="dropdown-content">
                    <select id="video-category" name="video-category">
                      <option value="entertainment">Entertainment</option>
                      <option value="education">Education</option>
                      <option value="film-animation">Film & Animation</option>
                      <option value="autos-vehicles">Autos & Vehicles</option>
                      <option value="music">Music</option>
                      <option value="pets-animals">Pets & Animals</option>
                      <option value="sports">Sports</option>
                      <option value="travel-events">Travel & Events</option>
                      <option value="gaming">Gaming</option>
                      <option value="people-blogs">People & Blogs</option>
                      <option value="news-politics">News & Politics</option>
                      <option value="howto-style">Howto & Style</option>
                      <option value="science-technology">
                        Science & Technology
                      </option>
                      <option value="movies">Movies</option>
                      <option value="action-adventure">Action/Adventure</option>
                      <option value="drama">Drama</option>
                      <option value="family">Family</option>
                      <option value="foreign">Foreign</option>
                      <option value="horror">Horror</option>
                      <option value="thriller">Thriller</option>
                      <option value="trailers">Trailers</option>
                    </select>

                    <!-- Video Player Container -->
                    <div class="video-player-container">
                      <iframe
                        id="video-player"
                        src="https://www.youtube.com/embed/YjlgahImVwI"
                        title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen
                      >
                      </iframe>
                    </div>
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

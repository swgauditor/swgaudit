<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SWG-audit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="/components/styles.css" />
    <link rel="stylesheet" href="/assets/css/global.css" />
    <link rel="stylesheet" href="/assets/css/cards.css" />
    <link rel="preload" href="/assets/fonts/albertSans.ttf" as="font" crossorigin>

</head>

<body>

    <!-- Navigation -->
    <?php include('components/header.php'); ?>

    <main>
        <p>Your current URL is: <span id="url"></span></p>
        <script>
            document.getElementById('url').textContent = window.location.href;
        </script>
    </main>
    <!-- Footer -->
    <?php include('components/footer.php'); ?>

    <script src="script.js"></script>
</body>

</html>
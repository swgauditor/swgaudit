<!-- Google tag (gtag.js) -->
<script async src="/assets/js/gtag.js"></script>
<header class="header">
  <div class="header-container">
    <!-- Left side - Logo only -->
    <a href="/" class="logo nav-item">
      <!-- Replace this with your SVG icon -->
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 173 168"
        viewBox="0 0 173 168">
        <image src  ="/assets/icons/logo_swg_audit.png" width="173" height="168" xlink:href="../assets/icons/logo_swg_audit.png"
          alt="SWG Audit Logo" />
      </svg>
      <span class="logo-text">SWG Audit</span>
    </a>
    
    <!-- Hamburger menu for mobile -->
    <button class="hamburger" aria-label="Open navigation" aria-expanded="false" aria-controls="mobile-nav" onclick="document.getElementById('mobile-nav').classList.toggle('open');this.setAttribute('aria-expanded', this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true');">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <!-- Desktop navigation (hidden on mobile) -->
    <div class="nav-center">
      <div class="nav-menu">
        <a href="/phishing/" class="nav-item <?php echo (isset($page) && $page == 'phishing') ? 'active' : ''; ?>">Phishing</a> 
        <a href="/malware/" class="nav-item <?php echo (isset($page) && $page == 'malware') ? 'active' : ''; ?>">Malware</a>
        <a href="/data-theft/" class="nav-item <?php echo (isset($page) && $page == 'data-theft') ? 'active' : ''; ?>">Data Theft</a>
        <a href="/cyberslacking/" class="nav-item <?php echo (isset($page) && $page == 'cyberslacking') ? 'active' : ''; ?>">Cyberslacking</a>
      </div> 
    </div>
    <div class="nav-left">
      <a href="/contact/" class="nav-item <?php echo (isset($page) && $page == 'contact-us') ? 'active' : ''; ?>">Contact Us</a>
      <a href="/about/" class="nav-item <?php echo (isset($page) && $page == 'about') ? 'active' : ''; ?>">About Us</a>
      <a href="/contribute/" class="nav-item <?php echo (isset($page) && $page == 'contribute') ? 'active' : ''; ?>">Contribute</a>
      <a href="https://github.com/swgauditor/swgaudit" class="github-icon" target="_blank" rel="noopener">
        <svg
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M0 12.305C0 17.74 3.438 22.352 8.207 23.979C8.807 24.092 9.027 23.712 9.027 23.386C9.027 23.094 9.016 22.32 9.01 21.293C5.671 22.037 4.967 19.643 4.967 19.643C4.422 18.223 3.635 17.845 3.635 17.845C2.545 17.081 3.718 17.096 3.718 17.096C4.921 17.183 5.555 18.364 5.555 18.364C6.626 20.244 8.364 19.702 9.048 19.386C9.157 18.591 9.468 18.049 9.81 17.741C7.145 17.431 4.344 16.376 4.344 11.661C4.344 10.318 4.811 9.219 5.579 8.359C5.456 8.048 5.044 6.797 5.696 5.103C5.696 5.103 6.704 4.773 8.996 6.364C9.954 6.091 10.98 5.955 12.001 5.95C13.20 5.955 14.047 6.091 15.005 6.364C17.295 4.772 18.302 5.103 18.302 5.103C18.956 6.797 18.544 8.048 18.421 8.359C19.191 9.219 19.655 10.318 19.655 11.661C19.655 16.387 16.849 17.428 14.175 17.732C14.606 18.112 14.99 18.862 14.99 20.011C14.99 21.656 14.975 22.982 14.975 23.386C14.975 23.715 15.191 24.098 15.8 23.977C20.565 22.347 24 17.738 24 12.305C24 5.508 18.627 0 12 0C5.373 0 0 5.508 0 12.305Z"
            fill="#090900"
            fill-opacity="0.45"
          />
        </svg>
      </a>
    </div>
    <!-- Mobile navigation drawer -->
    <nav id="mobile-nav" class="mobile-nav" aria-label="Mobile Navigation">
      <a href="/phishing/" class="nav-item">Phishing</a>
      <a href="/malware/" class="nav-item">Malware</a>
      <a href="/data-theft/" class="nav-item">Data Theft</a>
      <a href="/cyberslacking/" class="nav-item">Cyberslacking</a>
      <a href="/components/contact/" class="nav-item">contact-us</a>
      <a href="about/" class="nav-item">About-us</a>
      <a href="https://github.com/swgauditor/swgaudit/issues" class="nav-item">Contribute</a>
      <a href="https://github.com/swgauditor/swgaudit" class="github-icon" target="_blank" rel="noopener">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M12 0C5.373 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.11.82-.26.82-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.108-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.91 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.222.687.825.576C20.565 21.795 24 17.3 24 12 24 5.373 18.627 0 12 0z" />
        </svg>
      </a>
    </nav>
  </div>
</header>

<header class="header">
  <div class="header-container">
    <!-- Left side - Logo only -->
    <a href="/" class="logo nav-item">&lt;/Swg-audit./&gt;</a>
    
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
      <a href="../contact/" class="nav-item <?php echo (isset($page) && $page == 'contact-us') ? 'active' : ''; ?>">Contact Us</a>
      <a href="../about/" class="nav-item <?php echo (isset($page) && $page == 'about') ? 'active' : ''; ?>">About Us</a>
      <a href="https://github.com/swgauditor/swgaudit/blob/main/CONTRIBUTING.md" class="nav-item">Contribute</a>
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
    </nav>
  </div>
</header>

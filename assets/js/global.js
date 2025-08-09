// Set active navigation item based on current URL
document.addEventListener('DOMContentLoaded', function() {
    const currentPath = window.location.pathname;
    
    // Get all navigation items from both desktop and mobile menus
    const navItems = document.querySelectorAll('.nav-item');
    
    // Loop through each nav item and check if its href matches the current path
    navItems.forEach(item => {
        const itemPath = item.getAttribute('href');
        // Check if the current path starts with the nav item's path
        // This handles both exact matches and subpaths
        if (itemPath && (currentPath === itemPath || 
            (itemPath !== '/' && currentPath.startsWith(itemPath)))) {
            item.classList.add('active');
        } else {
            item.classList.remove('active');
        }
    });

    // Handle hamburger menu toggle
    const hamburger = document.querySelector('.hamburger');
    const mobileNav = document.getElementById('mobile-nav');
    
    if (hamburger && mobileNav) {
        hamburger.addEventListener('click', function() {
            mobileNav.classList.toggle('open');
            const isExpanded = hamburger.getAttribute('aria-expanded') === 'true';
            hamburger.setAttribute('aria-expanded', !isExpanded);
        });
    }
});

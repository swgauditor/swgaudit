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

        console.log('Checking item:', item, 'with path:', itemPath, 'against current path:', currentPath);
        if (itemPath && (currentPath === itemPath || 
            (itemPath !== '/' && currentPath.startsWith(itemPath)))) {
            item.classList.add('active');
            console.log('Active item set:', item);
        } else {
            item.classList.remove('active');
            console.log('Active item removed:', item);
        }
    });

    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('nav ul');
    const body = document.body;

    // Toggle hamburger menu
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        navMenu.classList.toggle('active');
        body.classList.toggle('menu-open');
    });

    // Close menu when clicking links
    document.querySelectorAll('nav ul li a').forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
            body.classList.remove('menu-open');
        });
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!hamburger.contains(e.target) && !navMenu.contains(e.target)) {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
            body.classList.remove('menu-open');
        }
    });
});

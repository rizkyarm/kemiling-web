
        // Initialize Lucide Icons
        lucide.createIcons();

        // Mobile Menu Functionality
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const navOverlay = document.getElementById('nav-overlay');
        const menuIcon = mobileMenuButton.querySelector('svg');

        function toggleMenu() {
            const isOpen = mobileMenu.classList.contains('open');
            mobileMenu.classList.toggle('open');
            navOverlay.classList.toggle('open');

            // Change icon
            mobileMenuButton.innerHTML = ''; // Clear icon
            const newIcon = isOpen ? 'menu' : 'x';
            const iconElement = document.createElement('i');
            iconElement.setAttribute('data-lucide', newIcon);
            iconElement.classList.add('text-gray-800');
            mobileMenuButton.appendChild(iconElement);
            lucide.createIcons();
        }

        mobileMenuButton.addEventListener('click', toggleMenu);
        navOverlay.addEventListener('click', toggleMenu);
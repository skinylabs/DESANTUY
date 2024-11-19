<header id="header" class="bg-white z-50 fixed w-full top-0 py-4 ">
    <nav class="flex justify-between items-center w-[92%] mx-auto ">
        <a href="/" class="flex items-center gap-2">
            <img class="w-8 cursor-pointer" src="{{ asset('/images/logo/logo-desa.png') }}" alt="...">
            <span class="font-bold text-xl text-slate-800">
                DESANTUY
            </span>
        </a>

        <div
            class="nav-links duration-500 md:static absolute bg-white md:min-h-fit h-screen md:h-auto left-[-100%] top-0 md:w-auto w-[70%] flex items-center px-5 z-50">
            <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                <li>
                    <a class="hover:text-gray-500" href="/">Homepage</a>
                </li>
                <li>
                    <a class="hover:text-gray-500" href="/tentangkaka">Tentang Kaka</a>
                </li>
                <li>
                    <a class="hover:text-gray-500" href="/tour">Tour</a>
                </li>
                <li>
                    <a class="hover:text-gray-500" href="/galleries">Gallery</a>
                </li>
                <!-- Dropdown Layanan (hanya untuk desktop) -->
                {{-- <li class="relative md:block hidden">
                    <button id="dropdown-btn" class="flex items-center hover:text-gray-500 cursor-pointer">
                        Layanan
                        <!-- Icon panah -->
                        <svg id="arrow-icon" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <ul id="dropdown-menu"
                        class="absolute left-0 top-full mt-2 bg-white shadow-lg rounded-lg hidden flex-col min-w-[150px] z-50">
                        <li>
                            <a class="block px-4 py-2 hover:bg-gray-100" href="/galleries">Gallery</a>
                        </li>
                        <li>
                            <a class="block px-4 py-2 hover:bg-gray-100" href="/sewa-kendaraan">Sewa Kendaraan</a>
                        </li>
                    </ul>
                </li> --}}
                <li>
                    <a class="hover:text-gray-500" href="/contact">Contact</a>
                </li>
            </ul>
        </div>
        <div class="flex gap-2">
            <a href="/login" class="bg-green-500 text-white p-2 rounded-lg">Masuk</a>
            <a href="/login" class="bg-green-500 text-white p-2 rounded-lg">Daftar</a>
        </div>
        <ion-icon id="menu-icon" onclick="onToggleMenu(this)" name="menu"
            class="text-3xl cursor-pointer md:hidden"></ion-icon>
    </nav>
</header>

<!-- Overlay -->
<div id="overlay" class="fixed inset-0 bg-black opacity-50 hidden z-40"></div>

<script>
    const navLinks = document.querySelector('.nav-links');
    const overlay = document.getElementById('overlay');
    const header = document.getElementById('header');
    const menuIcon = document.getElementById('menu-icon');
    const body = document.body;
    const dropdownBtn = document.getElementById('dropdown-btn');
    const dropdownMenu = document.getElementById('dropdown-menu');
    const arrowIcon = document.getElementById('arrow-icon');

    function onToggleMenu(e) {
        e.name = e.name === 'menu' ? 'close' : 'menu';
        navLinks.classList.toggle('left-0');
        navLinks.classList.toggle('left-[-100%]');
        overlay.classList.toggle('hidden');

        if (navLinks.classList.contains('left-0')) {
            header.classList.remove('bg-white');
            header.classList.add('bg-transparent');
            menuIcon.style.color = 'red';
            body.classList.add('overflow-hidden');
        } else {
            header.classList.remove('bg-transparent');
            header.classList.add('bg-white');
            menuIcon.style.color = 'black';
            body.classList.remove('overflow-hidden');
        }
    }

    overlay.addEventListener('click', function() {
        // Hide menu and overlay when clicking outside
        navLinks.classList.add('left-[-100%]');
        navLinks.classList.remove('left-0');
        overlay.classList.add('hidden');
        header.classList.remove('bg-transparent');
        header.classList.add('bg-white');
        menuIcon.style.color = 'black';
        body.classList.remove('overflow-hidden');

        // Change the menu icon back to hamburger
        menuIcon.setAttribute('name', 'menu');
    });

    if (dropdownBtn) {
        dropdownBtn.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
            arrowIcon.classList.toggle('rotate-180');
        });
    }

    function setupMobileMenu() {
        const dropdownItems = `
            <li><a class="hover:text-gray-500" href="/galleries">Gallery</a></li>
        `;
        const menuItems = `
            <li><a class="hover:text-gray-500" href="/">Homepage</a></li>
            <li><a class="hover:text-gray-500" href="/tentangkaka">Tentang Kaka</a></li>
            <li><a class="hover:text-gray-500" href="/tour">Tour</a></li>
            ${dropdownItems}
            <li><a class="hover:text-gray-500" href="/contact">Contact</a></li>
        `;
        navLinks.querySelector('ul').innerHTML = menuItems;
    }

    if (window.innerWidth < 768) {
        setupMobileMenu();
    }

    // Add shadow to header on scroll for desktop/tablet view only
    window.addEventListener('scroll', function() {
        if (window.innerWidth >= 768) {
            if (window.scrollY > 50) {
                header.classList.add('shadow');
            } else {
                header.classList.remove('shadow');
            }
        }
    });
</script>



{{-- <li><a class="hover:text-gray-500" href="/sewakendaraan">Sewa Kendaraan</a></li> --}}

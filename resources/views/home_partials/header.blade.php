<header class="header" data-header>
    <div class="overlay" data-overlay></div>
    <div class="header-top">
        <div class="container" style="margin: 15px auto">
            <ul class="header-top-list">
                <li>
                    <a href="#" class="header-top-link">
                        <ion-icon name="mail-outline"></ion-icon>
                        <span>tita_residence@perumahan.com</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="header-top-link">
                        <ion-icon name="location-outline"></ion-icon>
                        <address>Jalan Kotamobagu, Kotamobagu Utara, Bolaang Mongondow</address>
                    </a>
                </li>
            </ul>
            <div class="wrapper">
                <ul class="header-top-social-list">

                    <li>
                        <a href="#" class="header-top-social-link">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="header-top-social-link">
                            <ion-icon name="logo-twitter"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="header-top-social-link">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="header-top-social-link">
                            <ion-icon name="logo-pinterest"></ion-icon>
                        </a>
                    </li>

                </ul>
            </div>

        </div>
    </div>

    <div class="header-bottom">
        <div class="container">

            <a href="#" class="logo">
                <img src="./assets/images/logo.png" alt="Homeverse logo" width="130px">
                {{-- <span>TitaResidence</span> --}}
            </a>

            <nav class="navbar" data-navbar>

                <div class="navbar-top">

                    <a href="#" class="logo">
                        <img src="./assets/images/logo.png" alt="Homeverse logo">
                    </a>

                    <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>

                </div>

                <div class="navbar-bottom">
                    <ul class="navbar-list">

                        <li>
                            <a href="#home" class="navbar-link" data-nav-link>Home</a>
                        </li>

                        <li>
                            <a href="#service" class="navbar-link" data-nav-link>Service</a>
                        </li>

                        <li>
                            <a href="#property" class="navbar-link" data-nav-link>Property</a>
                        </li>

                    </ul>
                </div>

            </nav>

            <div class="header-bottom-actions">

                @role('customer')
                    <div class="dropdown">
                        <button style="display: flex; align-items: center;" class="dropdown-toggle" aria-haspopup="true"
                            aria-expanded="false">
                            <span style="margin-inline-end: 5px">{{ auth()->user()->username }}</span>
                            <ion-icon name="caret-down-outline"></ion-icon>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="/customer/offering">Penawaran Saya</a></li>
                            <li><a href="/customer/house">Rumah Saya</a></li>
                            <hr>
                            <li><a href="/auth/logout">Logout</a></li>
                        </ul>
                    </div>
                @endrole('customer')

            </div>

        </div>
    </div>

</header>

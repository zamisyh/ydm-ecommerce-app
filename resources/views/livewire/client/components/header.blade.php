<div>
    <nav class="navbar">
        <a href="{{ route('client.home') }}#" class="navbar-logo"> Vibes <span>Coffee</span> </a>
        <div class="navbar-nav">
            <a href="{{ route('client.home') }}#home">Home</a>
            <a href="{{ route('client.home') }}#about">Tentang Kami</a>
            <a href="{{ route('client.home') }}#menu">Menu</a>
            <a href="{{ route('client.home') }}#contact">Contact</a>
        </div>
        <div class="navbar-extra">
            <a href="#" id="search-button"><i data-feather="search"></i></a>
            <div class="indicator">
                <span class="indicator-item badge badge-secondary">
                    {{ $countCart }}
                </span>
                <a href="{{ route('client.cart') }}" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
            </div>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>

        <!-- search from start -->
        <div class="search-form">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box"><i data-feather="search"></i></label>
        </div>
        <!-- search from end -->
    </nav>
</div>

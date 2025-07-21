<nav class="navbar {{isset($transparentNav) && $transparentNav ? 'transparent-background' : 'white-background'}}">
    <div class="logo-header">
        <a href="">
            <img
            src="https://cdn.pixabay.com/photo/2017/02/18/19/20/logo-2078018_960_720.png"
            alt="Logo personal portfolio"
            title="Logo personal portfolio"
            class="logo-img"/>
        </a>
    </div>

    <ul class="nav-links">
        <li>
            <a href="/" class="{{ request()->is('/')  ? 'active' : '' }}">Home</a>
        </li>
        <li>
            <a href="{{route('about')}}" class="{{ request()->is('about') ? 'active' : '' }}">About</a>
        </li>
        @if (Auth::check())
            @if(Auth::user()->role_id == 1)
                <li>
                    <a href="{{route('product.storeView')}}" class="{{ request()->is('products/*') ? 'active' : '' }}">Products</a>
                </li>
            @endif
            <li>
                <a href="{{route('order.show')}}" class="{{ request()->is('order/*') ? 'active' : '' }}">Order</a>
            </li>
            <li>
                <a href="{{route('cart.show')}}" class="{{ request()->is('cart/*') ? 'active' : '' }}">Cart</a>
            </li>   
        @endif   
        
    </ul>
    @if(Auth::check())
    <div class="user-dropdown">
        <div class="user-icon">
            <span><i class='bx bxs-user-circle'></i></span>
            <p>Zdravo, {{ Auth::user()->name }}</p>
        </div>
        <div class="user-dropdown-content">
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
    </div>
    @else
        <a href="{{ route('login.form') }}" class="login-button">Login</a>
    @endif
</nav>

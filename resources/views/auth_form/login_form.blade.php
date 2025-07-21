@extends('layouts.app')

@section('content')
<div class="background"></div>
<div class="login-container">
    <div class="auth-content">
        <h2 class="logo"><i class='bx bxl-php'></i> Web shop</h2>

        <div class="text-sci">
            <h2>Welcome!<br><span>To Our New Web Shop.</span></h2>
            
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, consectetur!</p>
            
            <div class="social-icons">
                <a href="#"><i class="bx bxl-linkedin"></i></a>
                <a href="#"><i class="bx bxl-facebook"></i></a>
                <a href="#"><i class="bx bxl-instagram"></i></a>
                <a href="#"><i class="bx bxl-twitter"></i></a>
            </div>
        </div>
    </div>

    <div class="logreg-box">
        @if (session('error'))
                    <div class="error-msg" >
                        <h4>{{ session('error') }}</h4>
                    </div>
                @endif
        <div class="form-box login">
            <form action={{ route('auth.login') }} method="POST" autocomplete="off">
                <h2>Sign In</h2>
                @csrf

                <div class="input-box">
                    <span class="icon"><i class="bx bxs-envelope"></i></span>
                    <input type="text" name="email" required>
                    <label>Email</label>
                </div>
                
                <div class="input-box">
                    <span class="icon"><i class="bx bxs-lock-alt"></i></span>
                    <input type="password" name="password" required>
                    <label>Lozinka</label>
                </div>
                
                <div class="remember-forgot">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>
                
            
                {{-- <a href="{{route('register.form')}}">Register</a> --}}
            
                <button type="submit" class="btn">Sign In</button>

                <div class="login-register">
                    <p>Don't have an account? 
                        <a href="#" class="register-link">Sign Up</a>
                    </p>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <form action={{ route('auth.register') }} method="POST">
                <h2>Sign Up</h2>
                @if (session('error'))
                    <div class="error-msg" >
                        <h4>{{ session('error') }} </h4>
                    </div>
                @endif

                @csrf

                <div class="input-box">
                    <span class="icon"><i class="bx bxs-user"></i></span>
                    <input type="text" name="name" required>
                    <label>Name</label>
                </div>

                <div class="input-box">
                    <span class="icon"><i class="bx bxs-envelope"></i></span>
                    <input type="text" name="email" required>
                    <label>Email</label>
                </div>
                
                <div class="input-box">
                    <span class="icon"><i class="bx bxs-lock-alt"></i></span>
                    <input type="password" name="password" required>
                    <label>Lozinka</label>
                </div>
                
                <div class="remember-forgot">
                    <label><input type="checkbox"> I agree to the terms & conditions</label>
                </div>
            
                <button type="submit" class="btn">Sign Up</button>

                <div class="login-register">
                    <p>Already have an account? 
                        <a href="#" class="login-link">Sign In</a>
                    </p>
                </div>
            </form>
        </div>
        
    </div>
</div>  
@endsection


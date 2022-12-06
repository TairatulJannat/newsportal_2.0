<!--Logn/Signup Modal body.. -->
                    
<div class="container" id="container">

    <div class="form-container sign-in-container" id="sign-in-container">
        <form action="{{ route('authenticate.general.user') }}" method = "post" autocomplete="off">
            @csrf
            <h1>Login</h1>
            <input type="email" placeholder="Email" name = "email" />
            <input type="password" placeholder="Password" name="password" />
            <a href="#">Forgot your password?</a>
            <button>Sign In</button>
            
            <span>or login with</span>
            <div class="social-container">
                <a href="{{ route('login.with.facebook') }}" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="{{ route('login.with.google') }}" class="social"><i class="fab fa-google-plus-g"></i></a>
            </div>
        </form>
    </div>

    
    <div class="form-container sign-up-container" id="sign-up-container">
        <form action="{{ route('user.registered') }}" method = "post" autocomplete="off">
            @csrf
            <h1>Create Account</h1>
            
            <input type="text" placeholder="Name" name = "name" />
            <input type="email" placeholder="Email" name ="email" />
            <input type="password" placeholder="Password" name ="password" />
            <button>Sign Up</button>
            
            <span>or register with</span>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </form>
    </div>


    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left" id="overlay-left">
                <h1>Already Have an Account ?</h1>
                <p class="text-center">Please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right" id="overlay-right">
                <h1>New Here ?</h1>
                <p class="text-center">Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>
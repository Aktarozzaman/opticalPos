<form method="POST" action="{{ route('login') }}" class="sign-in-form">
    {{ csrf_field() }}
    <h2 class="title">Sign In</h2>
    
    <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="text" name="username" required autofocus placeholder="Username" />
        @if ($errors->has('username'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('username') }}</strong>
            </span>
        @endif
    </div>

    <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" id="password" autocomplete="off" required placeholder="Password" />
        <button type="button" id="togglePassword" class="eye-button">
            <i class="fas fa-eye" id="eyeIcon"></i>
        </button>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    
    <a href="{{ route('password.request') }}" class="ss">Forgot your password?</a>
    <input type="submit" value="Login" class="btn solid" />

    <p class="social-text">Software Developed By: <a href="https://cybersparkglobal.com/" class="ss">CyberSpark Global</a>
        <br/> Hotline:<a href="tel:+01685375652" class="ss">+01685375652</a>
    </p>
    <div class="social-media">
        <a href="https://www.facebook.com/Cybersparkglobal/" class="social-icon">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://x.com/CybersparkG" class="social-icon">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="https://www.linkedin.com/company/cyberspark-global/" class="social-icon">
            <i class="fab fa-linkedin-in"></i>
        </a>
    </div>
</form>

<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', function () {
        // Toggle the type attribute
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        // Toggle the eye icon
        eyeIcon.classList.toggle('fa-eye');
        eyeIcon.classList.toggle('fa-eye-slash');
    });
</script>

<style>
    .eye-button {
        background: none;
        border: none;
        cursor: pointer;
        position: absolute; /* Position it correctly */
        right: 10px; /* Adjust based on your layout */
        top: 50%; /* Center it vertically */
        transform: translateY(-50%);
    }
</style>

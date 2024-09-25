<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{asset('uploads/Glorious_IT_famicom_logo_.png')}}" type="image/x-icon" >
    <title>SignIn SignUp</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/css/optical_login.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
@yield('content')

<script>
    const sign_in_btn = document.querySelector("#sign-in-btn");
    const sign_up_btn = document.querySelector("#sign-up-btn");
    const container = document.querySelector(".container");

    sign_up_btn.addEventListener('click', () =>{
        container.classList.add("sign-up-mode");
    });

    // sign_in_btn.addEventListener('click', () =>{
    //     container.classList.remove("sign-up-mode");
    // });
    document.getElementById('sign-up-btn').addEventListener('click', function() {
        window.location.href = "{{ url('business/register') }}";
    });
</script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Burger God - Admin</title>
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro-v4-shims.min.css" media="all">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro-v4-font-face.min.css" media="all">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro.min.css" media="all">
    <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet" />
</head>
<body>
    <div class="d-flex align-items-center" style="min-height: 100vh">
        <div class="container">
            <form method="POST" action="{{ route('app.admin.login.post') }}" class="col-md-5 m-auto">
                @csrf
                <h4 class="text-center mb-3">Loghează-te ca admin pe BurgerGod</h4>
                <input type="text" name="email" class="form-control mb-3" placeholder="E-mail">
                <input type="password" name="password" class="form-control mb-3" placeholder="Parolă">
                <button type="submit" class="btn btn-primary w-100 text-uppercase">Loghează-te</button>
            </form>
        </div>
    </div>
    @jquery
    @toastr_js
    @toastr_render
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Admin Template">
    <meta name="author" content="Bootlab">

    <title>Test</title>

    <link href="/css/app.css" rel="stylesheet">

</head>

<body>
<div class="wrapper">
    <div class="main">
        <a class="nav-link nav-link-user dropdown-toggle d-none d-sm-inline-block" href="#" id="userDropdown"
           data-toggle="dropdown">
            <span class="text-dark"><?= (\core\Application::get_app())->user->isGuest ? 'Гость' : (\core\Application::get_app())->user->name; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <?= (\core\Application::get_app())->user->isGuest ? '<a class="dropdown-item" href="/admin/login">Войти</a>' : '<a class="dropdown-item" href="/admin/logout">Выйти</a>'; ?>
        </div>
        <?php if(isset($_SESSION['message'])){ ?>
            <div class="alert alert-info alert-dismissible" role="alert">
                <div class="alert-message">
                    <strong><?=$_SESSION['message'] ?></strong>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        <?php unset($_SESSION['message']);}?>
        <main class="content">
            <?= $content; ?>
        </main>
    </div>
</div>

<script src="/js/app.js"></script>
</body>

</html>
@if(Auth::check())
<div id="topbar" class="navbar navbar-expand-md fixed-top navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">
            <img class="img-responsive" src="{{ asset('images/logo.png') }}" /> 
            {{ config('app.name') }}
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-responsive-collapse">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <div class="me-auto"></div>
            {{ Html::render_menu(Menu::navbartopleft()  , "navbar-nav me-auto" ) }}
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <?php
                            $user_photo = $user->UserPhoto();
                            if($user_photo){
                            Html::img($user_photo, 30, 30);
                            }
                            else{
                        ?>
                        <span class="avatar-icon"><i class="material-icons">account_box</i></span>
                        <?php
                            }
                        ?>
                        <span>Hi <?php echo $user->UserName(); ?> !</span>
                    </a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="<?php print_link('account') ?>"><i class="material-icons">account_box</i> My Account</a>
                        <a class="dropdown-item" href="<?php print_link('auth/logout') ?>"><i class="material-icons">exit_to_app</i> Logout</a>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
@else
<div id="topbar" class="navbar navbar-expand-md fixed-top navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">
            <img class="img-responsive" src="{{ asset('images/logo.png') }}" /> 
            {{ config('app.name') }}
        </a>
    </div>
</div>
@endif
<?php
session_start();

include '../../config/database.php';

// logout sesssion query......
if (!isset($_SESSION['author_id'])) {
    header('location: ../../dashtools/login.php');
}
// logout sesssion query......


$explode = explode('/', $_SERVER['PHP_SELF']);
$link = end($explode);

// image update...query........
$id = $_SESSION['author_id'];
$users_query = "SELECT * FROM users WHERE id='$id'";
$conncet = mysqli_query($db, $users_query);
$user = mysqli_fetch_assoc($conncet);


// image update...query........
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Dashboard home</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="../../public/dashCss/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/dashCss/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../../public/dashCss/plugins/pace/pace.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../../../public/backend/assets/plugins/pace/pace.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../../../public/backend/assets/plugins/pace/pace.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Theme Styles -->
    <link href="../../public/dashCss/css/main.min.css" rel="stylesheet">
    <link href="../../public/dashCss/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="../../../public/dashCss/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../../../public/dashCss/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->
</head>

<body>
    <div class="app-sidebar">

        <div class="logo">
            <!-- <a href="index.html" class="logo-icon"><span class="logo-text">Neptune</span></a> -->
            <div class="sidebar-user-switcher user-activity-online ">
                <a style="display: flex;" href="#">
                    <span class="activity-indicator"></span>
                    <span class="user-info-text"><?= $_SESSION['author_name'] ?><br><span class="user-state-info"><?= $_SESSION['author_email'] ?></span></span>

                    <?php if ($user['image'] == 'defult imge.png') : ?>
                        <img style="width: 40px;" src="../../public/update/defult/<?= $user['image'] ?>">
                    <?php else : ?>
                        <img style="width: 40px;" src="../../public/update/profile/<?= $user['image'] ?>">
                    <?php endif; ?>
                </a>
            </div>
        </div>
        <div class="app-menu">
            <ul style="display: flex; flex-direction:column; gap:8px;" class="accordion-menu">
                <li class="sidebar-title">
                    Apps..
                    </li>
                <li style="background-color: rgb(243, 242, 242); width:280px;border-radius: 10px;">
                        <a style="font-size:16px;" target="_blank" href="../../index.php" class="active"><i class="material-icons-two-tone">visibility</i>Web Site..</a>
                </li>
                <li style="background-color: rgb(243, 242, 242); width:280px;border-radius: 10px;" class="<?= ($link == 'home.php') ? 'active-page' : '' ?>">
                    <a style="font-size:16px;" href="../home/home.php" class="active"><i class="material-icons-two-tone">dashboard</i>Dashboard..</a>
                </li>
               
                <li  style="background-color: rgb(243, 242, 242); width:280px;border-radius: 10px;"  class="<?= ($link == 'settings.php') ? 'active-page' : '' ?>">
                    <a style="font-size:16px;" href="../settings/settings.php"><i class="material-icons-two-tone">settings</i>Settings..</a>
                </li>

                <li  style="background-color: rgb(243, 242, 242); width:280px;border-radius: 10px;" class="<?= ($link == 'service.php') ? 'active-page' : '' ?>">
                    <a style="font-size:16px;" href="../services/service.php"><i class="material-icons-two-tone">medical_services</i>Services..</a>
                </li>

                <li  style="background-color: rgb(243, 242, 242); width:280px;border-radius: 10px;" class="<?= ($link == 'portfolio.php') ? 'active-page' : '' ?>">
                    <a style="font-size:16px;" href="../portfolio/portfolio.php"><i class="material-icons-two-tone">design_services</i>portfolio..</a>
                </li>

                <li  style="background-color: rgb(243, 242, 242); width:280px;border-radius: 10px;" class="<?= ($link == 'about.php') ? 'active-page' : '' ?>">
                    <a style="font-size:16px;" href="../about/about.php"><i style="font-size: 20px;" class="fa fa-users"></i>About..</a>
                </li>

                <li  style="background-color: rgb(243, 242, 242); width:280px;border-radius: 10px;" class="<?= ($link == 'skill.php') ? 'active-page' : '' ?>">
                    <a style="font-size:16px;" href="../Skills/skill.php"><i style="font-size: 20px;" class="fa fa-gears"></i>Skills..</a>
                </li>

                <li style="background-color: rgb(243, 242, 242); width:280px;border-radius: 10px;" class="<?= ($link == 'quotes.php') ? 'active-page' : '' ?>">
                    <a style="font-size:16px;" href="../quotes/quotes.php"><i style="font-size: 20px;" class="fa fa-commenting"></i>Quotes..</a>
                </li>

                <li  style="background-color: rgb(243, 242, 242); width:280px;border-radius: 10px;" class="<?= ($link == 'contact.php') ? 'active-page' : '' ?>">
                    <a style="font-size:16px;" href="../contact/contact.php"><i style="font-size: 20px;" class="fa fa-address-book"></i>Contacts..</a>
                </li>

                <li  style="background-color: rgb(243, 242, 242); width:280px;border-radius: 10px;" class="<?= ($link == 'brand.php') ? 'active-page' : '' ?>">
                    <a style="font-size:16px;" href="../brand/brand.php"><i style="font-size: 20px;" class="fa fa-recycle"></i>brand..</a>
                </li>

                <!-- <li>
                        <a href="calendar.html"><i class="material-icons-two-tone">calendar_today</i>Calendar<span class="badge rounded-pill badge-success float-end">14</span></a>
                    </li>
                    <li>
                        <a href="todo.html"><i class="material-icons-two-tone">done</i>Todo</a>
                    </li>
                    <li>
                        <a href=""><i class="material-icons-two-tone">star</i>Pages<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="pricing.html">Pricing</a>
                            </li>
                            <li>
                                <a href="invoice.html">Invoice</a>
                            </li>
                            <li>
                                <a href="settings.html">Settings</a>
                            </li>
                            <li>
                                <a href="#">Authentication<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="sign-in.html">Sign In</a>
                                    </li>
                                    <li>
                                        <a href="sign-up.html">Sign Up</a>
                                    </li>
                                    <li>
                                        <a href="lock-screen.html">Lock Screen</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="error.html">Error</a>
                            </li>
                        </ul>
                    </li> -->
            </ul>
        </div>
    </div>
    <div class="app-container">
        <div class="search">
            <form>
                <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
            </form>
            <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
        </div>
        <div class="app-header">
            <nav class="navbar navbar-light navbar-expand-lg">
                <div class="container-fluid">
                    <div class="navbar-nav" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                            </li>
                            <li class="nav-item dropdown hidden-on-mobile">
                                <a class="nav-link dropdown-toggle" href="#" id="addDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="material-icons">add</i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="addDropdownLink">
                                    <li><a class="dropdown-item" href="#">New Workspace</a></li>
                                    <li><a class="dropdown-item" href="#">New Board</a></li>
                                    <li><a class="dropdown-item" href="#">Create Project</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown hidden-on-mobile">
                                <a class="nav-link dropdown-toggle" href="#" id="exploreDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="material-icons-outlined">explore</i>
                                </a>
                                <ul class="dropdown-menu dropdown-lg large-items-menu" aria-labelledby="exploreDropdownLink">
                                    <li>
                                        <h6 class="dropdown-header">Repositories</h6>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <h5 class="dropdown-item-title">
                                                Neptune iOS
                                                <span class="badge badge-warning">1.0.2</span>
                                                <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                            </h5>
                                            <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <h5 class="dropdown-item-title">
                                                Neptune Android
                                                <span class="badge badge-info">dev</span>
                                                <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                            </h5>
                                            <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-btn-item d-grid">
                                        <button class="btn btn-primary">Create new repository</button>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                    <div class="d-flex">
                        <ul class="navbar-nav">
                            <!-- Dashboard LogOut here...........!! -->
                            <li class="nav-item hidden-on-mobile">
                                <a style="font-size:14px; font:bold; display:flex; gap:11px; width:91px; color:white;     background-color:#0d4efd; border-radius:10px" class="nav-link btn " href="../logout/logout.php">LogOut <i style="margin-top: 2px;" class="fa-solid fa-person-walking-luggage"></i></a>

                            </li>
                            <!-- Dashboard LogOut here...........!! -->









                            <!-- <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link" href="#">Reports</a>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link" href="#">Projects</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link toggle-search" href="#"><i class="material-icons">search</i></a>
                                </li> -->
                            <!-- <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link language-dropdown-toggle" href="#" id="languageDropDown" data-bs-toggle="dropdown"><img src="../../../public/backend/assets/images/flags/us.png" alt=""></a>
                                        <ul class="dropdown-menu dropdown-menu-end language-dropdown" aria-labelledby="languageDropDown">
                                            <li><a class="dropdown-item" href="#"><img src="../../../public/backend/assets/images/flags/germany.png" alt="">German</a></li>
                                            <li><a class="dropdown-item" href="#"><img src="../../../public/backend/assets/images/flags/italy.png" alt="">Italian</a></li>
                                            <li><a class="dropdown-item" href="#"><img src="../../../public/backend/assets/images/flags/china.png" alt="">Chinese</a></li>
                                        </ul>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link nav-notifications-toggle" id="notificationsDropDown" href="#" data-bs-toggle="dropdown">4</a>
                                    <div class="dropdown-menu dropdown-menu-end notifications-dropdown" aria-labelledby="notificationsDropDown">
                                        <h6 class="dropdown-header">Notifications</h6>
                                        <div class="notifications-dropdown-list">
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-info text-white">
                                                            <i class="material-icons-outlined">campaign</i>
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p class="bold-notifications-text">Donec tempus nisi sed erat vestibulum, eu suscipit ex laoreet</p>
                                                        <small>19:00</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-danger text-white">
                                                            <i class="material-icons-outlined">bolt</i>
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p class="bold-notifications-text">Quisque ligula dui, tincidunt nec pharetra eu, fringilla quis mauris</p>
                                                        <small>18:00</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-success text-white">
                                                            <i class="material-icons-outlined">alternate_email</i>
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p>Nulla id libero mattis justo euismod congue in et metus</p>
                                                        <small>yesterday</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge">
                                                            <img src="../../../public/backend/assets/images/avatars/avatar.png" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p>Praesent sodales lobortis velit ac pellentesque</p>
                                                        <small>yesterday</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge">
                                                            <img src="../../../public/backend/assets/images/avatars/avatar.png" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p>Praesent lacinia ante eget tristique mattis. Nam sollicitudin velit sit amet auctor porta</p>
                                                        <small>yesterday</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li> -->

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="app-content">
            <div class="content-wrapper">
                <div class="container">

                    <!-- header end -->
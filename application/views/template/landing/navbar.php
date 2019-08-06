<body>
    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Top Header_Area -->
    <section class="top_header_area">
        <div class="container">
            <ul class="nav navbar-nav top_nav">
                <li><a href="#"><i class="fa fa-phone"></i><?=$pengaturan['telpon'] ?></a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i><?=$pengaturan['email'] ?></a></li>
                <li><a href="#"><i class="fa fa-clock-o"></i><?=$pengaturan['jam_kerja'] ?></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right social_nav">
                <li><a href="http://www.facebook.com/<?=$pengaturan['facebook'] ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="http://www.twitter.com/<?=$pengaturan['twitter'] ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="http://www.instagram.com/<?=$pengaturan['instagram'] ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="<?=base_url('dashboard') ?>" title="Dashboard" target="_blank"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </section>
    <!-- End Top Header_Area -->

    <!-- Header_Area -->
    <nav class="navbar navbar-default header_aera" id="main_navbar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="col-md-2 p0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#min_navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=base_url() ?>"><img src="<?=base_url('assets/landing/')?>images/logo.png" alt=""></a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="col-md-10 p0">
                <div class="collapse navbar-collapse" id="min_navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?=base_url() ?>">Beranda</a></li>
                        <?php foreach ($menulanding as $ml): ?>
                            <li><a href="<?=base_url().$ml['url_ml'] ?>"><?=$ml['nama_ml'] ?></a></li>
                        <?php endforeach ?>
                        <!-- <li class="dropdown submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us</a>
                            <ul class="dropdown-menu other_dropdwn">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="about-2.html">About Us-2</a></li>
                            </ul>
                        </li>
                        <li class="dropdown submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services</a>
                            <ul class="dropdown-menu other_dropdwn">
                                <li><a href="services.html">Services</a></li>
                                <li><a href="services-2.html">Services-2</a></li>
                            </ul>
                        </li>
                        <li class="dropdown submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog</a>
                            <ul class="dropdown-menu">
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-2.html">Blog-2</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div><!-- /.container -->
    </nav>
    <!-- End Header_Area -->

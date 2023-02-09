<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<title><?php bloginfo('name');?> <?php wp_title();?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="<?php echo (is_home())?bloginfo('description'):'ss';?> ">
    <meta name="author" content="Themefisher">

    <!-- theme meta -->
    <meta name="theme-name" content="logbook" />
    
    <!-- plugins -->
    <link rel="preload" href="https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWJ0bbck.woff2"
        style="font-display: optional;">
    <link rel="stylesheet"
        href="<?php echo get_template_directory_uri(); ?>/assets/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Montserrat:600%7cOpen&#43;Sans&amp;display=swap" media="screen">

    <link rel="stylesheet"
        href="<?php echo get_template_directory_uri(); ?>/assets/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/plugins/slick/slick.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">

    <!--Favicon-->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png"
        type="image/x-icon">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" type="image/x-icon">
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- navigation -->
    <header class="sticky-top bg-white border-bottom border-default">
        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-white">
                <a class="navbar-brand" href="<?php echo get_site_url(); ?>">
                <?php 
                $image = get_header_image();

                if ( $image ) {
                    $headerimg= esc_url( $image );
                }else{
                    $headerimg='';
                }
                ?>
                    <img class="img-fluid" width="150px"
                        src="<?php echo $headerimg; ?>" alt="LogBook">
                </a>
                <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation">
                    <i class="ti-menu"></i>
                </button>
              
                <div class="collapse navbar-collapse text-center" id="navigation">
                <?php wp_nav_menu( array(
                        'menu' => 'primary_menu',
                        'menu_class' => "navbar-nav ml-auto", 
                        'menu_id'   => "",
                        'container' => false,
                        'add_li_class'  => 'nav-item',
                        'link_class'  => 'nav-link'
                    ) );?>

                    <!-- <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                homepage <i class="ti-angle-down ml-1"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="index-full.html">Homepage Full Width</a>
                                <a class="dropdown-item" href="index-full-left.html">Homepage Full With Left Sidebar</a>
                                <a class="dropdown-item" href="index-full-right.html">Homepage Full With Right
                                    Sidebar</a>
                                <a class="dropdown-item" href="index-list.html">Homepage List Style</a>
                                <a class="dropdown-item" href="index-list-left.html">Homepage List With Left Sidebar</a>
                                <a class="dropdown-item" href="index-list-right.html">Homepage List With Right
                                    Sidebar</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">Pages <i class="ti-angle-down ml-1"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="author.html">Author</a>
                                <a class="dropdown-item" href="post-details-1.html">Post Details 1</a>
                                <a class="dropdown-item" href="post-details-2.html">Post Details 2</a>
                                <a class="dropdown-item" href="post-elements.html">Post Elements</a>
                                <a class="dropdown-item" href="privacy-policy.html">Privacy Policy</a>
                                <a class="dropdown-item" href="terms-conditions.html">Terms Conditions</a>
                            </div>
                        </li>
                    </ul> -->

                    <select class="m-2 border-0" id="select-language">
                        <option id="en" value="about/" selected>En</option>
                        <option id="fr" value="fr/about/">Fr</option>
                    </select>

                    <!-- search -->
                    <div class="search px-4">
                        <button id="searchOpen" class="search-btn"><i class="ti-search"></i></button>
                        <div class="search-wrapper">
                            <form class="h-100" method="GET">
                                <input class="search-box pl-4" id="search-query" name="s" type="search"
                                    placeholder="Type &amp; Hit Enter...">
                                    <input type="hidden" value="movies" name="post_type" />
                            </form>
                            <button id="searchClose" class="search-close" type="submit"><i class="ti-close text-dark"></i></button>
                        </div>
                    </div>

                </div>
            </nav>
        </div>
    </header>
    <!-- /navigation -->
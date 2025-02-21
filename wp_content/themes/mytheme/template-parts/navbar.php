<?php
/**
 * The navbar for our theme
 *
 * @package mytheme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary">
        <?php esc_html_e('Skip to content', 'mytheme'); ?>
    </a>

    <header id="navbar" class="navbar">
        <div class="navbar-container">
            <!-- Logo -->
            <div class="navbar-branding">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/logo-header.svg" alt="Clarity">
                </a>
            </div>

            <!-- Tombol Hamburger -->
            <button class="hamburger" onclick="toggleMenu()">&#9776;</button>

            <!-- Navigasi -->
            <nav id="navbar-menu" class="navbar-menu">
                <div class="menu-header">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/logo-header.svg" alt="Clarity">
                    </a>
                    <button class="close-menu" onclick="toggleMenu()">✖</button>
                </div>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary-menu',
                    'menu_class' => 'nav-list',
                    'container' => 'ul',
                ));
                ?>
            </nav>
        </div>
    </header>

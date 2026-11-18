<!DOCTYPE html>
<html lang="id" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<?php // WordPress title-tag support prints the document title. ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Karla:wght@400;500;700&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<svg class="defs" aria-hidden="true"><defs>
 <g id="fl"><g fill="#f3b6c5"><ellipse cy="-6" rx="3.6" ry="6.2"/><ellipse cy="-6" rx="3.6" ry="6.2" transform="rotate(72)"/><ellipse cy="-6" rx="3.6" ry="6.2" transform="rotate(144)"/><ellipse cy="-6" rx="3.6" ry="6.2" transform="rotate(216)"/><ellipse cy="-6" rx="3.6" ry="6.2" transform="rotate(288)"/></g><circle r="1.7" fill="#b83a58"/></g>
 <symbol id="bx" viewBox="0 0 76 60"><rect x="2" y="6" width="72" height="48" rx="8" fill="#2e130d"/><rect x="6" y="10" width="64" height="40" rx="5" fill="#5a2c20"/><circle cx="23" cy="30" r="14" fill="#faf5ec"/><circle cx="23" cy="30" r="2" fill="#d9b88f"/><rect x="41" y="12" width="27" height="17" rx="4" style="fill:var(--a,#c8742b)"/><rect x="41" y="31" width="13" height="17" rx="4" style="fill:var(--b,#7a9a3a)"/><circle cx="62" cy="40" r="7" style="fill:var(--c,#e9b84a)"/></symbol>
</defs></svg>

<div id="intro" role="presentation"><p>SAKURA BENTO</p></div>
<svg id="tree" class="tree" aria-hidden="true"></svg>
<div id="petals" aria-hidden="true"></div>

<header><nav class="w" aria-label="Utama">
 <a class="logo" href="<?php echo esc_url(home_url('/')); ?>"><svg viewBox="-12 -12 24 24"><use href="#fl" transform="scale(1.6)"/></svg>Sakura<br>Bento</a>
 <button id="bt" aria-expanded="false" aria-controls="nv">Menu</button>
 <ul id="nv">
  <li><a href="<?php echo esc_url(home_url('/')); ?>" data-r="home" class="<?php echo is_front_page() ? 'on' : ''; ?>">Home</a></li>
  <li><a href="<?php echo esc_url(home_url('/about')); ?>" data-r="about" class="<?php echo is_page('about') ? 'on' : ''; ?>">About Us</a></li>
  <li><a href="<?php echo esc_url(home_url('/menu')); ?>" data-r="menu" class="<?php echo (is_post_type_archive('menu_item') || is_singular('menu_item')) ? 'on' : ''; ?>">Menu</a></li>
  <li><a href="<?php echo esc_url(home_url('/contact')); ?>" data-r="contact" class="<?php echo is_page('contact') ? 'on' : ''; ?>">Contact</a></li>
 </ul>
</nav></header>
<main id="app">
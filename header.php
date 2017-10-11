<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
  	<meta charset="<?php bloginfo( 'charset' ); ?>">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
  	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
  	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  	<?php endif; ?>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <main id="wrapper">

      <div class="band top-bar">
  			<section class="layout">
  				<ul>
  				  <li>
              <a href="https://www.google.com/maps/dir/Current+Location/133+Worle+High+Street+BS226HQ" target="_blank">
                <address>
                  113 Worle High Street,
                  Weston-Super-Mare,
                  BS22 6HQ
    				    </address>
              </a>
  				  </li>
  				  <li class="phone-no">
  				    <p><a href="tel:0193 4752 005" target="_self">+44 (0) 193 4752 005</a></p>
  				  </li>
  				</ul>
  			</section>
  		</div>

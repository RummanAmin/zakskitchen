<?php get_header(); ?>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php get_template_part('content', 'intro'); ?>

    <div class="band main">
      <section class="layout">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php the_content(); ?></article>

      </section>
    </div>

    <?php endwhile; else : ?>

  	<div class="band main">
      <section class="layout">

  		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

  		</section>
    </div>

  <?php endif; ?>

<?php get_footer(); ?>

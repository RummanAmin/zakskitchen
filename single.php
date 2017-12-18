<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <?php get_template_part('content', 'background-intro'); ?>

  <div class="band main">
    <section class="layout">
      <div class="post-content move-right">

        <article class="post-split">
          <div class="post-info">
            <h4>By <?php the_author_link(''); ?> on <?php the_date('jS M o'); ?> from <?php the_category(' ')?></h4>
            <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FZaks-Indian-kitchen-298970490619022%2F&width=73&layout=button_count&action=like&size=small&show_faces=false&share=false&height=21&appId=311718075839853" width="73" height="21" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
          </div>
        </article>

        <article class="post-split">
          <div id="post-main"><?php the_content(); ?></div>
          <br>
          <p>Return to <a href="<?php echo esc_url( home_url() ) ?>">homepage</a></p>
          <div class="insert-post-ads">
            <?php get_template_part( 'content', 'ad' ); ?>
          </div>
          <?php get_template_part( 'content', 'share' ); ?>
        </article>

      </div>
    </section>
  </div>

  <div class="band blog">
    <section class="layout">
      <div class="section-heading"><h2>Latest News</h2>
      <p>Read about our latest offers, explore new recipes, find out about events and general updates from the team at Zaks Indian Kitchen</p></div>

      <div class="post-list">
        <?php
          $args = array(
          'post_type' => 'post',
          'post__not_in' => array($post->ID),
          'posts_per_page' => 3
          );
          $query = new WP_Query( $args );
          while ($query->have_posts()) : $query->the_post();
        ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="button">Read more</a>
          </article>
        <?php endwhile; wp_reset_postdata(); ?>
      </ul>
    </section>
  </div>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>

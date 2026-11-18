<?php get_header(); ?>
<div class="ban"><div class="w"><h1>Let's Explore the Menu</h1></div></div>

<section>
 <svg class="sprig l tree still" data-g="5" data-sp="14" aria-hidden="true"></svg>
 <div class="w z">
  <h2 class="c">Choose Your Fave!</h2>
    <div class="cats">
        <button data-go="c-bento"><svg viewBox="0 0 76 60"><use href="#bx"/></svg>Bento</button>
        <button data-go="c-donburi"><svg viewBox="0 0 76 60"><use href="#bx"/></svg>Donburi</button>
        <button data-go="c-others"><svg viewBox="0 0 76 60"><use href="#bx"/></svg>Others</button>
    </div>

  <?php
  $kategori = ['bento' => 'Bento Package', 'donburi' => 'Donburi', 'others' => 'Others'];
  foreach ($kategori as $slug => $label):
    echo '<h3 class="cat" id="c-'.$slug.'">'.$label.'</h3><div class="g3">';
    $q = new WP_Query([
      'post_type' => 'menu_item',
      'posts_per_page' => -1,
      'tax_query' => [[
        'taxonomy' => 'menu_kategori',
        'field' => 'slug',
        'terms' => $slug,
      ]],
    ]);
    if ($q->have_posts()):
      while ($q->have_posts()): $q->the_post();
        $harga = get_field('harga');
        $rating = get_field('rating');
        ?>
        <a class="card" href="<?php the_permalink(); ?>">
         <span class="rt">&#9733; <?php echo esc_html($rating); ?></span>
         <div class="ph"><?php the_post_thumbnail('medium'); ?></div>
         <h4><?php the_title(); ?></h4>
         <span>Rp<?php echo number_format((float)$harga, 0, ',', '.'); ?></span>
        </a>
        <?php
      endwhile;
    else:
      echo '<p style="color:var(--soft)">Belum ada menu di kategori ini.</p>';
    endif;
    wp_reset_postdata();
    echo '</div>';
  endforeach;
  ?>
 </div>
</section>
<?php get_footer(); ?>
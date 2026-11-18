<?php get_header(); ?>
<?php while (have_posts()): the_post();
  $harga = get_field('harga');
  $rating = get_field('rating');
  $waText = rawurlencode('Halo Sakura Bento, saya mau pesan '.get_the_title());
?>
<div class="crumb"><div class="w">
 <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> /
 <a href="<?php echo esc_url(home_url('/menu')); ?>">Menu</a> /
 <?php the_title(); ?>
</div></div>

<section>
 <svg class="sprig t tree still" data-g="5" data-sp="10" aria-hidden="true"></svg>
 <div class="w z"><div class="dt">
  <div class="ph"><?php the_post_thumbnail('large'); ?></div>
  <div>
   <h1><?php the_title(); ?></h1>
   <p style="color:var(--soft);margin-top:.6rem"><?php the_content(); ?></p>
   <div class="pr"><b>Rp<?php echo number_format((float)$harga, 0, ',', '.'); ?></b><span class="rt">&#9733; <?php echo esc_html($rating); ?></span></div>
   <a class="btn full" target="_blank" rel="noopener" href="https://wa.me/<?php echo SAKURA_WA; ?>?text=<?php echo $waText; ?>">Order this</a>
   <p class="or">or order from</p>
   <div class="ol">
    <a target="_blank" rel="noopener" href="https://gofood.co.id">GoFood<small>Gojek</small></a>
    <a target="_blank" rel="noopener" href="https://food.grab.com">GrabFood<small>Grab</small></a>
    <a target="_blank" rel="noopener" href="https://shopeefood.co.id">ShopeeFood<small>Shopee</small></a>
   </div>
  </div>
 </div>

 <h2 class="c" style="margin-top:3.5rem">Reviews</h2>
 <div class="g3 q sc3">
  <div class="bx"><b>Joseph (MRA)</b><div class="st">&#9733;&#9733;&#9733;&#9733;&#9733;</div><p>Chicken teriyaki-nya enak, sausnya pas dan nasinya hangat.</p></div>
  <div class="bx"><b>Dianti (ARS)</b><div class="st">&#9733;&#9733;&#9733;&#9733;&#9733;</div><p>Harganya masuk akal dan porsinya bikin kenyang sampai sore.</p></div>
  <div class="bx"><b>Lucky (MBP)</b><div class="st">&#9733;&#9733;&#9733;&#9733;&#9733;</div><p>Bumbunya terasa dan penjualnya ramah. Pasti balik lagi.</p></div>
 </div>

 <h2 class="c" style="margin-top:3.5rem">Other Menu Recommendation</h2>
 <div class="g3 q" style="grid-template-columns:repeat(3,1fr)">
  <?php
  $others = new WP_Query(['post_type'=>'menu_item','posts_per_page'=>3,'post__not_in'=>[get_the_ID()],'orderby'=>'rand']);
  while ($others->have_posts()): $others->the_post();
    $h2 = get_field('harga'); $r2 = get_field('rating');
    ?>
    <a class="card" href="<?php the_permalink(); ?>">
     <span class="rt">&#9733; <?php echo esc_html($r2); ?></span>
     <div class="ph"><?php the_post_thumbnail('medium'); ?></div>
     <h4><?php the_title(); ?></h4>
     <span>Rp<?php echo number_format((float)$h2,0,',','.'); ?></span>
    </a>
    <?php
  endwhile; wp_reset_postdata();
  ?>
 </div>
 </div>
</section>
<?php endwhile; get_footer(); ?>
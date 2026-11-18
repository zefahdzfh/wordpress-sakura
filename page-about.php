<?php get_header(); ?>
<div class="ban"><div class="w"><h1><?php the_title(); ?></h1></div></div>

<?php while (have_posts()): the_post(); ?>
<section>
 <svg class="sprig l tree still" data-g="5" data-sp="16" aria-hidden="true"></svg>
 <div class="w z"><div class="row">
  <div><?php the_content(); ?></div>
  <div class="ph" data-sp="9"><svg aria-hidden="true" viewBox="0 0 76 60" style="--a:#e08a4a;--b:#f0c987;--c:#7a9a3a"><use href="#bx"/></svg><small>foto menu</small></div>
 </div></div>
</section>
<?php endwhile; ?>

<section><div class="w z"><h2 class="c">What Makes Us Special</h2>
 <div class="g3 sc3">
  <div class="bx sc"><svg viewBox="0 0 76 60"><use href="#bx"/></svg><h4>Delicious &amp; Affordable</h4><p>Rasa enak dengan harga bersahabat untuk mahasiswa.</p></div>
  <div class="bx sc"><svg viewBox="-20 -20 40 40"><circle r="16" fill="#6b0f14"/><use href="#fl" transform="scale(1.6)"/></svg><h4>Made for Your Day</h4><p>Disiapkan segar setiap hari untuk menemani aktivitasmu.</p></div>
  <div class="bx sc"><svg viewBox="0 0 80 80"><circle cx="40" cy="26" r="13" fill="#e9b88f"/><path d="M14 74c2-22 14-30 26-30s24 8 26 30z" fill="#6b0f14"/></svg><h4>Friendly &amp; Fresh</h4><p>Pelayanan ramah dan terbuka terhadap masukan.</p></div>
 </div>
</div></section>
<?php get_footer(); ?>
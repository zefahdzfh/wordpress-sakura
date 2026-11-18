<?php get_header(); ?>
<div class="ban"><div class="w"><h1>Contact Us</h1></div></div>

<section>
 <svg class="sprig r tree still" data-g="5" data-sp="-14" aria-hidden="true"></svg>
 <div class="w z">
  <h2 class="c">Message Form</h2>
  <form id="f" class="fm" novalidate>
   <div class="L">
    <label>Subject<input id="fs" placeholder="Judul pesan"></label>
    <label>Name<input id="fn" autocomplete="name" placeholder="Nama kamu"><span class="err" id="e1"></span></label>
    <label>Email<input id="fe" type="email" autocomplete="email" placeholder="email@contoh.com"></label>
    <label>Phone<input id="fp" type="tel" autocomplete="tel" placeholder="08xxxxxxxxxx"></label>
   </div>
   <label>Message<textarea id="fm" placeholder="Tulis pesanmu di sini"></textarea><span class="err" id="e2"></span></label>
   <button class="btn" type="submit">Send via WhatsApp</button>
  </form>

  <h2 class="c" style="margin:3rem 0 1.4rem;font-size:1.4rem">Or Find Us</h2>
  <a class="wa" target="_blank" rel="noopener" href="https://wa.me/<?php echo SAKURA_WA; ?>">Chat us on WhatsApp</a>

  <h2 class="c" style="margin:3rem 0 1.4rem">Google Maps</h2>
  <div class="map">
   <svg viewBox="0 0 400 200" preserveAspectRatio="none" aria-hidden="true"><path d="M0 130 L400 70 M120 0 L170 200 M260 0 L230 200 M0 40 L400 160" stroke="#d3c7ae" stroke-width="9" fill="none"/><path d="M0 130 L400 70" stroke="#fff" stroke-width="3" fill="none"/></svg>
   <a class="btn" target="_blank" rel="noopener" href="https://www.google.com/maps/search/?api=1&query=Kantin+Vokasi+Universitas+Indonesia">Open Kantin Vokasi in Maps</a>
  </div>
  <p style="text-align:center;margin-top:1rem;font-weight:500">Map Kantin Vokasi</p>
 </div>
</section>
<?php get_footer(); ?>
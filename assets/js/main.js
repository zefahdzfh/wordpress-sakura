const WA = window.sakuraData?.wa || "6281234567890";
const NS = "http://www.w3.org/2000/svg", $ = s => document.querySelector(s), app = $("#app");
const reduce = matchMedia("(prefers-reduced-motion:reduce)").matches;
const fine = matchMedia("(hover:hover) and (pointer:fine)").matches && !reduce;
const P = [["M150 500C150 430 172 380 160 320C152 270 185 230 215 180", 8], ["M162 340C210 320 250 300 310 250C335 230 355 200 372 160", 4.5], ["M158 300C120 280 90 250 55 200C40 180 30 150 28 120", 4.5], ["M205 200C230 170 240 130 262 95C272 78 290 60 300 40", 3.5], ["M300 262C320 270 345 268 380 250", 2.5], ["M100 238C85 215 90 190 70 160", 2.5], ["M240 130C270 128 295 118 320 100", 2.5], ["M175 252C150 235 150 205 130 185", 2.5]];
function grow(svg, anim, n) {
  svg.setAttribute("viewBox", "-20 -10 440 520"); let s = 11; const r = () => (s = s * 16807 % 2147483647) / 2147483647;
  const ps = P.map(([d, w], i) => { const p = document.createElementNS(NS, "path"); p.setAttribute("d", d); p.setAttribute("pathLength", 1); p.setAttribute("class", "br"); p.style.strokeWidth = w; if (anim) p.style.setProperty("--d", (i ? .8 + i * .28 : 0) + "s"); svg.append(p); return p });
  ps.forEach((p, i) => {
    const L = p.getTotalLength(), c = i ? n : Math.round(n * .6);
    for (let j = 0; j < c; j++) {
      const t = (i ? .25 : .55) + (i ? .75 : .45) * (j + r() * .6) / c, q = p.getPointAtLength(Math.min(t, 1) * L), g = document.createElementNS(NS, "g");
      g.setAttribute("transform", `translate(${q.x + (r() - .5) * 16} ${q.y + (r() - .5) * 16}) rotate(${r() * 72 | 0})`);
      const u = document.createElementNS(NS, "use"); u.setAttribute("href", "#fl"); u.setAttribute("class", "bl");
      u.style.setProperty("--s", (.8 + r() * .9).toFixed(2)); u.style.setProperty("--d", (anim ? 1.7 + i * .2 + t * 1.4 + r() * .5 : 0) + "s"); g.append(u); svg.append(g)
    }
  })
}

/* data */

const rp = n => "Rp" + n.toLocaleString("id-ID");
const img = (k, cls = "", sp = "") => `<div class="ph ${cls}"${sp ? ` data-sp="${sp}"` : ""}><svg aria-hidden="true" viewBox="0 0 76 60" style="--a:${k[0]};--b:${k[1]};--c:${k[2]}"><use href="#bx"/></svg><small>foto menu</small></div>`;
const card = m => `<a class="card" href="#/menu/${m.s}"><span class="rt">&#9733; ${m.r}</span>${img(m.k)}<h4>${m.n}</h4><span>${rp(m.p)}</span></a>`;
const rev = [["Joseph (MRA)", "Chicken teriyaki-nya enak, sausnya pas dan nasinya hangat."], ["Dianti (ARS)", "Harganya masuk akal dan porsinya bikin kenyang sampai sore."], ["Lucky (MBP)", "Bumbunya terasa dan penjualnya ramah. Pasti balik lagi."]];
const stars = "&#9733;&#9733;&#9733;&#9733;&#9733;";
const revs = () => `<div class="g3 q sc3">${rev.map(r => `<div class="bx"><b>${r[0]}</b><div class="st">${stars}</div><p>${r[1]}</p></div>`).join("")}</div>`;
const ban = (t, c = "", extra = "") => `<div class="ban ${c}"><div class="w"><h1>${t}</h1>${extra}</div></div>`;

/* pages */

/* scroll reveal */
const io = new IntersectionObserver(es => es.forEach(en => { if (en.isIntersecting) { en.target.classList.add("in"); io.unobserve(en.target) } }), { threshold: .15, rootMargin: "0px 0px -8% 0px" });
function initReveal(root) {
  root.querySelectorAll(".row,.bx,.card,.sc,h2.c,.dt,.map,.fm,.wa").forEach((el, i) => {
    el.classList.add("reveal", "r" + ((i % 4) + 1));
    if (reduce) el.classList.add("in"); else io.observe(el)
  })
}

/* parallax + sticky header shade */
function onScroll() {
  document.querySelectorAll("[data-sp]").forEach(el => {
    const sp = parseFloat(el.dataset.sp), r = el.getBoundingClientRect(), vh = innerHeight || document.documentElement.clientHeight;
    const prog = (vh - r.top) / (vh + r.height);
    el.style.transform = `translate3d(0,${((prog - .5) * sp).toFixed(1)}px,0)`
  });
  const hd = $("header"); if (hd) hd.classList.toggle("sc", scrollY > 40)
}
let tking = false;
if (!reduce) addEventListener("scroll", () => { if (!tking) { requestAnimationFrame(() => { onScroll(); tking = false }); tking = true } }, { passive: true });

/* custom cursor + magnetic buttons + tilt (fine pointers only) */
if (fine) {
  const cur = document.createElement("div"); cur.id = "cur"; document.body.append(cur);
  addEventListener("pointermove", e => {
    cur.style.left = e.clientX + "px"; cur.style.top = e.clientY + "px";
    const b = e.target.closest?.(".btn");
    if (b) { const r = b.getBoundingClientRect(); b.style.transform = `translate(${((e.clientX - r.left) / r.width - .5) * 16}px,${((e.clientY - r.top) / r.height - .5) * 16}px)` }
    const p = e.target.closest?.(".ph:not([data-sp])");
    if (p) { const r = p.getBoundingClientRect(); const rx = ((e.clientY - r.top) / r.height - .5) * -9, ry = ((e.clientX - r.left) / r.width - .5) * 9; p.style.transform = `perspective(700px) rotateX(${rx}deg) rotateY(${ry}deg) scale(1.03)` }
  });
  document.addEventListener("pointerover", e => { if (e.target.closest?.("a,button,.btn,.card,.cats button")) cur.classList.add("big") });
  document.addEventListener("pointerout", e => {
    const t = e.target.closest?.("a,button,.btn,.card,.cats button");
    if (t && !t.contains(e.relatedTarget)) cur.classList.remove("big");
    const b = e.target.closest?.(".btn"); if (b && !b.contains(e.relatedTarget)) b.style.transform = "";
    const p = e.target.closest?.(".ph:not([data-sp])"); if (p && !p.contains(e.relatedTarget)) p.style.transform = ""
  })
}

/* router */
let first = true;

const bt = $("#bt"), nv = $("#nv");
bt.onclick = () => { const o = nv.classList.toggle("open"); bt.setAttribute("aria-expanded", o) };document.addEventListener("DOMContentLoaded",()=>{
  document.querySelectorAll("svg[data-g]").forEach(s=>grow(s,false,+s.dataset.g));
  initReveal(document.body);
  onScroll();
  document.querySelectorAll("[data-go]").forEach(b=>b.onclick=()=>document.getElementById(b.dataset.go).scrollIntoView({behavior:"smooth"}));
});

/* petals */
const pt = $("#petals");
for (let i = 0; i < 16; i++) { const e = document.createElement("i"), st = e.style; st.setProperty("--x", (Math.random() * 100).toFixed(1) + "%"); st.setProperty("--z", (9 + Math.random() * 10 | 0) + "px"); st.setProperty("--t", (11 + Math.random() * 10).toFixed(1) + "s"); st.setProperty("--w", (-Math.random() * 20).toFixed(1) + "s"); st.setProperty("--s", ((Math.random() - .3) * 160 | 0) + "px"); pt.append(e) }

/* intro */
const tree = $("#tree"), intro = $("#intro"), root = document.documentElement;
function settle() {
  const sl = $("#slot");
  if (sl) { tree.className = "tree still"; tree.removeAttribute("style"); sl.append(tree) } else tree.remove();
  root.style.overflow = ""; document.body.classList.add("ready"); intro.remove()
}
if (reduce) { grow(tree, false, 9); settle() }
else {
  grow(tree, true, 9); root.style.overflow = "hidden"; let done = false;
  const finish = () => {
    if (done) return; done = true; const sl = $("#slot"), a = tree.getBoundingClientRect();
    Object.assign(tree.style, { left: a.left + "px", top: a.top + "px", width: a.width + "px", height: a.height + "px", transform: "none" });
    tree.getBoundingClientRect(); tree.classList.add("go");
    if (sl) { const b = sl.getBoundingClientRect(); tree.style.transform = `translate(${b.left - a.left}px,${b.top - a.top}px) scale(${b.width / a.width})` }
    else tree.style.opacity = 0;
    intro.classList.add("out"); setTimeout(settle, 1550)
  };
  setTimeout(finish, 5600); intro.onclick = finish
}

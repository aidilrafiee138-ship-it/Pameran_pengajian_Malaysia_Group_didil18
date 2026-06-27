/* ===== ANIMATED BACKGROUND (Batik Motifs) ===== */
(function(){
  const c = document.getElementById('bg-canvas'), ctx = c.getContext('2d');
  let W, H;
  function resize(){ W = c.width = window.innerWidth; H = c.height = window.innerHeight; }
  resize(); window.addEventListener('resize', resize);
  
  const COLS = ['rgba(200,151,58,', 'rgba(26,122,74,', 'rgba(192,57,43,', 'rgba(100,140,220,'];
  const dots = Array.from({length: 40}, () => ({
    x: Math.random() * window.innerWidth, y: Math.random() * window.innerHeight,
    r: Math.random() * 2.2 + 0.7, dx: (Math.random() - .5) * .28, dy: (Math.random() - .5) * .28,
    col: COLS[Math.floor(Math.random() * 4)], a: Math.random() * .4 + .1
  }));
  const motifs = Array.from({length: 8}, () => ({
    x: Math.random() * window.innerWidth, y: Math.random() * window.innerHeight,
    s: Math.random() * 55 + 25, rot: Math.random() * Math.PI,
    drot: (Math.random() - .5) * .003, dx: (Math.random() - .5) * .14, dy: (Math.random() - .5) * .14,
    col: COLS[Math.floor(Math.random() * 4)], a: Math.random() * .05 + .02,
    t: Math.floor(Math.random() * 3)
  }));
  
  function diamond(x, y, s, r, col, a){
    ctx.save(); ctx.translate(x, y); ctx.rotate(r);
    ctx.beginPath(); ctx.moveTo(0, -s); ctx.lineTo(s * .55, 0); ctx.lineTo(0, s); ctx.lineTo(-s * .55, 0); ctx.closePath();
    ctx.strokeStyle = col + a + ')'; ctx.lineWidth = 1; ctx.stroke();
    ctx.beginPath(); ctx.moveTo(0, -s * .5); ctx.lineTo(s * .27, 0); ctx.lineTo(0, s * .5); ctx.lineTo(-s * .27, 0); ctx.closePath();
    ctx.stroke(); ctx.restore();
  }
  function ring(x, y, s, col, a){
    ctx.beginPath(); ctx.arc(x, y, s, 0, Math.PI * 2); ctx.strokeStyle = col + a + ')'; ctx.lineWidth = .8; ctx.stroke();
    ctx.beginPath(); ctx.arc(x, y, s * .6, 0, Math.PI * 2); ctx.strokeStyle = col + (a * .5) + ')'; ctx.stroke();
  }
  function floral(x, y, s, r, col, a){
    ctx.save(); ctx.translate(x, y); ctx.rotate(r);
    for(let i = 0; i < 6; i++){
      ctx.rotate(Math.PI / 3); ctx.beginPath(); ctx.ellipse(0, -s * .55, s * .18, s * .38, 0, 0, Math.PI * 2);
      ctx.strokeStyle = col + a + ')'; ctx.lineWidth = .7; ctx.stroke();
    }
    ctx.restore();
  }
  function frame(){
    ctx.clearRect(0, 0, W, H);
    const g = ctx.createRadialGradient(W / 2, -80, 50, W / 2, -80, H * .7);
    g.addColorStop(0, 'rgba(13,33,68,.5)'); g.addColorStop(1, 'rgba(0,0,0,0)');
    ctx.fillStyle = g; ctx.fillRect(0, 0, W, H);
    
    dots.forEach(p => {
      ctx.beginPath(); ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2); ctx.fillStyle = p.col + p.a + ')'; ctx.fill();
      p.x += p.dx; p.y += p.dy;
      if(p.x < 0) p.x = W; if(p.x > W) p.x = 0; if(p.y < 0) p.y = H; if(p.y > H) p.y = 0;
    });
    motifs.forEach(m => {
      if(m.t === 0) diamond(m.x, m.y, m.s, m.rot, m.col, m.a);
      else if(m.t === 1) ring(m.x, m.y, m.s, m.col, m.a);
      else floral(m.x, m.y, m.s, m.rot, m.col, m.a);
      m.x += m.dx; m.y += m.dy; m.rot += m.drot;
      if(m.x < -m.s) m.x = W + m.s; if(m.x > W + m.s) m.x = -m.s;
      if(m.y < -m.s) m.y = H + m.s; if(m.y > H + m.s) m.y = -m.s;
    });
    requestAnimationFrame(frame);
  }
  frame();
})();

/* ===== SECTION NAV ===== */
function showSection(id){
  document.querySelectorAll('.content-section').forEach(s => s.classList.remove('active'));
  document.querySelectorAll('.nav-btn').forEach(b => b.classList.remove('active'));
  const s = document.getElementById(id), b = document.getElementById('btn-' + id);
  if(s) s.classList.add('active');
  if(b) b.classList.add('active');
  if(s) s.scrollIntoView({behavior: 'smooth', block: 'start'});
}

/* ===== QUIZ (TRIVIA) ===== */
function semakJawapan(btn, isCorrect){
  const opts = btn.parentElement.querySelectorAll('.quiz-opt');
  opts.forEach(o => o.disabled = true);
  btn.classList.add(isCorrect ? 'correct' : 'wrong');
  if(!isCorrect){
    opts.forEach(o => {
      if(o.getAttribute('onclick') && o.getAttribute('onclick').includes('true')) o.classList.add('correct');
    });
  }
}

function resetTrivia() {
  const allOpts = document.querySelectorAll('.quiz-opt');
  allOpts.forEach(o => {
    o.disabled = false;
    o.classList.remove('correct', 'wrong');
  });
}

/* ===== STUDIO MUZIK ===== */
const INST_LABELS = {kompang: 'Melayu', gendang: 'Cina', sitar: 'India', sape: 'Borneo'};
function playInstrument(name, card){
  card.classList.toggle('playing');
  const sub = card.querySelector('.inst-sub');
  sub.textContent = card.classList.contains('playing') ? '▶ Bermain...' : INST_LABELS[name];
}
/* ===== 1. LOGIK ANIMASI LATAR BELAKANG (CANVAS BATIK MOTIF) ===== */
(function(){
  const canvas = document.getElementById('bg-canvas');
  const ctx = canvas.getContext('2d');
  let W, H;
  
  function kemaskiniSaiz(){ 
      W = canvas.width = window.innerWidth; 
      H = canvas.height = window.innerHeight; 
  }
  kemaskiniSaiz(); 
  window.addEventListener('resize', kemaskiniSaiz);
  
  const SKEMA_WARNA = ['rgba(200,151,58,', 'rgba(26,122,74,', 'rgba(192,57,43,', 'rgba(100,140,220,'];
  
  // Data zarah habuk bersinar
  const zarah = Array.from({length: 40}, () => ({
    x: Math.random() * window.innerWidth, 
    y: Math.random() * window.innerHeight,
    r: Math.random() * 2.2 + 0.7, 
    dx: (Math.random() - .5) * .25, 
    dy: (Math.random() - .5) * .25,
    col: SKEMA_WARNA[Math.floor(Math.random() * 4)], 
    a: Math.random() * .4 + .1
  }));
  
  // Data bentuk lukisan abstrak motif sarawak/melayu
  const motifSeni = Array.from({length: 7}, () => ({
    x: Math.random() * window.innerWidth, 
    y: Math.random() * window.innerHeight,
    s: Math.random() * 50 + 25, 
    rot: Math.random() * Math.PI,
    drot: (Math.random() - .5) * .002, 
    dx: (Math.random() - .5) * .12, 
    dy: (Math.random() - .5) * .12,
    col: SKEMA_WARNA[Math.floor(Math.random() * 4)], 
    a: Math.random() * .06 + .02,
    jenis: Math.floor(Math.random() * 3)
  }));
  
  function lukisIntan(x, y, s, r, col, a){
    ctx.save(); ctx.translate(x, y); ctx.rotate(r);
    ctx.beginPath(); ctx.moveTo(0, -s); ctx.lineTo(s * .55, 0); ctx.lineTo(0, s); ctx.lineTo(-s * .55, 0); ctx.closePath();
    ctx.strokeStyle = col + a + ')'; ctx.lineWidth = 1; ctx.stroke();
    ctx.restore();
  }
  function lukisBulatan(x, y, s, col, a){
    ctx.beginPath(); ctx.arc(x, y, s, 0, Math.PI * 2); ctx.strokeStyle = col + a + ')'; ctx.lineWidth = .8; ctx.stroke();
  }
  function lukisBunga(x, y, s, r, col, a){
    ctx.save(); ctx.translate(x, y); ctx.rotate(r);
    for(let i = 0; i < 6; i++){
      ctx.rotate(Math.PI / 3); ctx.beginPath(); ctx.ellipse(0, -s * .55, s * .16, s * .36, 0, 0, Math.PI * 2);
      ctx.strokeStyle = col + a + ')'; ctx.lineWidth = .7; ctx.stroke();
    }
    ctx.restore();
  }
  
  function mainkanAnimasi(){
    ctx.clearRect(0, 0, W, H);
    
    // Kesan pencahayaan atas
    const gradasi = ctx.createRadialGradient(W / 2, -60, 50, W / 2, -60, H * .7);
    gradasi.addColorStop(0, 'rgba(13,33,68,.4)'); 
    gradasi.addColorStop(1, 'rgba(0,0,0,0)');
    ctx.fillStyle = gradasi; ctx.fillRect(0, 0, W, H);
    
    // Pergerakan zarah habuk
    zarah.forEach(p => {
      ctx.beginPath(); ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2); ctx.fillStyle = p.col + p.a + ')'; ctx.fill();
      p.x += p.dx; p.y += p.dy;
      if(p.x < 0) p.x = W; if(p.x > W) p.x = 0; if(p.y < 0) p.y = H; if(p.y > H) p.y = 0;
    });
    
    // Pergerakan bentuk seni
    motifSeni.forEach(m => {
      if(m.jenis === 0) lukisIntan(m.x, m.y, m.s, m.rot, m.col, m.a);
      else if(m.jenis === 1) lukisBulatan(m.x, m.y, m.s, m.col, m.a);
      else lukisBunga(m.x, m.y, m.s, m.rot, m.col, m.a);
      m.x += m.dx; m.y += m.dy; m.rot += m.drot;
      if(m.x < -m.s) m.x = W + m.s; if(m.x > W + m.s) m.x = -m.s;
      if(m.y < -m.s) m.y = H + m.s; if(m.y > H + m.s) m.y = -m.s;
    });
    requestAnimationFrame(mainkanAnimasi);
  }
  mainkanAnimasi();
})();

/* ===== 2. KAWALAN PERTUKARAN HALAMAN (TAB SHIFT) ===== */
function showSection(id){
  document.querySelectorAll('.content-section').forEach(sec => sec.classList.remove('active'));
  document.querySelectorAll('.nav-btn').forEach(btn => btn.classList.remove('active'));
  
  const sasaranSeksyen = document.getElementById(id);
  const sasaranButang = document.getElementById('btn-' + id);
  
  if(sasaranSeksyen) sasaranSeksyen.classList.add('active');
  if(sasaranButang) sasaranButang.classList.add('active');
  
  if(sasaranSeksyen) {
      sasaranSeksyen.scrollIntoView({behavior: 'smooth', block: 'start'});
  }
}

/* ===== 3. SEMAKAN KUIZ TRIVIA JAVASCRIPT ===== */
function semakJawapan(btn, betulAtauSalah){
  const pilihanButang = btn.parentElement.querySelectorAll('.quiz-opt');
  pilihanButang.forEach(opt => opt.disabled = true); // Kunci butang selepas pilih
  
  if(betulAtauSalah){
    btn.classList.add('correct');
  } else {
    btn.classList.add('wrong');
    // Tunjukkan jawapan yang betul secara automatik untuk bantu pengguna belajar
    pilihanButang.forEach(opt => {
      if(opt.getAttribute('onclick') && opt.getAttribute('onclick').includes('true')) {
          opt.classList.add('correct');
      }
    });
  }
}

function setSemulaKuiz() {
  const semuaButangPilihan = document.querySelectorAll('.quiz-opt');
  semuaButangPilihan.forEach(opt => {
    opt.disabled = false;
    opt.classList.remove('correct', 'wrong');
  });
}

/* ===== 4. KESAN INTERAKTIF KLIK ALAT MUZIK SIMBOLIK ===== */
const NAMA_ASLI_ETNIK = {kompang: 'Kaum Melayu', gendang: 'Kaum Cina', sitar: 'Kaum India', sape: 'Borneo (Suku Orang Ulu)'};
function tekanAlatMuzik(idMuzik, elemenKad){
  elemenKad.classList.toggle('playing');
  const teksSub = elemenKad.querySelector('.inst-sub');
  
  if(elemenKad.classList.contains('playing')){
      teksSub.textContent = '▶ Ritma Rentak Aktif...';
  } else {
      teksSub.textContent = NAMA_ASLI_ETNIK[idMuzik];
  }
}
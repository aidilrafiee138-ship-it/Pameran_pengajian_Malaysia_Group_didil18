// ==========================================================================
// 🏛️ LOGIK NAVIGASI MENU UTAMA
// ==========================================================================
function showSection(sectionId) {
  // Ambil semua elemen bahagian kandungan
  const sections = document.querySelectorAll('.content-section');
  sections.forEach(section => {
    section.classList.remove('active');
  });

  // Ambil semua butang navigasi
  const buttons = document.querySelectorAll('.nav-btn');
  buttons.forEach(btn => {
    btn.classList.remove('active');
  });

  // Aktifkan bahagian dan butang yang dipilih
  document.getElementById(sectionId).classList.add('active');
  document.getElementById('btn-' + sectionId).classList.add('active');
}

// ==========================================================================
// 🥁 LOGIK POPUP VIDEO ALAT MUZIK (YOUTUBE EMBED)
// ==========================================================================
const youtubeVideos = {
  'kompang': 'https://www.youtube.com/embed/0o0EerG7rfQ?si=zjUPemM-iuu8Bhf6A',       
  'gendang': 'https://www.youtube.com/embed/iE6-U6QaYcI?si=AXTagGgb1AGOKTPU',       
  'sitar': 'https://www.youtube.com/embed/yNoYpgIA0NA?si=An-lIUY58xFDEvay',         
  'sape': 'https://www.youtube.com/embed/79tuVGgQ_Uw?si=ZjH_OEpzC5YJIK24'           
};

function tekanAlatMuzik(jenis, element) {
  // Efek gema/denyutan visual pada kad ketika diklik
  element.classList.add('pulse-animation');
  setTimeout(() => element.classList.remove('pulse-animation'), 500);

  // Ambil data modal elemen
  const videoUrl = youtubeVideos[jenis];
  const modal = document.getElementById('videoModal');
  const player = document.getElementById('youtubePlayer');

  if (videoUrl && modal && player) {
    player.src = videoUrl + "?autoplay=1"; // Aktifkan fungsi autoplay automatik
    modal.style.display = "flex";
  }
}

function tutupModalVideo() {
  const modal = document.getElementById('videoModal');
  const player = document.getElementById('youtubePlayer');
  
  if (modal && player) {
    modal.style.display = "none";
    player.src = ""; // Padam URL bagi memberhentikan audio di latar belakang
  }
}

// Tutup tetingkap secara automatik jika pembaca klik di luar frame video
window.onclick = function(event) {
  const modal = document.getElementById('videoModal');
  if (event.target == modal) {
    tutupModalVideo();
  }
}

// ==========================================================================
// 🎮 LOGIK SEMAKAN KUIZ INTERAKTIF
// ==========================================================================
function semakJawapan(butang, adakahBetul) {
  // Dapatkan semua butang pilihan dalam satu kumpulan soalan yang sama
  const parentOpts = butang.parentElement;
  const allOpts = parentOpts.querySelectorAll('.quiz-opt');

  // Matikan butang lain selepas pilihan dibuat untuk elak klik berganda
  allOpts.forEach(opt => {
    opt.disabled = true;
    opt.style.opacity = "0.6";
  });

  // Tanda warna berdasarkan ketepatan jawapan
  if (adakahBetul) {
    butang.style.background = "#2ecc71"; // Hijau jika betul
    butang.style.color = "#ffffff";
    butang.style.opacity = "1";
    butang.innerText += "  (Betul! 🎉)";
  } else {
    butang.style.background = "#e74c3c"; // Merah jika salah
    butang.style.color = "#ffffff";
    butang.style.opacity = "1";
    butang.innerText += "  (Salah ❌)";
  }
}

// ==========================================================================
// 🎨 ANIMASI LATAR BELAKANG CANVAS (KOD ASAS)
// ==========================================================================
const canvas = document.getElementById('bg-canvas');
if (canvas) {
  const ctx = canvas.getContext('2d');
  function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  }
  window.addEventListener('resize', resizeCanvas);
  resizeCanvas();

  // Animasi bentuk geometri abstrak ringkas secara terapung
  let particles = [];
  for(let i=0; i<15; i++) {
    particles.push({
      x: Math.random() * canvas.width,
      y: Math.random() * canvas.height,
      radius: Math.random() * 4 + 1,
      speedY: Math.random() * 0.5 + 0.2
    });
  }

  function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.fillStyle = "rgba(212, 175, 55, 0.15)"; // Sentuhan debu emas halus
    particles.forEach(p => {
      ctx.beginPath();
      ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
      ctx.fill();
      p.y -= p.speedY;
      if (p.y < -10) p.y = canvas.height + 10;
    });
    requestAnimationFrame(animate);
  }
  animate();
}

// ==========================================================================
// 🔄 LOGIK RESET KUIZ (KEMBALI KE ASAL SECARA TOTAL)
// ==========================================================================
function setSemulaKuiz() {
  // 1. Tulis semula senarai teks pilihan jawapan asal secara tepat
  const teksAsal = [
    "A) Kayu Meranti",
    "B) Kayu HALBAN",
    "C) Kayu Pokok Labu",
    "A) 100 Hari",
    "B) 40 Hari",
    "C) 1 Tahun tanpa pengecualian"
  ];

  // 2. Ambil semua butang pilihan kuiz yang ada pada skrin
  const semuaButang = document.querySelectorAll('.quiz-opt');

  semuaButang.forEach((butang, indeks) => {
    // Aktifkan semula butang yang dikunci
    butang.disabled = false;
    
    // Padamkan warna merah / hijau dan kembalikan gaya asal CSS
    butang.style.background = ""; 
    butang.style.color = "";
    butang.style.opacity = "1";

    // Masukkan semula teks asal yang bersih tanpa perkataan (Betul!) atau (Salah!)
    if (teksAsal[indeks]) {
      butang.innerText = teksAsal[indeks];
    }
  });
}

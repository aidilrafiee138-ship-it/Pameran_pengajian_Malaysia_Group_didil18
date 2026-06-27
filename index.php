<!DOCTYPE html>
<html lang="ms">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sinfoni Kepelbagaian: Wajah Perpaduan Malaysia</title>
<!-- Pautan ke Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<!-- Pautan ke fail CSS luaran -->
<link rel="stylesheet" href="style.css">
</head>
<body>
<canvas id="bg-canvas"></canvas>

<header>
  <div class="badge">Projek Pengajian Malaysia DUA20062</div>
  <h1>Sinfoni <span>Kepelbagaian</span><br>Wajah Perpaduan Malaysia</h1>
  <p>Bahan Pameran Interaktif Merentas Perayaan, Seni, dan Budaya</p>
</header>

<div class="container">
  <nav class="nav-menu">
    <button class="nav-btn active" id="btn-perayaan" onclick="showSection('perayaan')">🗓️ Perayaan</button>
    <button class="nav-btn" id="btn-pakaian"  onclick="showSection('pakaian')">👕 Pakaian</button>
    <button class="nav-btn" id="btn-muzik"    onclick="showSection('muzik')">🎵 Studio Muzik</button>
    <button class="nav-btn" id="btn-makanan"  onclick="showSection('makanan')">🍲 Makanan</button>
    <button class="nav-btn" id="btn-trivia"   onclick="showSection('trivia')">🎮 Trivia</button>
    <button class="nav-btn" id="btn-Feedback"   onclick="window.location.href='interaktif.php'">✉️ Feedback</button>
  </nav>

  <!-- PERAYAAN -->
  <div id="perayaan" class="content-section active">
    <div class="section-header">
      <h2>🗓️ Kalendar Perayaan &amp; Definisi</h2>
      <p>Mengenal pelbagai perayaan kaum yang memperkaya warisan Malaysia</p>
    </div>
    <div class="exhibit-grid">
      <div class="exhibit-card">
        <div class="exhibit-ph">🌙</div>
        <div class="exhibit-body">
          <h4>Hari Raya Aidilfitri (Kaum Melayu)</h4>
          <p>Disambut umat Islam menandakan kemenangan setelah sebulan berpuasa. Simbol kemaafan dan ikatan silaturahim sesama jiran tetangga.</p>
        </div>
      </div>
      <div class="exhibit-card">
        <div class="exhibit-ph">🏮</div>
        <div class="exhibit-body">
          <h4>Tahun Baru Cina (Kaum Cina)</h4>
          <p>Perayaan terpenting orang Cina menyambut tahun baru dalam kalendar lunar. Terkenal dengan tradisi makan besar keluarga dan pemberian angpao.</p>
        </div>
      </div>
      <div class="exhibit-card">
        <div class="exhibit-ph">🪔</div>
        <div class="exhibit-body">
          <h4>Deepavali (Kaum India)</h4>
          <p>'Pesta Cahaya' — melambangkan kemenangan kebaikan ke over kejahatan. Rumah dihiasi lampu pelita dan 'kolam' berwarna-warni yang memukau.</p>
        </div>
      </div>
      <div class="exhibit-card">
        <div class="exhibit-ph">🌾</div>
        <div class="exhibit-body">
          <h4>Hari Gawai &amp; Pesta Kaamatan</h4>
          <p>Perayaan menuai padi sebagai tanda kesyukuran. Menyatukan pelbagai suku kaum peribumi Borneo melalui tarian dan makanan tradisional.</p>
        </div>
      </div>
    </div>
    <div class="harmony-note">
      <strong>💡 Nilai Perpaduan:</strong> Sistem cuti umum negara yang meraikan semua perayaan besar adalah bukti nyata falsafah "Rumah Terbuka" Malaysia yang unik di dunia.
    </div>
  </div>

  <!-- PAKAIAN -->
  <div id="pakaian" class="content-section">
    <div class="section-header">
      <h2>👕 Galeri Pakaian Tradisional</h2>
      <p>Keindahan busana kaum yang mencerminkan identiti dan warisan</p>
    </div>
    <div class="exhibit-grid">
      <div class="exhibit-card">
        <div class="exhibit-ph">🎀</div>
        <div class="exhibit-body">
          <h4>Baju Melayu &amp; Baju Kurung</h4>
          <p>Pakaian tradisi kaum Melayu. Baju Melayu digandakan kain sampin, manakala Baju Kurung mengekalkan keanggunan yang sopan merentas perayaan.</p>
        </div>
      </div>
      <div class="exhibit-card">
        <div class="exhibit-ph">🐉</div>
        <div class="exhibit-body">
          <h4>Cheongsam &amp; Hanfu</h4>
          <p>Pakaian tradisional wanita Cina dengan kolar Mandarin. Diperbuat daripada kain sutera dengan motif flora atau naga melambangkan tuah.</p>
        </div>
      </div>
      <div class="exhibit-card">
        <div class="exhibit-ph">🌸</div>
        <div class="exhibit-body">
          <h4>Sari &amp; Dhoti</h4>
          <p>Sari — sehelai kain panjang dililit kemas pada badan wanita India, manakala lelaki memakai Dhoti. Kaya warna-warni yang memukau mata.</p>
        </div>
      </div>
      <div class="exhibit-card">
        <div class="exhibit-ph">🪩</div>
        <div class="exhibit-body">
          <h4>Pakaian Tradisi Borneo</h4>
          <p>Diperbuat dengan hiasan manik sarat dan corak tenunan asli. Melambangkan identiti unik warisan Kadazandusun dan Iban yang kekal terpelihara.</p>
        </div>
      </div>
    </div>
    <div class="harmony-note">
      <strong>💡 Fakta Menarik:</strong> Hari Kebangsaan menjadi platform di mana semua warga tampil dalam pakaian tradisional masing-masing — keindahan kepelbagaian dalam satu semangat.
    </div>
  </div>

  <!-- MUZIK -->
  <div id="muzik" class="content-section">
    <div class="section-header">
      <h2>🎵 Studio Muzik: Sinfoni Gabungan</h2>
      <p>Klik kad alat muzik untuk mengaktifkan rentak simbolik perpaduan</p>
    </div>
    <div class="instrument-grid">
      <div class="instrument-card" onclick="playInstrument('kompang',this)">
        <div class="inst-icon">🥁</div>
        <div class="inst-name">Kompang</div>
        <div class="inst-sub">Melayu</div>
      </div>
      <div class="instrument-card" onclick="playInstrument('gendang',this)">
        <div class="inst-icon">🎶</div>
        <div class="inst-name">Gendang Cina</div>
        <div class="inst-sub">Cina</div>
      </div>
      <div class="instrument-card" onclick="playInstrument('sitar',this)">
        <div class="inst-icon">🪕</div>
        <div class="inst-name">Sitar</div>
        <div class="inst-sub">India</div>
      </div>
      <div class="instrument-card" onclick="playInstrument('sape',this)">
        <div class="inst-icon">🎸</div>
        <div class="inst-name">Sape</div>
        <div class="inst-sub">Borneo</div>
      </div>
    </div>
    <div class="harmony-note gold-note">
      <strong>🎼 Impak Sinfoni:</strong> Apabila alat muzik berbeza latar belakang ini dimainkan bersama, ia membentuk melodi Malaysia yang indah dan unik — itulah erti perpaduan sebenar.
    </div>
  </div>

  <!-- MAKANAN -->
  <div id="makanan" class="content-section">
    <div class="section-header">
      <h2>🍲 Makanan Tradisional &amp; Ejen Penyatuan</h2>
      <p>Hidangan yang menghubungkan hati rakyat Malaysia merentas kaum</p>
    </div>
    <div class="exhibit-grid">
      <div class="exhibit-card">
        <div class="exhibit-ph">🍚</div>
        <div class="exhibit-body">
          <h4>Ketupat, Rendang &amp; Lemang</h4>
          <p>Dihidangkan semasa Hari Raya. Kini digemari dan dimakan oleh semua kaum Malaysia tanpa mengira musim perayaan.</p>
        </div>
      </div>
      <div class="exhibit-card">
        <div class="exhibit-ph">🐟</div>
        <div class="exhibit-body">
          <h4>Yee Sang &amp; Kuih Bakul</h4>
          <p>Tradisi menggaul Yee Sang setinggi boleh melambangkan kemakmuran. Dilakukan bersama rakan pelbagai kaum di tempat kerja dan sekolah.</p>
        </div>
      </div>
      <div class="exhibit-card">
        <div class="exhibit-ph">🥨</div>
        <div class="exhibit-body">
          <h4>Murukku &amp; Tosai</h4>
          <p>Makanan ringan rangup dan hidangan sarapan pagi India yang telah menjadi makanan ruji kegemaran seluruh rakyat Malaysia di kedai mamak.</p>
        </div>
      </div>
      <div class="exhibit-card">
        <div class="exhibit-ph">🎋</div>
        <div class="exhibit-body">
          <h4>Hinava &amp; Manok Pansoh</h4>
          <p>Hidangan ikonik Borneo menggunakan bahan semula jadi — ikan segar dan masakan di dalam buluh. Mempamerkan kepelbagaian resipi bumi Malaysia.</p>
        </div>
      </div>
    </div>
    <div class="harmony-note">
      <strong>💡 Refleksi:</strong> Budaya "Rumah Terbuka" dan berkongsi makanan tradisional terbukti meruntuhkan tembok prejudis. Menghormati sensitiviti makanan memperkukuh semangat toleransi.
    </div>
  </div>

  <!-- TRIVIA -->
  <div id="trivia" class="content-section">
    <div class="section-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
      <div>
        <h2>🎮 Uji Minda: Trivia Adat &amp; Warisan Kaum</h2>
        <p>Jawab soalan kebudayaan dan uji pengetahuan anda!</p>
      </div>
      <button class="nav-btn" onclick="resetTrivia()" style="background: var(--red); color: #fff; border-color: var(--red);">🔄 Set Semula Trivia</button>
    </div>
    <div class="quiz-block">
      <div class="quiz-q">1. [Pakaian] Apakah pakaian tradisional wanita kaum India yang terdiri daripada sehelai kain panjang berukuran 4 hingga 9 meter yang dililit kemas pada badan?</div>
      <div class="quiz-opts">
        <button class="quiz-opt" onclick="semakJawapan(this,false)">A) Cheongsam</button>
        <button class="quiz-opt" onclick="semakJawapan(this,true)">B) Sari</button>
        <button class="quiz-opt" onclick="semakJawapan(this,false)">C) Baju Kurung</button>
        <button class="quiz-opt" onclick="semakJawapan(this,false)">D) Samfoo</button>
      </div>
    </div>
    <div class="quiz-block">
      <div class="quiz-q">2. [Permainan] Permainan tradisional yang menggunakan papan kayu berlubang dan biji guli serta dimainkan secara bersemuka dikenali sebagai?</div>
      <div class="quiz-opts">
        <button class="quiz-opt" onclick="semakJawapan(this,false)">A) Gasing</button>
        <button class="quiz-opt" onclick="semakJawapan(this,false)">B) Wau Bulan</button>
        <button class="quiz-opt" onclick="semakJawapan(this,true)">C) Congkak</button>
        <button class="quiz-opt" onclick="semakJawapan(this,false)">D) Kabaddi</button>
      </div>
    </div>
    <div class="quiz-block">
      <div class="quiz-q">3. [Muzik] Alat muzik bertali tradisional daripada komuniti Orang Ulu di Sarawak yang diukir daripada sebatang kayu dinamakan?</div>
      <div class="quiz-opts">
        <button class="quiz-opt" onclick="semakJawapan(this,true)">A) Sape</button>
        <button class="quiz-opt" onclick="semakJawapan(this,false)">B) Kompang</button>
        <button class="quiz-opt" onclick="semakJawapan(this,false)">C) Gamelan</button>
        <button class="quiz-opt" onclick="semakJawapan(this,false)">D) Tabla</button>
      </div>
    </div>
  </div>
</div>

<div class="divider"></div>

<footer>&copy; 2026 Projek Pengajian Malaysia DUA20062 &mdash; Sinfoni Kepelbagaian</footer>

<!-- Pautan ke fail JavaScript luaran -->
<script src="script.js"></script>
</body>
</html>
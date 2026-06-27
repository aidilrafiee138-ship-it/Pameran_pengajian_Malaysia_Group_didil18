<?php
$servername = "localhost";
$username = "root";
$password = "aidil2006";
$dbname = "db_perpaduan";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Sambungan gagal: " . $conn->connect_error);
}

$status_mesej = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hantar_ucapan'])) {
    $nama = htmlspecialchars(strip_tags($_POST['nama']));
    $mesej = htmlspecialchars(strip_tags($_POST['mesej']));
    if (!empty($nama) && !empty($mesej)) {
        $stmt = $conn->prepare("INSERT INTO ucapan_warga (nama, mesej) VALUES (?, ?)");
        $stmt->bind_param("ss", $nama, $mesej);
        if ($stmt->execute()) {
            $status_mesej = "<p class='success-alert'>Terima kasih! Ucapan anda telah berjaya dihantar ke skrin utama booth.</p>";
        } else {
            $status_mesej = "<p class='error-alert'>Ralat: Gagal menghantar ucapan.</p>";
        }
        $stmt->close();
    } else {
        $status_mesej = "<p class='error-alert'>Sila isi nama dan mesej anda!</p>";
    }
}

// Menutup sambungan pangkalan data
$conn->close();
?>
<!DOCTYPE html>
<html lang="ms">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sudut Interaktif Booth - Sinfoni Kepelbagaian</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
:root{
--navy:#0a1628;--deep:#0d2144;--gold:#c8973a;--gold-lt:#f0c060;
--red:#c0392b;--green:#1a7a4a;--white:#fff;--off:#f8f4ee;
--glass:rgba(255,255,255,0.07);--gb:rgba(200,151,58,0.25);
}
body{background:var(--navy);color:#e8e0d0;font-family:'Inter',sans-serif;min-height:100vh;display:flex;flex-direction:column;justify-content:center;align-items:center;padding:1.5rem;overflow-x:hidden;}
#bg-canvas{position:fixed;top:0;left:0;width:100%;height:100%;z-index:0;pointer-events:none;}
.interaktif-wrap{position:relative;z-index:10;width:100%;max-width:650px;margin:auto;}
.interaktif-box{background:rgba(13,33,68,.85);border:1px solid var(--gb);border-radius:18px;padding:2.5rem;backdrop-filter:blur(14px);box-shadow:0 20px 50px rgba(0,0,0,0.5);}
.interaktif-box h2{font-family:'Playfair Display',serif;font-size:1.8rem;color:var(--gold-lt);margin-bottom:.4rem;text-align:center;}
.interaktif-box .sub{font-size:.9rem;color:rgba(232,224,208,.6);margin-bottom:2rem;text-align:center;}
.vis-form{background:rgba(255,255,255,.03);border:1px solid rgba(200,151,58,.15);border-radius:12px;padding:1.8rem;}
.vis-form h4{color:var(--gold);font-size:.95rem;font-weight:600;text-transform:uppercase;letter-spacing:1px;margin-bottom:1.2rem;text-align:center;}
.vis-form input,.vis-form textarea{width:100%;padding:.9rem 1.1rem;margin-bottom:1rem;background:rgba(255,255,255,.06);border:1px solid rgba(200,151,58,.2);border-radius:8px;color:var(--off);font-family:'Inter',sans-serif;font-size:.95rem;outline:none;transition:border-color .2s;}
.vis-form input::placeholder,.vis-form textarea::placeholder{color:rgba(232,224,208,.35);}
.vis-form input:focus,.vis-form textarea:focus{border-color:var(--gold);}
.vis-form textarea{height:140px;resize:none;}
.btn-submit{width:100%;padding:1rem;background:var(--gold);color:var(--navy);border:none;border-radius:8px;font-family:'Inter',sans-serif;font-weight:700;font-size:1rem;cursor:pointer;transition:all .2s;margin-bottom:1rem;}
.btn-submit:hover{background:var(--gold-lt);transform:translateY(-1px);}

/* Gaya untuk butang ke pameran */
.btn-pameran{display:block;width:100%;text-align:center;padding:.9rem;background:transparent;color:rgba(232,224,208,.75);border:1px solid rgba(200,151,58,.4);border-radius:8px;font-family:'Inter',sans-serif;font-weight:600;font-size:.9rem;text-decoration:none;transition:all .2s;}
.btn-pameran:hover{background:rgba(200,151,58,.1);border-color:var(--gold);color:#fff;}

.success-alert{background:rgba(26,122,74,.2);border:1px solid var(--green);color:#7fdbaa;padding:.9rem 1.1rem;border-radius:8px;margin-bottom:1.2rem;font-size:.9rem;text-align:center;}
.error-alert{background:rgba(192,57,43,.2);border:1px solid var(--red);color:#f08080;padding:.9rem 1.1rem;border-radius:8px;margin-bottom:1.2rem;font-size:.9rem;text-align:center;}
footer{position:relative;z-index:10;text-align:center;padding:1.5rem 0 0;font-size:.75rem;color:rgba(232,224,208,.35);width:100%;}
</style>
</head>
<body>
<canvas id="bg-canvas"></canvas>

<div class="interaktif-wrap">
  <div class="interaktif-box">
    <h2>💬 Sudut Interaktif Booth</h2>
    <p class="sub">Tinggalkan ucapan atau pandangan anda mengenai keharmonian kaum di Malaysia</p>
    
    <?php echo $status_mesej; ?>
    
    <form action="interaktif.php" method="POST" class="vis-form">
      <h4>✍️ Hantar Mesej &amp; Ucapan</h4>
      <input type="text" name="nama" placeholder="Nama anda..." required>
      <textarea name="mesej" placeholder="Tulis ucapan atau pandangan anda mengenai perpaduan..." required></textarea>
      <button type="submit" name="hantar_ucapan" class="btn-submit">Hantar Mesej →</button>
      
      <a href="index.php" class="btn-pameran">🖥️ Lihat Halaman Pameran Utama</a>
    </form>
  </div>
  
  <footer>&copy; 2026 Projek Pengajian Malaysia DUA20062</footer>
</div>

<script>
/* ===== ANIMATED BACKGROUND ===== */
(function(){
  const c=document.getElementById('bg-canvas'),ctx=c.getContext('2d');
  let W,H;
  function resize(){W=c.width=window.innerWidth;H=c.height=window.innerHeight;}
  resize();window.addEventListener('resize',resize);
  const COLS=['rgba(200,151,58,','rgba(26,122,74,','rgba(192,57,43,','rgba(100,140,220,'];
  const dots=Array.from({length:30},()=>({
    x:Math.random()*window.innerWidth,y:Math.random()*window.innerHeight,
    r:Math.random()*2.2+0.7,dx:(Math.random()-.5)*.2,dy:(Math.random()-.5)*.2,
    col:COLS[Math.floor(Math.random()*4)],a:Math.random()*.3+.1
  }));
  const motifs=Array.from({length:5},()=>({
    x:Math.random()*window.innerWidth,y:Math.random()*window.innerHeight,
    s:Math.random()*50+20,rot:Math.random()*Math.PI,
    drot:(Math.random()-.5)*.002,dx:(Math.random()-.5)*.1,dy:(Math.random()-.5)*.1,
    col:COLS[Math.floor(Math.random()*4)],a:Math.random()*.04+.01,
    t:Math.floor(Math.random()*3)
  }));
  function diamond(x,y,s,r,col,a){
    ctx.save();ctx.translate(x,y);ctx.rotate(r);
    ctx.beginPath();ctx.moveTo(0,-s);ctx.lineTo(s*.55,0);ctx.lineTo(0,s);ctx.lineTo(-s*.55,0);ctx.closePath();
    ctx.strokeStyle=col+a+')';ctx.lineWidth=1;ctx.stroke();ctx.restore();
  }
  function ring(x,y,s,col,a){
    ctx.beginPath();ctx.arc(x,y,s,0,Math.PI*2);ctx.strokeStyle=col+a+')';ctx.lineWidth=.8;ctx.stroke();
  }
  function floral(x,y,s,r,col,a){
    ctx.save();ctx.translate(x,y);ctx.rotate(r);
    for(let i=0;i<6;i++){ctx.rotate(Math.PI/3);ctx.beginPath();ctx.ellipse(0,-s*.55,s*.18,s*.38,0,0,Math.PI*2);
    ctx.strokeStyle=col+a+')';ctx.lineWidth=.7;ctx.stroke();}
    ctx.restore();
  }
  function frame(){
    ctx.clearRect(0,0,W,H);
    dots.forEach(p=>{
      ctx.beginPath();ctx.arc(p.x,p.y,p.r,0,Math.PI*2);ctx.fillStyle=p.col+p.a+')';ctx.fill();
      p.x+=p.dx;p.y+=p.dy;
      if(p.x<0)p.x=W;if(p.x>W)p.x=0;if(p.y<0)p.y=H;if(p.y>H)p.y=0;
    });
    motifs.forEach(m=>{
      if(m.t===0)diamond(m.x,m.y,m.s,m.rot,m.col,m.a);
      else if(m.t===1)ring(m.x,m.y,m.s,m.col,m.a);
      else floral(m.x,m.y,m.s,m.rot,m.col,m.a);
      m.x+=m.dx;m.y+=m.dy;m.rot+=m.drot;
      if(m.x<-m.s)m.x=W+m.s;if(m.x>W+m.s)m.x=-m.s;
      if(m.y<-m.s)m.y=H+m.s;if(m.y>H+m.s)m.y=-m.s;
    });
    requestAnimationFrame(frame);
  }
  frame();
})();
</script>
</body>
</html>
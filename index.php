<?php 
include 'header.php';
?>
<!-- BACKGROUND IMAGE PARALLAX -->
<div class="bg-parallax" id="bgParallax">
    <div class="overlay">
        <h1 class="title">Pantai Galung Sumenep</h1>
        <p class="subtitle">Wisata Alam yang Menawan</p>
        <div class="bg-text">
            <p>Pantai Galung di Sumenep, Madura, adalah destinasi wisata baru dengan pasir putih luas dan pemandangan laut yang memikat. Terletak di Desa Juruan Daya, Kecamatan Batuputih, pantai ini dikelilingi hutan, menjadikannya tempat ideal untuk bersantai dan "healing."</p>
            <p>Pengunjung bisa menikmati berbagai aktivitas seperti berfoto, berkemah, melihat sunset, hingga naik perahu. Saat momen Lebaran, pantai ini semakin meriah dengan hiburan musik tong-tong khas Madura dan kuliner tradisional.</p>
            <p><strong>Tiket masuk terjangkau untuk semua kalangan!</strong></p>
        </div>
        <a href="#info" class="cta-button">Jelajahi Sekarang</a>
    </div>
</div>

<br><br>

<?php 
include 'footer.php';
?>

<style>
/* Efek Parallax */
.bg-parallax {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    background-attachment: fixed;
    transition: background-image 1s ease-in-out;
    background-size: cover;
    background-position: center;
}

/* Overlay Gelap */
.overlay {
    background: rgba(0, 0, 0, 0.5);
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: white;
    padding: 20px;
    animation: fadeIn 1.5s ease-in-out;
}

/* Style Judul */
.title {
    font-size: 50px;
    font-weight: bold;
    font-family: 'Poppins', sans-serif;
    letter-spacing: 2px;
    text-transform: uppercase;
    background: linear-gradient(90deg, #0083B0, #00B4DB);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: fadeInDown 1s ease-in-out;
}

/* Style Subtitle */
.subtitle {
    font-size: 22px;
    font-style: italic;
    font-family: 'Poppins', sans-serif;
    margin-top: 10px;
    animation: fadeInUp 1s ease-in-out;
}

/* Box Blur untuk Teks Deskripsi */
.bg-text {
    background: rgba(255, 255, 255, 0.2);
    padding: 15px 30px;
    border-radius: 10px;
    backdrop-filter: blur(8px);
    margin-top: 20px;
    font-size: 18px;
    font-family: Arial, sans-serif;
    line-height: 1.6;
    max-width: 600px;
    animation: fadeInUp 1.5s ease-in-out;
}

/* Tombol CTA */
.cta-button {
    margin-top: 20px;
    display: inline-block;
    padding: 12px 25px;
    background: linear-gradient(90deg, #00B4DB, #0083B0);
    color: white;
    font-size: 18px;
    font-weight: bold;
    text-transform: uppercase;
    border-radius: 30px;
    text-decoration: none;
    transition: 0.3s;
    box-shadow: 0px 4px 10px rgba(0, 179, 219, 0.5);
}

.cta-button:hover {
    background: linear-gradient(90deg, #0083B0, #00B4DB);
    transform: scale(1.1);
    box-shadow: 0px 6px 15px rgba(0, 179, 219, 0.7);
}

/* Animasi Fade In */
@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
</style>

<script>
const images = [
    'image/home/23.jpeg',
    'image/home/24.jpeg',
    'image/home/25.jpeg'
];
let currentIndex = 0;

function changeBackground() {
    currentIndex = (currentIndex + 1) % images.length;
    document.getElementById('bgParallax').style.backgroundImage = `url(${images[currentIndex]})`;
}

setInterval(changeBackground, 3000);
</script>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
   <link href="<?= base_url('assets/alquran/assets/index.css') ?>" rel="stylesheet" />

   <title>Smart Qur'an - Al-Quran</title>
</head>

<body id="daftar-surat">

   <!-- Navbar -->
   <nav class="navbar navbar-dark fixed-top py-3 px-3 px-sm-0" style="color: var(--cokelat2); background-color: var(--cokelat1);">
      <div class="container">
         <a class="navbar-brand font-weight-bold mb-2" href="../" style="display: grid; grid-template-columns: 1fr 20px; align-items: center; gap: 10px;">
            <span style="letter-spacing: 3px; font-size: 1.5rem; font-weight: 500;">Smart Qur'an</span>
         </a>

         <div class="index-surat" style="display: flex; align-items: center;">
            <span href="#last-read" class="fas fa-bookmark" style="font-size: 1.8rem; color: var(--white); cursor: pointer;"></span>
            <form class="cari-surat d-flex fuzzy-search ms-4 w-100">
               <input class="form-control px-3 py-2" type="text" style="background-color: var(--cream); font-size: 1.1rem; font-weight: 400; letter-spacing: .1rem;" placeholder=" Surat yang ingin dibaca...">
            </form>
         </div>
      </div>
   </nav>
   <nav class="navbar navbar-dark py-3 px-3 px-sm-0" style="color: var(--cokelat2); background-color: var(--cokelat1);">
      <div class="container">
         <a class="navbar-brand font-weight-bold mb-2" href="#" style="display: grid; grid-template-columns: 1fr 20px; align-items: center; gap: 10px;">
            <span style="letter-spacing: 3px; font-size: 1.5rem; font-weight: 500;"></span>
         </a>

         <div class="index-surat" style="display: flex; align-items: center;">
            <span href="#last-read" class="fas fa-bookmark" style="font-size: 1.8rem; color: var(--white);"></span>
            <form class="cari-surat d-flex fuzzy-search ms-4 w-100">
               <input class="form-control px-3 py-2" type="text" style="background-color: var(--cream); font-size: 1.1rem; font-weight: 400; letter-spacing: .1rem;" placeholder=" Surat yang ingin dibaca...">
            </form>
         </div>
      </div>
   </nav>
   <!-- End Navbar -->

   <!-- Daftar Surat -->
   <section class="daftar-surat py-4" style="color: var(--cokelat2);">
      <div class="container mx-auto list">
         <h3 style="color: var(--cokelat2);">Loading...</h3>
      </div>
   </section>
   <!-- End Daftar Surat -->

   <!-- Footer -->
   <footer class="py-4" style="background-color: var(--cream); display: flex; flex-wrap: wrap; justify-content: center; align-items:
      center; color: var(--black);">
      <div>
         <h6 class="m-0 px-4 text-center">
            &copy; Copyright <strong><span><a href="<?= base_url('HomePage/info') ?>" target="blank"> Girl's PNP II</a></span></strong> Support by<a href="https://inovindo.co.id/" target="blank"> PT. Inovindo Digital Media</a>
         </h6>
      </div>
   </footer>
   <!-- End Footer -->

</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<?php
//require_once('index.js'); 
?>
<!-- <script src="http://localhost/bootstrap-4-codeigniter/assets/alquran/list.js"></script> -->
<script src="<?= base_url('assets/list.js') ?>"></script>


<script>
   $.ajax({
      url: 'https://api.quran.sutanlab.id/surah',
      success: results => {
         // Mengecek apakah yang dihasilkan dari request API adalah JSON atau String
         results = typeof results == 'string' ? JSON.parse(results) : results

         const daftarSurat = results.data;
         let fragmentDaftarSurat = '';
         daftarSurat.forEach(surat => {
            fragmentDaftarSurat += `
            <div class="surat p-3 p-sm-4">
               <h3 class="nomer-surat text-center mb-0 py-15 me-3" style="font-style: italic;">${surat.number}.</h3>
               <div class="detail-surat mb-1">
                  <a href="surah/?nama=${surat.name.transliteration.id}&nomer=${surat.number}"
                  style="display: block; color: var(--black)" >
                     <div class="nama-surat">
                        <div div style="letter-spacing: .1rem;">
                           <h4 class="nama mb-0" style="font-weight: 700;">${surat.name.transliteration.id}</h4>
                           <h6 class="arti">${surat.name.translation.id}</h6>
                           <h1 class="arab text-end mt-1 mt-sm-0 me-3">${surat.name.short}</h1>
                        </div>
                     </div>
                     <h6 class="ayat m-0">Surah ke-${surat.sequence} | ${surat.numberOfVerses} ayat | ${surat.revelation.id}</h6>
                  </a>
                  </div>
               </div>

              
            </div>
         `;

            $('.daftar-surat .container').html(fragmentDaftarSurat);

            // Mengaktifkan library List.js agar bisa melakukan searching
            new List('daftar-surat', {
               valueNames: ['nama', 'arti', 'arab'],
            });

            // Lihat detail surat saat tombol expand di click
            const expandDetail = document.querySelectorAll('.expand-detail');
            expandDetail.forEach(expand => {
               expand.addEventListener('click', function() {
                  this.parentElement.querySelector('.info-surat').classList.toggle('open');
                  this.classList.toggle('open');

                  if (this.parentElement.querySelector('.info-surat').classList.contains('open')) {
                     const infoMaxHeight = getComputedStyle(this.parentElement.querySelector('.info')).height;
                     this.parentElement.querySelector('.info-surat').style.height = `calc(${infoMaxHeight} + 2rem)`;
                  } else {
                     this.parentElement.querySelector('.info-surat').style.height = '0';
                  }
               })
            });
         })

         // Memberi id pada surat yang terkahir dibaca
         if (JSON.parse(localStorage.getItem('SMART QURAN')).bacaanTerakhir) {
            const bacaanSuratTerakhir = JSON.parse(localStorage.getItem('SMART QURAN')).bacaanTerakhir.nomerSurat
            console.log(bacaanSuratTerakhir)
            document.querySelectorAll('.surat')[bacaanSuratTerakhir - 1].setAttribute('id', 'last-read')
         }
      }
   })

   // Loncat ke surat yang terkahir dibaca
   $('.index-surat span').on('click', function() {
      let elementTujuan = $('#last-read');

      const mediaQueryXS = window.matchMedia('(max-width: 576px)').matches;

      if (mediaQueryXS) {
         $('html, body').animate({
            scrollTop: elementTujuan.offset().top - 120
         })
      } else {
         $('html, body').animate({
            scrollTop: elementTujuan.offset().top - 100
         })
      }
   });
</script>

</html>
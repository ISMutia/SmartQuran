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
	<link href="<?= base_url('assets/css/surah.css') ?>" rel="stylesheet" />

	<title>Smart Qur'an</title>
</head>

<body>

	<!-- Navbar -->
	<nav class="navbar navbar-dark fixed-top py-3" style="color: var(--cokelat2); background-color: var(--cokelat1);">
		<div class="container">
			<div class="navbar-title mx-auto mx-sm-0" style="display: flex; justify-content: space-between; align-items: center; width: 100%; max-width: 450px;">
				<a class="navbar-brand font-weight-bold m-0" href="../../" style="display: grid; grid-template-columns: 1fr 20px; align-items: center; gap: 10px;">
					<span style="letter-spacing: .2rem; font-size: 1.5rem; font-weight: 500;">Smart Qur'an</span>
				</a>
				<span style="height: 2.8rem; width: .2rem; background-color: var(--white); border-radius: .2rem;"></span>
				<div style="letter-spacing: .1rem;">
					<h4 class="nama-surat m-0" style="font-weight: 600;"></h4>
				</div>
			</div>
		</div>
	</nav>
	<nav class="navbar navbar-dark py-3" style="color: var(--cokelat2); background-color: var(--cokelat1);">
		<div class="container">
			<a class="navbar-brand font-weight-bold mb-2" href="#" style="display: grid; grid-template-columns: 1fr 20px; align-items: center; gap: 10px;">
				<span style="letter-spacing: 3px; font-size: 1.5rem; font-weight: 500;">Smart Qur'an</span>
			</a>
		</div>
	</nav>
	<!-- End Navbar -->

	<!-- Ayat -->
	<section class="daftar-ayat py-4">
		<div class="container mx-auto">
			<h3 style="color: var(--cokelat2);">Loading...</h3>
		</div>
	</section>
	<!-- End Ayat -->

	<!-- Autoplay Button -->
	<div class="autoplay fas fa-play" style="display: none;"></div>
	<!-- End Autoplay Button -->

	<!-- Footer -->
	<footer class="py-4" style="background-color: var(--cream); display: flex; flex-wrap: wrap; justify-content: center; align-items:
      center; color: var(--black);">
		<div>
			<h6 class="m-0 px-4 text-center">
				&copy; Copyright <strong><span><a href="<?= base_url('HomePage/info') ?>" target="blank" style="color: var(--black);"> Girl's PNP II</a></span></strong> Support by<strong><span><a href="https://inovindo.co.id/" target="blank" style="color: var(--black);"> PT. Inovindo Digital Media</a></span></strong>
			</h6>
		</div>
	</footer>
	<!-- End Footer -->

</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<script>
	// Mengambil parameter nama dan nomer surat dari url
	window.onload = function() {
		const parameter = document.location.href.split('?')[1].split('&');
		const nomerSurat = parameter[1].split('=')[1]

		// Request ke api dengan parameter yang sudah diambil
		$.ajax({
			url: `https://api.quran.sutanlab.id/surah/${nomerSurat}`,
			success: results => {
				// Mengecek apakah yang dihasilkan dari request API adalah JSON atau String
				results = typeof results == 'string' ? JSON.parse(results) : results

				const dataAyat = results.data.verses;
				const namaSurat = results.data.name.transliteration.id
				let fragmentDaftarAyat = '';

				$('.nama-surat').text(namaSurat);
				$('title').text(`Smart Qur'an - Surah ${namaSurat}`)

				dataAyat.forEach(ayat => {
					const audio = ayat.audio.primary
					nomer = ayat.number.inSurah
					teksArab = ayat.text.arab
					teksLatin = ayat.text.transliteration.en
					arti = ayat.translation.id
					tafsir = ayat.tafsir.id.short

					fragmentDaftarAyat += `
               <div class="ayat p-3 p-sm-4">
                  <div class="mb-0 py-2 me-3">
                     <h3 class="nomer-ayat text-center" style="font-style: italic;">${nomer}.</h3>
                     <span class="last-read far fa-bookmark" style="font-size: 1.8rem; cursor: pointer;"></span>
                  </div>
                  <div class="detail-ayat mb-2 w-100">
                     <div class="bacaan-ayat mb-3">
                        <audio controls>
                           <source src="${audio}">
                        </audio>
                        <h1 class="text-end m-0" style="font-weight: 600; line-height: 1.5;">${teksArab}</h1>
                     </div>
                     <div class="bacaan-latin" style="width: 100%; max-width: 700px;">
                        <h5 style="font-style: italic;">${teksLatin}</h5>
                     </div>
                     <div class="info-ayat mb-3 mb-sm-0" style="overflow: hidden;">
                        <div class="info mt-3" style="letter-spacing: 1px;">
                           <div class="arti mb-3">
                              <h6 class="m-0" style="font-weight: 600;">Arti:</h6>
                              <h6 class="m-0" style="font-weight: 400;">${arti}</h6>
                           </div>
                           <div class="tafsir">
                              <h6 class="m-0" style="font-weight: 600;">Tafsir:</h6>
                              <h6 class="m-0" style="font-weight: 400;">${tafsir}</h6>
                           </div>
                        </div>
                     </div>
                  </div>

                  <span class="expand-detail">
                     <img src="<?= base_url('assets/img/icon/panah2.png') ?>">
                  </span>
               </div>
            `;
				})

				$('.daftar-ayat .container').html(fragmentDaftarAyat);

				document.querySelector('.autoplay').style.display = 'flex'

				// Lihat detail ayat saat tombol expand di click
				const expandDetail = document.querySelectorAll('.expand-detail');
				expandDetail.forEach(expand => {
					expand.addEventListener('click', function() {
						this.parentElement.querySelector('.info-ayat').classList.toggle('open');
						this.classList.toggle('open');

						if (this.parentElement.querySelector('.info-ayat').classList.contains('open')) {
							const infoHeight = getComputedStyle(this.parentElement.querySelector('.info')).height;
							this.parentElement.querySelector('.info-ayat').style.height = `calc(${infoHeight} + 2rem)`;
						} else {
							this.parentElement.querySelector('.info-ayat').style.height = '0';
						}
					})
				});

				audioSetting();

				// Last-read labels
				const lastReadLabels = document.querySelectorAll('.ayat .last-read');
				if (JSON.parse(localStorage.getItem('SMART QURAN')).bacaanTerakhir && JSON.parse(localStorage.getItem('SMART QURAN')).bacaanTerakhir.nomerSurat == nomerSurat) {
					const bacaanAyatTerakhir = JSON.parse(localStorage.getItem('SMART QURAN')).bacaanTerakhir.nomerAyat;
					lastReadLabels[bacaanAyatTerakhir].classList.add('fas')
					lastReadLabels[bacaanAyatTerakhir].classList.remove('far')

					// Loncat ke ayat yang terkahir dibaca
					let elementBacaanAyatTerakhir = $('.last-read.fas').parent().parent();
					$('html, body').animate({
						scrollTop: elementBacaanAyatTerakhir.offset().top - parseFloat(getComputedStyle(document.querySelector('nav')).height.replace('px', '')) - 20
					})
				}

				// Toggle label last-read saat di click
				for (let i = 0; i < lastReadLabels.length; i++) {
					lastReadLabels[i].addEventListener('click', function() {
						if (lastReadLabels[i].classList.contains('far')) {
							this.classList.remove('far')
							this.classList.add('fas')

							for (let j = 0; j < lastReadLabels.length; j++) {
								if (j != i) {
									lastReadLabels[j].classList.remove('fas')
									lastReadLabels[j].classList.add('far')
								}
							}

							setBacaanTerakhir(parseInt(nomerSurat), i, namaSurat)
						} else {
							this.classList.remove('fas')
							this.classList.add('far')

							const smartQuran = JSON.parse(localStorage.getItem('SMART QURAN'))
							delete smartQuran.bacaanTerakhir

							setToLocalStorage(smartQuran)
						}
					})
				}
			}
		})
	}

	// Saat salah satu audio diputar, maka stop audio yang lain dipause
	function audioSetting() {
		const audios = document.querySelectorAll('audio')
		for (let i = 0; i < audios.length; i++) {
			audios[i].addEventListener('play', function() {
				this.currentTime = 0;
				for (let j = 0; j < audios.length; j++) {
					if (j != i) {
						audios[j].pause();
					}
				}
			})
		}
	}

	// Membuat fitur autoplay
	let indexAwal = 0;
	let isPlayed = false;

	document.querySelector('.autoplay').addEventListener('click', function() {
		if (this.classList.contains('fa-play')) {
			isPlayed = true;
			this.classList.remove('fa-play')
			this.classList.add('fa-pause')
			autoPlay(indexAwal)
		} else {
			isPlayed = false;
			this.classList.remove('fa-pause')
			this.classList.add('fa-play')
		}
	})

	function autoPlay(index) {
		const audios = document.querySelectorAll('audio');
		let indexPlayedAudio = index;
		if (indexPlayedAudio === document.querySelectorAll('.ayat').length) {
			document.querySelector('.autoplay').classList.remove('fa-pause')
			document.querySelector('.autoplay').classList.add('fa-play')
			return
		}

		// Auto scroll saat berganti audio bacaan ayat
		document.querySelectorAll('.ayat')[indexPlayedAudio].classList.add('current-play')
		const bacaanAyat = $('.current-play')
		$('html, body').animate({
			scrollTop: bacaanAyat.offset().top - parseFloat(getComputedStyle(document.querySelector('nav')).height.replace('px', '')) - 20
		})

		audios[indexPlayedAudio].play();
		const checkPlayedAudio = setInterval(() => {
			if (isPlayed) {
				if (audios[indexPlayedAudio].paused) {
					clearInterval(checkPlayedAudio)
					document.querySelectorAll('.ayat')[indexPlayedAudio].classList.remove('current-play')
					autoPlay(++indexPlayedAudio)
				}
			} else {
				indexAwal = indexPlayedAudio
				audios[indexPlayedAudio].pause()
			}
		}, 1);
	}

	// Mendapatakn surat dan ayat yang terkahir dibaca
	if (!localStorage.getItem('SMART QURAN')) {
		localStorage.setItem('SMART QURAN', JSON.stringify({}))
	}

	function setBacaanTerakhir(nomerSurat, nomerAyat, namaSurat) {
		const smartQuran = JSON.parse(localStorage.getItem('SMART QURAN'))
		smartQuran.bacaanTerakhir = {
			nomerSurat: nomerSurat,
			nomerAyat: nomerAyat,
			namaSurat: namaSurat,
		}
		setToLocalStorage(smartQuran)
	}

	function setToLocalStorage(value) {
		localStorage.setItem('SMART QURAN', JSON.stringify(value))
	}
</script>

</html>
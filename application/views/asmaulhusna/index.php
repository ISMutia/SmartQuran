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
	<link href="<?= base_url('assets/css/asmaul_husna.css') ?>" rel="stylesheet" />

	<title>Smart Qur'an - Asmaul Husna</title>
</head>

<body id="daftar-asmaul-husna">

	<!-- Navbar -->
	<nav class="navbar navbar-dark fixed-top py-3 px-3 px-sm-0" style="color: var(--cokelat2); background-color: var(--cokelat1);">
		<div class="container">
			<a class="navbar-brand font-weight-bold mb-2" href="../" style="display: grid; grid-template-columns: 1fr 20px; align-items: center; gap: 10px;">
				<span style="letter-spacing: 3px; font-size: 1.5rem; font-weight: 500;">Smart Qur'an</span>
			</a>
		</div>

	</nav>
	<nav class="navbar navbar-dark py-3 px-3 px-sm-0" style="color: var(--cokelat2); background-color: var(--cokelat1);">
		<div class="container">
			<a class="navbar-brand font-weight-bold mb-2" href="#" style="display: grid; grid-template-columns: 1fr 20px; align-items: center; gap: 10px;">
				<span style="letter-spacing: 3px; font-size: 1.5rem; font-weight: 500;">Smart Qur'an</span>
			</a>
		</div>
	</nav>
	<!-- End Navbar -->

	<!-- Asmaul Husna -->
	<section class="asmaul-husna py-4">
		<div class="container list mx-auto row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6 g-4">

		</div>
	</section>
	<!-- End Asmaul Husna -->

	<!-- Autoplay Button -->
	<div class="autoplay fas fa-play" style="display: none;"></div>
	<!-- End Autoplay Button -->

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
<script src="<?= base_url('assets/js/list.js') ?>"></script>

<script>
	$.ajax({
		url: 'https://islamic-api-zhirrr.vercel.app/api/asmaulhusna',
		success: results => {
			const dataAsmaulHusna = results.data;
			let fragmentAsmaulHusna = '';

			dataAsmaulHusna.forEach(nama => {
				fragmentAsmaulHusna += `
            <div class="col">
               <div class="nama p-4 text-center">
                  <div>
                     <h1 class="arab">${nama.arabic}</h1>
                     <h4 class="latin mb-1" style="font-weight: 700;">${nama.latin}</h4>
                     <h6 class="arti" style="font-weight: 400;">${nama.translation_id}</h6>
                  </div>
               </div>
            </div>
         `;
			})

			$('.asmaul-husna .container').html(fragmentAsmaulHusna);

			new List('daftar-asmaul-husna', {
				valueNames: ['arab', 'latin', 'arti'],
			});

			document.querySelector('.autoplay').style.display = 'flex'
			initAudio();
		}
	})

	// asmaul husna audio
	let audio;

	function initAudio() {
		audio = new Audio('<?= base_url('assets/file/asmaul_husna.mp3') ?>');
	}

	document.querySelector('.autoplay').addEventListener('click', function() {
		if (this.classList.contains('fa-play')) {
			this.classList.remove('fa-play')
			this.classList.add('fa-pause')
			audio.play();
		} else {
			this.classList.remove('fa-pause')
			this.classList.add('fa-play')
			audio.pause();
		}
	})
</script>

</html>

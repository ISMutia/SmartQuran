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
	<link href="<?= base_url('assets/css/doa_harian.css') ?>" rel="stylesheet" />
	<title>Smart Qur'an - Doa Harian</title>
</head>

<body id="daftar-doa-harian">
	<!-- Navbar -->
	<nav class="navbar navbar-dark fixed-top py-3 px-3 px-sm-0" style="color: var(--coklat2); background-color: var(--cokelat1);">
		<div class="container">
			<a class="navbar-brand font-weight-bold mb-2" href="../" style="display: grid; grid-template-columns: 1fr 20px; align-items: center; gap: 10px;">
				<span style="letter-spacing: 3px; font-size: 1.5rem; font-weight: 500;">Smart Qur'an</span>
			</a>

			<form class="cari-doa d-flex fuzzy-search">
				<input class="form-control px-3 py-2" type="text" style="background-color: var(--cream); font-size: 1.1rem; font-weight: 500; letter-spacing: .1rem;" placeholder="Cari Doa Disini...">
			</form>
		</div>
	</nav>
	<nav class="navbar navbar-dark py-3 px-3 px-sm-0" style="color: var(--coklat2); background-color: var(--cokelat1);">
		<div class="container">
			<a class="navbar-brand font-weight-bold mb-2" href="../" style="display: grid; grid-template-columns: 1fr 20px; align-items: center; gap: 10px;">
				<span style="letter-spacing: 3px; font-size: 1.5rem; font-weight: 500;">Smart Qur'an</span>
			</a>

			<form class="cari-doa d-flex">
				<input class="form-control px-3 py-2" type="text" style="background-color: var(--cream); font-size: 1.1rem; font-weight: 500; letter-spacing: .1rem;" placeholder="Cari Doa Disini...">
			</form>
		</div>
	</nav>
	<!-- End Navbar -->

	<!-- Doa Harian -->
	<section class="doa-harian py-4">
		<div class="container list mx-auto">
			<h3 style="color: var(--cokelat2);">Loading</h3>
		</div>
	</section>
	<!-- End Doa Harian -->

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
<!-- <script src="../list.js"></script> -->
<script src="<?= base_url('assets/js/list.js') ?>"></script>
<!-- <script src="index.js"></script> -->

<script>
	$.ajax({
		url: 'https://islamic-api-zhirrr.vercel.app/api/doaharian',
		success: results => {
			const dataDoaHarian = results.data;
			let fragmentDoaHarian = '';

			dataDoaHarian.forEach(doa => {
				fragmentDoaHarian += `
            <div class="doa p-4">
               <div class="mb-3">
                  <h5 class="nama mb-3" style="font-weight: 600;">${doa.title}</h5>
                  <h2 class="arab mb-3" style="text-align: right;">${doa.arabic}</h2>
                  <h6 class="latin" style="font-style: italic; letter-spacing: 1px; line-height: 1.4rem;">${doa.latin}</h6>
               </div>
               <div class="info-doa mb-3 mb-sm-0" style="overflow: hidden;">
                  <div class="info mt-0" style="letter-spacing: 1px;">
                     <div class="mb-3">
                        <h6 class="m-0" style="font-weight: 600;">Arti:</h6>
                        <h6 class="arti" style="letter-spacing: 1px; line-height: 1.4rem; font-weight: 400;">${doa.translation}</h6>
                     </div>
                  </div>
               </div>

               <span class="expand-detail">
                  <img src="<?= base_url('assets/img/icon/panah2.png') ?>">
               </span>
            </div>
         `;
			})

			$('.doa-harian .container').html(fragmentDoaHarian);

			new List('daftar-doa-harian', {
				valueNames: ['nama', 'arab', 'latin', 'arti'],
			});

			// Lihat detail doa saat tombol expand di click
			const expandDetail = document.querySelectorAll('.expand-detail');
			expandDetail.forEach(expand => {
				expand.addEventListener('click', function() {
					this.parentElement.querySelector('.info-doa').classList.toggle('open');
					this.classList.toggle('open');

					if (this.parentElement.querySelector('.info-doa').classList.contains('open')) {
						const infoHeight = getComputedStyle(this.parentElement.querySelector('.info')).height;
						this.parentElement.querySelector('.info-doa').style.height = `calc(${infoHeight} + .5rem)`;
					} else {
						this.parentElement.querySelector('.info-doa').style.height = '0';
					}
				})
			});
		}
	})
</script>

</html>
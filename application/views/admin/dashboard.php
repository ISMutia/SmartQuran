<!doctype html>
<html lang="en">

<?php $this->load->view("admin/_partials/head.php"); ?>

<body>

	<?php $this->load->view("admin/_partials/navbar.php"); ?>
	<?php $this->load->view("admin/_partials/header.php"); ?>

	<!-- Main Menu -->
	<section id="menu" class="main-menu py-5">
		<div class="container mx-auto py-5">
			<div class="menu-wrapper row row-cols-2 row-cols-sm-3 row-cols-lg-3 g-3 mx-auto justify-content-center" width="200" height="200">

				<div class="col">
					<a href="<?= base_url('HomePage/alquran') ?>" style="display: block;" target="_blank">
						<div class="px-1 py-3 text-center" style="background-color: var(--cream); color: var(--black); border-radius: 120px; cursor: pointer;">
							<img src="<?= base_url('assets/img/menu1.jpeg') ?>" class="img-fluid mb-3" width="100" height="100" style="border-radius: 50%" alt="Al-Quran">
							<h6 style="font-weight: 600;">Al-Quran</h6>
						</div>
					</a>
				</div>

				<div class="col">
					<a href="<?= base_url('HomePage/asmaulhusna') ?>" style="display: block;" target="_blank">
						<div class="px-1 py-3 text-center" style="background-color: var(--cream); color: var(--black); border-radius: 120px; cursor: pointer;">
							<img src="<?= base_url('assets/img/menu2.jpeg') ?>" class="img-fluid mb-3" width="100" height="100" style="border-radius: 50%" alt="Asmaul Husna">
							<h6 style="font-weight: 600;">Asmaul Husna</h6>
						</div>
					</a>
				</div>

				<div class="col">
					<a href="#waktushalat" style="display: block;">
						<div class="px-1 py-3 text-center" style="background-color: var(--cream); color: var(--black); border-radius: 120px; cursor: pointer;">
							<img src="<?= base_url('assets/img/menu3.png') ?>" class="img-fluid mb-3" width="100" height="100" style="border-radius: 50%" ; alt=" Waktu Sholat">
							<h6 style=" font-weight: 600;">Waktu Sholat</h6>
						</div>
					</a>
				</div>

				<div class="col">
					<a href="#arahkiblat" style="display: block;">
						<div class="px-1 py-3 text-center" style="background-color: var(--cream); color: var(--black); border-radius: 120px; cursor: pointer;">
							<img src="<?= base_url('assets/img/menu4.jpeg') ?>" class="img-fluid mb-3" width="100" height="100" style="border-radius: 50%" alt="Arah Qiblat">
							<h6 style="font-weight: 600;">Arah Qiblat</h6>
						</div>
					</a>
				</div>

				<div class="col">
					<a href="<?= base_url('HomePage/doaharian') ?>" style="display: block;" target="_blank">
						<div class="px-1 py-3 text-center" style="background-color: var(--cream); color: var(--black); border-radius: 120px; cursor: pointer;">
							<img src="<?= base_url('assets/img/menu5.png') ?>" class="img-fluid mb-3" width="100" height="100" style="border-radius: 50%" alt="Doa Harian">
							<h6 style="font-weight: 600;">Doa Harian</h6>
						</div>
					</a>
				</div>

			</div>

			<div class="row mt-5 d-none" id="terakhirDiBaca">
				<div class="col">
					<a href="<?= base_url('HomePage/surah/') ?>" style="display: block;" target="blank">
						<div class="px-1 py-3 text-center" style="background-color: var(--cream); color: var(--black); border-radius: 50px; cursor: pointer;">
							<h6 style="font-weight: 600;">Terakhir dibaca</h6>
							<h6 style="font-weight: 600;" id="suratTerkahirDiBaca"></h6>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!-- End Main Menu -->

	<!-- Waktu Sholat -->
	<section class="waktu-sholat py-5" style="background-color: var(--cream);" id="waktushalat">
		<div class="container mx-auto py-3">
			<div class="text-center mb-5" style="color: var(--black);">
				<h2 class="mb-3" style="font-weight: 700;">
					Waktu Sholat Daerah
					<span style="display: inline-flex; flex-wrap: wrap; align-items: center; justify-content: center; cursor:
            pointer;" data-bs-toggle="modal" data-bs-target="#daftarKota">
						<span class="kota-pilihan"></span>
						<span class="ganti-kota ms-3 fas fa-caret-down" style="font-size: 1.2rem;"></span>
					</span>
				</h2>
				<div class="tanggal-wrapper" style="display: flex; justify-content: center; align-items: center;">
					<span class="prev-date fas fa-arrow-left px-3" style="cursor: pointer;"></span>
					<div class="tanggal mx-4">
						<h5 class="masehi mb-1" style="font-weight: 600;"></h5>
						<h6 class="hijriyah" style="opacity: .6;"></h6>
					</div>
					<span class="next-date fas fa-arrow-right px-3" style="cursor: pointer;"></span>
				</div>
			</div>
			<div class="jadwal-wrapper row row-cols-2 row-cols-sm-3 row-cols-lg-4 g-4 mx-auto g-4 justify-content-center" style="color: var(--black);">
				<div class="col">
					<div class="jadwal imsak row p-3">
						<div class="col-6 px-0 px-md-2 px-lg-0">
							<h5 class="m-0">Imsak</h5>
							<h4 class="waktu m-0" style="font-weight: 700;">-</h4>
						</div>
						<div class="col-6 ps-3 pe-0 text-center">
							<img src="<?= base_url('assets/img/shalat/imsak.png') ?>" class="jadwal-icon" style="margin-bottom: -10px;" alt="Imsak">
						</div>
					</div>
				</div>
				<div class="col">
					<div class="jadwal subuh row p-3">
						<div class="col-6 px-0 px-md-2 px-lg-0">
							<h5 class="m-0">Subuh</h6>
								<h4 class="waktu m-0" style="font-weight: 700;">-</h4>
						</div>
						<div class="col-6 ps-3 pe-0 text-center">
							<img src="<?= base_url('assets/img/shalat/subuh.png') ?>" class="jadwal-icon" style="margin-bottom: -10px;" alt="Subuh">
						</div>
					</div>
				</div>
				<div class="col">
					<div class="jadwal terbit row p-3">
						<div class="col-6 px-0 px-md-2 px-lg-0">
							<h5 class="m-0">Terbit</h5>
							<h4 class="waktu m-0" style="font-weight: 700;">-</h4>
						</div>
						<div class="col-6 ps-3 pe-0 text-center">
							<img src="<?= base_url('assets/img/shalat/terbit.png') ?>" class="jadwal-icon" style="margin-bottom: -10px;" alt="Terbit">
						</div>
					</div>
				</div>
				<div class="col">
					<div class="jadwal dhuha row p-3">
						<div class="col-6 px-0 px-md-2 px-lg-0">
							<h5 class="m-0">Dhuha</h5>
							<h4 class="waktu m-0" style="font-weight: 700;">-</h4>
						</div>
						<div class="col-6 ps-3 pe-0 text-center">
							<img src="<?= base_url('assets/img/shalat/dhuha.png') ?>" class="jadwal-icon" style="margin-bottom: -10px;" alt="Dhuha">
						</div>
					</div>
				</div>
				<div class="col">
					<div class="jadwal dzuhur row p-3">
						<div class="col-6 px-0 px-md-2 px-lg-0">
							<h5 class="m-0">Dzuhur</h5>
							<h4 class="waktu m-0" style="font-weight: 700;">-</h4>
						</div>
						<div class="col-6 ps-3 pe-0 text-center">
							<img src="<?= base_url('assets/img/shalat/dzuhur.png') ?>" class="jadwal-icon" style="margin-bottom: -10px;" alt="Dzuhur">
						</div>
					</div>
				</div>
				<div class="col">
					<div class="jadwal ashar row p-3">
						<div class="col-6 px-0 px-md-2 px-lg-0">
							<h5 class="m-0">Ashar</h5>
							<h4 class="waktu m-0" style="font-weight: 700;">-</h4>
						</div>
						<div class="col-6 ps-3 pe-0 text-center">
							<img src="<?= base_url('assets/img/shalat/ashar.png') ?>" class="jadwal-icon" style="margin-bottom: -10px;" alt="Ashar">
						</div>
					</div>
				</div>
				<div class="col">
					<div class="jadwal maghrib row p-3">
						<div class="col-6 px-0 px-md-2 px-lg-0">
							<h5 class="m-0">Maghrib</h5>
							<h4 class="waktu m-0" style="font-weight: 700;">-</h4>
						</div>
						<div class="col-6 ps-3 pe-0 text-center">
							<img src="<?= base_url('assets/img/shalat/maghrib.png') ?>" class="jadwal-icon" style="margin-bottom: -10px;" alt="Maghrib">
						</div>
					</div>
				</div>
				<div class="col">
					<div class="jadwal isya row p-3">
						<div class="col-6 px-0 px-md-2 px-lg-0">
							<h5 class="m-0">Isya'</h5>
							<h4 class="waktu m-0" style="font-weight: 700;">-</h4>
						</div>
						<div class="col-6 ps-3 pe-0 text-center">
							<img src="<?= base_url('assets/img/shalat/isya.png') ?>" class="jadwal-icon" style="margin-bottom: -10px;" alt="Isya'">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Modal Waktu Sholat -->
	<div class="modal fade" id="daftarKota" tabindex="-1" aria-labelledby="daftarKotaLabel" aria-hidden="true" style="color: var(--blue2);">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="daftarKotaLabel">Daftar Kota</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div id="daftar-kota" class="modal-body daftar-kota">
					<div class="input-kota fuzzy-search mb-3">
						<input class="px-3 py-2 input-group" type="text" onclick="this.select()" style="background-color: var(--white); border: 1px solid var(--blue1); border-radius: 3px;" placeholder="Cari Nama Kota / Daerah...">
					</div>
					<div class="daftar list px-2" style="letter-spacing: 1px; max-height: 40vh; overflow: auto;"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Waktu Sholat -->


	<!-- Arah Kiblat -->
	<section class="arahkiblat py-5" style="background-color:var(--cokelat1);" id="arahkiblat">
		<div class="container mx-auto">
			<div class="col">
				<a href="<?= base_url('HomePage/arahkiblat') ?>" style="display: block;" target="blank">
					<div class="px-1 py-3 text-center" style="background-color: var(--cream); color: var(--black); border-radius: 50px; cursor: pointer;">
						<h6 style="font-weight: 600;">PENCARI ARAH KIBLAT</h6>
						<img src="<?= base_url('assets/img/kiblat.jpg') ?>" class="img-fluid mb-3" width="120" height="50" style="border-radius: 50%" alt="Al-Quran">
						<h6 style="font-weight: 600;">Ayo Mulai</h6>
					</div>
				</a>
			</div>
		</div>
	</section>
	<!-- Arah Kiblat -->

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

<!-- JS Source -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>
<script src="<?= base_url('assets/js/hijri_date.js') ?>"></script>
<script src="<?= base_url('assets/js/list.js') ?>"></script>
<script>
	// Set ayat Al-Quran acak
	$.ajax({
		url: 'https://api.banghasan.com/quran/format/json/acak',
		success: results => {
			const nomerAyat = results.acak.ar.ayat;
			const nomerSurat = results.acak.ar.surat;
			const namaSurat = results.surat.nama;
			const ayat = results.acak.ar.teks;
			const arti = results.acak.id.teks;

			$('.satu-ayat .ayat').text(ayat);
			$('.satu-ayat .surat').text(`Q.S ${namaSurat} ${nomerSurat}:${nomerAyat}`);
			$('.satu-ayat .arti').text(arti);
		}
	})


	const MasehiDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
	const MasehiMonths = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']

	const masehiTime = new Date().getTime();
	const masehiDay = new Date().getDay()
	const masehiDate = (new Date().getDate()).toString();
	const masehiMonth = (new Date().getMonth() + 1).toString();
	const masehiYear = (new Date().getFullYear()).toString();
	const masehiFullDate = `${masehiYear}/${masehiMonth.length == 1 ? '0' + masehiMonth : masehiMonth}/${masehiDate.length == 1 ? '0' + masehiDate : masehiDate}`;

	const hijriyahTime = new HijriDate().getTime();
	const hijriyahDate = new HijriDate().getDate();
	const hijriyahMonth = new HijriDate().getMonthName();
	const hijriyahYear = new HijriDate().getFullYear();

	// Set tanggal masehi dan hijriyah
	$('.tanggal .masehi').text(`${MasehiDays[masehiDay]}, ${masehiDate} ${MasehiMonths[masehiMonth-1]} ${masehiYear}`)
	$('.tanggal .hijriyah').text(`${hijriyahDate} ${hijriyahMonth} ${hijriyahYear} H`)


	// Set lokasi default pada bagian jadwal sholat
	let lokasiDefault = JSON.parse(localStorage.getItem('kota-pilihan'));
	if (!lokasiDefault) {
		lokasiDefault = {
			name: 'Jakarta',
			id: 1301
		}
	}
	$('.kota-pilihan').html(lokasiDefault.name);

	$.ajax({
		url: `https://api.myquran.com/v1/sholat/jadwal/${lokasiDefault.id}/${masehiFullDate}`,
		success: results => {
			const jadwalSholat = results.data.jadwal;
			$('.jadwal.imsak .waktu').text(jadwalSholat.imsak)
			$('.jadwal.subuh .waktu').text(jadwalSholat.subuh)
			$('.jadwal.terbit .waktu').text(jadwalSholat.terbit)
			$('.jadwal.dhuha .waktu').text(jadwalSholat.dhuha)
			$('.jadwal.dzuhur .waktu').text(jadwalSholat.dzuhur)
			$('.jadwal.ashar .waktu').text(jadwalSholat.ashar)
			$('.jadwal.maghrib .waktu').text(jadwalSholat.maghrib)
			$('.jadwal.isya .waktu').text(jadwalSholat.isya)
		}
	});

	// Set modal daftar kota
	$.ajax({
		url: 'https://api.myquran.com/v1/sholat/kota/semua',
		success: results => {
			const daftarKota = results;
			let fragmentDaftarKota = '';
			daftarKota.forEach(kota => {
				let namaKota = kota.lokasi.split(' ');
				for (let i = 0; i < namaKota.length; i++) {
					namaKota[i] = namaKota[i].toLowerCase();
					namaKota[i] = namaKota[i].replace(namaKota[i][0], namaKota[i][0].toUpperCase())
				}

				fragmentDaftarKota += `
            <div class="kota m-0 p-2" data-id-kota="${kota.id}" data-bs-dismiss="modal">
              <h6 class="name m-0" style="font-weight: 400;">${namaKota.join(' ')}</h6>
            </div>
         `
			});
			$('.daftar-kota .daftar').html(fragmentDaftarKota);

			// Set List.js
			new List('daftar-kota', {
				valueNames: ['name'],
			});

			// Ubah kota pilihan saat daftar kota di klik
			$('.kota').on('click', function() {
				$('.kota-pilihan').html($(this).text())
				$('.kota-pilihan').attr('data-id-kota', $(this).data('idKota'))

				localStorage.setItem('kota-pilihan', JSON.stringify({
					name: $(this).text(),
					id: $(this).data('idKota')
				}))

				gantiJadwalSholatDaerah($(this).data('idKota'), masehiFullDate);
			})
		}
	});


	// Set hari berikutnya dan hari sebelumnya pada jadwal sholat
	let changedHijriyahTime = hijriyahTime;
	let changedMasehiTime = masehiTime;
	$('.tanggal-wrapper .prev-date').on('click', function() {
		changedHijriyahTime -= 86400000;
		changedMasehiTime -= 86400000;
		const changedHijriyahDate = new HijriDate(changedHijriyahTime).getDate();
		const changedHijriyahMonth = new HijriDate(changedHijriyahTime).getMonthName();
		const changedHijriyahYear = new HijriDate(changedHijriyahTime).getFullYear();

		const changedMasehiDay = (new Date(changedMasehiTime).getDay()).toString();
		const changedMasehiDate = (new Date(changedMasehiTime).getDate()).toString();
		const changedMasehiMonth = (new Date(changedMasehiTime).getMonth() + 1).toString();
		const changedMasehiYear = (new Date(changedMasehiTime).getFullYear()).toString();
		const changedMasehiFullDate = `${changedMasehiYear}/${changedMasehiMonth.length == 1 ? '0' + changedMasehiMonth : changedMasehiMonth}/${changedMasehiDate.length == 1 ? '0' + changedMasehiDate : changedMasehiDate}`

		$('.tanggal .masehi').text(`${MasehiDays[changedMasehiDay]}, ${changedMasehiDate} ${MasehiMonths[changedMasehiMonth]}`)
		$('.tanggal .hijriyah').text(`${changedHijriyahDate} ${changedHijriyahMonth} ${changedHijriyahYear} H`)

		gantiJadwalSholatDaerah($('.kota-pilihan').data('idKota'), changedMasehiFullDate)
	})

	$('.tanggal-wrapper .next-date').on('click', function() {
		changedHijriyahTime += 86400000;
		changedMasehiTime += 86400000;

		const changedHijriyahDate = new HijriDate(changedHijriyahTime).getDate();
		const changedHijriyahMonth = new HijriDate(changedHijriyahTime).getMonthName();
		const changedHijriyahYear = new HijriDate(changedHijriyahTime).getFullYear();

		const changedMasehiDay = (new Date(changedMasehiTime).getDay()).toString();
		const changedMasehiDate = (new Date(changedMasehiTime).getDate()).toString();
		const changedMasehiMonth = (new Date(changedMasehiTime).getMonth() + 1).toString();
		const changedMasehiYear = (new Date(changedMasehiTime).getFullYear()).toString();
		const changedMasehiFullDate = `${changedMasehiYear}/${changedMasehiMonth.length == 1 ? '0' + changedMasehiMonth : changedMasehiMonth}/${changedMasehiDate.length == 1 ? '0' + changedMasehiDate : changedMasehiDate}`

		$('.tanggal .masehi').text(`${MasehiDays[changedMasehiDay]}, ${changedMasehiDate} ${MasehiMonths[changedMasehiMonth]}`)
		$('.tanggal .hijriyah').text(`${changedHijriyahDate} ${changedHijriyahMonth} ${changedHijriyahYear} H`)

		gantiJadwalSholatDaerah($('.kota-pilihan').data('idKota'), changedMasehiFullDate)
	})


	function gantiJadwalSholatDaerah(idKota, tanggal) {
		$('.jadwal.imsak .waktu').text('-')
		$('.jadwal.subuh .waktu').text('-')
		$('.jadwal.terbit .waktu').text('-')
		$('.jadwal.dhuha .waktu').text('-')
		$('.jadwal.dzuhur .waktu').text('-')
		$('.jadwal.ashar .waktu').text('-')
		$('.jadwal.maghrib .waktu').text('-')
		$('.jadwal.isya .waktu').text('-')

		// Set waktu sholat di kota pilihan
		$.ajax({
			url: `https://api.myquran.com/v1/sholat/jadwal/${idKota}/${tanggal}`,
			success: results => {
				const jadwalSholat = results.data.jadwal;
				$('.jadwal.imsak .waktu').text(jadwalSholat.imsak)
				$('.jadwal.subuh .waktu').text(jadwalSholat.subuh)
				$('.jadwal.terbit .waktu').text(jadwalSholat.terbit)
				$('.jadwal.dhuha .waktu').text(jadwalSholat.dhuha)
				$('.jadwal.dzuhur .waktu').text(jadwalSholat.dzuhur)
				$('.jadwal.ashar .waktu').text(jadwalSholat.ashar)
				$('.jadwal.maghrib .waktu').text(jadwalSholat.maghrib)
				$('.jadwal.isya .waktu').text(jadwalSholat.isya)
			}
		})
	}

	// last read
	const smartQuran = JSON.parse(localStorage.getItem('SMART QURAN'))
	if (!jQuery.isEmptyObject(smartQuran)) {
		let url = $('#terakhirDiBaca').find('a').attr('href');

		$('#terakhirDiBaca').removeClass('d-none');
		$('#suratTerkahirDiBaca').text(`Surat ${smartQuran.bacaanTerakhir.namaSurat} - Ayat ${smartQuran.bacaanTerakhir.nomerAyat + 1}`);

		// set url
		$('#terakhirDiBaca').find('a').attr('href', `${url}?nama=${smartQuran.bacaanTerakhir.namaSurat}&nomer=${smartQuran.bacaanTerakhir.nomerSurat}`)
	} else {
		$('#terakhirDiBaca').addClass('d-none');
	}
</script>

</html>
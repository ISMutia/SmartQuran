<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS Source -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<link href="<?= base_url('assets/css/index.css') ?>" rel="stylesheet" />
	<link href="<?= base_url('assets/css/arah_kiblat.css') ?>" rel="stylesheet" />

	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Smart Qur'an - Arah Qiblat</title>
</head>

<body>

	<!-- Navbar -->
	<nav class="navbar navbar-dark fixed-top py-3" style="color: var(--cokelat2); background-color: var(--cokelat1);">
		<div class="container">
			<a class="navbar-brand font-weight-bold" href="<?= base_url() ?>" style="display: grid; grid-template-columns: 1fr 20px; align-items: center; gap: 10px;">
				<span style="letter-spacing: 3px; font-size: 1.5rem; font-weight: 500;">Smart Qur'an</span>
			</a>
		</div>
	</nav>
	<!-- End Navbar -->

	<!-- Arah Kiblat -->
	<section class="arahkiblat py-5 mt-5" style="background-color:var(--cokelat2);" id="arahkiblat">
		<div class="container">

			<div class="compass">
				<div class="arrow"></div>
				<div class="compass-circle"></div>
				<div class="my-point"></div>
			</div>

			<div class="row text-center mt-5">
				<h7 id="derajatKaabah">Arah Kaabah</h7>
				<h7 id="jarakKaabah">Jarak Kaabah</h7>
				<p id="note"><strong><span>"Gerakkan smartphone anda sampai muncul simbol bulat hijau dan untuk simbol segitiga merah akan mengarahkan ke arah kiblat." </strong></span></p>
			</div>


			<script>
				const compassCircle = document.querySelector(".compass-circle");
				const myPoint = document.querySelector(".my-point");
				const startBtn = document.querySelector(".start-btn");
				const isIOS =
					navigator.userAgent.match(/(iPod|iPhone|iPad)/) &&
					navigator.userAgent.match(/AppleWebKit/);
				let pointDegree;

				function init() {
					navigator.geolocation.getCurrentPosition(locationHandler);
				}

				function startCompass() {
					if (isIOS) {
						DeviceOrientationEvent.requestPermission()
							.then((response) => {
								if (response === "granted") {
									window.addEventListener("deviceorientation", handler, true);
								} else {
									alert("has to be allowed!");
								}
							})
							.catch(() => alert("not supported"));
					} else {
						window.addEventListener("deviceorientationabsolute", handler, true);
					}
				}

				function handler(e) {
					compass = e.webkitCompassHeading || Math.abs(e.alpha - 360);
					compassCircle.style.transform = `translate(-50%, -50%) rotate(${-compass}deg)`;

					// ±15 degree
					if (
						(pointDegree < Math.abs(compass) &&
							pointDegree + 15 > Math.abs(compass)) ||
						pointDegree > Math.abs(compass + 15) ||
						pointDegree < Math.abs(compass)
					) {
						myPoint.style.opacity = 0;
					} else if (pointDegree) {
						myPoint.style.opacity = 1;
					}
				}


				function locationHandler(position) {
					const {
						latitude,
						longitude
					} = position.coords;
					pointDegree = calcDegreeToPoint(latitude, longitude);

					if (pointDegree < 0) {
						pointDegree = pointDegree + 360;
					}

					startCompass();
					// set text
					let derajat = document.querySelector('#derajatKaabah');
					let jarak = document.querySelector('#jarakKaabah');
					let distance = calcCrow(21.422487, 39.826206, latitude, longitude).toFixed(2);
					derajat.textContent = `Arah Qiblat ${pointDegree}⁰`;
					jarak.textContent = `Jarak ke Kaabah ∓${distance} KM`;
				}

				function calcDegreeToPoint(latitude, longitude) {
					// Qibla geolocation
					const point = {
						lat: 21.422487,
						lng: 39.826206
					};

					const phiK = (point.lat * Math.PI) / 180.0;
					const lambdaK = (point.lng * Math.PI) / 180.0;
					const phi = (latitude * Math.PI) / 180.0;
					const lambda = (longitude * Math.PI) / 180.0;
					const psi =
						(180.0 / Math.PI) *
						Math.atan2(
							Math.sin(lambdaK - lambda),
							Math.cos(phi) * Math.tan(phiK) -
							Math.sin(phi) * Math.cos(lambdaK - lambda)
						);
					return Math.round(psi);
				}

				function calcCrow(lat1, lon1, lat2, lon2) {
					var R = 6371; // km
					var dLat = toRad(lat2 - lat1);
					var dLon = toRad(lon2 - lon1);
					var lat1 = toRad(lat1);
					var lat2 = toRad(lat2);

					var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
						Math.sin(dLon / 2) * Math.sin(dLon / 2) * Math.cos(lat1) * Math.cos(lat2);
					var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
					var d = R * c;
					return d;
				}

				function toRad(Value) {
					return Value * Math.PI / 180;
				}

				init();
			</script>
			<!-- Arah Kiblat -->
		</div>
	</section>

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
<script>
	alert('Hanya bisa diakses menggunakan mobile..');
</script>

</html>
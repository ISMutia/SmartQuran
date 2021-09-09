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
	<!-- <link rel="stylesheet" href="index.css"> -->
	<link href="<?= base_url('assets/admin/assets/index.css') ?>" rel="stylesheet" />

	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Document</title>
	<style>
		body {
			display: flex;
			flex-direction: column;
			height: 100vh;
		}

		.compass {
			position: relative;
			width: 320px;
			height: 320px;
			border-radius: 50%;
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
			margin: auto;
		}

		.compass>.arrow {
			position: absolute;
			width: 0;
			height: 0;
			top: -20px;
			left: 50%;
			transform: translateX(-50%);
			border-style: solid;
			border-width: 30px 20px 0 20px;
			border-color: red transparent transparent transparent;
			z-index: 1;
		}

		.compass>.compass-circle,
		.compass>.my-point {
			position: absolute;
			width: 90%;
			height: 90%;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			transition: transform 0.1s ease-out;
			background: url(https://purepng.com/public/uploads/large/purepng.com-compasscompassinstrumentnavigationcardinal-directionspointsdiagram-1701527842316onq7x.png) center no-repeat;
			background-size: contain;
		}

		.compass>.my-point {
			opacity: 0;
			width: 20%;
			height: 20%;
			background: rgb(8, 223, 69);
			border-radius: 50%;
			transition: opacity 0.5s ease-out;
		}

		.start-btn {
			margin-bottom: auto;
		}
	</style>

	<title>Smart Qur'an</title>
</head>

<body style="min-height:  100vh; display: flex; flex-direction: column; justify-content: space-between; ">

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
	<section class="arahkiblat py-5" style="background-color:var(--cokelat2);" id="arahkiblat">
		<div class="container">
			<div id="mapid" class="my-5"></div>

			<div class="compass">
				<div class="arrow"></div>
				<div class="compass-circle"></div>
				<div class="my-point"></div>
			</div>
			<button class="start-btn">Start compass</button>

			<script>
				const compassCircle = document.querySelector(".compass-circle");
				const myPoint = document.querySelector(".my-point");
				const startBtn = document.querySelector(".start-btn");
				const isIOS =
					navigator.userAgent.match(/(iPod|iPhone|iPad)/) &&
					navigator.userAgent.match(/AppleWebKit/);

				function init() {
					startBtn.addEventListener("click", startCompass);
					navigator.geolocation.getCurrentPosition(locationHandler);

					if (!isIOS) {
						window.addEventListener("deviceorientationabsolute", handler, true);
					}
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

				let pointDegree;

				function locationHandler(position) {
					const {
						latitude,
						longitude
					} = position.coords;
					pointDegree = calcDegreeToPoint(latitude, longitude);

					if (pointDegree < 0) {
						pointDegree = pointDegree + 360;
					}
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

				init();
			</script>
			<!-- Arah Kiblat -->

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

</html>
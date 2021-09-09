<!DOCTYPE html>
<!-- upto 2 directory depth-->
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin" />
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700;800&amp;display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700;800&amp;display=swap" media="print" onload="this.media='all'" />
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700;800&amp;display=swap" />
    </noscript>
    <link href="<?= base_url('assets/info/css/font-awesome/css/all.min.css?ver=1.2.0') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/info/css/bootstrap-icons/bootstrap-icons.css?ver=1.2.0') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/info/css/bootstrap.min.css?ver=1.2.0') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/info/css/aos.css?ver=1.2.0') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/info/css/main.css?ver=1.2.0') ?>" rel="stylesheet">
    <noscript>
        <style type="text/css">
            [data-aos] {
                opacity: 1 !important;
                transform: translate(0) scale(1) !important;
            }
        </style>
    </noscript>
</head>

<body id="top">
    <header class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="header-nav" role="navigation">
            <div class="container" style="text-align: center"><a class="link-dark navbar-brand site-title mb-0" href="#">
                    <marquee>Girl's PNP II</marquee>
            </div>
        </nav>
    </header>
    <div class="page-content">
        <div id="content">
            <div class="section px-2 px-lg-4 pt-5" id="profile">
                <div class="container">
                    <div class="text-center mb-5">
                    </div>
                    <div class="grid bp-gallery pb-3" data-aos="zoom-in-up" data-aos-delay="100">
                        <div class="grid-sizer"></div>
                        <div class="grid-item"><a href="https://www.instagram.com/adikmutia/" target="_blank">
                                <figure class="portfolio-item"><img src="<?= base_url('assets/admin/assets/img/mutia.jpg') ?>" data-bp="<?= base_url('assets/admin/assets/img/mutia.jpg') ?>" />
                                    <figcaption>
                                        <h4 class="h5 mb-0">I.S. Mutia</h4>
                                        <div>Jadilah pribadi yang mandiri yang tidak terlalu bergantung pada siapapun karena bayangan mu pun akan meninggalkan mu dan jadilah pribadi yang selalu berusaha sebelum meminta tolong.</div>
                                    </figcaption>
                                </figure>
                            </a></div>
                        <div class="grid-item"><a href="https://www.instagram.com/callme.rzlyana/" target="_blank">
                                <figure class="portfolio-item"><img src="<?= base_url('assets/admin/assets/img/lin.jpeg') ?>" data-bp="<?= base_url('assets/admin/assets/img/lin.jpeg') ?>" data-caption="Example of an optional caption." />
                                    <figcaption>
                                        <h4 class="h5 mb-0">Rozliyana Binti Latola</h4>
                                        <div>Setiap perjuangan butuh pengorbanan, dan
                                            semoga apa yang diperjuangkan membuahkan hasil yang penuh dengan keindahan.</div>
                                    </figcaption>
                                </figure>
                            </a></div>
                        <div class="grid-item"><a href="https://www.instagram.com/afzaso/" target="_blank">
                                <figure class="portfolio-item"><img src="<?= base_url('assets/admin/assets/img/fina.jpeg') ?>" data-bp="<?= base_url('assets/admin/assets/img/fina.jpeg') ?>" />
                                    <figcaption>
                                        <h4 class="h5 mb-0">Afza Sorfina</h4>
                                        <div>Dunia ini penuh dengan orang-orang baik. Jika kamu tidak dapat menemukannya, maka jadilah salah satunya.</div>
                                    </figcaption>
                                </figure>
                            </a></div>
                        <div class="grid-item"><a href="https://www.instagram.com/_nsp14/" target="_blank">
                                <figure class="portfolio-item"><img src="<?= base_url('assets/admin/assets/img/putri.jpeg') ?>" data-bp="<?= base_url('assets/admin/assets/img/putri.jpeg') ?>" data-caption="Example of an optional caption." />
                                    <figcaption>
                                        <h4 class="h5 mb-0">Nuria Sisma Putri</h4>
                                        <div>Walaupun terasa tak seberapa, syukurilah apa pun yang kamu punya. Karena nikmat setiap orang pasti berbeda.</div>
                                    </figcaption>
                                </figure>
                            </a></div>
                    </div>
                </div>
            </div>
            <footer class="pt-4 pb-4 text-center bg-light">
                <div class="container">
                    <div class="my-3">
                        <div class="h4">Mutia & Lin & Fina & Putri</div>
                        <p>Thank You :)</p>
                    </div>
                </div>
        </div>
    </div>
    <div id="scrolltop"><a class="btn btn-secondary" href="#top"><span class="icon"><i class="fas fa-angle-up fa-x"></i></span></a></div>
    <!-- <script src="./scripts/imagesloaded.pkgd.min.js?ver=1.2.0"></script> -->
    <script src="<?= base_url('assets/info/scripts/imagesloaded.pkgd.min.js?ver=1.2.0') ?>"></script>
    <!-- <script src="./scripts/masonry.pkgd.min.js?ver=1.2.0"></script> -->
    <script src="<?= base_url('assets/info/scripts/masonry.pkgd.min.js?ver=1.2.0') ?>"></script>
    <!-- <script src="./scripts/BigPicture.min.js?ver=1.2.0"></script> -->
    <script src="<?= base_url('assets/info/scripts/BigPicture.min.js?ver=1.2.0') ?>"></script>
    <!-- <script src="./scripts/purecounter.min.js?ver=1.2.0"></script> -->
    <script src="<?= base_url('assets/info/scripts/purecounter.min.js?ver=1.2.0') ?>"></script>
    <!-- <script src="./scripts/bootstrap.bundle.min.js?ver=1.2.0"></script> -->
    <script src="<?= base_url('assets/info/scripts/bootstrap.bundle.min.js?ver=1.2.0') ?>"></script>
    <!-- <script src="./scripts/aos.min.js?ver=1.2.0"></script> -->
    <script src="<?= base_url('assets/info/scripts/aos.min.js?ver=1.2.0') ?>"></script>
    <!-- <script src="./scripts/main.js?ver=1.2.0"></script> -->
    <script src="<?= base_url('assets/info/scripts/main.js?ver=1.2.0') ?>"></script>
</body>

</html>
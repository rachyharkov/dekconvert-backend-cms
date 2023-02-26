<div class="hero-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <span class="subheading mb-2" data-aos="fade-up">Syarat dan Ketentuan</span>
                <h1 class="heading mb-3" data-aos="fade-up" data-aos-delay="100">
                    Syarat dan Ketentuan Memperkuat Layanan Kami
                </h1>
                <p class="mb-5" data-aos="fade-up" data-aos-delay="200">
                    Kami berkomitmen untuk memberikan layanan terbaik kepada Anda. Oleh karena itu, kami telah menetapkan syarat dan ketentuan yang harus Anda patuhi ketika menggunakan layanan kami agar layanan kami dapat berjalan dengan baik.
                </p>
                <p data-aos="fade-up" data-aos-delay="300">
                    <a href="#" class="btn btn-primary mr-2">Syarat & Ketentuan</a>
                    <a href="#" class="btn btn-outline-primary">Hubungi Kami</a>
                </p>
            </div>
            <div class="col-lg-6">
                <div class="img-wrap" data-aos="fade-left">
                    <img src="visitor_assets/images/12982910_5124557.png" alt="Image" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section section-3 pt-0">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12" data-aos="fade-up">
                @if($syarat_ketentuan)
                    <?= html_entity_decode($syarat_ketentuan) ?>
                @else
                    <p class="text-center">Syarat dan Ketentuan sedang tidak tersedia saat ini, silahkan hubungi admin melalui whatsapp</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="hero-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <span class="subheading mb-2" data-aos="fade-up">Kalkulator</span>
                <h1 class="heading mb-3" data-aos="fade-up" data-aos-delay="100">
                    Bingung dapat berapa? Gunakan Kalkulator Kami!
                </h1>
                <p class="mb-5" data-aos="fade-up" data-aos-delay="200">
                    Simulasikan berapa uang yang akan didapat setelah konversi. Gunakan kalkulator kami untuk mendapatkan hasil yang akurat.
                </p>
                <p data-aos="fade-up" data-aos-delay="300">
                    <a href="faq" class="btn btn-primary mr-2">FAQ</a>
                    <a href="syarat-dan-ketentuan" class="btn btn-outline-primary">Syarat dan Ketentuan</a>
                </p>
            </div>
            <div class="col-lg-6">
                <livewire:widget-kalkulator-convert :simcardproviderwithkurs="$simcardproviderwithkurs" :metodepembayaran="$metodepembayaran" />
            </div>
        </div>
    </div>
</div>

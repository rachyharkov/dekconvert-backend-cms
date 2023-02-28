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
                    <a href="#" class="btn btn-primary mr-2">FAQ</a>
                    <a href="#" class="btn btn-outline-primary">Convert Sekarang!</a>
                </p>
            </div>
            <div class="col-lg-6">
                <div class="form-kalkulator" style="max-width: 100%;width: 370px;margin: auto;">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="providerSimcard" class="form-label">Pilih Provider</label>
                        <select id="providerSimcard" class="form-control">
                            @foreach ($simcardproviderwithkurs as $sp )
                                <option value="{{ $sp['id'] }}">{{ $sp['simcard_provider_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bankEwalletTujuan" class="form-label">Bank/E-Wallet</label>
                        <select id="bankEwalletTujuan" class="form-control">
                            @foreach ($simcardproviderwithkurs as $sp )
                                <option value="{{ $sp['id'] }}">{{ $sp['simcard_provider_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

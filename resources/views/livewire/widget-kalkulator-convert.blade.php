<div class="form-kalkulator" style="max-width: 100%;width: 370px;margin: auto;">
    <form wire:submit.prevent="calculateConvertResult" wire:key="{{$timestampnya}}">
        <div class="mb-3">
            <label for="jumlah_pulsa_dimiliki" class="form-label">Jumlah Pulsa yang Dimiliki</label>
            <input type="text" class="form-control" id="jumlah_pulsa_dimiliki" aria-describedby="Jumlah Pulsa Help" name="pulsa_dimiliki" wire:model="pulsa_dimiliki" required>
        </div>
        <div class="mb-3">
            <label for="providerSimcard" class="form-label">Pilih Provider</label>
            <select id="providerSimcard" class="form-control" name="asal_provider" wire:model="asal_provider" required>
                <option value="">Pilih Provider</option>
                @foreach ($simcardproviderwithkurs as $sp)
                <option value="{{ $sp['id'] }}">{{ $sp['simcard_provider_name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="bankEwalletTujuan" class="form-label">Bank/E-Wallet</label>
            <select id="bankEwalletTujuan" class="form-control" name="tujuantempatcair" wire:model="tujuantempatcair" required>
                <option value="">Pilih Tujuan Cair</option>
                @foreach ($metodepembayaran as $mp)
                    <option value="{{ $mp['id'] }}">{{ $mp['nama_metode_pembayaran'] }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary" style="width: 100%;" wire:loading.remove>Convert!</button>
        <button type="button" class="btn btn-primary" style="width: 100%;" wire:loading>
            Memproses...
        </button>
        <div class="mb-3">
            @if($convertResult)
                <div class="alert mt-3" role="alert" style="
                    background-color: #f8f9fa;
                    border-color: #f8f9fa;
                    color: #212529;
                    border-radius: 0.25rem;
                    border: 1px solid transparent;
                    padding: 1rem 1rem;
                    margin-bottom: 1rem;
                    ">

                    <h4 class="alert-heading">Hasil Konversi &#x1F389;</h4>
                    <p>Anda akan mendapatkan <strong>*{{ $convertResult['result_with_biaya_admin'] }}</strong> pada {{ $convertResult['tujuan_tempat_cair'] }}</p>
                    <p>Sudah siap convert? <a class="btn btn-primary btn-sm" href="https://api.whatsapp.com/send?phone={{$convertResult['whatsapp_number']}}&text=Halo%20Admin%20Saya%20ingin%20convert%20pulsa%20sebesar%20{{$convertResult['result_with_biaya_admin']}}" style="font-size: 11px;padding: 6px;margin-top: -3px;" target="_blank" rel="noopener noreferrer">Convert Sekarang!</a></p>
                    <hr>
                    <p style="font-size:9px; font-style:italic; margin: 0;">*Sesuai dengan kebijakan tujuan tempat cair anda pada {{ $convertResult['tujuan_tempat_cair'] }}, biaya admin sebesar <b>{{ numberToIdr($convertResult['biaya_admin']) }}</b> dibebankan pada hasil convert diatas.</p>
                    <p style="font-size:9px; font-style:italic;">*Perhitungan konversi menggunakan rumus <b>jumlah pulsa yang dimiliki * rate - biaya admin</b>, dalam kalkulator yang baru saja anda ekskusi menjalankan perhitungan sebagai berikut: <b>{{ $convertResult['pulsa_dimiliki'] }} * {{ $convertResult['kena_rate'] }} - {{ $convertResult['biaya_admin'] }} = {{ $convertResult['result_with_biaya_admin'] }}</b></p>
                </div>
            @endif
        </div>
        {{-- @if ($convertResult)
        <div class="alert alert-success mt-3" role="alert">
            <h4 class="alert-heading">Hasil Konversi</h4>
            <p>Anda akan mendapatkan <strong>{{ $convertResult }}</strong> pada {{ $tujuantempatcair }}</p>
            <hr>
            <p class="mb-0">Terima kasih telah menggunakan layanan kami.</p> --}}
    </form>
    <script>
        var rupiah = document.querySelector("#jumlah_pulsa_dimiliki");
        rupiah.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, "Rp. ");
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }
    </script>

</div>

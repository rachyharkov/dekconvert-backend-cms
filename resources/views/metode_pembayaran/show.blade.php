<div class="white_box_tittle list_header">
    <h4>Detail Metode Pembayaran</h4>
</div>
<table class="table table-striped table-bordered">
    <tbody>
        <tr>
            <td colspan="3">
                <img src="{{ asset('img/metode_pembayaran/' . $metode_pembayaran['gambar']) }}" alt="image {{ $metode_pembayaran['nama_metode_pembayaran'] }}" style="width: 100%;"/>
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $metode_pembayaran['nama_metode_pembayaran'] }}</td>
        </tr>
        <tr>
            <td>Jenis</td>
            <td>:</td>
            <td>{{ $metode_pembayaran['jenis_metode_pembayaran'] }}</td>
        </tr>
        <tr>
            <td>No. Rekening</td>
            <td>:</td>
            <td>{{ $metode_pembayaran['nomor_rekening'] }}</td>
        </tr>
        <tr>
            <td>Atas Nama</td>
            <td>:</td>
            <td>{{ $metode_pembayaran['atas_nama'] }}</td>
        </tr>
        <tr>
            <td>Biaya Admin</td>
            <td>:</td>
            <td>{{ $metode_pembayaran['biaya_admin'] }}</td>
        </tr>
        <tr>
            <td>Updated At</td>
            <td>:</td>
            <td>{{ $metode_pembayaran['updated_at'] }}</td>
        </tr>

    </tbody>
</table>

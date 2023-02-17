<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row">
            <h5>Last updated: {{ $updated_at }}</h5>
            <form id="instruksi-transaksi" action="POST" method="{{ route('instruksi_transaksi.index') }}" enctype="multipart/form-data" wire:ignore>
                <textarea id="ckeditortextarea" name="instruksi_transaksi" class="form-control" rows="10" cols="80">
                    {{ $instruksi_transaksi_text }}
                </textarea>
            </form>
        </div>
    </div>
</div>

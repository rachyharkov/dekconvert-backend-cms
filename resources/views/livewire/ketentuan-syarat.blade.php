<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row">
            <h5>Last updated: {{ $updated_at }}</h5>
            <form id="ketentuan-syarat" action="POST" method="{{ route('ketentuan_syarat.index') }}" enctype="multipart/form-data" wire:ignore>
                <textarea id="ckeditortextarea" name="ketentuan_syarat" class="form-control" rows="10" cols="80">
                    {{ $ketentuan_syarat_text }}
                </textarea>
            </form>
        </div>
    </div>
</div>

<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row">
            <h5>Last updated: {{ $updated_at }}</h5>
            <form id="about" action="POST" method="{{ route('about.index') }}" enctype="multipart/form-data" wire:ignore>
                <textarea id="ckeditortextarea" name="about_text" class="form-control" rows="10" cols="80">
                    {{ $about_text }}
                </textarea>
            </form>
        </div>
    </div>
</div>

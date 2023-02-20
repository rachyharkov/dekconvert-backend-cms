<div>
    @if($page == 'index')
        @include('testimoni.list')
    @elseif($page == 'create')
        @include('testimoni.form')
    @elseif($page == 'edit')
        @include('testimoni.form')
    @elseif ($page == 'show')
        @include('testimoni.show')
    @endif
</div>

<div>
    @if($page == 'index')
        @include('metode_pembayaran.list')
    @elseif($page == 'create')
        @include('metode_pembayaran.form')
    @elseif($page == 'edit')
        @include('metode_pembayaran.form')
    @elseif ($page == 'show')
        @include('metode_pembayaran.show')
    @endif
</div>

<div>
    @if($page == 'index')
        @include('simcard-provider.list')
    @elseif($page == 'create')
        @include('simcard-provider.form')
    @elseif($page == 'edit')
        @include('simcard-provider.form')
    @elseif ($page == 'edit_kurs_rate')
        @include('kurs-rate.form')
    @endif
</div>

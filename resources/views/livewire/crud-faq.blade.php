<div>
    @if($page == 'index')
        @include('faq.list')
    @elseif($page == 'create')
        @include('faq.form')
    @elseif($page == 'edit')
        @include('faq.form')
    @elseif ($page == 'show')
        @include('faq.show')
    @endif
</div>

<?php

namespace App\Http\Livewire\Visitor;

use App\Models\About;
use App\Models\ContactInformation;
use App\Models\Faq;
use App\Models\KetentuanSyarat;
use App\Models\MetodePembayaran;
use App\Models\SimcardProvider;
use App\Models\SocialMedia;
use App\Models\Testimoni;
use Livewire\Component;

class Index extends Component
{
    public $page;
    public $page_title = 'Home';
    public $page_slug = 'home';
    public $simcardproviderwithkurs = [];
    public $about_text;
    public $faq_list;
    public $syarat_ketentuan;
    public $testimonial;
    public $social_media;
    public $contact_information;
    public $main_whatsapp_number;
    public $metodepembayaran;


    protected $listeners = ['changePage'];

    public function mount($page = 'home')
    {
        $this->simcardproviderwithkurs = SimcardProvider::with('kurs_rate')->get()->toArray();
        $this->faq_list = Faq::all()->toArray();
        $this->about_text = About::first()->about_text;
        $this->syarat_ketentuan = KetentuanSyarat::first()->ketentuan_syarat_text;
        $this->testimonial = Testimoni::all()->toArray();
        $this->social_media = SocialMedia::all()->toArray();
        $this->contact_information = ContactInformation::all()->toArray();
        $this->main_whatsapp_number = ContactInformation::where('type', 'whatsapp')->first()->value ?? 'not_set';
        $this->metodepembayaran = MetodePembayaran::all()->toArray();
        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.visitor.index');
    }

    public function changePage($page)
    {
        $this->page = $page;
        $this->dispatchBrowserEvent('changePage', ['page' => $page]);
    }
}

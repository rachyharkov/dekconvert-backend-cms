<?php

namespace App\Http\Livewire;


use App\Models\SeoSetting as ModelsSeoSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class SeoSetting extends Component
{
    use WithFileUploads;

    public $seo;

    protected $listeners = [
        'saveMetaTagSetting',
        'saveOpenGraphSetting',
        'saveItemPropSetting',
        'saveTwitterCardSetting',
    ];

    public function mount()
    {
        $this->refreshData();
    }

    public function render()
    {
        return view('livewire.seo-setting');
    }

    public function refreshData()
    {
        $this->seo = ModelsSeoSetting::first()->toArray();
    }

    public function saveMetaTagSetting()
    {
        // dd($this->seo);
        if ($this->seo['image_src'] instanceof \Livewire\TemporaryUploadedFile) {
            // dd($this->seo['image_src']);
            // unlink(public_path('img/favicon.ico'));
            if (file_exists(public_path('img/og_image.png'))) {
                unlink(public_path('img/og_image.png'));
            }
            $file = $this->seo['image_src'];
            $store = Storage::disk('mycustompublicvisitorasset')->put('favicon.ico', $file->get());
            $getfile = Storage::disk('mycustompublicvisitorasset')->get('favicon.ico');
            move_uploaded_file($getfile, public_path('img/favicon.ico'));
            $this->seo['image_src'] = 'favicon.ico';
        }

        ModelsSeoSetting::first()->update($this->seo);
        $this->refreshData();
        $this->emit('metaTagSettingSaved', ['message' => 'Meta Tag Setting Updated Successfully']);
    }

    public function saveOpenGraphSetting(Request $request)
    {
        if ($this->seo['shortcut_icon'] instanceof \Illuminate\Http\UploadedFile) {

            if (file_exists(public_path('img/og_image.png'))) {
                unlink(public_path('img/og_image.png'));
            }

            $file = $this->seo['shortcut_icon'];
            $store = Storage::disk('mycustompublicvisitorasset')->put('og_image.png', $file->get());
            $getfile = Storage::disk('mycustompublicvisitorasset')->get('og_image.png');
            move_uploaded_file($getfile, public_path('img/og_image.png'));
            $this->seo['shortcut_icon'] = 'og_image.png';
        }
        ModelsSeoSetting::first()->update($this->seo);
        $this->refreshData();
        $this->emit('openGraphSettingSaved', ['message' => 'Open Graph Setting Updated Successfully']);
    }

    public function saveItemPropSetting(Request $request)
    {
        if ($this->seo['itemprop_image'] instanceof \Illuminate\Http\UploadedFile) {

            if (file_exists(public_path('img/itemprop_image.png'))) {
                unlink(public_path('img/itemprop_image.png'));
            }

            $file = $this->seo['itemprop_image'];
            $store = Storage::disk('mycustompublicvisitorasset')->put('itemprop_image.png', $file->get());
            $getfile = Storage::disk('mycustompublicvisitorasset')->get('itemprop_image.png');
            move_uploaded_file($getfile, public_path('img/itemprop_image.png'));
            $this->seo['itemprop_image'] = 'itemprop_image.png';
        }
        ModelsSeoSetting::first()->update($this->seo);
        $this->refreshData();
        $this->emit('itemPropSettingSaved', ['message' => 'Item Prop Setting Updated Successfully']);
    }

    public function saveTwitterCardSetting(Request $request)
    {
        if ($this->seo['twitter_image'] instanceof \Illuminate\Http\UploadedFile) {

            if (file_exists(public_path('img/twitter_image.png'))) {
                unlink(public_path('img/twitter_image.png'));
            }

            $file = $this->seo['twitter_image'];
            $store = Storage::disk('mycustompublicvisitorasset')->put('twitter_image.png', $file->get());
            $getfile = Storage::disk('mycustompublicvisitorasset')->get('twitter_image.png');
            move_uploaded_file($getfile, public_path('img/twitter_image.png'));
            $this->seo['twitter_image'] = 'twitter_image.png';
        }

        ModelsSeoSetting::first()->update($this->seo);
        $this->refreshData();
        $this->emit('twitterCardSettingSaved', ['message' => 'Twitter Card Setting Updated Successfully']);
    }
}

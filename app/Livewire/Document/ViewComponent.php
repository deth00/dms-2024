<?php

namespace App\Livewire\Document;

use Cookie;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ViewComponent extends Component
{
    public $doc;
    public function mount($id){
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
        $doc = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/doc-edit/'.$id);
        $this->doc = $doc['data'];
    }
    public function render()
    {
        return view('livewire.document.view-component');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class WebDeshboardComponent extends Component
{
    public $data, $token, $user;

    public function mount()
    {
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');

    }
    public function render()
    {
        $res = Http::withToken($this->token)->get('http://192.168.128.193:8080/api/list-web');
        $this->data = $res['data'];
        return view('livewire.web-deshboard-component')->layout('components.layouts.web');
    }
}

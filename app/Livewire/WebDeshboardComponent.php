<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class WebDeshboardComponent extends Component
{
    public $data, $data2, $token, $user;

    public function mount()
    {
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
    }
    public function render()
    {
        $rol = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/list-web', [
            'del_id' => 2,
        ]);
        $bai = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/list-web', [
            'del_id' => 3,
        ]);
        $this->data = $rol['data'];
        $this->data2 = $bai['data'];
        return view('livewire.web-deshboard-component')->layout('components.layouts.web');
    }
}

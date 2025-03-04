<?php

namespace App\Livewire\Settings;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class UserComponent extends Component
{
    public $user, $token;
    public $data;

    public function mount()
    {
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
    }

    public function render()
    {
        $res = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/get-user', [
            'id' => $this->user,
        ]);
        $this->data = $res['data'];
        return view('livewire.settings.user-component');
    }

    public function edit($ids)
    {
        // dd($ids);
        return redirect(route('user-edit', $ids));
    }
}

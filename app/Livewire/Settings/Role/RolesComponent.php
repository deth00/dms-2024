<?php

namespace App\Livewire\Settings\Role;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Facades\Cookie;

class RolesComponent extends Component
{
    public $user, $token;
    public $roles=[];

    public function mount()
    {
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
    }
    public function render()
    {
        $res = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/roles');

        if ($res['message'] == 'success') {
            $this->roles = $res['data'];
        }
        // dd($this->roles);
        return view('livewire.settings.role.roles-component');
    }
}

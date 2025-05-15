<?php

namespace App\Livewire;

use App\Http\Controllers\CheckRoute;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class DashboardComponent extends Component
{
    public $doc = [];
    public $user, $token;

    public function mount()
    {

        // $checkRoute = new CheckRoute();
        // $checkRoute->checkUerId();
        // // dd($this->checkUerId());
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
    }

    public function render()
    {
        $data = Http::withToken($this->token)->get('http://192.168.128.193:8080/api/dashboard');
        if ($data['message'] == 'success') {
            $this->doc = $data['data'];
        }

        return view('livewire.dashboard-component');
    }



    // public function shouldApp()
    // {
    //     return redirect('http://192.168.10.60:8099/user');
    // }
}

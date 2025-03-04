<?php

namespace App\Livewire\Settings\Role;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Facades\Cookie;

class CreateComponent extends Component
{
    public $token, $user;
    public $name, $selectedtypes = [], $select = [];

    public function amout()
    {
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
    }
    public function render()
    {
        return view('livewire.settings.role.create-component');
    }

    public function store()
    {
        $a = ['a','b','c'];
        $b = ['d','e','f'];
        $this->selectedtypes = array_merge($a , $b);
        $cccc = implode(",", $this->selectedtypes);
        dd($cccc);
        try {
            // $this->validate([
            //     'name' => 'required',
            // ], [
            //     'name.required' => 'ກະລນາປ້ອນຊື່ສິດການເຂົ້າຖິງກ່ອນ!',
            // ]);

            foreach ($this->selectedtypes as $item) {
                $d = array_push($this->select, $item);
            }
         
            $con = implode(",", $this->select);
            dd($con);
            // $res = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/roles-create', [
            //     'name' => $this->name,
            //     'document' => true,
            //     'acc' => null,
            //     'value' => $con,
            //     'user' => $this->user,
            // ]);
            // if ($res[''] == '') {
            //     session()->flash('success', 'ເພີ່ມຂໍ້ມູນສຳເລັດ');
            //     return redirect(route('roles'));
            // } else {
            //     $this->dispatch('alert', type: 'danger', message: 'ເພີ່ມຂໍ້ມູນບໍ່ສຳເລັດ');
            // }
            

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

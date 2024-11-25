<?php

namespace App\Livewire\Auth;

use Cookie;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Regis2Component extends Component
{
    public $code, $regis_id;

    public function mount($id){
        $this->regis_id = $id;
    }

    public function render()
    {
        return view('livewire.auth.regis2-component')->layout('components.layouts.regis.app');
    }

    public function back(){
        return redirect(route('regis'));
    }

    public function store(){
        $this->validate([
            'code'=>'required',
        ]);

        $response = Http::post('http://192.168.128.193:8080/api/register-finish', [
            'id' => $this->regis_id,
            'code' => $this->code,
        ]);
        if($response){
            if($response['message'] == 'success'){
                session()->flash('success', 'ລົງທະບຽນສຳເລັດ');
                return redirect(route('login'));
            }elseif($response['message'] == 'account_is_registration'){
                $this->dispatch('alert', type: 'warning', message: 'ບັນຊີນີ້ມີໃນລະບົບແລ້ວ ກະລຸນາກວດຄືນ!');
            }else{
                $this->dispatch('alert', type: 'warning', message: 'ລະຫັດບໍ່ຖືກຕ້ອງກະລຸນາລອງໃໝ່!');
            }
        }else{
            $this->dispatch('alert', type: 'error', message: 'ເກີດຂໍ້ຜິດພາດ!');
        }
        
    }
}

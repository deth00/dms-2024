<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ForgotPasswordComponent extends Component
{
    public $user_id, $password, $confirm_password, $pass;
    
    public function mount($id){
        $this->user_id = $id;
    }

    public function render()
    {
        return view('livewire.auth.forgot-password-component')->layout('components.layouts.login.app');
    }

    public function back(){
        return redirect(route('login'));
    }

    public function confirm(){
        // dd('kk');
        $this->validate([
            'pass'=>'required',
            'password'=>'required',
            'confirm_password'=>'required',
        ]);

        if($this->password == $this->confirm_password){
            $response = Http::post('http://192.168.128.193:8080/api/confirm-pass',[
                'id'=>$this->user_id,
                'pass'=>$this->pass,
                'password'=>$this->password,
            ]);
            if($response['message'] == 'success'){
                session()->flash('success', 'ປ່ຽນລະຫັດສຳເລັດ');
                return redirect(route('login'));
            }else{
                $this->dispatch('alert', type: 'error', message: 'ລະຫັດຢຶນຢັນຜິດ ກະລຸນາລອງໃໝ່!');
            }
        }else{
            $this->dispatch('alert', type: 'warning', message: 'ລະຫັດໃໝ່ ແລະ ລະຫັດຢືນຢັນບໍ່ຕົງກັນ!');
        }
        
        
    }
}

<?php

namespace App\Livewire\Auth;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie ;
use Illuminate\Support\Facades\Http;


class LoginComponent extends Component
{
    public $param = [];
    public $username, $password;
    public $email;
    public $token;

    public function render()
    {
        // dd(Cookie::get('token'));
        return view('livewire.auth.login-component')->layout('components.layouts.login.app');
    }

    public function login(){
        $this->validate([
            'username'=>'required',
            'password'=>'required',
        ],[
            'username.required'=>'ກະລຸນາປ້ອນ ອີເມວ ກ່ອນ!',
            'password.required'=>'ກະລຸນາປ້ອນ ລະຫັດຜ່ານ ກ່ອນ!',
        ]);

        $response = Http::post('http://192.168.128.193:8080/api/login', [
            'email' => $this->username,
            'password' => $this->password,
        ]);

        if($response['message'] != 'success'){
            session()->flash('error', 'ຂໍ້ມູນເຂົ້າລະບົບບໍ່ຖືກຕ້ອງ! ກະລຸນາລອງໃໝ່...');
            return redirect(route('login'));
        }else{
                $cookie = Cookie::queue('token', $response['access_token'], 60 * 24 * 30);
                $cookies = Cookie::queue('user_id', $response['user']['id']);
                $users_cookie = Cookie::queue('user_name', $response['user']['name']);
                $roles_cookie = Cookie::queue('role_id', $response['user']['role_id']);
                $departs_cookie = Cookie::queue('dpart_id', $response['user']['dpart_id']);
                $organi_cookie = Cookie::queue('organi_id', $response['user']['organi_id']);
                $organi_type_cookie = Cookie::queue('organi_type', $response['user']['organi_type']);
                session()->flash('success', 'ເຂົ້າສູ່ລະບົບສຳເລັດ');
                $token = $response['access_token'];
                $id = $response['user']['id'];
                session()->put('auth_token', $token);
                session()->put('id', $id);
                return redirect(route('web-deshboard'));
        }
    }

    public function logout(){
        $token = Cookie::get('token');
        $response = Http::withToken($token)->post('http://192.168.128.193:8080/api/logout');
        session()->flash('success', 'ອອກລະບົບສຳເລັດ');
        return redirect(route('login'));
    }

    public function showReset(){
        $this->dispatch('show-reset');
    }

    public function resetPass(){
        try {
            $response = Http::post('http://192.168.128.193:8080/api/reset-pass',[
                'email'=>$this->email
            ]);
    
            if($response){
                return redirect(route('forgot-password',$response['data']['id']));
            }
        } catch (\Throwable $th) {
            $this->dispatch('alert', type: 'error', message: 'ເກີດຂໍ້ຜິດພາດກະລຸນາລອງໃໝ່!');
        }
    }

    public function register(){
        return redirect(route('regis'));
    }
    
}

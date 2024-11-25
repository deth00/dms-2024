<?php

namespace App\Livewire\Auth;

use Cookie;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\WithFileUploads;

class ProfileComponent extends Component
{
    use WithFileUploads;
    public $users, $token, $count;
    public $userId, $name, $username, $password, $confirm_password, $phone, $emails, $email, $role_id, $branch_id, $profile, $profiles;
    public $editId, $delId, $delName;
    public $search, $dataQ = 15, $dateS, $dateE;
    public $form, $ignore_add = 0;
    public $addId;
    public $branch, $role;

    public function mount()
    {
        $this->token = Cookie::get('token');

        $data = Http::withToken($this->token)->get('http://192.168.128.193:8080/api/user');
        $this->userId = $data['id'];
        $this->name = $data['name'];
        $this->username = $data['emp_name'];
        $this->phone = $data['phone'];
        $this->emails = $data['email'];
        $this->profiles = $data['img'];
    }

    public function render()
    {
        return view('livewire.auth.profile-component');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
        ], [
            'name.required' => 'ກະລຸນາເພີ່ມ ຊື່ພາສາອັງກິດ ກ່ອນ!',
            'phone.required' => 'ກະລຸນາເພີ່ມ ເບີໂທຕິດຕໍ່ ກ່ອນ!',
        ]);

        if ($this->profile) {
            $file = fopen($this->profile->getRealPath(), 'r');
            if ($this->password) {
                $this->validate([
                    'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
                    'confirm_password' => 'required|min:6|required_with:password|same:password',
                ], [
                    'password.required' => 'ກະລຸນາປ້ອນ ລະຫັດຜ່ານ ກ່ອນ!',
                    'password.min' => 'ກະລຸນາປ້ອນລະຫັດຜ່ານ 6 ຕົວຂຶ້ນໄປ',
                    'password.same' => 'ລະຫັດຜ່ານ ແລະ ຢືນຢັນລະຫັດຜ່ານບໍ່ຕົງກັນ',
                    'confirm_password.required' => 'ກະລຸນາປ້ອນ ຢືນຢັນລະຫັດຜ່ານ ກ່ອນ!',
                    'confirm_password.min' => 'ກະລຸນາປ້ອນຢືນຢັນລະຫັດຜ່ານ 6 ຕົວຂຶ້ນໄປ',
                    'confirm_password.same' => 'ລະຫັດຜ່ານ ແລະ ຢືນຢັນລະຫັດຜ່ານບໍ່ຕົງກັນ',
                ]);

                $response = Http::attach(
                    'file',
                    $file,
                    $this->profile->getClientOriginalName()
                )->post('http://192.168.128.193:8080/api/profile', [
                    'userId' => $this->userId,
                    'username' => $this->name,
                    'password' => $this->password,
                    'phone' => $this->phone
                ]);
            } else {
                $response = Http::attach(
                    'file',
                    $file,
                    $this->profile->getClientOriginalName()
                )->post('http://192.168.128.193:8080/api/profile', [
                    'userId' => $this->userId,
                    'username' => $this->name,
                    'phone' => $this->phone
                ]);
            }
        } else {
            if ($this->password) {
                $this->validate([
                    'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
                    'confirm_password' => 'required|min:6|required_with:password|same:password',
                ], [
                    'password.required' => 'ກະລຸນາປ້ອນ ລະຫັດຜ່ານ ກ່ອນ!',
                    'password.min' => 'ກະລຸນາປ້ອນລະຫັດຜ່ານ 6 ຕົວຂຶ້ນໄປ',
                    'password.same' => 'ລະຫັດຜ່ານ ແລະ ຢືນຢັນລະຫັດຜ່ານບໍ່ຕົງກັນ',
                    'confirm_password.required' => 'ກະລຸນາປ້ອນ ຢືນຢັນລະຫັດຜ່ານ ກ່ອນ!',
                    'confirm_password.min' => 'ກະລຸນາປ້ອນຢືນຢັນລະຫັດຜ່ານ 6 ຕົວຂຶ້ນໄປ',
                    'confirm_password.same' => 'ລະຫັດຜ່ານ ແລະ ຢືນຢັນລະຫັດຜ່ານບໍ່ຕົງກັນ',
                ]);

                $response = Http::post('http://192.168.128.193:8080/api/profile', [
                    'userId' => $this->userId,
                    'username' => $this->name,
                    'password' => $this->password,
                    'phone' => $this->phone
                ]);
            } else {
                $response = Http::post('http://192.168.128.193:8080/api/profile', [
                    'userId' => $this->userId,
                    'username' => $this->name,
                    'phone' => $this->phone
                ]);
            }
        }
        session()->flash('success', 'ອັບເດດສຳເລັດ');
        return redirect(route('profile'));
    }
}

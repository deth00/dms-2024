<?php

namespace App\Livewire\Settings\User;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Livewire\WithFileUploads;

class EditComponent extends Component
{
    use WithFileUploads;
    public $users, $token, $count;
    public $userId, $name, $username, $password, $confirm_password, $phone, $emails, $email, $role_id, $branch_id, $profile, $profiles;
    public $editId, $delId, $delName;
    public $search, $dataQ = 15, $dateS, $dateE;
    public $form, $ignore_add = 0;
    public $addId;
    public $branch, $data_role;
    public $brn_id, $dep_id, $sec_id;

    public function mount($id)
    {
        // dd($id);
        $this->token = Cookie::get('token');
        $data = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/user/' . $id);
        $this->userId = $data['data']['id'];
        $this->name = $data['data']['name'];
        $this->username = $data['data']['emp_name'];
        $this->phone = $data['data']['phone'];
        $this->emails = $data['data']['email'];
        $this->profiles = $data['data']['img'];
        $this->role_id = $data['data']['role_id'];
        $all_role = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/roles');
        $this->data_role = $all_role['data'];
        $all_brn = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/roles');

    }
    public function render()
    {
        return view('livewire.settings.user.edit-component');
    }

    public function back()
    {
        return redirect(route('user'));
    }

    public function store()
    {
        // dd($this->profiles);
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
        ], [
            'name.required' => 'ກະລຸນາເພີ່ມ ຊື່ພາສາອັງກິດ ກ່ອນ!',
            'phone.required' => 'ກະລຸນາເພີ່ມ ເບີໂທຕິດຕໍ່ ກ່ອນ!',
        ]);
        if ($this->profile) {
            $file = fopen($this->profile->getRealPath(), 'rw+');
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

                if (auth()->user()->role_id == '1') {
                    $response = Http::post('http://192.168.128.193:8080/api/profile', [
                        'userId' => $this->userId,
                        'username' => $this->name,
                        'password' => $this->password,
                        'phone' => $this->phone,
                        'role_id' => $this->role_id
                    ]);
                } else {
                    $response = Http::post('http://192.168.128.193:8080/api/profile', [
                        'userId' => $this->userId,
                        'username' => $this->name,
                        'password' => $this->password,
                        'phone' => $this->phone,
                        'role_id' => $this->role_id
                    ]);
                }
            } else {
                $response = Http::post('http://192.168.128.193:8080/api/profile', [
                    'userId' => $this->userId,
                    'username' => $this->name,
                    'phone' => $this->phone
                ]);
            }
        }
        session()->flash('success', 'ອັບເດດສຳເລັດ');
        return redirect(route('user'));
    }
}

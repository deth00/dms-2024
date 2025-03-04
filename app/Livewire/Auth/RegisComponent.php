<?php

namespace App\Livewire\Auth;

use Cookie;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class RegisComponent extends Component
{
    public $emp_name, $phone, $email, $name, $password, $confirm_password, $dpart_id = [], $sector_id = [], $unit_id = [], $ori_id = [];
    public $departs = [], $sectors = [], $unit = [], $depByid = [], $data_or = [];

    public function mount()
    {
        $response = Http::post('http://192.168.128.193:8080/api/all-departs', [
            'search' => ""
        ]);

        $this->departs = $response['data'];
    }

    public function render()
    {
        if ($this->dpart_id != []) {
            // dd($this->dpart_id);
            $response1 = Http::post('http://192.168.128.193:8080/api/dpart/' . $this->dpart_id[0]);
            $this->depByid = $response1['data'];
            $res = Http::post('http://192.168.128.193:8080/api/sector-type', [
                'type_id' => $response1['data']['type'],
            ]);
            $this->sectors = $res['data'];
            $this->dispatch('g_id');
        } else {
            $this->sectors = [];
        }

        $res1  = Http::post('http://192.168.128.193:8080/api/organi');
        $this->data_or = $res1['data'];

        return view('livewire.auth.regis-component')->layout('components.layouts.regis.app');
    }

    // public function selectDpart()
    // {
    //     // dd('kk');
    //     $response1 = Http::post('http://192.168.128.193:8080/api/dpart-sectors', [
    //         'department_id' => $this->dpart_id[0],
    //     ]);
    //     $this->sectors = $response1['data'];
    //     $this->dispatch('g_id');
    // }

    public function back()
    {
        return redirect(route('login'));
    }

    public function next()
    {
        // $con = implode(",", $this->ori_id);
        // dd($con);
        $this->validate([
            'name' => 'required',
            'emp_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'dpart_id' => 'required',
            // 'sector_id' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        if ($this->sector_id == []) {
            if ($this->password == $this->confirm_password) {
                $response = Http::post('http://192.168.128.193:8080/api/register', [
                    'name' => $this->name,
                    'emp_name' => $this->emp_name,
                    'phone' => $this->phone,
                    'email' => $this->email,
                    'depart_id' => $this->dpart_id[0],
                    'branch_id' => $this->depByid['branch_id'],
                    'sector_id' => null,
                    'organi_id' => null,
                    'password' => $this->password,
                ]);
                if ($response['message'] == 'success') {
                    return redirect(route('regis-finish', $response['data']['id']));
                } else {
                    $this->dispatch('alert', type: 'warning', message: 'ເກີດຂໍ້ຜິດພາດກະລຸນາລອງໃໝ່!');
                }
            } else {
                $this->dispatch('alert', type: 'warning', message: 'ກວດຄືນລະຫັດຜ່ານ ບໍ່ຕົງກັນ!');
            }
        } else {
            if ($this->password == $this->confirm_password) {
                $response = Http::post('http://192.168.128.193:8080/api/register', [
                    'name' => $this->name,
                    'emp_name' => $this->emp_name,
                    'phone' => $this->phone,
                    'email' => $this->email,
                    'depart_id' => $this->dpart_id[0],
                    'sector_id' => $this->sector_id[0],
                    // 'branch_id' => $this->depByid['branch_id'],
                    'organi_id' => null,
                    'password' => $this->password,
                ]);
                // dd($this->emp_name);
                if ($response['message'] == 'success') {
                    return redirect(route('regis-finish', $response['data']['id']));
                } else {
                    $this->dispatch('alert', type: 'warning', message: 'ເກີດຂໍ້ຜິດພາດກະລຸນາລອງໃໝ່!');
                }
            } else {
                $this->dispatch('alert', type: 'warning', message: 'ກວດຄືນລະຫັດຜ່ານ ບໍ່ຕົງກັນ!');
            }
        }
    }
}

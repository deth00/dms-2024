<?php

namespace App\Livewire\Settings;

use App\Models\Branch;
use App\Models\Departments;
use App\Models\Sector;
use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class SectorComponent extends Component
{
    public $data, $data_brn, $data_dep, $count;
    public $editId, $delId, $delName;
    public $search, $dataQ = 15, $dateS, $dateE;
    public $doc = [];
    public $user, $token;
    public $name, $br_id, $dep_id;

    public function mount()
    {
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
    }

    public function render()
    {
        $br = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/all-branch', [
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
        if ($br['message'] == 'success') {
            $this->data_brn = $br['data'];
        }
        $dep = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/all-depart', [
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
        if ($dep['message'] == 'success') {
            $this->data_dep = $dep['data'];
        }
        $sector = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/sector', [
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
        if ($sector['message'] == 'success') {
            $this->data = $sector['data'];
        }
        return view('livewire.settings.sector-component', compact('br', 'dep', 'sector'));
    }

    public function dataQS(){
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/sector', [
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
        if($response['message'] == 'success'){
            $this->data = $response['data'];
        }
    }

    public function store()
    {

        if ($this->editId) {
            $this->validate([
                'name' => 'required',
                'br_id' => 'required',
                'dep_id' => 'required'
            ], [
                'name.required' => 'ກະລຸນາປ້ອນ ຊື່ກຸ່ມ ກ່ອນ!',
                'br_id.required' => 'ກະລຸນາເລືອກ ສາຂາ ກ່ອນ!',
                'dep_id.required' => 'ກະລຸນາເລືອກ ພະແນກກ່ອນ ກ່ອນ!',
            ]);

            $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/sector-update', [
                'id' => $this->editId,
                'name' => $this->name,
                'branch_id' => $this->br_id,
                'department_id' => $this->dep_id
            ]);

            if ($response['message'] == 'success') {
                session()->flash('success', 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ');
                return redirect(route('sector'));
            }
        } else {
            $this->validate([
                'name' => 'required',
                'br_id' => 'required',
                'dep_id' => 'required'
            ], [
                'name.required' => 'ກະລຸນາປ້ອນ ຊື່ກຸ່ມ ກ່ອນ!',
                'br_id.required' => 'ກະລຸນາເລືອກ ສາຂາ ກ່ອນ!',
                'dep_id.required' => 'ກະລຸນາເລືອກ ພະແນກກ່ອນ ກ່ອນ!',
            ]);

            $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/sector-store', [
                'name' => $this->name,
                'branch_id' => $this->br_id,
                'department_id' => $this->dep_id
            ]);

            if ($response['message'] == 'success') {
                session()->flash('success', 'ເພີ່ມຂໍ້ມູນສຳເລັດ');
                return redirect(route('sector'));
            }
        }
    }

    public function edit($ids)
    {
        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/sector-edit/' . $ids);
        $this->editId = $response['data']['id'];
        $this->name = $response['data']['name'];
        $this->br_id = $response['data']['branch_id'];
        $this->dep_id = $response['data']['department_id'];
    }

    public function delete($ids)
    {
        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/sector-edit/' . $ids);
        $this->name = $response['data']['name'];
        $this->delId = $response['data']['id'];
        $this->dispatch('show-del');
    }

    public function destroy()
    {
        $response = Http::withToken($this->token)->delete('http://192.168.128.193:8080/api/sector-del/' . $this->delId);
        if ($response['message'] == 'success') {
            session()->flash('success', 'ລົບຂໍ້ມູນສຳເລັດ');
            return redirect(route('sector'));
        }
    }
}

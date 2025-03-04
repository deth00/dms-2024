<?php

namespace App\Livewire\Settings;

use App\Models\Branch;
use App\Models\Unit;
use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class UnitCompomemt extends Component
{
    public $data, $data_brn, $count;
    public $editId, $delId, $delName;
    public $search, $dataQ = 15, $dateS, $dateE;
    public $doc = [];
    public $user, $token;
    public $name, $br_id;

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

        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/unit', [
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
  
        if ($response['message'] == 'success') {
            $this->data = $response['data'];
        }

        return view('livewire.settings.unit-compomemt');
    }

    public function dataQS(){
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/unit', [
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
        if($response['message'] == 'success'){
            $this->data = $response['data'];
        }
    }

    public function searchData(){
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/unit', [
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
                'br_id' => 'required'
            ], [
                'name.required' => 'ກະລຸນາປ້ອນ ຊື່ກຸ່ມ ກ່ອນ!',
                'br_id.required' => 'ກະລຸນາເລືອກ ສາຂາ ກ່ອນ!',
            ]);

            $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/unit-update', [
                'id' => $this->editId,
                'name' => $this->name,
                'branch_id' => $this->br_id
            ]);

            if ($response['message'] == 'success') {
                session()->flash('success', 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ');
                return redirect(route('unit'));
            }
        } else {
            $this->validate([
                'name' => 'required',
                'br_id' => 'required'
            ], [
                'name.required' => 'ກະລຸນາປ້ອນ ຊື່ກຸ່ມ ກ່ອນ!',
                'br_id.required' => 'ກະລຸນາເລືອກ ສາຂາ ກ່ອນ!',
            ]);

            $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/unit-store', [
                'name' => $this->name,
                'branch_id' => $this->br_id
            ]);

            if ($response['message'] == 'success') {
                session()->flash('success', 'ເພີ່ມຂໍ້ມູນສຳເລັດ');
                return redirect(route('unit'));
            }
        }
    }

    public function edit($ids)
    {
        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/unit-edit/'.$ids);
        $this->editId = $response['data']['id'];
        $this->name = $response['data']['name'];
        $this->br_id = $response['data']['branch_id'];
    }

    public function delete($ids)
    {
        $this->delId = $ids;
        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/unit-edit/'.$ids);
        $this->delName = $response['data']['name'];
        $this->dispatch('show-del');
    }

    public function destroy()
    {
        $response = Http::withToken($this->token)->delete('http://192.168.128.193:8080/api/unit-del/'.$this->delId);
        if($response['message'] == 'success'){
            session()->flash('success', 'ລົບຂໍ້ມູນສຳເລັດ');
            return redirect(route('unit'));
        }
    }
}

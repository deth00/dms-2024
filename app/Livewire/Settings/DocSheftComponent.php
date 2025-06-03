<?php

namespace App\Livewire\Settings;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class DocSheftComponent extends Component
{
    public $data, $count;
    public $editId, $delId, $delName;
    public $search, $dataQ = 15, $dateS, $dateE;
    public $doc = [];
    public $user, $token;
    public $name;

    public function mount()
    {
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
    }

    public function render()
    {
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-sheft', [
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
        if ($response['message'] == 'success') {
            $this->data = $response['data'];
            $this->count = count($response['data']);
        }
        return view('livewire.settings.doc-sheft-component');
    }

    public function dataQS()
    {
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-sheft', [
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
        if ($response['message'] == 'success') {
            $this->data = $response['data'];
            $this->count = count($response['data']);
        }
    }

    public function searchData()
    {
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-sheft', [
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
        if ($response['message'] == 'success') {
            $this->data = $response['data'];
            $this->count = count($response['data']);
        }
    }

    public function store()
    {
        if ($this->editId) {
            $this->validate([
                'name' => 'required',
            ], [
                'name.required' => 'ກະລຸນາປ້ອນ ຊື່ກຸ່ມ ກ່ອນ!',
            ]);

            $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-sheft-update', [
                'id' => $this->editId,
                'name' => $this->name,
            ]);

            if ($response['message'] == 'success') {
                session()->flash('success', 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ');
                return redirect(route('docsheft'));
            }
        } else {
            $this->validate([
                'name' => 'required',
            ], [
                'name.required' => 'ກະລຸນາປ້ອນ ຊື່ກຸ່ມ ກ່ອນ!',
            ]);

            $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-sheft-store', [
                'name' => $this->name,
            ]);

            if ($response['message'] == 'success') {
                session()->flash('success', 'ເພີ່ມຂໍ້ມູນສຳເລັດ');
                return redirect(route('docsheft'));
            }
        }
    }

    public function edit($ids)
    {
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-sheft/' . $ids);

        $this->editId = $response['data']['id'];
        $this->name = $response['data']['name'];
    }

    public function delete($ids)
    {
        $this->delId = $ids;
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-sheft/' . $ids);
        $this->delName = $response['data']['name'];
        $this->dispatch('show-del');
    }

    public function destroy()
    {
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-sheft-del/' . $this->delId);

        if ($response['message'] == 'success') {
            session()->flash('success', 'ລົບຂໍ້ມູນສຳເລັດ');
            return redirect(route('docsheft'));
        }
    }
}

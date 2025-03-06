<?php

namespace App\Livewire\Document\Secret;

use Illuminate\Support\Facades\Cookie;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SecretRoledComponent extends Component
{
    public $data, $count;
    public $editId, $delId, $delName;
    public $search, $dataQ = 1000, $dateS, $dateE;
    public $doc = [], $data_user = [], $data_team = [];
    public $user, $token;
    public $name, $user_id, $departs = [], $dpart_id = [] , $tm_id = [];

    public function mount()
    {
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
    }

    public function render()
    {
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/group-secret', [
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
        if ($response['message'] == 'success') {
            $this->data = $response['data'];
            $this->count = count($response['data']);
        }
        // dd($this->data);
        $teams = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/teams');
        if ($teams['message'] == 'success') {
            $this->data_team = $teams['data'];
        }

        $depart = Http::post('http://192.168.128.193:8080/api/all-departs', [
            'search' => ""
        ]);
        if ($response['message'] == 'success') {
            $this->departs = $depart['data'];
            $this->count = count($response['data']);
        }


        if ($this->dpart_id != []) {
            $res = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/dpart-user', [
                'qty' => $this->dataQ,
                'search' => $this->search,
                'dpart_id' => $this->dpart_id[0]
            ]);
            if ($response['message'] == 'success') {
                $this->data_user = $res['data'];
            }
            $this->dispatch('g_id');
        } else {
            $this->data_user = [];
        }


        return view('livewire.document.secret.secret-roled-component');
    }

    public function store()
    {
        foreach ($this->user_id as $item) {
            $res = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/group-secret-store', [
                'name' => 'test',
                'user_id' => $item,
                'depart_id' => $this->dpart_id,
                'team_id' => $this->tm_id,
            ]);
        }
        if ($res['message'] == 'success') {
            session()->flash('success', 'ເພີ່ມຂໍ້ມູນສຳເລັດ');
            return redirect(route('document-secret-role'));
        }
    }

    public function delete($ids)
    {
        $this->delId = $ids;
        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/group-secret-id', [
            'id' => $this->delId
        ]);
        $this->delName = $response['data']['emp_name'];
        $this->dispatch('show-del');
    }

    public function destroy()
    {
        $response = Http::withToken($this->token)->delete('http://192.168.128.193:8080/api/group-secret-del/' . $this->delId);
        if ($response['message'] == 'success') {
            session()->flash('success', 'ລົບຂໍ້ມູນສຳເລັດ');
            return redirect(route('document-secret-role'));
        }
    }
}

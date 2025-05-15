<?php

namespace App\Livewire\Document\Secret;

use Illuminate\Support\Facades\Cookie;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SecretRoledComponent extends Component
{
    public $data, $data_tt, $count, $status, $group_id;
    public $editId, $delId, $delName;
    public $search, $dataQ = 1000, $dateS, $dateE;
    public $doc = [], $data_user = [], $data_team = [];
    public $user, $token, $depart_id;
    public $name, $user_id, $departs = [], $dpart_id = [], $tm_id = [];

    public function mount()
    {
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
        $this->depart_id = Cookie::get('dpart_id');
    }

    public function render()
    {
        $res = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/teams-by-user', [
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
        if ($res['message'] == 'success') {
            $this->data_tt = $res['data'];
            $this->count = count($res['data']);
        }
        // dd($this->data_tt['id']);
        if (!empty($this->group_id)) {
            // foreach ($this->data_tt as $item) {
            $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/group-secret', [
                'teamid' => $this->group_id,
            ]);
            // }
            if ($response['message'] == 'success') {
                $this->data = $response['data'];
                $this->count = count($response['data']);
            }
            // dd($this->data);
            $this->dispatch('g_id');
        } else {
            $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/group-secret', [
                'teamid' => $this->data_tt[0]['id'],
            ]);
            if ($response['message'] == 'success') {
                $this->data = $response['data'];
                $this->count = count($response['data']);
            }
            // $this->data = [];
        }

        $teams = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/teams-by-user');
        if ($teams['message'] == 'success') {
            $this->data_team = $teams['data'];
        }

        $depart = Http::post('http://192.168.128.193:8080/api/all-departs', [
            'search' => ""
        ]);
        if ($depart['message'] == 'success') {
            $this->departs = $depart['data'];
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

    public function dataQS()
    {
        // $this->dispatchBrowserEvent('g_id');
    }
    public function searchData()
    {
        // $this->dispatchBrowserEvent('g_id');
    }

    public function add()
    {
        $this->dispatch('show-add');
    }

    public function storeTeam()
    {

        $res = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/teams-store', [
            'name' => $this->name,
            'user_id' => $this->user,
            'dep_id' => $this->depart_id,
        ]);

        if ($res['message'] == 'success') {
            $this->dispatch('hide-add');
            session()->flash('success', 'ເພີ່ມຂໍ້ມູນສຳເລັດ');
            return redirect(route('document-secret-role'));
        }
    }

    public function edit($ids)
    {
        $this->editId = $ids;
        $this->dispatch('show-edit');
        $res = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/teams-edit/' . $this->editId);
        $this->name = $res['data']['name'];
        $this->status = $res['data']['status'];
        // dd($res['data']);
    }

    public function updateTeam()
    {
        // dd($this->status, $this->name, $this->user, $this->depart_id);
        $res1 = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/teams-update', [
            'id' => $this->editId,
            'name' => $this->name,
            'user_id' => $this->user,
            'dep_id' => $this->depart_id,
            'status' => $this->status,
        ]);

        if ($res1['message'] == 'success') {
            $this->dispatch('hide-edit');
            session()->flash('success', 'ເເກ້ໄຂຂໍ້ມູນສຳເລັດ');
            return redirect(route('document-secret-role'));
        }
    }

    public function store()
    {
        $this->validate([
            'tm_id' => 'required',
            'user' => 'required',
            'dpart_id' => 'required',

        ], [
            'tm_id.required' => 'ກະລຸນາເລືອກ ກຸ່ມ ກ່ອນ!',
            'user.required' => 'ກະລຸນາເລືອກ ສະມາຊິກ ກ່ອນ!',
            'dpart_id.required' => 'ກະລຸນາເລືອກ ພະແນກ||ສາຂາ ກ່ອນ!',

        ]);
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
        dd($this->delId);
        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/group-secret-id', [
            'id' => $this->delId
        ]);
        dd($response['data']);
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

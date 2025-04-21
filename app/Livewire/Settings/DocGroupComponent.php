<?php

namespace App\Livewire\Settings;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class DocGroupComponent extends Component
{
    public $data, $count;
    public $editId, $delId, $delName;
    public $token, $user, $user_id, $depart_id, $docgroup_id, $change_id;
    public $doc_groups = [];

    public function mount()
    {
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
        $this->user_id = Cookie::get('user_id');
        $this->depart_id = Cookie::get('dpart_id');

        $group = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-group', [
            'qty' => 99,
            'search' => ''
        ]);
        if ($group['message'] == 'success') {
            $this->doc_groups = $group['data'];
        }
        // dd($this->doc_groups);
    }

    public function render()
    {
        if (!empty($this->docgroup_id)) {
            // dd($this->docgroup_id);
            $res = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-get-GP', [
                'id' => $this->docgroup_id,
                'qty' => 99,
                'search' => ''
            ]);
            if ($res['message'] == 'success') {
                $this->data = $res['data'];
            }
        } else {
            $this->data = [];
        }


        return view('livewire.settings.doc-group-component');
    }

    public function update()
    {
        // dd($this->change_id[0]);
        foreach ($this->data as $item) {
            $res = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-update-GP', [
                'id' => $item['id'],
                'docgroup_id' => $this->change_id[0],
            ]);
        }

        if ($res['message'] == 'success') {
            session()->flash('success', 'ແກ້ໄຂສຳເລັດ');
            return redirect(route('docgroup'));
        }
    }
    public function showdel()
    {
        // dd($this->docgroup_id[0]);
        if (!empty($this->docgroup_id)) {
            $res = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/group-edit/'. $this->docgroup_id[0]);
            // dd($res['data']);
            $this->delName = $res['data']['name'];
            $this->dispatch('show-del');
        }
    }

    public function delete()
    {
        $res = Http::withToken($this->token)->delete('http://192.168.128.193:8080/api/group-del/'. $this->docgroup_id[0]);
        if ($res['message'] == 'success') {
            session()->flash('success', 'ລົບສຳເລັດ');
            return redirect(route('docgroup'));
        }
    }
}

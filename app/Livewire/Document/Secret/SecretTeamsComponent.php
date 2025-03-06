<?php

namespace App\Livewire\Document\Secret;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class SecretTeamsComponent extends Component
{
    public $data, $count, $typename;
    public $docgroup_id, $type, $group_id, $user_id, $doc_no, $valuedt, $name, $file, $files;
    public $hiddenId, $editId, $delId, $delName;
    public $search, $dataQ = 15, $dateS, $dateE;
    public $doc = [];
    public $user, $token, $depart_id;

    public function mount()
    {
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
        $this->depart_id = Cookie::get('dpart_id');
        // dd($this->depart_id);
    }

    public function render()
    {
        $check = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/group-secret-user', [
            'user_id' =>  $this->user
        ]);
        if (!empty($check['data'])) {
            $doc = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/teams-edit/'.$check['data'][0]['team_id']);
            $this->data = $doc['data'];
            // dd($this->data);
            $this->count = count($doc['data']);
        }else{
            $this->data = [];
        }


        return view('livewire.document.secret.secret-teams-component');
    }

    public function add(){
        $this->dispatch('show-add');
    }

    public function store()
    {
            $res = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/teams-store', [
                'name' => $this->name,
                'user_id' => $this->user,
                'dep_id' => $this->depart_id,
            ]);
        
        if ($res['message'] == 'success') {
            $this->dispatch('hide-add');
            session()->flash('success', 'ເພີ່ມຂໍ້ມູນສຳເລັດ');
            return redirect(route('document-secret-teams'));
        }
    }

    public function docs($ids)
    {
        return redirect(route('document-secret', $ids));
    }

    public function edit($ids){
        $this->editId = $ids;
        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/teams-edit/'.$this->editId);
        $data = $response['data'];
        $this->name = $data['name'];
        $this->dispatch('show-edit');
    }

    public function update()
    {
        $res = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/teams-update/', [
            'id' => $this->editId,
            'name' => $this->name,
            'user_id' => $this->user,
            'dep_id' => $this->depart_id,
        ]);
    
    if ($res['message'] == 'success') {
        $this->dispatch('hide-add');
        session()->flash('success', 'ເພີ່ມຂໍ້ມູນສຳເລັດ');
        return redirect(route('document-secret-teams'));
    }
    }

    public function del($ids)
    {
        $this->delId = $ids;
        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/teams-edit/'.$this->delId);
        $data = $response['data'];
        $this->delName = $data['name'];
        $this->dispatch('show-del');
    }

    public function destroy()
    {
        $response = Http::withToken($this->token)->delete('http://192.168.128.193:8080/api/teams-del/'.$this->delId);
        if ($response['message'] == 'success') {
            $this->dispatch('hide-del');
            session()->flash('success', 'ລົບຂໍ້ມູນສຳເລັດ');
            return redirect(route('document-secret-teams'));
        }
       
    }
}

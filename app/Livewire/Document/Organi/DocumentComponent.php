<?php

namespace App\Livewire\Document\Organi;

use Illuminate\Support\Facades\Cookie;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class DocumentComponent extends Component
{
    use WithFileUploads;
    public $data, $count, $typename;
    public $docgroup_id, $type, $group_id, $user_id, $doc_no, $valuedt, $name, $file, $files;
    public $hiddenId, $editId, $delId, $delName;
    public $search, $dataQ = 15, $dateS, $dateE;
    public $doc = [];
    public $user, $token, $organi, $data_ori = [];


    public function mount($id)
    {
        // dd($id);
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
        $rolename = Cookie::get('role_id');
        $arr2 = explode(',', $rolename);
        $this->hiddenId = $id;
        $type = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-type-id', [
            'type_id' => $this->hiddenId
        ]);
        $this->typename = $type['data'];

        $ore = Cookie::get('organi_id');
        $arr = explode(',', $ore);
        foreach ($arr as $item) {
            if ($item == '151') {
            }
        }
        $check_ori = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/roles-by-del', [
            'id' => 4
        ]);
        foreach ($check_ori['data'] as $item) {
            foreach ($arr2  as $items) {
                if ($item['id'] == $items) {
                    $role_ori = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/roles-by-id', [
                        'id' => $item['id'],
                        'del' => 4
                    ]);
                }
            }
        }

        $res_ori = [];

        if (!empty($role_ori['data'][0]['value'])) {
            $res_ori  += explode(',', $role_ori['data'][0]['value']);
        } else {
            $res_ori = [];
        }

        foreach ($res_ori as $item) {
            $this->data_ori += array($item => $item);
        }
    }


    public function render()
    {

        if (!empty($this->data_ori['PhukView'])) {
            $doc = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-it-type', [
                'qty' => $this->dataQ,
                'search' => $this->search,
                'type_id' => $this->hiddenId,
                'status_id' => 151
            ]);
        } elseif (!empty($this->data_ori['KamView'])) {
            $doc = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-it-type', [
                'qty' => $this->dataQ,
                'search' => $this->search,
                'type_id' => $this->hiddenId,
                'status_id' => 152
            ]);
        } elseif (!empty($this->data_ori['SaoView'])) {
            $doc = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-it-type', [
                'qty' => $this->dataQ,
                'search' => $this->search,
                'type_id' => $this->hiddenId,
                'status_id' => 153
            ]);
        } elseif (!empty($this->data_ori['YinView'])) {
            $doc = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-it-type', [
                'qty' => $this->dataQ,
                'search' => $this->search,
                'type_id' => $this->hiddenId,
                'status_id' => 154
            ]);
        } else {
            $doc['data'] = [];
        }



        $this->data = $doc['data'];
        // dd($this->data);
        $this->count = count($doc['data']);
        return view('livewire.document.organi.document-component');
    }

    public function dataQS()
    {
        if (!empty($this->data_ori['PhukView'])) {
            $doc = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-it-type', [
                'qty' => $this->dataQ,
                'search' => $this->search,
                'type_id' => $this->hiddenId,
                'status_id' => 151
            ]);
        } elseif (!empty($this->data_ori['KamView'])) {
            $doc = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-it-type', [
                'qty' => $this->dataQ,
                'search' => $this->search,
                'type_id' => $this->hiddenId,
                'status_id' => 152
            ]);
        } elseif (!empty($this->data_ori['SaoView'])) {
            $doc = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-it-type', [
                'qty' => $this->dataQ,
                'search' => $this->search,
                'type_id' => $this->hiddenId,
                'status_id' => 153
            ]);
        } elseif (!empty($this->data_ori['YinView'])) {
            $doc = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-it-type', [
                'qty' => $this->dataQ,
                'search' => $this->search,
                'type_id' => $this->hiddenId,
                'status_id' => 154
            ]);
        } else {
            $doc['data'] = [];
        }
        $this->data = $doc['data'];
        $this->count = count($doc['data']);
    }

    public function searchData()
    {
        if (!empty($this->data_ori['PhukView'])) {
            $doc = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-it-type', [
                'qty' => $this->dataQ,
                'search' => $this->search,
                'type_id' => $this->hiddenId,
                'status_id' => 151
            ]);
        } elseif (!empty($this->data_ori['KamView'])) {
            $doc = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-it-type', [
                'qty' => $this->dataQ,
                'search' => $this->search,
                'type_id' => $this->hiddenId,
                'status_id' => 152
            ]);
        } elseif (!empty($this->data_ori['SaoView'])) {
            $doc = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-it-type', [
                'qty' => $this->dataQ,
                'search' => $this->search,
                'type_id' => $this->hiddenId,
                'status_id' => 153
            ]);
        } elseif (!empty($this->data_ori['YinView'])) {
            $doc = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-it-type', [
                'qty' => $this->dataQ,
                'search' => $this->search,
                'type_id' => $this->hiddenId,
                'status_id' => 154
            ]);
        } else {
            $doc['data'] = [];
        }
        $this->data = $doc['data'];
        $this->count = count($doc['data']);
    }

    public function edit($ids)
    {
        return redirect(route('document-organi-edit', $ids));
    }

    public function delete($ids)
    {
        $this->delId = $ids;
        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/doc-edit/' . $ids);
        $this->delName = $response['data']['doc_title'];
        $this->dispatch('show-del');
    }

    public function destroy()
    {
        $response = Http::withToken($this->token)->delete('http://192.168.128.193:8080/api/doc-del/' . $this->delId);

        if ($response['message'] == 'success') {
            session()->flash('success', 'ລົບຂໍ້ມູນສຳເລັດ');
            return redirect(route('document-organi', $this->hiddenId));
        }
    }
}

<?php

namespace App\Livewire\Document\HQ;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;

class HqDocumentComponent extends Component
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

    }

    public function render()
    {

        $doc = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-it-type',[
            'qty'=>$this->dataQ,
            'search'=>$this->search,
            'type_id'=>$this->hiddenId,
            'status_id' => 155
        ]);
        // dd($doc['data']);
        $this->data = $doc['data'];

        $this->count = count($doc['data']);

        return view('livewire.document.h-q.hq-document-component');
    }

    public function dataQS(){
        $doc = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-it-type',[
            'qty'=>$this->dataQ,
            'search'=>$this->search,
            'type_id'=>$this->hiddenId,
            'status_id' => 155
        ]);
        $this->data = $doc['data'];
        $this->count = count($doc['data']);
    }

    public function searchData(){
        $doc = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-it-type',[
            'qty'=>$this->dataQ,
            'search'=>$this->search,
            'type_id'=>$this->hiddenId,
            'status_id' => 155
        ]);
        $this->data = $doc['data'];
        $this->count = count($doc['data']);
    }

    public function edit($ids){
        return redirect(route('document-hq-edit',$ids));
    }

    public function delete($ids){
        $this->delId = $ids;
        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/doc-ho-edit/'.$ids);
        $this->delName = $response['data']['doc_title'];
        $this->dispatch('show-del');
    }

    public function destroy()
    {
        $response = Http::withToken($this->token)->delete('http://192.168.128.193:8080/api/doc-ho-del/'.$this->delId);

        if($response['message'] == 'success'){
            session()->flash('success', 'ລົບຂໍ້ມູນສຳເລັດ');
            return redirect(route('document-hq',$this->hiddenId));
        }
    }
}

<?php

namespace App\Livewire\Document;

use Illuminate\Support\Facades\Cookie;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;

class DocumentComponent extends Component
{
    use WithFileUploads;
    public $data, $count, $typename;
    public $docgroup_id, $type, $group_id, $user_id, $doc_no, $valuedt, $name, $file, $files;
    public $hiddenId, $editId, $delId, $delName;
    public $search, $dataQ = 15, $dateS, $dateE;
    public $doc = [];
    public $user, $token;

    public function mount($id){
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
        $this->hiddenId = $id;
        $type = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-type-id',[
            'type_id'=>$this->hiddenId
        ]);
        $this->typename = $type['data'];
    }

    public function render()
    {
        $doc = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-it-type',[
            'qty'=>$this->dataQ,
            'search'=>$this->search,
            'type_id'=>$this->hiddenId,
            'status_id' => 1
        ]);
        $this->data = $doc['data'];
        $this->count = count($doc['data']);
        return view('livewire.document.document-component');
    }

    public function dataQS(){
        $doc = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-it-type',[
            'qty'=>$this->dataQ,
            'search'=>$this->search,
            'type_id'=>$this->hiddenId,
            'status_id' => 1
        ]);
        $this->data = $doc['data'];
        $this->count = count($doc['data']);
    }

    public function searchData(){
        $doc = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-it-type',[
            'qty'=>$this->dataQ,
            'search'=>$this->search,
            'type_id'=>$this->hiddenId,
            'status_id' => 1
        ]);
        $this->data = $doc['data'];
        $this->count = count($doc['data']);
    }

    public function edit($ids){
        return redirect(route('document-edit',$ids));
    }

    public function viewpdf($ids){
        return redirect(route('document-view',$ids));
    }

    public function delete($ids){
        $this->delId = $ids;
        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/doc-edit/'.$ids);
        $this->delName = $response['data']['doc_title'];
        $this->dispatch('show-del');
    }

    public function destroy()
    {
        $response = Http::withToken($this->token)->delete('http://192.168.128.193:8080/api/doc-del/'.$this->delId);

        if($response['message'] == 'success'){
            session()->flash('success', 'ລົບຂໍ້ມູນສຳເລັດ');
            return redirect(route('document',$this->hiddenId));
        }
    }
}

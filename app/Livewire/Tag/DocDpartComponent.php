<?php

namespace App\Livewire\Tag;


use Livewire\Component;
use App\Models\Docc;
use App\Models\DocGroup;
use Illuminate\Support\Facades\Cookie ;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;

class DocDpartComponent extends Component
{
    use WithFileUploads;
    public $data = [], $count;
    public $docgroup_id, $type, $group_id, $user_id, $doc_no, $valuedt, $name, $file, $files;
    public $editId, $delId, $delName;
    public $search, $dataQ = 15, $dateS, $dateE;
    public $doc = [], $arr_view_docc = [];
    public $user, $token;

    public function mount(){
        
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
        $this->valuedt = date('Y-m-d');

        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/tag-depart', [
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
        // dd($response['data']);
        if($response['message'] == 'success'){
            
            $this->data = $response['data'];
            
            $this->count = count($response['data']);
        }
    }

    public function render()
    {
        return view('livewire.tag.doc-dpart-component');
    }

    public function dataQS(){
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/tag-depart', [
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
        if($response['message'] == 'success'){
            $this->data = $response['data'];
            $this->count = count($response['data']);
        }
    }

    public function searchData(){
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/tag-depart', [
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
        if($response['message'] == 'success'){
            $this->data = $response['data'];
            $this->count = count($response['data']);
        }
    }

    public function income($ids)
    {
        return redirect(route('document-income',$ids));
    }

}

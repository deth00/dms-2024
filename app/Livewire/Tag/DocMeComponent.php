<?php

namespace App\Livewire\Tag;

use Cookie;
use Livewire\Component;
use App\Models\Docc;
use App\Models\DocGroup;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;

class DocMeComponent extends Component
{
    use WithFileUploads;
    public $data, $data1, $count,$count1;
    public $docgroup_id, $type, $group_id, $user_id, $doc_no, $valuedt, $name, $file, $files;
    public $editId, $delId, $delName;
    public $search, $dataQ = 15, $dateS, $dateE;
    public $doc = [], $arr_view_docc = [];
    public $user, $token;

    public function mount()
    {
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
        $this->valuedt = date('Y-m-d');

        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/tag-user', [
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
        if ($response['message'] == 'success') {
            $this->data = $response['data'];
            $this->count = count($response['data']);
        }
        $response1 = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/tag-user', [
            'type_id' => 1,
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
        if ($response1['message'] == 'success') {
            $this->data1 = $response1['data'];
            $this->count1 = count($response1['data']);
        }
        // dd( $this->data1);
    }

    public function render()
    {
        return view('livewire.tag.doc-me-component');
    }

    public function dataQS()
    {
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/tag-user', [
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
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/tag-user', [
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
        if ($response['message'] == 'success') {
            $this->data = $response['data'];
            $this->count = count($response['data']);
        }
    }
}

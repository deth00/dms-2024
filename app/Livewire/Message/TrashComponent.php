<?php

namespace App\Livewire\Message;

use Cookie;
use Livewire\Component;
use App\Models\Docc;
use App\Models\DocGroup;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;

class TrashComponent extends Component
{
    use WithFileUploads;
    public $data, $count;
    public $docgroup_id, $type, $group_id, $user_id, $doc_no, $valuedt, $name, $file, $files;
    public $editId, $delId, $delName;
    public $search, $dataQ = 15, $dateS, $dateE;
    public $doc = [], $arr_view_docc = [];
    public $user, $token;

    public function mount(){
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
        $this->valuedt = date('Y-m-d');

        // $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/message-del-user', [
        //     'search' => $this->search,
        // ]);
        // dd($response['message']);
        // if($response['message'] == 'success'){
        //     $this->data = $response['data'];
        //     $this->count = count($response['data']);
        // }
    }

    public function render()
    {
        return view('livewire.message.trash-component');
    }

    public function read($ids){
        return redirect(route('read',$ids));
    }

    public function remove($ids){
        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/message-destroy/'.$ids);
        session()->flash('success', 'ລົບສຳເລັດ!');
        return redirect(route('inbox'));
    }
}

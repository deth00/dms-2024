<?php

namespace App\Livewire\Message;

use Cookie;
use Livewire\Component;
use App\Models\Docc;
use App\Models\DocGroup;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;

class ReadComponent extends Component
{
    use WithFileUploads;
    public $data, $count;
    public $docgroup_id, $type, $group_id, $user_id, $doc_no, $valuedt, $name, $file, $files;
    public $hiddenId, $editId, $delId, $delName;
    public $search, $dataQ = 15, $dateS, $dateE;
    public $doc = [], $arr_view_docc = [];
    public $user, $token;

    public function mount($id){
        $this->hiddenId = $id;
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
        $this->valuedt = date('Y-m-d');

        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/message-view/'.$id);
        if($response['message'] == 'success'){
            $this->data = $response['data'];
            // dd($this->data);
        }
    }

    public function render()
    {
        return view('livewire.message.read-component');
    }

    public function download(){
        $tempImage = tempnam(sys_get_temp_dir(), $this->data['filename']);
        copy('http://192.168.128.193:8080/'.$this->data['pathfile'], $tempImage);

        return response()->download($tempImage, $filename);
    }
}

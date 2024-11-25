<?php

namespace App\Livewire\Message;

use Cookie;
use Livewire\Component;
use App\Models\Docc;
use App\Models\DocGroup;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;

class BookmarkComponent extends Component
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

        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/book-user', [
            'search' => $this->search,
        ]);
        if($response['message'] == 'success'){
            $this->data = $response['data'];
            $this->count = count($response['data']);
        }
    }

    public function render()
    {
        return view('livewire.message.bookmark-component');
    }

    public function read($ids){
        return redirect(route('read',$ids));
    }

    public function book($ids){
        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/message-book-user/'.$ids);
        session()->flash('success', 'ເພີ່ມຂໍ້ຄວາມຖືກໃຈສຳເລັດ!');
        return redirect(route('inbox'));
    }

    public function remove($ids){
        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/message-remove-user/'.$ids);
        session()->flash('success', 'ລົບສຳເລັດ!');
        return redirect(route('inbox'));
    }
}

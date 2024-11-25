<?php

namespace App\Livewire\Message;

use Cookie;
use Livewire\Component;
use App\Models\Docc;
use App\Models\DocGroup;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;

class SentComponent extends Component
{
    use WithFileUploads;
    public $user_id = [], $file, $subject, $note;
    public $user, $users = [], $token;

    public function mount(){
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');

        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/all-user', [
            'search' => "",
        ]);
        if($response['message'] == 'success'){
            $this->users = $response['data'];
        }
    }
    
    public function render()
    {
        // dd($this->note);
        return view('livewire.message.sent-component');
    }

    public function store(){
        // dd($this->note);
        $this->validate([
            'subject'=>'required',
            'file'=>'required|max:102400000',
        ],[
            'subject.required'=>'ກະລຸນາເພີ່ມຫົວຂໍ້ກ່ອນ!',
            'file.required'=>'ກະລຸນາເພີ່ມຟາຍເອກສານກ່ອນ!',
        ]);

        $file = fopen($this->file->getRealPath(), 'r');
                if($this->user_id == []){
                    $this->dispatch('alert', type: 'warning', message: 'ກະລຸນາເພີ່ມຜູ້ຮັບກ່ອນ!');
                }else{
                    foreach($this->user_id as $item){
                        $document = Http::attach(
                            'file', $file, $this->file->getClientOriginalName()
                        )->withToken($this->token)->post('http://192.168.128.193:8080/api/message-store',[
                            'doc_title'=>$this->subject,
                            'description'=>$this->note,
                            'receive_id'=>$item
                        ]);
                    }
                    session()->flash('success', 'ສົ່ງຂໍ້ມູນສຳເລັດ!');
                    return redirect(route('sent'));
                }

        
    }
}

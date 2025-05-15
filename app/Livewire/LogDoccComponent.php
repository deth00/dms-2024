<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cookie;
use Livewire\Component;
use App\Models\Docc;
use App\Models\DocGroup;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;

class LogDoccComponent extends Component
{
    use WithFileUploads;
    public $data, $count;
    public $docgroup_id, $type, $group_id, $user_id, $doc_no, $valuedt, $name, $file, $files;
    public $editId, $delId, $delName;
    public $search, $dataQ = 15, $dateS, $dateE;
    public $doc = [], $arr_view_docc = [];
    public $user, $token, $hiddenId;

    public function mount($id)
    {
        $this->hiddenId = $id;
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
        $this->valuedt = date('Y-m-d');
        // dd($this->hiddenId);
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/log-docc', [
            'type_id' => $this->hiddenId,
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
        if ($response['message'] == 'success') {
            $this->data = $response['data'];
            $this->count = count($response['data']);
        }
        // dd($this->data);
    }

    public function render()
    {
        $group = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-group', [
            'qty' => 99,
            'search' => ''
        ]);
        $docgroups = $group['data'];

        return view('livewire.log-docc-component', compact('docgroups'));
    }

    public function dataQS()
    {
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/log-docc', [
            'type' => $this->hiddenId,
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
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/log-docc', [
            'type' => $this->hiddenId,
            'qty' => $this->dataQ,
            'search' => $this->search,
        ]);
        if ($response['message'] == 'success') {
            $this->data = $response['data'];
            $this->count = count($response['data']);
        }
    }

    public function add()
    {
        $this->dispatch('show-add');
    }

    public function store()
    {

        $this->validate([
            'doc_no' => 'required',
            'valuedt' => 'required',
            'name' => 'required',
            'docgroup_id' => 'required',
            'file' => 'required',
        ], [
            'doc_no.required' => 'ກະລຸນາເພີ່ມເລກທີເອກະສານກ່ອນ!',
            'valuedt.required' => 'ກະລຸນາເພີ່ມວັນທີເອກະສານກ່ອນ!',
            'name.required' => 'ກະລຸນາເພີ່ມເລື່ອງເອກະສານກ່ອນ!',
            'docgroup_id.required' => 'ກະລຸນາເລືອກປະເພດເອກະສານກ່ອນ!',
            'file.required' => 'ກະລຸນາເພີ່ມຟາຍເອກສານກ່ອນ!',
        ]);

        $file = fopen($this->file->getRealPath(), 'r');
        $document = Http::attach(
            'file',
            $file,
            $this->file->getClientOriginalName()
        )->withToken($this->token)->post('http://192.168.128.193:8080/api/docc-store', [
            'docgroup_id' => $this->docgroup_id,
            'no' => $this->doc_no,
            'date' => $this->valuedt,
            'title' => $this->name,
            'type_id' => $this->hiddenId,
        ]);

        session()->flash('success', 'ບັນທຶກຂໍ້ມູນສຳເລັດ!');
        return redirect(route('docc'));
    }

    public function edit($ids)
    {
        $this->editId = $ids;
        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/docc-edit/' . $this->editId);
        $data = $response['data'];
        $this->docgroup_id = $data['docgroup_id'];
        $this->doc_no = $data['no'];
        $this->valuedt = $data['date'];
        $this->name = $data['title'];
        $this->dispatch('show-edit');
    }

    public function update()
    {
        if ($this->file) {
            $file = fopen($this->file->getRealPath(), 'r');
            $response = Http::attach(
                'file',
                $file,
                $this->file->getClientOriginalName()
            )->withToken($this->token)->put('http://192.168.128.193:8080/api/docc-update/' . $this->editId, [
                'docgroup_id' => $this->docgroup_id,
                'no' => $this->doc_no,
                'date' => $this->valuedt,
                'title' => $this->name,
            ]);
            session()->flash('success', 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
            return redirect(route('docc'));
        } else {
            $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/docc-update/' . $this->editId, [
                'docgroup_id' => $this->docgroup_id,
                'no' => $this->doc_no,
                'date' => $this->valuedt,
                'title' => $this->name,
            ]);
            session()->flash('success', 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
            return redirect(route('docc'));
        }
    }

    public function delete($ids)
    {
        $this->delId = $ids;
        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/docc-edit/' . $this->delId);
        $data = $response['data'];
        $this->delName = $data['title'];
        $this->dispatch('show-del');
    }

    public function destroy()
    {
        $response = Http::withToken($this->token)->delete('http://192.168.128.193:8080/api/docc-del/' . $this->delId);

        if ($response['message'] == 'success') {
            session()->flash('success', 'ລົບຂໍ້ມູນສຳເລັດ');
            return redirect(route('docc'));
        }
    }

    public function view($ids)
    {
        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/log-docc-view/' . $ids);
        // dd($response['data']);
        $this->arr_view_docc = $response['data'];
        $this->dispatch('show-view');
    }

    public function download($ids)
    {
        $response = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/docc-view/' . $ids);
        redirect()->route('log-docc', $this->hiddenId );
    }

    public function sentToDoc($ids)
    {
        session()->flash('doccId', $ids);
        return redirect(route('create-pawn'));
    }
}

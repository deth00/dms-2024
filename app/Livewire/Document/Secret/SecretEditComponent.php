<?php

namespace App\Livewire\Document\Secret;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Livewire\WithFileUploads;

class SecretEditComponent extends Component
{
    use WithFileUploads;
    public $data, $datas, $count, $typename;
    public $hiddenId, $editId, $delId, $delName;
    public $search, $dataQ = 15, $dateS, $dateE;
    public $doc = [];
    public $user, $token;
    public $type_id, $file;
    public $hiddenType1 = 'show', $hiddenType2 = 'none', $hiddenType3 = 'show', $refresh_dpart = 0, $disabled = 'disabled';
    public $hiddenMss = 'none';
    public $doc_groups = [], $doc_dpart = [], $doc_dpartment = [], $doc_sheft = [], $doc_dock = [];
    public $doc_no, $doc_date, $doc_title, $no, $date_no, $docgroup_id = [], $dpart_id = [], $doc_dpart_id = [], $sh_id = [], $k_id = [], $depart_id, $user_id, $note;
    public $all_user = [], $departments, $sectors, $mss_user;
    public $check_docc, $check_mss;
    public $tag_depart = [], $tag_sector = [], $tag_user = [];

    public function mount($id)
    {

        $this->editId = $id;
        // dd($this->editId);
        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
        $this->user_id = Cookie::get('user_id');
        $this->depart_id = Cookie::get('dpart_id');

        $data = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/doc-ho-edit/' . $id);
        $this->datas = $data['data'];
        // dd($this->datas);

        $group = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-group', [
            'qty' => 99,
            'search' => ''
        ]);

        $dpart = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-dpart', [
            'qty' => 99,
            'search' => ''
        ]);
        $dpartment = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-dpartment', [
            'qty' => 99,
            'search' => ''
        ]);

        $sheft = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-sheft', [
            'qty' => 99,
            'search' => ''
        ]);
        $dock = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-dock', [
            'qty' => 99,
            'search' => ''
        ]);

        $this->doc_groups = $group['data'];
        $this->doc_dpart = $dpart['data'];
        $this->doc_dpartment = $dpartment['data'];
        $this->doc_sheft = $sheft['data'];
        $this->doc_dock = $dock['data'];
        $this->doc_date = date('Y-m-d');
        $this->date_no = date('Y-m-d');

        $this->doc_no = $this->datas['doc_no'];
        $this->doc_date = $this->datas['doc_date'];
        $this->doc_title = $this->datas['doc_title'];
        $this->no = $this->datas['no'];
        $this->date_no = $this->datas['date_no'];
        $this->note = $this->datas['note'];
        // dd($this->datas['docgroup_id']);
        // $this->k_id = $datas['k_id'];
        // $this->docgroup_id = $this->datas['docgroup_id'];

        $a = array_push($this->docgroup_id, $this->datas['docgroup_id']);
        $b = array_push($this->sh_id, $this->datas['sh_id']);
        $c = array_push($this->k_id, $this->datas['k_id']);
        $d = array_push($this->dpart_id, $this->datas['dpart_id']);
        $e = array_push($this->doc_dpart_id, $this->datas['docdpart_id']);


    }

    public function render()
    {
        return view('livewire.document.secret.secret-edit-component');
    }

    public function store()
    {
        // dd($this->depart_id);
        $this->validate([
            'doc_title' => 'required',
            'doc_no' => 'required',
            'doc_date' => 'required',
            'docgroup_id' => 'required',
            'doc_dpart_id' => 'required',
        

        ], [
            'docgroup_id.required' => 'ກະລຸນາເລືອກ ປະເພດເອກະສານ ກ່ອນ!',
            'doc_dpart_id.required' => 'ກະລຸນາເລືອກ ພາກສ່ວນພາຍນອກ-ໃນ ກ່ອນ!',

        ]);
       

        if ($this->file) {
            $file = fopen($this->file->getRealPath(), 'r');
            $documents = Http::attach(
                'file',
                $file,
                $this->file->getClientOriginalName()
            )->withToken($this->token)->post('http://192.168.128.193:8080/api/doc-ho-update', [
                'id' => $this->editId,
                'doc_no' => $this->doc_no,
                'doc_date' => $this->doc_date,
                'doc_title' => $this->doc_title,
                'no' => 0,
                'date_no' => 0,
                'docgroup_id' => $this->docgroup_id[0], //ປະເພດເອກະສານ
                'dpart_id' => $this->dpart_id, //ພາກສ່ວນພາຍໃນ
                'docdpart_id' => 0, //ພາຍນອກ
                'sh_id' => $this->sh_id[0], //ເລືອກຕູ້ເອກະສານ
                'k_id' => $this->k_id[0], //ເລືອກໂກໂລໂນ
                'type_id' => 0, //ປະເພດເອກະສານ
                'depart_id' => $this->depart_id, 
                'user_id' => $this->user_id,
                'note' => $this->note,
                // 'organi_type' => $this->ori_id
            ]);
            if ($documents['message'] == "success") {
                session()->flash('success', 'ເພີ່ມເອກະສານສຳເລັດ');
                return redirect(route('document-secret'));
            } else {
                $this->dispatch('alert', type: 'danger', message: 'ເພີ່ມເອກະສານບໍ່ສຳເລັດ');
            }
        } else {

            $documents = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-ho-update', [
                'id' => $this->editId,
                'doc_no' => $this->doc_no,
                'doc_date' => $this->doc_date,
                'doc_title' => $this->doc_title,
                'no' => 0,
                'date_no' => 0,
                'docgroup_id' => $this->docgroup_id[0],
                'dpart_id' => $this->dpart_id[0],
                'docdpart_id' => 0,
                'sh_id' => $this->sh_id[0],
                'k_id' => $this->k_id[0],
                'type_id' => 0,
                'depart_id' => $this->depart_id,
                'user_id' => $this->user_id,
                'note' => $this->note,
                'file' => ""
            ]);
            if ($documents['message'] == "success") {
                session()->flash('success', 'ເພີ່ມເອກະສານສຳເລັດ');
                return redirect(route('document-secret'));
            } else {
                $this->dispatch('alert', type: 'danger', message: 'ເພີ່ມເອກະສານບໍ່ສຳເລັດ');
            }
        }
    }
}

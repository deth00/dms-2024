<?php

namespace App\Livewire\Document\Secret;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;
use Livewire\WithFileUploads;
use Livewire\Component;

class SecretAddComponent extends Component
{
    use WithFileUploads;
    public $data, $count, $typename, $dataTM;
    public $hiddenId, $editId, $delId, $delName;
    public $search, $dataQ = 15, $dateS, $dateE;
    public $doc = [];
    public $user, $token;
    public $type_id, $file;
    public $hiddenType1 = 'show', $hiddenType2 = 'none', $hiddenType3 = 'show', $refresh_dpart = 0, $disabled = 'disabled';
    public $hiddenMss = 'none';
    public $doc_groups = [], $doc_dpart = [], $doc_dpartment = [], $doc_sheft = [], $doc_dock = [], $organi_type = [];
    public $doc_no, $doc_date, $doc_title, $no, $date_no, $docgroup_id, $dpart_id, $doc_dpart_id, $sh_id, $k_id, $depart_id, $user_id, $note, $ori_id, $ori_ty;
    public $all_user = [], $departments, $sectors, $mss_user;
    public $check_docc, $check_mss;
    public $tag_depart = [], $tag_sector = [], $tag_user = [], $user_organi = [];

    public function mount($id)
    {

        $this->token = Cookie::get('token');
        $this->user = Cookie::get('user_id');
        $this->user_id = Cookie::get('user_id');
        $this->depart_id = Cookie::get('dpart_id');
        $this->hiddenId = $id;
        $role_id = Cookie::get('role_id');
        $arr = explode(',', $role_id);

        $group = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-group', [
            'qty' => 99,
            'search' => ''
        ]);
        //ພາຍໃນ
        $dpart = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-dpart', [
            'qty' => 99,
            'search' => ''
        ]);
        //ພາຍນອກ
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
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/all-user', [
            'search' => "",
        ]);
        $all_depart = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/all-depart', [
            'search' => "",
        ]);
        $all_sector = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/all-sector', [
            'search' => "",
        ]);
        $this->departments = $all_depart['data'];
        $this->sectors = $all_sector['data'];
        $this->all_user = $response['data'];

        $this->doc_groups = $group['data'];
        $this->doc_dpart = $dpart['data']; //ພາຍໃນ
        $this->doc_dpartment = $dpartment['data']; //ພາຍນອກ
        $this->doc_sheft = $sheft['data'];
        $this->doc_dock = $dock['data'];
        $this->doc_date = date('Y-m-d');
        $this->date_no = date('Y-m-d');

        $check_ori = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/roles-by-del', [
            'id' => 6
        ]);

        foreach ($check_ori['data'] as $item) {
            foreach ($arr  as $items) {
                if ($item['id'] == $items) {
                    $role_ori = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/roles-by-id', [
                        'id' => $item['id'],
                        'del' => 6
                    ]);
                }
            }
        }

        $res_ori = [];

        if (!empty($role_ori['data'][0]['value'])) {
            $res_ori  += explode(',', $role_ori['data'][0]['value']);
        } else {
            $res_ori = [];
        }
        $data_ori = [];
        foreach ($res_ori as $item) {
            $data_ori += array($item => $item);
        }
        if (!empty($data_ori['Phuk-add'])) {
            $this->ori_id = 156;
        }
        // dd($check_ori['data']);
    }

    public function render()
    {
        $tm = Http::withToken($this->token)->put('http://192.168.128.193:8080/api/teams-edit/' . $this->hiddenId);
        if ($tm['message'] == 'success') {
            $this->dataTM = $tm['data'];
        }
        return view('livewire.document.secret.secret-add-component');
    }

    public function store()
    {
        $this->validate([
            'doc_title' => 'required',
            'doc_no' => 'required',
            'doc_date' => 'required',
            'docgroup_id' => 'required',
            // 'doc_dpart_id' => 'required',
            // 'sh_id' => 'required',
            // 'k_id' => 'required',
            'file' => 'required',

        ], [
            'docgroup_id.required' => 'ກະລຸນາເລືອກ ປະເພດເອກະສານ ກ່ອນ!',
            // 'doc_dpart_id.required' => 'ກະລຸນາເລືອກ ພາກສ່ວນພາຍນອກ-ໃນ ກ່ອນ!',
            // 'sh_id.required' => 'ກະລຸນາເລືອກ ຕູ້ເກັບເອກະສານ ກ່ອນ!',
            // 'k_id.required' => 'ກະລຸນາເລືອກ ໂກໂລໂນ ກ່ອນ!',
            'file.required' => 'ກະລຸນາເລືອກ ຟາຍເອກະສານ ກ່ອນ!',
        ]);
        if ($this->file->getfilename() == 'livewire-tmp') {
            $this->dispatch('alert', type: 'error', message: 'ຊື່ຟາຍຍາວເກິນໄປ, ກະລຸນາເລືອກໃໝ່!');
        } else {
            $file = fopen($this->file->getRealPath(), 'r');
            $documents = Http::attach(
                'file',
                $file,
                $this->file->getClientOriginalName()
            )->withToken($this->token)->post('http://192.168.128.193:8080/api/doc-ho-store', [
                'doc_no' => $this->doc_no,
                'doc_date' => $this->doc_date,
                'doc_title' => $this->doc_title,
                'no' => null,
                'date_no' => null,
                'docgroup_id' => $this->docgroup_id[0], //ປະເພດເອກະສານ
                'dpart_id' => null, //ພາກສ່ວນພາຍໃນ
                'docdpart_id' => null, //ພາຍນອກ
                'sh_id' => $this->sh_id[0], //ເລືອກຕູ້ເອກະສານ
                'k_id' => $this->k_id[0], //ເລືອກໂກໂລໂນ
                'type_id' => null, //ປະເພດເອກະສານ
                'depart_id' => $this->depart_id,
                'user_id' => $this->user_id,
                'team_id' => $this->hiddenId,
                'note' => $this->note,
                'organi_type' => null
            ]);

            if ($this->check_docc == true) {
                // dd($this->docgroup_id[0], $this->doc_no, $this->doc_date, $this->doc_title, $this->file->getClientOriginalName());
                $document = Http::attach(
                    'file',
                    $file,
                    $this->file->getClientOriginalName()
                )->withToken($this->token)->post('http://192.168.128.193:8080/api/docc-store', [
                    'docgroup_id' => $this->docgroup_id[0],
                    'no' => $this->doc_no,
                    'date' => $this->doc_date,
                    'title' => $this->doc_title,
                    'type_id' => 2,
                ]);
            }

            if ($this->tag_depart != []) {
                foreach ($this->tag_depart as $item) {
                    $document = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/tag-store', [
                        'type_id' => 1,
                        'doc_ho_id' => $documents['data']['id'],
                        'department_id' => $item,
                        'sector_id' => null,
                        'user_id' => null,
                    ]);
                }
            }

            if ($this->tag_sector != []) {
                foreach ($this->tag_sector as $item) {
                    $document = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/tag-store', [
                        'type_id' => 1,
                        'doc_ho_id' => $documents['data']['id'],
                        'department_id' => null,
                        'sector_id' => $item,
                        'user_id' => null,
                    ]);
                }
            }

            if ($this->tag_user != []) {
                foreach ($this->tag_user as $item) {
                    $document = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/tag-store', [
                        'type_id' => 1,
                        'doc_ho_id' => $documents['data']['id'],
                        'department_id' => null,
                        'sector_id' => null,
                        'user_id' => $item,
                    ]);
                }
            }

            if ($documents['message'] == "success") {
                session()->flash('success', 'ເພີ່ມເອກະສານສຳເລັດ');
                return redirect(route('document-secret', $this->hiddenId));
            } else {
                $this->dispatch('alert', type: 'danger', message: 'ເພີ່ມເອກະສານບໍ່ສຳເລັດ');
            }
        }
    }
}

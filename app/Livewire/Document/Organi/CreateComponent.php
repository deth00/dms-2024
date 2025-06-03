<?php

namespace App\Livewire\Document\Organi;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;
use Livewire\WithFileUploads;
use Livewire\Component;

class CreateComponent extends Component
{
    use WithFileUploads;
    public $data, $count, $typename;
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
        $role_id = Cookie::get('role_id');
        $arr = explode(',', $role_id);
        $this->hiddenId = $id;
        $this->type_id = $id;
        $type = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/doc-type-id', [
            'type_id' => $this->hiddenId
        ]);
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
        $response = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/all-user', [
            'search' => "",
        ]);
        $all_depart = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/all-depart', [
            'search' => "",
        ]);
        $all_sector = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/all-sector', [
            'search' => "",
        ]);
        $organi = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/organi', [
            'search' => "",
        ]);

        $this->departments = $all_depart['data'];
        $this->sectors = $all_sector['data'];
        $this->all_user = $response['data'];
        $this->typename = $type['data'];
        $this->doc_groups = $group['data'];
        $this->doc_dpart = $dpart['data'];
        $this->doc_dpartment = $dpartment['data'];
        $this->doc_sheft = $sheft['data'];
        $this->doc_dock = $dock['data'];
        $this->doc_date = date('Y-m-d');
        $this->date_no = date('Y-m-d');

        $check_ori = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/roles-by-del', [
            'id' => 4
        ]);

        foreach ($check_ori['data'] as $item) {
            foreach ($arr  as $items) {
                if ($item['id'] == $items) {
                    $role_ori = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/roles-by-id', [
                        'id' => $item['id'],
                        'del' => 4
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
            $this->ori_id = 151;
        } elseif (!empty($data_ori['Kam-add'])) {
            $this->ori_id = 152;
        } elseif (!empty($data_ori['Sao-add'])) {
            $this->ori_id = 153;
        } elseif (!empty($data_ori['Yin-add'])) {
            $this->ori_id = 154;
        }
    }

    public function render()
    {
        if ($this->type_id == 2) {
            $this->disabled = null;
        } else {
            $this->disabled = 'disabled';
        }

        $this->selectType();
        // dd($this->file);

        return view('livewire.document.organi.create-component');
    }

    public function selectType()
    {
        // dd($this->type_id);
        if ($this->type_id == 1 || $this->type_id == 3) {
            $this->hiddenType1 = 'show';
        } else {
            $this->hiddenType1 = 'none';
        }

        if ($this->type_id == 1 || $this->type_id == 2) {
            $this->dispatch('g_id');
            $this->hiddenType2 = 'none';
            $this->hiddenType3 = 'show';
        } else {
            $this->dispatch('g_id');
            $this->hiddenType2 = 'show';
            $this->hiddenType3 = 'none';
        }
    }

    public function check()
    {
        if ($this->check_mss == true) {
            $this->hiddenMss = 'show';
        } else {
            $this->hiddenMss = 'none';
        }
    }

    public function store()
    {
        if ($this->type_id == 1 || $this->type_id == 2) {
            $this->validate([
                'doc_title' => 'required',
                'doc_no' => 'required',
                'doc_date' => 'required',
                'docgroup_id' => 'required',
                'dpart_id' => 'required',
                'sh_id' => 'required',
                'k_id' => 'required',
                'file' => 'required',
                // 'ori_id' => 'required'
            ], [
                'docgroup_id.required' => 'ກະລຸນາເລືອກ ປະເພດເອກະສານ ກ່ອນ!',
                'dpart_id.required' => 'ກະລຸນາເລືອກ ພາກສ່ວນພາຍນອກ-ໃນ ກ່ອນ!',
                'sh_id.required' => 'ກະລຸນາເລືອກ ຕູ້ເກັບເອກະສານ ກ່ອນ!',
                'k_id.required' => 'ກະລຸນາເລືອກ ໂກໂລໂນ ກ່ອນ!',
                'file.required' => 'ກະລຸນາເລືອກ ຟາຍເອກະສານ ກ່ອນ!',
                // 'ori_id.required' => 'ກະລຸນາເລືອກ 3 ອົງການຈັດຕັ້ງ ກ່ອນ!',
            ]);

            if ($this->file->getfilename() == 'livewire-tmp') {
                $this->dispatch('alert', type: 'error', message: 'ຊື່ຟາຍຍາວເກິນໄປ, ກະລຸນາເລືອກໃໝ່!');
            } else {
                $file = fopen($this->file->getRealPath(), 'r');
                $documents = Http::attach(
                    'file',
                    $file,
                    $this->file->getClientOriginalName()
                )->withToken($this->token)->post('http://192.168.128.193:8080/api/doc-store', [
                    'doc_no' => $this->doc_no,
                    'doc_date' => $this->doc_date,
                    'doc_title' => $this->doc_title,
                    'no' => $this->no,
                    'date_no' => $this->date_no,
                    'docgroup_id' => $this->docgroup_id[0],
                    'dpart_id' => $this->dpart_id[0],
                    'docdpart_id' => 0,
                    'sh_id' => $this->sh_id[0],
                    'k_id' => $this->k_id[0],
                    'type_id' => $this->type_id,
                    'depart_id' => $this->depart_id,
                    'user_id' => $this->user_id,
                    'note' => $this->note,
                    'status' => $this->ori_id
                ]);

                if ($this->check_docc == true) {
                    $document = Http::attach(
                        'file',
                        $file,
                        $this->file->getClientOriginalName()
                    )->withToken($this->token)->post('http://192.168.128.193:8080/api/docc-store', [
                        'docgroup_id' => $this->docgroup_id[0],
                        'no' => $this->doc_no,
                        'date' => $this->doc_date,
                        'title' => $this->doc_title,
                        'type_id' => 1,
                    ]);
                }

                if ($this->check_mss == true) {
                    foreach ($this->mss_user as $item) {
                        $document = Http::attach(
                            'file',
                            $file,
                            $this->file->getClientOriginalName()
                        )->withToken($this->token)->post('http://192.168.128.193:8080/api/message-store', [
                            'doc_title' => $this->doc_title,
                            'description' => $this->doc_title,
                            'receive_id' => $item
                        ]);
                    }
                }

                if ($this->tag_depart != []) {
                    foreach ($this->tag_depart as $item) {
                        $document = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/tag-store', [
                            'doc_id' => $documents['data']['id'],
                            'department_id' => $item,
                            'sector_id' => null,
                            'user_id' => null,
                        ]);
                    }
                }

                if ($this->tag_sector != []) {
                    foreach ($this->tag_sector as $item) {
                        $document = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/tag-store', [
                            'doc_id' => $documents['data']['id'],
                            'department_id' => null,
                            'sector_id' => $item,
                            'user_id' => null,
                        ]);
                    }
                }

                if ($this->tag_user != []) {
                    foreach ($this->tag_user as $item) {
                        $document = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/tag-store', [
                            'doc_id' => $documents['data']['id'],
                            'department_id' => null,
                            'sector_id' => null,
                            'user_id' => $item,
                        ]);
                    }
                }

                if ($documents['message'] == "success") {
                    session()->flash('success', 'ເພີ່ມເອກະສານສຳເລັດ');
                    return redirect(route('document-organi', $this->type_id));
                } else {
                    $this->dispatch('alert', type: 'danger', message: 'ເພີ່ມເອກະສານບໍ່ສຳເລັດ');
                }
            }
        } else {

            $this->validate([
                'doc_title' => 'required',
                'doc_no' => 'required',
                'doc_date' => 'required',
                'docgroup_id' => 'required',
                'doc_dpart_id' => 'required',
                'sh_id' => 'required',
                'k_id' => 'required',
                'file' => 'required',

            ], [
                'docgroup_id.required' => 'ກະລຸນາເລືອກ ປະເພດເອກະສານ ກ່ອນ!',
                'doc_dpart_id.required' => 'ກະລຸນາເລືອກ ພາກສ່ວນພາຍນອກ-ໃນ ກ່ອນ!',
                'sh_id.required' => 'ກະລຸນາເລືອກ ຕູ້ເກັບເອກະສານ ກ່ອນ!',
                'k_id.required' => 'ກະລຸນາເລືອກ ໂກໂລໂນ ກ່ອນ!',
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
                )->withToken($this->token)->post('http://192.168.128.193:8080/api/doc-store', [
                    'doc_no' => $this->doc_no,
                    'doc_date' => $this->doc_date,
                    'doc_title' => $this->doc_title,
                    'no' => $this->no,
                    'date_no' => $this->date_no,
                    'docgroup_id' => $this->docgroup_id[0],
                    'dpart_id' => 0,
                    'docdpart_id' => $this->doc_dpart_id[0],
                    'sh_id' => $this->sh_id[0],
                    'k_id' => $this->k_id[0],
                    'type_id' => $this->type_id,
                    'depart_id' => $this->depart_id,
                    'user_id' => $this->user_id,
                    'note' => $this->note,
                    'status' => $this->ori_id
                ]);

                if ($this->tag_depart != []) {
                    foreach ($this->tag_depart as $item) {
                        $document = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/tag-store', [
                            'doc_id' => $documents['data']['id'],
                            'department_id' => $item,
                            'sector_id' => null,
                            'user_id' => null,
                        ]);
                    }
                }

                if ($this->tag_sector != []) {
                    foreach ($this->tag_sector as $item) {
                        $document = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/tag-store', [
                            'doc_id' => $documents['data']['id'],
                            'department_id' => null,
                            'sector_id' => $item,
                            'user_id' => null,
                        ]);
                    }
                }

                if ($this->tag_user != []) {
                    foreach ($this->tag_user as $item) {
                        $document = Http::withToken($this->token)->post('http://192.168.128.193:8080/api/tag-store', [
                            'doc_id' => $documents['data']['id'],
                            'department_id' => null,
                            'sector_id' => null,
                            'user_id' => $item,
                        ]);
                    }
                }


                if ($documents['message'] == "success") {
                    session()->flash('success', 'ເພີ່ມເອກະສານສຳເລັດ');
                    return redirect(route('document-organi', $this->type_id));
                } else {
                    $this->dispatch('alert', type: 'danger', message: 'ເພີ່ມເອກະສານບໍ່ສຳເລັດ');
                }
            }
        }
    }
}

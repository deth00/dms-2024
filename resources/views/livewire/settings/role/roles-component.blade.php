<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ຕັ້ງຄ່າ</a></li>
                        <li class="breadcrumb-item active">ສິດການເຂົ້າເຖິງ</li>
                    </ol>
                </div>
                <h4 class="page-title">ສິດການເຂົ້າເຖິງ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-primary" href="{{route('roles-create') }}">
                            <h5 class="card-title mb-0 text-white"><i class="mdi mdi-plus"></i>
                                ເພີ່ມຂໍ້ມູນ </h5>
                        </a>
                        <hr>
                    </div>
                </div>
    

                <div class="row">
                    <div class="col-12">
                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <br>
                                <table border="2" width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="p-2"> ລຳດັບ </th>
                                            <th class="p-2"> ຊື່ການເຂົ້າເຖິງ </th>
                                            <th class="p-2"> ສະຖານະ </th>
                                            <th class="p-2">
                                                ປຸ່ມຄຳສັ່ງ </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($this->roles as $item)
                                            <tr class="text-center">
                                                <td class="p-2">{{ $no++ }}</td>
                                                <td class="p-2">{{ $item['name'] }}</td>
                                                <td class="p-2">{{ $item['del'] }}</td>

                                                <td class="p-2">
                                                    <div class="btn-group btn-group-justified text-white mb-2">
                                                        <a class="btn btn-warning waves-effect waves-light"
                                                            wire:click="edit({{ $item['id'] }})"><i
                                                                class="mdi mdi-pencil-remove-outline"></i></a>
                                                        <a class="btn btn-danger waves-effect waves-light"
                                                            wire:click="delete({{ $item['id'] }})"><i
                                                                class="mdi mdi-window-close"></i></a>
                                                    </div>
                                                </td>

                                            </tr>
                                        @empty
                                            <tr class="text-center">
                                                <td colspan="8" style="color: #787878;" class="p-2">ບໍ່ມີຂໍ້ມູນ
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        {{-- <span><br> ລວມທັງໝົດ <span class="text-danger">{{ $count }}</span> ລາຍການ</span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

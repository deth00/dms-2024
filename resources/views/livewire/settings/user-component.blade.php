<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ຕັ້ງຄ່າ</a></li>
                        <li class="breadcrumb-item active">ຜູ້ໃຊ້ງານລະບົບ</li>
                    </ol>
                </div>
                <h4 class="page-title">ຜູ້ໃຊ້ງານລະບົບ</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-12">
                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <br>
                                <table border="2" width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="p-2"> ລຳດັບ </th>
                                            <th class="p-2"> ຮູບພາບ </th>
                                            <th class="p-2"> ຊື່ຜູ້ງານລະບົບ </th>
                                            <th class="p-2"> ເບີໂທລະສັບ </th>
                                            <th class="p-2"> ອິເມວ </th>
                                            <th class="p-2"> ບອນປະຈຳການ </th>
                                            <th class="p-2"> ສິດການເຂົ້າເຖິງ </th>
                                            <th class="p-2">
                                                ປຸ່ມຄຳສັ່ງ </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($data as $key => $item)
                                            <tr class="text-center">
                                                <td class="p-2">{{ $no++ }}</td>
                                                <td class="p-2">
                                                    @if (!empty($item->img))
                                                        <a href="{{ asset($item->img) }}">
                                                            <img src="{{ asset($item->img) }}" width="50px;"
                                                                height="50px;">
                                                        </a>
                                                    @else
                                                        <img src="{{ asset('backend/assets/images/user-icon.png') }}"
                                                            alt="" width="50px;" height="50px;">
                                                    @endif
                                                </td>
                                                <td class="p-2">{{ $item['name'] }}</td>
                                                <td class="p-2">{{ $item['phone'] }}</td>
                                                <td class="p-2">{{ $item['email'] }}</td>
                                                <td class="p-2">{{ $item['departname'] }}</td>
                                                <td class="p-2">{{ $item['rolename'] }}</td>
                                                <td class="p-2">
                                                    <div class="btn-group btn-group-justified text-white mb-2">
                                                        <a class="btn btn-warning waves-effect waves-light"
                                                            wire:click="edit({{$item['id']}})"><i
                                                                class="mdi mdi-pencil-remove-outline"></i></a>
                                                        {{-- <a class="btn btn-danger waves-effect waves-light"
                                                            wire:click="delete({{ $item['id'] }})"><i
                                                                class="mdi mdi-window-close"></i></a> --}}
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach
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
        <!-- add -->
        <div wire:ignore.self id="modal-edit" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title mt-0 text-white">ເພີ່ມຂໍ້ມູນ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            {{-- <div class="col-md-12 my-2">
                                <div class="form-group" wire:ignore>
                                    <p>ປະເພດເອກະສານ</p>
                                    <select class="form-control" id="docgroup" width="100%" style="width: 100%;"
                                        wire:model="docgroup_id">
                                        <option>ເລືອກປະເພດ</option>
                                        @foreach ($docgroups as $item)
                                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
    
                                @error('docgroup_id') <span style="color: red" class="error">{{ $message }}</span> @enderror
                            </div> --}}
                            <div class="col-md-12 my-2">
                                <p>ເລກທີເອກະສານ</p>
                                <input type="text" class="form-control" placeholder="ເລກທີເອກະສານ" wire:model="doc_no">
                                @error('doc_no') <span style="color: red" class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-12 my-2">
                                <p>ວັນທີເອກະສານ</p>
                                <input type="date" class="form-control" wire:model="valuedt">
                                @error('valuedt') <span style="color: red" class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-12 my-2">
                                <p>ຫົວຂໍ້</p>
                                <input type="text" class="form-control" placeholder="ຫົວຂໍ້" wire:model="name">
                                @error('name') <span style="color: red" class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-12 my-2">
                                <div class="form-group" wire:ignore>
                                    <form wire:submit.prevent="store" method="post">
                                        <p>ຟາຍເອກະສານ</p>
                                        <input type="file" class="filestyle" wire:model="file">
                                        <div wire:loading wire:target="file">ອັບໂຫຼດ...</div>
                                    </form>
                                </div>
                                @error('file') <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group" wire:ignore>
    
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ປິດ</button>
                        <button type="button" class="btn btn-success waves-effect waves-light"
                            wire:click="store">ບັນທຶກ</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
</div>


@push('scripts')
    <script>
        window.addEventListener('show-edit', event => {
            $('#modal-edit').modal('show');
        })
        window.addEventListener('show-edit', event => {
            $('#modal-edit').modal('hide');
        })
    </script>
@endpush

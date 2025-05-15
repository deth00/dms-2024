<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ເອກະສານທົ່ວລະບົບ</a></li>
                        <li class="breadcrumb-item active">ເອກະສານແຈ້ງການ</li>
                    </ol>
                </div>
                <h4 class="page-title">
                    @if ($hiddenId == 1)
                        ເອກະສານ 3 ອົງການຈັດຕັ້ງ
                    @elseif ($hiddenId == 2)
                        ເອກະສານສະເພາະ
                    @else
                        ແຈ້ງການທົ່ວລະບົບ
                    @endif
                </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                @if (!empty($data_role['ViewWide2-add']))
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary">
                                <h5 class="card-title mb-0 text-white" wire:click="add"><i class="mdi mdi-plus"></i>
                                    ເພີ່ມຂໍ້ມູນ </h5>
                            </button>
                            <hr>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-3">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align: center;" class="text-right">ສະແດງ &emsp;</td>
                                <td>
                                    <select wire:model="dataQ" wire:click="dataQS" name="Q" id="Q"
                                        class="form-control">
                                        <option value="0">0</option>
                                        <option value="15">15</option>/
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="999999999">ທັງໝົດ</option>
                                    </select>
                                    <!-- <input type="number" wire:model="dataQ" name="dataQ" id="dataQ" class="form-control col-12"> -->
                                </td>
                                <td style="vertical-align: center;"><span>&emsp; ລາຍການ</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-4">

                    </div>

                    <div class="col-2">
                        <!-- <input type="date" name="date" id="date" wire:model="dateS" class="form-control"> -->
                    </div>
                    <div class="col-2">
                        <input type="text" name="search" id="search" wire:model="search"
                            wire:keydown.enter="searchData" class="form-control" placeholder="ຄົ້ນຫາ">
                    </div>
                    <div class="col-1 ">
                        <button type="button" class="btn btn-primary" wire:click="searchData">
                            <i class="mdi mdi-file-search-outline"></i>
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <br>
                                <table border="1" width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="p-2">ລຳດັບ</th>
                                            <th class="p-2">ວັນທີ</th>
                                            <th class="p-2">ຫົວຂໍ້</th>
                                            <th class="p-2">ຈາກພາກສ່ວນ</th>
                                            <th class="p-2">ການເຂົ້າເຖິງ</th>
                                            <th class="p-2">ປູ່ມຄຳສັ່ງ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($data as $item)
                                            <tr class="text-center">
                                                <td class="p-2">{{ $no++ }}</td>
                                                <td class="p-2">{{ date('d/m/Y', strtotime($item['date'])) }}</td>
                                                <td class="p-2">{{ $item['title'] }}</td>
                                                <td class="p-2">{{ $item['departname'] }}</td>
                                                <td class="p-2"><button class="btn btn-primary"
                                                    wire:click="view({{ $item['id'] }})"><i
                                                        class="mdi mdi-eye-circle-outline"></i></button></td>
                                                <td class="p-2">
                                                    <a class="btn btn-primary" wire:click="download({{ $item['id'] }})"
                                                        href="http://192.168.128.193:8080/{{ $item['pathfile'] }}"
                                                        target="_bank"><i
                                                            class="mdi mdi-book-open-page-variant"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="13" class="text-center p-2">
                                                    ບໍ່ມີຂໍ້ມູນເອກະສານ</td>
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
                        <span><br> ລວມຫຼັກຊັບທັງໝົດ <span class="text-danger">{{ $count }}</span> ລາຍການ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- add -->
    <div wire:ignore.self id="modal-add" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title mt-0 text-white">ເພີ່ມຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <div class="form-group" wire:ignore>
                                <p>ປະເພດເອກະສານ</p>
                                <select class="form-control" id="docgroup" width="100%" style="width: 100%;"
                                    wire:model="docgroup_id">
                                    <option>ເລືອກປະເພດ</option>
                                    @foreach ($docgroups as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @error('docgroup_id')
                                <span style="color: red" class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 my-2">
                            <p>ເລກທີເອກະສານ</p>
                            <input type="text" class="form-control" placeholder="ເລກທີເອກະສານ"
                                wire:model="doc_no">
                            @error('doc_no')
                                <span style="color: red" class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 my-2">
                            <p>ວັນທີເອກະສານ</p>
                            <input type="date" class="form-control" wire:model="valuedt">
                            @error('valuedt')
                                <span style="color: red" class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 my-2">
                            <p>ຫົວຂໍ້</p>
                            <input type="text" class="form-control" placeholder="ຫົວຂໍ້" wire:model="name">
                            @error('name')
                                <span style="color: red" class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="form-group" wire:ignore>
                                <form wire:submit.prevent="store" method="post">
                                    <p>ຟາຍເອກະສານ</p>
                                    <input type="file" class="filestyle" wire:model="file">
                                    <div wire:loading wire:target="file">ອັບໂຫຼດ...</div>
                                </form>
                            </div>
                            @error('file')
                                <span style="color: red" class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group" wire:ignore>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ປິດ</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light"
                        wire:click="store">ເພີ່ມຂໍ້ມູນ</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div wire:ignore.self id="modal-edit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title mt-0 text-white">ແກ້ໄຂຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <div class="form-group" wire:ignore>
                                <p>ປະເພດເອກະສານ</p>
                                <select class="form-control" id="docgroup-edit" width="100%" style="width: 100%;"
                                    wire:model="docgroup_id">
                                    <option>ເລືອກປະເພດ</option>
                                    @foreach ($docgroups as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @error('docgroup_id')
                                <span style="color: red" class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 my-2">
                            <p>ເລກທີເອກະສານ</p>
                            <input type="text" class="form-control" placeholder="ເລກທີເອກະສານ"
                                wire:model="doc_no">
                            @error('doc_no')
                                <span style="color: red" class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 my-2">
                            <p>ວັນທີເອກະສານ</p>
                            <input type="date" class="form-control" wire:model="valuedt">
                            @error('valuedt')
                                <span style="color: red" class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 my-2">
                            <p>ຫົວຂໍ້</p>
                            <input type="text" class="form-control" placeholder="ຫົວຂໍ້" wire:model="name">
                            @error('name')
                                <span style="color: red" class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="form-group" wire:ignore>
                                <form wire:submit.prevent="store" method="post">
                                    <p>ຟາຍເອກະສານ</p>
                                    <input type="file" class="filestyle" wire:model="file">
                                    <div wire:loading wire:target="file">ອັບໂຫຼດ...</div>
                                </form>
                            </div>
                            @error('file')
                                <span style="color: red" class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group" wire:ignore>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ປິດ</button>
                    <button type="button" class="btn btn-warning waves-effect waves-light"
                        wire:click="update">ອັບເດດຂໍ້ມູນ</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div id="modal-del" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title mt-0 text-white">ລົບຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3><b>ທ່ານຕ້ອງການລົບຂໍ້ມູນນີ້ ຫຼື ບໍ່ ?</b></h3>
                    <p>ລາຍລະອຽດ: <span class="text-danger">{{ $delName }}</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ປິດ</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light"
                        wire:click="destroy">ລົບຂໍ້ມູນ</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div wire:ignore.self class="modal fade" id="modal-view" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">ຂໍ້ມູນຜູ້ຮັບເອກະສານ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="text-align: center">
                                    <th>ລະດັບ</th>
                                    <th>ວັນທີສ້າງ</th>
                                    <th>ຊື່ເອກະສານ</th>
                                    <th>ຊື່ຜູ້ຮັບເອກະສານ</th>
                                    <th>ວັນທີໂຫຼດລ່າສຸດ</th>
                                    <th>ຈຳນວນດາວໂຫຼດ</th>
                                    <th>ສະຖານະ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $stt = 1; @endphp
                                @foreach ($arr_view_docc as $item)
                                    <tr>
                                        <td style="text-align: center">{{ $stt++ }}</td>
                                        <td style="text-align: center">
                                            {{ date('d/m/Y H:i:s', strtotime($item['create_data'])) }}</td>
                                        <td style="text-align: center">{{ $item['title'] }}</td>
                                        <td style="text-align: center">{{ $item['username'] }}</td>
                                        <td style="text-align: center">
                                            @if ($item['del'] == 1)
                                                {{ date('d/m/Y H:i:s', strtotime($item['update_data'])) }}
                                            @endif
                                        </td>
                                        <td style="text-align: center">{{ $item['count'] }}</td>
                                        <td style="text-align: center">
                                            @if ($item['del'] == 0)
                                                <span class="badge badge-danger">ຍັງບໍ່ທັນດາວໂຫຼດ</span>
                                            @else
                                                <span class="badge badge-success">ດາວໂຫຼດສຳເລັດ</span>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ປິດ</button>
                    <!-- <button wire:click="destroy" type="button" data-dismiss="modal" class="btn btn-danger">ຕົກລົງ</button> -->
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('show-view', event => {
            $('#modal-view').modal('show');
        })
        window.addEventListener('show-add', event => {
            $('#modal-add').modal('show');
        })
        window.addEventListener('hide-add', event => {
            $('#modal-add').modal('hide');
        })
        window.addEventListener('show-edit', event => {
            $('#modal-edit').modal('show');

            jQuery(document).ready(function() {
                $('#docgroup-edit').select2();
                $('#docgroup-edit').on('change', function(e) {
                    var data = $('#docgroup-edit').select2("val");
                    @this.set('docgroup_id', data);
                });
            });
        })
        window.addEventListener('hide-edit', event => {
            $('#modal-edit').modal('hide');
        })
        window.addEventListener('show-del', event => {
            $('#modal-del').modal('show');
        })
        window.addEventListener('show-del', event => {
            $('#modal-del').modal('hide');
        })

        $(document).ready(function() {
            $('#docgroup').select2();
            $('#docgroup').on('change', function(e) {
                var data = $('#docgroup').select2("val");
                @this.set('docgroup_id', data);
            });
        });

        Livewire.on('g_id', postId => {
            jQuery(document).ready(function() {
                $('#docgroup').select2();
                $('#docgroup').on('change', function(e) {
                    var data = $('#docgroup').select2("val");
                    @this.set('docgroup_id', data);
                });
            });
        });
    </script>
@endpush

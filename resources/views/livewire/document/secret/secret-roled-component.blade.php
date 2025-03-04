<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ຕັ້ງຄ່າ</a></li>
                        <li class="breadcrumb-item active">ຂໍ້ມູນກຸ່ມ</li>
                    </ol>
                </div>
                <h4 class="page-title">ຂໍ້ມູນກຸ່ມ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            @if (!empty($data_role['viewGroup-add']))
                <div class="card">

                    <div class="card-header bg-info py-3 text-white">
                        <h5 class="card-title mb-0 text-white"><i class="mdi mdi-plus"></i> ເພີ່ມຂໍ້ມູນ </h5>
                    </div>

                    <div id="cardCollpase1" class="collapse show">
                        <div wire:ignore.self>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group" wire:ignore>
                                            <select class="form-control select2" data-placeholder="ເລືອກພະແນກ || ສາຂາ"
                                                id="dpart_id" wire:model="dpart_id">
                                                <option value="0">ເລືອກພະແນກ || ສາຂາ</option>
                                                @foreach ($departs as $item)
                                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('docgroup_id')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control select2-multiple" multiple="multiple"
                                                data-placeholder="ເລືອກ" id="user_id" wire:model="user_id">
                                                @foreach ($data_user as $item)
                                                    <option value="{{ $item['id'] }}">{{ $item['emp_name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('docgroup_id')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">


                                <button class="btn btn-success" wire:click="store">ບັນທຶກ</button>


                                <a href="{{ route('group') }}" class="btn btn-danger">ລ້າງຂໍ້ມູນ</a>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-sm-8">
            <div class="card-box">

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

                    <div class="col-4">
                        <input type="text" name="search" id="search" wire:model="search" class="form-control"
                            placeholder="ຄົ້ນຫາ">
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
                                <table border="2" width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="p-2"> ລຳດັບ </th>
                                            <th class="p-2"> ຊື່ </th>
                                            @if (!empty($data_role['viewGroup-edit']) || !empty($data_role['viewGroup-edit']))
                                                <th class="p-2">
                                                    ປຸ່ມກົດ </th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($data as $key => $item)
                                            <tr class="text-center">
                                                <td class="p-2">{{ $no++ }}</td>
                                                <td class="p-2">{{ $item['emp_name'] }}</td>

                                                @if (!empty($data_role['viewGroup-edit']) || !empty($data_role['viewGroup-edit']))
                                                    <td class="p-2">
                                                        <div class="btn-group btn-group-justified text-white mb-2">
                                                            {{-- @if (!empty($data_role['viewGroup-edit']))
                                                                <a class="btn btn-warning waves-effect waves-light"
                                                                    wire:click="edit({{ $item['id'] }})"><i
                                                                        class="mdi mdi-pencil-remove-outline"></i></a>
                                                            @endif --}}
                                                            @if (!empty($data_role['viewGroup-edit']))
                                                                <a class="btn btn-danger waves-effect waves-light"
                                                                    wire:click="delete({{ $item['id'] }})"><i
                                                                        class="mdi mdi-window-close"></i></a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                @endif


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
                        <span><br> ລວມທັງໝົດ <span class="text-danger">{{ $count }}</span> ລາຍການ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="custom-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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

</div>

@push('scripts')
    <script>
        window.addEventListener('show-del', event => {
            $('#custom-modal').modal('show');
        })
        window.addEventListener('show-del', event => {
            $('#custom-modal').modal('hide');
        })
        $(function() {

            $("#dpart_id").select2({
                // maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#dpart_id').on('change', function(e) {
                var data = $('#dpart_id').select2("val");
                @this.set('dpart_id', data);
            });
        });
        Livewire.on('g_id', postId => {
            jQuery(document).ready(function() {
                $("#user_id").select2({
                    maximumSelectionLength: 10,
                    width: 'resolve'
                });
                $('#user_id').on('change', function(e) {
                    var data = $('#user_id').select2("val");
                    @this.set('user_id', data);
                });
            });
        });
    </script>
@endpush

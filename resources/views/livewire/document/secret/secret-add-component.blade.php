<div>

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ເອກະສານສະເພາະ</a></li>
                        <li class="breadcrumb-item active">{{$dataTM['name']}}</li>
                    </ol>
                </div>
                <h4 class="page-title">ເພີ່ມເອກະສານຂາເຂົ້າ-ຂາອອກ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-8 col-sm-8 col-lg-8">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ເລກທີເອກະສານ</span>
                                            </div>
                                            <input type="text" id="example-input1-group1"
                                                name="example-input1-group1" class="form-control"
                                                placeholder="ປ້ອນເລກທີເອກະສານ" wire:model="doc_no">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ວັນທີເອກະສານ</span>
                                            </div>
                                            <input type="date" id="example-input1-group1"
                                                name="example-input1-group1" class="form-control" wire:model="doc_date">
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6" style="display: {{ $hiddenType1 }}">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ເລກທີ</span>
                                            </div>
                                            <input type="text" id="example-input1-group1"
                                                name="example-input1-group1"
                                                class="form-control @error('no') is-invalid @enderror"
                                                placeholder="ເລກທີ" wire:model="no">
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-6" style="display: {{ $hiddenType1 }}">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ວັນທີເອກະສານ</span>
                                            </div>
                                            <input type="date" id="example-input1-group1"
                                                name="example-input1-group1"
                                                class="form-control @error('date_no') is-invalid @enderror"
                                                wire:model="date_no">
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ຫົວຂໍ້ເອກະສານ</span>
                                            </div>
                                            <input type="text" id="example-input1-group1"
                                                name="example-input1-group1"
                                                class="form-control @error('doc_title') is-invalid @enderror"
                                                placeholder="ຫົວຂໍ້ເອກະສານ" wire:model="doc_title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" wire:ignore>
                                        <select class="form-control select2-multiple" multiple="multiple"
                                            data-placeholder="ເລືອກປະເພດເອກະສານ" id="cate"
                                            wire:model="docgroup_id">
                                            @foreach ($doc_groups as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('docgroup_id')
                                        <span style="color: red" class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- <div class="col-md-6" >
                                    <div wire:key="select-field-model-version-{{ $refresh_dpart }}"></div>
                                    <div class="form-group" wire:ignore>
                                        <select class="form-control select2-multiple" multiple="multiple"
                                            style="width: 100%" data-placeholder="ເລືອກພາກສ່ວນພາຍໃນ" id="dpart"
                                            wire:model="dpart_id">
                                            @foreach ($doc_dpart as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('dpart_id')
                                        <span style="color: red" class="error">{{ $message }}</span>
                                    @enderror
                                </div> --}}
                                {{-- 
                                <div class="col-md-6" >
                                    <div wire:key="select-field-model-version-{{ $refresh_dpart }}"></div>
                                    <div class="form-group" wire:ignore>
                                        <select class="form-control select2-multiple" multiple="multiple"
                                            style="width: 100%" data-placeholder="ພາກສ່ວນພາຍນອກ" id="docdpart"
                                            wire:model="depart_id">
                                            @foreach ($doc_dpartment as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('dpart_id')
                                        <span style="color: red" class="error">{{ $message }}</span>
                                    @enderror
                                </div> --}}

                                <div class="col-md-6">
                                    <div class="form-group" wire:ignore>
                                        <select class="form-control select2-multiple" multiple="multiple"
                                            data-placeholder="ເລືອກຕູ້ເອກະສານ" id="sheft" wire:model="sh_id">
                                            @foreach ($doc_sheft as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('sh_id')
                                        <span style="color: red" class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" wire:ignore>
                                        <select class="form-control select2-multiple" multiple="multiple"
                                            data-placeholder="ເລືອກໂກໂລໂນ" id="dock" wire:model="k_id">
                                            @foreach ($doc_dock as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('k_id')
                                        <span style="color: red" class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ໝາຍເຫດ</span>
                                            </div>
                                            <input type="text" id="example-input1-group1"
                                                name="example-input1-group1" class="form-control" placeholder="ໝາຍເຫດ"
                                                wire:model="note">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 my-2">
                                    <div class="form-group" wire:ignore>
                                        <p>ຟາຍເອກະສານ</p>
                                        <input type="file" class="filestyle" wire:model="file">
                                        <div wire:loading wire:target="file">ອັບໂຫຼດ...</div>
                                    </div>
                                    @error('file')
                                        <span style="color: red" class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="border-left-style: solid; border-left-color: #33cc99;">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 for="name" class="text-info"><i class="icon fas fa-info"></i>
                                ຕົວເລືອກເພີ່ມເຕີມ</h4>
                        </div>
                        {{-- <div class="col-md-12">
                            <div class="checkbox checkbox-success">
                                <input id="checkbox3" type="checkbox" 
                                    wire:model="check_docc">
                                <label for="checkbox3">
                                    ອັບລົງແຈ້ງການທົ່ວລະບົບ
                                </label>
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-12">
                            <div class="checkbox checkbox-success">
                                <input id="checkbox2" type="checkbox" {{ $disabled }}
                                    wire:model="check_mss" wire:click="check">
                                <label for="checkbox2">
                                    ສົ່ງເຂົ້າກ່ອງຂໍ້ຄວາມ
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12" style="display: {{ $hiddenMss }}">
                            <div class="form-group" wire:ignore>
                                <select class="form-control select2-multiple" multiple="multiple"
                                    style="width: 100%;" data-placeholder="ສົ່ງເຖິງ" id="inbox">
                                    @foreach ($all_user as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['emp_name'] }}
                                            ({{ $item['departname'] }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12" wire:ignore>
                            <div class="form-group">
                                <select class="form-control select2-multiple" multiple="multiple"
                                    style="width: 100%;" data-placeholder="ສົ່ງເຖິງພະເເນກ" id="tag_depart">
                                    @foreach ($departments as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12" wire:ignore>
                            <div class="form-group">
                                <select class="form-control select2-multiple" multiple="multiple"
                                    style="width: 100%;" data-placeholder="ສົ່ງເຖິງຂະແໜງ" id="tag_sector">
                                    @foreach ($sectors as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12" wire:ignore>
                            <div class="form-group">
                                <select class="form-control select2-multiple" multiple="multiple"
                                    style="width: 100%;" data-placeholder="ສົ່ງເຖິງບຸກຄົນ" id="tag_alone">
                                    @foreach ($all_user as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['emp_name'] }}
                                            ({{ $item['departname'] }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-success" wire:click="store">ບັນທຶກ</button>
        <a href="{{ route('document-secret', $hiddenId) }}" class="btn btn-danger">ກັບຄືນ</a>
    </div>
</div>

@push('scripts')
    <!-- Init js-->
    <!-- <script src="{{ asset('backend/assets/js/pages/form-advanced.init.js') }}"></script> -->
    <script>
        $(function() {
            $("#inbox").select2({
                maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#inbox').on('change', function(e) {
                var data = $('#inbox').select2("val");
                @this.set('mss_user', data);
            });
            $("#tag_depart").select2({
                width: 'resolve'
            });
            $('#tag_depart').on('change', function(e) {
                var data = $('#tag_depart').select2("val");
                @this.set('tag_depart', data);
            });
            $("#tag_sector").select2({
                width: 'resolve'
            });
            $('#tag_sector').on('change', function(e) {
                var data = $('#tag_sector').select2("val");
                @this.set('tag_sector', data);
            });
            $("#tag_alone").select2({
                width: 'resolve'
            });
            $('#tag_alone').on('change', function(e) {
                var data = $('#tag_alone').select2("val");
                @this.set('tag_user', data);
            });
            $("#dock").select2({
                maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#dock').on('change', function(e) {
                var data = $('#dock').select2("val");
                @this.set('k_id', data);
            });
            $("#dpart").select2({
                maximumSelectionLength: 5,
                width: 'resolve'
            });
            $('#dpart').on('change', function(e) {
                var data = $('#dpart').select2("val");
                @this.set('dpart_id', data);
            });
            $("#docdpart").select2({
                maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#docdpart').on('change', function(e) {
                var data = $('#docdpart').select2("val");
                @this.set('doc_dpart_id', data);
            });
            $("#sheft").select2({
                maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#sheft').on('change', function(e) {
                var data = $('#sheft').select2("val");
                @this.set('sh_id', data);
            });
            $("#cate").select2({
                maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#cate').on('change', function(e) {
                var data = $('#cate').select2("val");
                @this.set('docgroup_id', data);
            });

            $("#ori").select2({
                maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#ori').on('change', function(e) {
                var data = $('#ori').select2("val");
                @this.set('ori_id', data);
            });
        });

        Livewire.on('g_id', postId => {
            jQuery(document).ready(function() {
                $("#inbox").select2({
                    maximumSelectionLength: 1,
                    width: 'resolve'
                });
                $('#inbox').on('change', function(e) {
                    var data = $('#inbox').select2("val");
                    @this.set('mss_user', data);
                });
                $("#tag_depart").select2({
                    width: 'resolve'
                });
                $('#tag_depart').on('change', function(e) {
                    var data = $('#tag_depart').select2("val");
                    @this.set('tag_depart', data);
                });
                $("#tag_sector").select2({
                    width: 'resolve'
                });
                $('#tag_sector').on('change', function(e) {
                    var data = $('#tag_sector').select2("val");
                    @this.set('tag_sector', data);
                });
                $("#tag_alone").select2({
                    width: 'resolve'
                });
                $('#tag_alone').on('change', function(e) {
                    var data = $('#tag_alone').select2("val");
                    @this.set('tag_user', data);
                });
                $("#dpart").select2({
                    maximumSelectionLength: 1,
                    width: 'resolve'
                });
                $('#dpart').on('change', function(e) {
                    var data = $('#dpart').select2("val");
                    @this.set('dpart_id', data);
                });
            });
            $("#docdpart").select2({
                maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#docdpart').on('change', function(e) {
                var data = $('#docdpart').select2("val");
                @this.set('doc_dpart_id', data);
            });
        })
    </script>
@endpush

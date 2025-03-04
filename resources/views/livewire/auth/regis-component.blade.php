<div>
    <!-- <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ລົງທະບຽນ</a></li>
                    </ol>
                </div>
                <h4 class="page-title">ລົງທະບຽນຜູ້ໃຊ້ງານ</h4>
            </div>
        </div>
    </div> -->
    <!-- Vertical Steps Example -->
    <div class="row">
        <div class="col-md-12 text-center">
            <h3 class="phetsarath-font mb-3">ລົງທະບຽນນຳໃຊ້ລະບົບເກັບກຳເອກະສານອອນລາຍ</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">1. ປ້ອນຂໍ້ມູນລົງທະບຽນ:</legend>
                    <div class="row">
                        <div class="col-md-4" style="border-left-style: solid; border-left-color: #33cc99;">
                            <div class="form-group">
                                <label for="name">ຊື່ ແລະ ນາມສະກຸນ :</label>
                                <input type="text" class="form-control @error('emp_name') is-invalid @enderror"
                                    placeholder="ປ້ອນ ຊື່ ແລະ ນາມສະກຸນ" wire:model="emp_name">
                            </div>
                            <div class="form-group">
                                <label for="name">ເບີໂທລະສັບ :</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    placeholder="ປ້ອນ ເບີໂທລະສັບ" wire:model="phone">
                            </div>
                            <div class="form-group">
                                <label for="name">ອີເມວ (ພາຍໃນ) :</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="ປ້ອນ ອີເມວ (ພາຍໃນ)" wire:model="email">
                            </div>
                        </div>
                        <div class="col-md-4" style="border-left-style: solid; border-left-color: #33cc99;">
                            <div class="form-group">
                                <label for="name">ຊື່ເຂົ້າລະບົບ (ພາສາອັງກິດ) :</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="ປ້ອນ ຊື່ເຂົ້າລະບົບ (ພາສາອັງກິດ)" wire:model="name">
                            </div>
                            <div class="form-group">
                                <label for="name">ລະຫັດຜ່ານ :</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="ປ້ອນ ລະຫັດຜ່ານ" wire:model="password">
                            </div>
                            <div class="form-group">
                                <label for="name">ຢືນຢັນລະຫັດຜ່ານ :</label>
                                <input type="password"
                                    class="form-control @error('confirm_password') is-invalid @enderror"
                                    placeholder="ປ້ອນ ຢືນຢັນລະຫັດຜ່ານ" wire:model="confirm_password">
                            </div>
                        </div>
                        <div class="col-md-4" style="border-left-style: solid; border-left-color: #33cc99;">
                            <div class="form-group">
                                <div wire:ignore>
                                    <label for="dpart">ພະແນກການ || ສາຂາ || ໜ່ວຍບໍລິການ</label>
                                    <div class="input-group">
                                        <select class="form-control select2-multiple" multiple="multiple"
                                            data-placeholder="ເລືອກພະແນກການ || ສາຂາ || ໜ່ວຍບໍລິການ" id="dpart"
                                            wire:model="dpart_id" >
                                            @foreach ($departs as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @error('dpart_id')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div>
                                    <label for="dpart">ຂະແໜງການ</label>
                                    <div class="input-group">
                                        <select class="form-control select2-multiple" multiple="multiple"
                                            data-placeholder="ຂະແໜງການ" id="sector" wire:model="sector_id">
                                            @foreach ($sectors as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @error('sector_id')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="form-group">
                                            <input wire:model="ori_id" type="checkbox" value="151">
                                            <label for="name" style="color:black">ພັກ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="form-group">
                                            <input wire:model="ori_id" type="checkbox" value="152">
                                            <label for="name" style="color:black">ກຳມະບານ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="form-group">
                                            <input wire:model="ori_id" type="checkbox" value="153">
                                            <label for="name" style="color:black">ຊາວໜຸ່ມ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="form-group">
                                            <input wire:model="ori_id" type="checkbox" value="154">
                                            <label for="name" style="color:black">ແມ່ຍິງ</label>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </fieldset>
                <hr>
                <div class="form-group">
                    <button class="btn btn-warning float-end" wire:click="back">ກັບຄືນ</button>
                    <button class="btn btn-primary float-end" style="float: right;" wire:click="next">ຕໍ່ໄປ</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
</div>


@push('scripts')
    <!-- Init js-->
    <!-- <script src="{{ asset('backend/assets/js/pages/form-advanced.init.js') }}"></script> -->
    <script>
        $(function() {
            $("#dpart").select2({
                maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#dpart').on('change', function(e) {
                var data = $('#dpart').select2("val");
                @this.set('dpart_id', data);
            });
            $("#sector").select2({
                maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#sector').on('change', function(e) {
                var data = $('#sector').select2("val");
                @this.set('sector_id', data);
            });
        });

        Livewire.on('g_id', postId => {
            jQuery(document).ready(function() {
                $("#dpart").select2({
                    maximumSelectionLength: 1,
                    width: 'resolve'
                });
                $('#dpart').on('change', function(e) {
                    var data = $('#dpart').select2("val");
                    @this.set('dpart_id', data);
                });
                $("#sector").select2({
                    maximumSelectionLength: 1,
                    width: 'resolve'
                });
                $('#sector').on('change', function(e) {
                    var data = $('#sector').select2("val");
                    @this.set('sector_id', data);
                });
                $("#unit").select2({
                    maximumSelectionLength: 1,
                    width: 'resolve'
                });
                $('#unit').on('change', function(e) {
                    var data = $('#unit').select2("val");
                    @this.set('sector_id', data);
                });
            });
        });
    </script>
@endpush

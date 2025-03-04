<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ສິດການເຂົ້າເຖິງ</a></li>
                        <li class="breadcrumb-item active">ເພີ່ມຂໍ້ມູນ</li>
                    </ol>
                </div>
                <h4 class="page-title">ເພີ່ມຂໍ້ມູນ</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <h6><b>
                                {{-- <input wire:model="documents" type="checkbox" value="true"> --}}
                                <u>ລະບົບເອກະສານ</u>
                            </b></h6>
                        </div>
                        <div class="col-md-9">
                            <hr>
                        </div>
                        <div class="col-md-1"><hr></div>
                    </div>
                    <div class="form-group" wire:ignore>
                        <select class="form-control select2-multiple" multiple="multiple"
                            data-placeholder="ເລືອກ" id="cate" wire:model="selectedtypes">
                            <option value="viewDocc">ເບິ່ງແຈ້ງການທົ່ວລະບົບ</option>
                            <option value="viewDocMe">ເບິ່ງເອະສານຕິດພັນຕົນເອງ</option>
                            <option value="viewDocSector">ເບິ່ງເອກະສານຕິດພັນຂະແໜງ</option>
                            <option value="viewSendReceive">ຮັບສົ່ງເອກະສານ</option>
                            <option value="viewDoc">ເບິ່ງຂາເຂົ້າ-ຂາອອກ</option>
                            <option value="viewGroup">ເບິ່ງຂໍ້ມູນກຸ່ມ</option>
                            <option value="viewDepart">ເບິ່ງຂໍ້ມູນພາກສ່ວນພາຍໃນ</option>
                            <option value="viewDepartment">ເບິ່ງຂໍ້ມູນພາກສ່ວນພາຍນອກ</option>
                            <option value="viewDocType">ເບິ່ງຂໍ້ມູນຮູບແບບ</option>
                            <option value="viewDocCat">ເບິ່ງຂໍ້ມູນປະເພດ</option>
                            <option value="viewDocSheft">ເບິ່ງຂໍ້ມູນຕູ້ເອກະສານ</option>
                            <option value="viewDocDock">ເບິ່ງຂໍ້ມູນໂກໂລໂນ</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <h6><b>
                                {{-- <input wire:model="documents" type="checkbox" value="true"> --}}
                                <u>ຕັ່ງຄ່າ</u>
                            </b></h6>
                        </div>
                        <div class="col-md-9">
                            <hr>
                        </div>
                        <div class="col-md-1"><hr></div>
                    </div>
                    <div class="form-group" wire:ignore>
                        <select class="form-control select2-multiple" multiple="multiple"
                            data-placeholder="ເລືອກ" id="cate2" wire:model="selectedtypes">
                            <option value="viewDocc1">ເບິ່ງແຈ້ງການທົ່ວລະບົບ</option>
                            <option value="viewDocMe1">ເບິ່ງເອະສານຕິດພັນຕົນເອງ</option>
                            <option value="viewDocSector1">ເບິ່ງເອກະສານຕິດພັນຂະແໜງ</option>
                            <option value="viewSendReceive1">ຮັບສົ່ງເອກະສານ</option>
                            <option value="viewDoc1">ເບິ່ງຂາເຂົ້າ-ຂາອອກ</option>
                        </select>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-success" wire:click="store">ບັນທຶກ</button>
                        <a href="{{route('roles')}}" class="btn btn-danger">ກັບຄືນ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $("#cate").select2({
            maximumSelectionLength: 10,
            width: 'resolve'
        });
        $("#cate2").select2({
            maximumSelectionLength: 10,
            width: 'resolve'
        });
        $('#cate').on('change', function(e) {
            var data = $('#cate').select2("val");
            @this.set('selectedtypes', data);
        });
        $('#cate2').on('change', function(e) {
            var data = $('#cate2').select2("val");
            @this.set('selectedtypes', data);
        });
        // Livewire.on('g_id', postId => {
        //     jQuery(document).ready(function() {
        //         $("#cate").select2({
        //             maximumSelectionLength: 1,
        //             width: 'resolve'
        //         });
        //         $('#cate').on('change', function(e) {
        //             var data = $('#cate').select2("val");
        //             @this.set('selectedtypes', data);
        //         });
        //     });
        // })
    </script>
@endpush

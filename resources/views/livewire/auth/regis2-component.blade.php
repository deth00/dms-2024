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
                    <legend class="scheduler-border">2. ຢືນຢັນຂໍ້ມູນລົງທະບຽນ:</legend>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="code">ລະຫັດຢືນຢັນ</label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror" placeholder="ປ້ອນລະຫັດຢືນຢັນ" wire:model="code">
                        </div>
                    </div>
                </fieldset>
                <hr>
                <div class="form-group">
                    <button class="btn btn-warning float-end" wire:click="back">ກັບຄືນ</button>
                    <button class="btn btn-primary float-end" style="float: right;" wire:click="store">ຢືນຢັນ</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
</div>
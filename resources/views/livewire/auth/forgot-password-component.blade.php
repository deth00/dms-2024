<div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info">
                    <h5 class="phetsarath-font text-white">ໜ້າປ້ອນລະຫັດຢຶນຢັນ</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">ລະຫັດຜ່ານໃໝ່</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="ລະຫັດຜ່ານໃໝ່" wire:model="password">
                    </div>
                    <div class="form-group">
                        <label for="name">ຢຶນຢັນລະຫັດຜ່ານອີກຄັ້ງ</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="ປ້ອນລະຫັດຜ່ານໃໝ່ອີກຄັ້ງ" wire:model="confirm_password">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="name">ລະຫັດຢຶນຢັນຈາກອີເມວ</label>
                        <input type="text" name="pass" id="pass" class="form-control @error('pass') is-invalid @enderror" placeholder="ປ້ອນລະຫັດຢືນຢັນ" wire:model="pass">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-warning float-end text-white" wire:click="back">ກັບຄືນ</button>
                    <button class="btn btn-info float-end" style="float: right;" wire:click="confirm">ຢືນຢັນ</button>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

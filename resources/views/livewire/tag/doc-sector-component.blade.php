<div>
<div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ເອກະສານ</a></li>
                        <li class="breadcrumb-item active">ເອກະສານຕິດພັນກັບຂະແໜງ</li>
                    </ol>
                </div>
                <h4 class="page-title">ເອກະສານຕິດພັນກັບຂະແໜງ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-3">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align: center;" class="text-right">ສະແດງ &emsp;</td>
                                <td>
                                    <select wire:model="dataQ" wire:click="dataQS" name="Q" id="Q" class="form-control">
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
                        <input type="text" name="search" id="search" wire:model="search" wire:keydown.enter="searchData"
                            class="form-control" placeholder="ຄົ້ນຫາ">
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
                                        <tr class="text-center ">
                                            <th class="p-2">ລຳດັບ</th>
                                            <th class="p-2">ເບິ່ງເອກະສານ</th>
                                            <th class="p-2">ເລກທີເອກະສານ</th>
                                            <th class="p-2">ວັນທີເອກະສານ</th>
                                            <th class="p-2">ຫົວຂໍ້ເອກະສານ</th>
                                            <th class="p-2">ປະເພດເອກະສານ</th>
                                            <th class="p-2">ໝາຍເຫດ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($data as $item)
                                        <tr class="text-center">
                                            <td class="p-2">{{$no++}}</td>
                                            <td class="p-2">
                                                <a class="btn btn-primary" href="http://192.168.128.193:8080/{{$item['pathfile']}}" target="_bank"><i
                                                class="mdi mdi-file-download-outline"></i></a>
                                            </td>
                                            <td class="p-2">{{$item['doc_no']}}</td>
                                            <td class="p-2">{{date('d/m/Y',strtotime($item['doc_date']))}}</td>
                                            <td class="p-2">{{$item['doc_title']}}</td>
                                            <td class="p-2">{{$item['groupname']}}</td>
                                            <td class="p-2">{{$item['note']}}</td>
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
                        <span><br> ລວມຂໍ້ມູນທັງໝົດ <span class="text-danger">{{$count}}</span> ລາຍການ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

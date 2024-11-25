<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ຮັບ - ສົ່ງເອກະສານ</a></li>
                        <li class="breadcrumb-item active">ບຸກມາສ</li>
                    </ol>
                </div>
                <h4 class="page-title">ບຸກມາສ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="mails card-box">
                <div class="table-detail mail-right">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="btn-toolbar mt-4" role="toolbar">
                                <div class="btn-group mr-2">
                                    <a href="{{route('inbox')}}" type="button" class="btn btn-primary waves-effect waves-light"><i
                                            class="fa fa-inbox"></i></a>
                                    <a href="{{route('outbox')}}" type="button" class="btn btn-primary waves-effect waves-light"><i
                                            class="fas fa-envelope"></i></a>
                                    <a href="{{route('sent')}}" type="button" class="btn btn-primary waves-effect waves-light"><i
                                            class="fas fa-envelope-open-text"></i></a>
                                    <a href="{{route('bookmark')}}" type="button" class="btn btn-primary waves-effect waves-light"><i
                                            class="fa fa-star"></i></a>
                                    <a href="{{route('trash')}}" type="button" class="btn btn-primary waves-effect waves-light"><i
                                            class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->

                    <div class="table-responsive mt-3">
                    <table class="table table-hover mails m-0">
                            <thead>
                                <tr class="text-center">
                                    <th class="p-2" width="10%">ປຸ່ມກົດ</th>
                                    <th class="p-2" width="20%">ຜູ້ສົ່ງ</th>
                                    <th class="p-2" width="30%">ຫົວຂໍ້</th>
                                    <th class="p-2" width="20%">ເວລາ</th>
                                    <th class="p-2" width="20%">ສະຖານະ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $item)
                                <tr class="unread text-center text-black">
                                    <td class="p-2"><a href="javascript:void(0)" wire:click="remove({{$item['id']}})"><i class="far fa-trash-alt mr-4"></i></a> || &ensp; <a href="javascript:void(0)" wire:click="book({{$item['id']}})">@if($item['doc_type_for_user'] == 'NML')<i class="far fa-star mr-4"></i> @else <i class="fas fa-star mr-4 text-primary"></i> @endif</a></td>
                                    <td class="p-2" style="color: #000;" wire:click="read({{$item['id']}})">{{$item['emp_name']}}</td>
                                    <td class="p-2" style="color: #000;" wire:click="read({{$item['id']}})">{{$item['title']}}</td>
                                    <td class="p-2" style="color: #000;" wire:click="read({{$item['id']}})">{{date('d-m-Y H:i:s',strtotime($item['created_at']))}}</td>
                                    <td class="p-2" style="color: #000;" wire:click="read({{$item['id']}})">@if($item['stt_msg'] == 1) <span class="badge badge-danger">ຍັງບໍ່ອ່ານ</span> @else <span class="badge badge-success">ອ່ານແລ້ວ</span> @endif</td>
                                </tr>
                                @empty
                                <tr class="unread text-center">
                                    <td colspan="5" class="p-2">ບໍ່ມີຂໍ້ຄວາມ</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="row mt-3 mb-3">
                        <div class="col-7 mt-3">
                            ສະແດງ {{$count}}
                        </div>
                        <!-- <div class="col-5 mt-3">
                            <div class="btn-group float-right">
                                <button type="button" class="btn btn-secondary waves-effect"><i
                                        class="fa fa-chevron-left"></i></button>
                                <button type="button" class="btn btn-secondary waves-effect"><i
                                        class="fa fa-chevron-right"></i></button>
                            </div>
                        </div> -->
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
</div>
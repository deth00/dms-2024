<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ຮັບ - ສົ່ງເອກະສານ</a></li>
                        <li class="breadcrumb-item active">ກ່ອງຂໍ້ຄວາມ</li>
                    </ol>
                </div>
                <h4 class="page-title">ກ່ອງຂໍ້ຄວາມ</h4>
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
                                    <a href="{{route('inbox')}}" type="button"
                                        class="btn btn-primary waves-effect waves-light"><i class="fa fa-inbox"></i></a>
                                    <a href="{{route('outbox')}}" type="button"
                                        class="btn btn-primary waves-effect waves-light"><i
                                            class="fas fa-envelope"></i></a>
                                    <a href="{{route('sent')}}" type="button"
                                        class="btn btn-primary waves-effect waves-light"><i
                                            class="fas fa-envelope-open-text"></i></a>
                                    <a href="{{route('bookmark')}}" type="button"
                                        class="btn btn-primary waves-effect waves-light"><i class="fa fa-star"></i></a>
                                    <a href="{{route('trash')}}" type="button"
                                        class="btn btn-primary waves-effect waves-light"><i
                                            class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box mt-4">
                                <h5 class="mt-0"><b>{{$data['title']}}</b></h5>

                                <hr>

                                <div class="media mb-4">
                                    <a href="#" class="float-left mr-2">
                                        <img alt="profile" src="#"
                                            class="media-object avatar-sm rounded-circle">
                                    </a>
                                    <div class="media-body">
                                        <span
                                            class="media-meta float-right">{{date('d-m-Y',strtotime($data['date']))}}</span>
                                        <h5 class="text-primary font-16 m-0">{{$data['emp_name']}}</h5>
                                        <small class="text-muted">From: {{$data['email']}}</small>
                                    </div>
                                </div>
                                <!-- media -->

                                <hr>

                                <p>
                                    {!! $data['note'] !!}
                                </p>

                                <hr>

                                <h5 class="font-18"> <a href="http://192.168.128.193:8080/{{$data['pathfile']}}" target="_bank" class="btn btn-primary"><i class="fa fa-paperclip mr-2 mb-2"></i> download</h5></a> 

                                <div class="row">
                                    <div class="col-xl-12 col-sm-12">
                                    <!-- <iframe src="https://192.168.128.193:8443/{{$data['pathfile']}}" scrolling="auto" height="1080px"
                                        width="100%"> -->
                                    </div>
                                </div>
                            </div>
                            <!-- card-box -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                </div>
            </div>

        </div>
    </div>

</div>
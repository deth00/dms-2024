<div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ຂໍ້ມູນໃຊ້ງານລະບົບ</a></li>
                        <li class="breadcrumb-item active">ໂປຣຟາຍ</li>
                    </ol>
                </div>
                <h4 class="page-title">ໂປຣຟາຍ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                        <div class="text-center card-box shadow-none border border-secoundary">
                            <div class="member-card">
                                <div class="avatar-xl member-thumb mb-3 mx-auto d-block">

                                    @if ($profile)
                                    <img src="{{asset($profile->temporaryUrl())}}" class="rounded-circle img-thumbnail"
                                        alt="profile-image">
                                    <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                    @elseif ($profiles)
                                    <img src="{{asset('https://192.168.128.193:8443/'.$profiles)}}"
                                        class="rounded-circle img-thumbnail" alt="profile-image">
                                    @else
                                    <img src="{{asset('backend/assets/images/users/avatar-1.jpg')}}"
                                        class="rounded-circle img-thumbnail" alt="profile-image">
                                    @endif

                                </div>

                                <div class="">
                                    <h5 class="font-18 mb-1">{{$username}}</h5>
                                </div>

                                <div class="form-group" wire:ignore>
                                    <p>ອັບໂຫຼດຮູບພາບ</p>
                                    <input type="file" class="filestyle" wire:model="profile">
                                </div>

                                <hr>


                                <div class="row">
                                    <div class="col-6 text-right">
                                        <span class="text-muted font-13"><strong>ຊື່ເຂົ້າໃຊ້ງານ :</strong> </span>
                                    </div>
                                    <div class="col-6 text-left">
                                        <span class="ml-4 font-13">{{$username}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-right">
                                        <span class="text-muted font-13"><strong>ອີເມວ :</strong></span>
                                    </div>
                                    <div class="col-6 text-left">
                                        <span class="ml-4 font-13">{{$emails}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-right">
                                        <span class="text-muted font-13"><strong>ເບີໂທລະສັບ :</strong></span>
                                    </div>
                                    <div class="col-6 text-left">
                                        <span class="ml-4 font-13">{{$phone}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-right">
                                        <span class="text-muted font-13"><strong>ລະຫັດຜ່ານ :</strong> </span>
                                    </div>
                                    <div class="col-6 text-left">
                                        <span class="ml-4 font-13">******</span>
                                    </div>
                                </div>

                                <ul class="social-links list-inline mt-4">
                                    <li class="list-inline-item">
                                        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#"
                                            data-original-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#"
                                            data-original-title="Twitter"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#"
                                            data-original-title="Skype"><i class="fab fa-skype"></i></a>
                                    </li>
                                </ul>

                            </div>

                        </div>
                        <!-- end card-box -->

                    </div>
                    <!-- end col -->

                    <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12">

                        <div class="text-center">
                            <h5 class="header-title">ຂໍ້ມູນໂປຣຟາຍ</h5>
                            <hr>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <p>ຊື່ພາສາອັງກິດ</p>
                                    <input type="text" class="form-control" wire:model="name"
                                        placeholder="ຊື່ພາສາອັງກິດ">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <p>ລະຫັດຜ່ານ</p>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        wire:model="password" placeholder="ລະຫັດຜ່ານ">
                                    @error('password') <span style="color: red"
                                        class="error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <p>ຢືນຢັນລະຫັດຜ່ານ</p>
                                    <input type="password"
                                        class="form-control @error('confirm_password') is-invalid @enderror"
                                        wire:model="confirm_password" placeholder="ຢືນຢັນລະຫັດຜ່ານ">
                                    @error('confirm_password') <span style="color: red"
                                        class="error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <p>ເບີໂທລະສັບ <span class="text-danger">*</span></p>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        wire:model="phone" placeholder="ເບີໂທລະສັບ">
                                    @error('phone') <span style="color: red"
                                        class="error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <p>ອີເມວ <span class="text-danger">*</span></p>
                                    <input type="text" class="form-control @error('emails') is-invalid @enderror"
                                        wire:model="emails" placeholder="ອີເມວ" disabled>
                                    @error('email') <span style="color: red"
                                        class="error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">

                                <center>
                                    <button class="btn btn-warning phetsarath-font items-center"
                                        wire:click="store">ແກ້ໄຂໂປຣຟາຍ</button>
                                </center>

                            </div>
                        </div>

                    </div>
                    <!-- end col -->

                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
</div>
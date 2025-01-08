<div class="topbar-menu">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">

                <li class="has-submenu">
                    <a href="{{route('dashboard')}}"> <i class="mdi mdi-view-dashboard"></i>ໜ້າຫຼັກ</a>
                </li>

                <li class="has-submenu">
                    <a href="#"> <i class="mdi mdi-surround-sound"></i>ເອກະສານທົ່ວລະບົບ  ( {{$count_docc}} ) </a>
                    <ul class="submenu">
                        <li><a href="{{route('log-docc')}}">ເອກະສານແຈ້ງການ  ( {{$count_docc}} )</a></li>
                        <li><a href="{{route('docc')}}">ແຈ້ງການທົ່ວລະບົບ</a></li>
                    </ul>
                </li>

                <!-- <li class="has-submenu">
                    <a href="{{route('tag-private')}}"> <i class="mdi mdi-folder-zip-outline"></i>ເອກະສານກ່ຽວກັບວຽກງານສະເພາະ</a>
                </li> -->

                <li class="has-submenu">
                    <a href="#"> <i class="mdi mdi-folder-zip-outline"></i>ເອກະສານຕິດພັນ</a>
                    <ul class="submenu">
                        <li><a href="{{route('tag-dpart')}}">ເອກະສານຕິດພັນກັບພະແນກ</a></li>
                        <li><a href="{{route('tag-sector')}}">ເອກະສານຕິດພັນກັບຂະແໜງ</a></li>
                        <li><a href="{{route('tag-me')}}">ເອກະສານຕິດພັນກັບຕົນເອງ</a></li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href="#"> <i class="mdi mdi-message-text-outline"></i>ຮັບສົ່ງເອກະສານ ( {{$count_msg}} )</a>
                    <ul class="submenu">
                        <li><a href="{{route('inbox')}}">ກ່ອງຂໍ້ຄວາມ ( {{$count_msg}} )</a></li>
                        <li><a href="{{route('sent')}}">ສົ່ງຂໍ້ຄວາມ</a></li>
                        <li><a href="{{route('bookmark')}}">ບຸກມາສ</a></li>
                        <li><a href="{{route('trash')}}">ຖັງຂີ້ເຫຍື້ອ</a></li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href="#"> <i class="mdi mdi-file-document-box-multiple-outline"></i>ຂາເຂົ້າ-ຂາອອກ
                    </a>
                    <ul class="submenu">
                        @foreach ($data_doc_type as $item)
                            <li><a href="{{route('document',$item['id'])}}">{{$item['name']}}</a></li>
                        @endforeach
                    </ul>
                </li>
                @if ($rolename == 2)
                <li class="has-submenu">
                    <a href="#"> <i class="mdi mdi-file-settings-variant-outline"></i>ຕັ້ງຄ່າເອກະສານ
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('group')}}">ກຸ່ມ</a></li> 
                         <li><a href="{{route('dpart')}}">ພາກສ່ວນພາຍໃນ</a></li>
                        <li><a href="{{route('dpartment')}}">ພາກສ່ວນພາຍນອກ</a></li>
                        <li><a href="{{route('doctype')}}">ຮູບແບບເອກະສານ</a></li>
                        <li><a href="{{route('docgroup')}}">ປະເພດເອກະສານ</a></li>
                        <li><a href="{{route('docsheft')}}">ຕູ້ເອກະສານ</a></li>
                        <li><a href="{{route('docdock')}}">ໂກໂລໂນ</a></li> 
                     </ul>
                </li> 
                <li class="has-submenu">
                    <a href="#"> <i class="mdi mdi-file-settings-variant-outline"></i>ຕັ້ງຄ່າລະບົບ
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('unit')}}">ໜ່ວຍບໍລິການ</a></li> 
                        <li><a href="{{route('sector')}}">ຂະແໜງ</a></li> 
                        <li><a href="{{route('roles')}}">ສິດການເຂົ້າເຖິງ</a></li> 
                     </ul>
                </li> 
                @endif


            </ul>
            <!-- End navigation menu -->

            <div class="clearfix"></div>
        </div>
        <!-- end #navigation -->
    </div>
    <!-- end container -->
</div>
<!-- end navbar-custom -->
<div class="topbar-menu">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">

                <li class="has-submenu">
                    <a href="{{ route('dashboard') }}"> <i class="mdi mdi-view-dashboard"></i>ໜ້າຫຼັກ</a>
                </li>

                @if (!empty($data_role['ViewWide1']) || !empty($data_role['ViewWide2']))
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-surround-sound"></i>ເອກະສານແຈ້ງທົ່ວລະບົບ (
                            {{ $count_docc }} )
                        </a>
                        <ul class="submenu">
                            @if (!empty($data_role['ViewWide1']))
                                <li><a href="{{ route('log-docc') }}">ເອກະສານວີຊາສະເພາະ ( {{ $count_docc }} )</a></li>
                            @endif
                            <li><a href="#">ເອກະສານ 3 ອົງການຈັດຕັ້ງ ( {{ $count_docc }} )</a></li>
                            @if (!empty($data_role['ViewWide2']))
                                <li><a href="{{ route('docc') }}">ແຈ້ງການທົ່ວລະບົບ</a></li>
                            @endif

                        </ul>
                    </li>
                @endif


                <!-- <li class="has-submenu">
                    <a href="{{ route('tag-private') }}"> <i class="mdi mdi-folder-zip-outline"></i>ເອກະສານກ່ຽວກັບວຽກງານສະເພາະ</a>
                </li> -->

                @if (!empty($data_role['ViewRelate1']) || !empty($data_role['ViewRelate2']) || !empty($data_role['ViewRelate3']))
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-folder-zip-outline"></i>ເອກະສານຕິດພັນ</a>
                        <ul class="submenu">
                            @if (!empty($data_role['ViewRelate1']))
                                <li><a href="{{ route('tag-dpart') }}">ເອກະສານຕິດພັນກັບພະແນກ</a></li>
                            @endif
                            @if (!empty($data_role['ViewRelate2']))
                                <li><a href="{{ route('tag-sector') }}">ເອກະສານຕິດພັນກັບຂະແໜງ</a></li>
                            @endif
                            @if (!empty($data_role['ViewRelate3']))
                                <li><a href="{{ route('tag-me') }}">ເອກະສານຕິດພັນກັບຕົນເອງ</a></li>
                            @endif
                        </ul>
                    </li>
                @endif


                @if (
                    !empty($data_role['viewSend1']) ||
                        !empty($data_role['viewSend2']) ||
                        !empty($data_role['viewSend3']) ||
                        !empty($data_role['viewSend4']))
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-message-text-outline"></i>ຮັບສົ່ງເອກະສານ (
                            {{ $count_msg }}
                            )</a>
                        <ul class="submenu">
                            @if (!empty($data_role['viewSend1']))
                                <li><a href="{{ route('inbox') }}">ກ່ອງຂໍ້ຄວາມ ( {{ $count_msg }} )</a></li>
                            @endif
                            @if (!empty($data_role['viewSend2']))
                                <li><a href="{{ route('sent') }}">ສົ່ງຂໍ້ຄວາມ</a></li>
                            @endif
                            @if (!empty($data_role['viewSend3']))
                                <li><a href="{{ route('bookmark') }}">ບຸກມາສ</a></li>
                            @endif
                            @if (!empty($data_role['viewSend4']))
                                <li><a href="{{ route('trash') }}">ຖັງຂີ້ເຫຍື້ອ</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                <li class="has-submenu">
                    <a href="#"> <i class="mdi mdi-file-document-box-multiple-outline"></i>ຂາເຂົ້າ-ຂາອອກ
                    </a>
                    <ul class="submenu">
                        @foreach ($data_doc_type as $item)
                            <li><a href="{{ route('document', $item['id']) }}">{{ $item['name'] }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @if (
                    !empty($data_ori['PhukView']) ||
                        !empty($data_ori['KamView']) ||
                        !empty($data_ori['SaoView']) ||
                        !empty($data_ori['YinView']))
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-file-document-box-multiple-outline"></i>
                            @if (!empty($data_ori['PhukView']))
                                ຂາເຂົ້າ-ຂາອອກ ພັກ
                            @elseif (!empty($data_ori['KamView']))
                                ຂາເຂົ້າ-ຂາອອກ ກຳມະບານ
                            @elseif (!empty($data_ori['SaoView']))
                                ຂາເຂົ້າ-ຂາອອກ ຊາວໜຸ່ມ
                            @elseif (!empty($data_ori['YinView']))
                                ຂາເຂົ້າ-ຂາອອກ ແມ່ຍິງ
                            @endif

                        </a>
                        <ul class="submenu">
                            @foreach ($data_doc_type as $item)
                                <li><a href="{{ route('document-organi', $item['id']) }}">{{ $item['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endif

                @if (!empty($data_ho['HoView']))
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-file-document-box-multiple-outline"></i>ຂາເຂົ້າ-ຂາອອກ ສຍ
                        </a>
                        <ul class="submenu">
                            @foreach ($data_doc_type as $item)
                                <li><a href="{{ route('document-hq', $item['id']) }}">{{ $item['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endif

                @if (!empty($data_CK0['CKView']) || !empty($data_GS == 'GS_User') )
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-file-document-box-multiple-outline"></i>ເອກະສານ ສະເພາະ
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('document-secret-teams') }}">ເອກະສານ </a></li>
                            @if (!empty($data_CK0['RView']))
                                <li><a href="{{ route('document-secret-role') }}">ກຳນົດສິດ </a></li>
                            @endif

                        </ul>

                    </li>
                @endif


                {{-- @if ($rolename == 2) --}}
                @if (
                    !empty($data_role['viewGroup']) ||
                        !empty($data_role['viewIn']) ||
                        !empty($data_role['viewOn']) ||
                        !empty($data_role['viewStyle']) ||
                        !empty($data_role['viewType']) ||
                        !empty($data_role['viewTou']) ||
                        !empty($data_role['viewKolo']))
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-file-settings-variant-outline"></i>ຕັ້ງຄ່າເອກະສານ
                        </a>
                        <ul class="submenu">
                            @if (!empty($data_role['viewGroup']))
                                <li><a href="{{ route('group') }}">ກຸ່ມ</a></li>
                            @endif
                            @if (!empty($data_role['viewIn']))
                                <li><a href="{{ route('dpart') }}">ພາກສ່ວນພາຍໃນ</a></li>
                            @endif
                            @if (!empty($data_role['viewOn']))
                                <li><a href="{{ route('dpartment') }}">ພາກສ່ວນພາຍນອກ</a></li>
                            @endif
                            @if (!empty($data_role['viewStyle']))
                                <li><a href="{{ route('doctype') }}">ຮູບແບບເອກະສານ</a></li>
                            @endif
                            @if (!empty($data_role['viewType']))
                                <li><a href="{{ route('docgroup') }}">ປະເພດເອກະສານ</a></li>
                            @endif
                            @if (!empty($data_role['viewTou']))
                                <li><a href="{{ route('docsheft') }}">ຕູ້ເອກະສານ</a></li>
                            @endif
                            @if (!empty($data_role['viewKolo']))
                                <li><a href="{{ route('docdock') }}">ໂກໂລໂນ</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                {{-- <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-file-settings-variant-outline"></i>ຕັ້ງຄ່າລະບົບ
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('unit') }}">ໜ່ວຍບໍລິການ</a></li>
                            <li><a href="{{ route('sector') }}">ຂະແໜງ</a></li>
                            <li><a href="{{ route('roles') }}">ສິດການເຂົ້າເຖິງ</a></li>
                            <li><a href="{{ route('user') }}">ຜູ້ໃຊ້ງານລະບົບ</a></li>
                        </ul>
                    </li> --}}
                {{-- @endif --}}


            </ul>
            <!-- End navigation menu -->

            <div class="clearfix"></div>
        </div>
        <!-- end #navigation -->
    </div>
    <!-- end container -->
</div>
<!-- end navbar-custom -->

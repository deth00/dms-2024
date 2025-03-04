<div class="topbar-menu">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">

                <li class="has-submenu">
                    <a href="<?php echo e(route('dashboard')); ?>"> <i class="mdi mdi-view-dashboard"></i>ໜ້າຫຼັກ</a>
                </li>

                <?php if(!empty($data_role['ViewWide1']) || !empty($data_role['ViewWide2'])): ?>
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-surround-sound"></i>ເອກະສານແຈ້ງທົ່ວລະບົບ (
                            <?php echo e($count_docc); ?> )
                        </a>
                        <ul class="submenu">
                            <?php if(!empty($data_role['ViewWide1'])): ?>
                                <li><a href="<?php echo e(route('log-docc')); ?>">ເອກະສານວີຊາສະເພາະ ( <?php echo e($count_docc); ?> )</a></li>
                            <?php endif; ?>
                            <li><a href="#">ເອກະສານ 3 ອົງການຈັດຕັ້ງ ( <?php echo e($count_docc); ?> )</a></li>
                            <?php if(!empty($data_role['ViewWide2'])): ?>
                                <li><a href="<?php echo e(route('docc')); ?>">ແຈ້ງການທົ່ວລະບົບ</a></li>
                            <?php endif; ?>

                        </ul>
                    </li>
                <?php endif; ?>


                <!-- <li class="has-submenu">
                    <a href="<?php echo e(route('tag-private')); ?>"> <i class="mdi mdi-folder-zip-outline"></i>ເອກະສານກ່ຽວກັບວຽກງານສະເພາະ</a>
                </li> -->

                <?php if(!empty($data_role['ViewRelate1']) || !empty($data_role['ViewRelate2']) || !empty($data_role['ViewRelate3'])): ?>
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-folder-zip-outline"></i>ເອກະສານຕິດພັນ</a>
                        <ul class="submenu">
                            <?php if(!empty($data_role['ViewRelate1'])): ?>
                                <li><a href="<?php echo e(route('tag-dpart')); ?>">ເອກະສານຕິດພັນກັບພະແນກ</a></li>
                            <?php endif; ?>
                            <?php if(!empty($data_role['ViewRelate2'])): ?>
                                <li><a href="<?php echo e(route('tag-sector')); ?>">ເອກະສານຕິດພັນກັບຂະແໜງ</a></li>
                            <?php endif; ?>
                            <?php if(!empty($data_role['ViewRelate3'])): ?>
                                <li><a href="<?php echo e(route('tag-me')); ?>">ເອກະສານຕິດພັນກັບຕົນເອງ</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>


                <?php if(
                    !empty($data_role['viewSend1']) ||
                        !empty($data_role['viewSend2']) ||
                        !empty($data_role['viewSend3']) ||
                        !empty($data_role['viewSend4'])): ?>
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-message-text-outline"></i>ຮັບສົ່ງເອກະສານ (
                            <?php echo e($count_msg); ?>

                            )</a>
                        <ul class="submenu">
                            <?php if(!empty($data_role['viewSend1'])): ?>
                                <li><a href="<?php echo e(route('inbox')); ?>">ກ່ອງຂໍ້ຄວາມ ( <?php echo e($count_msg); ?> )</a></li>
                            <?php endif; ?>
                            <?php if(!empty($data_role['viewSend2'])): ?>
                                <li><a href="<?php echo e(route('sent')); ?>">ສົ່ງຂໍ້ຄວາມ</a></li>
                            <?php endif; ?>
                            <?php if(!empty($data_role['viewSend3'])): ?>
                                <li><a href="<?php echo e(route('bookmark')); ?>">ບຸກມາສ</a></li>
                            <?php endif; ?>
                            <?php if(!empty($data_role['viewSend4'])): ?>
                                <li><a href="<?php echo e(route('trash')); ?>">ຖັງຂີ້ເຫຍື້ອ</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <li class="has-submenu">
                    <a href="#"> <i class="mdi mdi-file-document-box-multiple-outline"></i>ຂາເຂົ້າ-ຂາອອກ
                    </a>
                    <ul class="submenu">
                        <?php $__currentLoopData = $data_doc_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('document', $item['id'])); ?>"><?php echo e($item['name']); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
                <?php if(
                    !empty($data_ori['PhukView']) ||
                        !empty($data_ori['KamView']) ||
                        !empty($data_ori['SaoView']) ||
                        !empty($data_ori['YinView'])): ?>
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-file-document-box-multiple-outline"></i>
                            <?php if(!empty($data_ori['PhukView'])): ?>
                                ຂາເຂົ້າ-ຂາອອກ ພັກ
                            <?php elseif(!empty($data_ori['KamView'])): ?>
                                ຂາເຂົ້າ-ຂາອອກ ກຳມະບານ
                            <?php elseif(!empty($data_ori['SaoView'])): ?>
                                ຂາເຂົ້າ-ຂາອອກ ຊາວໜຸ່ມ
                            <?php elseif(!empty($data_ori['YinView'])): ?>
                                ຂາເຂົ້າ-ຂາອອກ ແມ່ຍິງ
                            <?php endif; ?>

                        </a>
                        <ul class="submenu">
                            <?php $__currentLoopData = $data_doc_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route('document-organi', $item['id'])); ?>"><?php echo e($item['name']); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(!empty($data_ho['HoView'])): ?>
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-file-document-box-multiple-outline"></i>ຂາເຂົ້າ-ຂາອອກ ສຍ
                        </a>
                        <ul class="submenu">
                            <?php $__currentLoopData = $data_doc_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route('document-hq', $item['id'])); ?>"><?php echo e($item['name']); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(!empty($data_CK0['CKView']) || !empty($data_GS) ): ?>
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-file-document-box-multiple-outline"></i>ເອກະສານ ກວດກາ
                        </a>
                        <ul class="submenu">
                            <li><a href="<?php echo e(route('document-secret')); ?>">ເອກະສານ </a></li>
                            <?php if(!empty($data_CK0['CK-add'])): ?>
                                <li><a href="<?php echo e(route('document-secret-role')); ?>">ກຳນົດສິດ </a></li>
                            <?php endif; ?>

                        </ul>

                    </li>
                <?php endif; ?>


                
                <?php if(
                    !empty($data_role['viewGroup']) ||
                        !empty($data_role['viewIn']) ||
                        !empty($data_role['viewOn']) ||
                        !empty($data_role['viewStyle']) ||
                        !empty($data_role['viewType']) ||
                        !empty($data_role['viewTou']) ||
                        !empty($data_role['viewKolo'])): ?>
                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-file-settings-variant-outline"></i>ຕັ້ງຄ່າເອກະສານ
                        </a>
                        <ul class="submenu">
                            <?php if(!empty($data_role['viewGroup'])): ?>
                                <li><a href="<?php echo e(route('group')); ?>">ກຸ່ມ</a></li>
                            <?php endif; ?>
                            <?php if(!empty($data_role['viewIn'])): ?>
                                <li><a href="<?php echo e(route('dpart')); ?>">ພາກສ່ວນພາຍໃນ</a></li>
                            <?php endif; ?>
                            <?php if(!empty($data_role['viewOn'])): ?>
                                <li><a href="<?php echo e(route('dpartment')); ?>">ພາກສ່ວນພາຍນອກ</a></li>
                            <?php endif; ?>
                            <?php if(!empty($data_role['viewStyle'])): ?>
                                <li><a href="<?php echo e(route('doctype')); ?>">ຮູບແບບເອກະສານ</a></li>
                            <?php endif; ?>
                            <?php if(!empty($data_role['viewType'])): ?>
                                <li><a href="<?php echo e(route('docgroup')); ?>">ປະເພດເອກະສານ</a></li>
                            <?php endif; ?>
                            <?php if(!empty($data_role['viewTou'])): ?>
                                <li><a href="<?php echo e(route('docsheft')); ?>">ຕູ້ເອກະສານ</a></li>
                            <?php endif; ?>
                            <?php if(!empty($data_role['viewKolo'])): ?>
                                <li><a href="<?php echo e(route('docdock')); ?>">ໂກໂລໂນ</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                
                


            </ul>
            <!-- End navigation menu -->

            <div class="clearfix"></div>
        </div>
        <!-- end #navigation -->
    </div>
    <!-- end container -->
</div>
<!-- end navbar-custom -->
<?php /**PATH D:\Project\Web\Font-End\dms-2024\resources\views/components/layouts/navmenu.blade.php ENDPATH**/ ?>
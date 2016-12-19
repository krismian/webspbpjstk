<?php $__env->startSection('slider'); ?>
    <?php echo $__env->make('layouts.carousel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <hr>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('berita'); ?>
    <ul class="nav nav-tabs">
        <li><a href="/">Berita Publik</a> </li>
        <li class="active"><a href="#">Berita Internal</a></li>
    </ul>
    <div class="tab-content">
        <div id="berita" class="tab-pane fade">
            <p>&nbsp;</p>
        </div>
        <div id="internal" class="text-justify tab-pane fade in active">
            <?php if(Auth::check()): ?>

                <div class="row" style="padding-right: 20px; padding-left: 20px">

                    <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <div class="col-md-4">
                            <h2><a href="berita/<?php echo e($news->id); ?>"><?php echo e($news->judul); ?></a></h2>
                            <p><?php echo strip_tags(str_limit($news->isi, 150)); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
            <?php else: ?>
                <p>Halaman ini hanya dapat diakses oleh anggota serikat pekerja BPJS Ketenagakerjaan. Silahkan login menggunakan email korporat untuk dapat
                    mengakses halaman ini.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php echo e($berita->links()); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('panel'); ?>
    <?php echo $__env->make('layouts.panel.agenda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('layouts.panel.berita', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
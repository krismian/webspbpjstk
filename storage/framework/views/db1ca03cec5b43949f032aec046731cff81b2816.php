<?php $__env->startSection('slider'); ?>
    <?php echo $__env->make('layouts.carousel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('berita'); ?>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#">Berita Publik</a> </li>
        <li><a href="/internal">Berita Internal</a></li>
    </ul>
    <div class="tab-content">
        <div id="berita" class="text-justify tab-pane fade in active">
            <p>&nbsp;</p>
            <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <h2><a href="berita/<?php echo e($news->id); ?>"><?php echo e($news->judul); ?></a></h2>
                <p><?php echo $news->isi; ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
        <div id="internal" class="tab-pane fade">
        <?php if(Auth::check()): ?>
                <p>Akses granted</p>
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




<?php echo $__env->make('layouts.main_backup', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
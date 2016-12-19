<?php $__env->startSection('slider'); ?>
    <?php echo $__env->make('layouts.carousel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <hr>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('berita'); ?>
    <ul class="nav nav-tabs">
        <?php if( $sifat == 'publik'): ?>
            <li class="active"><a href="#">Berita Publik</a></li>
            <li><a href="/internal">Berita Internal</a></li>
            <?php else: ?>
            <li><a href="/">Berita Publik</a></li>
            <li class="active"><a href="#">Berita Internal</a></li>
            <?php endif; ?>
    </ul>
    <div class="tab-content">
        <div id="berita" class="text-justify tab-pane fade in active">
            <p>&nbsp;</p>
            <div class="row" style="padding-right: 20px; padding-left: 20px">
                <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php if(!Auth::check() && $sifat == 'internal'): ?>
                        <p>Maaf, halaman ini hanya dapat diakses oleh anggota Serikat Pekerja BPJS Ketenakerjaan. Silahkan login untuk mengakses halaman ini. Terimakasih.</p>
                    <?php else: ?>
                        <div class="col-md-4">
                            <div class="baris-berita">
                                <h4><a href="berita/<?php echo e($news->id); ?>"><?php echo e($news->judul); ?></a></h4>
                                <p><?php echo strip_tags(str_limit($news->isi, 100)); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-12">

        <?php echo e($berita->links()); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('panel'); ?>
    <?php echo $__env->make('layouts.panel.agenda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('layouts.panel.berita', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="/public/js/frosted.bar.js"></script>
    
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="col-md-2 links">
    <h3>Pengaduanku</h3>
    <p>Data tidak ditemukan</p>
    <h3>Beritaku</h3>
    <?php if(Auth::check()): ?>
        <?php $__currentLoopData = $beritaku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mynews): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <h5><?php echo e($mynews->judul); ?></h5>
            <p><?php echo e(strip_tags(str_limit($mynews->isi, 50))); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <a href="/tulisberita" class="btn btn-primary">Tulis Berita</a>
        <?php else: ?>
        <p>Silahkan login untuk menulis berita</p>
        <?php endif; ?>

</div>
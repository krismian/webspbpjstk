<?php $__env->startSection('berita'); ?>
    <p class="text-left"><a href="/"><span class="glyphicon glyphicon-chevron-left"></span>Kembali ke Berita</a></p>
    <h2><?php echo e($berita->judul); ?></h2>
    <div class="text-justify">
        <p style="font-size: 12px; ">Penulis : <?php echo e($berita->user()->value('first_name')); ?> <?php echo e($berita->user()->value('last_name')); ?></p>
        <p style="font-size: 12px; line-height: 1px">Ditulis pada tanggal <?php echo e($berita->created_at->format('d M Y h:m')); ?></p>
        <hr>
        <div class="">
            <p><?php echo $berita->isi; ?></p>
        </div>
        <p><a id="komentar"></a></p>
        <h4>Komentar :</h4>
    <?php $__currentLoopData = $komentar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $komenta): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="komentar">
                <p style="font-weight: bold"><?php echo e($komenta->user()->value('email')); ?></p>
                <p><?php echo $komenta->isi; ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <div class="text-center">
            <?php echo e($komentar->render()); ?>

        </div>
        <h4>Komentar Anda :</h4>
        <?php if(Auth::check()): ?>
            <?php echo e(Form::open(['route' => ['post.komentar', $berita->id]])); ?>

            <div class="form-group">
                <?php echo e(Form::textarea('komentar', null, ['class' => 'form-control'])); ?>

            </div>

            <div class="form-group">
                <?php echo e(Form::submit('Kirim', ['class' => 'form-control btn btn-primary'])); ?>

            </div>
        <?php else: ?>
            <p>Jika Anda anggota Serikat Pekerja BPJS Ketenagakerjaan, silahkan login untuk dapat menulis komentar Anda</p>
            <?php echo e(Form::close()); ?>

        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('panel'); ?>
    <div class="col-md-2 col-md-pull-8 hidden-xs">
        <h3>Daftar Berita</h3>
        <ul class="nav nav-tabs">
            <?php if( $sifat == 'publik'): ?>
                <li class="active"><a href="#">Publik</a></li>
                <li><a href="/berita/<?php echo e($berita->id); ?>/internal">Internal</a></li>
            <?php else: ?>
                <li><a href="/berita/<?php echo e($berita->id); ?>">Publik</a></li>
                <li class="active"><a href="#">Internal</a></li>
            <?php endif; ?>
        </ul>
        <div class="tab-content">
            <div id="berita" class="text-left tab-pane fade in active">
                <?php if(!Auth::check() && $sifat == 'internal'): ?>
                    <p>Maaf, halaman ini hanya dapat diakses oleh anggota Serikat Pekerja BPJS Ketenakerjaan. Silahkan login untuk mengakses halaman ini. Terimakasih.</p>
                <?php else: ?>
                            <?php $__currentLoopData = $daftarBerita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listBerita): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <h4><a href="/berita/<?php echo e($listBerita->id); ?> <?php if($listBerita->sifat_id == '2'): ?> /internal <?php endif; ?>"><?php echo e($listBerita->judul); ?></a></h4>
                                <p><?php echo e(strip_tags(str_limit($listBerita->isi, 100))); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
        <?php echo e($daftarBerita->links()); ?>

    </div>

    <div class="col-md-2">
        <h3>Gallery</h3>
        <ul>
            <li>
                <?php $__currentLoopData = $berita->gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gambar): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="row img-thumbnail">
                        <img class="pics" src="<?php echo e($gambar->image_path_thumb); ?>/thumbs/<?php echo e($gambar->filename); ?>" style="width: 100%"
                        data-glisse-big = "<?php echo e($gambar->image_path); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                
            </li>

        </ul>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="/public/js/froste.bar.js"></script>
    <script>
        $(function () {
            $('.pics').glisse({
                changeSpeed: 550,
                speed: 500,
                effect:'roll',
                fullscreen: false
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
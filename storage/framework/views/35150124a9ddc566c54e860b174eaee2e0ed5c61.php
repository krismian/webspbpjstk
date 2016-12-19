<?php $__env->startSection('berita'); ?>
    <?php
    print_r(pathinfo('/some/path/.test')['dirname']);
    ?>
    <?php echo e(Form::open(['url' => 'berita', 'method' => 'post'])); ?>

    <div class="form-group spasi">
        <?php echo e(Form::label('judul', 'Judul')); ?>

        <?php echo e(Form::text('judul', null, ['class' => 'form-control', 'placeholder' => 'tulis judul berita'])); ?>

    </div>

    <div class="form-group">
        <?php echo e(Form::select('sifat',$sifat, null, ['class' => 'form-control', 'placeholder' => 'Pilih sifat berita ...'])); ?>

    </div>

    <div class="form-group">
        <?php echo Form::textarea('isi', null, ['class' => 'form-control', 'placeholder' => 'tulis isi berita', 'id' => 'ckeditor']); ?>

    </div>

    <h2>Lampiran gambar</h2>
    <?php for($i=1;$i<=10;$i++): ?>
        <div class="col-md-8">
            <div class="input-group row">
              <span class="input-group-btn">
                <a id="gambar<?php echo e($i); ?>" data-input="thumbnail<?php echo e($i); ?>" data-preview="holder<?php echo e($i); ?>" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Pilih
                </a>
              </span>
                <input id="thumbnail<?php echo e($i); ?>" class="form-control" type="text" name="filepath[]">
            </div>
        </div>
        <div class="col-md-4">
            <img id="holder<?php echo e($i); ?>" style="margin-top:15px;max-height:100px;">
        </div>
    <?php endfor; ?>

    <div class="form-group">
        <?php echo e(Form::submit('Kirim berita', ['class' => 'form-control btn btn-primary'])); ?>

    </div>

    <?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="public/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=<?php echo e(csrf_token()); ?>',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=<?php echo e(csrf_token()); ?>'
        });
    </script>
    <script>
        var gambar;
        $('#gambar1').filemanager('image');
        $('#gambar2').filemanager('image');
        $('#gambar3').filemanager('image');
        $('#gambar4').filemanager('image');
        $('#gambar5').filemanager('image');
        $('#gambar6').filemanager('image');
        $('#gambar7').filemanager('image');
        $('#gambar8').filemanager('image');
        $('#gambar9').filemanager('image');
        $('#gambar10').filemanager('image');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
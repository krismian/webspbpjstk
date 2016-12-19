@extends('layouts.main')
@section('berita')
    <?php
    print_r(pathinfo('/some/path/.test')['dirname']);
    ?>
    {{ Form::open(['url' => 'berita', 'method' => 'post']) }}
    <div class="form-group spasi">
        {{ Form::label('judul', 'Judul') }}
        {{ Form::text('judul', null, ['class' => 'form-control', 'placeholder' => 'tulis judul berita']) }}
    </div>

    <div class="form-group">
        {{ Form::select('sifat',$sifat, null, ['class' => 'form-control', 'placeholder' => 'Pilih sifat berita ...']) }}
    </div>

    <div class="form-group">
        {!! Form::textarea('isi', null, ['class' => 'form-control', 'placeholder' => 'tulis isi berita', 'id' => 'ckeditor']) !!}
    </div>

    <h2>Lampiran gambar</h2>
    @for($i=1;$i<=10;$i++)
        <div class="col-md-8">
            <div class="input-group row">
              <span class="input-group-btn">
                <a id="gambar{{ $i }}" data-input="thumbnail{{ $i }}" data-preview="holder{{ $i }}" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Pilih
                </a>
              </span>
                <input id="thumbnail{{ $i }}" class="form-control" type="text" name="filepath[]">
            </div>
        </div>
        <div class="col-md-4">
            <img id="holder{{ $i }}" style="margin-top:15px;max-height:100px;">
        </div>
    @endfor

    <div class="form-group">
        {{ Form::submit('Kirim berita', ['class' => 'form-control btn btn-primary']) }}
    </div>

    {{ Form::close() }}
@endsection

@section('script')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="public/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
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
@endsection
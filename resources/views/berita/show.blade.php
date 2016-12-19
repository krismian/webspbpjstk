@extends('layouts.main')
@section('berita')
    <p class="text-left"><a href="/"><span class="glyphicon glyphicon-chevron-left"></span>Kembali ke Berita</a></p>
    <h2>{{ $berita->judul }}</h2>
    <div class="text-justify">
        <p style="font-size: 12px; ">Penulis : {{ $berita->user()->value('first_name') }} {{ $berita->user()->value('last_name') }}</p>
        <p style="font-size: 12px; line-height: 1px">Ditulis pada tanggal {{ $berita->created_at->format('d M Y h:m') }}</p>
        <hr>
        <div class="">
            <p>{!! $berita->isi !!}</p>
        </div>
        <p><a id="komentar"></a></p>
        <h4>Komentar :</h4>
    @foreach($komentar as $komenta)
            <div class="komentar">
                <p style="font-weight: bold">{{ $komenta->user()->value('email') }}</p>
                <p>{!! $komenta->isi !!}</p>
            </div>
        @endforeach
        <div class="text-center">
            {{ $komentar->render() }}
        </div>
        <h4>Komentar Anda :</h4>
        @if(Auth::check())
            {{ Form::open(['route' => ['post.komentar', $berita->id]]) }}
            <div class="form-group">
                {{ Form::textarea('komentar', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Kirim', ['class' => 'form-control btn btn-primary']) }}
            </div>
        @else
            <p>Jika Anda anggota Serikat Pekerja BPJS Ketenagakerjaan, silahkan login untuk dapat menulis komentar Anda</p>
            {{ Form::close() }}
        @endif
    </div>
@endsection
@section('panel')
    <div class="col-md-2 col-md-pull-8 hidden-xs">
        <h3>Daftar Berita</h3>
        <ul class="nav nav-tabs">
            @if( $sifat == 'publik')
                <li class="active"><a href="#">Publik</a></li>
                <li><a href="/berita/{{ $berita->id }}/internal">Internal</a></li>
            @else
                <li><a href="/berita/{{ $berita->id }}">Publik</a></li>
                <li class="active"><a href="#">Internal</a></li>
            @endif
        </ul>
        <div class="tab-content">
            <div id="berita" class="text-left tab-pane fade in active">
                @if(!Auth::check() && $sifat == 'internal')
                    <p>Maaf, halaman ini hanya dapat diakses oleh anggota Serikat Pekerja BPJS Ketenakerjaan. Silahkan login untuk mengakses halaman ini. Terimakasih.</p>
                @else
                            @foreach($daftarBerita as $listBerita)
                                <h4><a href="/berita/{{ $listBerita->id }} @if($listBerita->sifat_id == '2') /internal @endif">{{ $listBerita->judul }}</a></h4>
                                <p>{{ strip_tags(str_limit($listBerita->isi, 100)) }}</p>
                            @endforeach
                @endif
            </div>
        </div>
        {{ $daftarBerita->links() }}
    </div>

    <div class="col-md-2">
        <h3>Gallery</h3>
        <ul>
            <li>
                @foreach($berita->gambar as $gambar)
                    <div class="row img-thumbnail">
                        <img class="pics" src="{{ $gambar->image_path_thumb }}/thumbs/{{ $gambar->filename }}" style="width: 100%"
                        data-glisse-big = "{{ $gambar->image_path }}">
                    </div>
                @endforeach
                {{--@for ($i=1; $i < 10; $i++)
                    <div class="row img-thumbnail">

                        <img style="width: 100%" class="pics" src = "http://localhost:8000/public/photos/4/thumbs/58521332b017b.jpg"
                             data-glisse-big = "http://localhost:8000/public/photos/4/58521332b017b.jpg"
                             rel="group1" title="my awesome picture">
                    </div>
                @endfor--}}
            </li>

        </ul>
    </div>
@endsection
@section('script')
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
@endsection
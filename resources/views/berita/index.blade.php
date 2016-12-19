@extends('layouts.main')
@section('slider')
    @include('layouts.carousel')
    <hr>
@endsection
@section('berita')
    <ul class="nav nav-tabs">
        @if( $sifat == 'publik')
            <li class="active"><a href="#">Berita Publik</a></li>
            <li><a href="/internal">Berita Internal</a></li>
            @else
            <li><a href="/">Berita Publik</a></li>
            <li class="active"><a href="#">Berita Internal</a></li>
            @endif
    </ul>
    <div class="tab-content">
        <div id="berita" class="text-justify tab-pane fade in active">
            <p>&nbsp;</p>
            <div class="row" style="padding-right: 20px; padding-left: 20px">
                @foreach($berita as $news)
                    @if(!Auth::check() && $sifat == 'internal')
                        <p>Maaf, halaman ini hanya dapat diakses oleh anggota Serikat Pekerja BPJS Ketenakerjaan. Silahkan login untuk mengakses halaman ini. Terimakasih.</p>
                    @else
                        <div class="col-md-4">
                            <div class="baris-berita">
                                <h4><a href="berita/{{ $news->id }}">{{ $news->judul }}</a></h4>
                                <p>{!!  strip_tags(str_limit($news->isi, 100)) !!}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-12">

        {{ $berita->links() }}
    </div>

@endsection

@section('panel')
    @include('layouts.panel.agenda')

    @include('layouts.panel.berita')
@endsection

@section('script')
    <script src="/public/js/frosted.bar.js"></script>
    {{--<script>
        $(document).ready(function(){
            $(".nav-tabs a").click(function(){
                $(this).tab('show');
            });
            $('.nav-tabs a').on('shown.bs.tab', function(event){
                var x = $(event.target).text();         // active tab
                var y = $(event.relatedTarget).text();  // previous tab
                $(".act span").text(x);
                $(".prev span").text(y);
            });
        });
    </script>--}}
@endsection




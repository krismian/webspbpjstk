<div class="col-md-2 links">
    <h3>Pengaduanku</h3>
    <p>Data tidak ditemukan</p>
    <h3>Beritaku</h3>
    @if(Auth::check())
        @foreach($beritaku as $mynews)
            <h5>{{ $mynews->judul }}</h5>
            <p>{{ strip_tags(str_limit($mynews->isi, 50)) }}</p>
        @endforeach
        <a href="/tulisberita" class="btn btn-primary">Tulis Berita</a>
        @else
        <p>Silahkan login untuk menulis berita</p>
        @endif

</div>
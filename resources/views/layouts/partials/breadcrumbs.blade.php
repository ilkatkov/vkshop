<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Товары</a></li>
        @foreach($breadcrumbs as $breadcrumb)
            <li class="breadcrumb-item"><a href="/katalog/{{$breadcrumb['link']}}">{{$breadcrumb['title']}}</a></li>
        @endforeach
        <li class="breadcrumb-item active" aria-current="page">{{$category->title}}</li>
    </ol>
</nav>

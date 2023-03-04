<div class="col">
    <div class="card h-100">
        <img src="/{{$item->image}}" class="card-img-top" alt="{{$item->title}}">
        <div class="card-body">
            <a class="card-title" href="/tovari/{{$item->link}}">{{$item->title}}</a>
            <p class="card-text">{{$item->purchased}}</p>
        </div>
    </div>
</div>

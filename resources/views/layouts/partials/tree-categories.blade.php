<div role="tabpanel">
    <div class="list-group" id="myList" role="tablist">
        @foreach($categories as $first)
            <button class="list-group-item list-group-item-action" data-bs-toggle="list" href="#{{$first->link}}" role="tab"><img src="{{$first->image}}" class="categoryLogoMenu" alt="{{$first->title}}"><a style="text-decoration: none;color:inherit;" href="/katalog/{{$first->link}}">{{$first->title}}</a></button>
        @endforeach
    </div>
    <div class="tab-content">
        @foreach($categories as $first)
            <div style="margin-top: 32px;" class="tab-pane" id="{{$first->link}}" role="tabpanel">
                <div role="tabpanel">
                    <div class="list-group" id="myList" role="tablist">
                        @foreach($first->childrenRecursive as $second)
                            <button class="list-group-item list-group-item-action" data-bs-toggle="list" href="#{{$second->link}}" role="tab"><img src="{{$second->image}}" class="categoryLogoMenu" alt="{{$second->title}}"><a style="text-decoration: none;color:inherit;" href="/katalog/{{$second->link}}">{{$second->title}}</a></button>
                        @endforeach
                    </div>
                    <div class="tab-content">
                        @foreach($first->childrenRecursive as $second)
                            <div style="margin-top: 32px;" class="tab-pane" id="{{$second->link}}" role="tabpanel">
                                <div role="tabpanel">
                                    <div class="list-group" id="myList" role="tablist">
                                        @foreach($second->childrenRecursive as $third)
                                            <a class="list-group-item list-group-item-action" href="/katalog/{{$third->link}}"><img src="{{$third->image}}" class="categoryLogoMenu" alt="{{$third->title}}">{{$third->title}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

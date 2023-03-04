@if(\Illuminate\Support\Facades\Session::get('city') !== null)
    <p>Вы находитесь в городе <u><a href="{!! route('showCity', ['cityId'=>\Illuminate\Support\Facades\Session::get('cityId')]) !!}">{{\Illuminate\Support\Facades\Session::get('city')}}</a></u></p>
    <p><a href="{!! route('cities') !!}">Сменить город</a></p>
@else
    <p>Выберите город</p>
    <ul>
        @foreach($cities as $city)
            <li><a href="{!! route('setCity', ['cityId'=>$city->id]) !!}">{{$city->title}}</a></li>
        @endforeach
    </ul>
@endif

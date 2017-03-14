@extends('layouts.app_home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                @if (Route::has('login'))
                    <div class="panel-body">
                    <div class="top-right links">
                        @if (Auth::check())
                            {!! Form::open(array('url' => 'sendemailverification','action' => 'HomeController@sendemailverification')) !!}
                                <input name="id" type="hidden" value="{{Auth::user()->id}}">
                                <input type="text" name="email" placeholder="Email">
                                <button type="submit">Send Email</button>
                            {!! Form::close() !!}
                            @if (session('text'))
                                <p style="color:#1E90FF;text-align:center;font-weight: bold;">{{ session('text') }}</p>
                            @endif
                            {!! Form::model(Auth::user(),[ 'method' => 'PATCH', 'action' => ['UsersController@update', Auth::user()->id] ]) !!}
                                <input type="text" name="bank" placeholder="address" value="{{ old('bank') }}">
                                <button type="submit">Update</button>
                            {!! Form::close() !!}
                            {!! Form::open(array('url' => 'articles')) !!}
                                <input type="text" name="category" placeholder="category" value="">
                                <input type="text" name="image" placeholder="image" value="">
                                <input type="text" name="phone" placeholder="phone" value="">
                                <input type="text" name="address" placeholder="address" value="">
                                <input type="text" name="description" placeholder="description" value="">
                                <input type="text" name="price" placeholder="price" value="">
                                <input type="text" name="coordinates" placeholder="coordinates" value="">
                                <button type="submit">Create</button>
                            {!! Form::close() !!}
                            {!! Form::model($article,[ 'method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id] ]) !!}
                                <input type="text" name="address" placeholder="address" value="">
                                <button type="submit">Update</button>
                            {!! Form::close() !!}
                            {!! Form::open(array('url' => 'comments')) !!}
                                <textarea name="comment"></textarea>
                                <input type="hidden" name="article_id" value="{{$article->id}}">
                                <button type="submit">Create</button>
                            {!! Form::close() !!}
                            @if (session('like'.$comment->id)!="ON")
                                {!! Form::open(array('url' => 'comments/like','method' => 'PUT')) !!}
                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                    <button type="submit">LIKE</button>
                                {!! Form::close() !!}
                            @else
                                <button type="button" style="background-color:blue">LIKE</button>
                            @endif

                            {{$start = ($article->start_1 + $article->start_2*2 + $article->start_3*3 + $article->start_4*4 + $article->start_5*5)/($article->start_1 + $article->start_2 + $article->start_3 + $article->start_4 + $article->start_5)}}
                            @if (session('start'.$article->id)!="ON")
                                {!! Form::open(array('url' => 'articles/starts','method' => 'PUT')) !!}
                                    <input type="hidden" name="article_id" value="{{$article->id}}">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <button type="submit" style="background-color:@if($i <= $start)yellow @else white @endif" name="start" value="{{$i}}">{{ $i }}</button>
                                    @endfor
                                {!! Form::close() !!}
                            @else
                                @for ($i = 1; $i <= 5; $i++)
                                    <button type="button" style="background-color:red">{{ $i }}</button>
                                @endfor
                            @endif
                        @else
                            <p>check</p>
                        @endif
                    </div>
                @endif             
            </div>
        </div>
    </div>
</div>
@endsection

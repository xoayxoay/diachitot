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

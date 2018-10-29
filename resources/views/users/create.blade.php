@extends('layouts.default')
@section('title', '注册')

@section('content')
	<div class="jumbotron" id="signup-card">
		 @include('shared._errors')
         <div id="register" class="signup-page">
			 <img src="{{ asset('/images/planet.png') }}" id="signup-logo" width="120px">
             <h3>註冊賬戶</h3>
             <form method="POST" action="{{ route('users.store') }}" id="signup">
                 {{ csrf_field() }}
                 <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="用戶名">
				 <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="郵箱">
                 <input type="text" name="institute" class="form-control" value="{{ old( 'institute') }}" placeholder="工作單位">
                 <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="密碼">
                 <input type="password" name="password_confirmation" class="form-control " value="{{ old('password_confirmation') }}" placeholder="確認密碼">
                 <button type="submit" id="submit" class="btn-signup">提交</button>
                 <a href="/" id="cancel" class="btn-signup">返回</a>
             </form>
         </div>
     </div>
@stop

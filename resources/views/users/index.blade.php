@extends('layouts.default')
@section('title', '用戶管理')

@section('content')
<div class="jumbotron" style="padding: 0;">
    <div class="users">
		<h3>用户管理</h3>
        <div id="editors">
            <h3>Editors</h3>
            <ul>
            @foreach ($users as $user)
                @if ($user->position == 'editor' and $user->editable == 1)
                    <li>
                        <img src="{{ 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($user->email))) . '?s=25&amp;d=identicon' }}" width="25px" height="25px" style="border-radius: 100%;"/>
                        <p>{{ $user->name }}</p>
                        <div class="permissions">
                            <form method="POST" action="{{ route('users.update', $user->id) }}">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}
                                <input type="text" name="position" value="user" style="display:none;">
                                <button name="editable" value="0" type="submit" id="revoke">&#9818 撤销</button>
                            </form>
                        </div>
                    </li>
                @endif
            @endforeach
            </ul>
        </div>
        <hr>
        <div id="visitors">
            <h3>Common Users</h3>
            <ul>
            @foreach ($users as $user)
                @if ($user->position == 'user' and $user->editable == 0)
                    <li>
                        <img src="{{ 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($user->email))) . '?s=25&amp;d=identicon' }}" width="25px" height="25px" style="border-radius: 100%;"/>
                        <p>{{ $user->name }}</p>
                        <div class="permissions">
                            <form method="POST" action="{{ route('users.update', $user->id) }}">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}
                                <input type="text" name="position" value="editor" style="display:none;">
                                <button name="editable" value="1" type="submit" id="authorize">&#9818 授权</button>
                            </form>
                        </div>
                    </li>
                @endif
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

@extends('layouts/login_layout')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-4 offset-lg-4">

                {{-- form --}}
                <form action="{{route('login.store')}}" method="post">

                    {{-- csrf --}}
                    @csrf

                    <h1>LOGIN</h1>
                    <hr>
                    <div class="form-group my-3">
                        <label>User:</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label>Password:</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group my-3">
                        <input type="submit" value="ENTER" class="btn btn-primary">
                    </div>

                {{-- /form --}}
                </form>
                
                {{-- validation errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $msg)
                            <div>{{$msg}}</div>
                        @endforeach
                    </div>
                @endif

            {{-- login errors --}}
            {{-- @error('error')
                <div class="alert alert-danger text-center">{{$message}}</div> 
            @enderror --}}
            </div>
        </div>
    </div>
@endsection

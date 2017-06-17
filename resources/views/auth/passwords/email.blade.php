@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="container is-fluid">
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <h1 class="title ">Reset password</h1>

                    @if (session('status'))
                        <div class="notification is-primary">
                            Primar lorem ipsum dolor sit amet, consectetur
                            adipiscing elit lorem ipsum dolor sit amet,
                            consectetur adipiscing elit
                        </div>
                    @endif

                    <form action="{{ route('password.email') }}" method="post" class="form">
                        {{ csrf_field() }}

                        <div class="field">
                            <label for="email" class="label">E-mail Address</label>
                            <p class="control">
                                <input id="email" type="text" name="email" 
                                class="input{{ $errors->has('email') ? ' is-danger' : '' }}"
                                value="{{ old('email') }}">
                            </p>
                            @if($errors->has('email'))
                                <p class="help is-danger">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>
                        
                        <div class="field">
                            <p class="control">
                                <button class="button is-primary">Send Password Reset Link</button>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

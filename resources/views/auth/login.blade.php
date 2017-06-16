@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container is-fluid">
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <h1 class="title ">Sign in</h1>
                    <form action="#" method="post" class="form">
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
                            <label for="password" class="label">Password</label>
                            <p class="control">
                                <input id="password" type="password" name="password"
                                class="input{{ $errors->has('password') ? ' is-danger' : '' }}">
                            </p>
                            @if($errors->has('password'))
                                <p class="help is-danger">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <p class="control">
                                <button class="button is-primary">Submit</button>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

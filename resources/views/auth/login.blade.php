@extends('layouts.masterloginprototype')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <div class="card">
                <div class="card-header card-header-primary">
                    <div class="row">
                        <div class="col-md-10">
                          <h4 class="card-title ">{{ __('Login')}}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="get" action="{{ route('home') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-primary col-md-4">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script type="text/javascript">

    $('#dashboard').addClass('active');
</script>
@endsection
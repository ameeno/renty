@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-message-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Send a Message</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('sendMessages', $user->id)}}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">To::</label>
                                <div class="col-md-6">
                                    <input  type="text" class="form-control" value="{{ $user->name }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Message</label>

                                <div class="col-md-6">
                                    <textarea id="message" type="text" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" value="{{ old('message') }}" required></textarea>

                                    @if ($errors->has('message'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="n_type" class="col-md-4 col-form-label text-md-right">Notification Type</label>

                                <div class="col-md-6">
                                    <select name="n_type" class="form-control" id="n_type">
                                        @if($n_types->count())

                                            @foreach($n_types as $n_type)
                                                <option value="{{$n_type->id}}">{{$n_type->name}}</option>
                                            @endforeach

                                        @endif
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Post
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

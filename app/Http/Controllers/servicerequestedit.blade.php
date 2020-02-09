@extends('layouts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Service Request') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('update-request') }}">
                        @csrf
                         <div class="form-group row">
                            <label for="make" class="col-md-2 col-form-label ">{{ __('Make') }}</label>
                            <div class="col-md-6">
                                <select id="make" data-id="make_id" name="make_id" class="form-control @error('make_id') is-invalid @enderror"
                                 >
                                    <option value="">Select Make </option>
                                     @foreach($makes as $mak)
                                        <option  value="{{ $mak->id }}">{{ $mak->name }}</option>
                                     @endforeach
                                </select>

                                @error('make_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="model" class="col-md-2 col-form-label ">{{ __('Model') }}</label>
                            <div class="col-md-6" >
                                <select id="append-model" data-id="model_id" name="model_id" class="form-control @error('model_id') is-invalid @enderror"
                                 >
                                </select>

                                @error('model_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label ">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $services->name}}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label ">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $services->email}}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                           <div class="form-group row">
                            <label for="phone" class="col-md-2 col-form-label ">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $services->phone}}"  autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label ">{{ __('description') }}</label>
                            <div class="col-md-6">
                                <textarea rows="5" cols="5" class="form-control @error('description') is-invalid @enderror" name="description">{{ $services->service_description}}"</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Request') }}
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
        $(function () {
            $("#make").change(function () {
                var id = $(this).val();
                 $.ajax({
                    url: '{{ url('get-vehicle-model') }}',
                    method: "get",
                    data: {_token: '{{ csrf_token() }}', id: id},
                    success: function (response) {
                       $('#append-model').html(response);
                    }
                });
            });
        });
       
        
 


 
    </script>
 
@endsection
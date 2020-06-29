@extends('layouts.app')

@section('content')
  <section class="container">
    <h1>Cadastrar agendamento</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/schedule/create">
                        @csrf

                        <div class="form-group row">
                            <label for="clients" class="col-md-4 col-form-label text-md-right">{{ __('Cliente:') }}</label>

                            <div class="col-md-6">
                              <select name="client_id" class="custom-select" id="client_id">
                                <option selected>SELECIONE...</option>
                                @foreach($clients as $client)
                                  <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="service" class="col-md-4 col-form-label text-md-right">{{ __('Serviço') }}</label>

                            <div class="col-md-6">
                                <input id="service" type="text" class="form-control @error('service') is-invalid @enderror" name="service" value="{{ old('service') }}" required autocomplete="service" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="scheduled_to" class="col-md-4 col-form-label text-md-right">{{ __('Data do agendamento:') }}</label>

                            <div class="col-md-6">
                              <input name="scheduled_to" type="datetime-local" id="scheduled_to" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cadastrar') }}
                                </button>
                                <a type="button" class="btn btn-danger" href="/home">
                                    {{ __('Voltar') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection

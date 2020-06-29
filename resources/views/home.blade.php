@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-primary my-2" href="{{ route('schedule.create') }}">Cadastrar agendamento</a>
            <a class="btn btn-secondary my-2" href="{{ route('client.create') }}">Cadastrar cliente</a>
            <div class="card">
                <h2 class="card-header">Agendamentos</h2>

                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Profissional</th>
                        <th scope="col">Serviço</th>
                        <th scope="col">Data do agendamento</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif

                      @forelse($schedules as $schedule)
                        <tr>
                          <td>{{$schedule->client->name}}</td>
                          <td>{{$schedule->user->name}}</td>
                          <td>{{$schedule->service}}</td>
                          <td>{{$schedule->scheduled_to}}</td>
                          <td>
                            @if($schedule->confirmed)
                              <svg onclick="document.getElementById('form-cancel-{{$schedule->id}}').submit()" style="cursor:pointer;" width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-check text-success" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                              </svg>
                              <form class="d-none" id="{{'form-cancel-'.$schedule->id}}" method="post" action="{{ route('schedule.cancel', $schedule->id) }}">
                                @csrf
                                @method('put')
                              </form>
                            @else
                              <svg onclick="document.getElementById('form-confirm-{{$schedule->id}}').submit()" style="cursor:pointer;" width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-x text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                                <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                              </svg>
                              <form class="d-none" id="{{'form-confirm-'.$schedule->id}}" method="post" action="{{ route('schedule.confirm', $schedule->id) }}">
                                @csrf
                                @method('put')
                              </form>
                            @endif
                          </td>
                        </tr>
                        @empty
                          <p>Não há agendamentos cadastrados.</p>
                      @endforelse
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Client;
use App\Schedule;

class ScheduleController extends Controller
{
  /**
   * Formulário de cadastro de agendamento
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function create() {
    $clients = DB::table('clients')->get();
    return view('schedule.create', ['clients' => $clients]);
  }

  /**
   * Ação para salvar os dados do agendamento no banco
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function store(Request $request) {
    auth()->user()->schedules()->create($request->all());
    return redirect('/home');
  }

  /**
   * Muda o status do agendamento para cancelado
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function cancel(Schedule $schedule) {
    $schedule->update(['confirmed' => false]);
    return redirect('/home');
  }

  /**
   * Muda o status do agendamento para confirmado
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function confirm(Schedule $schedule) {
    $schedule->update(['confirmed' => true]);
    return redirect('/home');
  }
}

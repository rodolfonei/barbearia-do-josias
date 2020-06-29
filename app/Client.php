<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  /**
   * Atributos para cadastro em massa
   *
   * @var array
   */
  protected $fillable = ['name', 'phone', 'email'];

  /**
   * Relação com o agendamento
   *
   */
  public function schedules() {
    return $this->hasMany(Schedule::class);
  }

}

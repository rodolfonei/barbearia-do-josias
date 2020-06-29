<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
    protected $fillable = ['client_id', 'service', 'scheduled_to', 'confirmed'];

    /**
     * Relação com o cliente
     *
     */
    public function client() {
      return $this->belongsTo(Client::class);
    }

    /**
     * Relação com o profissional
     *
     */
    public function user() {
      return $this->belongsTo(User::class);
    }
}

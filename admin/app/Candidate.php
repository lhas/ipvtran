<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'candidates';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['certification_attachment', 'name', 'sex', 'cpf', 'rg',
    'date_of_birth', 'orgao_expedidor', 'mom_name', 'address', 'address_num',
    'address_complement', 'address_neighbourhood', 'address_cep', 'phone',
    'cell_phone', 'nr_cnh', 'category', 'email', 'password'];
}

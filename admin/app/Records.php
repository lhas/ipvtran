<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Records extends Model {

    protected $table = 'records';

    protected $fillable = array('estado', 'cpf', 'renach', 'nascimento', 'categoria');
    

}

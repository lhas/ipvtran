<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class RecordsController extends CrudController {

    public function all($entity){
        parent::all($entity); 

		$this->filter = \DataFilter::source(new \App\Records);
		$this->filter->add('estado', 'Estado', 'text');
		$this->filter->add('cpf', 'CPF', 'text');
		$this->filter->add('renach', 'RENACH', 'text');
		$this->filter->add('nascimento', 'Nascimento', 'text');
		$this->filter->add('categoria', 'Categoria', 'text');
		$this->filter->submit('search');
		$this->filter->reset('reset');
		$this->filter->build();

		$this->grid = \DataGrid::source($this->filter);
		$this->grid->add('estado', 'Estado');
		$this->grid->add('cpf', 'CPF');
		$this->grid->add('renach', 'RENACH');
		$this->grid->add('nascimento', 'Nascimento');
		$this->grid->add('categoria', 'Categoria');
		$this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

		$this->edit = \DataEdit::source(new \App\Records());

		$this->edit->label('Editar Inscrição');

		$this->edit->add('estado', 'Estado', 'text')->rule('required');
		$this->edit->add('cpf', 'CPF', 'text')->rule('required');
		$this->edit->add('renach', 'RENACH', 'text')->rule('required');
		$this->edit->add('nascimento', 'Nascimento', 'text')->rule('required');
		$this->edit->add('categoria', 'Categoria', 'text')->rule('required');
	
        return $this->returnEditView();
    }    
}

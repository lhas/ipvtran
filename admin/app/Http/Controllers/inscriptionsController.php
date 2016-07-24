<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class inscriptionsController extends CrudController{

    public function all($entity){
        parent::all($entity); 

        /** Simple code of  filter and grid part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields


        */

			$this->filter = \DataFilter::source(new \App\inscriptions);
			$this->filter->add('title', 'title', 'text');
			$this->filter->submit('search');
			$this->filter->reset('reset');
			$this->filter->build();

			$this->grid = \DataGrid::source($this->filter);
			$this->grid->add('title', 'title');
			$this->grid->add('image', 'image');
			$this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        /* Simple image of  edit part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields
	
        */
			$this->edit = \DataEdit::source(new \App\inscriptions());

			$this->edit->label('Edit Inscription');

			$this->edit->add('title', 'title', 'text');
		
			$this->edit->add('image', 'image', 'file')->rule('required');


       
        return $this->returnEditView();
    }    
}

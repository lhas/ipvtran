<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Email;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Excel;
use Mail;

class EmailsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['api', 'api_contact'] ]);
    }

    public function api(Request $request)
    {
      $user = $request->get('user');

      $email = Email::create($user);

      Mail::raw('Olá! Este e-mail é um lembrete de que este e-mail foi cadastrado para receber novidades do IPVtran.', function ($m) use ($user) {
            $m->from('nao-responda@iprovida.org.br', 'IPVtran');

            $m->to($user['email'], $user['name'])->subject('[IPVtran] E-mail cadastrado na Newsletter!');
        });

      return $email;
    }

    public function api_contact(Request $request)
    {
      $user = $request->get('user');

      Mail::send('emails.contact', ['user' => $user], function ($m) use ($user) {
            $m->from('nao-responda@iprovida.org.br', 'IPVtran');

            $m->to('contato@iprovida.org.br', 'IPVtran')->subject('[IPVtran] Contato');
            // $m->to('luizhrqas@gmail.com', 'IPVtran')->subject('[IPVtran] Contato');
        });

    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $emails = Email::paginate(15);

        return view('emails.index', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('emails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        Email::create($request->all());

        Session::flash('flash_message', 'Email added!');

        return redirect('emails');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $email = Email::findOrFail($id);

        return view('emails.show', compact('email'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $email = Email::findOrFail($id);

        return view('emails.edit', compact('email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        
        $email = Email::findOrFail($id);
        $email->update($request->all());

        Session::flash('flash_message', 'Email updated!');

        return redirect('emails');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Email::destroy($id);

        Session::flash('flash_message', 'Email deleted!');

        return redirect('emails');
    }

    public function export()
    {
        $candidates = Email::all();

        $data = $candidates->toArray();

        $tmp = Excel::create('IPVtran_Exportacao_Newsletter', function($excel) use ($data) {
            $excel->sheet('Sheetname', function($sheet) use ($data) {

            // Sheet manipulation
            $sheet->fromArray($data);

            });

        });

        $tmp->download('xls');
    }
}

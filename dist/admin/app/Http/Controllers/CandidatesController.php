<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Candidate;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Excel;

class CandidatesController extends Controller
{
    public function __construct()
    {
        $except = ['api', 'api_search'];
        $this->middleware('auth', ['except' => $except ]);
    }

    public function api(Request $request)
    {

        $user = $request->get('user');

        $email = Candidate::create($user);

        return Candidate::findOrFail($email->id);
    }

    public function api_search(Request $request)
    {
        $candidate = $request->get('candidate');

        $search = Candidate::where('cpf', 'like', '%' . $candidate['cpf'] . '%')->firstOrFail();

        $search->certification_attachment = url('uploads/' . $search->certification_attachment);
        $search->cadastrado_em = $search->created_at->format('d/m/Y h:i:s');

        return ['candidate' => $search];
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $candidates = Candidate::paginate(15);
        $cpf = $request->get('cpf');

        if(!empty($cpf)) {
            $candidates = Candidate::where('cpf', 'like', '%' . $cpf . '%')->paginate(15);
        }

        return view('candidates.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('candidates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        $candidate = Candidate::create($request->all());

        $file = $request->file('certification_attachment');

        if($request->hasFile('certification_attachment') && $file->isValid()) {
            $original_name = $file->getClientOriginalName();
            $new_filename = uniqid('certificado_', true) . '.' . $file->getClientOriginalExtension();

            $file->move('uploads', $new_filename);

            $candidate->update([
                'certification_attachment' => $new_filename
            ]);
        }

        Session::flash('flash_message', 'Candidate added!');

        return redirect('candidates');
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
        $candidate = Candidate::findOrFail($id);

        return view('candidates.show', compact('candidate'));
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
        $candidate = Candidate::findOrFail($id);

        return view('candidates.edit', compact('candidate'));
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
        
        $candidate = Candidate::findOrFail($id);
        $candidate->update($request->all());
        
        $file = $request->file('certification_attachment');

        if($request->hasFile('certification_attachment') && $file->isValid()) {
            $original_name = $file->getClientOriginalName();
            $new_filename = uniqid('certificado_', true) . '.' . $file->getClientOriginalExtension();

            $file->move('uploads', $new_filename);

            $candidate->update([
                'certification_attachment' => $new_filename
            ]);
        }

        Session::flash('flash_message', 'Candidate updated!');

        return redirect('candidates');
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
        Candidate::destroy($id);

        Session::flash('flash_message', 'Candidate deleted!');

        return redirect('candidates');
    }

    public function download($id)
    {
        $candidate = Candidate::findOrFail($id);
        
        $pathToFile = 'uploads/' . $candidate->certification_attachment;

        return response()->download($pathToFile);
    }

    public function export()
    {
        $candidates = Candidate::all();

        $data = $candidates->toArray(); 

        $tmp = Excel::create('IPVtran_Exportacao_Candidatos', function($excel) use ($data) {
            $excel->sheet('Sheetname', function($sheet) use ($data) {

            // Sheet manipulation
            $sheet->fromArray($data);

            });

        });

        $tmp->download('xls');
    }
}

@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Candidate {{ $candidate->id }}
        <a href="{{ url('candidates/' . $candidate->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Candidate"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['candidates', $candidate->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Candidate',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $candidate->id }}</td>
                </tr>
                <tr><th> Certification Attachment </th><td> {{ $candidate->certification_attachment }} </td></tr><tr><th> Name </th><td> {{ $candidate->name }} </td></tr><tr><th> Sex </th><td> {{ $candidate->sex }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection

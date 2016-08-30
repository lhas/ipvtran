@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Emails 
    <a href="{{ url('/emails/create') }}" class="btn btn-primary btn-xs" title="Add New Email"><span class="glyphicon glyphicon-plus" aria-hidden="true"/> Adicionar Novo</a>
    <a href="{{ url('/emails/export') }}" class="btn btn-success btn-xs" title="Exportar Newsletter para Planilha Excel"> <i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar </a>
    
    </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th> Nome </th>
                    <th> E-mail </th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($emails as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->name }}</td><td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ url('/emails/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Email"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/emails', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Email" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Email',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $emails->render() !!} </div>
    </div>

</div>
@endsection

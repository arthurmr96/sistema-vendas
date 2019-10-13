@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Convenio
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'convenios.store']) !!}

                        @include('convenios.fields', [
                        'clientes' => \App\Models\Cliente::all()->pluck('nome', 'id'),
                        'selected' => null
                        ])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

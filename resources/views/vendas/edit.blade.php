@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Venda
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($venda, ['route' => ['vendas.update', $venda->id], 'method' => 'patch']) !!}

                        @include('vendas.fields', [
                        'clientes' => \App\Models\Cliente::pluck('nome', 'id'),
                        'selected' => $convenio->cliente
                        ])

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
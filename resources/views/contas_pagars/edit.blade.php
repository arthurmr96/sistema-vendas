@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Contas Pagar
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($contasPagar, ['route' => ['contasPagars.update', $contasPagar->id], 'method' => 'patch']) !!}

                        @include('contas_pagars.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
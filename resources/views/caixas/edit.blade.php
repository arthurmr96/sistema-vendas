@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Caixa
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($caixa, ['route' => ['caixas.update', $caixa->id], 'method' => 'patch']) !!}

                        @include('caixas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
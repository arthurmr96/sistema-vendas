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
                   {!! Form::model($convenio, ['route' => ['convenios.update', $convenio->id], 'method' => 'patch']) !!}

                        @include('convenios.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
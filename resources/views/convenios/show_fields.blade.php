<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $convenio->id !!}</p>
</div>

<!-- Cliente Id Field -->
<div class="form-group">
    {!! Form::label('cliente_id', 'Cliente Id:') !!}
    <p>{!! $convenio->cliente_id !!}</p>
</div>

<!-- Valor Field -->
<div class="form-group">
    {!! Form::label('valor', 'Valor:') !!}
    <p>{!! $convenio->valor !!}</p>
</div>

<!-- Data Vencimento Field -->
<div class="form-group">
    {!! Form::label('data_vencimento', 'Data Vencimento:') !!}
    <p>{!! $convenio->data_vencimento !!}</p>
</div>

<!-- Pago Field -->
<div class="form-group">
    {!! Form::label('pago', 'Pago:') !!}
    <p>{!! $convenio->pago !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $convenio->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $convenio->updated_at !!}</p>
</div>


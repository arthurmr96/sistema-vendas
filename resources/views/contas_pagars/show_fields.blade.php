<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $contasPagar->id !!}</p>
</div>

<!-- Valor Devido Field -->
<div class="form-group">
    {!! Form::label('valor_devido', 'Valor Devido:') !!}
    <p>{!! $contasPagar->valor_devido !!}</p>
</div>

<!-- Valor Pago Field -->
<div class="form-group">
    {!! Form::label('valor_pago', 'Valor Pago:') !!}
    <p>{!! $contasPagar->valor_pago !!}</p>
</div>

<!-- Pago Field -->
<div class="form-group">
    {!! Form::label('pago', 'Pago:') !!}
    <p>{!! $contasPagar->pago !!}</p>
</div>

<!-- Data Vencimento Field -->
<div class="form-group">
    {!! Form::label('data_vencimento', 'Data Vencimento:') !!}
    <p>{!! $contasPagar->data_vencimento !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $contasPagar->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $contasPagar->updated_at !!}</p>
</div>


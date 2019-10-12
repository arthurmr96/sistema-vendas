<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $caixa->id !!}</p>
</div>

<!-- Valor Inicial Field -->
<div class="form-group">
    {!! Form::label('valor_inicial', 'Valor Inicial:') !!}
    <p>{!! $caixa->valor_inicial !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $caixa->status !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $caixa->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $caixa->updated_at !!}</p>
</div>


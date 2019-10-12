<!-- Valor Inicial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor_inicial', 'Valor Inicial:') !!}
    {!! Form::number('valor_inicial', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('caixas.index') !!}" class="btn btn-default">Cancel</a>
</div>

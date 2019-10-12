<!-- Valor Devido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor_devido', 'Valor Devido:') !!}
    {!! Form::text('valor_devido', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Pago Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor_pago', 'Valor Pago:') !!}
    {!! Form::text('valor_pago', null, ['class' => 'form-control']) !!}
</div>

<!-- Pago Field -->
<div class="form-group col-sm-12">
    {!! Form::label('pago', 'Pago:') !!}
    <label class="radio-inline">
        {!! Form::radio('pago', "Sim", null) !!} Sim
    </label>

    <label class="radio-inline">
        {!! Form::radio('pago', " Nao", null) !!}  Nao
    </label>

</div>

<!-- Data Vencimento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_vencimento', 'Data Vencimento:') !!}
    {!! Form::text('data_vencimento', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('contasPagars.index') !!}" class="btn btn-default">Cancel</a>
</div>

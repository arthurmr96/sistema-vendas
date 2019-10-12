<!-- Valor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor', 'Valor:') !!}
    {!! Form::text('valor', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Vencimento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_vencimento', 'Data Vencimento:') !!}
    {!! Form::text('data_vencimento', null, ['class' => 'form-control']) !!}
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

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('convenios.index') !!}" class="btn btn-default">Cancel</a>
</div>

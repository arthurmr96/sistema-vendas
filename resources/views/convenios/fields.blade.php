<!-- Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Cliente:') !!}
    {!! Form::select('cliente_id', $clientes, $selected, ['class' => 'form-control']) !!}
</div>

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
        {!! Form::radio('pago', 1, null) !!} {{ __('Yes') }}
    </label>

    <label class="radio-inline">
        {!! Form::radio('pago', 0, null) !!} {{ __('No') }}
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('convenios.index') !!}" class="btn btn-default">{{ __('Cancel') }}</a>
</div>

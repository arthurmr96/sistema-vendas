<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $produto->id !!}</p>
</div>

<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{!! $produto->nome !!}</p>
</div>

<!-- Descricao Field -->
<div class="form-group">
    {!! Form::label('descricao', 'Descricao:') !!}
    <p>{!! $produto->descricao !!}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{!! $produto->tipo !!}</p>
</div>

<!-- Preco Custo Field -->
<div class="form-group">
    {!! Form::label('preco_custo', 'Preco Custo:') !!}
    <p>{!! $produto->preco_custo !!}</p>
</div>

<!-- Valor Field -->
<div class="form-group">
    {!! Form::label('valor', 'Valor:') !!}
    <p>{!! $produto->valor !!}</p>
</div>

<!-- Quantidade Field -->
<div class="form-group">
    {!! Form::label('quantidade', 'Quantidade:') !!}
    <p>{!! $produto->quantidade !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $produto->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $produto->updated_at !!}</p>
</div>


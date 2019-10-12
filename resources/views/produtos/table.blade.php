<div class="table-responsive">
    <table class="table" id="produtos-table">
        <thead>
            <tr>
                <th>Nome</th>
        <th>Descricao</th>
        <th>Tipo</th>
        <th>Preco Custo</th>
        <th>Valor</th>
        <th>Quantidade</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($produtos as $produto)
            <tr>
                <td>{!! $produto->nome !!}</td>
            <td>{!! $produto->descricao !!}</td>
            <td>{!! $produto->tipo !!}</td>
            <td>{!! $produto->preco_custo !!}</td>
            <td>{!! $produto->valor !!}</td>
            <td>{!! $produto->quantidade !!}</td>
                <td>
                    {!! Form::open(['route' => ['produtos.destroy', $produto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('produtos.show', [$produto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('produtos.edit', [$produto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

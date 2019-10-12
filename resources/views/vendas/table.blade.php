<div class="table-responsive">
    <table class="table" id="vendas-table">
        <thead>
            <tr>
                <th>Cliente Id</th>
        <th>User Id</th>
        <th>Valor</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($vendas as $venda)
            <tr>
                <td>{!! $venda->cliente_id !!}</td>
            <td>{!! $venda->user_id !!}</td>
            <td>{!! $venda->valor !!}</td>
                <td>
                    {!! Form::open(['route' => ['vendas.destroy', $venda->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('vendas.show', [$venda->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('vendas.edit', [$venda->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

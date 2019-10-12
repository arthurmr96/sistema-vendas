<div class="table-responsive">
    <table class="table" id="contasPagars-table">
        <thead>
            <tr>
                <th>Valor Devido</th>
        <th>Valor Pago</th>
        <th>Pago</th>
        <th>Data Vencimento</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contasPagars as $contasPagar)
            <tr>
                <td>{!! $contasPagar->valor_devido !!}</td>
            <td>{!! $contasPagar->valor_pago !!}</td>
            <td>{!! $contasPagar->pago !!}</td>
            <td>{!! $contasPagar->data_vencimento !!}</td>
                <td>
                    {!! Form::open(['route' => ['contasPagars.destroy', $contasPagar->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('contasPagars.show', [$contasPagar->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('contasPagars.edit', [$contasPagar->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="table-responsive">
    <table class="table" id="caixas-table">
        <thead>
            <tr>
                <th>Valor Inicial</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($caixas as $caixa)
            <tr>
                <td>{!! $caixa->valor_inicial !!}</td>
            <td>{!! $caixa->status !!}</td>
                <td>
                    {!! Form::open(['route' => ['caixas.destroy', $caixa->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('caixas.show', [$caixa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('caixas.edit', [$caixa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

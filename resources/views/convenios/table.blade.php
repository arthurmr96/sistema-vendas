<div class="table-responsive">
    <table class="table" id="convenios-table">
        <thead>
            <tr>
                <th>Cliente</th>
        <th>Valor</th>
        <th>Data Vencimento</th>
        <th>Pago</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($convenios as $convenio)
            <tr>
                <td>{!! $convenio->cliente->nome !!}</td>
            <td>{!! __('$') .' ' . $convenio->valor !!}</td>
            <td>{!! \Carbon\Carbon::parse($convenio->data_vencimento)->format('d/m/Y') !!}</td>
            <td>{!! $convenio->pago === 1 ? __('Yes') : __('No') !!}</td>
                <td>
                    {!! Form::open(['route' => ['convenios.destroy', $convenio->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('convenios.show', [$convenio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('convenios.edit', [$convenio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

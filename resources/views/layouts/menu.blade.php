

<li class="{{ Request::is('clientes*') ? 'active' : '' }}">
    <a href="{!! route('clientes.index') !!}"><i class="fa fa-edit"></i><span>Clientes</span></a>
</li>

<li class="{{ Request::is('produtos*') ? 'active' : '' }}">
    <a href="{!! route('produtos.index') !!}"><i class="fa fa-edit"></i><span>Produtos</span></a>
</li>

<li class="{{ Request::is('caixas*') ? 'active' : '' }}">
    <a href="{!! route('caixas.index') !!}"><i class="fa fa-edit"></i><span>Caixas</span></a>
</li>

<li class="{{ Request::is('contasPagars*') ? 'active' : '' }}">
    <a href="{!! route('contasPagars.index') !!}"><i class="fa fa-edit"></i><span>Contas Pagars</span></a>
</li>

<li class="{{ Request::is('convenios*') ? 'active' : '' }}">
    <a href="{!! route('convenios.index') !!}"><i class="fa fa-edit"></i><span>Convenios</span></a>
</li>

<li class="{{ Request::is('vendas*') ? 'active' : '' }}">
    <a href="{!! route('vendas.index') !!}"><i class="fa fa-edit"></i><span>Vendas</span></a>
</li>


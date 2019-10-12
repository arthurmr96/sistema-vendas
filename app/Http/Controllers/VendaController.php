<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVendaRequest;
use App\Http\Requests\UpdateVendaRequest;
use App\Repositories\VendaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class VendaController extends AppBaseController
{
    /** @var  VendaRepository */
    private $vendaRepository;

    public function __construct(VendaRepository $vendaRepo)
    {
        $this->vendaRepository = $vendaRepo;
    }

    /**
     * Display a listing of the Venda.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $vendas = $this->vendaRepository->paginate(10);

        return view('vendas.index')
            ->with('vendas', $vendas);
    }

    /**
     * Show the form for creating a new Venda.
     *
     * @return Response
     */
    public function create()
    {
        return view('vendas.create');
    }

    /**
     * Store a newly created Venda in storage.
     *
     * @param CreateVendaRequest $request
     *
     * @return Response
     */
    public function store(CreateVendaRequest $request)
    {
        $input = $request->all();

        $venda = $this->vendaRepository->create($input);

        Flash::success('Venda saved successfully.');

        return redirect(route('vendas.index'));
    }

    /**
     * Display the specified Venda.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $venda = $this->vendaRepository->find($id);

        if (empty($venda)) {
            Flash::error('Venda not found');

            return redirect(route('vendas.index'));
        }

        return view('vendas.show')->with('venda', $venda);
    }

    /**
     * Show the form for editing the specified Venda.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $venda = $this->vendaRepository->find($id);

        if (empty($venda)) {
            Flash::error('Venda not found');

            return redirect(route('vendas.index'));
        }

        return view('vendas.edit')->with('venda', $venda);
    }

    /**
     * Update the specified Venda in storage.
     *
     * @param int $id
     * @param UpdateVendaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVendaRequest $request)
    {
        $venda = $this->vendaRepository->find($id);

        if (empty($venda)) {
            Flash::error('Venda not found');

            return redirect(route('vendas.index'));
        }

        $venda = $this->vendaRepository->update($request->all(), $id);

        Flash::success('Venda updated successfully.');

        return redirect(route('vendas.index'));
    }

    /**
     * Remove the specified Venda from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $venda = $this->vendaRepository->find($id);

        if (empty($venda)) {
            Flash::error('Venda not found');

            return redirect(route('vendas.index'));
        }

        $this->vendaRepository->delete($id);

        Flash::success('Venda deleted successfully.');

        return redirect(route('vendas.index'));
    }
}

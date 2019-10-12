<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContasPagarRequest;
use App\Http\Requests\UpdateContasPagarRequest;
use App\Repositories\ContasPagarRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ContasPagarController extends AppBaseController
{
    /** @var  ContasPagarRepository */
    private $contasPagarRepository;

    public function __construct(ContasPagarRepository $contasPagarRepo)
    {
        $this->contasPagarRepository = $contasPagarRepo;
    }

    /**
     * Display a listing of the ContasPagar.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contasPagars = $this->contasPagarRepository->paginate(10);

        return view('contas_pagars.index')
            ->with('contasPagars', $contasPagars);
    }

    /**
     * Show the form for creating a new ContasPagar.
     *
     * @return Response
     */
    public function create()
    {
        return view('contas_pagars.create');
    }

    /**
     * Store a newly created ContasPagar in storage.
     *
     * @param CreateContasPagarRequest $request
     *
     * @return Response
     */
    public function store(CreateContasPagarRequest $request)
    {
        $input = $request->all();

        $contasPagar = $this->contasPagarRepository->create($input);

        Flash::success('Contas Pagar saved successfully.');

        return redirect(route('contasPagars.index'));
    }

    /**
     * Display the specified ContasPagar.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contasPagar = $this->contasPagarRepository->find($id);

        if (empty($contasPagar)) {
            Flash::error('Contas Pagar not found');

            return redirect(route('contasPagars.index'));
        }

        return view('contas_pagars.show')->with('contasPagar', $contasPagar);
    }

    /**
     * Show the form for editing the specified ContasPagar.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contasPagar = $this->contasPagarRepository->find($id);

        if (empty($contasPagar)) {
            Flash::error('Contas Pagar not found');

            return redirect(route('contasPagars.index'));
        }

        return view('contas_pagars.edit')->with('contasPagar', $contasPagar);
    }

    /**
     * Update the specified ContasPagar in storage.
     *
     * @param int $id
     * @param UpdateContasPagarRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContasPagarRequest $request)
    {
        $contasPagar = $this->contasPagarRepository->find($id);

        if (empty($contasPagar)) {
            Flash::error('Contas Pagar not found');

            return redirect(route('contasPagars.index'));
        }

        $contasPagar = $this->contasPagarRepository->update($request->all(), $id);

        Flash::success('Contas Pagar updated successfully.');

        return redirect(route('contasPagars.index'));
    }

    /**
     * Remove the specified ContasPagar from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contasPagar = $this->contasPagarRepository->find($id);

        if (empty($contasPagar)) {
            Flash::error('Contas Pagar not found');

            return redirect(route('contasPagars.index'));
        }

        $this->contasPagarRepository->delete($id);

        Flash::success('Contas Pagar deleted successfully.');

        return redirect(route('contasPagars.index'));
    }
}

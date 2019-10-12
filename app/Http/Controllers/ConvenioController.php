<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConvenioRequest;
use App\Http\Requests\UpdateConvenioRequest;
use App\Repositories\ConvenioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ConvenioController extends AppBaseController
{
    /** @var  ConvenioRepository */
    private $convenioRepository;

    public function __construct(ConvenioRepository $convenioRepo)
    {
        $this->convenioRepository = $convenioRepo;
    }

    /**
     * Display a listing of the Convenio.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $convenios = $this->convenioRepository->paginate(10);

        return view('convenios.index')
            ->with('convenios', $convenios);
    }

    /**
     * Show the form for creating a new Convenio.
     *
     * @return Response
     */
    public function create()
    {
        return view('convenios.create');
    }

    /**
     * Store a newly created Convenio in storage.
     *
     * @param CreateConvenioRequest $request
     *
     * @return Response
     */
    public function store(CreateConvenioRequest $request)
    {
        $input = $request->all();

        $convenio = $this->convenioRepository->create($input);

        Flash::success('Convenio saved successfully.');

        return redirect(route('convenios.index'));
    }

    /**
     * Display the specified Convenio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $convenio = $this->convenioRepository->find($id);

        if (empty($convenio)) {
            Flash::error('Convenio not found');

            return redirect(route('convenios.index'));
        }

        return view('convenios.show')->with('convenio', $convenio);
    }

    /**
     * Show the form for editing the specified Convenio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $convenio = $this->convenioRepository->find($id);

        if (empty($convenio)) {
            Flash::error('Convenio not found');

            return redirect(route('convenios.index'));
        }

        return view('convenios.edit')->with('convenio', $convenio);
    }

    /**
     * Update the specified Convenio in storage.
     *
     * @param int $id
     * @param UpdateConvenioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConvenioRequest $request)
    {
        $convenio = $this->convenioRepository->find($id);

        if (empty($convenio)) {
            Flash::error('Convenio not found');

            return redirect(route('convenios.index'));
        }

        $convenio = $this->convenioRepository->update($request->all(), $id);

        Flash::success('Convenio updated successfully.');

        return redirect(route('convenios.index'));
    }

    /**
     * Remove the specified Convenio from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $convenio = $this->convenioRepository->find($id);

        if (empty($convenio)) {
            Flash::error('Convenio not found');

            return redirect(route('convenios.index'));
        }

        $this->convenioRepository->delete($id);

        Flash::success('Convenio deleted successfully.');

        return redirect(route('convenios.index'));
    }
}

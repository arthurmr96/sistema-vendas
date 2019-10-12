<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVendaAPIRequest;
use App\Http\Requests\API\UpdateVendaAPIRequest;
use App\Models\Venda;
use App\Repositories\VendaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class VendaController
 * @package App\Http\Controllers\API
 */

class VendaAPIController extends AppBaseController
{
    /** @var  VendaRepository */
    private $vendaRepository;

    public function __construct(VendaRepository $vendaRepo)
    {
        $this->vendaRepository = $vendaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/vendas",
     *      summary="Get a listing of the Vendas.",
     *      tags={"Venda"},
     *      description="Get all Vendas",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Venda")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $vendas = $this->vendaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($vendas->toArray(), 'Vendas retrieved successfully');
    }

    /**
     * @param CreateVendaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/vendas",
     *      summary="Store a newly created Venda in storage",
     *      tags={"Venda"},
     *      description="Store Venda",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Venda that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Venda")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Venda"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateVendaAPIRequest $request)
    {
        $input = $request->all();

        $venda = $this->vendaRepository->create($input);

        return $this->sendResponse($venda->toArray(), 'Venda saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/vendas/{id}",
     *      summary="Display the specified Venda",
     *      tags={"Venda"},
     *      description="Get Venda",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Venda",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Venda"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Venda $venda */
        $venda = $this->vendaRepository->find($id);

        if (empty($venda)) {
            return $this->sendError('Venda not found');
        }

        return $this->sendResponse($venda->toArray(), 'Venda retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateVendaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/vendas/{id}",
     *      summary="Update the specified Venda in storage",
     *      tags={"Venda"},
     *      description="Update Venda",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Venda",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Venda that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Venda")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Venda"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateVendaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Venda $venda */
        $venda = $this->vendaRepository->find($id);

        if (empty($venda)) {
            return $this->sendError('Venda not found');
        }

        $venda = $this->vendaRepository->update($input, $id);

        return $this->sendResponse($venda->toArray(), 'Venda updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/vendas/{id}",
     *      summary="Remove the specified Venda from storage",
     *      tags={"Venda"},
     *      description="Delete Venda",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Venda",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Venda $venda */
        $venda = $this->vendaRepository->find($id);

        if (empty($venda)) {
            return $this->sendError('Venda not found');
        }

        $venda->delete();

        return $this->sendResponse($id, 'Venda deleted successfully');
    }
}

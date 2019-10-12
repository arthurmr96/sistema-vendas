<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContasPagarAPIRequest;
use App\Http\Requests\API\UpdateContasPagarAPIRequest;
use App\Models\ContasPagar;
use App\Repositories\ContasPagarRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ContasPagarController
 * @package App\Http\Controllers\API
 */

class ContasPagarAPIController extends AppBaseController
{
    /** @var  ContasPagarRepository */
    private $contasPagarRepository;

    public function __construct(ContasPagarRepository $contasPagarRepo)
    {
        $this->contasPagarRepository = $contasPagarRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/contasPagars",
     *      summary="Get a listing of the ContasPagars.",
     *      tags={"ContasPagar"},
     *      description="Get all ContasPagars",
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
     *                  @SWG\Items(ref="#/definitions/ContasPagar")
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
        $contasPagars = $this->contasPagarRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($contasPagars->toArray(), 'Contas Pagars retrieved successfully');
    }

    /**
     * @param CreateContasPagarAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/contasPagars",
     *      summary="Store a newly created ContasPagar in storage",
     *      tags={"ContasPagar"},
     *      description="Store ContasPagar",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContasPagar that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContasPagar")
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
     *                  ref="#/definitions/ContasPagar"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateContasPagarAPIRequest $request)
    {
        $input = $request->all();

        $contasPagar = $this->contasPagarRepository->create($input);

        return $this->sendResponse($contasPagar->toArray(), 'Contas Pagar saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/contasPagars/{id}",
     *      summary="Display the specified ContasPagar",
     *      tags={"ContasPagar"},
     *      description="Get ContasPagar",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContasPagar",
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
     *                  ref="#/definitions/ContasPagar"
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
        /** @var ContasPagar $contasPagar */
        $contasPagar = $this->contasPagarRepository->find($id);

        if (empty($contasPagar)) {
            return $this->sendError('Contas Pagar not found');
        }

        return $this->sendResponse($contasPagar->toArray(), 'Contas Pagar retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateContasPagarAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/contasPagars/{id}",
     *      summary="Update the specified ContasPagar in storage",
     *      tags={"ContasPagar"},
     *      description="Update ContasPagar",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContasPagar",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContasPagar that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContasPagar")
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
     *                  ref="#/definitions/ContasPagar"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateContasPagarAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContasPagar $contasPagar */
        $contasPagar = $this->contasPagarRepository->find($id);

        if (empty($contasPagar)) {
            return $this->sendError('Contas Pagar not found');
        }

        $contasPagar = $this->contasPagarRepository->update($input, $id);

        return $this->sendResponse($contasPagar->toArray(), 'ContasPagar updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/contasPagars/{id}",
     *      summary="Remove the specified ContasPagar from storage",
     *      tags={"ContasPagar"},
     *      description="Delete ContasPagar",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContasPagar",
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
        /** @var ContasPagar $contasPagar */
        $contasPagar = $this->contasPagarRepository->find($id);

        if (empty($contasPagar)) {
            return $this->sendError('Contas Pagar not found');
        }

        $contasPagar->delete();

        return $this->sendResponse($id, 'Contas Pagar deleted successfully');
    }
}

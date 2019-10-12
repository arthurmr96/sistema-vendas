<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCaixaAPIRequest;
use App\Http\Requests\API\UpdateCaixaAPIRequest;
use App\Models\Caixa;
use App\Repositories\CaixaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CaixaController
 * @package App\Http\Controllers\API
 */

class CaixaAPIController extends AppBaseController
{
    /** @var  CaixaRepository */
    private $caixaRepository;

    public function __construct(CaixaRepository $caixaRepo)
    {
        $this->caixaRepository = $caixaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/caixas",
     *      summary="Get a listing of the Caixas.",
     *      tags={"Caixa"},
     *      description="Get all Caixas",
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
     *                  @SWG\Items(ref="#/definitions/Caixa")
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
        $caixas = $this->caixaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($caixas->toArray(), 'Caixas retrieved successfully');
    }

    /**
     * @param CreateCaixaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/caixas",
     *      summary="Store a newly created Caixa in storage",
     *      tags={"Caixa"},
     *      description="Store Caixa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Caixa that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Caixa")
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
     *                  ref="#/definitions/Caixa"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCaixaAPIRequest $request)
    {
        $input = $request->all();

        $caixa = $this->caixaRepository->create($input);

        return $this->sendResponse($caixa->toArray(), 'Caixa saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/caixas/{id}",
     *      summary="Display the specified Caixa",
     *      tags={"Caixa"},
     *      description="Get Caixa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Caixa",
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
     *                  ref="#/definitions/Caixa"
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
        /** @var Caixa $caixa */
        $caixa = $this->caixaRepository->find($id);

        if (empty($caixa)) {
            return $this->sendError('Caixa not found');
        }

        return $this->sendResponse($caixa->toArray(), 'Caixa retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCaixaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/caixas/{id}",
     *      summary="Update the specified Caixa in storage",
     *      tags={"Caixa"},
     *      description="Update Caixa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Caixa",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Caixa that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Caixa")
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
     *                  ref="#/definitions/Caixa"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCaixaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Caixa $caixa */
        $caixa = $this->caixaRepository->find($id);

        if (empty($caixa)) {
            return $this->sendError('Caixa not found');
        }

        $caixa = $this->caixaRepository->update($input, $id);

        return $this->sendResponse($caixa->toArray(), 'Caixa updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/caixas/{id}",
     *      summary="Remove the specified Caixa from storage",
     *      tags={"Caixa"},
     *      description="Delete Caixa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Caixa",
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
        /** @var Caixa $caixa */
        $caixa = $this->caixaRepository->find($id);

        if (empty($caixa)) {
            return $this->sendError('Caixa not found');
        }

        $caixa->delete();

        return $this->sendResponse($id, 'Caixa deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConvenioAPIRequest;
use App\Http\Requests\API\UpdateConvenioAPIRequest;
use App\Models\Convenio;
use App\Repositories\ConvenioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ConvenioController
 * @package App\Http\Controllers\API
 */

class ConvenioAPIController extends AppBaseController
{
    /** @var  ConvenioRepository */
    private $convenioRepository;

    public function __construct(ConvenioRepository $convenioRepo)
    {
        $this->convenioRepository = $convenioRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/convenios",
     *      summary="Get a listing of the Convenios.",
     *      tags={"Convenio"},
     *      description="Get all Convenios",
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
     *                  @SWG\Items(ref="#/definitions/Convenio")
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
        $convenios = $this->convenioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($convenios->toArray(), 'Convenios retrieved successfully');
    }

    /**
     * @param CreateConvenioAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/convenios",
     *      summary="Store a newly created Convenio in storage",
     *      tags={"Convenio"},
     *      description="Store Convenio",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Convenio that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Convenio")
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
     *                  ref="#/definitions/Convenio"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateConvenioAPIRequest $request)
    {
        $input = $request->all();

        $convenio = $this->convenioRepository->create($input);

        return $this->sendResponse($convenio->toArray(), 'Convenio saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/convenios/{id}",
     *      summary="Display the specified Convenio",
     *      tags={"Convenio"},
     *      description="Get Convenio",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Convenio",
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
     *                  ref="#/definitions/Convenio"
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
        /** @var Convenio $convenio */
        $convenio = $this->convenioRepository->find($id);

        if (empty($convenio)) {
            return $this->sendError('Convenio not found');
        }

        return $this->sendResponse($convenio->toArray(), 'Convenio retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateConvenioAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/convenios/{id}",
     *      summary="Update the specified Convenio in storage",
     *      tags={"Convenio"},
     *      description="Update Convenio",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Convenio",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Convenio that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Convenio")
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
     *                  ref="#/definitions/Convenio"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateConvenioAPIRequest $request)
    {
        $input = $request->all();

        /** @var Convenio $convenio */
        $convenio = $this->convenioRepository->find($id);

        if (empty($convenio)) {
            return $this->sendError('Convenio not found');
        }

        $convenio = $this->convenioRepository->update($input, $id);

        return $this->sendResponse($convenio->toArray(), 'Convenio updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/convenios/{id}",
     *      summary="Remove the specified Convenio from storage",
     *      tags={"Convenio"},
     *      description="Delete Convenio",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Convenio",
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
        /** @var Convenio $convenio */
        $convenio = $this->convenioRepository->find($id);

        if (empty($convenio)) {
            return $this->sendError('Convenio not found');
        }

        $convenio->delete();

        return $this->sendResponse($id, 'Convenio deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProdutoAPIRequest;
use App\Http\Requests\API\UpdateProdutoAPIRequest;
use App\Models\Produto;
use App\Repositories\ProdutoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProdutoController
 * @package App\Http\Controllers\API
 */

class ProdutoAPIController extends AppBaseController
{
    /** @var  ProdutoRepository */
    private $produtoRepository;

    public function __construct(ProdutoRepository $produtoRepo)
    {
        $this->produtoRepository = $produtoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/produtos",
     *      summary="Get a listing of the Produtos.",
     *      tags={"Produto"},
     *      description="Get all Produtos",
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
     *                  @SWG\Items(ref="#/definitions/Produto")
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
        $produtos = $this->produtoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($produtos->toArray(), 'Produtos retrieved successfully');
    }

    /**
     * @param CreateProdutoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/produtos",
     *      summary="Store a newly created Produto in storage",
     *      tags={"Produto"},
     *      description="Store Produto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Produto that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Produto")
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
     *                  ref="#/definitions/Produto"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateProdutoAPIRequest $request)
    {
        $input = $request->all();

        $produto = $this->produtoRepository->create($input);

        return $this->sendResponse($produto->toArray(), 'Produto saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/produtos/{id}",
     *      summary="Display the specified Produto",
     *      tags={"Produto"},
     *      description="Get Produto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Produto",
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
     *                  ref="#/definitions/Produto"
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
        /** @var Produto $produto */
        $produto = $this->produtoRepository->find($id);

        if (empty($produto)) {
            return $this->sendError('Produto not found');
        }

        return $this->sendResponse($produto->toArray(), 'Produto retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateProdutoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/produtos/{id}",
     *      summary="Update the specified Produto in storage",
     *      tags={"Produto"},
     *      description="Update Produto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Produto",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Produto that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Produto")
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
     *                  ref="#/definitions/Produto"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateProdutoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Produto $produto */
        $produto = $this->produtoRepository->find($id);

        if (empty($produto)) {
            return $this->sendError('Produto not found');
        }

        $produto = $this->produtoRepository->update($input, $id);

        return $this->sendResponse($produto->toArray(), 'Produto updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/produtos/{id}",
     *      summary="Remove the specified Produto from storage",
     *      tags={"Produto"},
     *      description="Delete Produto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Produto",
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
        /** @var Produto $produto */
        $produto = $this->produtoRepository->find($id);

        if (empty($produto)) {
            return $this->sendError('Produto not found');
        }

        $produto->delete();

        return $this->sendResponse($id, 'Produto deleted successfully');
    }
}

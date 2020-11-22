<?php
namespace app\controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use app\dao\EmpresaDAO;
use app\model\Empresa;
use app\controller\AppController;
use Exception;

final class EmpresaController extends AppController {

    public function __construct() {
        parent::__construct();
    }

    public function selectEmpresa(Request $request, Response $response, array $args): Response {
        try {
            $response = $this->client->request('GET', 'empresa');
            return $response;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

}
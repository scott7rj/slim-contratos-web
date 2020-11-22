<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use app\controller\EmpresaController;

$app->get('/', function(Request $request, Response $response) {
	return $this->view->render($response, 'portal.twig');
});

$app->get('/menu', function(Request $request, Response $response) {
	try {
		$strJsonFileContents = file_get_contents("json/menu.json");
		$array = json_decode($strJsonFileContents, true);
		return $this->view->render($response, 'menu/menu.twig', ['menu' => $array]);
	} catch (Exception $e) {
		throw new Exception($e->getMessage());
	}
});

$app->get('/empresas', function(Request $request, Response $response) {
	try {
		$controller = new EmpresaController();
		$res = $controller->selectEmpresa($request, $response, array());
		$array = json_decode($res->getBody()->getContents());
		return $this->view->render($response, 'empresa/empresas.twig', ['lista' => $array]);
	} catch (Exception $e) {
		throw new Exception($e->getMessage());
	}
});



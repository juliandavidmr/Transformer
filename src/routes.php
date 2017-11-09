<?php
use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});


/**
 * @param {integer} port    Puerto
 * @param {integer} server  Id servidor, proveniente de globals
 */
$app->get('/{port:[0-9]+}/{server:[0-9]+}[/{url}]', function (Request $request, Response $response, array $args) {
    // Capture arguments
    $port = $args['port'];
    $server = $args['server'];
    if (array_key_exists('url', $args)) {
        $url = $args['url'];
    } else {
        $url = '/';
    }

    // Settings
    global $settings;
    if (!array_key_exists($server, $settings['settings']['servers'])) {
        return $response->write("Identificador del servidor desconocido");
    }
    $ipOrigin = $settings['settings']['servers'][$server];
    $port = ":" + ((int)$port) > 0 ? "$port" : "";

    $source_url = "$ipOrigin$port";

    // Request
    /*$headers = array();
    if (is_array($request->getHeaders())) {
        foreach ( ((array)$request->getHeaders()) as $key => $value) {
            $headers[$key] = $value;
        }
    }*/
    $headers = array('Content-Type' => 'application/json');
    $res = Requests::get($source_url, $headers/* , $request->getHeaders() */ );

    return $response->write("Direccion: $ipOrigin$port");
});

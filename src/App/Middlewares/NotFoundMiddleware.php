<?php
/**
 * This file is part of the devcast.
 *
 * (c) Bernard Ng <ngandubernard@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace App\Middlewares;

use Core\Renderer\Renderer;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Handlers\NotFound;
use Slim\Http\Response;
use UnexpectedValueException;

/**
 * Class NotFoundMiddleware
 * Return an error page if any route is matched
 * @package App\Middlewares
 * @author bernard-ng, https://bernard-ng.github.io
 */
class NotFoundMiddleware extends NotFound
{

    /**
     * @var Renderer|mixed
     */
    private $renderer;

    /**
     * NotFoundMiddleware constructor.
     * @param Renderer $renderer
     */
    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @return mixed
     */
    protected function renderJsonNotFoundOutput()
    {
        return json_encode([
            "status" => 404,
            "message" => "Not Found"
        ]);
    }

    /**
     * @param ServerRequestInterface $request
     * @return string
     */
    protected function renderHtmlNotFoundOutput(ServerRequestInterface $request)
    {
        return $this->renderer->fetch('errors/404.html.twig');
    }
}

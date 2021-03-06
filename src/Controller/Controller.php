<?php

namespace Creios\Creiwork\Controller;

use Creios\Creiwork\Framework\BaseController;
use Creios\Creiwork\Framework\Result\ApacheFileResult;
use Creios\Creiwork\Framework\Result\Interfaces\DisposableResultInterface;
use Creios\Creiwork\Framework\Result\JsonResult;
use Creios\Creiwork\Framework\Result\RedirectResult;
use Creios\Creiwork\Framework\Result\TemplateResult;
use Creios\Creiwork\Framework\Result\Util\Disposition;

/**
 * Class Controller
 * @package Creios\Creiwork\Controller
 */
class Controller extends BaseController
{

    /**
     * @return TemplateResult
     */
    public function index()
    {
        return new TemplateResult('index');
    }

    /**
     * @return JsonResult
     */
    public function json()
    {
        return (new JsonResult(['index', 'title']));
    }

    /**
     * @return DisposableResultInterface
     */
    public function jsonDownload()
    {
        $disposition = (new Disposition(Disposition::ATTACHMENT))->withFilename('test.json');
        return (new JsonResult(['index', 'title']))->withDisposition($disposition);
    }

    /**
     * @return ApacheFileResult
     */
    public function license()
    {
        return (new ApacheFileResult(__DIR__ . '/../../LICENSE'));
    }

    /**
     * @return RedirectResult
     */
    public function redirect()
    {
        return new RedirectResult('/');
    }

    /**
     * @throws \Exception
     */
    public function error()
    {
        throw new \Exception('Artificial exception for demonstration purpose');
    }

}

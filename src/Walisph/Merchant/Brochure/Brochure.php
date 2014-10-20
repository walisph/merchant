<?php namespace Walisph\Merchant\Brochure;

use Illuminate\Config\Repository as IlluminateConfig;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Factory as IlluminateView;

class Brochure {

    /**
     * @var IlluminateConfig
     */
    private $config;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var IlluminateView
     */
    private $view;

    private $public_path;

    public function __construct( IlluminateConfig $config, Filesystem $filesystem, IlluminateView $view, $public_path )
    {
        $this->config       = $config;
        $this->filesystem   = $filesystem;
        $this->view         = $view;
        $this->public_path  = $public_path;


    }
}
 
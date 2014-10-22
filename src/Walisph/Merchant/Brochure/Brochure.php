<?php namespace Walisph\Merchant\Brochure;

use DOMPDF;
use Exception;
use Illuminate\Config\Repository as IlluminateConfig;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Response;
use Illuminate\View\Factory as IlluminateView;

class Brochure {

	/**
	 * @var IlluminateConfig
	 */
	protected $config;

	/**
	 * @var Filesystem
	 */
	protected $filesystem;

	/**
	 * @var IlluminateView
	 */
	protected $view;

	protected $public_path;
	protected $warnings, $paper, $orientation;

	/**
	 * @var DOMPDF
	 */
	protected $dompdf;


	/**
	 * @param DOMPDF $dompdf
	 * @param IlluminateConfig $config
	 * @param Filesystem $filesystem
	 * @param IlluminateView $view
	 * @param $public_path
	 */
	public function __construct( DOMPDF $dompdf, IlluminateConfig $config, Filesystem $filesystem, IlluminateView $view, $public_path )
	{
		$this->config = $config;
		$this->filesystem = $filesystem;
		$this->view = $view;
		$this->public_path = $public_path;
		$this->warnings = $this->config->get( 'walis-merchant::dompdf.show_warnings', false );
		$this->paper = $this->config->get( 'walis-merchant::dompdf.defines.DOMPDF_DEFAULT_PAPER_SIZE' );
		$this->orientation = $this->config->get( 'walis-merchant::orientation' ) ?: 'portrait';
		$this->dompdf = $dompdf;

		$this->dompdf->set_base_path( realpath( $public_path ) );
	}

	/**
	 * @return DOMPDF
	 */
	public function getDompdf()
	{
		return $this->dompdf;
	}

	/**
	 * @return mixed
	 */
	public function getPaper()
	{
		return $this->paper;
	}

	/**
	 * @param mixed $paper
	 * @param null $orientation
	 *
	 * @return $this
	 */
	public function setPaper( $paper, $orientation = null )
	{
		$this->paper = $paper;
		if ( $orientation )
		{
			$this->orientation = $orientation;
		}

		return $this;
	}

	/**
	 * @param string $orientation
	 *
	 * @return $this
	 */
	public function setOrientation( $orientation )
	{
		$this->orientation = $orientation;

		return $this;
	}

	/**
	 * @param mixed $warnings
	 *
	 * @return $this
	 */
	public function setWarnings( $warnings )
	{
		$this->warnings = $warnings;

		return $this;
	}

	public function loadHTML( $string, $encoding = null )
	{
		//$string = $this->convertEntities( $string );
		$this->dompdf->load_html( $string, $encoding );
		$this->rendered = false;

		return $this;
	}

	public function loadFile( $file )
	{
		$this->dompdf->load_html_file( $file );
		$this->rendered = false;

		return $this;
	}

	public function loadView( $view, $data = [], $mergeData = [], $encoding = null )
	{
		$html = $this->view->make( $view, $data, $mergeData )->render();

		return $this->loadHTML( $html, $encoding );
	}

	public function output()
	{
		if ( ! $this->rendered )
		{
			$this->render();
		}

		return $this->dompdf->output();
	}

	public function save( $filename )
	{
		$this->filesystem->put( $filename, $this->output() );

		return $this;
	}

	public function download( $filename = 'document.pdf' )
	{
		$output = $this->output();

		return new Response( $output, 200, array(
			'Content-Type'        => 'application/pdf',
			'Content-Disposition' => 'attachment; filename="' . $filename . '"'
		) );
	}

	/**
	 * Return a response with the PDF to show in the browser
	 *
	 * @param string $filename
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function stream( $filename = 'document.pdf' )
	{
		$output = $this->output();
		return new Response( $output, 200, array(
			'Content-Type'        => 'application/pdf',
			'Content-Disposition' => 'inline; filename="' . $filename . '"',
		) );
	}

	/**
	 * Render the PDF
	 */
	protected function render()
	{
		if ( ! $this->dompdf )
		{
			throw new Exception( 'DOMPDF not created yet' );
		}

		$this->dompdf->set_paper( $this->paper, $this->orientation );

		$this->dompdf->render();

		if ( $this->warnings )
		{
			global $_dompdf_warnings;
			if ( count( $_dompdf_warnings ) )
			{
				$warnings = '';
				foreach ( $_dompdf_warnings as $msg )
				{
					$warnings .= $msg . "\n";
				}
				if ( ! empty( $warnings ) )
				{
					throw new Exception( $warnings );
				}
			}
		}
		$this->rendered = true;
	}

	protected function convertEntities( $subject )
	{
		$entities = $this->config->get( 'walis-merchant::dompdf.entities' );

		foreach ( $entities as $search => $replace )
		{
			$subject = str_replace( $search, $replace, $subject );
		}

		return $subject;
	}

    /**
     * @return IlluminateConfig
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param IlluminateConfig $config
     */
    public function setConfig( $config )
    {
        $this->config = $config;
    }

    /**
     * @return Filesystem
     */
    public function getFilesystem()
    {
        return $this->filesystem;
    }

    /**
     * @param Filesystem $filesystem
     */
    public function setFilesystem( $filesystem )
    {
        $this->filesystem = $filesystem;
    }

    /**
     * @return IlluminateView
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param IlluminateView $view
     */
    public function setView( $view )
    {
        $this->view = $view;
    }

    /**
     * @return mixed
     */
    public function getPublicPath()
    {
        return $this->public_path;
    }

    /**
     * @param mixed $public_path
     */
    public function setPublicPath( $public_path )
    {
        $this->public_path = $public_path;
    }

    /**
     * @return string
     */
    public function getOrientation()
    {
        return $this->orientation;
    }

}
 
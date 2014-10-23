<?php namespace Walisph\Merchant;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Walisph\Merchant\Eloquent\Invoice;

class InvoiceController extends Controller {

	protected $brochure;

	public function __construct()
	{
		$this->brochure = App::make('walis-merchant.brochure');
	}
	
	public function index()
	{
		return Invoice::all();
	}
	
	public function show( $id )
	{

	}
}

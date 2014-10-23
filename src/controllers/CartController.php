<?php namespace Walisph\Merchant;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Walisph\Merchant\Brochure\Brochure;
use Walisph\Merchant\Eloquent\InvoiceRepository;
use Walisph\Merchant\Eloquent\ProductRepository;

class CartController extends Controller {

	/**
	 * @var Brochure
	 */
	protected $brochure;

	public function __construct()
	{
		$this->brochure = App::make('walis-merchant.brochure');
	}

	/**
	 * @param $view
	 * @param array $data
	 *
	 * @return array
	 */
	protected function createInvoice( $view, $data = [] )
	{
		$invoice = InvoiceRepository::create([
			'product_id' => $data['product'],
			'quantity' => $data['quantity'],
			'customer_email' => $data['customer']['email'],
			'customer_data' => $data['customer'],
			'product_data' => ProductRepository::find( $data['product'] )->toArray()
		]);
		$this->brochure->loadView( $view, $invoice );
		$filename = 'invoice_'. $invoice->id . date( "Y-n-d-His" ) .'.pdf';
		$this->brochure->save( public_path( 'invoices/'. $filename ) );
		return [
			'file_name' => $filename,
			'file_path' => 'invoices/'. $filename,
			'invoice_id' => $invoice->id
		];
	}

	/**
	 * @param $view
	 * @param $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function downloadInvoice( $view, $id )
	{
		$this->brochure->loadView( $view, InvoiceRepository::find( $id ) );
		$filename = 'invoice_'. sha1( date( "Y-n-d-His" ) ) .'.pdf';
		return $this->brochure->download( $filename );
	}



}
 
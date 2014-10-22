<?php namespace Walisph\Merchant\Repositories;

use BaseController;
use Illuminate\Support\Facades\App;
use Walisph\Merchant\Eloquent\InvoiceRepository;
use Walisph\Merchant\Eloquent\ProductRepository;

class CartRepository extends BaseController {
	
	protected function createInvoice( $view, $data = [] )
	{
		$brochure = App::make('walis-merchant.brochure');
		$invoice = InvoiceRepository::create([
			'product_id' => $data['product'],
			'quantity' => $data['quantity'],
			'customer_email' => $data['customer']['email'],
			'customer_data' => $data['customer'],
			'product_data' => ProductRepository::find( $data['product'] )->toArray()
		]);
		$brochure->loadView( $view, $invoice );
		$filename = 'invoice_'. $invoice->id . date( "Y-n-d-His" ) .'.pdf';
		$brochure->save( public_path( 'invoices/'. $filename ) );
		return [
			'file_name' => $filename,
			'file_path' => 'invoices/'. $filename,
			'invoice_id' => $invoice->id
		];
	}

	public function downloadInvoice( $view, $id )
	{
		$brochure = App::make('walis-merchant.brochure');
		$brochure->loadView( $view, InvoiceRepository::find( $id ) );
		$filename = 'invoice_'. sha1( date( "Y-n-d-His" ) ) .'.pdf';
		return $brochure->download( $filename );
	}
}
 
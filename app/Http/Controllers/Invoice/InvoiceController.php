<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Invoice\InvoiceRequest;
use App\Http\Resources\InvoiceResource;
use App\Services\Invoice\InvoiceService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function createInvoice(InvoiceRequest $request, InvoiceService $invoiceService): InvoiceResource
    {

        $invoice = $invoiceService->createInvoice($request->validated());

        return new InvoiceResource($invoice);
    }
}

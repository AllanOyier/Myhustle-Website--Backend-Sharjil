<?php

namespace App\Services\Invoice;

use App\Models\Invoice;
use App\Services\Service;
use Illuminate\Database\Eloquent\Model;

class InvoiceService extends Service
{

    public function __construct(Invoice $model)
    {
        return parent::__construct($model);
    }


    public function createInvoice(array $data): Invoice
    {
        return $this->model->create($data);
    }


    public function updateInvoice(int $id, array $data): ?Invoice
    {
        return $this->update($id, $data);
    }


    public function deleteInvoice(int $id): bool
    {
        return $this->delete($id);
    }
}

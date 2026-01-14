<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Catalogue\AboutCatalogueController;
use App\Http\Controllers\Catalogue\CatalogueController;
use App\Http\Controllers\Catalogue\ProductCatalogueController;
use App\Http\Controllers\Certificate\CertificateController;
use App\Http\Controllers\Invoice\InvoiceController;
use App\Http\Controllers\JobLead\JobLeadController;
use App\Http\Controllers\OrganizationDetail\OrganizationDetialController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Promotion\PromotionController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("/register", [AuthController::class, "store"]);
Route::post("/login", [AuthController::class, "login"]);







Route::group(['middleware' => [AuthMiddleware::class]], function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Auth and profile routes
    Route::post("/profile/create", [ProfileController::class, "createProfile"]);
    Route::get("/profile/get/user", [AuthController::class, "getUser"]);

    // Other profile data
    Route::post('/product/create', [ProductController::class, "createProduct"]);
    Route::post('/promotion/create', [PromotionController::class, "createPromotion"]);
    Route::post('/certificate/create', [CertificateController::class, "createCertificate"]);
    Route::post('/organization/detail/create', [OrganizationDetialController::class, "createOrganizationDetail"]);




    //  Invoice and job Lead
    Route::post('/job/lead/create', [JobLeadController::class, "createJobLead"]);
    Route::post('/invoice/create', [InvoiceController::class, "createInvoice"]);


    // Catalogue Routes
    Route::post('/catalogue/create', [CatalogueController::class, "createCatalogue"]);
    Route::get('/catalogue/get', [CatalogueController::class, "getCatalogue"]);


    // About Catalogue
    Route::post('/catalogue/about/create', [AboutCatalogueController::class, "createAboutCatalogue"]);
    Route::get('/catalogue/about/get', [AboutCatalogueController::class, "getAboutCatalogue"]);

    // Product Catalogue
    Route::get('/catalogue/product/get', [ProductCatalogueController::class, "getProductCatalogue"]);
    Route::post('/catalogue/product/create', [ProductCatalogueController::class, "createProductCatalogue"]);
});

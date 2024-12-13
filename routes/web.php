<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController; 

Route::get('/', [UserController::class, 'showHome']);
Route::fallback(function () {
    return redirect('/');
});


Route::get('/thankyou', [OrderController::class, 'showThanks']);
Route::get('/pages/contact-us', function () {
    return view('contact-us');
});

Route::get('/pages/about-us', function () {
    return view('about-us');
});

 
Route::get('/pages/mission', function () {
    return view('mission');
});

Route::get('/pages/vision', function () {
    return view('vision');
});

Route::get('/pages/values', function () {
    return view('values');
});

// User system
Route::get('/account/register', [UserController::class, "showCreate"])->middleware('guest')->name('get-register');
Route::post('/account/register', [UserController::class, "register"])->middleware('guest')->name('post-register');
Route::get('/admin/users/register', [UserController::class, "showCreate"])->middleware('isAdmin')->name('admin-register');



Route::post('/admin/users/register', [UserController::class, "register"])->middleware('isAdmin')->name('admin-post-register');

Route::get('/admin', [UserController::class, 'showAdminLogin'])->middleware('guest');
Route::post('/admin', [UserController::class, 'adminLogin'])->middleware('guest');

Route::get('/account/login', [UserController::class, "showLogin"])->name("get-login");
Route::post('/account/login', [UserController::class, "login"])->middleware('guest')->name("post-login");
Route::post('/account/logout', [UserController::class, "logout"])->middleware('mustbelogin', 'verified')->name('logout');
Route::get('/logout', [UserController::class, "allLogout"]);
Route::get('/account', [UserController::class, "showAccount"])->middleware('mustbelogin', 'verified');

// Password Reset
Route::get('/account/recover', [UserController::class, 'forgotPasswordForm'])->middleware('guest')->name('password.request');
Route::post('/account/recover', [UserController::class, 'requestResetLink'])->middleware('guest')->name('password.email');
Route::get('/account/reset-password/{token}', [UserController::class, 'resetPasswordForm'])->middleware('guest')->name('password.reset');
Route::put('/account/reset-password', [UserController::class, 'actualResetPassword'])->middleware('guest')->name('password.update');


Route::put('/admin/users/update/{user:id}', [UserController::class, 'adminChangePassword'])->middleware('isAdmin');


Route::middleware('isAdmin')->group(function () {
    Route::get('/account/admin', [AdminController::class, 'showAdmin']);

    Route::get('/custom/home-banner', [AdminController::class, 'showEditHomeBanner']);
    Route::put('/custom/home-banner', [AdminController::class, 'editHomeBanner']);

    //faq
    Route::get('/custom/faqs', [AdminController::class, 'showFaqs']);
    Route::get('/custom/faqs/create', [AdminController::class, 'showCreateFaq']);
    Route::post('/custom/faqs/create', [AdminController::class, 'createFaq']);
    Route::get('/custom/faqs/{faq:id}', [AdminController::class, 'showEditFaq']);
    Route::put('/custom/faqs/{faq:id}', [AdminController::class, 'editFaq']);
    Route::delete('/custom/faqs/{faq:id}', [AdminController::class, 'deleteFaq']);

    //reviews
    Route::get('/custom/reviews', [AdminController::class, 'showReviews']);
    Route::get('/custom/reviews/create', [AdminController::class, 'showCreateReview']);
    Route::post('/custom/reviews/create', [AdminController::class, 'createReview']);
    Route::get('/custom/reviews/{review:id}', [AdminController::class, 'showEditReview']);
    Route::put('/custom/reviews/{review:id}', [AdminController::class, 'editReview']);
    Route::delete('/custom/reviews/{review:id}', [AdminController::class, 'deleteReview']);

    //highlights
    Route::get('/custom/highlights', [AdminController::class, 'showHighlight']);
    Route::get('/custom/highlights/create', [AdminController::class, 'showCreateHighlight']);
    Route::post('/custom/highlights/create', [AdminController::class, 'createHighlight']);
    Route::get('/custom/highlights/{highlight:id}', [AdminController::class, 'showEditHighlight']);
    Route::put('/custom/highlights/{highlight:id}', [AdminController::class, 'editHighlight']);
    Route::delete('/custom/highlights/{highlight:id}', [AdminController::class, 'deleteHighlight']);

    //features
    Route::get('/custom/features', [AdminController::class, 'showFeatures']);
    Route::get('/custom/features/create', [AdminController::class, 'showCreateFeature']);
    Route::post('/custom/features/create', [AdminController::class, 'createFeature']);
    Route::get('/custom/features/{banner:id}/edit', [AdminController::class, 'showEditFeature']);
    Route::put('/custom/features/{banner:id}/edit', [AdminController::class, 'editFeature']);
    Route::delete('/custom/features/{banner:id}', [AdminController::class, 'deleteFeature']);

    //discounts
    Route::get('/custom/discounts', [AdminController::class, 'showDiscounts']);
    Route::get('/custom/discounts/create', [AdminController::class, 'showCreateDiscount']);
    Route::post('/custom/discounts/create', [AdminController::class, 'createDiscount']);
    Route::get('/custom/discounts/{discount:id}/edit', [AdminController::class, 'showEditDiscount']);
    Route::put('/custom/discounts/{discount:id}/edit', [AdminController::class, 'editDiscount']);
    Route::delete('/custom/discounts/{discount:id}', [AdminController::class, 'deleteDiscount']);

    //font
    Route::get('/account/admin/fonts', [AdminController::class, 'showFonts']);
    Route::get('/account/admin/fonts/create', [AdminController::class, 'showCreateFont']);
    Route::post('/account/admin/fonts/create', [AdminController::class, 'createFont']);
    Route::get('/account/admin/fonts/{font:id}/edit', [AdminController::class, 'showEditFont']);
    Route::put('/account/admin/fonts/{font:id}/edit', [AdminController::class, 'editFont']);
    Route::delete('/account/admin/fonts/{font:id}', [AdminController::class, 'deleteFont']);

    //shipping
    Route::get('/custom/shippings', [AdminController::class, 'showShippings']);
    Route::get('/custom/shippings/{state}', [AdminController::class, 'showPostCodeByState']);
    Route::put('/custom/shippings/standard', [AdminController::class, 'setAllStandardCost']);
    Route::put('/custom/shippings/express', [AdminController::class, 'setAllExpressCost']);
    Route::put('/custom/shippings/edit/{postcode:id}', [AdminController::class, 'editCost']);

    Route::get('/account/admin/users', [AdminController::class, 'showUsers']);
    Route::delete('/account/admin/users/{user:id}', [AdminController::class, 'deleteUser']);
    Route::put('/account/admin/users/{user:id}', [AdminController::class, 'makeAdmin']);
    Route::put('/account/admin/users/{user:id}/verify', [AdminController::class, 'makeVerified']);

    Route::get('/account/admin/types', [AdminController::class, 'showTypes']);
    Route::delete('/account/admin/types/{type:id}', [AdminController::class, 'deleteType']);
    Route::put('/account/admin/types/{type:id}', [AdminController::class, 'editType']);
    Route::post('/account/admin/types', [AdminController::class, 'createType']);

    Route::get('/account/admin/shapes', [AdminController::class, 'showShapes']);
    Route::delete('/account/admin/shapes/{shape:id}', [AdminController::class, 'deleteShape']);
    Route::put('/account/admin/shapes/{shape:id}', [AdminController::class, 'editShape']);
    Route::post('/account/admin/shapes', [AdminController::class, 'createShape']);

    Route::get('/account/admin/sizes', [AdminController::class, 'showSizes']);
    Route::delete('/account/admin/sizes/{size:id}', [AdminController::class, 'deleteSize']);
    Route::put('/account/admin/sizes/{size:id}', [AdminController::class, 'editSize']);
    Route::post('/account/admin/sizes', [AdminController::class, 'createSize']);

    Route::get('/account/admin/materials', [AdminController::class, 'showMaterials']);
    Route::delete('/account/admin/materials/{material:id}', [AdminController::class, 'deleteMaterial']);
    Route::put('/account/admin/materials/{material:id}', [AdminController::class, 'editMaterial']);
    Route::post('/account/admin/materials', [AdminController::class, 'createMaterial']);

    Route::get('/account/admin/events', [AdminController::class, 'showEvents']);
    Route::delete('/account/admin/events/{event:id}', [AdminController::class, 'deleteEvent']);
    Route::get('/account/admin/events/{event:id}/edit', [AdminController::class, 'showEditEvent']);
    Route::put('/account/admin/events/{event:id}', [AdminController::class, 'editEvent']);
    Route::get('/account/admin/events/create', [AdminController::class, 'showCreateEvent']);
    Route::post('/account/admin/events', [AdminController::class, 'createEvent']);

    Route::get('/account/admin/colors', [AdminController::class, 'showColors']);
    Route::get('/account/admin/colors/create', [AdminController::class, 'xshowColor']);
    Route::post('/account/admin/colors/create', [AdminController::class, 'createColor']);
    Route::delete('/account/admin/colors/{color:id}', [AdminController::class, 'deleteColor']);
    Route::get('/account/admin/colors/{color:id}', [AdminController::class, 'showEditColor']);
    Route::put('/account/admin/colors/{color:id}', [AdminController::class, 'editColor']);

    Route::get('/account/admin/inks', [AdminController::class, 'showInks']);
    Route::get('/account/admin/inks/create', [AdminController::class, 'showCreateInk']);
    Route::post('/account/admin/inks/create', [AdminController::class, 'createInk']);
    Route::delete('/account/admin/inks/{ink:id}', [AdminController::class, 'deleteInk']);
    Route::get('/account/admin/inks/{ink:id}/edit', [AdminController::class, 'showEditInk']);
    Route::put('/account/admin/inks/{ink:id}/edit', [AdminController::class, 'editInk']);


    Route::get('/account/admin/designs', [AdminController::class, 'showDesign']);
    Route::get('/account/admin/designs/create', [AdminController::class, 'showCreateDesign']);
    Route::get('/account/admin/designs/{product:id}/edit', [AdminController::class, 'showEditDesign']);
    Route::put('/account/admin/designs/{product:id}/edit', [AdminController::class, 'editDesign']);
});


Route::get('/account/admin/products/create', [AdminController::class, 'showCreateProduct'])->middleware('isAdmin');
Route::post('/account/admin/products/create', [AdminController::class, 'addProduct'])->middleware('isAdmin');
Route::get('/account/admin/products/{product:id}/edit', [AdminController::class, 'showEditProduct'])->middleware('isAdmin');
Route::put('/account/admin/products/{product:id}', [AdminController::class, 'editProduct'])->middleware('isAdmin');

Route::get('/account/admin/products/remove-colors/{product:id}/{id}', [AdminController::class, "DeletePColor"])->middleware('isAdmin');

Route::delete('/account/admin/products/{product:id}', [AdminController::class, 'deleteProduct'])->middleware('isAdmin');

Route::get('/account/admin/orders', [AdminController::class, 'showOrders'])->middleware('isAdmin')->name('showadminorders');
Route::get('/account/admin/orders/{id}', [AdminController::class, 'detailAdminOrder'])->middleware('isAdmin')->name('showadminorders');



Route::get('/account/admin/products', [AdminController::class, 'showProducts'])->middleware('isAdmin');
Route::post('/account/admin/products/color', [AdminController::class, 'addColor'])->middleware('isAdmin');

Route::post('/cart/add', [OrderController::class, 'addToCart']);
Route::get('/cart/remove/{sku}', [OrderController::class, 'removeFromCart']);
Route::get('/cart/checkout/{order:id}', [OrderController::class, 'showCheckout']);
Route::post('/cart/checkout/api', [OrderController::class, 'apiCreateOrder']);
Route::post('/cart/checkout/api/{order:id}/capture', [OrderController::class, 'apiCaptureOrder']);
Route::post('/payment/confirm', [OrderController::class, 'paymentConfirm']);
Route::post('/cart/checkout', [OrderController::class, 'createOrder']);
Route::get('/cart', [OrderController::class, 'showCartDetail']);


Route::post('cart/checkout/{order:id}/pay-by-paypal', [PaymentController::class, 'makePayment']);
Route::post('/cart/checkout/{order:id}/pay-by-stripe', [PaymentController::class, 'stripePayment']);

Route::get('/payment/success/{session_id}', [PaymentController::class, 'successPayment']);


Route::get('/paypal', function () {    return view('payment.paypal');})->name('paypal');



Route::get('/account/addresses/{user:id}', [UserController::class, 'showAddresses'])->middleware('mustbelogin', 'verified');
Route::post('/account/addresses/{user:id}', [UserController::class, 'addAddress'])->middleware('mustbelogin', 'verified');
Route::put('/account/addresses/{user:id}/{address:id}', [UserController::class, 'editAddress'])->middleware('mustbelogin', 'verified');
Route::delete('/account/addresses/{user:id}/{address:id}', [UserController::class, 'deleteAddress'])->middleware('mustbelogin', 'verified');



//Product 
Route::get('/collections/all', [ProductController::class, 'showAllProducts']);
Route::get('/collections/type/{type}', [ProductController::class, 'showProductsByType']);
Route::get('/collections/shape/{shape}', [ProductController::class, 'showProductsByShape']);
Route::get('/collections/size/{size}', [ProductController::class, 'showProductsBySize']);
Route::get('/collections/material/{material}', [ProductController::class, 'showProductsByMaterial']);
Route::get('/collections/event/{event}', [ProductController::class, 'showProductsByEvent']);
Route::post('/search', [ProductController::class, 'search']);

//filtering SPA
Route::middleware('cache.headers:public;max_age=120;etag')->group(function () {
    Route::get('/collections/ascending/raw', [ProductController::class, 'filterAscending']);
    Route::get('/collections/descending/raw', [ProductController::class, 'filterDescending']);
    Route::get('/collections/featured/raw', [ProductController::class, 'filterFeatured']);
    Route::get('/collections/bestSelling/raw', [ProductController::class, 'filterBestSelling']);
    Route::get('/collections/priceAscending/raw', [ProductController::class, 'filterPriceAscending']);
    Route::get('/collections/priceDescending/raw', [ProductController::class, 'filterPriceDescending']);
    Route::get('/collections/dateAscending/raw', [ProductController::class, 'filterDateAscending']);
    Route::get('/collections/dateDescending/raw', [ProductController::class, 'filterDateDescending']);
    Route::get('/collections/price/{min}-{max}/raw', [ProductController::class, 'filterByPrice']);

    Route::get('/collections/color/{color}/raw', [ProductController::class, 'filterColor']);
    Route::get('/collections/inStock/raw', [ProductController::class, 'filterInStock']);
    Route::get('/collections/outStock/raw', [ProductController::class, 'filterOutStock']);
});



Route::get('/products/{product:id}', [ProductController::class, 'detailProduct'])->name('singleProduct');





Route::get('/email/verify', [UserController::class, 'showVerifyEmailScreen'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [UserController::class, 'clickVerifyEmail'])->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/getInfo', [UserController::class, 'getInfo']);
Route::get('/form', [UserController::class, 'showGetInfo']);

Route::get('/generate', [AdminController::class, 'showIconGenerate']);
Route::post('/generate', [AdminController::class, 'iconGenerate']);
Route::post('/getDiscount/{oid}', [AdminController::class, 'getDiscount']);
Route::post('/removeDiscount/{oid}', [AdminController::class, 'removeDiscount']);
Route::post('/getShippingCost', [AdminController::class, 'getShippingCost']);
Route::get('/pages/design-your-own', [AdminController::class, 'designYourOwn'])->name('singledesignProduct');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


/*Shipment*/

Route::get('/createship', [OrderController::class, 'createship']);
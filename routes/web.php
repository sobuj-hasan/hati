<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\FrontendController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\FaqController;
    use App\Http\Controllers\ContactController;
    use App\Http\Controllers\SubcategoryController;
    use App\Http\Controllers\SettingController;
    use App\Http\Controllers\CartController;
    use App\Http\Controllers\CouponController;
    use App\Http\Controllers\SslCommerzPaymentController;

    // generet laravel basic auth Routes
    Auth::routes();

    // generet laravel FrontendController Routes
    Route::get('/', [FrontendController::class, 'home'])->name('tohoney_home');
    Route::get('about', [FrontendController::class, 'about'])->name('about');
    Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
    Route::get('service', [FrontendController::class, 'service'])->name('service');
    Route::get('product/details/{product_id}', [FrontendController::class, 'productdetails'])->name('productdetails');
    Route::get('shop', [FrontendController::class, 'shop'])->name('shop');
    Route::get('categorywise/shop/{category_id}', [FrontendController::class, 'categorywiseshop'])->name('categorywiseshop');
    Route::get('cart', [FrontendController::class, 'cart'])->name('cart');
    Route::get('cart/{coupon_name}', [FrontendController::class, 'cart'])->name('cartwithcoupon');
    Route::post('update/cart', [FrontendController::class, 'updatecart'])->name('updatecart');
    Route::get('checkout', [FrontendController::class, 'checkout'])->name('checkout');
    Route::post('checkout/post', [FrontendController::class, 'checkoutpost'])->name('checkoutpost');
    Route::get('customer/register', [FrontendController::class, 'customerregister'])->name('customer.register');
    Route::post('customer/register/post', [FrontendController::class, 'customerregisterpost'])->name('customerregisterpost');
    Route::get('customer/login', [FrontendController::class, 'customerlogin'])->name('customerlogin');
    Route::post('customer/login/post', [FrontendController::class, 'customerloginpost'])->name('customerloginpost');
    Route::post('get/city/list', [FrontendController::class, 'getcitylist']);

    // generet laravel HomeController Routes
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('home/userlist', [HomeController::class, 'userlist'])->name('userlist');
    Route::get('download/invoice/{order_id}', [HomeController::class, 'downloadinvoice'])->name('downloadinvoice');

    // generet laravel CatrgoryController Routes
    Route::get('category', [CategoryController::class, 'category'])->name('category');
    Route::post('category/post', [CategoryController::class, 'categorypost'])->name('categorypost');
    Route::get('category/delete/{category_id}', [CategoryController::class, 'categorydelete'])->name('categorydelete');
    Route::get('category/all/delete/', [CategoryController::class, 'categoryalldelete'])->name('categoryalldelete');
    Route::get('category/edit/{category_id}', [CategoryController::class, 'categoryedit'])->name('categoryedit');
    Route::post('category/post/edit', [CategoryController::class, 'categoryeditpost'])->name('categoryeditpost');
    Route::get('category/restore/{category_id}', [CategoryController::class, 'categoryrestore'])->name('categoryrestore');
    Route::get('category/force/delete/{category_id}', [CategoryController::class, 'categoryforcedelete'])->name('categoryforcedelete');
    Route::get('category/all/restore', [CategoryController::class, 'categoryallrestore'])->name('categoryallrestore');
    Route::post('category/check/delete', [CategoryController::class, 'categorycheckdelete'])->name('categorycheckdelete');

    // generet laravel SubcatrgoryController Routes
    Route::get('subcategory', [SubcategoryController::class, 'subcategory'])->name('subcategory');
    Route::post('subcategory/post', [SubcategoryController::class, 'subcategorypost'])->name('subcategorypost');
    
    // laravel ProductController Routes generet
    Route::get('product', [ProductController::class, 'product'])->name('product');
    Route::get('product/product_add', [ProductController::class, 'productadd'])->name('productadd');
    Route::post('product/post', [ProductController::class, 'productpost'])->name('productpost');
    Route::get('product/edit/{product_id}', [ProductController::class, 'productedit'])->name('productedit');
    Route::post('edit/product/post/{product_id}', [ProductController::class, 'editproductpost'])->name('editproductpost');

    Route::get('product/delete/{product_id}', [ProductController::class, 'productdelete'])->name('productdelete');
    Route::get('product/all/delete/', [ProductController::class, 'productalldelete'])->name('productalldelete');
    Route::get('product/restore/{product_id}', [ProductController::class, 'productrestore'])->name('productrestore');
    Route::get('product/force/delete/{product_id}', [ProductController::class, 'productforcedelete'])->name('productforcedelete');
    Route::get('product/force/all/delete/', [ProductController::class, 'productforcealldelete'])->name('productforcealldelete');
    Route::get('product/all/restore', [ProductController::class, 'productallrestor'])->name('productallrestor');

    // Laravel FaqController Routes generate
    Route::get('faq', [FaqController::class, 'faq'])->name('faq');
    Route::post('faq/post', [FaqController::class, 'faqpost'])->name('faqpost');
    Route::get('faq/delete/{faq_id}', [FaqController::class, 'faqdelete'])->name('faqdelete');
    
    // Laravel SettingController Routes generate
    Route::get('setting', [SettingController::class, 'setting'])->name('setting');
    Route::post('setting/post', [SettingController::class, 'settingpost'])->name('settingpost');

    // Laravel ContactController Routes generate
    Route::post('guest', [ContactController::class, 'guest'])->name('guest');
    Route::get('guest/msg', [ContactController::class, 'guestmsg'])->name('guestmsg');
    Route::get('guestmsg/delete/{guest_id}', [ContactController::class, 'guestmsgdelete'])->name('guestmsgdelete');

    // Laravel CartController Routes generate
    Route::post('add/to/cart/{product_id}', [CartController::class, 'addtocart'])->name('addtocart');
    Route::get('cart/product/delete/{cart_product_id}', [CartController::class, 'cartproductdelete'])->name('cartproductdelete');
    

    // Laravel Resourcefull CouponController Routes generate
    // Route::get('coupon', [CouponController::class, 'index'])->name('coupon');
    Route::resource('coupon', CouponController::class);

    // SSLCOMMERZ Start
    Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
    Route::get('/online/payment', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

    Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

    Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
    //SSLCOMMERZ END















        


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminloginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RestaurantloginController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RestauranttypeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ItemController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DeliveryboyController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\OfferController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RestaurantlistController;
use App\Http\Controllers\UserloginController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\ResinquiryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageorderController;

use App\Http\Middleware\Adminlogin;
use App\Http\Middleware\Restaurantlogin;
use App\Http\Middleware\Userlogin;
use App\Http\Middleware\Deliveryboylogin;

// restaurant 

// use App\Http\Controllers\ResregisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Admin........................................................................................................
// ------------------------------------------------------------------------------------------------------------


//adminlogin
Route::get('/adminlogin', [AdminloginController::class, 'adminindex']);
Route::post('/checklogin', [AdminloginController::class, 'checklogin']);
Route::get('/adminlogout', [AdminloginController::class, 'adminlogout']);
// forgetpassword 
Route::get('/forgetpassword', [AdminloginController::class, 'forgetpassword']);
Route::post('/checkforgetpass', [AdminloginController::class, 'checkforgetpass']);
Route::middleware([Adminlogin::class])->group(function () {



    // dashboard admin 
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/resisapprove/{id}/{isapprove}', [AdminController::class, 'resisapprove']);
    Route::get('/resisverify/{id}/{isverify}', [AdminController::class, 'resisverify']);
    Route::get('/resisblock/{id}/{isblock}', [AdminController::class, 'resisblock']);

    //profile
    Route::get('/adminprofile', [AdminController::class, 'adminprofile']);
    Route::post('/editadmin', [AdminController::class, 'editadmin']);
    //changepass
    Route::get('/adminchangepassword', [AdminloginController::class, 'adminchangepassword']);
    Route::post('/changepassword', [AdminloginController::class, 'changepassword']);

    //State
    Route::get('/state', [StateController::class, 'state']);
    Route::get('/addstate', [StateController::class, 'addstate']);
    Route::get('/updatestate/{id}', [StateController::class, 'updatestate']);
    Route::post('/insertstate', [StateController::class, 'insertstate']);
    Route::post('/deletestate', [StateController::class, 'deletestate']);
    Route::post('/editstate', [StateController::class, 'editstate']);

    //city
    Route::get('/city', [CityController::class, 'city']);
    Route::get('/addcity', [CityController::class, 'addcity']);
    Route::get('/updatecity/{id}', [CityController::class, 'updatecity']);
    Route::post('/insertcity', [CityController::class, 'insertcity']);
    Route::post('/deletecity', [CityController::class, 'deletecity']);
    Route::post('/editcity', [CityController::class, 'editcity']);

    //area
    Route::get('/area', [AreaController::class, 'area']);
    Route::get('/addarea', [AreaController::class, 'addarea']);
    Route::get('/updatearea/{id}', [AreaController::class, 'updatearea']);
    Route::post('/insertarea', [AreaController::class, 'insertarea']);
    Route::post('/deletearea', [AreaController::class, 'deletearea']);
    Route::post('/editarea', [AreaController::class, 'editarea']);

    //restaurant
    Route::get('/restaurant', [RestaurantController::class, 'restaurant']);
    Route::get('/restaurantdetail/{id}', [RestaurantController::class, 'restaurantdetail']);
    Route::get('/restaurantisblock/{id}/{isblock}', [RestaurantController::class, 'restaurantisblock']);
    Route::get('/restaurantisapprove/{id}/{isapprove}', [RestaurantController::class, 'restaurantisapprove']);
    Route::get('/restaurantisverify/{id}/{isverify}', [RestaurantController::class, 'restaurantisverify']);

    //restauranttype
    Route::get('/restauranttype', [RestauranttypeController::class, 'restauranttype']);
    Route::get('/addrestauranttype', [RestauranttypeController::class, 'addrestauranttype']);
    Route::get('/updaterestauranttype/{id}', [RestauranttypeController::class, 'updaterestauranttype']);
    Route::post('/insertrestauranttype', [RestauranttypeController::class, 'insertrestauranttype']);
    Route::post('/deleterestauranttype', [RestauranttypeController::class, 'deleterestauranttype']);
    Route::post('/editrestauranttype', [RestauranttypeController::class, 'editrestauranttype']);

    //menu

    Route::get('/menu', [MenuController::class, 'menu']);
    Route::get('/menuisapprove/{id}/{isapprove}', [MenuController::class, 'menuisapprove']);


    //food
    Route::get('/food', [FoodController::class, 'food']);
    Route::get('/fooddetail/{id}', [FoodController::class, 'fooddetail']);
    // Route::get('/foodisactive/{id}/{isactive}', [FoodController::class, 'foodisactive']);
    Route::get('/foodisapprove/{id}/{isapprove}', [FoodController::class, 'foodisapprove']);

    //item
    Route::get('/item', [ItemController::class, 'item']);

    //useraddress
    Route::get('/useraddress', [AddressController::class, 'useraddress']);

    //user
    Route::get('/user', [UsersController::class, 'user']);
    Route::get('/userisverify/{id}/{isverify}', [UsersController::class, 'userisverify']);

    //cart
    Route::get('/cart', [CartController::class, 'cart']);

    //log
    Route::post('/insertlog', [LogController::class, 'insertlog']);

    //order
    Route::get('/order', [OrderController::class, 'order']);
    Route::get('/orderdetail/{id}', [OrderController::class, 'orderdetail']);
    Route::get('/allocateorder/{id}', [OrderController::class, 'allocateorder']);
    Route::post('/getareaorder', [OrderController::class, 'getareaorder']);
    Route::post('/getdelboy', [OrderController::class, 'getdelboy']);

    //deliveryboy
    Route::get('/deliveryboy', [DeliveryboyController::class, 'deliveryboy']);
    Route::get('/boyisactive/{id}/{isactive}', [DeliveryboyController::class, 'boyisactive']);
    Route::get('/boyisblock/{id}/{isblock}', [DeliveryboyController::class, 'boyisblock']);

    //review
    Route::get('/review', [ReviewController::class, 'review']);
    Route::get('/reviewisdisplay/{id}/{isdisplay}', [ReviewController::class, 'reviewisdisplay']);

    //inquriy
    Route::get('/admininquiry', [ContactusController::class, 'admininquiry']);
    Route::post('/deleteinquiry', [ContactusController::class, 'deleteinquiry']);
    Route::post('/admininquiryresponse', [ContactusController::class, 'admininquiryresponse']);



    //user
    Route::get('/user', [UsersController::class, 'user']);

    //offer
    Route::get('/offer', [OfferController::class, 'offer']);
    Route::get('/addoffer', [OfferController::class, 'addoffer']);
    Route::get('/updateoffer/{id}', [OfferController::class, 'updateoffer']);
    Route::post('/insertoffer', [OfferController::class, 'insertoffer']);
    Route::post('/deleteoffer', [OfferController::class, 'deleteoffer']);
    Route::post('/editoffer', [OfferController::class, 'editoffer']);
    Route::get('/offerdetail/{id}', [OfferController::class, 'offerdetail']);
    Route::get('/offerisactive/{id}/{isactive}', [OfferController::class, 'offerisactive']);

    //category
    Route::get('/category', [CategoryController::class, 'category']);
    Route::get('/addcategory', [CategoryController::class, 'addcategory']);
    Route::get('/updatecategory/{id}', [CategoryController::class, 'updatecategory']);
    Route::post('/insertcategory', [CategoryController::class, 'insertcategory']);
    Route::post('/deletecategory', [CategoryController::class, 'deletecategory']);
    Route::post('/editcategory', [CategoryController::class, 'editcategory']);

    //subcategory
    Route::get('/subcategory', [SubcategoryController::class, 'Subcategory']);
    Route::get('/addsubcategory', [SubcategoryController::class, 'addSubcategory']);
    Route::get('/updatesubcategory/{id}', [SubcategoryController::class, 'updatesubcategory']);
    Route::post('/insertsubcategory', [SubcategoryController::class, 'insertsubcategory']);
    Route::post('/deletesubcategory', [SubcategoryController::class, 'deletesubcategory']);
    Route::post('/editsubcategory', [SubcategoryController::class, 'editsubcategory']);

    //blog
    Route::get('/adminblog', [BlogController::class, 'adminblog']);
    Route::get('/addblog', [BlogController::class, 'addblog']);
    Route::post('/insertblog', [BlogController::class, 'insertblog']);
    Route::post('/deleteblog', [BlogController::class, 'deleteblog']);
    Route::post('/editblog', [BlogController::class, 'editblog']);
    Route::get('/updateblog/{id}', [BlogController::class, 'updateblog']);

    //package
    Route::get('/package', [PackageController::class, 'package']);
    Route::get('/addpackage', [PackageController::class, 'addpackage']);
    Route::post('/insertpackage', [PackageController::class, 'insertpackage']);
    Route::get('/updatepackage/{id}', [PackageController::class, 'updatepackage']);
    Route::post('/editpackage', [PackageController::class, 'editpackage']);
    Route::post('/deletepackage', [PackageController::class, 'deletepackage']);

    //expired package
    Route::get('/expiredpackage', [PackageController::class, 'expiredpackage']);
});

// restaurant .................................................................................................
// ------------------------------------------------------------------------------------------------------------

//register
Route::get('/resregistration', [RestaurantController::class, 'resregistration']);
Route::post('/insertrestaurant', [RestaurantController::class, 'insertrestaurant']);
Route::post('/getarea', [RestaurantController::class, 'getarea']);
//package order
Route::get('/packageorder', [PackageorderController::class, 'packageorder']);
Route::post('/insertpackageorder', [PackageorderController::class, 'insertpackageorder']);

// forgetpassword 
Route::get('/resforgetpassword', [RestaurantloginController::class, 'resforgetpassword']);
Route::post('/rescheckforgetpass', [RestaurantloginController::class, 'rescheckforgetpass']);

//restaurantlogin
Route::get('/restaurantindex', [RestaurantloginController::class, 'restaurantindex']);
Route::post('/restaurantlogin', [RestaurantloginController::class, 'restaurantlogin']);
Route::get('/reslogout', [RestaurantloginController::class, 'reslogout']);
Route::middleware([Restaurantlogin::class])->group(function () {

    // changepassword 
    Route::get('/reschangepassword', [RestaurantloginController::class, 'reschangepassword']);
    Route::post('/rescheckpassword', [RestaurantloginController::class, 'rescheckpassword']);


    //resprofile
    Route::get('/restaurantprofile', [RestaurantController::class, 'restaurantprofile']);
    Route::post('/editrestaurant', [RestaurantController::class, 'editrestaurant']);


    //dashboard
    Route::get('/resdashboard', [RestaurantController::class, 'resdashboard']);


    // food
    Route::get('/resfood', [FoodController::class, 'resfood']);
    Route::get('/addfood', [FoodController::class, 'addfood']);
    Route::post('/insertfood', [FoodController::class, 'insertfood']);
    Route::get('/resfooddetail/{id}', [FoodController::class, 'resfooddetail']);
    Route::post('/deletefood', [FoodController::class, 'deletefood']);
    Route::post('/editfood', [FoodController::class, 'editfood']);
    Route::get('/updatefood/{id}', [FoodController::class, 'updatefood']);
    Route::get('/foodisactive/{id}/{isactive}', [FoodController::class, 'foodisactive']);

    Route::post('/getsubcategory', [FoodController::class, 'getsubcategory']);

    // item
    Route::get('/resitem', [ItemController::class, 'resitem']);
    Route::get('/additem', [ItemController::class, 'additem']);
    Route::get('/updateitem/{id}', [ItemController::class, 'updateitem']);
    Route::post('/edititem', [ItemController::class, 'edititem']);
    Route::post('/insertitem', [ItemController::class, 'insertitem']);
    Route::post('/deleteitem', [ItemController::class, 'deleteitem']);

    // menu
    Route::get('/resmenu', [MenuController::class, 'resmenu']);
    Route::get('/addmenu', [MenuController::class, 'addmenu']);
    Route::get('/updatemenu/{id}', [MenuController::class, 'updatemenu']);
    Route::post('/insertmenu', [MenuController::class, 'insertmenu']);
    Route::post('/editmenu', [MenuController::class, 'editmenu']);
    Route::post('/deletemenu', [MenuController::class, 'deletemenu']);
    Route::get('/menuisactive/{id}/{isactive}', [MenuController::class, 'menuisactive']);

    // offer 
    Route::get('/resoffer', [OfferController::class, 'resoffer']);
    Route::get('/resofferdetail/{id}', [OfferController::class, 'resofferdetail']);

    // cart
    Route::get('/rescart', [CartController::class, 'rescart']);

    // order
    Route::get('/resorder', [OrderController::class, 'resorder']);
    Route::get('/resorderdetail/{id}', [OrderController::class, 'resorderdetail']);

    // review
    Route::get('/resreview', [ReviewController::class, 'resreview']);

    //inquiry
    Route::get('/resinquiry', [ResinquiryController::class, 'resinquiry']);
    Route::post('/deleteresinquiry', [ResinquiryController::class, 'deleteresinquiry']);
    Route::post('/inquiryresponse', [ResinquiryController::class, 'inquiryresponse']);

    //blog
    Route::get('/resblog', [BlogController::class, 'resblog']);
    Route::get('/addresblog', [BlogController::class, 'addresblog']);
    Route::post('/insertresblog', [BlogController::class, 'insertresblog']);
    Route::post('/deleteresblog', [BlogController::class, 'deleteresblog']);
    Route::post('/editresblog', [BlogController::class, 'editresblog']);
    Route::get('/updateresblog/{id}', [BlogController::class, 'updateresblog']);
});

// Frontend---------------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------------------


// index 
Route::get('/', [HomeController::class, 'frontindex']);
// listing 
Route::get('/restaurantlist', [RestaurantlistController::class, 'restaurantlist']);
Route::post('/getres', [RestaurantlistController::class, 'getres']);
Route::get('/frontrestaurantdetail/{id}', [RestaurantlistController::class, 'frontrestaurantdetail']);
Route::post('/restaurantlistsearch', [RestaurantlistController::class, 'restaurantlistsearch']);

// user---------------------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------------------
Route::get('/userregister', [UsersController::class, 'userregister']);
Route::post('/insertuser', [UsersController::class, 'insertuser']);

Route::get('/userlogin', [UserloginController::class, 'userlogin']);
Route::post('/userchecklogin', [UserloginController::class, 'userchecklogin']);
Route::get('/userlogout', [UserloginController::class, 'userlogout']);




// userforgetpass
Route::get('/userforgetpass', [UserloginController::class, 'userforgetpass']);
Route::post('/usercheckforgetpass', [UserloginController::class, 'usercheckforgetpass']);

// review 
Route::post('/insertreview', [ReviewController::class, 'insertreview']);


//contactus
Route::get('/contactus', [ContactusController::class, 'contactus']);
Route::post('/insertinquiry', [ContactusController::class, 'insertinquiry']);



//resinquiry
Route::post('/insertresinquiry', [ResinquiryController::class, 'insertresinquiry']);



//aboutus
Route::get('/aboutus', [HomeController::class, 'aboutus']);

//blog
Route::get('/blog', [HomeController::class, 'blog']);

//wishlist
Route::get('/wishlist', [HomeController::class, 'wishlist']);

//order

Route::post('/insertorder', [OrderController::class, 'insertorder']);
//middleware==============================================================================================================
Route::middleware([Userlogin::class])->group(function () {

    //order
    Route::post('/frontorder', [HomeController::class, 'frontorder']);
    Route::post('/getoffer', [HomeController::class, 'getoffer']);
    Route::get('/myorder', [UsersController::class, 'myorder']);


    //userprofile
    Route::get('/userprofile', [UsersController::class, 'userprofile']);
    Route::post('/edituser', [UsersController::class, 'edituser']);
    Route::post('/getareauser', [UsersController::class, 'getareauser']);


    //cart
    Route::get('/frontcart', [CartController::class, 'frontcart']);
    Route::post('/deletecart', [CartController::class, 'deletecart']);
    Route::post('/insertcart', [CartController::class, 'insertcart']);
    Route::post('/editcart', [CartController::class, 'editcart']);
    Route::post('/getcart', [CartController::class, 'getcart']);

    //changepass
    Route::get('/userchangepass', [UserloginController::class, 'userchangepass']);
    Route::post('/usercheckchangepass', [UserloginController::class, 'usercheckchangepass']);
});


//deliveryboy----------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------------

// register 
Route::get('/deliveryregister', [DeliveryboyController::class, 'deliveryregister']);
Route::post('/insertdboy', [DeliveryboyController::class, 'insertdboy']);
Route::post('/getareadeliveryboy', [DeliveryboyController::class, 'getareadeliveryboy']);
Route::post('/getareadeliveryboyprofile', [DeliveryboyController::class, 'getareadeliveryboyprofile']);
//login
Route::get('/deliverylogin', [DeliveryboyController::class, 'deliverylogin']);
Route::post('/checkdeliverylogin', [DeliveryboyController::class, 'checkdeliverylogin']);
Route::get('/deliveryboylogout', [DeliveryboyController::class, 'deliveryboylogout']);

//forgetpassword
Route::get('/delboyforgetpassword', [DeliveryboyController::class, 'delboyforgetpassword']);
Route::post('/delboycheckforgetpass', [DeliveryboyController::class, 'delboycheckforgetpass']);

//middleware============================================================================================================
Route::middleware([Deliveryboylogin::class])->group(function () {

    //dashboard
    Route::get('/deliverydashboard', [DeliveryboyController::class, 'deliverydashboard']);

    //profile
    Route::get('/deliveryboyprofile', [DeliveryboyController::class, 'deliveryboyprofile']);
    Route::post('/editdeliveryboy', [DeliveryboyController::class, 'editdeliveryboy']);

    // changepassword 
    Route::get('/delchangepassword', [DeliveryboyController::class, 'delchangepassword']);
    //confirmnewpass
    Route::post('/delboychangepassword', [DeliveryboyController::class, 'delboychangepassword']);


    //order
    Route::get('/delboyorder', [DeliveryboyController::class, 'delboyorder']);
    Route::get('/logstatus/{id}/{isdone}', [DeliveryboyController::class, 'logstatus']);

    //user
    Route::get('/deliveryuser', [DeliveryboyController::class, 'deliveryuser']);
});

<?php

Route::group(['namespace' => 'Page'],function(){

    Route::get('/','PageController@index')->name('mainpage');//ok
    Route::get('/search','PageController@getLawyers')->name('search');
    Route::get('news/{news?}','PageController@news')->name('news');//ok
    Route::get('laws','PageController@laws')->name('laws');//ok
    Route::get('laws/{laws?}','PageController@lawcontent')->name('lawcontent');
    Route::get('news/tags/{tags}','PageController@tag')->name('tags');//ok
    Route::get('news/categories/{categories}','PageController@category')->name('categories');//ok
    Route::get('laws/lawtags/{lawtgs}','PageController@lawtag')->name('lawtags');//ok
    Route::get('laws/lawcategories/{lawcategry}','PageController@lawcategory')->name('lawcategories');//ok
    Route::resource('/reglawyer','RegLawyerController');
    Route::get('/lawfirms', 'Map\markersController@index');//ok
    Route::get('/lawfirms/{lawfirm}', 'Map\markersController@show');//ok
    Route::get('/mapsearch', 'Map\MapController@gmaps')->name('mapsearch');//ok
    Route::get('/lawsearch', 'PageController@lawsearch')->name('lawsearch');//ok
    Route::get('/news-search', 'PageController@newsearch')->name('newsearch');//ok
    Route::get('/reg', 'PageController@reg')->name('reg');//ok
    Route::get('/contactUs','PageController@contactUs')->name('contactus');
    Route::post('/saveContactUs','PageController@contactUsSave');
    Route::get('/downloads','PageController@getdownloads')->name('downloads');
    Route::view('/tutorial/tutorials1','main.tutorials.tutorials1')->name('tutorial');
    Route::view('/tutorial/tutorials2','main.tutorials.tutorials2');
    Route::view('/tutorial/tutorials3','main.tutorials.tutorials3');
    Route::view('/tutorial/tutorials4','main.tutorials.tutorials4');
    Route::get('/aboutUs','PageController@getaboutUs')->name('aboutUs');
    Route::get('/contacts','PageController@get');
    Route::get('/chat','PageController@chat')->name('chat');
    Route::get('/conversation/{id}','PageController@getMessagesFor');
    Route::get('/conversation/send','PageController@send');
    Route::get('/vediochat','PageController@vediochat')->name('vediochat');
    Route::get('/gassette','PageController@gassette')->name('gassette');
    Route::get('/gassetteView/{id}','PageController@gassetteView')->name('gassetteView');
    
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index')->name('home');

});

Route::group(['namespace' => 'User' ,'middleware' => ['user']], function() {//routes for user middleware

    Route::get('/user', 'UserController@index')->name('user');
    Route::get('/user/paypal', 'UserController@payment')->name('paypal');
    Route::get('/user/vedio', 'UserController@vedioChat')->name('userVedio');
    Route::get('/user/paypal/express-checkout', 'PaypalController@expressCheckout')->name('paypal.express-checkout');
    Route::get('/user/paypal/express-checkout-success', 'PaypalController@expressCheckoutSuccess');
    Route::post('/user/paypal/notify', 'PaypalController@notify');

    Route::post('/cmessage','UserController@adminMessage');
    Route::get('/editClientProfile','UserController@editClientView')->name('editClientProfile');
    Route::post('/ceditSave','UserController@editClientSave');
    Route::get('/lawyerViewUser/{lawyer}','UserController@viewLawyer')->name('lawyerViewUser');
    Route::post('/appointment','UserController@createAppointment');
    //ratings
    Route::get('ratings', 'UserController@rates')->name('ratings');
    Route::post('ratings', 'UserController@rateRatings')->name('ratings.rate');
    Route::post('/pusher/auth','UserController@authenticate');
    Route::post('/notifications','UserController@notifications');

});

Route::group(['namespace' => 'Admin' ,'middleware' => ['admin']], function() {//routes for admin middleware

    Route::get('/admin','PageController@index')->name('admin');
    Route::resource('admin/news','NewsController');
    Route::resource('admin/tag','TagController');
    Route::resource('admin/category','CategoryController');
    Route::resource('admin/laws','LawController');
    Route::resource('admin/lawtag','LawtagController');
    Route::resource('admin/lawcategory','LawcategoryController');
    Route::resource('admin/user','UserController');
    Route::resource('admin/lawyer','LawyController');
    Route::resource('admin/unregister','UnregisterController');
    Route::resource('admin/editor','EditorController');
    Route::resource('admin/lawyerMessages','Message\LawyerMessagesController');
    Route::resource('admin/userMessages','Message\UserMessagesController');
    Route::resource('admin/clientMessages','Message\ClientMessagesController');
    Route::resource('admin/gassettes','GassetteController');
    Route::resource('admin/rejected','RejectController');

});

Route::group(['namespace' => 'Lawyer' ,'middleware' => ['lawyer']], function() {//routes for lawyer middleware

    Route::get('/lawyer','LawyerController@index')->name('lawyer');
    Route::get('/lawyer/vedio', 'LawyerController@vedioChat')->name('lawyerVedio');
    Route::post('/storeImage','LawyerController@store');
    Route::get('/editProfile','LawyerController@editLawyerView')->name('editLawyerProfile');
    Route::post('/editSave','LawyerController@editLawyerSave');
    Route::post('/message','LawyerController@adminMessage');
    Route::get('/userViewLawyer/{client}','LawyerController@viewUser')->name('userViewLawyer');
    Route::post('/notification','LawyerController@notifications');

});



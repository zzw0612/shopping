<?php

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
//前台首页

Route::get('/', function () {
    return redirect('/index/index');
});

Route::get('/home', 'HomeController@index')->name('home');
// 登录相关路由
Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    // 注册相关路由
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('/toregister', 'RegisterController@register');
});
Route::group(['namespace' => 'Auth', 'middleware' => 'userlogin'], function () {
    Route::get('logout', 'LoginController@logout')->name('logout');
    // 修改密码相关路由
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');
});
//商城首页,'middleware'=>'userlogin'
Route::group(['prefix'=>'index','namespace'=>'index'],function () {
    //个人中心主页
    Route::get('/index','IndexController@index')->name('index.index');
    //商品分类下的商品列表
    Route::get('/category/{id}','IndexController@category');
    //商品内容
    Route::get('/introduction/{id}','IndexController@introduction');
    //获取每类的前10个商品
    Route::post('/productsbycateid','IndexController@productsByCateid');
    
});

//用户个人中心
Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => 'userlogin'], function () {
    //个人中心主页
    Route::get('/index','HomeController@index')->name('index');
    //安全设置
    Route::get('safety', 'UserController@safety')->name('safety');
     // 修改密码相关路由
     Route::get('password', 'UserController@password')->name('password');
     Route::post('updatepassword', 'UserController@updatepassword');   
     //购物车
     Route::get('cart', 'CartController@cart')->name('cart');
     Route::get('delcart/{id}', 'CartController@delcart');
     //订单
     Route::get('order', 'OrderController@order')->name('order');//未付款 payment_flag=0，status=0
     Route::get('/order1/{state?}', 'OrderController@order1'); //已付款，未处理payment_flag=1，status=1
    //已付款，配送中status=2
    //已付款，配送完成status=3
    //已付款，取消的订单status=4
    Route::get('/order4', 'OrderController@order4'); 

     Route::get('/orderdel/{ordernum}', 'OrderController@orderdel')->name('orderdel');
     
    //收货地址
    Route::get('/contect', 'ContectController@contect')->name('contect');
    Route::post('/contect', 'ContectController@address')->name('contect');
    Route::get('/del/{id}', 'ContectController@del')->name('del');
    //个人中心主页
    Route::get('/index', 'HomeController@index');
   
});
Route::group(['prefix' => 'user', 'namespace' => 'User'], function () {
    //购物车添加商品 ajax
    Route::post('/addcart', 'CartController@addcart');
});
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', 'LoginController@login'); //后台登录页面
    Route::get('/logout', 'LoginController@logout'); //后台退出登录方法路由
    Route::post('/logincheck', 'LoginController@logincheck')->name('admin.login.logincheck'); //后台验证登录方法

});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'adminlogin'], function () {
    Route::get('/product/{cateid?}', 'ProductController@product'); //商品页   
    Route::get('/product_add/{cateid?}', 'ProductController@product_add'); //商品添加页
    Route::post('/product_save', 'ProductController@product_save'); //商品添加
    Route::get('/product_edit/{id}', 'ProductController@product_edit'); //商品编辑页
    Route::post('/product_update/{id}', 'ProductController@product_update'); //商品更新
    Route::get('/product_del/{id}', 'ProductController@product_del'); //商品删除

    Route::get('/category', 'ProductController@product_category'); //商品分类页
    // Route::get('/product_category_add', 'ProductController@product_category_add'); //商品分类添加页
    Route::get('/product_category_add', function () {
        return view('admin/Product/category/add')->with('active',5);
    });

    Route::post('/product_category_save', 'ProductController@product_category_save'); //商品分类添加
    Route::get('/product_category_del/{id}', 'ProductController@product_category_del'); //商品分类删除
    Route::get('/product_category_edit/{id}', 'ProductController@product_category_edit'); //商品分类编辑页
    Route::post('/product_category_update/{id}', 'ProductController@product_category_update'); //商品分类更新

    Route::get('/product_image/{prid?}', 'ProductController@product_image'); //商品照片页
    Route::get('/product_image_add/{prid?}', 'ProductController@product_image_add'); //商品照片添加页
    Route::post('/product_image_save', 'ProductController@product_image_save'); //商品照片添加
    Route::get('/product_image_edit/{id}', 'ProductController@product_image_edit'); //商品照片编辑页
    Route::post('/product_image_update/{id}', 'ProductController@product_image_update'); //商品照片更新
    Route::get('/product_image_del/{id}', 'ProductController@product_image_del'); //商品照片删除

    Route::get('/upload',  'ProductController@index');
    Route::post('/upload', 'ProductController@uploadFile');


    Route::get('/index', 'ArticleController@index')->name('admin.index.index'); //后台首页




    Route::get('/article/{cateid?}', 'ArticleController@article')->name('admin.index.article'); // 后台文章列表
    Route::get('/article_cate', 'ArticleController@article_cate')->name('admin.index.article_cate'); //后台文章分类列表
    Route::get('/article_cate_add', 'ArticleController@article_cate_add')->name('admin.index.article_cate_add'); //后台文章分类添加页面
    Route::get('/article_add', 'ArticleController@article_add')->name('admin.index.article_add'); //后台文章添加页面

    Route::post('/article_save', 'ArticleController@article_save')->name('admin.index.article_save'); //后台文章添加方法

    Route::post('/article_cate_add_save', 'ArticleController@article_cate_save')->name('admin.index.category_save'); //后台文章分类添加页面

    Route::get('/article_edit', 'ArticleController@article_edit')->name('admin.index.article_edit'); //后台文章编辑页面
    Route::post('/article_edit_save', 'ArticleController@article_edit_save')->name('admin.index.article_edit_save'); //后台文章编辑保存
    Route::get('/article_del/{id}', 'ArticleController@article_del'); //后台文章删除方法
    Route::get('/article_cate_del/{id}', 'ArticleController@article_cate_del'); //后台文章分类删除

    Route::get('/option', 'OptionController@index'); //商品规格页 
    Route::get('/option_add', function () {
        return view('admin/option/option_add')->with('active',1);
    });//商品规格分类添加
    Route::post('/option_save', 'OptionController@option_save');//商品规格分类添加
    Route::get('/option_edit/{id}', 'OptionController@option_edit'); //商品规格分类编辑
    Route::post('/option_update/{id}', 'OptionController@option_update'); //商品规格分类更新
    Route::get('/option_del/{id}', 'OptionController@option_del'); //商品规格分类删除

    Route::get('/option_value/{cateid?}', 'OptionController@option_value'); //商品规格value页 
    Route::get('/option_value_add/{id?}','OptionController@option_value_add');//商品规格value添加
    Route::post('/option_value_save', 'OptionController@option_value_save');//商品规格value添加
    Route::get('/option_value_del/{id}', 'OptionController@option_value_del'); //商品规格value删除

    Route::get('/product_option_info/{id?}', 'OptionController@product_option_info'); //商品规格描述
    Route::get('/product_option_info_add/{id?}','OptionController@product_option_info_add');//商品规格描述添加
    Route::post('/product_option_info_save', 'OptionController@product_option_info_save');//商品规格描述添加
    Route::get('/product_option_info_del/{id}', 'OptionController@product_option_info_del'); //商品规格描述删除
    
    Route::get('/sku/{id?}', 'OptionController@sku'); //商品库存描述 id为商品id
    Route::get('/sku_add/{id?}','OptionController@sku_add');//商品库存添加  id为商品id
    Route::post('/sku_save', 'OptionController@sku_save');//商品库存添加
    Route::get('/sku_del/{id}', 'OptionController@sku_del'); //商品库存删除
 
    Route::get('/user', 'OptionController@user'); //用户列表管理
    Route::get('/admin', 'OptionController@admin'); //管理员列表管理
    Route::post('/enabled/{id}/{enabled}','OptionController@enabled'); //用户状态管理
    Route::get('/order', 'OrderController@index'); //未付款订单管理 payment_flag=0
    Route::get('/order1', 'OrderController@index1'); //已付款，未处理payment_flag=1，status=1
    Route::get('/order2', 'OrderController@index2'); //已付款，配送中status=2
    Route::get('/order3', 'OrderController@index3'); //已付款，配送完成status=3
    Route::get('/order4', 'OrderController@index4'); //已付款，取消的订单status=4
    Route::get('/order_item/{id?}', 'OrderController@order_item'); //订单明细管理
    Route::get('/logistics/{id?}', 'OrderController@logistics'); //物流配送管理
    Route::post('/logistics_state/{order_num}/{state}','OrderController@logistics_state'); //订单状态管理
    Route::get('/logistics_add/{order_num}/{contact_name}/{contact_mobile}/{contact_address}', 'OrderController@logistics_add'); //物流配送添加
    Route::post('/logistics_save', 'OrderController@logistics_save'); //物流配送添加保存
   

});


//动态
Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => 'userlogin'], function () {

Route::get('/note_add/{id?}','NoteController@note_add')->name('note_add');//发表动态页面
Route::post('/note_save','NoteController@note_save')->name('note_save');//发表动态方法
Route::get('/user_note','NoteController@user_note')->name('user_note');//个人动态

Route::get('/note_del/{id}','NoteController@note_del')->name('note_del');//删除动态
Route::get('/ewallet','EwalletController@ewallet')->name('ewallet');//电子钱包
Route::get('/ewallet/ewallet_add/{num?}','EwalletController@ewallet_add')->name('ewallet_add');//充值功能
});

Route::group(['prefix' => 'index', 'namespace' => 'User'], function () {
    Route::get('/note/{data_dict_id?}','NoteController@note');//动态显示方法
    Route::get('/note_detail/{data_dict_id}','NoteController@note_detail');//动态详情显示
    Route::get('/dict_topic','NoteController@dict_topic')->name('dict_topic');//话题页（未定）
    Route::get('/dict_laber','NoteController@dict_laber')->name('dict_laber');//标签页（未定）
    Route::post('/click_add/{id}','NoteController@click_add')->name('click_add');//点赞添加方法
    Route::post('/common_add/{id}','NoteController@common_add')->name('common_add');//评论添加方法
});
<?php

Route::get('/cache_clear', function () {
    Artisan::call('cache:clear');
});

Route::get('/view_clear', function () {
    Artisan::call('view:clear');
});
Route::get('/config_clear', function () {
    Artisan::call('config:cache');
});
Route::get('/route_clear', function () {
    Artisan::call('route:clear');
});

Route::get('/cron', 'PaymentController@cron');
// FOR REGISTERING THE USER WITH REFFERING LINK
Route::get('/user/affiliate/{id}', 'FontendController@affiliate_register')->name('affiliate_register');
Route::get('/', 'FontendController@fontIndex')->name('index.home');
Route::get('/contact', 'FontendController@contactIndex')->name('contact.index');
Route::get('/terms', 'FontendController@termsIndex')->name('terms.index');
Route::get('/policy', 'FontendController@policyIndex')->name('policy.index');
Route::get('/menu/{id}/{any}', 'FontendController@menuIndex')->name('menu.index.pranto');
Route::get('/admin', 'AdminAuth\LoginController@showLoginForm');
Route::post('/message', 'FontendController@sendMessage')->name('contact.us.message');
Route::post('/get/ref/id', 'FontendController@getRefId')->name('get.ref.id');
Route::post('/get/position', 'FontendController@getPosition')->name('get.user.position');
Route::post('/forgot/password', 'FontendController@forgotPass')->name('forget.password.user');
Route::get('/reset/{token}', 'FontendController@resetLink')->name('reset.passlink');
Route::post('/reset/password', 'FontendController@passwordReset')->name('reset.passw');
Route::get('pagenotfound', 'FontendController@pageNotFound')->name('pagenot.found');

Route::get('/news/{id}/{title}', 'FontendController@newsShow')->name('news.show.pranto');
Route::get('/news', 'FontendController@newsIndex')->name('news.blog');
Route::post('/subscribe', 'FontendController@storeSubscriber')->name('store.new.letter');

//Authorization
Route::get('/authorization', 'FontendController@authorization')->name('authorization');
Route::post('/sendemailver', 'FontendController@sendemailver')->name('sendemailver');
Route::post('/emailverify', 'FontendController@emailverify')->name('emailverify');
Route::post('/sendsmsver', 'FontendController@sendsmsver')->name('sendsmsver');
Route::post('/smsverify', 'FontendController@smsverify')->name('smsverify');
Route::post('/g2fa-verify', 'FontendController@verify2fa')->name('go2fa.verify');

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'AdminAuth\LoginController@login');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

    Route::middleware(['admin', 'auth'])->group(function () {

        Route::post('/user/status', 'AdminController@user_status')->name('user_status');
        Route::post('/user/email/status', 'AdminController@user_email_status')->name('user_email_status');
        Route::get('buy/package/history', 'AdminController@buyPackageHistory')->name('buy.package.user')->middleware('admin');
        Route::put('limitation/update/{id}', 'GeneralController@limitUpdate')->name('manage.limit')->middleware('admin');
        Route::get('ptc/limitation', 'AdminController@limitIndex')->name('ptc.limit')->middleware('admin');

        Route::get('request/advertise', 'AdminController@reqAddIndex')->name('req.add.index')->middleware('admin');
        Route::post('approve/advertise', 'AdminController@approveAdd')->name('aprove.ad')->middleware('admin');
        Route::post('reject/advertise', 'AdminController@rejectAdd')->name('reject.ad')->middleware('admin');
        Route::get('reject/advertise', 'AdminController@rejectAddIndex')->name('reject.add.index')->middleware('admin');
        Route::get('advertises', 'AdminController@allAddIndex')->name('all.add.index')->middleware('admin');

        Route::get('ptc/packages', 'AdminController@packageIndex')->name('package.index')->middleware('admin');
        Route::post('ptc/packages/create', 'AdminController@packageStore')->name('create.package')->middleware('admin');
        Route::post('ptc/packages/delete/{id}', 'AdminController@packageDelete')->name('package.delete')->middleware('admin');
        Route::get('ptc/packages/edit/{id}', 'AdminController@packageEdit')->name('package.edit')->middleware('admin');
        Route::put('ptc/packages/update/{id}', 'AdminController@packageUpdate')->name('package.update')->middleware('admin');
        Route::get('ptc/refresh', 'AdminController@refresh_adds')->name('refresh_adds');
        Route::get('detail', 'AdminController@packageDetailDelete')->name('detail.delete')->middleware('admin');

        Route::get('add/new', 'AdminController@newAddvertise')->name('add.addvertise')->middleware('admin');
        Route::post('add/new', 'AdminController@newAddvertiseStore')->name('create.addvertise')->middleware('admin');
        Route::get('add/view/{id}', 'AdminController@newAddvertiseEdit')->name('add.view.admin')->middleware('admin');
        Route::put('add/update/{id}', 'AdminController@newAddvertiseUpdate')->name('update.addvertise')->middleware('admin');
        Route::post('add/delete/{id}', 'AdminController@newAddvertiseDelete')->name('add.delete')->middleware('admin');

        Route::get('background/images', 'GeneralController@backgroundImage')->name('background.image.index')->middleware('admin');
        Route::put('background/images/update', 'GeneralController@backgroundImageUpdate')->name('image.background.update')->middleware('admin');

        Route::get('referral/view', 'AdminController@refView')->name('ref.amount.total')->middleware('admin');
        Route::get('subtract/admin', 'AdminController@subtractAdmin')->name('admin.subtract.view')->middleware('admin');
        Route::get('generate/admin', 'AdminController@generateAdmin')->name('admin.generate.view')->middleware('admin');
        Route::get('send/money/{id}', 'AdminController@sendMoneyView')->name('user.total.send.money')->middleware('admin');
        Route::get('withdraw/view/{id}', 'AdminController@withDrawView')->name('user.total.withdraw')->middleware('admin');
        Route::get('add/fund/view/{id}', 'AdminController@depositView')->name('user.total.deposit')->middleware('admin');
        Route::get('transaction/view/{id}', 'AdminController@transView')->name('user.total.trans')->middleware('admin');
        Route::get('transfer/balance', 'AdminController@transBalanceLog')->name('index.transfer.user')->middleware('admin');
        Route::get('add/fund/user', 'AdminController@depositLog')->name('index.deposit.user')->middleware('admin');
        Route::get('deactive/user', 'AdminController@deactiveUser')->name('index.deactive.user')->middleware('admin');
        Route::get('paid/user', 'AdminController@paidUser')->name('paid.user.index')->middleware('admin');
        Route::get('free/user', 'AdminController@freeUser')->name('free.user.index')->middleware('admin');

        Route::GET('user/search', 'AdminController@userSearch')->name('username.search')->middleware('admin');
        Route::GET('user/search/email', 'AdminController@userSearchEmail')->name('email.search')->middleware('admin');

        Route::post('generate/matching', 'AdminController@matchGenerate')->name('generate.match')->middleware('admin');
        Route::get('match', 'AdminController@matchIndex')->name('match.index')->middleware('admin');

        Route::post('/users/amount/{id}', 'AdminController@indexBalanceUpdate')->name('user.balance.update')->middleware('admin');
        Route::get('/users/send/mail/{id}', 'AdminController@userSendMail')->name('user.mail.send')->middleware('admin');
        Route::post('/send/mail/{id}', 'AdminController@userSendMailUser')->name('send.mail.user')->middleware('admin');
        Route::get('/users/balance/{id}', 'AdminController@indexUserBalance')->name('add.subs.index')->middleware('admin');
        Route::get('/users/detail/{id}', 'AdminController@indexUserDetail')->name('user.view')->middleware('admin');
        Route::put('/users/update/{id}', 'AdminController@userUpdate')->name('user.detail.update')->middleware('admin');

        Route::get('/tree/image', 'GeneralController@indexTreeImage')->name('user.tree.image')->middleware('admin');
        Route::put('/tree/image/update', 'GeneralController@updateTreeImage')->name('tree.image.update')->middleware('admin');

        Route::get('/template', 'AdminController@indexEmail')->name('email.index.admin')->middleware('admin');
        Route::post('/template-update', 'AdminController@updateEmail')->name('template.update')->middleware('admin');

        //Sms Api
        Route::get('/sms-api', 'AdminController@smsApi')->name('sms.index.admin')->middleware('admin');
        Route::post('/sms-update', 'AdminController@smsUpdate')->name('sms.update')->middleware('admin');

        Route::get('/withdraw/method', 'AdminController@indexWithdraw')->name('add.withdraw.method')->middleware('admin');
        Route::post('/withdraw/store', 'AdminController@storeWithdraw')->name('store.withdraw.method')->middleware('admin');
        Route::put('/withdraw/update/{id}', 'AdminController@updateWithdraw')->name('update.method')->middleware('admin');

        Route::get('/withdraw/requests', 'AdminController@requestWithdraw')->name('withdraw.request.index')->middleware('admin');
        Route::get('/withdraw/details/{id}', 'AdminController@detailWithdraw')->name('withdraw.detail.user')->middleware('admin');
        Route::post('/withdraw/update/{id}', 'AdminController@repondWithdraw')->name('withdraw.process')->middleware('admin');

        Route::get('/withdraw/log', 'AdminController@showWithdrawLog')->name('withdraw.viewlog.admin')->middleware('admin');

        Route::get('/supports', 'TicketController@indexSupport')->name('support.admin.index')->middleware('admin');
        Route::get('/support/reply/{ticket}', 'TicketController@adminSupport')->name('ticket.admin.reply')->middleware('admin');
        Route::post('/reply/{ticket}', 'TicketController@adminReply')->name('store.admin.reply')->middleware('admin');

        Route::get('users', 'AdminController@usersIndex')->name('user.manage')->middleware('admin');

        Route::get('footer', 'FooterController@footerIndex')->name('footer.content')->middleware('admin');
        Route::put('footer_update/{id}', 'FooterController@footerUpdate')->name('footer.update')->middleware('admin');

        Route::get('/footer', "GeneralController@indexFooter")->name('footer.index.admin')->middleware('admin');
        Route::put('/footer/update', "GeneralController@updateFooter")->name('footer.update')->middleware('admin');

        Route::get('/social/index', "GeneralController@indexSocial")->name('social.admin.index')->middleware('admin');
        Route::post('/social/store', "GeneralController@storeSocial")->name('store.social')->middleware('admin');
        Route::post('/social/delete/{id}', "GeneralController@deleteSocialSocial")->name('social.delete')->middleware('admin');
        Route::put('/social/update/{id}', "GeneralController@updateSocial")->name('update.social')->middleware('admin');

        Route::get('/contact', "GeneralController@indexContact")->name('contact.admin.index')->middleware('admin');
        Route::put('/contact/update', "GeneralController@updateContact")->name('contact.admin.update')->middleware('admin');

        Route::get('/about', "GeneralController@indexAbout")->name('about.admin.index')->middleware('admin');
        Route::put('/about/update/{id}', "GeneralController@updateAbout")->name('about.admin.update')->middleware('admin');

        Route::get('/general', "GeneralController@index")->name('general.index')->middleware('admin');
        Route::put('/general-update/{id}', "GeneralController@update")->name('general.update')->middleware('admin');

        Route::get('/terms', "GeneralController@indexTerms")->name('terms.polices')->middleware('admin');
        Route::put('/terms/update/{id}', "GeneralController@updateTerms")->name('terms.update')->middleware('admin');

        Route::get('/charge/commission', "GeneralController@indexCommision")->name('charge.commission')->middleware('admin');
        Route::put('/charge/commission/{id}', "GeneralController@UpdateCommision")->name('commission.update')->middleware('admin');

        Route::get('blog', 'MenuController@menuIndex')->name('menu.index')->middleware('admin');
        Route::get('blog/create', 'MenuController@menuCreate')->name('menu.create.admin')->middleware('admin');
        Route::post('menu_store', 'MenuController@menuStore')->name('menu.post.admin')->middleware('admin');
        Route::post('menu_delete/{id}', 'MenuController@menuDelete')->name('menu.delete')->middleware('admin');
        Route::get('blog/edit/{id}', 'MenuController@menuEdit')->name('edit.menu.admin')->middleware('admin');
        Route::put('menu_update/{id}', 'MenuController@menuUpdate')->name('menu.update.admin')->middleware('admin');

        Route::get('logo/icon', 'LogoController@logoIndex')->name('logo.icon')->middleware('admin');
        Route::put('logo_update', 'LogoController@updateLogo')->name('logo.update')->middleware('admin');
        Route::put('icon_update', 'LogoController@updateIcon')->name('icon.update')->middleware('admin');

        Route::get('slider', 'SilderController@slideIndex')->name('slide.settings')->middleware('admin');
        Route::post('slider/store', 'SilderController@slideStore')->name('slider.store.pranto')->middleware('admin');
        Route::put('slider/update/{id}', 'SilderController@slideUpdate')->name('slider.update.pranto')->middleware('admin');

        Route::get('service', 'ServiceController@serviceIndex')->name('service.index')->middleware('admin');
        Route::get('service_create', 'ServiceController@serviceCreate')->name('service.create')->middleware('admin');
        Route::post('service/store', 'ServiceController@serviceStore')->name('store.service')->middleware('admin');
        Route::put('service_update/{id}', 'ServiceController@serviceUpdate')->name('service.update')->middleware('admin');
        Route::post('service/delete/{id}', 'ServiceController@serviceDelete')->name('service.delete')->middleware('admin');
        Route::get('service/edit/{id}', 'ServiceController@serviceEdit')->name('service.edit')->middleware('admin');

        Route::get('testimonial', 'TestimonalController@testIndex')->name('testimonial.index')->middleware('admin');
        Route::post('testimonial_store', 'TestimonalController@testStore')->name('testimonial.store'); //->middleware('admin');
        Route::post('testimonial_delete/{id}', 'TestimonalController@testDelete')->name('testimonial.delete')->middleware('admin');
        Route::get('testimonial_edit/{id}', 'TestimonalController@testEdit')->name('test.edit')->middleware('admin');
        Route::put('testimonial_update/{id}', 'TestimonalController@testUpdate')->name('test.update');

        Route::get('team', 'TeamController@teamIndex')->name('team.index')->middleware('admin');
        Route::post('team/store', 'TeamController@teamStore')->name('team.store')->middleware('admin');
        Route::post('team/delete/{id}', 'TeamController@teamDelete')->name('team.delete.delete')->middleware('admin');
        Route::put('team/update/{id}', 'TeamController@teamUpdateUpdate')->name('team.update.update')->middleware('admin');

        Route::post('change-password', 'AdminController@saveResetPassword')->name('change.password');

        Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
        Route::post('/register', 'AdminAuth\RegisterController@register');

        //Gateway
        Route::resource('gateway', 'GatewayController', ['except' => [
            'create', 'show', 'edit',
        ]])->middleware('admin');

        Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
        Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
        Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
    });
});

Auth::routes();

Route::group(['middleware' => 'web'], function () {

    Route::get('create/advertise', 'HomeController@indexAdvertise')->name('my.advertise');
    Route::post('buy/pack', 'HomeController@buyPack')->name('package.buy');
    Route::post('create/add', 'HomeController@createAdvertise')->name('create.user.add');
    Route::get('my/advertises', 'HomeController@myAdvertise')->name('manage.advertise');

    Route::post('/get/advertise', 'HomeController@getAdvertise')->name('get.advertise.id');

    Route::get('/advertises', 'HomeController@addIndex')->name('ptc.add.index');
    // FOR REFFERAL LINK
    Route::get('/affiliate', 'HomeController@affiliate')->name('affiliate');
    Route::get('clicked/advertise/{id}', 'HomeController@getIframe')->name('iframe.open');

    Route::get('/update/premium', 'HomeController@updatePremium')->name('update.to.pro');

    Route::get('/tree/search', 'HomeController@searchTreeIndex')->name('tree.username.search');
    Route::get('/tree/{username}', 'HomeController@searchTreeIndex')->name('tree.username.search2');

    Route::get('/security/two/step', 'HomeController@twoFactorIndex')->name('two.factor.index');
    Route::post('/g2fa-create', 'HomeController@create2fa')->name('go2fa.create');
    Route::post('/g2fa-disable', 'HomeController@disable2fa')->name('disable.2fa');

    Route::put('/update/profile', 'HomeController@updateProfile')->name('update.profile');
    Route::get('/security', 'HomeController@securityIndex')->name('security.index');
    Route::post('/update/password', 'HomeController@changePassword')->name('change.password.user');

    Route::post('/get/user', 'HomeController@confirmUserAjax')->name('get.user');
    Route::post('/transfer/fund', 'HomeController@transferFund')->name('store.transfer.fund');
    Route::post('/get/charge', 'HomeController@getChargeAjax')->name('get.total.charge');
    Route::post('/change/pin', 'HomeController@pinChange')->name('change.pin');
    Route::post('/reset/pin', 'HomeController@resetPin')->name('reset.pin');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/binary/summery', 'HomeController@binarySummeryindex')->name('binary.summery.index');
    Route::get('/tree', 'HomeController@treeIndex')->name('tree.index');
    Route::get('/referral', 'HomeController@referralIndex')->name('referral.index');
    Route::get('/referral/commission', 'HomeController@referraCommsisionlIndex')->name('ref.commision.index');
    Route::get('/binary/commission', 'HomeController@binaryCommsisionlIndex')->name('bin.commision.index');
    Route::get('/fund', 'HomeController@fundIndex')->name('add.fund.index');
    Route::get('/withdraw', 'HomeController@withdrawIndex')->name('request.users_management.index');

    Route::post('/withdraw/preview', 'HomeController@withdrawPreview')->name('withdraw.preview.user');

    Route::get('/transfer/fund', 'HomeController@transferFundIndex')->name('fund.transfer.index');
    Route::get('/transaction/pin', 'HomeController@transacPinIndex')->name('transaction.pin.index');
    Route::get('/transaction', 'HomeController@transacHistory')->name('transaction.history');
    Route::get('/profile', 'HomeController@profileIndex')->name('profile.index');
    Route::get('/support', 'TicketController@ticketIndex')->name('support.index.customer');
    Route::get('/support/new', 'TicketController@ticketCreate')->name('add.new.ticket');

    Route::post('/deposit/store', 'HomeController@storeDeposit')->name('buy.preview');
    Route::get('/add/confirm', 'PaymentController@buyConfirm')->name('buy.confirm');
    Route::post('/confirm/withdraw', 'HomeController@storeWithdraw')->name('confirm.withdraw.store');

    Route::post('/store/ticket', 'TicketController@ticketStore')->name('ticket.store');
    Route::get('/comment/close/{ticket}', 'TicketController@ticketClose')->name('ticket.close');
    Route::get('/support/reply/{ticket}', 'TicketController@ticketReply')->name('ticket.customer.reply');
    Route::post('/support/store/{ticket}', 'TicketController@ticketReplyStore')->name('store.customer.reply');

    //Payment IPN
    Route::post('/ipnpaypal', 'PaymentController@ipnpaypal')->name('ipn.paypal');
    Route::post('/ipnperfect', 'PaymentController@ipnperfect')->name('ipn.perfect');
    Route::get('/ipnbtc', 'PaymentController@ipnbtc')->name('ipn.btc');
    Route::post('/ipnstripe', 'PaymentController@ipnstripe')->name('ipn.stripe');
    Route::post('/ipncoin', 'PaymentController@ipncoin')->name('ipn.coinPay');
    Route::post('/ipncoin-gate', 'PaymentController@coinGateIPN')->name('ipn.coinGate');
    Route::get('/coin-gate', 'PaymentController@coingatePayment')->name('coinGate');
    Route::post('/ipnskrill', 'PaymentController@skrillIPN')->name('ipn.skrill');
    Route::get('/ipnblock', 'PaymentController@blockIpn')->name('ipn.block');
});
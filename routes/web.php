<?php


// phpinfo();die;


use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutMenuController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\MemberCategoryController;
use App\Http\Controllers\TrainingSummaryController;
use App\Http\Controllers\WebGalleryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\LanguageSkillController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialmediaController;
use App\Http\Controllers\JournalAndPublicationController;
use App\Http\Controllers\AcademicSummarieController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\IncentiveController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\EmploymentHistoryController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\webVideoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CellMenuController;
use App\Http\Controllers\ChampaignController;
use App\Http\Controllers\CommitteeMenuController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\DivisionsController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\IntroductionController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OdmsController;
use App\Http\Controllers\PhysicalgiftController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ServeController;
use App\Http\Controllers\SupportController;
use SebastianBergmann\Environment\Runtime;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PasswordController;
use FontLib\Table\Type\name;



Route::get('/report', function () {
    return view('frontend.pages.report');
})->name('report');


Route::get('/whatwedo', function () {
    return view('frontend.pages.whatwedo');
})->name('whatwedo');



Route::get('/support', [SupportController::class, 'create'])->name('support.showForm');
Route::post('/support', [SupportController::class, 'store'])->name('support.store');
Route::resource('account', AccountsController::class);
Route::controller(AccountsController::class)->group(function () {
    Route::get('/account/edit/{id}', 'edit')->name('account.edit');
    Route::get('/account/destroy/{id}', 'destroy')->name('account.destroy');
});

Route::get('/physicalgifts/index', [PhysicalGiftController::class, 'index'])->name('physicalgifts.index');

Route::get('/physicalgifts/create', [PhysicalGiftController::class, 'create'])->name('physicalgifts.create');

Route::post('physicalgifts/store', [PhysicalGiftController::class, 'store'])->name('physicalgifts.store');

Route::get('physicalgifts/{id}', [PhysicalgiftController::class, 'show'])->name('physicalgifts.show');

Route::get('physicalgifts/{id}/edit', [PhysicalGiftController::class, 'edit'])->name('physicalgifts.edit');

Route::put('/physicalgifts/{id}', [PhysicalGiftController::class, 'update'])->name('physicalgifts.update');

Route::delete('physicalgifts/{id}', [PhysicalGiftController::class, 'destroy'])->name('physicalgifts.destroy');
Auth::routes();

Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);

Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::get('/terms', function () {
    return view('frontend.pages.terms');
});
Route::get('/privacy', function () {
    return view('frontend.pages.privacy');
});
Route::get('/return', function () {
    return view('frontend.pages.return');
});
Route::get('/donate/list', function () {
    return view('admin.pages.gift.donationlist');
});
Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('pay');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax'])->name('pay-via-ajax');

Route::post('/donate', [SslCommerzPaymentController::class, 'store'])->name('donation-store');

Route::get('/create/donation', [SslCommerzPaymentController::class, 'create'])->name('create.donation');

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/user-list', [AdminController::class, 'userlist'])->name('user-list');
    Route::get('/member-list', [AdminController::class, 'memeberslist'])->name('member-list');
    Route::get('/All-payment-list', [AdminController::class, 'all_list_payment'])->name('all-payment-list');
    Route::get('/approvePayment/{media}', [AdminController::class, 'approvePayment'])->name('approvePayment');
    Route::get('/rejectPayment/{media}', [AdminController::class, 'rejectPayment'])->name('rejectPayment');
    Route::get('/rejectPayment/{media}', [AdminController::class, 'rejectPayment'])->name('rejectPayment');
    Route::get('/paylistdestroy/{id}', [AdminController::class, 'destroy']);
    Route::get('/Rules', [RulesController::class, 'rules'])->name('rules');
    Route::get('/Addrules', [RulesController::class, 'addrules'])->name('addrules');
    Route::post('/storeRulses', [RulesController::class, 'storeRulses'])->name('storeRulses');

    Route::get('/view_payment_det/{id}', [PaymentController::class, 'viewpayment']);
    Route::get('/payment/status/update/{payment}', [PaymentController::class, 'status'])->name('payment.status.update');

    Route::get('/sliders', [SliderController::class, 'sliders'])->name('sliders');
    Route::get('/addslider', [SliderController::class, 'addslider'])->name('addslider');
    Route::post('/storesliders', [SliderController::class, 'storesliders'])->name('storesliders');
    Route::post('/sliderStatusChange', [SliderController::class, 'sliderStatusChange'])->name('sliderStatusChange');
    Route::get('deleteslider/{id}', [SliderController::class, 'destroy']);

    // Route to display the form to support us


    Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');

    Route::get('/supports/{support}', [SupportController::class, 'show'])->name('supports.show');

    Route::get('/supports/{support}/edit', [SupportController::class, 'edit'])->name('supports.edit');

    Route::put('/supports/{support}', [SupportController::class, 'update'])->name('supports.update');

    Route::delete('/supports/{support}', [SupportController::class, 'destroy'])->name('supports.destroy');




    Route::resource('event_support', ExpenseController::class);

    Route::get('expense/category', [ExpenseController::class, 'create2'])->name('expense.category');

    Route::get('category/list', [ExpenseController::class, 'index2'])->name('expense.category.list');

    Route::get('expense/category/{id}\edit', [ExpenseController::class, 'edit2'])->name('expense.category.edit');

    Route::post('expense/category/store', [ExpenseController::class, 'store2'])->name('expense.category.store');

    Route::put('expense/category/update/{id}', [ExpenseController::class, 'update2'])->name('expense.category.update');

    Route::get('expense/category/destroy/{id}', [ExpenseController::class, 'destroy2'])->name('expense.category.destroy');

    Route::get('/fetch-events', [ExpenseController::class, 'fetchEvents'])->name('fetch.events');

    Route::get('/fetch-events2', [ExpenseController::class, 'fetchEvents2'])->name('fetch.events2');

    //  rabbi // withdrow
    // Route::get('Withdraw', [WithdrawController::class, 'index'])->name('Withdrawview');
    // Route::get('Apply-withdraw', [WithdrawController::class, 'create'])->name('applywithdraw');
    // Route::post('store-withdraw', [WithdrawController::class, 'store'])->name('storewithdraw');
    // Route::get('withd_application', [WithdrawController::class, 'application'])->name('withd_application');
    // Route::get('deletewithdraw/{id}', [WithdrawController::class, 'destroy']);
    // Route::get('approvewithraw/{id}', [WithdrawController::class, 'approvewithraw']);
    // Route::get('unapprovewithdro/{id}', [WithdrawController::class, 'unapprovewithdro']);
    // Route::get('destroywithdraw/{id}', [WithdrawController::class, 'destroywithdraw']);
    // Route::post('widthraw_confirmmess', [WithdrawController::class, 'widthraw_confirmmess'])->name('widthraw_confirmmess');

    //  admin job approve
    Route::get('/Job-Circular', [JobController::class, 'Job_Circular']);
    Route::post('/jobcircular', [JobController::class, 'jobcircular']);
    Route::post('/jobpoststatus', [JobController::class, 'jobpoststatus']);

    // job category
    Route::get('/job-category', [JobCategoryController::class, 'index']);
    Route::get('/job-category-create', [JobCategoryController::class, 'create'])->name('job.Category.create');
    Route::post('/job-category-store', [JobCategoryController::class, 'store'])->name('job.Category.store');
    Route::get('/job-category-edit/{id}', [JobCategoryController::class, 'edit'])->name('job.category.edit');
    Route::post('/job-category-update/{id}', [JobCategoryController::class, 'update'])->name('job.Category.update');
    Route::get('/job-category-delete/{id}', [JobCategoryController::class, 'destroy'])->name('job.category.delete');


    //new added by saiful
    Route::get('/division_list', [DivisionsController::class, 'division_list'])->name('division_list');
    Route::post('/division_store', [DivisionsController::class, 'division_store'])->name('division_store');
    Route::post('/division_update', [DivisionsController::class, 'division_update'])->name('division_update');

    Route::get('/district_list', [DivisionsController::class, 'district_list'])->name('district_list');
    Route::post('/district_store', [DivisionsController::class, 'district_store'])->name('district_store');
    Route::post('/district_update', [DivisionsController::class, 'district_update'])->name('district_update');

    Route::get('/upazila_list', [DivisionsController::class, 'upazila_list'])->name('upazila_list');
    Route::post('/upazila_store', [DivisionsController::class, 'upazila_store'])->name('upazila_store');
    Route::post('/upazila_update', [DivisionsController::class, 'upazila_update'])->name('upazila_update');

    Route::any('/details_payment_reprot', [ReportController::class, 'details_payment_reprot'])->name('details_payment_reprot');
});

//new added by saiful
Route::get('/regi-member-list', [FrontEndController::class, 'memberList']);
Route::post('/storeShowMember', [AdminController::class, 'storeShowMember'])->name('storeShowMember');
Route::get('/memberShow', [AdminController::class, 'memberShow'])->name('memberShow');

Route::get('/front-donate', [DonateController::class, 'donate'])->name('donate.index');

Route::post('/donation/confirm', [DonateController::class, 'donationconfrim'])->name('donation.confirm');

Route::post('/donation/store', [DonateController::class, 'donationconfrim'])->name('donation.store');



Route::group(['middleware' => ['auth']], function () {

    //saiful added new

    Route::post('/add-education', [AcademicSummarieController::class, 'add_education'])->name('add_education');
    Route::post('edit_education/{id}', [AcademicSummarieController::class, 'edit_education']);
    Route::get('/view-member/{media}', [AdminController::class, 'view_member'])->name('view-member');

    //  traning rabbi
    Route::post('/add_training', [TrainingSummaryController::class, 'add_training'])->name('add_training');
    Route::post('/edit_training/{id}', [TrainingSummaryController::class, 'edit_training'])->name('edit_training');

    // Add employement rabbi
    Route::post('/add_employement', [EmploymentHistoryController::class, 'add_employement'])->name('add_employement');
    Route::post('/edit_employment/{id}', [EmploymentHistoryController::class, 'edit_employment']);

    // skill rabbi
    Route::post('/add_skill', [SpecializationController::class, 'add_skill'])->name('add_skill');
    Route::post('/edit_skill/{id}', [SpecializationController::class, 'edit_skill']);

    // language_skill
    Route::post('/add_languageskill', [LanguageSkillController::class, 'add_languageskill'])->name('add_languageskill');
    Route::post('/m_language_edit/{id}', [LanguageSkillController::class, 'm_language_edit']);

    // resume rabbi
    Route::get('/viewresume', [ResumeController::class, 'index'])->name('viewresume');

    Route::get('/companyCvView/{id}', [ResumeController::class, 'companycvCheck'])->name('companyCvView');

    // admin user create
    Route::get('usercreate', [AdminController::class, 'usercreate'])->name('usercreate');
    Route::post('storeuser', [AdminController::class, 'storeuser'])->name('storeuser');
    Route::get('/user-access', [AdminController::class, 'useraccess'])->name('user-access');
    //user menus access
    Route::post('/get_menu_list', [AdminController::class, 'get_menu_list'])->name('get_menu_list');
    Route::post('/insert_menu_accessList', [AdminController::class, 'insert_menu_accessList'])->name('insert_menu_accessList');

    Route::get('allmembers', [ReportController::class, 'allmembers'])->name('allmembers');
    // profile
    Route::get('/profile', [RegistrationController::class, 'profile'])->name('profile');
    Route::get('/donorHistory', [RegistrationController::class, 'donorHistory'])->name('donorHistory');
    Route::get('/myCv', [RegistrationController::class, 'myCv'])->name('myCv');
    Route::post('/edit-profile', [RegistrationController::class, 'edit_profile'])->name('edit-profile');
    Route::post('/edit-job', [RegistrationController::class, 'edit_job'])->name('edit-job');
    Route::post('/change_password', [RegistrationController::class, 'change_password'])->name('change_password');
    Route::post('/edit-education', [RegistrationController::class, 'edit_education'])->name('edit-education');
    Route::get('/view-member/{media}', [AdminController::class, 'view_member'])->name('view-member');
    Route::post('/career/objective', [SummaryController::class, 'objectivestore'])->name('Career.Objective.croud');
    Route::post('/career/summary', [SummaryController::class, 'summarystore'])->name('Career.summary.croud');
    Route::post('/career/qualification', [SummaryController::class, 'SpecialQualification'])->name('Career.qualification.croud');
    Route::post('/career/curricular', [SummaryController::class, 'curricularstore'])->name('Career.curricular.croud');


    Route::get('/Member-payment', [PaymentController::class, 'pyament'])->name('memebr-payment');
    Route::get('/List-payment', [PaymentController::class, 'list_payment'])->name('list-payment');
    Route::post('/Payment-store', [PaymentController::class, 'payment_store'])->name('payment-store');
    Route::get('/payment-request', [PaymentController::class, 'paymentRequest'])->name('payment-request');
    //job company
    Route::get('/Company-profile', [JobController::class, 'company_profile'])->name('company_profile');
    Route::get('/edit-comp', [JobController::class, 'edit_comp'])->name('edit-comp');
    Route::post('/editSave', [JobController::class, 'editSave'])->name('editSave');
    Route::get('/jobs', [JobController::class, 'jobs'])->name('jobs');
    Route::get('/add_job', [JobController::class, 'add_job'])->name('add_job');
    Route::post('/saveJob', [JobController::class, 'saveJob'])->name('saveJob');
    Route::get('/job-post-edit/{id}', [JobController::class, 'edit'])->name('job.post.edit');
    Route::post('/job-post-update/{id}', [JobController::class, 'update'])->name('job.post.update');
    Route::get('appliedJobs', [ApplyController::class, 'appliedJobs'])->name('appliedJobs');

    //  rabbi gallery
    Route::get('/Gallery', [WebGalleryController::class, 'gallery'])->name('gallery');
    Route::get('/Gallery-List', [WebGalleryController::class, 'viewall'])->name('list-gallery');
    Route::post('/store', [WebGalleryController::class, 'store'])->name('gallerystore');
    Route::get('/gallerydelete/{media}', [WebGalleryController::class, 'deleteImage']);
    // end gallery
    //rabbi // Work on zone
    Route::get('zone', [ZoneController::class, 'index'])->name('zone');
    Route::get('Zone-add', [ZoneController::class, 'create'])->name('addzone');
    Route::post('store-zone', [ZoneController::class, 'store'])->name('storezone');
    Route::get('deletezone/{id}', [ZoneController::class, 'destroy']);
    Route::get('editzone/{id}', [ZoneController::class, 'edit']);
    Route::post('updatezone/{id}', [ZoneController::class, 'update'])->name('updatezone');
    Route::post('/zoneDistList', [ZoneController::class, 'zoneDistList'])->name('zoneDistList');
    Route::post('/zoneThanaList', [ZoneController::class, 'zoneThanaList'])->name('zoneThanaList');
    //rabbi  // Social Media
    Route::get('Social-media', [SocialmediaController::class, 'index'])->name('social_media');
    Route::post('Social-update', [SocialmediaController::class, 'update'])->name('socialupdate');
    //rabbi// Journal And Publications
    Route::get('Journal-publications', [JournalAndPublicationController::class, 'index'])->name('Journalpublications');
    Route::get('Add-publications', [JournalAndPublicationController::class, 'create'])->name('addpublications');
    Route::post('Store-publications', [JournalAndPublicationController::class, 'store'])->name('storepublications');
    Route::post('updatepublications/{id}', [JournalAndPublicationController::class, 'update']);
    Route::get('editJournal/{id}', [JournalAndPublicationController::class, 'edit']);
    Route::get('deleteJournal/{id}', [JournalAndPublicationController::class, 'destroy']);
    //rabbi //contact
    Route::get('Contactindex', [ContactUsController::class, 'index'])->name('Contactindex');
    Route::post('updatecontact/{id}', [ContactUsController::class, 'update']);
    //rabbi// category
    Route::get('category', [CategoryController::class, 'index'])->name('category-index');
    Route::post('Add-category', [CategoryController::class, 'store'])->name('addcategory');
    Route::get('deletecategory/{id}', [CategoryController::class, 'destroy']);
    Route::put('updatecategory/{id}', [CategoryController::class, 'update']);


    //rabbi // about menu
    Route::get('All-Content', [AboutMenuController::class, 'index'])->name('aboutindex');
    Route::get('Add-Content', [AboutMenuController::class, 'create'])->name('addaboutcontent');
    Route::post('store-Content', [AboutMenuController::class, 'store'])->name('abouteaddcontent');
    Route::post('updateaboute/{id}', [AboutMenuController::class, 'update']);
    Route::get('aboute_viewdelete/{id}', [AboutMenuController::class, 'destroy']);
    Route::get('aboute_viewedit/{id}', [AboutMenuController::class, 'edit']);

    // Route::get('about/response',[AboutMenuController::class,'response'])->name('aboutresponse');

    //   rabbi  /committee Menu
    Route::get('All-committee', [CommitteeMenuController::class, 'index'])->name('committee_index');
    Route::get('Add-committee', [CommitteeMenuController::class, 'create'])->name('addcommittee');
    Route::post('storecommittee', [CommitteeMenuController::class, 'store'])->name('storecommittee');
    Route::get('committee_viewedit/{id}', [CommitteeMenuController::class, 'edit']);
    Route::post('updatecommittee/{id}', [CommitteeMenuController::class, 'update']);
    Route::get('committee_viewdelete/{id}', [CommitteeMenuController::class, 'destroy']);
    //   rabbi  /cell Menu
    Route::get('All-cell', [CellMenuController::class, 'index'])->name('cell_index');
    Route::get('Add-cell', [CellMenuController::class, 'create'])->name('addcell');
    Route::post('storecell', [CellMenuController::class, 'store'])->name('storecell');
    Route::get('call_viewedit/{id}', [CellMenuController::class, 'edit']);
    Route::post('updatecell/{id}', [CellMenuController::class, 'update']);
    Route::get('cell_viewdelete/{id}', [CellMenuController::class, 'destroy']);

    //rabbi // video
    Route::get('Video', [webVideoController::class, 'index'])->name('index_video');
    Route::post('Video-store', [webVideoController::class, 'store'])->name('videostore');
    Route::get('Add-video', [webVideoController::class, 'create'])->name('addshowvideo');
    Route::get('activeinactive/{status}/{id}', [webVideoController::class, 'status']);
    Route::get('deletevideo/{id}', [webVideoController::class, 'destroy']);

    //message
    Route::get('/messages', [MessageController::class, 'messages'])->name('messages');
    Route::get('/addmessages', [MessageController::class, 'addmessages'])->name('addmessages');
    Route::post('/storeMessage', [MessageController::class, 'storeMessage'])->name('storeMessage');
    // rabbi// member category
    Route::get('/M-Category', [MemberCategoryController::class, 'index'])->name('member_category');
    Route::get('/add-Category', [MemberCategoryController::class, 'create'])->name('addmember_category');
    Route::post('/store-Category', [MemberCategoryController::class, 'store'])->name('storemember_category');
    Route::post('update_mcategory/{id}', [MemberCategoryController::class, 'update']);
    Route::get('/delet_mcategory/{id}', [MemberCategoryController::class, 'destroy']);
    Route::get('/cate_mem_activity/{id}/{status}', [MemberCategoryController::class, 'status']);
    Route::get('/edit_membercat/{id}', [MemberCategoryController::class, 'edit']);

    //   rabbi //  notice
    Route::get('/Notice', [NoticeController::class, 'index'])->name('index_notice');
    Route::get('/Add_notice', [NoticeController::class, 'create'])->name('add_notice');
    Route::get('/activation/{id}/{status}', [NoticeController::class, 'status']);
    Route::get('/destroy/{id}', [NoticeController::class, 'destroy']);
    Route::get('/editnotice/{id}', [NoticeController::class, 'edit']);
    Route::post('/store_notice', [NoticeController::class, 'store'])->name('storenotice');
    Route::put('/updatenotice/{id}', [NoticeController::class, 'update']);



    //   Rabbi // Reference
    Route::get('/Reference-list', [IncentiveController::class, 'index'])->name('reference_list');

    //    rabbi  // Location member Profile
    Route::post('/memberDistList', [RegistrationController::class, 'memberDistList'])->name('memberDistList');
    Route::post('/memberThanaList', [RegistrationController::class, 'memberThanaList'])->name('memberThanaList');
    Route::post('/Edit-location', [RegistrationController::class, 'edit_location'])->name('edit-location');

    //  Rabbi  // id_card
    Route::get('/Id-card', [IncentiveController::class, 'idcard'])->name('id_card');

    //    rabbi //referance id
    Route::get('/without_reference', [IncentiveController::class, 'view'])->name('without_reference');
    Route::post('referadd_admin/{id}', [IncentiveController::class, 'refer_update']);
    // rabbi admin password change
    Route::get('admin_password_change', [AdminController::class, 'password_change'])->name('admin_password_change');
    Route::post('updateuserpassword', [AdminController::class, 'update_password'])->name('updateuserpassword');

    // Training
    Route::get('/all-training-list', [TrainingController::class, 'index']);
    Route::get('/add-training', [TrainingController::class, 'create'])->name('create.training');
    Route::post('/store/training', [TrainingController::class, 'store'])->name('training.store');
    Route::post('/update/training/{id}', [TrainingController::class, 'update'])->name('training.update');
    Route::get('/edit/training/{id}', [TrainingController::class, 'edit'])->name('training.post.edit');
    Route::get('/delate/training/{id}', [TrainingController::class, 'destroy'])->name('training.post.delate');
    Route::get('/training/application', [TrainingController::class, 'applicationList']);
    Route::get('/training/studentresumy/{id}', [TrainingController::class, 'viewstudent'])->name('training.studentresumy');

    // Donate
    Route::get('/all-sponsar-list', [DonateController::class, 'index']);
    Route::get('/add-donate', [DonateController::class, 'create'])->name('create.donate');
    Route::post('/store/donate', [DonateController::class, 'store'])->name('donate.store');
    Route::post('/update/donate/{id}', [DonateController::class, 'update'])->name('donate.update');
    Route::get('/edit/donate/{id}', [DonateController::class, 'edit'])->name('donate.post.edit');
    Route::get('/delate/donate/{id}', [DonateController::class, 'destroy'])->name('donate.post.delate');
    Route::get('/donate/application', [DonateController::class, 'applicationList']);

    Route::get('/all-donate-list', [DonateController::class, 'index']);
    Route::get('/add-donate', [DonateController::class, 'create'])->name('create.donate');
    Route::put('/store/donate', [DonateController::class, 'store'])->name('donate.store');
    Route::post('/update/donate/{id}', [DonateController::class, 'update'])->name('donate.update');

    Route::get('donate/gift', [GiftController::class, 'index'])->name('gifts.index');

    Route::get('donate/create', [GiftController::class, 'create'])->name('gifts.create');

    Route::post('donate/store', [GiftController::class, 'store'])->name('gifts.store');

    Route::get('donate/{gift}/edit', [GiftController::class, 'edit'])->name('gifts.edit');

    Route::put('donate/{gift}', [GiftController::class, 'update'])->name('gifts.update');

    Route::get('donate/{gift}', [GiftController::class, 'destroy'])->name('gifts.destroy');


    // Project
    Route::get('/all-project-list', [ProjectController::class, 'index']);
    Route::get('/add-project', [ProjectController::class, 'create'])->name('create.project');
    Route::post('/store/project', [ProjectController::class, 'store'])->name('project.store');
    Route::post('/update/project/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::get('/edit/project/{id}', [ProjectController::class, 'edit'])->name('project.post.edit');
    Route::get('/delete/project/{id}', [ProjectController::class, 'destroy'])->name('project.post.delate');

    Route::get('/all-event-list', [EventController::class, 'index'])->name('event.list');
    Route::get('/add-event', [EventController::class, 'create'])->name('create.event');
    Route::post('/store/event', [EventController::class, 'store'])->name('event.store');
    Route::get('/edit/event/{id}', [EventController::class, 'edit'])->name('event.edit');
    Route::post('/update/event/{id}', [EventController::class, 'update'])->name('event.update');
    Route::get('/delete/event/{id}', [EventController::class, 'destroy'])->name('event.delete');



    Route::get('/all-news-list', [NewsController::class, 'index'])->name('news.list');
    Route::get('/add-news', [NewsController::class, 'create'])->name('create.news');
    Route::post('/store/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/edit/news/{id}', [NewsController::class, 'edit'])->name('news.edit');
    Route::post('/update/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::get('/delete/news/{id}', [NewsController::class, 'destroy'])->name('news.delete');

    Route::get('/all-champaign-list', [ChampaignController::class, 'index'])->name('champaign.list');
    Route::get('/add-champaign', [ChampaignController::class, 'create'])->name('create.champaign');
    Route::post('/store/champaign', [ChampaignController::class, 'store'])->name('champaign.store');
    Route::get('/edit/champaign/{id}', [ChampaignController::class, 'edit'])->name('champaign.edit');
    Route::post('/update/champaign/{id}', [ChampaignController::class, 'update'])->name('champaign.update');
    Route::get('/delete/champaign/{id}', [ChampaignController::class, 'destroy'])->name('champaign.delete');

    // Fixed spelling

    // introduction page route
    Route::get('/admin/introduction', [IntroductionController::class, 'introduction']);
});
Route::get('view_aboutepage/{id}', [AboutMenuController::class, 'fontview'])->name('member.fontview');

Route::get('view-management-memeber', [AboutMenuController::class, 'management'])->name('MannagementMember.all');
Route::post('store-management-member', [AboutMenuController::class, 'storemannagement'])->name('MannagementMember.store');
Route::put('update-management-member/{id}', [AboutMenuController::class, 'manangemntupdate'])->name('MannagementMember.update');

Route::get('management-member/{id}', [AboutMenuController::class, 'destroymanangemnt'])->name('MannagementMember.delete');

Route::get('update-management-member/{id}/edit', [AboutMenuController::class, 'editmanagement'])->name('MannagementMember.edit');

Route::get('view_committeepage/{id}', [CommitteeMenuController::class, 'fontview']);
Route::get('view_cellpage/{id}', [CellMenuController::class, 'fontview']);

Route::get('/jobView/{media}', [FrontEndController::class, 'jobView'])->name('jobView');
Route::post('seekerlogin', [FrontEndController::class, 'seekerlogin'])->name('seekerlogin');
Route::post('applicationStore', [ApplyController::class, 'applicationStore'])->name('applicationStore');
Route::post('/store/donate', [DonateController::class, 'store'])->name('donate.store');
Route::get('/', [FrontEndController::class, 'index']);

Route::get('/response', [FrontEndController::class, 'response'])->name('frontend.pages.response');



// Privacy Policy Routes
Route::get('/all-privacy-policy', [FrontEndController::class, 'createPrivacyPolicy'])->name('privacy-policy.create');

Route::put('/privacy-policy/{id}', [FrontEndController::class, 'editPrivacyPolicy'])->name('privacy-policy.edit');
Route::post('/privacy-policy/update', [FrontEndController::class, 'updatePrivacyPolicy'])->name('privacy-policy.update');

// Return Policy Routes
Route::get('/Terms-Conditions', [FrontEndController::class, 'createTermsCondition'])->name('return-policy.create');
Route::put('/return-policy/{id}', [FrontEndController::class, 'editReturnPolicy'])->name('return-policy.edit'); // You can keep this if needed, but ensure the method is defined
Route::post('/return-policy/update', [FrontEndController::class, 'updateReturnPolicy'])->name('return-policy.update');

// Terms & Condition Routes
Route::get('/Refund-Policy', [FrontEndController::class, 'createReturnPolicy'])->name('terms-condition.create');
Route::put('/terms-condition/{id}', [FrontEndController::class, 'editTermsCondition'])->name('terms-condition.edit');
Route::post('/terms-condition/update', [FrontEndController::class, 'updateTermsCondition'])->name('terms-condition.update');

//avi code
Route::get('/principles', [FrontEndController::class, 'principle']);
Route::get('/sponsor-a-child', [FrontEndController::class, 'sponsor_child'])->name('sponsor_child');
Route::get('/constitution', [FrontEndController::class, 'constitution']);
Route::get('/Contact-Us', [FrontEndController::class, 'contact']);
Route::post('store/Contact-Us', [FrontEndController::class, 'store'])->name('contact.store');
Route::get('/All-Gallery', [FrontEndController::class, 'gallery']);
Route::get('/All-job/{id}', [FrontEndController::class, 'alljob'])->name('all.job');
Route::get('/Our-Rules', [FrontEndController::class, 'OurRules']);
Route::get('/sponsor', [FrontEndController::class, 'sponsor']);
// Route::get('/volunteer', [FrontEndController::class, 'volunteer'])->middleware('volunteer');
Route::get('/volunteer', [FrontEndController::class, 'volunteer']);


Route::get('/change-password', [PasswordController::class, 'showChangePasswordForm'])->name('password.change');
Route::post('/change-password', [PasswordController::class, 'updatePassword'])->name('password.update');

Route::get('/sponserd-list', [FrontEndController::class, 'sponserlist']);
Route::get('/due-list', [FrontEndController::class, 'deu_list']);
Route::get('/paid-list', [FrontEndController::class, 'paid_list']);

Route::get('/search', [FrontEndController::class, 'search'])->name('search');

Route::get('/volunteer/waiting', [FrontEndController::class, 'waiting'])->name('volunteer.waiting');
Route::get('/donate-form', [FrontEndController::class, 'donateForm']);
Route::get('/vision', [FrontEndController::class, 'vision']);
Route::get('/executive-council', [FrontEndController::class, 'executiveCouncil']);
// Route::get('/program', [FrontEndController::class, 'program'])->name('program');
Route::get('/project', [FrontEndController::class, 'project']);
Route::get('/project/{slug}', [FrontEndController::class, 'showproject'])->name('project.show');
Route::get('/news-show/{slug}', [FrontEndController::class, 'shownews'])->name('news.show');
Route::get('/show-Program', [FrontEndController::class, 'showProgram']);
Route::get('/news', [FrontEndController::class, 'news']);

Route::get('/event', [FrontEndController::class, 'event']);
Route::get('/event-show/{slug}', [FrontEndController::class, 'showprojectevent'])->name('event.show');
Route::get('/event-show-Program', [FrontEndController::class, 'showProgramEvent']);
Route::get('/event-news', [FrontEndController::class, 'newsEvent']);






Route::get('/champaign', [FrontEndController::class, 'champaign']);
Route::get('/champaign-show/{slug}', [FrontEndController::class, 'showProgramchampaign'])->name('champaign.show');
Route::get('/champaign-show-Program', [FrontEndController::class, 'showchampaignprogram']);
Route::get('/champaign-news', [FrontEndController::class, 'newschampaign']);

Route::get('/job-categories', [FrontEndController::class, 'viewcategory'])->name('job.category');



// our serve response
Route::get('serve/create', [FrontEndController::class, 'serve_create'])->name('serve.create');
Route::post('serve/post', [FrontEndController::class, 'serve_store'])->name('serve.store');
Route::get('serve/index', [FrontEndController::class, 'serve_index'])->name('serve.index');

Route::get('serve/show/{slug}', [FrontEndController::class, 'serve_Show'])->name('serve.show');




// paid donation
Route::get('eventAmount/create', [FrontEndController::class, 'eventAmountcreate'])->name('eventAmount.create');
Route::post('eventAmount/store', [FrontEndController::class, 'eventAmountstore'])->name('eventAmount.store');
Route::get('eventAmount/index', [FrontEndController::class, 'eventAmountindex'])->name('eventAmount.index');
Route::get('eventAmount/edit/{id}', [FrontEndController::class, 'eventAmountedit'])->name('eventAmount.edit');
Route::PUT('eventAmount/update/{id}', [FrontEndController::class, 'eventAmountupdate'])->name('eventAmount.update');
Route::delete('eventAmount/delete/{id}', [FrontEndController::class, 'eventAmountdelete'])->name('eventAmount.delete');



// Media Category
Route::get('mediaCategory/create', [FrontEndController::class, 'mediaCategoryCreate'])->name('mediaCategory.create');
Route::post('mediaCategory/store', [FrontEndController::class, 'mediaCategoryStore'])->name('mediaCategory.store');
Route::get('mediaCategory/index', [FrontEndController::class, 'mediaCategoryIndex'])->name('mediaCategory.index');
Route::get('mediaCategory/edit/{id}', [FrontEndController::class, 'mediaCategoryEdit'])->name('mediaCategory.edit');
Route::put('mediaCategory/update/{id}', [FrontEndController::class, 'mediaCategoryUpdate'])->name('mediaCategory.update');
Route::delete('mediaCategory/delete/{id}', [FrontEndController::class, 'mediaCategoryDelete'])->name('mediaCategory.delete');

// Route::get('cate_mem_activity/{id}/{status}', [MediaCategoryController::class, 'activity'])->name('cate_mem_activity');


//avi route
Route::get('/signin', [RegistrationController::class, 'index'])->name('signin');
Route::get('/login', [RegistrationController::class, 'login'])->name('login');
Route::post('/showDistList', [RegistrationController::class, 'showDistList'])->name('showDistList');
Route::post('/showThanaList', [RegistrationController::class, 'showThanaList'])->name('showThanaList');
Route::post('/regstore', [RegistrationController::class, 'store'])->name('regstore');

//job section
Route::get('/emp_signin', [JobController::class, 'emp_signin'])->name('emp_signin');
Route::get('/emp_signup', [JobController::class, 'emp_signup'])->name('emp_signup');
Route::post('/emp_registration', [JobController::class, 'emp_registration'])->name('emp_registration');

// job search
Route::post('/job-search', [JobController::class, 'jobsearch'])->name('job.search');

//corporate job post
Route::get('/corp_signin', [JobController::class, 'corp_signin'])->name('corp_signin');
Route::get('/corp_signup', [JobController::class, 'corp_signup'])->name('corp_signup');
Route::post('/corp_registration', [JobController::class, 'corp_registration'])->name('corp_registration');
Route::post('/getDistList', [JobController::class, 'getDistList'])->name('getDistList');
Route::post('/getDistList2', [JobController::class, 'getDistList2'])->name('getDistList2');
Route::post('/getThanaList', [JobController::class, 'getThanaList'])->name('getThanaList');

// rabbi blood page
Route::get('/blood', [FrontEndController::class, 'blood_view']);

// rabbi //video
Route::get('/All-Video', [webVideoController::class, 'fontindex']);

// Training
Route::get('/training', [TrainingController::class, 'view'])->name('main.training');
Route::get('/view/training/{id}', [TrainingController::class, 'details'])->name('training.details');
Route::post('/login/training', [TrainingController::class, 'traininglogin'])->name('training.login');
Route::post('/training/admission', [TrainingController::class, 'admission'])->name('training.admission.store');
Route::post('/training/search', [TrainingController::class, 'trainingsearch'])->name('training.search');
Route::post('/training/search/type', [TrainingController::class, 'trainingType'])->name('training.type.search');

//Program Controller

Route::get('/program', [ProgramController::class, 'index']);


Route::get('/volunteers', [VolunteerController::class, 'index'])->name('volunteer');
Route::post('/volunteer/store', [VolunteerController::class, 'store'])->name('volunteer.store');
Route::get('/volunteer/status/update/{volunteer}', [VolunteerController::class, 'status'])->name('volunteer.status.update');
Route::get('/volunteer/login', [VolunteerController::class, 'login'])->name('volunteer.login')->middleware('volunteer');
Route::post('/volunteer/submit', [VolunteerController::class, 'submit'])->name('volunteer.submit');

// Route::get('/volunteer/registration', [VolunteerController::class, 'registration'])->name('volunteer.registration');
Route::group(['middleware' => 'volunteer', "prefix" => "volunteer", "name" => "volunteer."], function () {
    Route::get('/dashboard', [VolunteerController::class, 'dashboard'])->name('volunteer.dashboard');
    Route::get('/volunteer/profile/{id}', [VolunteerController::class, 'edit'])->name('volunteer.profile');
    Route::post('/volunteer/profile/{id}', [VolunteerController::class, 'update'])->name('volunteer.profile.update');
    Route::post('/short/volunteer/profile/{id}', [VolunteerController::class, 'shortTermVolunteerStore'])->name('shortTerm.volunteer.store');
    Route::post('/long/volunteer/profile/{id}', [VolunteerController::class, 'longTermVolunteerStore'])->name('longTerm.volunteer.store');
});
Route::get('/volunteer_request', [VolunteerController::class, 'volunteerRequest'])->name('volunteer_request');
Route::get('/show_volunteer/{id}', [VolunteerController::class, 'showVolunteer'])->name('show_volunteer');

Route::get('/generate-pdf/{id}', [VolunteerController::class, 'generateVolunteerPDF'])->name('generate.pdf');


// Blog
Route::get('blog/index', [BlogController::class, 'index'])->name('blog.index');
Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::put('blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::get('blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');

Route::get('blog/show', [FrontEndController::class, 'blog_show'])->name('frontend.pages.blog');
Route::get('blog/details/{id}', [FrontEndController::class, 'blog_details'])->name('blog_details');


// Feedback
Route::get('feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');
Route::get('feedback/index', [FeedbackController::class, 'index'])->name('feedback.index');
Route::get('feedback/edit/{id}', [FeedbackController::class, 'edit'])->name('feedback.edit');
Route::put('feedback/update/{id}', [FeedbackController::class, 'update'])->name('feedback.update');
Route::get('feedback/delete/{id}', [FeedbackController::class, 'delete'])->name('feedback.delete');


//odms
Route::get('odms/index', [OdmsController::class, 'index'])->name('odms.index');
Route::post('odms/store', [OdmsController::class, 'store'])->name('odms.store');
Route::get('odms/create', [OdmsController::class, 'create'])->name('odms.create');
Route::get('odms/edit/{id}', [OdmsController::class, 'edit'])->name('odms.edit');
Route::put('odms/update/{id}', [OdmsController::class, 'update'])->name('odms.update');
Route::delete('odms/delete/{id}', [OdmsController::class, 'delete'])->name('odms.delete');

Route::get('odms/show/{id}', [OdmsController::class, 'show'])->name('frontend.pages.odms.show');

Route::post('/donations/update-payment-status', [EventController::class, 'updatePaymentStatus'])->name('donation.updatePaymentStatus');


//manual
Route::get('manual/create', [ManualController::class, 'create'])->name('manual.create');
Route::post('manual/store', [ManualController::class, 'store'])->name('manual.store');
Route::get('manual-payment/index', [ManualController::class, 'index'])->name('manual.index');
Route::get('manual/index', [ManualController::class, 'index2'])->name('getDonationTypes');
Route::get('manual/edit/{id}', [ManualController::class, 'edit'])->name('manual.edit');
Route::put('manual/update/{id}', [ManualController::class, 'update'])->name('manual.update');
Route::delete('manual/delete/{id}', [ManualController::class, 'delete'])->name('manual.delete');


// partner
Route::get('partner/create', [PartnerController::class, 'create'])->name('partner.create');
Route::post('partner/store', [PartnerController::class, 'store'])->name('partner.store');
Route::get('partner/index', [PartnerController::class, 'index'])->name('partner.index');

Route::put('billing/{id}', [BillingController::class, 'update'])->name('billing.updatePayment');



// notice
Route::get('/frontend/notice_details/{id}', [NoticeController::class, 'details'])->name('frontend.notice_details');
Route::get('/frontend/notice_show/{id}', [NoticeController::class, 'show'])->name('frontend.pages.notice_show');

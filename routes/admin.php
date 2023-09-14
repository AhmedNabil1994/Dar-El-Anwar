<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AffiliateController;
use App\Http\Controllers\Admin\AssignmentController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\FinancialAccountController;
use App\Http\Controllers\Admin\GoalController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\FollowupController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\ContactUsIssueController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseLanguageController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BalanceController;
use App\Http\Controllers\Admin\difficultyLevelController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ForumCategoryController;
use App\Http\Controllers\Admin\HomeSettingController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ParentInfoController;
use App\Http\Controllers\Admin\PayoutController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\RankingLevelController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SpecialPromotionTagController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\SupportTicketController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\AbsenceController;
use App\Http\Controllers\Admin\ProfitController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Instructor\InstructorController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Admin\BusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Auth::routes(['register' => false]);


//
Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/login/submit', [AdminController::class, 'loginAdmin'])->name('admin.loginAdmin');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
});

Route::group(["middleware"=> \App\Http\Middleware\Admin::class],function (){

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

Route::group(['prefix' => 'payout', 'as' => 'payout.'], function () {
    Route::get('new-withdraw', [PayoutController::class, 'newWithdraw'])->name('new-withdraw');
    Route::get('complete-withdraw', [PayoutController::class, 'completeWithdraw'])->name('complete-withdraw');
    Route::get('rejected-withdraw', [PayoutController::class, 'rejectedWithdraw'])->name('rejected-withdraw');
    Route::post('change-withdraw-status', [PayoutController::class, 'changeWithdrawStatus'])->name('change-withdraw-status');
});


// Start:: Admins
    Route::group(['prefix' => 'admins'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admins.index');
        Route::get('create', [AdminController::class, 'create'])->name('admins.create');
        Route::post('store', [AdminController::class, 'store'])->name('admins.store');
        Route::get('edit/{admin}', [AdminController::class, 'edit'])->name('admins.edit');
        Route::post('update/{admin}', [AdminController::class, 'update'])->name('admins.update');
        Route::post('update-password/{admin}', [AdminController::class, 'password'])->name('admins.update.password');
        Route::get('search', [AdminController::class, 'search'])->name('admins.search');
        Route::post('delete', [AdminController::class, 'delete'])->name('admins.delete');
    });




Route::group(['prefix' => 'email-template', 'as' => 'email-template.'], function () {
    Route::get('/', [EmailTemplateController::class, 'index'])->name('index');
    Route::get('create', [EmailTemplateController::class, 'create'])->name('create');
    Route::post('store', [EmailTemplateController::class, 'store'])->name('store');
    Route::get('edit/{uuid}', [EmailTemplateController::class, 'edit'])->name('edit');
    Route::post('update/{uuid}', [EmailTemplateController::class, 'update'])->name('update');
    Route::get('delete/{uuid}', [EmailTemplateController::class, 'delete'])->name('delete');

    Route::get('send-email', [EmailTemplateController::class, 'sendEmail'])->name('send-email');
    Route::post('send-email-to-user', [EmailTemplateController::class, 'sendEmailToUser'])->name('send-email-to-user');
});

// Start:: user management
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('create', [UserController::class, 'create'])->name('create');
    Route::post('store', [UserController::class, 'store'])->name('store');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [UserController::class, 'update'])->name('update');
    Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
    Route::get('/', [RoleController::class, 'index'])->name('index');
    Route::get('create', [RoleController::class, 'create'])->name('create');
    Route::post('store', [RoleController::class, 'store'])->name('store');
    Route::get('edit/{id}', [RoleController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [RoleController::class, 'update'])->name('update');
    Route::get('delete/{id}', [RoleController::class, 'delete'])->name('delete');
});

// End:: user management

Route::group(['prefix' => 'promotions', 'as' => 'promotion.'], function () {
    Route::get('/', [PromotionController::class, 'index'])->name('index');
    Route::get('create', [PromotionController::class, 'create'])->name('create');
    Route::post('store', [PromotionController::class, 'store'])->name('store');
    Route::get('edit-promotion-course/{uuid}', [PromotionController::class, 'editPromotionCourse'])->name('editPromotionCourse');
    Route::get('show/{uuid}', [PromotionController::class, 'show'])->name('show');
    Route::get('edit/{uuid}', [PromotionController::class, 'edit'])->name('edit');
    Route::put('update/{uuid}', [PromotionController::class, 'update'])->name('update');
    Route::delete('delete/{uuid}', [PromotionController::class, 'delete'])->name('delete');
    Route::post('change-promotion-status', [PromotionController::class, 'changePromotionStatus'])->name('changePromotionStatus');

    Route::get('add-promotion-course-list', [PromotionController::class, 'addPromotionCourseList'])->name('addPromotionCourseList');
    Route::get('remove-promotion-course-list', [PromotionController::class, 'removePromotionCourseList'])->name('removePromotionCourseList');
});

Route::prefix('course')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('admin.course.index');
    Route::get('view/{uuid}', [CourseController::class, 'view'])->name('admin.course.view');
    Route::get('create', [CourseController::class, 'create'])->name('admin.course.create');
    Route::get('approved', [CourseController::class, 'approved'])->name('admin.course.approved');
    Route::get('review-pending', [CourseController::class, 'reviewPending'])->name('admin.course.review_pending');
    Route::get('hold', [CourseController::class, 'hold'])->name('admin.course.hold');
    Route::get('status-change/{uuid}/{status}', [CourseController::class, 'statusChange'])->name('admin.course.status-change');
    Route::get('delete/{uuid}', [CourseController::class, 'delete'])->name('admin.course.delete');
    Route::post('store', [CourseController::class, 'store'])->name('admin.course.store');
});

    Route::prefix('exam')->group(function () {

        Route::get('/', [ExamController::class, 'index'])->name('admin.exam.index');
        Route::get('view/{uuid}', [ExamController::class, 'view'])->name('admin.exam.view');
        Route::get('create', [ExamController::class, 'create'])->name('admin.exam.create');
        Route::get('edit/{uuid}', [ExamController::class, 'edit'])->name('admin.exam.edit');
        Route::get('approved', [ExamController::class, 'approved'])->name('admin.exam.approved');
        Route::get('review-pending', [ExamController::class, 'reviewPending'])->name('admin.exam.review_pending');
        Route::get('hold', [ExamController::class, 'hold'])->name('admin.exam.hold');
        Route::get('status-change/{uuid}/{status}', [ExamController::class, 'statusChange'])->name('admin.exam.status-change');
        Route::get('delete/{uuid}', [ExamController::class, 'delete'])->name('admin.exam.delete');
        Route::post('store', [ExamController::class, 'store'])->name('admin.exam.store');
        Route::post('update/{id}', [ExamController::class, 'update'])->name('admin.exam.update');
    });




    Route::prefix('subject')->group(function () {
        Route::get('/', [SubjectController::class, 'index'])->name('admin.subject.index');
        Route::get('view/{uuid}', [SubjectController::class, 'view'])->name('admin.subject.view');
        Route::get('create', [SubjectController::class, 'create'])->name('admin.subject.create');
        Route::get('edit/{id}', [SubjectController::class, 'edit'])->name('admin.subject.edit');
        Route::post('update/{id}', [SubjectController::class, 'update'])->name('admin.subject.update');
        Route::get('delete/{uuid}', [SubjectController::class, 'delete'])->name('admin.subject.delete');
        Route::post('store', [SubjectController::class, 'store'])->name('admin.subject.store');
    });

    Route::prefix('bus')->group(function () {
        Route::get('/', [BusController::class, 'index'])->name('admin.bus.index');
        Route::get('create', [BusController::class, 'create'])->name('admin.bus.create');
        Route::post('store', [BusController::class, 'store'])->name('admin.bus.store');
        Route::get('edit/{id}', [BusController::class, 'edit'])->name('admin.bus.edit');
        Route::post('update/{id}', [BusController::class, 'update'])->name('admin.bus.update');
        Route::get('delete/{id}', [BusController::class, 'destroy'])->name('admin.bus.delete');
    });

    Route::prefix('contact_us')->group(function () {
        Route::get('/inbox', [ContactUsController::class, 'contactUsInbox'])->name('admin.contact_us.contactUsInbox');
        Route::get('/sent', [ContactUsController::class, 'contactUsSent'])->name('admin.contact_us.contactUsSent');
        Route::get('/conversations', [ContactUsController::class, 'contactUsConversations'])->name('admin.contact_us.contactUsConversations');
        Route::get('/messages', [ContactUsController::class, 'contactUsMessages'])->name('admin.contact_us.contactUsMessages');
    });

    Route::prefix('goals')->group(function () {
        Route::get('/', [GoalController::class, 'index'])->name('admin.goals.index');
        Route::get('create', [GoalController::class, 'create'])->name('admin.goals.create');
        Route::post('store', [GoalController::class, 'store'])->name('admin.goals.store');
        Route::get('edit/{id}', [GoalController::class, 'edit'])->name('admin.goals.edit');
        Route::post('update/{id}', [GoalController::class, 'update'])->name('admin.goals.update');
        Route::get('delete/{id}', [GoalController::class, 'destroy'])->name('admin.goals.delete');
    });


    Route::prefix('assignments')->group(function () {
        Route::get('/', [AssignmentController::class, 'index'])->name('admin.assignments.index');
        Route::get('create', [AssignmentController::class, 'create'])->name('admin.assignments.create');
        Route::post('store', [AssignmentController::class, 'store'])->name('admin.assignments.store');
        Route::get('edit/{id}', [AssignmentController::class, 'edit'])->name('admin.assignments.edit');
        Route::post('update/{id}', [AssignmentController::class, 'update'])->name('admin.assignments.update');
        Route::get('delete/{id}', [AssignmentController::class, 'destroy'])->name('admin.assignments.delete');
    });

    Route::prefix('followup')->group(function () {
        Route::get('/', [FollowupController::class, 'index'])->name('admin.followup.index');
        Route::get('create_class', [FollowupController::class, 'createClass'])->name('admin.followup.create');
        Route::get('reading', [FollowupController::class, 'createReading'])->name('admin.followup.reading');
        Route::get('quran', [FollowupController::class, 'createQuran'])->name('admin.followup.quran');
        Route::post('store_class', [FollowupController::class, 'storeClass'])->name('admin.followup.storeClass');
        Route::post('store_reading', [FollowupController::class, 'storeReading'])->name('admin.followup.storeReading');
        Route::post('store_quran', [FollowupController::class, 'storeQuran'])->name('admin.followup.storeQuran');
        Route::get('edit_class/{followup}', [FollowupController::class, 'editClass'])->name('admin.followup.editClass');
        Route::get('edit_quran/{followup}', [FollowupController::class, 'editQuran'])->name('admin.followup.editQuran');
        Route::get('edit_reading/{followup}', [FollowupController::class, 'editReading'])->name('admin.followup.editReading');
        Route::post('update_class/{followup}', [FollowupController::class, 'updateClass'])->name('admin.followup.updateClass');
        Route::post('update_quran/{followup}', [FollowupController::class, 'updateQuran'])->name('admin.followup.updateQuran');
        Route::post('update_reading/{followup}', [FollowupController::class, 'updateReading'])->name('admin.followup.updateReading');
        Route::get('delete/{followup}', [FollowupController::class, 'destroy'])->name('admin.followup.delete');
    });

    Route::get('course-upload-rules', [CourseController::class, 'courseUploadRuleIndex'])->name('course-rules.index');
    Route::post('course-upload-rules/store', [CourseController::class, 'courseUploadRuleStore'])->name('course-rules.store');


Route::prefix('instructor')->group(function () {
    Route::get('/', [InstructorController::class, 'index'])->name('instructor.index');
    Route::get('view/{id}', [InstructorController::class, 'view'])->name('instructor.view');
    Route::get('edit/{id}', [InstructorController::class, 'edit'])->name('instructor.edit');
    Route::post('update/{id}', [InstructorController::class, 'update'])->name('instructor.update');
    Route::get('pending', [InstructorController::class, 'pending'])->name('instructor.pending');
    Route::get('approved', [InstructorController::class, 'approved'])->name('instructor.approved');
    Route::get('blocked', [InstructorController::class, 'blocked'])->name('instructor.blocked');
    Route::get('change-status/{uuid}/{status}', [InstructorController::class, 'changeStatus'])->name('instructor.status-change');
    Route::post('change-instructor-status', [InstructorController::class, 'changeInstructorStatus'])->name('admin.instructor.changeInstructorStatus');
    Route::get('delete/{uuid}', [InstructorController::class, 'delete'])->name('instructor.delete');

    Route::get('get-state-by-country/{country_id}', [InstructorController::class, 'getStateByCountry']);
    Route::get('get-city-by-state/{state_id}', [InstructorController::class, 'getCityByState']);

    Route::get('create', [InstructorController::class, 'create'])->name('instructor.create');
    Route::post('store', [InstructorController::class, 'store'])->name('instructor.store');
});

Route::prefix('student')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('student.index');
    Route::get('create', [StudentController::class, 'create'])->name('student.create');
    Route::post('store', [StudentController::class, 'store'])->name('student.store');
    Route::get('view/{id}', [StudentController::class, 'view'])->name('student.view');
    Route::get('edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('update/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
    Route::post('change-student-status', [StudentController::class, 'changeStudentStatus'])->name('admin.student.changeStudentStatus');
});

    Route::prefix('accounts')->group(function () {
        Route::get('treasury', [FinancialAccountController::class, 'treasury'])->name('accounts.treasury');
        Route::get('/treasury/income/create', [FinancialAccountController::class,'createIncomeTransaction'])->name('accounts.createIncomeTransaction');
        Route::get('/treasury/income/edit/{financialAccount}', [FinancialAccountController::class,'editIncomeTransaction'])->name('accounts.editIncomeTransaction');
        Route::get('/treasury/expense/create', [FinancialAccountController::class,'createExpenseTransaction'])->name('accounts.createExpenseTransaction');
        Route::get('/treasury/expense/edit/{financialAccount}', [FinancialAccountController::class,'editExpenseTransaction'])->name('accounts.editExpenseTransaction');
        Route::post('/treasury/store', [FinancialAccountController::class,'storeTransaction'])->name('accounts.storeTransaction');
        Route::post('/treasury/update/{financialAccount}', [FinancialAccountController::class,'updateTransaction'])->name('accounts.updateTransaction');
//        Route::post('store', [FinancialAccountController::class, 'store'])->name('student.store');
//        Route::get('view/{id}', [FinancialAccountController::class, 'view'])->name('student.view');
//        Route::get('edit/{id}', [FinancialAccountController::class, 'edit'])->name('student.edit');
//        Route::post('update/{id}', [FinancialAccountController::class, 'update'])->name('student.update');
        Route::delete('delete/{financialAccount}', [FinancialAccountController::class, 'deleteTransaction'])->name('accounts.delete');
        Route::post('change-student-status', [FinancialAccountController::class, 'changeStudentStatus'])->name('admin.student.changeStudentStatus');
    });


    Route::prefix('subscriptions')->group(function () {
        Route::get('', 'SubscriptionController@index')->name('subscriptions.index');
        Route::get('students_subscription', 'SubscriptionController@students_subscription')->name('subscriptions.students_subscription');
        Route::get('edit/{subscription}', 'SubscriptionController@edit')->name('subscriptions.edit');
        Route::get('show/{subscription}', 'SubscriptionController@show')->name('subscriptions.show');
        Route::get('/payment/{subscription}', 'SubscriptionController@processPayment')->name('payment.process');
        Route::get('/payment/wallet/{subscription}', 'SubscriptionController@processPaymentWallet')->name('payment.process.wallet');
        Route::post('store', 'SubscriptionController@store')->name('subscriptions.store');
        Route::delete('delete/{subscription}', 'SubscriptionController@destroy')->name('subscriptions.destroy');
        Route::post('update/{subscription}', 'SubscriptionController@update')->name('subscriptions.update');
    });
    Route::prefix('invoices')->group(function () {
        Route::get('/', [InvoiceController::class, 'index'])->name('invoices.index');
        Route::post('/', [InvoiceController::class, 'store'])->name('invoices.store');
        Route::post('/{invoice}/mark-as-paid', [InvoiceController::class, 'markAsPaid'])->name('invoices.markAsPaid');
        Route::get('/{paidInvoice}/print', [InvoiceController::class, 'printInvoice'])->name('invoices.print');
        Route::get('/{paidInvoice}/download', [InvoiceController::class, 'downloadInvoice'])->name('invoices.download');
    });
    Route::prefix('payments')->group(function () {
        Route::get('', 'PaymentController@index')->name('payments.index');
        Route::post('process/{subscription}', 'PaymentController@process')->name('payments.process');
    });
    Route::prefix('balance')->as('balances.')->group(function () {
        Route::resource('balances', BalanceController::class);
        Route::get('openingBalanceForm', [BalanceController::class,'openingBalanceForm'])->name('openingBalanceForm');
        Route::get('createOpeningBalance', [BalanceController::class,'createOpeningBalance'])->name('createOpeningBalance');
        Route::post('storeOpeningBalance', [BalanceController::class,'storeOpeningBalance'])->name('storeOpeningBalance');
        Route::get('editOpeningBalance/{balance}', [BalanceController::class,'editOpeningBalance'])->name('editOpeningBalance');
        Route::post('updateOpeningBalance/{balance}', [BalanceController::class,'updateOpeningBalance'])->name('updateOpeningBalance');
        Route::delete('deleteOpeningBalance/{balance}', [BalanceController::class,'deleteOpeningBalance'])->name('deleteOpeningBalance');
    });

    Route::prefix('absence')->group(function () {
        Route::get('/', [AbsenceController::class, 'index'])->name('absence.index');
        Route::get('create', [AbsenceController::class, 'create'])->name('absence.create');
        Route::get('store', [AbsenceController::class, 'store'])->name('absence.store');
        Route::post('update/{id}', [AbsenceController::class, 'update'])->name('absence.update');
    });

    Route::prefix('profit')->group(function () {
        Route::get('/', [ProfitController::class, 'index'])->name('profit.index');
        Route::get('/income', [ProfitController::class, 'income'])->name('profit.income');
        Route::get('create', [ProfitController::class, 'create'])->name('profit.create');
        Route::get('store', [ProfitController::class, 'store'])->name('profit.store');
        Route::post('update/{id}', [ProfitController::class, 'update'])->name('profit.update');
    });

    Route::prefix('stores')->group(function () {
        Route::get('/', [StoreController::class, 'index'])->name('stores.index');
        Route::get('/income', [StoreController::class, 'income'])->name('stores.income');
        Route::get('create', [StoreController::class, 'create'])->name('stores.create');
        Route::post('store', [StoreController::class, 'store'])->name('stores.store');
        Route::prefix('movement')->group(function () {
            Route::get('/', [StoreController::class, 'indexMovement'])->name('stores.movement.index');
            Route::post('delete/{movement}', [StoreController::class, 'deleteMovement'])->name('stores.movement.delete');
            Route::get('create/', [StoreController::class, 'createMovement'])->name('stores.movement.create');
            Route::post('store/', [StoreController::class, 'storeMovement'])->name('stores.movement.store');
        });
        Route::prefix('product')->group(function () {
            Route::get('/', [StoreController::class, 'indexProducts'])->name('stores.product.index');
            Route::prefix('invoice')->group(function () {
                Route::get('purcahse', [StoreController::class, 'invoicePurchasedProduct'])->name('stores.product.invoice.purchases');
                Route::get('sales', [StoreController::class, 'invoiceSalesProduct'])->name('stores.product.invoice.sales');
                Route::post('store', [StoreController::class, 'storeInvoicePurchasedProduct'])->name('admin.product.invoices.store');
                Route::post('sales/store', [StoreController::class, 'storeInvoiceSalesProduct'])->name('admin.product.invoices.sales.store');
            });
            });
         Route::post('update/{id}', [StoreController::class, 'update'])->name('stores.update');
    });

    Route::get('/parent_infos', [ParentInfoController::class, 'index'])->name('parent_infos.index');
    Route::get('/parent_infos/add', [ParentInfoController::class, 'add'])->name('parent_infos.create');
    Route::post('/parent_infos', [ParentInfoController::class, 'store'])->name('parent_infos.store');
    Route::get('/parent_infos/{id}', [ParentInfoController::class, 'show'])->name('parent_infos.show');
    Route::get('/parent_infos/{id}/edit', [ParentInfoController::class, 'edit'])->name('parent_infos.edit');
    Route::post('/parent_infos/{id}', [ParentInfoController::class, 'update'])->name('parent_infos.update');
    Route::delete('/parent_infos/{id}', [ParentInfoController::class, 'destroy'])->name('parent_infos.destroy');

    Route::prefix('employees')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
        Route::get('/active', [EmployeeController::class, 'active'])->name('employees.active');
        Route::get('/archive', [EmployeeController::class, 'archive'])->name('employees.archive');
        Route::get('create', [EmployeeController::class, 'create'])->name('employees.create');
        Route::post('store', [EmployeeController::class, 'store'])->name('employees.store');
        Route::get('view/{id}', [EmployeeController::class, 'view'])->name('employees.view');
        Route::get('edit/{id}', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::post('update/{id}', [EmployeeController::class, 'update'])->name('employees.update');
        Route::delete('delete/{id}', [EmployeeController::class, 'delete'])->name('employees.delete');
        Route::post('/{id}/update-password',[EmployeeController::class, 'updatePassword'])->name('employees.update-password');
        Route::get('salaries/create', [EmployeeController::class, 'createSalary'])->name('salaries.create');
        Route::post('salaries/store', [EmployeeController::class, 'storeSalary'])->name('salaries.store');
        // Display attendance_leave and leave-related views
        Route::get('employees/attendance_leave', [\App\Http\Controllers\AttendanceLeaveController::class,'index'])->name('attendance_leave.index');
        Route::get('employees/attendance_leave/create', [\App\Http\Controllers\AttendanceLeaveController::class,'create'])->name('attendance_leave.create');
        // Handle attendance_leave and leave actions
        Route::post('attendance_leave/store', [\App\Http\Controllers\AttendanceLeaveController::class,'store'])->name('attendance_leave.store');


    });


Route::prefix('report')->group(function () {
    Route::get('course-revenue-report', [ReportController::class, 'revenueReportCoursesIndex'])->name('course-report.revenue-report');
    Route::get('bundle-revenue-report', [ReportController::class, 'revenueReportBundlesIndex'])->name('bundle-report.revenue-report');
    Route::get('consultation-revenue-report', [ReportController::class, 'revenueReportConsultationIndex'])->name('consultation-report.revenue-report');
    Route::get('order-report', [ReportController::class, 'orderReportIndex'])->name('report.order-report');
    Route::get('order-pending', [ReportController::class, 'orderReportPending'])->name('report.order-pending');
    Route::get('order-cancelled', [ReportController::class, 'orderReportCancelled'])->name('report.order-cancelled');
    Route::get('order-paid/{uuid}/{status}', [ReportController::class, 'orderReportPaidStatus'])->name('report.order-paid');
    Route::get('cancel-consultation-list', [ReportController::class, 'cancelConsultationList'])->name('report.cancel-consultation-list');
    Route::post('change-consultation-status', [ReportController::class, 'changeConsultationStatus'])->name('report.changeConsultationStatus');
});

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('edit/{uuid}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('update/{uuid}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('delete/{uuid}', [CategoryController::class, 'delete'])->name('category.delete');
});


Route::prefix('reports')->as('reports.')->group(function () {
    Route::get('/report_students_ages', [ReportController::class, 'reportStudentsAge'])->name('reportStudentsAge');
    Route::get('/report_parents', [ReportController::class, 'reportParents'])->name('reportParents');
});


Route::prefix('subcategory')->group(function () {
    Route::get('/', [SubcategoryController::class, 'index'])->name('subcategory.index');
    Route::get('create', [SubcategoryController::class, 'create'])->name('subcategory.create');
    Route::post('store', [SubcategoryController::class, 'store'])->name('subcategory.store');
    Route::get('edit/{uuid}', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('update/{uuid}', [SubcategoryController::class, 'update'])->name('subcategory.update');
    Route::get('delete/{uuid}', [SubcategoryController::class, 'delete'])->name('subcategory.delete');
});

Route::prefix('tag')->group(function () {
    Route::get('/', [TagController::class, 'index'])->name('tag.index');
    Route::get('create', [TagController::class, 'create'])->name('tag.create');
    Route::post('store', [TagController::class, 'store'])->name('tag.store');
    Route::get('edit/{uuid}', [TagController::class, 'edit'])->name('tag.edit');
    Route::patch('update/{uuid}', [TagController::class, 'update'])->name('tag.update');
    Route::get('delete/{uuid}', [TagController::class, 'delete'])->name('tag.delete');
});

Route::prefix('course-language')->group(function () {
    Route::get('/', [CourseLanguageController::class, 'index'])->name('course-language.index');
    Route::get('create', [CourseLanguageController::class, 'create'])->name('course-language.create');
    Route::post('store', [CourseLanguageController::class, 'store'])->name('course-language.store');
    Route::get('edit/{uuid}', [CourseLanguageController::class, 'edit'])->name('course-language.edit');
    Route::patch('update/{uuid}', [CourseLanguageController::class, 'update'])->name('course-language.update');
    Route::get('delete/{uuid}', [CourseLanguageController::class, 'delete'])->name('course-language.delete');
});

Route::prefix('difficulty-level')->group(function () {
    Route::get('/', [difficultyLevelController::class, 'index'])->name('difficulty-level.index');
    Route::get('create', [difficultyLevelController::class, 'create'])->name('difficulty-level.create');
    Route::post('store', [difficultyLevelController::class, 'store'])->name('difficulty-level.store');
    Route::get('edit/{uuid}', [difficultyLevelController::class, 'edit'])->name('difficulty-level.edit');
    Route::patch('update/{uuid}', [difficultyLevelController::class, 'update'])->name('difficulty-level.update');
    Route::get('delete/{uuid}', [difficultyLevelController::class, 'delete'])->name('difficulty-level.delete');
});

Route::group(['prefix' => 'special-promotional-tag', 'as' => 'special_promotional_tag.'], function () {
    Route::get('/', [SpecialPromotionTagController::class, 'index'])->name('index');
    Route::post('store', [SpecialPromotionTagController::class, 'store'])->name('store');
    Route::patch('update/{uuid}', [SpecialPromotionTagController::class, 'update'])->name('update');
    Route::delete('delete/{uuid}', [SpecialPromotionTagController::class, 'delete'])->name('delete');
    Route::get('edit-special-promotion-course/{uuid}', [SpecialPromotionTagController::class, 'editSpecialPromotionCourse'])->name('editSpecialPromotionCourse');

    Route::get('add-promotion-tag-course-list', [SpecialPromotionTagController::class, 'addPromotionCourseList'])->name('addPromotionTagCourseList');
    Route::get('remove-promotion-tag-course-list', [SpecialPromotionTagController::class, 'removePromotionCourseList'])->name('removePromotionTagCourseList');
});

Route::group(['prefix' => 'coupon', 'as' => 'coupon.'], function () {
    Route::get('/', [CouponController::class, 'index'])->name('index');
    Route::get('create', [CouponController::class, 'create'])->name('create');
    Route::post('store', [CouponController::class, 'store'])->name('store');
    Route::get('edit/{uuid}', [CouponController::class, 'edit'])->name('edit');
    Route::post('update/{uuid}', [CouponController::class, 'update'])->name('update');
    Route::get('delete/{uuid}', [CouponController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('create', [BlogController::class, 'create'])->name('create');
    Route::post('store', [BlogController::class, 'store'])->name('store');
    Route::get('edit/{uuid}', [BlogController::class, 'edit'])->name('edit');
    Route::post('update/{uuid}', [BlogController::class, 'update'])->name('update');
    Route::get('delete/{uuid}', [BlogController::class, 'delete'])->name('delete');
    Route::get('blog-comment-list', [BlogController::class, 'blogCommentList'])->name('blog-comment-list');
    Route::post('change-blog-comment-status', [BlogController::class, 'changeBlogCommentStatus'])->name('changeBlogCommentStatus');
    Route::get('blog-comment-delete/{id}', [BlogController::class, 'blogCommentDelete'])->name('blogComment.delete');

    Route::get('blog-category-index', [BlogCategoryController::class, 'index'])->name('blog-category.index');
    Route::post('blog-category-store', [BlogCategoryController::class, 'store'])->name('blog-category.store');
    Route::patch('blog-category-update/{uuid}', [BlogCategoryController::class, 'update'])->name('blog-category.update');
    Route::get('blog-category-delete/{uuid}', [BlogCategoryController::class, 'delete'])->name('blog-category.delete');
});


Route::group(['prefix' => 'certificate', 'as' => 'certificate.'], function () {
    Route::get('/', [CertificateController::class, 'index'])->name('index');
    Route::get('create', [CertificateController::class, 'create'])->name('create');
    Route::post('store', [CertificateController::class, 'store'])->name('store');
    Route::get('edit/{uuid}', [CertificateController::class, 'edit'])->name('edit');
    Route::post('update/{uuid}', [CertificateController::class, 'update'])->name('update');
    Route::get('delete/{uuid}', [CertificateController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => 'ranking-levels', 'as' => 'ranking.'], function () {
    Route::get('index', [RankingLevelController::class, 'index'])->name('index');
    Route::post('store', [RankingLevelController::class, 'store'])->name('store');
    Route::get('edit/{uuid}', [RankingLevelController::class, 'edit'])->name('edit');
    Route::patch('update/{uuid}', [RankingLevelController::class, 'update'])->name('update');
    Route::get('delete/{uuid}', [RankingLevelController::class, 'delete'])->name('delete');
});

Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('admin.profile');
    Route::get('change-password', [ProfileController::class, 'changePassword'])->name('admin.change-password');
    Route::post('change-password', [ProfileController::class, 'changePasswordUpdate'])->name('admin.change-password.update');
    Route::post('update', [ProfileController::class, 'update'])->name('admin.profile.update');
});


Route::prefix('language')->group(function () {
    Route::get('/', [LanguageController::class, 'index'])->name('language.index');
    Route::get('create', [LanguageController::class, 'create'])->name('language.create');
    Route::post('store', [LanguageController::class, 'store'])->name('language.store');
    Route::get('edit/{id}/{iso_code?}', [LanguageController::class, 'edit'])->name('language.edit');
    Route::post('update/{id}', [LanguageController::class, 'update'])->name('language.update');
    Route::get('translate/{id}', [LanguageController::class, 'translateLanguage'])->name('language.translate');
    Route::post('update-translate/{id}', [LanguageController::class, 'updateTranslate'])->name('update.translate');
    Route::get('delete/{id}', [LanguageController::class, 'delete'])->name('language.delete');
    Route::post('import',[LanguageController::class, 'import'])->name('language.import');
    Route::post('update-language/{id}',[LanguageController::class, 'updateLanguage'])->name('update-language');
});

Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
    Route::get('contact-us-list', [ContactUsController::class, 'contactUsIndex'])->name('index');
    Route::delete('contact-us-delete/{id}', [ContactUsController::class, 'contactUsDelete'])->name('delete');
    Route::resource('issue', ContactUsIssueController::class);
});

Route::group(['prefix' => 'support-ticket', 'as' => 'support-ticket.'], function () {
    Route::get('index', [SupportTicketController::class, 'ticketIndex'])->name('admin.index');
    Route::get('open', [SupportTicketController::class, 'ticketOpen'])->name('admin.open');
    Route::get('show/{uuid}', [SupportTicketController::class, 'ticketShow'])->name('admin.show');
    Route::get('delete/{uuid}', [SupportTicketController::class, 'ticketDelete'])->name('admin.delete');
    Route::post('change-ticket-status', [SupportTicketController::class, 'changeTicketStatus'])->name('admin.changeTicketStatus');
    Route::post('message-store', [SupportTicketController::class, 'messageStore'])->name('admin.messageStore');
});



//Start:: Page
Route::group(['prefix' => 'pages', 'as' => 'page.'], function () {
    Route::get('/', [PageController::class, 'index'])->name('index');
    Route::get('create', [PageController::class, 'create'])->name('create');
    Route::post('store', [PageController::class, 'store'])->name('store');
    Route::get('edit/{uuid}', [PageController::class, 'edit'])->name('edit');
    Route::post('update/{uuid}', [PageController::class, 'update'])->name('update');
    Route::get('delete/{uuid}', [PageController::class, 'delete'])->name('delete');
});
//End:: Page



//Start:: Menu
Route::group(['prefix' => 'menus', 'as' => 'menu.'], function () {
    Route::get('static-menu', [MenuController::class, 'staticMenu'])->name('static');
    Route::patch('static-menu/{slug}', [MenuController::class, 'staticMenuUpdate'])->name('static.update');
    Route::get('dynamic-menu', [MenuController::class, 'dynamicMenu'])->name('dynamic');
    Route::post('dynamic-menu-store', [MenuController::class, 'dynamicMenuStore'])->name('dynamic.store');
    Route::patch('dynamic-menu-update/{id}', [MenuController::class, 'dynamicMenuUpdate'])->name('dynamic.update');
    Route::get('dynamic-menu-delete/{id}', [MenuController::class, 'dynamicMenuDelete'])->name('dynamic.delete');
});
//End:: Menu

Route::name('admin.')->group(function (){
    Route::group(['prefix' => 'forum', 'as' => 'forum.'], function (){
        Route::get('category-index', [ForumCategoryController::class, 'index'])->name('category.index');
        Route::post('category-store', [ForumCategoryController::class, 'store'])->name('category.store');
        Route::patch('category-update/{uuid}', [ForumCategoryController::class, 'update'])->name('category.update');
        Route::get('category-delete/{uuid}', [ForumCategoryController::class, 'delete'])->name('category.delete');
    });
});

Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
    //Start:: General Settings
    Route::get('general-settings', [SettingController::class, 'GeneralSetting'])->name('general_setting');
    Route::post('general-settings-update', [SettingController::class, 'GeneralSettingUpdate'])->name('general_setting.cms.update');

    Route::get('metas', [SettingController::class, 'metaIndex'])->name('meta.index');
    Route::get('meta/edit/{uuid}', [SettingController::class, 'editMeta'])->name('meta.edit');
    Route::post('meta/update/{uuid}', [SettingController::class, 'updateMeta'])->name('meta.update');

    Route::get('site-share-content', [SettingController::class, 'siteShareContent'])->name('site-share-content');
    Route::get('color-settings', [SettingController::class, 'colorSettings'])->name('color-settings');
    Route::get('font-settings', [SettingController::class, 'fontSettings'])->name('font-settings');
    //End:: General Settings

    //Start:: Maintenance Mode
    Route::get('maintenance-mode-changes', [SettingController::class, 'maintenanceMode'])->name('maintenance');
    Route::post('maintenance-mode-changes', [SettingController::class, 'maintenanceModeChange'])->name('maintenance.change');
    //End:: Maintenance Mode

    //Start:: BigBlueButton Settings
    Route::get('bbb-settings', [SettingController::class, 'BBBSettings'])->name('bbb-settings');
    Route::post('bbb-settings-update', [SettingController::class, 'BBBSettingsUpdate'])->name('bbb-settings.update');

    //Start:: Jitsi Settings
    Route::get('jitsi-settings', [SettingController::class, 'JitsiSettings'])->name('jitsi-settings');
    Route::post('jitsi-settings-update', [SettingController::class, 'JitsiSettingsUpdate'])->name('jitsi-settings.update');

    //Start:: Social Login Settings
    Route::get('social-login-settings', [SettingController::class, 'socialLoginSettings'])->name('social-login-settings');
    Route::post('social-settings-update', [SettingController::class, 'socialLoginSettingsUpdate'])->name('social-login-settings.update');

    //Start:: Cookie Settings
    Route::get('cookie-settings', [SettingController::class, 'cookieSettings'])->name('cookie-settings');
    Route::post('cookie-settings-update', [SettingController::class, 'cookieSettingsUpdate'])->name('cookie-settings.update');

    //Start:: AWS S3 Settings
    Route::get('storage-settings', [SettingController::class, 'storageSettings'])->name('storage-settings');
    Route::post('storage-settings-update', [SettingController::class, 'storageSettingsUpdate'])->name('storage-settings.update');

    //Start:: Vimeo Settings
    Route::get('vimeo-settings', [SettingController::class, 'vimeoSettings'])->name('vimeo-settings');
    Route::post('vimeo-settings-update', [SettingController::class, 'vimeoSettingsUpdate'])->name('vimeo-settings.update');

    //Start:: Currency Settings
    Route::group(['prefix' => 'currency', 'as' => 'currency.'], function () {
        Route::get('', [CurrencyController::class, 'index'])->name('index');
        Route::post('currency', [CurrencyController::class, 'store'])->name('store');
        Route::get('edit/{id}/{slug?}', [CurrencyController::class, 'edit'])->name('edit');
        Route::patch('update/{id}', [CurrencyController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [CurrencyController::class, 'delete'])->name('delete');
    });

    //Start:: Home Settings
    Route::get('section-settings', [HomeSettingController::class, 'sectionSettings'])->name('section-settings');
    Route::post('sectionSettingsStatusChange', [HomeSettingController::class, 'sectionSettingsStatusChange'])->name('sectionSettingsStatusChange');
    Route::get('banner-section-settings', [HomeSettingController::class, 'bannerSection'])->name('banner-section');
    Route::post('banner-section-settings', [HomeSettingController::class, 'bannerSectionUpdate'])->name('banner-section.update');
    Route::get('special-feature-section-settings', [HomeSettingController::class, 'specialFeatureSection'])->name('special-feature-section');
    Route::get('course-section-settings', [HomeSettingController::class, 'courseSection'])->name('course-section');
    Route::get('bundle-course-section-settings', [HomeSettingController::class, 'bundleCourseSection'])->name('bundle-course-section');
    Route::get('top-category-section-settings', [HomeSettingController::class, 'topCategorySection'])->name('top-category-section');
    Route::get('top-instructor-section-settings', [HomeSettingController::class, 'topInstructorSection'])->name('top-instructor-section');
    Route::get('become-instructor-video-section-settings', [HomeSettingController::class, 'becomeInstructorVideoSection'])->name('become-instructor-video-section');
    Route::get('customer-say-section-settings', [HomeSettingController::class, 'customerSaySection'])->name('customer-say-section');
    Route::get('achievement-section-settings', [HomeSettingController::class, 'achievementSection'])->name('achievement-section');
    //End:: Home Settings

    //Start:: Mail Config
    Route::get('mail-configuration', [SettingController::class, 'mailConfiguration'])->name('mail-configuration');
    Route::post('send-test-mail', [SettingController::class, 'sendTestMail'])->name('send.test.mail');
    Route::post('save-setting', [SettingController::class, 'saveSetting'])->name('save.setting');
    //End:: Mail Config

    //Start:: Become an Instructor
    Route::get('instructor-feature-settings', [SettingController::class, 'instructorFeatureSetting'])->name('instructor-feature');
    Route::post('instructor-feature-settings', [SettingController::class, 'instructorFeatureSettingUpdate'])->name('instructor-feature.update');

    Route::get('instructor-procedure-settings', [SettingController::class, 'instructorProcedureSetting'])->name('instructor-procedure');
    Route::post('instructor-procedure-settings', [SettingController::class, 'instructorProcedureSettingUpdate'])->name('instructor-procedure.update');
    Route::get('instructor-cms', [SettingController::class, 'instructorCMSSetting'])->name('instructor.cms');
    //End:: Become an Instructor

    //Start:: FAQ Question & Answer
    Route::get('faq-settings', [SettingController::class, 'faqCMS'])->name('faq.cms');
    Route::get('faq-tab', [SettingController::class, 'faqTab'])->name('faq.tab');
    Route::get('faq-question-settings', [SettingController::class, 'faqQuestion'])->name('faq.question');
    Route::post('faq-question-settings', [SettingController::class, 'faqQuestionUpdate'])->name('faq.question.update');
    //End:: FAQ Question & Answer

    //Start:: Support Ticket
    Route::group(['prefix' => 'support-ticket', 'as' => 'support-ticket.'], function () {
        Route::get('/', [SettingController::class, 'supportTicketCMS'])->name('cms');
        Route::get('question-answer', [SettingController::class, 'supportTicketQuesAns'])->name('question');
        Route::post('question-answer', [SettingController::class, 'supportTicketQuesAnsUpdate'])->name('question.update');

        Route::get('department', [SupportTicketController::class, 'Department'])->name('department');
        Route::post('department', [SupportTicketController::class, 'DepartmentStore'])->name('department.store');
        Route::delete('department-delete/{uuid}', [SupportTicketController::class, 'departmentDelete'])->name('department.delete');

        Route::get('priority', [SupportTicketController::class, 'Priority'])->name('priority');
        Route::post('priority', [SupportTicketController::class, 'PriorityStore'])->name('priority.store');
        Route::delete('priorities-delete/{uuid}', [SupportTicketController::class, 'priorityDelete'])->name('priority.delete');

        Route::get('services', [SupportTicketController::class, 'RelatedService'])->name('services');
        Route::post('services', [SupportTicketController::class, 'RelatedServiceStore'])->name('services.store');
        Route::delete('services-delete/{uuid}', [SupportTicketController::class, 'relatedServiceDelete'])->name('services.delete');
    });
    //End:: Support Ticket

    // Start:: Contact Us
    Route::get('contact-us-cms', [ContactUsController::class, 'contactUsCMS'])->name('contact.cms');
    // End:: Contact Us

    Route::get('payment-method', [SettingController::class, 'paymentMethod'])->name('payment_method_settings');

    //start:: Bank
    Route::group(['prefix' => 'bank'], function () {
        Route::get('/', [BankController::class, 'index'])->name('bank.index');
        Route::post('/store', [BankController::class, 'store'])->name('bank.store');
        Route::get('/edit/{id}', [BankController::class, 'edit'])->name('bank.edit');
        Route::patch('/update/{id}', [BankController::class, 'update'])->name('bank.update');
        Route::get('/status/{id}', [BankController::class, 'status'])->name('bank.status');
        Route::delete('delete/{id}', [BankController::class, 'delete'])->name('bank.delete');
    });

    // Start:: About Us
    Route::group(['prefix' => 'about', 'as' => 'about.'], function () {
        Route::get('about-us-gallery-area', [AboutUsController::class, 'galleryArea'])->name('gallery-area');
        Route::post('about-us-gallery-area', [AboutUsController::class, 'galleryAreaUpdate'])->name('gallery-area.update');

        Route::get('about-us-our-history', [AboutUsController::class, 'ourHistory'])->name('our-history');
        Route::post('about-us-our-history', [AboutUsController::class, 'ourHistoryUpdate'])->name('our-history.update');

        Route::get('about-us-upgrade-skill', [AboutUsController::class, 'upgradeSkill'])->name('upgrade-skill');
        Route::post('about-us-upgrade-skill', [AboutUsController::class, 'upgradeSkillUpdate'])->name('upgrade-skill.update');

        Route::get('about-us-team-member', [AboutUsController::class, 'teamMember'])->name('team-member');
        Route::post('about-us-team-member', [AboutUsController::class, 'teamMemberUpdate'])->name('team-member.update');

        Route::get('about-us-instructor-support', [AboutUsController::class, 'instructorSupport'])->name('instructor-support');
        Route::post('about-us-instructor-support', [AboutUsController::class, 'instructorSupportUpdate'])->name('instructor-support.update');

        Route::get('about-us-client', [AboutUsController::class, 'client'])->name('client');
        Route::post('about-us-client', [AboutUsController::class, 'clientUpdate'])->name('client.update');
    });
    // End:: About Us
    Route::group(['prefix' => 'locations', 'as' => 'location.'], function () {
        Route::get('country', [LocationController::class, 'countryIndex'])->name('country.index');
        Route::post('country', [LocationController::class, 'countryStore'])->name('country.store');
        Route::get('country/{id}/{slug?}', [LocationController::class, 'countryEdit'])->name('country.edit');
        Route::patch('country/{id}', [LocationController::class, 'countryUpdate'])->name('country.update');
        Route::delete('country/delete/{id}', [LocationController::class, 'countryDelete'])->name('country.delete');

        Route::get('state', [LocationController::class, 'stateIndex'])->name('state.index');
        Route::post('state', [LocationController::class, 'stateStore'])->name('state.store');
        Route::get('state/{id}/{slug?}', [LocationController::class, 'stateEdit'])->name('state.edit');
        Route::patch('state/{id}', [LocationController::class, 'stateUpdate'])->name('state.update');
        Route::delete('state/delete/{id}', [LocationController::class, 'stateDelete'])->name('state.delete');

        Route::get('city', [LocationController::class, 'cityIndex'])->name('city.index');
        Route::post('city', [LocationController::class, 'cityStore'])->name('city.store');
        Route::get('city/{id}/{slug?}', [LocationController::class, 'cityEdit'])->name('city.edit');
        Route::patch('city/{id}', [LocationController::class, 'cityUpdate'])->name('city.update');
        Route::delete('city/delete/{id}', [LocationController::class, 'cityDelete'])->name('city.delete');
    });

    //Migrate, Cache
    Route::get('cache-settings', [SettingController::class, 'cacheSettings'])->name('cache-settings');
    Route::get('cache-update/{id}', [SettingController::class, 'cacheUpdate'])->name('cache-update');
    Route::get('migrate-settings', [SettingController::class, 'migrateSettings'])->name('migrate-settings');
    Route::get('migrate-update', [SettingController::class, 'migrateUpdate'])->name('migrate-update');
});

Route::get('privacy-policy', [PolicyController::class, 'privacyPolicy'])->name('admin.privacy-policy');
Route::post('privacy-policy', [PolicyController::class, 'privacyPolicyStore'])->name('admin.privacy-policy.store');

Route::get('terms-conditions', [PolicyController::class, 'termConditions'])->name('admin.terms-conditions');
Route::post('terms-conditions', [PolicyController::class, 'termConditionsStore'])->name('admin.terms-conditions.store');

Route::get('cookie-policy', [PolicyController::class, 'cookiePolicy'])->name('admin.cookie-policy');
Route::post('cookie-policy', [PolicyController::class, 'cookiePolicyStore'])->name('admin.cookie-policy.store');


Route::group(['prefix' => 'affiliate','as' => 'affiliate.'], function () {

    // TODO:don't delete,  this will need
//    Route::get('/affiliator-history', function () {
//        return view('admin.affiliate.affiliator-history');
//    })->name('affiliator-history');

//    Route::get('/payouts', function () {
//        return view('admin.affiliate.payouts');
//    })->name('payouts');

    Route::get('affiliation-settings', [SettingController::class, 'referralSettings'])->name('affiliation-settings');
    Route::post('referral-settings-update', [SettingController::class, 'referralSettingsUpdate'])->name('referral-settings.update');

    Route::get('affiliate-request-list', [AffiliateController::class, 'affiliateRequestList'])->name('affiliate-request-list');
    Route::post('affiliate-request-status-change', [AffiliateController::class, 'affiliateRequestStatusChange'])->name('affiliate-request-status-change');

    Route::get('affiliate-history', [AffiliateController::class, 'affiliateHistory'])->name('affiliate-history');
    Route::get('affiliate-history-date', [AffiliateController::class, 'allAffiliates'])->name('affiliate-history-data');
});


});

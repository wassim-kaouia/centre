<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BulkSmsController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentDetailController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', [HomeController::class, 'main'])->name('main');
Route::get('/login_register', [HomeController::class, 'login_register'])->name('login.register')->middleware('islogged');
Route::post('/nouveau/etudiant', [HomeController::class, 'store_user_front'])->name('etudiant.register')->middleware('islogged');
Route::get('/formations/lists', [CourseController::class, 'show_courses_front'])->name('show.courses');
Route::get('/formation/{id}/show/{category}', [CourseController::class, 'show_detail'])->name('show.detail.course');
Route::get('/politiques', [HomeController::class, 'politiques'])->name('home.politiques');
Route::get('/conditions', [HomeController::class, 'conditions'])->name('home.conditions');
Route::get('/contacter', [HomeController::class, 'contact'])->name('home.contact');
Route::get('quisommenous', [HomeController::class, 'aboutus'])->name('home.about');

Route::middleware(['auth', 'rolechecker'])->group(function () {
//Update User Details
    Route::get('/dashboard', [HomeController::class, 'root'])->name('root');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit_profile/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/edited_profile', [UserController::class, 'profile_edit'])->name('users.edited');
    Route::get('users/show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/delete', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/update-profile/{id}', [HomeController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/update-password/{id}', [HomeController::class, 'updatePassword'])->name('updatePassword');

});

Route::middleware(['auth', 'rolechecker'])->group(function () {
//tags
    Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    Route::post('/tags', [TagController::class, 'store'])->name('tags.create');
    Route::delete('/tags/delete', [TagController::class, 'destroy'])->name('tags.destroy');
});

Route::middleware(['auth', 'rolechecker'])->group(function () {
//categories
    Route::get('/category', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/category', [CategoryController::class, 'store'])->name('categories.create');
    Route::delete('/category/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::middleware(['auth', 'rolechecker'])->group(function () {
//etudiants
    Route::get('/etudiant', [StudentController::class, 'index'])->name('etudiants.index');
    Route::get('/etudiant/create', [StudentController::class, 'create'])->name('etudiants.create');
    Route::get('/etudiant/edit/{id}', [StudentController::class, 'edit'])->name('etudiants.edit');
    Route::post('/etudiant', [StudentController::class, 'store'])->name('etudiants.store');
    Route::get('/etudiant/show/{id}', [StudentController::class, 'show'])->name('etudiants.show');
    Route::get('/etudiant/perId/{id}', [StudentController::class, 'getStudent'])->name('etudiant.get');
    Route::put('/etudiant/{id}', [StudentController::class, 'update'])->name('etudiants.update');
    Route::delete('/etudiant/delete', [StudentController::class, 'destroy'])->name('etudiants.destroy');
    Route::post('/etudiant/course', [StudentController::class, 'bookCourse'])->name('etudiants.book');
    Route::post('/etudiant/course/delete', [StudentController::class, 'deleteBookedCourse'])->name('etudiants.bookDelete');
    Route::post('/attachment_upload/etudiant', [StudentController::class, 'upload_documents'])->name('attachments.etudiant.store');
    Route::get('/attachment_download/{id}/etudiant', [StudentController::class, 'download_document'])->name('attachments.etudiant.download');
    Route::get('/attachment_view/{id}/etudiant', [StudentController::class, 'view_document'])->name('attachments.etudiant.view');
    Route::delete('/attachment_destroy/etudiant', [StudentController::class, 'destroy_document'])->name('attachments.etudiant.destroy');
});

Route::middleware(['auth', 'rolechecker'])->group(function () {
//instructor
    Route::get('/formateurs', [InstructorController::class, 'index'])->name('formateurs.index');
    Route::get('/formateur/create', [InstructorController::class, 'create'])->name('formateurs.create');
    Route::get('/formateur/edit/{id}', [InstructorController::class, 'edit'])->name('formateurs.edit');
    Route::post('/formateur/store', [InstructorController::class, 'store'])->name('formateurs.store');
    Route::get('/formateur/show/{id}', [InstructorController::class, 'show'])->name('formateurs.show');
    Route::put('/formateur/{id}', [InstructorController::class, 'update'])->name('formateurs.update');
    Route::delete('/formateur/delete', [InstructorController::class, 'destroy'])->name('formateurs.destroy');
    Route::post('/attachment_upload/formateur', [InstructorController::class, 'upload_documents'])->name('attachments.formateur.store');
    Route::get('/attachment_download/{id}/formateur', [InstructorController::class, 'download_document'])->name('attachments.formateur.download');
    Route::get('/attachment_view/{id}/formateur', [InstructorController::class, 'view_document'])->name('attachments.formateur.view');
    Route::delete('/attachment_destroy/formateur', [InstructorController::class, 'destroy_document'])->name('attachments.formateur.destroy');
});

Route::middleware(['auth', 'rolechecker'])->group(function () {
//course
    Route::get('/formations', [CourseController::class, 'index'])->name('formations.index');
    Route::get('/formation/create', [CourseController::class, 'create'])->name('formations.create');
    Route::post('/formation/store', [CourseController::class, 'store'])->name('formations.store');
    Route::post('/formation/edit/{id}', [CourseController::class, 'edit'])->name('formations.edit');
    Route::put('/formation/update', [CourseController::class, 'update'])->name('formations.update');
    Route::get('/formation/{id}/edit', [CourseController::class, 'edit'])->name('formations.edit');
    Route::delete('/formation/{id}/delete', [CourseController::class, 'destroy'])->name('formations.destroy');
    Route::get('/formation/non-approuver', [CourseController::class, 'pendingCourses'])->name('formations.pending');
    Route::get('/formation/approuver/{id}/{approuver}', [CourseController::class, 'approuveCourse'])->name('formations.approuved');
});

Route::middleware(['auth'])->group(function () {
//payment
    Route::get('/paiements', [PaymentController::class, 'index'])->name('paiements.index')->middleware('rolechecker');
    Route::get('/paiements/paid', [PaymentController::class, 'paid'])->name('paiements.paid')->middleware('rolechecker');;
    Route::get('/paiements/avance', [PaymentController::class, 'withavance'])->name('paiements.avance')->middleware('rolechecker');;
    Route::get('/paiement/create/{student}', [PaymentController::class, 'create'])->name('paiements.create')->middleware('rolechecker');;
    Route::get('/paiements/show/{id}', [PaymentController::class, 'show'])->name('paiements.show')->middleware('rolechecker');;
    Route::post('/paiements', [PaymentController::class, 'store'])->name('paiements.store');
    Route::put('/paiement/{id}', [PaymentController::class, 'update'])->name('paiements.update')->middleware('rolechecker');;
    Route::delete('/paiement/{id}', [PaymentController::class, 'destroy'])->name('paiements.destroy')->middleware('rolechecker');;
});

Route::middleware(['auth', 'rolechecker'])->group(function () {
//payment detail
    Route::get('/payemnts_details/{id}', [PaymentDetailController::class, 'getHistoriques'])->name('historique.payments');
    Route::get('/payment_details/edit/{id}', [PaymentDetailController::class, 'edit'])->name('historique.edit');
    Route::post('/payment_details/regularisation', [PaymentDetailController::class, 'regularisation'])->name('historique.update');
});

Route::middleware(['auth', 'rolechecker'])->group(function () {
//invocie
    Route::get('invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('receipts/complet', [InvoiceController::class, 'getPaidReceipts'])->name('invoices.receipt');
    Route::get('receipts/avance', [InvoiceController::class, 'getAvanceReceipts'])->name('invoices.avance');
    Route::get('invoice/show/{id}', [InvoiceController::class, 'show_invoice'])->name('invoices.show');
    Route::get('receipt/show/{id}', [InvoiceController::class, 'show_receipt_avance'])->name('receipts.show');
    Route::get('receipt/paiement/show/{id}', [InvoiceController::class, 'show_paid'])->name('paiements.show');
    Route::delete('invoice/delete', [InvoiceController::class, 'destroy_invoice'])->name('invoices.destroy');
    Route::delete('receipt/delete', [InvoiceController::class, 'destroy_receipt'])->name('receipts.destroy');
});

Route::middleware(['auth', 'rolechecker'])->group(function () {
//fees
    Route::get('fees/index', [FeesController::class, 'create'])->name('fees.index');
    Route::put('fees/update', [FeesController::class, 'update'])->name('fees.update');
});

Route::middleware(['auth', 'rolechecker'])->group(function () {
//calendar
    Route::get('calendrier/courses', [CalendarController::class, 'index'])->name('calendar.index');
});

Route::middleware(['auth', 'rolechecker'])->group(function () {
//promotions
    Route::get('smsbulk/index', [BulkSmsController::class, 'index'])->name('sms.index');
    Route::post('smsbulk/send/compaign', [BulkSmsController::class, 'sndSms'])->name('sms.send');
});

Route::middleware(['auth', 'rolechecker'])->group(function () {
    Route::get('/parametres/modification', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/parametres/miseajour', [SettingController::class, 'update'])->name('settings.update');
    Route::get('/page/conditions', [SettingController::class, 'show_conditions_page'])->name('settings.conditionPage');
    Route::get('/page/politique', [SettingController::class, 'show_politiques_page'])->name('settings.politiquePage');
    Route::post('/pages/conditions', [SettingController::class, 'conditions'])->name('settings.conditions');
    Route::post('/pages/politiques', [SettingController::class, 'politiques'])->name('settings.politique');
    Route::put('/pages/politiques/update', [SettingController::class, 'politiques_update'])->name('settings.edit_politique');
    Route::put('/pages/conditions/update', [SettingController::class, 'conditions_update'])->name('settings.edit_conditions');
});

Route::post('/contacter/email', [ContactController::class, 'sendMail'])->name('mail.send');

Route::post('/commentaire/ajouter', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('getPartenaires', [PartnerController::class, 'index'])->name('partner.index');
Route::delete('deletePartenaires/{id}', [PartnerController::class, 'destroy'])->name('partner.destroy');
Route::post('/partenairs/sauvegarder', [PartnerController::class, 'store'])->name('partner.store');

Route::get('/pageQuisommenous', [AboutController::class, 'aboutus'])->name('about.index');
Route::post('/quisommenous/ajouter', [AboutController::class, 'store'])->name('about.create');
Route::put('/quisommenous/miseajour', [AboutController::class, 'update'])->name('about.update');

Route::view('/bulksms', 'testsms');
Route::get('/getNumbers/{id}', [BulkSmsController::class, 'dataToViewOnRequest'])->name('sms.numbers');
Route::post('/sendSMS', [BulkSmsController::class, 'sendSMS'])->name('sms.send');

Route::middleware(['auth', 'rolechecker'])->group(function () {
    Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
    Route::post('/blog/post', [BlogController::class, 'store'])->name('blog.store');
    Route::put('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/blog/modifier/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::get('/blog/show/{id}', [BlogController::class, 'show'])->name('blog.show');
    Route::delete('/blog/delete', [BlogController::class, 'destroy'])->name('blog.destroy');

    Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/comments', [CommentController::class, 'show_comments'])->name('comment.show');
});

Route::get('/blog/index', [HomeController::class, 'blogs'])->name('home.blogs');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

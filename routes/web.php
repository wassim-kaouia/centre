<?php

use App\Models\Payment;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UploadAttachment;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\InstructorController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'root'])->name('root');
Route::get('/testpage',function(){
    return view('frontend.home.index');
});

Route::get('/testcourse',function(){
    return view('courses.index');
});


Route::get('/getpdf',function(){
    // set_time_limit(300);
    $data = Payment::find(1);

    view()->share('payment',$data);
    $pdf = PDF::loadview('invoices.model',$data)->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

    return $pdf->stream('wassim.pdf');
});

Route::get('testpagehtml',function(){
    $data = Payment::find(1);

    view()->share('payment',$data);
    return view('invoices.modele_invoice');
});


//Update User Details
Route::get('/users',[UserController::class,'index'])->name('users.index');
Route::get('/users/create',[UserController::class,'create'])->name('users.create');
Route::post('/users/store',[UserController::class,'store'])->name('users.store');
Route::get('/users/edit_profile/{id}',[UserController::class,'edit'])->name('users.edit');
Route::put('/users/edited_profile',[UserController::class,'profile_edit'])->name('users.edited');
Route::get('users/show/{id}',[UserController::class,'show'])->name('users.show');
Route::delete('/users/delete',[UserController::class,'destroy'])->name('users.destroy');
Route::post('/update-profile/{id}', [HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [HomeController::class, 'updatePassword'])->name('updatePassword');

//tags
Route::get('/tags',[TagController::class,'index'])->name('tags.index');
Route::post('/tags',[TagController::class,'store'])->name('tags.create');
Route::delete('tags/delete',[TagController::class,'destroy'])->name('tags.destroy');

//categories
Route::get('/category',[CategoryController::class,'index'])->name('categories.index');
Route::post('/category',[CategoryController::class,'store'])->name('categories.create');
Route::delete('category/delete',[CategoryController::class,'destroy'])->name('categories.destroy');

//etudiants 
Route::get('/etudiant',[StudentController::class,'index'])->name('etudiants.index');
Route::get('/etudiant/create',[StudentController::class,'create'])->name('etudiants.create');
Route::get('/etudiant/edit/{id}',[StudentController::class,'edit'])->name('etudiants.edit');
Route::post('/etudiant',[StudentController::class,'store'])->name('etudiants.store');
Route::get('/etudiant/show/{id}',[StudentController::class,'show'])->name('etudiants.show');
Route::get('/etudiant/perId/{id}',[StudentController::class,'getStudent'])->name('etudiant.get');
Route::put('/etudiant/{id}',[StudentController::class,'update'])->name('etudiants.update');
Route::delete('/etudiant/delete',[StudentController::class,'destroy'])->name('etudiants.destroy');
Route::post('/etudiant/course',[StudentController::class,'bookCourse'])->name('etudiants.book');
Route::post('/etudiant/course/delete',[StudentController::class,'deleteBookedCourse'])->name('etudiants.bookDelete');
Route::post('/attachment_upload/etudiant',[StudentController::class,'upload_documents'])->name('attachments.etudiant.store');
Route::get('/attachment_download/{id}/etudiant',[StudentController::class,'download_document'])->name('attachments.etudiant.download');
Route::get('/attachment_view/{id}/etudiant',[StudentController::class,'view_document'])->name('attachments.etudiant.view');
Route::delete('/attachment_destroy/etudiant',[StudentController::class,'destroy_document'])->name('attachments.etudiant.destroy');

//instructor 
Route::get('/formateurs',[InstructorController::class,'index'])->name('formateurs.index');
Route::get('/formateur/create',[InstructorController::class,'create'])->name('formateurs.create');
Route::get('/formateur/edit/{id}',[InstructorController::class,'edit'])->name('formateurs.edit');
Route::post('/formateur/store',[InstructorController::class,'store'])->name('formateurs.store');
Route::get('/formateur/show/{id}',[InstructorController::class,'show'])->name('formateurs.show');
Route::put('/formateur/{id}',[InstructorController::class,'update'])->name('formateurs.update');
Route::delete('/formateur/delete',[InstructorController::class,'destroy'])->name('formateurs.destroy');
Route::post('/attachment_upload/formateur',[InstructorController::class,'upload_documents'])->name('attachments.formateur.store');
Route::get('/attachment_download/{id}/formateur',[InstructorController::class,'download_document'])->name('attachments.formateur.download');
Route::get('/attachment_view/{id}/formateur',[InstructorController::class,'view_document'])->name('attachments.formateur.view');
Route::delete('/attachment_destroy/formateur',[InstructorController::class,'destroy_document'])->name('attachments.formateur.destroy');

//course
Route::get('/formations',[CourseController::class,'index'])->name('formations.index');
Route::get('/formation/create',[CourseController::class,'create'])->name('formations.create');
Route::post('/formation/store',[CourseController::class,'store'])->name('formations.store');
Route::post('/formation/edit/{id}',[CourseController::class,'edit'])->name('formations.edit');
Route::put('/formation/update',[CourseController::class,'update'])->name('formations.update');
Route::get('/formation/{id}/edit',[CourseController::class,'edit'])->name('formations.edit');
Route::delete('/formation/{id}/delete',[CourseController::class,'destroy'])->name('formations.destroy');
Route::get('/formation/non-approuver',[CourseController::class,'pendingCourses'])->name('formations.pending');
Route::get('/formation/approuver/{id}/{approuver}',[CourseController::class,'approuveCourse'])->name('formations.approuved');

//payment
Route::get('/paiements',[PaymentController::class,'index'])->name('paiements.index');
Route::get('/paiements/paid',[PaymentController::class,'paid'])->name('paiements.paid');
Route::get('/paiements/avance',[PaymentController::class,'withavance'])->name('paiements.avance');
Route::get('/paiement/create/{student}',[PaymentController::class,'create'])->name('paiements.create');
Route::get('/paiements/show/{id}',[PaymentController::class,'show'])->name('paiements.show');
Route::post('/paiements',[PaymentController::class,'store'])->name('paiements.store');
Route::put('/paiement/{id}',[PaymentController::class,'update'])->name('paiements.update');
Route::delete('/paiement/{id}',[PaymentController::class,'destroy'])->name('paiements.destroy');


//invocie
Route::get('invoices',[InvoiceController::class,'index'])->name('invoices.index');
Route::get('invoice/show/{id}',[InvoiceController::class,'show'])->name('invoices.show');
Route::delete('invoice/delete',[InvoiceController::class,'destroy'])->name('invoices.destroy');

//fees
Route::get('fees/index',[FeesController::class,'create'])->name('fees.index');
Route::put('fees/update',[FeesController::class,'update'])->name('fees.update');



Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


<?php

use App\Http\Controllers\AcademicController;
use App\Http\Controllers\ActivityCategoryController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdmissionProcessController;
use App\Http\Controllers\CircularController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DocumentInformationController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GeneralInformationController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\MandatoryPublicDisclosureController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SchoolInfrastructureController;
use App\Http\Controllers\SliderImageController;
use App\Http\Controllers\TeachingStaffController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('admission-process', 'admissionProcess')->name('frontend.admission-process');
    Route::get('about', 'about')->name('frontend.about');
    Route::get('contact', 'contact')->name('frontend.contact');
    Route::get('academic', 'academic')->name('frontend.academic');
    Route::get('academicDownload/{id}/{fileIndex}', 'academicDownload')->name('academic.download');
    Route::get('gallery', 'gallery')->name('frontend.gallery');
    Route::get('documentsInformation', 'documentsInformation')->name('frontend.documents-information');
    Route::get('documentsInformationDownload/{id}/{fileIndex}', 'documentsInformationDownload')->name('documentsInformation.download');
    Route::get('event', 'event')->name('frontend.event');
    Route::get('magazine', 'magazine')->name('frontend.magazine');
    Route::get('/searchMagazines', 'searchMagazine')->name('magazine.index');
    Route::get('download/{id}/{fileIndex}', 'download')->name('magazine.download');
    Route::get('circular', 'circular')->name('frontend.circular');
    Route::get('CircularDownload/{id}/{fileIndex}', 'circularDownload')->name('circular.download');
    Route::get('staff', 'staff')->name('frontend.staff');
    Route::get('staff_backup', 'staff_backup')->name('frontend.staff_backup');
    Route::get('teachingStaff', 'teachingStaff')->name('frontend.teaching_staff');
    Route::get('generalInformation', 'generalInformation')->name('frontend.generalInformation');
    Route::get('schoolInfrastructure', 'schoolInfrastructure')->name('frontend.schoolInfrastructure');
});

Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/flipbook/yearly-planner', function () {
    return view('flipbook.yearly_planner');
})->name('flipbook.yearly_planner');

Route::get('/login', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.post');

//Route::get('/', [App\Http\Controllers\SettingController::class, 'index'])->name('admin.setting.index');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::controller(App\Http\Controllers\AuthController::class)->group(function () {
        Route::get('/dashboard', 'dash')->name('admin.dashboard');
        Route::get('dashboard-data', 'dashboard')->name('dashboard.data');
        Route::get('/logout', 'logout')->name('admin.logout');
    });

    Route::prefix('department')->controller(App\Http\Controllers\DepartmentController::class)->group(function () {
        Route::get('/', 'index')->name('admin.department.index');
        Route::get('/create', 'create')->name('admin.department.create');
        Route::post('/store', 'store')->name('admin.department.store');
        Route::get('/edit/{id}', 'edit')->name('admin.department.edit');
        Route::put('/update/{id}', 'update')->name('admin.department.update');
        Route::delete('/delete/{id}', 'destroy')->name('admin.department.delete');
    });

    Route::prefix('faculty')->controller(App\Http\Controllers\FacultyController::class)->group(function () {
        Route::get('/', 'index')->name('admin.faculty.index');
        Route::get('/create', 'create')->name('admin.faculty.create');
        Route::post('/store', 'store')->name('admin.faculty.store');
        Route::get('/show/{id}', 'show')->name('admin.faculty.show');
        Route::get('/edit/{id}', 'edit')->name('admin.faculty.edit');
        Route::put('/update/{id}', 'update')->name('admin.faculty.update');
        Route::delete('/delete/{id}', 'destroy')->name('admin.faculty.delete');
    });

    Route::prefix('testimonial')->controller(App\Http\Controllers\TestimonialsController::class)->group(function () {
        Route::get('/', 'index')->name('admin.testimonial.index');
        Route::get('/create', 'create')->name('admin.testimonial.create');
        Route::post('/store', 'store')->name('admin.testimonial.store');
        Route::get('/show/{id}', 'show')->name('admin.testimonial.show');
        Route::get('/edit/{id}', 'edit')->name('admin.testimonial.edit');
        Route::put('/update/{id}', 'update')->name('admin.testimonial.update');
        Route::delete('/delete/{id}', 'destroy')->name('admin.testimonial.delete');
    });

    Route::prefix('event')->controller(EventController::class)->group(function () {
        Route::get('/', 'index')->name('admin.event.index');
        Route::get('/create', 'create')->name('admin.event.create');
        Route::post('/store', 'store')->name('admin.event.store');
        Route::get('/edit/{id}', 'edit')->name('admin.event.edit');
        Route::put('/update/{id}', 'update')->name('admin.event.update');
        Route::delete('/delete/{id}', 'destroy')->name('admin.event.delete');
    });

    Route::prefix('general-information')->controller(GeneralInformationController::class)->group(function () {
        Route::get('/', 'index')->name('admin.general-information.index');
        Route::get('create', 'create')->name('admin.general-information.create');
        Route::post('store', 'store')->name('admin.general-information.store');
        Route::get('edit/{id}', 'edit')->name('admin.general-information.edit');
        Route::put('update/{id}', 'update')->name('admin.general-information.update');
        Route::delete('delete/{id}', 'destroy')->name('admin.general-information.delete');
    });

    Route::prefix('document-information')->controller(DocumentInformationController::class)->group(function () {
        Route::get('/', 'index')->name('admin.document-information.index');
        Route::get('create', 'create')->name('admin.document-information.create');
        Route::post('store', 'store')->name('admin.document-information.store');
        Route::get('edit/{id}', 'edit')->name('admin.document-information.edit');
        Route::put('update/{id}', 'update')->name('admin.document-information.update');
        Route::delete('delete/{id}', 'destroy')->name('admin.document-information.delete');
    });

    Route::prefix('academics')->controller(AcademicController::class)->group(function () {
        Route::get('/', 'index')->name('admin.academics.index');
        Route::get('create', 'create')->name('admin.academics.create');
        Route::post('store', 'store')->name('admin.academics.store');
        Route::get('edit/{id}', 'edit')->name('admin.academics.edit');
        Route::put('update/{id}', 'update')->name('admin.academics.update');
        Route::delete('delete/{id}', 'destroy')->name('admin.academics.delete');
    });

    Route::prefix('circular')->controller(CircularController::class)->group(function () {
        Route::get('/', 'index')->name('admin.circular.index');
        Route::get('/create', 'create')->name('admin.circular.create');
        Route::post('/store', 'store')->name('admin.circular.store');
        Route::get('/edit/{id}', 'edit')->name('admin.circular.edit');
        Route::put('/update/{id}', 'update')->name('admin.circular.update');
        Route::delete('/delete/{id}', 'destroy')->name('admin.circular.delete');
    });

    Route::prefix('teaching-staff')->controller(TeachingStaffController::class)->group(function () {
        Route::get('/', 'index')->name('admin.teaching-staff.index');
        Route::get('create', 'create')->name('admin.teaching-staff.create');
        Route::post('store', 'store')->name('admin.teaching-staff.store');
        Route::get('edit/{id}', 'edit')->name('admin.teaching-staff.edit');
        Route::put('update/{id}', 'update')->name('admin.teaching-staff.update');
        Route::delete('delete/{id}', 'destroy')->name('admin.teaching-staff.delete');
    });

    Route::prefix('school-infrastructure')->controller(SchoolInfrastructureController::class)->group(function () {
        Route::get('/', 'index')->name('admin.school-infrastructure.index');
        Route::get('create', 'create')->name('admin.school-infrastructure.create');
        Route::post('store', 'store')->name('admin.school-infrastructure.store');
        Route::get('edit/{id}', 'edit')->name('admin.school-infrastructure.edit');
        Route::put('update/{id}', 'update')->name('admin.school-infrastructure.update');
        Route::delete('delete/{id}', 'destroy')->name('admin.school-infrastructure.delete');
    });

    Route::prefix('mandatory-public-disclosure')->controller(MandatoryPublicDisclosureController::class)->group(function () {
        Route::get('edit', 'edit')->name('admin.mandatory-public-disclosure.edit');
        Route::post('update', 'update')->name('admin.mandatory-public-disclosure.update');
    });

    Route::prefix('magazine')->controller(MagazineController::class)->group(function () {
        Route::get('/', 'index')->name('admin.magazine.index');
        Route::get('/create', 'create')->name('admin.magazine.create');
        Route::post('/store', 'store')->name('admin.magazine.store');
        Route::get('/edit/{id}', 'edit')->name('admin.magazine.edit');
        Route::put('/update/{id}', 'update')->name('admin.magazine.update');
        Route::delete('/delete/{id}', 'destroy')->name('admin.magazine.delete');
    });

    Route::prefix('contact')->controller(ContactController::class)->group(function () {
        Route::get('/', 'index')->name('admin.contact.index');
        Route::delete('/delete/{id}', 'destroy')->name('admin.contact.delete');
    });

    Route::prefix('enquiry')->controller(EnquiryController::class)->group(function () {
        Route::get('/', 'index')->name('admin.enquiry.index');
        Route::post('/store', 'store')->name('admin.enquiry.store');
        Route::delete('/delete/{id}', 'destroy')->name('admin.enquiry.delete');
        Route::get('replyForm/{id}', 'replyForm')->name('enquiry.replyForm');
        Route::post('respond/{id}', 'respondToEnquiry')->name('enquiry.respondToContact');
    });

    Route::get('notification/read/{id}', [NotificationController::class, 'markAsReadAndRedirect'])->name('notification.read');

    Route::prefix('activityCategory')->controller(ActivityCategoryController::class)->group(function () {
        Route::get('/', 'index')->name('admin.activityCategory.index');
        Route::get('/create', 'create')->name('admin.activityCategory.create');
        Route::post('/store', 'store')->name('admin.activityCategory.store');
        Route::get('/edit/{id}', 'edit')->name('admin.activityCategory.edit');
        Route::put('/update/{id}', 'update')->name('admin.activityCategory.update');
        Route::delete('/delete/{id}', 'destroy')->name('admin.activityCategory.delete');
    });

    Route::prefix('activity')->controller(ActivityController::class)->group(function () {
        Route::get('/', 'index')->name('admin.activity.index');
        Route::get('/create', 'create')->name('admin.activity.create');
        Route::post('/store', 'store')->name('admin.activity.store');
        Route::get('/edit/{id}', 'edit')->name('admin.activity.edit');
        Route::put('/update/{id}', 'update')->name('admin.activity.update');
        Route::delete('/delete/{id}', 'destroy')->name('admin.activity.delete');
    });

    Route::prefix('slider-images')->controller(SliderImageController::class)->group(function () {
        Route::get('banner-images', 'bannerImagesIndex')->name('admin.slider-images.banner-images');
        Route::get('school-images', 'schoolImagesIndex')->name('admin.slider-images.school-images');
        Route::get('banner-image-create', 'bannerImageCreate')->name('admin.slider-images.banner-images-create');
        Route::get('school-image-create', 'schoolImageCreate')->name('admin.slider-images.school-images-create');
        Route::get('banner-image-edit/{id}', 'bannerImageEdit')->name('admin.slider-images.banner-images-edit');
        Route::get('school-image-edit/{id}', 'schoolImageEdit')->name('admin.slider-images.school-images-edit');
        Route::post('slider-image-store', 'sliderImageStore')->name('admin.slider-images.store');
        Route::delete('slider-image-delete/{id}', 'sliderImageDestroy')->name('admin.slider-images.delete');
    });

    Route::prefix('admission-process')->controller(AdmissionProcessController::class)->group(function () {
        Route::get('edit', 'edit')->name('admin.admission-process.edit');
        Route::post('update', 'update')->name('admin.admission-process.update');
    });
});

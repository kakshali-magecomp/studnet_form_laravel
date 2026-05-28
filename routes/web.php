<?php
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Models\Student;


Route::get('/', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
// Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

Route::delete('/students/{student}', function (Student $student) {
    $student->delete();

    return redirect()->back()->with('success', 'Student deleted successfully!');
})->name('students.destroy');

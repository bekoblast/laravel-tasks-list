<?php
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

//-----------------------------------
//dummy data for testing
// class Task
// {
//   public function __construct(
//     public int $id,
//     public string $title,
//     public string $description,
//     public ?string $long_description,
//     public bool $completed,
//     public string $created_at,
//     public string $updated_at
//   ) {
//   }
// }

//Dummy data for tasting
// $tasks = [
//   new Task(
//     1,
//     'Buy groceries',
//     'Task 1 description',
//     'Task 1 long description',
//     false,
//     '2023-03-01 12:00:00',
//     '2023-03-01 12:00:00'
//   ),
//   new Task(
//     2,
//     'Sell old stuff',
//     'Task 2 description',
//     null,
//     false,
//     '2023-03-02 12:00:00',
//     '2023-03-02 12:00:00'
//   ),
//   new Task(
//     3,
//     'Learn programming',
//     'Task 3 description',
//     'Task 3 long description',
//     true,
//     '2023-03-03 12:00:00',
//     '2023-03-03 12:00:00'
//   ),
//   new Task(
//     4,
//     'Take dogs for a walk',
//     'Task 4 description',
//     null,
//     false,
//     '2023-03-04 12:00:00',
//     '2023-03-04 12:00:00'
//   ),
// ];
//-----------------------------------

//============================================
Route::get('/', function () {
    return redirect()->route('tasks.index');
});
//============================================
Route::get('/tasks', function () {
    return view('index', [
        //'tasks' => Task::all() //this is for getting all the data!
        'tasks' => Task::latest()->where('completed', true)->get()
    ]);
})->name('tasks.index');
//============================================
Route::get('/tasks/{id}', function ($id) {

    return view('show', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');
//============================================


// //Route with usable name!
// Route::get('/hello', function () {
//     return 'Hello';
// })->name('hello-route');

// //redirect to previous route name!
// Route::get('/hallo', function () {
//     return redirect()->route('hello-route');
// });

// //Route with Parameters
// Route::get('/greet/{name}', function ($name) {
//     return 'Hello ' . $name . '!';
// });

//Custom not found route!
Route::fallback(function () {
    return 'Error 404 - Wrong Page!!';
});
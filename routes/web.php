<?php
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
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

//Home Page
Route::get('/', function () {
    return redirect()->route('tasks.index');
});
//============================================

//Show All Tasks.
Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::all() //this is for getting all the data!
        //'tasks' => Task::latest()->where('completed', true)->get()
    ]);
})->name('tasks.index');
//============================================

//Task Create Page.
Route::view('/tasks/create', 'create')
    ->name('create');
//============================================

//Task Edit Page.
Route::get('/tasks/{task}/edit', function (Task $task) {

    return view('edit', ['task' => $task]);
})->name('tasks.edit');
//============================================

//Single Task Details
Route::get('/tasks/{task}', function (Task $task) {

    return view('show', ['task' => $task]);
})->name('tasks.show');
//============================================

//Task Creation & Saving to DB
Route::post('/tasks', function (TaskRequest $request) {
    $data = $request->validated();
    $task = Task::create($data); //this method is called Mass assignment!

    //id is given to $task object after using save()!!
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully!');
})->name('tasks.store');
//============================================

//Task Updating & Saving to DB
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) { //Laravel will fetch the id from the url, and will assgin it automatically to the declared $id!
    $data = $request->validated();
    $task->update($data);

    //id is given to $task object after using save()!!
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully!');
})->name('tasks.update');
//============================================

//============================================





//Custom not found route!
Route::fallback(function () {
    return 'Error 404 - Wrong Page!!';
});
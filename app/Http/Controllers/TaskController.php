<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Task::with(['users'])->latest()->paginate(10);
        $userCount = User::count();
        $taskCount = Task::count();
        $taskCompleted = Task::where('status', 'completed')->count();
        $taskPending = Task::where('status', 'pending')->count();
        return view('pages.dashboard', [
            'items' => $items,
            'userCount' => $userCount,
            'taskCount' => $taskCount,
            'taskCompleted' => $taskCompleted,
            'taskPending' => $taskPending,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $data  = $request->validated();
        $data['user_id'] = $request->user()->id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            Log::info('Image uploaded', ['original_name' => $image->getClientOriginalName()]);

            $imageName = time() . '_' . uniqid() .  '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('assets/gallery', $imageName, 'public');
            $data['image_path'] = $imagePath;
            Log::info('Image stored at', ['path' => $data['image_path']]);
        } else {
            Log::warning('No image was uploaded');
        }
        Task::create($data);
        return redirect(route('tasks.dashboard'))->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function success()
    {
        $items = Task::with(['users'])->where('status', 'completed')->latest()->paginate(10);
        $userCount = User::count();
        $taskCount = Task::count();
        $taskCompleted = Task::where('status', 'completed')->count();
        $taskPending = Task::where('status', 'pending')->count();
        return view('pages.task-success', [
            'items' => $items,
            'userCount' => $userCount,
            'taskCount' => $taskCount,
            'taskCompleted' => $taskCompleted,
            'taskPending' => $taskPending,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function pending()
    {
        $items = Task::with(['users'])->where('status', 'pending')->latest()->paginate(10);
        $userCount = User::count();
        $taskCount = Task::count();
        $taskCompleted = Task::where('status', 'completed')->count();
        $taskPending = Task::where('status', 'pending')->count();
        return view('pages.task-pending', [
            'items' => $items,
            'userCount' => $userCount,
            'taskCount' => $taskCount,
            'taskCompleted' => $taskCompleted,
            'taskPending' => $taskPending,
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $data = Task::findOrFail($id);
        $data->status = $request->has('status') ? 'completed' : 'pending';
        $data->save();
        return redirect()->back()->with('success', 'Status Task is Changed!');
        // return redirect(route('tasks.dashboard'))->with('success', 'Status Task is Changed!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, $id)
    {
        $data = Task::findOrFail($id);
        $data->title = $request->input('title');
        $data->description = $request->input('description');

        if($request->input('remove_image') === 'true') {
            if($data->image_path) {
                Storage::delete('public/'.$data->image_path);
                $data->image_path = null;
            }
        }

        if($request->hasFile('image')) {
            if ($data->image_path) {
                Storage::delete('public/'. $data->image_path);
            }
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() .  '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('assets/gallery', $imageName, 'public');
            $data['image_path'] = $imagePath;
        }


        $data->save();
        return redirect()->back()->with('success', 'Task updated successfully!');
        // return redirect(route('tasks.dashboard'))->with('success', 'Task updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $item = Task::findOrFail($id);
            $item->delete();
            return redirect()->back()->with('success', 'success', 'Task successfully deleted!');
            // return redirect(route('tasks.dashboard'))->with('success', 'Task successfully deleted!');
        } catch (\Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete the task. Please try again.');
            // return redirect(route('tasks.dashboard'))->with('error', 'Failed to delete the task. Please try again.');
        }
    }
}

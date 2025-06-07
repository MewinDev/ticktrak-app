<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SubTask;

class SubtasksForm extends Component
{

    public $task_id;
    public $description;
    public $due_date;

    protected $rules = [
        'task_id' => 'required|exists:tasks,id',
        'description' => 'required|string|max:1000',
        'due_date' => 'nullable|date',
    ];

    public function mount($task_id)
    {
        $this->task_id = $task_id;
    }

    public function submit()
    {
       \Log::info('Creating sub-task', [
    'task_id' => $this->task_id,
    'title' => $this->title,
    'description' => $this->description,
]);

        $this->validate();

        SubTask::create([
            'task_id' => $this->task_id,
            'description' => $this->description,
            'due_date' => $this->due_date,
        ]);

        session()->flash('message', 'Sub-task created successfully.');

        $this->reset(['title', 'description']);
    }

    public function render()
    {
        return view('livewire.sub-tasks-form');
    }
}

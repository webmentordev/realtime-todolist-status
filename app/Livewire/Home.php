<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\Attributes\On;

class Home extends Component
{
    public $title, $todos = [];

    public function mount()
    {
        $this->todos = Todo::latest()->get();
    }

    public function render()
    {
        return view('livewire.home');
    }

    public function store()
    {
        $todo = Todo::create([
            'title' => $this->title,
            'status' => 'pending'
        ]);
        $this->todos[] = $todo;
    }


    #[On('echo-channel:todo,TodoListener')]
    public function updateStatus($payload)
    {
        $todo = Todo::find($payload['id']);

        if ($todo) {
            $this->todos = collect($this->todos)->map(function ($t) use ($todo) {
                return $t->id === $todo->id ? $todo : $t;
            })->all();
        }
    }
}
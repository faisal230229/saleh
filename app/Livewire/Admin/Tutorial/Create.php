<?php

namespace App\Livewire\Admin\Tutorial;

use App\Models\Tutorial;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    #[Rule('required')]
    public $title;
    #[Rule('required')]
    public $primary_content;
    #[Rule('required')]
    public $secondary_content;
    #[Rule('required')]
    public $featured_image;
    #[Rule('required')]
    public $secondary_image;
    #[Rule('required')]
    public $youtube_link;
    #[Rule('required')]
    public string $order;

    public function store()
    {
        $this->validate();

        $imageName = Carbon::now()->timestamp . rand(0, 100) . '.' . $this->featured_image->extension();
        $this->featured_image->storeAs('public/uploads/tutorials', $imageName);
        $this->featured_image =  $imageName;

        $imageName = Carbon::now()->timestamp . rand(0, 100) . '.' . $this->secondary_image->extension();
        $this->secondary_image->storeAs('public/uploads/tutorials', $imageName);
        $this->secondary_image =  $imageName;

        Tutorial::create($this->only('title', 'featured_image', 'primary_content', 'secondary_content', 'secondary_image', 'youtube_link', 'order'));

        return redirect()->route('admin.tutorials.index')->with('msg', __('backend.tutorialCreated'));
    }

    public function render()
    {
        return view('livewire.admin.tutorial.create');
    }
}

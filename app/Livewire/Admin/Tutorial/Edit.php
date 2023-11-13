<?php

namespace App\Livewire\Admin\Tutorial;

use App\Models\Tutorial;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Tutorial $tutorial;

    #[Rule('required')]
    public $title;
    #[Rule('required')]
    public $primary_content;
    #[Rule('required')]
    public $secondary_content;
    #[Rule('required')]
    public $featured_image;
    public $new_featured_image;
    #[Rule('required')]
    public $secondary_image;
    public $new_secondary_image;
    #[Rule('required')]
    public $youtube_link;
    #[Rule('required')]
    public string $order;

    public function mount(Tutorial $tutorial)
    {
        $this->tutorial = $tutorial;
        $this->title = $tutorial->title;
        $this->primary_content = $tutorial->primary_content;
        $this->secondary_content = $tutorial->secondary_content;
        $this->featured_image = $tutorial->featured_image;
        $this->secondary_image = $tutorial->secondary_image;
        $this->youtube_link = $tutorial->youtube_link;
        $this->order = $tutorial->order;
    }

    public function update()
    {
        $this->validate();

        if ($this->new_featured_image)
        {
            !Storage::exists('public/uploads/tutorials/' . $this->featured_image) || Storage::delete('public/uploads/tutorials/' . $this->featured_image);
            $imageName = Carbon::now()->timestamp . rand(0, 10) . '.' . $this->new_featured_image->extension();
            $this->new_featured_image->storeAs('public/uploads/tutorials', $imageName);
            $this->featured_image =  $imageName;
        }

        if ($this->new_secondary_image)
        {
            !Storage::exists('public/uploads/tutorials/' . $this->secondary_image) || Storage::delete('public/uploads/tutorials/' . $this->secondary_image);
            $imageName = Carbon::now()->timestamp . rand(0, 10) . '.' . $this->new_secondary_image->extension();
            $this->new_secondary_image->storeAs('public/uploads/tutorials', $imageName);
            $this->secondary_image =  $imageName;
        }

        $this->tutorial->update($this->only('title', 'featured_image', 'primary_content', 'secondary_content', 'secondary_image', 'youtube_link', 'order'));

        return redirect()->route('admin.tutorials.index')->with('msg', __('backend.tutorialUpdated'));
    }

    public function render()
    {
        return view('livewire.admin.tutorial.edit');
    }
}

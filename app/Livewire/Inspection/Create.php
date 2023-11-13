<?php

namespace App\Livewire\Inspection;

use App\Models\Inspection;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    public string $title;
    #[Rule('required|mimetypes:png,jpeg,svg,webp')]
    public $thumbnail;
    #[Rule('required')]
    public string $order;
    #[Rule('required')]
    public string $content;

    public function store()
    {
        $this->validate();

        $imageName = Carbon::now()->timestamp . rand(0, 10) . '.' . $this->thumbnail->extension();
        $this->thumbnail->storeAs('public/uploads/inspections', $imageName);
        $this->thumbnail =  $imageName;

        Inspection::create($this->only('title', 'thumbnail', 'order', 'content'));

        return redirect()->route('admin.inspections.index')->with('msg', __('backend.inspectionCreated'));
    }
    public function render()
    {
        return view('livewire.inspection.create');
    }
}

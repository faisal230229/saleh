<?php

namespace App\Livewire\Inspection;

use App\Models\Inspection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Inspection $inspection;
    #[Rule('required')]
    public string $title;
    #[Rule('required|mimetypes:png,jpeg,svg,webp')]
    public $thumbnail;
    #[Rule('nullable|sometimes|mimetypes:png,jpeg,svg,webp')]
    public $new_thumbnail;
    #[Rule('required')]
    public string $order;
    #[Rule('required')]
    public string $content;

    public function mount(Inspection $inspection)
    {
        $this->inspection = $inspection;
        $this->title = $inspection->title;
        $this->thumbnail = $inspection->thumbnail;
        $this->order = $inspection->order;
        $this->content = $inspection->content;
    }

    public function update()
    {
        $this->validate();

        if ($this->new_thumbnail)
        {
            !Storage::exists('public/uploads/inspections/' . $this->thumbnail) || Storage::delete('public/uploads/inspections/' . $this->thumbnail);
            $imageName = Carbon::now()->timestamp . rand(0, 10) . '.' . $this->new_thumbnail->extension();
            $this->new_thumbnail->storeAs('public/uploads/inspections', $imageName);
            $this->thumbnail =  $imageName;
        }

        $this->inspection->update($this->only('title', 'thumbnail', 'order', 'content'));

        return redirect()->route('admin.inspections.index')->with('msg', __('backend.inspectionCreated'));
    }

    public function render()
    {
        return view('livewire.inspection.edit');
    }
}

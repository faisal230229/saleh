<?php

namespace App\Livewire\Admin\PurchaseInspection;

use App\Models\PurchaseInspection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public PurchaseInspection $inspection;
    #[Rule('required')]
    public string $title;
    #[Rule('required')]
    public $thumbnail;
    #[Rule('nullable|sometimes')]
    public $new_thumbnail;
    #[Rule('required')]
    public string $order;
    #[Rule('required')]
    public string $content;

    public function mount(PurchaseInspection $inspection)
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
            !Storage::exists('public/uploads/purchase-inspections/' . $this->thumbnail) || Storage::delete('public/uploads/purchase-inspections/' . $this->thumbnail);
            $imageName = Carbon::now()->timestamp . rand(0, 10) . '.' . $this->new_thumbnail->extension();
            $this->new_thumbnail->storeAs('public/uploads/purchase-inspections', $imageName);
            $this->thumbnail =  $imageName;
        }

        $this->inspection->update($this->only('title', 'thumbnail', 'order', 'content'));

        return redirect()->route('admin.purchase_inspections.index')->with('msg', __('backend.purchaseInspectionUpdated'));
    }

    public function render()
    {
        return view('livewire.admin.purchase-inspection.edit');
    }
}

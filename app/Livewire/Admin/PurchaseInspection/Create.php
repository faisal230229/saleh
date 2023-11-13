<?php

namespace App\Livewire\Admin\PurchaseInspection;

use App\Models\PurchaseInspection;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    public string $title;
    #[Rule('required')]
    public $thumbnail;
    #[Rule('required')]
    public string $order;
    #[Rule('required')]
    public string $content;

    public function store()
    {
        $this->validate();

        $imageName = Carbon::now()->timestamp . rand(0, 10) . '.' . $this->thumbnail->extension();
        $this->thumbnail->storeAs('public/uploads/purchase-inspections', $imageName);
        $this->thumbnail =  $imageName;

        PurchaseInspection::create($this->only('title', 'thumbnail', 'order', 'content'));

        return redirect()->route('admin.purchase_inspections.index')->with('msg', __('backend.purchaseInspectionCreated'));
    }

    public function render()
    {
        return view('livewire.admin.purchase-inspection.create');
    }
}

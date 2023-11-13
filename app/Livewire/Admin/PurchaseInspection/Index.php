<?php

namespace App\Livewire\Admin\PurchaseInspection;

use App\Models\Inspection;
use App\Models\PurchaseInspection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public string $search = '';
    public $delete_id;

    public function setInspection($id)
    {
        $this->delete_id = $id;
    }

    public function destroy()
    {
        $purchase = PurchaseInspection::find($this->delete_id);

        !Storage::exists('public/uploads/purchase-inspections/' . $purchase->thumbnail) || Storage::delete('public/uploads/purchase-inspections/' . $purchase->thumbnail);

        $purchase->delete();

        return redirect()->back()->with('msg', __('backend.purchaseInspectionDeleted'));
    }

    public function render()
    {
        $search = "%".$this->search."%";
        $purchase_inspections = PurchaseInspection::when($this->search, function (Builder $query) use ($search) {
            $query->where('title', 'LIKE', $search)->orWhere('content', 'LIKE', $search);
        })->paginate();

        return view('livewire.admin.purchase-inspection.index', compact('purchase_inspections'));
    }
}

<?php

namespace App\Livewire\Inspection;

use App\Models\Inspection;
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
        $inspection = Inspection::find($this->delete_id);

        !Storage::exists('public/uploads/inspections/' . $inspection->thumbnail) || Storage::delete('public/uploads/inspections/' . $inspection->thumbnail);

        $inspection->delete();

        return redirect()->back()->with('msg', __('backend.inspectionDeleted'));
    }

    public function render()
    {
        $search = "%".$this->search."%";
        $inspections = Inspection::when($this->search, function (Builder $query) use ($search) {
            $query->where('title', 'LIKE', $search)->orWhere('content', 'LIKE', $search);
        })->paginate();

        return view('livewire.inspection.index', compact('inspections'));
    }
}

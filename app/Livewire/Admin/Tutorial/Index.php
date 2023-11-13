<?php

namespace App\Livewire\Admin\Tutorial;

use App\Models\Tutorial;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public string $search = '';
    public $delete_id;

    public function setTutorial($id)
    {
        $this->delete_id = $id;
    }

    public function destroy()
    {
        $tutorial = Tutorial::find($this->delete_id);

        !Storage::exists('public/uploads/tutorials/' . $tutorial->featured_image) || Storage::delete('public/uploads/tutorials/' . $tutorial->featured_image);
        !Storage::exists('public/uploads/tutorials/' . $tutorial->secondary_image) || Storage::delete('public/uploads/tutorials/' . $tutorial->secondary_image);

        $tutorial->delete();

        return redirect()->back()->with('msg', __('backend.tutorialDeleted'));
    }

    public function render()
    {
        $search = "%".$this->search."%";
        $tutorials = Tutorial::when($this->search, function (Builder $query) use ($search) {
            $query->where('title', 'LIKE', $search)->orWhere('primary_content', 'LIKE', $search)->orWhere('secondary_content', 'LIKE', $search);
        })->paginate();

        return view('livewire.admin.tutorial.index', compact('tutorials'));
    }
}

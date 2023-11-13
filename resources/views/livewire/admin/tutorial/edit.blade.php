<div>
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe02e;</i> {{ __('backend.tutorials') }}</h3>
                <small>
                    <a href="{{ route('admin.dashboard') }}">{{ __('backend.home') }}</a> /
                    <a>{{ __('backend.sectionsOf') }} Index</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                <form wire:submit.prevent="update">
                    <div class="form-group row">
                        <label for="title"
                               class="col-sm-2 form-control-label">{!!  __('backend.title') !!} </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" wire:model="title" required dir="rtl">
                        </div>
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="title"
                               class="col-sm-2 form-control-label">{!!  __('backend.primaryContent') !!} </label>
                        <div class="col-sm-10">
                            <textarea class="form-control ckeditor" wire:model="primary_content" required dir="rtl"></textarea>
                        </div>
                        @error('primary_content')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group row">
                        <label for="title"
                               class="col-sm-2 form-control-label">{!!  __('backend.secondaryContent') !!} </label>
                        <div class="col-sm-10">
                            <textarea class="form-control ckeditor" wire:model="secondary_content" required dir="rtl"></textarea>
                        </div>
                        @error('secondary_content')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group row">
                        <label for="title"
                               class="col-sm-2 form-control-label">{!!  __('backend.featuredImage') !!} </label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" wire:model="new_featured_image" dir="rtl">
                            @if($new_featured_image)
                                <span>
                                    <img width="80" src="{{ $new_featured_image->temporaryUrl() }}">
                                </span>
                            @elseif($featured_image)
                                <span>
                                    <img width="80" src="{{ asset('storage/uploads/tutorials/'.$featured_image) }}">
                                </span>
                            @endif
                        </div>

                        @error('new_featured_image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="title"
                               class="col-sm-2 form-control-label">{!!  __('backend.secondaryImage') !!} </label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" wire:model="new_secondary_image" dir="rtl">
                            @if($new_secondary_image)
                                <span>
                                    <img width="80" src="{{ $new_secondary_image->temporaryUrl() }}">
                                </span>
                            @elseif($secondary_image)
                                <span>
                                    <img width="80" src="{{ asset('storage/uploads/tutorials/'.$secondary_image) }}">
                                </span>
                            @endif
                        </div>

                        @error('secondary_image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="title"
                               class="col-sm-2 form-control-label">{!!  __('backend.youtubeLink') !!} </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" wire:model="youtube_link" required dir="rtl">
                        </div>
                        @error('youtube_link')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="title"
                               class="col-sm-2 form-control-label">{!!  __('backend.order') !!} </label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" wire:model="order" required dir="rtl">
                        </div>
                        @error('order')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group row m-t-md">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                    &#xe31b;</i> {!! __('backend.add') !!}</button>
                            <a href="{{ route('admin.inspections.index') }}"
                               class="btn btn-default m-t"><i class="material-icons">
                                    &#xe5cd;</i> {!! __('backend.cancel') !!}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('after-scripts')
    <script src="{{ asset("assets/dashboard/js/ckeditor/ckeditor.js") }}"></script>
    <script>
        CKEDITOR.editorConfig = function (config) {
            config.language = 'en';
            config.height = 500;
            config.uiColor = '#ffffff';
            config.toolbarCanCollapse = true;
            config.filebrowserImageBrowseUrl = '/file-manager/ckeditor';
        };
    </script>
@endpush

<div>
    @if(Session::has('msg'))
        <div class="padding p-b-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success m-b-0">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ Session::get('msg') }}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="padding">
        <div class="box">
            <div class="box-header">
                <div class="col-sm-6">
                    <h3>{{ __('backend.tutorials') }}</h3>
                    <small>
                        <a href="{{ route('admin.dashboard') }}">{{ __('backend.home') }}</a> /
                        <a>{{ __('backend.sectionsOf') }} Index</a>
                    </small>
                </div>
                <div class="col-sm-6">
                    <div class="col-sm-7 text-right">
                        <div class="form-group">
                            <input type="search" class="form-control" wire:model.live="search" dir="rtl"
                                   placeholder="{{ __('backend.search') }}">
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <a class="btn btn-fw primary" href="{{ route('admin.tutorials.create') }}">
                            <i class="material-icons">&#xe02e;</i>
                            &nbsp; {{ __('backend.tutorialNew') }}</a>
                    </div>
                </div>
            </div>


            <div class="table-responsive">
                <table class="table table-bordered m-a-0">
                    <thead class="dker">
                    <tr>
                        <th class="text-center" style="width:100px;">{{ __('backend.title') }}</th>
                        <th class="text-center" style="width:50px;">{{ __('backend.featuredImage') }}</th>
                        <th class="text-center" style="width:200px;">{{ __('backend.primaryContent') }}</th>
                        <th class="text-center" style="width:200px;">{{ __('backend.secondaryContent') }}</th>
                        <th class="text-center" style="width:50px;">{{ __('backend.secondaryImage') }}</th>
                        <th class="text-center" style="width:80px;">{{ __('backend.youtubeLink') }}</th>
                        <th class="text-center" style="width:20px;">{{ __('backend.order') }}</th>
                        <th class="text-center" style="width:80px;">{{ __('backend.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tutorials as $tutorial)
                        <tr>
                            <td class="h6">
                                {{ $tutorial->title }}
                            </td>
                            <td class="text-center">
                                <img src="{{ asset('storage/uploads/tutorials/'.$tutorial->featured_image) }}" width="80"
                                     alt="{{ $tutorial->title }}">
                            </td>
                            <td class="text-center">
                                {!! $tutorial->primary_content  !!}
                            </td>
                            <td class="text-center">
                                {!! $tutorial->secondary_content  !!}
                            </td>


                            <td class="text-center">
                                <img src="{{ asset('storage/uploads/tutorials/'.$tutorial->secondary_image) }}" width="80"
                                     alt="{{ $tutorial->title }}">
                            </td>

                            <td class="text-center">
                                {{ $tutorial->youtube_link }}
                            </td>


                            <td class="text-center">
                                {{ $tutorial->order }}
                            </td>

                            <td class="text-center">

                                <a class="btn btn-sm success"
                                   href="{{ route('admin.tutorials.edit', $tutorial) }}"
                                   data-toggle="tooltip" data-original-title="{{ __('backend.edit') }}">
                                    <i class="material-icons">&#xe3c9;</i>
                                </a>
                                <button class="btn btn-sm warning" type="button"
                                        data-toggle="modal"
                                        data-target="#basicModal"
                                        wire:click.prevent="setTutorial({{ $tutorial->id }})">
                                    <i class="material-icons">&#xe872;</i>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
            <footer class="dker p-a">
                <div class="row">
                    <div class="col-sm-3 hidden-xs">
                        <!-- .modal -->
                        <div id="m-all" class="modal fade" data-backdrop="true">
                            <div class="modal-dialog" id="animate">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ __('backend.confirmation') }}</h5>
                                    </div>
                                    <div class="modal-body text-center p-lg">
                                        <p>
                                            {{ __('backend.confirmationDeleteMsg') }}
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn dark-white p-x-md"
                                                data-dismiss="modal">{{ __('backend.no') }}</button>
                                        <button type="submit"
                                                class="btn danger p-x-md">{{ __('backend.yes') }}</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div>
                        </div>
                        <!-- / .modal -->
                    </div>

                    <div class="col-sm-3 text-center">
                        <small
                            class="text-muted inline m-t-sm m-b-sm">{{ __('backend.showing') }} {{ $tutorials->firstItem() }}
                            -{{ $tutorials->lastItem() }} {{ __('backend.of') }}
                            <strong>{{ $tutorials->total()  }}</strong> {{ __('backend.records') }}</small>
                    </div>
                    <div class="col-sm-6 text-right text-center-xs">
                        {!! $tutorials->links() !!}
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div id="basicModal" class="modal fade" data-backdrop="true" wire:ignore>
        <div class="modal-dialog" id="animate">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('backend.confirmation') }}</h5>
                </div>
                <div class="modal-body text-center p-lg">
                    <p>
                        {{ __('backend.confirmationDeleteMsg') }}
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark-white p-x-md"
                            data-dismiss="modal">{{ __('backend.no') }}</button>
                    <button type="button" id="category_delete_btn" wire:click.prevent="destroy" data-dismiss="modal"
                            class="btn danger p-x-md">{{ __('backend.yes') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div>
    </div>
</div>


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
                    <h3>{{ __('backend.regularInspections') }}</h3>
                    <small>
                        <a href="{{ route('admin.dashboard') }}">{{ __('backend.home') }}</a> /
                        <a>{{ __('backend.sectionsOf') }} Index</a>
                    </small>
                </div>
                <div class="col-sm-6">
                    <div class="col-sm-7 text-right">
                        <div class="form-group">
                            <input type="search" class="form-control" wire:model.live="search"
                                   placeholder="{{ __('backend.search') }}">
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <a class="btn btn-fw primary" href="{{ route('admin.inspections.create') }}">
                            <i class="material-icons">&#xe02e;</i>
                            &nbsp; {{ __('backend.inspectionNew') }}</a>
                    </div>
                </div>
            </div>


            <div class="table-responsive">
                <table class="table table-bordered m-a-0">
                    <thead class="dker">
                    <tr>
                        <th class="text-center" style="width:100px;">{{ __('backend.title') }}</th>
                        <th class="text-center" style="width:100px;">{{ __('backend.thumbnail') }}</th>
                        <th class="text-center" style="width:200px;">{{ __('backend.content') }}</th>
                        <th class="text-center" style="width:50px;">{{ __('backend.order') }}</th>
                        <th class="text-center" style="width:200px;">{{ __('backend.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($inspections as $inspection)
                        <tr>
                            <td class="h6">
                                {{ $inspection->title }}
                            </td>
                            <td class="text-center">
                                {{ storage_path('storage/uploads/inspections/') }}
                                <img src="{{ Storage::url('public/uploads/inspections/' . $inspection->thumbnail) }}" alt="">
                                <img src="{{ asset('storage/uploads/inspections/'.$inspection->thumbnail) }}" width="80"
                                     alt="{{ $inspection->title }}">
                            </td>
                            <td class="text-center">
                                {!! $inspection->content  !!}
                            </td>

                            <td class="text-center">
                                {{ $inspection->order }}
                            </td>

                            <td class="text-center">
{{--                                <a class="btn btn-sm info"--}}
{{--                                   href=""--}}
{{--                                   data-toggle="tooltip" data-original-title="{{ __('backend.viewDetails') }}"--}}
{{--                                   target="_blank">--}}
{{--                                    <i class="material-icons">&#xe8f4;</i>--}}
{{--                                </a>--}}

                                <a class="btn btn-sm success"
                                   href="{{ route('admin.inspections.edit', $inspection) }}"
                                   data-toggle="tooltip" data-original-title="{{ __('backend.edit') }}">
                                    <i class="material-icons">&#xe3c9;</i>
                                </a>
                                <button class="btn btn-sm warning" type="button"
                                        data-toggle="modal"
                                        data-target="#basicModal"
                                        wire:click.prevent="setInspection({{ $inspection->id }})">
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
                            class="text-muted inline m-t-sm m-b-sm">{{ __('backend.showing') }} {{ $inspections->firstItem() }}
                            -{{ $inspections->lastItem() }} {{ __('backend.of') }}
                            <strong>{{ $inspections->total()  }}</strong> {{ __('backend.records') }}</small>
                    </div>
                    <div class="col-sm-6 text-right text-center-xs">
                        {!! $inspections->links() !!}
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


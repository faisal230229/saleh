<div class="app-header white box-shadow navbar-md">
    <div class="navbar">
        <!-- Open side - Naviation on mobile -->
        <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up">
            <i class="material-icons">&#xe5d2;</i>

        </a>
        <!-- / -->

        <!-- Page title - Bind to $state's title -->
        <div class="navbar-item pull-left h5" ng-bind="$state.current.data.title" id="pageTitle">
            <a class="btn btn-fw primary" href="{{ route('admin.inspections.create') }}">
                <i class="material-icons">&#xe02e;</i>
                &nbsp; {{ __('backend.inspectionNew') }}</a>
            {{ config('app.url') }}
        </div>



        <!-- navbar right -->
        <ul class="nav navbar-nav pull-right">
            <li class="nav-item dropdown">
                <form method="post" id="localeForm" style="margin-top: 1rem;" action="{{ route('set_locale') }}">
                    @csrf
                    <a class="nav-link clear" href data-toggle="dropdown">
                        @if(app()->getLocale() == 'en')
                            <img width="20" src="{{ asset('assets/dashboard/images/flags/us.svg') }}" alt=""> English
                        @endif
                        @if(app()->getLocale() == 'ar')
                            <img width="20" src="{{ asset('assets/dashboard/images/flags/sa.svg') }}" alt=""> عربي
                            @endif
                    </a>
                    <input type="hidden" id="locale" name="locale" >
                    <div class="dropdown-menu pull-right dropdown-menu-scale">
                        <button class="dropdown-item" onclick="document.getElementById('locale').value = 'en';document.getElementById('localeForm').submit();" href="#" ><span><img width="20" src="{{ asset('assets/dashboard/images/flags/us.svg') }}" alt=""> English </span>
                            @if(app()->getLocale() == 'en')
                                <i class="fa fa-check text-success ms-2"></i>
                            @endif
                        </button>
                        <button class="dropdown-item" onclick="document.getElementById('locale').value = 'ar';document.getElementById('localeForm').submit();" href="#"><img width="20" src="{{ asset('assets/dashboard/images/flags/sa.svg') }}" alt=""> عربي
                        @if(app()->getLocale() == 'ar')
                                <i class="fa fa-check text-success ms-2"></i>
                            @endif
                        </button>
                    </div>
                </form>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link clear" href data-toggle="dropdown">
                  <span class="avatar w-32">
                     <img src="{{ asset('assets/dashboard/images/profile.jpg') }}" alt="{{ Auth::user()->name }}"
                          title="{{ Auth::user()->name }}">
                      <i class="on b-white bottom"></i>
                  </span>
                </a>
                <div class="dropdown-menu pull-right dropdown-menu-scale">
                    <a class="dropdown-item"
                       href=""><span>{{ __('backend.profile') }}</span></a>
                    <div class="dropdown-divider"></div>
                    <a onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                       class="dropdown-item">{{ __('backend.logout') }}</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </li>

            <li class="nav-item hidden-md-up">
                <a class="nav-link" data-toggle="collapse" data-target="#collapse">
                    <i class="material-icons">&#xe5d4;</i>
                </a>
            </li>
        </ul>
        <!-- / navbar right -->

        <!-- navbar collapse -->
{{--        <div class="collapse navbar-toggleable-sm" id="collapse">--}}
{{--            {{Form::open(['route'=>['adminFind'],'method'=>'POST', 'role'=>'search', 'class' => "navbar-form form-inline pull-right pull-none-sm navbar-item v-m" ])}}--}}

{{--            <div class="form-group l-h m-a-0">--}}
{{--                <div class="input-group input-group-sm"><input type="text" name="q" class="form-control p-x rounded"--}}
{{--                                                               placeholder="{{ __('backend.search') }}..." required>--}}
{{--                    <span--}}
{{--                        class="input-group-btn"><button type="submit" class="btn white b-a rounded no-shadow"><i--}}
{{--                                class="fa fa-search"></i></button></span></div>--}}
{{--            </div>--}}
{{--            {{Form::close()}}--}}
{{--            <!-- link and dropdown -->--}}
{{--            @if(@Auth::user()->permissionsGroup->add_status)--}}
{{--                <ul class="nav navbar-nav">--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link" href data-toggle="dropdown">--}}
{{--                            <i class="fa fa-fw fa-plus text-muted"></i>--}}
{{--                            <span>{{ __('backend.new') }} </span>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu dropdown-menu-scale">--}}
{{--                                <?php--}}
{{--                                $data_sections_arr = explode(",", Auth::user()->permissionsGroup->data_sections);--}}
{{--                                $clr_ary = array("info", "danger", "success", "accent",);--}}
{{--                                $ik = 0;--}}
{{--                                $mnu_title_var = "title_" . @Helper::currentLanguage()->code;--}}
{{--                                $mnu_title_var2 = "title_" . env('DEFAULT_LANGUAGE');--}}
{{--                                ?>--}}
{{--                            @if(@Auth::user()->permissionsGroup->add_status)--}}
{{--                                @foreach($GeneralWebmasterSections as $headerWebmasterSection)--}}
{{--                                    @if(in_array($headerWebmasterSection->id,$data_sections_arr))--}}
{{--                                            <?php--}}
{{--                                            if ($headerWebmasterSection->$mnu_title_var != "") {--}}
{{--                                                $GeneralWebmasterSectionTitle = $headerWebmasterSection->$mnu_title_var;--}}
{{--                                            } else {--}}
{{--                                                $GeneralWebmasterSectionTitle = $headerWebmasterSection->$mnu_title_var2;--}}
{{--                                            }--}}
{{--                                            $LiIcon = "&#xe2c8;";--}}
{{--                                            if ($headerWebmasterSection->type == 3) {--}}
{{--                                                $LiIcon = "&#xe050;";--}}
{{--                                            }--}}
{{--                                            if ($headerWebmasterSection->type == 2) {--}}
{{--                                                $LiIcon = "&#xe63a;";--}}
{{--                                            }--}}
{{--                                            if ($headerWebmasterSection->type == 1) {--}}
{{--                                                $LiIcon = "&#xe251;";--}}
{{--                                            }--}}
{{--                                            if ($headerWebmasterSection->type == 0) {--}}
{{--                                                $LiIcon = "&#xe2c8;";--}}
{{--                                            }--}}
{{--                                            if ($headerWebmasterSection->id == 1) {--}}
{{--                                                $LiIcon = "&#xe3e8;";--}}
{{--                                            }--}}
{{--                                            if ($headerWebmasterSection->id == 7) {--}}
{{--                                                $LiIcon = "&#xe02f;";--}}
{{--                                            }--}}
{{--                                            if ($headerWebmasterSection->id == 2) {--}}
{{--                                                $LiIcon = "&#xe540;";--}}
{{--                                            }--}}
{{--                                            if ($headerWebmasterSection->id == 3) {--}}
{{--                                                $LiIcon = "&#xe307;";--}}
{{--                                            }--}}
{{--                                            if ($headerWebmasterSection->id == 8) {--}}
{{--                                                $LiIcon = "&#xe8f6;";--}}
{{--                                            }--}}

{{--                                            ?>--}}
{{--                                        <a class="dropdown-item"--}}
{{--                                           href="{{route("topicsCreate",$headerWebmasterSection->id)}}"><span><i--}}
{{--                                                    class="material-icons">{!! $LiIcon !!}</i> &nbsp;{!! $GeneralWebmasterSectionTitle !!}</span></a>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}

{{--                                @if(@Auth::user()->permissionsGroup->banners_status)--}}
{{--                                    <a class="dropdown-item" href="{{route("Banners")}}"><i class="material-icons">--}}
{{--                                            &#xe433;</i>--}}
{{--                                        &nbsp;{{ __('backend.adsBanners') }}</a>--}}
{{--                                @endif--}}
{{--                                <div class="dropdown-divider"></div>--}}

{{--                                @if(Helper::GeneralWebmasterSettings("newsletter_status"))--}}
{{--                                    @if(@Auth::user()->permissionsGroup->newsletter_status)--}}
{{--                                        <a class="dropdown-item" href="{{route("contacts")}}"><i class="material-icons">--}}
{{--                                                &#xe7ef;</i>--}}
{{--                                            &nbsp;{{ __('backend.newContacts') }}</a>--}}
{{--                                    @endif--}}
{{--                                @endif--}}
{{--                            @endif--}}
{{--                            @if(Helper::GeneralWebmasterSettings("inbox_status"))--}}
{{--                                @if(@Auth::user()->permissionsGroup->inbox_status)--}}
{{--                                    <a class="dropdown-item" href="{{ route("webmails",["group_id"=>"create"]) }}"><i--}}
{{--                                            class="material-icons">&#xe0be;</i> &nbsp;{{ __('backend.compose') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            @endif--}}

{{--                        </div>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            @endif--}}
{{--            <!-- / -->--}}
{{--        </div>--}}
        <!-- / navbar collapse -->
    </div>
</div>

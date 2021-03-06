@extends('layouts.admin')
@section('title', __('Add Entity Type'))
    @php
    $has_sidebar = false;
    @endphp

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">
            @include('layouts.messages')
            <div class="card mx-lg-4">
                <div class="card-head has-aside pd-2x">
                    <div style="font-size:1.29em; color:#342d6e"> <b>Entities > [ENTITY_NAME] ></b> <span style="font-size:0.8em"> Complete Formation/Onboarding</span></div>
                    <div class="card-opt data-action-list d-md-inline-flex">
                        <a href="{{ route('admin.entities') }}" class="btn btn-auto btn-sm btn-primary" >
                            <em class="fa fa-arrow-circle-left"> </em><span>Back</span>
                        </a>
                    </div>
                </div>
                <form action="{{ route('admin.ajax.entities.template1') }}" method="POST">
                    @csrf
                    <div class="form-step form-step1">
                        <div class="form-step-head card-innr">
                            <div class="step-head">
                                <div class="step-number">01</div>
                                <div class="step-head-text">
                                    <h4>{{__('Domiciliation & Office')}}</h4>
                                    <p>{{__('[text]')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-step-fields card-innr">
                            <p>{{ __('Current Office Situation') }}</p>
                            <div class="row">
                                <div class="col-md-6" >
                                    <div class="pt-2">{{ __('This Entity wishes to obtain physical office space in this Jurisdiction which it currently does not have yet.') }}</div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="input-item input-with-label">
                                        <div class="input-wrap input-wrap-switch">
                                            <span class="align-items-center d-flex pr-3">Yes</span>
                                            <input class="input-switch" name="physical" type="checkbox" id="physical">
                                            <label for="physical">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 physical" >
                                    <div class="pt-2">{{ __('This Entity will then register itself at the physical office space that it wishes to obtain.') }}</div>
                                </div>
                                <div class="col-lg-3 col-sm-6 physical">
                                    <div class="input-item input-with-label">
                                        <div class="input-wrap input-wrap-switch">
                                            <span class="align-items-center d-flex pr-3">Yes</span>
                                            <input class="input-switch" name="register" type="checkbox" id="register">
                                            <label for="register">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 register" >
                                    <div class="pt-2">{{ __('This Entity already has an address at which it can register and which complies with the requirements set for a Registered Address.') }}</div>
                                </div>
                                <div class="col-lg-3 col-sm-6 register">
                                    <div class="input-item input-with-label">
                                        <div class="input-wrap input-wrap-switch">
                                            <span class="align-items-center d-flex pr-3">Yes</span>
                                            <input class="input-switch" name="exist" type="checkbox" id="exist">
                                            <label for="exist">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr/>

                            <p class="office_selection">{{ __('Registered Office Selection') }}</p>
                            <div class="row office_selection">
                                <ul class="document-list guttar-vr-10px">
                                    <div class="col-md-6">
                                        <li class="document-item">
                                            <div class="input-wrap">
                                                <input class="document-type" type="radio" name="onboarding" value="passport" id="full_functionality" data-title="Passport" checked>
                                                <label for="full_functionality"><span>{{ __('Registered Office Address + Mail Forwarding Amsterdam ???95 / month') }}</span></label>
                                            </div>
                                        </li>
                                    </div>
                                    <div class="col-md-6">
                                        <li class="document-item">
                                            <div class="input-wrap">
                                                <input class="document-type" type="radio" name="onboarding" id="listing_only" value="nidcard" data-title="National ID Card">
                                                <label for="listing_only"><span>{{ __('This Entity will obtain a different Registered Address for itself at a later stage.') }}</span></label>
                                            </div>
                                        </li>
                                    </div>
                                </ul>
                            </div>
                            <hr class="office_selection" />

                            <p class="address">{{ __('Registered Address') }}</p>
                            <div class="row address">
                                <div class="col-md-4">
                                    <div class="input-item input-with-label">
                                        <label for="trading_name" class="input-item-label">{{__('Country')}}</label>
                                        <div class="input-wrap">
                                            <input class="input-bordered" type="text" value="Netherlands" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-item input-with-label">
                                        <label for="purpose_type" class="input-item-label">{{__('Municipality, Province')}}</label>
                                        <div class="input-wrap">
                                            <select class="select-bordered select-block" name="trading_name" id="trading_name" data-dd-class="search-on">
                                                <option value="" >{{ __('Select Options') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-item input-with-label">
                                        <label for="purpose_type" class="input-item-label">{{__('City / Town / Village')}}</label>
                                        <div class="input-wrap">
                                            <input class="input-bordered" type="text" placeholder="Input text" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-item input-with-label">
                                        <label for="purpose_type" class="input-item-label">{{__('Postal / Zip Code')}}</label>
                                        <div class="input-wrap">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <input class="input-bordered" type="text" placeholder="Input text" value="">
                                                </div>
                                                <div class="col-md-5">
                                                    <input class="input-bordered" type="text" placeholder="Input text" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-item input-with-label">
                                        <label for="purpose_type" class="input-item-label">{{__('Street')}}</label>
                                        <div class="input-wrap">
                                            <input class="input-bordered" type="text" placeholder="Input text" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-item input-with-label">
                                        <label for="purpose_type" class="input-item-label">{{__('Number')}}</label>
                                        <div class="input-wrap">
                                            <input class="input-bordered" type="text" placeholder="Input text" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-item input-with-label">
                                        <label for="purpose_type" class="input-item-label">{{__('Unit')}}</label>
                                        <div class="input-wrap">
                                            <input class="input-bordered" type="text" placeholder="Input text" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" name="share">
                                    <div class="pt-2">{{ __('This is a Residential Address.') }}</div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="input-item input-with-label">
                                        <div class="input-wrap input-wrap-switch">
                                            <span class="align-items-center d-flex pr-3">Yes</span>
                                            <input class="input-switch" name="separateLegal" type="checkbox" id="separateLegal">
                                            <label for="separateLegal">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" >
                                    <div class="pt-2">{{ __('The Registered Address is also the preferred Correspondence Address.') }}</div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="input-item input-with-label">
                                        <div class="input-wrap input-wrap-switch">
                                            <span class="align-items-center d-flex pr-3">Yes</span>
                                            <input class="input-switch" name="separateLegal" type="checkbox" id="separateLegal">
                                            <label for="separateLegal">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" >
                                    <div class="pt-2">{{ __('The Registered Address is also the address of the physical Local Head Office of this Entity.') }}</div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="input-item input-with-label">
                                        <div class="input-wrap input-wrap-switch">
                                            <span class="align-items-center d-flex pr-3">Yes</span>
                                            <input class="input-switch" name="separateLegal" type="checkbox" id="separateLegal">
                                            <label for="separateLegal">No</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr class="address" />

                            <p>{{ __('Electronic Correspondence') }}</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-item input-with-label">
                                        <label for="trading_name" class="input-item-label">{{__('Phone Number')}}</label>
                                        <div class="input-wrap">
                                            <input class="input-bordered" type="text" placeholder="Input text" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-item input-with-label">
                                        <label for="trading_name" class="input-item-label">{{__('Phone Number')}}</label>
                                        <div class="input-wrap">
                                            <input class="input-bordered" type="text" placeholder="Input text" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-item input-with-label">
                                        <label for="trading_name" class="input-item-label">{{__('Phone Number')}}</label>
                                        <div class="input-wrap">
                                            <input class="input-bordered" type="text" placeholder="Input text" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr/>

                            <p>{{ __('Local Head Office') }}</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-item input-with-label">
                                        <label for="trading_name" class="input-item-label">{{__('Country')}}</label>
                                        <div class="input-wrap">
                                            <input class="input-bordered" type="text" value="Netherlands" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-item input-with-label">
                                        <label for="purpose_type" class="input-item-label">{{__('Municipality, Province')}}</label>
                                        <div class="input-wrap">
                                            <select class="select-bordered select-block" name="trading_name" id="trading_name" data-dd-class="search-on">
                                                <option value="" >{{ __('Select Options') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-item input-with-label">
                                        <label for="purpose_type" class="input-item-label">{{__('City / Town / Village')}}</label>
                                        <div class="input-wrap">
                                            <input class="input-bordered" type="text" placeholder="Input text" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-item input-with-label">
                                        <label for="purpose_type" class="input-item-label">{{__('Postal / Zip Code')}}</label>
                                        <div class="input-wrap">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <input class="input-bordered" type="text" placeholder="Input text" value="">
                                                </div>
                                                <div class="col-md-5">
                                                    <input class="input-bordered" type="text" placeholder="Input text" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-item input-with-label">
                                        <label for="purpose_type" class="input-item-label">{{__('Street')}}</label>
                                        <div class="input-wrap">
                                            <input class="input-bordered" type="text" placeholder="Input text" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-item input-with-label">
                                        <label for="purpose_type" class="input-item-label">{{__('Number')}}</label>
                                        <div class="input-wrap">
                                            <input class="input-bordered" type="text" placeholder="Input text" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-item input-with-label">
                                        <label for="purpose_type" class="input-item-label">{{__('Unit')}}</label>
                                        <div class="input-wrap">
                                            <input class="input-bordered" type="text" placeholder="Input text" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" name="share">
                                    <div class="pt-2">{{ __('This is a Residential Address.') }}</div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="input-item input-with-label">
                                        <div class="input-wrap input-wrap-switch">
                                            <span class="align-items-center d-flex pr-3">Yes</span>
                                            <input class="input-switch" name="separateLegal" type="checkbox" id="separateLegal">
                                            <label for="separateLegal">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" name="share">
                                    <div class="pt-2">{{ __('The Local Head Office address is also the preferred Correspondence Address.') }}</div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="input-item input-with-label">
                                        <div class="input-wrap input-wrap-switch">
                                            <span class="align-items-center d-flex pr-3">Yes</span>
                                            <input class="input-switch" name="separateLegal" type="checkbox" id="separateLegal">
                                            <label for="separateLegal">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr/>

                            <p>{{ __('Branches') }}</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-between pdt-1x">
                                        <p> {{ __('This Entity will, in addition to its Local Head Office, have one or more branches in this Jurisdiction.') }}</p>
                                        <button class="btn btn-primary btn-sm"> {{ __('Add Branches') }}</button>
                                    </div>
                                    {{-- <table class="data-table dt-filter-init user-list pt-3">
                                        <thead>
                                            <tr class="data-item data-head">
                                                <th class="data-col filter-data dt-user ">{{ __('Branch Name') }}</th>
                                                <th class="data-col filter-data dt-user">{{ __('Province') }}</th>
                                                <th class="data-col filter-data dt-user">{{ __('Municipality') }}</th>
                                                <th class="data-col filter-data dt-user">{{ __('City / Town / Village') }}</th>
                                                <th class="data-col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($offices as $office)
                                                <tr class="data-item ">
                                                    <td class="data-col dt-user">
                                                        <span class="lead user-name">{{ $office->section_label }}</span>
                                                    </td>
                                                    <td class="data-col dt-user">
                                                        <span class="lead user-name">{{ $office->division_label }}</span>
                                                    </td>
                                                    <td class="data-col dt-user">
                                                        <span class="lead user-name">{{ $office->group_label }}</span>
                                                    </td>
                                                    <td class="data-col dt-user">
                                                        <span class="lead user-name">{{ $office->class_label }}</span>
                                                    </td>
                                                    <td class="data-col text-right" style="width:70px">
                                                        <div class="relative d-inline-block">
                                                            <a href="#" class="btn btn-light-alt btn-xs btn-icon toggle-tigger">
                                                                <em class="ti ti-more-alt"></em></a>
                                                            <div class="toggle-class dropdown-content dropdown-content-top-left">
                                                                <ul class="dropdown-list more-menu-{{ $office->id }}">
                                                                    <li>
                                                                        <a href="#" data-toggle="modal" data-target="#editJurisdiction" data-id="{{ $office->id }}"
                                                                            class="user-action front editJurisdiction">
                                                                            <em class="fas fa-edit"></em>Edit
                                                                        </a>
                                                                        <a href="#" data-uid="{{ $office->id }}" data-type="delete_user"
                                                                            data-url="{{ route('admin.ajax.juris.delete', $office->id) }}"
                                                                            class="user-action front"
                                                                            data-title="Are you sure you want to delete this Jurisdiction?">
                                                                            <em class="fas fa-trash-alt"></em>Delete
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table> --}}
                                    <div class="gaps-1x"></div>
                                </div>
                            </div>
                            <hr/>

                            <p class="correspondence">{{ __('Correspondence Address') }}</p>
                            <div class="row correspondence">
                                <div class="col-md-4">
                                    <div class="input-item input-with-label">
                                        <label for="trading_name" class="input-item-label">{{__('Country')}}</label>
                                        <div class="input-wrap">
                                            <input class="input-bordered" type="text" value="Netherlands" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-item input-with-label">
                                        <label for="purpose_type" class="input-item-label">{{__('Municipality, Province')}}</label>
                                        <div class="input-wrap">
                                            <select class="select-bordered select-block" name="trading_name" id="trading_name" data-dd-class="search-on">
                                                <option value="" >{{ __('Select Options') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-item input-with-label">
                                        <label for="purpose_type" class="input-item-label">{{__('City / Town / Village')}}</label>
                                        <div class="input-wrap">
                                            <input class="input-bordered" type="text" placeholder="Input text" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-item input-with-label">
                                        <label for="purpose_type" class="input-item-label">{{__('Postal / Zip Code')}}</label>
                                        <div class="input-wrap">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <input class="input-bordered" type="text" placeholder="Input text" value="">
                                                </div>
                                                <div class="col-md-5">
                                                    <input class="input-bordered" type="text" placeholder="Input text" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-item input-with-label">
                                        <label for="purpose_type" class="input-item-label">{{__('Street')}}</label>
                                        <div class="input-wrap">
                                            <input class="input-bordered" type="text" placeholder="Input text" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-item input-with-label">
                                        <label for="purpose_type" class="input-item-label">{{__('Number')}}</label>
                                        <div class="input-wrap">
                                            <input class="input-bordered" type="text" placeholder="Input text" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-item input-with-label">
                                        <label for="purpose_type" class="input-item-label">{{__('Unit')}}</label>
                                        <div class="input-wrap">
                                            <input class="input-bordered" type="text" placeholder="Input text" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" name="share">
                                    <div class="pt-2">{{ __('This is a Residential Address.') }}</div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="input-item input-with-label">
                                        <div class="input-wrap input-wrap-switch">
                                            <span class="align-items-center d-flex pr-3">Yes</span>
                                            <input class="input-switch" name="separateLegal" type="checkbox" id="separateLegal">
                                            <label for="separateLegal">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="gaps-2x"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-between pdt-1x">
                                        <a href="javascript:void(0)" class="btn btn-primary">{{ __('Previous Step') }}</a>
                                        <a href="javascript:void(0)" class="btn btn-primary">{{ __('Next Step') }}</a>
                                        {{-- <button class="btn btn-primary" type="submit"> {{ __('Next Step') }}</button> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="gaps-3x"></div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function CheckSpace(event) {
            console.log(event.which);
            if (event.which === 32) {
                event.preventDefault();
                return false;
            }
        }
    </script>
@endsection

@push('footer')
    <link rel="stylesheet" href="{{ asset('assets/plugins/trumbowyg/ui/trumbowyg.min.css')}}?ver=1.0">
    <script src="{{ asset('assets/plugins/trumbowyg/trumbowyg.min.js') }}?ver=101"></script>

    <script type="text/javascript">
        (function($) {
            var table = $('.data-table').DataTable({
                "destroy":          true,
                'scrollY':          300,
                "scrollCollapse":   true,
                "paging":           false,
                "ordering":         false,
                "info":             false,
                "searching":        false,
                "responsive":       true,
                "autoWidth":        false,
            });

            if($('.editor').length > 0){
                $('.editor').trumbowyg({autogrow: true});
            }
            var $_form = $('form#update_page');
            if ($_form.length > 0) {
                ajax_form_submit($_form, false);
            }
            physicalclick();
            $('#physical').on('click', function(){
                physicalclick();
            });
            registerclick();
            $('#register').on('click', function(){
                registerclick();
            });
            existclick();
            $('#exist').on('click', function(){
                existclick();
            })

            function physicalclick(){
                if ( $('#physical').prop('checked') ) $('.physical').show();
                else $('.physical').hide();
            }
            function registerclick(){
                if ( $('#register').prop('checked') ) {
                    $('.register').hide();
                    $('.correspondence').show()
                }
                else {
                    $('.register').show();
                    $('.correspondence').hide()
                }
            }
            function existclick(){
                if ( $('#exist').prop('checked') ) {
                    $('.office_selection').hide();
                    $('.address').show();
                } else {
                    $('.office_selection').show();
                    $('.address').hide();
                }
            }
        })(jQuery);
    </script>

@endpush

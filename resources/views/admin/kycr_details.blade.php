@extends('layouts.admin')
@section('title', 'KYC Residency')
@php
$space = "&nbsp;";
@endphp
@section('content')
<div class="page-content">
    <div class="container">
        <div class="card content-area">
            <div class="card-innr">
                <div class="card-head d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">{{ __('KYC Information') }} > {{ __('Residency') }} > <span>{{ _x($kyc->user->name).' '._x($kyc->user->last_name) }}</span></h4>
                    <div class="d-flex align-items-center guttar-20px">
                        <div class="flex-col d-sm-block d-none">
                            <a href="{{ route('admin.kycs.identity') }}" class="btn btn-sm btn-auto btn-primary"><em class="fas fa-arrow-left mr-3"></em>Back</a>
                        </div>
                        <div class="relative d-inline-block">
                            <a href="#" class="btn btn-dark btn-sm btn-icon toggle-tigger"><em class="ti ti-more-alt"></em></a>
                            <div class="toggle-class dropdown-content dropdown-content-top-left">
                                <ul class="dropdown-list">
                                    <li><a class="kyc_action" href="{{ route('admin.kyc.edit.residency', [$kyc->id, 'residency' ]) }}"><em class="far fa-edit"></em>{{__('Edit')}}</a></li>
                                    @if($kyc->status != 'approved')
                                    <li><a class="kyc_action" href="#" data-id="{{ $kyc->id }}" data-toggle="modal" data-target="#actionkyc"><em class="far fa-check-square"></em>{{__('Approve')}}</a></li>
                                    @endif
                                    @if($kyc->status != 'rejected')
                                    <li><a href="javascript:void(0)" data-current="{{ __status($kyc->status,'status') }}" data-id="{{ $kyc->id }}" class="kyc_reject"><em class="fas fa-ban"></em>{{__('Reject')}}</a></li>
                                    @endif
                                    @if($kyc->status == 'missing' || $kyc->status == 'rejected')
                                    <li><a href="javascript:void(0)" data-id="{{ $kyc->id }}" class="kyc_delete"><em class="fas fa-trash-alt"></em>{{__('Delete')}}</a></li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gaps-1-5x"></div>
                <div class="data-details d-md-flex flex-wrap align-items-center justify-content-between">
                    <div class="fake-class">
                        <span class="data-details-title">{{ __('Submited By') }}</span>
                        <span class="data-details-info">{{ set_id($kyc->user_id) }}</span>
                    </div>
                    <div class="fake-class">
                        <span class="data-details-title">{{ __('Submited On') }}</span>
                        <span class="data-details-info">{{ _date($kyc->created_at) }}</span>
                    </div>
                    @if($kyc->reviewed_by != 0)
                    <div class="fake-class">
                        <span class="data-details-title">{{ __('Checked By') }}</span>
                        <span class="data-details-info">{{ $kyc->checker_info->name .' '. $kyc->checker_info->last_name }}</span>
                    </div>
                    @else
                    <div class="fake-class">
                        <span class="data-details-title">{{ __('Checked On') }}</span>
                        <span class="data-details-info">{{ __('Not reviewed yet') }}</span>
                    </div>
                    @endif
                    @if($kyc->reviewed_at != NULL)
                    <div class="fake-class">
                        <span class="data-details-title">{{__('Checked On')}}</span>
                        <span class="data-details-info">{{ _date($kyc->updated_at) }}</span>
                    </div>
                    @endif
                    <div class="fake-class">
                        <span class="badge badge-md badge-{{ __status($kyc->status,'status')}} ucap">{{ __status($kyc->status, 'text') }}</span>
                    </div>
                    @if($kyc->notes !== NULL)
                    <div class="gaps-2x w-100 d-none d-md-block"></div>
                    <div class="w-100">
                        <form >
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-item input-with-label">
                                    <label for="first-name" class="input-item-label">{{__('Admin Note')}}</label>
                                    <div class="input-wrap">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{ $kyc->notes }}
                                                {{-- <textarea class="input-bordered " type="text">{{ $kyc->notes }}</textarea> --}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    @endif
                </div>
                <div class="gaps-3x"></div>
                <h5 style="color: #342d6e">{{__('Identity Details')}}</h5>
                <ul class="data-details-list" style="border:0px">
                    <li>
                        <div class="data-details-head col-md-4 text-primary" style="border-bottom: 1px solid #d2dde9">{{__('Current Residency')}}</div>
                        <div class="data-details-des col-md-8" style="border-left: 0px">{!! $space !!}</div>
                    </li>
                    <li>
                        <div class="data-details-head col-md-4" style="border-bottom: 1px solid #d2dde9">{{__('Current Country of Residence')}}</div>
                        <div class="data-details-des col-md-8" style="border-left: 0px">{!! ($kyc->country_residence_current) ? _x($kyc->country_residence_current) : $space !!}</div>
                    </li>
                    <li>
                        <div class="data-details-head col-md-4" style="border-bottom: 1px solid #d2dde9">{{ __('Date of Registration') }}</div>
                        <div class="data-details-des col-md-8" style="border-left: 0px">{!! ($kyc->country_residence_current_registration_date) ? _date($kyc->country_residence_current_registration_date, 'm/Y') : $space !!}</div>
                    </li>
                    <li>
                        <div class="data-details-head col-md-4 text-primary" style="border-bottom: 1px solid #d2dde9">{{__('Current Registered Address')}}</div>
                        <div class="data-details-des col-md-8" style="border-left: 0px">{!! $space !!}</div>
                    </li>
                    <li>
                        <div class="data-details-head col-md-4" style="border-bottom: 1px solid #d2dde9" >{{__('State / Province / Region')}}</div>
                        <div class="data-details-des col-md-8" style="border-left: 0px">{!! ($kyc->state_province_region) ? $kyc->state_province_region : $space !!}</div>
                    </li>{{-- li --}}
                    <li>
                        <div class="data-details-head col-md-4" style="border-bottom: 1px solid #d2dde9">{{__('City / Town / Village')}}</div>
                        <div class="data-details-des col-md-8" style="border-left: 0px">{!! ($kyc->city_town_village) ?$kyc->city_town_village : $space !!}</div>
                    </li>
                    <li>
                        <div class="data-details-head col-md-4" style="border-bottom: 1px solid #d2dde9">{{__('Zip / Postal Code')}}</div>
                        <div class="data-details-des col-md-8" style="border-left: 0px">{!! ($kyc->zip_postal_code) ? _x($kyc->zip_postal_code) : $space !!}</div>
                    </li>
                    <li>
                        <div class="data-details-head col-md-4" style="border-bottom: 1px solid #d2dde9">{{__('Street Name')}}</div>
                        <div class="data-details-des col-md-8" style="border-left: 0px">{!! ($kyc->street_name) ? _x($kyc->street_name) : $space !!}</div>
                    </li>
                    <li>
                        <div class="data-details-head col-md-4" style="border-bottom: 1px solid #d2dde9">{{__('House / Building Number')}}</div>
                        <div class="data-details-des col-md-8" style="border-left: 0px">{!! ($kyc->house_building_number) ? _x($kyc->house_building_number) : $space !!}</div>
                    </li>
                    <li>
                        <div class="data-details-head col-md-4" style="border-bottom: 1px solid #d2dde9">{{__('Floor / Apartment / Unit')}}</div>
                        <div class="data-details-des col-md-8" style="border-left: 0px; border-bottom: 1px solid #d2dde9">{!! ($kyc->floor_apt_unit) ? _x($kyc->floor_apt_unit) : $space !!}</div>
                    </li>
                </ul>
                <div class="gaps-3x"></div>

                <div class="gaps-3x"></div>
                <h5 style="color: #342d6e">{{__('Documents')}}</h5>
                <ul class="data-details-list">
                    <li>
                        <div class="data-details-head">
                            {{-- @if($kyc->documentType == 'nidcard')
                            National ID Card
                            @elseif($kyc->documentType == 'passport')
                            Passport
                            @elseif($kyc->documentType == 'license')
                            Driving License
                            @else
                            Documents
                            @endif --}}
                            {{__('Verification Document')}}
                        </div>
                        @if($kyc->document != NULL||$kyc->document2 != NULL||$kyc->document3 != NULL || $kyc->document4 != NULL)
                        <ul class="data-details-docs">
                            @if($kyc->document != NULL)
                            <li>
                                <span class="data-details-docs-title">{{ $kyc->documentType == 'nidcard' ? 'Front Side' : 'Document' }}</span>
                                <div class="data-doc-item data-doc-item-lg">
                                    <div class="data-doc-image">
                                        @if(pathinfo(storage_path('app/'.$kyc->document), PATHINFO_EXTENSION) == 'pdf')
                                        <em class="kyc-file fas fa-file-pdf"></em>
                                        @else
                                        <img src="{{ route('admin.kycs.file', ['file'=>$kyc->id, 'doc'=>1]) }}" src="">
                                        @endif
                                    </div>
                                    <ul class="data-doc-actions">
                                        <li><a href="{{ route('admin.kycs.file', ['file'=>$kyc->id, 'doc'=>1]) }}" target="_blank" ><em class="ti ti-import"></em></a></li>
                                    </ul>
                                </div>
                            </li>{{-- li --}}
                            @endif
                            @if($kyc->document2 != NULL)
                            <li>
                                <span class="data-details-docs-title">{{ $kyc->documentType == 'nidcard' ? 'Back Side' : 'Proof' }}</span>
                                <div class="data-doc-item data-doc-item-lg">
                                    <div class="data-doc-image">
                                        @if(pathinfo(storage_path('app/'.$kyc->document2), PATHINFO_EXTENSION) == 'pdf')
                                        <em class="kyc-file fas fa-file-pdf"></em>
                                        @else
                                        <img src="{{ route('admin.kycs.file', ['file'=>$kyc->id, 'doc'=>2]) }}" src="">
                                        @endif
                                    </div>
                                    <ul class="data-doc-actions">
                                        <li><a href="{{ route('admin.kycs.file', ['file'=>$kyc->id, 'doc'=>2]) }}" target="_blank"><em class="ti ti-import"></em></a></li>
                                    </ul>
                                </div>
                            </li>{{-- li --}}
                            @endif

                            @if($kyc->document3 != NULL)
                            <li>
                                <span class="data-details-docs-title">Proof</span>
                                <div class="data-doc-item data-doc-item-lg">
                                    <div class="data-doc-image">
                                        @if(pathinfo(storage_path('app/'.$kyc->document3), PATHINFO_EXTENSION) == 'pdf')
                                        <em class="kyc-file fas fa-file-pdf"></em>
                                        @else
                                        <img src="{{ route('admin.kycs.file', ['file'=>$kyc->id, 'doc'=>3]) }}" src="">
                                        @endif
                                    </div>
                                    <ul class="data-doc-actions">
                                        <li><a href="{{ route('admin.kycs.file', ['file'=>$kyc->id, 'doc'=>3]) }}" target="_blank"><em class="ti ti-import"></em></a></li>
                                    </ul>
                                </div>
                            </li>{{-- li --}}
                            @endif
                        </ul>

                        @else
                        No document uploaded.
                        @endif
                    </li>
                </ul>
                <ul class="data-details-list" style="border:0px">
                    <li>
                        <div class="data-details-head col-md-4" style="border-bottom: 1px solid #d2dde9;">{{__('Verification Document – Type')}}</div>
                        <div class="data-details-des col-md-8" style="border-left: 0px">{!! ($kyc->document_type) ? _x($kyc->document_type) : $space !!}</div>
                    </li>
                    <li>
                        <div class="data-details-head col-md-4" style="border-bottom: 1px solid #d2dde9">{{__('Verification Document – Date of Issuance')}}</div>
                        <div class="data-details-des col-md-8" style="border-left: 0px; border-bottom: 1px solid #d2dde9">{!! ($kyc->issue_date) ? _date($kyc->issue_date, 'd/m/Y') : $space !!}</div>
                    </li>

                </ul>
                <div class="gaps-3x"></div>
            </div>
        </div>
    </div>
</div>

{{-- Modal End --}}
<div class="modal fade" id="actionkyc" tabindex="-1">
    <div class="modal-dialog modal-dialog-md modal-dialog-centered">
        <div class="modal-content">
            <a href="#" class="modal-close" data-dismiss="modal"><em class="ti ti-close"></em></a>
            <div class="popup-body">
                <h3 class="popup-title">Approve the KYC Information</h3>
                <p>Please check details carefully of the application before take any action. User can not re-submit the application if you invalidated this application.</p>
                <form action="{{ route('admin.ajax.kyc.update') }}" method="POST" id="kyc_status_form">
                    @csrf
                    <input type="hidden" name="req_type" value="update_kyc_status">
                    <input type="hidden" name="kyc_id" id="kyc_id" required="required">
                    <div class="input-item input-with-label">
                        <label class="input-item-label">Admin Note</label>
                        <textarea name="notes" class="input-bordered input-textarea input-textarea-sm"></textarea>
                    </div>
                    <div class="input-item">
                        <input class="input-checkbox" id="send-email" checked type="checkbox">
                        <label for="send-email">Send Notification to Applicant</label>
                    </div>
                    <div class="gaps-1x"></div>
                    <ul class="btn-grp guttar-20px">
                        <li><button name="status" value="approved" class="form-progress-btn btn btn-md btn-primary ucap">Approve</button></li>
                        <li><button name="status" value="missing" class="form-progress-btn btn btn-md btn-light ucap">Missing</button></li>
                        <li><button name="status" value="rejected" class="form-progress-btn btn btn-md btn-danger ucap">Reject</button></li>
                    </ul>
                </form>
            </div>
        </div>{{-- .modal-content --}}
    </div>{{-- .modal-dialog --}}
</div>
{{-- Modal End --}}

@endsection

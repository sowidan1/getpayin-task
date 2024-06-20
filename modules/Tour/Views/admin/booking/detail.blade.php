@extends('admin.layouts.app',['body_class'=>'resource-edit-page'])

@section('content')
    <form action="{{route('tour.admin.booking.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}" method="post" id="booking-form">
        @csrf
        <div class="container-fluid overflow-y-auto d-flex flex-column">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{$row->id ? __('Edit: ').$row->title : __('Add new booking')}}</h1>
                    @if($row->slug)
                        <p class="item-url-demo">{{__("Permalink")}}: {{ url(config('tour.tour_route_prefix') ) }}/<a href="#" class="open-edit-input" data-name="slug">{{$row->slug}}</a>
                        </p>
                    @endif
                </div>
                <div class="">
                    @if($row->slug)
                        <a class="btn btn-primary btn-sm" href="{{$row->getDetailUrl(request()->query('lang'))}}" target="_blank">{{__("View Tour")}}</a>
                    @endif
                </div>
            </div>

            @include('admin.message')
            @if($row->id)
                @include('Language::admin.navigation')
            @endif
            <div class="lang-content-box overflow-y-auto h-100 pr-0 pb-0">
                <div class="d-flex h-100">
                    <div class="col-md-2 p-0">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <strong>
                                    <i class="fa fa-cogs"></i>
                                    {{__("Tour Information")}}</strong>
                            </div>
                            <div class="list-group list-group-flush">
                                <a href="#tab_general" class="list-group-item list-group-item-action active" data-toggle="tab">{{__('General')}}</a>
                                <a
                                    href="#tab_location" class="list-group-item list-group-item-action" data-toggle="tab"
                                >
                                    Customer/Guest Information
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 overflow-y-auto h-100">
                        <div class="d-flex flex-column overflow-y-auto h-100">
                            <div
                                class="tab-content flex-grow-1 overflow-y-auto mb-3 p-1"
                                data-action="{{route('tour.admin.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}"
                            >
                                <div class="tab-pane active" id="tab_general">
                                    @include('Tour::admin/booking/booking-content')
                                </div>
                                <div class="tab-pane" id="tab_location">
                                    @include('Tour::admin/booking/more-info')
                                </div>

                            </div>
                            <div class="flex-shrink-0 d-flex justify-content-between pb-3">
                                <div></div>
                                <div>
                                    <div class="text-right">
                                        <button class="btn btn-success" type="submit">
                                            <i class="fa fa-save"></i> {{__('Save changes')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

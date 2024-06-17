@if($layout == 'grid')
    <div class="pt-30 mt-30 border-top-light"></div>
@else
    <div class="pt-30"></div>
@endif

<div class="row y-gap-30">
    @if($rows->total() > 0)
        @foreach($rows as $row)

            @if($layout == 'grid')
                <div class="col-lg-4 col-sm-6">
                    @include('Boat::frontend.layouts.search.loop-grid-2',['wrap_class'=>'item-loop-wrap'])
                </div>
            @else
                <div class="col-12">
                    @include('Boat::frontend.layouts.search.loop-list',['wrap_class'=>'item-loop-wrap inner-loop-wrap'])
                </div>
            @endif
        @endforeach
    @else
        <div class="col-lg-12">
            {{__("Boat not found")}}
        </div>
    @endif
</div>

<div class="bravo-pagination">
    {{$rows->appends(request()->except(['_ajax']))->links()}}
    @if($rows->total() > 0)
        <div class="text-center mt-30 md:mt-10">
            <div class="text-14 text-light-1">{{ __("Showing :from - :to of :total boats",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</div>
        </div>
    @endif
</div>

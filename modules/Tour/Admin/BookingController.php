<?php
namespace Modules\Tour\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Core\Models\Attributes;
use Modules\Location\Models\Location;
use Modules\Location\Models\LocationCategory;
use Modules\Tour\Models\Booking;
use Modules\Tour\Models\Tour;
use Modules\Tour\Models\TourCategory;
use Modules\Tour\Models\TourTerm;
use Modules\Tour\Models\TourTranslation;
use Modules\Tour\Requests\BookingRequest;

class BookingController extends AdminController
{

    protected $tourClass;
    protected $tourTranslationClass;
    protected $tourCategoryClass;
    protected $tourTermClass;
    protected $attributesClass;
    protected $locationClass;
    /**
     * @var string
     */
    private $locationCategoryClass;

    public function __construct()
    {
        $this->setActiveMenu(route('tour.admin.index'));
        $this->tourClass = Tour::class;
        $this->tourTranslationClass = TourTranslation::class;
        $this->tourCategoryClass = TourCategory::class;
        $this->tourTermClass = TourTerm::class;
        $this->attributesClass = Attributes::class;
        $this->locationClass = Location::class;
        $this->locationCategoryClass = LocationCategory::class;
    }



    public function index(Request $request){

        $this->checkPermission('tour_create');

        $q = $this->tourClass::select("bravo_tours.*");

        if($request->query('s')){
            $q->where('title','like','%'.$request->query('s').'%');
        }

        if ($cat_id = $request->query('cat_id')) {
            $cat = TourCategory::find($cat_id);
            if(!empty($cat)) {
                $q->join('bravo_tour_category', function ($join) use ($cat) {
                    $join->on('bravo_tour_category.id', '=', 'bravo_tours.category_id')
                        ->where('bravo_tour_category._lft','>=',$cat->_lft)
                        ->where('bravo_tour_category._rgt','>=',$cat->_lft);
                });
            }
        }

        if(!$this->hasPermission('tour_manage_others')){
            $q->where('author_id',$this->currentUser()->id);
        }

        $q->orderBy('bravo_tours.id','desc');

        $rows = $q->paginate(10);

        $current_month = time();

        if($request->query('month')){
            $date = date_create_from_format('m-Y',$request->query('month'));
            if(!$date){
                $current_month = time();
            }else{
                $current_month = $date->getTimestamp();
            }
        }

        $prev_url = route('tour.admin.booking.index',array_merge($request->query(),[
           'month'=> date('m-Y',$current_month - MONTH_IN_SECONDS)
        ]));
        $next_url = route('tour.admin.booking.index',array_merge($request->query(),[
           'month'=> date('m-Y',$current_month + MONTH_IN_SECONDS)
        ]));

        $tour_categories = TourCategory::where('status', 'publish')->get()->toTree();
        $breadcrumbs = [
            [
                'name' => __('Tours'),
                'url'  => route('tour.admin.index')
            ],
            [
                'name'  => __('Booking'),
                'class' => 'active'
            ],
        ];
        $page_title = __('Tour Booking History');
        return view('Tour::admin.booking.index',compact('rows','tour_categories','breadcrumbs','current_month','page_title','request','prev_url','next_url'));
    }
    public function test(){
        $d = new \DateTime('2019-07-04 00:00:00');

        $d->modify('+ 4 hours');
        echo $d->format('Y-m-d H:i:s');
    }

    public function create(Request $request)
    {
        $this->checkPermission('tour_create');
        $row = new Tour();
        $row->fill([
            'status' => 'publish'
        ]);
        $data = [
            'row'               => $row,
            'tours'             => $this->tourClass::where('status', 'publish')->get(),
            'attributes'        => $this->attributesClass::where('service', 'tour')->get(),
            'tour_location'     => $this->locationClass::where('status', 'publish')->get()->toTree(),
            'translation'       => new $this->tourTranslationClass(),
            'breadcrumbs'       => [
                [
                    'name' => __('Tours'),
                    'url'  => route('tour.admin.index')
                ],
                [
                    'name'  => __('Add Tour'),
                    'class' => 'active'
                ],
            ],
            'page_title'        => __("Add booking"),
        ];
        return view('Tour::admin.booking.detail', $data);
    }

    public function store(BookingRequest $request){

        $this->checkPermission('tour_create');

        $data = $request->validated();

        Booking::create([
            'tour_id' => $data['tour_id'],
            'date' => $data['date'],
            'adults' => $data['adults'],
            'children' => $data['children'],
            'clean' => $data['clean'] ? true : false,
            'breakfast' => $data['breakfast'] ? true : false,
            'fees' => Booking::FEES,
            'total_price' => $data['total_price'],
            'status' => Booking::STATUS_PENDING,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address_line_1' => $data['address_line_1'],
            'address_line_2' => $data['address_line_2'],
            'country' => $data['country'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip' => $data['zip'],
            'special_requirements' => $data['special_requirements'],

        ]);

        return redirect()->route('tour.admin.booking.index')->with('success',__('Booking has been created successfully'));
    }

}

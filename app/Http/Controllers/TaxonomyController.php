<?php

namespace App\Http\Controllers;

use App\Category;
use App\Utils\ModuleUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class TaxonomyController extends Controller
{
    /**
     * All Utils instance.
     *
     */
    protected $moduleUtil;

    /**
     * Constructor
     *
     * @param ProductUtils $product
     * @return void
     */
    public function __construct(ModuleUtil $moduleUtil)
    {
        $this->moduleUtil = $moduleUtil;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_type = request()->get('type');
        if ($category_type == 'product' && !auth()->user()->can('category.view') && !auth()->user()->can('category.create')) {
            abort(403, 'Unauthorized action.');
        }

        // if (request()->ajax()) {
        //     $business_id = request()->session()->get('user.business_id');

        //     $category = Category::where('business_id', $business_id)
        //                     ->where('category_type', $category_type)
        //                     ->select(['name', 'short_code', 'description', 'id', 'parent_id']);

        //     return Datatables::of($category)
        //         ->addColumn(
        //             'action',
        //             '
        //             <button data-href="{{action(\'TaxonomyController@edit\', [$id])}}?type=' . $category_type . '" class="btn btn-xs btn-primary edit_category_button"><i class="glyphicon glyphicon-edit"></i>  @lang("messages.edit")</button>
        //                 &nbsp;
                    
        //                 <button data-href="{{action(\'TaxonomyController@destroy\', [$id])}}" class="btn btn-xs btn-danger delete_category_button"><i class="glyphicon glyphicon-trash"></i> @lang("messages.delete")</button>
        //             '
        //         )
        //         ->editColumn('name', function ($row) {
        //             if ($row->parent_id != 0) {
        //                 return '--' . $row->name;
        //             } else {
        //                 return $row->name;
        //             }
        //         })
        //         ->removeColumn('id')
        //         ->removeColumn('parent_id')
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }

        $business_id = request()->session()->get('user.business_id');
        $module_category_data = $this->moduleUtil->getTaxonomyData($category_type);
        $all_categories = Category::with(['sub_categories'])
            ->where('business_id', $business_id)
            ->where('category_type', $category_type)
            ->where('parent_id', 0)
            ->select(['name', 'short_code', 'description', 'id', 'parent_id', 'category_type'])->get();

            return view('taxonomy.index')->with(compact('module_category_data', 'module_category_data', 'all_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_type = request()->get('type');
        if ($category_type == 'product' && !auth()->user()->can('category.view') && !auth()->user()->can('category.create')) {
            abort(403, 'Unauthorized action.');
        }
        $quick_add = false;
        if (!empty(request()->input('quick_add'))) {
            $quick_add = true;
        }
        $business_id = request()->session()->get('user.business_id');

        $module_category_data = $this->moduleUtil->getTaxonomyData($category_type);

        $categories = Category::where('business_id', $business_id)
                        ->where('parent_id', 0)
                        ->where('category_type', $category_type)
                        ->select(['name', 'short_code', 'id'])
                        ->get();

        $parent_categories = [];
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $parent_categories[$category->id] = $category->name;
            }
        }

        return view('taxonomy.create')
                    ->with(compact('parent_categories', 'module_category_data', 'category_type','quick_add'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_type = request()->input('category_type');
        if ($category_type == 'product' && !auth()->user()->can('category.view') && !auth()->user()->can('category.create')) {
            abort(403, 'Unauthorized action.');
        }

        try {
            $input = $request->only(['name', 'short_code', 'category_type', 'description']);
            if (!empty($request->input('add_as_sub_cat')) &&  $request->input('add_as_sub_cat') == 1 && !empty($request->input('parent_id'))) {

                $input['parent_id'] = $request->input('parent_id');
            } else {
                //child-category
                if (!empty($request->input('add_as_child_cat')) &&  $request->input('add_as_child_cat') == 1 && !empty($request->input('sub_parent_id'))) {
                    $input['parent_id'] = $request->input('sub_parent_id');
                } else {
                    $input['parent_id'] = 0;
                }
            }
            $input['business_id'] = $request->session()->get('user.business_id');
            $input['created_by'] = $request->session()->get('user.id');

            $category = Category::create($input);
            $output = ['success' => true,
                            'data' => $category,
                            'msg' => __("category.added_success")
                        ];
        } catch (\Exception $e) {
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            
            $output = ['success' => false,
                            'msg' => __("messages.something_went_wrong")
                        ];
        }

        return $output;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_type = request()->get('type');
        if ($category_type == 'product' && !auth()->user()->can('category.view') && !auth()->user()->can('category.create')) {
            abort(403, 'Unauthorized action.');
        }

        if (request()->ajax()) {
            $business_id = request()->session()->get('user.business_id');
            $category = Category::where('business_id', $business_id)->find($id);

            $module_category_data = $this->moduleUtil->getTaxonomyData($category_type);

            $parent_categories = Category::where('business_id', $business_id)
                ->where('parent_id', 0)
                ->where('category_type', $category_type)
                ->where('id', '!=', $id)
                ->pluck('name', 'id');


            $sub_categories = Category::where('business_id', $business_id)
                ->whereIn('parent_id', Category::where('business_id', $business_id)->where('parent_id', 0)->pluck('id'))
                ->where('category_type', $category_type)
                ->where('id', '!=', $id)
                ->pluck('name', 'id');;


            $is_parent = false;
            $is_child = false;

            $sub_parent_categories = [];

            if ($category->parent_id == 0) {
                $is_parent = true;
                $selected_parent = null;
                $selected_sub_parent = null;
            } else {

                foreach ($sub_categories as $key => $value) {
                    if ($category->parent_id == $key) {
                        $is_child = true;
                        $selected_sub_parent = $key;
                    }
                }

                if ($is_child) {
                    $selected_parent = Category::where('business_id', $business_id)->find($selected_sub_parent)->parent_id;
                    $sub_parent_categories = Category::where('business_id', $business_id)
                        ->where('parent_id', $selected_parent)->where('category_type', $category_type)
                        ->where('id', '!=', $id)
                        ->pluck('name', 'id');
                } else {
                    $selected_parent = $category->parent_id;
                    $selected_sub_parent = null;
                }
            }



            return view('taxonomy.edit')
                ->with(compact('category', 'parent_categories', 'sub_parent_categories', 'is_parent', 'is_child', 'selected_parent', 'selected_sub_parent', 'module_category_data'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if (request()->ajax()) {
            try {

                $validator = Validator::make($request->all(), [
                    'name' => Rule::unique('categories')->where(function ($query) {
                        $query->whereNull('deleted_at');
                    })->ignore($id),
                ]);

                if ($validator->fails()) {
                    $output = [
                        'success' => false,
                        'msg' => $validator->errors()->first('name')
                    ];

                    return $output;
                }

                $input = $request->only(['name', 'description']);
                $business_id = $request->session()->get('user.business_id');

                $category = Category::where('business_id', $business_id)->findOrFail($id);
                $category->name = $input['name'];
                $category->description = $input['description'];
                $category->short_code = $request->input('short_code');

                if (!empty($request->input('add_as_sub_cat')) &&  $request->input('add_as_sub_cat') == 1 && !empty($request->input('parent_id'))) {
                    $category->parent_id = $request->input('parent_id');
                } else {

                    //child-category
                    if (!empty($request->input('add_as_child_cat')) &&  $request->input('add_as_child_cat') == 1 && !empty($request->input('sub_parent_id'))) {
                        $category->parent_id = $request->input('sub_parent_id');
                    } else {
                        $category->parent_id = 0;
                    }
                }
                $category->save();

                $output = [
                    'success' => true,
                    'msg' => __("category.updated_success")
                ];
            } catch (\Exception $e) {
                \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());

                $output = [
                    'success' => false,
                    'msg' => __("messages.something_went_wrong")
                ];
            }

            return $output;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (request()->ajax()) {
            try {
                $business_id = request()->session()->get('user.business_id');

                $category = Category::with(['products', 'sub_products', 'child_products'])->where('business_id', $business_id)->findOrFail($id);

                if($category->products->count() > 0 || $category->sub_products->count() > 0 || $category->child_products->count() > 0){
                    $output = [
                        'success' => false,
                        'msg' => 'This category already has product.'
                    ];
                }else{
                    $category->delete();

                    $output = [
                        'success' => true,
                        'msg' => __("category.deleted_success")
                    ];
                }
                
            } catch (\Exception $e) {
                \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());

                $output = [
                    'success' => false,
                    'msg' => __("messages.something_went_wrong")
                ];
            }

            return $output;
        }
    }

    public function getCategoriesApi()
    {
        try {
            $api_token = request()->header('API-TOKEN');

            $api_settings = $this->moduleUtil->getApiSettings($api_token);
            
            $categories = Category::catAndSubCategories($api_settings->business_id);
        } catch (\Exception $e) {
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            
            return $this->respondWentWrong($e);
        }

        return $this->respond($categories);
    }

    /**
     * get taxonomy index page
     * through ajax
     * @return \Illuminate\Http\Response
     */
    public function getTaxonomyIndexPage(Request $request)
    {
        if (request()->ajax()) {
            $category_type = $request->get('category_type');
            $module_category_data = $this->moduleUtil->getTaxonomyData($category_type);

            return view('taxonomy.ajax_index')
                ->with(compact('module_category_data', 'category_type'));
        }
    }
}

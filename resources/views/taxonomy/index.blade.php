@extends('layouts.app')
@php
    $heading = !empty($module_category_data['heading']) ? $module_category_data['heading'] : __('category.categories');
    $navbar = !empty($module_category_data['navbar']) ? $module_category_data['navbar'] : null;
@endphp
@section('title', $heading)

@section('content')
    @if (!empty($navbar))
        @include($navbar)
    @endif


    <style>
        .cat_tree,
        .cat_tree ul {
            margin: 0;
            padding: 0;
            list-style: none
        }

        .cat_tree ul {
            margin-left: 1em;
            position: relative
        }

        .cat_tree ul ul {
            margin-left: .5em
        }

        .cat_tree ul:before {
            content: "";
            display: block;
            width: 0;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            border-left: 1px solid
        }

        .cat_tree li {
            margin: 0;
            padding: 0 1em;
            line-height: 2em;
            position: relative
        }

        .cat_tree ul li:before {
            content: "";
            display: block;
            width: 10px;
            height: 0;
            border-top: 1px solid;
            margin-top: -1px;
            position: absolute;
            top: 1em;
            left: 0
        }

        .cat_tree ul li:last-child:before {
            background: #fff;
            height: auto;
            top: 1em;
            bottom: 0
        }

        .indicator {
            margin-right: 5px;
        }

        .cat_tree li a {
            text-decoration: none;
            color: #369;
        }

        /* .cat_tree li button,
                                .cat_tree li button:active,
                                .cat_tree li button:focus {
                                    text-decoration: none;
                                    color: #369;
                                    border: none;
                                    background: transparent;
                                    margin: 0px 0px 0px 0px;
                                    padding: 0px 0px 0px 0px;
                                    outline: 0;
                                } */
    </style>



    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ $heading }}
            <small>
                {{ $module_category_data['sub_heading'] ?? __('category.manage_your_categories') }}
            </small>
            @if (isset($module_category_data['heading_tooltip']))
                @show_tooltip($module_category_data['heading_tooltip'])
            @endif
        </h1>
        <!-- <ol class="breadcrumb">
                                                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                                                <li class="active">Here</li>
                                            </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
        @php
            $cat_code_enabled = isset($module_category_data['enable_taxonomy_code']) && !$module_category_data['enable_taxonomy_code'] ? false : true;
        @endphp
        <input type="hidden" id="category_type" value="{{ request()->get('type') }}">
        @component('components.widget', ['class' => 'box-solid'])
            @slot('tool')
                <div class="box-tools">
                    <button type="button" class="btn btn-block btn-primary btn-modal"
                        data-href="{{ action('TaxonomyController@create') }}?type={{ request()->get('type') }}"
                        data-container=".category_modal">
                        <i class="fa fa-plus"></i> @lang('messages.add')</button>
                </div>
            @endslot

            <div class="row category_section">
                <div class="col-md-6">
                    <h3>Category List</h3>
                    <ul id="cat_list">
                        @foreach ($all_categories as $category)
                            <li>

                                <img src="{{ asset('images/f.png') }}" alt="" width="18" height="18">
                               
                                    {{ $category->name }} ({{ $category->sub_categories->count() }})
                              
                                <span>
                                    <button
                                    data-href="{{ action('TaxonomyController@edit', [$category->id]) }}?type={{ $category->category_type }}"
                                    class="btn btn-xs edit_category_button">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </button>

                                <button data-href="{{ action('TaxonomyController@destroy', [$category->id]) }}"
                                    class="btn btn-xs delete_category_button"><i
                                        class="glyphicon glyphicon-trash"></i></button>
                                </span>
                                
                                @if (count($category->sub_categories))
                                    <ul>
                                        @foreach ($category->sub_categories as $sub)
                                            <li>

                                                <img src="{{ asset('images/f.png') }}" alt="" width="18"
                                                    height="18">
                                                
                                                    {{ $sub->name }} ({{ $sub->sub_categories->count() }})
                                                
                                                <span>
                                                    <button
                                                    data-href="{{ action('TaxonomyController@edit', [$sub->id]) }}?type={{ $sub->category_type }}"
                                                    class="btn btn-xs edit_category_button">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </button>

                                                <button data-href="{{ action('TaxonomyController@destroy', [$sub->id]) }}"
                                                    class="btn btn-xs delete_category_button"><i
                                                        class="glyphicon glyphicon-trash"></i></button>
                                                </span>
                                                
                                                @if (count($sub->sub_categories))
                                                    <ul>
                                                        @foreach ($sub->sub_categories as $child)
                                                            <li>
                                                          
                                                                    {{ $child->name }}
                                                                <span>
                                                                    <button
                                                                    data-href="{{ action('TaxonomyController@edit', [$child->id]) }}?type={{ $child->category_type }}"
                                                                    class="btn btn-xs edit_category_button">
                                                                    <i class="glyphicon glyphicon-edit"></i>
                                                                </button>
                                                                <button
                                                                    data-href="{{ action('TaxonomyController@destroy', [$child->id]) }}"
                                                                    class="btn btn-xs delete_category_button"><i
                                                                        class="glyphicon glyphicon-trash"></i></button>
                                                                </span>
                                                                
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        @endcomponent

        {{-- <div class="table-responsive">
                <table class="table table-bordered table-striped" id="category_table">
                    <thead>
                        <tr>
                            <th>@if (!empty($module_category_data['taxonomy_label'])) {{$module_category_data['taxonomy_label']}} @else @lang( 'category.category' ) @endif</th>
                            @if ($cat_code_enabled)
                                <th>{{ $module_category_data['taxonomy_code_label'] ?? __( 'category.code' )}}</th>
                            @endif
                            <th>@lang( 'lang_v1.description' )</th>
                            <th>@lang( 'messages.action' )</th>
                        </tr>
                    </thead>
                </table>
            </div> --}}









        <div class="modal fade category_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        </div>




    </section>
    <!-- /.content -->
@stop
@section('javascript')
    @includeIf('taxonomy.taxonomies_js')

    <script>
        $.fn.extend({
            cat_treed: function(o) {

                var openedClass = '';
                var closedClass = '';

                if (typeof o != 'undefined') {
                    if (typeof o.openedClass != 'undefined') {
                        openedClass = o.openedClass;
                    }
                    if (typeof o.closedClass != 'undefined') {
                        closedClass = o.closedClass;
                    }
                };

                /* initialize each of the top levels */
                var cat_tree = $(this);
                cat_tree.addClass("cat_tree");
                cat_tree.find('li').has("ul").each(function() {
                    var branch = $(this);
                    branch.prepend("");
                    branch.addClass('branch');
                    branch.on('click', function(e) {
                        if (this == e.target) {
                            var icon = $(this).children('i:first');
                            icon.toggleClass(openedClass);
                            $(this).children().children().toggle();
                        }
                    })
                    branch.children().children().toggle();
                });
                /* fire event from the dynamically added icon */
                cat_tree.find('.branch .indicator').each(function() {
                    $(this).on('click', function() {
                        $(this).closest('li').click();
                    });
                });
                /* fire event to open branch if the li contains an anchor instead of text */
                cat_tree.find('.branch>a').each(function() {
                    $(this).on('click', function(e) {
                        $(this).closest('li').click();
                        e.preventDefault();
                    });
                });
                /* fire event to open branch if the li contains a button instead of text */
                cat_tree.find('.branch>button').each(function() {
                    $(this).on('click', function(e) {
                        $(this).closest('li').click();
                        e.preventDefault();
                    });
                });
            }
        });
        /* Initialization of cat_treeviews */
        $('#cat_list').cat_treed();
    </script>
@endsection

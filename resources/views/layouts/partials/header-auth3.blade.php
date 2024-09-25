@inject('request', 'Illuminate\Http\Request')

<div class="container-fluid">

    <!-- Language changer -->
    <div class="row">
        <div class="col-md-6">
            <div class="pull-left mt-10">

            </div>
        </div>
        <div class="col-md-6">
            <div class="pull-right text-white margin">
                @if (!($request->segment(1) == 'business' && $request->segment(2) == 'register'))

                    <!-- Register Url -->
                    @if (config('constants.allow_registration'))
                        <a href="/" class="btn">Home Page</a>
                    @endif
                @endif

                @if (!($request->segment(1) == 'business' && $request->segment(2) == 'register') && $request->segment(1) != 'login')
                    <a class="btn"
                        href="{{ action('Auth\LoginController@login') }}@if (!empty(request()->lang)) {{ '?lang=' . request()->lang }} @endif">Login</a>
                @endif
            </div>
        </div>
    </div>
</div>

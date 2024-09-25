@extends('layouts.app')
@section('title', __('Birth day list'))
@push('css')
    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>@lang('Contact Birtth Day List') @show_tooltip(__('Birtth Day List'))
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        @component('components.widget', ['class' => 'box-primary']) 
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="example" >
                    <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Type') }}</th>
                            <th>{{ __('Date of Birth') }}</th>
                            <th>@lang('messages.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($birthDays as $row)
                        <tr>
                            <td>{{ __($row->first_name ? $row->first_name : '') }} {{ $row->last_name ? $row->last_name : '' }}</td>
                            <td>{{ __($row->type ? $row->type : '') }}</td>
                            <td>{{ __(date('d-M-Y',strtotime($row->dob ? $row->dob : ''))) }}</td>
                            <td>
                                <form action="{{ route('wishMessage',$row->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-sm">{{ __('Send Wish') }}</button>
                                </form> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> 
        @endcomponent 
    </section>
    <!-- /.content -->

@endsection
@push('js')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush

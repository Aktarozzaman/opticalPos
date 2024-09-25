@extends('layouts.app')
@section('title', 'Message Template')
@section('content')
    <section class="content-header">
        <h1>{{ __('Message Template') }}</h1>
    </section>
    <section class="content">
        @component('components.widget', ['class' => 'box-primary'])
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box mt-4">
                        <div class="d-flex justify-content-between mb-4">
                            <h4 class="">Message Template</h4>
                            <button onclick="window.location.href='{{ route('templates.listing') }}'"
                                class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i> Create New Template
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mt-4" id="data-table">
                                <thead class="theme-primary text-white">
                                    <tr>
                                        <th style="width: 5%">Sl</th>
                                        <th style="width: 20%">Title</th>
                                        <th style="width: 45%">Message</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($templateListings as $templateInfo)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $templateInfo->title_template }}</td>
                                        <td>{{ $templateInfo->template_message }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" onclick="window.location.href='{{ route('templates.edit', $templateInfo->id) }}'" class="btn btn-success btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-{{ $templateInfo->id }}').submit();">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <form id="delete-{{ $templateInfo->id }}" action="{{ route('templates.destroy', $templateInfo->id) }}" method="POST" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $templateListings->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endcomponent
    </section>
@endsection

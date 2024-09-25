@extends('layouts.app')
@section('title', 'SMS Group Lis');
@section('content')
    <section class="content-header">
        <h1>{{ __('SMS Group Lis') }} </h1>
    </section>
    <section class="content">
        @component('components.widget', ['class' => 'box-primary'])
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box mt-4">
                        <div class="d-flex justify-content-between mb-4">
                            <h4 class="">SMS Group List</h4>
                            <button onclick="window.location.href='{{ route('groups.listing') }}'"
                                class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i> Create New Group
                            </button>
                        </div>
                        <table class="table table-bordered table-responsive mt-4" id="data-table">
                            <thead class="theme-primary text-white">
                                <tr>
                                    <th style="width: 5%">Sl</th>
                                    <th style="width: 20%">Group Name</th>
                                    <th style="width: 45%">Contact Number</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groupListings as $groupInfo)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $groupInfo->group_name }}</td>
                                    <td>
                                        @foreach ($groupInfo->GroupContact as $contact)
                                            <div class="contact-item">
                                                <span class="contact-number">{{ $contact->mobile_number }}</span>
                                            </div>
                                        @endforeach
                                    </td>
                                    
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" onclick="window.location.href='{{ route('groups.edit', $groupInfo->id) }}'" class="btn btn-success btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-{{ $groupInfo->id }}').submit();">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form id="delete-{{ $groupInfo->id }}" action="{{ route('groups.destroy', $groupInfo->id) }}" method="POST" class="d-none">
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
                </div>
            </div>
        @endcomponent
    </section>
@endsection

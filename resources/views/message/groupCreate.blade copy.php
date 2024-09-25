@extends('layouts.app')

@section('title', 'Create New Group')

@section('content')
    <section class="content-header">
        <h1>Create New Group</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <form action="{{ route('groups.groupCreate') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="group_name">Group Name:</label>
                            <input type="text" id="group_name" name="group_name" class="form-control" required>
                        </div>

                        <div id="contact_fields">
                            <div class="form-group contact-field">
                                <label for="group_contacts">Group Contact:</label>
                                <input type="text" name="group_contacts[]" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="#" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

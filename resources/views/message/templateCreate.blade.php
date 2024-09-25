@extends('layouts.app')

@section('title', 'Create New Template')

@section('content')
    <section class="content-header">
        <h1>Create New Template</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <form action="{{ route('templates.templateCreate') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title_template">Title:</label>
                            <input type="text" id="title_template" name="title_template" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="template_message">Message:</label>
                            <textarea id="template_message" name="template_message" class="form-control" rows="5" required></textarea>
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

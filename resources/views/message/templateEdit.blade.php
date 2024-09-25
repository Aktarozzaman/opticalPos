@extends('layouts.app')

@section('title', 'Edit Template')

@section('content')
    <section class="content-header">
        <h1>Edit Template</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <form action="{{ route('templates.update', $template->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title_template">Title:</label>
                            <input type="text" id="title_template" name="title_template" class="form-control" value="{{ $template->title_template }}" required>
                        </div>

                        <div class="form-group">
                            <label for="template_message">Message:</label>
                            <textarea id="template_message" name="template_message" class="form-control" rows="5" required>{{ $template->template_message }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Template</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

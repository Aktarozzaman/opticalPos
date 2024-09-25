@extends('layouts.app')

@section('title', 'Edit Group')

@section('content')
    <section class="content-header">
        <h1>Edit Group</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <form action="{{ route('groups.update', $group->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="group_name">Group Name:</label>
                            <input type="text" id="group_name" name="group_name" class="form-control" value="{{ $group->group_name }}" required>
                        </div>

                        <div id="contact_fields">
                            @foreach ($group->GroupContact as $contact)
                                <div class="form-group contact-field">
                                    <label for="group_contacts">Group Contact:</label>
                                    <input type="number" name="group_contacts[]" class="form-control" value="{{ $contact->mobile_number }}" required>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <button type="button" id="add_contact" class="btn btn-primary">Add Contact</button>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Add event listener to the "Add Contact" button
            var addContactButton = document.getElementById('add_contact');
            addContactButton.addEventListener('click', addContactField);

            // Function to add a new contact input field
            function addContactField() {
                var contactFieldsContainer = document.getElementById('contact_fields');

                var contactField = document.createElement('div');
                contactField.classList.add('form-group', 'contact-field');

                var label = document.createElement('label');
                label.textContent = 'Group Contact:';
                contactField.appendChild(label);

                var input = document.createElement('input');
                input.type = 'text';
                input.name = 'group_contacts[]';
                input.classList.add('form-control');
                input.required = true;
                contactField.appendChild(input);

                contactFieldsContainer.appendChild(contactField);
            }
        });
    </script>
@endsection

@extends('layouts.app')
@section('title', 'notifications');
@section('content')
    <section class="content-header">
        <h1>{{ __('Send SMS') }} </h1>
    </section>
    <section class="content">
        @component('components.widget', ['class' => 'box-primary'])
            <div class="row">
                <form action="{{ route('smsnotification.store') }}" method="post">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Select User Type<span class="text-danger" id="spanhide"> *</span></label>
                            <select class="form-control user_type" name="user_type" id="user_type">
                                <option value="">{{ __('Select Customer/Vendor') }}</option>
                                <option value="customer">{{ __('Customer') }}</option>
                                <option value="supplier">{{ __('Supplier') }}</option>
                            </select>
                        </div>
                    </div>

                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Select form draft message(optional)</label>
                            <select class="form-control draft_message_id" name="draft_message_id" id="draft_message_id">
                                <option value="">{{ __('Select message') }}</option>
                                @foreach ($draftMessages as $draftMessage)
                                    <option value="{{ $draftMessage->id }}">{{ $draftMessage->message }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <label>Message <span class="text-danger"> *</span></label><br>
                        <textarea rows="5" cols="90" name="message" id="message" class="form-control messagetext" required
                            placeholder="Wright message" autofocus></textarea>
                    </div>
                    <div class="col-md-3" style="margin-top: 24px;">
                        @component('components.widget', ['class' => 'box-primary'])
                            <div class="row">
                                <div class="col-md-12" style="min-height: 90px;">
                                    <div id="the-count" style="margin-top: 15px;">
                                        <span id="current" style="color: green;font-weight: bolder;">Character count :
                                            0</span><br>
                                        <span id="messages" style="color: red;font-weight: bolder;">SMS count : 0</span><br>
                                        <span id="remaining" style="color: green;font-weight: bolder;">Characters remaining :
                                            160</span>
                                    </div>
                                </div>
                            </div>
                        @endcomponent
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SMS Status <span class="text-danger">*</span></label><br>
                            <label for="send_sms_now">
                                <input type="radio" class="send_sms_now" name="sms_status" value="send_sms_now"
                                    id="send_sms_now" checked>
                                <small>Send now</small></label>
                            <label for="save_draft">
                                <input type="radio" class="save_draft" name="sms_status" value="save_draft" id="save_draft">
                                <small>Save draft</small></label>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-info" style="margin-top: 5px;">Submit</button>
                    </div>
                </form>
            </div>
        @endcomponent
    </section>
@endsection
@push('js')
    <script>
        $('textarea').on('keyup click', function() {

            var characterCount = $(this).val().length,
                current = $('#current'),
                maximum = $('#maximum'),
                theCount = $('#the-count');

            current.text('Character count : ' + characterCount);
        });
    </script>
    <script>
        var $remaining = $('#remaining'),
            $messages = $remaining.next();

        $('#message').on('keyup click', function() {
            var chars = this.value.length,
                messages = Math.ceil(chars / 160),
                remaining = messages * 160 - (chars % (messages * 160) || messages * 160);

            $('#remaining').text('Characters remaining : ' + remaining);
            $('#messages').text('SMS Count : ' + messages);
        });
    </script>
    <script>
        $('#draft_message_id').on('change', function() {
            var draftId = $(this).val();

            $.ajax({
                type: "GET",
                url: "{{ url('get-draft-message-details') }}/" + draftId,
                data: {
                    'draftId': draftId
                },
                success: function(data) {
                    $('.messagetext').val(data.message);
                }
            })
        });

        $('#user_type').attr('required', 'required');
        $('#send_sms_now').on('click', function() {
            $('#user_type').attr('required', 'required');
            $('#spanhide').show();
        });
        $('#save_draft').on('click', function() {
            $('#user_type').removeAttr('required', 'required');
            $('#spanhide').hide();
        });
    </script>
@endpush

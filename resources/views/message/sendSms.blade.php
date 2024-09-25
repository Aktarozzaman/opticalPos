@extends('layouts.app')
@section('title', 'notifications')
@section('content')
    <style>
        textarea {
            resize: none;
        }

        textarea.ta10em {
            height: 10em;
        }

        /* Your CSS file, e.g., styles.css */
        .low-sms-amount {
            color: red;
            font-weight: bold;

        }
    </style>
    <section class="content-header">
        <div style="display: flex; justify-content: space-between;">
            <h3>{{ __('Send SMS') }}</h3>
            <h3 @if ($smsAmount <= 50) class="low-sms-amount" @endif>Available SMS: <b>
                @if ($smsAmount === null )
                {{ 0 }}
                @else
                {{ $smsAmount }}
                @endif
            </b>
            </h3>
        </div>
        @if (session('success'))
            <div id="success-alert" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('fail'))
            <div id="fail-alert" class="alert alert-danger">
                {{ session('fail') }}
            </div>
        @endif


    </section>
    <section class="content">

        @component('components.widget', ['class' => 'box-primary'])

            <div class="row">
                <div class="col-md-6">
                    <h4>Message Send</h4>


                    <form action="{{ route('sms.singleSMSSend') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Mobile</label>
                            <select class="form-control user_type select2" multiple name="mobile_number[]" id="user_type">
                                <option value="">{{ __('Select Number') }}</option>
                                @foreach ($contacts as $contactInfo)
                                    <option value="{{ $contactInfo->mobile }}">
                                        {{ $contactInfo->name }}-{{ $contactInfo->mobile }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select form Template message (optional)</label>
                            <select class="form-control temp_message_id" name="temp_message_id" id="temp_message_id">
                                <option value="">{{ __('Select message') }}</option>
                                @foreach ($template as $templateInfo)
                                    <option value="{{ $templateInfo->id }}">{{ $templateInfo->title_template }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Message <span class="text-danger">*</span></label><br>
                            <textarea rows="5" name="message" id="message" class="form-control templatesms" required
                                placeholder="Write message" autofocus></textarea>
                        </div>
                        <div class="form-group">
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
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h4>Group Message Send</h4>
                    <form action="{{ route('sms.groupSMSSend') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Select User Type<span class="text-danger" id="spanhide"> *</span></label>
                            <select class="form-control user_type" name="group_user_type" id="group_user_type">
                                <option value="">{{ __('Select') }}</option>
                                <option value="all_customer">{{ __('all customer') }}</option>
                                <option value="all_supplier">{{ __('all supplier') }}</option>
                                <option value="due_customer">{{ __('Due customer') }}</option>
                                {{-- <option value="due__supplier">{{ __('Due supplier') }}</option>s --}}
                                @foreach ($groups as $groupsInfo)
                                    <option value="{{ $groupsInfo->id }}">{{ $groupsInfo->group_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select form Template message (optional)</label>
                            <select class="form-control temp_message_id_ggroup" name="temp_message_id_ggroup"
                                id="temp_message_id_ggroup">
                                <option value="">{{ __('Select message') }}</option>
                                @foreach ($template as $templateInfo)
                                    <option value="{{ $templateInfo->id }}">{{ $templateInfo->title_template }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Message <span class="text-danger">* </span><span id="due_customer_tags"></span></label><br>
                            <textarea rows="5" name="message" id="groupmessage" class="form-control templategroupsms" required
                                placeholder="Write message" autofocus></textarea>
                        </div>
                        <div class="form-group">
                            @component('components.widget', ['class' => 'box-primary'])
                                <div class="row">
                                    <div class="col-md-12" style="min-height: 90px;">
                                        <div id="group-the-count" style="margin-top: 15px;">
                                            <span id="groupcurrent" style="color: green;font-weight: bolder;">Character count :
                                                0</span><br>
                                            <span id="groupmessages" style="color: red;font-weight: bolder;">SMS count :
                                                0</span><br>
                                            <span id="groupremaining" style="color: green;font-weight: bolder;">Characters remaining
                                                :
                                                160</span>
                                        </div>
                                    </div>
                                </div>
                            @endcomponent
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        @endcomponent
    </section>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('textarea').on('keyup click', function() {
                var characterCount = $(this).val().length;
                $('#current').text('Character count : ' + characterCount);
            });

            $('.templategroupsms').on('keyup click', function() {
                var groupcharacterCount = $(this).val().length;
                $('#groupcurrent').text('Character count : ' + groupcharacterCount);
            });

            $('#message').on('keyup click', function() {
                var chars = this.value.length;
                var messages = Math.ceil(chars / 160);
                var remaining = messages * 160 - (chars % (messages * 160) || messages * 160);
                $('#remaining').text('Characters remaining : ' + remaining);
                $('#messages').text('SMS Count : ' + messages);
            });

            $('#groupmessage').on('keyup click', function() {
                var chars = this.value.length;
                var groupmessages = Math.ceil(chars / 160);
                var groupremaining = groupmessages * 160 - (chars % (groupmessages * 160) || groupmessages *
                    160);
                $('#groupremaining').text('Characters remaining : ' + groupremaining);
                $('#groupmessages').text('SMS Count : ' + groupmessages);
            });

            $('#temp_message_id').on('change', function() {
                var tid = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ url('message/get-message-details') }}/" + tid,
                    data: {
                        'tid': tid
                    },
                    success: function(data) {
                        $('.templatesms').val(data.template_message);
                    }
                });
            });

            $('#temp_message_id_ggroup').on('change', function() {
                var tid = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ url('message/get-message-details') }}/" + tid,
                    data: {
                        'tid': tid
                    },
                    success: function(data) {
                        $('.templategroupsms').val(data.template_message);
                    }
                });
            });

            $('#send_sms_now').on('click', function() {
                $('#user_type').attr('required', 'required');
                $('#spanhide').show();
            });

            $('#save_draft').on('click', function() {
                $('#user_type').removeAttr('required', 'required');
                $('#spanhide').hide();
            });

            $('#group_user_type').change(function(e) {
                e.preventDefault();
                let groupType = $(this).val();

                if (groupType == 'due_customer') {
                    $('#due_customer_tags').empty();
                    $('#due_customer_tags').append(
                        `usable tags: [name], [due]`
                    );
                } else {
                    $('#due_customer_tags').empty();
                }
            });
        });

        function closeAlerts() {
            // Close success alert after 5 seconds
            setTimeout(function() {
                $('#success-alert').fadeOut('slow', function() {
                    $(this).remove();
                });
            }, 3000);

            // Close error alert after 5 seconds
            setTimeout(function() {
                $('#fail-alert').fadeOut('slow', function() {
                    $(this).remove();
                });
            }, 3000);
        }

        // Call the closeAlerts function when the page loads
        $(document).ready(function() {
            closeAlerts();
        });
    </script>
@endpush

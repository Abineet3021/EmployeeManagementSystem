@extends('admin.humanResource.app')
@section('css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet">
@endsection

@section('content')
<!-- Content area  -->


<div class="content">
    <!-- Page length options  -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <div class="col-sm-6 mb-1" align="left">
                <h6 class="card-title"><b>Add Candidate Details</b></h6>
            </div>
            <div class="col-sm-6 mb-1" align="right">
                <a class="btn btn-success" href="{{ url('admin/humanResource/candidate') }}">Back</a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('candidate.save') }}" method="post" class="canidate" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                    @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                    @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Resume</label>
                                    <input type="file" class="form-control" name="resume">
                                    @if ($errors->has('resume'))
                                    <span class="text-danger">{{ $errors->first('resume') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cover Letter</label>
                                    <input type="file" class="form-control" name="cover_letter">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Job Applied For</label>
                                    <input type="text" class="form-control" name="job_applied_for">

                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select id="job_type" class="form-control" id="status" name="status">
                                        <option value="">Select </option>
                                        <option value="new">New</option>
                                        <option value="interviewed">Interviewed</option>
                                        <option value="hired">Hired</option>
                                        <option value="rejected">Rejected</option>


                                    </select>
                                    @if ($errors->has('job_type'))
                                    <span class="text-danger">{{ $errors->first('job_type') }}</span>
                                    @endif
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Experience</label>
                                    <input type="text" class="form-control" id="experience" name="experience">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Position</label>
                                    <input type="text" class="form-control" name="position">

                                </div>
                            </div>
                            @php

                            $shifts = DB::table('shifts')->select('*')->get();

                            @endphp

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Shift</label>
                                    <select class="form-control" id="shift" name="shift">
                                        <option value="">Select Shift</option>
                                        @foreach($shifts as $shift)
                                        <option value="{{ $shift->id  }}">{{ $shift->type  }} Timing: {{ $shift->timing  }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('shift'))
                                    <span class="text-danger">{{ $errors->first('shift') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Past Salary</label>
                                    <input type="number" class="form-control" name="past_salary">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expected Salary</label>
                                    <input type="number" class="form-control" name="expected_salary">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Offered Salary</label>
                                    <input type="number" class="form-control" name="offered_salary">
                                    @if ($errors->has('offered_salary'))
                                    <span class="text-danger">{{ $errors->first('offered_salary') }}</span>
                                    @endif

                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Reason for Change</label>
                                    <textarea type="text" class="form-control" name="reason_for_change"></textarea>
                                    @if ($errors->has('reason_for_change'))
                                    <span class="text-danger">{{ $errors->first('reason_for_change') }}</span>
                                    @endif
                                </div>
                            </div>



                            <!-- Employee multi-select dropdown -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last working Day/ Notice Period</label>
                                    <input type="text" class="form-control" name="lwd_np">
                                    @if ($errors->has('lwd_np'))
                                    <span class="text-danger">{{ $errors->first('lwd_np') }}</span>
                                    @endif
                                </div>
                            </div>




                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" id="submit_form">Submit form <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
<script src="{{asset('assets/admin/global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        if ($(".canidate").length > 0) {
            $(".canidate").validate({
                rules: {
                    name: 'required',
                    email: 'required',

                    phone: 'required',
                    address: 'required',
                    job_applied_for: 'required',
                    status: 'required',
                    experience: 'required',
                    position: 'required',
                    offered_salary: 'required',
                    reason_for_change: 'required',
                    lwd_np: 'required',
                    interview_mode: 'required',
                    email: 'required',

                    shift: 'required',

                },
                messages: {
                    name: "Name field is required.",
                    email: "email field is required.",

                    phone: "phone field is required.",
                    address: "address field is required.",
                    job_applied_for: "job applied for email field is required.",
                    status: "qualification  field is required.",
                    experience: "experience field is required.",

                    position: "position field is required.",
                    offered_salary: "offered salary field is required.",
                    reason_for_change: "reason for change field is required.",
                    lwd_np: "Last working day field is required.",

                    interview_mode: "intervier mode field is required.",
                    email: "email field is required.",

                    shift: "Shift field is required.",


                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    });
</script>

<script>
    console.clear();

    $(function() {
        $('input').on('change', function(event) {
            var $element = $(event.target);
            var $container = $element.closest('.example');

            if (!$element.data('tagsinput'))
                return;

            var val = $element.val();
            if (val === null)
                val = "null";
            var items = $element.tagsinput('items');
            console.log(items[items.length - 1]);

            $('code', $('pre.val', $container)).html(($.isArray(val) ? JSON.stringify(val) : "\"" + val.replace('"', '\\"') + "\""));
            $('code', $('pre.items', $container)).html(JSON.stringify($element.tagsinput('items')));

            console.log(val);
            console.log(items);
            console.log(JSON.stringify(val));
            console.log(JSON.stringify(items));

            console.log(items[items.length - 1]);

        }).trigger('change');
    });

    $("#button").click(function() {
        var input = $("input[name='tags']").tagsinput('items');
        console.clear();
        console.log(input);
        console.log(JSON.stringify(input));
        console.log(input[input.length - 1]);
    });



    $(document).ready(function() {
        // Listen for changes in the Shift select input
        $('#shift').change(function() {
            // Get the selected value of the Shift input
            var selectedShift = $(this).val();

            // If the selected shift is "Day", hide the option with value "8.00pm to 5.00am"
            if (selectedShift === 'Day') {
                $('#timing option[value="9.30am to 6.30am"]').show();
                $('#timing option[value="8.00pm to 5.00am"]').hide();

            } else {
                // If the selected shift is not "Day", show the option with value "8.00pm to 5.00am"
                $('#timing option[value="8.00pm to 5.00am"]').show();
                $('#timing option[value="9.30am to 6.30am"]').hide();

            }
        });
    });
</script>



@endsection
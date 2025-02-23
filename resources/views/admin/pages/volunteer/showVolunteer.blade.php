@extends('admin.masterTemplate')

@section('menu-name')
ALL USERS
@endsection

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">View Volunteer</h5>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <div class="text-right">
                                <button type="button" class="btn btn-primary" onclick="printDiv()">
                                    <i class="fas fa-print"></i>
                                    <span>{{ __('Print') }}</span>
                                </button>
                                <h3 class="card-title font-weight-bold"> <i class="fa fa-users"></i> View Volunteer</h3>
                            </div>
                        </div>
                        <div class="card-body col-md-12">
                            @php
                                $termCheckLong = App\Models\VolunteerTerm::where('term', 'long')->exists();
                                $termCheckShort = App\Models\VolunteerTerm::where('term', 'short')->exists();
                            @endphp

                            @if($termCheckLong)
                                <h3>Long Term Volunteer</h3>
                                <table class="table" style="width: 100% !important; page-break-after: always;">
                                    <thead>
                                        <tr>
                                            <th>Field</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{ $volunteerTerm->volunteer->name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{ $volunteerTerm->volunteer->phone ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $volunteerTerm->volunteer->email ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>NID Number</td>
                                            <td>{{ $volunteerTerm->volunteer->nid_number ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td>{{ $address->country ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td>{{ $address->city ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Position/Department</td>
                                            <td>{{ $volunteerTerm->position ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Extra Details</td>
                                            <td>{{ $volunteerTerm->extra_details ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Experience Years</td>
                                            <td>{{ $volunteerTerm->experience_year ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Employer Name</td>
                                            <td>{{ $volunteerTerm->employer_name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Employer Address</td>
                                            <td>{{ $volunteerTerm->employer_address ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Job Title and Responsibilities</td>
                                            <td>value</td>
                                        </tr>
                                        <tr>
                                            <td>Reason for Leaving</td>
                                            <td>value</td>
                                        </tr>
                                        <tr>
                                            <td>Professional Experience in Developing Countries</td>
                                            <td>value</td>
                                        </tr>
                                        <tr>
                                            <td>Details of Experience</td>
                                            <td>value</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <h5>Education and Training</h5>
                                <table class="table" style="page-break-after: always;">
                                    <thead>
                                        <tr>
                                            <th>Field</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Institute Name</td>
                                            <td>{{ $volunteerTerm->institute_name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Certificates</td>
                                            <td>
                                                @foreach(explode(',', $volunteerTerm->certificates) as $certificate)
                                                    <img src="{{ asset('_uploads/' . $certificate) }}" alt="Certificate" style="height: 80px; margin-right: 5px;">
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Attended From</td>
                                            <td>{{ $volunteerTerm->attended_from ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Attended To</td>
                                            <td>{{ $volunteerTerm->attended_to ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Registered Country</td>
                                            <td>{{ $volunteerTerm->registered_country ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date of Qualification</td>
                                            <td>{{ $volunteerTerm->qualification ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Professional Body</td>
                                            <td>{{ $volunteerTerm->professional_body ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Registration Details</td>
                                            <td>{{ $volunteerTerm->type_of_registration ?? '' }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <h5>Additional Information</h5>
                                <table class="table" style="page-break-after: always;" >
                                    <tbody>
                                        <tr>
                                            <td>Relevant Information</td>
                                            <td>{{ $volunteerTerm->relevant_training ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Extra Curricular Activities</td>
                                            <td>{{ $volunteerTerm->curriculam_activities ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Interest in Volunteering</td>
                                            <td>{{ $volunteerTerm->volunteering_at_ardrid ?? '' }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <h5>References</h5>
                                <table class="table" >
                                    <thead>
                                        <tr>
                                            <th>Field</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>First Referee Name</td>
                                            <td>{{ $reference->first_ref_name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>First Referee Position</td>
                                            <td>{{ $reference->first_ref_position ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>First Referee Organization</td>
                                            <td>{{ $reference->first_ref_organization ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>First Referee Email</td>
                                            <td>{{ $reference->first_ref_email ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>First Referee Telephone</td>
                                            <td>{{ $reference->first_ref_telephone ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Second Referee Name</td>
                                            <td>{{ $reference->second_ref_name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Second Referee Position</td>
                                            <td>{{ $reference->second_ref_position ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Second Referee Organization</td>
                                            <td>{{ $reference->second_ref_organization ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Second Referee Email</td>
                                            <td>{{ $reference->second_ref_email ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Second Referee Telephone</td>
                                            <td>{{ $reference->second_ref_telephone ?? '' }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <h5>Additional Comments</h5>
                                <table class="table" style="page-break-after: always;">
                                    <tbody>
                                        <tr>
                                            <td>Comments</td>
                                            <td>{{ $volunteerTerm->elaborate ?? '' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif

                            @if($termCheckShort)
                                <h3>Short Term Volunteer</h3>
                                <table class="table" >
                                    <thead>
                                        <tr>
                                            <th>Field</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>value</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>value</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>value</td>
                                        </tr>
                                        <tr>
                                            <td>NID Number</td>
                                            <td>value</td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td>value</td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td>value</td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<script>
    function printDiv() {
        window.print();
    }
</script>
<style>
    @media print {
    html, body {
        width: 100% !important; /* Ensure full width */
        margin: 0;
        padding: 0;
    }

    .content-wrapper {
        width: 100% !important; /* Ensure the wrapper takes the full width */
        padding: 0;
        margin: 0;
        box-shadow: none; /* Remove shadow */
    }

    .container-fluid {
        width: 100% !important;
    }

    .row, .col-12, .col-md-12 {
        width: 100% !important;
        padding: 0;
        margin: 0;
    }

    table {
        width: 100% !important; 
        border-collapse: collapse;
        border: 2px solid #030303;
        margin-top: 20px;
    }

    th, td {
        border: 2px solid #030303; /* Thicker border for cells */
        padding: 8px; /* Adjust padding to fit content */
        text-align: left;
        word-wrap: break-word;
    }

    th {
        background-color: #f2f2f2; /* Light grey background for headers */
        border-top: 3px solid #030303; /* Thicker top border for headers */
        border-bottom: 3px solid #030303; /* Thicker bottom border for headers */
        font-weight: bold; /* Make header text bold */
    }

    tbody tr:last-child td {
        border-bottom: 2px solid #030303; /* Distinct bottom border for the last row */
    }

    .btn {
        display: none !important; /* Hide buttons and titles */
    }
}

</style>



@endsection

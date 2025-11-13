@extends('admin.layouts.master')

@section('title', 'Dashboard | UpSkill HRMS')

@section('content')
    <div class="row fix">
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
            <div class="card">
                <div class="gap-16 card-body mini-card-body d-flex align-center">
                    <div class="avatar avatar-xl bg-primary-transparent text-primary">
                        <i class="ri-user-3-fill fs-42"></i>
                    </div>
                    <div class="card-content">
                        <span class="mb-5 d-block fs-16">Total Employees</span>
                        <h2 class="mb-5">1,250</h2>
                        <span class="text-success">+5%<i class="ml-5 ri-arrow-up-line d-inline-block"></i></span>
                        <span class="ml-5 fs-12 text-muted">vs. last month</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
            <div class="card">
                <div class="gap-16 card-body mini-card-body d-flex align-center">
                    <div class="avatar avatar-xl bg-warning-transparent text-warning">
                        <i class="ri-calendar-event-fill fs-42"></i>
                    </div>
                    <div class="card-content">
                        <span class="mb-5 d-block fs-16">On Leave Today</span>
                        <h2 class="mb-5">42</h2>
                        <span class="fs-12 text-muted">Sick/Annual Leave</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
            <div class="card">
                <div class="gap-16 card-body mini-card-body d-flex align-center">
                    <div class="avatar avatar-xl bg-info-transparent text-info">
                        <i class="ri-folder-open-fill fs-42"></i>
                    </div>
                    <div class="card-content">
                        <span class="mb-5 d-block fs-16">Active Projects</span>
                        <h2 class="mb-5">28</h2>
                        <span class="text-success">+3 New<i class="ml-5 ri-arrow-up-line d-inline-block"></i></span>
                        <span class="ml-5 fs-12 text-muted">this week</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
            <div class="card">
                <div class="gap-16 card-body mini-card-body d-flex align-center">
                    <div class="avatar avatar-xl bg-purple-transparent text-purple">
                        <i class="ri-file-list-fill fs-42"></i>
                    </div>
                    <div class="card-content">
                        <span class="mb-5 d-block fs-16">Job Applicants</span>
                        <h2 class="mb-5">156</h2>
                        <span class="fs-12 text-muted">30-day pipeline</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
            <div class="card">
                <div class="gap-16 card-body mini-card-body d-flex align-center">
                    <div class="avatar avatar-xl bg-success-transparent text-success">
                        <i class="ri-user-add-fill fs-42"></i>
                    </div>
                    <div class="card-content">
                        <span class="mb-5 d-block fs-16">New Hires (MTD)</span>
                        <h2 class="mb-5">15</h2>
                        <span class="text-success">+10%<i class="ml-5 ri-arrow-up-line d-inline-block"></i></span>
                        <span class="ml-5 fs-12 text-muted">YoY</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
            <div class="card">
                <div class="gap-16 card-body mini-card-body d-flex align-center">
                    <div class="avatar avatar-xl bg-slateblue-transparent text-slateblue">
                        <i class="ri-checkbox-circle-fill fs-42"></i>
                    </div>
                    <div class="card-content">
                        <span class="mb-5 d-block fs-16">Attendance Rate</span>
                        <h2 class="mb-5">94%</h2>
                        <span class="fs-12 text-muted">This week</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
            <div class="card">
                <div class="gap-16 card-body mini-card-body d-flex align-center">
                    <div class="avatar avatar-xl bg-teal-transparent text-teal">
                        <i class="ri-graduation-cap-fill fs-42"></i>
                    </div>
                    <div class="card-content">
                        <span class="mb-5 d-block fs-16">Training Completed</span>
                        <h2 class="mb-5">120 hrs</h2>
                        <span class="text-success">+25%<i class="ml-5 ri-arrow-up-line d-inline-block"></i></span>
                        <span class="ml-5 fs-12 text-muted">QoQ</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
            <div class="card">
                <div class="gap-16 card-body mini-card-body d-flex align-center">
                    <div class="avatar avatar-xl bg-pink-transparent text-pink">
                        <i class="ri-star-fill fs-42"></i>
                    </div>
                    <div class="card-content">
                        <span class="mb-5 d-block fs-16">Employee eNPS</span>
                        <h2 class="mb-5">72</h2>
                        <span class="fs-12 text-muted">Engagement Score</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-5 col-xl-12 col-lg-12">

        </div>



        <div class="col-xxl-6 col-xl-12">

        </div>
        <div class="col-xxl-6 col-xl-12">

        </div>

        <div class="col-xxl-4 col-xl-12">

        </div>
        <div class="col-xxl-8 col-xl-12">

        </div>

        <div class="col-xl-12">

        </div>

        <div class="col-xxl-9 col-xl-12">

        </div>
        mi
        <div class="col-xxl-3 col-xl-12">

        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="justify-between card-header">
                    <h4 class="">Employee Activity Log</h4>
                    <div class="card-dropdown">
                        <div class="dropdown">
                            <a class="card-dropdown-icon" href="javascript:void(0);" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-2-fill"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                <a class="dropdown-item" href="javascript:void(0);">This Month</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-15">
                    <div class="table-responsive">
                        <div id="employeeActivityTable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="employeeActivityTable_length"><label>Show <select
                                                name="employeeActivityTable_length" aria-controls="employeeActivityTable"
                                                class="form-select form-select-sm">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="-1">All</option>
                                            </select> entries</label></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="employeeActivityTable_filter" class="dataTables_filter"><label>Search:<input
                                                type="search" class="form-control form-control-sm" placeholder=""
                                                aria-controls="employeeActivityTable"></label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="employeeActivityTable"
                                        class="table table-bordered text-nowrap w-100 dataTable no-footer"
                                        aria-describedby="employeeActivityTable_info">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center sorting_disabled sorting_asc"
                                                    rowspan="1" colspan="1" aria-label="#"
                                                    style="width: 26.2031px;">#</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="employeeActivityTable" rowspan="1" colspan="1"
                                                    aria-label="Employee ID: activate to sort column ascending"
                                                    style="width: 111px;">Employee ID</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="employeeActivityTable" rowspan="1" colspan="1"
                                                    aria-label="Full Name: activate to sort column ascending"
                                                    style="width: 180.703px;">Full Name</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="employeeActivityTable" rowspan="1" colspan="1"
                                                    aria-label="Job Title: activate to sort column ascending"
                                                    style="width: 148.234px;">Job Title</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="employeeActivityTable" rowspan="1" colspan="1"
                                                    aria-label="Department: activate to sort column ascending"
                                                    style="width: 131.5px;">Department</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="employeeActivityTable" rowspan="1" colspan="1"
                                                    aria-label="Email Address: activate to sort column ascending"
                                                    style="width: 125.594px;">Email Address</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="employeeActivityTable" rowspan="1" colspan="1"
                                                    aria-label="Status: activate to sort column ascending"
                                                    style="width: 91.2969px;">Status</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="employeeActivityTable" rowspan="1" colspan="1"
                                                    aria-label="Phone Number: activate to sort column ascending"
                                                    style="width: 129.812px;">Phone Number</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="employeeActivityTable" rowspan="1" colspan="1"
                                                    aria-label="Monthly Salary: activate to sort column ascending"
                                                    style="width: 132.312px;">Monthly Salary</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="employeeActivityTable" rowspan="1" colspan="1"
                                                    aria-label="Actions: activate to sort column ascending"
                                                    style="width: 118.344px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>










                                            <tr class="odd">
                                                <td class="text-center sorting_1">1</td>
                                                <td>EMP-1001</td>
                                                <td class="gap-10 d-flex-items">
                                                    <div class="avatar radius-100">
                                                        <img class="radius-100"
                                                            src="assets/images/avatar/avatar-thumb-001.webp"
                                                            alt="image not found">
                                                    </div>
                                                    <h6>John Smith</h6>
                                                </td>
                                                <td>Software Engineer</td>
                                                <td>IT</td>
                                                <td><a href="https://demo.topylo.com/cdn-cgi/l/email-protection"
                                                        class="__cf_email__"
                                                        data-cfemail="355f5a5d5b1b46585c415d75565a5845545b4c1b565a58">[email&nbsp;protected]</a>
                                                </td>
                                                <td><span class="badge bg-label-success">Active</span></td>
                                                <td>(555) 123-4567</td>
                                                <td>$6,500.00</td>
                                                <td>
                                                    <div class="gap-10 d-flex-items">
                                                        <a class="btn-icon btn-success-light" href="javascript:void(0);"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="View">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a class="btn-icon btn-info-light" href="javascript:void(0);"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Edit">
                                                            <i class="ri-edit-line"></i>
                                                        </a>
                                                        <a class="btn-icon btn-danger-light" href="javascript:void(0);"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Delete">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td class="text-center sorting_1">2</td>
                                                <td>EMP-1002</td>
                                                <td class="gap-10 d-flex-items">
                                                    <div class="avatar radius-100">
                                                        <img class="radius-100"
                                                            src="assets/images/avatar/avatar-thumb-002.webp"
                                                            alt="image not found">
                                                    </div>
                                                    <h6>Sarah Johnson</h6>
                                                </td>
                                                <td>HR Manager</td>
                                                <td>Human Resources</td>
                                                <td><a href="https://demo.topylo.com/cdn-cgi/l/email-protection"
                                                        class="__cf_email__"
                                                        data-cfemail="80f3e1f2e1e8aeeac0e3efedf0e1eef9aee3efed">[email&nbsp;protected]</a>
                                                </td>
                                                <td><span class="badge bg-label-success">Active</span></td>
                                                <td>(555) 234-5678</td>
                                                <td>$7,200.00</td>
                                                <td>
                                                    <div class="gap-10 d-flex-items">
                                                        <a class="btn-icon btn-success-light" href="javascript:void(0);"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="View">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a class="btn-icon btn-info-light" href="javascript:void(0);"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Edit">
                                                            <i class="ri-edit-line"></i>
                                                        </a>
                                                        <a class="btn-icon btn-danger-light" href="javascript:void(0);"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Delete">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="text-center sorting_1">3</td>
                                                <td>EMP-1003</td>
                                                <td class="gap-10 d-flex-items">
                                                    <div class="avatar radius-100">
                                                        <img class="radius-100"
                                                            src="assets/images/avatar/avatar-thumb-003.webp"
                                                            alt="image not found">
                                                    </div>
                                                    <h6>Michael Brown</h6>
                                                </td>
                                                <td>Sales Associate</td>
                                                <td>Sales</td>
                                                <td><a href="https://demo.topylo.com/cdn-cgi/l/email-protection"
                                                        class="__cf_email__"
                                                        data-cfemail="fc91959f949d9990d29ebc9f93918c9d9285d29f9391">[email&nbsp;protected]</a>
                                                </td>
                                                <td><span class="badge bg-label-success">Active</span></td>
                                                <td>(555) 345-6789</td>
                                                <td>$4,800.00</td>
                                                <td>
                                                    <div class="gap-10 d-flex-items">
                                                        <a class="btn-icon btn-success-light" href="javascript:void(0);"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="View">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a class="btn-icon btn-info-light" href="javascript:void(0);"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Edit">
                                                            <i class="ri-edit-line"></i>
                                                        </a>
                                                        <a class="btn-icon btn-danger-light" href="javascript:void(0);"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Delete">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td class="text-center sorting_1">4</td>
                                                <td>EMP-1004</td>
                                                <td class="gap-10 d-flex-items">
                                                    <div class="avatar radius-100">
                                                        <img class="radius-100"
                                                            src="assets/images/avatar/avatar-thumb-004.webp"
                                                            alt="image not found">
                                                    </div>
                                                    <h6>Emily Davis</h6>
                                                </td>
                                                <td>Marketing Specialist</td>
                                                <td>Marketing</td>
                                                <td><a href="https://demo.topylo.com/cdn-cgi/l/email-protection"
                                                        class="__cf_email__"
                                                        data-cfemail="02676f6b6e7b2c6642616d6f72636c7b2c616d6f">[email&nbsp;protected]</a>
                                                </td>
                                                <td><span class="badge bg-label-success">Active</span></td>
                                                <td>(555) 456-7890</td>
                                                <td>$5,600.00</td>
                                                <td>
                                                    <div class="gap-10 d-flex-items">
                                                        <a class="btn-icon btn-success-light" href="javascript:void(0);"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="View">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a class="btn-icon btn-info-light" href="javascript:void(0);"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Edit">
                                                            <i class="ri-edit-line"></i>
                                                        </a>
                                                        <a class="btn-icon btn-danger-light" href="javascript:void(0);"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Delete">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="text-center sorting_1">5</td>
                                                <td>EMP-1005</td>
                                                <td class="gap-10 d-flex-items">
                                                    <div class="avatar radius-100">
                                                        <img class="radius-100"
                                                            src="assets/images/avatar/avatar-thumb-005.webp"
                                                            alt="image not found">
                                                    </div>
                                                    <h6>Robert Wilson</h6>
                                                </td>
                                                <td>Accountant</td>
                                                <td>Finance</td>
                                                <td><a href="https://demo.topylo.com/cdn-cgi/l/email-protection"
                                                        class="__cf_email__"
                                                        data-cfemail="afddc0cdcadddb81d8efccc0c2dfcec1d681ccc0c2">[email&nbsp;protected]</a>
                                                </td>
                                                <td><span class="badge bg-label-warning">On Leave</span>
                                                </td>
                                                <td>(555) 567-8901</td>
                                                <td>$6,000.00</td>
                                                <td>
                                                    <div class="gap-10 d-flex-items">
                                                        <a class="btn-icon btn-success-light" href="javascript:void(0);"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="View">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a class="btn-icon btn-info-light" href="javascript:void(0);"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Edit">
                                                            <i class="ri-edit-line"></i>
                                                        </a>
                                                        <a class="btn-icon btn-danger-light" href="javascript:void(0);"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Delete">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="employeeActivityTable_info" role="status"
                                        aria-live="polite">Showing 1 to 5 of 10 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers"
                                        id="employeeActivityTable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled"
                                                id="employeeActivityTable_previous"><a href="#"
                                                    aria-controls="employeeActivityTable" data-dt-idx="0" tabindex="0"
                                                    class="page-link">Previous</a></li>
                                            <li class="paginate_button page-item active"><a href="#"
                                                    aria-controls="employeeActivityTable" data-dt-idx="1" tabindex="0"
                                                    class="page-link">1</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                    aria-controls="employeeActivityTable" data-dt-idx="2" tabindex="0"
                                                    class="page-link">2</a></li>
                                            <li class="paginate_button page-item next" id="employeeActivityTable_next"><a
                                                    href="#" aria-controls="employeeActivityTable" data-dt-idx="3"
                                                    tabindex="0" class="page-link">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

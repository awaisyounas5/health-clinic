<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li class="nav-item">
                    <a href="{{ route('home') }}"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-01.svg') }}" alt></span>
                        <span> Dashboard </span></a>
                </li>
                @role('super_admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.company') }}"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-02.svg') }}" alt></span>
                            <span> Company </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-02.svg') }}" alt></span>
                            <span> Blogs </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('admin.blog.create') }}">Create Blog</a></li>
                            <li><a href="{{ route('admin.blogs') }}">View Blogs</a></li>

                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-02.svg') }}" alt></span>
                            <span> Blogs Category </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('admin.blog_category.create') }}">Create Category</a></li>
                            <li><a href="{{ route('admin.blogs_category') }}">View Categories</a></li>
                        </ul>
                    </li>
                @endrole
                @role('company')
                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-02.svg') }}" alt></span>
                            <span> Teams </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('company.team.create') }}">Create Team</a></li>
                            <li><a href="{{ route('company.team') }}">View Teams</a></li>
                            <li><a href="{{ route('company.shift_type.create') }}">Add Shift Type</a></li>
                            <li><a href="{{ route('company.shift_type') }}">View Shift Types</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-02.svg') }}" alt></span>
                            <span> Staff </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('company.staff.create') }}">Create Staff Member</a></li>
                            <li><a href="{{ route('company.staff') }}">View All Staff</a></li>
                            <li><a href="{{ route('company.pay_rate.create') }}">Add Payrate</a></li>
                            <li><a href="{{ route('company.pay_rate') }}">View All Payrates</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-02.svg') }}" alt></span>
                            <span> Managers </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('company.manager.create') }}">Create Manager</a></li>
                            <li><a href="{{ route('company.manager') }}">View Managers</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="{{ route('company.roaster') }}"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/calendar.svg') }}" alt></span>
                            <span> Roaster </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('company.roaster') }}">Manage Rota</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-02.svg') }}" alt></span>
                            <span> Patients </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('company.patient.create') }}">Create Patient</a></li>
                            <li><a href="{{ route('company.patient') }}">View All Patients</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-02.svg') }}" alt></span>
                            <span> Care Plans </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('company.routines.create') }}">Create Routine</a></li>
                            <li><a href="{{ route('company.routines') }}">View Routines</a></li>
                            <li><a href="{{ route('company.medications.create') }}">Create Medication</a></li>
                            <li><a href="{{ route('company.medications') }}">View Medications</a></li>
                            <li><a href="{{ route('company.observation.create') }}">Create Observation</a></li>
                            <li><a href="{{ route('company.observation') }}">View Observations</a></li>
                            <li><a href="{{ route('company.careplan') }}">View Care Plan</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-02.svg') }}" alt></span>
                            <span> Shift Note </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            <li><a href="{{ route('company.shift_note') }}">View Shift Notes</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-02.svg') }}" alt></span>
                            <span> Finance </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            <li><a href="{{ route('company.finance') }}">View Finance</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-13.svg') }}" alt></span>
                            <span> Noticeboard </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('company.noticeboard.create') }}">Create Notice</a></li>
                            <li><a href="{{ route('company.noticeboard') }}">View All</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-14.svg') }}" alt></span>
                            <span> Appointments </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('company.appointments.create') }}">Create Appointment</a></li>
                            <li><a href="{{ route('company.appointments') }}">View All</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/note-icon-01.svg') }}" alt></span>
                            <span> Notifications </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('company.notifications.create') }}">Send Notifications</a></li>
                            <li><a href="{{ route('company.notifications.index') }}">View All</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-03.svg') }}" alt></span>
                            <span> Manage Logins </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('company.manage.login-history') }}">View Login History</a></li>
                            <li><a href="{{ route('company.manage.login') }}">View Logged In User</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-14.svg') }}" alt></span>
                            <span> Reviews </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('company.reviews') }}">Review</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-14.svg') }}" alt></span>
                            <span>Risk Assessment</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('company.risk_assessment.create') }}">Create Assessment</a></li>
                            <li><a href="{{ route('company.risk_assessment') }}">View Assessments</a></li>
                            <li><a href="{{ route('company.template') }}">View Templates</a></li>
                            <li><a href="{{ route('company.risk_assessment.template.create') }}">Create Templates</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-14.svg') }}" alt></span>
                            <span>Audits</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('company.audit.create') }}">New Audit</a></li>
                            <li><a href="{{ route('company.audit') }}">View Audits</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-14.svg') }}" alt></span>
                            <span>Competencies</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('company.competency.passed') }}">Passed Audits</a></li>
                            <li><a href="{{ route('company.competency.improvement') }}">Room For Improvement</a></li>
                            <li><a href="{{ route('company.competency.failed') }}">Failed Audits</a></li>
                        </ul>
                    </li>


                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-03.svg') }}" alt></span>
                            <span> Incidents</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('company.incidents.create_report') }}">Add Incident Report</a></li>
                            <li><a href="{{ route('company.incidents.view_reports') }}">Incident Reports</a></li>
                            <li><a href="{{ route('company.incidents.view_investigations') }}">Investigation Reports</a>
                            </li>
                            <li><a href="{{ route('company.incidents.view_actions') }}">Action Reports</a></li>
                        </ul>
                    </li>
                @endrole
                @role('staff_member')
                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-14.svg') }}" alt></span>
                            <span> Appointments </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('staff_member.appointments') }}">View Appointments</a></li>
                        </ul>
                    </li>


                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-13.svg') }}" alt></span>
                            <span> Noticeboard </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('staff_member.noticeboard') }}">View All</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-13.svg') }}" alt></span>
                            <span> Incident Report </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('staff_member.incidents.view_reports') }}">View All</a></li>
                            <li><a href="{{ route('staff_member.incidents.create_report') }}">Add Incident Report</a></li>
                        </ul>
                    </li>
                @endrole
                @role('patient')
                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-14.svg') }}" alt></span>
                            <span> Appointments </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('patient.appointments') }}">View Appointments</a></li>
                        </ul>
                    </li>



                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-14.svg') }}" alt></span>
                            <span> Reviews </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('patient.reviews') }}">Submit Review</a></li>
                        </ul>
                    </li>
                @endrole
                @role('manager')
                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-14.svg') }}" alt></span>
                            <span> Appointments </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('manager.appointments.create') }}">Create Appointment</a></li>
                            <li><a href="{{ route('manager.appointments') }}">View All</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-02.svg') }}" alt></span>
                            <span> Teams </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('manager.team.create') }}">Create Team</a></li>
                            <li><a href="{{ route('manager.team') }}">View Teams</a></li>
                            <li><a href="{{ route('manager.shift_type.create') }}">Add Shift Type</a></li>
                            <li><a href="{{ route('manager.shift_type') }}">View Shift Types</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-13.svg') }}" alt></span>
                            <span> Noticeboard </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('manager.noticeboard.create') }}">Create Notice</a></li>
                            <li><a href="{{ route('manager.noticeboard') }}">View All</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-02.svg') }}" alt></span>
                            <span> Staff </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('manager.staff.create') }}">Create Staff Member</a></li>
                            <li><a href="{{ route('manager.staff') }}">View All Staff</a></li>
                            <li><a href="{{ route('manager.pay_rate.create') }}">Add Payrate</a></li>
                            <li><a href="{{ route('manager.pay_rate') }}">View All Payrates</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-02.svg') }}" alt></span>
                            <span> Patients </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('manager.patient.create') }}">Create Patient</a></li>
                            <li><a href="{{ route('manager.patient') }}">View All Patients</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="{{ route('manager.roaster') }}"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/calendar.svg') }}" alt></span>
                            <span> Roaster </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('manager.roaster') }}">Manage Rota</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-02.svg') }}" alt></span>
                            <span> Care Plans </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('manager.routines.create') }}">Create Routine</a></li>
                            <li><a href="{{ route('manager.routines') }}">View Routines</a></li>
                            <li><a href="{{ route('manager.medications.create') }}">Create Medication</a></li>
                            <li><a href="{{ route('manager.medications') }}">View Medications</a></li>
                            <li><a href="{{ route('manager.observation.create') }}">Create Observation</a></li>
                            <li><a href="{{ route('manager.observation') }}">View Observations</a></li>
                            <li><a href="{{ route('manager.careplan') }}">View Care Plan</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-14.svg') }}" alt></span>
                            <span>Risk Assessment</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('manager.risk_assessment.create') }}">Create Assessment</a></li>
                            <li><a href="{{ route('manager.risk_assessment') }}">View Assessments</a></li>
                            <li><a href="{{ route('manager.template') }}">View Templates</a></li>
                            <li><a href="{{ route('manager.risk_assessment.template.create') }}">Create Templates</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-14.svg') }}" alt></span>
                            <span>Audits</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('manager.audit.create') }}">New Audit</a></li>
                            <li><a href="{{ route('manager.audit') }}">View Audits</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-14.svg') }}" alt></span>
                            <span>Competencies</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('manager.competency.passed') }}">Passed Audits</a></li>
                            <li><a href="{{ route('manager.competency.improvement') }}">Room For Improvement</a></li>
                            <li><a href="{{ route('manager.competency.failed') }}">Failed Audits</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><span class="menu-side"><img
                                    src="{{ asset('assets/img/icons/menu-icon-02.svg') }}" alt></span>
                            <span> Shift Note </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            <li><a href="{{ route('manager.shift_note') }}">View Shift Notes</a></li>
                        </ul>
                    </li>
                @endrole

            </ul>
            <div class="logout-btn">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    <span class="menu-side"><img src="{{ asset('assets/img/icons/logout.svg') }}" alt></span>
                    <span>Logout</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

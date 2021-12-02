<aside class="app-navbar">
    <!-- begin sidebar-nav -->
    <div class="sidebar-nav scrollbar scroll_light">
        <ul class="metismenu " id="sidebarNav">
            <li class="nav-static-title">Personal</li>

            @permission(['All', 'user_permission'])
            <li class="active">
                <a class="" href="/home" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Home</span>
                </a>  
            </li>
            @endpermission

            @permission(['All', 'user_permission'])
            <li>
                <a class="" href="/profile" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Profile</span>
                </a>  
            </li>
            @endpermission

             @permission(['All', 'user_permission'])
            <li>
                <a class="" href="/result" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">View Results</span>
                </a>  
            </li>
            @endpermission

            @permission(['All'])
            <li>
                <a class="" href="/users" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Users</span>
                </a>  
            </li>
            @endpermission
            
            @permission(['All'])
            <li>
                <a class="" href="/permission/list" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Permissions</span>
                </a>  
            </li>
            @endpermission

            @permission(['All'])
            <li>
                <a class="" href="/roles/list" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Roles</span>
                </a>  
            </li>
            @endpermission

             @permission(['All', 'user_permission'])
             <li>
                <a class="" href="/users/register" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Register</span>
                </a>  
            </li>
            @endpermission

            @permission(['All'])
            <li>
                <a class="" href="/party/list" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Party</span>
                </a>  
            </li>
            @endpermission

            @permission(['All', 'user_permission'])
            <li>
                <a class="" href="/users/vote" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Vote</span>
                </a>  
            </li>
            @endpermission

            @permission(['All'])
            <li>
                <a class="" href="/candidate/list" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Candidates</span>
                </a>  
            </li>
            @endpermission

            <li>
                <a class="" href="/logout" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Logout</span>
                </a>  
            </li>
            
            
            <!-- <li>
                <a class="" href="/back/permission/list" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Permissions</span>
                </a>  
            </li>
            
            

            
            <li>
                <a class="" href="/back/roles/list" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Roles</span>
                </a>  
            </li>
            
           
            <li>
                <a class="" href="/back/project/create" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Create Project</span>
                </a>  
            </li>
            -->

            

            <!-- @if(Auth::user()->approval_status === 1 )
            @permission(['All'])
            <li>
                <a class="" href="/back/generate_otp" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Generate otp</span>
                </a>  
            </li>
            @endpermission
            @endif -->
            


            <!-- <li>
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-bag"></i>
                    <span class="nav-title">Jobs</span>
                </a>
                <ul aria-expanded="false">    
                    <li> <a href="posted_jobs.html">Posted Jobs</a> </li>
                </ul>
                <ul>
                    <li> <a href="approved_jobs.html">Approved Jobs</a> </li>
                </ul>
                
                <ul aria-expanded="false">
                    <li><a href="rejected_jobs.html">Rejected Jobs</a></li>
                </ul>
            </li> -->
        </ul>
    </div>
    <!-- end sidebar-nav -->
</aside>
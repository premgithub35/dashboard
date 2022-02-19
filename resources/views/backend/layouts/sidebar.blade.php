<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="/backend/img/logo.png" alt="Laravel Starter" class="brand-image img-circle elevation-3"
   style="opacity: .8">
<span class="brand-text font-weight-light">Dashboard</span>
</a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/backend/img/profile.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> {{auth()->user()->name}}</a>

            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             {{-- dashboard section --}}   
              <li class="nav-item has-treeview ">
                <a href="{{route('dashboard')}}" class="nav-link">
                  <i class="nav-icon fa fa-tachometer"></i>
                  <p>
                  Dashboard
                  <i class="right fa fa-angle-left"></i>
                </p>
                </a>
              </li>

          
        
{{-- stores section
<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fa fa-slideshare"></i>
<p>
Stores
<i class="right fa fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{route('add-store')}}" class="nav-link">
    <i class="fa fa-circle-o nav-icon"></i>
    <p>Add Stores</p>
</a>
</li>
  <li class="nav-item">
      <a href="{{route('stores')}}" class="nav-link">
        <i class="fa fa-circle-o nav-icon"></i>
          <p>View/Edit Stores</p>
      </a>
  </li>
</ul>
</li> --}}

{{-- menu section --}}
<li class="nav-item has-treeview">
  <a href="{{('imenu')}}" class="nav-link">
    <i class="nav-icon fa fa-bars"></i>
<p>
Imenu
<i class="right fa fa-angle-left"></i>
</p>
</a>

</li>
{{-- Reviews section --}}
<li class="nav-item has-treeview ">
  <a href="{{('reviews')}}" class="nav-link">
   <i class="nav-icon fa fa-star"></i>
   <p>
    Reviews
   <i class="right fa fa-angle-left"></i>
 </p>
 </a>
</li>
{{-- station section --}}
<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fa fa-slideshare"></i>
<p>
Station
<i class="right fa fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{route('add-station')}}" class="nav-link">
    <i class="fa fa-circle-o nav-icon"></i>
    <p>Add Station</p>
</a>
</li>
  <li class="nav-item">
      <a href="{{route('stations')}}" class="nav-link">
        <i class="fa fa-circle-o nav-icon"></i>
          <p>View/Edit Station</p>
      </a>
  </li>
</ul>
</li>

 {{-- message section --}}
 <li class="nav-item has-treeview ">
  <a href="{{route('messages')}}" class="nav-link">
   <i class="nav-icon fa fa-envelope"></i>
   <p>
   Messages
   <i class="right fa fa-angle-left"></i>
 </p>
 </a>
</li>

 {{-- Employee section --}}
<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
   <i class="nav-icon fa fa-user"></i>
   <p>
    Employee
   <i class="right fa fa-angle-left"></i>
  </p>
</a>
<ul class="nav nav-treeview">
  <li class="nav-item">
    <a href="{{route('users')}}" class="nav-link">
      <i class="fa fa-circle-o nav-icon"></i>
        <p>View/Edit Employee</p>
    </a>
  </li>
    <li class="nav-item">
      <a href="{{route('addUser')}}" class="nav-link">
    <i class="fa fa-circle-o nav-icon"></i>
    <p>Add Employee</p>
  </a>
  </li>            
  </ul>
</li>


{{-- blog section --}}
<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fa fa-newspaper-o"></i>
<p>
Blogs
<i class="right fa fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="#" class="nav-link">
    <i class="fa fa-circle-o nav-icon"></i>
    <p>Add Blog</p>
</a>
</li>
  <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="fa fa-circle-o nav-icon"></i>
          <p>View/Edit Blog</p>
      </a>
  </li>
</ul>
</li>

 
  {{-- testimonial section --}}
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-quote-left"></i>
            <p>
              Testimonial
              <i class="right fa fa-angle-left"></i>
            </p>
            </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add testimonial</p>
            </a>
            </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                        <p>View/Edit testimonial</p>
                    </a>
                </li>
              </ul>
            </li>

                {{-- career section --}}
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-graduation-cap"></i>
            <p>
              Careers
              <i class="right fa fa-angle-left"></i>
            </p>
            </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('add-career')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Career</p>
            </a>
            </li>
                <li class="nav-item">
                    <a href="{{route('careers')}}" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                        <p>View/Edit Career</p>
                    </a>
                </li>
              </ul>
            </li>

            {{-- faq section --}}
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-question"></i>
          <p>
           FAQ's
            <i class="right fa fa-angle-left"></i>
          </p>
          </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('add-faq')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add FAq's</p>
          </a>
          </li>
              <li class="nav-item">
                  <a href="{{route('faq')}}" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                      <p>View/Edit FAq's</p>
                  </a>
              </li>
            </ul>
          </li>
          
            </ul> 
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

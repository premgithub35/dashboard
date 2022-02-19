<div class="box box-info box_info">
    <div class="panel-body">
    <h4 class="all_settings">Manage Settings</h4>
        <ul class="nav navbar-pills nav-tabs nav-stacked no-margin" role="tablist">
         
           
     

          @if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'Pages'))
              <li class="{{ (Request::is('admin/settings/pages*') ? 'active' : '')  }}">
                  <a href="{{ url('admin/settings/pages') }}" data-group="metas"><i class="fa fa-file-powerpoint-o text-orange"></i> Pages</a>
              </li>
          @endif


          @if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'testimonials'))
          <li class="{{ (Request::is('admin/settings/testimonials*') ? 'active' : '')  }}">
              <a href="{{ url('admin/settings/testimonials') }}" data-group="metas"><i class=" fa fa-heart text-orange"></i> Testimonials</a>
          </li>
      @endif
          @if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'faqs'))
              <li class="{{ (Request::is('admin/settings/faqs*') ? 'active' : '')  }}">
                  <a href="{{ url('admin/settings/faqs') }}" data-group="metas"><i class=" fa fa-question-circle text-orange"></i> Faqs</a>
              </li>
          @endif
   <!-- prem -->
         
           @if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'careers'))
              <li class="{{ (Request::is('admin/settings/careers*') ? 'active' : '')  }}">
                  <a href="{{ url('admin/settings/careers') }}" data-group="metas"><i class=" fa fa-graduation-cap text-orange"></i> Careers</a>
              </li>
             @endif
        
           @if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'users'))
              <li class="{{ (Request::is('admin/users*') ? 'active' : '')  }}">
                  <a href="{{ url('admin/users') }}" data-group="metas"><i class=" fa fa-user text-orange"></i> Users</a>
              </li>
             @endif
         <!-- // -->
        </ul>
    </div>
</div>

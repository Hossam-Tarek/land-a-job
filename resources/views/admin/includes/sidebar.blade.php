  <!--sidebar start-->
  <div class="sidebar-container">
    <h1 class="text-muted text-center">Land A Job</h1>
    <div class="sidebar">
      <a href="{{route('admin.index')}}"><i c class="fas fa-home"></i><span>Home</span></a>
      <a href="{{route('all-users.index')}}"><i class="fas fa-user"></i><span>Users</span></a>
      <a href="{{route('all-companies.index')}}"><i class="far fa-building"></i><span>Companies</span></a>

      <a href="javascript:" id="category-list-container" class="dropDownList"><i class="far fa-flag"></i><span>Countries<i class="fas fa-angle-right"></i></span>
      </a>
      <ul id="category-list" class="hide m-0">
        <li><a href="{{route('countries.index')}}"><i class="fas fa-list"></i>Show All</a></li>
        <li><a href="{{route('countries.create')}}"><i class="fas fa-plus-square"></i>Add</a></li>
      </ul>

      <a href="javascript:" id="category-list-container" class="dropDownList"><i class="fas fa-city"></i><span>Cities<i class="fas fa-angle-right"></i></span>
      </a>
      <ul id="category-list" class="hide m-0">
        <li><a href="{{route('cities.index')}}"><i class="fas fa-list"></i>Show All</a></li>
        <li><a href="{{route('cities.create')}}"><i class="fas fa-plus-square"></i>Add</a></li>
      </ul>
      <a href="javascript:" id="category-list-container" class="dropDownList"><i class="fas fa-briefcase"></i><span>Job Types<i class="fas fa-angle-right"></i></span>
      </a>
      <ul id="category-list" class="hide m-0">
        <li><a href="{{route('jobTypes.index')}}"><i class="fas fa-list"></i>Show All</a></li>
        <li><a href="{{route('jobTypes.create')}}"><i class="fas fa-plus-square"></i>Add</a></li>
      </ul>

      <a href="javascript:" id="category-list-container" class="dropDownList"><i class="fas fa-briefcase"></i><span>Job Titles<i class="fas fa-angle-right"></i></span>
      </a>
      <ul id="category-list" class="hide m-0">
        <li><a href="{{route('job-titles.index')}}"><i class="fas fa-list"></i>Show All</a></li>
        <li><a href="{{route('job-titles.create')}}"><i class="fas fa-plus-square"></i>Add</a></li>
      </ul>

      <a href="javascript:" id="category-list-container" class="dropDownList"><i class="fas fa-list-alt"></i><span>Industry Categories<i class="fas fa-angle-right"></i></span>
      </a>
      <ul id="category-list" class="hide m-0">
        <li><a href="{{route('industry-categories.index')}}"><i class="fas fa-list"></i>Show All</a></li>
        <li><a href="{{route('industry-categories.create')}}"><i class="fas fa-plus-square"></i>Add</a></li>
      </ul>

      <a href="{{route('careerLevels.index')}}" id="category-list-container"><i class="fas fa-level-up-alt"></i><span>Career Levels</span></a>

      <a href="javascript:" id="category-list-container" class="dropDownList"><i class="fas fa-language"></i><span>Languages<i class="fas fa-angle-right"></i></span>
      </a>
      <ul id="category-list" class="hide m-0">
        <li><a href="{{route('languages.index')}}"><i class="fas fa-list"></i>Show All</a></li>
        <li><a href="{{route('languages.create')}}"><i class="fas fa-plus-square"></i>Add</a></li>
      </ul>

      <a href="javascript:" id="category-list-container" class="dropDownList"><i class="fas fa-award"></i><span>Skills<i class="fas fa-angle-right"></i></span>
      </a>
      <ul id="category-list" class="hide m-0">
        <li><a href="{{route('skills.index')}}"><i class="fas fa-list"></i>Show All</a></li>
        <li><a href="{{route('skills.create')}}"><i class="fas fa-plus-square"></i>Add</a></li>
      </ul>

      <a href="{{route('admin.password.reset')}}"><i class="fas fa-lock"></i><span>Password</span></a>
    </div>
  </div>

  <!--sidebar end-->
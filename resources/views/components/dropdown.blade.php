<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Dropdown
    </a>
    <ul class="dropdown-menu">
        @foreach($courses as $course)
            <li><a class="dropdown-item" href="#">{{$course->dep_name}}</a></li>
        @endforeach

    </ul>
</li>

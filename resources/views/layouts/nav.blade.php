<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('mainhome') }}">Laravel CRUD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item active">
            <a class="nav-link" href="{{ route('mainhome') }}">Home</a>
        </li>
        @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('persons.create') }}">Add New</a>
        </li>
       @endauth


      </ul>

    </div>
  </nav>

@extends ('partials.master')

{{-- use the index file here to specify all the hard-coded content in a 'section' variable --}}
@section ('content')

  <div class="col-sm-8 blog-main">
    @foreach ($posts as $post)
      @include ('posts.post')
    @endforeach

    <nav class="blog-pagination">
      <a class="btn btn-outline-primary" href="#">Older</a>
      <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>

  </div><!-- /.blog-main -->

       
@endsection

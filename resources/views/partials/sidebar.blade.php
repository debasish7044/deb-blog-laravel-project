 {{-- sidebar --}}
            <div class="col-md-4 col-xl-3">
              <div class="sidebar px-4 py-md-0">

                <h6 class="sidebar-title">Search</h6>
                <form class="input-group" action="{{ route('welcome.home') }}" method="get">
                  <input type="text" class="form-control" name="term" placeholder="Search">
                  <div class="input-group-addon">
                    <span class="input-group-text"><i class="ti-search"></i></span>
                  </div>
                  
                </form>

                <hr>

                <h6 class="sidebar-title">Categories</h6>
                <div class="row link-color-default fs-14 lh-24">
                  @foreach ($categories as $category)
                      <div class="col-6"><a href="{{ route('blog.category',$category->id) }}">{{ $category->name }}</a></div>
                  @endforeach
                </div>
                <hr>
                <hr>
                <h6 class="sidebar-title">Tags</h6>
                <div class="gap-multiline-items-1">
                 @foreach ($tags as $tag)
                      <a class="badge badge-secondary" href="{{ route('blog.tag',[$tag]) }}">{{ $tag->name }}</a>
                 @endforeach           
              </div>
                <hr>
                <h6 class="sidebar-title">About</h6>
                <p class="small-3">This is a blog website,created by debasish for his own project. he has used laravel to build this website</p>

              </div>
            </div>
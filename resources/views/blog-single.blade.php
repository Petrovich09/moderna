@extends('layouts.layout')
@section('content')

<!-- ======= Blog Section ======= -->
  <section class="blog mt-5"  data-aos-easing="ease-in-out" data-aos-duration="500">
    <div class="container">

      <div class="row">

        <div class="col-lg-8 entries">

          <article class="entry entry-single">
            <div class="entry-img">
              <img src="{{ asset('storage'.DIRECTORY_SEPARATOR.$post->image) }}" alt="" class="img-fluid">
            </div>

            <h2 class="entry-title">
              <a href="blog-single/{{$post->id}}">{{ $post->title }}</a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="#">{{ $post->user->name }}</a></li>
                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="#"><time datetime="2020-01-01">{{ date("d.m.Y", strtotime($post->created_at)) }}</time></a></li>
                <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="#">12 Comments</a></li>
              </ul>
            </div>

            <div class="entry-content">

                  <? echo "{$post->body}"; ?>

            </div>

            <div class="entry-footer clearfix">
              <div class="float-left">
                <i class="icofont-folder"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul>

                <i class="icofont-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div>

              <div class="float-right share">
                <a href="" title="Share on Twitter"><i class="icofont-twitter"></i></a>
                <a href="" title="Share on Facebook"><i class="icofont-facebook"></i></a>
                <a href="" title="Share on Instagram"><i class="icofont-instagram"></i></a>
              </div>

            </div>

          </article><!-- End blog entry -->

          <div class="blog-author clearfix">
            <img src="" class="rounded-circle float-left" alt="">
            <h4>Jane Smith</h4>
            <div class="social-links">
              <a href="https://twitters.com/#"><i class="icofont-twitter"></i></a>
              <a href="https://facebook.com/#"><i class="icofont-facebook"></i></a>
              <a href="https://instagram.com/#"><i class="icofont-instagram"></i></a>
            </div>
            <p>
              Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat
              voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
            </p>
          </div><!-- End blog author bio -->

          <div class="blog-comments">

              <h4 class="comments-count">8 Comments</h4>

  @foreach($comments as $comment)
            <div id="comment-1" class="comment clearfix">
              <img src="assets/img/comments-1.jpg" class="comment-img  float-left" alt="">
              <h5><a href="">{{ $comment->name }}</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
              <time datetime="2020-01-01">{{ date("d M, Y", strtotime($comment->created_at)) }}</time>
              <p>
                {{ $comment->comment }}
              </p>
            </div><!-- End comment #1 -->
  @endforeach

            <div class="reply-form">
              <h4>Leave a Reply</h4>
              <p>Your email address will not be published. Required fields are marked * </p>
              @if($errors->any())
              <div class="alert alert-danger">
                  <ul class="mb-0">
                      @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
              @if(\Session::has('success'))
              <div class="alert alert-success">
                  <p class="mb-0">{{\Session::get('success')}}<p>
              </div>
              @endif
              <form action="{{ route('addComment') }}" method="post">
                  @csrf
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input name="post_id" type="hidden" value="{{$post->id}}">
                    <input name="name" type="text" class="form-control" placeholder="Your Name*">
                  </div>
                  <div class="col-md-6 form-group">
                    <input name="email" type="text" class="form-control" placeholder="Your Email*">
                  </div>
                </div>
                <div class="row">
                  <div class="col form-group">
                    <input name="website" type="text" class="form-control" placeholder="Your Website">
                  </div>
                </div>
                <div class="row">
                  <div class="col form-group">
                    <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Post Comment</button>
              </form>
            </div>

          </div><!-- End blog comments -->

        </div><!-- End blog entries list -->

        <div class="col-lg-4">

          <div class="sidebar">

            <h3 class="sidebar-title">Search</h3>
            <div class="sidebar-item search-form">
              <form action="">
                <input type="text">
                <button type="submit"><i class="icofont-search"></i></button>
              </form>
            </div><!-- End sidebar search formn-->

            <h3 class="sidebar-title">Categories</h3>
            <div class="sidebar-item categories">
              <ul>
                <li><a href="#">General <span>(25)</span></a></li>
                <li><a href="#">Lifestyle <span>(12)</span></a></li>
                <li><a href="#">Travel <span>(5)</span></a></li>
                <li><a href="#">Design <span>(22)</span></a></li>
                <li><a href="#">Creative <span>(8)</span></a></li>
                <li><a href="#">Educaion <span>(14)</span></a></li>
              </ul>

            </div><!-- End sidebar categories-->

            <h3 class="sidebar-title">Recent Posts</h3>
            <div class="sidebar-item recent-posts">
              <div class="post-item clearfix">
                <img src="assets/img/recent-posts-1.jpg" alt="">
                <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/recent-posts-2.jpg" alt="">
                <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/recent-posts-3.jpg" alt="">
                <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/recent-posts-4.jpg" alt="">
                <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/recent-posts-5.jpg" alt="">
                <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div>
            </div><!-- End sidebar recent posts-->

            <h3 class="sidebar-title">Tags</h3>
            <div class="sidebar-item tags">
              <ul>
                <li><a href="#">App</a></li>
                <li><a href="#">IT</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Mac</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Office</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">Smart</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
              </ul>

            </div><!-- End sidebar tags-->

          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div><!-- End row -->

    </div><!-- End container -->

  </section><!-- End Blog Section -->

</main><!-- End #main -->

@endsection()

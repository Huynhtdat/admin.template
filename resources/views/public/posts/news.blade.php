@extends('public.layouts.master')

@section('content')
<div class="container-fluid py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-lg-7 col-xl-8 mt-0">
                        <div class="position-relative overflow-hidden rounded">
                            @if ($posts->isNotEmpty())
                                <?php $latestPost = $posts->first(); ?>
                            <img src="{{ asset($latestPost->feature_image) }}" class="img-fluid rounded img-zoomin w-100" alt="">

                            <div class="d-flex justify-content-center px-4 position-absolute flex-wrap" style="bottom: 10px; left: 0;">
                                <a href="#" class="text-white me-3 link-hover"><i class="fa fa-clock"></i> 06 minute read</a>
                                <a href="#" class="text-white me-3 link-hover"><i class="fa fa-eye"></i> 3.5k Views</a>
                                <a href="#" class="text-white me-3 link-hover"><i class="fa fa-comment-dots"></i> 05 Comment</a>
                                <a href="#" class="text-white link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a>
                            </div>

                        </div>
                        <div class="border-bottom py-3">
                            <a href="{{ route('post.show', $latestPost->slug)}}" class="display-4 text-dark mb-0 link-hover">{{ $latestPost->title }}</a>
                        </div>
                        <p class="mt-3 mb-4">{!! $latestPost->content !!}</p>
                        <div class="bg-light p-4 rounded">
                            <div class="news-2">
                                <h3 class="mb-4">Bài HOT</h3>
                            </div>
                            <div class="row g-4 align-items-center">
                                <div class="col-md-6">
                                    <div class="rounded overflow-hidden">
                                        <img src="{{ asset($latestPost->feature_image) }}" class="img-fluid rounded img-zoomin w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex flex-column">
                                        <a href="{{ route('post.show', $latestPost->slug)}}">{{ $latestPost->title }}</a>
                                        <p class="mb-0 fs-5">{{ $latestPost->excerpt }} </p>
                                        <p class="mb-0 fs-5"><i class="fas fa-calendar-alt me-1"></i> {{ $latestPost->created_at->format('d/m/Y') }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-5 col-xl-4">
                       <div class="bg-light rounded p-4 pt-0">
                        <?php $latestPost = $posts->first(); ?>
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="rounded overflow-hidden">
                                        <img src="{{ asset($latestPost->feature_image) }}" class="img-fluid rounded img-zoomin w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex flex-column">
                                        <a href="{{ route('post.show', $latestPost->slug)}}" class="h4 mb-2">{{ $latestPost->title }}</a>
                                        <p class="fs-5 mb-0">{{ $latestPost->excerpt }}</p>
                                        <p class="fs-5 mb-0"><i class="fas fa-calendar-alt me-1"></i> {{ $latestPost->created_at->format('d/m/Y') }} </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row g-4 align-items-center">
                                    @foreach ($posts as $post)
                                        <div class="col-5">
                                            <div class="overflow-hidden rounded">
                                                <img src="{{ asset($post->feature_image) }}" class="img-zoomin img-fluid rounded w-100" alt="">
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="features-content d-flex flex-column">
                                                <a href="{{ route('post.show', $post->slug)}}" class="h6">{{ $post->title }}</a>
                                                <small>{{ $post->excerpt }} </small>
                                                <small>{{ $post->posted_at }}</small>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

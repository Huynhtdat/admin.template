@extends('public.layouts.master')

@section('content')
<div class="container-fluid py-5">
            <div class="container py-5">
                <ol class="breadcrumb justify-content-start mb-4">
                    <li class="breadcrumb-item"><a href="/admintemp/">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="/admintemp/">Bài Viết</a></li>
                    <li class="breadcrumb-item active text-dark">{{ $posts['title'] }}</li>
                </ol>
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="mb-4">
                            <a href="#" class="h1 display-5">{{ $posts['title'] }}</a>
                        </div>
                        <div class="position-relative rounded overflow-hidden mb-3">
                            <img src="{{ asset($posts['feature_image']) }}" class="img-zoomin img-fluid rounded w-100" alt="">
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="text-dark link-hover me-3"><i class="fa fa-clock"></i> 06 minute read</a>
                            <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> 3.5k Views</a>
                            <a href="#" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i> 05 Comment</a>
                            <a href="#" class="text-dark link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a>
                        </div>
                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> {{ $posts->created_at->format('d/m/Y') }}</small>
                        <p>{!! $posts['content'] !!}</p>
                        <div class="tab-class">
                            <div class="d-flex justify-content-between border-bottom mb-4">
                                <ul class="nav nav-pills d-inline-flex text-center">
                                    <li class="nav-item mb-3">
                                        <h5 class="mt-2 me-3 mb-0">Tags:</h5>
                                    </li>
                                    @php
                                        $uniqueTags = [];
                                    @endphp

                                    @foreach ($related as $post)
                                        @foreach ($post->tags as $tag)
                                            @if (!in_array($tag->name, $uniqueTags))
                                                <li class="nav-item mb-3">
                                                    <a class="d-flex py-2 bg-light rounded-pill me-2" href="#">
                                                        <span class="text-dark link-hover" style="width: 90px;">{{$tag->name}}</span>
                                                    </a>
                                                </li>
                                                @php
                                                    $uniqueTags[] = $tag->name;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endforeach
                                </ul>
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0 me-3">Share:</h5>
                                    <i class="fab fa-facebook-f link-hover btn btn-square rounded-circle border-primary text-dark me-2"></i>
                                    <i class="btn fab bi-twitter link-hover btn btn-square rounded-circle border-primary text-dark me-2"></i>
                                    <i class="btn fab fa-instagram link-hover btn btn-square rounded-circle border-primary text-dark me-2"></i>
                                    <i class="btn fab fa-linkedin-in link-hover btn btn-square rounded-circle border-primary text-dark"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light rounded my-4 p-4">
                            <h4 class="mb-4">Bài Viết Liên Quan</h4>
                            <div class="row g-4">
                                @foreach ($related as $relatedPost)
                                        @foreach ($relatedPost->categories as $category)
                                            @if ($post->categories->contains('id', $category->id))
                                                <div class="col-lg-6">

                                                            <div class="d-flex align-items-center p-3 bg-white rounded">
                                                                <img src="{{ asset($relatedPost['feature_image']) }}" class="img-fluid rounded" alt="" style="height: 112px; width: 50%">
                                                                <div class="ms-3">
                                                                    <a href="{{ route('post.show', $relatedPost->slug) }}" class="h5 mb-2">{{ $relatedPost->title }}</a>
                                                                    <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> {{ $posts->created_at->format('d/m/Y') }}</small>
                                                                </div>
                                                            </div>

                                                </div>
                                                @break
                                            @endif
                                        @endforeach
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="p-3 rounded border">
                                    <h4 class="mb-4">Danh mục bài viết</h4>

                                    <div class="row g-2">
                                    @php
                                        $uniqueCategories = [];
                                    @endphp

                                    @foreach ($related as $post)
                                        @foreach ($post->categories as $category)
                                            @if (!in_array($category->name, $uniqueCategories))
                                                <div class="col-12">
                                                    <a href="{{ asset($category->slug) }}" class="link-hover btn btn-light w-100 rounded text-uppercase text-dark py-3">
                                                        {{ $category->name }}
                                                    </a>
                                                </div>
                                                @php
                                                    $uniqueCategories[] = $category->name;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endforeach

                                    </div>
                                    <h4 class="my-4">Bài Viết Mới</h4>
                                    <div class="row g-4">
                                        <div class="col-12">
                                        @foreach ($related as $post)
                                            <div class="row g-4 align-items-center features-item">
                                                <div class="col-4">
                                                    <div class="rounded-circle position-relative">
                                                        <div class="overflow-hidden rounded-circle">
                                                            <img src="{{ asset($post->feature_image) }}" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="features-content d-flex flex-column">
                                                        @foreach ($post->categories as $category)
                                                            {{ $category->name }}
                                                        @endforeach
                                                        <a href="{{ asset($post->slug) }}" class="h6">
                                                            {{ $post->title }}
                                                        </a>
                                                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> {{ $posts->created_at->format('d/m/Y') }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="border-bottom my-3 pb-3">
                                                <h4 class="mb-0">Tags</h4>
                                            </div>
                                            <ul class="nav nav-pills d-inline-flex text-center mb-4">
                                            @php
                                                $uniqueTags = [];
                                            @endphp

                                            @foreach ($related as $post)
                                                @foreach ($post->tags as $tag)
                                                    @if (!in_array($tag->name, $uniqueTags))
                                                        <li class="nav-item mb-3">
                                                            <a class="d-flex py-2 bg-light rounded-pill me-2" href="#">
                                                                <span class="text-dark link-hover" style="width: 90px;">{{$tag->name}}</span>
                                                            </a>
                                                        </li>
                                                        @php
                                                            $uniqueTags[] = $tag->name;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

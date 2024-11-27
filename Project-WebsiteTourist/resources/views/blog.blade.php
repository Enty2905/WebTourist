@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">
@endpush
@section('content')
    <!-- Main -->
    <main class="main">
        <section class="banner">
            <div class="container">
                <div class="banner__inner">
                    <p class="section-desc-heading banner__desc">
                        We'd love to hear from you!
                    </p>
                    <h1 class="section-title banner__title">
                        Destinations Banner
                    </h1>
                </div>
            </div>
        </section>

        <section class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <!-- Form thêm bài viết mới -->
                        <div class="mb-4 text-end">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
                                Thêm Bài Viết
                            </button>
                        </div>

                        <!-- Cửa sổ Thêm Bài Viết (Modal) -->
                        <div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addPostModalLabel">Thêm Bài Viết Mới</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('posts.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <!-- Nội dung -->
                                            <div class="form-group mb-3">
                                                <label for="content">Nội dung:</label>
                                                <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                                            </div>

                                            <!-- Input file cho nhiều hình ảnh -->
                                            <div class="form-group mb-3">
                                                <label for="images form-lable">Chọn hình ảnh:</label>
                                                <input type="file" class="" id="images" name="images[]"
                                                    accept="image/*" multiple onchange="previewImages(event)">
                                            </div>

                                            <!-- Hiển thị các hình ảnh đã chọn -->
                                            <div class="form-group mb-3">
                                                <div id="previews" class="d-flex flex-wrap"></div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Thêm bài viết</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Danh sách các bài viết -->
                        <div class="mt-4">

                            <!-- Danh sách bài viết -->
                            <h2 class="section-title">Danh sách bài viết</h2>
                            @foreach ($posts as $post)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <!-- Nội dung -->
                                        <p class="card-text">{{ $post->content }}</p>

                                        <!-- Hình ảnh -->
                                        @if ($post->images)
                                            <div class="post-images">
                                                @foreach ($post->images as $image)
                                                    <img src="{{ asset('assets/img/' . $image->image_url) }}"
                                                        alt="Post Image" style="width:150px; height:150px; margin:5px;">
                                                @endforeach

                                            </div>
                                        @endif
                                        <!-- Danh sách bình luận -->
                                        <h6 class="mt-3">Bình luận:</h6>
                                        @foreach ($post->comments as $comment)
                                            <div class="comment">
                                                <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}
                                                </p>
                                            </div>
                                        @endforeach
                                        <!-- Nút Like và số lượt like (Cùng hàng với form bình luận) -->
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="likes">
                                                <!-- Hiển thị số lượng like -->
                                                <span class="like-count"
                                                    id="like-count-{{ $post->id }}">{{ $post->likes_count }} lượt
                                                    like</span>

                                                <!-- Nút like hoặc hủy like -->
                                                <button class="btn btn-like" id="like-btn-{{ $post->id }}"
                                                    data-post-id="{{ $post->id }}"
                                                    data-liked="{{ $post->likes()->where('user_id', Auth::id())->exists() }}">
                                                    @if ($post->likes()->where('user_id', Auth::id())->exists())
                                                        Hủy Like
                                                    @else
                                                        Like
                                                    @endif
                                                </button>
                                            </div>

                                            <!-- Bình luận -->
                                            <form action="{{ route('comments.store', $post->id) }}" method="POST"
                                                class="w-100 d-flex">
                                                @csrf
                                                <textarea name="content" class="form-control me-2" placeholder="Viết bình luận..." rows="2" style="resize: none;"></textarea>
                                                <button type="submit" class="btn btn-success">Gửi bình luận</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h3 class="blog__title section-title">Theo dõi chúng tôi</h3>
                        <ul class="social">
                            <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://www.tiktok.com/@ndt02092005?lang=vi-VN"><i
                                    class="fa-brands fa-tiktok"></i></a>
                            <a href="https://www.instagram.com/entyyy_29/"><i class="fa-brands fa-instagram"></i></a>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/blog.js') }}"></script>
@endpush

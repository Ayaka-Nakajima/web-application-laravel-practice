@extends('layout.app')

@section('content')
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <!--$postはcontrollerから渡された単一の投稿オブジェクト-->
                <h1 class="fw-bolder">{{ $post->title }}</h1>
                
            </div>
        </div>
    </header>
    {{-- div.container>div.row>div.col-lg-12 --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="https://dummyimage.com/900x400/dee2e6/6c757d.jpg" alt="..." /></a>
                    <div class="card-body">
                        <p class="card-text">
                            category_id: {{ $post->category_id }}<br>
                            category_name: {{ $post->category->name ?? '未分類' }}<br>
                            {{ $post->text }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
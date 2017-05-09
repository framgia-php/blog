@extends('sites.master')

@php
    $comments = App\Models\Comment::limit(3)->get();
@endphp

@section('content')
    <div id="main">
        <div class="container">
            <div class="page-heading">
                <h1 class="page-header">Latest posts</h1>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="posts-list">
                        @foreach(range(1, 10) as $i)
                        <div class="post">
                            <div class="image">
                                <a href="javascript:void(0)">
                                    <img src="/img/avatar.png" alt="">
                                </a>
                            </div>
                            <div class="info">
                                <h3 class="title">
                                    <a href="#">
                                        [Become a SuperUser - Part 0] Unix vs Linux. Nguồn gốc và sự khác biệt
                                    </a>
                                </h3>
                                <div class="desc">
                                    <span class="fa fa-pencil"></span> <a href="#">Nguyen Xuan Quynh</a>
                                    <span> - </span>
                                    <span class="fa fa-calendar"></span> Jan 23 2017
                                    <span> - </span>
                                    <span class="fa fa-comment"></span> 17
                                </div>
                                <ul class="list-inline tags">
                                    <li>
                                        <a href="javascript:void(0)" class="label label-info">
                                            Editor's choice
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="label label-info">
                                            PHP
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="label label-info">
                                            Javascript
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                        <div class="text-center">
                            <ul class="pagination">
                                <li>
                                    <a href="#">1</a>
                                </li>
                                <li class="active">
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div id="sidebar">
                        <div class="section">
                            <h3 class="section-title">
                                Search
                            </h3>
                            <div class="section-content">
                                <div class="search">
                                    <form class="" action="index.html" method="post">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Recipient's username" aria-describedby="basic-addon2">
                                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="section">
                            <h3 class="section-title">
                                Trending Posts
                            </h3>
                            <div class="section-content">
                                <div class="trending-posts">
                                    @foreach(range(1, 5) as $i)
                                    <div class="post">
                                        <div class="title">
                                            <a href="#">
                                                <h4>[Become a SuperUser - Part 0] Unix vs Linux. Nguồn gốc và sự khác biệt</h4>
                                            </a>
                                        </div>
                                        <div class="desc">
                                            <span class="fa fa-pencil"></span> Nguyen Xuan Quynh
                                            <br/>
                                            <span class="fa fa-calendar"></span> Jan 12 2017
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="section">
                            <h3 class="section-title">
                                Popular tags
                            </h3>
                            <div class="section-content">
                                <ul class="list-inline tags">
                                    @foreach(range(1, 10) as $i)
                                    <li class="tag">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">Apple</button>
                                            <button type="button" class="btn btn-primary">100</button>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

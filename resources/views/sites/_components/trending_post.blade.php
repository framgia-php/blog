<div class="post">
    <div class="title">
        <a href="{{ route('sites.posts.show', [
                'username' => $post->creator->username,
                'post_slug' => $post->slug,
            ]) }}"
            title="{{ $post->title }}">
            <h4>{{ $post->title }}</h4>
        </a>
    </div>
    <div class="desc">
        <span class="fa fa-pencil"></span>
        {{ $post->creator->fullname }}
        <br/>
        <span class="fa fa-calendar"></span>
        {{ $post->sites_published_at }}
        <br/>
        <span class="fa fa-comment"></span>
        {{ $post->comments_count }}
        <br/>
    </div>
</div>

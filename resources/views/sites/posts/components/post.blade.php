<div class="post">
    <div class="image">
        <a href="javascript:void(0)">
            {{ Html::image($post->creator->avatar_path, $post->title) }}
        </a>
    </div>
    <div class="info">
        <h3 class="title">
            <a href="{{ route('sites.posts.show', [
                'username' => $post->creator->username,
                'post_slug' => $post->slug,
            ]) }}">
                {{ $post->title }}
            </a>
        </h3>
        <div class="desc">
            <span class="fa fa-pencil"></span>
            <a href="{{ route('sites.users.show', ['username' => $post->creator->username]) }}">
                {{ $post->creator->fullname }}
            </a>
            <span> - </span>
            <span class="fa fa-calendar"></span>
            {{ $post->publish_at }}
            <span> - </span>
            <span class="fa fa-comment"></span>
            {{ $post->comments_count }}
        </div>
        <ul class="list-inline tags">
            @foreach ($post->tags as $tag)
                <li>
                    <a href="{{ route('sites.tags.show', $tag) }}" class="label label-info">
                        {{ $tag->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

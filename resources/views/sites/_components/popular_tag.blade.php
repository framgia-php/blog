<li class="tag">
    <div class="btn-group">
        <a href="{{ route('sites.tags.show', ['tag_slug' => $tag->slug]) }}" class="btn btn-default">
            {{ $tag->title }}
        </a>
        <button type="button" class="btn btn-primary">
            {{ $tag->posts_count }}
        </button>
    </div>
</li>

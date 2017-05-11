@push('styles')
{{ Html::style('plugins/editors/summernote/summernote.css') }}
@endpush

@push('scripts')
{{ Html::script('plugins/editors/summernote/summernote.min.js') }}
<script type="text/javascript">
    $('.select2').css({ width: '100%' });
    $('.select2').select2();
    $('#js-post-summary').summernote({ height: '200px' });
    $('#js-post-content').summernote({ height: '500px' });
</script>
@endpush

{{ trans_choice('{0} no like|{1} :count like|[2,*] :count likes', count($model->likes), ['count' => count($model->likes)]) }}

@can('like', $model)
    <form action="{{ route('like') }}" method="POST">
        @csrf
        <input type="hidden" name="likeable_type" value="{{ get_class($model) }}"/>
        <input type="hidden" name="id" value="{{ $model->id }}"/>
        <button>@lang('Like')</button>
    </form>
@endcan

@can('unlike', $model)
    <form action="{{ route('unlike') }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="likeable_type" value="{{ get_class($model) }}"/>
        <input type="hidden" name="id" value="{{ $model->id }}"/>
        <button>@lang('Unlike')</button>
    </form>
@endcan

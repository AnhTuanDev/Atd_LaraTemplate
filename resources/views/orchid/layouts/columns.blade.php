<div class="row">
    @foreach($manyForms as $key => $column)
        <div class="{{ $key }}">
            @foreach($column as $item)
                {!! $item ?? '' !!}
            @endforeach
        </div>
    @endforeach
</div>

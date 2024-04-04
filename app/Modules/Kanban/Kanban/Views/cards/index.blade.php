@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'cards')
@section('main')
<h2>cards</h2>
<hr>
<div class="row">
    <div class="col">
        @foreach($cards as $card)
        <div style="background-color:{{$card->column->color}}; padding:8px;margin:4px;">
            <h4>
                <a href="{{ route('kanban.kanban.cards.show', compact('card')) }}">{{$card->title}}</a>
                <hr>
            </h4>
            <pre>{{$card->task}}</pre>
        </div>

        <br><br>
        @endforeach
    </div>
</div>
@endsection
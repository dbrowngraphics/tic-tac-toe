<div id="app">
    <div>
        <button style="margin-bottom: 0.5em" wire:click.prevent="resetBoard">Reset</button>
    </div>

    @for ($x = 0; $x < 3; $x++)
        <div class="row" style="display: block">
            @for ($y = 0; $y < 3; $y++)
                @php
                    $index = 3 * $x + $y;
                @endphp
                <div class="cell" wire:click="clickedCell({{ $index }})">{{ $board[$index] }}</div>
            @endfor
        </div>
    @endfor

    @isset($winner)
        <div>The winner is: {{ $winner }}</div>
    @endisset

    @if(!$winner && $isGameOver)
    <div>The game ended in a TIE!!!</div>
    @endif

    <div>Play count: {{ $playCount }}</div>
    
    @if($isGameOver )
        <div>The game is over!</div>
    @endif

    @isset($history)
        @foreach($history as $key => $gamePlay)
            <div wire:click="clickedHistory({{ $key }})">{{ $gamePlay['play'] }}</div>
        @endforeach
    @endisset

</div>

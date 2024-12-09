<?php

namespace App\Livewire;

use Livewire\Component;

class Tictactoe extends Component
{
    const WINNING_CELLS = [
        [0, 1, 2],
        [3, 4, 5],
        [6, 7, 8],
        [0, 3, 6],
        [1, 4, 7],
        [2, 5, 8],
        [0, 4, 8],
        [2, 4, 6]
    ];

    public array $board = [];
    public $marker = 'X';
    public $winner;
    public $playCount = 0;
    public bool $isGameOver = false;
    public array $history = [];

    public function mount()
    {
        $this->initBoard();
    }

    public function render()
    {
        return view('livewire.tictactoe');
    }

    public function clickedCell($index) : void
    {
        if (!$this->isGameOver) {

            if (empty($this->board[$index])) {
                $this->board[$index] = $this->marker;

                $x = floor($index / 3);
                $y = $index % 3;

                $playNumber = $this->playCount + 1;

                $this->history[$this->playCount]['play'] = "Play #$playNumber: $this->marker @ [$x, $y]";
                $this->history[$this->playCount]['board'] = $this->board;

                $this->marker = $this->marker === 'X' ? 'O' : 'X';
                $this->playCount++;

                $this->history = array_splice($this->history, 0, $this->playCount);
    
                $this->isGameOver = $this->isWinner() || (9 == $this->playCount);
            }
        }
        
    }

    public function isWinner()
    {
        foreach(self::WINNING_CELLS as $winner) {
            list($a, $b, $c) = $winner;
            if (isset($this->board[$a]) && $this->board[$a] == $this->board[$b] && $this->board[$a] == $this->board[$c]) {
                $this->winner = $this->board[$a];
                return true;
            }
        }

        return false;
    }

    public function resetBoard()
    {
        $this->reset();
        $this->initBoard();
    }

    public function clickedHistory($key)
    {
        $this->board = $this->history[$key]['board'];
        $this->playCount = $key + 1;
        
        $this->marker = (($this->playCount % 2) == 0) ? 'X' : 'O';

        $this->isGameOver = $this->isWinner() || (9 == $this->playCount);
    }

    private function initBoard()
    {
        $this->board = array_fill(0, 9, null);
    }
}

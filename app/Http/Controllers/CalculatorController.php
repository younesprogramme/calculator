<?php

// app/Http/Controllers/CalculatorController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Services\Calculator\CalculatorService;
use App\Services\Calculator\Addition;
use App\Services\Calculator\Subtraction;
use App\Services\Calculator\Multiplication;
use App\Services\Calculator\Division;

class CalculatorController extends Controller
{
    protected $calculator;

    public function __construct(CalculatorService $calculator)
    {
        $this->calculator = $calculator;
        
        // Enregistrement des opérations supportées
        $this->calculator->registerOperation('add', new Addition());
        $this->calculator->registerOperation('subtract', new Subtraction());
        $this->calculator->registerOperation('multiply', new Multiplication());
        $this->calculator->registerOperation('divide', new Division());
    }

    public function index()
    {
        return view('calculator.index');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'number1' => 'required|numeric',
            'number2' => 'required|numeric',
            'operation' => [
                'required',
                Rule::in(['add', 'subtract', 'multiply', 'divide'])
            ],
        ]);

        try {
            $result = $this->calculator->calculate(
                (float)$validated['number1'],
                (float)$validated['number2'],
                $validated['operation']
            );
            
            return back()
                ->withInput()
                ->with('result', $result);
                
        } catch (\InvalidArgumentException $e) {
            return back()
                ->withInput()
                ->withErrors([$e->getMessage()]);
        }
    }
}
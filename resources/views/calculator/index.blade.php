<!DOCTYPE html>
<html>

<head>
    <title>Calculatrice Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h1>Calculatrice Simple</h1>



    <form method="POST" action="{{ route('calculate') }}">
        @csrf
        <div class="row">
            <div class="col-md-5">
                <input type="number" name="number1" class="form-control" value="{{ old('number1') }}" step="any"
                    required>
            </div>

            <div class="col-md-2">
                <select name="operation" class="form-select" required>
                    <option value="add" {{ old('operation') == 'add' ? 'selected' : '' }}>+</option>
                    <option value="subtract" {{ old('operation') == 'subtract' ? 'selected' : '' }}>-</option>
                    <option value="multiply" {{ old('operation') == 'multiply' ? 'selected' : '' }}>×</option>
                    <option value="divide" {{ old('operation') == 'divide' ? 'selected' : '' }}>÷</option>
                </select>
            </div>

            <div class="col-md-5">
                <input type="number" name="number2" class="form-control" value="{{ old('number2') }}" step="any"
                    required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3" style="margin-bottom:10px;">Calculer</button>
    </form>
    @if(session('result'))
        <div class="alert alert-success">
            Résultat : {{ session('result') }}
        </div>
    @endif
</body>

</html>
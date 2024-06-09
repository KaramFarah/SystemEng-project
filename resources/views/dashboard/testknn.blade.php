@extends('dashboard.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KNN Data Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Test Case For The Cancer</h2>
            <form action="{{ route('dashboard.knn.post.test') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Gender:</label>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" name="gender" value="0" class="form-radio text-blue-600" required>
                            <span class="ml-2">Male</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" name="gender" value="1" class="form-radio text-blue-600" required>
                            <span class="ml-2">Female</span>
                        </label>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="age" class="block text-gray-700 font-bold mb-2">Age:</label>
                    <input type="number" name="age" id="age"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>

                <div class="mb-4">
                    <label for="mutations" class="block text-gray-700 font-bold mb-2">Mutations:</label>
                    <input type="number" name="mutations" id="mutations"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="mb-4">
                    <label for="mutated_genes" class="block text-gray-700 font-bold mb-2">Mutated Genes:</label>
                    <input type="number" name="mutated_genes" id="mutated_genes"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="mb-4">
                    <label for="tumor_stage" class="block text-gray-700 font-bold mb-2">Tumor Stage:</label>
                    <input type="number" name="tumor_stage" id="tumor_stage"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="mb-4">
                    <label for="k" class="block text-gray-700 font-bold mb-2">K</label>
                    <input type="number" name="k" id="k"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="mb-4">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Submit
                    </button>
                </div>
            </form>
            @session('success')
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    The Survival Time Expected Is: {{ $value }} Days
                </div>
            @endsession
        </div>
    </div>
</body>

</html>
@endsection
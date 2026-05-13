<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Student Details Form</h2>

    

    <form action="{{ route('students.store') }}" method="POST" class="space-y-6">
        <!-- to protect your application against Cross-Site Request Forgery (CSRF) attacks   -->
        @csrf

        <div>
            <label class="block font-medium mb-1">Name</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Age</label>
            <input type="number" id="age_input" name="age" value="{{ old('age') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
            @error('age') <p class="text-red-500 text-sm mt-1" id="age-error">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium mb-2">Gender</label>
            <div class="flex gap-6">
                <label> <input type="radio" name="gender" value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }}> Male </label>
                <label> <input type="radio" name="gender" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }}> Female </label>
                <label> <input type="radio" name="gender" value="Other" {{ old('gender') == 'Other' ? 'checked' : '' }}> Other </label>
            </div>
            @error('gender') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="course" class="block font-medium mb-2">Course</label>
                <select name="course" id="course" class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                    <option value="select" {{ old('course') == 'select' ? 'selected' : '' }}>- Select -</option>
                    <option value="Other" {{ old('course') == 'Other' ? 'selected' : '' }}>- Other -</option>
                    <option value="BCA" {{ old('course') == 'BCA' ? 'selected' : '' }}>- BCA -</option>
                    <option value="MCA" {{ old('course') == 'MCA' ? 'selected' : '' }}>- MCA -</option>
                    <option value="Diploma" {{ old('course') == 'Diploma' ? 'selected' : '' }}>- Diploma -</option>
                    <option value="B.com" {{ old('course') == 'B.com' ? 'selected' : '' }}>- B.com -</option>
                    <option value="M.com" {{ old('course') == 'M.com' ? 'selected' : '' }}>- M.com -</option>
                </select>
                @error('course')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
        </div>

        <div>
            <label class="block font-medium mb-2">skills</label>
            <div class="flex gap-6">
                <label> <input type="radio" name="skills" value="Beginner" {{ old('skills') == 'Beginner' ? 'checked' : '' }}> Beginner </label>
                <label> <input type="radio" name="skills" value="Intermediate" {{ old('skills') == 'Intermediate' ? 'checked' : '' }}> Intermediate </label>
                <label> <input type="radio" name="skills" value="Advanced" {{ old('skills') == 'Advanced' ? 'checked' : '' }}> Advanced </label>
            </div>
            @error('skills') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium mb-2">Hobbies</label>
            @php
                $allHobbies = ['Reading', 'Travelling', 'Singing', 'Dancing', 'Other'];
                $oldHobbies = old('hobbies', []);
            @endphp
            <div class="flex flex-wrap gap-4">
                @foreach($allHobbies as $hobby)
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="hobbies[]" value="{{ $hobby }}"
                               {{ in_array($hobby, $oldHobbies) ? 'checked' : '' }}
                               class="form-checkbox text-blue-500">
                        <span>{{ $hobby }}</span>
                    </label>
                @endforeach
            </div>
            @error('hobbies') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="terms" id="terms" value="1" {{ old('terms') ? 'checked' : '' }}
                   class="form-checkbox text-blue-500">
            <label for="terms" class="font-medium">Accept Terms & Conditions</label>
        </div>
        @error('terms') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror

        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded font-semibold">
            Submit
        </button>
    </form>
    @if(session('success'))
        <div class="mb-4 p-4  text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif
</div>

@if(isset($students) && $students->count() > 0)
    <div class="mt-8 overflow-x-auto pb-10">
        <table class="min-w-auto table-auto border border-gray-300 m-[auto] ">
            <thead>
                <tr class="bg-blue-600 text-white-700">
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Age</th>
                    <th class="px-4 py-2 border">Gender</th>
                    <th class="px-4 py-2 border">Course</th>
                    <th class="px-4 py-2 border">Skills</th>
                    <th class="px-4 py-2 border">Hobbies</th>
                    <th class="px-4 py-2 border">Edit</th>
                    <th class="px-4 py-2 border">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr class="text-center">
                        <td class="px-4 py-2 border">{{ $student->id }}</td>
                        <td class="px-4 py-2 border">{{ $student->name }}</td>
                        <td class="px-4 py-2 border">{{ $student->email }}</td>
                        <td class="px-4 py-2 border">{{ $student->age }}</td>
                        <td class="px-4 py-2 border">{{ $student->gender }}</td>
                        <td class="px-4 py-2 border">{{ $student->course }}</td>
                        <td class="px-4 py-2 border">{{ $student->skills }}</td>
                        <td class="px-4 py-2 border">{{ implode(', ', $student->hobbies) }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('students.edit', $student->id) }}" class="bg-yellow-500  text-white font-bold py-1 px-3 rounded text-sm transition duration-150 inline-block">
                                Edit</a>
                        </td>
                        <td class="px-4 py-2 border">
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500  text-white font-bold py-1 px-3 rounded text-sm transition duration-150">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
</body>
</html>
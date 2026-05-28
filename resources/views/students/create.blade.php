<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Management</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body{
            background: linear-gradient(to right, #eef2ff, #f8fafc);
        }
    </style>
</head>

<body class="min-h-screen py-10 px-4">

    <!-- Main Container -->
    <div class="max-w-7xl mx-auto">

        <!-- Heading -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-gray-800">
                Student Management System
            </h1>

            <p class="text-gray-500 mt-2">
                Add, Edit & Manage Student Records Easily
            </p>
        </div>

        <!-- Form Card -->
        <div class="bg-white shadow-2xl rounded-3xl overflow-hidden">

            <!-- Top Gradient -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-8 py-6">
                <h2 class="text-2xl font-bold text-white">
                    Student Details Form
                </h2>
            </div>

            <div class="p-8">

                <!-- Success Message -->
                @if(session('success'))
                    <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('students.store') }}" method="POST" class="space-y-8">

                    @csrf

                    <!-- Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Full Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Enter full name"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-4 focus:ring-blue-200 focus:border-blue-500 outline-none transition"
                            >

                            @error('name')
                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Enter email"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-4 focus:ring-blue-200 focus:border-blue-500 outline-none transition"
                            >

                            @error('email')
                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Age -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Age
                            </label>

                            <input
                                type="number"
                                name="age"
                                value="{{ old('age') }}"
                                placeholder="Enter age"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-4 focus:ring-blue-200 focus:border-blue-500 outline-none transition"
                            >

                            @error('age')
                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Course -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Course
                            </label>

                            <select
                                name="course"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-4 focus:ring-blue-200 focus:border-blue-500 outline-none transition"
                            >
                                <option value="">Select Course</option>

                                <option value="BCA" {{ old('course') == 'BCA' ? 'selected' : '' }}>
                                    BCA
                                </option>

                                <option value="MCA" {{ old('course') == 'MCA' ? 'selected' : '' }}>
                                    MCA
                                </option>

                                <option value="Diploma" {{ old('course') == 'Diploma' ? 'selected' : '' }}>
                                    Diploma
                                </option>

                                <option value="B.com" {{ old('course') == 'B.com' ? 'selected' : '' }}>
                                    B.Com
                                </option>

                                <option value="M.com" {{ old('course') == 'M.com' ? 'selected' : '' }}>
                                    M.Com
                                </option>

                                <option value="Other" {{ old('course') == 'Other' ? 'selected' : '' }}>
                                    Other
                                </option>
                            </select>

                            @error('course')
                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>

                    <!-- Gender -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Gender
                        </label>

                        <div class="flex flex-wrap gap-5">

                            <label class="flex items-center gap-2 bg-gray-100 px-4 py-2 rounded-xl cursor-pointer hover:bg-blue-100 transition">
                                <input type="radio" name="gender" value="Male"
                                    {{ old('gender') == 'Male' ? 'checked' : '' }}>
                                <span>Male</span>
                            </label>

                            <label class="flex items-center gap-2 bg-gray-100 px-4 py-2 rounded-xl cursor-pointer hover:bg-pink-100 transition">
                                <input type="radio" name="gender" value="Female"
                                    {{ old('gender') == 'Female' ? 'checked' : '' }}>
                                <span>Female</span>
                            </label>

                            <label class="flex items-center gap-2 bg-gray-100 px-4 py-2 rounded-xl cursor-pointer hover:bg-purple-100 transition">
                                <input type="radio" name="gender" value="Other"
                                    {{ old('gender') == 'Other' ? 'checked' : '' }}>
                                <span>Other</span>
                            </label>

                        </div>

                        @error('gender')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Skills -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Skills Level
                        </label>

                        <div class="flex flex-wrap gap-5">

                            <label class="flex items-center gap-2 bg-blue-50 px-4 py-2 rounded-xl cursor-pointer">
                                <input type="radio" name="skills" value="Beginner"
                                    {{ old('skills') == 'Beginner' ? 'checked' : '' }}>
                                Beginner
                            </label>

                            <label class="flex items-center gap-2 bg-yellow-50 px-4 py-2 rounded-xl cursor-pointer">
                                <input type="radio" name="skills" value="Intermediate"
                                    {{ old('skills') == 'Intermediate' ? 'checked' : '' }}>
                                Intermediate
                            </label>

                            <label class="flex items-center gap-2 bg-green-50 px-4 py-2 rounded-xl cursor-pointer">
                                <input type="radio" name="skills" value="Advanced"
                                    {{ old('skills') == 'Advanced' ? 'checked' : '' }}>
                                Advanced
                            </label>

                        </div>

                        @error('skills')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Hobbies -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Hobbies
                        </label>

                        @php
                            $allHobbies = ['Reading', 'Travelling', 'Singing', 'Dancing', 'Gaming'];
                            $oldHobbies = old('hobbies', []);
                        @endphp

                        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">

                            @foreach($allHobbies as $hobby)

                                <label class="flex items-center gap-2 bg-gray-100 rounded-xl px-4 py-3 hover:bg-indigo-100 transition cursor-pointer">

                                    <input
                                        type="checkbox"
                                        name="hobbies[]"
                                        value="{{ $hobby }}"
                                        {{ in_array($hobby, $oldHobbies) ? 'checked' : '' }}
                                    >

                                    <span>{{ $hobby }}</span>

                                </label>

                            @endforeach

                        </div>

                        @error('hobbies')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Terms -->
                    <div class="flex items-center gap-3">
                        <input
                            type="checkbox"
                            name="terms"
                            value="1"
                            {{ old('terms') ? 'checked' : '' }}
                            class="w-5 h-5 text-blue-600"
                        >

                        <label class="text-gray-700 font-medium">
                            Accept Terms & Conditions
                        </label>
                    </div>

                    @error('terms')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror

                    <!-- Button -->
                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-indigo-700 hover:to-blue-700 text-white font-bold py-4 rounded-xl shadow-lg transition duration-300"
                    >
                        Submit Student Details
                    </button>

                </form>

            </div>
        </div>

        <!-- Table -->
        @if(isset($students) && $students->count() > 0)

            <div class="mt-12 bg-white shadow-2xl rounded-3xl overflow-hidden">

                <!-- Table Header -->
                <div class="bg-gradient-to-r from-indigo-700 to-blue-600 px-8 py-5">
                    <h2 class="text-2xl font-bold text-white">
                        Student Records
                    </h2>
                </div>

                <div class="overflow-x-auto">

                    <table class="w-full text-sm text-left">

                        <thead class="bg-gray-100 text-gray-700 uppercase text-xs">

                            <tr>
                                <th class="px-6 py-4">ID</th>
                                <th class="px-6 py-4">Name</th>
                                <th class="px-6 py-4">Email</th>
                                <th class="px-6 py-4">Age</th>
                                <th class="px-6 py-4">Gender</th>
                                <th class="px-6 py-4">Course</th>
                                <th class="px-6 py-4">Skills</th>
                                <th class="px-6 py-4">Hobbies</th>
                                <th class="px-6 py-4">Actions</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach($students as $student)

                                <tr class="border-b hover:bg-blue-50 transition">

                                    <td class="px-6 py-4 font-semibold">
                                        {{ $student->id }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $student->name }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $student->email }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $student->age }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $student->gender }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $student->course }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $student->skills }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ implode(', ', $student->hobbies) }}
                                    </td>

                                    <td class="px-6 py-4 flex gap-2">

                                        <!-- Edit -->
                                        <a
                                            href="{{ route('students.edit', $student->id) }}"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow"
                                        >
                                            Edit
                                        </a>

                                        <!-- Delete -->
                                        <form
                                            action="{{ route('students.destroy', $student->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow"
                                            >
                                                Delete
                                            </button>
                                        </form>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        @endif

    </div>

</body>
</html>
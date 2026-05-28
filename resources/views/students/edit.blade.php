<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Student</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body{
            background: linear-gradient(to right, #eef2ff, #f8fafc);
        }
    </style>
</head>

<body class="min-h-screen py-10 px-4">

    <!-- Main Container -->
    <div class="max-w-4xl mx-auto">

        <!-- Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-8 py-6">
                <h2 class="text-3xl font-bold text-white">
                    Edit Student Details
                </h2>

                <p class="text-blue-100 mt-1">
                    Update student information easily
                </p>
            </div>

            <!-- Form Section -->
            <div class="p-8">

                <!-- Error Message -->
                @if ($errors->any())
                    <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-2xl">
                        <ul class="list-disc pl-5 space-y-1 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('students.update', $student->id) }}" method="POST" class="space-y-8">

                    @csrf
                    @method('PUT')

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
                                value="{{ old('name', $student->name) }}"
                                placeholder="Enter full name"
                                required
                                class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:ring-4 focus:ring-blue-200 focus:border-blue-500 outline-none transition"
                            >
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email', $student->email) }}"
                                placeholder="Enter email address"
                                required
                                class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:ring-4 focus:ring-blue-200 focus:border-blue-500 outline-none transition"
                            >
                        </div>

                        <!-- Age -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Age
                            </label>

                            <input
                                type="number"
                                name="age"
                                value="{{ old('age', $student->age) }}"
                                placeholder="Enter age"
                                required
                                class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:ring-4 focus:ring-blue-200 focus:border-blue-500 outline-none transition"
                            >
                        </div>

                        <!-- Course -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Course
                            </label>

                            <select
                                name="course"
                                class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:ring-4 focus:ring-blue-200 focus:border-blue-500 outline-none transition"
                            >

                                <option value="">Select Course</option>

                                <option value="BCA" {{ old('course', $student->course) == 'BCA' ? 'selected' : '' }}>
                                    BCA
                                </option>

                                <option value="MCA" {{ old('course', $student->course) == 'MCA' ? 'selected' : '' }}>
                                    MCA
                                </option>

                                <option value="Diploma" {{ old('course', $student->course) == 'Diploma' ? 'selected' : '' }}>
                                    Diploma
                                </option>

                                <option value="B.com" {{ old('course', $student->course) == 'B.com' ? 'selected' : '' }}>
                                    B.Com
                                </option>

                                <option value="M.com" {{ old('course', $student->course) == 'M.com' ? 'selected' : '' }}>
                                    M.Com
                                </option>

                                <option value="Other" {{ old('course', $student->course) == 'Other' ? 'selected' : '' }}>
                                    Other
                                </option>

                            </select>
                        </div>

                    </div>

                    <!-- Gender -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Gender
                        </label>

                        <div class="flex flex-wrap gap-5">

                            <label class="flex items-center gap-2 bg-blue-50 hover:bg-blue-100 px-5 py-3 rounded-2xl cursor-pointer transition">
                                <input
                                    type="radio"
                                    name="gender"
                                    value="Male"
                                    {{ old('gender', $student->gender) == 'Male' ? 'checked' : '' }}
                                >

                                <span class="font-medium text-gray-700">
                                    Male
                                </span>
                            </label>

                            <label class="flex items-center gap-2 bg-pink-50 hover:bg-pink-100 px-5 py-3 rounded-2xl cursor-pointer transition">
                                <input
                                    type="radio"
                                    name="gender"
                                    value="Female"
                                    {{ old('gender', $student->gender) == 'Female' ? 'checked' : '' }}
                                >

                                <span class="font-medium text-gray-700">
                                    Female
                                </span>
                            </label>

                            <label class="flex items-center gap-2 bg-purple-50 hover:bg-purple-100 px-5 py-3 rounded-2xl cursor-pointer transition">
                                <input
                                    type="radio"
                                    name="gender"
                                    value="Other"
                                    {{ old('gender', $student->gender) == 'Other' ? 'checked' : '' }}
                                >

                                <span class="font-medium text-gray-700">
                                    Other
                                </span>
                            </label>

                        </div>

                    </div>

                    <!-- Skills -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Skills Level
                        </label>

                        <div class="flex flex-wrap gap-5">

                            <label class="flex items-center gap-2 bg-green-50 hover:bg-green-100 px-5 py-3 rounded-2xl cursor-pointer transition">
                                <input
                                    type="radio"
                                    name="skills"
                                    value="Beginner"
                                    {{ old('skills', $student->skills) == 'Beginner' ? 'checked' : '' }}
                                >

                                <span class="font-medium text-gray-700">
                                    Beginner
                                </span>
                            </label>

                            <label class="flex items-center gap-2 bg-yellow-50 hover:bg-yellow-100 px-5 py-3 rounded-2xl cursor-pointer transition">
                                <input
                                    type="radio"
                                    name="skills"
                                    value="Intermediate"
                                    {{ old('skills', $student->skills) == 'Intermediate' ? 'checked' : '' }}
                                >

                                <span class="font-medium text-gray-700">
                                    Intermediate
                                </span>
                            </label>

                            <label class="flex items-center gap-2 bg-indigo-50 hover:bg-indigo-100 px-5 py-3 rounded-2xl cursor-pointer transition">
                                <input
                                    type="radio"
                                    name="skills"
                                    value="Advanced"
                                    {{ old('skills', $student->skills) == 'Advanced' ? 'checked' : '' }}
                                >

                                <span class="font-medium text-gray-700">
                                    Advanced
                                </span>
                            </label>

                        </div>

                    </div>

                    <!-- Hobbies -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Hobbies
                        </label>

                        @php
                            $currentHobbies = is_array($student->hobbies)
                                ? $student->hobbies
                                : json_decode($student->hobbies, true) ?? [];
                        @endphp

                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                            <!-- Reading -->
                            <label class="flex items-center gap-3 bg-gray-100 hover:bg-blue-100 px-5 py-4 rounded-2xl cursor-pointer transition">

                                <input
                                    type="checkbox"
                                    name="hobbies[]"
                                    value="Reading"
                                    {{ in_array('Reading', old('hobbies', $currentHobbies)) ? 'checked' : '' }}
                                >

                                <span class="font-medium text-gray-700">
                                    Reading
                                </span>

                            </label>

                            <!-- Travelling -->
                            <label class="flex items-center gap-3 bg-gray-100 hover:bg-blue-100 px-5 py-4 rounded-2xl cursor-pointer transition">

                                <input
                                    type="checkbox"
                                    name="hobbies[]"
                                    value="Travelling"
                                    {{ in_array('Travelling', old('hobbies', $currentHobbies)) ? 'checked' : '' }}
                                >

                                <span class="font-medium text-gray-700">
                                    Travelling
                                </span>

                            </label>

                            <!-- Singing -->
                            <label class="flex items-center gap-3 bg-gray-100 hover:bg-blue-100 px-5 py-4 rounded-2xl cursor-pointer transition">

                                <input
                                    type="checkbox"
                                    name="hobbies[]"
                                    value="Singing"
                                    {{ in_array('Singing', old('hobbies', $currentHobbies)) ? 'checked' : '' }}
                                >

                                <span class="font-medium text-gray-700">
                                    Singing
                                </span>

                            </label>

                            <!-- Dancing -->
                            <label class="flex items-center gap-3 bg-gray-100 hover:bg-blue-100 px-5 py-4 rounded-2xl cursor-pointer transition">

                                <input
                                    type="checkbox"
                                    name="hobbies[]"
                                    value="Dancing"
                                    {{ in_array('Dancing', old('hobbies', $currentHobbies)) ? 'checked' : '' }}
                                >

                                <span class="font-medium text-gray-700">
                                    Dancing
                                </span>

                            </label>

                            <!-- Other -->
                            <label class="flex items-center gap-3 bg-gray-100 hover:bg-blue-100 px-5 py-4 rounded-2xl cursor-pointer transition">

                                <input
                                    type="checkbox"
                                    name="hobbies[]"
                                    value="Other"
                                    {{ in_array('Other', old('hobbies', $currentHobbies)) ? 'checked' : '' }}
                                >

                                <span class="font-medium text-gray-700">
                                    Other
                                </span>

                            </label>

                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row justify-end gap-4 pt-6 border-t border-gray-200">

                        <!-- Cancel -->
                        <a
                            href="{{ route('students.create') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-3 rounded-2xl text-center transition shadow-md"
                        >
                            Cancel
                        </a>

                        <!-- Update -->
                        <button
                            type="submit"
                            class="bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-indigo-700 hover:to-blue-700 text-white font-semibold px-6 py-3 rounded-2xl transition shadow-lg"
                        >
                            Update Student
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>
</html>
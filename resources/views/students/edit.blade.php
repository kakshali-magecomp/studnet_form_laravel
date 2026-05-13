<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 p-8 antialiased">

    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md border border-slate-200">
        <h2 class="text-2xl font-bold text-blue-600 mb-6 border-b border-slate-200 pb-3">Edit Student Details</h2>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 text-sm">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.update', $student->id) }}" method="POST" class="space-y-5">
            @csrf 
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $student->name) }}" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email', $student->email) }}" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Age</label>
                <input type="number" name="age" value="{{ old('age', $student->age) }}" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Gender</label>
                <div class="flex items-center space-x-6">
                    <label class="inline-flex items-center text-slate-800 cursor-pointer">
                        <input type="radio" name="gender" value="Male" {{ old('gender', $student->gender) == 'Male' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 border-slate-300 focus:ring-blue-500">
                        <span class="ml-2 text-sm">Male</span>
                    </label>
                    <label class="inline-flex items-center text-slate-800 cursor-pointer">
                        <input type="radio" name="gender" value="Female" {{ old('gender', $student->gender) == 'Female' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 border-slate-300 focus:ring-blue-500">
                        <span class="ml-2 text-sm">Female</span>
                    </label>
                    <label class="inline-flex items-center text-slate-800 cursor-pointer">
                        <input type="radio" name="gender" value="Other" {{ old('gender', $student->gender) == 'Other' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 border-slate-300 focus:ring-blue-500">
                        <span class="ml-2 text-sm">Other</span>
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Course</label>
                <select name="course" id="course" class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                    <option value="select" {{ old('course') == 'select' ? 'selected' : '' }}>- Select -</option>
                    <option value="Other" {{ old('course',$student->course) == 'Other' ? 'selected' : '' }}>- Other -</option>
                    <option value="BCA" {{ old('course',$student->course) == 'BCA' ? 'selected' : '' }}>- BCA -</option>
                    <option value="MCA" {{ old('course',$student->course) == 'MCA' ? 'selected' : '' }}>- MCA -</option>
                    <option value="Diploma" {{ old('course',$student->course) == 'Diploma' ? 'selected' : '' }}>- Diploma -</option>
                    <option value="B.com" {{ old('course',$student->course) == 'B.com' ? 'selected' : '' }}>- B.com -</option>
                    <option value="M.com" {{ old('course',$student->course) == 'M.com' ? 'selected' : '' }}>- M.com -</option>
                </select>            
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Skills</label>
                    <div class="flex items-center space-x-6">
                    <label class="inline-flex items-center text-slate-800 cursor-pointer">
                        <input type="radio" name="skills" value="Beginner" {{ old('skills', $student->skills) == 'Beginner' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 border-slate-300 focus:ring-blue-500">
                        <span class="ml-2 text-sm">Beginner</span>
                    </label>
                    <label class="inline-flex items-center text-slate-800 cursor-pointer">
                        <input type="radio" name="skills" value="Intermediate" {{ old('skills', $student->skills) == 'Intermediate' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 border-slate-300 focus:ring-blue-500">
                        <span class="ml-2 text-sm">Intermediate</span>
                    </label>
                    <label class="inline-flex items-center text-slate-800 cursor-pointer">
                        <input type="radio" name="skills" value="Advanced" {{ old('skills', $student->skills) == 'Advanced' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 border-slate-300 focus:ring-blue-500">
                        <span class="ml-2 text-sm">Advanced</span>
                    </label>
                </div>           
            </div>

       <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">Hobbies</label>
                <div class="flex flex-wrap gap-4">
                    @php
                    $currentHobbies = is_array($student->hobbies) ? $student->hobbies : json_decode($student->hobbies, true) ?? [];
                    @endphp

                        <label class="inline-flex items-center text-slate-800 cursor-pointer">
                            <input type="checkbox" name="hobbies[]" value="Reading" {{ in_array('Reading', old('hobbies', $currentHobbies)) ? 'checked' : '' }} class="w-4 h-4 rounded text-blue-600 border-slate-300 focus:ring-blue-500">
                            <span class="ml-2 text-sm">Reading</span>
                        </label>

                        <label class="inline-flex items-center text-slate-800 cursor-pointer">
                            <input type="checkbox" name="hobbies[]" value="Travelling" {{ in_array('Travelling', old('hobbies', $currentHobbies)) ? 'checked' : '' }} class="w-4 h-4 rounded text-blue-600 border-slate-300 focus:ring-blue-500">
                            <span class="ml-2 text-sm">Travelling</span>
                        </label>

                        <label class="inline-flex items-center text-slate-800 cursor-pointer">
                            <input type="checkbox" name="hobbies[]" value="Singing" {{ in_array('Singing', old('hobbies', $currentHobbies)) ? 'checked' : '' }} class="w-4 h-4 rounded text-blue-600 border-slate-300 focus:ring-blue-500">
                            <span class="ml-2 text-sm">Singing</span>
                        </label>

                        <label class="inline-flex items-center text-slate-800 cursor-pointer">
                            <input type="checkbox" name="hobbies[]" value="Dancing" {{ in_array('Dancing', old('hobbies', $currentHobbies)) ? 'checked' : '' }} class="w-4 h-4 rounded text-blue-600 border-slate-300 focus:ring-blue-500">
                            <span class="ml-2 text-sm">Dancing</span>
                        </label>

       
                        <label class="inline-flex items-center text-slate-800 cursor-pointer">
                            <input type="checkbox" name="hobbies[]" value="Other" {{ in_array('Other', old('hobbies', $currentHobbies)) ? 'checked' : '' }} class="w-4 h-4 rounded text-blue-600 border-slate-300 focus:ring-blue-500">
                            <span class="ml-2 text-sm">Other</span>
                        </label>
                </div>
        </div>

            <div class="pt-5  border-slate-200 flex justify-end space-x-3">
                <a href="{{ route('students.create') }}" class="bg-slate-500 hover:bg-slate-600 text-white font-medium text-sm py-2 px-4 rounded-lg transition duration-150 shadow-xs">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm py-2 px-4 rounded-lg transition duration-150 shadow-xs">
                    Update Student
                </button>
            </div>
        </form>
    </div>
</body>
</html>

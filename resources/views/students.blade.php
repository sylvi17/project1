<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <div class="students-container">
        <table class="min-w-full border border-gray">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Grade</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Address</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Birthday</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Gender</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$loop->iteration}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$student['name']}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$student->classroom->class}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$student['email']}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$student['address']}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$student['bday']}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$student['gender']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if(session('success'))
            <div class="p-3 mb-4 text-sm text-green-800 rounded-lg bg-green-50">
                {{ session('success') }}
            </div>
        @endif
    </div>
</x-layout>
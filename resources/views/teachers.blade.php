<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <div class="teachers-container">
        <table class="min-w-full border border-gray">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">NO</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Subject Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Phone</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Address</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$loop->iteration}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$teacher['name']}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$teacher->subject->availSubject}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$teacher['phone']}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$teacher['address']}}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
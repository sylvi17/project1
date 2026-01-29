<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <div class="classroom-container">
        <table class="min-w-full border border-gray">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Kelas</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($classrooms as $classroom)
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$loop->iteration}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$classroom['class']}}</td>
                
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
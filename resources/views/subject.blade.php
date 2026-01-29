<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <div class="subjects-container">
        <table class="min-w-full border border-gray">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$loop->iteration}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$subject['availSubject']}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$subject['desc']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
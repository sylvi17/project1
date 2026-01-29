<x-layout>
    <x-slot:judul>{{$title}}</x-slot:judul>
    <div class="profil-container">
        <h1 class="profil-title">Profil Saya</h1>
        <ul class="profil-list">
            <li><strong>Nama:</strong> {{$nama}}</li>
            <li><strong>Kelas:</strong> {{$kelas}}</li>
            <li><strong>Sekolah:</strong> {{$sekolah}}</li>
        </ul>
    </div>  
</x-layout>
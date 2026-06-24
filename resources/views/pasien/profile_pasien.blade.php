    @extends('layouts.pasien')

    @section('content')

    <div class="flex items-center gap-4 mb-8">

    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center">

        <i data-feather="user"
           class="w-8 h-8 text-blue-600">
        </i>

    </div>

    <div>

        <h1 class="text-4xl font-bold text-slate-800">
            Profil Pasien
        </h1>

        <p class="text-slate-500 mt-1">
            Kelola informasi akun dan data pribadi Anda
        </p>

    </div>

</div>
    @if(session('error'))
    <div class="mb-6 bg-amber-50 border-l-4 border-amber-500 p-4 rounded-lg">
        <p class="text-amber-700">
            {{ session('error') }}
        </p>
    </div>
    @endif
    @if(session('success'))
    <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-lg">
        <p class="text-green-700 font-medium">
            {{ session('success') }}
        </p>
    </div>
    @endif

    <div class="bg-white rounded-2xl border border-slate-200 p-8">

        <!-- INFORMASI AKUN -->

            <h2 class="text-2xl font-bold mb-6">
                Informasi Akun
            </h2>

            <form
    action="{{ route('pasien.profile.update') }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    <input
    type="file"
    id="photo"
    name="photo"
    class="hidden">

                <div class="grid md:grid-cols-2 gap-5">

                    <div>
                        <label class="block mb-2 text-slate-600">
                            Nama Lengkap
                        </label>

                        <input
                        name="name"
                            type="text"
                            value="{{ Auth::user()->name }}"
                            class="w-full border rounded-xl p-3">
                    </div>
    <div>
        <label class="block mb-2 text-slate-600">
            NIK
        </label>

        <input
    type="text"
    value="{{ Auth::user()->nik }}"
    readonly
    class="w-full border rounded-xl p-3 bg-slate-100 text-slate-500 cursor-not-allowed">

<p class="text-xs text-slate-400 mt-1">
    NIK tidak dapat diubah setelah registrasi.
</p>
    </div>
                    

                       <div>
    <label class="block mb-2 text-slate-600">
        Email
    </label>

    <input
        type="email"
        value="{{ Auth::user()->email }}"
        readonly
        class="w-full border rounded-xl p-3 bg-slate-100 text-slate-500 cursor-not-allowed">

    <p class="text-xs text-slate-400 mt-1">
        Email tidak dapat diubah.
    </p>
</div>

                    <div>
                        <label class="block mb-2 text-slate-600">
                            Nomor HP
                        </label>

                        <input
    name="no_hp"
    type="text"
    value="{{ Auth::user()->no_hp }}"
    placeholder="08xxxxxxxxxx"
    class="w-full border rounded-xl p-3">
                    </div>

                    <div>
                        <label class="block mb-2 text-slate-600">
                            Tanggal Lahir
                        </label>

                        <input
    name="tanggal_lahir"
    type="date"
    value="{{ Auth::user()->tanggal_lahir }}"
    class="w-full border rounded-xl p-3">
                    </div>

                    <div>
                        <label class="block mb-2 text-slate-600">
                            Jenis Kelamin
                        </label>

                        <select
    name="jenis_kelamin"
    class="w-full border rounded-xl p-3">

    <option value="Laki-laki"
    {{ Auth::user()->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
    Laki-laki
    </option>

    <option value="Perempuan"
    {{ Auth::user()->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
    Perempuan
    </option>

    </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block mb-2 text-slate-600">
                            Alamat
                        </label>

                        <input
    name="alamat"
    type="text"
    value="{{ Auth::user()->alamat }}"
    placeholder="Masukkan alamat"
    class="w-full border rounded-xl p-3">
                    </div>

                </div>

                <button
                    type="submit"
                    class="mt-8 bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700">

                    Simpan Perubahan

                </button>

            </form>

        </div>

    </div>

    @endsection
<form action="{{ route('group.store') }}" method="POST">
    @csrf

    <input type="text"
           name="name"
           placeholder="Nama Group">

    <textarea name="description"
              placeholder="Deskripsi"></textarea>

    <button type="submit">
        Simpan
    </button>
</form>

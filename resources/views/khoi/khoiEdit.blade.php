<form action="{{ route('khoi.update', $khoi->khoi_id) }}" method="POST">
    @csrf

    <label>Tên khối</label>
    <input type="text" name="nameKhoi" value="{{ $khoi->ten_khoi }}">


    <button type="submit">Cập nhật</button>
</form>
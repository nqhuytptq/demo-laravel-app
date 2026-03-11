<form action="{{ route('teacher.update', $teacher->gv_id) }}" method="POST">
    @csrf

    <label>Họ tên</label>
    <input type="text" name="nameGV" value="{{ $teacher->ho_ten }}">

    <label>Địa chỉ</label>
    <input type="text" name="address" value="{{ $teacher->dia_chi }}">
    <button type="submit">Cập nhật</button>
</form>
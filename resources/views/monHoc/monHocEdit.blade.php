<h2>Sửa môn học</h2>

<form action="{{ route('monHoc.update', $monHoc->mon_id) }}" method="POST">
@csrf

<label>Tên môn</label>
<input type="text" name="tenMon" value="{{ $monHoc->ten_mon }}">

<button type="submit">Cập nhật</button>

</form>
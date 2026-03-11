<form action="{{ route('student.update', $student->hoc_sinh_id) }}" method="POST">
    @csrf

    <label>Họ tên</label>
    <input type="text" name="nameHS" value="{{ $student->ho_ten }}">

    <label>Ngày sinh</label>
    <input type="date" name="ngaySinh" value="{{ $student->ngay_sinh }}">

    <label>Phái</label>
    <select name="phai">
        <option value="Nam" {{ $student->phai == 'Nam' ? 'selected' : '' }}>Nam</option>
        <option value="Nữ" {{ $student->phai == 'Nữ' ? 'selected' : '' }}>Nữ</option>
    </select>

    <button type="submit">Cập nhật</button>
</form>
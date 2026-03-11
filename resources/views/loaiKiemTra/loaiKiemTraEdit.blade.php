<h2>Sửa loại bài kiểm tra</h2>

<form action="{{ route('loaiKiemTra.update', $loaiKiemTra->loai_kt_id) }}" method="POST">

@csrf

<label>Tên loại kiểm tra</label>
<input type="text" name="nameLoaiKiemTra"
value="{{ $loaiKiemTra->ten_loai }}">

<br><br>

<label>Hệ số</label>

<select name="heSoLoaiKiemTra">

<option value="1"
{{ $loaiKiemTra->he_so == 1 ? 'selected' : '' }}>
1
</option>

<option value="2"
{{ $loaiKiemTra->he_so == 2 ? 'selected' : '' }}>
2
</option>

<option value="3"
{{ $loaiKiemTra->he_so == 3 ? 'selected' : '' }}>
3
</option>

</select>

<br><br>

<button type="submit">Cập nhật</button>

</form>
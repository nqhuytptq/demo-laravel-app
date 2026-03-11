<h2>Danh sách môn học</h2>

<table border="1">
<thead>
<tr>
<th>Tên môn</th>
<th>Thao tác</th>
</tr>
</thead>

<tbody>
@foreach ($monHocs as $monHoc)
<tr>

<td>{{ $monHoc->ten_mon }}</td>

<td>
<a href="{{ route('monHoc.edit', $monHoc->mon_id) }}">
Sửa
</a>

<a href="{{ route('monHoc.delete', $monHoc->mon_id) }}">
Xóa
</a>
</td>

</tr>
@endforeach
</tbody>

</table>

<h3>Thêm môn học</h3>

<form action="{{ route('monHoc.store') }}" method="POST">
@csrf

<input type="text" name="tenMon" placeholder="Tên môn học">

<button type="submit">Thêm</button>

</form>
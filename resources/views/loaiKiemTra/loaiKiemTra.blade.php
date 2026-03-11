<table border="1">
<thead>
<tr>
<th>Tên loại</th>
<th>Hệ số</th>
<th>Thao tác</th>
</tr>
</thead>

<tbody>

@foreach ($loaiKiemTras as $loaiKiemTra)

<tr>

<td>{{ $loaiKiemTra->ten_loai }}</td>
<td>{{ $loaiKiemTra->he_so }}</td>

<td>

<a href="{{ route('loaiKiemTra.edit',$loaiKiemTra->loai_kt_id) }}">
Sửa
</a>

<a href="{{ route('loaiKiemTra.delete',$loaiKiemTra->loai_kt_id) }}">
Xóa
</a>

</td>

</tr>

@endforeach

</tbody>

</table>
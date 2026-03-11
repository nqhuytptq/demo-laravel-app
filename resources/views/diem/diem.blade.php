

                <h3>Danh sách quản lý</h3>

                <table border="1">

                    <thead>
                        <tr>
                            <th>Học kỳ</th>
                            <th>Tên HS</th>
                            <th>Lớp</th>
                            <th>Điểm</th>
                            <th>Loại kiểm tra</th>
                            <th>Môn</th>
                            <th>Năm học</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($diems as $diem)
                            <tr>

                                <td>{{ $diem->hoc_ky }}</td>
                                <td>{{ $diem->ho_ten }}</td>
                                <td>{{ $diem->ten_lop }}</td>
                                <td>{{ $diem->diem }}</td>
                                <td>{{ $diem->ten_loai }}</td>
                                <td>{{ $diem->ten_mon }}</td>
                                <td>{{ $diem->nam_hoc }}</td>

                                <td class="actions">

                                    <a href="{{ route('diem.edit', $diem->diem_id) }}">Sửa</a>

                                    <a href="{{ route('diem.delete', $diem->diem_id) }}">Xóa</a>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>


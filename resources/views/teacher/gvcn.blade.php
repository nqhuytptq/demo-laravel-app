

                <h3>Danh sách quản lý</h3>

                <table border="1">

                 <thead>
                    <tr>
                        <th>GVCN</th>
                        <th>Khối</th>
                        <th>Lớp</th>
                        <th>Năm học</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>

                    <tbody>

                        @foreach ($lopHocs as $lopHoc)
                            <tr>

                                <td>{{ $lopHoc->ho_ten }}</td>
                                <td>{{ $lopHoc->ten_khoi }}</td>
                                <td>{{ $lopHoc->ten_lop }}</td>
                                <td>{{ $lopHoc->nam_hoc }}</td>


                                <td class="actions">

                                    <a href="{{ route('diem.edit', $lopHoc->lop_id) }}">Sửa</a>

                                    <a href="{{ route('diem.delete', $lopHoc->lop_id) }}">Xóa</a>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>


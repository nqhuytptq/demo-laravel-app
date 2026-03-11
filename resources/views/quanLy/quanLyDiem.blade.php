<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nhập Điểm</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    @include('layout.head')

    <div class="container1">

        <div class="left">

            <h2>NHẬP ĐIỂM HỌC SINH</h2>

            <form action="{{ route('diem.store') }}" method="POST">
                @csrf

                <label>Học kỳ:</label>
                <select name="hocKy" required>
                    <option value="1">Học kỳ 1</option>
                    <option value="2">Học kỳ 2</option>
                </select>
                <br><br>

                <label>Học sinh:</label>
                <select name="hocSinhId" required>
                    @foreach ($students as $student)
                        <option value="{{ $student->hoc_sinh_id }}">
                            {{ $student->ho_ten }}
                        </option>
                    @endforeach
                </select>
                <br><br>

                <label>Lớp:</label>
                <select name="lopId" required>
                    @foreach ($lopHocs as $lopHoc)
                        <option value="{{ $lopHoc->lop_id }}">
                            {{ $lopHoc->ten_lop }}
                        </option>
                    @endforeach
                </select>
                <br><br>

                <label>Môn học:</label>
                <select name="monId" required>
                    @foreach ($monHocs as $monHoc)
                        <option value="{{ $monHoc->mon_id }}">
                            {{ $monHoc->ten_mon }}
                        </option>
                    @endforeach
                </select>
                <br><br>

                <label>Loại kiểm tra:</label>
                <select name="loaiKiemTraId" required>
                    @foreach ($loaiKiemTras as $loaiKiemTra)
                        <option value="{{ $loaiKiemTra->loai_kt_id }}">
                            {{ $loaiKiemTra->ten_loai }} (Hệ số {{ $loaiKiemTra->he_so }})
                        </option>
                    @endforeach
                </select>
                <br><br>

                <label>Năm học:</label>
                <input type="text" name="namHoc" placeholder="2025-2026" required>
                <br><br>

                <label>Điểm:</label>
                <input type="number" step="0.1" min="0" max="10" name="diem" required>
                <br><br>

                <input type="submit" value="Lưu điểm">

            </form>

            <hr>

            <form action="{{ route('diem.list') }}" method="GET">
                <input type="submit" value="Hiển thị DS điểm">
            </form>


        </div>

        <div class="right">

            <h2>Tính điểm trung bình của HS</h2>

            <form method="GET">
                @csrf

                <label>Học sinh:</label>
                <select name="hocSinhId">

                    @foreach ($students as $student)
                        <option value="{{ $student->hoc_sinh_id }}">
                            {{ $student->ho_ten }}
                        </option>
                    @endforeach

                </select>

                <br><br>

                <label>Học kỳ:</label>
                <select name="hocKy">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>

                <br><br>

                <button type="submit" formaction="{{ route('tbTungMon.list') }}" name="tinhTrungBinhTungMonHocKy" value="Tính TB từng môn">Tính TB từng môn</button>
                <button type="submit" formaction="{{ route('tbCacMon.list') }}" name="tinhTrungBinhCacMonHocKy" value="Tính TB các môn">Tính TB các môn</button>

                {{-- @if (!empty($tbTungMons))

                    <table>
                        <thead>
                            <tr>
                                <th>Tên HS</th>
                                <th>Tên Môn</th>
                                <th>Học kỳstudents </th>
                                <th>TBMôn</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($tbTungMons as $tbTungMon)
                                <tr>

                                    <td>{{ $tbTungMon->TenHS }}</td>
                                    <td>{{ $tbTungMon->TenMon }}</td>
                                    <td>{{ $tbTungMon->HocKy }}</td>
                                    <td>{{ $tbTungMon->TBMon }}</td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                @endif

                @if (!empty($tbCacMons))

                    <table>

                        <thead>
                            <tr>
                                <th>Tên HS</th>
                                <th>Học kỳ</th>
                                <th>TBMôn</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($tbCacMons as $tbCacMon)
                                <tr>

                                    <td>{{ $tbCacMon->TenHS }}</td>
                                    <td>{{ $tbCacMon->HocKy }}</td>
                                    <td>{{ $tbCacMon->TBCaNam }}</td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                @endif
 --}}
            </form>

            <hr>

            <h2>Kiểm tra điều kiện Tốt nghiệp của HS</h2>
            <form action="{{ route('getDKTNHS.list')}}" method="GET">
                @csrf
                <label>Học sinh:</label>
                <select name="hocSinhId">

                    @foreach ($students as $student)
                        <option value="{{ $student->hoc_sinh_id }}">
                            {{ $student->ho_ten }}
                        </option>
                    @endforeach

                </select>

                <br><br>

                <label>Học kỳ:</label>
                <select name="hocKy">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>

                <br><br>

                <input type="submit" name="kiemTraDieuKienTNHS" value="Kiểm tra điều kiện TN">

            </form>

        </div>

    </div>

</body>

</html>

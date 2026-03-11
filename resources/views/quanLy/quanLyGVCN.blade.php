<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản Lý GVCN</title>
    <link rel="stylesheet" href="/vnpt/2402/css/style.css">
</head>

<body>

@include('layout.head')

<div class="container1">

    <div class="left">
        <h1>QUẢN LÝ GVCN</h1>

        <div class="form-section">
            <h3>Thêm GVCN các lớp</h3>

            <form action="{{ route('gvcn.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Giáo viên:</label>
                    <select name="gvId" required>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->gv_id }}">
                                {{ $teacher->ho_ten }}
                            </option>
                        @endforeach
                    </select>
                    <br><br>
                </div>

                <div class="form-group">
                    <label>Khối:</label>
                    <select name="khoiId" required>
                        @foreach ($khois as $khoi)
                            <option value="{{ $khoi->khoi_id }}">
                                {{ $khoi->ten_khoi }}
                            </option>
                        @endforeach
                    </select>
                    <br><br>
                </div>

                <div class="form-group">
                    <label>Tên lớp:</label>
                    <input type="text" name="tenLop" placeholder="Ví dụ: 12C1">
                    <br><br>
                </div>

                <div class="form-group">
                    <label>Năm học:</label>
                    <input type="text" name="namHoc" placeholder="Ví dụ: 2025-2026">
                    <br><br>
                </div>

                <button type="submit" name="submitLopHoc" class="btn-add">Thêm</button>
            </form>

            <br>

            <form action="{{ route('gvcn.list') }}" method="GET">
                @csrf  
                <button type="submit" name="showListLopHoc" class="btn-add">
                    Hiện DS
                </button>
            </form>

        </div>

        <hr>

        <h2>In phiếu điểm cho HS</h2>

            <form action="{{ route('inPhieu.list')}}" method="GET">
            @csrf

            <label>Học sinh:</label>
            <select name="hocSinhId" required>
                @foreach ($students as $student)
                    <option value="{{ $student->hoc_sinh_id }}">
                        {{ $student->ho_ten }}
                    </option>
                @endforeach
            </select>

            <br><br>

            <input type="submit" name="inPhieuDiem" value="In phiếu điểm">
        </form>

    </div>

</div>

</body>
</html>
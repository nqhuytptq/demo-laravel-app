<form action="{{ route('diem.update', $diem->diem_id) }}" method="POST">
    @csrf
    <label>Học kỳ:</label>
    <select name="hocKy" required>
        <option value="1" {{ $diem->hocKy == 1 ? 'selected' : '' }}>Học kỳ 1</option>
        <option value="2" {{ $diem->hocKy == 2 ? 'selected' : '' }}>Học kỳ 2</option>
    </select>
    <br><br>

    {{-- <label>Học sinh:</label> --}}
    {{-- <select name="hocSinhId" required>
        @foreach ($students as $student)
            <option value="{{ $student->hoc_sinh_id }}"
                {{ $student->hoc_sinh_id == $diem->hoc_sinh_id ? 'selected' : '' }}>
                {{ $student->ho_ten }}
            </option>
        @endforeach
    </select> --}}
        <input type="hidden" name="hocSinhId" value="{{ $diem->hoc_sinh_id }}" readonly>

    <br><br>

    {{-- <label>Lớp:</label> --}}
    {{-- <select name="lopId" required>
        @foreach ($lopHocs as $lopHoc)
            <option value="{{ $lopHoc->lop_id }}"
                {{ $lopHoc->lop_id == $diem->lop_id ? 'selected' : '' }}>
                {{ $lopHoc->ten_lop }}
            </option>
        @endforeach
    </select> --}}
            <input type="hidden" name="lopId" value="{{ $diem->lop_id }}" readonly>

    <br><br>

    {{-- <label>Môn học:</label> --}}
    {{-- <select name="monId" required>
        @foreach ($monHocs as $monHoc)
            <option value="{{ $monHoc->mon_id }}"
                {{ $monHoc->mon_id == $diem->mon_id ? 'selected' : '' }}>
                {{ $monHoc->ten_mon }}
            </option>
        @endforeach
    </select> --}}
                <input type="hidden" name="monId" value="{{ $diem->mon_id }}" readonly>

    <br><br>

    {{-- <label>Loại kiểm tra:</label> --}}
    {{-- <select name="loaiKiemTraId" required>
        @foreach ($loaiKiemTras as $loaiKiemTra)
            <option value="{{ $loaiKiemTra->loai_kt_id }}"
                {{ $loaiKiemTra->loai_kt_id == $diem->loai_kt_id ? 'selected' : '' }}>
                {{ $loaiKiemTra->ten_loai }} (Hệ số {{ $loaiKiemTra->he_so }})
            </option>
        @endforeach
    </select> --}}
                    <input type="hidden" name="loaiKiemTraId" value="{{ $diem->loai_kt_id }}" readonly>

    <br><br>

    {{-- <label>Năm học:</label> --}}
    <input type="hidden" name="namHoc" value="{{ $diem->nam_hoc }}" readonly>
    <br><br>

    <label>Điểm:</label>
    <input type="number" step="0.1" min="0" max="10" name="diem" value="{{ $diem->diem }}" required>
    <br><br>

    <input type="submit" value="Cập nhật điểm">
</form>

<table border="1">
    <thead>
<th>Teen</th>
<th>Ngay Sinh</th>
<th>Gioi tinh</th>
<th> Thao tac</th>
    </thead>
    <tr>
        <?php foreach ($students as $student) :?>
        <td><?php echo $student->ho_ten; ?> </td>   
        <td><?php echo $student->ngay_sinh; ?> </td>   
        <td><?php echo $student->phai; ?> </td>   
        <td>
<a href="{{ route('student.edit', $student->hoc_sinh_id) }}">
    Sửa
</a>
<a href="{{ route('student.delete', $student->hoc_sinh_id) }}">
    Xóa
</a>

    </tr>
    <?php endforeach;?>
</table>
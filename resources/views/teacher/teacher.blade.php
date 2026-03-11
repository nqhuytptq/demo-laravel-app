
<table border="1">
    <thead>
<th>Teen</th>
<th>Địa chỉ</th>
<th> Thao tac</th>
    </thead>
    <tr>
        <?php foreach ($teachers as $teacher) :?>
        <td><?php echo $teacher->ho_ten; ?> </td>   
        <td><?php echo $teacher->dia_chi; ?> </td>   
        <td>
<a href="{{ route('teacher.edit', $teacher->gv_id) }}">
    Sửa
</a>
<a href="{{ route('teacher.delete', $teacher->gv_id) }}">
    Xóa
</a>
    </tr>
    <?php endforeach;?>
</table>
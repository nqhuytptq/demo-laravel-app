
<table border="1">
    <thead>
<th>Teen</th>
<th>Thao tác</th>
    </thead>
    <tr>
        <?php foreach ($khois as $khoi) :?>
        <td><?php echo $khoi->ten_khoi; ?> </td>   
        <td>
<a href="{{ route('khoi.edit', $khoi->khoi_id) }}">
    Sửa
</a>
<a href="{{ route('khoi.delete', $khoi->khoi_id) }}">
    Xóa
</a>

    </tr>
    <?php endforeach;?>
</table>
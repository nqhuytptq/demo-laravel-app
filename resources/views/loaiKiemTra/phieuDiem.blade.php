 <h2>Tên HS: <?= $data[0]->TenHS ?></h2>
 <h2>Ngày sinh <?= $data[0]->NgaySinh ?></h2> 
 <h2>Tên lớp <?= $data[0]->TenLop ?></h2> 
 <h2>Tên GVCN <?= $data[0]->TenGVCN ?></h2> 

<table>
                    <thead>
                        <tr>
                           
                            <th>Năm học</th>
                            <th>Học kỳ</th>
                            <th>Tên môn</th>
                            <th>TB Môn</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $phieuDiem): ?>

                        <tr>
                           
                            <td><?= $phieuDiem['NamHoc'] ?></td>
                            <td><?= $phieuDiem['HocKy'] ?></td>
                            <td><?= $phieuDiem['TenMon'] ?></td>
                            <td><?= $phieuDiem['TBMon'] ?></td>


                            <?php endforeach; ?>

                    </tbody>
                </table>
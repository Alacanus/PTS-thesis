<?php require __DIR__ . '/../src/bootstrap.php'; ?>
<?php view('header', ['title' => 'FAQ']); ?>

<div>
    <table class="table table-container table-container-files" name="filesT">
        <thead class="tbl-heading">
            <tr class="table-row-container">
                <th class="th-item tbl-item--3" scope="col">File name</th>
                <th class="th-item tbl-item--3" scope="col">Path</th>
                <th class="th-item tbl-item--8" scope="col">Owner</th>
                <th class="th-item tbl-item--5" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody id="filesT">
            <tr class="table-row-container">
                <td class="td-item tbl-item--"></td>
                <td class="td-item tbl-item--"></td>
                <td class="td-item tbl-item--"></td>
                <td class="td-item tbl-item--"></td>
            </tr>
        </tbody>
    </table>
</div>

<?php view('footer') ?>
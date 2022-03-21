<?php require __DIR__ . '/../src/bootstrap.php'; ?>
<?php view('header', ['title' => 'FAQ']); ?>

<div class="overlaybg">
    <div class="overlaybg-02">
        <div class="transaction">
            <div class="tran-container">
                <h2>Transaction</h2>
                <table class="table table-container" name="filesT">
                    <thead class="tbl-heading">
                        <tr class="table-row-container">
                            <!-- User Fname & Lname? -->
                            <th class="th-item">UserID</th>
                            <th class="th-item">Payment Address</th>
                            <th class="th-item">File Address</th>
                            <!-- Class Name? -->
                            <th class="th-item">ClassID</th>
                            <!-- Transaction Table ID? -->
                            <th class="th-item">Transaction ID</th>
                            <th class="th-item">Date of Payment</th>
                            <th class="th-item">Image Address</th>
                            <th class="th-item">Payment Status</th>
                            <th class="th-item">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="filesT">
                        <tr class="table-row-container">
                            <td class="td-item">1</td>
                            <td class="td-item"></td>
                            <td class="td-item"></td>
                            <td class="td-item"></td>
                            <td class="td-item"></td>
                            <td class="td-item"></td>
                            <td class="td-item"></td>
                            <td class="td-item"></td>
                            <td class="td-item">
                                <button class="btn btn-table"></button>
                                <button class="btn btn-table"></button>
                                <button class="btn btn-table"></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php view('footer') ?>
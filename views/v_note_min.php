<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Note minimale </h1>
        <p><?php  echo $message; echo min($lesNotes); ?></p>
    </div>
</div>


<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-4">
            <h3>Notes des élèves ayant obtenu la note miniamle</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Élève n°</th>
                    <th scope="col">Note</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($lesNotes as $k => $v): ?> 
                    <tr>
                    <?php if($v == min($lesNotes)) {echo '<th scope="row">';} ?>
                            <?php if($v == min($lesNotes)) {echo $k + 1;} ?>
                    <?php if($v == min($lesNotes)) {echo '</th>';} ?>

                    <?php if($v == min($lesNotes)) {echo '<td>';} ?>
                            <?php if($v == min($lesNotes)){echo $v;}  ?>
                    <?php if($v == min($lesNotes)) {echo '</td>';} ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="w80 mt5">
    <form action="#" method="POST" class="formUpload" enctype="multipart/form-data">
        <div class="form-title">Nouveau diplome</div>
        <div class="card">
            <p class="form-control">
                <label for="miniature">Choisir le diplome</label>
                <input type="file" id="miniature" name="miniature" accept=".png, .jpg, .jpeg, .pdf">
            </p>
            <p class="form-control">
                <label for="title">Nom de l'eleve</label>
                <input type="text" id="title" name="titre">
            </p>
            <p class="form-control">
                <label for="content">Matricule de l'eleve</label>
                <input type="text" id="content" name="content">
            </p>
            <p>
                <button type="submit" class="btn btn-primary" name="upload">Ajouter le diplome</button>
            </p>
        </div>
    </form>
</div>

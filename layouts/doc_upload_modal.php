<div class="modal fade" id="addDocumentModal" tabindex="-1" role="dialog" aria-labelledby="addDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDocumentModalLabel">Ajouter un document</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../php/docs_store.php" method="POST" id="form_document" enctype="multipart/form-data">
                    <div class="modal-body">
                        <!-- <div class="alert alert-success alert-dismissible fade show" id="addition_alert" style="display: block;">
                            
                            <strong>Fail!</strong> The file name does not exist.
                        </div> -->
                        <div class="alert alert-danger" id="addition_alert" style="display: none;">
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> -->
                            <strong>Fail!</strong> Choose the document to be uploaded.
                        </div>
                        <div class="form-group">
                            <label for="doc_type" class="col-form-label">Type de document:</label>
                            <select name="doc_type" id="doc_type" class="form-control">
                                <option value="Document Médicaux">Document Médicaux</option>
                                <option value="Document Légaux">Document Légaux</option>
                                <option value="Document Administratif">Document Administratif</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="doc_name" class="col-form-label">Nom du document:</label>
                            <select name="doc_name" id="doc_name" class="form-control">
                                <option value="Compte rendu de consultation">Compte rendu de consultation</option>
                                <option value="Compte rendu d'hospitalisation">Compte rendu d'hospitalisation</option>
                                <option value="Compte rendu d'imagerie">Compte rendu d'imagerie</option>
                                <option value="Compte rendu rééducation">Compte rendu rééducation</option>
                                <option value="Compte rendu pyschologue">Compte rendu pyschologue</option>
                                <option value="Contrat de travail">Contrat de travail</option>
                                <option value="Arret de travail">Arret de travail</option>
                                <option value="Avis medecine du travail">Avis medecine du travail</option>
                                <option value="Avis mdph">Avis mdph</option>
                                <option value="Fiche de poste">Fiche de poste</option>
                                <option value="Salaire">Salaire</option>
                                <option value="Piece jointe">Piece jointe</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="doc_date" class="col-form-label">Date: (Input correct date of a document)</label>
                            <input type="date" class="form-control" id="doc_date" name="doc_date" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                        <div class="form-group">
                            <input type="file" id="real-file" name="doc-file-name" style="display: none;" />
                            <button type="button" id="custom-button" class="btn btn-primary">Choisir un fichier</button>
                            <!-- <span id="custom-text">Aucun fichier choisi pour le moment</span> -->
                            <span id="custom-text"></span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" id="doc_upload">Sauvegarder</button>
                        <!-- Sauvegarder -->
                    </div>
                </form>
            </div>
        </div>
    </div>

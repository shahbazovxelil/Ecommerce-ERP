<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Sistemdən çıxmaq</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body p-0">
                <div class="form-group">
                    <label class=" form-label"></label>
                    <div class="modal-body">Əminsinizmi?</div>
                </div>
            </div>
            <div class="modal-footer p-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
                <button id="logout" type="button" class="btn btn-danger">Çıxış</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="gmailModal" tabindex="-1" aria-labelledby="gmailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">
            <form id="form_mail" method="POST" class="needs-validation" novalidate>
            <div class="modal-header">
                <h5 class="modal-title" id="gmailModalLabel">Bildirişin postunu idarə edin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body p-3">
            
                <div class="form-group">
                    <label class="form-label">Bildirişin gəlməsi üçün elektron ünvanızı daxil edin</label>
                    <input type="email" name="email" class="form-control" placeholder="E-poçt ünvanı"
                        value="<?php echo $user_inf['email']; ?>" required>
                        <div class="invalid-feedback">
                            Elektron ünvanı düzgün daxil edin!
                        </div>
                </div>
              
            </div>
            <div class="modal-footer p-0">
                <button type="submit" form="form_mail" class="btn btn-secondary" >Yadda saxla</button>
            </div>
            </form>

        </div>
    </div>
</div>

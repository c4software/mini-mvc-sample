<div class="container mt-5">
    <div class="row">
        <div class="card">
            <div class="card-body">

                <?php
                if (isset($message)) {
                    echo "<div class='alert alert-success' role='alert'>$message</div>";
                }
                ?>

                <form action="/exemple-formulaire" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Adresse e-mail</label>
                        <input type="email" required class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre adresse e-mail.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</div>
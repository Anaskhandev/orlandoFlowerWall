<main>
    <section class="name_neon">
        <div class="container">
            <div class="row justify-content-center ">
                <h2 class=" text-center my-5">Privacy Policy</h2>
                <?php foreach ($records as $record) :
                    echo print_r($record->content);
                endforeach; ?>
            </div>
        </div>
    </section>

</main>
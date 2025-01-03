<!-- Breadcrumb -->
<div class="text-white bread py-5 bg-bread">
    <div class="container py-5">
        <div class="row">
            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page"><?= $privacy_policy[0]['privacy_policy_title'] ?></li>
                </ol>
            </nav>
            <h1><?= $privacy_policy[0]['privacy_policy_title'] ?></h1>
        </div>
    </div>
</div>

<!-- Privacy Policy -->
<div class="container py-5 px-4">
    <div class="row">
        <p><?= $privacy_policy[0]['privacy_policy_description'] ?></p>
    </div>
</div>
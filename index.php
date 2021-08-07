<?php require_once 'inc/header.php'; ?>
<div class="container">
    <div class="main-container">
        <div class="card client-city-wrapper">
            <h3 class="card-header">Featured</h3>
            <div class="card-body">
                <h4 class="card-title">Special title treatment</h4>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
        </div>
        <div class="card col-md-12 main-content-wrapper">
            <div class="card-body">
                <div class="text-center">
                    <h4>Do you want to know the weather from the future?</h4>
                    <h5 class="main-content-text">Enter the date of interest</h5>
                    <form id="date_form">
                        <input required id="date" class="main-content-datepicker" type="date">
                        <h5 class="main-content-text">Enter the city</h5>
                        <input required id="city" class="main-content-datepicker mr-sm-2" type="text">
                        <br><br>
                        <button id="check_date_submit" type="submit" class="btn btn-primary">CHECK THE FUTURE</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 capitals-group-wrapper card-deck">
            <div class="card text-white bg-primary mb-3 d-inline-block capitals-group-item" style="max-width: 20rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h4 class="card-title">Primary card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>
                </div>
            </div>
            <div class="card text-white bg-primary mb-3 d-inline-block" style="max-width: 20rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h4 class="card-title">Primary card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
            <div class="card text-white bg-primary mb-3 d-inline-block" style="max-width: 20rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h4 class="card-title">Primary card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'inc/footer.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
    <script src="{{asset('/js/volvox.js')}}"></script>

    <title>Volvox</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control mt-4" type="text" name="" id="inputSearch" placeholder="Pretraži po nazivu oglasa...">
                    <div id="custom-results">
                        <div class="row">
                            <div class="col-md-12 text-center text-success">Unesite naslov oglasa:</div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <form action="{{route('volvox-store')}}" method="POST" name="send-form-email">
                    @csrf
                    <div class="form-group">
                        <label for="inputAdsTitle">Naslov oglasa</label>
                        <input name="ads_title" type="text" class="form-control" id="inputAdsTitle" placeholder="Naslov oglasa" data-rules="required">
                        <!-- <input name="ads_id" type="hidden" class="form-control required" id="inputAdsid"> -->
                    </div>
                    <div class="form-group">
                        <label for="inputCity">Grad</label>
                        <input name="ads_city" type="text" class="form-control required" id="inputCity" placeholder="Grad" data-rules="required">
                    </div>
                    <div class="form-group">
                        <label for="inputHood">Deo grada</label>
                        <input name="ads_hood" type="text" class="form-control required" id="inputHood" placeholder="Deo grada" data-rules="required">
                    </div>
                    <div class="form-group">
                        <label for="inputStreet">Ulica</label>
                        <input name="ads_street" type="text" class="form-control required" id="inputStreet" placeholder="Ulica" data-rules="required">
                    </div>
                    <div class="form-group">
                        <label for="inputPrice">Cena</label>
                        <input name="ads_price" type="text" class="form-control required" id="inputPrice" placeholder="Cena" data-rules="required|number">
                    </div>
                    <div class="form-group">
                        <label for="inputSquare">Kvadratura</label>
                        <input name="ads_square" type="text" class="form-control required" id="inputSquare" placeholder="Kvadratura" data-rules="required">
                    </div>
                    <div class="form-group">
                        <label for="inputType">Tip nekretnine</label>
                        <input name="ads_type" type="text" class="form-control required" id="inputType" placeholder="Tip nekretnine" data-rules="required">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input name="ads_email" type="email" class="form-control required" id="inputEmail" placeholder="E-mail" data-rules="required|email">
                    </div>
                    <div class="form-group">
                        <label for="textComment">Komentar</label>
                        <textarea name="ads_comment" class="form-control required" name="" id="textComment" cols="30" rows="10" placeholder="Unesite komentar..." data-rules="required"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-success btn-submit custom-button pull-right" type="submit">Potvrdi</button>
                        <button class="btn btn-danger btn-reset custom-button" type="button">Resetuj</button>
                    </div>
                    <div class="form-group mt-2 cl-div-error">
                        <span class="span-error">Sva polja moraju biti popunjena!</span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
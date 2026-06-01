<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body>
    <div class="container">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password">
                <input type="checkbox" id="showpassword">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Commant</label>

                <textarea class="form-control" id="message" rows="3"></textarea>
                <p> Character count <span id="count">0</span></p>

            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            console.log('jquery code is running');

            //for password show hide

            $("#showpassword").change(function() {
                if ($(this).is(":checked")) {
                    $("#password").attr("type", "text");

                } else {
                    $("#password").attr("type", "password");
                }
            });


            $("#message").keyup(function() {
                let count = $(this).val().length;
                $("#count").text(count);


            });

        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
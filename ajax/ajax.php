<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

<input type="search" name="search" id="search">

    <form>
        <input type="text" name="username" id="username"><br>
        <input type="number" name="salary" id="salary"><br>
        <select name="senior" id="senior">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select><br>
        <input type="submit" value="SAVE" id="sbt">
    </form>

    <hr>
    <hr>
    <button id="btn">Load Data</button>
    <div class="showData"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#btn").click(loadData)

            function loadData() {
                $.ajax({
                    url: "load.php",
                    type: "POST",
                    success: function(data) {
                        $(".showData").html(data);
                    }
                })
            }



            $("#sbt").on("click", function(event) {
                event.preventDefault();

                var name = $("#username").val();
                var salary = $("#salary").val();
                var senior = $("#senior").val();

                console.log(name, salary, senior);

                $.ajax({
                    url: "insert.php",
                    type: "POST",
                    data: {
                        name: name,
                        salary: salary,
                        senior: senior
                    },
                    success: function(response) {
                        if (response == 1) {
                            loadData();
                        } else {
                            console.log("failed");
                        }
                    }
                })
            })




            $(document).on("click", "#delete-btn", function() {
                var user_id = $(this).data('id');
                // alert(user_id);

                $.ajax({
                    url: "delete.php",
                    type: "POST",
                    data: {
                        id: user_id
                    },
                    success: function(response) {
                        if (response == 1) {
                            console.log("pass");
                            loadData();
                        } else {
                            console.log("failed");
                        }
                    }
                })
            })


            $(document).on("click", "#edit-btn", function() {
                var user_id = $(this).data('id');
                // alert(user_id);

                $.ajax({
                    url: "edit.php",
                    type: "POST",
                    data: {
                        id: user_id
                    },
                    success: function(response) {
                        if (response == 1) {
                            console.log("pass");
                            loadData();
                        } else {
                            console.log("failed");
                        }
                    }
                })
            })


            $("#search").on("keyup", function() {
                var search_value = $(this).val();
                // alert(user_id);

                $.ajax({
                    url: "search.php",
                    type: "POST",
                    data: {
                        value: search_value
                    },
                    success: function(response) {
                        $(".showData").html(response);
                    }
                })
            })




        })
    </script>
</body>

</html>
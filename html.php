<?php
$arr = [
    ['warning', 'Hủy', 'user_reject'],
    ['danger', 'Hoàn trả', 'user_return']
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>phần 1</th>
                <th>phần 2</th>
                <th>phần 3</th>
                <th>thao tác</th>
            </tr>
        </thead>
        <tbody>
            <tr data-set="1">
                <td>0</td>
                <td><input type="hidden" value="1" name="space"> Số 1</td>
                <td>phần 2</td>
                <td>phần 3</td>
                <td><button type="button" class="btn btn-primary open-modal" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Launch demo modal
                    </button></td>
            </tr>
            <tr data-set="4">
                <td>0</td>
                <td><input type="hidden" value="4" name="space"> Số 2</td>
                <td>phần 2</td>
                <td>phần 3</td>
                <td><button type="button" class="btn btn-primary open-modal" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Launch demo modal
                    </button></td>
            </tr>
        </tbody>
    </table>

    <!-- Modal -->
    <form action="" method="GET">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" value="" name="hello" id="modalInput">
                        <textarea name="comment" id="" cols="60" rows="4" class="comment"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const buttons = document.querySelectorAll('.open-modal');
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const tr = this.closest('tr');
                const hiddenInput = tr.querySelector('input[name="space"]').value;
                console.log(hiddenInput);
                document.getElementById('modalInput').value = hiddenInput;

                let display = (hiddenInput == 4) ? "block" : "none";
                let disabled = hiddenInput == 4 ? false : true;
                document.querySelector('.comment').style.display = display;
                document.querySelector('.comment').disabled = disabled;
            });
        });
    });
    </script>
</body>

</html>